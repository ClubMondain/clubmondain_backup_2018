<?php 
class Membership extends CI_Controller
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
public function create_membership_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgSection['msg'] = $msg;
		$msgSection['msg_class']=$msg_class;
		$this->load->view('admin/membership',$msgSection);
	}else{
		$this->load->view('admin/membership');
	}
	
}		
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function insert_membership()
{
	$this->form_validation->set_rules('membership_category_id', 'Membership Category','required');
	$this->form_validation->set_rules('membership_name','Membership Name','required');
	$this->form_validation->set_rules('membership_type', 'Type','required');
	$this->form_validation->set_rules('membership_price','Price','required');
	$this->form_validation->set_rules('membership_start_date', 'Start Date','required');
	$this->form_validation->set_rules('membership_end_date','End Date','required');
	$this->form_validation->set_rules('membership_status', 'Status','required');
	
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();	
		$msg_class = 'alert-danger';
		$this->create_membership_view($msg,$msg_class);
	}
	else
	{
	$post_data = $this->input->post();
	if(count($post_data) > 0)
	{
	foreach($post_data as $key=>$value)
	{
	$this->__dataArray[$key] = $value;
	} 
	$insertDataReturn = $this->dashs->insert_array(MEMBERSHIP,$this->__dataArray);
	if($insertDataReturn)
	{	
		$msg = 'Membership created succefully';
		$msg_class = 'alert-success';	
	}
	else
	{
		$msg = 'OPPS !! Something went wrong. Please try after some time';
		$msg_class = 'alert-danger';
	}
        redirect('Membership/list-membership-view','refresh');
	//$this->list_membership_view($msg,$msg_class);	
	}
	}	
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function list_membership_view($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$listmember['msg'] = $msg;
		$listmember['msg_class'] = $msg_class;
	}
	$listmember['all_members']=$this->dashs->getFullDetails(MEMBERSHIP);
	$this->load->view('admin/list_membership',$listmember);
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function edit_membership_view($id='',$msg='',$msg_class='')
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
	$msgSection['all_members'] = $this->dashs->getListDatas(MEMBERSHIP,'membership_id',$id);
	if($msgSection['all_members'] == FALSE)
	{
		redirect('Dashboard','refresh');
	}else{
	$this->load->view('admin/edit_membership',$msgSection);
	}
	}
	else
	{
		redirect('Dashboard','refresh');
	}	
}	
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function update_membership($id)
{
	$output = isNumaric($id);
	$id = $output;
	if(!empty($id) and !empty($output))
	{
		
	$this->form_validation->set_rules('membership_category_id', 'Membership Category','required');
	$this->form_validation->set_rules('membership_name','Membership Name','required');
	$this->form_validation->set_rules('membership_type', 'Type','required');
	$this->form_validation->set_rules('membership_price','Price','required');
	$this->form_validation->set_rules('membership_start_date', 'Start Date','required');
	$this->form_validation->set_rules('membership_end_date','End Date','required');
	$this->form_validation->set_rules('membership_status', 'Status','required');
	
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();	
		$msg_class = 'alert-danger';
		$this->edit_membership_view($id,$msg,$msg_class);
	}
	else
	{
		$msgSection['all_members'] = $this->dashs->getListDatas(MEMBERSHIP,'membership_id',$id);
		if($msgSection['all_members'] != FALSE)
		{	
		$post_data = $this->input->post();
		if(count($post_data) >0)
		{
		foreach($post_data as $key=>$value)
		{
		$this->__settingArray[$key] = $value;
		}
		$updatedatareturn = $this->dashs->update_array($this->__settingArray,$id,MEMBERSHIP,'membership_id');
		}
		if($updatedatareturn)
		{
			$msg ='You have succefully updated membership';
			$msgclass = 'alert-success';
		}
		else
		{
			$msg = 'OPPS !! Something went wrong. Please try after some time';
			$msgclass = 'alert-danger';
		}	
			redirect('Membership/list-membership-view','refresh');
                        //$this->list_membership_view($msg,$msgclass);
		}else{
			redirect('Membership/list-membership-view','refresh');
                        //$this->list_membership_view();	
		}
		}
	}else{
		redirect('Dashboard','refresh');	
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_membership($id)
{
	$output = isNumaric($id);
	$id = $output;
	if(!empty($id) and !empty($output))
	{
	$delete_data = $this->dashs->delete_array(MEMBERSHIP,'membership_id',$id);
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
		redirect('Membership/list-membership-view','refresh');
                //$this->list_membership_view($msg,$msg_class);
	}
	else{
		redirect('Dashboard','refresh');
	}			
}	
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++ SECTION +++++++++++//	
//END CLASS
}
