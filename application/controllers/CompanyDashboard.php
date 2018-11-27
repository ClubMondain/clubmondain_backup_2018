<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class CompanyDashboard extends CI_Controller {
	private $__username;
	private $__password;
	private $__email;
	private $__data;
	private $__sessionData;
	private $__session_details;
	private $__session_trainer_details;
	private $__all_data;
	private $__profile_data;
//+++++++++++++++++++++++++++++++++ CONSTRUCTUR CALLING +++++++++++++++++++++++++++++++++++++++
public function __construct()
{
	parent::__construct();
	$this->getSessionValidate();
	$this->load->helper('filter');
	$this->load->helper('country');
	$this->load->model('Users','urs'); //Replace the Users Model Name
	$this->load->model('Dashboards','dashs'); //Replace the Dashboard Model Name
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
public function getSessionValidate()
{
	if($this->session->userdata('user_type') != 'C')
	{
		redirect('Main','refresh');	
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function index($msg='')
{
	$user_id = $this->session->userdata('user_id');
	if(isset($membership))
	{
		redirect('Userdashboard/membership','refresh');
	}
	$listdata['all_business'] = $this->urs->getFullDetails(BUSINESS,'user_id',$user_id,'business_id');
	$listdata['all_events'] = $this->urs->getFullDetails(VIEW_EVENT,'user_id',$user_id,'event_id');
	$listdata['full_profile'] = $this->urs->getUserDetails(USER_DETAILS,USER,'email',$user_id);	$listdata['catdata'] = $this->urs->getCountryDetails(CATEGORY,'category_id');
	$listdata['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');
	$listdata['city'] = $this->urs->getCountryDetails(CITY,'city_id');
	$listdata['count_event'] = count($listdata['all_events']);
	$this->session->set_userdata('user_details',$listdata['full_profile']);
	$listdata['fav_city'] = $this->urs->getFavCitys(CITY,PIVOT_FEB_CITY,'city_id',$this->session->userdata('user_id'));
	$listdata['my_blog'] = $this->dashs->get_blog_full_admin(BLOG_NEWS,COUNTRY,CITY,$this->session->userdata('user_id'));
	$listdata['all_meetup'] = $this->get_meet_up_data();
	$listdata['all_fav_events'] = array();
	$this->load->view('dashboard/dashboard',$listdata);	
}
//++++++++++++++++++++++++++++++++++++++ GET ALL MEET UP DATA ++++++++++++++++++++++++++++++++++
public function get_meet_up_data()
{
	// Meet Up Calculationm	
	$user_address = $this->urs->getFullDetails(ADDRESS,'user_id',$this->session->userdata('user_id'),'address_id');
	return $this->urs->getDetailsbyLimitCount(MEET_UP,$user_address[0]['city_id'],'city_id','status','meet_up_id');
	
}
//+++++++++++++++++++++++++++++++++++++++ SPECIFIC Member EDIT Event +++++++++++++++++++++++//	
public function edit_Profile($msg='',$msg_class='')
{
	if(!empty($msg))
	{
	$msgSection['msg'] = $msg;
	$msgSection['msg_class']= $msg_class;
	}
	$user_id = $this->session->userdata('user_id');
	$msgSection['full_profile'] = $this->urs->get_address_details(ADDRESS,COUNTRY,CITY,USER_DETAILS,USER,$user_id);
	$msgSection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');
	$msgSection['city'] = $this->urs->getCountryDetails(CITY,'city_id');
	$msgSection['catdata'] = $this->urs->getFullDetails(CATEGORY,'category_type','event','category_id');
	$msgSection['opening_hour'] = $this->urs->getFullUserDetails(OPENING_HOUR,$user_id,'company_business_id');
	$msgSection['all_meetup'] = $this->get_meet_up_data();
	$this->load->view('company/profile-update-form',$msgSection);
}
//+++++++++++++++++++++++++++++++++++++++ PERSONAL TRAINER UPDATE +++++++++++++++++++++++//
public function update_company_reg()
{
	$user_id = $this->session->userdata('user_id');
	$this->getSessionValidate();
	$this->form_validation->set_rules('company_name','Company Name','required');
	$this->form_validation->set_rules('company_c_person','Contact Person Name','required');
	$this->form_validation->set_rules('company_email','Company Email','required');
	$this->form_validation->set_rules('company_about_us[]','Company About Us','required');
	$this->form_validation->set_rules('company_privacy_policy','Privacy Policy','required');
	$this->form_validation->set_rules('company_membership_rule','Membership Rules','required');
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msgclass = 'alert-danger';
		$this->edit_Profile($msg,$msgclass);	
	}
	else
	{
		$post_data = $this->input->post();
		if(count($post_data)> 0)
		{
		 $company_name = $post_data['company_name'];
		 $company_c_person = $post_data['company_c_person'];
		 $company_email = $post_data['company_email'];
		 $company_phone = $post_data['company_phone'];
		 $company_street = $post_data['company_street'];
		 $company_street2 = $post_data['company_street2'];
		 $city_id = $post_data['city'];
		 $company_state = $post_data['company_state'];
		 $company_postal_code = $post_data['company_postal_code'];
		 $country_id = $post_data['country'];
		 $company_description = $post_data['company_description'];
		 $update_date =  date("Y-m-d");
		 $company_about_us = $post_data['company_about_us'];
		 if(isset( $company_about_us)){
		 $company_about_us = implode(',',$company_about_us);}
		 $company_membership_rule = $post_data['company_membership_rule'];
		 $company_privacy_policy = $post_data['company_privacy_policy'];
		 $url = urlToDomain($post_data['user_facebook']);
		 $user_facebook = 'http://'.$url;
		 $url = urlToDomain($post_data['user_instagram']);
		 $user_instagram = 'http://'.$url;
		 $url = urlToDomain($post_data['user_twitter']);
		 $user_twitter = 'http://'.$url;
		 if(isset($company_membership_rule))
		 {$company_membership_rule = 1;}
		 else{$company_membership_rule = '';}
		 if(isset($company_privacy_policy))
		 {$company_privacy_policy = 1;}
		 else{$company_privacy_policy = '';}
		/*Picture Upload*/
		$get_profile_pic_file_name_1 = $_FILES['company_pic']['name'];
		///////////////////////// GET OLD IMAGE /////////////////////////////
			$old_image = $this->urs->getFullNameDetails(USER_DETAILS,'user_image','user_id',$user_id);
			$old_image = $old_image[0]['user_image'];
		if(isset($get_profile_pic_file_name_1) && !empty($get_profile_pic_file_name_1))
		{
			$time = time();
			$path = "./upload/profile/";	
			$get_profile_pic_temp_name_1 = $_FILES['company_pic']['tmp_name'];    
			$get_profile_pic_file_type_1 = $_FILES['company_pic']['type'];    
			$get_profile_pic_file_erro_1 = $_FILES['company_pic']['error'];
			$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;   
			$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1; 
		
				// DELETE PREVIOUS IMAGE ///
				unlink("upload/profile/".$old_image);
				// End Image Deleted //
				move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
		}
		else{
				
				$get_profile_pic_modi_name_1 = $old_image;
			}
		/*For User Insertion*/
		$this->__alldata = array(
			'email' => $company_email,
			'update_date' => $update_date,				
			);	
		$last_insert_data = $this->urs->UpdateAllDatas($this->__alldata,$user_id,USER);
		if(!empty($last_insert_data))
		{
			/*For User-Details Insertion*/	
			$this->__alldata = array(
			'user_id'			  =>$user_id,
			'company_name'		  => $company_name,
			'company_person'	  => $company_c_person,
			'phone'				  => $company_phone,		
			'company_description' => $company_description,
			'user_image'		  =>$get_profile_pic_modi_name_1,
			'about_us' 			  => $company_about_us,
			'user_facebook' 	  => $user_facebook,
			'user_instagram' 	  => $user_instagram,
			'user_twitter' 	 	  => $user_twitter,
			'membership_rules' 	  => $company_membership_rule,
			'privacy_policy' 	  =>$company_privacy_policy,
			'update_date' 		  => $update_date,
			);		
			$details_insert_data = $this->urs->UpdateAllDatas($this->__alldata,$user_id,USER_DETAILS);	
			}
			if(!empty($details_insert_data))
			{
				/*For Address Insertion*/
				$this->__alldata = array(
				'user_id' 			=> $user_id,
				'street_address_1' 	=> $company_street,
				'street_address_2' 	=> $company_street2,
				'city_id' 			=> $city_id,				
				'state' 			=> $company_state,
				'postal_code' 		=> $company_postal_code,
				'country_id' 		=> $country_id,
				);
				$last_address_id = $this->urs->UpdateAllDatas($this->__alldata,$user_id,ADDRESS);
			}
			if(!empty($last_insert_data))
			{
			/***************************Opening Hours**********************************/
			$listdata = $this->urs->getFullUserDetails(OPENING_HOUR,$user_id,'company_business_id');
			for($i=0;$i<7;$i++){
		  $opening_hour_id 		= $listdata[$i]['opening_hour_id'];
		  $opening_hour_day 	= $post_data['day_name'][$i];
		  $from_opening_hour 	= !empty($post_data['from_opening_hour'][$i]) ? $post_data['from_opening_hour'][$i] : 0;
		  $from_opening_mint 	= !empty($post_data['from_opening_mint'][$i]) ? $post_data['from_opening_mint'][$i] : 0;
		  $from_opening_indication = !empty($post_data['from_opening_indication'][$i]) ? $post_data['from_opening_indication'][$i] : 0;
		  $to_opening_hour = !empty($post_data['to_opening_hour'][$i]) ? $post_data['to_opening_hour'][$i] : 0;
		  $to_opening_mint = !empty($post_data['to_opening_mint'][$i]) ? $post_data['to_opening_mint'][$i] : 0;
		  $to_opening_indication = !empty($post_data['to_opening_indication'][$i]) ? $post_data['to_opening_indication'][$i] : 0;
		  if(isset($post_data['opening_hour_close'][$i]) && !empty($post_data['opening_hour_close'][$i]) ){
			 $opening_hour_close = $post_data['opening_hour_close'][$i];
		  }
		  else{
			$opening_hour_close = 0;
		  }		
		  if(isset($post_data['from_opening_hour'][$i]) && ($post_data['from_opening_hour'][$i] != '') ){  
			$from_hour = $from_opening_hour.'-'.$from_opening_mint.'-'.$from_opening_indication; 
		  }
		  else{
				$from_hour = 0;
			  }
		  if(isset($post_data['to_opening_hour'][$i]) && ($post_data['to_opening_hour'][$i]!= '') ){ 
			$to_hour = $to_opening_hour.'-'.$to_opening_mint.'-'.$to_opening_indication;
		  }
		   else{
				$to_hour = 0;
			  }
		 $this->__alldata = array(
		 'company_business_id'	=>$user_id,
		 'opening_hour_day'		=>$opening_hour_day,
		 'opening_hour_from'	=>$from_hour,
		 'opening_hour_to'		=>$to_hour,
		 'opening_hour_close'	=>$opening_hour_close,
		 'opening_hour_type'	=>1);
		 $update_opening_data = $this->urs->UpdateDatas($this->__alldata,$opening_hour_id,OPENING_HOUR,'opening_hour_id');
		 }
	  /*************************************End Opening Hours***************************************/	
			} 
		else
		{
			$msg = 'Company Data Not Inserted';
			$msgclass = 'alert-danger';
			$this->edit_Profile($msg,$msgclass);
		}
  }
  redirect('Main/redirect_specific_user','refresh');
}
}
//+++++++++++++++++++++++++++++++++++++++ LIST VIEW FULL PROFILE +++++++++++++++++++++++++++++++++//	
public function profile_view($msg='',$msg_class='')
{
	$user_id = $this->session->userdata('user_details');
	$field_name = 'company_id_FK';
	$listdata['all_events']= $this->urs->get_city_country_details(EVENT,CITY,COUNTRY,'event_city_FK','event_country_FK',$field_name,$user_id[0]['id']);
	$listdata['all_data']= $this->urs->get_city_country_details(BUSINESS,CITY,COUNTRY,'business_city_FK','business_country_FK',$field_name,$user_id[0]['id']);
	$listdata['all_profile_data'] = $this->urs->getFullDetails(COMPANY,'id',$user_id[0]['id']);
	$this->load->view('dashboard/user-profile',$listdata);
}
}