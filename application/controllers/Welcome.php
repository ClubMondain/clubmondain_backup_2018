<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
	//+++++++++++++++++++++++++++++++++ CONSTRUCTUR CALLING +++++++++++++++++++++++++++++++++++++++
	public function __construct()
	{
		parent::__construct();
	}
	//++++++++++++++++++++++++++++++++++++++ INDEX PAGE ++++++++++++++++++++++++++++++++++
	public function index($data='')
	{
		if(empty($data)){
		$this->load->view('landingPage');
		}else{
		$msg['message'] = $data;	
		$this->load->view('landingPage',$msg);
		}
	}
	//++++++++++++++++++++++++++++++++++++++ PASSWORD PROTECT ++++++++++++++++++++++++++++++++++
	public function getLoging()
	{
		$mainPassword = 'Welcometoyourhealthyspace!680';
		$get_private_blog_password = $this->security->xss_clean($this->input->post('private_blog_password'));
		if($get_private_blog_password == $mainPassword){
		redirect('Main/index','refresh');	
		}else{
		$msg = 'Wrong Password';	
		$this->index($msg);
		}
	}
	//++++++++++++++++++++++++++++++++++++++ PASSWORD PROTECT ++++++++++++++++++++++++++++++++++

}//END CLASS