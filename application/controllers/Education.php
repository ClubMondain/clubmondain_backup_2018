<?php
class Education extends CI_Controller
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
public function create_class_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgSection['msg'] = $msg;
		$msgSection['msg_class'] = $msg_class;
	}

	$msgSection['countrydata'] = $this->dashs->getFullDetails(COUNTRY);
	$msgSection['event_list'] = $this->dashs->getFullDetails('cmd_business');
	$msgSection['catdata']     = $this->dashs->getCatagoryDetails(CATEGORY,'event');
	$this->load->view('admin/class',$msgSection);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function insert_class()
{
	$this->form_validation->set_rules('event_id', 'Event Name','trim|required');
	$this->form_validation->set_rules('trainer_class_name', 'Class Name','trim|required');

	if (empty($_POST['cat_id']))
	{
    $this->form_validation->set_rules('cat_id[]',"Category", "required");
	}

	$this->form_validation->set_rules('trainer_class_description','Description','required');
	$this->form_validation->set_rules('trainer_class_address','Address','required');
	$this->form_validation->set_rules('trainer_class_type','Type','required');

	if(isset($_POST['trainer_class_type'])){
	if($_POST['trainer_class_type'] == 'Paid'){
	$this->form_validation->set_rules('trainer_class_price','Price','required');
	}
	}

	$this->form_validation->set_rules('country_id_name','Country Name','required');
	$this->form_validation->set_rules('city_id_name','City Name','required');
	$this->form_validation->set_rules('class_no_of_booking','No of Booking','required');
	$this->form_validation->set_rules('trainer_class_website_url','Website URL','required');
	$this->form_validation->set_rules('trainer_class_status','Status','required');

	if (empty($_FILES['trainer_class_image']['name']))
	{
    $this->form_validation->set_rules('trainer_class_image','Class Picture','required');
	}

	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->create_class_view($msg,$msg_class);
	}
	else
	{
		$post_data = $this->input->post();
	    if(count($post_data) > 0){

		$event_id       = $this->security->xss_clean($post_data['event_id']);
		$name           = $this->security->xss_clean($post_data['trainer_class_name']);
		$cat_id         = $this->security->xss_clean($post_data['cat_id']);
		$description    = $this->security->xss_clean($post_data['trainer_class_description']);
		$website        = $post_data['trainer_class_website_url'];
		$type           = $this->security->xss_clean($post_data['trainer_class_type']);
		$price          = $this->security->xss_clean($post_data['trainer_class_price']);
		$city           = $this->security->xss_clean($post_data['city_id_name']);
		$country        = $this->security->xss_clean($post_data['country_id_name']);
		$noofboo        = $this->security->xss_clean($post_data['class_no_of_booking']);
		$event_adress   = $this->security->xss_clean($post_data['trainer_class_address']);
		$event_status   = $this->security->xss_clean($post_data['trainer_class_status']);
		$get_lat_lng    = getLatLong($event_adress);
		$event_latitude = $get_lat_lng['latitude'];
		$event_longitute= $get_lat_lng['longitude'];

		//FILE UPLOAD
		$path = "./upload/class/";
		$time = time();
		$get_name = $_FILES['trainer_class_image']['name'];
		$get_temp_name  = $_FILES['trainer_class_image']['tmp_name'];
		$get_error_name = $_FILES['trainer_class_image']['error'];
		$get_modi_name  = $time.'_'.$get_name;
		$get_full_path  = $path.$get_modi_name;
		//FILE UPLOAD

		if(move_uploaded_file($get_temp_name,$get_full_path))
		{
		$this->__all_data = array
		(
			'user_id'       	       =>  1,
			'event_id'       	       => $event_id,
			'trainer_class_name'       => $name,
			'trainer_class_address'    => $event_adress,
			'trainer_class_price'      => $price,
			'trainer_class_type'	   => $type,
			'trainer_class_image'      => $get_modi_name,
			'trainer_class_description'=> strip_slashes($description),
			'class_no_of_booking'      => $noofboo,
			'country_id'               => $country,
			'city_id'                  => $city,
			'trainer_class_website_url'=> $website,
			'trainer_class_latitude'   => $event_latitude,
		    'trainer_class_longitute'  => $event_longitute,
		    'trainer_class_status'     => $event_status,
		    'create_date'     		   => date('Y-m-d'),
		);
		$insert_data_return = $this->dashs->insert_array('cmd_trainer_class',$this->__all_data);
		if($insert_data_return)
		{
		if(count($cat_id) > 0){
			foreach ($cat_id as $id_data)
			{
				$data['category_id'] = $id_data;
				$data['pivot_unique_id'] = $insert_data_return;
				$data['category_type'] = 'class';
				$insert_event_category = $this->dashs->insert_array(PIVOT_CATEGORY,$data);
			}
		  }
		if($insert_event_category)
		{
		  redirect('Education/list-class-view');
		}else{
		  redirect('Education/list-class-view');
		}
		}
		else
		{
			$msg = 'OPPS !! Something went wrong. Please try after some time';
			$msg_class = 'alert-danger';
			redirect('Education/list-class-view');
		}

		}else{
			$msg = "File Not Uploaded";
			$msg_class = 'alert-danger';
			$this->create_class_view($msg,$msg_class);
		}
		}else{
		redirect('Education/list-class-view');
		}
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function list_class_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgsection['msg']      = $msg;
		$msgsection['msgclass'] = $msg_class;
	}
	$msgsection['all_data'] = $this->dashs->get_event_full_class(1);
	$this->load->view('admin/list_section_class',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function list_all_class_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgsection['msg']      = $msg;
		$msgsection['msgclass'] = $msg_class;
	}
	$msgsection['all_data'] = $this->dashs->get_event_full_class(2);
	$this->load->view('admin/list_all_section_class',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function update_class($id)
{
	$output = isNumaric($id);
    $id = $output;
	if(!empty($id) and !empty($output))
	{

	$this->form_validation->set_rules('event_id', 'Event Name','trim|required');
	$this->form_validation->set_rules('trainer_class_name', 'Class Name','trim|required');

	if (empty($_POST['cat_id']))
	{
    $this->form_validation->set_rules('cat_id[]',"Category", "required");
	}

	$this->form_validation->set_rules('trainer_class_description','Description','required');
	$this->form_validation->set_rules('trainer_class_address','Address','required');
	$this->form_validation->set_rules('trainer_class_type','Type','required');

	if(isset($_POST['trainer_class_type'])){
	if($_POST['trainer_class_type'] == 'Paid'){
	$this->form_validation->set_rules('trainer_class_price','Price','required');
	}
	}

	$this->form_validation->set_rules('country_id_name','Country Name','required');
	$this->form_validation->set_rules('city_id_name','City Name','required');
	$this->form_validation->set_rules('class_no_of_booking','No of Booking','required');
	$this->form_validation->set_rules('trainer_class_website_url','Website URL','required');
	$this->form_validation->set_rules('trainer_class_status','Status','required');

	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->edit_class_view($id,$msg,$msg_class);
	}
	else
	{
		$post_data = $this->input->post();

	    if(count($post_data) > 0){
		//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		$event_id       = $this->security->xss_clean($post_data['event_id']);
		$name           = $this->security->xss_clean($post_data['trainer_class_name']);
		$cat_id         = $this->security->xss_clean($post_data['cat_id']);
		$description    = $this->security->xss_clean($post_data['trainer_class_description']);
		$website        = $post_data['trainer_class_website_url'];
		$type           = $this->security->xss_clean($post_data['trainer_class_type']);
		$price          = $this->security->xss_clean($post_data['trainer_class_price']);
		$city           = $this->security->xss_clean($post_data['city_id_name']);
		$country        = $this->security->xss_clean($post_data['country_id_name']);
		$noofboo        = $this->security->xss_clean($post_data['class_no_of_booking']);
		$event_adress   = $this->security->xss_clean($post_data['trainer_class_address']);
		$event_status   = $this->security->xss_clean($post_data['trainer_class_status']);
		$get_lat_lng    = getLatLong($event_adress);
		$event_latitude = $get_lat_lng['latitude'];
		$event_longitute= $get_lat_lng['longitude'];

		//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

		//FILE UPLOAD
		if(isset($_FILES['trainer_class_image']) and !empty($_FILES['trainer_class_image']['name']))
		{
		$path = "./upload/class/";
		$time = time();
		$get_name = $_FILES['trainer_class_image']['name'];
		$get_temp_name  = $_FILES['trainer_class_image']['tmp_name'];
		$get_error_name = $_FILES['trainer_class_image']['error'];
		$get_modi_name  = $time.'_'.$get_name;
		$get_full_path  = $path.$get_modi_name;
		if(move_uploaded_file($get_temp_name,$get_full_path)){
		$data_image_url = $get_modi_name;
		}else{
		$data_image_url = $this->security->xss_clean($post_data['old_image_name']);
		}
	  }else{
		$data_image_url = $this->security->xss_clean($post_data['old_image_name']);
	  }
		//FILE UPLOAD
		$this->__all_data = array
		(
			'event_id'       	       => $event_id,
			'trainer_class_name'       => $name,
			'trainer_class_address'    => $event_adress,
			'trainer_class_price'      => $price,
			'trainer_class_type'	   => $type,
			'trainer_class_image'      => $data_image_url,
			'trainer_class_description'=> strip_slashes($description),
			'class_no_of_booking'      => $noofboo,
			'country_id'               => $country,
			'city_id'                  => $city,
			'trainer_class_website_url'=> $website,
			'trainer_class_latitude'   => $event_latitude,
		    'trainer_class_longitute'  => $event_longitute,
		    'trainer_class_status'     => $event_status,
		    'update_date'     		   => date('Y-m-d'),
		);
		$update_array = $this->dashs->update_array($this->__all_data,$id,'cmd_trainer_class','trainer_class_id');
		if($update_array){
		$delete_data = $this->dashs->delete_class_category($id);
		if($delete_data){
			if(count($cat_id) > 0){
			foreach ($cat_id as $id_data)
			{
				$data['category_id'] = $id_data;
				$data['pivot_unique_id'] = $id;
				$data['category_type'] = 'class';
				$insert_event_category = $this->dashs->insert_array(PIVOT_CATEGORY,$data);
			}
			if($insert_event_category){
				redirect('Education/list-class-view');
			}else{
				redirect('Education/list-class-view');
			}
		  }else{
			  redirect('Education/list-class-view');
		  }
		}else{
		redirect('Education/list-class-view');
		}
		}else{
		redirect('Education/list-class-view');
		}

		}else{
		redirect('Education/list-class-view');
		}
	}
	}else{
		redirect('Education/list-class-view','refresh');
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function edit_class_view($id='',$msg='',$msgclass='')
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
$msgSection['dataSection'] = $this->dashs->getListDatas('cmd_trainer_class','trainer_class_id',$id);
$msgSection['countrydata'] = $this->dashs->getFullDetails(COUNTRY);
$msgSection['event_list'] = $this->dashs->getFullDetails('cmd_business');
$msgSection['catdata']     = $this->dashs->getCatagoryDetails(CATEGORY,'event');
$msgSection['cataEventdata']  = $this->dashs->getClassCategoryList($id);
$msgSection['citydata']    = $this->dashs->get_ajax_city($msgSection['dataSection'][0]['country_id']);
		if($msgSection['dataSection'] == FALSE){
		redirect('Education/list-class-view','refresh');
		}else{
		$this->load->view('admin/edit_class',$msgSection);
		}
	}
	else
	{
		redirect('Education','refresh');
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_class($id='')
{
	redirect('Education/list-class-view','refresh');
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
