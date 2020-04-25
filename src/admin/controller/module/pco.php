<?php
class ControllerModulePco extends Controller {
	private $error = array(); 
	
	public function index() {  
	
		$this->load->language('module/pco');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('pco', $this->request->post);		
					
			$this->session->data['success'] = $this->language->get('text_success');
						
			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}
				
		$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/pco', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/pco', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['modules'] = array();
		
		$this->load->model('design/layout');
		
		$this->data['layouts'] = $this->model_design_layout->getLayouts();
						
		$this->template = 'module/pco.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		
		//START
		//entry
		$this->setDataLang('entry_category');
		$this->setDataLang('entry_show_on_category');
		$this->setDataLang('entry_list_color_selector_size');
		$this->setDataLang('entry_product');
		$this->setDataLang('entry_product_color_selector_size');
		$this->setDataLang('entry_style');
		$this->setDataLang('entry_color_selector_style');	
		$this->setDataLang('entry_preview');	
		
		//text
		$this->setDataLang('text_yes');
		$this->setDataLang('text_no');
		$this->setDataLang('text_style_basic_rectangle');
		$this->setDataLang('text_style_oval');
		$this->setDataLang('text_style_double_rectangle');
		$this->setDataLang('text_style_double_oval');
		
		//data		
		$this->setData('pco_show_on_category', 1); //false
		$this->setData('pco_list_color_selector_width', 12);
		$this->setData('pco_list_color_selector_height', 12);
		$this->setData('pco_product_color_selector_width', 15);
		$this->setData('pco_product_color_selector_height', 15);
		$this->setData('pco_color_selector_style', '');
		
		$this->data['token'] =  $this->session->data['token'];	
		//END
		
		$this->response->setOutput($this->render());
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/pco')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
	
	public function install()
	{
		$this->load->model('tool/misc_util');
		
		if($this->model_tool_misc_util->existColumn('option_value', 'color_code') == false)
		{
			$query = "ALTER TABLE " . DB_PREFIX . "option_value ";
			$query .= "ADD COLUMN color_code NVARCHAR(100) NOT NULL DEFAULT ''";
					
			$this->db->query($query);
		}
	}
	
	public function uninstall()
	{
		$this->load->model('tool/misc_util');
		
		if($this->model_tool_misc_util->existColumn('option_value', 'color_code') == false)
		{
			$this->model_tool_misc_util->removeColumn('option_value', 'color_code');
		}
	}
}
?>