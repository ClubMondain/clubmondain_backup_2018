<?php 
class Event extends CI_Controller
{
	private $__data;
	private $__dataArray    = array();
	private $__settingArray = array();
	private $__all_data     = array();
	
//++++++++++++++++++++++++++++++++++++++ CONSTRUCTUR CALLING ++++++++++++++++++++++++++++++++++
	public function __construct()
	{
		parent::__construct();
		$this->getSessionValidate();
		$this->load->model('Dashboards','dashs');
	}
//++++++++++++++++++++++++++++++++++++++ SESSION CHECK +++++++++++++++++++++++++++++++++++++++
	public function getSessionValidate()
	{
		$this->__session_details = $this->session->all_userdata();
		if(!isset($this->__session_details['admin_login']))
		{
			redirect('Admin','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++ INDEX ++++++++++++++++++++++++++++++++++++++++++++++++
	public function index()
	{
		$this->load->view('admin/dashboard');	
	}
//++++++++++++++++++++++++++++++++++++++ INDEX ++++++++++++++++++++++++++++++++++++++++++++++++
public function create_event_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgSection['msg'] = $msg;
		$msgSection['msg_class'] = $msg_class; 
	}

	$msgSection['countrydata'] = $this->dashs->getFullDetails(COUNTRY);
	$msgSection['timezondata'] = $this->dashs->getFullDetails(TIMEZONE);
	$msgSection['catdata']     = $this->dashs->getCatagoryDetails(CATEGORY,'event');
	$this->load->view('admin/event',$msgSection);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function insert_event()
{
	$this->form_validation->set_rules('event_name', 'Event Name','trim|required');
	if (empty($_POST['cat_id'])) {
    $this->form_validation->set_rules('cat_id[]',"Category", "required");
	}
	$this->form_validation->set_rules('event_description','Event Description','required');
	$this->form_validation->set_rules('event_facilities','Event Facilities','required');
	$this->form_validation->set_rules('country_id','Country Name','required');
	$this->form_validation->set_rules('city_id_name','City Name','required');
	$this->form_validation->set_rules('event_adress','Event Address','required');
	$this->form_validation->set_rules('event_date_from','Start Date','required');
	$this->form_validation->set_rules('event_date_to','End Date','required');

	if (empty($_FILES['event_pic']['name']))
	{
    $this->form_validation->set_rules('event_pic','Event Picture','required');
	}

	if (empty($_FILES['event_pic']['name']))
	{
    $this->form_validation->set_rules('event_pic','Event Picture','required');
	}

	if (empty($_FILES['event_banner']['name']))
	{
    $this->form_validation->set_rules('event_banner','Event Banner','required');
	}

	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->create_event_view($msg,$msg_class); 
	}
	else
	{
		$post_data = $this->input->post();
	    if(count($post_data) > 0){
			
		$name           = $this->security->xss_clean($post_data['event_name']);
		$cat_id         = $this->security->xss_clean($post_data['cat_id']);
		$description    = $this->security->xss_clean($post_data['event_description']);
		$facilities     = $this->security->xss_clean($post_data['event_facilities']);
		$timezone_form  = $this->security->xss_clean($post_data['event_date_from']);
		$timezone_to    = $this->security->xss_clean($post_data['event_date_to']);
		$website        = $post_data['event_website_url'];
		$city           = $this->security->xss_clean($post_data['city_id_name']);
		$country        = $this->security->xss_clean($post_data['country_id']);
		$free_text      = $this->security->xss_clean($post_data['event_free_text']);
		$event_timezone = $this->security->xss_clean($post_data['timezone_id']);
		$event_adress   = $this->security->xss_clean($post_data['event_adress']);
		$get_lat_lng    = getLatLong($event_adress);
		$event_latitude = $get_lat_lng['latitude'];
		$event_longitute= $get_lat_lng['longitude'];
		
		//FILE UPLOAD
		$path = "./upload/events/";
		$time = time();
		$get_name = $_FILES['event_pic']['name'];
		$get_temp_name  = $_FILES['event_pic']['tmp_name'];
		$get_error_name = $_FILES['event_pic']['error'];
		$get_modi_name  = $time.'_'.$get_name;
		$get_full_path  = $path.$get_modi_name;
		//FILE UPLOAD

		//FILE UPLOAD
		$get_name_1       = $_FILES['event_banner']['name'];
		$get_temp_name_1  = $_FILES['event_banner']['tmp_name'];
		$get_error_name_1 = $_FILES['event_banner']['error'];
		$get_modi_name_1  = $time.'_'.$get_name_1;
		$get_full_path_1  = $path.$get_modi_name_1;
		
		//FILE UPLOAD	
		if(move_uploaded_file($get_temp_name,$get_full_path) && move_uploaded_file($get_temp_name_1,$get_full_path_1))
		{
		
		$this->__all_data = array
		( 
			'user_id'       	=>  1,
			'user_type'       	=> 'A',
			'event_name'        => $name,
			'event_description' => strip_slashes($description),
			'event_facilities'  => strip_slashes($facilities),
			'city_id'		    => $city,
			'country_id'        => $country,
			'event_date_from'   => $timezone_form,
			'event_date_to'     => $timezone_to,
			'event_website_URL' => $website,
			'timezone_id'       => $event_timezone,
			'event_free_text'   => $free_text,
			'event_banner   '   => $get_modi_name_1,
			'event_adress'      => $event_adress,
			'event_latitude' 	=> $event_latitude,
		    'event_longitute' 	=> $event_longitute,
		);
		$insert_data_return = $this->dashs->insert_array(EVENT,$this->__all_data);	
		if($insert_data_return)
		{
		if(count($cat_id) > 0){
			foreach ($cat_id as $id_data) 
			{
				$data['category_id'] = $id_data;
				$data['pivot_unique_id'] = $insert_data_return;
				$data['category_type'] = 'event';
				$insert_event_category = $this->dashs->insert_array(PIVOT_CATEGORY,$data);
			}		
		  }	
		if($insert_event_category)
		{
		  
		  $eventImages['event_id'] = $insert_data_return;
		  $eventImages['image_url'] = $get_modi_name;
		  $insert_event_pic = $this->dashs->insert_array(EVENT_IMAGE,$eventImages);

		  if($insert_event_pic){
		  redirect('Event/list-event-view');
		  }else{
		  redirect('Event/list-event-view');
		  }
		} 
		}
		else
		{
			$msg = 'OPPS !! Something went wrong. Please try after some time';
			$msg_class = 'alert-danger';
			redirect('Event/list-event');
		}	
		
		}else{
			$msg = "File Not Uploaded";
			$msg_class = 'alert-danger';
			$this->create_event_view($msg,$msg_class); 	
		}
		}else{
		redirect('Dashboard/list_event');
		}
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function list_event_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgsection['msg']      = $msg;
		$msgsection['msgclass'] = $msg_class;
	}
	$msgsection['all_data'] = $this->dashs->get_event_full_admin(1);
	$this->load->view('admin/list_event',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function list_all_event_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgsection['msg']      = $msg;
		$msgsection['msgclass'] = $msg_class;
	}
	$msgsection['all_data'] = $this->dashs->get_event_full_all();
	$this->load->view('admin/list_all_event',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function update_event($id)
{
	$output = isNumaric($id);
    $id = $output;
	if(!empty($id) and !empty($output))
	{
		
	$this->form_validation->set_rules('event_name', 'Event Name','trim|required');
	if (empty($_POST['cat_id'])) {
    $this->form_validation->set_rules('cat_id[]',"Category", "required");
	}
	$this->form_validation->set_rules('event_description','Event Description','required');
	$this->form_validation->set_rules('event_facilities','Event Facilities','required');
	$this->form_validation->set_rules('country_id','Country Name','required');
	$this->form_validation->set_rules('city_id_name','City Name','required');
	$this->form_validation->set_rules('event_adress','Event Address','required');
	$this->form_validation->set_rules('event_date_from','Start Date','required');
	$this->form_validation->set_rules('event_date_to','End Date','required');
		
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();	
		$msg_class = 'alert-danger';
		$this->edit_event_view($id,$msg,$msg_class); 
	}
	else
	{
		$post_data = $this->input->post();

	    if(count($post_data) > 0){
		//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
		$name           = $this->security->xss_clean($post_data['event_name']);
		$cat_id         = $this->security->xss_clean($post_data['cat_id']);
		$description    = $this->security->xss_clean($post_data['event_description']);
		$facilities     = $this->security->xss_clean($post_data['event_facilities']);
		$timezone_form  = $this->security->xss_clean($post_data['event_date_from']);
		$timezone_to    = $this->security->xss_clean($post_data['event_date_to']);
		$website        = $post_data['event_website_url'];
		$city           = $this->security->xss_clean($post_data['city_id_name']);
		$country        = $this->security->xss_clean($post_data['country_id']);
		$free_text      = $this->security->xss_clean($post_data['event_free_text']);
		$event_timezone = $this->security->xss_clean($post_data['timezone_id']);
		$event_adress   = $this->security->xss_clean($post_data['event_adress']);
		$get_lat_lng    = getLatLong($event_adress);
		$event_latitude = $get_lat_lng['latitude'];
		$event_longitute= $get_lat_lng['longitude'];

		//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	

		//FILE UPLOAD
		if(isset($_FILES['event_pic']) and !empty($_FILES['event_pic']['name']))
		{
		$path = "./upload/events/";
		$time = time();
		$get_name = $_FILES['event_pic']['name'];
		$get_temp_name  = $_FILES['event_pic']['tmp_name'];
		$get_error_name = $_FILES['event_pic']['error'];
		$get_modi_name  = $time.'_'.$get_name;
		$get_full_path  = $path.$get_modi_name;
		if(move_uploaded_file($get_temp_name,$get_full_path)){
		$eventImages['event_id'] = $id;
		$eventImages['image_url'] = $get_modi_name;
		$insert_event_pic = $this->dashs->update_array($eventImages,$id,EVENT_IMAGE,'event_id');
		}
		}
		if(isset($_FILES['event_banner']) and !empty($_FILES['event_banner']['name']))
		{
		$path_1 = "./upload/events/";
		$time_1 = time();
		$get_name_1       = $_FILES['event_banner']['name'];
		$get_temp_name_1  = $_FILES['event_banner']['tmp_name'];
		$get_error_name_1 = $_FILES['event_banner']['error'];
		$get_modi_name_1  = $time_1.'_'.$get_name_1;
		$get_full_path_1  = $path_1.$get_modi_name_1;
		if(move_uploaded_file($get_temp_name_1,$get_full_path_1)){
		$banner_img = $get_modi_name_1;
		}else{
		$banner_img = $post_data['old_picture'];	
		}
		}else{
		$banner_img = $post_data['old_picture'];	
		}
		//FILE UPLOAD
		$this->__all_data = array
		( 
			'event_name'        => $name,
			'event_description' => strip_slashes($description),
			'event_facilities'  => strip_slashes($facilities),
			'city_id'		    => $city,
			'country_id'        => $country,
			'event_date_from'   => $timezone_form,
			'event_date_to'     => $timezone_to,
			'event_website_URL' => $website,
			'timezone_id'       => $event_timezone,
			'event_free_text'   => $free_text,
			'event_banner   '   => $banner_img,
			'event_adress'      => $event_adress,
			'event_latitude' 	=> $event_latitude,
		    'event_longitute' 	=> $event_longitute,
		);
		$update_array = $this->dashs->update_array($this->__all_data,$id,EVENT,'event_id');	
		if($update_array){
		$delete_data = $this->dashs->delete_event_category($id);
		if($delete_data){
			if(count($cat_id) > 0){
			foreach ($cat_id as $id_data) 
			{
				$data['category_id'] = $id_data;
				$data['pivot_unique_id'] = $id;
				$data['category_type'] = 'event';
				$insert_event_category = $this->dashs->insert_array(PIVOT_CATEGORY,$data);
			}
			if($insert_event_category){
				redirect('Event/list-all-event-view');
			}else{
				redirect('Event/list-all-event-view');
			}		
		  }else{
			  redirect('Event/list-all-event-view');
		  }	
		}else{
		redirect('Event/list-all-event-view');	
		}
		}else{
		redirect('Event/list-all-event-view');	
		}
		
		}else{
		redirect('Event/list-all-event-view');
		}
	}
	}else{
		redirect('Event/list-all-event-view','refresh');
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function edit_event_view($id='',$msg='',$msgclass='')
{
	$output = isNumaric($id);
	$id = $output;
	if(!empty($id) and !empty($output))
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$msgSection['msg'] = $msg;
			$msgSection['msgclass'] = $msgclass;
		}
$msgSection['dataSection'] = $this->dashs->getListDatas(EVENT,'event_id',$id);
$msgSection['countrydata'] = $this->dashs->getFullDetails(COUNTRY);
$msgSection['timezondata'] = $this->dashs->getFullDetails(TIMEZONE);
$msgSection['catdata']     = $this->dashs->getCatagoryDetails(CATEGORY,'event');
$msgSection['cataEventdata']  = $this->dashs->getEventCategoryList($id);
$msgSection['citydata']    = $this->dashs->get_ajax_city($msgSection['dataSection'][0]['country_id']);
		if($msgSection['dataSection'] == FALSE){
		redirect('Event/list-all-event-view','refresh');
		}else{
		$this->load->view('admin/edit_event',$msgSection);
		}
	}
	else
	{
		redirect('Event','refresh');
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_event($id='')
{	
	$output = isNumaric($id);
	$id = $output;
	if(!empty($id) and !empty($output))
	{
	$delete_data_1 = $this->dashs->delete_array(EVENT,'event_id',$id);
	$delete_data_2 = $this->dashs->delete_event_category($id);
	$delete_data_3 = $this->dashs->delete_array(EVENT_IMAGE,'event_id',$id);
	if($delete_data_1 and $delete_data_2 and $delete_data_3)
	{
		$msg = 'Delete successfully';
		$msg_class = 'alert-success';
	}
	else
	{
		$msg = 'OPPS !! Something went wrong. Please try after some time';
		$msg_class = 'alert-danger';
	}
		//$this->list_event_view($msg,$msg_class);
		redirect('Event/list-event-view','refresh');
	}
	else{
		redirect('Event','refresh');
	}			
}	
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function ajaxGetCityName()
{
	$data = '';

	$countryId = $this->input->post("id");
	if(!empty($countryId)){
		$getAllCityList = $this->dashs->get_ajax_city($countryId);
		if(count($getAllCityList) > 0){
			$data = '<option value="">Choose City</option>';	
			foreach ($getAllCityList as $dd) {
			$data .= '<option value="'.$dd['city_id'].'">'.$dd['city_name'].'</option>';	
			}	
		}
	echo $data;			
	}
}
//+++ SECTION +++++++++++//	
//END CLASS
}
