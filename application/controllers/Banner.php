<?php 
class Banner extends CI_Controller
{
	
public function __construct()
{
	parent::__construct();
	$this->getSessionValidate();
	$this->load->model('Dashboards','dashs');

}

public function getSessionValidate()
{
	$this->__session_details = $this->session->all_userdata();
	if(!isset($this->__session_details['admin_login']))
	{
		redirect('Admin','refresh');
	}
}

public function index()
{
	$this->load->view('admin/dashboard');	
}

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

public function createBanner($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgSection['msg'] = $msg;
		$msgSection['msg_class'] = $msg_class; 
		$this->load->view('admin/create_banner',$msgSection);
	}else{
		$this->load->view('admin/create_banner');
	}
}

public function listBanner($msg='',$msg_class='')
{
	$msgsection['all_data'] = $this->dashs->getFullDetails('cmd_banner');
	$this->load->view('admin/list_banner',$msgsection);
}

public function editBanner($id='')
{
	$output = isNumaric($id);
	if(!empty($id) and !empty($output)){

		$msgsection['dataSection'] = $this->dashs->getListDatas('cmd_banner','banner_id',$id);
		$this->load->view('admin/edit_banner',$msgsection);

	}else{
		redirect('Banner/listBanner');
	}
}

public function insertBanner()
{
	$this->form_validation->set_rules('page_name', 'Page Name','trim|required');
	//$this->form_validation->set_rules('banner_link', 'Link','trim|required');
	$this->form_validation->set_rules('status','Status','trim|required');
	
	if (empty($_FILES['banner_image']['name']))
	{
    $this->form_validation->set_rules('banner_image','Banner Picture','required');
	}
		
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->createBanner($msg,$msg_class); 
	}
	else
	{
			$post_data = $this->input->post();
		    if(count($post_data) > 0)
		{
			
			$getStatus = $this->getFileUpload('./upload/banner/',$_FILES['banner_image']);

			if($getStatus != 'F')
			{

			$this->__all_data['page_name']    = $this->security->xss_clean($post_data['page_name']);
			$this->__all_data['banner_link']    = $this->security->xss_clean($post_data['banner_link']);
			$this->__all_data['banner_image']    = $getStatus;
			$this->__all_data['status']    = $this->security->xss_clean($post_data['status']);
						
			$insert_data_return = $this->dashs->insert_array('cmd_banner',$this->__all_data);	
			$this->listBanner();

			}else{

				$msg = 'Image File is Required';
				$msg_class = 'alert-danger';
				$this->createBanner($msg,$msg_class);
			}
		}
	}
		
}

public function updateBanner($id='')
{
	$output = isNumaric($id);
	if(!empty($id) and !empty($output))
	{	
		
	$this->form_validation->set_rules('page_name', 'Page Name','trim|required');
	
	$this->form_validation->set_rules('status','Status','trim|required');
			
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->createBanner($msg,$msg_class); 
	}
	else
	{
			$post_data = $this->input->post();
		    if(count($post_data) > 0)
		{
			
			if(isset($_FILES['banner_image']) and !empty($_FILES['banner_image']['name'])){
			$getStatus = $this->getFileUpload('./upload/banner/',$_FILES['banner_image']);
			$this->__all_data['banner_image'] = $getStatus;
			}

			$this->__all_data['page_name']    = $this->security->xss_clean($post_data['page_name']);
			$this->__all_data['banner_link']    = $this->security->xss_clean($post_data['banner_link']);
			$this->__all_data['status']    = $this->security->xss_clean($post_data['status']);

			$update_array = $this->dashs->update_array($this->__all_data,$id,'cmd_banner','banner_id');	
			$this->listBanner();
			
		}
	}

	}else{
		$this->listBanner();
	}	
}

public function deleteBanner($id='')
{	
	$output = isNumaric($id);
	if(!empty($id) and !empty($output))
	{
	$delete_data = $this->dashs->delete_array('cmd_banner','banner_id',$id);
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
		redirect('Banner/listBanner','refresh');
	}
	else{
		redirect('Banner','refresh');
	}			
}


//END CLASS
}
