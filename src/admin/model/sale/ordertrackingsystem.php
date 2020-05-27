<?php
static $config = NULL;
static $log = NULL;

// Error Handler
function error_handler_for_ots($errno, $errstr, $errfile, $errline) {
	global $config;
	global $log;
	
	switch ($errno) {
		case E_NOTICE:
		case E_USER_NOTICE:
			$errors = "Notice";
			break;
		case E_WARNING:
		case E_USER_WARNING:
			$errors = "Warning";
			break;
		case E_ERROR:
		case E_USER_ERROR:
			$errors = "Fatal Error";
			break;
		default:
			$errors = "Unknown";
			break;
	}
		
	if (($errors=='Warning') || ($errors=='Unknown')) {
		return true;
	}

	if ($config->get('config_error_display')) {
		echo '<b>' . $errors . '</b>: ' . $errstr . ' in <b>' . $errfile . '</b> on line <b>' . $errline . '</b>';
	}
	
	if ($config->get('config_error_log')) {
		$log->write('PHP ' . $errors . ':  ' . $errstr . ' in ' . $errfile . ' on line ' . $errline);
	}

	return true;
}


function fatal_error_shutdown_handler_for_ots()
{
	$last_error = error_get_last();
	if ($last_error['type'] === E_ERROR) {
		// fatal error
		error_handler_for_ots(E_ERROR, $last_error['message'], $last_error['file'], $last_error['line']);
	}
}

class ModelSaleOrderTrackingSystem extends Model {	
	public function upload($filename) {
		global $config;
		global $log;
		$config = $this->config;
		$log = $this->log;
		set_error_handler('error_handler_for_ots',E_ALL);
		register_shutdown_function('fatal_error_shutdown_handler_for_ots');
		
		ini_set("memory_limit","512M");
		ini_set("max_execution_time",180);
		//set_time_limit( 60 );
		chdir( DIR_SYSTEM . 'PHPExcel' );
		require_once( 'Classes/PHPExcel.php' );
		chdir( DIR_APPLICATION );
		$inputFileType = PHPExcel_IOFactory::identify($filename);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objReader->setReadDataOnly(true);
		$reader = $objReader->load($filename);
		$ok = $this->validateUpload( $reader );
		if (!$ok) {
			return FALSE;
		}
		$query1 = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "order` LIKE 'tracking_method'");
		$query2 = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "order` LIKE 'tracking_number'");
		if($query1->num_rows && $query2->num_rows){
			$this->addtrackingnumber( $reader);
		}
		return $ok;
	}
	
	public function addtrackingnumber( &$reader ){
		$this->load->model('sale/order');
		$otsdata = array();
		$ots_link = array();
		$otsdata['order_status_id'] = $this->config->has('ordertrackingsystem_status_id') ? $this->config->get('ordertrackingsystem_status_id'):$this->config->get('config_complete_status_id');
		$otsdata['notify'] = $this->config->has('ordertrackingsystem_notify') ? $this->config->get('ordertrackingsystem_notify'):0;
		$otsdata['append'] = $otsdata['notify'];
		$ots_comment = $this->config->has('ordertrackingsystem_comment') ? $this->config->get('ordertrackingsystem_comment'):"";		
		if(substr(VERSION,0,3) == '1.4' || substr(VERSION,0,5) == '1.5.0'){
			$ordertrackingsystem_setting = unserialize($this->config->get('ordertrackingsystem_setting'));
		}else{
			$ordertrackingsystem_setting = $this->config->get('ordertrackingsystem_setting');
		}
		$ots_settings = $this->config->has('ordertrackingsystem_setting') ? $ordertrackingsystem_setting:array();
		foreach ($ots_settings as $ots_setting) {
			$ots_link[trim($ots_setting['code'])] = $ots_setting['link'];
		}
		
		$data = $reader->getSheet(0);
		$isFirstRow = TRUE;
		$i = 0;
		$k = $data->getHighestRow();
		for ($i=0; $i<$k; $i+=1) {
			if ($isFirstRow) {
				$isFirstRow = FALSE;
				continue;
			}
			$order_id = trim($this->getCell($data,$i,1));
			$number = trim($this->getCell($data,$i,3));
			$code = trim($this->getCell($data,$i,2));
			if($order_id == '' || $number == '')continue;			
			
			$query = $this->db->query("SELECT `order_id` FROM `" . DB_PREFIX . "order` WHERE order_id = '" . (int)$order_id . "'");
			if ($query->rows) {
				$this->db->query("UPDATE `" . DB_PREFIX . "order` set `tracking_method`='" . $this->db->escape($code) . "',`tracking_number`='" . $this->db->escape($number) . "' WHERE order_id = '" . (int)$order_id . "'");
				$otsdata['comment'] = $ots_comment;				
				if(stristr($otsdata['comment'], '{shipping_method}')){
					$otsdata['comment'] = str_replace('{shipping_method}' , $code, $otsdata['comment']);
				}
				if(stristr($otsdata['comment'], '{number}')){
					$otsdata['comment'] = str_replace('{number}' , $number, $otsdata['comment']);
				}
				if(stristr($otsdata['comment'], '{link}')){
					if(isset($ots_link[$code])){
						$otsdata['comment'] = str_replace('{link}' , $ots_link[$code], $otsdata['comment']);;
					}else{
						$otsdata['comment'] = str_replace('{link}' , '', $otsdata['comment']);;
					}					
				}
				$this->model_sale_order->addOrderHistory($order_id, $otsdata);
			}
		}
	}
	
	public function getCell(&$worksheet,$row,$col,$default_val='') {
		$col -= 1; // we use 1-based, PHPExcel uses 0-based column index
		$row += 1; // we use 0-based, PHPExcel used 1-based row index
		return ($worksheet->cellExistsByColumnAndRow($col,$row)) ? $worksheet->getCellByColumnAndRow($col,$row)->getValue() : $default_val;
	}
	
	public function validateUpload( &$reader )
	{
		if (!$this->validateProducts( $reader )) {
			error_log(date('Y-m-d H:i:s - ', time())."\n",3,DIR_LOGS."error.txt");
			return FALSE;
		}
		return TRUE;
	}
	
	public function validateProducts( &$reader )
	{
		$expectedProductHeading = array("Order ID", "Shipping Method", "Tracking Number");
		$data =& $reader->getSheet(0);
		return $this->validateHeading( $data, $expectedProductHeading );
	}
	
	public function validateHeading( &$data, &$expected ) {
		$heading = array();
		$k = PHPExcel_Cell::columnIndexFromString( $data->getHighestColumn() );
		if ($k != count($expected)) {
			return FALSE;
		}
		$i = 0;
		for ($j=1; $j <= $k; $j+=1) {
			$heading[] = $this->getCell($data,$i,$j);
		}
		$valid = TRUE;
		for ($i=0; $i < count($expected); $i+=1) {
			if (!isset($heading[$i])) {
				$valid = FALSE;
				break;
			}
			if (strtolower($heading[$i]) != strtolower($expected[$i])) {
				$valid = FALSE;
				break;
			}
		}
		return $valid;
	}
}
?>