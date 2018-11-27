<?php 
class Product extends CI_Controller
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
	public function create_product_view($msg='',$msg_class='')
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$msgSection['msg'] = $msg;
			$msgSection['msg_class']=$msg_class;
			
		}
		$msgSection['categoryName'] = $this->dashs->getCatagoryDetails(CATEGORY,'product');
		$this->load->view('admin/product',$msgSection);
	}		
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function insert_product()
	{
		
		$this->form_validation->set_rules('product_name','Product Name','required');
		$this->form_validation->set_rules('product_description', 'Description','required');
		$this->form_validation->set_rules('product_price','Price','required');
		$this->form_validation->set_rules('product_qty', 'Qty','required');
		$this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('category_id','Category Name','required');
		$this->form_validation->set_rules('subcategory_id','Subcategory Name','required');

		
		if($this->form_validation->run() == FALSE)
		{
			$msg = validation_errors();	
			$msg_class = 'alert-danger';
			$this->create_product_view($msg,$msg_class);
		}
		else
		{
			$post_data = $this->input->post();
			if(count($post_data) > 0)
			{

				$this->__dataArray['user_id'] = 1;
				$this->__dataArray['product_name'] = $this->security->xss_clean($post_data['product_name']);
				$this->__dataArray['product_description'] = $this->security->xss_clean($post_data['product_description']);
				$this->__dataArray['product_price'] = $this->security->xss_clean($post_data['product_price']);
				$this->__dataArray['product_qty'] = $this->security->xss_clean($post_data['product_qty']);
				$this->__dataArray['status'] = $this->security->xss_clean($post_data['status']);
				$this->__dataArray['create_date'] = date('Y-m-d');

				$insertDataReturn = $this->dashs->insert_array(PRODUCT,$this->__dataArray);

				if($insertDataReturn)
				{	
					$uploadData = array();
					if(!empty($_FILES['file_name']['name'])){
						$filesCount = count($_FILES['file_name']['name']);
						for($i = 0; $i < $filesCount; $i++)
						{
							$name         = time().'_'.$_FILES['file_name']['name'][$i];
							$tempName     = $_FILES['file_name']['tmp_name'][$i];
							$uploadPath   = 'upload/product/'.$name;

							if(move_uploaded_file($tempName,$uploadPath))
							{
								$uploadData['product_images_name']   = $name;
								$uploadData['product_id']            = $insertDataReturn;
								$uploadData['primary_image']         = ($i == 0)? '1' : '0';
								$insertPivotDataReturn = $this->dashs->insert_array(PRODUCT_IMAGES,$uploadData);
							}
						}
						if(!empty($insertPivotDataReturn)){

							$categoryData = array();
							$categoryData['product_id'] = $insertDataReturn;
							$categoryData['category_id'] = $this->security->xss_clean($post_data['category_id']); 
							$categoryData['subcategory_id'] = $this->security->xss_clean($post_data['subcategory_id']); 
							$insert_category = $this->dashs->insert_array(PRODUCT_CAT_SUBCAT,$categoryData);

							if($insert_category){

								redirect('Product/list-product-view','refresh');
							}else{
								redirect('Product/list-product-view','refresh');	
							}
						}else{
							redirect('Product/list-product-view','refresh');
						}
					}
				}
				else
				{
					$msg = 'OPPS !! Something went wrong. Please try after some time';
					$msg_class = 'alert-danger';
					redirect('Product/list-product-view','refresh');
				}
				
			}
		}	
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function list_product_view($msg='',$msg_class='')
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$listmember['msg'] = $msg;
			$listmember['msg_class'] = $msg_class;
		}
		$listmember['all_data'] = $this->dashs->getFullDetails(PRODUCT);
		$this->load->view('admin/list_product',$listmember);
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function list_all_product_view($msg='',$msg_class='')
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$listmember['msg'] = $msg;
			$listmember['msg_class'] = $msg_class;
		}
		$listmember['all_data'] = $this->dashs->getFullDetails(PRODUCT);
		$this->load->view('admin/list_all_product',$listmember);
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function edit_product_view($id='',$msg='',$msg_class='')
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
			$msgSection['all_members']  = $this->dashs->getListDatas(PRODUCT,'product_id',$id);
			
			if($msgSection['all_members'] == FALSE)
			{
				redirect('Product','refresh');
			}else{
				$msgSection['categoryName'] = $this->dashs->getCatagoryDetails(CATEGORY,'product');	
				
				$msgSection['productCate']  = $this->dashs->getListDatas(PRODUCT_CAT_SUBCAT,'product_id',$msgSection['all_members'][0]['product_id']);
				$msgSection['subCategoryName'] = $this->dashs->getSubcategoryName($msgSection['productCate'][0]['category_id']);	
				$this->load->view('admin/edit_product',$msgSection);
			}
		}
		else
		{
			redirect('Product','refresh');
		}	
	}	
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function update_product($id)
	{
		$output = isNumaric($id);
		$id = $output;
		if(!empty($id) and !empty($output))
		{
			
			$this->form_validation->set_rules('product_name','Product Name','required');
			$this->form_validation->set_rules('product_description', 'Description','required');
			$this->form_validation->set_rules('product_price','Price','required');
			$this->form_validation->set_rules('product_qty', 'Qty','required');
			$this->form_validation->set_rules('status','Status','required');
			$this->form_validation->set_rules('category_id','Category Name','required');
			$this->form_validation->set_rules('subcategory_id','Subcategory Name','required');

			
			if($this->form_validation->run() == FALSE)
			{
				$msg = validation_errors();	
				$msg_class = 'alert-danger';
				$this->edit_product_view($id,$msg,$msg_class);
			}
			else
			{
				$msgSection['all_members'] = $this->dashs->getListDatas(PRODUCT,'product_id',$id);
				if($msgSection['all_members'] != FALSE)
				{	
					$post_data = $this->input->post();
					if(count($post_data) >0)
					{

						$this->__dataArray['user_id'] = 1;
						$this->__dataArray['product_name'] = $this->security->xss_clean($post_data['product_name']);
						$this->__dataArray['product_description'] = $this->security->xss_clean($post_data['product_description']);
						$this->__dataArray['product_price'] = $this->security->xss_clean($post_data['product_price']);
						$this->__dataArray['product_qty'] = $this->security->xss_clean($post_data['product_qty']);
						$this->__dataArray['status'] = $this->security->xss_clean($post_data['status']);
						$this->__dataArray['update_date'] = date('Y-m-d');

						$updatedatareturn = $this->dashs->update_array($this->__dataArray,$id,PRODUCT,'product_id');

					}
					if($updatedatareturn)
					{
						
						$uploadData = array();
						if(!empty($_FILES['file_name']['name'])){
							$filesCount = count($_FILES['file_name']['name']);
							for($i = 0; $i < $filesCount; $i++)
							{
								$name         = time().'_'.$_FILES['file_name']['name'][$i];
								$tempName     = $_FILES['file_name']['tmp_name'][$i];
								$uploadPath   = 'upload/product/'.$name;

								if(move_uploaded_file($tempName,$uploadPath))
								{
									$uploadData['product_images_name']   = $name;
									$uploadData['product_id']            = $id;
									$uploadData['primary_image']         = 0;
									$insertPivotDataReturn = $this->dashs->insert_array(PRODUCT_IMAGES,$uploadData);
								}
							}

						}

						$categoryData = array();
						$categoryData['product_id'] = $id;
						$categoryData['category_id'] = $this->security->xss_clean($post_data['category_id']); 
						$categoryData['subcategory_id'] = $this->security->xss_clean($post_data['subcategory_id']); 
						$update_category = $this->dashs->update_array($categoryData,$id,PRODUCT_CAT_SUBCAT,'product_id');
						if($update_category){
							redirect('Product/list-product-view','refresh');
						}else{
							redirect('Product/list-product-view','refresh');	
						}


					}
					else
					{
						$msg = 'OPPS !! Something went wrong. Please try after some time';
						$msgclass = 'alert-danger';
						redirect('Product/list-product-view','refresh');
					}	
					
				}else{
					redirect('Product/list-product-view','refresh');
            //$this->list_membership_view();	
				}
			}
		}else{
			redirect('Product','refresh');	
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function delete_product($id)
	{
		$output = isNumaric($id);
		$id = $output;
		if(!empty($id) and !empty($output))
		{
			$delete_data_1 = $this->dashs->delete_array(PRODUCT,'product_id',$id);
			$delete_data_2 = $this->dashs->delete_array(PRODUCT_IMAGES,'product_id',$id);
			$delete_data_3 = $this->dashs->delete_array(PRODUCT_CAT_SUBCAT,'product_id',$id);
			if(($delete_data_1) and ($delete_data_2) and ($delete_data_3))
			{
				$msg = 'Delete successfully';
				$msg_class = 'alert-success';
			}
			else
			{
				$msg = 'OPPS !! Something went wrong. Please try after some time';
				$msg_class = 'alert-danger';
			}
			redirect('Product/list-product-view','refresh');
        //$this->list_membership_view($msg,$msg_class);
		}
		else{
			redirect('Product','refresh');
		}			
	}	
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function get_subcategory()
	{
		$category_id = $this->security->xss_clean($this->input->post('id'));
		if(!empty($category_id)){
			$getData = $this->dashs->getSubcategoryName($category_id);
			if(count($getData) > 0){
				$data = '<option value="">Select Subcategory</option>';	
				foreach ($getData as $dataSection) {
					$data .= '<option value="'.$dataSection['category_id'].'">'.$dataSection['category_name'].'</option>';
				}
				echo $data;	
			}	
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function gallery_view($id)
	{
		$output = isNumaric($id);
		$id = $output;
		if(!empty($id) and !empty($output))
		{
			$msgSection['all_data'] = $this->dashs->getProductPicture($id);	
			$this->load->view('admin/list_product_gallary',$msgSection);	
		}else{
			redirect('Product/list-product-view','refresh');	
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function delete_product_gallary($id)
	{
		$output = isNumaric($id);
		$id = $output;
		if(!empty($id) and !empty($output))
		{
			$delete_data_1 = $this->dashs->delete_array(PRODUCT_IMAGES,'product_images_id',$id);
			if(($delete_data_1))
			{
				$msg = 'Delete successfully';
				$msg_class = 'alert-success';
			}
			else
			{
				$msg = 'OPPS !! Something went wrong. Please try after some time';
				$msg_class = 'alert-danger';
			}
			redirect('Product/list-product-view','refresh');	
			
		}
		else{
			redirect('Product','refresh');
		}			
	}	
//+++ SECTION +++++++++++//	
//END CLASS
}
