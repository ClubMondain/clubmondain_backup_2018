<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller 
{
	private $__get_username;
	private $__get_password;
	private $__data;
	private $__session_details;
	
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function __construct()
{
	parent::__construct();
	$this->load->helper('filter');	
	$this->load->model('Dashboards','dashs');
	
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function index($msg='')
{
	$this->getSessionValidate();
	
	if(!empty($msg)){
	$msgSection['msg'] = $msg;
	$this->load->view('admin/index',$msgSection);
	}else{
	$this->load->view('admin/index');
	}
	

}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getSessionValidate()
{
	$this->__session_details = $this->session->all_userdata();
	if(isset($this->__session_details['admin_login']))
	{
	redirect('Dashboard','refresh');
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function login()
{  	
	$this->getSessionValidate();
	$this->form_validation->set_rules('admin_username', 'Username', 'required');
	$this->form_validation->set_rules('admin_pwd', 'Password', 'required');
if ($this->form_validation->run() == FALSE)
{
	$this->index();
}
else
{
	$this->__get_username = $this->input->post('admin_username',true);
	$this->__get_password = $this->input->post('admin_pwd',true);
	$this->__get_username = trimData($this->__get_username);
	$this->__get_username = stripslashesData($this->__get_username);
	$this->__get_username = escape_str($this->__get_username);
	$this->__get_username = $this->security->xss_clean($this->__get_username);
	$this->__get_password = trimData($this->__get_password);
	$this->__get_password = stripslashesData($this->__get_password);
	$this->__get_password = escape_str($this->__get_password);
	$this->__get_password = $this->security->xss_clean($this->__get_password);
	
	$this->__data = $this->dashs->loginAdmins(USER,$this->__get_username,$this->__get_password);

	
	if($this->__data == false){
	$msg = 'Invalid Username and Password';	
	$this->index($msg);
	}else{
	$this->__session_details  = $this->dashs->get_admin_details(USER_DETAILS,$this->__data[0]['user_id']);	
	$this->session->set_userdata('admin_details',$this->__session_details);	
	$this->session->set_userdata('admin_login', 'YES');	
	redirect('Dashboard','refresh');
	}
	}
} 
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
public function logOut()
{
	$this->session->sess_destroy();
	redirect('admin','refresh');
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
}

