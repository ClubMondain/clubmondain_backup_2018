<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Paypal extends CI_Controller 
{
	private $__data;
	
	 function  __construct()
	 {
		parent::__construct();
		$this->load->library('paypal_lib');
		$this->load->model('Users','urs'); //Replace the Users Model Name
		$this->load->model('Dashboards','dashs'); //Replace the Dashboard Model Name
		$this->load->model('EnergiserData','energiserdata');
	 }
	 
	 function success()
	 {
		$paypalInfo = $this->input->post();
		if(!empty($paypalInfo['item_name'])){
		$getPaymentDetails = explode('_',$paypalInfo['item_name']);	
		}
		if($getPaymentDetails[3] == 'tranning-class')
		{
		$data['user_id'] = $getPaymentDetails[0];
		$data['event_id'] = $getPaymentDetails[1];
		$data['trainer_class_id'] = $getPaymentDetails[2];
		$data['amount'] = $paypalInfo['payment_gross'];
		$data['st'] = $paypalInfo['payment_status'];
		$data['tx'] = $paypalInfo['txn_id'];
		$this->__all_data = array
		(
			'user_id'=>$data['user_id'],
			'trainer_class_id'=>$data['trainer_class_id'],
			'create_date'=>date('Y m d')
		);	
		$get_return_status = $this->urs->InsertDatas(PIVOT_JOIN_CLASS,$this->__all_data);
		if($get_return_status)
		{
		$dataArray['user_id'] = $data['user_id'];
		$dataArray['pivot_unique_id'] = $data['trainer_class_id'];	
		$dataArray['payment_gross'] = $data['amount'];	
		$dataArray['payment_status'] = $data['st'];	
		$dataArray['txn_id'] = $data['tx'];	
		$dataArray['payment_type'] = $getPaymentDetails[3];	
		$get_return_status = $this->urs->InsertDatas('payments',$dataArray);	
		redirect('Home/trainer-details-classes/'.base64_encode($data['trainer_class_id']),'refresh');
		}
		}
        //$this->load->view('paypal/success', $data);
	 }


	 function shoping_success()
	 {
		$paypalInfo = $this->input->post();
		if(!empty($paypalInfo['item_name']))
		{
		$getPaymentDetails = explode('_',$paypalInfo['item_name']);	
		}else{
		$getPaymentDetails = array();	
		}
		if($getPaymentDetails[2] == 'shop'){
		$dataArray['user_id'] = $getPaymentDetails[0];
		$dataArray['payment_gross'] = $paypalInfo['payment_gross'];	
		$dataArray['payment_status'] = $paypalInfo['payment_status'];	
		$dataArray['txn_id'] = $paypalInfo['txn_id'];	
		$dataArray['payment_type'] = $getPaymentDetails[2];	
		$get_return_status = $this->urs->InsertDatas('payments',$dataArray);	
		$data['status'] = 'Purchase';	
		$data['payment_id'] = $get_return_status;	
		$this->urs->UpdateDatas($data,$getPaymentDetails[1],'user_order','order_id');
		$this->cart->destroy();
		redirect('Home/shop/','refresh');
		}
        
	 }
	 
	 function shoping_member()
	 {
		$paypalInfo = $this->input->post();
		if(!empty($paypalInfo['item_name']))
		{
		$getPaymentDetails = explode('_',$paypalInfo['item_name']);	
		}else{
		$getPaymentDetails = array();	
		}
		if($getPaymentDetails[1] == 'membership'){
		$data['status'] = 'Active';	
		$this->urs->UpdateDatas($data,$getPaymentDetails[0],'cmd_user','user_id');
		$dataArray['user_id'] = $getPaymentDetails[0];
		$dataArray['payment_gross'] = $paypalInfo['payment_gross'];	
		$dataArray['payment_status'] = $paypalInfo['payment_status'];	
		$dataArray['txn_id'] = $paypalInfo['txn_id'];	
		$dataArray['payment_type'] = $getPaymentDetails[1];	
		$get_return_status = $this->urs->InsertDatas('payments',$dataArray);	
		$this->login_member_after_payment($getPaymentDetails[0]);
		redirect('Home','refresh');
		}
        
	 }

	 function shoping_company()
	 {
		$paypalInfo = $this->input->post();
		if(!empty($paypalInfo['item_name']))
		{
		$getPaymentDetails = explode('_',$paypalInfo['item_name']);	
		}else{
		$getPaymentDetails = array();	
		}
		if($getPaymentDetails[1] == 'membership'){
		$data['status'] = 'Active';	
		$this->urs->UpdateDatas($data,$getPaymentDetails[0],'cmd_user','user_id');
		$dataArray['user_id'] = $getPaymentDetails[0];
		$dataArray['payment_gross'] = $paypalInfo['payment_gross'];	
		$dataArray['payment_status'] = $paypalInfo['payment_status'];	
		$dataArray['txn_id'] = $paypalInfo['txn_id'];	
		$dataArray['payment_type'] = $getPaymentDetails[1];	
		$get_return_status = $this->urs->InsertDatas('payments',$dataArray);	
		$this->login_company_after_payment($getPaymentDetails[0]);
		}
        
	 }

	 function shoping_trainer()
	 {
		$paypalInfo = $this->input->post();
		if(!empty($paypalInfo['item_name']))
		{
		$getPaymentDetails = explode('_',$paypalInfo['item_name']);	
		}else{
		$getPaymentDetails = array();	
		}
		if($getPaymentDetails[1] == 'membership'){
		$dataArray['user_id'] = $getPaymentDetails[0];
		$dataArray['payment_gross'] = $paypalInfo['payment_gross'];	
		$dataArray['payment_status'] = $paypalInfo['payment_status'];	
		$dataArray['txn_id'] = $paypalInfo['txn_id'];	
		$dataArray['payment_type'] = $getPaymentDetails[1];	
		$get_return_status = $this->urs->InsertDatas('payments',$dataArray);	
		
		$msg 	  = 'Trainer Data Successfull';
		$msgclass = 'alert-success';	
		$this->__alldata = $this->urs->getFullUserDetails(USER,$getPaymentDetails[0],'user_id');//GETTING DATA FROM VIEW
		$this->session->set_userdata('user_id',$last_insert_data);
		redirect('Home/success','refresh');

		}
        
	 }

	public function login_member_after_payment($last_insert_data ='')
	{
		$this->__data = $this->urs->getFullUserDetails(USER,$last_insert_data,'user_id');
		$this->__email = $this->__data[0]['email'];
		$this->__password = $this->__data[0]['password'];
		$this->__email = trimData($this->__email);
		$this->__email = stripslashesData($this->__email);
		$this->__password = trimData($this->__password);
		$this->__password = stripslashesData($this->__password);
		$this->__data = $this->urs->loginUsers(USER,$this->__email,$this->__password);
		if($this->__data == FALSE){
		redirect('Home','refresh');
		}else{	
		$this->session->set_userdata('user_login', 'YES');
		$this->session->set_userdata('user_type', 'M');
		$this->session->set_userdata('user_id',$last_insert_data);
		redirect('UserDashboard','refresh');
		}
	}

	public function login_company_after_payment($last_insert_data ='')
	{
		$this->__data = $this->urs->getFullUserDetails(USER,$last_insert_data,'user_id');
		$this->__email = $this->__data[0]['email'];
		$this->__password = $this->__data[0]['password'];
		$this->__email = trimData($this->__email);
		$this->__email = stripslashesData($this->__email);
		$this->__password = trimData($this->__password);
		$this->__password = stripslashesData($this->__password);
		$this->__data = $this->urs->loginUsers(USER,$this->__email,$this->__password);
		if($this->__data == FALSE){
		redirect('Home','refresh');
		}else{	
		$this->session->set_userdata('user_login', 'YES');
		$this->session->set_userdata('user_type', 'C');
		$this->session->set_userdata('user_id',$last_insert_data);
		redirect('CompanyDashboard','refresh');
		}
	}

	public function upgrate_membership_level()
	{
		//$paypalInfo = $this->input->get();
		//print_r($paypalInfo);
		$paypalInfo = $this->input->post();
		//echo "<pre>";
		//print_r($paypalInfo);
		//die();	
		if(!empty($paypalInfo['item_name']))
		{
		$getPaymentDetails = explode('_',$paypalInfo['item_name']);	
		$data['membership_id'] = $getPaymentDetails[1];	
		$this->urs->UpdateDatas($data,$getPaymentDetails[0],'cmd_user_details','user_id');
		$dataArray['user_id'] = $getPaymentDetails[0];
		$dataArray['payment_gross'] = $paypalInfo['payment_gross'];	
		$dataArray['payment_status'] = $paypalInfo['payment_status'];	
		$dataArray['txn_id'] = $paypalInfo['txn_id'];	
		$dataArray['payment_type'] = 'membership';	
		$get_return_status = $this->urs->InsertDatas('payments',$dataArray);	
		redirect('Main');
		}else{
		redirect('Main');
		}
	}

	public function energiser_payment_success()
	{
		$paypalInfo = $this->input->post();		
		$user_id = $this->session->userdata('user_id');
		$energizer_id = $this->session->userdata('energizer_id');
		
		if($paypalInfo['payment_status'] == 'Completed')
		{
			$data = array('user_id' =>$user_id,'trainer_class_id'  => $energizer_id);
			$register_energizer = $this->energiserdata->register_energizer(JOIN_US_ENERGIZER,$data);
			if(!empty($register_energizer))
			{
				$success_msg = 'You are successfullly registered to this Energizer';
				$msg_class = 'alert alert-success';				
				$this->session->set_flashdata('success_msg', $success_msg);
				$this->session->set_flashdata('msg_class', $msg_class);
				redirect('Home/energiser_details/'.$energizer_id,'refresh');
			}
		}
		else{
				$success_msg = 'Your Payment is not Success ! Please Try Agian';
				$msg_class = 'alert alert-danger';				
				$this->session->set_flashdata('success_msg', $success_msg);
				$this->session->set_flashdata('msg_class', $msg_class);
				redirect('Home/energiser_details/'.$energizer_id,'refresh');
		}
		
		
	}
	
	
	public function private_energiser_payment_success()
	{
		$paypalInfo = $this->input->post();		
		$user_id = $this->session->userdata('user_id');
		$space_id = $this->session->userdata('space_id');
		$energizer_id = $this->session->userdata('energizer_id');
		$user_mail = $this->session->userdata('user_mail');
		$csv_id = $this->session->userdata('csv_id');
		
		if($paypalInfo['payment_status'] == 'Completed')
		{
			$data = array('user_id' =>$user_id,'trainer_class_id'  => $energizer_id);
			$register_energizer = $this->energiserdata->register_energizer(JOIN_US_ENERGIZER,$data);
			if(!empty($register_energizer))
			{
				$success_msg = 'You are successfullly registered to this Energizer';
				$msg_class = 'alert alert-success';				
				$this->session->set_flashdata('success_msg', $success_msg);
				$this->session->set_flashdata('msg_class', $msg_class);
				redirect('Energiser/energiser_details/'.$space_id.'/'.$energizer_id.'/'.$user_id.'/'.$user_mail.'/'.$csv_id,'refresh');
			}
		}
		else{
				$success_msg = 'Your Payment is not Success ! Please Try Agian';
				$msg_class = 'alert alert-danger';				
				$this->session->set_flashdata('success_msg', $success_msg);
				$this->session->set_flashdata('msg_class', $msg_class);
				redirect('Energiser/energiser_details/'.$space_id.'/'.$energizer_id.'/'.$user_id.'/'.$user_mail.'/'.$csv_id,'refresh');
				
		}
		
		
	}
	
	
	
	
	

	public function cancel()
	{
        $this->load->view('paypal/cancel');
	}
	 
	public function ipn()
	{
		
    }
}