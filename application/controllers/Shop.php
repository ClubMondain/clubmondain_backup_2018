<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Shop extends CI_Controller {
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
	$this->load->model('Users','urs'); //Replace the Users Model Name
	$this->load->model('Dashboards','dashs'); //Replace the Dashboard Model Name
}
//++++++++++++++++++++++++++++++++++++++ /*For view Only*/++++++++++++++++++++++++++++++++++
public function index()
{
	$this->error_validation_session_check();
	$msgsection['all_events'] = $this->urs->getFullDetails(VIEW_EVENT,'user_id',$this->session->userdata('user_id'),'event_id');
	$msgsection['all_business'] = $this->urs->getFullDetails(VIEW_BUSINESS,'user_id',$this->session->userdata('user_id'),'business_id');
	$msgsection['full_profile'] = $this->urs->getUserDetails(USER_DETAILS,USER,'email',$this->session->userdata('user_id'));
	$msgsection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');
	$msgsection['catdata'] = $this->urs->getDetailsDesc(CATEGORY,'category_id');
	$count_event = count($msgsection['all_events']);
	$this->session->set_userdata('user_details',$msgsection['full_profile']);
	$this->session->set_userdata('count_event',$count_event);
	$msgsection['fav_city'] = $this->urs->getFavCitys(CITY,PIVOT_FEB_CITY,'city_id',$this->session->userdata('user_id'));
	$msgsection['my_blog']= $this->dashs->get_blog_full_admin(BLOG_NEWS,COUNTRY,CITY,$this->session->userdata('user_id'));
	$msgsection['all_meetup'] = $this->get_meet_up_data();
	$this->load->view('dashboard/dashboard',$msgsection);	
}
//++++++++++++++++++++++++++++++++++++++ SESSION ERROR CHECKING ++++++++++++++++++++++++++++++++++
public function error_validation_session_check()
{	
	if(!isset($_SESSION['user_login'])){
			redirect('Home','refresh');
		}	
}
//++++++++++++++++++++++++++++++++++++++ GET ALL MEET UP DATA ++++++++++++++++++++++++++++++++++
public function get_meet_up_data()
{
	// Meet Up Calculationm	
	$user_address = $this->urs->getFullDetails(ADDRESS,'user_id',$this->session->userdata('user_id'),'address_id');
	return $this->urs->getDetailsbyLimitCount(MEET_UP,$user_address[0]['city_id'],'city_id','status','meet_up_id');
	
}
############################################# Create PRODUCT SECTION ####################################
//+++++++++++++++++++++++++++++++ USER DASHBOARD EVENT SECTION +++++++++++++++++++++++++++++++++++++++++	
public function add_product($msg='',$msg_class='',$user_id='')
{
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		//$msgsection['id'] = $id;
		$msgsection['msg'] = $msg;
		$msgsection['msgclass'] = $msg_class;
	}
	$msgsection['category'] = $this->urs->getFullUserDetails(CATEGORY,'product','category_type');
	$msgsection['sub_category'] = $this->urs->getFullUserDetails(CATEGORY,'product','category_type');
	$msgsection['all_meetup'] = $this->get_meet_up_data();
	$this->load->view('dashboard/shop/add-product-form',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ INSERT EVENT CREATION VIEW +++++++++++++++++++++++++++++++//
public function insert_product()
{
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	$this->form_validation->set_rules('product_name', 'Product Name','required');
	$this->form_validation->set_rules('product_cat','Product Category Name','required');
	$this->form_validation->set_rules('product_subcat','Product Sub-Category Name','required');
	$this->form_validation->set_rules('product_price','Product Price','required');
	$this->form_validation->set_rules('product_qty','Product Quantity','required');
	$this->form_validation->set_rules('product_description','Product Description','required');
	$this->form_validation->set_rules('',"file_name","Product Image","required");
	$post_data = $this->input->post();//Global array variable
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->add_product($msg,$msg_class); 
	}
	else
	{
		if(count($post_data) > 1)
		{
			$product_name			= $post_data['product_name'];
			$product_cat_id 		= $post_data['product_cat'];
			$product_subcat 		= $post_data['product_subcat'];
			$product_price 			= $post_data['product_price'];
			$product_qty 			= $post_data['product_qty'];
			$product_description 	= $post_data['product_description'];
			
			///////////////////////// INSERTION IN DATABASE FIELD /////////////////////////////
			$this->__all_data = array(
				  'user_id' 			=> $this->session->userdata('user_id'),
				  'product_name' 		=> $product_name,
				  'product_price' 		=> $product_price,
				  'product_qty' 		=> $product_qty,
				  'product_description' => $product_description,
				  'create_date' 		=> date("Y-m-d"),
				  'update_date' 		=> date("Y-m-d"),
				  'status' 				=> 'Active',
				);
			$insertDataReturn = $this->urs->InsertDatas(PRODUCT,$this->__all_data);
			
			//FILE UPLOAD Product Images
			$uploadData = array();
			if(!empty($_FILES['file_name']['name'])){
            $filesCount = count($_FILES['file_name']['name']);
            for($i = 0; $i < $filesCount; $i++)
			{
				//print_r($_FILES);die;
                $name 		= time().'_'.$_FILES['file_name']['name'][$i];
                $tempName 	= $_FILES['file_name']['tmp_name'][$i];
                $uploadPath = 'upload/product/'.$name;
				if(move_uploaded_file($tempName,$uploadPath)){
				$uploadData['product_images_name'] 	= $name;
				$uploadData['product_id'] 			= $insertDataReturn;
				$uploadData['primary_image'] 		= ($i == 0)? '1' : '0';
				$insertPivotDataReturn 				= $this->urs->InsertDatas(PRODUCT_IMAGES,$uploadData);
			}
		}
            if(!empty($insertPivotDataReturn)){
                $statusMsg = 'Files uploaded successfully';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }			
			//END FILE UPLOAD Product Image
			
			if(!empty($product_subcat)){
				//foreach($product_subcat as $product_subcat){
					$this->__all_data = array(
					'product_id' 		=> $insertDataReturn,
					'category_id' 		=> $product_cat_id,
					'subcategory_id'	=> $product_subcat
					);
					$insertPivotDataReturn = $this->urs->InsertDatas(PRODUCT_CAT_SUBCAT,$this->__all_data);
					//}
			}
			if($insertDataReturn)
			{
				$msgsection['msg'] = 'Product Succefully Created';
				$msgsection['msg_class'] = 'alert-success';	
			}
			else
			{
				$msgsection['msg'] = validation_errors();	
				$msgsection['msg_class'] = 'alert-danger';
			}
				redirect('Shop/list_product_view','refresh');	
		}
	}
}
//+++++++++++++++++++++++++++++++++++++++ LIST VIEW Specific Events +++++++++++++++++++++++++++++++++//	
public function list_product_view($msg='',$msg_class='')
{
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msg_class'] = $msg_class;
	}
	$full_data = $msgsection['all_events'] = $this->urs->getproductDatas('user_id',$this->session->userdata('user_id'));
	//$msgsection['all_events'] = $this->urs->getFullUserDetails(PRODUCT,PRODUCT_IMAGES,$this->session->userdata('user_id'),'user_id');
	$msgsection['catdata'] 		  = $this->urs->getFullUserDetails(CATEGORY,'product','category_type');
	$msgsection['subcatdata'] 	  = $this->urs->getFullUserDetails(CATEGORY,'sub-product','category_type');
	$msgsection['product_images'] = $this->urs->getFullUserDetails(PRODUCT_IMAGES,1,'primary_image');
	/*for($i=0;$i<count($msgsection['all_events']);$i++){
	$msgsection['pivot_category'][] = $this->urs->getFullUserDetails(PRODUCT_CAT_SUBCAT,$full_data[$i]['product_id'],'product_id');
	}*/
	$msgsection['all_meetup'] = $this->get_meet_up_data();
	$this->load->view('dashboard/shop/my-product',$msgsection);
}	
//+++++++++++++++++++++++++++++++++++++++ SPECIFIC Member EDIT Event +++++++++++++++++++++++//	
public function edit_product($id='',$msg='',$msg_class='')
{
	$id = base64_decription($id);
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] 		= $msg;
		$msgsection['msgclass'] = $msg_class;
	}
		$msgsection['all_data'] 	  = $this->urs->getFullUserDetails(PRODUCT,$id,'product_id');
		$msgsection['catdata'] 		  = $this->urs->getFullUserDetails(CATEGORY,'product','category_type');
		$msgsection['subcatdata'] 	  = $this->urs->getFullUserDetails(CATEGORY,'sub-product','category_type');
		$msgsection['pivot_category'] = $this->urs->getFullUserDetails(PRODUCT_CAT_SUBCAT,$id,'product_id');
		$msgsection['product_images'] = $this->urs->getFullUserDetails(PRODUCT_IMAGES,$id,'product_id');
		$all_data = $msgsection['all_data'];	
		$member_id = $all_data[0]['product_id'];
	//die;
	if($id != $member_id || $id == '')
	{
		redirect('Main/redirect_specific_user','refresh');
	}//If Url Data is Not Matched
		$msgsection['all_meetup'] = $this->get_meet_up_data();
	$this->load->view('dashboard/shop/edit-product-form',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ Update Event +++++++++++++++++++++++++++++++++//
public function update_product($id)
{
	$id = base64_decription($id);
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	$this->form_validation->set_rules('product_name', 'Product Name','required');
	$this->form_validation->set_rules('product_cat','Product Category Name','required');
	$this->form_validation->set_rules('product_price','Product Price','required');
	$this->form_validation->set_rules('product_qty','Product Quantity','required');
	$this->form_validation->set_rules('product_description','Product Description','required');
	$post_data = $this->input->post();//Global array variable
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->add_product($msg,$msg_class); 
	}
	else
	{
		if(count($post_data) > 1)
		{
			$product_name			= $post_data['product_name'];
			$product_cat_id 		= $post_data['product_cat'];
			$product_subcat 		= $post_data['product_subcat'];
			$product_price 			= $post_data['product_price'];
			$product_qty 			= $post_data['product_qty'];
			$product_description 	= $post_data['product_description'];
			///////////////////////// INSERTION IN DATABASE FIELD /////////////////////////////
			$this->__all_data = array(
				  'user_id' 			=> $this->session->userdata('user_id'),
				  'product_name' 		=> $product_name,
				  'product_price' 		=> $product_price,
				  'product_qty' 		=> $product_qty,
				  'product_description' => $product_description,
				  'update_date' 		=> date("Y-m-d"),
				  'status' 				=> 'Active',
			);
			$insertDataReturn = $this->urs->UpdateDatas($this->__all_data,$id,PRODUCT,'product_id');
			//FILE UPLOAD Product Images
			$uploadData = array();
			if(!empty($_FILES['file_name']['name'])){
            $filesCount = count($_FILES['file_name']['name']);
            for($i = 0; $i < $filesCount; $i++)
			{
				//print_r($_FILES);die;
                $name 		= time().'_'.$_FILES['file_name']['name'][$i];
                $tempName 	= $_FILES['file_name']['tmp_name'][$i];
                $uploadPath = 'upload/product/'.$name;
				if(move_uploaded_file($tempName,$uploadPath)){
				$uploadData['product_images_name'] 	= $name;
				$uploadData['product_id'] 			= $id;
				$insertPivotDataReturn 				= $this->urs->InsertDatas(PRODUCT_IMAGES,$uploadData);
			}
		}
            if(!empty($insertPivotDataReturn)){
                $statusMsg = 'Product Updated Successfully';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }			
			//END FILE UPLOAD Product Image
			if(!empty($product_subcat)){
				//foreach($product_subcat as $product_subcat){
					$this->__all_data = array(
					'product_id' 		=> $id,
					'category_id' 		=> $product_cat_id,
					'subcategory_id'	=> $product_subcat
					);
					$insertPivotDataReturn = $this->urs->UpdateDatas($this->__all_data,$id,PRODUCT_CAT_SUBCAT,'product_id');
					//}
			}
			/*if(!empty($insertDataReturn)){
				//FILE UPLOAD Event Picture
			/*$event_pic = $_FILES['event_pic']['name'];
			
			$path = './upload/events/';
			$time = time();
			$get_file_name = $_FILES['product_images_name']['name'];
			$get_file_temp = $_FILES['product_images_name']['tmp_name'];
			$get_file_error = $_FILES['product_images_name']['error'];
			$get_modi_file_name = $time.'_'.$get_file_name;
			$get_modi_full_name = $path.$time.'_'.$get_file_name;
			
			if(!empty($_FILES['product_images_name']['name'])){
			  if($this->upload->do_upload('product_images_name')){
				 $fileName = $this->upload->file_name;	
			  }else{
				 $msg = $this->upload->display_errors(); 
				 $msg_class = 'alert-danger';
				 $this->add_product($msg,$msg_class); 
			  }
			}else{
				$fileName = ''; 
			}	
				$this->__all_data = array(
				'event_id' => $insertDataReturn,
				'image_url' => $fileName,
				);
				$insertImageDataReturn = $this->urs->InsertDatas(EVENT_IMAGE,$this->__all_data);
			}*/
			if($insertDataReturn)
			{
				$msgsection['msg'] = 'Product Succefully Updated';
				$msgsection['msg_class'] = 'alert-success';	
			}
			else
			{
				$msgsection['msg'] = validation_errors();	
				$msgsection['msg_class'] = 'alert-danger';
			}
				redirect('Shop/list_product_view','refresh');	
		}
	}
}
//+++++++++++++++++++++++++++++++++++++++ LIST VIEW ALL Events +++++++++++++++++++++++++++++++++//	
public function product_details($id='',$msg='',$msg_class='')
{	
	$id = base64_decription($id);
	$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msg_class'] = $msg_class;
	}
		$msgsection['all_data'] 	  = $this->urs->getproductDatas('product_id',$id);
		$msgsection['catdata'] 		  = $this->urs->getFullUserDetails(CATEGORY,'product','category_type');
		$msgsection['subcatdata'] 	  = $this->urs->getFullUserDetails(CATEGORY,'sub-product','category_type');
		$msgsection['pivot_category'] = $this->urs->getFullUserDetails(PRODUCT_CAT_SUBCAT,$id,'product_id');
		$msgsection['galerry_data']   = $this->urs->getTypeDetails(PRODUCT_IMAGES,$id,'product_id','primary_image',0);
		
		if($id != $msgsection['all_data'][0]['product_id'] || $id == '')
		{
			redirect('Main/redirect_specific_user','refresh');
		}//If Url Data is Not Matched
		$msgsection['all_meetup'] = $this->get_meet_up_data();
		$this->load->view('dashboard/shop/product-details',$msgsection);		
}	
//+++++++++++++++++++++++++++++++++++++++++++++ DELETE Event LIST +++++++++++++++++++++++++++++++++//	
public function delete_product($id)
{
		$id = base64_decription($id);
		$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
		if($id != '')
		{
			$all_data = $this->urs->getproductDatas('product_id',$id);
			$file = $all_data[0]['product_images_name'];
			if($file != '')
			{
				
				//unlink("upload/product/".$file);
			}
			
			//$delete_images_data = $this->urs->getFullUserDetails(PRODUCT_IMAGES,$id,'product_id');
			
			//______________________________________________ Other Images Delete______________________
			
			$delete_images_data = $this->urs->getFullUserDetails(PRODUCT_IMAGES,$id,'product_id');
			//print_r($delete_images_data);die();
			foreach($delete_images_data as $delete_images_data){
				$image_name = $delete_images_data['product_images_name'];
				unlink("upload/product/".$image_name);
			}
			//________________________________________________________________________________________
			$delete_data = $this->urs->DeleteDatas(PRODUCT,$id,'product_id');
			$delete_Pivot_data = $this->urs->DeleteDatas(PRODUCT_CAT_SUBCAT,$id,'product_id');
			$delete_Pivot_data = $this->urs->DeleteDatas(PRODUCT_IMAGES,$id,'product_id');
			if($delete_data){
			$msg = 'Delete Successfully';
			$msg_class = 'alert-success';
			}
			else{
				$msg = 'Error';
				$msg_class = 'alert-danger';
				}
				//$this->list_event_view($msg,$msg_class);
				redirect('Shop/list-product-view','refresh');
		}
		else{
				redirect('Shop/list-product-view','refresh');
			}	
			die;	
}
//+++++++++++++++++++++++++++++++++++++++++++++ DELETE Event LIST +++++++++++++++++++++++++++++++++//	
public function delete_gallery($galery_id)
{
		$id = base64_decription($galery_id);
		$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
		if($id != '')
		{
			$all_data = $this->urs->getFullUserDetails(PRODUCT_IMAGES,$id,'product_images_id');
			$file = $all_data[0]['product_images_name'];
			if($file != '')
			{
				unlink("upload/product/".$file);
			}
			$delete_Pivot_data = $this->urs->DeleteDatas(PRODUCT_IMAGES,$id,'product_images_id');
			if($delete_Pivot_data){
			$msg = 'Delete Successfully';
			$msg_class = 'alert-success';
			}
			else{
				$msg = 'Error';
				$msg_class = 'alert-danger';
				}
				//$this->list_event_view($msg,$msg_class);
				//echo $galery_id;die;
				redirect(base_url()."Shop/product_details/".$galery_id,"refresh");
		}
		else{
				redirect(base_url()."Shop/product_details/".$galery_id,"refresh");
			}		
}
// +++++++++++++++++++++++ CATEGORY CORROSPOND SUB-CATEGORY LIST (AJAX CALLING DATA) +++++++++++++++++++++
public function check_sub_category()
{
	$this->__country = $this->input->post('sub_category',true);
	$this->__all_data = $this->urs->getFullDetails(CATEGORY,'parent_id',$this->__country,'category_id');
	print_r($this->__all_data);
	 if(count($this->__all_data) > 0)
	 {
	 	foreach($this->__all_data as $sub_cat)
		{
			 echo '<option value='.$sub_cat['category_id'].'>'.$sub_cat['category_name'].'</option>';
		}
	 }
}
//+++++++++++++++++++++++++++++++++++++++ INSERT FEEDBACK +++++++++++++++++++++++++++++++//
public function insert_feedback()
{
	$post_data = $this->input->post();
	//print_r($post_data);die;
	if(count($post_data)>0){
	$product_id = base64_decription($post_data['product_id']);
		
	$data['product_id'] 	= base64_decription($post_data['product_id']);
	$data['user_id'] 		= $this->session->userdata('user_id');
	$data['user_comment'] 	= $post_data['user_comment'];
	$data['user_review'] 	= $post_data['store_service_ratting'];
	$data['create_date'] 	= date('Y-m-d');
	$get_return_status = $this->urs->InsertDatas(PRODUCT_REVIEW,$data);
		if($get_return_status != ''){
			$msg = 'Success';
		redirect(base_url().'Home/shop-details/'.$product_id.'/'.$msg.'/','refresh');	
		} 
		else{
			redirect('Home/shop-details/'.$product_id,'refresh');	
		}
	}
}
############################################# END PRODUCT SECTION ####################################
}//End Controler