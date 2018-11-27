<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CheckUser extends CI_Controller {
	private $__username;
	private $__password;
	private $__email;
	private $__data;
	private $__session_user_Data;
	private $__session_user_details;
	private $__session_trainer_details;
	private $__alldata;
	private $__trainerdata;
	private $__companydata;
//+++++++++++++++++++++++++++++++++ CONSTRUCTUR CALLING ++++++++++++++++++
public function __construct()
{
	parent::__construct();
	//$this->load->library('facebook');
	$this->load->helper('filter');
	$this->load->helper('data');
	$this->load->helper('country');
	$this->load->model('Users','urs');
	$this->load->model('Dashboards','dashs');
	$this->load->model('EnergiserData','energiserdata'); //Replace the Users Model Name
	$this->load->model('Dashboards','dashs'); //Replace the Dashboard Model Name
}
//++++++++++++++++++++++++++++++++++++++ INDEX PAGE ++++++++++++++++++++++++++++++++++

public function registered($space_id,$user_mail,$csv_id){
	
			/*echo base64_decode($space_id);
			
			echo "<br>";
			
			echo base64_decode($user_mail);
			
			echo "<br>";
			
			echo base64_decode($csv_id);
						
			exit;*/		
		
		$energizer_url= base_url(uri_string());
		$this->session->set_userdata("energizer_url",$energizer_url); ///URL SESSION SET FOR REDIRECTION////
	
		$mailid = base64_decode($user_mail);
		$check_user_exist = $this->energiserdata->getUserexist($mailid);
	
		if(isset($_SESSION['user_login']))
		{
			redirect('Energiser/invite_space_details/'.$space_id.'/'.$user_mail.'/'.$csv_id,  'refresh');
		}
		
		
		if($check_user_exist == 0)
		{
			$this->session->set_userdata("check_usr",1);
			redirect('Home','refresh');
		}
		if($check_user_exist == 1 && empty($_SESSION['user_login']) )
		{			
			$this->session->set_userdata("check_usr",2);
			redirect('Home','refresh');
		}
	}


}//END CLASS
