<?php
class ControllerModulemanageorder extends Controller {
	private $error = array(); 

	public function index() {  
		$this->load->language('module/manageorder');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('manageorder', $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$this->redirect(HTTPS_SERVER . 'index.php?route=extension/module&token=' . $this->session->data['token']);
		}

		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');

		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['token'] = $this->session->data['token'];
		
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

  		$breadcrumbs = array();
   		$breadcrumbs[] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => HTTPS_SERVER . 'index.php?route=common/home&token=' . $this->session->data['token'],
      		'separator' => false

   		);

   		$breadcrumbs[] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => HTTPS_SERVER . 'index.php?route=extension/module&token=' . $this->session->data['token'],
      		'separator' => ' :: '
   		);

   		$breadcrumbs[] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => HTTPS_SERVER . 'index.php?route=module/manageorder&token=' . $this->session->data['token'],
      		'separator' => ' :: '
   		);
		
		if(substr(VERSION, 0, 3)=='1.4'){
			$this->document->breadcrumbs = $breadcrumbs;
		} elseif(substr(VERSION, 0, 3)=='1.5') {
			$this->data['breadcrumbs'] = $breadcrumbs;
		}
		if (isset($this->request->post['manageorder_status'])) {
			$this->data['manageorder_status'] = $this->request->post['manageorder_status'];
		} else {
			$this->data['manageorder_status'] = $this->config->get('manageorder_status');
		}

		$this->data['action'] = HTTPS_SERVER . 'index.php?route=module/manageorder&token=' . $this->session->data['token'];
		$this->data['cancel'] = HTTPS_SERVER . 'index.php?route=extension/module&token=' . $this->session->data['token'];

		$this->template = 'module/manageorder.tpl';

		$this->children = array(
			'common/header',	
			'common/footer'	
		);
		
		if(substr(VERSION, 0, 3)=='1.4'){
			$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
		} elseif(substr(VERSION, 0, 3)=='1.5') {
			$this->response->setOutput($this->render());
		}
		

	}
	
	private function validate() {

		if (!$this->user->hasPermission('modify', 'module/manageorder')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
	
	
	public function install(){
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "order_status` LIKE 'comment'");
		if(!$query->num_rows){
			$this->db->query("ALTER TABLE `" . DB_PREFIX . "order_status` ADD `comment` text COLLATE utf8_bin NOT NULL;");
		}
		$this->load->model('user/user_group');
		
		$this->model_user_user_group->addPermission($this->user->getId(), 'access', 'sale/manageorder');
		$this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'sale/manageorder');
	}
}

?>