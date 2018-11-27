<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
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
	$this->load->helper('country');
	$this->load->model('Users','urs');
	$this->load->model('Dashboards','dashs');
}
//++++++++++++++++++++++++++++++++++++++ INDEX PAGE ++++++++++++++++++++++++++++++++++
public function index($msg='')
{
	$userData = array();
	// Check if user is logged in
	// if($this->facebook->is_authenticated()){
	// 	// Get user facebook profile details
	// 	$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');
	// 				// Preparing data for database insertion
	// 				$userData['oauth_provider'] = 'facebook';
	// 				$userData['oauth_uid'] = $userProfile['id'];
	// 				$userData['first_name'] = $userProfile['first_name'];
	// 				$userData['last_name'] = $userProfile['last_name'];
	// 				$userData['email'] = $userProfile['email'];
	// 				$userData['gender'] = $userProfile['gender'];
	// 				$userData['locale'] = $userProfile['locale'];
	// 				$userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
	// 				$userData['picture_url'] = $userProfile['picture']['data']['url'];
	// 				// Insert or update user data
	// 				//$userID = $this->user->checkUser($userData);
	// 	// Check user data insert or update status
	// 				if(!empty($userID)){
	// 						$data['userData'] = $userData;
	// 						$this->session->set_userdata('userData',$userData);
	// 				} else {
	// 					 $data['userData'] = array();
	// 				}
	// 	// Get logout URL
	// 	$data['logoutUrl'] = $this->facebook->logout_url();
	// }else{
	// 				$fbuser = '';
	// 	// Get login URL
	// 				$data['authUrl'] = $this->facebook->login_url();
	// 		}
	$data['category_details'] = $this->urs->getAllCategoryList();
	$data['event_details'] = $this->urs->getEventStoreDetailsbylimit(VIEW_EVENT,'event_status','event_id',12);
	$data['store_details'] = $this->urs->getEventStoreDetailsbylimit(VIEW_BUSINESS,'business_status','business_id',12);
	$data['content'] = $this->urs->getTypeDetails(CONTENT,'Home','page_name','content_status','Active');
	$data['user_details'] = $this->urs->getRandUser();
	$data['cd'] = $this->urs->getCountryCityNames(CITY,'city_status','Active');
	$this->load->view('index',$data);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getSessionValidate()
{
	$this->__session_user_details = $this->session->all_userdata();
	if($this->session->userdata('user_login')!='')
	{
		redirect('Main/index','refresh');
	}
}
//++++++++++++++++++++++++++++++++ View Membership ++++++++++++++++++++++++++++++++++++++++// */
public function membership($val = '')
{
	if($val == 'personal_trainer')
	{
		$member_value['trainer'] = $val;
		$member_value['details'] = $this->urs->fetchmembership(MEMBERSHIP,'membership_category_id','Personal_Trainer','membership_id');
	}
	if($val == 'company_profile')
	{
	 $member_value['company'] = $val;
	 $member_value['details'] = $this->urs->fetchmembership(MEMBERSHIP,'membership_category_id','Company','membership_id');
	}
	if($val == '')
	{
		$member_value['user'] = 'member';
		$member_value['details'] = $this->urs->fetchmembership(MEMBERSHIP,'membership_category_id','Business_Traveler','membership_id');
	}
	$this->load->view('membership',$member_value);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
public function membership_details($val = '')
{
	$id = base64_decription($val);
	$membership_details = $this->urs->getFullUserDetails(MEMBERSHIP,$id,'membership_id');
	$membership_category_id = $membership_details[0]['membership_category_id'];
	$member_value['details']= $this->urs->getFullUserDetails(MEMBERSHIP,$membership_category_id,'membership_category_id');
	$this->load->view('membership',$member_value);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
public function our_story()
{
	$data['admin_details'] = $this->dashs->get_admin_setting(SETTING);
	$data['content'] = $this->urs->getTypeDetails(CONTENT,'Story','page_name','content_status','Active');
	$this->load->view('our-mission',$data);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
public function privacy()
{
	$data['admin_details'] = $this->dashs->get_admin_setting(SETTING);
	$data['content'] = $this->urs->getTypeDetails(CONTENT,'CMS','page_name','content_status','Active');
	$this->load->view('privacy',$data);
}
public function membership_ownership()
{
	$data['admin_details'] = $this->dashs->get_admin_setting(SETTING);
	$data['ownership'] = $this->dashs->get_m_for_front(MEMBERSHIP);
	$this->load->view('all_membership',$data);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
public function membershp_rules()
{
	$data['admin_details'] = $this->dashs->get_admin_setting(SETTING);
	$data['content'] = $this->urs->getTypeDetails(CONTENT,'CMS','page_name','content_status','Active');
	$this->load->view('membership_rules',$data);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
public function registration()
{
	$this->getSessionValidate();
	$post_data = $this->input->post();
	if(count($post_data) > 0)
	{
		 $email 		= $this->security->xss_clean(escape_str($post_data['members_email']));
		 $password 		= $this->security->xss_clean(escape_str(md5($post_data['members_password'])));
		 $create_date = date("Y-m-d");
		 $fname 	 	= $this->security->xss_clean(escape_str($post_data['members_fname']));
		 $lname 		= $this->security->xss_clean(escape_str($post_data['members_lname']));
		 $phone 		= $this->security->xss_clean(escape_str($post_data['members_phone']));
	$this->__alldata = array(
			'email' 				=> $email,
			'password' 				=> $password,
			'create_date' 			=> $create_date,
			'update_date' 			=> '',
			'user_type' 			=> 'M',
			'password_reset_token' => '',
			'social' 				=> '',
			'social_id' 			=>'',
			'status'				=>'Inactive',
			'create_date'			=>$create_date,
			);
		$last_insert_data = $this->urs->InsertDatas(USER,$this->__alldata);
		if($last_insert_data){
		$this->__all_data = array(
			'user_id' 		=> $last_insert_data,
			'first_name'	=> $fname,
			'last_name' 	=> $lname,
			'phone' 		=> $phone,
			'create_date'	=>$create_date,
		);
		$get_return_status = $this->urs->InsertDatas(USER_DETAILS,$this->__all_data);
		}
	if($get_return_status != FALSE)
	{
		$this->session->set_userdata('last_id',$last_insert_data);
		echo "SUCCESS";
	}
	else{
		echo 'ERROR';
	}
	}
	else{
		echo'ERROR';
	}
}
//+++++++++++++++++++++++++++++++ USER CHECK USEREMAIL VALIDATION +++++++++++++++++++++++++++++++++++++++++
public function CheckUserEmail()
{
	$this->__email = $this->input->post('email',true);
	if(!empty($this->__email)){
	$username_data = $this->urs->CheckEmails(USER,$this->__email);
	if($username_data == TRUE){
	echo 'SUCCESS';
	}else{
	echo 'ERROR';
	}
	}else{
	echo 'ERROR';
	}
}
//+++++++++++++++++++++++++++++++ ALL USER LOGIN SECTION +++++++++++++++++++++++++++++++++++++++++
public function loginUser()
{
	$this->getSessionValidate();
	$this->__email = $this->input->post('email',true);
	$this->__password = $this->input->post('password',true);
	$this->__email = trimData($this->__email);
	$this->__email = stripslashesData($this->__email);
	$this->__password = trimData($this->__password);
	$this->__password = stripslashesData($this->__password);
	$this->__password = md5($this->__password);
	$this->__data = $this->urs->loginUsers(USER,$this->__email,$this->__password);
			if($this->__data == FALSE)
			{
				echo "ERROR LOGIN";
			}
			else
			{
				if($this->__data[0]['user_id'] == 1)
				{
					echo "ERROR LOGIN";
				}else{
					$dat = get_user_details($this->__data[0]['user_id']);
					if($dat['membership_id'] == 0)
				{
					echo "ERROR LOGIN";
				}else{
				$dat = get_user_details($this->__data[0]['user_id']);
				$gmd = get_member_details($dat['membership_id']);
				$this->session->set_userdata('user_type',$this->__data[0]['user_type']);
				$this->session->set_userdata('user_id',$this->__data[0]['user_id']);
				$this->session->set_userdata('user_login', 'YES');
				$this->session->set_userdata('user_membership_type', $gmd['membership_type']);
				echo "SUCCESS_LOGIN";
					}
				}
			}
}
//##############################################################################################################
//+++++++++++++++++++++++++++++++ TRAINER SECTION +++++++++++++++++++++++++++++++++++++++++
public function member_registration($member_membership_id ='')
{
	$member_membership_id = base64_decription($member_membership_id);
	//$this->getSessionValidate();
	if(isset($member_membership_id) && (!empty($member_membership_id)))
	{
		$this->session->set_userdata('membership_id',$member_membership_id);
		redirect('Home/user_registration','refresh');
	}
		$this->membership('Business_Traveler');
		//$this->load->view('personal-trainer-registration',$msgcontain);
}
//##############################################################################################################
public function user_registration($msg='',$msg_class='')
{
	if(!empty($msg))
	{
		$msgSection['msg'] = $msg;
		$msgSection['msg_class'] = $msg_class;
	}
	$id = $this->session->userdata('last_id');
	if(!empty($id)){
	$msgSection['id'] = $id;
	$msgSection['all_data'] = $this->urs->getUserDetails(USER_DETAILS,USER,'email',$id);
	$msgSection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');
	//$msgSection['catdata'] = $this->urs->getCountryDetails(CATEGORY,'category_id');
	$msgSection['catdata'] = $this->urs->getAllCategoryList();
	$this->load->view('user-registration',$msgSection);
	}else{
	redirect('Home','refresh');
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++ Update User Registration +++++++++++++++++++++++++++++++++//
public function insert_user_registration()
{
	$user_id = $this->session->userdata('last_id');
	$this->form_validation->set_rules('fname', 'First Name','required');
	$this->form_validation->set_rules('lname', 'Last Name','required');
	$this->form_validation->set_rules('email','Email','required|valid_email');
	$this->form_validation->set_rules('dob_year', 'DOB Year','required');
	$this->form_validation->set_rules('dob_month', 'DOB Month','required');
	$this->form_validation->set_rules('dob_date','DOB Date','required');
	$this->form_validation->set_rules('cat_id[]','Category','required|is_natural');
	//$this->form_validation->set_rules('privacy_policy','Privacy Policy','required');
	$this->form_validation->set_rules('membership_rules','Membership Rules','required');
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msgclass = 'alert-danger';
		$this->user_registration($msg,$msgclass);
	}
	else
	{
		$post_data = $this->input->post();
		if(count($post_data) > 1)
		{
	$date_reg 				= date("Y-m-d");
	$fname 					= $this->security->xss_clean(escape_str($post_data['fname']));
	$lname 					= $this->security->xss_clean(escape_str($post_data['lname']));
	$email 					= $this->security->xss_clean(escape_str($post_data['email']));
	$phone 					= $this->security->xss_clean(escape_str($post_data['phone']));
	$street 				= $this->security->xss_clean(escape_str($post_data['street']));
	$country 				= $this->security->xss_clean(escape_str($post_data['country']));
	$dob_year 				= $this->security->xss_clean(escape_str($post_data['dob_year']));
	$dob_month 				= $this->security->xss_clean(escape_str($post_data['dob_month']));
	$dob_date 				= $this->security->xss_clean(escape_str($post_data['dob_date']));
	$dob 					= $dob_year.'-'.$dob_month.'-'.$dob_date;//Concate Daate Of Birth
	$cat_id 				= $this->security->xss_clean(escape_str($post_data['cat_id']));
	$address 				= $this->security->xss_clean(escape_str($post_data['address']));
 $other 					= $this->security->xss_clean(escape_str($post_data['other']));
	$membership_rules 		= $this->security->xss_clean(escape_str($post_data['membership_rules']));
			//$privacy_policy 		= $this->security->xss_clean(escape_str($post_data['privacy_policy']));
			//$field_permision 		= $this->security->xss_clean(escape_str($post_data['field_permision']));
			$field_permision 		= '';
			$member_company_name	= $this->security->xss_clean(escape_str($post_data['member_company_name']));
			$member_function_title	= $this->security->xss_clean(escape_str($post_data['member_function_title']));
			$create_date 			= date("Y-m-d");
			//File Upload
			$time = time();
			$path = "./upload/profile/";
			$get_profile_pic_file_name_1 = $this->security->xss_clean(escape_str($_FILES['profile_pic']['name']));
			$get_profile_pic_temp_name_1 = $_FILES['profile_pic']['tmp_name'];
			$get_profile_pic_file_type_1 = $_FILES['profile_pic']['type'];
			$get_profile_pic_file_erro_1 = $_FILES['profile_pic']['error'];
			$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;
			$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1;
if(!empty($post_data['city'])){
$city_id = $this->security->xss_clean(escape_str($post_data['city']));
}else{
$get_new_city_name = $this->security->xss_clean(escape_str($post_data['new_city']));
if(!empty($get_new_city_name)){
$x['country_id'] = $country;
$x['city_name'] = $get_new_city_name;
$x['city_status'] = 'Active';
$x['type'] = 1;
$new_city_id = $this->urs->InsertDatas(CITY,$x);
$city_id = $new_city_id;
}else{
$city_id = $city_id;
}
}
			///////////////////////// INSERTION IN DATABASE FIELD /////////////////////////////
			if(isset($get_profile_pic_file_name_1) && !empty($get_profile_pic_file_name_1))
			{
				move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
			}
			else{
					$get_profile_pic_modi_name_1 = '';
				}
				$this->__all_data = array(
				'email' 	 => $email,
				'status'	 =>'Active',
				'update_date' => date("Y-m-d")
				);
				$updateData = $this->urs->UpdateAllDatas($this->__all_data,$user_id,USER);
			if(isset($updateData) && !empty($updateData)){
			$this->__all_data = array(
				 'user_id' 				=> $user_id,
				 'first_name' 				=> $fname,
				 'last_name' 				=> $lname,
				 'phone' 					=> $phone,
				 'dob' 					=> $dob,
				 'user_image' 				=> $get_profile_pic_modi_name_1,
				 'member_other' 			=> $other,
				 'membership_rules' 		=> $membership_rules,
				 'privacy_policy' 			=> 1,
				 'membership_id' 			=> $this->session->userdata('membership_id'),
				 'member_company_name' 	=> $member_company_name,
				 'member_function_title' 	=> $member_function_title,
				 'create_date'				=> $create_date
				);
				}
		$updateDetailsData = $this->urs->UpdateAllDatas($this->__all_data,$user_id,USER_DETAILS);
		if(isset($updateDetailsData) && !empty($updateDetailsData)){
		$this->__all_data = array(
				 'user_id' 		 => $user_id,
				 'city_id' 		 => !empty($city_id)? $city_id : 0,
				 'street_address_1' => $street,
				 'country_id' 		 => $country,
				 'street_address_2' => $address,
				 );
		}
		$insertDetailsData = $this->urs->InsertDatas(ADDRESS,$this->__all_data);
		if(isset($updateDetailsData) && !empty($updateDetailsData)){
		$impcategory = '';
			if(!empty ($cat_id)){
				foreach($cat_id as $cat_id){
				$this->__all_data = array(
				'category_id' => $cat_id,
				'user_id' => $user_id
				);
					$insertData = $this->urs->InsertDatas(PIVOT_INTEREST_CATEGORY,$this->__all_data);
				}
			}
		}
		}//END MEMBER UPDATE
		//$this->__alldata = $this->urs->getFullUserDetails(USER,$user_id,'user_id');
		$get_membership_id = $this->session->userdata('membership_id');
			if(!empty($get_membership_id))
			{
				$get_details = $this->dashs->getListDatas('cmd_membership','membership_id',$get_membership_id);
				if($get_details[0]['membership_type'] == 'FREE'){
					$zdata['status'] = 'Active';
					$this->urs->UpdateDatas($zdata,$user_id,'cmd_user','user_id');
					//$this->login_member($user_id);
					//$this->session->set_userdata('user_id',$user_id);
					$msgcontain['msg'] 			= "User Successfully Updated";
					$msgcontain['msgclass'] 	= "alert-success";
					$msgcontain['user_value'] 	= 'member';
					redirect('Home');
				}else{
					$zdata['status'] = 'Inactive';
					$this->urs->UpdateDatas($zdata,$user_id,'cmd_user','user_id');
					//Set variables for paypal form
					$returnURL = base_url().'paypal/shoping_member'; //payment success url
					$cancelURL = base_url().'paypal/cancel'; //payment cancel url
					$notifyURL = base_url().'paypal/ipn'; //ipn url
					//get particular product data
					$item_name = $user_id.'_'.'membership';
					$logo = base_url().'assets/img/x-click-but01.gif';
					$this->paypal_lib->add_field('return', $returnURL);
					$this->paypal_lib->add_field('cancel_return', $cancelURL);
					$this->paypal_lib->add_field('notify_url', $notifyURL);
					$this->paypal_lib->add_field('amount', $get_details[0]['membership_price']);
					$this->paypal_lib->add_field('item_name',$item_name);
					$this->paypal_lib->image($logo);
					$this->paypal_lib->paypal_auto_form();
				}
			}
	}
}
public function upgrade_membership($id='')
{
	$user_id = $this->session->userdata('user_id');
	if(!empty($id) and !empty($user_id)){
	$gd = $this->urs->getFullDetails('cmd_membership','membership_id',$id,'membership_id');
	//Set variables for paypal form
	$returnURL = base_url().'paypal/upgrate_membership_level'; //payment success url
	$cancelURL = base_url().'paypal/cancel'; //payment cancel url
	$notifyURL = base_url().'paypal/ipn'; //ipn url
	//get particular product data
	$item_name = $user_id.'_'.$gd[0]['membership_id'];
	$logo = base_url().'assets/img/x-click-but01.gif';
	$this->paypal_lib->add_field('return', $returnURL);
	$this->paypal_lib->add_field('cancel_return', $cancelURL);
	$this->paypal_lib->add_field('notify_url', $notifyURL);
	$this->paypal_lib->add_field('amount', $gd[0]['membership_price']);
	$this->paypal_lib->add_field('item_name',$item_name);
	$this->paypal_lib->image($logo);
	$this->paypal_lib->paypal_auto_form();
	}else{
	redirect('Main');
	}
}
//+++++++++++++++++++++++++++++++ TRAINER SECTION +++++++++++++++++++++++++++++++++++++++++
public function personal_trainer_reg($trainer_membership_id ='')
{
	$trainer_membership_id = base64_decription($trainer_membership_id);
	$this->getSessionValidate();
	if(isset($trainer_membership_id) && (!empty($trainer_membership_id)))
	{
	$this->session->set_userdata('membership_id',$trainer_membership_id);
	redirect('Home/create_personal_trainer_reg','refresh');
	}
	$this->membership('personal_trainer');
}
//+++++++++++++++++++++++++++++++ TRAINER SECTION +++++++++++++++++++++++++++++++++++++++++
public function create_personal_trainer_reg($msg = '',$msgclass = '')
{
	$this->getSessionValidate();
	if($msg !='')
	{
		$msgcontain['msg'] = $msg;
		$msgcontain['msgclass'] = $msgclass;
	}
		$msgcontain['msg'] = $msg;
		$msgcontain['user_value'] = 'trainer';
		$msgcontain['msgclass'] = $msgclass;
		$msgcontain['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');
		$this->load->view('personal-trainer-registration',$msgcontain);
}
//+++++++++++++++++++++++++++++++ INSERT TRAINER SECTION +++++++++++++++++++++++++++++++++++++++++
public function insert_personal_trainer_reg()
{
	$this->getSessionValidate();
	$this->form_validation->set_rules('fname','First Name','required');
	$this->form_validation->set_rules('lname','Last Name','required');
	$this->form_validation->set_rules('email','Email','required|valid_email|is_unique['.USER.'.email]');
	$this->form_validation->set_rules('password','Password','required');
	$this->form_validation->set_rules('conf_password','Confirm Password','required|matches[password]');
	$this->form_validation->set_rules('dob_year','Year','required');
	$this->form_validation->set_rules('dob_month','Month','required');
	$this->form_validation->set_rules('dob_date','Date','required');
	$this->form_validation->set_rules('about_us[]','About Us','required');
	$this->form_validation->set_rules('privacy_policy','Privacy Policy','required');
	$this->form_validation->set_rules('membership_rule','Membership Rules','required');
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msgclass = 'alert-danger';
		$this->create_personal_trainer_reg($msg,$msgclass);
	}
	else
	{
		$post_data = $this->input->post();
		if(count($post_data)> 0)
		{
			 $fname 			= $this->security->xss_clean(escape_str($post_data['fname']));
			 $lname 			= $this->security->xss_clean(escape_str($post_data['lname']));
			 $email 			= $this->security->xss_clean(escape_str($post_data['email']));
			 $phone 			= $this->security->xss_clean(escape_str($post_data['phone']));
			 $create_date 		= date("Y-m-d");
			 $password 			= md5($this->security->xss_clean(escape_str($post_data['password'])));
			 $status 			= 'Inactive';
			 $trainer_type 		= 'Free';
			 $dob_date 			= $this->security->xss_clean(escape_str($post_data['dob_date']));
			 $dob_month 		= $this->security->xss_clean(escape_str($post_data['dob_month']));
			 $dob_year 			= $this->security->xss_clean(escape_str($post_data['dob_year']));
			 $dob 				= $dob_year.'-'.$dob_month.'-'.$dob_date;
			 $street_adr		= $this->security->xss_clean(escape_str($post_data['street_adr']));
			 $street_adr2		= $this->security->xss_clean(escape_str($post_data['street_adr2']));
			 //$city_id		 = $this->security->xss_clean(escape_str($post_data['city']));
if(!empty($post_data['city'])){
$city_id = $this->security->xss_clean(escape_str($post_data['city']));
}else{
$city_id = '';
}
			 $state 			= $this->security->xss_clean(escape_str($post_data['state']));
			 $postal_code 	 = $this->security->xss_clean(escape_str($post_data['postal_code']));
			 $country_id		= $this->security->xss_clean(escape_str($post_data['country']));
			 $about_yourself	= $this->security->xss_clean(escape_str($post_data['about_yourself']));
			 $experience		= $this->security->xss_clean(escape_str($post_data['experience']));
			 $about_us 			= $this->security->xss_clean(escape_str($post_data['about_us']));
			 if(isset( $about_us)){
			 $about_us = implode(',',$about_us);}
			 $membership_rule = $this->security->xss_clean(escape_str($post_data['membership_rule']));
			 $privacy_policy = $this->security->xss_clean(escape_str($post_data['privacy_policy']));
			if(isset($membership_rule))
			{$membership_rule 	= 1;}
			else{$membership_rule = '';}
			if(isset($privacy_policy))
			{$privacy_policy	 = 1;}
			else{$privacy_policy = '';}
			if(empty($city_id))
			{
			$get_new_city_name = $this->security->xss_clean(escape_str($post_data['new_city']));
			if(!empty($get_new_city_name)){
			$x['country_id'] = $country_id;
			$x['city_name'] = $get_new_city_name;
			$x['city_status'] = 'Active';
			$x['type'] = 1;
			$new_city_id = $this->urs->InsertDatas(CITY,$x);
			$city_id = $new_city_id;
			}else{
			$city_id = $city_id;
			}
			}
			/*Picture Upload*/
			$time 	= time();
			$path	= "./upload/profile/";
			$get_profile_pic_file_name_1 = $this->security->xss_clean(escape_str($_FILES['photo']['name']));
			$get_profile_pic_temp_name_1 = $_FILES['photo']['tmp_name'];
			$get_profile_pic_file_type_1 = $_FILES['photo']['type'];
			$get_profile_pic_file_erro_1 = $_FILES['photo']['error'];
			$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;
			$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1;
			/*For User Insertion*/
			$this->__alldata = array(
				'email'				 => $email,
				'password'			 => $password,
				'create_date' 		 => $create_date,
				'update_date'		 => $create_date,
				'user_type' 		 => 'T',
				'password_reset_token' => '',
				'social'			 => '',
				'social_id'			 =>'',
				'status'=>$status,);
			$last_insert_data = $this->urs->InsertDatas(USER,$this->__alldata);
			if(!empty($last_insert_data))
			{
				if(isset($get_profile_pic_file_name_1) && !empty($get_profile_pic_file_name_1))
				{
					$user_pic_upload = move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
				}
				else
				{
					$get_profile_pic_modi_name_1 = '';
				}
				/*For User-Details Insertion*/
				$this->__alldata = array(
					'user_id' 				 => $last_insert_data,
					'first_name'			 => $fname,
					'last_name'				 => $lname,
					'phone' 				 => $phone,
					'user_image' 			 => $get_profile_pic_modi_name_1,
					'membership_id' 		 => $this->session->userdata('membership_id'),
					'dob' 					 => $dob,
					'trainer_experience' 	 => $experience,
					'trainer_about_yourself' => $about_yourself,
					'about_us' 				 => $about_us,
					'membership_rules' 		 => $membership_rule,
					'privacy_policy' 		 => $privacy_policy,
					'create_date'			 => $create_date,
					'update_date' 			 => $create_date,
					);
			}
			 $detail_insert_data = $this->urs->InsertDatas(USER_DETAILS,$this->__alldata);
			if(!empty($detail_insert_data))
			{
				/*For Address Insertion*/
				$this->__alldata = array(
					'user_id'	 	 => $last_insert_data,
					'street_address_1' => $street_adr,
					'street_address_2' => $street_adr2,
					'city_id' 		 => $city_id,
					'state' 		 => $state,
					'postal_code' 	 => $postal_code,
					'country_id' 	 => $country_id,
					);
				$address_insert_data = $this->urs->InsertDatas(ADDRESS,$this->__alldata);
			}
			if(!empty($address_insert_data))
			{
				$get_membership_id = $this->session->userdata('membership_id');
				if(!empty($get_membership_id))
			{
				$get_details = $this->dashs->getListDatas('cmd_membership','membership_id',$get_membership_id);
				if($get_details[0]['membership_type'] == 'FREE'){
				$msg 	 = 'Trainer Data Successfull';
				$msgclass = 'alert-success';
				$this->__alldata = $this->urs->getFullUserDetails(USER,$last_insert_data,'user_id');//GETTING DATA FROM VIEW
				$this->session->set_userdata('user_id',$last_insert_data);
				redirect('Home/success','refresh');
				}else{
					//Set variables for paypal form
					$returnURL = base_url().'paypal/shoping_member'; //payment success url
					$cancelURL = base_url().'paypal/cancel'; //payment cancel url
					$notifyURL = base_url().'paypal/ipn'; //ipn url
					//get particular product data
					$item_name = $user_id.'_'.'membership';
					$logo = base_url().'assets/img/x-click-but01.gif';
					$this->paypal_lib->add_field('return', $returnURL);
					$this->paypal_lib->add_field('cancel_return', $cancelURL);
					$this->paypal_lib->add_field('notify_url', $notifyURL);
					$this->paypal_lib->add_field('amount', $get_details[0]['membership_price']);
					$this->paypal_lib->add_field('item_name',$item_name);
					$this->paypal_lib->image($logo);
					$this->paypal_lib->paypal_auto_form();
				}
			}
			}
		}
		else
		{
			$msg 	 = 'Trainer Data Not Inserted';
			$msgclass = 'alert-danger';
			$this->create_personal_trainer_reg($msg,$msgclass);
		}
	}
}
//+++++++++++++++++++++++++++++++ TRAINER SUCCESS SECTION +++++++++++++++++++++++++++++++++++++++++
public function success()
{
	$this->load->view('success');
}
//+++++++++++++++++++++++++++++++ COMPANY SECTION +++++++++++++++++++++++++++++++++++++++++
public function company_reg($company_membership_id ='')
{
	$company_membership_id = base64_decription($company_membership_id);
	$this->getSessionValidate();
	if(isset($company_membership_id) && (!empty($company_membership_id)))
	{
		$this->session->set_userdata('membership_id',$company_membership_id);
		redirect('Home/create_company_reg','refresh');
	}
	$this->membership('company_profile');
}
//+++++++++++++++++++++++++++++++ COMPANY SECTION +++++++++++++++++++++++++++++++++++++++++
public function create_company_reg($msg = '',$msgclass = '')
{
	$this->getSessionValidate();
	if(isset($_SESSION['last_id']))
	{
		redirect('Home/membership','refresh');
	}
	if($msg !='')
	{
		 $msgcontain['msg'] = $msg;
		 $msgcontain['msgclass'] = $msgclass;
	}
		$msgcontain['user_value'] = 'company';
		$msgcontain['msgclass'] = $msgclass;
		$msgcontain['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');;
		$this->load->view('healthy-company-registration',$msgcontain);
}
//+++++++++++++++++++++++++++++++ INSERT COMPANY SECTION +++++++++++++++++++++++++++++++++++++++++
public function insert_company_reg()
{
	$this->getSessionValidate();
	if(isset($_SESSION['last_id']))
	{
		redirect('Home/membership','refresh');
	}
	$this->form_validation->set_rules('company_name','Company Name','required');
	$this->form_validation->set_rules('company_c_person','Contact Person Name','required');
	$this->form_validation->set_rules('company_email','Company Email','required|valid_email|is_unique['.USER.'.email]');
	$this->form_validation->set_rules('company_password','Password','required');
	$this->form_validation->set_rules('cnf_password','Confirm Password','required|matches[company_password]');
	//$this->form_validation->set_rules('opening_hour_from','Ending Company Opening Hour','required');
	//$this->form_validation->set_rules('opening_hour_to','Starting Company Opening Hour','required');
	$this->form_validation->set_rules('company_about_us[]','Company About Us','required');
	$this->form_validation->set_rules('company_privacy_policy','Privacy Policy','required');
	$this->form_validation->set_rules('company_membership_rule','Membership Rules','required');
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msgclass = 'alert-danger';
		$this->create_company_reg($msg,$msgclass);
	}
	else
	{
		$post_data = $this->input->post();
		if(count($post_data)> 0)
		{
		 $company_name 			= $this->security->xss_clean(escape_str($post_data['company_name']));
		 $company_c_person 		= $this->security->xss_clean(escape_str($post_data['company_c_person']));
		 $company_email 		= $this->security->xss_clean(escape_str($post_data['company_email']));
		 $company_phone 		= $this->security->xss_clean(escape_str($post_data['company_phone']));
		 $company_password 		= $this->security->xss_clean(escape_str(md5($post_data['company_password'])));
		 $company_street 		= $this->security->xss_clean(escape_str($post_data['company_street']));
		 $company_street2 		= $this->security->xss_clean(escape_str($post_data['company_street2']));
		 //$city_id 				= $this->security->xss_clean(escape_str($post_data['city']));
		if(!empty($post_data['city'])){
		$city_id = $this->security->xss_clean(escape_str($post_data['city']));
		}else{
		$city_id = '';
		}
		 $company_state 		= $this->security->xss_clean(escape_str($post_data['company_state']));
		 $company_postal_code 	= $this->security->xss_clean(escape_str($post_data['company_postal_code']));
		 $country_id 			= $this->security->xss_clean(escape_str($post_data['country']));
		 $company_description 	= $this->security->xss_clean(escape_str($post_data['company_description']));
		 $company_type 			= 'Free';
		 $company_status 		= 'Inactive';
		 $create_date 			= date("Y-m-d");
		 $company_about_us 		= $this->security->xss_clean(escape_str($post_data['company_about_us']));
		 //____________________________________________________________________________
		 if(isset( $company_about_us)){
		 $company_about_us = implode(',',$company_about_us);}
		 $company_membership_rule = $post_data['company_membership_rule'];
		 $company_privacy_policy = $post_data['company_privacy_policy'];
		 if(isset($company_membership_rule))
		 {$company_membership_rule = 1;}
		 else{$company_membership_rule = '';}
		 if(isset($company_privacy_policy))
		 {$company_privacy_policy = 1;}
		 else{$company_privacy_policy = '';}
		 if(empty($city_id))
		 {
		 $get_new_city_name = $this->security->xss_clean(escape_str($post_data['new_city']));
		 if(!empty($get_new_city_name)){
		 $x['country_id'] = $country_id;
		 $x['city_name'] = $get_new_city_name;
		 $x['city_status'] = 'Inactive';
		 $x['type'] = 1;
		 $new_city_id = $this->urs->InsertDatas(CITY,$x);
		 $city_id = $new_city_id;
		 }else{
		 $city_id = $city_id;
		 }
		 }
		 //___________________________________________________________________________
		/*********************Picture Upload********************************/
		$get_profile_pic_file_name_1 	= $this->security->xss_clean(escape_str($_FILES['company_pic']['name']));
		if(isset($get_profile_pic_file_name_1))
		{
			$time = time();
			$path = "./upload/profile/";
			$get_profile_pic_temp_name_1 = $_FILES['company_pic']['tmp_name'];
			$get_profile_pic_file_type_1 = $_FILES['company_pic']['type'];
			$get_profile_pic_file_erro_1 = $_FILES['company_pic']['error'];
			$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;
			$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1;
		}
		else
		{
			$get_profile_pic_modi_name_1 = '';
		}
		if(isset($get_profile_pic_file_name_1) && (!empty($get_profile_pic_file_name_1)))
		{
			$profile_pic_upload = move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
		}
		else
		{
			$get_profile_pic_modi_name_1 = '';
		}
		/*For User Insertion*/
		$this->__alldata = array(
			'email' 				=> $company_email,
			'password' 				=> $company_password,
			'create_date' 			=> $create_date,
			'update_date' 			=> '',
			'user_type' 			=> 'C',
			'password_reset_token' 	=> '',
			'social' 				=> '',
			'social_id' 			=> '',
			'status'				=> $company_status,);
		$last_insert_data = $this->urs->InsertDatas(USER,$this->__alldata);
		//____________________________________________________________________________________________
		if(!empty($last_insert_data))
		{
			/*For User-Details Insertion*/
			$this->__alldata = array(
			'user_id'				=> $last_insert_data,
			'company_name' 			=> $company_name,
			'company_person' 		=> $company_c_person,
			'membership_id' 		=> $this->session->userdata('membership_id'),
			'phone' 				=> $company_phone,
			'company_description' 	=> $company_description,
			'user_image' 			=> $get_profile_pic_modi_name_1,
			'about_us' 				=> $company_about_us,
			'membership_rules' 		=> $company_membership_rule,
			'privacy_policy' 		=> $company_privacy_policy,
			'create_date'			=> $create_date,
			'update_date' 			=> '',
			);
			$details_insert_data = $this->urs->InsertDatas(USER_DETAILS,$this->__alldata);
		}
		//______________________________________________________________________________________________
			if(!empty($details_insert_data))
			{
				/*For Address Insertion*/
				$this->__all_data = array(
				'user_id' 			=> $last_insert_data,
				'street_address_1' 	=> $company_street,
				'street_address_2' 	=> $company_street2,
				'city_id' 			=> $city_id,
				'state' 			=> $company_state,
				'postal_code' 		=> $company_postal_code,
				'country_id' 		=> $country_id,
				);
				$last_address_id = $this->urs->InsertDatas(ADDRESS,$this->__all_data);
			}
		//_____________________________________________________________________________________________
		if(!empty($last_insert_data))
		{
			/***************************Opening Hours**********************************/
		 for($i=0;$i<7;$i++){
		 $opening_hour_day 		= $this->security->xss_clean(escape_str($post_data['day_name'][$i]));
		 $from_opening_hour 		= !empty($post_data['from_opening_hour'][$i]) ? $post_data['from_opening_hour'][$i] : 0;
		 $from_opening_mint 		= !empty($post_data['from_opening_mint'][$i]) ? $post_data['from_opening_mint'][$i] : 0;
		 $from_opening_indication 	= !empty($post_data['from_opening_indication'][$i]) ? $post_data['from_opening_indication'][$i] : 0;
		 $to_opening_hour			= !empty($post_data['to_opening_hour'][$i]) ? $post_data['to_opening_hour'][$i] : 0;
		 $to_opening_mint 			= !empty($post_data['to_opening_mint'][$i]) ? $post_data['to_opening_mint'][$i] : 0;
		 $to_opening_indication 	= !empty($post_data['to_opening_indication'][$i]) ? $post_data['to_opening_indication'][$i] : 0;
		 if(isset($post_data['opening_hour_close'][$i]) && !empty($post_data['opening_hour_close'][$i]) ){
			 $opening_hour_close 	= $this->security->xss_clean(escape_str($post_data['opening_hour_close'][$i]));
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
		 'company_business_id'		=>$last_insert_data,
		 'opening_hour_day'			=>$opening_hour_day,
		 'opening_hour_from'		=>$from_hour,
		 'opening_hour_to'			=>$to_hour,
		 'opening_hour_close'		=>$opening_hour_close,
		 'opening_hour_type'		=>0);
			$insert_opening_data = $this->urs->InsertDatas(OPENING_HOUR,$this->__alldata);
	}
		$get_membership_id = $this->session->userdata('membership_id');
		if(!empty($get_membership_id))
			{
				$get_details = $this->dashs->getListDatas('cmd_membership','membership_id',$get_membership_id);
				if($get_details[0]['membership_type'] == 'FREE'){
					$dataaaaa['status'] = 'Active';
					$this->urs->UpdateDatas($dataaaaa,$last_insert_data,'cmd_user','user_id');
					//$this->login_company($last_insert_data);
					redirect('Home','refresh');
				}else{
					//Set variables for paypal form
					$returnURL = base_url().'paypal/shoping_company'; //payment success url
					$cancelURL = base_url().'paypal/cancel'; //payment cancel url
					$notifyURL = base_url().'paypal/ipn'; //ipn url
					//get particular product data
					$item_name = $last_insert_data.'_'.'membership';
					$logo = base_url().'assets/img/x-click-but01.gif';
					$this->paypal_lib->add_field('return', $returnURL);
					$this->paypal_lib->add_field('cancel_return', $cancelURL);
					$this->paypal_lib->add_field('notify_url', $notifyURL);
					$this->paypal_lib->add_field('amount', $get_details[0]['membership_price']);
					$this->paypal_lib->add_field('item_name',$item_name);
					$this->paypal_lib->image($logo);
					$this->paypal_lib->paypal_auto_form();
				}
			}
	}
	else
	{
		$msg = 'Company Data Not Inserted';
		$msgclass = 'alert-danger';
		$this->create_company_reg($msg,$msgclass);
	}
 }
}
}
//+++++++++++++++++++++++++++++++ COMPANY Reg & LOGIN SECTION +++++++++++++++++++++++++++++++++++++++++
public function login_company($last_insert_data ='')
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
		$dat = get_user_details($last_insert_data);
		$gmd = get_member_details($dat['membership_id']);
		$this->session->set_userdata('user_type',$dat[0]['user_type']);
		$this->session->set_userdata('user_id',$dat[0]['user_id']);
		$this->session->set_userdata('user_login', 'YES');
		$this->session->set_userdata('user_membership_type', $gmd['membership_type']);
		redirect('CompanyDashboard','refresh');
	}
}
//+++++++++++++++++++++++++++++++ COMPANY Reg & LOGIN SECTION +++++++++++++++++++++++++++++++++++++++++
public function login_member($last_insert_data ='')
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
$dat = get_user_details($last_insert_data);
$gmd = get_member_details($dat['membership_id']);
$this->session->set_userdata('user_type',$this->__data[0]['user_type']);
$this->session->set_userdata('user_id',$this->__data[0]['user_id']);
$this->session->set_userdata('user_login', 'YES');
$this->session->set_userdata('user_membership_type', $gmd['membership_type']);
		// $this->session->set_userdata('user_login', 'YES');
		// $this->session->set_userdata('user_type', 'M');
		// $this->session->set_userdata('user_id',$last_insert_data);
		redirect('UserDashboard','refresh');
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function full_event()
{
$detailSection['allEvent'] 		= $this->urs->getCountryDetails(VIEW_EVENT,'event_id');
$detailSection['allBusiness'] 	= $this->urs->getCountryDetails(VIEW_BUSINESS,'business_id');
$detailSection['allCategory'] 	= $this->urs->getAllCategoryList();
$detailSection['allCity'] 		= $this->urs->getCountryCityNames(CITY,'city_status','Active');
	$this->load->view("event",$detailSection);
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function full_store()
{
	$detailSection['allBusiness'] 	= $this->urs->getCountryDetails(VIEW_BUSINESS,'business_id');
	$detailSection['allCategory'] 	= $this->urs->getFullDetails(CATEGORY,'category_type','business','category_id');
	$detailSection['allCity'] 		= $this->urs->getCountryCityNames(CITY,'city_status','Active');
	$this->load->view("store",$detailSection);
}
//+++++++++++++++++++++++++++++++++++++++ LIST VIEW Specific CLASS +++++++++++++++++++++++++++++++++//
public function class_view($msg='',$msg_class='')
{
	$detailSection['allClass'] 	 = $this->urs->getCountryDetails(VIEW_TRAINER_CLASS,'trainer_class_id');
	$msgsection['category'] 	 = $this->urs->getFullUserDetails(CATEGORY,'class','category_type');
	$msgSection['get_cate_id'] = $this->dashs->get_pivot_category('class',$msgSection['allClass'][0]['trainer_class_id']);
	$this->load->view('trainer-classes',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++++++ VIEW ONLY ++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function city_inner($id)
{
	if($id!=''){
		$city_id = $id;
		$id = base64_decription($id);
		$detailSection['city_id'] = $id;
		$detailSection['allEvent'] 		= $this->urs->getFullDetails(VIEW_EVENT,'city_id',$id,'event_id');
		$detailSection['allBusiness'] 	= $this->urs->getFullDetails(VIEW_BUSINESS,'city_id',$id,'business_id');
		$detailSection['allCategory'] 	= $this->urs->getAllCategoryList();
		$detailSection['allCity'] 		= $this->urs->getCountryCityNames(CITY,'city_status','Active');
		$detailSection['city_d'] 		= $this->urs->getFullDetails(CITY,'city_id',$id,'city_id');
		$this->load->view("cities-inner",$detailSection);
	}
	else{
		redirect('Home/full_event','refresh');
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function news($city_id='')
{
	if(isset($city_id)){
	$id = base64_decription($city_id);
	if(!empty($id)){
	$detailSection['news_details'] 	= $this->urs->getFullDetails(VIEW_BLOG_NEWS,'city_id',$id,'blog_news_id');
	}else{
	$detailSection['news_details']= $this->urs->getFullUserDetails(VIEW_BLOG_NEWS,'Active','blog_news_status');
	}
	}else{
	$detailSection['news_details']= $this->urs->getFullUserDetails(VIEW_BLOG_NEWS,'Active','blog_news_status');
	}
	$detailSection['category'] = $this->urs->getFullUserDetails(CATEGORY,'news','category_type');
	$this->load->view("news",$detailSection);
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function newsDetails($id='')
{
	if(!empty($id)){
	$blogd['nb_details'] = $this->urs->getFullDetails(VIEW_BLOG_NEWS,'blog_news_id',$id,'blog_news_id');
	$blogd['all_nb_details']= $this->urs->getFullUserDetails(VIEW_BLOG_NEWS,'Active','blog_news_status');
	$this->load->view("blog_details",$blogd);
	}else{
	$this->news();
	}
}
public function shop()
{
	$detailSection['data'] = $this->urs->getproductDatas('status','Active');
	$detailSection['category_data'] = $this->urs->getFullActiveDetails(CATEGORY,'category_type','product','category_id','status');
	$this->load->view("shop",$detailSection);
}
//+++++++++++++++++++++++++++++++++++++++++++++++ SHOP DETAILS ++++++++++++++++++++++++++++
public function shop_details($specific_product_id,$msg='')
{
	$product_id = $specific_product_id;
	$check_id = $this->urs->CheckDatas(PRODUCT,'product_id',$product_id);
	if($msg !=''){
		$detailSection['msg']= $msg;
	}
	if($check_id){
	//$product_id = base64_decription($specific_product_id);
	$detailSection['product_details']	= $this->urs->getproductDatas('product_id',$product_id);
	$detailSection['catdata'] 		 	= $this->urs->getFullUserDetails(CATEGORY,'product','category_type');
	$detailSection['subcatdata'] 	 	= $this->urs->getFullUserDetails(CATEGORY,'sub-product','category_type');
	$detailSection['pivot_category'] 	= $this->urs->getFullUserDetails(PRODUCT_CAT_SUBCAT,$product_id,'product_id');
	$detailSection['galerry_data'] 	= $this->urs->getFullUserDetails(PRODUCT_IMAGES,$product_id,'product_id');
	$detailSection['review_data'] 	= $this->urs->getDetailsProductDatas(PRODUCT_REVIEW,$product_id,'product_id','status','product_reviews_id');
	//print_r($detailSection['review_data']);die;
	//_________________________________________________________________________________________
	$category_details = $detailSection['pivot_category'][0];
	$category_details['category_id'];
	if(!empty($category_details['category_id'])){
		//$category_id = implode(',',$category_id_product);
		$detailSection['categoryData'] = $this->urs->getSameProductCategoryData($category_details['category_id']);
	}
	else{
			$detailSection['msgCategory'] = 'No Related data Found';
		}
	//$detailSection['allCategory'] = $this->urs->getFullDetails(CATEGORY,'category_type','product','category_id');
	//____________________________________________________________________________________________
	}
	else{
				redirect('Home/shop','refresh');
		}
	$this->load->view("shop-details",$detailSection);
}
//+++++++++++++++++++++++++++++++++++++++++++++++ PRODUCT DETAILS ++++++++++++++++++++++++++++
public function category_product($specific_product_id)
{
	$id = base64_decription($specific_product_id);
	if($id!='' || $id!=$id){
		$category_details = $this->urs->getTypeDetails(PRODUCT_CAT_SUBCAT,$id,'category_id','category_type','product');
		foreach($category_details as $category_details){
			$category_id_event[] = $category_details['category_id'];
		}
		if(!empty($category_id_event)){
			$category_id = implode(',',$category_id_event);
			$detailSection['allProduct'] = $this->urs->get_category_details($category_id);
		}
		else{
				redirect('Home/full_event','refresh');
			}
		$detailSection['allCategory'] = $this->urs->getFullDetails(CATEGORY,'category_type','product','category_id');
		$this->load->view("event",$detailSection);
	}
	else{
		redirect('Home/full_event','refresh');
	}
}
//+++++++++++++++++++++++++++++++++++++++++++ VIEW ONLY News Section ++++++++++++++++++++++++++++++++++++++++++++
public function trainer_classes($id,$user_id)
{
	if($id!='' || $id!=$id)
	{
		$id = base64_decription($id);
		$user_id = base64_decription($user_id);
		$detailSection['allClass'] 	 = $this->urs->getFullUserDetails(VIEW_TRAINER_CLASS,$id,'event_id');
		$detailSection['userEvent'] = $this->urs->getDetailsbylimit(VIEW_EVENT,$user_id,'user_id','event_status','event_id');
		$detailSection['recent_news'] = $this->urs->getUserDetailsbylimit(BLOG_NEWS,'News','blog_news_type');
		//___________________________________________________Same Category Class_______________________________
		$class_category_details = $this->urs->getTypeDetails(PIVOT_CATEGORY,$id,'pivot_unique_id','category_type','event');
		if(count($class_category_details) > 0){
			foreach($class_category_details as $category_details){
				$category_id_event[] = $category_details['category_id'];
			}
			if(!empty($category_id_event)){
				$category_id = implode(',',$category_id_event);
				$detailSection['categoryEvent'] = $this->urs->get_category_details($category_id);
			}
	 }
		else{
				$detailSection['categoryEvent'] = 0;
			}
		//_________________________________________________End Same Category Class___________________________
		$this->load->view("trainer-classes",$detailSection);
	}
	else{
		redirect("Home/full-event","refresh");
	}
}
//+++++++++++++++++++++++++++++++++++++++++++ VIEW ONLY News Section ++++++++++++++++++++++++++++++++++++++++++++
public function trainer_details_classes($id)
{
	if($id!='')
	{
		$id = base64_decription($id);
		$detailSection['allClass'] 		= $this->urs->getFullUserDetails(VIEW_TRAINER_CLASS,$id,'trainer_class_id');
		$detailSection['categoryEvent'] = $this->urs->getDetailsbylimit(VIEW_EVENT,$detailSection['allClass'][0]['user_id'],'user_id','event_status','event_id');
		$detailSection['recent_news'] 	= $this->urs->getUserDetailsbylimit(BLOG_NEWS,'News','blog_news_type');
		$detailSection['opening_hour'] 	= $this->urs->openingHourDetails($id,2);
		$detailSection['categoryClass'] = $this->urs->getDetailsbylimit(VIEW_TRAINER_CLASS,$detailSection['allClass'][0]['event_id'],'event_id','trainer_class_status','trainer_class_id');
		$detailSection['joined_users'] = $this->urs->getJoinUser(USER_DETAILS,PIVOT_JOIN_CLASS,'trainer_class_id',$id);	//For User List Join Class User
		$this->load->view("trainer-details-classes",$detailSection);
	}
	else{
	redirect("Home/full-event","refresh");
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++ EVENT DETAILS ++++++++++++++++++++++++++++
public function event_details($id)
{
	/*****************Category Event Details************************************/
	if($id!='' || $id!=$id)
	{
		$id = base64_decription($id);
		$category_details = $this->urs->getTypeDetails(PIVOT_CATEGORY,$id,'pivot_unique_id','category_type','event');
		if(count($category_details) > 0){
			foreach($category_details as $category_details){
				$category_id_event[] = $category_details['category_id'];
			}
			if(!empty($category_id_event)){
				$category_id = implode(',',$category_id_event);
				$detailSection['categoryEvent'] = $this->urs->get_category_details($category_id);
			}
	 }
		else{
				$detailSection['categoryEvent'] = 0;
			}
		/*****************End Category Event Details************************************/
		$detailSection['joined_users'] = $this->urs->getJoinUser(USER_DETAILS,PIVOT_JOIN_EVENT,'event_id',$id);	//Join Event User
		$detailSection['details_event'] = $this->urs->getFullUserDetails(VIEW_EVENT,$id,'event_id');
		$detailSection['recent_news'] 	= $this->urs->getUserDetailsbylimit(BLOG_NEWS,'News','blog_news_type');
	}
	else
	{
		redirect('Home/full_event','refresh');
	}
		$this->load->view("events-details",$detailSection);
}
//+++++++++++++++++++++++++++++++++++++++++++++++ EVENT DETAILS ++++++++++++++++++++++++++++
public function category_event($id)
{
	$id = base64_decription($id);
	if($id!='' || $id!=$id){
		$category_details = $this->urs->getTypeDetails(PIVOT_CATEGORY,$id,'pivot_unique_id','category_type','event');
		foreach($category_details as $category_details){
			$category_id_event[] = $category_details['category_id'];
		}
		if(!empty($category_id_event)){
			$category_id = implode(',',$category_id_event);
			$detailSection['allEvent'] = $this->urs->get_category_details($category_id);
			$detailSection['allCategory'] = $this->urs->getFullDetails(CATEGORY,'category_type','event','category_id');
			$detailSection['allCity'] = $this->urs->getCountryCityNames(CITY,'city_status','Active');
			$detailSection['allBusiness'] = array();
			$this->load->view("event",$detailSection);
		}
		else{
				redirect('Home/full_event','refresh');
			}
	}
	else{
		redirect('Home/full_event','refresh');
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++ EVENT DETAILS ++++++++++++++++++++++++++++
public function specific_category_event($id)
{
	$id = base64_decription($id);
	if($id!=''){
	$detailSection['category_id'] = $id;
	$detailSection['allEvent'] = $this->urs->get_category_details($id);
	$detailSection['allBusiness'] = $this->urs->get_category_details_business($id);
	$detailSection['allCategory'] = $this->urs->getAllCategoryList();
	$detailSection['allCity'] = $this->urs->getCountryCityNames(CITY,'city_status','Active');
	$this->load->view("event",$detailSection);
	}else{
	redirect('Home/full_event','refresh');
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++ BUSINESS DETAILS ++++++++++++++++++++++++++++
public function category_business($id,$city_id)
{
	if($id!='' || $id!=$id){
		$id = base64_decription($id);
		$category_details = $this->urs->getTypeDetails(PIVOT_CATEGORY,$id,'pivot_unique_id','category_type','business');
		print_r($category_details);die;
		foreach($category_details as $category_details){
			$category_id_event[] = $category_details['category_id'];
		}
		if(!empty($category_id_event)){
			$category_id = implode(',',$category_id_event);
			$detailSection['allBusiness'] = $this->urs->get_category_details_business($category_id);
		}
		else{
				redirect('Home/city_inner/'.$city_id,"refresh");
			}
		$detailSection['allCategory'] = $this->urs->getFullDetails(CATEGORY,'category_type','business','category_id');
		$detailSection['allCity'] = $this->urs->getCountryCityNames(CITY,'city_status','Active');
		$this->load->view("store",$detailSection);
	}
	else{
			redirect('Home/full_store',"refresh");
		}
}
//+++++++++++++++++++++++++++++++++++++++++++++++ EVENT DETAILS ++++++++++++++++++++++++++++
public function category_business_data($id)
{
	$id = base64_decription($id);
	if($id!='' || $id!=$id){
		$get_category_id = $this->urs->getTypeDetails(PIVOT_CATEGORY,$id,'pivot_unique_id','category_type','business');
		if(empty($get_category_id[0]['category_id'])){
			redirect('Home/full_event','refresh');
		}
		$category_details = $this->urs->getFullUserDetails(PIVOT_CATEGORY,$get_category_id[0]['category_id'],'category_id');
		foreach($category_details as $category_details){
			$category_id_business[] = $category_details['category_id'];
		}
		if(!empty($category_id_business)){
			$category_id = implode(',',$category_id_business);
			$detailSection['allBusiness'] = $this->urs->get_category_details_business($category_id);
		}
		else{
				redirect('Home/full_event','refresh');
			}
		$detailSection['allCategory'] = $this->urs->getFullDetails(CATEGORY,'category_type','business','category_id');
		$detailSection['allCity'] = $this->urs->getCountryCityNames(CITY,'city_status','Active');
		$this->load->view("store",$detailSection);
	}
	else{
		redirect('Home/full_event','refresh');
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++ STORE DETAILS ++++++++++++++++++++++++++++
public function store_details($id,$msg='')
{
	$id 	= base64_decription($id);
	if($id!='' || $id!=$id){
		/************** SAME CATEGORY DETAILS ****************/
		$category_details = $this->urs->getTypeDetails(PIVOT_CATEGORY,$id,'pivot_unique_id','category_type','business');
		if(count($category_details) > 0){
			foreach($category_details as $category_details){
				$category_id_event[] = $category_details['category_id'];
			}
			if(!empty($category_id_event)){
				$category_id = implode(',',$category_id_event);
				$detailSection['categoryBusiness'] = $this->urs->get_category_details_business($category_id);
				//print_r($detailSection['categoryBusiness']);die;
			}
	 }
		else{
				$detailSection['categoryBusiness'] = 0;
			}
		$detailSection['details_store'] = $this->urs->getFullUserDetails(VIEW_BUSINESS,$id,'business_id');
		$detailSection['recent_news'] 	= $this->urs->getUserDetailsbylimit(BLOG_NEWS,'News','blog_news_type');
		$detailSection['opening_hour'] 	= $this->urs->openingHourDetails($id,1);
		$detailSection['feedback_data'] = $this->urs->getTypeDetails(STORE_FEEDBACK,$id,'business_id','status','Active');
		$detailSection['feedback_user'] = $this->urs->groupDatas(STORE_FEEDBACK,'user_id','business_id',$id);
$detailSection['class_details'] = $this->urs->getFullUserDetails('cmd_trainer_class',$id,'event_id');
		$detailSection['msg'] = $msg;
	}
	else
	{
		redirect('Home/full_event','refresh');
	}
		$this->load->view("store-details",$detailSection);
}
//+++++++++++++++++++++++++++++++++++++++++++++++ SEND EMAIL ++++++++++++++++++++++++++++
public function send_mail(){
	$this->form_validation->set_rules('email','Email','required');
	if($this->form_validation->run() == FALSE)
	{
		redirect("Home/index","refresh");
	}else{
 $from_email= "go@clubmondain.com";
 $get_email = $this->security->xss_clean(escape_str($this->input->post('email')));
 $to_email 	= $get_email;
 $encripted_email 	= base64_encription($to_email);
 //Load email library
 $this->load->library('email');
 $html_data = '<a href='.base_url('Home/check-mail/'.$encripted_email).'>Click hear to create a new password</a>';
 $this->email->from($from_email, 'Clubmondain');
 $this->email->to($to_email);
 $this->email->subject('Forgot Password');
 $this->email->set_mailtype("html");
 $this->email->message($html_data);
 //Send mail
 if($this->email->send()){
 redirect("home/index","refresh");
 //$this->session->set_flashdata("email_sent","Email sent successfully.");
 }else{
 //$this->session->set_flashdata("email_sent","Error in sending Email.");
 //$this->load->view('index');
 redirect("home/index","refresh");
 }
 }
}
//+++++++++++++++++++++++++++++++++++++++++++++++ SEND EMAIL ++++++++++++++++++++++++++++
public function check_mail($email){
	if(!empty($email)){
		$email 		 = base64_decription($email);
		$return_data = $this->urs->CheckEmails(USER,$email);
		if($return_data == FALSE)
		{
			$data['email'] = $email;
			$this->load->view('change-password',$data);
		}
		else{
				$this->load->view('index');
			}
	}
	else{
			redirect("Home/index","refresh");
		}
}
//+++++++++++++++++++++++++++++++++++++++++++++++ UPDATE PASSWORD ++++++++++++++++++++++++++++
public function Forgot_Change_Password(){
	$this->form_validation->set_rules('user_pwd_new','Password','required');
	$this->form_validation->set_rules('user_email','Email','required');
	if($this->form_validation->run() == FALSE)
	{
		$data['msg'] = validation_errors();
		$data['msgclass'] = 'alert-danger';
		$this->load->view('change-password',$data);
	}
	$this->__get_new_password = $this->security->xss_clean(escape_str($this->input->post('user_pwd_new',true)));
	$this->__get_email = $this->security->xss_clean(escape_str($this->input->post('user_email',true)));
	$this->__get_new_password = trimData($this->__get_new_password);
	$this->__get_new_password = stripslashesData($this->__get_new_password);
	$this->__get_email = trimData($this->__get_email);
	$this->__get_email = stripslashesData($this->__get_email);
	if($this->__get_email==''){
		redirect("Home/index","refresh");
	}
	$this->__data = $this->urs->changeForgotPasswords(USER,$this->__get_new_password,$this->__get_email);
	if(isset($this->__data)){
		$data['msg'] 	 = 'Password SuccessFully Updated';
		$data['msgclass'] = 'alert-success';
		$this->load->view('change-password',$data);
	}
	else{
			$data['msg'] 	 = 'Password Not Updated';
			$data['msgclass'] = 'alert-danger';
			$this->load->view('change-password',$data);
		}
}
//++++++++++++++++++++++++++++++++++++++ SPECIFIC USER PROFILE VALUE ++++++++++++++++++++++++++++++++++
public function profile_view($id='')
{
if(!empty($id))
{
$user_id = base64_decription($id);
$valid_id = $this->urs->CheckDatas(USER,'user_id',$user_id);
if(!empty($valid_id)){
//$user_address = $this->urs->getFullDetails(ADDRESS,'user_id',$user_id,'address_id');
$user_details = $this->urs->detailsUserDetails($user_id);
$all_events   = $this->urs->getFullUserDetails(VIEW_EVENT,$user_id,'user_id');
$all_business = $this->urs->getFullUserDetails(VIEW_BUSINESS,$user_id,'user_id');
$catdata      = $this->urs->getFullDetails(PIVOT_INTEREST_CATEGORY,'user_id',$user_id,'user_id');
$all_meetup   = $this->urs->getDetailsbyLimitCount(MEET_UP,$user_id,'user_id','status','meet_up_id');
$listdata['catdata']        = $catdata;
$listdata['all_events']     = $all_events;
$listdata['all_meetup']     = $all_meetup;
$listdata['user_details']   = $user_details;
$listdata['all_business']   = $all_business;
$listdata['all_fav_events'] = $this->urs->getMyFavEvent($user_id);
$listdata['all_fav_space']  = $this->urs->getMyFavSpace($user_id);
$this->load->view('dashboard/user-profile',$listdata);
}else{
redirect("Home/index","refresh");
}
}else{
redirect("Home/index","refresh");
}
}
//+++++++++++++++++++++++++++++++ USER LOGOUT SECTION +++++++++++++++++++++++++++++++++++++++++
public function logOut()
{
	$this->session->sess_destroy();
	redirect('Home','refresh');
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function cities_main()
{
	$detailSection['city_details'] 		= $this->urs->getCountryCityNames(CITY,'city_status','Active');
	$detailSection['country_details'] 	= $this->urs->getSpecificCountryNames(CITY,'city_status','Active');
	$this->load->view("cities-main",$detailSection);
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function city_details($id='')
{
	$id = base64_decription($id);
	if($id!=''){
	$CityNews_details = $this->urs->CityNews_UserDetails(BLOG_NEWS,USER_DETAILS,CITY,'city_id',$id);
	$this->load->view("cities-details",array('CityNews_details' => $CityNews_details));
	}
	else{
		redirect('Home/cities_main','refresh');
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function country_city_view($id)
{
	$detailSection['city_details'] = $this->urs->getCityInCountryNames(CITY,'country_id',$id);
	$this->load->view("cities-main",$detailSection);
}
// +++++++++++++++++++++++ COUNTRY CORROSPOND CITY LIST (AJAX CALLING DATA) +++++++++++++++++++++
public function get_city($id)
{
	$this->__all_data = $this->urs->getFullUserDetails_city(CITY,$id,'country_id');
	 if(count($this->__all_data) > 0)
	 {
		 $pic = base_url('upload/city/');
		 $more = base_url('Home/city_details/');
		 echo json_encode($this->__all_data);
		 die;
	 	 /*foreach($this->__all_data as $city_details){
				echo '<div class="col-md-4 col-sm-6">
					 <div class="single">
						<div class="image">
							<img src="'.$pic.$city_details['city_pic'].'">
							<div class="overlay">
								<ul>
									<li><a href="'.$more.$city_details['id'].'">More</a></li>
									<li><a href="#">Chat</a></li>
								</ul>
							</div>
						</div>
						<p>'.$city_details['city_name'].'</p>
					</div>
				</div>';
 }*/
	 }
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function favourite_city(){
	//die;
	// GETING ALL THE POST DATA FOR THE AJAX
	$post_data 	= $this->input->post();
	$city_id 	= $post_data['favourite_city'];
	$user_id 	= $this->__all_data = 	ss;
}
// +++++++++++++++++++++++ COUNTRY CORROSPOND CITY LIST (AJAX CALLING DATA) +++++++++++++++++++++
public function check_city()
{
	$this->__country = $this->input->post('country',true);
	$this->__all_data = $this->urs->getFullDetails(CITY,'country_id',$this->__country,'city_id');
	//print_r($this->__all_data);
	 if(count($this->__all_data) > 0)
	 {
		 echo '<option value="">Select City</option>';
		foreach($this->__all_data as $city)
		{
			 echo '<option value='.$city['city_id'].'>'.$city['city_name'].'</option>';
		}
	 }
}
//====================================================================================================
public function city_event_find()
{
	$post_data = $this->input->post();
	$city_id = base64_decription($post_data['send_id']);
	$this->__alldata = $this->urs->getFullUserDetails(VIEW_EVENT,$city_id,'city_id');
	if(count($this->__alldata) > 0)
 	{
		echo json_encode($this->__alldata);
	}
	else{
		echo json_encode('Error');
		}
}
//====================================================================================================
public function category_event_find()
{
	$post_data = $this->input->post();
	$category_id = base64_decription($post_data['send_id']);
	$city_id = $post_data['city_id'];
	if(($category_id == 0) and ($city_id == 0)){
	$allEvent 		= $this->urs->getCountryDetails(VIEW_EVENT,'event_id');
	$allBusiness 	= $this->urs->getCountryDetails(VIEW_BUSINESS,'business_id');
	if(count($allEvent) > 0){
	foreach($allEvent as $event){
	?>
 <div class="col-lg-4 col-sm-6 col-cont eventTS" data-date-id="<?php echo $event['create_date']; ?>" data-city-id="<?php echo $event['city_id']; ?>" data-id="<?php echo strtolower($event['event_name']); echo strtolower($event['event_city']); echo specific_category($event['event_id']);?>">
 <div class="single">
 <div class="city-image">
 <div class="image">
 <?php if(isset($event['event_banner']) && !empty($event['event_banner'])){?>
 <img src="<?php echo base_url('upload/events/').$event['event_banner'];?>" alt="">
 <?php }
 else{?>
 <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
 <?php }?>
 </div>
 <h4><?php echo ucwords($event['event_name']);?></h4>
 <p><?php echo ucwords(stripslashes(strip_tags($event['event_description'])));?></p>
 <div class="overlay">
 <ul>
 <?php /*?><li><a href="<?php echo base_url('Home/category-event/').base64_encription($event['event_id']);?>">More</a></li><?php */?>
 <li><a href="<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>">Detail</a></li>
 <li><a href="<?php echo base_url('Home/news/').base64_encription($event['city_id']);?>">News</a></li>
 </ul>
 </div>
 </div>
 <div class="city-cntnt">
 <div class="cntnt">
 <p><?php echo $event['event_city'];?></p>
 <p><?php echo date('dS M Y',strtotime($event['event_date_from']));?></p>
 </div>
 <ul class="social">
 <li>
 	<a target="_blank" href="https://www.linkedin.com/cws/share?url=<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>">
 		<i class="fa fa-linkedin"></i>
 	</a>
 	</li>
 <li>
 	<a href="javascript:void()" onclick="shareFb('<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>')">
 		<i class="fa fa-facebook"></i>
 	</a>
 </li>
 <li>
 	<a target="_bank" href="https://twitter.com/intent/tweet?text=<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>">
 		<i class="fa fa-twitter"></i>
 	</a>
 </li>
	<?php if(!empty($this->session->userdata('user_login'))){
	$is_presnt = favDetails(PIVOT_FEB_EVENT,$event['event_id'],'event_id');
	if($is_presnt == 'Yes'){
	$text = '<i class="fa fa-heart"></i>';
	}else{
	$text = '<i class="fa fa-heart-o"></i>';
	}?>
	<li><a id="fav_<?php echo $event['event_id']?>" onClick="return favourite_event(this.id);"><?php echo $text;?></a></li>
	<?php }else { ?>
	<li> <a href="#no-login-popup" data-toggle="modal"><i class="fa fa-heart-o"></i></a> </li>
	<?php }?>
 </ul>
 </div>
 </div>
 </div>
 <?php
	}
	}
	if(count($allBusiness) > 0){
	foreach($allBusiness as $business){
	?>
 <div class="col-lg-4 col-sm-6 col-cont eventTS" data-date-id="<?php echo $business['create_date']; ?>" data-city-id="<?php echo $business['city_id']; ?>" data-id="<?php echo strtolower($business['business_name']); echo strtolower($business['business_city']); ?>">
 <div class="single">
 <div class="city-image">
 <div class="image">
 <?php if(isset($business['business_image']) && !empty($business['business_image'])){?>
 <img src="<?php echo base_url('upload/business/').$business['business_image'];?>" alt=""> <?php }
 else{?>
 <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
 <?php }?>
 </div>
 <h4><?php echo ucwords(stripslashes(strip_tags($business['business_name'])));?></h4>
 <p><?php echo ucwords(stripslashes(strip_tags($business['business_description'])));?></p>
 <div class="overlay">
 <ul>
 <?php /*?><li><a href="<?php echo base_url('Home/category-business-data/').base64_encription($business['business_id']);?>">More</a></li><?php */?>
 <li><a href="<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>">Detail</a></li>
 <li><a href="<?php echo base_url('Home/news/').base64_encription($business['city_id']);?>">News</a></li>
 </ul>
 </div>
 </div>
 <div class="city-cntnt">
 <div class="cntnt">
 <p><?php echo ucwords(stripslashes(strip_tags($business['business_city'])));?></p>
 <!-- <p><?php echo date('dS M Y',strtotime($business['create_date']));?></p> -->
 <p><?php echo 'Space';?></p>
 </div>
 <ul class="social">
 <li><a target="_blank" href="https://www.linkedin.com/cws/share?url=<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>"><i class="fa fa-linkedin"></i></a></li>
 <li><a href="javascript:void()" onclick="shareFb('<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>')"><i class="fa fa-facebook"></i></a></li>
 <li><a target="_bank" href="https://twitter.com/intent/tweet?text=<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>"><i class="fa fa-twitter"></i></a></li>
 <?php if(!empty($this->session->userdata('user_login'))){
$is_presnt = favDetails(PIVOT_FEB_STORE,$business['business_id'],'business_id');
if($is_presnt == 'Yes'){
$text = '<i class="fa fa-heart"></i>';
}else{
$text = '<i class="fa fa-heart-o"></i>';
}
?>
<li><a id="favv_<?php echo $business['business_id']?>" onClick="return favourite_store(this.id);" alt="Favourite"><?php echo $text;?></a></li>
<?php
}else {
?>
<li> <a href="#no-login-popup" data-toggle="modal" alt="Favourite"><i class="fa fa-heart-o"></i></a> </li>
<?php
}
?>
 </ul>
 </div>
 </div>
 </div>
 <?php
	}
	}
	}else{
	if(!empty($category_id) and ($city_id == 0)){
	$allEvent = $this->urs->get_category_details($category_id);
	$allBusiness = $this->urs->get_category_details_business($category_id);
	if(count($allEvent) > 0){
	foreach($allEvent as $event){
	?>
 <div class="col-lg-4 col-sm-6 col-cont eventTS" data-date-id="<?php echo $event['create_date']; ?>" data-city-id="<?php echo $event['city_id']; ?>" data-id="<?php echo strtolower($event['event_name']); echo strtolower($event['event_city']); echo specific_category($event['event_id']);?>">
 <div class="single">
 <div class="city-image">
 <div class="image">
 <?php if(isset($event['event_banner']) && !empty($event['event_banner'])){?>
 <img src="<?php echo base_url('upload/events/').$event['event_banner'];?>" alt="">
 <?php }
 else{?>
 <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
 <?php }?>
 </div>
 <h4><?php echo ucwords($event['event_name']);?></h4>
 <p><?php echo ucwords(stripslashes(strip_tags($event['event_description'])));?></p>
 <div class="overlay">
 <ul>
 <?php /*?><li><a href="<?php echo base_url('Home/category-event/').base64_encription($event['event_id']);?>">More</a></li><?php */?>
 <li><a href="<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>">Detail</a></li>
 <li><a href="<?php echo base_url('Home/news/').base64_encription($event['city_id']);?>">News</a></li>
 </ul>
 </div>
 </div>
 <div class="city-cntnt">
 <div class="cntnt">
 <p><?php echo $event['event_city'];?></p>
 <p><?php echo date('dS M Y',strtotime($event['event_date_from']));?></p>
 </div>
 <ul class="social">
 <li><a target="_bank" href="https://www.linkedin.com/cws/share?url=<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>"><i class="fa fa-linkedin"></i></a></li>
 <li><a href="javascript:void()" onclick="shareFb('<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>')"><i class="fa fa-facebook"></i></a></li>
 <li><a target="_bank" href="https://twitter.com/intent/tweet?text=<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>"><i class="fa fa-twitter"></i></a></li>
	<?php if(!empty($this->session->userdata('user_login'))){
	$is_presnt = favDetails(PIVOT_FEB_EVENT,$event['event_id'],'event_id');
	if($is_presnt == 'Yes'){
	$text = '<i class="fa fa-heart"></i>';
	}else{
	$text = '<i class="fa fa-heart-o"></i>';
	}?>
	<li><a id="fav_<?php echo $event['event_id']?>" onClick="return favourite_event(this.id);"><?php echo $text;?></a></li>
	<?php }else { ?>
	<li> <a href="#no-login-popup" data-toggle="modal"><i class="fa fa-heart-o"></i></a> </li>
	<?php }?>
 </ul>
 </div>
 </div>
 </div>
 <?php
	}
	}
	if(count($allBusiness) > 0){
	foreach($allBusiness as $business){
	?>
 <div class="col-lg-4 col-sm-6 col-cont eventTS" data-date-id="<?php echo $business['create_date']; ?>" data-city-id="<?php echo $business['city_id']; ?>" data-id="<?php echo strtolower($business['business_name']); echo strtolower($business['business_city']); echo specific_category($business['business_id']); ?>">
 <div class="single">
 <div class="city-image">
 <div class="image">
 <?php if(isset($business['business_image']) && !empty($business['business_image'])){?>
 <img src="<?php echo base_url('upload/business/').$business['business_image'];?>" alt=""> <?php }
 else{?>
 <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
 <?php }?>
 </div>
 <h4><?php echo ucwords(stripslashes(strip_tags($business['business_name'])));?></h4>
 <p><?php echo ucwords(stripslashes(strip_tags($business['business_description'])));?></p>
 <div class="overlay">
 <ul>
 <?php /*?><li><a href="<?php echo base_url('Home/category-business-data/').base64_encription($business['business_id']);?>">More</a></li><?php */?>
 <li><a href="<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>">Detail</a></li>
 <li><a href="<?php echo base_url('Home/news/').base64_encription($business['city_id']);?>">News</a></li>
 </ul>
 </div>
 </div>
 <div class="city-cntnt">
 <div class="cntnt">
 <p><?php echo ucwords(stripslashes(strip_tags($business['business_city'])));?></p>
 <!-- <p><?php echo date('dS M Y',strtotime($business['create_date']));?></p> -->
 <p><?php echo 'Space';?></p>
 </div>
 <ul class="social">
 <li><a target="_bank" href="https://www.linkedin.com/cws/share?url=<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>"><i class="fa fa-linkedin"></i></a></li>
 <li><a href="javascript:void()" onclick="shareFb('<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>')"><i class="fa fa-facebook"></i></a></li>
 <li><a target="_bank" href="https://twitter.com/intent/tweet?text=<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>"><i class="fa fa-twitter"></i></a></li>
 <?php if(!empty($this->session->userdata('user_login'))){
$is_presnt = favDetails(PIVOT_FEB_STORE,$business['business_id'],'business_id');
if($is_presnt == 'Yes'){
$text = '<i class="fa fa-heart"></i>';
}else{
$text = '<i class="fa fa-heart-o"></i>';
}
?>
<li><a id="favv_<?php echo $business['business_id']?>" onClick="return favourite_store(this.id);" alt="Favourite"><?php echo $text;?></a></li>
<?php
}else {
?>
<li> <a href="#no-login-popup" data-toggle="modal" alt="Favourite"><i class="fa fa-heart-o"></i></a> </li>
<?php
}
?>
 </ul>
 </div>
 </div>
 </div>
 <?php
	}
	}
	}else{
	if(($category_id == 0) and !empty($city_id)){
	$allEvent 		= $this->urs->getCountryDetails(VIEW_EVENT,'event_id');
	$allBusiness 	= $this->urs->getCountryDetails(VIEW_BUSINESS,'business_id');
	if(count($allEvent) > 0){
	foreach($allEvent as $event){
	if($city_id == $event['city_id']){
	?>


	<div class="col-lg-4 col-sm-6 col-cont eventTS" data-date-id="<?php echo $event['create_date']; ?>" data-city-id="<?php echo $event['city_id']; ?>" data-id="<?php echo strtolower($event['event_name']); echo strtolower($event['event_city']); echo specific_category($event['event_id']);?>">
 <div class="single">
 <div class="city-image">
 <div class="image">
 <?php if(isset($event['event_banner']) && !empty($event['event_banner'])){?>
 <img src="<?php echo base_url('upload/events/').$event['event_banner'];?>" alt="">
 <?php }
 else{?>
 <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
 <?php }?>
 </div>
 <h4><?php echo ucwords($event['event_name']);?></h4>
 <p><?php echo ucwords(stripslashes(strip_tags($event['event_description'])));?></p>
 <div class="overlay">
 <ul>
 <?php /*?><li><a href="<?php echo base_url('Home/category-event/').base64_encription($event['event_id']);?>">More</a></li><?php */?>
 <li><a href="<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>">Detail</a></li>
 <li><a href="<?php echo base_url('Home/news/').base64_encription($event['city_id']);?>">News</a></li>
 </ul>
 </div>
 </div>
 <div class="city-cntnt">
 <div class="cntnt">
 <p><?php echo $event['event_city'];?></p>
 <p><?php echo date('dS M Y',strtotime($event['event_date_from']));?></p>
 </div>
 <ul class="social">

 <li>
 <a target="_bank" href="https://www.linkedin.com/cws/share?url=<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>">
 	<i class="fa fa-linkedin"></i>
 </a>
</li>

 <li><a href="javascript:void()" onclick="shareFb('<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>')"><i class="fa fa-facebook"></i></a></li>
 
 <li>
 	<a target="_bank" href="https://twitter.com/intent/tweet?text=<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>"><i class="fa fa-twitter"></i></a>
 </li>
	<?php if(!empty($this->session->userdata('user_login'))){
	$is_presnt = favDetails(PIVOT_FEB_EVENT,$event['event_id'],'event_id');
	if($is_presnt == 'Yes'){
	$text = '<i class="fa fa-heart"></i>';
	}else{
	$text = '<i class="fa fa-heart-o"></i>';
	}?>
	<li><a id="fav_<?php echo $event['event_id']?>" onClick="return favourite_event(this.id);"><?php echo $text;?></a></li>
	<?php }else { ?>
	<li> <a href="#no-login-popup" data-toggle="modal"><i class="fa fa-heart-o"></i></a> </li>
	<?php }?>
 </ul>
 </div>
 </div>
 </div>





	<?php
	}
	}
	}
	if(count($allBusiness) > 0){
	foreach($allBusiness as $business){
	if($city_id == $business['city_id']){
	?>


<div class="col-lg-4 col-sm-6 col-cont eventTS" data-date-id="<?php echo $business['create_date']; ?>" data-city-id="<?php echo $business['city_id']; ?>" data-id="<?php echo strtolower($business['business_name']); echo strtolower($business['business_city']); echo specific_category($business['business_id']); ?>">
 <div class="single">
 <div class="city-image">
 <div class="image">
 <?php if(isset($business['business_image']) && !empty($business['business_image'])){?>
 <img src="<?php echo base_url('upload/business/').$business['business_image'];?>" alt=""> <?php }
 else{?>
 <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
 <?php }?>
 </div>
 <h4><?php echo ucwords(stripslashes(strip_tags($business['business_name'])));?></h4>
 <p><?php echo ucwords(stripslashes(strip_tags($business['business_description'])));?></p>
 <div class="overlay">
 <ul>
 <?php /*?><li><a href="<?php echo base_url('Home/category-business-data/').base64_encription($business['business_id']);?>">More</a></li><?php */?>
 <li><a href="<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>">Detail</a></li>
 <li><a href="<?php echo base_url('Home/news/').base64_encription($business['city_id']);?>">News</a></li>
 </ul>
 </div>
 </div>
 <div class="city-cntnt">
 <div class="cntnt">
 <p><?php echo ucwords(stripslashes(strip_tags($business['business_city'])));?></p>
 <!-- <p><?php echo date('dS M Y',strtotime($business['create_date']));?></p> -->
 <p><?php echo 'Space';?></p>
 </div>
 <ul class="social">
 <li><a target="_bank" href="https://www.linkedin.com/cws/share?url=<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>">
 	<i class="fa fa-linkedin"></i></a></li>
 <li><a href="javascript:void()" onclick="shareFb('<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>')"><i class="fa fa-facebook"></i></a></li>
 <li><a target="_bank" href="https://twitter.com/intent/tweet?text=<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>"><i class="fa fa-twitter"></i></a></li>
 <?php if(!empty($this->session->userdata('user_login'))){
$is_presnt = favDetails(PIVOT_FEB_STORE,$business['business_id'],'business_id');
if($is_presnt == 'Yes'){
$text = '<i class="fa fa-heart"></i>';
}else{
$text = '<i class="fa fa-heart-o"></i>';
}
?>
<li><a id="favv_<?php echo $business['business_id']?>" onClick="return favourite_store(this.id);" alt="Favourite"><?php echo $text;?></a></li>
<?php
}else {
?>
<li> <a href="#no-login-popup" data-toggle="modal" alt="Favourite"><i class="fa fa-heart-o"></i></a> </li>
<?php
}
?>
 </ul>
 </div>
 </div>
 </div>



 	<?php
	}
	}
	}
	}else{
	if(!empty($category_id) and !empty($city_id)){
	$allEvent = $this->urs->get_category_details($category_id);
	$allBusiness = $this->urs->get_category_details_business($category_id);
	if(count($allEvent) > 0){
	foreach($allEvent as $event){
	if($city_id == $event['city_id']){
	?>
 <div class="col-lg-4 col-sm-6 col-cont eventTS" data-date-id="<?php echo $event['create_date']; ?>" data-city-id="<?php echo $event['city_id']; ?>" data-id="<?php echo strtolower($event['event_name']); echo strtolower($event['event_city']); echo specific_category($event['event_id']);?>">
 <div class="single">
 <div class="city-image">
 <div class="image">
 <?php if(isset($event['event_banner']) && !empty($event['event_banner'])){?>
 <img src="<?php echo base_url('upload/events/').$event['event_banner'];?>" alt="">
 <?php }
 else{?>
 <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
 <?php }?>
 </div>
 <h4><?php echo ucwords($event['event_name']);?></h4>
 <p><?php echo ucwords(stripslashes(strip_tags($event['event_description'])));?></p>
 <div class="overlay">
 <ul>
 <?php /*?><li><a href="<?php echo base_url('Home/category-event/').base64_encription($event['event_id']);?>">More</a></li><?php */?>
 <li><a href="<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>">Detail</a></li>
 <li><a href="<?php echo base_url('Home/news/').base64_encription($event['city_id']);?>">News</a></li>
 </ul>
 </div>
 </div>
 <div class="city-cntnt">
 <div class="cntnt">
 <p><?php echo $event['event_city'];?></p>
 <p><?php echo date('dS M Y',strtotime($event['event_date_from']));?></p>
 </div>
 <ul class="social">
 <li><a target="_bank" href="https://www.linkedin.com/cws/share?url=<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>"><i class="fa fa-linkedin"></i></a></li>
 <li><a href="javascript:void()" onclick="shareFb('<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>')"><i class="fa fa-facebook"></i></a></li>
 <li><a target="_bank" href="https://twitter.com/intent/tweet?text=<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>"><i class="fa fa-twitter"></i></a></li>
	<?php if(!empty($this->session->userdata('user_login'))){
	$is_presnt = favDetails(PIVOT_FEB_EVENT,$event['event_id'],'event_id');
	if($is_presnt == 'Yes'){
	$text = '<i class="fa fa-heart"></i>';
	}else{
	$text = '<i class="fa fa-heart-o"></i>';
	}?>
	<li><a id="fav_<?php echo $event['event_id']?>" onClick="return favourite_event(this.id);"><?php echo $text;?></a></li>
	<?php }else { ?>
	<li> <a href="#no-login-popup" data-toggle="modal"><i class="fa fa-heart-o"></i></a> </li>
	<?php }?>
 </ul>
 </div>
 </div>
 </div>
 <?php
	}
	}
	}
	if(count($allBusiness) > 0){
	foreach($allBusiness as $business){
	if($city_id == $business['city_id']){
	?>
 <div class="col-lg-4 col-sm-6 col-cont eventTS" data-date-id="<?php echo $business['create_date']; ?>" data-city-id="<?php echo $business['city_id']; ?>" data-id="<?php echo strtolower($business['business_name']); echo strtolower($business['business_city']); echo specific_category($business['business_id']); ?>">
 <div class="single">
 <div class="city-image">
 <div class="image">
 <?php if(isset($business['business_image']) && !empty($business['business_image'])){?>
 <img src="<?php echo base_url('upload/business/').$business['business_image'];?>" alt=""> <?php }
 else{?>
 <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
 <?php }?>
 </div>
 <h4><?php echo ucwords(stripslashes(strip_tags($business['business_name'])));?></h4>
 <p><?php echo ucwords(stripslashes(strip_tags($business['business_description'])));?></p>
 <div class="overlay">
 <ul>
 <?php /*?><li><a href="<?php echo base_url('Home/category-business-data/').base64_encription($business['business_id']);?>">More</a></li><?php */?>
 <li><a href="<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>">Detail</a></li>
 <li><a href="<?php echo base_url('Home/news/').base64_encription($business['city_id']);?>">News</a></li>
 </ul>
 </div>
 </div>
 <div class="city-cntnt">
 <div class="cntnt">
 <p><?php echo ucwords(stripslashes(strip_tags($business['business_city'])));?></p>
 <!-- <p><?php echo date('dS M Y',strtotime($business['create_date']));?></p> -->
 <p><?php echo 'Space';?></p>
 </div>
 <ul class="social">
 <li><a target="_bank" href="https://www.linkedin.com/cws/share?url=<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>"><i class="fa fa-linkedin"></i></a></li>
 <li><a href="javascript:void()" onclick="shareFb('<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>')"><i class="fa fa-facebook"></i></a></li>
 <li>
 <a target="_bank" href="https://twitter.com/intent/tweet?text=<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>"><i class="fa fa-twitter"></i></a>
 </li>
 <?php if(!empty($this->session->userdata('user_login'))){
$is_presnt = favDetails(PIVOT_FEB_STORE,$business['business_id'],'business_id');
if($is_presnt == 'Yes'){
$text = '<i class="fa fa-heart"></i>';
}else{
$text = '<i class="fa fa-heart-o"></i>';
}
?>
<li><a id="favv_<?php echo $business['business_id']?>" onClick="return favourite_store(this.id);" alt="Favourite"><?php echo $text;?></a></li>
<?php
}else {
?>
<li> <a href="#no-login-popup" data-toggle="modal" alt="Favourite"><i class="fa fa-heart-o"></i></a> </li>
<?php
}
?>
 </ul>
 </div>
 </div>
 </div>
 <?php
	}
	}
	}
	}
	}
	}
	}
}
//====================================================================================================
public function GetProductCategoryData()
{
	$post_data = $this->input->post();
	$cat_id = base64_decription($post_data['cateid']);
	$detailSection['categoryData'] = $this->urs->getSameProductCategoryData($cat_id);
	echo json_encode($detailSection['categoryData']);
}
//====================================================================================================
public function serach_data()
{
	$get_search_query = $this->security->xss_clean($this->input->post('serach_query'));
	if(!empty($get_search_query)){
	$data = $this->urs->searchCity($get_search_query);
	if($data == FALSE){
	$this->index();
	}elseif($data == 'N-A'){
	$detailSection['city_id'] = 0;
	$detailSection['allEvent'] 		= $this->urs->getCountryDetails(VIEW_EVENT,'event_id');
	$detailSection['allBusiness'] 	= $this->urs->getCountryDetails(VIEW_BUSINESS,'business_id');
	$detailSection['allCategory'] 	= $this->urs->getFullDetails(CATEGORY,'category_type','event','category_id');
	$detailSection['allCity'] 		= $this->urs->getCountryCityNames(CITY,'city_status','Active');
	$detailSection['city_d'] 		= array();
	$this->load->view("cities-inner",$detailSection);
	}else{
	$this->city_inner(base64_encription($data[0]['city_id']));
	}
	}else{
	$this->index();
	}
}
public function profileProfile($id='')
{
if(!empty($id))
{
$user_id = base64_decription($id);
$valid_id = $this->urs->CheckDatas(USER,'user_id',$user_id);
if(!empty($valid_id))
{
$user_address = $this->urs->getFullDetails(ADDRESS,'user_id',$user_id,'address_id');
$listdata['all_events']= $this->urs->getFullUserDetails(VIEW_EVENT,$user_id,'user_id');
$listdata['all_business']= $this->urs->getFullUserDetails(VIEW_BUSINESS,$this->session->userdata('user_id'),'user_id');
$listdata['all_meetup']= $this->urs->getDetailsbyLimitCount(MEET_UP,$user_address[0]['city_id'],'city_id','status','meet_up_id');
$listdata['ratting_data']= $this->urs->getFeedbackRatting(STORE_FEEDBACK,$user_id,'user_id');
$listdata['coulmnName']= $this->urs->getCoulmnName(USER_DETAILS);
$listdata['permision_data']= $this->urs->getFullUserDetails(FIELD_PERMISION,$user_id,'user_id');
$tempNotPermittedField = array_map(function($a)
{
return $a['field_permision_name'];
}, $listdata['permision_data']);
$tempPermittedField = array();
foreach($listdata['coulmnName'] as $k => $v)
{
if(!in_array($v['COLUMN_NAME'], $tempNotPermittedField))
{
array_push($tempPermittedField, $v['COLUMN_NAME']);
}
}
$listdata['user_details'] = $this->urs->Permission_User(USER_DETAILS,$tempPermittedField,$user_id);
$this->load->view('dashboard/user-profile',$listdata);
}
else{
redirect("Home/index","refresh");
}
}
else{
redirect("Home/index","refresh");
}
}
public function getMe()
{
	$get_id = $this->input->post('id');
	$user_name_xpx = $this->input->post('user_name_xpx');
	$user_email_xpx = $this->input->post('user_email_xpx');
	$user_ph_xpx = $this->input->post('user_ph_xpx');
	$business_name = $this->input->post('business_name');
	if(!empty($get_id) and !empty($user_name_xpx) and !empty($user_email_xpx) and !empty($user_ph_xpx)){
	$this->load->library('email');
	$this->email->from('admin@admin.com', 'Club Mondain');
	$this->email->to('go@clubmondain.com');
	$this->email->cc('aquadevjd@gmail.com');
	$this->email->subject('The company belong to me');
	$html_data = "";
	$html_data .= "Business Name:".' '.$business_name;
	$html_data .= "Name:".' '.$user_name_xpx;
	$html_data .= "Email:".' '.$user_email_xpx;
	$html_data .= "Phone:".' '.$user_ph_xpx;
	$this->email->message($html_data);
	if($this->email->send())
	{
	echo "Dear sir/madam, Thank you for your message. Your message is sent to Club Mondain. The Travel Support office will contact you in 48 hours. Enjoy your travel, Club Mondain (go@clubmondain.com) ";
	}else{
	echo "Sorry!! some thing went wrong!! please try after some time";
	}
	}else{
	echo "The filds are required";
	}
}
public function gcna()
{
	$id = $this->input->post('city_id');
	$get_details = $this->dashs->getListDatas(CITY,'city_id',$id);
	echo $get_details[0]['city_name'];
}
}//END CLASS
