<?php
//==============================================================================
// Stripe Payment Gateway v156.4
// 
// Author: Clear Thinking, LLC
// E-mail: johnathan@getclearthinking.com
// Website: http://www.getclearthinking.com
//==============================================================================

class ControllerPaymentStripe extends Controller { 
	private $type = 'payment';
	private $name = 'stripe';
	
	public function index() {
		$this->data['type'] = $this->type;
		$this->data['name'] = $this->name;
		
		// non-standard
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "stripe_customer` (
				`customer_id` int(11) NOT NULL,
				`stripe_customer_id` varchar(18) NOT NULL,
				`transaction_mode` varchar(4) NOT NULL DEFAULT 'live',
				PRIMARY KEY (`customer_id`, `stripe_customer_id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci
		");
		
		$old_setting_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "setting WHERE `group` = '" . "stripe_permanent' AND `key` = '" . "stripe_customers'");
		if ($old_setting_query->num_rows) {
			$stripe_customer_tokens = unserialize($old_setting_query->row['value']);
			foreach ($stripe_customer_tokens as $opencart_id => $stripe_id) {
				$this->db->query("INSERT IGNORE INTO " . DB_PREFIX . "stripe_customer SET customer_id = " . (int)$opencart_id . ", stripe_customer_id = '" . $this->db->escape($stripe_id) . "'");
			}
			$this->db->query("DELETE FROM " . DB_PREFIX . "setting WHERE `group` = '" . "stripe_permanent'");
		}
		// end
		
		$token = $this->data['token'] = (isset($this->session->data['token'])) ? $this->session->data['token'] : '';
		$version = $this->data['version'] = (!defined('VERSION')) ? 140 : (int)substr(str_replace('.', '', VERSION), 0, 3);
		
		$this->loadlanguage();
		$this->data['exit'] = $this->makeURL('extension/' . $this->type, 'token=' . $token, 'SSL');
		
		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			$this->save($this->request->get['exit'] == 'true' ? $this->data['exit'] : $this->url->link($this->type.'/'.$this->name, 'token=' . $token, 'SSL'));
		}
		
		$breadcrumbs = array();
		$breadcrumbs[] = array(
			'href'		=> $this->makeURL('common/home', 'token=' . $token, 'SSL'),
			'text'		=> $this->data['text_home'],
			'separator' => false
		);
		$breadcrumbs[] = array(
			'href'		=> $this->makeURL('extension/' . $this->type, 'token=' . $token, 'SSL'),
			'text'		=> $this->data['standard_' . $this->type],
			'separator' => ' :: '
		);
		$breadcrumbs[] = array(
			'href'		=> $this->makeURL($this->type . '/' . $this->name, 'token=' . $token, 'SSL'),
			'text'		=> $this->data['heading_title'],
			'separator' => ' :: '
		);
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "setting WHERE `group` = '" . $this->db->escape($this->name) . "' ORDER BY `key` ASC");
		foreach ($query->rows as $setting) {
			$this->data[$setting['key']] = (is_string($setting['value']) && strpos($setting['value'], 'a:') === 0) ? unserialize($setting['value']) : $setting['value'];
		}
		
		// non-standard
		$this->load->model('localisation/language');
		$this->data['languages'] = $this->model_localisation_language->getLanguages();

		$this->load->model('localisation/order_status');
		$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		$this->data['selectall_links'] = '<div class="selectall-links"><a onclick="$(this).parent().prev().find(\':checkbox\').attr(\'checked\', true)">' . $this->data['text_select_all'] . '</a> / <a onclick="$(this).parent().prev().find(\':checkbox\').attr(\'checked\', false)">' . $this->data['text_unselect_all'] . '</a></div>';
		
		$stores = $this->db->query("SELECT * FROM " . DB_PREFIX . "store ORDER BY name");
		$this->data['stores'] = $stores->rows;
		if ($this->config->get('config_name')) {
			array_unshift($this->data['stores'], array('store_id' => 0, 'name' => $this->config->get('config_name')));
		}
		
		$this->load->model('localisation/geo_zone');
		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		array_unshift($this->data['geo_zones'], array('geo_zone_id' => 0, 'name' => $this->data['text_all_other_zones']));
		
		$this->load->model('sale/customer_group');
		$this->data['customer_groups'] = $this->model_sale_customer_group->getCustomerGroups();
		array_unshift($this->data['customer_groups'], array('customer_group_id' => 0, 'name' => $this->data['text_not_logged_in']));
		
		$currencies = $this->db->query("(SELECT * FROM " . DB_PREFIX . "currency WHERE status = '1' AND `code` = '" . $this->config->get('config_currency') . "') UNION (SELECT * FROM " . DB_PREFIX . "currency WHERE status = '1' AND `code` != '" . $this->config->get('config_currency') . "')");
		$this->data['currencies'] = $currencies->rows;
		
		// Get subscription products
		$this->data['subscription_products'] = array();
		
		if (!empty($this->data[$this->name . '_data']['subscriptions']) &&
			!empty($this->data[$this->name . '_data']['transaction_mode']) &&
			!empty($this->data[$this->name . '_data'][$this->data[$this->name . '_data']['transaction_mode'].'_secret_key'])
		) {
			$plan_response = $this->curlRequest('plans', array('count' => 100));
			
			if (!empty($plan_response['error'])) {
				$this->log->write('STRIPE ERROR: ' . $plan_response['error']['message']);
			} else {
				foreach ($plan_response['data'] as $plan) {
					$product_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id AND pd.language_id = " . (int)$this->config->get('config_language_id') . ") WHERE p.location = '" . $this->db->escape($plan['id']) . "'");
					foreach ($product_query->rows as $product) {
						$this->data['subscription_products'][] = array(
							'product_id'	=> $product['product_id'],
							'name'			=> $product['name'],
							'price'			=> $this->currency->format($product['price']),
							'location'		=> $product['location'],
							'plan'			=> $plan['name'],
							'interval'		=> $plan['interval_count'] . ' ' . $plan['interval'] . ($plan['interval_count'] > 1 ? 's' : ''),
							'charge'		=> $this->currency->format($plan['amount'] / 100)
						);
					}
				}
			}
		}
		// end
		
		$this->template = $this->type . '/' . $this->name . '.tpl';
		$this->children = array(
			'common/header',	
			'common/footer'	
		);
		
		if ($version < 150) {
			$this->document->title = $this->data['heading_title'];
			$this->document->breadcrumbs = $breadcrumbs;
			$this->response->setOutput($this->render(true), $this->config->get('config_compression'));
		} else {
			$this->document->setTitle($this->data['heading_title']);
			$this->data['breadcrumbs'] = $breadcrumbs;
			$this->response->setOutput($this->render());
		}
	}
	
	//==============================================================================
	// Private functions
	//==============================================================================
	private function curlRequest($api, $data = array(), $type = 'GET') {
		$version = $this->data['version'] = (!defined('VERSION')) ? 140 : (int)substr(str_replace('.', '', VERSION), 0, 3);
		$settings = ($version < 151) ? unserialize($this->config->get($this->name . '_data')) : $this->config->get($this->name . '_data');
		
		if ($type == 'POST') {
			$curl = curl_init('https://api.stripe.com/v1/' . $api);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		} else {
			$curl = curl_init('https://api.stripe.com/v1/' . $api . '?' . http_build_query($data));
		}
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($curl, CURLOPT_FORBID_REUSE, true);
		curl_setopt($curl, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Stripe-Version: 2014-03-28'));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_USERPWD, $settings[$settings['transaction_mode'].'_secret_key'] . ':');
		$response = json_decode(curl_exec($curl), true);
		
		if (curl_error($curl)) {
			$response = array('error' => array('message' => 'CURL ERROR: ' . curl_errno($curl) . '::' . curl_error($curl)));
			$this->log->write('STRIPE CURL ERROR: ' . curl_errno($curl) . '::' . curl_error($curl));	
		} elseif (empty($response)) {
			$response = array('error' => array('message' => 'CURL ERROR: Empty Gateway Response'));
			$this->log->write('STRIPE CURL ERROR: Empty Gateway Response');
		}
		curl_close($curl);
		
		return $response;
	}
	
	private function loadlanguage() {
		if (!defined('VERSION') || strpos(VERSION, '1.4.7') === 0) {
			$language = $this->db->query("SELECT * FROM " . DB_PREFIX . "language WHERE language_id = '" . $this->config->get('config_language_id') . "'");
			$directory = (file_exists(DIR_LANGUAGE . $language->row['directory'] . '/' . $this->type . '/' . $this->name . '.php')) ? $language->row['directory'] : 'english';
			if (!file_exists(DIR_LANGUAGE . $directory . '/' . $this->type . '/' . $this->name . '.php')) {
				echo 'Error: Could not load language ' . $this->type . '/' . $this->name . '!';
				exit();
			}
			$_ = array();
			require(DIR_LANGUAGE . $language->row['directory'] . '/' . $language->row['filename'] . '.php');
			require(DIR_LANGUAGE . $directory . '/' . $this->type . '/' . $this->name . '.php');
			$this->data = array_merge($this->data, $_);
		} else {
			$this->data = array_merge($this->data, $this->load->language($this->type . '/' . $this->name));
		}
	}
	
	private function makeURL($route, $args = '', $connection = 'NONSSL') {
		if (!defined('VERSION') || VERSION < 1.5) {
			$url = ($connection == 'NONSSL') ? HTTP_SERVER : HTTPS_SERVER;
			$url .= 'index.php?route=' . $route;
			$url .= ($args) ? '&' . ltrim($args, '&') : '';
			return $url;
		} else {
			return $this->url->link($route, $args, $connection);
		}
	}
	
	private function permissionError() {
		$this->data = array_merge($this->data, $this->language->load($this->type . '/' . $this->name));
		if ($this->user->hasPermission('modify', $this->type . '/' . $this->name)) {
			return false;
		} else {
			echo $this->data['standard_error'];
			return true;
		}
	}
	
	//==============================================================================
	// Public functions
	//==============================================================================
	public function save($redirect = false) {
		if ($this->permissionError()) return;
		$version = (!defined('VERSION')) ? 140 : (int)substr(str_replace('.', '', VERSION), 0, 3);
		$postdata = $this->request->post;
		if ($version < 151) {
			foreach ($postdata as $key => $value) if (is_array($value)) $postdata[$key] = serialize($value);
		}
		$this->load->model('setting/setting');
		$this->model_setting_setting->editSetting($this->name, $postdata);
		file_put_contents(DIR_LOGS.'clearthinking.txt',date('Y-m-d H:i:s')."\t".$this->request->server['REMOTE_ADDR']."\t".$this->name."\n",FILE_APPEND|LOCK_EX);
		if ($redirect) {
			$this->session->data['success'] = $this->data['standard_success'];
			$this->redirect($redirect);
		}
	}
	
	public function capture() {
		$capture_response = $this->curlRequest('charges/' . $this->request->get['charge_id'] . '/capture', array(), 'POST');
		if (!empty($capture_response['error'])) {
			$this->log->write('STRIPE ERROR: ' . $capture_response['error']['message']);
			echo 'Error: ' . $capture_response['error']['message'];
		}
		if (empty($capture_response['error']) || strpos($capture_response['error']['message'], 'has already been captured')) {
			$this->db->query("UPDATE " . DB_PREFIX . "order_history SET `comment` = REPLACE(`comment`, '<span>No &nbsp;</span> <a onclick=\"capture($(this), \'" . $this->db->escape($this->request->get['charge_id']) . "\')\">(Capture)</a>', 'Yes') WHERE `comment` LIKE '%capture($(this), \'" . $this->db->escape($this->request->get['charge_id']) . "\')%'");
		}
	}
	
	public function refund() {
		$refund_response = $this->curlRequest('charges/' . $this->request->get['charge_id'] . '/refund', array('amount' => $this->request->get['amount'] * 100), 'POST');
		if (!empty($refund_response['error'])) {
			$this->log->write('STRIPE ERROR: ' . $refund_response['error']['message']);
			echo 'Error: ' . $refund_response['error']['message'];
		}
	}
}
?>