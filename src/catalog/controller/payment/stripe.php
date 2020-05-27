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
	private $embed = false;
	
    public function embed() {
		$this->embed = true;
		$this->index();
    }
	
	protected function index() {
		$this->data['type'] = $this->type;
		$this->data['name'] = $this->name;
		
		$this->loadlanguage();
		$version = $this->data['version'] = (!defined('VERSION')) ? 140 : (int)substr(str_replace('.', '', VERSION), 0, 3);
		$settings = $this->data['settings'] = ($version < 151) ? unserialize($this->config->get($this->name . '_data')) : $this->config->get($this->name . '_data');
		$language = $this->session->data['language'];
		
		$this->load->model('checkout/order');
		if (isset($this->session->data['order_id'])) {
			$this->data['order_info'] = $this->model_checkout_order->getOrder($this->session->data['order_id']);
		} else {
			$this->load->model('setting/extension');
			$order_totals = $this->model_setting_extension->getExtensions('total');
			
			$sort_order = array();
			foreach ($order_totals as $key => $value) {
				$sort_order[$key] = $this->config->get($value['code'] . '_sort_order');
			}
			array_multisort($sort_order, SORT_ASC, $order_totals);
			
			$total_data = array();
			$order_total = 0;
			$taxes = $this->cart->getTaxes();
			
			foreach ($order_totals as $ot) {
				if (!$this->config->get($ot['code'] . '_status')) continue;
				$this->load->model('total/' . $ot['code']);
				$this->{'model_total_' . $ot['code']}->getTotal($total_data, $order_total, $taxes);
			}
			
			$this->data['order_info'] = array(
				'order_id'	=> '',
				'total'		=> $order_total,
				'email'		=> $this->customer->getEmail(),
				'comment'	=> '',
			);
		}
		
		$this->data['customer'] = array();
		if ($this->customer->isLogged()) {
			$customer_id_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "stripe_customer WHERE customer_id = " . (int)$this->customer->getId() . " AND transaction_mode = '" . $this->db->escape($settings['transaction_mode']) . "'");
			if ($customer_id_query->num_rows) {
				$customer_response = $this->curlRequest('customers/' . $customer_id_query->row['stripe_customer_id'], array('expand' => array('' => 'default_card')));
				if (!empty($customer_response['deleted'])) {
					$this->db->query("DELETE FROM " . DB_PREFIX . "stripe_customer WHERE stripe_customer_id = '" . $this->db->escape($customer_id_query->row['stripe_customer_id']) . "'");
				} elseif (!empty($customer_response['error'])) {
					$this->log->write(strtoupper($this->name) . ' ERROR: ' . $customer_response['error']['message']);
				} elseif ($this->data['settings']['allow_stored_cards']) {
					$this->data['customer'] = $customer_response;
				}
			}
		}
		
		$this->data['checkout_image'] = (!empty($settings['checkout_image'])) ? HTTPS_SERVER . 'image/' . $settings['checkout_image'] : '';
		$this->data['checkout_title'] = (!empty($settings['checkout_title'][$language])) ? $this->replaceShortcodes($settings['checkout_title'][$language], $this->data['order_info']) : $this->config->get('config_name');
		$this->data['checkout_description'] = (!empty($settings['checkout_description'][$language])) ? $this->replaceShortcodes($settings['checkout_description'][$language], $this->data['order_info']) : '';
		$this->data['checkout_button'] = (!empty($settings['checkout_button'][$language])) ? $settings['checkout_button'][$language] : '';
		
		$this->data['embed'] = $this->embed;
		
		$this->id = $this->type;
		$template = (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/' . $this->type . '/' . $this->name . '.tpl')) ? $this->config->get('config_template') : 'default';
		$this->template = $template . '/template/' . $this->type . '/' . $this->name . '.tpl';
		$this->render();
	}
	
	public function send() {
		$version = $this->data['version'] = (!defined('VERSION')) ? 140 : (int)substr(str_replace('.', '', VERSION), 0, 3);
		$settings = ($version < 151) ? unserialize($this->config->get($this->name . '_data')) : $this->config->get($this->name . '_data');
		
		$this->load->language('total/total');
		$this->loadlanguage();
		
		$this->load->model('checkout/order');
		
		// Create order if necessary
		if (!empty($this->request->post['embed'])) {
			$data = array();
			
			$data['customer_id'] = (int)$this->customer->getId();
			$data['email'] = $this->request->post['email'];
			
			if ($settings['checkout_billing']) {
				$payment_name = explode(' ', $this->request->post['addresses']['billing_name'], 2);
				$payment_country = $this->db->query("SELECT * FROM " . DB_PREFIX . "country WHERE iso_code_2 = '" . $this->db->escape($this->request->post['addresses']['billing_address_country_code']) . "'");
				$payment_zone = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone WHERE `name` = '" . $this->db->escape($this->request->post['addresses']['billing_address_state']) . "' AND country_id = " . (int)$payment_country->row['country_id']);
				
				$data['firstname'] = (isset($payment_name[0])) ? $payment_name[0] : '';
				$data['lastname'] = (isset($payment_name[1])) ? $payment_name[1] : '';
				
				$data['payment_firstname'] = (isset($payment_name[0])) ? $payment_name[0] : '';
				$data['payment_lastname'] = (isset($payment_name[1])) ? $payment_name[1] : '';
				$data['payment_company'] = '';
				$data['payment_company_id'] = '';
				$data['payment_tax_id'] = '';
				$data['payment_address_1'] = $this->request->post['addresses']['billing_address_line1'];
				$data['payment_address_2'] = '';
				$data['payment_city'] = $this->request->post['addresses']['billing_address_city'];
				$data['payment_postcode'] = $this->request->post['addresses']['billing_address_zip'];
				$data['payment_zone'] = $this->request->post['addresses']['billing_address_state'];
				$data['payment_zone_id'] = (isset($payment_zone->row['zone_id'])) ? $payment_zone->row['zone_id'] : '';
				$data['payment_country'] = $this->request->post['addresses']['billing_address_country'];
				$data['payment_country_id'] = (isset($payment_country->row['country_id'])) ? $payment_country->row['country_id'] : '';
			}
			
			if ($settings['checkout_shipping']) {
				if (isset($this->session->data['country_id'])) {
					$shipping_quote = array(
						'country_id'	=> $this->session->data['country_id'],
						'zone_id'		=> $this->session->data['zone_id'],
						'postcode'		=> $this->session->data['postcode'],
					);
				} elseif (isset($this->session->data['guest']['shipping']['country_id'])) {
					$shipping_quote = array(
						'country_id'	=> $this->session->data['guest']['shipping']['country_id'],
						'zone_id'		=> $this->session->data['guest']['shipping']['zone_id'],
						'postcode'		=> $this->session->data['guest']['shipping']['postcode'],
					);
				} else {
					$shipping_quote = array(
						'country_id'	=> $this->session->data['shipping_country_id'],
						'zone_id'		=> $this->session->data['shipping_zone_id'],
						'postcode'		=> $this->session->data['shipping_postcode'],
					);
				}
				
				$shipping_name = explode(' ', $this->request->post['addresses']['shipping_name'], 2);
				$shipping_country = $this->db->query("SELECT * FROM " . DB_PREFIX . "country WHERE iso_code_2 = '" . $this->db->escape($this->request->post['addresses']['shipping_address_country_code']) . "'");
				$shipping_zone = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone WHERE `code` = '" . $this->db->escape($this->request->post['addresses']['shipping_address_state']) . "' AND country_id = " . (int)$shipping_country->row['country_id']);
				
				if ($shipping_quote['country_id'] != $shipping_country->row['country_id'] || 
					$shipping_quote['zone_id'] != $shipping_zone->row['zone_id'] || 
					$shipping_quote['postcode'] != $this->request->post['addresses']['shipping_address_zip']
				) {
					$this->response->setOutput(json_encode(array('error' => $this->data['error_shipping_mismatch'])));
					return;
				}
				
				$data['shipping_firstname'] = (isset($shipping_name[0])) ? $shipping_name[0] : '';
				$data['shipping_lastname'] = (isset($shipping_name[1])) ? $shipping_name[1] : '';
				$data['shipping_company'] = '';
				$data['shipping_company_id'] = '';
				$data['shipping_tax_id'] = '';
				$data['shipping_address_1'] = $this->request->post['addresses']['shipping_address_line1'];
				$data['shipping_address_2'] = '';
				$data['shipping_city'] = $this->request->post['addresses']['shipping_address_city'];
				$data['shipping_postcode'] = $this->request->post['addresses']['shipping_address_zip'];
				$data['shipping_zone'] = $this->request->post['addresses']['shipping_address_state'];
				$data['shipping_zone_id'] = (isset($shipping_zone->row['zone_id'])) ? $shipping_zone->row['zone_id'] : '';
				$data['shipping_country'] = $this->request->post['addresses']['shipping_address_country'];
				$data['shipping_country_id'] = (isset($shipping_country->row['country_id'])) ? $shipping_country->row['country_id'] : '';
			}
			
			$this->load->model($this->type . '/' . $this->name);
			$this->session->data['order_id'] = $this->{'model_'.$this->type.'_'.$this->name}->createOrder($data);
		}
		
		$order_id = $this->session->data['order_id'];
		$order_info = $this->model_checkout_order->getOrder($order_id);
		$data = (!empty($this->request->post['card_token'])) ? array('card' => $this->request->post['card_token']) : array();
		
		// Check for subscription plan products
		$customer_id = $this->customer->getId();
		
		if (!empty($settings['subscriptions'])) {
			foreach ($this->cart->getProducts() as $product) {
				$product_query = $this->db->query("SELECT location FROM " . DB_PREFIX . "product WHERE product_id = " . (int)$product['product_id']);
				if (empty($product_query->row['location'])) continue;
				
				$plan_response = $this->curlRequest('plans/' . $product_query->row['location']);
				
				if (empty($plan_response['error'])) {
					$plan = array(
						'cost'		=> $product['total'],
						'id'		=> $plan_response['id'],
						'name'		=> $plan_response['name'],
						'quantity'	=> $product['quantity'],
					);
					if ($settings['prevent_guests'] && !$customer_id) {
						$this->response->setOutput(json_encode(array('error' => $this->data['error_customer_required'])));
						return;
					}
				}
			}
		}
		
		// Create or update customer
		if (!empty($plan['id']) || !empty($this->request->post['store_card']) || $settings['send_customer_data'] == 'always' || empty($data)) {
			$stripe_customer_id = '';
			if ($this->customer->isLogged()) {
				$customer_id_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "stripe_customer WHERE customer_id = " . (int)$this->customer->getId() . " AND transaction_mode = '" . $this->db->escape($settings['transaction_mode']) . "'");
				if ($customer_id_query->num_rows) {
					$stripe_customer_id = $customer_id_query->row['stripe_customer_id'];
				}
			}
			
			$data['description'] = $order_info['firstname'] . ' ' . $order_info['lastname'] . ' (' . 'customer_id: ' . $order_info['customer_id'] . ')';
			$data['email'] = $order_info['email'];
			
			$customer_response = $this->curlRequest('customers' . ($stripe_customer_id ? '/' . $stripe_customer_id : ''), $data, 'POST');
			
			if (empty($customer_response['error'])) {
				$data = array('customer' => $customer_response['id']);
				if (!empty($this->request->post['store_card']) && !$stripe_customer_id) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "stripe_customer SET customer_id = " . (int)$this->customer->getId() . ", stripe_customer_id = '" . $this->db->escape($customer_response['id']) . "', transaction_mode = '" . $this->db->escape($settings['transaction_mode']) . "'");
				}
			} else {
				$this->response->setOutput(json_encode(array('error' => $customer_response['error']['message'])));
				return;
			}
		}
		
		// Subscribe customer to plan
		if (!empty($plan['id'])) {
			$current_plan = (!empty($customer_response['subscription']['plan']['id'])) ? $customer_response['subscription']['plan']['id'] : '';
			$current_quantity = ($current_plan == $plan['id']) ? $customer_response['subscription']['quantity'] : 0;
			
			$subscription_response = $this->curlRequest('customers/' . $data['customer'] . '/subscription', array('plan' => $plan['id'], 'quantity' => $current_quantity + $plan['quantity']), 'POST');
			
			if (empty($subscription_response['error'])) {
				$order_info['total'] -= $plan['cost'];
				if (!empty($subscription_response['trial_period_days'])) {
					$this->db->query("UPDATE `" . DB_PREFIX . "order` SET total = " . (float)$order_info['total'] . " WHERE order_id = " . (int)$order_info['order_id']);
					$this->db->query("UPDATE " . DB_PREFIX . "order_total SET text = '" . $this->db->escape($this->currency->format($order_info['total'])) . "', value = " . (float)$order_info['total'] . " WHERE order_id = " . (int)$order_info['order_id'] . " AND title = '" . $this->db->escape($this->data['text_total']) . ($version < 150 ? ":" : "") . "'");
					$this->db->query("INSERT INTO " . DB_PREFIX . "order_total SET order_id = " . (int)$order_info['order_id'] . ($version < 150 ? "" : ", code = 'total',") . " title = '" . $this->db->escape($this->data['text_to_be_charged_separately']) . ($version < 150 ? ":" : "") . "', text = '" . $this->db->escape($this->currency->format(-$plan['cost'])) . "', value = " . (float)-$plan['cost'] . ", sort_order = " . ((int)$this->config->get('total_sort_order')-1));
				}
			} else {
				$this->response->setOutput(json_encode(array('error' => $subscription_response['error']['message'])));
				return;
			}
		}
		
		// Charge card
		$order_status_id = $settings['success_status_id'];
		if ($order_info['total'] > 0) {
			$data['amount'] = round(100 * $this->currency->convert($order_info['total'], $this->config->get('config_currency'), $settings['currencies'][$this->session->data['currency']]));
			$data['capture'] = ($settings['charge_mode'] == 'authorize') ? 'false' : 'true';
			$data['currency'] = $settings['currencies'][$this->session->data['currency']];
			$data['description'] = $this->replaceShortcodes($settings['transaction_description'], $order_info);
			
			$data['metadata']['Store'] = $this->config->get('config_name');
			$data['metadata']['Order ID'] = $order_info['order_id'];
			$data['metadata']['Customer Info'] = $order_info['firstname'] . ' ' . $order_info['lastname'] . ', ' . $order_info['email'] . ', ' . $order_info['telephone'] . ', customer_id: ' . $order_info['customer_id'];
			$data['metadata']['Products'] = $this->replaceShortcodes('[products]', $order_info);
			if (!empty($order_info['shipping_method'])) {
				$data['metadata']['Shipping Method'] = $order_info['shipping_method'] . ' (' . $this->currency->format($this->session->data['shipping_method']['cost']) . ')';
				$data['metadata']['Shipping Address'] = $order_info['shipping_firstname'] . ' ' . $order_info['shipping_lastname'] . ($order_info['shipping_company'] ? ', ' . $order_info['shipping_company'] : '');
				$data['metadata']['Shipping Address'] .= ', ' . $order_info['shipping_address_1'] . ($order_info['shipping_address_2'] ? ', ' . $order_info['shipping_address_2'] : '');
				$data['metadata']['Shipping Address'] .= ', ' . $order_info['shipping_city'] . ', ' . $order_info['shipping_zone'] . ', ' . $order_info['shipping_postcode'] . ', ' . $order_info['shipping_country'];
			}
			$data['metadata']['Order Comment'] = $order_info['comment'];
			$data['metadata']['IP Address'] = $order_info['ip'];
			foreach ($data['metadata'] as &$metadata) {
				if (strlen($metadata) > 197) {
					$metadata = substr($metadata, 0, 197) . '...';
				}
			}
			
			$charge_response = $this->curlRequest('charges', $data, 'POST');
			
			if (empty($charge_response['error'])) {
				if ($charge_response['card']['address_line1_check'] == 'fail' && $settings['street_status_id'])	$order_status_id = $settings['street_status_id'];
				if ($charge_response['card']['address_zip_check'] == 'fail' && $settings['zip_status_id'])		$order_status_id = $settings['zip_status_id'];
				if ($charge_response['card']['cvc_check'] == 'fail' && $settings['cvc_status_id'])				$order_status_id = $settings['cvc_status_id'];
			} else {
				$this->response->setOutput(json_encode(array('error' => $charge_response['error']['message'])));
				return;
			}
		}
		
		// Confirm order
		$this->model_checkout_order->confirm($order_id, $order_status_id);
		$strong = '<strong style="display: inline-block; width: 120px; padding: 2px 5px">';
		
		$comment = '';
		if (!empty($plan['name'])) {
			$comment .= $strong . 'Subscribed to Plan:</strong>' . $plan['name'] . '<br />';
			$comment .= $strong . 'Subscription Charge:</strong>' . $this->currency->format($plan['cost']) . '<br />';
		}
		if (!empty($charge_response)) {
			$comment .= '<script type="text/javascript" src="view/javascript/stripe.js"></script>';
			$comment .= $strong . 'Stripe Charge ID:</strong>' . $charge_response['id'] . '<br />';
			$comment .= $strong . 'Charge Amount:</strong>' . $this->currency->format($charge_response['amount'] / 100) . '<br />';
			$comment .= $strong . 'Captured:</strong>' . (!empty($charge_response['captured']) ? 'Yes' : '<span>No &nbsp;</span> <a onclick="capture($(this), \'' . $charge_response['id'] . '\')">(Capture)</a>') . '<br />';
			$comment .= $strong . 'Card Name:</strong>' . $charge_response['card']['name'] . '<br />';
			$comment .= $strong . 'Card Number:</strong>**** **** **** ' . $charge_response['card']['last4'] . '<br />';
			$comment .= $strong . 'Card Fingerprint:</strong>' . $charge_response['card']['fingerprint'] . '<br />';
			$comment .= $strong . 'Card Expiry:</strong>' . $charge_response['card']['exp_month'] . ' / ' . $charge_response['card']['exp_year'] . '<br />';
			$comment .= $strong . 'Card Type:</strong>' . $charge_response['card']['type'] . '<br />';
			$comment .= $strong . 'Card Address:</strong>' . $charge_response['card']['address_line1'] . '<br />';
			$comment .= (!empty($charge_response['card']['address_line2'])) ? $strong . '&nbsp;</strong>' . $charge_response['card']['address_line2'] . '<br />' : '';
			$comment .= $strong . '&nbsp;</strong>' . $charge_response['card']['address_city'] . ', ' . $charge_response['card']['address_state'] . ' ' . $charge_response['card']['address_zip'] . '<br />';
			$comment .= $strong . '&nbsp;</strong>' . $charge_response['card']['address_country'] . '<br />';
			$comment .= $strong . 'Origin:</strong>' . $charge_response['card']['country'] . ' <img src="view/image/flags/' . strtolower($charge_response['card']['country']) . '.png" /><br />';
			$comment .= $strong . 'CVC Check:</strong>' . $charge_response['card']['cvc_check'] . '<br />';
			$comment .= $strong . 'Street Check:</strong>' . $charge_response['card']['address_line1_check'] . '<br />';
			$comment .= $strong . 'Zip Check:</strong>' . $charge_response['card']['address_zip_check'] . '<br />';
			$comment .= $strong . 'Refund:</strong><a onclick="refund($(this), ' . $charge_response['amount'] . ', \'' . $charge_response['id'] . '\', ' . (version_compare(VERSION, '1.5.0') < 0 ? 0 : 1) . ')">(Refund)</a>';
		}
		
		$this->model_checkout_order->update($order_id, $order_status_id, $comment, false);
		$this->response->setOutput(json_encode(array('success' => $this->makeURL('checkout/success', '', 'SSL'))));
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
	
	private function loadLanguage() {
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
			$this->load->model('tool/seo_url');
			$url = ($connection == 'NONSSL') ? HTTP_SERVER : HTTPS_SERVER;
			$url .= 'index.php?route=' . $route;
			$url .= ($args) ? '&' . ltrim($args, '&') : '';
			return $this->model_tool_seo_url->rewrite($url);
		} else {
			return $this->url->link($route, $args, $connection);
		}
	}
	
	private function replaceShortcodes($text, $order_info) {
		$product_names = array();
		foreach ($this->cart->getProducts() as $product) $product_names[] = $product['name'];
		
		$replace = array(
			'[store]',
			'[order_id]',
			'[amount]',
			'[email]',
			'[comment]',
			'[products]'
		);
		$with = array(
			$this->config->get('config_name'),
			$order_info['order_id'],
			$this->currency->format($order_info['total']),
			$order_info['email'],
			$order_info['comment'],
			implode(', ', $product_names)
		);
		
		return str_replace($replace, $with, $text);
	}
	
	//==============================================================================
	// Public functions
	//==============================================================================
	public function webhook() {
		$version = $this->data['version'] = (!defined('VERSION')) ? 140 : (int)substr(str_replace('.', '', VERSION), 0, 3);
		$settings = ($version < 151) ? unserialize($this->config->get($this->name . '_data')) : $this->config->get($this->name . '_data');
		
		$event = @json_decode(file_get_contents('php://input'));
		if (empty($event->type)) return;
		
		if (!isset($this->request->get['key']) || $this->request->get['key'] != $this->config->get('config_encryption')) {
			echo 'Wrong key';
			$this->log->write('STRIPE WEBHOOK ERROR: webhook URL key ' . $this->request->get['key'] . ' does not match the encryption key ' . $this->config->get('config_encryption'));
			return;
		}
		
		$this->load->model('checkout/order');
		
		if ($event->type == 'charge.refunded') {
			
			$order_history_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_history WHERE `comment` LIKE '%" . $this->db->escape($event->data->object->id) . "%' ORDER BY order_history_id DESC");
			if (!$order_history_query->num_rows) return;
			
			$strong = '<strong style="display: inline-block; width: 140px; padding: 3px">';
			$comment = $strong . 'Stripe Event:</strong>' . $event->type . '<br />';

			$refund = array_pop($event->data->object->refunds);
			$comment .= $strong . 'Refund Amount:</strong>' . $this->currency->format($refund->amount / 100) . '<br />';
			$comment .= $strong . 'Total Amount Refunded:</strong>' . $this->currency->format($event->data->object->amount_refunded / 100);
			
			$order_info = $this->model_checkout_order->getOrder($order_history_query->row['order_id']);
			$refund_type = ($event->data->object->amount_refunded == $event->data->object->amount) ? 'refund' : 'partial';
			$order_status_id = ($settings[$refund_type . '_status_id']) ? $settings[$refund_type . '_status_id'] : $order_history_query->row['order_status_id'];
			
			$this->model_checkout_order->update($order_history_query->row['order_id'], $order_status_id, $comment);
			
		} elseif ($event->type == 'invoice.payment_succeeded') {
			
			if (empty($settings['subscriptions'])) return;
			
			$customer_response = $this->curlRequest('customers/' . $event->data->object->customer, array('expand' => array('' => 'default_card')));
			if (!empty($customer_response['deleted']) || !empty($customer_response['error'])) {
				$this->log->write('STRIPE WEBHOOK ERROR: ' . $customer_response['error']['message']);
				return;
			}
			
			$customer_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer c LEFT JOIN stripe_customer sc ON (c.customer_id = sc.customer_id) WHERE sc.stripe_customer_id = '" . $this->db->escape($customer_response['id']) . "' AND sc.transaction_mode = '" . $this->db->escape($settings['transaction_mode']) . "'");
			if ($settings['prevent_guests'] && !$customer_query->num_rows) {
				$this->log->write('STRIPE WEBHOOK ERROR: customer with stripe_customer_id ' . $customer_response['id'] . ' does not exist in OpenCart, and guests are set to not allow use of stored cards');
				return;
			}
			$customer = $customer_query->row;
			
			$last_order_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "order` WHERE email = '" . $this->db->escape($customer_response['email']) . "'");
			if ($last_order_query->num_rows && (time() - strtotime($last_order_query->row['date_added'])) < 600) {
				// Customer's last order is within 10 minutes, so it most likely was an immediate subscription and is already shown on their last order
				return;
			}
			
			$data = array();
			
			$name = (isset($customer_response['default_card']['name'])) ? explode(' ', $customer_response['default_card']['name'], 2) : array();
			$firstname = (isset($name[0])) ? $name[0] : '';
			$lastname = (isset($name[1])) ? $name[1] : '';
			
			$data['customer_id'] = (isset($customer['customer_id'])) ? $customer['customer_id'] : 0;
			$data['firstname'] = $firstname;
			$data['lastname'] = $lastname;
			$data['email'] = $customer_response['email'];
			
			$country = (isset($customer_response['default_card']['address_country'])) ? $this->db->query("SELECT * FROM " . DB_PREFIX . "country WHERE iso_code_2 = '" . $this->db->escape($customer_response['default_card']['address_country']) . "'") : '';
			$zone = (isset($customer_response['default_card']['address_state'])) ? $this->db->query("SELECT * FROM " . DB_PREFIX . "zone WHERE `name` = '" . $this->db->escape($customer_response['default_card']['address_state']) . "' AND country_id = '" . $this->db->escape($country->row['country_id']) . "'") : '';
			
			$data['payment_firstname'] = $firstname;
			$data['payment_lastname'] = $lastname;
			$data['payment_company'] = '';
			$data['payment_company_id'] = '';
			$data['payment_tax_id'] = '';
			$data['payment_address_1'] = $customer_response['default_card']['address_line1'];
			$data['payment_address_2'] = $customer_response['default_card']['address_line2'];
			$data['payment_city'] = $customer_response['default_card']['address_city'];
			$data['payment_postcode'] = $customer_response['default_card']['address_zip'];
			$data['payment_zone'] = $customer_response['default_card']['address_state'];
			$data['payment_zone_id'] = (isset($zone->row['zone_id'])) ? $zone->row['zone_id'] : '';
			$data['payment_country'] = $customer_response['default_card']['address_country'];
			$data['payment_country_id'] = (isset($country->row['country_id'])) ? $country->row['country_id'] : '';
			
			$plan_name = '';
			$product_data = array();
			$total_data = array();
			$subtotal = 0;
			
			foreach ($event->data->object->lines as $line_item) {
				foreach ($line_item as $line) {
					if (empty($line->plan)) {
						$total_data[] = array(
							'code'			=> 'total',
							'title'			=> $line->description,
							'text'			=> $this->currency->format($line->amount / 100),
							'value'			=> $line->amount /100,
							'sort_order'	=> 2
						);
					} else {
						$product_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id AND pd.language_id = " . (int)$this->config->get('config_language_id') . ") WHERE p.location = '" . $this->db->escape($line->plan->id) . "'");
						if (!$product_query->num_rows) continue;
						foreach ($product_query->rows as $product) {
							$plan_name = $line->plan->name;
							$subtotal += $line->amount / 100;
							$product_data[] = array(
								'product_id'	=> $product['product_id'],
								'name'			=> $product['name'],
								'model'			=> $product['model'],
								'option'		=> array(),
								'download'		=> array(),
								'quantity'		=> $line->quantity,
								'subtract'		=> $product['subtract'],
								'price'			=> ($line->amount / 100 / $line->quantity),
								'total'			=> $line->amount / 100,
								'tax'			=> $this->tax->getTax($line->amount / 100, $product['tax_class_id']),
								'reward'		=> isset($product['reward']) ? $product['reward'] : 0
							);
						}
					}
				}
			}
			
			$total_data[] = array(
				'code'			=> 'sub_total',
				'title'			=> 'Sub-Total',
				'text'			=> $this->currency->format($subtotal),
				'value'			=> $subtotal,
				'sort_order'	=> 1
			);
			$total_data[] = array(
				'code'			=> 'total',
				'title'			=> 'Total',
				'text'			=> $this->currency->format($event->data->object->total / 100),
				'value'			=> $event->data->object->total / 100,
				'sort_order'	=> 3
			);
			
			$data['products'] = $product_data;
			$data['totals'] = $total_data;
			$data['total'] = $event->data->object->total / 100;
			
			$this->load->model($this->type . '/' . $this->name);
			$order_id = $this->{'model_'.$this->type.'_'.$this->name}->createOrder($data);
			$this->model_checkout_order->confirm($order_id, $settings['success_status_id']);
			
			$strong = '<strong style="display: inline-block; width: 140px; padding: 3px">';
			$comment = $strong . 'Charged for Plan:</strong>' . $plan_name . '<br />';
			if (!empty($event->data->object->charge)) $comment .= $strong . 'Stripe Charge ID:</strong>' . $event->data->object->charge . '<br />';
			
			$this->model_checkout_order->update($order_id, $settings['success_status_id'], $comment);
		}
		
	}
}
?>