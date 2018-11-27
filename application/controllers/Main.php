<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller
{
	private $__get_old_password;
	private $__get_new_password;
	private $__data;
	private $__dataArray = array();
	private $__settingArray = array();
	private $__all_data= array();
	private $__alldata = array();
	private $__openingdata= array();
//++++++++++++++++++++++++++++++++++++++ CONSTRUCTUR CALLING ++++++++++++++++++++++++++++++++++
public function __construct()
{
	parent::__construct();
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	$this->load->helper('filter');
	$this->load->helper('country');
	$this->load->model('Users','urs'); //Replace the Users Model Name
	$this->load->model('Dashboards','dashs'); //Replace the Dashboard Model Name
}
//++++++++++++++++++++++++++++++++++++++ /*For view Only*/++++++++++++++++++++++++++++++++++
public function index()
{
	$this->error_validation_session_check();
	$msgsection['all_fav_events'] = $this->urs->getMyFavEvent($this->session->userdata('user_id'));
	$msgsection['all_events'] = $this->urs->getFullDetails(VIEW_EVENT,'user_id',$this->session->userdata('user_id'),'event_id');
	$msgsection['all_business'] = $this->urs->getFullDetails(VIEW_BUSINESS,'user_id',$this->session->userdata('user_id'),'business_id');

    // $msgsection['all_business'] = $this->urs->getFavDatas(BUSINESS,PIVOT_FEB_STORE,'business_id',$this->session->userdata('user_id'),'business_status');

	$msgsection['full_profile'] = $this->urs->getUserDetails(USER_DETAILS,USER,'email',$this->session->userdata('user_id'));
	$msgsection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');
	$msgsection['catdata'] = $this->urs->getDetailsDesc(CATEGORY,'category_id');
	$count_event = count($msgsection['all_events']);
	$this->session->set_userdata('user_details',$msgsection['full_profile']);
	$this->session->set_userdata('count_event',$count_event);
	$msgsection['fav_city'] = $this->urs->getFavCitys(CITY,PIVOT_FEB_CITY,'city_id',$this->session->userdata('user_id'));
	$msgsection['my_blog']= $this->dashs->get_blog_full_admin(BLOG_NEWS,COUNTRY,CITY,$this->session->userdata('user_id'));
	$msgsection['all_meetup'] = $this->get_meet_up_data();
	$msgsection['all_paid_class'] = $this->urs->get_all_user_paid_class_id($this->session->userdata('user_id'));
	$msgsection['all_fav_space'] = $this->urs->getMyFavSpace($this->session->userdata('user_id'));
	// $msgsection['all_fav_space'] = $this->urs->getFavDatas(BUSINESS,PIVOT_FEB_STORE,'business_id',$this->session->userdata('user_id'),'business_status');
	
	$this->load->view('dashboard/dashboard',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++ GET ALL MEET UP DATA ++++++++++++++++++++++++++++++++++
public function get_meet_up_data()
{
	// Meet Up Calculationm
	$user_address = $this->urs->getFullDetails(ADDRESS,'user_id',$this->session->userdata('user_id'),'address_id');
	return $this->urs->getDetailsbyLimitCount(MEET_UP,$user_address[0]['city_id'],'city_id','status','meet_up_id');
}
//++++++++++++++++++++++++++++++++++++++ SESSION ERROR CHECKING ++++++++++++++++++++++++++++++++++
public function error_validation_session_check()
{
	if(!isset($_SESSION['user_login']))
	{
			redirect('Home','refresh');
	}
}
//++++++++++++++++++++++++++++++++++++++ REDIRECT USER ++++++++++++++++++++++++++++++++++
public function redirect_specific_user()
{
	if(($this->session->userdata('user_type') !='') && $this->session->userdata('user_type')=='M' ){
			redirect('UserDashboard','refresh');
		}
	if(($this->session->userdata('user_type') !='') && $this->session->userdata('user_type')=='T' ){
			redirect('TrainerDashboard','refresh');
		}
	if(($this->session->userdata('user_type') !='') && $this->session->userdata('user_type')=='C' ){
			redirect('CompanyDashboard','refresh');
		}
}
/*//+++++++++++++++++++++++++++++++++ get Lat and Long ++++++++++++++++++++++++++++++++++++++++++++
public function get_lat_long($type)
{
    if($type == 'event'){
    $tablename = EVENT;
    }else{
    $tablename = BUSINESS;
    }
    $msg['map_lat_long'] = $this->urs->get_map_markers($tablename);
    $this->load->view('PAGE LINK',$msg);
}*/
// +++++++++++++++++++++++ COUNTRY CORROSPOND CITY LIST (AJAX CALLING DATA) +++++++++++++++++++++
public function check_city()
{
	$this->__country = $this->input->post('country',true);
	$this->__all_data = $this->urs->getFullDetails(CITY,'country_id',$this->__country,'city_id');
	print_r($this->__all_data);
	 if(count($this->__all_data) > 0)
	 {
	 	foreach($this->__all_data as $city)
		{
			 echo '<option value='.$city['city_id'].'>'.$city['city_name'].'</option>';
		}
	 }
}
//+++++++++++++++++++++++++++++++ USER DASHBOARD EVENT SECTION +++++++++++++++++++++++++++++++++++++++++
public function add_event($id='',$msg='',$msg_class='',$user_id='')
{
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['id'] = $id;
		$msgsection['msg'] = $msg;
		$msgsection['msgclass'] = $msg_class;
	}
	$msgsection['category'] = $this->urs->getFullUserDetails(CATEGORY,'event','category_type');
	$msgsection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');
	$msgsection['timezone'] = $this->urs->getFieldDetails(TIMEZONE);
	$msgsection['all_meetup'] = $this->get_meet_up_data();
	$this->load->view('dashboard/add-events-form',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ INSERT EVENT CREATION VIEW +++++++++++++++++++++++++++++++//
public function insert_event()
{
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	$this->form_validation->set_rules('name', 'Event Name','required');
	$this->form_validation->set_rules('city','City Name','required');
	$this->form_validation->set_rules('ev_date','From Date','required');
	$this->form_validation->set_rules('ev_to_date','To Date','required');
	$this->form_validation->set_rules('country','Country Name','required');
	$this->form_validation->set_rules('address','Address Name','required');
	$this->form_validation->set_rules('cat_id[]','Event Category','required');
	$post_data = $this->input->post();//Global array variable
	$id = $this->session->userdata('user_id'); // USER ID
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->add_event($msg,$msg_class);
	}
	else
	{
		if(count($post_data) > 1)
		{
			$name = $post_data['name'];
			/*$levels = $post_data['levels'];*/
			$cat_id = $post_data['cat_id'];
			$website = urlToDomain($post_data['website']);
			$website = 'http://'.$website;
			$description = $post_data['description'];
			$facilities = $post_data['facilities'];
			$city = $post_data['city'];
			$country = $post_data['country'];
			$address = $post_data['address'];
			$get_lat_lng = getLatLong($address); // get_data_from Helper
			$event_latitude = $get_lat_lng['latitude'];
			$event_longitute = $get_lat_lng['longitude'];
			$event_timezone = $post_data['event_timezone'];
			$free_text = $post_data['free_text'];

			//FILE UPLOAD Event Banner
			if(!empty($_FILES['event_banner']['name'])){
			$banner_field = $_FILES['event_banner']['name'];
			if($banner_field !=''){
				$path = 'upload/events/';
				$time = time();
				$get_file_banner_name = $_FILES['event_banner']['name'];
				$get_file_banner_temp = $_FILES['event_banner']['tmp_name'];
				$get_file_banner_error = $_FILES['event_banner']['error'];
				$get_modi_file_banner_name = $time.'_'.$get_file_banner_name;
				$get_modi_full_banner_name = $path.$time.'_'.$get_file_banner_name;
				move_uploaded_file($get_file_banner_temp,$get_modi_full_banner_name);
				$fileName = $get_modi_file_banner_name;
			}
			else{
			$fileName = '';
		    }
			}else{
			$fileName = '';
			}

			

			//END FILE UPLOAD BANNER
			$ev_year = $post_data['ev_year'];
			$ev_month = $post_data['ev_month'];
			$ev_date = $post_data['ev_date'];
			$ev_to_year = $post_data['ev_to_year'];
			$ev_to_month = $post_data['ev_to_month'];
			$ev_to_date = $post_data['ev_to_date'];
			///////////////////////// INSERTION IN DATABASE FIELD /////////////////////////////
			$event_date = $ev_year.'-'.$ev_month.'-'.$ev_date ; // Date Concatination For Date
			$event_to_date = $ev_to_year.'-'.$ev_to_month.'-'.$ev_to_date ; // Date Concatination For Date
			/*if(!empty ($cat_id)){
				$impcategory = implode(',',$cat_id);
				}// Category Concatination*/
			$this->__all_data = array(
				  'user_id' 			=> $this->session->userdata('user_id'),
				  'user_type' 			=> $this->session->userdata('user_type'),
				  'event_name' 			=> $name,
				  'event_website_url' 	=> $website,
				  'event_description'	=> $description,
				  'event_facilities' 	=> $facilities,
				  'city_id' 			=> $city,
				  'country_id' 			=> $country,
				  'event_date_to' 		=> $event_to_date,
				  'event_date_from' 	=> $event_date,
				  'timezone_id' 		=> $event_timezone,
				  'event_free_text' 	=> $free_text,
				  'event_adress' 		=> $address,
				  'event_latitude' 		=> $event_latitude,
				  'event_longitute' 	=> $event_longitute,
				  'event_banner' 		=> $fileName,
				  'create_date' 		=> date("Y-m-d"),
				  'update_date' 		=> '',
				  'event_status' 		=> 'Active',
				);
					/*echo '<pre>';
					print_r($this->__all_data);
					echo '<pre/>';die;*/
			$insertDataReturn = $this->urs->InsertDatas(EVENT,$this->__all_data);
			if(!empty($cat_id)){
				foreach($cat_id as $cat_id){
					$this->__all_data = array(
					'category_id' => $cat_id,
					'pivot_unique_id' => $insertDataReturn,
					'category_type'=> 'event'
					);
					$insertPivotDataReturn = $this->urs->InsertDatas(PIVOT_CATEGORY,$this->__all_data);
					}
			}

			if(!empty($insertDataReturn)){


if(!empty($_FILES['event_pic']['name'])){
$banner_field = $_FILES['event_pic']['name'];
if($banner_field !=''){
$path = 'upload/events/';
$time = time();
$get_file_banner_name  = $_FILES['event_pic']['name'];
$get_file_banner_temp  = $_FILES['event_pic']['tmp_name'];
$get_file_banner_error = $_FILES['event_pic']['error'];
$get_modi_file_banner_name_1 = $time.'_'.$get_file_banner_name;
$get_modi_full_banner_name = $path.$time.'_'.$get_file_banner_name;
move_uploaded_file($get_file_banner_temp,$get_modi_full_banner_name);
$fileName = $get_modi_file_banner_name_1;
}else{
$fileName = '';
}
}else{
$fileName = '';
}

				$this->__all_data = array(
				'event_id' => $insertDataReturn,
				'image_url' => $fileName,
				);
				$insertImageDataReturn = $this->urs->InsertDatas(EVENT_IMAGE,$this->__all_data);
			}
			if($insertDataReturn)
			{
				$msgsection['msg'] = 'Event Succefully Created';
				$msgsection['msg_class'] = 'alert-success';
			}
			else
			{
				$msgsection['msg'] = validation_errors();
				$msgsection['msg_class'] = 'alert-danger';
			}
				redirect('Main/list-event-view', 'refresh');
				//redirect('Main/redirect_specific_user','refresh');
		}
	}
}
//+++++++++++++++++++++++++++++++++++++++ SPECIFIC Member EDIT Event +++++++++++++++++++++++//
public function edit_event($id='',$msg='',$msg_class='')
{
	$id = base64_decription($id);
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msgclass']= $msg_class;
	}
		//$msgSection['all_events'] = $this->urs->getFullUserDetails(EVENT,$id);
		$msgsection['all_events']    = $this->urs->getFullUserDetails(VIEW_EVENT,$id,'event_id');
		$msgsection['catdata']       = $this->urs->getFullUserDetails(CATEGORY,'event','category_type');
		$msgsection['get_cate_id']   = $this->dashs->get_pivot_category('event',$msgsection['all_events'][0]['event_id']);
		$msgsection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');;
		$msgsection['timezone'] = $this->urs->getCountryDetails(TIMEZONE,'timezid');
		$event_city_id = $msgsection['all_events'][0]['city_id'];
		$msgsection['city'] = $this->urs->getCountryDetails(CITY,'city_id');
		$all_data = $msgsection['all_events'];
		$member_id = $all_data[0]['event_id'];
		if($id != $member_id || $id == '')
		{
			redirect('Main/redirect_specific_user','refresh');
		}
		$msgsection['all_meetup'] = $this->get_meet_up_data();
		$this->load->view('dashboard/edit-events-form',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ Update Event +++++++++++++++++++++++++++++++++//
public function update_event($id)
{
	$id = base64_decription($id);
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	$this->form_validation->set_rules('name', 'Event Name','required');
	$this->form_validation->set_rules('facilities','Event Facilities','required');
	$this->form_validation->set_rules('description','Event Description','required');
	$this->form_validation->set_rules('city','City Name','required');
	$this->form_validation->set_rules('country','Country Name','required');
	$this->form_validation->set_rules('cat_id[]','Event Category','required|is_natural');

	$post_data = $this->input->post();

	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msgclass = 'alert-danger';
		$this->edit_event($id,$msg,$msgclass);
	}
	else
	{
		if(count($post_data) > 1)
		{
			$name = $post_data['name'];
			/*$levels = $post_data['levels'];*/
			$cat_id = $post_data['cat_id'];
			//print_r($cat_id);die;
			$website = urlToDomain($post_data['website']);
			$website = 'http://'.$website;
			$description = $post_data['description'];
			$facilities = $post_data['facilities'];
			$city = $post_data['city'];
			$country = $post_data['country'];
			$address = $post_data['address'];
			$get_lat_lng = getLatLong($address); // get_data_from Helper
			$event_latitude = $get_lat_lng['latitude'];
			$event_longitute = $get_lat_lng['longitude'];
			//$country = get_country_name_by_code($country);//replace by country code
			$event_timezone = $post_data['event_timezone'];
			$free_text = $post_data['free_text'];

				$config['upload_path'] = 'upload/events/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['overwrite'] = FALSE;
				$config['remove_spaces'] = TRUE;
				$config['encrypt_name'] = TRUE;
				$config['max_size']     = '5120';
				$config['max_width'] = '1024';
				$config['max_height'] = '768';
				$this->load->library('upload', $config);

				if(!empty($_FILES['event_banner']['name'])){
					// DELETE PREVIOUS IMAGE ///
				$delete_image = $this->urs->getFullUserDetails(VIEW_EVENT,$id,'event_id');
				$delete_image = $delete_image[0]['event_banner'];
				//unlink("upload/events/".$delete_image);
				// End Image Deleted //
				  if($this->upload->do_upload('event_banner')){
					 $get_modi_file_banner_name = $this->upload->file_name;
				  }else{
					 $msg = $this->upload->display_errors();
					 $msgclass = 'alert-danger';
					 $this->edit_event($id,$msg,$msgclass);
				  }
				}else{
					$get_modi_file_banner_name = '';
					$get_modi_file_banner_name = $this->urs->getFullUserDetails(VIEW_EVENT,$id,'event_id');
					$get_modi_file_banner_name = $get_modi_file_banner_name[0]['event_banner'];
				}
			//END FILE UPLOAD BANNER
			$ev_year = $post_data['ev_year'];
			$ev_month = $post_data['ev_month'];
			$ev_date = $post_data['ev_date'];
			$ev_to_year = $post_data['ev_to_year'];
			$ev_to_month = $post_data['ev_to_month'];
			$ev_to_date = $post_data['ev_to_date'];
			///////////////////////// INSERTION IN DATABASE FIELD /////////////////////////////
			$event_date = $ev_year.'-'.$ev_month.'-'.$ev_date ; // Date Concatination For Date
			$event_to_date = $ev_to_year.'-'.$ev_to_month.'-'.$ev_to_date ; // Date Concatination For Date
			/*if(!empty ($cat_id)){
				$impcategory = implode(',',$cat_id);
				}// Category Concatination*/
			//CHECKING FOR FILE UPLOAD
			/*if($get_file_name ==''){


				$get_modi_file_name = $this->urs->getFullUserDetails(EVENT_IMAGE,$id,'event_id');
				$get_modi_file_name = $get_modi_file_name[0]['image_url'];

			}*/
				$get_file_name = $_FILES['event_pic']['name'];
				if(!empty($_FILES['event_pic']['name'])){
					// DELETE PREVIOUS IMAGE ///
				$delete_event_image = $this->urs->getFullUserDetails(EVENT_IMAGE,$id,'event_id');
				$delete_event_image = $delete_event_image[0]['image_url'];
				//unlink("upload/events/".$delete_event_image);
				// End Image Deleted //

				  if($this->upload->do_upload('event_pic')){
					 $get_modi_file_name = $this->upload->file_name;
				  }else{
					 $msg 		= $this->upload->display_errors();
					 $msgclass 	= 'alert-danger';
					 $this->edit_event($id,$msg,$msgclass);
				  }
				}else{
					$get_modi_file_name = $this->urs->getFullUserDetails(EVENT_IMAGE,$id,'event_id');
					$get_modi_file_name = $get_modi_file_name[0]['image_url'];
				}
			$this->__all_data = array(
				  'user_id' 		  => $this->session->userdata('user_id'),
				  'user_type' 		  => $this->session->userdata('user_type'),
				  'event_name' 		  => $name,
				  'event_website_url' => $website,
				  'event_description' => $description,
				  'event_facilities'  => $facilities,
				  'city_id' 		  => $city,
				  'country_id'		  => $country,
				  'event_date_to' 	  => $event_to_date,
				  'event_date_from'   => $event_date,
				  'timezone_id' 	  => $event_timezone,
				  'event_free_text'   => $free_text,
				  'event_adress' 	  => $address,
				  'event_latitude'	  => $event_latitude,
				  'event_longitute'   => $event_longitute,
				  'event_banner' 	  => $get_modi_file_banner_name,
				  'update_date' 	  => date("Y-m-d"),
				  'event_status' 	  => 'Active',
				 // 'event_pic' => $get_modi_file_name,
				);
			$updateDataReturn = $this->urs->UpdateDatas($this->__all_data,$id,EVENT,'event_id');
			if(!empty($cat_id)){
				$delete_data_two = $this->dashs->delete_array(PIVOT_CATEGORY,'pivot_unique_id',$id);
					foreach($cat_id as $cat_id){
					$this->__all_data = array(
					'category_id' 		=> $cat_id,
					'pivot_unique_id' 	=> $id,
					'category_type'		=> 'event'
					);
					$insertPivotDataReturn = $this->urs->InsertDatas(PIVOT_CATEGORY,$this->__all_data);
					}
			}

			if(!empty($get_modi_file_name)){
				$this->__all_data = array(
				'event_id' => $id,
				'image_url' => $get_modi_file_name,
				);
			$updateDataReturn = $this->urs->UpdateDatas($this->__all_data,$id,EVENT_IMAGE,'event_id');
			//move_uploaded_file($get_file_temp,$get_modi_full_name);
			}
			if($updateDataReturn)
			{
				$msgsection['msg'] = 'Event Succefully Updated';
				$msgsection['msg_class'] = 'alert-success';
			}
			else
			{
				$msgsection['msg'] = validation_errors();
				$msgsection['msg_class'] = 'alert-danger';
			}
				redirect('Main/list-event-view','refresh');
				//$this->list_event_view($msgsection['msg'],$msgsection['msg_class']);
		}
			//$this->list_event_view($msgsection['msg'],$msgsection['msg_class']);
		redirect('Main/list-event-view','refresh');
	}
}
//+++++++++++++++++++++++++++++++++++++++ LIST VIEW ALL Events +++++++++++++++++++++++++++++++++//
public function event_details($id='',$msg='',$msg_class='')
{
	$id = base64_decription($id);
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msg_class'] = $msg_class;
	}
		//$user_id = $this->session->userdata('user_details');
		//$field_value = $this->details_field_value();
		//$msgsection['all_events'] = $this->urs->getFullDetails(EVENT,$field_value,$user_id[0]['id']);
		$msgsection['all_events'] = $this->urs->getFullUserDetails(VIEW_EVENT,$id,'event_id');
		$msgsection['catdata'] = $this->urs->getFullUserDetails(CATEGORY,'event','category_type');
		$msgsection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');;
		$msgsection['timezone'] = $this->urs->getCountryDetails(TIMEZONE,'timezid');
		/*$event_country_id = $msgsection['all_events'][0]['event_country_FK'];
		$msgsection['city'] = $this->urs->getFullDetails(CITY,'country_id_FK',$event_country_id);*/
		if($id != $msgsection['all_events'][0]['event_id'] || $id == '')
		{
			redirect('Main/redirect_specific_user','refresh');
		}//If Url Data is Not Matched
		$msgsection['all_meetup'] = $this->get_meet_up_data();
		$this->load->view('dashboard/event-details',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ LIST VIEW Specific Events +++++++++++++++++++++++++++++++++//
public function list_event_view($msg='',$msg_class='')
{
	//$this->index();
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msg_class'] = $msg_class;
	}
	$msgsection['all_events'] = $this->urs->getFullUserDetails(VIEW_EVENT,$this->session->userdata('user_id'),'user_id');
	$msgsection['all_meetup'] = $this->get_meet_up_data();
	$this->load->view('dashboard/list_event',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++++++++ DELETE Event LIST +++++++++++++++++++++++++++++++++//
public function delete_event($id)
{
		$id = base64_decription($id);
		$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
		if($id != '')
		{
			//
			$all_data = $this->urs->getFullUserDetails(VIEW_EVENT,$id,'event_id');
			//$all_data = $this->urs->getFullDetails(EVENT,'user_id',$user_id,'event_id');
			//$file = $all_data[0]['event_image'];
			//if($file != '')
			//{
				//unlink("upload/events/".$file);
			//}
			//$banner_file = $all_data[0]['event_banner'];
			//if($banner_file != '')
			//{
				//unlink("upload/events/".$banner_file);
			//}
			$delete_data = $this->urs->DeleteDatas(EVENT,$id,'event_id');
			$delete_Pivot_data = $this->urs->DeleteDatas(EVENT_IMAGE,$id,'event_id');
			$delete_Pivot_data = $this->urs->DeleteDatas(PIVOT_CATEGORY,$id,'pivot_unique_id');
			if($delete_data){
			$msg = 'Delete Successfully';
			$msg_class = 'alert-success';
			}
			else{
				$msg = 'Error';
				$msg_class = 'alert-danger';
				}
				redirect('Main/list-event-view', 'refresh');
				//$this->list_event_view($msg,$msg_class);
				//redirect('Main/redirect_specific_user','refresh');
		}
		else{
				//redirect('Main/redirect_specific_user','refresh');
			}
}
############################################# END EVENT SECTION ####################################
//+++++++++++++++++++++++++++++++ USER DASHBOARD BUSINESS SECTION +++++++++++++++++++++++++++++++++++++++++
public function add_business($msg='',$msg_class='',$user_id='')
{
$this->error_validation_session_check();
if(!empty($msg))
{
$msgsection['user_id'] = $user_id;
$msgsection['msg'] = $msg;
$msgsection['msgclass'] = $msg_class;
}
$msgsection['category'] = $this->urs->getFullUserDetails(CATEGORY,'event','category_type');
$msgsection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');
$msgsection['timezone'] = $this->urs->getFieldDetails(TIMEZONE);
$msgsection['all_meetup'] = $this->get_meet_up_data();
$this->load->view('dashboard/add-business',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ INSERT BUSINESS CREATION VIEW +++++++++++++++++++++++++++++++//
public function insert_business()
{
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	$this->form_validation->set_rules('business_name', 'Business Name','required');
	$this->form_validation->set_rules('business_description','Business Description','required');
	$this->form_validation->set_rules('cat_id[]','Business Category','required');
	$this->form_validation->set_rules('city','City Name','required');
	$this->form_validation->set_rules('country','Country Name','required');
	//$this->form_validation->set_rules('business_pic','Profile Pic','required');
	$this->form_validation->set_rules('business_postal_code','Postal Code','required');
	$post_data = $this->input->post();//Global array variable

	$user_id = $this->session->userdata('user_id');
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->add_business($msg,$msg_class);
	}
	else
	{
		if(count($post_data) > 1)
		{
			$name = $post_data['business_name'];
			$cat_id = $post_data['cat_id'];
			$website = urlToDomain($post_data['business_website_URL']);
			$website = 'http://'.$website;
			$description = $post_data['business_description'];
			$city = $post_data['city'];
			$street = $post_data['business_street'];
			$get_lat_lng = getLatLong($street); // get_data_from Helper
			$business_latitude = $get_lat_lng['latitude'];
			$business_longitute = $get_lat_lng['longitude'];
			$postal_code = $post_data['business_postal_code'];
			$country = $post_data['country'];
			$time = time();
			$path = "./upload/business/";
			$get_profile_pic_file_name_1 = $_FILES['business_pic']['name'];
			$get_profile_pic_temp_name_1 = $_FILES['business_pic']['tmp_name'];
			$get_profile_pic_file_type_1 = $_FILES['business_pic']['type'];
			$get_profile_pic_file_erro_1 = $_FILES['business_pic']['error'];
			$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;
			$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1;
			$get_file_name_1 = $_FILES['business_banner_pic']['name'];
			$get_temp_name_1 = $_FILES['business_banner_pic']['tmp_name'];
			$get_file_type_1 = $_FILES['business_banner_pic']['type'];
			$get_file_erro_1 = $_FILES['business_banner_pic']['error'];
			$get_modi_name_1 = $time.'_'.$get_file_name_1;
			$get_modi_full_1 = $path.$time.'_'.$get_file_name_1;
	///////////////////////// PICTURE UPLOAD IN FOLDER //////////////////////////////////
		if(!empty($_FILES['business_pic']['name'])){
		if(isset($get_profile_pic_file_name_1) && (!empty($get_profile_pic_file_name_1)))
		{
		$profile_pic_upload = move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
		}
		else{$get_profile_pic_modi_name_1 = '';}
	}else{
		$get_profile_pic_modi_name_1 = '';
	}
		if(!empty($_FILES['business_pic']['name'])){
		if(isset($get_file_name_1) && (!empty($get_file_name_1)))
		{
		$banner_pic_upload = move_uploaded_file($get_temp_name_1,$get_modi_full_1);
		}
		else{$get_modi_name_1 = '';}
	}else{
		$get_modi_name_1 = '';
	}
	///////////////////////// INSERTION IN DATABASE FIELD /////////////////////////////
			$this->__all_data = array(
			  'user_id' => $user_id,
			  'business_name' => $name,
			  'business_website_url' => $website,
			  'business_description' => $description,
			  'business_latitude' => $business_latitude,
			  'business_longitute' => $business_longitute,
			  'city_id' => $city,
			  'business_street' => $street,
			  'business_postal_code' => $postal_code,
			  'country_id' => $country,
			  'business_image' => $get_profile_pic_modi_name_1,
			  'business_banner_image' => $get_modi_name_1,
			  'create_date'=>date("Y,m,d")
			);
					/*echo '<pre>';
					print_r($cat_id);
					echo '<pre/>';die;*/
		$insertDataReturn = $this->urs->InsertDatas(BUSINESS,$this->__all_data);
		/*************************** Insert Pivot Category**********************************/
		if(!empty($cat_id)){
			foreach($cat_id as $cat_id){
				$this->__all_data = array(
				'category_id' => $cat_id,
				'pivot_unique_id' => $insertDataReturn,
				'category_type'=> 'business'
				);
				$insertPivotDataReturn = $this->urs->InsertDatas(PIVOT_CATEGORY,$this->__all_data);
				}
		}

		/*
		$insertDataReturn = $this->urs->InsertDatas(EVENT,$this->__all_data);
			if(!empty($cat_id)){
				foreach($cat_id as $cat_id){
					$this->__all_data = array(
					'category_id' => $cat_id,
					'pivot_unique_id' => $insertDataReturn,
					'category_type'=> 'event'
					);
					$insertPivotDataReturn = $this->urs->InsertDatas(PIVOT_CATEGORY,$this->__all_data);
					}
			}*/
		/***************************Opening Hours**********************************/
	 for($i=0;$i<7;$i++){
		  $opening_hour_day = $post_data['day_name'][$i];
		  $from_opening_hour =!empty($post_data['from_opening_hour'][$i]) ? $post_data['from_opening_hour'][$i] : 0;
		  $from_opening_mint = !empty($post_data['from_opening_mint'][$i]) ? $post_data['from_opening_mint'][$i] : 0;
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
		 'company_business_id'=>$insertDataReturn,
		 'opening_hour_day'=>$opening_hour_day,
		 'opening_hour_from'=>$from_hour,
		 'opening_hour_to'=>$to_hour,
		 'opening_hour_close'=>$opening_hour_close,
		 'opening_hour_type'=>1);
			$insert_opening_data = $this->urs->InsertDatas(OPENING_HOUR,$this->__alldata);
		 }
	  /*************************************End Opening Hours***************************************/
	 if(empty($insert_opening_data)){
		$msg = 'Opening Data Not Inserted';
		$msgclass = 'alert-danger';
		$this->add_business($msg,$msgclass);
	 }
		if($insertDataReturn)
		{
			$msg = 'BUSINESS Succefully Created';
			$msg_class = 'alert-success';
		}
		else
		{
			$msg = 'Error Occure';
			$msg_class = 'alert-danger';
		}
			redirect('Main/business_list_view','refresh');
	}
	}
}
//+++++++++++++++++++++++++++++++++++++++ SPECIFIC Member EDIT Event +++++++++++++++++++++++//
public function edit_business($id='',$msg='',$msg_class='')
{
	$id = base64_decription($id);
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msgclass']= $msg_class;
	}
		//$msgsection['all_events'] = $this->urs->getFullUserDetails(EVENT,$id);
		$msgsection['all_data'] = $this->urs->getFullUserDetails(VIEW_BUSINESS,$id,'business_id');
		$msgsection['catdata'] = $this->urs->getFullUserDetails(CATEGORY,'event','category_type');
		$msgsection['get_cate_id']   = $this->dashs->get_pivot_category('business',$msgsection['all_data'][0]['business_id']);
		$msgsection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');;
		$msgsection['opening_hour'] = $this->urs->openingHourDetails($id,1);
		$business_city_id = $msgsection['all_data'][0]['city_id'];
		$msgsection['city'] = $this->urs->getCountryDetails(CITY,'city_id');
		$all_data = $msgsection['all_data'];
		$member_id = $all_data[0]['business_id'];
	//die;
	if($id != $member_id || $id == '')
	{
		$msgsection['all_data'] = $this->urs->getFullUserDetails(VIEW_BUSINESS,$this->session->userdata('user_id'),'user_id');
	$this->load->view('dashboard/my-business',$msgsection);
	}//If Url Data is Not Matched
	$msgsection['all_meetup'] = $this->get_meet_up_data();
	$this->load->view('dashboard/edit-business-form',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ Update Event +++++++++++++++++++++++++++++++++//
public function update_business($id)
{
	$id = base64_decription($id);
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	$this->form_validation->set_rules('business_name', 'Business Name','required');
	$this->form_validation->set_rules('business_description','Business Description','required');
	$this->form_validation->set_rules('cat_id[]','Business Category','required');
	$this->form_validation->set_rules('business_website_URL','Business website','required');
	//$this->form_validation->set_rules('city','City Name','required');
	//$this->form_validation->set_rules('business_pic','Profile Pic','required');
	$this->form_validation->set_rules('business_postal_code','Postal Code','required');
	$post_data = $this->input->post();//Global array variable

	$user_id = $this->session->userdata('user_id');
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$send_id = base64_encription($id);
		$this->edit_business($send_id,$msg,$msg_class);
	}
	else
	{
		if(count($post_data) > 1)
		{
			$name = $post_data['business_name'];
			$cat_id = $post_data['cat_id'];
			$website = urlToDomain($post_data['business_website_URL']);
			$website = 'http://'.$website;
			$description = $post_data['business_description'];
			$city = $post_data['city'];
			$street = $post_data['business_street'];
			$get_lat_lng = getLatLong($street); // get_data_from Helper
			$business_latitude = $get_lat_lng['latitude'];
			$business_longitute = $get_lat_lng['longitude'];
			$postal_code = $post_data['business_postal_code'];
			$country = $post_data['country'];
			$time = time();
			$path = "./upload/business/";
			$get_profile_pic_file_name_1 = $_FILES['business_pic']['name'];
			$get_profile_pic_temp_name_1 = $_FILES['business_pic']['tmp_name'];
			$get_profile_pic_file_type_1 = $_FILES['business_pic']['type'];
			$get_profile_pic_file_erro_1 = $_FILES['business_pic']['error'];
			$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;
			$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1;
			//$profile_pic_upload = move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
			$get_file_name_1 = $_FILES['business_banner_pic']['name'];
			$get_temp_name_1 = $_FILES['business_banner_pic']['tmp_name'];
			$get_file_type_1 = $_FILES['business_banner_pic']['type'];
			$get_file_erro_1 = $_FILES['business_banner_pic']['error'];
			$get_modi_name_1 = $time.'_'.$get_file_name_1;
			$get_modi_full_1 = $path.$time.'_'.$get_file_name_1;
			if(!empty ($cat_id)){
				$impcategory = implode(',',$cat_id);
			}// Category Concatination

			//CHECKING FOR BUSINESS IMAGE UPLOAD
			if($get_profile_pic_file_name_1 ==''){
				$get_profile_pic_file_name_1 = $this->urs->getFullUserDetails(VIEW_BUSINESS,$id,'business_id');
				$get_profile_pic_modi_name_1 = $get_profile_pic_file_name_1[0]['business_image'];
			}
			else{
				// DELETE PREVIOUS BUSINESS IMAGE ///
				$delete_business_image = $this->urs->getFullUserDetails(VIEW_BUSINESS,$id,'business_id');
				$delete_business_image = $delete_business_image[0]['business_image'];
				//unlink("upload/business/".$delete_business_image);
				$profile_pic_upload = move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
				// End Image Deleted //
				}

				//CHECKING FOR BUSINESS BANNER UPLOAD
			if($get_file_name_1 ==''){
				$get_file_name_1 = $this->urs->getFullUserDetails(VIEW_BUSINESS,$id,'business_id');
				$get_modi_name_1 = $get_file_name_1[0]['business_banner_image'];
			}
			else{
				// DELETE PREVIOUS BANNER IMAGE ///
				$delete_business_image = $this->urs->getFullUserDetails(VIEW_BUSINESS,$id,'business_id');
				$delete_business_image = $delete_business_image[0]['business_banner_image'];
				//unlink("upload/business/".$delete_business_image);
				$banner_pic_upload = move_uploaded_file($get_temp_name_1,$get_modi_full_1);
				// End Image Deleted //
				}
	///////////////////////// INSERTION IN DATABASE FIELD /////////////////////////////
			$this->__all_data = array(
			  'user_id' => $user_id,
			  'business_name' => $name,
			  //'cat_id_FK' => $impcategory,
			  'business_website_url' => $website,
			  'business_description' => $description,
			  'business_latitude' => $business_latitude,
			  'business_longitute' => $business_longitute,
			  'city_id' => $city,
			  'business_street' => $street,
			  'business_postal_code' => $postal_code,
			  'country_id' => $country,
			  'business_image' => $get_profile_pic_modi_name_1,
			  'business_banner_image' => $get_modi_name_1,
			  'create_date'=>date("Y,m,d")
			);
		$insertDataReturn = $this->urs->UpdateDatas($this->__all_data,$id,BUSINESS,'business_id');
		/*************************** Insert Pivot Category **********************************/
		if(!empty($cat_id)){
				$delete_data_two = $this->dashs->delete_array(PIVOT_CATEGORY,'pivot_unique_id',$id);
					foreach($cat_id as $cat_id){
					$this->__all_data = array(
					'category_id' => $cat_id,
					'pivot_unique_id' => $id,
					'category_type'=> 'business'
					);
					$insertPivotDataReturn = $this->urs->InsertDatas(PIVOT_CATEGORY,$this->__all_data);
					}
			}
		/***************************Opening Hours**********************************/
		$opening_id = $this->urs->openingHourDetails($id,1);
	 	for($i=0;$i<7;$i++){
		 $opening_hour_id = $opening_id[$i]['opening_hour_id'];
		   $opening_hour_day = $post_data['day_name'][$i];
		  $from_opening_hour =!empty($post_data['from_opening_hour'][$i]) ? $post_data['from_opening_hour'][$i] : 0;
		  $from_opening_mint = !empty($post_data['from_opening_mint'][$i]) ? $post_data['from_opening_mint'][$i] : 0;
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
		 'company_business_id'=>$id,
		 'opening_hour_day'=>$opening_hour_day,
		 'opening_hour_from'=>$from_hour,
		 'opening_hour_to'=>$to_hour,
		 'opening_hour_close'=>$opening_hour_close,
		 'opening_hour_type'=>1);
			$update_opening_data = $this->urs->UpdateDatas($this->__alldata,$opening_hour_id,OPENING_HOUR,'opening_hour_id');
		 }
	  /*************************************End Opening Hours***************************************/
	 if(empty($insert_opening_data)){
		$msg = 'Opening Data Not Inserted';
		$msgclass = 'alert-danger';
		$this->add_business($msg,$msgclass);
	 }
		if($insertDataReturn)
		{
			$msg = 'BUSINESS Succefully Created';
			$msg_class = 'alert-success';
		}
		else
		{
			$msg = 'Error Occure';
			$msg_class = 'alert-danger';
		}
			redirect('Main/business_list_view','refresh');
	}
			$this->business_list_view($msgsection['msg'],$msgsection['msg_class']);
	}

}
//+++++++++++++++++++++++++++++++++++++++ LIST VIEW ALL Events +++++++++++++++++++++++++++++++++//
public function business_details($id='',$msg='',$msg_class='')
{
	$id = base64_decription($id);
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msg_class'] = $msg_class;
	}
		//$user_id = $this->session->userdata('user_details');
		//$field_value = $this->details_field_value();
		//$msgsection['all_events'] = $this->urs->getFullDetails(EVENT,$field_value,$user_id[0]['id']);
		$msgsection['all_data'] = $this->urs->getFullUserDetails(VIEW_BUSINESS,$id,'business_id');
		$msgsection['catdata'] = $this->urs->getFullUserDetails(CATEGORY,'event','category_type');
		$msgsection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');;
		$msgsection['opening_hour'] = $this->urs->openingHourDetails($id,1);
		/*$event_country_id = $msgsection['all_events'][0]['event_country_FK'];*/
		$msgsection['city'] = $this->urs->getCountryDetails(CITY,'city_id');
		if($id != $msgsection['all_data'][0]['business_id'] || $id == '')
		{
			$msgsection['all_data'] = $this->urs->getFullUserDetails(VIEW_BUSINESS,$this->session->userdata('user_id'),'user_id');
	$this->load->view('dashboard/my-business',$msgsection);
		}//If Url Data is Not Matched
		$msgsection['all_meetup'] = $this->get_meet_up_data();
		$this->load->view('dashboard/business-details',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ LIST VIEW Specific Events +++++++++++++++++++++++++++++++++//
public function business_list_view($msg='',$msg_class='')
{
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] 		 = $msg;
		$msgsection['msg_class'] = $msg_class;
	}
	$msgsection['all_data'] 	= $this->urs->getFullUserDetails(VIEW_BUSINESS,$this->session->userdata('user_id'),'user_id');
	$msgsection['all_meetup']   = $this->get_meet_up_data();
	$this->load->view('dashboard/my-business',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++++++++ DELETE Event LIST +++++++++++++++++++++++++++++++++//
public function delete_full_business($id)
{
		$id = base64_decription($id);
		$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
		if($id != '')
		{
			//
			$all_data = $this->urs->getFullUserDetails(VIEW_BUSINESS,$id,'business_id');
			//$all_data = $this->urs->getFullDetails(EVENT,'user_id',$user_id,'event_id');
			// $file = $all_data[0]['business_image'];
			// if($file != '')
			// {
			// 	unlink("upload/business/".$file);
			// }
			// $banner_file = $all_data[0]['business_banner_image'];
			// if($banner_file != '')
			// {
			// 	unlink("upload/business/".$banner_file);
			// }
			$delete_data = $this->urs->DeleteDatas(BUSINESS,$id,'business_id');
			//$delete_Pivot_data = $this->urs->DeletePivoteDatas(PIVOT_CATEGORY,$id,'pivot_unique_id','category_type' ,'business');
			$delete_data = $this->urs->DeleteDatas(OPENING_HOUR,$id,'company_business_id');
			if($delete_data){
			$msg = 'Delete Successfully';
			$msg_class = 'alert-success';
			}
			else{
				$msg = 'Error';
				$msg_class = 'alert-danger';
				}
				//$this->list_event_view($msg,$msg_class);
				$msgsection['all_data'] = $this->urs->getFullUserDetails(VIEW_BUSINESS,$this->session->userdata('user_id'),'user_id');
				$this->load->view('dashboard/my-business',$msgsection);
		}
		else{
				$msgsection['all_data'] = $this->urs->getFullUserDetails(VIEW_BUSINESS,$this->session->userdata('user_id'),'user_id');
				$this->load->view('dashboard/my-business',$msgsection);
			}
}
//+++++++++++++++++++++++++++++++++ VIEW CHANGE PASSWORD +++++++++++++++++++++++++++++++++++++++//
public function change_password($msg='',$msg_class='')
{
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	$msgsection['all_meetup'] = $this->get_meet_up_data();
	if(!empty($msg)){
	$msgsection['msg'] = $msg;
	$msgsection['msgclass'] = $msg_class;
	$this->load->view('dashboard/change-password',$msgsection);
	}else{
	$this->load->view('dashboard/change-password',$msgsection);
	}
}
//++++++++++++++++++++++++++++++++++++++++ PASSWORD UPDATE ++++++++++++++++++++++++++++++++++++++//
public function Change_Password_update()
{

	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	$this->__get_old_password = $this->input->post('user_pwd_old',true);
	$this->__get_new_password = $this->input->post('user_pwd_new',true);

	$this->__get_old_password = trimData($this->__get_old_password);
	$this->__get_old_password = stripslashesData($this->__get_old_password);

	 $this->__get_new_password = trimData($this->__get_new_password);
	 $this->__get_new_password = stripslashesData($this->__get_new_password);

	$this->__data = $this->urs->changePasswords(USER,$this->__get_old_password,$this->__get_new_password,$this->session->userdata('user_id'));

	if($this->__data == FALSE)
	{
	$msg = 'Password Not Matched';
	$msg_class = 'alert-danger';
	}
	else{

	$this->load->library('email');
	$this->email->from('admin@admin.com', SITE_NAME);
	$this->email->to($_SESSION['user_details'][0]['email']);
	$this->email->subject('Password Has Been Change');
	$this->email->message('This mail is to inform you that your account password has been changed.If you didnot change the password please contact the Club Mondain');
	$this->email->send();

	$msg = 'You have succefully change password';
	$msg_class = 'alert-success';
	}
	$this->change_password($msg,$msg_class);
}
//+++++++++++++++++++++++++++++++ ADD NEWS FORM SECTION +++++++++++++++++++++++++++++++++++++++++
public function add_news_view($msg='',$msg_class='')
{
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msgclass'] = $msg_class;
	}
	$msgsection['category'] = $this->urs->getFullUserDetails(CATEGORY,'news','category_type');
	$msgsection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');;
	$msgsection['all_meetup'] = $this->get_meet_up_data();
	$this->load->view('dashboard/add-news',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function insert_news()
{
	$this->form_validation->set_rules('news_heading', 'News Heading','required');
	$this->form_validation->set_rules('news_cate_id_FK[]','News Category','required');
	$this->form_validation->set_rules('news_description','News Description','required');
	/*$this->form_validation->set_rules('ev_date','Date','required');
	$this->form_validation->set_rules('ev_month','Month','required');
	$this->form_validation->set_rules('ev_year','Year','required');
	$this->form_validation->set_rules('news_address','News Address','required');*/
	$this->form_validation->set_rules('country','News Country','required');
	$this->form_validation->set_rules('city','Event City','required');

	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->add_news_view($msg,$msg_class);
	}
	else
	{
            $post_data = $this->input->post();

	    if(count($post_data) > 0){
		//______________________________________________________________
		$news_heading        = $this->security->xss_clean(escape_str($post_data['news_heading']));
		$news_cate_id_FK     = $this->security->xss_clean(escape_str($post_data['news_cate_id_FK']));
		//$news_description    = $this->security->xss_clean(escape_str($post_data['news_description']));
		$news_description    = $this->security->xss_clean($post_data['news_description']);
		/*//$news_date           = $this->security->xss_clean(escape_str($post_data['news_date']));
		$ev_year           = $this->security->xss_clean(escape_str($post_data['ev_year']));
		$ev_month           = $this->security->xss_clean(escape_str($post_data['ev_month']));
		$ev_date           = $this->security->xss_clean(escape_str($post_data['ev_date']));
		$news_address        = $this->security->xss_clean(escape_str($post_data['news_address']));*/
		$country      		 = $this->security->xss_clean(escape_str($post_data['country']));
		$city          		 = $this->security->xss_clean(escape_str($post_data['city']));
		$news_fb_link        = 'http://'.urlToDomain($this->security->xss_clean(escape_str($post_data['news_fb_link'])));
		$news_twitter_link   = 'http://'.urlToDomain($this->security->xss_clean(escape_str($post_data['news_twitter_link'])));
		$news_instagram_link = 'http://'.urlToDomain($this->security->xss_clean(escape_str($post_data['news_instagram_link'])));
		$news_status         = 'Active';
		//$news_date = $ev_year.'-'.$ev_month.'-'.$ev_date ; // Date Concatination For Date
		//______________________________________________________________________
			$time = time();
			$path = "./upload/news_blog/";
			$get_profile_pic_file_name_1 = $_FILES['news_pic']['name'];
			$get_profile_pic_temp_name_1 = $_FILES['news_pic']['tmp_name'];
			$get_profile_pic_file_type_1 = $_FILES['news_pic']['type'];
			$get_profile_pic_file_erro_1 = $_FILES['news_pic']['error'];
			$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;
			$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1;
			if(isset($get_profile_pic_file_name_1) && (!empty($get_profile_pic_file_name_1)))
			{
				$profile_pic_upload = move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
			}
			else{$get_profile_pic_modi_name_1 = '';}
		//______________________________________________________________

		//______________________________________________________________
		$this->__all_data = array
		(
			'user_id'                  => $this->session->userdata('user_id'),
            'country_id'               => $country,
			'city_id'                  => $city,
			'blog_news_title'          => $news_heading,
			'blog_news_description'    => str_ireplace(array("\r","\n",'\r','\n'),'', $news_description),//Remove r/n in CK Editor
			'blog_news_fb_link'        => $news_fb_link,
			'blog_news_twitter_link'   => $news_twitter_link,
			'blog_news_instagram_link' => $news_instagram_link,
			'blog_news_image' 		   => $get_profile_pic_modi_name_1,
			'blog_news_status'         => $news_status,
            'blog_news_type'           => 'News',
			'create_date'              => date('Y,m,d'),
			'update_date'              => date('Y,m,d'),

		);
		$insert_data_return = $this->urs->InsertDatas(BLOG_NEWS,$this->__all_data);
		if($insert_data_return)
		{
			if( !empty($news_cate_id_FK) && count($news_cate_id_FK) > 0 )
			{

				foreach($news_cate_id_FK as $newsSingle)
				{

					$news_cate_pivot[]  = array ('category_id' => $newsSingle ,'pivot_unique_id' => $insert_data_return ,'category_type' => 'news');
				}

				$insert_data_return = $this->dashs->insert_array_batch(PIVOT_CATEGORY,$news_cate_pivot);

				 if($insert_data_return){
					$msg = 'Event created succefully';
					$msg_class = 'alert-success';

				}else{
					$msg = 'OPPS !! Something went wrong. Please try after some time';
					$msg_class = 'alert-danger';
				}
				 redirect('Main/list-news-view');
			}
		}
		else
		{
			$msg = 'OPPS !! Something went wrong. Please try after some time';
			$msg_class = 'alert-danger';
            redirect('Main/list-news-view');
		}
		}
			else{
				redirect('Main/list-news-view');
			}
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function list_news_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgsection['msg']       = $msg;
		$msgsection['msg_class'] = $msg_class;
	}

	/*
	$msgsection['all_data'] = $this->dashs->get_news_full_admin(BLOG_NEWS,COUNTRY,CITY,$this->session->userdata('user_id'));
	*/

	$msgsection['all_data_event'] = $this->dashs->get_blog_full_admin(BLOG_NEWS,COUNTRY,CITY,
	$this->session->userdata('user_id'));


	$msgsection['all_meetup'] = $this->get_meet_up_data();
	$this->load->view('dashboard/my-news',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function edit_news_view($id='',$msg='',$msg_class='')
{
	$output = base64_decription($id);
	$id     = $output;
	if(!empty($id) and !empty($output))
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$msgsection['msg'] = $msg;
			$msgsection['msg_class']= $msg_class;
		}
		$msgsection['all_data'] = $this->dashs->getListDatas(BLOG_NEWS,'blog_news_id',$id);
		$msgsection['all_meetup'] = $this->get_meet_up_data();
		if($msgsection['all_data'] == FALSE)
		{
			redirect('Main','refresh');
		}else{
			$msgsection['news_category'] = $this->dashs->getCatagoryDetails(CATEGORY,'news');
			$msgsection['country']     = $this->dashs->getFullDetails(COUNTRY);
			$msgsection['city']      = $this->dashs->get_ajax_city($msgsection['all_data'][0]['country_id']);
			$msgsection['get_cate_id']   = $this->dashs->get_pivot_category('news',$msgsection['all_data'][0]['blog_news_id']);
			$this->load->view('dashboard/edit-news-form',$msgsection);
		}
	}
	else
	{
	redirect('Main','refresh');
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function update_news($id)
{
	$id = base64_decription($id);
	$this->form_validation->set_rules('news_heading', 'News Heading','required');
	$this->form_validation->set_rules('news_cate_id_FK[]','News Category','required');
	$this->form_validation->set_rules('news_description','News Description','required');
	/*$this->form_validation->set_rules('ev_date','Date','required');
	$this->form_validation->set_rules('ev_month','Month','required');
	$this->form_validation->set_rules('ev_year','Year','required');
	$this->form_validation->set_rules('news_address','News Address','required');*/
	$this->form_validation->set_rules('country','News Country','required');
	$this->form_validation->set_rules('city','Event City','required');

	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->edit_news_view($id,$msg,$msg_class);
	}
	else
	{
            $post_data = $this->input->post();
	    if(count($post_data) > 0){
		//______________________________________________________________
		$news_heading     = $this->security->xss_clean(escape_str($post_data['news_heading']));
		$news_cate_id_FK  = $this->security->xss_clean(escape_str($post_data['news_cate_id_FK']));
		//$news_description = $this->security->xss_clean(escape_str($post_data['news_description']));
		$news_description = $this->security->xss_clean($post_data['news_description']);
		/*$ev_year           = $this->security->xss_clean(escape_str($post_data['ev_year']));
		$ev_month           = $this->security->xss_clean(escape_str($post_data['ev_month']));
		$ev_date           = $this->security->xss_clean(escape_str($post_data['ev_date']));
		$news_address     = $this->security->xss_clean(escape_str($post_data['news_address']));*/
		$country_id_FK    = $this->security->xss_clean(escape_str($post_data['country']));
		$city_id_FK       = $this->security->xss_clean(escape_str($post_data['city']));
		$news_fb_link        = 'http://'.urlToDomain($this->security->xss_clean(escape_str($post_data['news_fb_link'])));
		$news_twitter_link   = 'http://'.urlToDomain($this->security->xss_clean(escape_str($post_data['news_twitter_link'])));
		$news_instagram_link = 'http://'.urlToDomain($this->security->xss_clean(escape_str($post_data['news_instagram_link'])));
		$news_status         = 'Active';
		//______________________________________________________________
		//______________________________________________________________
		//______________________________________________________________
			/**********************PIcture Upload*****************/
			$all_data = $this->urs->getFullUserDetails(BLOG_NEWS,$id,'blog_news_id');
			$file = $all_data[0]['blog_news_image'];
			$time = time();
			$path = "./upload/news_blog/";
			$get_profile_pic_file_name_1 = $_FILES['news_pic']['name'];
			$get_profile_pic_temp_name_1 = $_FILES['news_pic']['tmp_name'];
			$get_profile_pic_file_type_1 = $_FILES['news_pic']['type'];
			$get_profile_pic_file_erro_1 = $_FILES['news_pic']['error'];
			$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;
			$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1;
			if(isset($get_profile_pic_file_name_1) && (!empty($get_profile_pic_file_name_1)))
			{
				if($file != '')
				{
					//unlink("upload/news_blog/".$file);
				}
				$profile_pic_upload = move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
			}
			else{$get_profile_pic_modi_name_1 = $file;}
		//______________________________________________________________
		$this->__all_data = array
		(
			'user_id'                  => $this->session->userdata('user_id'),
			'country_id'               => $country_id_FK,
			'city_id'                  => $city_id_FK,
			'blog_news_title'          => $news_heading,
			'blog_news_description'    => str_ireplace(array("\r","\n",'\r','\n'),'', $news_description),//Remove r/n in CK Editor
			'blog_news_fb_link'        => $news_fb_link,
			'blog_news_twitter_link'   => $news_twitter_link,
			'blog_news_instagram_link' => $news_instagram_link,
			'blog_news_image'		   => $get_profile_pic_modi_name_1,
			'blog_news_status'         => $news_status,
            'blog_news_type'           => 'News',
			'update_date'              => date('Y,m,d'),
		);
		$update_data_return = $this->dashs->update_array($this->__all_data,$id,BLOG_NEWS,'blog_news_id');
		if($update_data_return)
		{
			if( !empty($news_cate_id_FK) && count($news_cate_id_FK) > 0 )
			{
				$delete_data_two = $this->dashs->delete_array(PIVOT_CATEGORY,'pivot_unique_id',$id);
				foreach($news_cate_id_FK as $blogSingle)
				{

					$blog_cate_pivot[]  = array ('category_id' => $blogSingle ,'pivot_unique_id' => $id ,'category_type' => 'news');
				}

				$insert_data_return = $this->dashs->insert_array_batch(PIVOT_CATEGORY,$blog_cate_pivot);

				 if($insert_data_return){

					$msg = 'News Updated succefully';
					$msg_class = 'alert-success';

				}else{

					$msg = 'OPPS !! Something went wrong. Please try after some time';
					$msg_class = 'alert-danger';
				}
				 redirect('Main/list_news_view');
			}

			if($insert_data_return)
			{
				$msg = 'You have succefully updated blog';
				$msg_class = 'alert-success';
			}
			else
			{
				$msg = 'OPPS !! Something went wrong. Please try after some time';
				$msg_class = 'alert-danger';

			}
		}
		else
		{
			$msg = 'OPPS !! Something went wrong. Please try after some time';
			$msg_class = 'alert-danger';

		}
                redirect('Main/list-news-view');
		}else{
		redirect('Main/list-news-view');
		}
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_news($id)
{
	$output = base64_decription($id);
	$id     = $output;
	if(!empty($id) and !empty($output))
	{
	//------------------------------------ UNLINK IMAGE ---------------------------------------//
	$all_data = $this->urs->getFullUserDetails(BLOG_NEWS,$id,'blog_news_id');
	$file = $all_data[0]['blog_news_image'];
	if($file != '')
	{
		//unlink("upload/news_blog/".$file);
	}
	$delete_data = $this->dashs->delete_array(BLOG_NEWS,'blog_news_id',$id);
    $delete_data_two = $this->dashs->delete_array(PIVOT_CATEGORY,'pivot_unique_id',$id);
	if(($delete_data) && ($delete_data_two))
	{
		$msg = 'Delete successfully';
		$msg_class = 'alert-success';
	}
	else
	{
		$msg = 'OPPS !! Something went wrong. Please try after some time';
		$msg_class = 'alert-danger';
	}
		 redirect('Main/list_news_view');
                //$this->list_news_view($msg,$msg_class);
	}
	else{
		redirect('Main','refresh');
	}
}
//+++++++++++++++++++++++++++++++ ADD NEWS FORM SECTION +++++++++++++++++++++++++++++++++++++++++
public function add_blog_view($msg='',$msg_class='')
{
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msgclass'] = $msg_class;
	}
	$msgsection['category'] = $this->urs->getFullUserDetails(CATEGORY,'blog','category_type');
	$msgsection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');
	$msgsection['city'] = $this->urs->getCountryDetails(CITY,'city_id');
	$msgsection['all_meetup'] = $this->get_meet_up_data();
	$this->load->view('dashboard/add-blog',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function insert_blog()
{
	$this->form_validation->set_rules('blog_heading', 'Blogs Heading','required');
	$this->form_validation->set_rules('blog_cate_id_FK[]','Blogs Category','required');
	$this->form_validation->set_rules('blog_description','Blogs Description','required');
	//$this->form_validation->set_rules('ev_date','Date','required');
	//$this->form_validation->set_rules('ev_month','Month','required');
	//$this->form_validation->set_rules('ev_year','Year','required');
	//$this->form_validation->set_rules('blog_address','Blogs Address','required');
	//$this->form_validation->set_rules('country','Blogs Country','required');
	//$this->form_validation->set_rules('city','Event City','required');

	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->add_blog_view($msg,$msg_class);
	}
	else
	{
            $post_data = $this->input->post();
            $userData  = $this->urs->getUserBlogData(USER_DETAILS,ADDRESS,$this->session->userdata('user_id'));
	    if(count($post_data) > 0){
		//______________________________________________________________
		$blog_heading     = $this->security->xss_clean(escape_str($post_data['blog_heading']));
		$blog_cate_id     = $this->security->xss_clean(escape_str($post_data['blog_cate_id_FK']));
		$blog_description = $this->security->xss_clean(escape_str($post_data['blog_description']));
		$blog_description = str_ireplace(array("\r","\n",'\r','\n'),'', $blog_description);//Remove r/n in CK Editor
		//$blog_date           = $this->security->xss_clean(escape_str($post_data['blog_date']));
		//$blog_address        = $this->security->xss_clean(escape_str($post_data['blog_address']));
		//$country       = $this->security->xss_clean(escape_str($post_data['country']));
		//$city          = $this->security->xss_clean(escape_str($post_data['city']));
		//$blog_fb_link        = $this->security->xss_clean(escape_str($post_data['blog_fb_link']));
		//$blog_twitter_link   = $this->security->xss_clean(escape_str($post_data['blog_twitter_link']));
		//$blog_instagram_link = $this->security->xss_clean(escape_str($post_data['blog_instagram_link']));
		//$blog_status         = 'Active';
		//$blog_date = $ev_year.'-'.$ev_month.'-'.$ev_date ; // Date Concatination For Date
		/******************************PIcture Upload***************************************/
			$time = time();
			$path = "./upload/news_blog/";
			$get_profile_pic_file_name_1 = $_FILES['blog_pic']['name'];
			$get_profile_pic_temp_name_1 = $_FILES['blog_pic']['tmp_name'];
			$get_profile_pic_file_type_1 = $_FILES['blog_pic']['type'];
			$get_profile_pic_file_erro_1 = $_FILES['blog_pic']['error'];
			$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;
			$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1;
			if(isset($get_profile_pic_file_name_1) && (!empty($get_profile_pic_file_name_1)))
			{
				$profile_pic_upload = move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
			}
			else{$get_profile_pic_modi_name_1 = '';}
		/****************************** End PIcture Upload********************************************/
		//______________________________________________________________

		//______________________________________________________________
		$this->__all_data = array
		(
			'user_id'                  => $this->session->userdata('user_id'),
            'country_id'               => $userData[0]['country_id'],
			'city_id'                  => $userData[0]['city_id'],
			'blog_news_title'          => $blog_heading,
			'blog_news_description'    => $blog_description,
			'blog_news_fb_link'        => $userData[0]['user_facebook'],
			'blog_news_twitter_link'   => $userData[0]['user_twitter'],
			'blog_news_instagram_link' => $userData[0]['user_instagram'],
			'blog_news_image'		   => $get_profile_pic_modi_name_1,
			'blog_news_status'         => 'Active',
            'blog_news_type'           => 'Blog',
			'create_date'              => date('Y,m,d'),
			'update_date'              => date('Y,m,d'),

		);
		$insert_data_return = $this->urs->InsertDatas(BLOG_NEWS,$this->__all_data);
		if($insert_data_return)
		{
			if( !empty($blog_cate_id) && count($blog_cate_id) > 0 )
			{

				foreach($blog_cate_id as $blogSingle)
				{

					$blog_cate_pivot[]  = array ('category_id' => $blogSingle ,'pivot_unique_id' => $insert_data_return ,'category_type' => 'blog');
				}

				$insert_data_return = $this->dashs->insert_array_batch(PIVOT_CATEGORY,$blog_cate_pivot);

				 if($insert_data_return){

					$msg = 'Blog created succefully';
					$msg_class = 'alert-success';

				}else{

					$msg = 'OPPS !! Something went wrong. Please try after some time';
					$msg_class = 'alert-danger';
				}
				 redirect('Main/list_blogs_view');
			}
		}
		else
		{
			$msg = 'OPPS !! Something went wrong. Please try after some time';
			$msg_class = 'alert-danger';
            redirect('Main/list_news_view');
		}

		//$this->list_blog_view($msg,$msg_class);
		}else{
		redirect('Main/list_news_view');
		}
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function list_blogs_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgsection['msg']       = $msg;
		$msgsection['msgclass'] = $msg_class;
	}

	$msgsection['all_data'] = $this->dashs->get_blog_full_admin(BLOG_NEWS,COUNTRY,CITY,$this->session->userdata('user_id'));

	$msgsection['all_meetup'] = $this->get_meet_up_data();
	$this->load->view('dashboard/my-blogs',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function edit_blog($id='',$msg='',$msg_class='')
{
	$output = base64_decription($id);
	$id     = $output;
	if(!empty($id) and !empty($output))
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$msgsection['msg'] = $msg;
			$msgsection['msgclass']= $msg_class;
		}
		$msgsection['all_data'] = $this->dashs->getListDatas(BLOG_NEWS,'blog_news_id',$id);
		$msgsection['all_meetup'] = $this->get_meet_up_data();
		if($msgsection['all_data'] == FALSE)
		{
			redirect('Main','refresh');
		}else{
			$msgsection['blog_category'] = $this->dashs->getCatagoryDetails(CATEGORY,'Blog');
			$msgsection['country']     = $this->dashs->getFullDetails(COUNTRY);
			$msgsection['city']      = $this->dashs->get_ajax_city($msgsection['all_data'][0]['country_id']);
			$msgsection['get_cate_id']   = $this->dashs->get_pivot_category('Blog',$msgsection['all_data'][0]['blog_news_id']);
			$this->load->view('dashboard/edit-blog-form',$msgsection);
		}
	}
	else
	{
	redirect('Main','refresh');
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function update_blog($id)
{
	$id = base64_decription($id);
	$this->form_validation->set_rules('blog_heading', 'blog Heading','required');
	$this->form_validation->set_rules('blog_cate_id_FK[]','blog Category','required');
	$this->form_validation->set_rules('blog_description','blog Description','required');

	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->edit_blog(base64_encription($id),$msg,$msg_class);
	}
	else
	{
            $post_data = $this->input->post();
			 $userData = $this->urs->getUserBlogData(USER_DETAILS,ADDRESS,$this->session->userdata('user_id'));
	    if(count($post_data) > 0){
		//______________________________________________________________________________
		$blog_heading     = $this->security->xss_clean(escape_str($post_data['blog_heading']));
		$blog_cate_id_FK  = $this->security->xss_clean(escape_str($post_data['blog_cate_id_FK']));
		$blog_description = $this->security->xss_clean(escape_str($post_data['blog_description']));
		$blog_description = str_ireplace(array("\r","\n",'\r','\n'),'', $blog_description);//Remove r/n in CK Editor
		//______________________________________________________________
			/**********************PIcture Upload*****************/
			$all_data = $this->urs->getFullUserDetails(BLOG_NEWS,$id,'blog_news_id');
			$file = $all_data[0]['blog_news_image'];
			$time = time();
			$path = "./upload/news_blog/";
			$get_profile_pic_file_name_1 = $_FILES['blog_pic']['name'];
			$get_profile_pic_temp_name_1 = $_FILES['blog_pic']['tmp_name'];
			$get_profile_pic_file_type_1 = $_FILES['blog_pic']['type'];
			$get_profile_pic_file_erro_1 = $_FILES['blog_pic']['error'];
			$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;
			$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1;
			if(isset($get_profile_pic_file_name_1) && (!empty($get_profile_pic_file_name_1)))
			{
				if($file != '')
				{
					//unlink("upload/news_blog/".$file);
				}
				$profile_pic_upload = move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
			}
			else{
			$get_profile_pic_modi_name_1 = $file;
		}
		//______________________________________________________________
		$this->__all_data = array
		(
			'user_id'                  => $this->session->userdata('user_id'),
      'country_id'               => $userData[0]['country_id'],
			'city_id'                  => $userData[0]['city_id'],
			'blog_news_title'          => $blog_heading,
			'blog_news_description'    => $blog_description,
			'blog_news_address'        => $userData[0]['street_address_1'],
			'blog_news_fb_link'        => $userData[0]['user_facebook'],
			'blog_news_twitter_link'   => $userData[0]['user_twitter'],
			'blog_news_instagram_link' => $userData[0]['user_instagram'],
			'blog_news_image'		   => $get_profile_pic_modi_name_1,
			'blog_news_status'         => 'Active',
      'blog_news_type'           => 'Blog',
			'update_date'              => date('Y,m,d'),
		);
		$update_data_return = $this->dashs->update_array($this->__all_data,$id,BLOG_NEWS,'blog_news_id');
		if($update_data_return)
		{
			if( !empty($blog_cate_id_FK) && count($blog_cate_id_FK) > 0 )
			{
				$delete_data_two = $this->dashs->delete_array(PIVOT_CATEGORY,'pivot_unique_id',$id);
				foreach($blog_cate_id_FK as $blogSingle)
				{

					$blog_cate_pivot[]  = array ('category_id' => $blogSingle ,'pivot_unique_id' => $id ,'category_type' => 'blog');
				}
				$insert_data_return = $this->dashs->insert_array_batch(PIVOT_CATEGORY,$blog_cate_pivot);

				 if($insert_data_return){

					$msg = 'Blog created succefully';
					$msg_class = 'alert-success';

				}else{

					$msg = 'OPPS !! Something went wrong. Please try after some time';
					$msg_class = 'alert-danger';
				}
				 redirect('Main/list_news_view');
			}

			if($insert_data_return)
			{
				$msg = 'You have succefully updated blog';
				$msg_class = 'alert-success';
			}
			else
			{
				$msg = 'OPPS !! Something went wrong. Please try after some time';
				$msg_class = 'alert-danger';

			}
		}else
		{
			$msg = 'OPPS !! Something went wrong. Please try after some time';
			$msg_class = 'alert-danger';

		}
                redirect('Main/list_news_view');
		}else{
		redirect('Main/list_news_view');
		}
	}
}
//+++++++++++++++++++++++++++++++++++++++ BLOG LIST VIEW +++++++++++++++++++++++++++++++++//
public function blog_details($id='',$msg='',$msg_class='')
{
$id = base64_decription($id);
$this->error_validation_session_check();
if(!empty($msg))
{
$msgsection['msg'] = $msg;
$msgsection['msg_class'] = $msg_class;
}
$msgsection['all_meetup'] = $this->get_meet_up_data();
$msgsection['all_blog'] = $this->urs->getFullUserDetails(BLOG_NEWS,$id,'blog_news_id');
$msgsection['catdata'] = $this->urs->getFullUserDetails(CATEGORY,'blog','category_type');
$msgsection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');
$msgsection['pivot_category'] = $this->urs->getFullUserDetails(PIVOT_CATEGORY,'blog','category_type');
$msgsection['city'] = $this->urs->getCountryDetails(CITY,'city_id');
if($id != $msgsection['all_blog'][0]['blog_news_id'] || $id == '')
{
redirect('Main/redirect_specific_user','refresh');
}
$this->load->view('dashboard/blog-details',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_blog($id)
{
$output = base64_decription($id);
$id     = $output;
if(!empty($id) and !empty($output))
{
//------------------------------------ UNLINK IMAGE ---------------------------------------//
$all_data = $this->urs->getFullUserDetails(BLOG_NEWS,$id,'blog_news_id');
$file = $all_data[0]['blog_news_image'];
if($file != '')
{
//unlink("upload/news_blog/".$file);
}
$delete_data = $this->dashs->delete_array(BLOG_NEWS,'blog_news_id',$id);
$delete_data_two = $this->dashs->delete_array(PIVOT_CATEGORY,'pivot_unique_id',$id);
if(($delete_data) && ($delete_data_two))
{
$msg = 'Delete successfully';
$msg_class = 'alert-success';
}
else
{
$msg = 'OPPS !! Something went wrong. Please try after some time';
$msg_class = 'alert-danger';
}
redirect('Main/list_news_view');
}
else{
redirect('Main','refresh');
}
}
############################################# END BLOG SECTION ####################################
//+++++++++++++++++++++++++++++++ ADD MEET UP FORM SECTION +++++++++++++++++++++++++++++++++++++++++
public function create_meet_up($msg='',$msg_class='')
{
$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
if(!empty($msg))
{
$msgsection['msg'] = $msg;
$msgsection['msgclass'] = $msg_class;
}
else{
$msgsection = '';
}
$msgsection['all_meetup'] = $this->get_meet_up_data();
$msgsection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');
$this->load->view('dashboard/create-meet-up',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function insert_meet_up()
{
	$this->form_validation->set_rules('meet_up_name', 'Meet Up Name','required');
	$this->form_validation->set_rules('meet_up_description','Meet Up Description','required');
	$this->form_validation->set_rules('country','Country','required');
	$this->form_validation->set_rules('city','City','required');


	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->create_meet_up($msg,$msg_class);
	}
	else
	{
$post_data = $this->input->post();
$userData  = $this->urs->getFullUserDetails(ADDRESS,$this->session->userdata('user_id'),'user_id');
	    if(count($post_data) > 0){
		//______________________________________________________________________________________
		$blog_heading     = $this->security->xss_clean(escape_str($post_data['meet_up_name']));
		$blog_description = $this->security->xss_clean(escape_str($post_data['meet_up_description']));
		$country_id 	  = $this->security->xss_clean(escape_str($post_data['country']));
		$city_id 		  = $this->security->xss_clean(escape_str($post_data['city']));
		$meetup_date 		  = $this->security->xss_clean(escape_str($post_data['meetup_date']));
		/******************************Picture Upload***************************************/
			$time = time();
			$path = "./upload/meet-up/";
			$get_profile_pic_file_name_1 = $_FILES['meet_up_image']['name'];
			$get_profile_pic_temp_name_1 = $_FILES['meet_up_image']['tmp_name'];
			$get_profile_pic_file_type_1 = $_FILES['meet_up_image']['type'];
			$get_profile_pic_file_erro_1 = $_FILES['meet_up_image']['error'];
			$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;
			$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1;
			if(isset($get_profile_pic_file_name_1) && (!empty($get_profile_pic_file_name_1)))
			{
				$profile_pic_upload = move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
			}
			else{$get_profile_pic_modi_name_1 = '';}
		/****************************** End Picture Upload********************************************/
		//______________________________________________________________

		//______________________________________________________________
		$this->__all_data = array
		(
			'user_id'                  => $this->session->userdata('user_id'),
      'country_id'               => $country_id,
			'city_id'                  => $city_id,
			'meet_up_name'             => $blog_heading,
			'meet_up_description'      => $blog_description,
			'meetup_date'              => $meetup_date,
			'meet_up_image'		   	     => $get_profile_pic_modi_name_1,
			'status'         		       => 'Active',
			'create_date'              => date('Y,m,d'),
			'update_date'              => date('Y,m,d'),

		);
		$insert_data_return = $this->urs->InsertDatas(MEET_UP,$this->__all_data);
		if($insert_data_return)
		{
			$msg 		= 'Meet Up Created';
			$msg_class 	= 'alert-success';
            redirect('Main/list_meet_up_view');
		}
		else
		{
			$msg = 'OPPS !! Something went wrong. Please try after some time';
			$msg_class = 'alert-danger';
            redirect('Main/list_meet_up_view');
		}
		}else{
		redirect('Main/list_meet_up_view');
		}
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function list_meet_up_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgsection['msg']       = $msg;
		$msgsection['msgclass']  = $msg_class;
	}
	$msgsection['all_data'] = $this->urs->get_Active_Status_data(MEET_UP,COUNTRY,CITY,$this->session->userdata('user_id'),'status','meet_up_id');
	$msgsection['all_meetup'] = $this->get_meet_up_data();
	//$msgsection['all_data'] = $this->urs->getFullActiveDetails(MEET_UP,'user_id',$this->session->userdata('user_id'),'meet_up_id','status');
	$this->load->view('dashboard/my-meet-up',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function edit_meet_up($id='',$msg='',$msg_class='')
{
	$output = base64_decription($id);
	$id     = $output;
	if(!empty($id) and !empty($output))
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$msgsection['msg'] = $msg;
			$msgsection['msgclass']= $msg_class;
		}
		$msgsection['all_data'] = $this->dashs->getListDatas(MEET_UP,'meet_up_id',$id);
		$msgsection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');
		$msgsection['all_meetup'] = $this->get_meet_up_data();
		if($msgsection['all_data'] == FALSE)
		{
			redirect('Main','refresh');
		}else{
			$msgsection['country']     = $this->dashs->getFullDetails(COUNTRY);
			$msgsection['city']      = $this->dashs->get_ajax_city($msgsection['all_data'][0]['country_id']);

			$this->load->view('dashboard/edit-meet-up-form',$msgsection);
		}
	}
	else
	{
	redirect('Main','refresh');
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function update_meet_up($id)
{
	$id = base64_decription($id);
	$this->form_validation->set_rules('meet_up_name', 'Meet Up Name','required');
	$this->form_validation->set_rules('meet_up_description','Meet Up Description','required');
	$this->form_validation->set_rules('country','Country','required');
	$this->form_validation->set_rules('city','City','required');


	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->create_meet_up($msg,$msg_class);
	}
	else
	{
            $post_data = $this->input->post();
			$userData  = $this->urs->getFullUserDetails(ADDRESS,$this->session->userdata('user_id'),'user_id');
	    if(count($post_data) > 0){
		//______________________________________________________________________________________
		$blog_heading     = $this->security->xss_clean(escape_str($post_data['meet_up_name']));
		$blog_description = $this->security->xss_clean(escape_str($post_data['meet_up_description']));
		$country_id 	  = $this->security->xss_clean(escape_str($post_data['country']));
		$city_id 		  = $this->security->xss_clean(escape_str($post_data['city']));
		$meetup_date 		  = $this->security->xss_clean(escape_str($post_data['meetup_date']));
		//______________________________________________________________
			/**********************PIcture Upload*****************/
			$all_data = $this->urs->getFullUserDetails(MEET_UP,$id,'meet_up_id');
			$file = $all_data[0]['meet_up_image'];
			$time = time();
			$path = "./upload/meet-up/";
			$get_profile_pic_file_name_1 = $_FILES['meet_up_image']['name'];
			$get_profile_pic_temp_name_1 = $_FILES['meet_up_image']['tmp_name'];
			$get_profile_pic_file_type_1 = $_FILES['meet_up_image']['type'];
			$get_profile_pic_file_erro_1 = $_FILES['meet_up_image']['error'];
			$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;
			$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1;
			if(isset($get_profile_pic_file_name_1) && (!empty($get_profile_pic_file_name_1)))
			{
				if($file != '')
				{
					//unlink("upload/meet-up/".$file);
				}
				$profile_pic_upload = move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
			}
			else{$get_profile_pic_modi_name_1 = $file;}
		//______________________________________________________________
		$this->__all_data = array
		(
			'user_id'                  => $this->session->userdata('user_id'),
      'country_id'               => $country_id,
			'city_id'                  => $city_id,
			'meet_up_name'             => $blog_heading,
			'meet_up_description'      => $blog_description,
			'meetup_date'       			 => $meetup_date,
			'meet_up_image'		   	     => $get_profile_pic_modi_name_1,
			'status'         		       => 'Active',
			'update_date'              => date('Y,m,d'),

		);
		$update_data_return = $this->dashs->update_array($this->__all_data,$id,MEET_UP,'meet_up_id');
		if($update_data_return)
		{

				$msg = 'You have succefully updated blog';
				$msg_class = 'alert-success';
		}
		else
		{
			$msg = 'OPPS !! Something went wrong. Please try after some time';
			$msg_class = 'alert-danger';

		}
                redirect('Main/list_meet_up_view');
		}else{
		redirect('Main/list_meet_up_view');
		}
	}
}
//+++++++++++++++++++++++++++++++++++++++ Details VIEW Of Meet Up +++++++++++++++++++++++++++++++++//
public function meet_up_details($id='',$msg='',$msg_class='')
{
	$id = base64_decription($id);
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msg_class'] = $msg_class;
	}
		$msgsection['meet_up_data'] = $this->urs->getFullUserDetails(MEET_UP,$id,'meet_up_id');
		$msgsection['meet_up_comments'] = $this->urs->comment_user_data(MEET_UP_COMMENTS,'meet_up_id',$id,'status','meet_up_comments_id');
		if($id != $msgsection['meet_up_data'][0]['meet_up_id'] || $id == '')
		{
			redirect('Main/redirect_specific_user','refresh');
		}//If Url Data is Not Matched
		$msgsection['all_meetup'] = $this->get_meet_up_data();
		$this->load->view('dashboard/meet-up-details',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_meet_up($id)
{
	$output = base64_decription($id);
	$id     = $output;
	if(!empty($id) and !empty($output))
	{
	//------------------------------------ UNLINK IMAGE ---------------------------------------//
	$all_data = $this->urs->getFullUserDetails(MEET_UP,$id,'meet_up_id');
	$file = $all_data[0]['meet_up_image'];
	if($file != '')
	{
		//unlink("upload/meet-up/".$file);
	}
	$delete_data = $this->dashs->delete_array(MEET_UP,'meet_up_id',$id);
    //$delete_data_two = $this->dashs->delete_array(MEET_UP_COMMENTS,'meet_up_id',$id);
	if(($delete_data) || ($delete_data_two))
	{
		$msg = 'Delete successfully';
		$msg_class = 'alert-success';
	}
	else
	{
		$msg = 'OPPS !! Something went wrong. Please try after some time';
		$msg_class = 'alert-danger';
	}
		 redirect('Main/list-meet-up-view');
	}
	else{
		redirect('Main','refresh');
	}
}
############################################# END MEET UP SECTION ####################################

//+++++++++++++++++++++++++++++++ USER DASHBOARD CLASS SECTION +++++++++++++++++++++++++++++++++++++++++
public function add_class($msg='',$msg_class='',$user_id='')
{
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['user_id'] 	= $this->session->userdata('user_id');
		$msgsection['msg'] 		= $msg;
		$msgsection['msgclass'] = $msg_class;
	}
	$msgsection['category']   = $this->dashs->getCatagoryDetails(CATEGORY,'event');
	$msgsection['country'] 	  = $this->urs->getCountryDetails(COUNTRY,'country_id');
	$msgsection['timezone']   = $this->urs->getFieldDetails(TIMEZONE);
	$msgsection['allEvent']   = $this->urs->getFullUserDetails('cmd_business',$this->session->userdata('user_id'),'user_id');
	$msgsection['all_meetup'] = $this->get_meet_up_data();
	$this->load->view('dashboard/add-class',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ INSERT CLASS CREATION VIEW +++++++++++++++++++++++++++++++//
public function insert_class()
{
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	$this->form_validation->set_rules('trainer_class_name', 'Class Name','required');
	$this->form_validation->set_rules('trainer_class_description','Class Description','required');
	$this->form_validation->set_rules('cat_id[]','Business Category','required');
	$this->form_validation->set_rules('city','City Name','required');
	$this->form_validation->set_rules('country','Country Name','required');
	$this->form_validation->set_rules('trainer_class_address','Address','required');
	$this->form_validation->set_rules('event_id','Event For Clases','required');
	$this->form_validation->set_rules('class_no_of_booking','No of Booking','required');

	$post_data = $this->input->post();//Global array variable

	$user_id = $this->session->userdata('user_id');
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->add_business($msg,$msg_class);
	}
	else
	{
		if(count($post_data) > 1)
		{
			$event_id = $post_data['event_id'];
			$name = $post_data['trainer_class_name'];
			$class_no_of_booking = $post_data['class_no_of_booking'];
			$cat_id = $post_data['cat_id'];
			$website = urlToDomain($post_data['trainer_class_website_url']);
			$website = 'http://'.$website;
			$description = $post_data['trainer_class_description'];
			$city = $post_data['city'];
			$trainer_class_address = $post_data['trainer_class_address'];
			$get_lat_lng = getLatLong($trainer_class_address); // get_data_from Helper
			$business_latitude = $get_lat_lng['latitude'];
			$business_longitute = $get_lat_lng['longitude'];
			$trainer_class_price = $post_data['trainer_class_price'];
			if(($trainer_class_price == 0) || (empty($trainer_class_price)))
			{
				$type = 'Free';
			}
			else{$type = 'Paid';}

			$country = $post_data['country'];
			$time = time();
			$path = "./upload/class/";
			$get_profile_pic_file_name_1 = $_FILES['trainer_class_image']['name'];
			$get_profile_pic_temp_name_1 = $_FILES['trainer_class_image']['tmp_name'];
			$get_profile_pic_file_type_1 = $_FILES['trainer_class_image']['type'];
			$get_profile_pic_file_erro_1 = $_FILES['trainer_class_image']['error'];
			$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;
			$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1;
	///////////////////////// PICTURE UPLOAD IN FOLDER //////////////////////////////////
		if(isset($get_profile_pic_file_name_1) && (!empty($get_profile_pic_file_name_1)))
		{
			$profile_pic_upload = move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
		}
		else{$get_profile_pic_modi_name_1 = '';}
	///////////////////////// INSERTION IN DATABASE FIELD /////////////////////////////
			$this->__all_data = array(
			  'user_id' 					=> $user_id,
			  'event_id' 					=> $event_id,
			  'trainer_class_name' 			=> $name,
			  'trainer_class_address' 		=> $trainer_class_address,
			  'trainer_class_description' 	=> $description,
			  'trainer_class_latitude' 		=> $business_latitude,
			  'trainer_class_longitute' 	=> $business_longitute,
			  'city_id' 					=> $city,
			  'trainer_class_price' 		=> $trainer_class_price,
			  'trainer_class_type' 			=> $type,
			  'country_id' 					=> $country,
			  'class_no_of_booking' 	    => $class_no_of_booking,
			  'trainer_class_image' 		=> $get_profile_pic_modi_name_1,
			  'trainer_class_website_url'	=>$website,
			  'create_date'					=>date("Y,m,d"),
			  'update_date'					=>date("Y,m,d")
			);
					/*echo '<pre>';
					print_r($this->__all_data);
					echo '<pre/>';die;*/
		$insertDataReturn = $this->urs->InsertDatas(TRAINER_CLASS,$this->__all_data);
		/*************************** Insert Pivot Category**********************************/
		if(!empty($cat_id)){
			foreach($cat_id as $cat_id){
				$this->__all_data = array(
				'category_id' => $cat_id,
				'pivot_unique_id' => $insertDataReturn,
				'category_type'=> 'class'
				);
				$insertPivotDataReturn = $this->urs->InsertDatas(PIVOT_CATEGORY,$this->__all_data);
				}
		}
		/***************************Opening Hours**********************************/
	 for($i=0;$i<7;$i++){
		  $opening_hour_day = $post_data['day_name'][$i];
		  $from_opening_hour =!empty($post_data['from_opening_hour'][$i]) ? $post_data['from_opening_hour'][$i] : 0;
		  $from_opening_mint = !empty($post_data['from_opening_mint'][$i]) ? $post_data['from_opening_mint'][$i] : 0;
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
		 'company_business_id'=>$insertDataReturn,
		 'opening_hour_day'=>$opening_hour_day,
		 'opening_hour_from'=>$from_hour,
		 'opening_hour_to'=>$to_hour,
		 'opening_hour_close'=>$opening_hour_close,
		 'opening_hour_type'=>2);
			$insert_opening_data = $this->urs->InsertDatas(OPENING_HOUR,$this->__alldata);
		 }
	  /*************************************End Opening Hours***************************************/
	 if(empty($insert_opening_data)){
		$msg = 'Opening Data Not Inserted';
		$msgclass = 'alert-danger';
		$this->add_class($msg,$msgclass);
	 }
		if($insertDataReturn)
		{
			$msg = 'Class Succefully Created';
			$msg_class = 'alert-success';
		}
		else
		{
			$msg = 'Error Occure';
			$msg_class = 'alert-danger';
		}
			redirect('Main/list_class_view','refresh');
	}
	}
}
//+++++++++++++++++++++++++++++++++++++++ SPECIFIC Member EDIT CLASS +++++++++++++++++++++++//
public function edit_class($id='',$msg='',$msg_class='')
{
	$id = base64_decription($id);
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msgclass']= $msg_class;
	}
		//$msgsection['all_events'] = $this->urs->getFullUserDetails(EVENT,$id);
		$msgsection['all_data'] = $this->urs->getFullUserDetails(VIEW_TRAINER_CLASS,$id,'trainer_class_id');
		$msgsection['all_data_only'] = $this->urs->getFullUserDetails(TRAINER_CLASS,$id,'trainer_class_id');
		$msgsection['catdata'] = $this->urs->getFullUserDetails(CATEGORY,'class','category_type');
		$msgsection['get_cate_id']   = $this->dashs->get_pivot_category('class',$msgsection['all_data'][0]['trainer_class_id']);
		$msgsection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');;
		$msgsection['opening_hour'] = $this->urs->openingHourDetails($id,2);
		$business_city_id = $msgsection['all_data'][0]['city_id'];
		$msgsection['city'] = $this->urs->getCountryDetails(CITY,'city_id');
		$all_data = $msgsection['all_data'];
		$member_id = $all_data[0]['trainer_class_id'];
		$msgsection['allEvent'] = $this->urs->getFullUserDetails('cmd_business',$this->session->userdata('user_id'),'user_id');
		$msgsection['all_meetup'] = $this->get_meet_up_data();
	//die;
	if($id != $member_id || $id == '')
	{
		$msgsection['all_data'] = $this->urs->getFullUserDetails(VIEW_TRAINER_CLASS,$this->session->userdata('user_id'),'user_id');
	$this->load->view('dashboard/my-class',$msgsection);
	}//If Url Data is Not Matched
	$this->load->view('dashboard/edit-class-form',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ Update CLASS +++++++++++++++++++++++++++++++++//
public function update_class($id)
{
	$id = base64_decription($id);
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	$this->form_validation->set_rules('trainer_class_name', 'Trainer Class Name','required');
	$this->form_validation->set_rules('trainer_class_description','Trainer Class Description','required');
	$this->form_validation->set_rules('cat_id[]','Business Category','required');
	$this->form_validation->set_rules('trainer_class_website_url','Trainer Class website','required');
	$this->form_validation->set_rules('city','City Name','required');
	$this->form_validation->set_rules('country','Country Name','required');
	$this->form_validation->set_rules('trainer_class_address','Class Address','required');
	$this->form_validation->set_rules('class_no_of_booking','No of Booking','required');

	$post_data = $this->input->post();//Global array variable

	$user_id = $this->session->userdata('user_id');
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$send_id = base64_encription($id);
		$this->edit_business($send_id,$msg,$msg_class);
	}
	else
	{
		if(count($post_data) > 1)
		{
			$event_id = $post_data['event_id'];
			$name = $post_data['trainer_class_name'];
			$class_no_of_booking = $post_data['class_no_of_booking'];
			$cat_id = $post_data['cat_id'];
			$website = urlToDomain($post_data['trainer_class_website_url']);
			$website = 'http://'.$website;
			$description = $post_data['trainer_class_description'];
			$city = $post_data['city'];
			$trainer_class_address = $post_data['trainer_class_address'];
			$get_lat_lng = getLatLong($trainer_class_address); // get_data_from Helper
			$business_latitude = $get_lat_lng['latitude'];
			$business_longitute = $get_lat_lng['longitude'];
			$trainer_class_price = $post_data['trainer_class_price'];
			if(($trainer_class_price == 0) || (empty($trainer_class_price)))
			{
				$type = 'Free';
			}
			else{$type = 'Paid';}

			$country = $post_data['country'];
			$time = time();
			$path = "./upload/class/";
			$get_profile_pic_file_name_1 = $_FILES['trainer_class_image']['name'];
			$get_profile_pic_temp_name_1 = $_FILES['trainer_class_image']['tmp_name'];
			$get_profile_pic_file_type_1 = $_FILES['trainer_class_image']['type'];
			$get_profile_pic_file_erro_1 = $_FILES['trainer_class_image']['error'];
			$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;
			$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1;

			if(!empty ($cat_id)){
				$impcategory = implode(',',$cat_id);
			}// Category Concatination

			//CHECKING FOR BUSINESS IMAGE UPLOAD
			if($get_profile_pic_file_name_1 ==''){
				 $get_profile_pic_file_name_1 = $this->urs->getFullUserDetails(TRAINER_CLASS,$id,'trainer_class_id');
				 $get_profile_pic_modi_name_1 = $get_profile_pic_file_name_1[0]['trainer_class_image'];
			}
			else{
				// DELETE PREVIOUS BUSINESS IMAGE ///
				$delete_business_image = $this->urs->getFullUserDetails(TRAINER_CLASS,$id,'trainer_class_id');
				$delete_business_image = $delete_business_image[0]['trainer_class_image'];
				////unlink("upload/class/".$delete_business_image);
				$profile_pic_upload = move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
				// End Image Deleted //
				}
	///////////////////////// INSERTION IN DATABASE FIELD /////////////////////////////
			$this->__all_data = array(
			  'user_id' 					=> $user_id,
			  'event_id' 					=> $event_id,
			  'trainer_class_name' 			=> $name,
			  'trainer_class_address' 		=> $trainer_class_address,
			  'trainer_class_description' 	=> $description,
			  'trainer_class_latitude' 		=> $business_latitude,
			  'trainer_class_longitute' 	=> $business_longitute,
			  'city_id' 					=> $city,
			  'trainer_class_price' 		=> $trainer_class_price,
			  'trainer_class_type' 			=> $type,
			  'country_id' 					=> $country,
			  'class_no_of_booking' 	    => $class_no_of_booking,
			  'trainer_class_image' 		=> $get_profile_pic_modi_name_1,
			  'trainer_class_website_url'	=> $website,
			  'update_date'					=> date("Y,m,d")
			);
		$insertDataReturn = $this->urs->UpdateDatas($this->__all_data,$id,TRAINER_CLASS,'trainer_class_id');
		/*************************** Insert Pivot Category **********************************/
		if(!empty($cat_id)){
				$delete_data_two = $this->dashs->delete_array(PIVOT_CATEGORY,'pivot_unique_id',$id);
					foreach($cat_id as $cat_id){
					$this->__all_data = array(
					'category_id' => $cat_id,
					'pivot_unique_id' => $id,
					'category_type'=> 'class'
					);
					$insertPivotDataReturn = $this->urs->InsertDatas(PIVOT_CATEGORY,$this->__all_data);
					}
			}
		/***************************Opening Hours**********************************/
		$opening_id = $this->urs->openingHourDetails($id,2);
	 	for($i=0;$i<7;$i++){
		 $opening_hour_id = $opening_id[$i]['opening_hour_id'];
		   $opening_hour_day = $post_data['day_name'][$i];
		  $from_opening_hour =!empty($post_data['from_opening_hour'][$i]) ? $post_data['from_opening_hour'][$i] : 0;
		  $from_opening_mint = !empty($post_data['from_opening_mint'][$i]) ? $post_data['from_opening_mint'][$i] : 0;
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
		 'company_business_id'=>$id,
		 'opening_hour_day'=>$opening_hour_day,
		 'opening_hour_from'=>$from_hour,
		 'opening_hour_to'=>$to_hour,
		 'opening_hour_close'=>$opening_hour_close,
		 'opening_hour_type'=>2);
			$update_opening_data = $this->urs->UpdateDatas($this->__alldata,$opening_hour_id,OPENING_HOUR,'opening_hour_id');
		 }
	  /*************************************End Opening Hours***************************************/
	 if(empty($insert_opening_data)){
		$msg = 'Opening Data Not Inserted';
		$msgclass = 'alert-danger';
		$this->add_class($msg,$msgclass);
	 }
		if($insertDataReturn)
		{
			$msg = 'Class Succefully Created';
			$msg_class = 'alert-success';
		}
		else
		{
			$msg = 'Error Occure';
			$msg_class = 'alert-danger';
		}
			redirect('Main/list_class_view','refresh');
	}
			$this->list_class_view($msgsection['msg'],$msgsection['msg_class']);
	}

}
//+++++++++++++++++++++++++++++++++++++++ LIST VIEW ALL CLASS +++++++++++++++++++++++++++++++++//
public function class_details($id='',$msg='',$msg_class='')
{
	$id = base64_decription($id);
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msg_class'] = $msg_class;
	}
		//$user_id = $this->session->userdata('user_details');
		//$field_value = $this->details_field_value();
		//$msgsection['all_events'] = $this->urs->getFullDetails(EVENT,$field_value,$user_id[0]['id']);
		$msgsection['all_data'] = $this->urs->getFullUserDetails(VIEW_BUSINESS,$id,'business_id');
		$msgsection['catdata'] = $this->urs->getFullUserDetails(CATEGORY,'event','category_type');
		$msgsection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');;
		$msgsection['opening_hour'] = $this->urs->openingHourDetails($id,1);
		$msgsection['all_meetup'] = $this->get_meet_up_data();
		$msgsection['city'] = $this->urs->getCountryDetails(CITY,'city_id');
		if($id != $msgsection['all_data'][0]['business_id'] || $id == '')
		{
			$msgsection['all_data'] = $this->urs->getFullUserDetails(VIEW_BUSINESS,$this->session->userdata('user_id'),'user_id');
	$this->load->view('dashboard/my-business',$msgsection);
		}//If Url Data is Not Matched
		$this->load->view('dashboard/business-details',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ LIST VIEW Specific CLASS +++++++++++++++++++++++++++++++++//
public function list_class_view($msg='',$msg_class='')
{
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msg_class'] = $msg_class;
	}
	$msgsection['all_data'] = $this->urs->getFullUserDetails(VIEW_TRAINER_CLASS,$this->session->userdata('user_id'),'user_id');
	$msgsection['all_meetup'] = $this->get_meet_up_data();
	$this->load->view('dashboard/my-class',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++++++++ DELETE CLASS LIST +++++++++++++++++++++++++++++++++//
public function delete_full_class($id)
{
		$id = base64_decription($id);
		$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
		if($id != '')
		{
			//
			$all_data = $this->urs->getFullUserDetails(TRAINER_CLASS,$id,'trainer_class_id');
			//$all_data = $this->urs->getFullDetails(EVENT,'user_id',$user_id,'event_id');
			$file = $all_data[0]['trainer_class_image'];
			if($file != '')
			{
				//unlink("upload/class/".$file);
			}
			$delete_data = $this->urs->DeleteDatas(TRAINER_CLASS,$id,'trainer_class_id');
			$delete_Pivot_data = $this->urs->DeletePivoteDatas(PIVOT_CATEGORY,$id,'pivot_unique_id','category_type' ,'class');
			$delete_data = $this->urs->DeletePivoteDatas(OPENING_HOUR,$id,'company_business_id','opening_hour_type','2');
			if(!empty($delete_data)){
			echo $msg = 'Delete Successfully';
			$msg_class = 'alert-success';
			}
			else{
				echo $msg = 'Error';
				$msg_class = 'alert-danger';
				}
				//$this->list_event_view($msg,$msg_class);
				$msgsection['all_data'] = $this->urs->getFullUserDetails(VIEW_TRAINER_CLASS,$this->session->userdata('user_id'),'user_id');
				$this->load->view('dashboard/my-class',$msgsection);
		}
		else{
				$msgsection['all_data'] = $this->urs->getFullUserDetails(VIEW_TRAINER_CLASS,$this->session->userdata('user_id'),'user_id');
				$this->load->view('dashboard/my-class',$msgsection);
			}
}
############################################# END CLASS SECTION ####################################
//++++++++++++++++++++++++++++++++ View Membership ++++++++++++++++++++++++++++++++++++++++// */
public function membership_update($val)
{
	$id = base64_decription($val);
	$membership_details = $this->urs->getFullUserDetails(MEMBERSHIP,$id,'membership_id');
	//print_r($membership_details);
	$membership_category_id = $membership_details[0]['membership_category_id'];
	$member_value['details']= $this->urs->getFullUserDetails(MEMBERSHIP,$membership_category_id,'membership_category_id');
	$member_value['all_meetup'] = $this->get_meet_up_data();
	$this->load->view('dashboard/my-membership',$member_value);
}
//+++++++++++++++++++++++++++++++++++++++ INSERT CITY REQUEST +++++++++++++++++++++++++++++++//
public function request_city_insert()
{
	$post_data = $this->input->post();
	if(count($post_data)>0){
	$city_name = $post_data['req_city_name'];
	$this->__all_data = array(
	'city_name'=>$city_name,
	'type'=> 0 ,
	'city_status'=>'Inactive',
	);
	$get_return_status = $this->urs->InsertDatas(CITY,$this->__all_data);
		if($get_return_status != ''){
		echo 'SUCCESS';
		}
		else{
			echo 'ERROR';
		}
	}
}
//+++++++++++++++++++++++++++++++++++++++ INSERT MEET UP COMMENTS USING AJAX INSERTION +++++++++++++++++++++++++++++++//
public function insert_meet_up_comments()
{
	$post_data = $this->input->post();
	if(count($post_data)>0){
	$meet_up_id 		= $post_data['meet_up_id'];
	$meet_up_comments 	= $post_data['comments'];
	$this->__all_data = array(
	'meet_up_id'		=> $meet_up_id,
	'comments'			=> $meet_up_comments,
	'user_id' 			=> $this->session->userdata('user_id'),
	'create_date'		=> date('Y-m-d'),
	'status'			=> 'Active',
	);
	$get_return_status = $this->urs->InsertDatas(MEET_UP_COMMENTS,$this->__all_data);
		if($get_return_status != ''){
		echo 'SUCCESS';
		}
		else{
			echo 'ERROR';
		}
	}
}
//+++++++++++++++++++++++++++++++++++++++ INSERT MEET UP COMMENTS +++++++++++++++++++++++++++++++//
public function insert_meet_up_normal_comment($get_id)
{
	$id = base64_decription($get_id);
	$post_data = $this->input->post();
	if(count($post_data)>0){
	echo $meet_up_id 	= $id;
	$meet_up_comments 	= $post_data['feedback'];
	$this->__all_data = array(
	'meet_up_id'		=> $meet_up_id,
	'comments'			=> $meet_up_comments,
	'user_id' 			=> $this->session->userdata('user_id'),
	'create_date'		=> date('Y-m-d'),
	'status'			=> 'Active',
	);
	$get_return_status = $this->urs->InsertDatas(MEET_UP_COMMENTS,$this->__all_data);
		if($get_return_status != ''){
			$msg = 'posted';
		redirect(base_url().'Main/meet-up-details/'.$get_id.'/'.$msg.'/','refresh');
		}
		else{
			redirect(base_url().'Main/meet-up-details/'.$get_id,'refresh');
		}
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++VIEW IN DASHBOARD++++++++++++++++++++++++++++++++++++++++++++++++++++
public function my_favourites()
{
	$msgsection['fav_city'] = $this->urs->getFavCitys(CITY,PIVOT_FEB_CITY,'city_id',$this->session->userdata('user_id'));
	$msgsection['fav_event'] = $this->urs->getFavDatas(EVENT,PIVOT_FEB_EVENT,'event_id',$this->session->userdata('user_id'),'event_status');
	$msgsection['fav_store'] = $this->urs->getFavDatas(BUSINESS,PIVOT_FEB_STORE,'business_id',$this->session->userdata('user_id'),'business_status');
	$msgsection['all_meetup'] = $this->get_meet_up_data();
	$this->load->view('dashboard/my-favourites',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function favourite_city()
{
	$log_id = $this->session->userdata('user_id');
	$post_data = $this->input->post();
	$city_id = $post_data['city_id'];
	$get_return = $this->urs->getFebCityDetails($log_id,$city_id);
	if($get_return == 'Yes'){
	$get_return_status = $this->urs->DeleteFavCity(PIVOT_FEB_CITY,$log_id,$city_id,'city_id');
	$status_text = 'SUCCESS';
	}else{
		//print_r($all_id);die;
	$this->__all_data = array(
		'user_id'=>$log_id,
		'city_id'=>$city_id
	);
	$get_return_status = $this->urs->InsertDatas(PIVOT_FEB_CITY,$this->__all_data);
	$status_text = 'SUCCESS_1';
	}
	echo $status_text;
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function favourite_event()
{
	$log_id = $this->session->userdata('user_id');
	$post_data = $this->input->post();
	$event_id = $post_data['send_id'];
	$get_return = $this->urs->getFebDetails(PIVOT_FEB_EVENT,$log_id,$event_id,'event_id');
	if($get_return == 'Yes'){
	$get_return_status = $this->urs->DeleteFavCity(PIVOT_FEB_EVENT,$log_id,$event_id,'event_id');
	$status_text = 'SUCCESS';
	}else{
	$this->__all_data = array(
		'user_id'=>$log_id,
		'event_id'=>$event_id
	);
	$get_return_status = $this->urs->InsertDatas(PIVOT_FEB_EVENT,$this->__all_data);
	$status_text = 'SUCCESS_1';
	}
	echo $status_text;
}
public function favourite_news()
{
	$log_id = $this->session->userdata('user_id');
	$post_data = $this->input->post();
	$event_id = $post_data['send_id'];
	$get_return = $this->urs->getFebDetails('cmd_pivot_favourite_news',$log_id,$event_id,'news_id');
	if($get_return == 'Yes'){
	$get_return_status = $this->urs->DeleteFavCity('cmd_pivot_favourite_news',$log_id,$event_id,'news_id');
	$status_text = 'SUCCESS';
	}else{
	$this->__all_data = array(
		'user_id'=>$log_id,
		'news_id'=>$event_id
	);
	$get_return_status = $this->urs->InsertDatas('cmd_pivot_favourite_news',$this->__all_data);
	$status_text = 'SUCCESS_1';
	}
	echo $status_text;
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function favourite_store()
{
	$log_id = $this->session->userdata('user_id');
	$post_data = $this->input->post();
	$store_id = $post_data['send_id'];
	$get_return = $this->urs->getFebDetails(PIVOT_FEB_STORE,$log_id,$store_id,'business_id');
	if($get_return == 'Yes'){
	$get_return_status = $this->urs->DeleteFavCity(PIVOT_FEB_STORE,$log_id,$store_id,'business_id');
	$status_text = 'SUCCESS';
	}else{
	$this->__all_data = array(
		'user_id'=>$log_id,
		'business_id'=>$store_id
	);
	$get_return_status = $this->urs->InsertDatas(PIVOT_FEB_STORE,$this->__all_data);
	$status_text = 'SUCCESS_1';
	}
	echo $status_text;
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function join_event()
{
	$log_id = $this->session->userdata('user_id');
	$post_data = $this->input->post();
	$event_id = $post_data['send_id'];
	$get_return = $this->urs->getFebDetails(PIVOT_JOIN_EVENT,$log_id,$event_id,'event_id');
	if($get_return == 'Yes'){
	$get_return_status = $this->urs->DeleteFavCity(PIVOT_JOIN_EVENT,$log_id,$event_id,'event_id');
	$status_text = 'SUCCESS';
	}else{
	$this->__all_data = array(
		'user_id'=>$log_id,
		'event_id'=>$event_id,
		'create_date'=>date('Y m d')
	);
	$get_return_status = $this->urs->InsertDatas(PIVOT_JOIN_EVENT,$this->__all_data);
	$status_text = 'SUCCESS_1';
	}
	echo $status_text;
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function join_class($event_id='')
{
	if(!empty($event_id)){
	$log_id = $this->session->userdata('user_id');
	//$post_data = $this->input->post();
	//$event_id  = $post_data['send_id'];
	if(!empty($event_id)){
	$all_data_only = $this->urs->getFullUserDetails(TRAINER_CLASS,$event_id,'trainer_class_id');
	$getCount = $this->urs->getClassCount($event_id);
	if($getCount <= $all_data_only[0]['class_no_of_booking']){
	$get_return = $this->urs->getFebDetails(PIVOT_JOIN_CLASS,$log_id,$event_id,'trainer_class_id');
	if($get_return == 'Yes'){
	//$get_return_status = $this->urs->DeleteFavCity(PIVOT_JOIN_CLASS,$log_id,$event_id,'trainer_class_id');
	redirect('Home/trainer-details-classes/'.base64_encode($event_id),'refresh');
	}else{
	$all_data_only = $this->urs->getFullUserDetails(TRAINER_CLASS,$event_id,'trainer_class_id');
	//Set variables for paypal form
	$returnURL = base_url().'paypal/success'; //payment success url
	$cancelURL = base_url().'paypal/cancel'; //payment cancel url
	$notifyURL = base_url().'paypal/ipn'; //ipn url
	//get particular product data
	$item_name = $log_id.'_'.$all_data_only[0]['event_id'].'_'.$all_data_only[0]['trainer_class_id'].'_'.'tranning-class';
	$logo = base_url().'assets/img/x-click-but01.gif';
	$this->paypal_lib->add_field('return', $returnURL);
	$this->paypal_lib->add_field('cancel_return', $cancelURL);
	$this->paypal_lib->add_field('notify_url', $notifyURL);
	$this->paypal_lib->add_field('amount',  $all_data_only[0]['trainer_class_price']);
	$this->paypal_lib->add_field('item_name',$item_name);
	$this->paypal_lib->image($logo);
	$this->paypal_lib->paypal_auto_form();
	}
	}else{
	redirect('Home/trainer-details-classes/'.base64_encode($event_id),'refresh');
	}
	}
	}else{
	redirect('Home','refresh');
	}

}


public function join_class_withoutpay($class_id='')
{
	
	$log_id = $this->session->userdata('user_id');
	$get_class_details = $this->urs->getFullUserDetails(TRAINER_CLASS,$class_id,'trainer_class_id');

	if(!empty($class_id))
	{

	
	$sql = "SELECT * FROM ".PIVOT_JOIN_CLASS." 
			WHERE trainer_class_id = '".$get_class_details[0]['trainer_class_id']."' AND user_id = '".$log_id."'";

	$exe = $this->db->query($sql);
	$count = $exe->num_rows();

	if($count == 0){

	$data = array('user_id'=>$log_id,'trainer_class_id'=>$get_class_details[0]['trainer_class_id'],'create_date'=>date('Y m d'));	
	
	$this->urs->InsertDatas(PIVOT_JOIN_CLASS,$data);

	}else{
	$get_data = $exe->result_array();
	$this->db->delete(PIVOT_JOIN_CLASS, array('joining_class_id' => $get_data[0]['joining_class_id']));	
	}

	redirect('Home/trainer-details-classes/'.base64_encode($class_id),'refresh');	

	}else{
	redirect('Home','refresh');
	}

}


//+++++++++++++++++++++++++++++++++++++++ INSERT FEEDBACK +++++++++++++++++++++++++++++++//
public function insert_feedback()
{
	$post_data = $this->input->post();
	//print_r($post_data);die;
	if(count($post_data)>0){
	$business_id = $post_data['store_id'];

	$data['business_id'] 			= base64_decription($post_data['store_id']);
	$data['user_id'] 				= $this->session->userdata('user_id');
	$data['store_feedback'] 		= $post_data['feedback'];
	$data['store_location_ratting'] = $post_data['store_location_ratting'];
	$data['store_service_ratting'] 	= $post_data['store_service_ratting'];
	$data['store_quality_ratting'] 	= $post_data['store_quality_ratting'];
	$data['store_others_ratting'] 	= $post_data['store_others_ratting'];
	$data['create_date'] 			= date('Y-m-d');
	$get_return_status = $this->urs->InsertDatas(STORE_FEEDBACK,$data);
		if($get_return_status != ''){
			$msg = 'Success';
		redirect(base_url().'Home/store-details/'.$business_id.'/'.$msg.'/','refresh');
		}
		else{
			redirect('Home/store-details/'.$business_id,'refresh');
		}
	}
}
############################################# END FAVOURITE CITY ####################################

//++++++++++++++++++++++++++++++++++++++ SPECIFIC USER PROFILE VALUE ++++++++++++++++++++++++++++++++++
/*public function profile_view(){
	if(!empty($this->session->userdata('user_login'))){
	   $msgsection['user_details'] = $this->urs->detailsUserDetails($this->session->userdata('user_id'));
	   $msgsection['all_events'] = $this->urs->getFullUserDetails(VIEW_EVENT,$this->session->userdata('user_id'),'user_id');
	   $msgsection['all_business'] = $this->urs->getFullUserDetails(VIEW_BUSINESS,$this->session->userdata('user_id'),'user_id');
	   $msgsection['all_meetup'] = $this->get_meet_up_data();
	   print_r($msgsection['all_events']);die;
			$this->load->view('dashboard/user-profile',$msgsection);
		}
		else{
				redirect("Home/index","refresh");
			}
}
*///++++++++++++++++++++++++++++++++++++++ SPECIFIC USER PROFILE VALUE ++++++++++++++++++++++++++++++++++
public function profile_view($id=''){
	if(!empty($id)){
	   $user_id  = base64_decription($id);
	   $valid_id = $this->urs->CheckDatas(USER,'user_id',$user_id);
	   if(!empty($valid_id)){
	   //$listdata['user_details']  = $this->urs->detailsUserDetails($user_id);
	   $listdata['all_events'] 	  = $this->urs->getFullUserDetails(VIEW_EVENT,$user_id,'user_id');
	   $listdata['all_business']  = $this->urs->getFullUserDetails(VIEW_BUSINESS,$this->session->userdata('user_id'),'user_id');
	   $listdata['all_meetup'] 	  = $this->get_meet_up_data();
	   $listdata['ratting_data'] = $this->urs->getFeedbackRatting(STORE_FEEDBACK,$user_id,'user_id');
	   $listdata['coulmnName']  = $this->urs->getCoulmnName(USER_DETAILS);
	   $listdata['permision_data'] = $this->urs->getFullUserDetails(FIELD_PERMISION,$user_id,'user_id');
	   /*echo '<pre>';
	   print_r($listdata['permision_data']);*/

	   $tempNotPermittedField = array_map(function($a){
		   return $a['field_permision_name'];
	   }, $listdata['permision_data']);
	   /*echo '<pre>';
	   print_r($tempNotPermittedField);*/

	   $tempPermittedField = array();
	   foreach($listdata['coulmnName'] as $k => $v){
		   if(!in_array($v['COLUMN_NAME'], $tempNotPermittedField)){
			   array_push($tempPermittedField, $v['COLUMN_NAME']);
		   }
	   }
	  // echo '<pre>';
	   //print_r(USER_DETAILS.'.'.$tempPermittedField);
	    $listdata['user_details']  = $this->urs->Permission_User(USER_DETAILS,$tempPermittedField,$user_id);

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
//+++++++++++++++++++++++++++++++ USER LOGOUT SECTION ++++++++++++++++++++++++++++++++++
public function logOut()
{
	$this->session->sess_destroy();
	redirect('Home','refresh');
}

public function my_payment()
{
	$user_id = $this->session->userdata('user_id');	
	if(!empty($user_id)){
	$listdata['all_payment'] = $this->urs->getFullUserDetails('payments',$user_id,'user_id');
	$this->load->view('dashboard/user-payment',$listdata);
	}else{
		redirect("Home/index","refresh");
	}
}

public function my_purchase()
{
	$user_id = $this->session->userdata('user_id');	
	if(!empty($user_id)){
	$listdata['all_p_order'] = $this->urs->getFullUserDetails('user_order_details',$user_id,'user_id');
	$this->load->view('dashboard/user-purchase',$listdata);
	}else{
		redirect("Home/index","refresh");
	}
}


}//END CLASS
