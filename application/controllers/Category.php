<?php 
class Category extends CI_Controller
{
	
	private $__get_old_password;
	private $__get_new_password;
	private $__data;
	private $__dataArray    = array();
	private $__settingArray = array();
	private $__all_data     = array();
    private $_cate_name  = ['event','product','news','blog','business'];
	
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
public function create_category_view($type,$msg='',$msg_class='')
{
	
    if(!empty($type)){
    if(!empty($msg) and !empty($msg_class))
	{
	   $msgSection['msg'] = $msg;
	   $msgSection['msg_class']=$msg_class;
	}   
        $msgSection['type'] = $type;
        $this->load->view('admin/category',$msgSection);
    }else{
       redirect('Dashboard','refresh'); 
    }

}		
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function insert_category()
{
	$this->form_validation->set_rules('category_name', 'Catagory Name','required|is_unique['.CATEGORY.'.category_name]');
	//$this->form_validation->set_rules('img_upload', 'Image File','required');
	$this->form_validation->set_rules('status','Catagory Status','required');
    $this->form_validation->set_rules('category_type','Type','required');
	
	$post_data = $this->input->post();
	
	if(($this->form_validation->run() == FALSE))
	{
			
		$msg = validation_errors();	
		$msg_class = 'alert-danger';
		$this->create_category_view($post_data['category_type'],$msg,$msg_class);
	}
	else
	{	
          if(in_array($post_data['category_type'], $this->_cate_name)){ 
		
            if(count($post_data) > 0)
            {
				
				$config['upload_path'] = 'upload/category/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['overwrite'] = FALSE;
				$config['remove_spaces'] = TRUE;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
		
				if(!empty($_FILES['img_upload']['name'])) {
				if(!$this->upload->do_upload('img_upload')) {
				
				$this->create_category_view($post_data['category_type']);	
				
				}else{
									
					$this->__dataArray['category_name'] = $this->security->xss_clean($post_data['category_name']);
					$this->__dataArray['status'] = $this->security->xss_clean($post_data['status']);
					$this->__dataArray['category_image'] = $this->upload->file_name;
					$this->__dataArray['category_type'] = $post_data['category_type'];
					$this->__dataArray['create_date'] = $post_data['create_date'];
					$this->__dataArray['update_date'] = $post_data['update_date'];
					
					$insertDataReturn = $this->dashs->insert_array(CATEGORY,$this->__dataArray);
					
					if($insertDataReturn)
					{	
							$msg = 'Category created succefully';
							$msg_class = 'alert-success';	
					}
					else
					{
							$msg = 'OPPS !! Something went wrong. Please try after some time';
							$msg_class = 'alert-danger';
					}
					redirect('Category/list-category-view/'.$post_data['category_type'],'refresh'); 
					}
				}else{
					$this->create_category_view($post_data['category_type']);		
				}
            }
        }else{
            redirect('Dashboard','refresh'); 
        }
    }	
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function list_category_view($type,$msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$listmember['msg'] = $msg;
		$listmember['msg_class'] = $msg_class;
	}
	$listmember['all_members']=$this->dashs->getCatagoryDetails(CATEGORY,$type);
	$this->load->view('admin/list_category',$listmember);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function edit_category_view($id='',$msg='',$msg_class='')
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
	$msgSection['all_members'] = $this->dashs->getListDatas(CATEGORY,'category_id',$id);
	if($msgSection['all_members'] == FALSE)
	{
		redirect('Dashboard','refresh');
	}else{
	$this->load->view('admin/edit_category',$msgSection);
	}
	}
	else
	{
	 redirect('Dashboard','refresh');
	}	
}	
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function update_category($id)
{
	$output = isNumaric($id);
	$id = $output;
	if(!empty($id) and !empty($output))
	{

	$this->form_validation->set_rules('category_name', 'Category Name','required');
	$this->form_validation->set_rules('status','Catagory Status','required');
	
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();	
		$msg_class = 'alert-danger';
		$this->edit_category_view($id,$msg,$msg_class);
	}
	else
	{
	$msgSection['all_members'] = $this->dashs->getListDatas(CATEGORY,'category_id',$id);
        
	if($msgSection['all_members'] != FALSE)
	{	
	$post_data = $this->input->post();
	if(count($post_data) >0)
	{
		$config['upload_path'] = 'upload/category/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['overwrite'] = FALSE;
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
			
	
		$this->__dataArray['category_name'] = $this->security->xss_clean($post_data['category_name']);
		$this->__dataArray['status'] = $this->security->xss_clean($post_data['status']);
		
		if(!empty($_FILES['img_upload']['name'])){
			if($this->upload->do_upload('img_upload'))
				{
					$this->__dataArray['category_image'] = $this->upload->file_name;
				}
		}
		$this->__dataArray['update_date'] = date('Y-m-d');
	
	
	$updatedatareturn = $this->dashs->update_array($this->__dataArray,$id,CATEGORY,'category_id');
	}
	if($updatedatareturn)
	{
		$msg ='You have succefully updated category';
		$msgclass = 'alert-success';
	}
	else
	{
		$msg = 'OPPS !! Something went wrong. Please try after some time';
		$msgclass = 'alert-danger';
	}	
            redirect('Category/list-category-view/'.$msgSection['all_members'][0]['category_type'],'refresh');
            
	}else{
            redirect('Category/list-category-view/'.$msgSection['all_members'][0]['category_type'],'refresh');
          
	}
	}
	}else{
		redirect('Dashboard','refresh');	
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_catagory($id,$type)
{
	$output = isNumaric($id);
	$id = $output;
	if(!empty($id) and !empty($output) and !empty($type))
	{
	$delete_data = $this->dashs->delete_array(CATEGORY,'category_id',$id);
	if(($delete_data))
	{
		$msg = 'Delete successfully';
		$msg_class = 'alert-success';
	}
	else
	{
		$msg = 'OPPS !! Something went wrong. Please try after some time';
		$msg_class = 'alert-danger';
	}
            redirect('Category/list-category-view/'.$type,'refresh');
            //$this->list_category_view($type,$msg,$msg_class);
	}
	else{
		redirect('Dashboard','refresh');
	}			
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++ SECTION +++++++++++//	
//END CLASS
}
