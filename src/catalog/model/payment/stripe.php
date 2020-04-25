<?php
//==============================================================================
// Stripe Payment Gateway v156.4
// 
// Author: Clear Thinking, LLC
// E-mail: johnathan@getclearthinking.com
// Website: http://www.getclearthinking.com
//==============================================================================

class ModelPaymentStripe extends Model {		
	private $type = 'payment';
	private $name = 'stripe';
	
	public function getMethod($address, $total = 0) {
		$version = (!defined('VERSION')) ? 140 : (int)substr(str_replace('.', '', VERSION), 0, 3);
		
		$this->load->language($this->type . '/' . $this->name);
		$settings = ($version < 151) ? unserialize($this->config->get($this->name . '_data')) : $this->config->get($this->name . '_data');
		
		$current_geozones = array();
		$geozones = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '0' OR zone_id = '" . (int)$address['zone_id'] . "')");
		foreach ($geozones->rows as $geozone) {
			$current_geozones[] = $geozone['geo_zone_id'];
		}
		
		if (!$total) {
			$checkoutsetting = ($version < 150) ? 'checkout' : 'setting';
			$keycode = ($version < 150) ? 'key' : 'code';
			$this->load->model($checkoutsetting . '/extension');
			$order_totals = $this->{'model_'.$checkoutsetting.'_extension'}->getExtensions('total');
			$sort_order = array();
			foreach ($order_totals as $key => $value) {
				$sort_order[$key] = $this->config->get($value[$keycode] . '_sort_order');
			}
			array_multisort($sort_order, SORT_ASC, $order_totals);
			$total_data = array();					
			$taxes = $this->cart->getTaxes();
			foreach ($order_totals as $order_total) {
				if ($this->config->get($order_total[$keycode] . '_status')) {
					$this->load->model('total/' . $order_total[$keycode]);
					$this->{'model_total_' . $order_total[$keycode]}->getTotal($total_data, $total, $taxes);
				}
			}
		}
		
		if (!$this->config->get($this->name . '_status') ||
			($settings['min_total'] && (float)$settings['min_total'] > $total) ||
			($settings['max_total'] && (float)$settings['max_total'] < $total) ||
			empty($settings['stores']) ||
			!in_array((int)$this->config->get('config_store_id'), $settings['stores']) ||
			empty($settings['geo_zones']) ||
			(empty($current_geozones) && !in_array(0, $settings['geo_zones'])) ||
			(!empty($current_geozones) && !array_intersect($settings['geo_zones'], $current_geozones)) ||
			empty($settings['customer_groups']) ||
			!in_array((int)$this->customer->getCustomerGroupId(), $settings['customer_groups']) ||
			empty($settings['currencies'][$this->session->data['currency']])
		) {
			return array();
		}
		
		return array(
			'id'			=> $this->name,
			'code'			=> $this->name,
			'title'			=> html_entity_decode($settings['title'][$this->session->data['language']], ENT_QUOTES, 'UTF-8'),
			'sort_order'	=> $this->config->get($this->name . '_sort_order')
		);
	}
	
	public function createOrder($order_data) {
		$version = (!defined('VERSION')) ? 140 : (int)substr(str_replace('.', '', VERSION), 0, 3);
		$settings = ($version < 151) ? unserialize($this->config->get($this->name . '_data')) : $this->config->get($this->name . '_data');
		
		$order_fields = array(
			// Order Data
			'invoice_prefix'			=> $this->config->get('config_invoice_prefix'),
			'store_id'					=> $this->config->get('config_store_id'),
			'store_name'				=> $this->config->get('config_name'),
			'store_url'					=> ($this->config->get('config_store_id') ? $this->config->get('config_url') : HTTP_SERVER),
		
			// Customer Data
			'customer_id'				=> $this->customer->getId(),
			'customer_group_id'			=> $this->config->get('config_customer_group_id'),
			'firstname'					=> '',
			'lastname'					=> '',
			'email'						=> '',
			'telephone'					=> '',
			'fax'						=> '',
			
			// Payment Data
			'payment_firstname'			=> '',
			'payment_lastname'			=> '',
			'payment_company'			=> '',
			'payment_company_id'		=> '',
			'payment_tax_id'			=> '',
			'payment_address_1'			=> '',
			'payment_address_2'			=> '',
			'payment_city'				=> '',
			'payment_postcode'			=> '',
			'payment_zone'				=> '',
			'payment_zone_id'			=> '',
			'payment_country'			=> '',
			'payment_country_id'		=> '',
			'payment_address_format'	=> '',
			'payment_method'			=> html_entity_decode($settings['title'][$this->session->data['language']], ENT_QUOTES, 'UTF-8'),
			'payment_code'				=> $this->name,
			
			// Shipping Data
			'shipping_firstname'		=> '',
			'shipping_lastname'			=> '',
			'shipping_company'			=> '',
			'shipping_company_id'		=> '',
			'shipping_tax_id'			=> '',
			'shipping_address_1'		=> '',
			'shipping_address_2'		=> '',
			'shipping_city'				=> '',
			'shipping_postcode'			=> '',
			'shipping_zone'				=> '',
			'shipping_zone_id'			=> '',
			'shipping_country'			=> '',
			'shipping_country_id'		=> '',
			'shipping_address_format'	=> '',
			'shipping_method'			=> (isset($this->session->data['shipping_method']['title']) ? $this->session->data['shipping_method']['title'] : ''),
			'shipping_code'				=> (isset($this->session->data['shipping_method']['code']) ? $this->session->data['shipping_method']['code'] : ''),
			
			// Currency Data
			'currency_id'				=> $this->currency->getId(),
			'currency'					=> $this->currency->getCode(),
			'currency_code'				=> $this->currency->getCode(),
			'value'						=> $this->currency->getValue($this->currency->getCode()),
			'currency_value'			=> $this->currency->getValue($this->currency->getCode()),
			
			// Browser Data
			'ip'						=> $this->request->server['REMOTE_ADDR'],
			'forwarded_ip'				=> (!empty($this->request->server['HTTP_X_FORWARDED_FOR']) ? $this->request->server['HTTP_X_FORWARDED_FOR'] : !empty($this->request->server['HTTP_CLIENT_IP']) ? $this->request->server['HTTP_CLIENT_IP'] : ''),
			'user_agent'				=> (isset($this->request->server['HTTP_USER_AGENT']) ? $this->request->server['HTTP_USER_AGENT'] : ''),
			'accept_language'			=> (isset($this->request->server['HTTP_ACCEPT_LANGUAGE']) ? $this->request->server['HTTP_ACCEPT_LANGUAGE'] : ''),
			
			// Other Data
			'affiliate_id'				=> 0,
			'commission'				=> 0,
			'comment'					=> (isset($this->session->data['comment']) ? $this->session->data['comment'] : ''),
			'language_id'				=> $this->config->get('config_language_id'),
			'products'					=> array(),
			'vouchers'					=> array(),
			'totals'					=> array(),
			'total'						=> 0,
		);
		
		foreach ($order_fields as $field => $default) {
			$data[$field] = (isset($order_data[$field])) ? $order_data[$field] : $default;
		}
		
		// Customer
		$this->load->model('account/customer');
		$customer = $this->model_account_customer->getCustomer($data['customer_id']);
		if (!empty($customer)) {
			$data['customer_group_id'] = $customer['customer_group_id'];
			$data['firstname'] = $customer['firstname'];
			$data['lastname'] = $customer['lastname'];
			$data['email'] = $customer['email'];
			$data['telephone'] = $customer['telephone'];
			$data['fax'] = $customer['fax'];
		}
		
		// Products
		if (empty($data['products'])) {
			$products = $this->cart->getProducts();
			foreach ($products as &$product) {
				foreach ($product['option'] as &$option) {
					if ($option['type'] == 'file') {
						$option['option_value'] = $this->encryption->decrypt($option['option_value']);
					}
				}
				$product['tax'] = $this->tax->getTax($product['price'], $product['tax_class_id']);
			}
			$data['products'] = $products;
		}
		
		// Vouchers
		if (!empty($this->session->data['vouchers'])) {
			$vouchers = $this->session->data['vouchers'];
			foreach ($vouchers as &$voucher) {
				$voucher['code'] = substr(md5(mt_rand()), 0, 10);
			}
			$data['vouchers'] = $vouchers;
		}
		
		// Order Totals
		if (empty($data['totals'])) {
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
			
			$data['totals'] = $total_data;
			$data['total'] = $order_total;
		}
		
		$this->load->model('checkout/order');
		$order_id = $this->model_checkout_order->addOrder($data);
		
		return $order_id;
	}
}
?>