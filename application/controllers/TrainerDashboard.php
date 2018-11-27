<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TrainerDashboard extends CI_Controller {
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
$this->load->model('Dashboards','dashs');//Replace the Dashboards Model Name
$this->load->helper('filter');
$this->load->helper('country');
$this->load->model('Users','urs'); //Replace the Users Model Name
$this->load->model('Dashboards','dashs'); //Replace the Dashboard Model Name
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getSessionValidate()
{
if($this->session->userdata('user_type') != 'T')
{
redirect('Main','refresh');
}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function index($msg='')
{
if(isset($membership))
{
redirect('Userdashboard/membership','refresh');
}
$user_id = $this->session->userdata('user_id');
$listdata['all_business'] = $this->urs->getFullDetails(BUSINESS,'user_id',$user_id,'business_id');
$listdata['all_events'] = $this->urs->getFullDetails(VIEW_EVENT,'user_id',$user_id,'event_id');
$listdata['full_profile'] = $this->urs->getUserDetails(USER_DETAILS,USER,'email',$user_id);
$listdata['catdata'] = $this->urs->getCountryDetails(CATEGORY,'category_id');
$listdata['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');
$listdata['city'] = $this->urs->getCountryDetails(CITY,'city_id');
$listdata['count_event'] = count($listdata['all_events']);
$this->session->set_userdata('user_details',$listdata['full_profile']);
$listdata['my_blog'] = $this->dashs->get_blog_full_admin(BLOG_NEWS,COUNTRY,CITY,$this->session->userdata('user_id'));
$listdata['all_meetup'] = $this->get_meet_up_data();
$listdata['all_fav_events'] = array();
$this->load->view('dashboard/dashboard',$listdata);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_meet_up_data()
{
// Meet Up Calculationm
$user_address = $this->urs->getFullDetails(ADDRESS,'user_id',$this->session->userdata('user_id'),'address_id');
return $this->urs->getDetailsbyLimitCount(MEET_UP,$user_address[0]['city_id'],'city_id','status','meet_up_id');
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
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
$msgSection['all_meetup'] = $this->get_meet_up_data();
$this->load->view('trainer/profile-update-form',$msgSection);
}
//+++++++++++++++++++++++++++++++++++++++ PERSONAL TRAINER UPDATE +++++++++++++++++++++++//
public function update_personal_trainer_reg()
{
$user_id = $this->session->userdata('user_id');
if(!empty($user_id)){
$this->getSessionValidate();
$this->form_validation->set_rules('fname','First Name','required');
$this->form_validation->set_rules('lname','Last Name','required');
$this->form_validation->set_rules('email','Email','required');
$this->form_validation->set_rules('dob_year','Year','required');
$this->form_validation->set_rules('dob_month','Month','required');
$this->form_validation->set_rules('dob_date','Date','required');
if($this->form_validation->run() == FALSE)
{
$msg = validation_errors();
$msgclass = 'alert-danger';
$this->edit_Profile($msg,$msgclass);
}else
{
$post_data = $this->input->post();
if(count($post_data)> 0)
{
$update_date =  date("Y-m-d");
//==================================================================================
$fname          = $this->security->xss_clean(escape_str($post_data['fname']));
$lname          = $this->security->xss_clean(escape_str($post_data['lname']));
$email          = $this->security->xss_clean(escape_str($post_data['email']));
$phone          = $this->security->xss_clean(escape_str($post_data['phone']));
$dob_date       = $this->security->xss_clean(escape_str($post_data['dob_date']));
$dob_month      = $this->security->xss_clean(escape_str($post_data['dob_month']));
$dob_year       = $this->security->xss_clean(escape_str($post_data['dob_year']));
$street_adr     = $this->security->xss_clean(escape_str($post_data['street_adr']));
$street_adr2    = $this->security->xss_clean(escape_str($post_data['street_adr2']));
$city_id        = $this->security->xss_clean(escape_str($post_data['city']));
$state          = $this->security->xss_clean(escape_str($post_data['state']));
$postal_code    = $this->security->xss_clean(escape_str($post_data['postal_code']));
$country_id     = $this->security->xss_clean(escape_str($post_data['country']));
$about_yourself = $this->security->xss_clean(escape_str($post_data['about_yourself']));
$experience     = $this->security->xss_clean(escape_str($post_data['experience']));

if(!empty($post_data['field_permision'])){
$mp = $this->security->xss_clean(escape_str($post_data['field_permision']));	
$fp = implode(",",$mp);	
}else{
$fp = '';	
}

//==================================================================================
$url = urlToDomain($post_data['user_facebook']);
$user_facebook = 'http://'.$url;
$url = urlToDomain($post_data['user_instagram']);
$user_instagram = 'http://'.$url;
$url = urlToDomain($post_data['user_twitter']);
$user_twitter = 'http://'.$url;
//==================================================================================
$dob = $dob_year.'-'.$dob_month.'-'.$dob_date;
//==================================================================================
if(isset($_FILES['profile_pic']['name']) and !empty($_FILES['profile_pic']['name'])){
$time = time();
$path = "./upload/profile/";
$get_profile_pic_file_name_1 = $_FILES['profile_pic']['name'];
$get_profile_pic_temp_name_1 = $_FILES['profile_pic']['tmp_name'];
$get_profile_pic_file_type_1 = $_FILES['profile_pic']['type'];
$get_profile_pic_file_erro_1 = $_FILES['profile_pic']['error'];
$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;
$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1;
move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
}else{
$old_image = $this->urs->getFullNameDetails(USER_DETAILS,'user_image','user_id',$user_id);
$get_profile_pic_modi_name_1 = $old_image[0]['user_image'];
}
//==================================================================================
$this->__alldata = array(
	'email' => $email,
	'update_date' => $update_date,
);
$last_insert_data = $this->urs->UpdateAllDatas($this->__alldata,$user_id,USER);
//==================================================================================
$this->__alldata = array(
	'user_id' 				       => $user_id,
	'first_name' 			       => $fname,
	'last_name'				       => $lname,
	'phone'					         => $phone,
	'user_image'			       => $get_profile_pic_modi_name_1,
	'dob' 					         => $dob,
	'trainer_experience' 	   => $experience,
	'trainer_about_yourself' => $about_yourself,
	'user_facebook' 	 	     => $user_facebook,
	'user_instagram' 		     => $user_instagram,
	'fild_permission'         => $fp,
	'user_twitter' 	 	 	     => $user_twitter,
	'update_date' 			     => $update_date,
);
$detail_insert_data = $this->urs->UpdateAllDatas($this->__alldata,$user_id,USER_DETAILS);
//==================================================================================
$this->__alldata = array(
	'user_id'     => $user_id,
	'street_address_1' => $street_adr,
	'street_address_2' => $street_adr2,
	'city_id'     => $city_id,
	'state'       => $state,
	'postal_code' => $postal_code,
	'country_id'  => $country_id,
);
$address_insert_data = $this->urs->UpdateAllDatas($this->__alldata,$user_id,ADDRESS);
//==================================================================================
$msg = 'Your Profile Update Successfully';
$msgclass = 'alert-success';
$this->edit_Profile($msg,$msgclass);
//==================================================================================
}else{
$msg = 'Something went wrong !! Please try after some time';
$msgclass = 'alert-danger';
$this->edit_Profile($msg,$msgclass);
}
}
}else{
$msg = 'Something went wrong !! Please try after some time';
$msgclass = 'alert-danger';
$this->edit_Profile($msg,$msgclass);
}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
public function profile_view($msg='',$msg_class='')
{
$user_id = $this->session->userdata('user_details');
$field_name = 'trainer_id_FK';
$listdata['all_events']= $this->urs->get_city_country_details(EVENT,CITY,COUNTRY,'event_city_FK','event_country_FK',$field_name,$user_id[0]['id']);
$listdata['all_data']= $this->urs->get_city_country_details(BUSINESS,CITY,COUNTRY,'business_city_FK','business_country_FK',$field_name,$user_id[0]['id']);
$listdata['all_profile_data'] = $this->urs->getFullDetails(TRAINER,'id',$user_id[0]['id']);
$this->load->view('dashboard/user-profile',$listdata);
}
}//END CLASS
