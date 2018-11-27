<?php
class Space extends CI_Controller
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
private function getFileUpload($path,$uploadFildName)
{
	//FILE UPLOAD
	$path = $path;
	$time = time();
	$get_name = $uploadFildName['name'];
	$get_temp_name  = $uploadFildName['tmp_name'];
	$get_modi_name  = $time.'_'.$get_name;
	$get_full_path  = $path.$get_modi_name;
	//FILE UPLOAD
	if(move_uploaded_file($get_temp_name,$get_full_path)){
	return $get_modi_name;
	}else{
	return 'F';
	}
}
//++++++++++++++++++++++++++++++++++++++ INDEX ++++++++++++++++++++++++++++++++++++++++++++++++
public function create_space_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgSection['msg'] = $msg;
		$msgSection['msg_class'] = $msg_class;
	}

	$msgSection['countrydata'] = $this->dashs->getFullDetails(COUNTRY);
	$msgSection['timezondata'] = $this->dashs->getFullDetails(TIMEZONE);
	$msgSection['catdata']     = $this->dashs->getCatagoryDetails(CATEGORY,'event');
	$this->load->view('admin/space',$msgSection);
}
//++++++++++++++++++++++++++++++++++++++ INDEX ++++++++++++++++++++++++++++++++++++++++++++++++
public function insert_space()
{
	$this->form_validation->set_rules('business_name', 'Business Name','trim|required');
	if (empty($_POST['cat_id'])) {
    $this->form_validation->set_rules('cat_id[]',"Category", "required");
	}
	$this->form_validation->set_rules('business_description','Business Description','trim|required');
	$this->form_validation->set_rules('business_website_url','Website Url Facilities','trim|required');
	$this->form_validation->set_rules('business_street','Business Name','trim|required');
	$this->form_validation->set_rules('business_postal_code','Postal Address','trim|required');
	$this->form_validation->set_rules('country_id','Country Name','trim|required');
	$this->form_validation->set_rules('city_id_name','City Name','trim|required');

	if (empty($_FILES['business_image']['name']))
	{
    $this->form_validation->set_rules('business_image','Business Picture','required');
	}

    if (empty($_FILES['business_banner_image']['name']))
	{
    $this->form_validation->set_rules('business_banner_image','Buisness Banner Picture','required');
	}

	$this->form_validation->set_rules('business_status','Business Status','trim|required');

	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->create_space_view($msg,$msg_class);
	}
	else
	{
		$post_data = $this->input->post();

	    if(count($post_data) > 0)
        {

		$business_name = $this->security->xss_clean($post_data['business_name']);
		$cat_id = $this->security->xss_clean($post_data['cat_id']);
		$business_description = $this->security->xss_clean($post_data['business_description']);
		$business_website_url = $this->security->xss_clean($post_data['business_website_url']);
		$business_street  = $this->security->xss_clean($post_data['business_street']);
		$business_postal_code = $this->security->xss_clean($post_data['business_postal_code']);
		$business_status   = $this->security->xss_clean($post_data['business_status']);
		$city_id           = $this->security->xss_clean($post_data['city_id_name']);
		$country_id        = $this->security->xss_clean($post_data['country_id']);

		$get_lat_lng    = getLatLong($business_street);
		$event_latitude = $get_lat_lng['latitude'];
		$event_longitute= $get_lat_lng['longitude'];

		$get_img_one = $this->getFileUpload('./upload/business/',$_FILES['business_image']);
        $get_img_two = $this->getFileUpload('./upload/business/',$_FILES['business_banner_image']);

        if( ($get_img_one != 'F') and ($get_img_two != 'F') )
        {
            $this->__all_data['user_id'] = 1;
            $this->__all_data['country_id'] = $country_id ;
            $this->__all_data['city_id'] = $city_id  ;
            $this->__all_data['business_name'] = $business_name;
            $this->__all_data['business_description'] = $business_description ;
            $this->__all_data['business_website_url'] = $business_website_url;
            $this->__all_data['business_street'] = $business_street ;
            $this->__all_data['business_latitude'] = $event_latitude;
            $this->__all_data['business_longitute'] = $event_longitute;
            $this->__all_data['business_postal_code'] = $business_postal_code;
            $this->__all_data['business_image'] =$get_img_one;
            $this->__all_data['business_banner_image'] =$get_img_two;
            $this->__all_data['business_status'] = $business_status;
            $this->__all_data['create_date'] = date('Y-m-d');
            $this->__all_data['update_date'] = date('Y-m-d');
            $insert_data_return = $this->dashs->insert_array('cmd_business',$this->__all_data);
        if($insert_data_return)
		{
		if(count($cat_id) > 0){
        foreach ($cat_id as $id_data)
        {
            $data['category_id'] = $id_data;
            $data['pivot_unique_id'] = $insert_data_return;
            $data['category_type'] = 'business';
            $insert_event_category = $this->dashs->insert_array(PIVOT_CATEGORY,$data);
        }
        }
        }
        if($insert_event_category){
        redirect('Space/list_space_view');
        }else{
        redirect('Space/list_space_view');
        }
        }else{
        redirect('Space/create_space_view');
        }
        }

	}
}
//++++++++++++++++++++++++++++++++++++++ INDEX ++++++++++++++++++++++++++++++++++++++++++++++++
public function list_space_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgsection['msg']      = $msg;
		$msgsection['msgclass'] = $msg_class;
	}
	$msgsection['all_data'] = $this->dashs->get_space(1);
	$this->load->view('admin/list_space',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++ INDEX ++++++++++++++++++++++++++++++++++++++++++++++++
public function list_all_space_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgsection['msg']      = $msg;
		$msgsection['msgclass'] = $msg_class;
	}
	$msgsection['all_data'] = $this->dashs->get_space();
	$this->load->view('admin/list_all_space',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++ INDEX ++++++++++++++++++++++++++++++++++++++++++++++++
public function edit_space_view($id='',$msg='',$msgclass='')
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

        $msgSection['dataSection'] = $this->dashs->getListDatas('cmd_business','business_id',$id);
       	if($msgSection['dataSection'] == FALSE){
		redirect('Space/list-space-view','refresh');
		}else{
        $msgSection['countrydata'] = $this->dashs->getFullDetails(COUNTRY);
        $msgSection['timezondata'] = $this->dashs->getFullDetails(TIMEZONE);
        $msgSection['catdata']     = $this->dashs->getCatagoryDetails(CATEGORY,'event');
        $msgSection['cataEventdata']  = $this->dashs->getSpaceCategoryList($id);
        $msgSection['citydata']    = $this->dashs->get_ajax_city($msgSection['dataSection'][0]['country_id']);
		$this->load->view('admin/edit_space',$msgSection);
		}
	}
	else
	{
		redirect('Space','refresh');
	}
}
//++++++++++++++++++++++++++++++++++++++ INDEX ++++++++++++++++++++++++++++++++++++++++++++++++
public function update_space($id)
{
	$output = isNumaric($id);
    $id = $output;
	if(!empty($id) and !empty($output))
	{

	$this->form_validation->set_rules('business_name', 'Business Name','trim|required');
	if (empty($_POST['cat_id'])) {
    $this->form_validation->set_rules('cat_id[]',"Category", "required");
	}
	$this->form_validation->set_rules('business_description','Business Description','trim|required');
	$this->form_validation->set_rules('business_website_url','Website Url Facilities','trim|required');
	$this->form_validation->set_rules('business_street','Business Name','trim|required');
	$this->form_validation->set_rules('business_postal_code','Postal Address','trim|required');
	$this->form_validation->set_rules('country_id','Country Name','trim|required');
	$this->form_validation->set_rules('city_id_name','City Name','trim|required');


	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->edit_space_view($id,$msg,$msg_class);
	}
	else
	{
		$post_data = $this->input->post();

	    if(count($post_data) > 0){

$business_name = $this->security->xss_clean($post_data['business_name']);
$cat_id = $this->security->xss_clean($post_data['cat_id']);
$business_description = $this->security->xss_clean($post_data['business_description']);
$business_website_url = $this->security->xss_clean($post_data['business_website_url']);
$business_street  = $this->security->xss_clean($post_data['business_street']);
$business_postal_code = $this->security->xss_clean($post_data['business_postal_code']);
$business_status   = $this->security->xss_clean($post_data['business_status']);
$city_id           = $this->security->xss_clean($post_data['city_id_name']);
$country_id        = $this->security->xss_clean($post_data['country_id']);
$get_lat_lng    = getLatLong($business_street);
$event_latitude = $get_lat_lng['latitude'];
$event_longitute= $get_lat_lng['longitude'];

// $get_img_one = $this->getFileUpload('./upload/business/',$_FILES['business_image']);
// $get_img_two = $this->getFileUpload('./upload/business/',$_FILES['business_banner_image']);

if(!empty($_FILES['business_image']['name']))
{
$get_img_one = $this->getFileUpload('./upload/business/',$_FILES['business_image']);
if( ($get_img_one != 'F')){
$this->__all_data['business_image'] =$get_img_one;
}
}
if(!empty($_FILES['business_banner_image']['name']))
{
$get_img_two = $this->getFileUpload('./upload/business/',$_FILES['business_banner_image']);
if( ($get_img_two != 'F') ){
$this->__all_data['business_banner_image'] = $get_img_two;
}
}


        $this->__all_data['country_id'] = $country_id ;
        $this->__all_data['city_id'] = $city_id  ;
        $this->__all_data['business_name'] = $business_name;
        $this->__all_data['business_description'] = $business_description ;
        $this->__all_data['business_website_url'] = $business_website_url;
        $this->__all_data['business_street'] = $business_street ;
        $this->__all_data['business_latitude'] = $event_latitude;
        $this->__all_data['business_longitute'] = $event_longitute;
        $this->__all_data['business_postal_code'] = $business_postal_code;
        $this->__all_data['business_status'] = $business_status;
        $this->__all_data['update_date'] = date('Y-m-d');
        $update_array = $this->dashs->update_array($this->__all_data,$id,'cmd_business','business_id');

        if($update_array){
		$delete_data = $this->dashs->delete_event_category_type($id,'business');
		if($delete_data){
			if(count($cat_id) > 0){
			foreach ($cat_id as $id_data)
			{
				$data['category_id'] = $id_data;
				$data['pivot_unique_id'] = $id;
				$data['category_type'] = 'business';
				$insert_event_category = $this->dashs->insert_array(PIVOT_CATEGORY,$data);
			}
         }
          }
           }
           redirect('Space/list-space-view');

		}else{
		redirect('Space/list-space-view');
		}
	}
	}else{
		redirect('Space/list-space-view','refresh');
	}
}
//++++++++++++++++++++++++++++++++++++++ INDEX ++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_space($id='')
{
	$output = isNumaric($id);
	$id = $output;
	if(!empty($id) and !empty($output))
	{
	$delete_data_1 = $this->dashs->delete_array('cmd_business','business_id',$id);
	$delete_data_2 = $this->dashs->delete_event_category_type($id,'business');
	if($delete_data_1 and $delete_data_2)
	{
		$msg = 'Delete successfully';
		$msg_class = 'alert-success';
	}
	else
	{
		$msg = 'OPPS !! Something went wrong. Please try after some time';
		$msg_class = 'alert-danger';
	}
		redirect('Space/list-space-view','refresh');
	}
	else{
		redirect('Space/list-space-view','refresh');
	}
}
//++++++++++++++++++++++++++++++++++++++ INDEX ++++++++++++++++++++++++++++++++++++++++++++++++
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

public function edit_space_feedback_view($id='',$msg='',$msgclass='')
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

      $msgSection['dataSection'] = $this->dashs->getListDatas('cmd_store_feedback','store_feedback_id',$id);
      if($msgSection['dataSection'] == FALSE){
	  redirect('Space/list_all_feedback','refresh');
	  }else{

	$this->load->view('admin/edit_space_feedback',$msgSection);
		}
	}
	else
	{
		redirect('Space','refresh');
	}
}

public function update_feedback($id)
{
	$output = isNumaric($id);
    $id = $output;
	if(!empty($id) and !empty($output))
	{

	$this->form_validation->set_rules('store_feedback','Feedback','required');
	$this->form_validation->set_rules('store_service_ratting','Service Rating','required');
	$this->form_validation->set_rules('store_location_ratting','Location Rating','required');
	$this->form_validation->set_rules('store_quality_ratting','Quality Rating','required');
	$this->form_validation->set_rules('status','Status','required');
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->edit_space_feedback_view($id,$msg,$msg_class);
	}
	else
	{
		$post_data = $this->input->post();
		//echo $id;
		//print_r($post_data);
		$this->__all_data['store_feedback'] = $post_data['store_feedback'] ;
        $this->__all_data['store_service_ratting'] = $post_data['store_service_ratting'];
        $this->__all_data['store_location_ratting'] = $post_data['store_location_ratting'];
        $this->__all_data['store_quality_ratting'] = $post_data['store_quality_ratting'] ;
        $this->__all_data['status'] = $post_data['status'] ;


$update_array = $this->dashs->update_array($this->__all_data,$id,'cmd_store_feedback','store_feedback_id');
        //print_r($this->__all_data);
        $msg = 'Successfully Updated';
		$msg_class = 'alert-success';
        $this->edit_space_feedback_view($id,$msg,$msg_class);

	}

	}else{
		redirect('Space/list_all_feedback','refresh');
	}
}

public function list_all_feedback($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgsection['msg']      = $msg;
		$msgsection['msgclass'] = $msg_class;
	}
	$msgsection['all_data'] = $this->dashs->getFullDetails('cmd_store_feedback');
	$this->load->view('admin/list_space_feedback',$msgsection);
}

public function delete_space_feedback($id='')
{
	$output = isNumaric($id);
	$id = $output;
	if(!empty($id) and !empty($output))
	{
	$delete_data_1 = $this->dashs->delete_array('cmd_store_feedback','store_feedback_id',$id);
	redirect('Space/list_all_feedback','refresh');
	}
	else{
		redirect('Space/list_all_feedback','refresh');
	}
}
//END CLASS
}
