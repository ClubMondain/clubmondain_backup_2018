<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Energiser extends CI_Controller
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
	$this->load->helper('data');
	$this->load->model('Users','urs');
	$this->load->model('EnergiserData','energiserdata'); //Replace the Users Model Name
	$this->load->model('Dashboards','dashs'); //Replace the Dashboard Model Name
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

// +++++++++++++++++++++++ COUNTRY CORROSPOND CITY LIST (AJAX CALLING DATA) +++++++++++++++++++++
public function check_city()
{
	$this->__country = $this->input->post('country',true);
	$this->__all_data = $this->energiserdata->getCityFullDetails(CITY,'country_id',$this->__country,'city_id');
	print_r($this->__all_data);
	 if(count($this->__all_data) > 0)
	 {
	 	foreach($this->__all_data as $city)
		{
			 echo '<option value='.$city['city_id'].'>'.$city['city_name'].'</option>';
		}
	 }
}

//+++++++++++++++++++++++++++++++++++++++ LIST INVITE SPACE +++++++++++++++++++++++++++++++//
public function list_invite_space()
{
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] 		 = $msg;
		$msgsection['msg_class'] = $msg_class;
	}
	$msgsection['all_data'] 	= $this->energiserdata->getFullUserDetails(INVITE_SPACE,$this->session->userdata('user_id'),'user_id');
	$this->load->view('dashboard/invite_space',$msgsection);	
}

//+++++++++++++++++++++++++++++++ ADD INVITE SPACE SECTION +++++++++++++++++++++++++++++++++++++++++
public function add_invite_space($msg='',$msg_class='',$user_id='')
{
$this->error_validation_session_check();
if(!empty($msg))
{
$msgsection['user_id'] = $user_id;
$msgsection['msg'] = $msg;
$msgsection['msgclass'] = $msg_class;
}
$msgsection['category'] = $this->energiserdata->getFullUserDetails(CATEGORY,'event','category_type');
$msgsection['country'] = $this->energiserdata->getCountryDetails(COUNTRY,'country_id');
$msgsection['timezone'] = $this->energiserdata->getFieldDetails(TIMEZONE);
$this->load->view('dashboard/add_invite_space',$msgsection);
}



//+++++++++++++++++++++++++++++++++++++++ INSERT BUSINESS CREATION VIEW +++++++++++++++++++++++++++++++//
public function insert_invite_space()
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
			$invite_type = $post_data['invite_type'];
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
			  'invite_type' => $invite_type,
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
		$insertDataReturn = $this->energiserdata->InsertDatas(INVITE_SPACE,$this->__all_data);
		
			/*************************** Insert Pivot Category**********************************/
		if(!empty($cat_id)){
			foreach($cat_id as $cat_id){
				$this->__all_data = array(
				'category_id' => $cat_id,
				'pivot_unique_id' => $insertDataReturn,
				'category_type'=> 'invite_space'
				);
				$insertPivotDataReturn = $this->energiserdata->InsertDatas(PIVOT_CATEGORY,$this->__all_data);
				}
		}

	
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
		 'opening_hour_type'=>3);
			$insert_opening_data = $this->energiserdata->InsertDatas(OPENING_HOUR,$this->__alldata);
		 }
	  /*************************************End Opening Hoenergiserdata***************************************/
	 if(empty($insert_opening_data)){
		$msg = 'Opening Data Not Inserted';
		$msgclass = 'alert-danger';
		$this->add_business($msg,$msgclass);
	 }
		if($insertDataReturn)
		{
			$msg = 'Invite Space Succefully Created';
			$msg_class = 'alert alert-success';
		}
		else
		{
			$msg = 'Error Occure';
			$msg_class = 'alert alert-danger';
		}
			$this->session->set_flashdata('msg', $msg);
			$this->session->set_flashdata('msg_class', $msg_class);
			redirect('Energiser/list_invite_space','refresh');
	}
	}
}
//+++++++++++++++++++++++++++++++++++++++ SPECIFIC Member EDIT Event +++++++++++++++++++++++//
public function edit_invite_space($id='',$msg='',$msg_class='')
{
	$id = base64_decription($id);
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msgclass']= $msg_class;
	}
		$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(INVITE_SPACE,$id,'business_id');
		$msgsection['category'] = $this->energiserdata->getFullUserDetails(CATEGORY,'event','category_type');	
		

		$msgsection['get_cate_id']   = $this->energiserdata->get_pivot_category('invite_space',$msgsection['all_data'][0]['business_id']);		
		for($i=0; $i <count($msgsection['get_cate_id']);$i++){
			$msgsection['get_cate_val'][] = $msgsection['get_cate_id'][$i]['category_id'];
		}
		
			/*echo "<pre>";
			echo $this->db->last_query();
			print_r($msgsection['get_cate_id']);
			exit;*/
		
		$msgsection['country'] = $this->energiserdata->getCountryDetails(COUNTRY,'country_id');
	
		$msgsection['opening_hour'] = $this->energiserdata->openingHourDetails($id,3);
		
		/*echo "<pre>";
		print_r($msgsection['opening_hour']);
		exit;*/
		
		$business_city_id = $msgsection['all_data'][0]['city_id'];
		$msgsection['city'] = $this->energiserdata->getCountryDetails(CITY,'city_id');
		$all_data = $msgsection['all_data'];
		$member_id = $all_data[0]['business_id'];
		
		/*echo "<pre>";
		print_r($msgsection);
		exit;*/
		
		
	if($id != $member_id || $id == '')
	{
		$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(INVITE_SPACE,$this->session->userdata('user_id'),'user_id');
	$this->load->view('dashboard/invite_space',$msgsection);
	}
	
	//echo "<pre>";
	//print_r($msgsection);
	//exit;
	
	$this->load->view('dashboard/edit_invite_space',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ Update Event +++++++++++++++++++++++++++++++++//
public function update_invite_space($id)
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
	
/*	echo "<pre>";
	print_r($this->input->post());
	exit;*/
	
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
			$invite_type = $post_data['invite_type'];
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
				$get_profile_pic_file_name_1 = $this->energiserdata->getFullUserDetails(INVITE_SPACE,$id,'business_id');
				$get_profile_pic_modi_name_1 = $get_profile_pic_file_name_1[0]['business_image'];
			}
			else{
				// DELETE PREVIOUS BUSINESS IMAGE ///
				$delete_business_image = $this->energiserdata->getFullUserDetails(INVITE_SPACE,$id,'business_id');
				$delete_business_image = $delete_business_image[0]['business_image'];
				//unlink("upload/business/".$delete_business_image);
				$profile_pic_upload = move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
				// End Image Deleted //
				}

				//CHECKING FOR BUSINESS BANNER UPLOAD
			if($get_file_name_1 ==''){
				$get_file_name_1 = $this->energiserdata->getFullUserDetails(INVITE_SPACE,$id,'business_id');
				$get_modi_name_1 = $get_file_name_1[0]['business_banner_image'];
			}
			else{
				// DELETE PREVIOUS BANNER IMAGE ///
				$delete_business_image = $this->energiserdata->getFullUserDetails(INVITE_SPACE,$id,'business_id');
				$delete_business_image = $delete_business_image[0]['business_banner_image'];
				//unlink("upload/business/".$delete_business_image);
				$banner_pic_upload = move_uploaded_file($get_temp_name_1,$get_modi_full_1);
				// End Image Deleted //
				}
	///////////////////////// INSERTION IN DATABASE FIELD /////////////////////////////
			$this->__all_data = array(
			  'user_id' => $user_id,
			  'invite_type' => $invite_type,
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
			  'update_date'=>date("Y,m,d")
			);
		$insertDataReturn = $this->energiserdata->UpdateDatas($this->__all_data,$id,INVITE_SPACE,'business_id');
		/*************************** Insert Pivot Category **********************************/
		
				
		
		if(!empty($cat_id)){
				$delete_data_two = $this->energiserdata->delete_pivot(PIVOT_CATEGORY,'pivot_unique_id',$id,'invite_space');
				
					foreach($cat_id as $cat_id){
					$this->__all_data = array(
					'category_id' => $cat_id,
					'pivot_unique_id' => $id,
					'category_type'=> 'invite_space'
					);
					$insertPivotDataReturn = $this->energiserdata->InsertDatas(PIVOT_CATEGORY,$this->__all_data);
					}
			}
		/***************************Opening Hoenergiserdata**********************************/
		$opening_id = $this->energiserdata->openingHourDetails($id,3);
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
		 'opening_hour_type'=>3);
			$update_opening_data = $this->energiserdata->UpdateDatas($this->__alldata,$opening_hour_id,OPENING_HOUR,'opening_hour_id');
		 }
	  /*************************************End Opening Hoenergiserdata***************************************/
	 if(empty($insertDataReturn)){
		$msg = 'Opening Data Not Inserted';
		$msgclass = 'alert-danger';
		$this->list_invite_space();
	 }
		if($insertDataReturn)
		{
			$msg = 'Invite Space Succefully Updated';
			$msg_class = 'alert alert-success';
		}
		else
		{
			$msg = 'Error Occure';
			$msg_class = 'alert alert-danger';
		}
		
			$this->session->set_flashdata('msg', $msg);
			$this->session->set_flashdata('msg_class', $msg_class);
			redirect('Energiser/list_invite_space','refresh');
	}
			$this->business_list_view($msgsection['msg'],$msgsection['msg_class']);
	}

}


//+++++++++++++++++++++++++++++++++++++++++++++ DELETE INVITE SPACE +++++++++++++++++++++++++++++++++//
public function delete_invite_space($id)
{
	
		$id = base64_decription($id);
		$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
		if($id != '')
		{
			
			$all_data = $this->energiserdata->getFullUserDetails(INVITE_SPACE,$id,'business_id');
		
			$delete_data = $this->energiserdata->DeleteDatas(INVITE_SPACE,$id,'business_id');
			$delete_Pivot_data = $this->energiserdata->DeletePivoteDatas(PIVOT_CATEGORY,$id,'pivot_unique_id','category_type' ,'invite_space');
			
			$delete_data = $this->energiserdata->DeletePivoteDatas(OPENING_HOUR,$id,'company_business_id','opening_hour_type','3');			
			
			$delete_data = $this->energiserdata->DeleteDatas(ERERGISER_CSV,$id,'space_id');
			
			if($delete_data){
			$msg = 'Delete Successfully';
			$msg_class = 'alert alert-success';
			}
			else{
				$msg = 'Error';
				$msg_class = 'alert alert-danger';
				}				
				$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(INVITE_SPACE,$this->session->userdata('user_id'),'user_id');
				$this->session->set_flashdata('msg', $msg);
				$this->session->set_flashdata('msg_class', $msg_class);				
				$this->load->view('dashboard/invite_space',$msgsection);
		}
		else{
				$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(INVITE_SPACE,$this->session->userdata('user_id'),'user_id');
				$this->load->view('dashboard/invite_space',$msgsection);
			}
}

//+++++++++++++++++++++++++++++++++++++++++++++ DELETE INVITE SPACE +++++++++++++++++++++++++++++++++//



//+++++++++++++++++++++++++++++++++++++++ LIST ENERGISER +++++++++++++++++++++++++++++++++//
public function list_energiser($msg='',$msg_class='')
{
	
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msg_class'] = $msg_class;
	}
	$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(ENERGISER,$this->session->userdata('user_id'),'user_id');
	
	$this->load->view('dashboard/list_energiser',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ LIST ENERGISER +++++++++++++++++++++++++++++++++//



//+++++++++++++++++++++++++++++++++++++++ LIST CSV +++++++++++++++++++++++++++++++++//
public function list_csv($space_id)
{
	$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(ERERGISER_CSV,$space_id,'space_id');
	$msgsection['space_id'] = $space_id;
	$this->load->view('dashboard/list_csv',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ LIST CSV +++++++++++++++++++++++++++++++++//

//+++++++++++++++++++++++++++++++++++++++ DELETE CSV +++++++++++++++++++++++++++++++++//
public function delete_csv($id,$energiser_id='')
{
	
		$id = base64_decription($id);	
		$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
		if($id != '')
		{
			$delete_data = $this->energiserdata->DeleteDatas(ERERGISER_CSV,$id,'id');			
			if(!empty($delete_data)){
			 $msg = 'Delete Successfully';
			$msg_class = 'alert alert-success';
			}
			else{
				echo $msg = 'Error';
				$msg_class = 'alert alert-danger';
				}			
				$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(ENERGISER,$this->session->userdata('user_id'),'user_id');
				
				$this->session->set_flashdata('msg', $msg);
				$this->session->set_flashdata('msg_class', $msg_class);
				redirect('Energiser/list_csv/'.$energiser_id,'refresh');
		}
		
}

//+++++++++++++++++++++++++++++++++++++++ DELETE CSV +++++++++++++++++++++++++++++++++//

//+++++++++++++++++++++++++++++++ ADD ENERGISER +++++++++++++++++++++++++++++++++++++++++
public function add_energiser($msg='',$msg_class='',$user_id='')
{
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['user_id'] 	= $this->session->userdata('user_id');
		$msgsection['msg'] 		= $msg;
		$msgsection['msgclass'] = $msg_class;
	}
	$msgsection['category']   = $this->energiserdata->getCatagoryDetails(CATEGORY,'event');
	
	$msgsection['country'] 	  = $this->energiserdata->getCountryDetails(COUNTRY,'country_id');
	$msgsection['timezone']   = $this->energiserdata->getFieldDetails(TIMEZONE);
	$msgsection['allEvent']   = $this->energiserdata->getFullUserDetails('cmd_invitespace',$this->session->userdata('user_id'),'user_id');	
	$msgsection['invite_space']   = $this->energiserdata->getInviteSpace(INVITE_SPACE);
	$this->load->view('dashboard/add-energiser',$msgsection);
}
//+++++++++++++++++++++++++++++++ ADD ENERGISER +++++++++++++++++++++++++++++++++++++++++

//+++++++++++++++++++++++++++++++ INSERT ENERGISER +++++++++++++++++++++++++++++++++++++++++

public function insert_energiser()
{

	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	$this->form_validation->set_rules('trainer_class_name', 'Energiser Name','required');
	$this->form_validation->set_rules('trainer_class_description','Energiser Description','required');
	$this->form_validation->set_rules('cat_id[]','Business Category','required');
	$this->form_validation->set_rules('city','City Name','required');
	$this->form_validation->set_rules('country','Country Name','required');
	$this->form_validation->set_rules('trainer_class_address','Address','required');
	$this->form_validation->set_rules('space_id','Space For Clases','required');
	$this->form_validation->set_rules('class_no_of_booking','No of Booking','required');

	$post_data = $this->input->post();//Global array variable

	$user_id = $this->session->userdata('user_id');
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert alert-danger';
		$this->add_energiser($msg,$msg_class);
	}
	else
	{
		if(count($post_data) > 1)
		{
			$space_id = $post_data['space_id'];
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
			
			$value = preg_replace('~\.0+$~','',$trainer_class_price);
			
			if(($value == 0) || (empty($value)))
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
			  'space_id' 					=> $space_id,
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
		$insertDataReturn = $this->energiserdata->InsertDatas(ENERGISER,$this->__all_data);
		/*************************** Insert Pivot Category**********************************/
		if(!empty($cat_id)){
			foreach($cat_id as $cat_id){
				$this->__all_data = array(
				'category_id' => $cat_id,
				'pivot_unique_id' => $insertDataReturn,
				'category_type'=> 'energiser_space'
				);
				$insertPivotDataReturn = $this->energiserdata->InsertDatas(PIVOT_CATEGORY,$this->__all_data);
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
		 'opening_hour_type'=>4);
			$insert_opening_data = $this->energiserdata->InsertDatas(OPENING_HOUR,$this->__alldata);
		 }
	  /*************************************End Opening Hours***************************************/
	 if(empty($insert_opening_data)){
		$msg = 'Opening Data Not Inserted';
		$msgclass = 'alert-danger';
		$this->add_class($msg,$msgclass);
	 }
		if($insertDataReturn)
		{
			$msg = 'Energizer Succefully Created';
			$msg_class = 'alert alert-success';
		}
		else
		{
			$msg = 'Error Occure';
			$msg_class = 'alert alert-danger';
		}
		
			$this->session->set_flashdata('msg', $msg);
			$this->session->set_flashdata('msg_class', $msg_class);
			redirect('Energiser/list_energiser','refresh');
	}
	}
}

//+++++++++++++++++++++++++++++++ INSERT ENERGISER +++++++++++++++++++++++++++++++++++++++++



//+++++++++++++++++++++++++++++++++++++++ EDIT ENERGISER +++++++++++++++++++++++//
public function edit_energiser($id='',$msg='',$msg_class='')
{
	$id = base64_decription($id);
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msgclass']= $msg_class;
	}
		//$msgsection['all_events'] = $this->urs->getFullUserDetails(EVENT,$id);
		$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(ENERGISER,$id,'trainer_class_id');
		$msgsection['all_data_only'] = $this->energiserdata->getFullUserDetails(ENERGISER,$id,'trainer_class_id');
		$msgsection['catdata'] = $this->energiserdata->getFullUserDetails(CATEGORY,'event','category_type');		
		
		$msgsection['get_cate_id']   = $this->energiserdata->get_pivot_category('energiser_space',$msgsection['all_data'][0]['trainer_class_id']);		
		
	
		
		for($i=0; $i <count($msgsection['get_cate_id']);$i++){
			$msgsection['get_cate_val'][] = $msgsection['get_cate_id'][$i]['category_id'];
		}
		
		
		
		$msgsection['country'] = $this->energiserdata->getCountryDetails(COUNTRY,'country_id');
		
		
		
		//echo "<pre>";
		//print_r($msgsection['country']);
		//exit;
		
		
		$msgsection['opening_hour'] = $this->energiserdata->openingHourDetails($id,4);
		$business_city_id = $msgsection['all_data'][0]['city_id'];
		$msgsection['city'] = $this->energiserdata->getCountryDetails(CITY,'city_id');
		$all_data = $msgsection['all_data'];
		$member_id = $all_data[0]['trainer_class_id'];
		$msgsection['allEvent'] = $this->energiserdata->getFullUserDetails('cmd_invitespace',$this->session->userdata('user_id'),'user_id');
		
	//die;
	if($id != $member_id || $id == '')
	{
		$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(ENERGISER,$this->session->userdata('user_id'),'user_id');
	$this->load->view('dashboard/my-class',$msgsection);
	}//If Url Data is Not Matched
	$this->load->view('dashboard/edit_energiser',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ Update CLASS +++++++++++++++++++++++++++++++++//
public function update_energiser($id)
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
	$this->form_validation->set_rules('space_id','Space For Clases','required');

	$post_data = $this->input->post();//Global array variable

	$user_id = $this->session->userdata('user_id');
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$send_id = base64_encription($id);
		$this->edit_energiser($send_id,$msg,$msg_class);
	}
	else
	{
		if(count($post_data) > 1)
		{
			
			$exist_space_size = $post_data['exist_space_size'];			
			$class_no_of_booking = $post_data['class_no_of_booking'];
			if($class_no_of_booking < $exist_space_size){
			
				$msg = 'You can not decrease booking number than previous space size!';
				$msg_class = 'alert alert-danger';
				$this->session->set_flashdata('msg', $msg);
				$this->session->set_flashdata('msg_class', $msg_class);
				redirect('Energiser/edit_energiser/'.base64_encode($id),'refresh');
				
			}
			
			if($class_no_of_booking > $exist_space_size){
				$all_email_this_space = $this->energiserdata->getAllEmailOfThisSpace($post_data['space_id']);
				 for($i=0;$i<count($all_email_this_space);$i++){
				$config = array();
		        $config['useragent'] = "CodeIgniter";
		        $config['mailpath']= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
		        $config['protocol'] = "smtp";
		        $config['smtp_host'] = "localhost";
		        $config['smtp_port']= "25";
		        $config['mailtype'] = 'html';
		        $config['charset']  = 'utf-8';
		        $config['newline']  = "\r\n";
		        $config['wordwrap'] = TRUE;
		        $this->load->library('email');
		        $this->email->initialize($config);
		       	$url = 'asdasd';      
		        $fromName = "Vitality in Congress | Club Mondain";
		        $this->email->from('vitalityincongress@clubmondain.com','Vitality in Congress | Club Mondain');
				$this->email->to($all_email_this_space[$i]['email']);  
				
									        
				$res = array('name'=> $all_email_this_space[$i]['name'],'email'=>$all_email_this_space[$i]['email'],'user_phone'=> $all_email_this_space[$i]['phone'],'token'=>$all_email_this_space[$i]['token'],'link'=>base_url().'CheckUser/'.'registered'.'/'. base64_encode($post_data['space_id']).'/'.base64_encode($all_email_this_space[$i]['email']).'/'.base64_encode($all_email_this_space[$i]['id']), 'trainer_class_name' =>$post_data['trainer_class_name'],'new_no_of_booking'=> $class_no_of_booking, 'exist_space_size' => $exist_space_size);
				
				
				$mesg = $this->load->view('template/mailer_template',$res,true);
		        $this->email->subject('Vitality in Congress | Club Mondain');	
	       		$this->email->message($mesg);
	       		$this->email->send();
	       		       		
			}
								
			}
			
			$space_id = $post_data['space_id'];			
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
			   
			$value = preg_replace('~\.0+$~','',$trainer_class_price);
			   
			if(($value == 0) || (empty($value)))
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
				 $get_profile_pic_file_name_1 = $this->energiserdata->getFullUserDetails(ENERGISER,$id,'trainer_class_id');
				 $get_profile_pic_modi_name_1 = $get_profile_pic_file_name_1[0]['trainer_class_image'];
			}
			else{
				// DELETE PREVIOUS BUSINESS IMAGE ///
				$delete_business_image = $this->energiserdata->getFullUserDetails(ENERGISER,$id,'trainer_class_id');
				$delete_business_image = $delete_business_image[0]['trainer_class_image'];
				////unlink("upload/class/".$delete_business_image);
				$profile_pic_upload = move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
				// End Image Deleted //
				}
	///////////////////////// INSERTION IN DATABASE FIELD /////////////////////////////
			$this->__all_data = array(
			  'user_id' 					=> $user_id,
			  'space_id' 					=> $space_id,
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
		$insertDataReturn = $this->energiserdata->UpdateDatas($this->__all_data,$id,ENERGISER,'trainer_class_id');
		
		$this->__all_data = array('space_id'=> $space_id);
		$update_csv_energiser = $this->energiserdata->UpdateCsvEnergiser($this->__all_data,$id,ERERGISER_CSV,'energiser_id');
		
		/*************************** Insert Pivot Category **********************************/
		if(!empty($cat_id)){
				//$delete_data_two = $this->energiserdata->delete_array(PIVOT_CATEGORY,'pivot_unique_id',$id);
				
				$delete_data_two = $this->energiserdata->delete_pivot(PIVOT_CATEGORY,'pivot_unique_id',$id,'energiser_space');
				
					foreach($cat_id as $cat_id){
					$this->__all_data = array(
					'category_id' => $cat_id,
					'pivot_unique_id' => $id,
					'category_type'=> 'energiser_space'
					);
					$insertPivotDataReturn = $this->energiserdata->InsertDatas(PIVOT_CATEGORY,$this->__all_data);
					}
			}
		/***************************Opening Hours**********************************/
		$opening_id = $this->energiserdata->openingHourDetails($id,4);
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
		 'opening_hour_type'=>4);
			$update_opening_data = $this->energiserdata->UpdateDatas($this->__alldata,$opening_hour_id,OPENING_HOUR,'opening_hour_id');
		 }
	  /*************************************End Opening Hours***************************************/
	 if(empty($insert_opening_data)){
		$msg = 'Opening Data Not Inserted';
		$msgclass = 'alert-danger';
		$this->add_energiser($msg,$msgclass);
	 }
		if($insertDataReturn)
		{
			$msg = 'Energiser Succefully Updated';
			$msg_class = 'alert alert-success';
		}
		else
		{
			$msg = 'Error Occure';
			$msg_class = 'alert alert-danger';
		}
		
			$this->session->set_flashdata('msg', $msg);
			$this->session->set_flashdata('msg_class', $msg_class);
			redirect('Energiser/list_energiser','refresh');
	}
			$this->list_class_view($msgsection['msg'],$msgsection['msg_class']);
	}

}


///////////////DELETE ENERGISER////////////////////

public function delete_energiser($id)
{
		$id = base64_decription($id);
		
	
		
		$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
		if($id != '')
		{
			$all_data = $this->energiserdata->getFullUserDetails(ENERGISER,$id,'trainer_class_id');
			//$all_data = $this->urs->getFullDetails(EVENT,'user_id',$user_id,'event_id');
			$file = $all_data[0]['trainer_class_image'];
			if($file != '')
			{
				//unlink("upload/class/".$file);
			}
			$delete_data = $this->energiserdata->DeleteDatas(ENERGISER,$id,'trainer_class_id');
			$delete_Pivot_data = $this->energiserdata->DeletePivoteDatas(PIVOT_CATEGORY,$id,'pivot_unique_id','category_type' ,'energiser_space');
			$delete_data = $this->energiserdata->DeletePivoteDatas(OPENING_HOUR,$id,'company_business_id','opening_hour_type','4');
			
			$delete_data = $this->energiserdata->DeleteDatas(ERERGISER_CSV,$id,'energiser_id');
			$delete_data = $this->energiserdata->DeleteDatas(ERERGISER_CODE_ANALIZER,$id,'energiser_id');
			
			if(!empty($delete_data)){
			 $msg = 'Delete Successfully';
			$msg_class = 'alert alert-success';
			}
			else{
				 $msg = 'Error';
				$msg_class = 'alert alert-danger';
				}
				//$this->list_event_view($msg,$msg_class);
				$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(ENERGISER,$this->session->userdata('user_id'),'user_id');
				
				$this->session->set_flashdata('msg', $msg);
				$this->session->set_flashdata('msg_class', $msg_class);
				$this->load->view('dashboard/list_energiser',$msgsection);
		}
		else{
				$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(ENERGISER,$this->session->userdata('user_id'),'user_id');
				
				$this->session->set_flashdata('msg', $msg);
				$this->session->set_flashdata('msg_class', $msg_class);	
				$this->load->view('dashboard/list_energiser',$msgsection);
			}
}

///////////////UPLOAD CSV FOR ENERGISER////////////////////

public function upload_csv()
{
		$this->load->library('excel');
		$config['upload_path']          = './upload/energiser_csv/';
        $config['allowed_types']        = 'xlsx|xls';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());                        
				$msg = $error['error'];
				$msg_class = 'alert alert-danger';					
				$this->session->set_flashdata('msg', $msg);
				$this->session->set_flashdata('msg_class', $msg_class);
				redirect('Energiser/list_invite_space','refresh');
        }
        else
        {
	                     
			if(isset($_FILES["userfile"]["name"]))
			  {
			   $path = $_FILES["userfile"]["tmp_name"];
			   $object = PHPExcel_IOFactory::load($path);
			   $token_id = "E_".date('ymd').rand(100,500); 		    
			   foreach($object->getWorksheetIterator() as $worksheet)
			   {
			    $highestRow = $worksheet->getHighestRow();
			    $highestColumn = $worksheet->getHighestColumn();
			    for($row=2; $row<=$highestRow; $row++)
			    {
			     $name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
			     $email = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
			     $phone = $worksheet->getCellByColumnAndRow(2, $row)->getValue();		    
			     $data[] = array(
			     	'space_id'=> $this->input->post('space_id'),	
			     	'token' => $token_id,	
			      	'name'  => $name,				      	    
			      	'email'    => $email,
			      	'phone'  => $phone,		      
			     );
   			 	}
  			 }
  			 
  			 $insertcsv_data = $this->energiserdata->insert_csv_data(ERERGISER_CSV,$data);
  			 
  			 
  			 
  			 $this->__all_data = array(
			  'is_csv_uploaded' => 1,			  
			);
			$this->energiserdata->UpdateDatas($this->__all_data,$this->input->post('space_id'),INVITE_SPACE,'business_id');
  			   			 
  			 
  			 for($i=0;$i<count($data);$i++){
				$config = array();
		        $config['useragent'] = "CodeIgniter";
		        $config['mailpath']= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
		        $config['protocol'] = "smtp";
		        $config['smtp_host'] = "localhost";
		        $config['smtp_port']= "25";
		        $config['mailtype'] = 'html';
		        $config['charset']  = 'utf-8';
		        $config['newline']  = "\r\n";
		        $config['wordwrap'] = TRUE;
		        $this->load->library('email');
		        $this->email->initialize($config);
		       	$url = 'asdasd';      
		        $fromName = "Vitality in Congress | Club Mondain";
		        $this->email->from('vitalityincongress@clubmondain.com','Vitality in Congress | Club Mondain');
				$this->email->to($data[$i]['email']);  
				
				
				$admin_setting = $this->dashs->get_admin_setting(SETTING,1);
				
				
				$csv_dtl = $this->energiserdata->getCsvdetailsUsingEmailID($data[$i]['email'],$this->input->post('space_id'));
					
				
									        
				$res = array('name'=> $data[$i]['name'],'email'=>$data[$i]['email'],'user_phone'=> $data[$i]['phone'],'token'=>$data[$i]['token'],'link'=>base_url().'CheckUser/'.'registered'.'/'. base64_encode($this->input->post('space_id')).'/'.base64_encode($data[$i]['email']).'/'.base64_encode($csv_dtl->id),'stie_email' => $admin_setting[0]['site_email'],'address' => $admin_setting[0]['address'], 'phone' => $admin_setting[0]['phone_no'],'invite_msg' => $this->input->post('invite_msg'));
				
				
				$mesg = $this->load->view('template/mailer_template',$res,true);
		        $this->email->subject('Vitality in Congress | Club Mondain');	
	       		$this->email->message($mesg);
	       		$this->email->send();
	       		       		
			}	
  			 
		   	if(!empty($insertcsv_data)){
			$msg = 'CSV is Successfully uploaded';
			$msg_class = 'alert alert-success';
			}else{
			$msg = 'Error Occure';
			$msg_class = 'alert alert-danger';
			}
			$this->session->set_flashdata('msg', $msg);
			$this->session->set_flashdata('msg_class', $msg_class);
			redirect('Energiser/list_invite_space','refresh');
			}

	}
}
///////////////UPLOAD CSV FOR ENERGISER////////////////////




///Add User to  CSV Listing ////////////
public function add_people_to_csv($space_id)
{
		$data['space_id'] = $space_id;		
		$result = $this->energiserdata->getFullUserDetails(ERERGISER_CSV,$space_id,'space_id');
		$data['token'] = $result[0]['token'];
		$data['name'] = $this->input->post('usr_name');
		$data['email'] = $this->input->post('usr_email');
		$data['phone'] = $this->input->post('usr_phone');
				
		$insertcsv_data = $this->energiserdata->insert_user_to_csv(ERERGISER_CSV,$data);
		
		if(!empty($insertcsv_data)){
			$msg = 'People is successfully added ';
			$msg_class = 'alert alert-success';
		}
		else
		{
			$msg = 'Error';
			$msg_class = 'alert alert-danger';
		}			
			
		$this->session->set_flashdata('msg', $msg);
		$this->session->set_flashdata('msg_class', $msg_class);
		redirect('Energiser/list_csv/'.$space_id,'refresh');
}

///Add User to  CSV Listing ////////////









///Update CSV Listing User ////////////
public function update_csv_listing_user($energiser_id)
{
		$data['name'] = $this->input->post('usr_name');
		$data['email'] = $this->input->post('usr_email');
		$data['phone'] = $this->input->post('usr_phone');
		$csv_id = $this->input->post('csv_user_id');	
		$update_res = $this->energiserdata->UpdateDatas($data,$csv_id,ERERGISER_CSV,'id');
		
		if(!empty($update_res)){
			$msg = 'User successfully updated ';
			$msg_class = 'alert alert-success';
		}
		else
		{
			$msg = 'Error';
			$msg_class = 'alert alert-danger';
		}			
			
		$this->session->set_flashdata('msg', $msg);
		$this->session->set_flashdata('msg_class', $msg_class);
		redirect('Energiser/list_csv/'.$energiser_id,'refresh');
}

///Update CSV Listing User ////////////


/////////////// Mail Sent To CSV USER////////////

		public function mail_sent_csv_user($csv_id,$space_id)
		{		
			
			/*echo base64_decode($csv_id);
			
			echo "<br>";
			
			echo base64_decode($space_id);
						
			exit;*/					
						
			$result = $this->energiserdata->getCsvdetails(base64_decode($csv_id));
			$config = array();
	        $config['useragent'] = "CodeIgniter";
	        $config['mailpath']= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
	        $config['protocol'] = "smtp";
	        $config['smtp_host'] = "localhost";
	        $config['smtp_port']= "25";
	        $config['mailtype'] = 'html';
	        $config['charset']  = 'utf-8';
	        $config['newline']  = "\r\n";
	        $config['wordwrap'] = TRUE;
	        $this->load->library('email');
	        $this->email->initialize($config);
	       	$url = 'asdasd';      
	        $fromName = "Vitality in Congress | Club Mondain";
	        $this->email->from('vitalityincongress@clubmondain.com','Vitality in Congress | Club Mondain');
			$this->email->to($result->email);       
	        $this->email->subject('Vitality in Congress | Club Mondain');
	        
	        $admin_setting = $this->dashs->get_admin_setting(SETTING,1);
			
			$invite_msg = $this->input->post('invite_msg');	
								        
			$data = array('name'=> $result->name,'email'=> $result->email,'user_phone'=> $result->phone,'token'=>$result->token,'link'=>base_url().'CheckUser/'.'registered'.'/'.$space_id.'/'.base64_encode($result->email).'/'.$csv_id,'stie_email' => $admin_setting[0]['site_email'],'address' => $admin_setting[0]['address'], 'phone' => $admin_setting[0]['phone_no'],'invite_msg' =>$this->input->post('invite_msg'));
						
			$mesg = $this->load->view('template/mailer_template',$data,true);
       		$this->email->message($mesg);
       		$mail_status = $this->email->send();       		
       		if(!empty($mail_status)){
			$msg = 'Mail has been sent successfully';
			$msg_class = 'alert alert-success';
			}
			else
			{
				$msg = 'Error';
				$msg_class = 'alert alert-danger';
			}
			$this->session->set_flashdata('msg', $msg);
			$this->session->set_flashdata('msg_class', $msg_class);
			redirect('Energiser/list_csv/'.base64_decode($space_id),'refresh');
		}

/////////////// Mail Sent To CSV USER////////////

	



public function invite_space_details($space_id,$user_mail,$csv_id){	

	
		/*	echo base64_decode($space_id);
			
			echo "<br>";
			
			echo base64_decode($user_mail);
			
			echo "<br>";
			
			echo base64_decode($csv_id);
						
			exit;	8*/
	

	
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msgclass']= $msg_class;
	}
		$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(INVITE_SPACE,base64_decode($space_id),'business_id');
		$msgsection['category'] = $this->energiserdata->getFullUserDetails(CATEGORY,'event','category_type');	
			
		$msgsection['get_cate_id']   = $this->energiserdata->get_pivot_category('invite',$msgsection['all_data'][0]['business_id']);		
		for($i=0; $i <count($msgsection['get_cate_id']);$i++){
			$msgsection['get_cate_val'][] = $msgsection['get_cate_id'][$i]['category_id'];
		}
		$msgsection['country'] = $this->energiserdata->getCountryDetails(COUNTRY,'country_id');	
		$msgsection['opening_hour'] = $this->energiserdata->openingHourDetails(base64_decode($space_id),3);
		$business_city_id = $msgsection['all_data'][0]['city_id'];
		$msgsection['city'] = $this->energiserdata->getCountryDetails(CITY,'city_id');
		
		 $user_dtl = $this->energiserdata->getUser(base64_decode($user_mail));
		
		//$msgsection['user_id'] = $user_dtl->user_id;
		
		$msgsection['user_email'] = $user_mail;
		$msgsection['csv_id'] = $csv_id;
		
		
	$this->load->view("invite_space_details",$msgsection);
}


public function energiser_listing($invite_space_id,$use_mail,$csv_id)
{
	
			/*echo base64_decode($invite_space_id);
			
			echo "<br>";
			
			echo base64_decode($use_mail);
			
			echo "<br>";
			
			echo base64_decode($csv_id);						
			
			echo "<br>";		
			
			echo $this->session->userdata('user_id');
		*/
			$usr_dtls = $this->energiserdata->getUserEmail($this->session->userdata('user_id'));
			
			if(base64_decode($use_mail) ==  $usr_dtls->email){
	
		$id = base64_decode($invite_space_id);
		$invite_space_dtl =  $this->energiserdata->getInvteSpaceDetalis($id);
	
		
		/*
		FOR PUBLIC PRIVATE RESTRICTION
		if($invite_space_dtl->invite_type == 2){
			$msgsection['all_data'] = $this->energiserdata->getEnergiserDetails(ENERGISER,ERERGISER_CSV, $id,'space_id',base64_decode($use_mail));
		}*/
		/*if($invite_space_dtl->invite_type == 1){
			$msgsection['all_data'] = $this->energiserdata->getEnergiserDetailsPublic(ENERGISER, $id,'space_id');
			FOR PUBLIC PRIVATE RESTRICTION
		}*/
		
		
			$msgsection['all_data'] = $this->energiserdata->getEnergiserDetailsPublic(ENERGISER, $id,'space_id');
		

		/*echo "<pre>";
		echo $this->db->last_query();
		exit;*/

		//$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(ENERGISER,$id,'space_id');
		
		
		
		
		
		
		$msgsection['all_data_only'] = $this->energiserdata->getFullUserDetails(ENERGISER,$id,'trainer_class_id');
		$msgsection['catdata'] = $this->energiserdata->getFullUserDetails(CATEGORY,'event','category_type');		
		
		$msgsection['get_cate_id']   = $this->energiserdata->get_pivot_category('energiser',$msgsection['all_data'][0]['trainer_class_id']);		
		
	
		
		for($i=0; $i <count($msgsection['get_cate_id']);$i++){
			$msgsection['get_cate_val'][] = $msgsection['get_cate_id'][$i]['category_id'];
		}
		
		
		
		$msgsection['country'] = $this->energiserdata->getCountryDetails(COUNTRY,'country_id');
		
		$msgsection['opening_hour'] = $this->energiserdata->openingHourDetails($id,2);
		$business_city_id = $msgsection['all_data'][0]['city_id'];
		$msgsection['city'] = $this->energiserdata->getCountryDetails(CITY,'city_id');
		$all_data = $msgsection['all_data'];
		$member_id = $all_data[0]['trainer_class_id'];
		$msgsection['allEvent'] = $this->energiserdata->getFullUserDetails('cmd_invitespace',$this->session->userdata('user_id'),'user_id');	
		
		$csv_dtl = $this->energiserdata->getCsvdetails(base64_decode($csv_id));
		$usr_dtl = $this->energiserdata->getUser($csv_dtl->email);	
		
		
		$msgsection['csv_id'] = $csv_id;
		$msgsection['space_id'] = $id;
		
		$msgsection['user_id'] = $usr_dtl->user_id;
		
		$msgsection['user_mail'] = $use_mail;		
		$this->load->view("energiser_listing",$msgsection);
		}else{
			$msg = 'Your email id does not match the invitee. Please contact vitalityincongress@clubmondain.com';
			$msg_class = 'alert alert-danger';			
			$this->session->set_flashdata('msg', $msg);
			$this->session->set_flashdata('msg_class', $msg_class);
			redirect('Main/index','refresh');
		}
		
}



	public function verify_energizer_code($space_id,$energiser_id,$user_id,$user_mail,$csv_id)
	{		
	
	
		/*echo $space_id;
			
			echo "<br>";
			
			echo $energiser_id;
			
			echo "<br>";
			
			echo $user_id;
			
			echo "<br>";
			
			
			echo base64_decode($user_mail);
			
			echo "<br>";
			
			echo $csv_id;
						
			exit;*/
	
	
	
						
		$exist_energiser =  $this->energiserdata->getEnergiserCodeAnalizerForExitEnergizer($space_id,$user_id);	
		
		if($exist_energiser == 0){
							
		$csv_dtl = $this->energiserdata->getCsvdetails(base64_decode($csv_id));
		
		/*echo "<pre>";
		echo base64_decode($csv_id);
		echo "<br>";
		print_r($csv_dtl);
		exit;*/
		
		
			$msgsection['space_id'] = $space_id;	 	
			$msgsection['token'] = $csv_dtl->token;
			$msgsection['energiser_id'] = $energiser_id;
			$msgsection['csv_id'] = $csv_id;
			$msgsection['user_id'] = $user_id;
			$msgsection['user_mail'] = $user_mail;
			$this->load->view("csv_code_access",$msgsection);		 		
		 }
		else{
			$this->energiser_details($space_id,$energiser_id,$user_id,$user_mail,$csv_id);
		}	
		
	}

	public function book_energizer($space_id,$energiser_id,$csv_id,$user_id,$user_mail){
		
		$user_enter_token_id = $this->input->post('user_enter_token_id');
		$token_id = $this->input->post('token_id');
		
		/*echo $token_id;
		echo "<br>";
		
		echo $user_enter_token_id;
		
		exit;
		*/
		
		if($token_id == trim($user_enter_token_id))
		{
			
				$csv_dtl = $this->energiserdata->getCsvdetails(base64_decode($csv_id));	
				$csv_dtl = $this->energiserdata->getCsvdetails(base64_decode($csv_id));
				$usr_dtl = $this->energiserdata->getUser($csv_dtl->email);
			
				$data = array('space_id'=> $csv_dtl->space_id,'energiser_id'=> $energiser_id,'user_id'=>$usr_dtl->user_id, 'token' => $csv_dtl->token);
				$this->energiserdata->insert_code_analizer_data(ERERGISER_CODE_ANALIZER,$data);	
				//$this->energiser_details($space_id,$energiser_id,$csv_id,$user_id,$user_mail);	
				$this->energiser_details($space_id,$energiser_id,$user_id,$user_mail,$csv_id);				
				
		}		
		else
		{
				$msg = 'The invalid token you have entered. Please enter correct code or check the code to your mail';
				$msg_class = 'alert alert-danger';			
				$this->session->set_flashdata('msg', $msg);
				$this->session->set_flashdata('msg_class', $msg_class);			
				redirect('Energiser/verify-energizer-code/'.$space_id.'/'.$energiser_id.'/'.$user_id.'/'.$user_mail.'/'.$csv_id,'refresh');
		}
		
	}
	
	public function energiser_details($space_id,$energiser_id,$user_id,$user_mail,$csv_id)
	{
			
			/*echo $space_id;
			
			echo "<br>";
			
			echo $energiser_id;
			
			echo "<br>";
			
			echo $user_id;
			
			echo "<br>";
			
			
			echo base64_decode($user_mail);
			
			echo "<br>";
			
			echo $csv_id;
						
			exit;*/
		
		
		
		
		
		$this->error_validation_session_check();
	
		$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(ENERGISER,$energiser_id,'trainer_class_id');
		
		$msgsection['all_data_only'] = $this->energiserdata->getFullUserDetails(ENERGISER,$energiser_id,'trainer_class_id');
		$msgsection['catdata'] = $this->energiserdata->getFullUserDetails(CATEGORY,'event','category_type');		
		
		$msgsection['get_cate_id']   = $this->energiserdata->get_pivot_category('energiser_space',$msgsection['all_data'][0]['trainer_class_id']);	
		for($i=0; $i <count($msgsection['get_cate_id']);$i++){
			$msgsection['get_cate_val'][] = $msgsection['get_cate_id'][$i]['category_id'];
		}		
		$msgsection['country'] = $this->energiserdata->getCountryDetails(COUNTRY,'country_id');
		$msgsection['opening_hour'] = $this->energiserdata->openingHourDetails($energiser_id,4);
		$business_city_id = $msgsection['all_data'][0]['city_id'];
		$msgsection['city'] = $this->energiserdata->getCountryDetails(CITY,'city_id');
		$all_data = $msgsection['all_data'];
		$member_id = $all_data[0]['trainer_class_id'];
		$msgsection['allEvent'] = $this->energiserdata->getFullUserDetails('cmd_invitespace',$this->session->userdata('user_id'),'user_id');
		
		$msgsection['space_id'] = $space_id;
		$msgsection['user_id'] = $user_id;
		$msgsection['user_mail'] = $user_mail;
		$msgsection['csv_id'] = $csv_id;
						
		$msgsection['joined_users'] = $this->urs->getJoinUser(USER_DETAILS,JOIN_US_ENERGIZER,'trainer_class_id',$energiser_id);	//For User List Join Class User
		
		/*echo "<pre>";
		print_r($msgsection['joined_users']);
		exit;*/				
						
		$this->load->view('energiser_details',$msgsection);
	}
	

	public function join_energizer($space_id,$energizer_id,$user_id,$user_mail,$csv_id)
	{	
	
		/*echo $space_id;
			
			echo "<br>";
			
			echo $energizer_id;
			
			echo "<br>";
			
			echo $user_id;
			
			echo "<br>";
			
			
			echo base64_decode($user_mail);
			
			echo "<br>";
			
			echo $csv_id;
						
			exit;*/
	
	
	
				$energiser_seat = $this->energiserdata->getEnergiserSeatCount($energizer_id);
				
				$energiser_exist_availabe_seat = $energiser_seat->class_no_of_booking;
				$energiser_total_booking_seat = $this->energiserdata->getEnergiserTotalBookingSeat($energizer_id);
				
				//echo $energiser_exist_availabe_seat;
				//echo "<br>";
				//echo $energiser_total_booking_seat;
				//exit;
				if($energiser_exist_availabe_seat > $energiser_total_booking_seat)
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
				else
				{
					$energiser_filled_msg = 'This Energizer has already Filled Up';
					$msg_class = 'alert alert-danger';				
					$this->session->set_flashdata('energiser_filled_msg', $energiser_filled_msg);
					$this->session->set_flashdata('msg_class', $msg_class);				
					//redirect('Energiser/verify-energizer-code/'.$space_id.'/'.$energizer_id.'/'.$user_id.'/'.$user_mail.'/'.$csv_id,'refresh');
					$this->load->view('csv_code_access');
					
				}
	}


///PAYPAL PAYMENT FOR BOOKING ENERGIZER /// 
	public function join_energizer_withpay($space_id,$energizer_id,$user_id,$user_mail,$csv_id)
	{	
	
				$energiser_seat = $this->energiserdata->getEnergiserSeatCount($energizer_id);
				
				$energiser_exist_availabe_seat = $energiser_seat->class_no_of_booking;
				$energiser_total_booking_seat = $this->energiserdata->getEnergiserTotalBookingSeat($energizer_id);
				
				
				if($energiser_exist_availabe_seat > $energiser_total_booking_seat)
				{
						$log_id = $this->session->userdata('user_id');
						if(!empty($energizer_id))
						{
							$this->session->set_userdata('space_id',$space_id);
							$this->session->set_userdata('energizer_id',$energizer_id);
							$this->session->set_userdata('user_mail',$user_mail);
							$this->session->set_userdata('csv_id',$csv_id);
							
							$all_data_only = $this->urs->getFullUserDetails(ENERGISER,$energizer_id,'trainer_class_id');		
							$returnURL = base_url().'paypal/private_energiser_payment_success'; //payment success url
							$cancelURL = base_url().'paypal/cancel'; //payment cancel url
							$notifyURL = base_url().'paypal/ipn'; //ipn url
								
							$item_name = $log_id.'_'.$all_data_only[0]['space_id'].'_'.$all_data_only[0]['trainer_class_id'].'_'.'Energizer';
							$logo = base_url().'assets/img/x-click-but01.gif';
							$this->paypal_lib->add_field('return', $returnURL);
							$this->paypal_lib->add_field('cancel_return', $cancelURL);
							$this->paypal_lib->add_field('notify_url', $notifyURL);			
							$this->paypal_lib->add_field('amount',  $all_data_only[0]['trainer_class_price']);
							$this->paypal_lib->add_field('item_name',$item_name);
							$this->paypal_lib->add_field('currency_code','USD');
							$this->paypal_lib->image($logo);
							$this->paypal_lib->paypal_auto_form();
						}
					
				}
				else
				{
					$energiser_filled_msg = 'This Energizer has already Filled Up';
					$msg_class = 'alert alert-danger';				
					$this->session->set_flashdata('energiser_filled_msg', $energiser_filled_msg);
					$this->session->set_flashdata('msg_class', $msg_class);				
					//redirect('Energiser/verify-energizer-code/'.$space_id.'/'.$energizer_id.'/'.$user_id.'/'.$user_mail.'/'.$csv_id,'refresh');
					$this->load->view('csv_code_access');
					
				}
	}


///PAYPAL PAYMENT FOR BOOKING ENERGIZER /// 






	public function remove_energizer($space_id,$energizer_id,$user_id,$user_mail,$csv_id)
	{
				
		$data = array('user_id' =>$user_id,'trainer_class_id'  => $energizer_id);
		$delete_data = $this->energiserdata->DeleteRegisterEnergizer(JOIN_US_ENERGIZER,$data);		
		if(!empty($delete_data)){
			$success_msg = 'You are successfullly removed from this Energizer';
			$msg_class = 'alert alert-success';				
			$this->session->set_flashdata('success_msg', $success_msg);
			$this->session->set_flashdata('msg_class', $msg_class);
			redirect('Energiser/energiser_details/'.$space_id.'/'.$energizer_id.'/'.$user_id.'/'.$user_mail.'/'.$csv_id,'refresh');
		}
		
	}





//+++++++++++++++++++++++++++++++++++++++++++++ LOGOUT +++++++++++++++++++++++++++++++++//
public function logOut()
{
	$this->session->sess_destroy();
	redirect('Home','refresh');
}


}//END CLASS
