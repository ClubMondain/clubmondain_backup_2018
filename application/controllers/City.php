<?php 
class City extends CI_Controller
{
	
	private $__get_old_password;
	private $__get_new_password;
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
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function create_city_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
            $msgSection['msg'] = $msg;
	    $msgSection['msg_class'] = $msg_class;
	}
	$msgSection['countryNames'] = $this->dashs->getFullDetails(COUNTRY);
	$this->load->view('admin/city',$msgSection);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function list_request_city_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgSection['msg'] = $msg;
		$msgSection['msg_class'] = $msg_class;
	}
	$msgSection['all_members'] = $this->dashs->getReqestedCity(CITY);
        $this->load->view('admin/list_request_city',$msgSection);
}		
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function insert_city()
{
	$this->form_validation->set_rules('country_id_FK', 'Catagory Name','required');
	$this->form_validation->set_rules('city_name','City Name','required');
	$this->form_validation->set_rules('city_status', 'City Status', 'required');
	
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();	
		$msg_class = 'alert-danger';
		$this->create_city_view($msg,$msg_class);
	}
	else
	{
		
	$post_data = $this->input->post();
	
	if(count($post_data) > 0){
		//FILE UPLOAD
		$path = "./upload/city/";
		$time = time();
		$get_name = $_FILES['event_pic']['name'];
		$get_temp_name  = $_FILES['event_pic']['tmp_name'];
		$get_error_name = $_FILES['event_pic']['error'];
		$get_modi_name  = $time.'_'.$get_name;
		$get_full_path  = $path.$get_modi_name;
		//FILE UPLOAD
		if(move_uploaded_file($get_temp_name,$get_full_path))
		{
		$city_pic = $get_modi_name;
		}else{
		$city_pic = '';	
		}
		
		//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		$this->__dataArray['country_id'] = $this->security->xss_clean($this->input->post('country_id_FK'));
		$this->__dataArray['city_name'] = $this->security->xss_clean($this->input->post('city_name'));
		$this->__dataArray['city_status'] = $this->security->xss_clean($this->input->post('city_status'));
		$this->__dataArray['city_image'] = $city_pic;
		$this->__dataArray['type'] = 1;
	   //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		$insert_Data_Return = $this->dashs->insert_array(CITY,$this->__dataArray);
	
	if($insert_Data_Return){	
		$msg = 'City created succefully';
		$msg_class = 'alert-success';	
	}else{
		$msg = 'OPPS !! Something went wrong. Please try after some time';
		$msg_class = 'alert-danger';
	}
	}
        redirect('City/list-city-view','refresh');
	//$this->list_city_view($msg,$msg_class);
	}	
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function list_city_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$listmember['msg'] = $msg;
		$listmember['msg_class'] = $msg_class;
	}
	$listmember['all_members'] = $this->dashs->get_city_list(CITY,COUNTRY);
	$this->load->view('admin/list_city',$listmember);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function edit_city_view($id='',$msg='',$msg_class='')
{
	$output = isNumaric($id);
    $id = $output;
	if(!empty($id) and !empty($output))
	{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgSection['msg'] = $msg;
		$msgSection['msg_class']= $msg_class;
	}
	$msgSection['dataSection'] = $this->dashs->getListDatas(CITY,'city_id',$id);
	if($msgSection['dataSection'] == FALSE)
	{
		redirect('Dashboard','refresh');
		
	}else
	{  
                 $msgSection['countryNames'] = $this->dashs->getFullDetails(COUNTRY);
		$this->load->view('admin/edit_city',$msgSection);
	}
	}
	else
	{
		redirect('Dashboard','refresh');
	}
}	
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function update_city($id)
{		
	$output = isNumaric($id);
	$id = $output;
	
	if(!empty($id) and !empty($output))
	{
	$this->form_validation->set_rules('country_id_FK', 'Catagory Name','required');
	$this->form_validation->set_rules('city_name','City Name','required');
	$this->form_validation->set_rules('city_status', 'City Status', 'required');
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();	
		$msg_class = 'alert-danger';
		$this->edit_city_view($id,$msg,$msg_class);
	}
	else
	{
	$msgSection['data'] = $this->dashs->getListDatas(CITY,'city_id',$id);
	if($msgSection['data'] != FALSE){	
	$post_data = $this->input->post();
	if(count($post_data) >0)
	{
		//FILE UPLOAD
		$path = "./upload/city/";
		$time = time();
		$get_name = $_FILES['event_pic']['name'];
		$get_temp_name  = $_FILES['event_pic']['tmp_name'];
		$get_error_name = $_FILES['event_pic']['error'];
		$get_modi_name  = $time.'_'.$get_name;
		$get_full_path  = $path.$get_modi_name;
		//FILE UPLOAD
		if(move_uploaded_file($get_temp_name,$get_full_path))
		{
		$city_pic = $get_modi_name;
		}else{
		$city_pic = $msgSection['data'][0]['city_image'];	
		}
		//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		$this->__data['country_id']  = $this->security->xss_clean($this->input->post('country_id_FK'));
		$this->__data['city_name']   = $this->security->xss_clean($this->input->post('city_name'));
		$this->__data['city_status'] = $this->security->xss_clean($this->input->post('city_status'));
		$this->__data['city_image']  = $city_pic;
		$this->__data['type'] = 1; 
		$update_data_return = $this->dashs->update_array($this->__data,$id,CITY,'city_id');
	}
	if($update_data_return)
	{
		$msg='You have succefully updated city ';
		$msgclass= 'alert-success';
	}
	else
	{
		$msg='OPPS !! Something went wrong. Please try after some time';
		$msgclass= 'alert-danger';
	}
            redirect('City/list-city-view','refresh');
            //$this->list_city_view($msg,$msgclass);
	
	}else{
                redirect('City/list-city-view','refresh');
		//$this->list_city_view();
	}
	}
	}else{
                redirect('City/list-city-view','refresh');
		//$this->list_product_sub_category_view();
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_city($id)
{
	$output = isNumaric($id);
	$id = $output;
	if(!empty($id) and !empty($output))
	{
	$delete_data = $this->dashs->delete_array(CITY,'city_id',$id);
	if($delete_data)
	{
		$msg = 'Delete successfully';
		$msg_class = 'alert-success';
	}
	else
	{
		$msg = 'OPPS !! Something went wrong. Please try after some time';
		$msg_class = 'alert-danger';
	}
                redirect('City/list-city-view','refresh');
                //$this->list_city_view($msg,$msg_class);
	}
	else{
		redirect('Dashboard','refresh');
	}	
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++ SECTION +++++++++++//	
//END CLASS
}
