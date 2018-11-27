<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserDashboard extends CI_Controller
{
	private $__username;
	private $__password;
	private $__email;
	private $__data;
	private $__sessionData;
	private $__session_details;
	private $__all_data;
	private $__profile_data;
	private $__session_type;

//+++++++++++++++++++++++++++++++++ CONSTRUCTUR CALLING +++++++++++++++++++++++++++++++++++++++
public function __construct()
{
	parent::__construct();
	$this->getSessionValidate();
	//$this->sessionCheck();
	$this->load->helper('filter');
	$this->load->helper('country');
	$this->load->model('Users','urs'); //Replace the Users Model Name
	$this->load->model('Dashboards','dashs'); //Replace the Dashboard Model Name
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getSessionValidate()
{
	if($this->session->userdata('user_type') != 'M')
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

	//$listdata['all_events'] =$this->urs->get_city_country_details(EVENT,CITY,COUNTRY,'event_city_FK','event_country_FK','members_id_FK',$user_id[0]['id']);

	$listdata['all_business'] = $this->urs->getFullDetails(BUSINESS,'user_id',$user_id,'business_id');
	$listdata['all_events'] = $this->urs->getFullDetails(VIEW_EVENT,'user_id',$user_id,'event_id');
	$listdata['full_profile'] = $this->urs->getUserDetails(USER_DETAILS,USER,'email',$user_id);
	$listdata['catdata'] = $this->urs->getFullDetails(CATEGORY,'category_type','event','category_id');
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
//++++++++++++++++++++++++++++++++ View Page Only ++++++++++++++++++++++++++++++++++++++++
public function dashboard($listdata)
{
	$this->load->view('dashboard/dashboard',$listdata);
}
/*//##############################################################################################################
public function user_registration($msg='',$msg_class='')
{
	if(!empty($msg))
	{
		$msgSection['msg'] = $msg;
		$msgSection['msg_class'] = $msg_class;
	}
	$id = $this->session->userdata('last_id');
	$msgSection['id'] = $id;
	$msgSection['all_data'] = $this->urs->getUserDetails(USER_DETAILS,USER,'email',$id);
	$msgSection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');
	$msgSection['catdata'] = $this->urs->getCountryDetails(CATEGORY,'category_id');
	$this->load->view('user-registration',$msgSection);
}
//+++++++++++++++++++++++++++++++++++++++++++++ Update User Registration +++++++++++++++++++++++++++++++++//
public function update_user_registration()
{
	$user_id = $this->session->userdata('last_id');
	$this->form_validation->set_rules('fname', 'First Name','required');
	$this->form_validation->set_rules('lname', 'Last Name','required');
	$this->form_validation->set_rules('email','Email','required');
	$this->form_validation->set_rules('dob_year', 'DOB Year','required');
	$this->form_validation->set_rules('dob_month', 'DOB Month','required');
	$this->form_validation->set_rules('dob_date','DOB Date','required');
	$this->form_validation->set_rules('cat_id[]','Category','required|is_natural');
	$this->form_validation->set_rules('privacy_policy','Privacy Policy','required');
	$this->form_validation->set_rules('membership_rules','Membership Rules','required');
	$post_data = $this->input->post();
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msgclass = 'alert-danger';
		$this->user_registration($msg,$msgclass);
	}
	else
	{
		if(count($post_data) > 1)
		{
			$date_reg =  date("Y-m-d");
			$fname = $post_data['fname'];
			$lname = $post_data['lname'];
			$email = $post_data['email'];
			$phone = $post_data['phone'];
			$street = $post_data['street'];
			$city = $post_data['city'];
			$country = $post_data['country'];
			$dob_year = $post_data['dob_year'];
			$dob_month = $post_data['dob_month'];
			$dob_date = $post_data['dob_date'];
			$dob = $dob_year.'-'.$dob_month.'-'.$dob_date;//Concate Daate Of Birth
			$cat_id = $post_data['cat_id'];
			$address = $post_data['address'];
			$other = $post_data['other'];
			$membership_rules = $post_data['membership_rules'];
			$privacy_policy = $post_data['privacy_policy'];
			$create_date =  date("Y-m-d");
			if(isset($membership_rules))
			{
				$membership_rules = 1;
			}
			else
			{
				$membership_rules = '';
			}
			if(isset($privacy_policy))
			{
				$privacy_policy = 1;
			}
			else
			{
				$privacy_policy = '';
			}
			//File Upload
			$time = time();
			$path = "./upload/profile/";
			$get_profile_pic_file_name_1 = $_FILES['profile_pic']['name'];
			$get_profile_pic_temp_name_1 = $_FILES['profile_pic']['tmp_name'];
			$get_profile_pic_file_type_1 = $_FILES['profile_pic']['type'];
			$get_profile_pic_file_erro_1 = $_FILES['profile_pic']['error'];
			$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;
			$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1;

			///////////////////////// INSERTION IN DATABASE FIELD /////////////////////////////
			if(isset($get_profile_pic_file_name_1) && !empty($get_profile_pic_file_name_1))
			{
				move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
			}
			else{
					$get_profile_pic_modi_name_1 = '';
				}
				$this->__all_data = array(
				'email' => $email,);
				$updateData = $this->urs->UpdateAllDatas($this->__all_data,$user_id,USER);
			if(isset($updateData) && !empty($updateData)){
			$this->__all_data = array(
				  'user_id' => $user_id,
				  'first_name' => $fname,
				  'last_name' => $lname,
				  'phone' => $phone,
				  'dob' => $dob,
				  'user_image' => $get_profile_pic_modi_name_1,
				  'member_other' => $other,
				  'membership_rules' => $membership_rules,
				  'privacy_policy' => $privacy_policy,
				  'membership_id' => $this->session->userdata('membership_id'),
				  'create_date'=>$create_date
				);
				}//user details updation
		$updateDetailsData = $this->urs->UpdateAllDatas($this->__all_data,$user_id,USER_DETAILS);
		if(isset($updateDetailsData) && !empty($updateDetailsData)){
		$this->__all_data = array(
				  'user_id' => $user_id,
				  'city_id' => $city,
				  'street_address_1' => $street,
				  'country_id' => $country,
				  'street_address_2' => $address,
				  );
		}//Address updation
		$insertDetailsData = $this->urs->InsertDatas(ADDRESS,$this->__all_data);
		if(isset($updateDetailsData) && !empty($updateDetailsData)){
		$impcategory = '';
		//$impcategory = implode(',',$cat_id);
			if(!empty ($cat_id)){
				foreach($cat_id as $cat_id){
				$this->__all_data = array(
				'category_id' => $cat_id,
				'user_id' => $user_id
				);
					$insertData = $this->urs->InsertDatas(PIVOT_INTEREST_CATEGORY,$this->__all_data);
				}
			}
		}//Category Updation
		}//END MEMBER UPDATE
	    	$this->session->unset_userdata('user_id');
		//$this->session->set_userdata('user_id',$user_id);
		//$this->__alldata = $this->urs->getFullUserDetails(USER,$user_id,'user_id');
		if($updateData)
		{
			$this->session->set_userdata('user_id',$user_id);
			$msgcontain['msg'] = "User Successfully Updated";
			$msgcontain['msgclass'] = "alert-success";
			$msgcontain['user_value'] = 'member';
		}
		else
		{
			$msg = "Error Occur";
			$msgclass = 'alert-danger';
		}
		 $this->session->unset_userdata('last_id');
		 redirect('Main/redirect_specific_user','refresh');
	}
}*/
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
$msgSection['country']      = $this->urs->getCountryDetails(COUNTRY,'country_id');
$msgSection['city']         = $this->urs->getCountryDetails(CITY,'city_id');
$msgSection['catdata']      = $this->urs->getFullDetails(CATEGORY,'category_type','event','category_id');
$msgSection['user_catdata'] = $this->urs->getFullDetails('cmd_pivot_user_interest_category','user_id',$user_id,'pivot_user_interest_category_id');
$msgSection['all_meetup']   = $this->get_meet_up_data();
$this->load->view('dashboard/profile-update-form',$msgSection);
}
//+++++++++++++++++++++++++++++++++++++ PROFILE UPDATE +++++++++++++++++++++++++++++++++++++++++//
public function profile_update()
{

$user_id = $this->session->userdata('user_id');
if(!empty($user_id)){
$this->form_validation->set_rules('fname', 'First Name','required');
$this->form_validation->set_rules('lname', 'Last Name','required');
$this->form_validation->set_rules('email','Email','required');
$this->form_validation->set_rules('dob_year', 'DOB Year','required');
$this->form_validation->set_rules('dob_month', 'DOB Month','required');
$this->form_validation->set_rules('dob_date','DOB Date','required');
$this->form_validation->set_rules('cat_id[]','Category','required|is_natural');
if($this->form_validation->run() == FALSE)
{
$msg = validation_errors();
$msgclass = 'alert-danger';
$this->edit_Profile($msg,$msgclass);
}else{

$post_data = $this->input->post();

if(count($post_data) > 0){

$date_reg     = $update_date = date("Y-m-d");
$fname 		  = $this->security->xss_clean(escape_str($post_data['fname']));
$lname 		  = $this->security->xss_clean(escape_str($post_data['lname']));
$email 		  = $this->security->xss_clean(escape_str($post_data['email']));
$phone 		  = $this->security->xss_clean(escape_str($post_data['phone']));
$city 		  = $this->security->xss_clean(escape_str($post_data['city']));
$country 	  = $this->security->xss_clean(escape_str($post_data['country']));
$dob_year 	  = $this->security->xss_clean(escape_str($post_data['dob_year']));
$dob_month 	  = $this->security->xss_clean(escape_str($post_data['dob_month']));
$dob_date 	  = $this->security->xss_clean(escape_str($post_data['dob_date']));
$cat_id 	  = $this->security->xss_clean(escape_str($post_data['cat_id']));
$address 	  = $this->security->xss_clean(escape_str($post_data['address']));
$street 	  = $this->security->xss_clean(escape_str($post_data['street1']));
$other 		  = $this->security->xss_clean(escape_str($post_data['other']));
$mcn          = $this->security->xss_clean(escape_str($post_data['member_company_name']));
$mft	      = $this->security->xss_clean(escape_str($post_data['member_function_title']));
$member_company_name = $mcn;
$member_function_title = $mft;

if(!empty($post_data['field_permision'])){
$mp = $this->security->xss_clean(escape_str($post_data['field_permision']));	
$fp = implode(",",$mp);	
}else{
$fp = '';	
}

$dob 		= $dob_year.'-'.$dob_month.'-'.$dob_date;
$url 				= urlToDomain($post_data['user_facebook']);
$user_facebook 		= 'http://'.$url;
$url 				= urlToDomain($post_data['user_instagram']);
$user_instagram 	= 'http://'.$url;
$url 				= urlToDomain($post_data['user_twitter']);
$user_twitter 		= 'http://'.$url;

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

// UPDATE TABLE ONE
$this->__all_data = array(
  'email' => $email
);
$updateData = $this->urs->UpdateAllDatas($this->__all_data,$user_id,USER);

//UPDATE TABLE TWO
$this->__all_data = array(
  'user_id' 		        => $user_id,
  'first_name'		        => $fname,
  'last_name' 		        => $lname,
  'phone'			        => $phone,
  'dob' 			        => $dob,
  'user_image' 		        => $get_profile_pic_modi_name_1,
  'member_other'	        => $other,
  'user_facebook' 	        => $user_facebook,
  'user_instagram' 	        => $user_instagram,
  'user_twitter' 	        => $user_twitter,
  'member_other'	        => $other,
  'member_company_name'     => $member_company_name,
  'member_function_title'   => $member_function_title,
  'fild_permission'         => $fp,
  'update_date'		        => $update_date
);
$updateDetailsData = $this->urs->UpdateAllDatas($this->__all_data,$user_id,USER_DETAILS);

//UPDATE TABLE THREE
$this->__all_data = array(
  'user_id' 		     => $user_id,
  'city_id' 		     => $city,
  'street_address_1'     => $street,
  'country_id' 		     => $country,
  'street_address_2'     => $address,
);

$insertDetailsData = $this->urs->UpdateAllDatas($this->__all_data,$user_id,ADDRESS);
$this->urs->DeleteDatas(PIVOT_INTEREST_CATEGORY,$user_id,'user_id');
//UPDATE TABLE FOUR
if(count($cat_id) > 0)
{
foreach($cat_id as $cats_id)
{
$this->__all_data = array('category_id' => $cats_id,'user_id' => $user_id);
$insertData = $this->urs->InsertDatas(PIVOT_INTEREST_CATEGORY,$this->__all_data);
}
}
//END
$msg = 'Your Profile Update Successfully';
$msgclass = 'alert-success';
$this->edit_Profile($msg,$msgclass);
//END
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




















//+++++++++++++++++++++++++++++++++++++++ LIST VIEW ALL Events +++++++++++++++++++++++++++++++++//
public function list_profile($msg='',$msg_class='')
{
	$user_id = $this->session->userdata('user_details');
	$user_id = $user_id[0]['id'];
	if(!empty($msg))
	{
		$listdata['msg'] = $msg;
		$listdata['msg_class'] = $msg_class;
	}
	$field_name = 'members_id_FK';
	$listdata['all_data'] = $this->urs->getFullDetails(EVENT,$field_name,$user_id);
	redirect('UserDashboard','refresh');
}
//+++++++++++++++++++++++++++++++++++++++ LIST VIEW FULL PROFILE +++++++++++++++++++++++++++++++++//
public function profile_view($msg='',$msg_class='')
{
	$user_id = $this->session->userdata('user_details');
	$field_name = 'members_id_FK';
	$listdata['all_events']= $this->urs->get_city_country_details(EVENT,CITY,COUNTRY,'event_city_FK','event_country_FK',$field_name,$user_id[0]['id']);
	$listdata['all_data']= $this->urs->get_city_country_details(BUSINESS,CITY,COUNTRY,'business_city_FK','business_country_FK',$field_name,$user_id[0]['id']);
	$listdata['all_profile_data'] = $this->urs->getFullDetails(MEMBER,'id',$user_id[0]['id']);
	$this->load->view('dashboard/user-profile',$listdata);
}

//+++++++++++++++++++++++++++++++ USER LOGOUT SECTION +++++++++++++++++++++++++++++++++++++++++
public function logOut()
{
	$this->session->sess_destroy();
	redirect('User','refresh');
}
//++++++++++++++++++++++++++++++++ View Page Only ++++++++++++++++++++++++++++++++++++++++
/*public function membership()
{
	$last_insert_id = $_SESSION['user_details'];
	$membership = $last_insert_id;
	$messagesection['msg'] = '';
	$messagesection['user_data'] = $this->urs->getFullUserDetails(MEMBER,$last_insert_id);
	$this->load->view('membership',$messagesection);
}*/
}//END
?>
