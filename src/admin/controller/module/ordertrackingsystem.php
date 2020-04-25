<?php
class ControllerModuleOrderTrackingSystem extends Controller {
	private $error = array(); 
	
	public function index() {   
		$this->load->language('module/ordertrackingsystem');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {			
			if(substr(VERSION,0,3) == '1.4' || substr(VERSION,0,5) == '1.5.0'){
				if (isset($this->request->post['ordertrackingsystem_setting'])) {
					$this->request->post['ordertrackingsystem_setting'] = serialize($this->request->post['ordertrackingsystem_setting']);
				}
			}			
			$this->model_setting_setting->editSetting('ordertrackingsystem', $this->request->post);		
			
			$this->session->data['success'] = $this->language->get('text_success');
			
			$this->redirect(HTTPS_SERVER . 'index.php?route=extension/module&token=' . $this->session->data['token']);
		}
				
		$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['entry_order_status'] = $this->language->get('entry_order_status');
		$this->data['entry_notify'] = $this->language->get('entry_notify');
		$this->data['entry_comment'] = $this->language->get('entry_comment');
		$this->data['entry_method'] = $this->language->get('entry_method');
		$this->data['entry_link'] = $this->language->get('entry_link');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_method'] = $this->language->get('button_add_method');
		$this->data['button_remove'] = $this->language->get('button_remove');
		
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
		if (isset($this->error['code'])) {
			$this->data['error_code'] = $this->error['code'];
		} else {
			$this->data['error_code'] = array();
		}
				
  		$breadcrumb = array();

   		$breadcrumb[] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => HTTPS_SERVER . 'index.php?route=common/home&token=' . $this->session->data['token'],
      		'separator' => false
   		);

   		$breadcrumb[] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => HTTPS_SERVER . 'index.php?route=extension/module&token=' . $this->session->data['token'],
      		'separator' => ' :: '
   		);
		
   		$breadcrumb[] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => HTTPS_SERVER . 'index.php?route=module/ordertrackingsystem&token=' . $this->session->data['token'],
      		'separator' => ' :: '
   		);
		
		if(substr(VERSION,0,3)=='1.5')$this->data['breadcrumbs'] = $breadcrumb;
		if(substr(VERSION,0,3)=='1.4')$this->document->breadcrumbs = $breadcrumb;
		
		$this->data['action'] = HTTPS_SERVER . 'index.php?route=module/ordertrackingsystem&token=' . $this->session->data['token'];
		
		$this->data['cancel'] = HTTPS_SERVER . 'index.php?route=extension/module&token=' . $this->session->data['token'];

		$this->data['token'] = $this->session->data['token'];
		
		$this->load->model('localisation/order_status');

    	$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		if (isset($this->request->post['ordertrackingsystem_status_id'])) {
			$this->data['ordertrackingsystem_status_id'] = $this->request->post['ordertrackingsystem_status_id'];
		} else {
			$this->data['ordertrackingsystem_status_id'] = $this->config->get('ordertrackingsystem_status_id');
		}
		
		if (isset($this->request->post['ordertrackingsystem_notify'])) {
			$this->data['ordertrackingsystem_notify'] = $this->request->post['ordertrackingsystem_notify'];
		} else {
			$this->data['ordertrackingsystem_notify'] = $this->config->get('ordertrackingsystem_notify');
		}	
		
		if (isset($this->request->post['ordertrackingsystem_comment'])) {
			$this->data['ordertrackingsystem_comment'] = $this->request->post['ordertrackingsystem_comment'];
		} elseif ($this->config->has('ordertrackingsystem_comment')) {
			$this->data['ordertrackingsystem_comment'] = $this->config->get('ordertrackingsystem_comment');
		} else {
			$this->data['ordertrackingsystem_comment'] = $this->language->get('text_default');
		}			
		
			
		$this->data['modules'] = array();
		
		if (isset($this->request->post['ordertrackingsystem_setting'])) {
			$this->data['modules'] = $this->request->post['ordertrackingsystem_setting'];
		} elseif ($this->config->get('ordertrackingsystem_setting')) { 
			if(substr(VERSION,0,3) == '1.4' || substr(VERSION,0,5) == '1.5.0'){
				$this->data['modules'] = unserialize($this->config->get('ordertrackingsystem_setting'));
			}else{
				$this->data['modules'] = $this->config->get('ordertrackingsystem_setting');
			}
		}		

		$this->template = 'module/ordertrackingsystem.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		if(substr(VERSION,0,3)=='1.5')$this->response->setOutput($this->render());		
		if(substr(VERSION,0,3)=='1.4')$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	}
	
	public function import() {
		$this->load->language('module/ordertrackingsystem');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$url = '';

		if (isset($this->request->get['filter_order_id'])) {
			$url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
		}
			
		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}
												
		if (isset($this->request->get['filter_order_status_id'])) {
			$url .= '&filter_order_status_id=' . $this->request->get['filter_order_status_id'];
		}
			
		if (isset($this->request->get['filter_total'])) {
			$url .= '&filter_total=' . $this->request->get['filter_total'];
		}
						
		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}
			
		if (isset($this->request->get['filter_date_modified'])) {
			$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
		}
													
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		
		$this->load->model('setting/extension');
		$extensions = $this->model_setting_extension->getInstalled('module');
		if (!in_array('ordertrackingsystem', $extensions)) {
			$this->error['warning'] = $this->language->get('error_install');
		}
		
		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			if ((isset( $this->request->files['upload'] )) && (is_uploaded_file($this->request->files['upload']['tmp_name']))) {
				$file = $this->request->files['upload']['tmp_name'];
				$this->load->model('sale/ordertrackingsystem');
				if ($this->model_sale_ordertrackingsystem->upload($file)) {
					$this->load->language('sale/order');
					$this->session->data['success'] = $this->language->get('text_success');
					$this->redirect(HTTPS_SERVER . 'index.php?route=sale/order&token=' . $this->session->data['token']);
				}
				else {
					$this->error['warning'] = $this->language->get('error_upload');
				}
			}
		}

  		$breadcrumb = array();

   		$breadcrumb[] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => HTTPS_SERVER . 'index.php?route=common/home&token=' . $this->session->data['token'],
      		'separator' => false
   		);

   		$breadcrumb[] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => HTTPS_SERVER . 'index.php?route=extension/module&token=' . $this->session->data['token'],
      		'separator' => ' :: '
   		);
		
   		$breadcrumb[] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => HTTPS_SERVER . 'index.php?route=module/ordertrackingsystem/import&token=' . $this->session->data['token'],
      		'separator' => ' :: '
   		);
		
		if(substr(VERSION,0,3)=='1.5')$this->data['breadcrumbs'] = $breadcrumb;
		if(substr(VERSION,0,3)=='1.4')$this->document->breadcrumbs = $breadcrumb;
		
		$this->data['bulk_action'] = HTTPS_SERVER . 'index.php?route=module/ordertrackingsystem/import&token=' . $this->session->data['token'];
		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['bulk_upload'] = $this->language->get('bulk_upload');
		$this->data['entry_file'] = $this->language->get('entry_file');	
		$this->data['text_note'] = $this->language->get('text_note');	
		
		$this->data['token'] = $this->session->data['token'];
		
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
		$this->template = 'module/ordertrackingsystem_import.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);
				
		if(substr(VERSION,0,3)=='1.5')$this->response->setOutput($this->render());		
		if(substr(VERSION,0,3)=='1.4')$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
  	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/ordertrackingsystem')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (isset($this->request->post['ordertrackingsystem_setting'])) {
			foreach ($this->request->post['ordertrackingsystem_setting'] as $key => $value) {
				if (!$value['code']) {
					$this->error['code'][$key] = $this->language->get('error_code');
				}
			}
		}
				
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
	
	public function install(){
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "order` LIKE 'tracking_method'");
		if(!$query->num_rows){
			$this->db->query("ALTER TABLE `" . DB_PREFIX . "order` ADD `tracking_method` varchar(255) NOT NULL DEFAULT '' COMMENT '' COLLATE utf8_bin;");
		}
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "order` LIKE 'tracking_number'");
		if(!$query->num_rows){
			$this->db->query("ALTER TABLE `" . DB_PREFIX . "order` ADD `tracking_number` varchar(255) NOT NULL DEFAULT '' COMMENT '' COLLATE utf8_bin;");
		}		
	}
}
?>