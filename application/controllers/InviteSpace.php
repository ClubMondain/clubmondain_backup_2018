<?php
class InviteSpace extends CI_Controller
{
	private $__data;
	private $__dataArray    = array();
	private $__settingArray = array();
	private $__all_data     = array();

//++++++++++++++++++++++++++++++++++++++ CONSTRUCTUR CALLING ++++++++++++++++++++++++++++++++++
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('data');
		$this->getSessionValidate();
		$this->load->model('EnergiserData','energiserdata');
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
		$msgsection['msg'] = $msg;
		$msgsection['msg_class'] = $msg_class;
	}
	$msgsection['category'] = $this->energiserdata->getFullUserDetails(CATEGORY,'event','category_type');	
	$msgsection['country'] = $this->energiserdata->getCountryDetails(COUNTRY,'country_id');
	$msgsection['timezone'] = $this->energiserdata->getFieldDetails(TIMEZONE);
	$msgsection['company_details']  = $this->energiserdata->getCompanyTypeUserDetails(USER,USER_DETAILS,'C');
	$this->load->view('admin/add_invite_space',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++ INDEX ++++++++++++++++++++++++++++++++++++++++++++++++
public function insert_space()
{	
	$flag='';
	$this->form_validation->set_rules('user_id', 'Comapany Name','trim|required');
	$this->form_validation->set_rules('invite_type', 'Invite Space Type','trim|required');

	if (empty($_POST['cat_id'])) {
    $this->form_validation->set_rules('cat_id[]',"Category", "required");
	}
	if (empty($_POST['day_name'])) {
    $this->form_validation->set_rules('cat_id[]',"Category", "required");
	}
	
	
	
	$this->form_validation->set_rules('business_description','Business Description','trim|required');
	$this->form_validation->set_rules('business_website_url','Website Url Facilities','trim|required');
	$this->form_validation->set_rules('business_street','Street Name','trim|required');
	$this->form_validation->set_rules('business_postal_code','Postal Address','trim|required');
	$this->form_validation->set_rules('country_id','Country Name','trim|required');
	$this->form_validation->set_rules('city_id','City Name','trim|required');


	
	/*if( ($_POST['from_opening_hour0'] == '' || $_POST['from_opening_mint0'] == '' || $_POST['to_opening_hour0'] == '' || $_POST['to_opening_mint0'] == '') 
	&& ($_POST['from_opening_hour1'] == '' || $_POST['from_opening_mint1'] == '' || $_POST['to_opening_hour1'] == '' || $_POST['to_opening_mint1'] == '')  
	&& ($_POST['from_opening_hour2'] == '' || $_POST['from_opening_mint2'] == '' || $_POST['to_opening_hour2'] == '' || $_POST['to_opening_mint2'] == '') 
	&& ($_POST['from_opening_hour3'] == '' || $_POST['from_opening_mint3'] == '' || $_POST['to_opening_hour3'] == '' || $_POST['to_opening_mint3'] == '') 
	&& ($_POST['from_opening_hour4'] == '' || $_POST['from_opening_mint4'] == '' || $_POST['to_opening_hour4'] == '' || $_POST['to_opening_mint4'] == '') 
	&& ($_POST['from_opening_hour5'] == '' || $_POST['from_opening_mint5'] == '' || $_POST['to_opening_hour5'] == '' || $_POST['to_opening_mint5'] == '') 
	&& ($_POST['from_opening_hour6'] == '' || $_POST['from_opening_mint6'] == '' || $_POST['to_opening_hour6'] == '' || $_POST['to_opening_mint6'] == '')     )
		{
			$flag = 1;
		}
		if($flag){
			$this->form_validation->set_rules('from_opening_hour0', 'Open Hour Time is required ','required');
		}*/

	/*if (empty($_FILES['business_image']['name']))
	{
    $this->form_validation->set_rules('business_image','Business Picture','required');
	}

    if (empty($_FILES['business_banner_image']['name']))
	{
    $this->form_validation->set_rules('business_banner_image','Buisness Banner Picture','required');
	}*/

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
		
		$user_id = $this->security->xss_clean($post_data['user_id']);
		$invite_type = $this->security->xss_clean($post_data['invite_type']);
		$business_name = $this->security->xss_clean($post_data['business_name']);
		$cat_id = $this->security->xss_clean($post_data['cat_id']);
		$business_description = $this->security->xss_clean($post_data['business_description']);
		$business_website_url = $this->security->xss_clean($post_data['business_website_url']);
		$business_street  = $this->security->xss_clean($post_data['business_street']);
		$business_postal_code = $this->security->xss_clean($post_data['business_postal_code']);
		$business_status   = $this->security->xss_clean($post_data['business_status']);
		$city_id           = $this->security->xss_clean($post_data['city_id']);
		$country_id        = $this->security->xss_clean($post_data['country_id']);

		$get_lat_lng    = getLatLong($business_street);
		$event_latitude = $get_lat_lng['latitude'];
		$event_longitute= $get_lat_lng['longitude'];

		$get_img_one = $this->getFileUpload('./upload/business/',$_FILES['business_image']);
        $get_img_two = $this->getFileUpload('./upload/business/',$_FILES['business_banner_image']);

        if( ($get_img_one != 'F') and ($get_img_two != 'F') )
        {
        	
            $this->__all_data['user_id'] = $user_id;
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
            $this->__all_data['invite_type'] =  $invite_type;
            $this->__all_data['create_date'] = date('Y-m-d');     
            $insert_data_return = $this->energiserdata->InsertDatas(INVITE_SPACE,$this->__all_data);
            
       
       	/*	echo "<pre>";
       		print_r($cat_id);
       		exit;*/	
       
	        if(!empty($cat_id)){
			foreach($cat_id as $cat_id){
				$this->__all_data = array(
				'category_id' => $cat_id,
				'pivot_unique_id' => $insert_data_return,
				'category_type'=> 'invite_space'
				);
				$insertPivotDataReturn = $this->energiserdata->InsertDatas(PIVOT_CATEGORY,$this->__all_data);
				}
		}
	        
    
        
        
         for($i=0;$i<7;$i++){
		  $opening_hour_day = $post_data['day_name'][$i];
		  $from_opening_hour =!empty($post_data['from_opening_hour'.$i]) ? $post_data['from_opening_hour'.$i] : 0;
		  $from_opening_mint = !empty($post_data['from_opening_mint'.$i]) ? $post_data['from_opening_mint'.$i] : 0;
		  $from_opening_indication = !empty($post_data['from_opening_indication'.$i]) ? $post_data['from_opening_indication'.$i] : 0;
		  $to_opening_hour = !empty($post_data['to_opening_hour'.$i]) ? $post_data['to_opening_hour'.$i] : 0;
		  $to_opening_mint = !empty($post_data['to_opening_mint'.$i]) ? $post_data['to_opening_mint'.$i] : 0;
		  $to_opening_indication = !empty($post_data['to_opening_indication'.$i]) ? $post_data['to_opening_indication'.$i] : 0;
		  if(isset($post_data['opening_hour_close'.$i]) && !empty($post_data['opening_hour_close'.$i]) ){
			 $opening_hour_close = $post_data['opening_hour_close'.$i];
		  }
		  else{
			$opening_hour_close = 0;
		  }
		  if(isset($post_data['from_opening_hour'.$i]) && ($post_data['from_opening_hour'.$i] != '') ){
			$from_hour = $from_opening_hour.'-'.$from_opening_mint.'-'.$from_opening_indication;
		  }
		  else{
				$from_hour = 0;
			  }
		  if(isset($post_data['to_opening_hour'.$i]) && ($post_data['to_opening_hour'.$i]!= '') ){
			$to_hour = $to_opening_hour.'-'.$to_opening_mint.'-'.$to_opening_indication;
		  }
		   else{
				$to_hour = 0;
			  }
		 $this->__alldata = array(
		 'company_business_id'=>$insert_data_return,
		 'opening_hour_day'=>$opening_hour_day,
		 'opening_hour_from'=>$from_hour,
		 'opening_hour_to'=>$to_hour,
		 'opening_hour_close'=>$opening_hour_close,
		 'opening_hour_type'=>3);
			$insert_opening_data = $this->energiserdata->InsertDatas(OPENING_HOUR,$this->__alldata);
		 }
	        if($insert_data_return)
	        {
	        	$msg = 'Invite Space Succefully Created';
				$msg_class = 'alert alert-success';	        	
	        	$this->session->set_flashdata('msg', $msg);
				$this->session->set_flashdata('msg_class', $msg_class);
	        	redirect('InviteSpace/list_invite_space');
	        }
	        else
	        {
	        	$msg = 'Error Occure';
				$msg_class = 'alert alert-danger';
				$this->session->set_flashdata('msg', $msg);
				$this->session->set_flashdata('msg_class', $msg_clas);
	        	redirect('InviteSpace/list_invite_space');
	        }
        }
        else
        {
        	redirect('InviteSpace/create_space_view');
        }
        }

	}
}
//++++++++++++++++++++++++++++++++++++++ INDEX ++++++++++++++++++++++++++++++++++++++++++++++++
public function list_invite_space($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgsection['msg']      = $msg;
		$msgsection['msgclass'] = $msg_class;
	}
	$msgsection['all_data'] = $this->energiserdata->getInviteSpace(INVITE_SPACE);
	
	$this->load->view('admin/list_invite_space',$msgsection);
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
public function edit_invite_space($id='',$msg='',$msgclass='')
{
	$output = isNumaric($id);
	$id = $output;
	if(!empty($id) and !empty($output))
	{
		
       	$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(INVITE_SPACE,$id,'business_id');
       
       	
		$msgsection['category'] = $this->energiserdata->getFullUserDetails(CATEGORY,'event','category_type');
			
		$msgsection['get_cate_id']   = $this->energiserdata->get_pivot_category('invite_space',$msgsection['all_data'][0]['business_id']);		
		
	
		
		for($i=0; $i <count($msgsection['get_cate_id']);$i++){
			$msgsection['get_cate_val'][] = $msgsection['get_cate_id'][$i]['category_id'];
		}		
		
		
		
		$msgsection['company_details']  = $this->energiserdata->getCompanyTypeUserDetails(USER,USER_DETAILS,'C');
		$msgsection['country'] = $this->energiserdata->getCountryDetails(COUNTRY,'country_id');	
		$msgsection['opening_hour'] = $this->energiserdata->openingHourDetails($id,3);
		
		
		$business_city_id = $msgsection['all_data'][0]['city_id'];
		$msgsection['city'] = $this->energiserdata->getCountryDetails(CITY,'city_id');
		$all_data = $msgsection['all_data'];
		
		/*echo "<pre>";
		print_r($msgsection);
		exit;*/
		
		$this->load->view('admin/edit_invite_space',$msgsection);
	}
	
	else
	{
		redirect('InviteSpace','refresh');
	}
}
//++++++++++++++++++++++++++++++++++++++ INDEX ++++++++++++++++++++++++++++++++++++++++++++++++
public function update_invite_space($id)
{
	
	$flag='';
	$output = isNumaric($id);	
    $id = $output;
	if(!empty($id) and !empty($output))
	{
		$this->form_validation->set_rules('user_id', 'Comapany Name','trim|required');
		$this->form_validation->set_rules('invite_type', 'Invite Space Type','trim|required');

		if (empty($_POST['cat_id'])) {
	    $this->form_validation->set_rules('cat_id[]',"Category", "required");
		}
		$this->form_validation->set_rules('business_description','Business Description','trim|required');
		$this->form_validation->set_rules('business_website_url','Website Url Facilities','trim|required');
		$this->form_validation->set_rules('business_street','Street Name','trim|required');
		$this->form_validation->set_rules('business_postal_code','Postal Address','trim|required');
		$this->form_validation->set_rules('country_id','Country Name','trim|required');
		$this->form_validation->set_rules('city_id','City Name','trim|required');
			
			
		if( ($_POST['from_opening_hour0'] == '' || $_POST['from_opening_mint0'] == '' || $_POST['to_opening_hour0'] == '' || $_POST['to_opening_mint0'] == '') 
	&& ($_POST['from_opening_hour1'] == '' || $_POST['from_opening_mint1'] == '' || $_POST['to_opening_hour1'] == '' || $_POST['to_opening_mint1'] == '')  
	&& ($_POST['from_opening_hour2'] == '' || $_POST['from_opening_mint2'] == '' || $_POST['to_opening_hour2'] == '' || $_POST['to_opening_mint2'] == '') 
	&& ($_POST['from_opening_hour3'] == '' || $_POST['from_opening_mint3'] == '' || $_POST['to_opening_hour3'] == '' || $_POST['to_opening_mint3'] == '') 
	&& ($_POST['from_opening_hour4'] == '' || $_POST['from_opening_mint4'] == '' || $_POST['to_opening_hour4'] == '' || $_POST['to_opening_mint4'] == '') 
	&& ($_POST['from_opening_hour5'] == '' || $_POST['from_opening_mint5'] == '' || $_POST['to_opening_hour5'] == '' || $_POST['to_opening_mint5'] == '') 
	&& ($_POST['from_opening_hour6'] == '' || $_POST['from_opening_mint6'] == '' || $_POST['to_opening_hour6'] == '' || $_POST['to_opening_mint6'] == '')     )
		{
			$flag = 1;
		}
		if($flag){
			$this->form_validation->set_rules('from_opening_hour0', 'Open Hour Time is required ','required');
		}
	
			
			
			
		$post_data = $this->input->post();
		if($this->form_validation->run() == FALSE)
		{
			$msg = validation_errors();
			$msg_class = 'alert alert-danger';
			$this->edit_invite_space($id,$msg,$msg_class);
		}
		else
		{
				if(count($post_data) > 1)
				{
					$user_id = $post_data['user_id'];
					$name = $post_data['business_name'];
					$cat_id = $post_data['cat_id'];
					$website = urlToDomain($post_data['business_website_url']);
					$website = 'http://'.$website;
					$description = $post_data['business_description'];
					$city = $post_data['city_id'];
					$street = $post_data['business_street'];
					$get_lat_lng = getLatLong($street); // get_data_from Helper
					$business_latitude = $get_lat_lng['latitude'];
					$business_longitute = $get_lat_lng['longitude'];
					$postal_code = $post_data['business_postal_code'];
					$country = $post_data['country_id'];
					$invite_type = $post_data['invite_type'];
					$time = time();
					$path = "./upload/business/";
					$get_profile_pic_file_name_1 = $_FILES['business_image']['name'];
					$get_profile_pic_temp_name_1 = $_FILES['business_image']['tmp_name'];
					$get_profile_pic_file_type_1 = $_FILES['business_image']['type'];
					$get_profile_pic_file_erro_1 = $_FILES['business_image']['error'];
					$get_profile_pic_modi_name_1 = $time.'_'.$get_profile_pic_file_name_1;
					$get_profile_pic_modi_full_1 = $path.$time.'_'.$get_profile_pic_file_name_1;
					//$profile_pic_upload = move_uploaded_file($get_profile_pic_temp_name_1,$get_profile_pic_modi_full_1);
					$get_file_name_1 = $_FILES['business_banner_image']['name'];
					$get_temp_name_1 = $_FILES['business_banner_image']['tmp_name'];
					$get_file_type_1 = $_FILES['business_banner_image']['type'];
					$get_file_erro_1 = $_FILES['business_banner_image']['error'];
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
						//$delete_data_two = $this->energiserdata->delete_array(PIVOT_CATEGORY,'pivot_unique_id',$id);
						
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
				  $from_opening_hour =!empty($post_data['from_opening_hour'.$i]) ? $post_data['from_opening_hour'.$i] : 0;
				  $from_opening_mint = !empty($post_data['from_opening_mint'.$i]) ? $post_data['from_opening_mint'.$i] : 0;
				  $from_opening_indication = !empty($post_data['from_opening_indication'.$i]) ? $post_data['from_opening_indication'.$i] : 0;
				  $to_opening_hour = !empty($post_data['to_opening_hour'.$i]) ? $post_data['to_opening_hour'.$i] : 0;
				  $to_opening_mint = !empty($post_data['to_opening_mint'.$i]) ? $post_data['to_opening_mint'.$i] : 0;
				  $to_opening_indication = !empty($post_data['to_opening_indication'.$i]) ? $post_data['to_opening_indication'.$i] : 0;
				  if(isset($post_data['opening_hour_close'.$i]) && !empty($post_data['opening_hour_close'.$i]) ){
					 $opening_hour_close = $post_data['opening_hour_close'.$i];
				  }
				  else{
					$opening_hour_close = 0;
				  }
				  if(isset($post_data['from_opening_hour'.$i]) && ($post_data['from_opening_hour'.$i]!= '') ){
					$from_hour = $from_opening_hour.'-'.$from_opening_mint.'-'.$from_opening_indication;
				  }
				  else{
						$from_hour = 0;
					  }
				  if(isset($post_data['to_opening_hour'.$i]) && ($post_data['to_opening_hour'.$i]!= '') ){
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
					redirect('InviteSpace/list_invite_space','refresh');
			}
					$this->list_invite_space($msgsection['msg'],$msgsection['msg_class']);
		}
	
	}
		
}



//+++++++++++++++++++++++++++++++++++++++++++++ DELETE INVITE SPACE +++++++++++++++++++++++++++++++++//
public function delete_invite_space($id)
{
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
				redirect('InviteSpace/list_invite_space','refresh');
				
				
		}
		else{
				$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(INVITE_SPACE,$this->session->userdata('user_id'),'user_id');
				
				redirect('InviteSpace/list_invite_space','refresh');
			}
}

//+++++++++++++++++++++++++++++++++++++++++++++ DELETE INVITE SPACE +++++++++++++++++++++++++++++++++//


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




//+++++++++++++++++++++++++++++++++++++++ LIST ENERGISER +++++++++++++++++++++++++++++++++//
public function list_energiser($msg='',$msg_class='')
{
	
	//$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msg_class'] = $msg_class;
	}	
	$msgsection['all_data'] = $this->energiserdata->getInviteSpace(ENERGISER);
	$this->load->view('admin/list_energiser',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ LIST ENERGISER +++++++++++++++++++++++++++++++++//





//+++++++++++++++++++++++++++++++++++++++ LIST ENERGISER STATISTICS+++++++++++++++++++++++++++++++++//
public function list_energiser_statistics()
{
	$msgsection['all_data'] = $this->energiserdata->getInviteSpace(ENERGISER);
	$this->load->view('admin/list_energiser_statistics',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ LIST ENERGISER STATISTICS+++++++++++++++++++++++++++++++++//



//+++++++++++++++++++++++++++++++++++++++ LIST ENERGISER JOINED USER+++++++++++++++++++++++++++++++++//
public function list_energiser_joined_user($energizer_id)
{
	$user_details['user_details'] = $this->energiserdata->getViewEnergizerJoinedPeople($energizer_id);
	$user_details['energizer_id'] = $energizer_id;
	$this->load->view('admin/list_energiser_joined_user',$user_details);
}
//+++++++++++++++++++++++++++++++++++++++ LIST ENERGISER JOINED USER+++++++++++++++++++++++++++++++++//





//+++++++++++++++++++++++++++++++++++++++ LIST CSV +++++++++++++++++++++++++++++++++//
public function list_csv($space_id = '',$msg='',$msg_class='')
{
	
	//$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
	if(!empty($msg))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msg_class'] = $msg_class;
	}
	$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(ERERGISER_CSV,$space_id,'space_id');
	$msgsection['space_id'] = $space_id;
	$this->load->view('admin/list_csv',$msgsection);
}
//+++++++++++++++++++++++++++++++++++++++ LIST CSV +++++++++++++++++++++++++++++++++//

//+++++++++++++++++++++++++++++++++++++++ DELETE CSV +++++++++++++++++++++++++++++++++//
public function delete_csv($id,$energiser_id='')
{
	
		$id = base64_decription($id);	
		//$this->error_validation_session_check();//IF  User is Not Login then anyone not entire any function
		if($id != '')
		{
			$delete_data = $this->energiserdata->DeleteDatas(ERERGISER_CSV,$id,'id');			
			if(!empty($delete_data)){
			$msg = 'Delete Successfully';
			$msg_class = 'alert alert-success';
			}
			else{
				 $msg = 'Error';
				$msg_class = 'alert alert-danger';
				}			
				$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(ENERGISER,$this->session->userdata('user_id'),'user_id');
				
				$this->session->set_flashdata('msg', $msg);
				$this->session->set_flashdata('msg_class', $msg_class);
				redirect('InviteSpace/list_csv/'.$energiser_id,'refresh');
		}
		
}

//+++++++++++++++++++++++++++++++++++++++ DELETE CSV +++++++++++++++++++++++++++++++++//


//++++++++++++++++++++++++++++++++++++++ ENERGISER ADD ++++++++++++++++++++++++++++++++++++++++++++++++
public function add_energiser($msg='',$msg_class='')
{
	if(!empty($msg) and !empty($msg_class))
	{
		$msgsection['msg'] = $msg;
		$msgsection['msg_class'] = $msg_class;
	}
	$msgsection['category'] = $this->energiserdata->getFullUserDetails(CATEGORY,'event','category_type');	
	$msgsection['country'] = $this->energiserdata->getCountryDetails(COUNTRY,'country_id');
	$msgsection['timezone'] = $this->energiserdata->getFieldDetails(TIMEZONE);
	$msgsection['company_details']  = $this->energiserdata->getCompanyTypeUserDetails(USER,USER_DETAILS,'C');
	$msgsection['invite_space']   = $this->energiserdata->getInviteSpace(INVITE_SPACE);
	$this->load->view('admin/add_energiser',$msgsection);
}
//++++++++++++++++++++++++++++++++++++++ ENERGISER ADD ++++++++++++++++++++++++++++++++++++++++++++++++


//+++++++++++++++++++++++++++++++ INSERT ENERGISER +++++++++++++++++++++++++++++++++++++++++

public function insert_energiser()
{


	$this->form_validation->set_rules('trainer_class_name', 'Energizer Name','required');
	$this->form_validation->set_rules('trainer_class_description','Energizer Description','required');
	$this->form_validation->set_rules('cat_id[]','Category','required');
	$this->form_validation->set_rules('city_id','City Name','required');
	//$this->form_validation->set_rules('trainer_class_image','Class Image','required');
	$this->form_validation->set_rules('country_id','Country Name','required');
	$this->form_validation->set_rules('trainer_class_address','Address','required');
	$this->form_validation->set_rules('trainer_class_price','Energizer price','required');
	$this->form_validation->set_rules('space_id','Space For Energizer','required');
	$this->form_validation->set_rules('class_no_of_booking','No of Booking','required');

	/*$flag='';

	if( ($_POST['from_opening_hour0'] == '' || $_POST['from_opening_mint0'] == '' || $_POST['to_opening_hour0'] == '' || $_POST['to_opening_mint0'] == '') 
	&& ($_POST['from_opening_hour1'] == '' || $_POST['from_opening_mint1'] == '' || $_POST['to_opening_hour1'] == '' || $_POST['to_opening_mint1'] == '')  
	&& ($_POST['from_opening_hour2'] == '' || $_POST['from_opening_mint2'] == '' || $_POST['to_opening_hour2'] == '' || $_POST['to_opening_mint2'] == '') 
	&& ($_POST['from_opening_hour3'] == '' || $_POST['from_opening_mint3'] == '' || $_POST['to_opening_hour3'] == '' || $_POST['to_opening_mint3'] == '') 
	&& ($_POST['from_opening_hour4'] == '' || $_POST['from_opening_mint4'] == '' || $_POST['to_opening_hour4'] == '' || $_POST['to_opening_mint4'] == '') 
	&& ($_POST['from_opening_hour5'] == '' || $_POST['from_opening_mint5'] == '' || $_POST['to_opening_hour5'] == '' || $_POST['to_opening_mint5'] == '') 
	&& ($_POST['from_opening_hour6'] == '' || $_POST['from_opening_mint6'] == '' || $_POST['to_opening_hour6'] == '' || $_POST['to_opening_mint6'] == '')     )
		{
			$flag = 1;
		}
		if($flag){
			$this->form_validation->set_rules('from_opening_hour0', 'Open Hour Time is required ','required');
		}*/



	$post_data = $this->input->post();//Global array variable
	 
	

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
			$city = $post_data['city_id'];
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

			$country = $post_data['country_id'];
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
			  'user_id' 					=> get_company_id($post_data['space_id']),
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
		  $from_opening_hour =!empty($post_data['from_opening_hour'.$i]) ? $post_data['from_opening_hour'.$i] : 0;
		  $from_opening_mint = !empty($post_data['from_opening_mint'.$i]) ? $post_data['from_opening_mint'.$i] : 0;
		  $from_opening_indication = !empty($post_data['from_opening_indication'.$i]) ? $post_data['from_opening_indication'.$i] : 0;
		  $to_opening_hour = !empty($post_data['to_opening_hour'.$i]) ? $post_data['to_opening_hour'.$i] : 0;
		  $to_opening_mint = !empty($post_data['to_opening_mint'.$i]) ? $post_data['to_opening_mint'.$i] : 0;
		  $to_opening_indication = !empty($post_data['to_opening_indication'.$i]) ? $post_data['to_opening_indication'.$i] : 0;
		  if(isset($post_data['opening_hour_close'.$i]) && !empty($post_data['opening_hour_close'.$i]) ){
			 $opening_hour_close = $post_data['opening_hour_close'.$i];
		  }
		  else{
			$opening_hour_close = 0;
		  }
		  if(isset($post_data['from_opening_hour'.$i]) && ($post_data['from_opening_hour'.$i] != '') ){
			$from_hour = $from_opening_hour.'-'.$from_opening_mint.'-'.$from_opening_indication;
		  }
		  else{
				$from_hour = 0;
			  }
		  if(isset($post_data['to_opening_hour'.$i]) && ($post_data['to_opening_hour'.$i]!= '') ){
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
			$msg = 'Energiser Succefully Created';
			$msg_class = 'alert alert-success';
		}
		else
		{
			$msg = 'Error Occure';
			$msg_class = 'alert alert-danger';
		}
		
			$this->session->set_flashdata('msg', $msg);
			$this->session->set_flashdata('msg_class', $msg_class);
			redirect('InviteSpace/list_energiser','refresh');
	}
	}
}

//+++++++++++++++++++++++++++++++ INSERT ENERGISER +++++++++++++++++++++++++++++++++++++++++


//+++++++++++++++++++++++++++++++++++++++ EDIT ENERGISER +++++++++++++++++++++++//
public function edit_energiser($id='',$msg='',$msg_class='')
{
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
		
		$msgsection['opening_hour'] = $this->energiserdata->openingHourDetails($id,4);
		
		/*
		echo "<pre>";
		echo $this->db->last_query();
		print_r($msgsection['opening_hour']);
		exit;
		*/
		
		$business_city_id = $msgsection['all_data'][0]['city_id'];
		$msgsection['city'] = $this->energiserdata->getCountryDetails(CITY,'city_id');
		$all_data = $msgsection['all_data'];
		$member_id = $all_data[0]['trainer_class_id'];
		$msgsection['allEvent'] = $this->energiserdata->getFullUserDetails('cmd_invitespace',$this->session->userdata('user_id'),'user_id');
		$msgsection['invite_space']   = $this->energiserdata->getInviteSpace(INVITE_SPACE);
	//die;
	if($id != $member_id || $id == '')
	{
		$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(ENERGISER,$this->session->userdata('user_id'),'user_id');
	$this->load->view('dashboard/my-class',$msgsection);
	}//If Url Data is Not Matched
	$this->load->view('admin/edit_energiser',$msgsection);
}

//+++++++++++++++++++++++++++++++++++++++ Update Energiser +++++++++++++++++++++++++++++++++//
public function update_energiser($id)
{
	
	$flag='';
	$this->form_validation->set_rules('trainer_class_name', 'Trainer Class Name','required');
	$this->form_validation->set_rules('trainer_class_description','Trainer Class Description','required');
	$this->form_validation->set_rules('cat_id[]','Business Category','required');
	$this->form_validation->set_rules('trainer_class_website_url','Trainer Class website','required');
	$this->form_validation->set_rules('city_id','City Name','required');
	$this->form_validation->set_rules('country_id','Country Name','required');
	$this->form_validation->set_rules('trainer_class_address','Class Address','required');
	$this->form_validation->set_rules('class_no_of_booking','No of Booking','required');
	$this->form_validation->set_rules('space_id','Space For Clases','required');
	$this->form_validation->set_rules('trainer_class_price','Energizer Price','required');
	
	
	/*if( ($_POST['from_opening_hour0'] == '' || $_POST['from_opening_mint0'] == '' || $_POST['to_opening_hour0'] == '' || $_POST['to_opening_mint0'] == '') 
	&& ($_POST['from_opening_hour1'] == '' || $_POST['from_opening_mint1'] == '' || $_POST['to_opening_hour1'] == '' || $_POST['to_opening_mint1'] == '')  
	&& ($_POST['from_opening_hour2'] == '' || $_POST['from_opening_mint2'] == '' || $_POST['to_opening_hour2'] == '' || $_POST['to_opening_mint2'] == '') 
	&& ($_POST['from_opening_hour3'] == '' || $_POST['from_opening_mint3'] == '' || $_POST['to_opening_hour3'] == '' || $_POST['to_opening_mint3'] == '') 
	&& ($_POST['from_opening_hour4'] == '' || $_POST['from_opening_mint4'] == '' || $_POST['to_opening_hour4'] == '' || $_POST['to_opening_mint4'] == '') 
	&& ($_POST['from_opening_hour5'] == '' || $_POST['from_opening_mint5'] == '' || $_POST['to_opening_hour5'] == '' || $_POST['to_opening_mint5'] == '') 
	&& ($_POST['from_opening_hour6'] == '' || $_POST['from_opening_mint6'] == '' || $_POST['to_opening_hour6'] == '' || $_POST['to_opening_mint6'] == '')     )
		{
			$flag = 1;
		}
		if($flag){
			$this->form_validation->set_rules('from_opening_hour0', 'Open Hour Time is required ','required');
		}*/
	
	
	
	
	
	
	$post_data = $this->input->post();//Global array variable

	
	if($this->form_validation->run() == FALSE)
	{
		$msg = validation_errors();
		$msg_class = 'alert-danger';
		$this->edit_energiser($id,$msg,$msg_class);
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
				redirect('InviteSpace/edit_energiser/'.$id,'refresh');
				
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
		        $fromName = "No Of Booking Increased | Club Mondain";
		        $this->email->from('vitalityincongress@clubmondain.com','No Of Booking Increased | Club Mondain');
				$this->email->to($all_email_this_space[$i]['email']);  
				
									        
				$res = array('name'=> $all_email_this_space[$i]['name'],'email'=>$all_email_this_space[$i]['email'],'user_phone'=> $all_email_this_space[$i]['phone'],'token'=>$all_email_this_space[$i]['token'],'link'=>base_url().'CheckUser/'.'registered'.'/'. base64_encode($post_data['space_id']).'/'.base64_encode($all_email_this_space[$i]['email']).'/'.base64_encode($all_email_this_space[$i]['id']), 'trainer_class_name' =>$post_data['trainer_class_name'],'new_no_of_booking'=> $class_no_of_booking, 'exist_space_size' => $exist_space_size);
				
				
				$mesg = $this->load->view('template/mailer_template',$res,true);
		        $this->email->subject('No Of Booking Increased | Club Mondain');	
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
			$city = $post_data['city_id'];
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

			$country = $post_data['country_id'];
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
			  'user_id' 					=> get_company_id($space_id),
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
		  $from_opening_hour =!empty($post_data['from_opening_hour'.$i]) ? $post_data['from_opening_hour'.$i] : 0;
		  $from_opening_mint = !empty($post_data['from_opening_mint'.$i]) ? $post_data['from_opening_mint'.$i] : 0;
		  $from_opening_indication = !empty($post_data['from_opening_indication'.$i]) ? $post_data['from_opening_indication'.$i] : 0;
		  $to_opening_hour = !empty($post_data['to_opening_hour'.$i]) ? $post_data['to_opening_hour'.$i] : 0;
		  $to_opening_mint = !empty($post_data['to_opening_mint'.$i]) ? $post_data['to_opening_mint'.$i] : 0;
		  $to_opening_indication = !empty($post_data['to_opening_indication'.$i]) ? $post_data['to_opening_indication'.$i]: 0;
		  if(isset($post_data['opening_hour_close'.$i]) && !empty($post_data['opening_hour_close'.$i]) ){
			 $opening_hour_close = $post_data['opening_hour_close'.$i];
		  }
		  else{
			$opening_hour_close = 0;
		  }
		  if(isset($post_data['from_opening_hour'.$i]) && ($post_data['from_opening_hour'.$i] != '') ){
			$from_hour = $from_opening_hour.'-'.$from_opening_mint.'-'.$from_opening_indication;
		  }
		  else{
				$from_hour = 0;
			  }
		  if(isset($post_data['to_opening_hour'.$i]) && ($post_data['to_opening_hour'.$i]!= '') ){
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
			redirect('InviteSpace/list_energiser','refresh');
	}
			$this->list_class_view($msgsection['msg'],$msgsection['msg_class']);
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
			redirect('InviteSpace/list_invite_space');
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
		redirect('InviteSpace/list_csv/'.$space_id,'refresh');
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
			$msg = 'User successfully updated';
			$msg_class = 'alert alert-success';
		}
		else
		{
			$msg = 'Error';
			$msg_class = 'alert alert-danger';
		}			
			
		$this->session->set_flashdata('msg', $msg);
		$this->session->set_flashdata('msg_class', $msg_class);
		redirect('InviteSpace/list_csv/'.$energiser_id,'refresh');
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
			
			
								        
			$data = array('name'=> $result->name,'email'=> $result->email,'user_phone'=> $result->phone,'token'=>$result->token,'link'=>base_url().'CheckUser/'.'registered'.'/'.$space_id.'/'.base64_encode($result->email).'/'.$csv_id,'stie_email' => $admin_setting[0]['site_email'],'address' => $admin_setting[0]['address'], 'phone' => $admin_setting[0]['phone_no'],'invite_msg' =>'');
			
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
			redirect('InviteSpace/list_csv/'.base64_decode($space_id),'refresh');
		}

/////////////// Mail Sent To CSV USER////////////



///////////////DELETE ENERGISER////////////////////

public function delete_energiser($id)
{
	
		if($id != '')
		{
			//
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
				redirect('InviteSpace/list_energiser','refresh');
		}
		else{
				$msgsection['all_data'] = $this->energiserdata->getFullUserDetails(ENERGISER,$this->session->userdata('user_id'),'user_id');
				
				$this->session->set_flashdata('msg', $msg);
				$this->session->set_flashdata('msg_class', $msg_class);	
				redirect('InviteSpace/list_energiser','refresh');
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


//END CLASS
}
