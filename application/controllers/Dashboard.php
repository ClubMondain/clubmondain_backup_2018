<?php
class Dashboard extends CI_Controller
{

	private $__get_old_password;
	private $__get_new_password;
	private $__data;
	private $__dataArray      = array();
	private $__dataArray_One  = array();
	private $__dataArray_Two  = array();
	private $__dataArray_Four = array();
	private $__settingArray = array();
	private $__all_data     = array();

//++++++++++++++++++++++++++++++++++++++ CONSTRUCTUR CALLING ++++++++++++++++++++++++++++++++++
	public function __construct()
	{
		parent::__construct();
		$this->getSessionValidate();
		$this->load->model('Dashboards','dashs');

	}
//++++++++++++++++++++++++++++++++++++++ SESSION CHECK ++++++++++++++++++++++++++++++++++
	public function getSessionValidate()
	{
		$this->__session_details = $this->session->all_userdata();
		if(!isset($this->__session_details['admin_login']))
		{
			redirect('Admin','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++ INDEX ++++++++++++++++++++++++++++++++++
	public function index()
	{
		$getCurrentDate = currentDate('Y-m-d');
		$getMonthSEDate = currentMonthFEDate();

		$blockData['total_user']   = $this->dashs->get_sql_count("SELECT * FROM ".USER."");
		$blockData['member_user']  = $this->dashs->get_sql_count("SELECT * FROM ".USER." WHERE user_type='M'");
		$blockData['trainer_user'] = $this->dashs->get_sql_count("SELECT * FROM ".USER." WHERE user_type='T'");
		$blockData['company_user'] = $this->dashs->get_sql_count("SELECT * FROM ".USER." WHERE user_type='C'");
		$blockData['total_space'] = $this->dashs->get_sql_count("SELECT * FROM ".EVENT."");
		$blockData['toatl_event'] = $this->dashs->get_sql_count("SELECT * FROM ".BUSINESS."");

		$blockData['bt_count_c'] = $this->dashs->get_sql_count("SELECT * FROM ".USER." WHERE user_type='M' AND create_date='".$getCurrentDate."'");
		$blockData['bt_count_s'] = $this->dashs->get_sql_count("SELECT * FROM ".USER." WHERE user_type='M' AND create_date
			BETWEEN '".$getMonthSEDate[0]."' AND '".$getMonthSEDate[1]."' ");

		$blockData['tu_count_c'] = $this->dashs->get_sql_count("SELECT * FROM ".USER." WHERE user_type='T' AND create_date='".$getCurrentDate."'");
		$blockData['tu_count_s'] = $this->dashs->get_sql_count("SELECT * FROM ".USER." WHERE user_type='T' AND create_date
			BETWEEN '".$getMonthSEDate[0]."' AND '".$getMonthSEDate[1]."' ");

		$blockData['cu_count_c'] = $this->dashs->get_sql_count("SELECT * FROM ".USER." WHERE user_type='C' AND create_date='".$getCurrentDate."'");
		$blockData['cu_count_s'] = $this->dashs->get_sql_count("SELECT * FROM ".USER." WHERE user_type='C' AND create_date
			BETWEEN '".$getMonthSEDate[0]."' AND '".$getMonthSEDate[1]."' ");

		$blockData['total_user_c']   = $this->dashs->get_sql_count("SELECT * FROM ".USER." WHERE create_date='".$getCurrentDate."'");
		$blockData['total_user_s']   = $this->dashs->get_sql_count("SELECT * FROM ".USER." WHERE create_date
			BETWEEN '".$getMonthSEDate[0]."' AND '".$getMonthSEDate[1]."'");

		$this->load->view('admin/dashboard',$blockData);
	}
//++++++++++++++++++++++++++++++++++++++ INDEX ++++++++++++++++++++++++++++++++++
//CHANGE PASSWORD START
	public function change_password_view($msg='',$msg_class='')
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$msgSection['msg'] = $msg;
			$msgSection['msg_class'] = $msg_class;
			$this->load->view('admin/change_password',$msgSection);
		}else{
			$this->load->view('admin/change_password');
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function change_password_update()
	{

		$this->form_validation->set_rules('admin_pwd_old','Old Password','required');
		$this->form_validation->set_rules('admin_pwd_new','New Password','required|min_length[8]|alpha_numeric');

		if($this->form_validation->run() == FALSE)
		{
			$msg = validation_errors();
			$msg_class= "alert-danger";
			$this->change_password_view($msg,$msg_class);

		}else{

			$this->__get_old_password = $this->input->post('admin_pwd_old',true);
			$this->__get_new_password = $this->input->post('admin_pwd_new',true);

			if(!empty($this->__get_old_password) and !empty($this->__get_new_password))
			{

				$this->__get_old_password = trimData($this->__get_old_password);
				$this->__get_old_password = stripslashesData($this->__get_old_password);
				$this->__get_old_password = escape_str($this->__get_old_password);
				$this->__get_old_password = $this->security->xss_clean($this->__get_old_password);

				$this->__get_new_password = trimData($this->__get_new_password);
				$this->__get_new_password = stripslashesData($this->__get_new_password);
				$this->__get_new_password = escape_str($this->__get_new_password);
				$this->__get_new_password = $this->security->xss_clean($this->__get_new_password);

				$this->__data = $this->dashs->change_passwords(USER,$this->__get_old_password,$this->__get_new_password);

				if($this->__data == FALSE)
				{
					$msg = 'Password Not Matched';
					$msg_class = 'alert-danger';
				}else{
					$msg = 'You have succefully changed password';
					$msg_class = 'alert-success';
				}
				$this->change_password_view($msg,$msg_class);
			}else{
				$msg = 'The filds are required';
				$msg_class = 'alert-danger';
				$this->change_password_view($msg,$msg_class);
			}

		}
	}
//CHANGE PASSWORD END
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//PROFILE START
	public function profile_view($custome_msg='',$custome_msg_class='')
	{
		if(!empty($custome_msg) and !empty($custome_msg_class))
		{
			$msg['msg'] = $custome_msg;
			$msg['msg_class'] = $custome_msg_class;
		}

		$msg['admin_deatils'] = $this->dashs->get_full_admin_details(1);
		$this->load->view('admin/profile',$msg);
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function profile_update()
	{
		$this->form_validation->set_rules('admin_email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('first_name','First Name','required');
		$this->form_validation->set_rules('last_name','Last Name','required');

		if($this->form_validation->run() == FALSE)
		{
			$msg = validation_errors();
			$msg_class= "alert-danger";
			$this->profile_view($msg,$msg_class);

		}else{

			$post_data = $this->input->post();
			if(count($post_data) > 0)
			{
				foreach($post_data as $key=>$value)
				{
					$this->__dataArray[$key] = $this->security->xss_clean(escape_str($value));
				}
				$insertDataReturn = $this->dashs->adminDataUpdate(USER,USER_DETAILS,$this->__dataArray);
				if($insertDataReturn != FALSE){
					$msg = "You have succefully updated profile";
					$msg_class = "alert-success";
				}else{
					$msg = "OPPS !! Something went wrong. PLease Try after some time";
					$msg_class= "alert-danger";
				}
				$this->profile_view($msg,$msg_class);
			}else{
				$this->profile_view();
			}
		}
	}
//PROFILE END
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//SETTING START
	public function setting_view($msg='',$msg_class='')
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$msgSection['msg'] = $msg;
			$msgSection['msg_class']= $msg_class;
		}
		$msgSection['admin_setting'] = $this->dashs->get_admin_setting(SETTING,1);
		$this->load->view('admin/setting',$msgSection);
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function setting_update()
	{
		$get_site_email = $this->input->post('site_email');

		if(isset($get_site_email) and !empty($get_site_email)){

			$post_data = $this->input->post();

			if(count($post_data) > 0)
			{
				foreach($post_data as $key=>$value)
				{
					$this->__settingArray[$key] = $this->security->xss_clean(escape_str($value));
				}
				$insertDataReturn = $this->dashs->adminSettingDataUpdate(SETTING,$this->__settingArray);
				if($insertDataReturn)
				{
					$msg = 'You have succefully updated setting';
					$msg_class = 'alert-success';
				}
				else
				{
					$msg = 'OPPS !! Something went wrong. PLease Try after some time';
					$msg_class = 'alert-danger';
				}
				$this->setting_view($msg,$msg_class);
			}
			else
			{
				$this->setting_view();
			}
		}else{
			$this->setting_view();
		}
	}
//SETTING END
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//CONTENT START
	public function create_content_view($msg='',$msg_class='')
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$msgSection['msg'] = $msg;
			$msgSection['msg_class']= $msg_class;
			$this->load->view('admin/content',$msgSection);
		}else{
			$this->load->view('admin/content');
		}

	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function insert_content()
	{
		$this->form_validation->set_rules('page_name', 'Page Name','required');
		$this->form_validation->set_rules('page_title', 'Title','required');
		$this->form_validation->set_rules('page_description','Description','required');
		$this->form_validation->set_rules('content_status','Status','required');

		if($this->form_validation->run() == FALSE)
		{
			$msg = validation_errors();
			$msg_class = 'alert-danger';
			$this->create_content_view($msg,$msg_class);
		}
		else
		{

			$post_data = $this->input->post();

			if(count($post_data) > 0)
			{
				foreach($post_data as $key=>$value)
				{
					$this->__dataArray[$key] = $this->security->xss_clean(escape_str($value));
				}
				$status = $this->dashs->insert_array(CONTENT,$this->__dataArray);
				if($status != FALSE){
					$msg = 'Content created succefully';
					$msg_class = 'alert-success';
				}else{
					$msg = 'OPPS !! Something went wrong. PLease Try after some time';
					$msg_class = 'alert-danger';
				}
			}
			redirect('Dashboard/list-content-view','refresh');
	//$this->list_content_view($msg,$msg_class);
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function list_content_view($msg='',$msg_class='')
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$listmember['msg'] = $msg;
			$listmember['msg_class'] = $msg_class;
		}
		$listmember['all_members'] = $this->dashs->getFullDetails(CONTENT);
		$this->load->view('admin/list_content',$listmember);
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function edit_content_view($id='',$msg='',$msg_class='')
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
			$msgSection['all_members'] = $this->dashs->getListDatas(CONTENT,'content_id',$id);
			if($msgSection['all_members'] == FALSE)
			{
				redirect('Dashboard','refresh');

			}else{
				$this->load->view('admin/edit_content',$msgSection);
			}
		}
		else
		{
			redirect('Dashboard','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function update_content($id)
	{
		$output = isNumaric($id);
		$id = $output;
		if(!empty($id) and !empty($output))
		{

			$this->form_validation->set_rules('page_name', 'Page Name','required');
			$this->form_validation->set_rules('page_title', 'Title','required');
			$this->form_validation->set_rules('page_description','Description','required');
			$this->form_validation->set_rules('content_status','Status','required');

			if($this->form_validation->run() == FALSE)
			{
				$msg = validation_errors();
				$msg_class = 'alert-danger';
				$this->edit_content_view($id,$msg,$msg_class);
			}
			else
			{
				$post_data = $this->input->post();
				if(count($post_data) > 0 )
				{

					foreach($post_data as $key=>$value)
					{
						$this->__dataArray[$key] = $value;
					}

					$updatedatareturn = $this->dashs->update_array($this->__dataArray,$id,CONTENT,'content_id');

				}
				if($updatedatareturn){
					$msg ='You have succefully updated content';
					$msgclass = 'alert-success';
				}
				else{
					$msg = 'OPPS !! Something went wrong. Please try after some time';
					$msgclass = 'alert-danger';
				}
				redirect('Dashboard/list-content-view','refresh');
	//$this->list_content_view($msg,$msgclass);
			}
		}else{
			redirect('Dashboard','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function delete_content($id)
	{
		$output = isNumaric($id);
		$id = $output;
		if(!empty($id) and !empty($output)){
			$delete_data = $this->dashs->delete_array(CONTENT,'content_id',$id);
			if($delete_data){
				$msg = 'Delete successfully';
				$msg_class = 'alert-success';
			}else{
				$msg = 'OPPS !! Something went wrong. Please try after some time';
				$msg_class = 'alert-danger';
			}
			redirect('Dashboard/list-content-view','refresh');
	//$this->list_content_view($msg,$msg_class);
		}else{
			redirect('Dashboard','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//NEWS START
	public function create_news_view($msg='',$msg_class='')
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$msgSection['msg'] = $msg;
			$msgSection['msg_class'] = $msg_class;
		}
		$msgSection['news_category'] = $this->dashs->getCatagoryDetails(CATEGORY,'news');
		$msgSection['countries']     = $this->dashs->getFullDetails(COUNTRY);
		$this->load->view('admin/news',$msgSection);

	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function insert_news()
	{
		$this->form_validation->set_rules('news_heading', 'News Heading','required');
		$this->form_validation->set_rules('news_cate_id_FK[]','News Category','required');
		$this->form_validation->set_rules('news_description','News Description','required');
		$this->form_validation->set_rules('news_date','News Date','required');
		$this->form_validation->set_rules('news_address','News Address','required');
		$this->form_validation->set_rules('country_id_FK','News Country','required');
		$this->form_validation->set_rules('city_id_FK','Event City','required');
		$this->form_validation->set_rules('news_status','Event Status','required');

		if($this->form_validation->run() == FALSE)
		{
			$msg = validation_errors();
			$msg_class = 'alert-danger';
			$this->create_news_view($msg,$msg_class);
		}
		else
		{
			$post_data = $this->input->post();

			if(count($post_data) > 0){
		//______________________________________________________________
				$news_heading        = $this->security->xss_clean(escape_str($post_data['news_heading']));
				$news_cate_id_FK     = $this->security->xss_clean(escape_str($post_data['news_cate_id_FK']));
				$news_description    = $this->security->xss_clean($post_data['news_description']);
				$news_date           = $this->security->xss_clean(escape_str($post_data['news_date']));
				$news_address        = $this->security->xss_clean(escape_str($post_data['news_address']));
				$country_id_FK       = $this->security->xss_clean(escape_str($post_data['country_id_FK']));
				$city_id_FK          = $this->security->xss_clean(escape_str($post_data['city_id_FK']));
				$news_fb_link        = $this->security->xss_clean(escape_str($post_data['news_fb_link']));
				$news_twitter_link   = $this->security->xss_clean(escape_str($post_data['news_twitter_link']));
				$news_instagram_link = $this->security->xss_clean(escape_str($post_data['news_instagram_link']));
				$news_status         = $this->security->xss_clean(escape_str($post_data['news_status']));
		//______________________________________________________________

				$config['upload_path'] = 'upload/news_blog/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['overwrite'] = FALSE;
				$config['remove_spaces'] = TRUE;
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);

				if(!empty($_FILES['img_upload']['name'])){
					if($this->upload->do_upload('img_upload')){
						$fileName = $this->upload->file_name;
					}else{
						$fileName = '';
					}
				}else{
					$fileName = '';
				}

		//______________________________________________________________
				$this->__all_data = array
				(
					'user_id'                  => 1,
					'country_id'               => $country_id_FK,
					'city_id'                  => $city_id_FK,
					'blog_news_title'          => $news_heading,
					'blog_news_description'    => $news_description,
					'blog_news_image'          => $fileName,
					'create_date'              => date('Y-m-d'),
					'update_date'              => date('Y-m-d'),
					'blog_news_address'        => $news_address,
					'blog_news_fb_link'        => $news_fb_link,
					'blog_news_twitter_link'   => $news_twitter_link,
					'blog_news_instagram_link' => $news_instagram_link,
					'blog_news_status'         => $news_status,
					'blog_news_type'           => 'news',

					);
				$insert_data_return = $this->dashs->insert_array(BLOG_NEWS,$this->__all_data);
				if($insert_data_return)
				{
					if( !empty($news_cate_id_FK) && count($news_cate_id_FK) > 0 )
					{

						foreach($news_cate_id_FK as $newsSingle)
						{

							$news_cate_pivot[]  = array ('category_id' => $newsSingle ,'pivot_unique_id' => $insert_data_return ,'category_type' => 'news');
						}

						$insert_data_return = $this->dashs->insert_array_batch(PIVOT_CATEGORY,$news_cate_pivot);

						if($insert_data_return){

							$msg = 'Event created succefully';
							$msg_class = 'alert-success';

						}else{

							$msg = 'OPPS !! Something went wrong. Please try after some time';
							$msg_class = 'alert-danger';
						}
						redirect('Dashboard/list-news-view');
					}
				}
				else
				{
					$msg = 'OPPS !! Something went wrong. Please try after some time';
					$msg_class = 'alert-danger';
					redirect('Dashboard/list-news-view');
				}

		//$this->list_news_view($msg,$msg_class);
			}else{
				redirect('Dashboard/list-news-view');
			}
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function list_news_all()
	{
		$msgsection['all_members'] = $this->dashs->get_news_blog_full(BLOG_NEWS,COUNTRY,CITY,'news');
		$this->load->view('admin/list_all_news',$msgsection);
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function list_blog_all()
	{
		$msgsection['all_members'] = $this->dashs->get_news_blog_full(BLOG_NEWS,COUNTRY,CITY,'blog');
		$this->load->view('admin/list_all_blog',$msgsection);
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function list_news_view($msg='',$msg_class='')
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$msgsection['msg']       = $msg;
			$msgsection['msg_class'] = $msg_class;
		}
		$msgsection['all_members'] = $this->dashs->get_news_full_admin(BLOG_NEWS,COUNTRY,CITY,1);
		$this->load->view('admin/list_news',$msgsection);
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function edit_news_view($id='',$msg='',$msg_class='')
	{
		$output = isNumaric($id);
		$id     = $output;
		if(!empty($id) and !empty($output))
		{
			if(!empty($msg) and !empty($msg_class))
			{
				$msgSection['msg'] = $msg;
				$msgSection['msg_class']= $msg_class;
			}
			$msgSection['news'] = $this->dashs->getListDatas(BLOG_NEWS,'blog_news_id',$id);
			if($msgSection['news'] == FALSE)
			{
				redirect('Dashboard','refresh');
			}else{
				$msgSection['news_category'] = $this->dashs->getCatagoryDetails(CATEGORY,'news');
				$msgSection['countries']     = $this->dashs->getFullDetails(COUNTRY);
				$msgSection['citydata']      = $this->dashs->get_ajax_city($msgSection['news'][0]['country_id']);
				$msgSection['get_cate_id']   = $this->dashs->getBlogCategoryList($msgSection['news'][0]['blog_news_id']);
				$this->load->view('admin/edit_news',$msgSection);
			}
		}
		else
		{
			redirect('Dashboard','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function update_news($id)
	{
		$insert_data_return = '';

		$this->form_validation->set_rules('news_heading', 'News Heading','required');
		$this->form_validation->set_rules('news_cate_id_FK[]','News Category','required');
		$this->form_validation->set_rules('news_description','News Description','required');
		$this->form_validation->set_rules('news_date','News Date','required');
		$this->form_validation->set_rules('news_address','News Address','required');
		$this->form_validation->set_rules('country_id_FK','News Country','required');
		$this->form_validation->set_rules('city_id_FK','Event City','required');
		$this->form_validation->set_rules('news_status','Event Status','required');

		if($this->form_validation->run() == FALSE)
		{
			$msg = validation_errors();
			$msg_class = 'alert-danger';
			$this->edit_news_view($id,$msg,$msg_class);
		}
		else
		{
			$post_data = $this->input->post();
			if(count($post_data) > 0){
		//______________________________________________________________
				$news_heading     = $this->security->xss_clean(escape_str($post_data['news_heading']));
				$news_cate_id_FK  = $this->security->xss_clean(escape_str($post_data['news_cate_id_FK']));
				$news_description = $this->security->xss_clean($post_data['news_description']);
				$news_date        = $this->security->xss_clean(escape_str($post_data['news_date']));
				$news_address     = $this->security->xss_clean(escape_str($post_data['news_address']));
				$country_id_FK    = $this->security->xss_clean(escape_str($post_data['country_id_FK']));
				$city_id_FK       = $this->security->xss_clean(escape_str($post_data['city_id_FK']));
				$news_fb_link        = $this->security->xss_clean(escape_str($post_data['news_fb_link']));
				$news_twitter_link   = $this->security->xss_clean(escape_str($post_data['news_twitter_link']));
				$news_instagram_link = $this->security->xss_clean(escape_str($post_data['news_instagram_link']));
				$news_status      = $this->security->xss_clean(escape_str($post_data['news_status']));

				$config['upload_path'] = 'upload/news_blog/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['overwrite'] = FALSE;
				$config['remove_spaces'] = TRUE;
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);

				if(!empty($_FILES['img_upload']['name'])){
				if($this->upload->do_upload('img_upload')){
				$fileName = $this->upload->file_name;
				}else{
				$fileName = $post_data['img_old'];
				}
				}else{
				$fileName = $post_data['img_old'];
				}

				$this->__all_data = array
				(
					'country_id'               => $country_id_FK,
					'city_id'                  => $city_id_FK,
					'blog_news_title'          => $news_heading,
					'blog_news_description'    => $news_description,
					'blog_news_image'          => $fileName,
					'update_date'              => date('Y-m-d'),
					'blog_news_address'        => $news_address,
					'blog_news_fb_link'        => $news_fb_link,
					'blog_news_twitter_link'   => $news_twitter_link,
					'blog_news_instagram_link' => $news_instagram_link,
					'blog_news_status'         => $news_status,
					'blog_news_type'           => 'news',
					);
				$update_data_return = $this->dashs->update_array($this->__all_data,$id,BLOG_NEWS,'blog_news_id');
				if($update_data_return)
				{

					if( !empty($news_cate_id_FK) && count($news_cate_id_FK) > 0 )
					{

				$this->dashs->delete_new_category($id);

				foreach($news_cate_id_FK as $newsSingle)
				{
					$news_cate_pivot[]  = array ('category_id' => $newsSingle ,'pivot_unique_id' => $id ,'category_type' => 'news');
				}

				$insert_data_return = $this->dashs->insert_array_batch(PIVOT_CATEGORY,$news_cate_pivot);

				if($insert_data_return){

					$msg = 'Event created succefully';
					$msg_class = 'alert-success';

				}else{

					$msg = 'OPPS !! Something went wrong. Please try after some time';
					$msg_class = 'alert-danger';
				}
				redirect('Dashboard/list-news-view');

					}

				}
				else
				{
					$msg = 'OPPS !! Something went wrong. Please try after some time';
					$msg_class = 'alert-danger';

				}
				redirect('Dashboard/list-news-view');
			}else{
				redirect('Dashboard/list-news-view');
			}
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function delete_news($id)
	{
		$output = isNumaric($id);
		$id     = $output;
		if(!empty($id) and !empty($output))
		{
			$delete_data = $this->dashs->delete_array(BLOG_NEWS,'blog_news_id',$id);
			$delete_data_two = $this->dashs->delete_array(PIVOT_CATEGORY,'pivot_unique_id',$id);
			if(($delete_data) && ($delete_data_two))
			{
				$msg = 'Delete successfully';
				$msg_class = 'alert-success';
			}
			else
			{
				$msg = 'OPPS !! Something went wrong. Please try after some time';
				$msg_class = 'alert-danger';
			}
			redirect('Dashboard/list-news-view');
         //$this->list_news_view($msg,$msg_class);
		}
		else{
			redirect('Dashboard','refresh');
		}
	}

		public function delete_news_two($id)
	{
		$output = isNumaric($id);
		$id     = $output;
		if(!empty($id) and !empty($output))
		{
			$delete_data = $this->dashs->delete_array(BLOG_NEWS,'blog_news_id',$id);
			$delete_data_two = $this->dashs->delete_array(PIVOT_CATEGORY,'pivot_unique_id',$id);
			if(($delete_data) && ($delete_data_two))
			{
				$msg = 'Delete successfully';
				$msg_class = 'alert-success';
			}
			else
			{
				$msg = 'OPPS !! Something went wrong. Please try after some time';
				$msg_class = 'alert-danger';
			}
			redirect('Dashboard/list-news-all');
         //$this->list_news_view($msg,$msg_class);
		}
		else{
			redirect('Dashboard','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function ajax_city()
	{
		$ajax_city =  $this->input->post('e');

		if(!empty($ajax_city)){
			$this->__dataArray = $this->dashs->get_ajax_city($ajax_city);
			if(count($this->__dataArray) > 0)
			{
				echo '<option value="">Select City</option>';
				foreach($this->__dataArray as $data)
				{
					echo '<option value='.$data['city_id'].'>'.$data['city_name'].'</option>';
				}
			}else{
				echo  'ERROR';
			}
		}else{
			echo  'ERROR';
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function create_blog_view($msg='',$msg_class='')
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$msgSection['msg'] = $msg;
			$msgSection['msg_class'] = $msg_class;
		}
		$msgSection['news_category'] = $this->dashs->getCatagoryDetails(CATEGORY,'blog');
		$msgSection['countries']     = $this->dashs->getFullDetails(COUNTRY);
		$this->load->view('admin/blog',$msgSection);

	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function insert_blog()
	{
		$this->form_validation->set_rules('news_heading', 'News Heading','required');
		$this->form_validation->set_rules('news_cate_id_FK[]','News Category','required');
		$this->form_validation->set_rules('news_description','News Description','required');
		$this->form_validation->set_rules('news_date','News Date','required');
		$this->form_validation->set_rules('news_address','News Address','required');
		$this->form_validation->set_rules('country_id_FK','News Country','required');
		$this->form_validation->set_rules('city_id_FK','Event City','required');
		$this->form_validation->set_rules('news_status','Event Status','required');

		if($this->form_validation->run() == FALSE)
		{
			$msg = validation_errors();
			$msg_class = 'alert-danger';
			$this->create_blog_view($msg,$msg_class);
		}
		else
		{
			$post_data = $this->input->post();

			if(count($post_data) > 0){
		//______________________________________________________________
				$news_heading        = $this->security->xss_clean(escape_str($post_data['news_heading']));
				$news_cate_id_FK     = $this->security->xss_clean(escape_str($post_data['news_cate_id_FK']));
				$news_description    = $this->security->xss_clean($post_data['news_description']);
				$news_date           = $this->security->xss_clean(escape_str($post_data['news_date']));
				$news_address        = $this->security->xss_clean(escape_str($post_data['news_address']));
				$country_id_FK       = $this->security->xss_clean(escape_str($post_data['country_id_FK']));
				$city_id_FK          = $this->security->xss_clean(escape_str($post_data['city_id_FK']));
				$news_fb_link        = $this->security->xss_clean(escape_str($post_data['news_fb_link']));
				$news_twitter_link   = $this->security->xss_clean(escape_str($post_data['news_twitter_link']));
				$news_instagram_link = $this->security->xss_clean(escape_str($post_data['news_instagram_link']));
				$news_status         = $this->security->xss_clean(escape_str($post_data['news_status']));
		//______________________________________________________________

				$config['upload_path'] = 'upload/news_blog/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['overwrite'] = FALSE;
				$config['remove_spaces'] = TRUE;
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);

				if(!empty($_FILES['img_upload']['name'])){
					if($this->upload->do_upload('img_upload')){
						$fileName = $this->upload->file_name;
					}else{
						$fileName = '';
					}
				}else{
					$fileName = '';
				}

		//______________________________________________________________
				$this->__all_data = array
				(
					'user_id'                  => 1,
					'country_id'               => $country_id_FK,
					'city_id'                  => $city_id_FK,
					'blog_news_title'          => $news_heading,
					'blog_news_description'    => $news_description,
					'blog_news_image'          => $fileName,
					'create_date'              => date('Y-m-d'),
					'update_date'              => date('Y-m-d'),
					'blog_news_address'        => $news_address,
					'blog_news_fb_link'        => $news_fb_link,
					'blog_news_twitter_link'   => $news_twitter_link,
					'blog_news_instagram_link' => $news_instagram_link,
					'blog_news_status'         => $news_status,
					'blog_news_type'           => 'blog',


					);
				$insert_data_return = $this->dashs->insert_array(BLOG_NEWS,$this->__all_data);
				if($insert_data_return)
				{
					if( !empty($news_cate_id_FK) && count($news_cate_id_FK) > 0 )
					{

						foreach($news_cate_id_FK as $newsSingle)
						{

							$news_cate_pivot[]  = array ('category_id' => $newsSingle ,'pivot_unique_id' => $insert_data_return ,'category_type' => 'blog');
						}

						$insert_data_return = $this->dashs->insert_array_batch(PIVOT_CATEGORY,$news_cate_pivot);

						if($insert_data_return){

							$msg = 'Blog created succefully';
							$msg_class = 'alert-success';

						}else{

							$msg = 'OPPS !! Something went wrong. Please try after some time';
							$msg_class = 'alert-danger';
						}
						redirect('Dashboard/list-blog-view');
					}
				}
				else
				{
					$msg = 'OPPS !! Something went wrong. Please try after some time';
					$msg_class = 'alert-danger';
					redirect('Dashboard/list-blog-view');
				}

		//$this->list_news_view($msg,$msg_class);
			}else{
				redirect('Dashboard/list-blog-view');
			}
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function list_blog_view($msg='',$msg_class='')
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$msgsection['msg']       = $msg;
			$msgsection['msg_class'] = $msg_class;
		}
		$msgsection['all_members'] = $this->dashs->get_blog_full_admin(BLOG_NEWS,COUNTRY,CITY,1);
		$this->load->view('admin/list_blog',$msgsection);
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function edit_blog_view($id='',$msg='',$msg_class='')
	{
		$output = isNumaric($id);
		$id     = $output;
		if(!empty($id) and !empty($output))
		{
			if(!empty($msg) and !empty($msg_class))
			{
				$msgSection['msg'] = $msg;
				$msgSection['msg_class']= $msg_class;
			}
			$msgSection['news'] = $this->dashs->getListDatas(BLOG_NEWS,'blog_news_id',$id);
			if($msgSection['news'] == FALSE)
			{
				redirect('Dashboard','refresh');
			}else{
				$msgSection['news_category'] = $this->dashs->getCatagoryDetails(CATEGORY,'blog');
				$msgSection['countries']     = $this->dashs->getFullDetails(COUNTRY);
				$msgSection['citydata']      = $this->dashs->get_ajax_city($msgSection['news'][0]['country_id']);
				$msgSection['get_cate_id']   = $this->dashs->get_pivot_category('blog',$msgSection['news'][0]['blog_news_id']);
				$this->load->view('admin/edit_blog',$msgSection);
			}
		}
		else
		{
			redirect('Dashboard','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function update_blog($id)
	{
		$this->form_validation->set_rules('news_heading', 'News Heading','required');
		$this->form_validation->set_rules('news_cate_id_FK[]','News Category','required');
		$this->form_validation->set_rules('news_description','News Description','required');
		$this->form_validation->set_rules('news_date','News Date','required');
		$this->form_validation->set_rules('news_address','News Address','required');
		$this->form_validation->set_rules('country_id_FK','News Country','required');
		$this->form_validation->set_rules('city_id_FK','Event City','required');
		$this->form_validation->set_rules('news_status','Event Status','required');

		if($this->form_validation->run() == FALSE)
		{
			$msg = validation_errors();
			$msg_class = 'alert-danger';
			$this->edit_news_view($id,$msg,$msg_class);
		}
		else
		{
			$post_data = $this->input->post();
			if(count($post_data) > 0){
		//______________________________________________________________
				$news_heading     = $this->security->xss_clean(escape_str($post_data['news_heading']));
				$news_cate_id_FK  = $this->security->xss_clean(escape_str($post_data['news_cate_id_FK']));
				$news_description = $this->security->xss_clean($post_data['news_description']);
				$news_date        = $this->security->xss_clean(escape_str($post_data['news_date']));
				$news_address     = $this->security->xss_clean(escape_str($post_data['news_address']));
				$country_id_FK    = $this->security->xss_clean(escape_str($post_data['country_id_FK']));
				$city_id_FK       = $this->security->xss_clean(escape_str($post_data['city_id_FK']));
				$news_fb_link        = $this->security->xss_clean(escape_str($post_data['news_fb_link']));
				$news_twitter_link   = $this->security->xss_clean(escape_str($post_data['news_twitter_link']));
				$news_instagram_link = $this->security->xss_clean(escape_str($post_data['news_instagram_link']));
				$news_status      = $this->security->xss_clean(escape_str($post_data['news_status']));
		//______________________________________________________________
				if(!empty($news_cate_id_FK))
				{
					$news_cate_id_FK = implode(',',$news_cate_id_FK);
				}

				$config['upload_path'] = 'upload/news_blog/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['overwrite'] = FALSE;
				$config['remove_spaces'] = TRUE;
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);

				if(!empty($_FILES['img_upload']['name'])){
					if($this->upload->do_upload('img_upload')){
						$fileName = $this->upload->file_name;
					}else{
						$fileName = $post_data['img_old'];
					}
				}else{
					$fileName = $post_data['img_old'];
				}

		//______________________________________________________________
				$this->__all_data = array
				(
					'country_id'               => $country_id_FK,
					'city_id'                  => $city_id_FK,
					'blog_news_title'          => $news_heading,
					'blog_news_description'    => $news_description,
					'blog_news_image'          => $fileName,
					'update_date'              => date('Y-m-d'),
					'blog_news_address'        => $news_address,
					'blog_news_fb_link'        => $news_fb_link,
					'blog_news_twitter_link'   => $news_twitter_link,
					'blog_news_instagram_link' => $news_instagram_link,
					'blog_news_status'         => $news_status,
					'blog_news_type'           => 'blog',
					);
				$update_data_return = $this->dashs->update_array($this->__all_data,$id,BLOG_NEWS,'blog_news_id');
				if($update_data_return)
				{
					$msg = 'You have succefully updated news';
					$msg_class = 'alert-success';

				}
				else
				{
					$msg = 'OPPS !! Something went wrong. Please try after some time';
					$msg_class = 'alert-danger';

				}
				redirect('Dashboard/list-blog-view');
			}else{
				redirect('Dashboard/list-blog-view');
			}
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function delete_blog($id)
	{
		$output = isNumaric($id);
		$id     = $output;
		if(!empty($id) and !empty($output))
		{
			$delete_data = $this->dashs->delete_array(BLOG_NEWS,'blog_news_id',$id);
			$delete_data_two = $this->dashs->delete_array(PIVOT_CATEGORY,'pivot_unique_id',$id);
			if(($delete_data) && ($delete_data_two))
			{
				$msg = 'Delete successfully';
				$msg_class = 'alert-success';
			}
			else
			{
				$msg = 'OPPS !! Something went wrong. Please try after some time';
				$msg_class = 'alert-danger';
			}
			redirect('Dashboard/list-blog-view');
                //$this->list_news_view($msg,$msg_class);
		}
		else{
			redirect('Dashboard','refresh');
		}
	}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function view_all_member_details($id='')
	{
		$get_user_details = $this->dashs->get_full_admin_details($id);
		$msgsection['data_id']     = $id;
		$msgsection['all_event']   = $this->dashs->get_event_full_all();
		$msgsection['all_news']    = $this->dashs->get_news_blog_full(BLOG_NEWS,COUNTRY,CITY,'news');
		$msgsection['all_blog']    = $this->dashs->get_news_blog_full(BLOG_NEWS,COUNTRY,CITY,'blog');
		$msgsection['payment']     = $this->dashs->getFullDetails('payments');
		$msgsection['space']       = $this->dashs->get_space_full_all($id);
		if($get_user_details[0]['membership_id'] == 0){ $get_user_details[0]['membership_id'] = 1; }
		$msgsection['membershipduse'] = $this->dashs->getMemberDetails($get_user_details[0]['membership_id']);

		$this->load->view('admin/view-all-member-details',$msgsection);
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function view_all_trainer_details($id='')
	{
		$get_user_details = $this->dashs->get_full_admin_details($id);
		$msgsection['data_id']     = $id;
		$msgsection['all_event']   = $this->dashs->get_event_full_all();
		$msgsection['all_news']    = $this->dashs->get_news_blog_full(BLOG_NEWS,COUNTRY,CITY,'news');
		$msgsection['all_blog']    = $this->dashs->get_news_blog_full(BLOG_NEWS,COUNTRY,CITY,'blog');
		$msgsection['all_classes'] = $this->dashs->getListDatas('cmd_trainer_class','user_id',$id);
		$msgsection['space']       = $this->dashs->get_space_full_all($id);
		if($get_user_details[0]['membership_id'] == 0){ $get_user_details[0]['membership_id'] = 3; }
		$msgsection['membershipduse'] = $this->dashs->getMemberDetails($get_user_details[0]['membership_id']);
		$this->load->view('admin/view-all-trainer-details',$msgsection);
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function view_all_company_details($id='')
	{
    $get_user_details = $this->dashs->get_full_admin_details($id);
		$msgsection['data_id']     = $id;
		$msgsection['all_event']   = $this->dashs->get_event_full_all();
		$msgsection['all_news']    = $this->dashs->get_news_blog_full(BLOG_NEWS,COUNTRY,CITY,'news');
		$msgsection['all_blog']    = $this->dashs->get_news_blog_full(BLOG_NEWS,COUNTRY,CITY,'blog');
		$msgsection['payment']     = $this->dashs->getFullDetails('payments');
		$msgsection['space']       = $this->dashs->get_space_full_all($id);
		if($get_user_details[0]['membership_id'] == 0){ $get_user_details[0]['membership_id'] = 2; }
		$msgsection['membershipduse'] = $this->dashs->getMemberDetails($get_user_details[0]['membership_id']);
		$this->load->view('admin/view-all-company-details',$msgsection);
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function list_member($msg='',$msg_class='')
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$listmember['msg'] = $msg;
			$listmember['msg_class'] = $msg_class;
		}
		$listmember['all_members'] = $this->dashs->getFullUserDetailsTypeWise('M');
		$listmember['all_membership']=$this->dashs->getFullDetails(MEMBERSHIP);
		$this->load->view('admin/list_member',$listmember);
	}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function edit_membership_view($id='',$msg='',$msg_class='')
	{
		if(!empty($id))
		{

			if(!empty($msg) and !empty($msg_class))
			{
				$listmember['msg'] = $msg;
				$listmember['msg_class'] = $msg_class;
			}

			$listmember['all_members'] = $this->dashs->getFullUserDetailsIdWise($id);
			$this->load->view('admin/edit_member',$listmember);

		}else{
			redirect('Dashboard','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function member_profile_update($id='')
	{

		if(!empty($id)){

			$this->form_validation->set_rules('first_name','First Name','required');
			$this->form_validation->set_rules('last_name','Last Name','required');
			$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
			$this->form_validation->set_rules('dob','Dob','required');
			$this->form_validation->set_rules('status','Status','required');

			if($this->form_validation->run() == FALSE)
			{
				$msg = validation_errors();
				$msg_class= "alert-danger";
				$this->edit_membership_view($id,$msg,$msg_class);

			}else{

				$post_data = $this->input->post();

				if(count($post_data) > 0)
				{

					$this->__dataArray['first_name'] = $this->security->xss_clean(escape_str($post_data['first_name']));
					$this->__dataArray['last_name'] = $this->security->xss_clean(escape_str($post_data['last_name']));
					$this->__dataArray['phone'] = $this->security->xss_clean(escape_str($post_data['phone']));
					$this->__dataArray['about_us'] = $this->security->xss_clean(escape_str($post_data['about_us']));
					$this->__dataArray['dob'] = $this->security->xss_clean(escape_str($post_data['dob']));
					$this->__dataArray['user_facebook'] = $this->security->xss_clean(escape_str($post_data['user_facebook']));
					$this->__dataArray['user_instagram'] = $this->security->xss_clean(escape_str($post_data['user_instagram']));
					$this->__dataArray['user_twitter'] = $this->security->xss_clean(escape_str($post_data['user_twitter']));
					$this->__dataArray['member_company_name'] = $this->security->xss_clean(escape_str($post_data['member_company_name']));
					$this->__dataArray['member_function_title'] = $this->security->xss_clean(escape_str($post_data['member_function_title']));
					$this->__dataArray['update_date'] = date('Y-m-d');

					$return_one = $this->dashs->update_array($this->__dataArray,$id,USER_DETAILS,'user_id');

					$this->__dataArray_one['email'] = $this->security->xss_clean(escape_str($post_data['email']));
					if(!empty($post_data['password'])){
					$this->__dataArray_one['password'] = md5($post_data['password']);
					}
					$this->__dataArray_one['status'] = $this->security->xss_clean(escape_str($post_data['status']));
					$this->__dataArray_one['update_date'] = date('Y-m-d');

					$return_two = $this->dashs->update_array($this->__dataArray_one,$id,USER,'user_id');

					$this->__dataArray_two['street_address_1'] = $this->security->xss_clean(escape_str($post_data['street_address_1']));
					$this->__dataArray_two['street_address_2'] = $this->security->xss_clean(escape_str($post_data['street_address_2']));

					$return_three = $this->dashs->update_array($this->__dataArray_two,$id,'cmd_address','user_id');


					if( ($return_one != FALSE) and ($return_two != FALSE)  and ($return_three != FALSE) ){
						$msg = "You have succefully updated profile";
						$msg_class = "alert-success";
					}else{
						$msg = "OPPS !! Something went wrong. PLease Try after some time";
						$msg_class= "alert-danger";
					}

					$this->edit_membership_view($id,$msg,$msg_class);

				}else{
					$this->list_member();
				}
			}
		}else{
			$this->list_member();
		}

	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function delete_member($id)
	{
		$output = isNumaric($id);
		$id = $output;
		if(!empty($id) and !empty($output))
		{
			
				$tables = array(
				'cmd_user',
				'payments',
				'cmd_event', 
				'user_order',
				'cmd_meet_up',
				'cmd_product',
				'cmd_address',
				'cmd_business', 
				'cmd_blog_news', 
				'cmd_user_details',
				'cmd_trainer_class',
				'cmd_product_review',
				'user_order_details',
				'cmd_store_feedback',
				'cmd_field_permision',
				'cmd_pivot_joining_event',
				'cmd_pivot_joining_class',
				'cmd_pivot_favourite_city',
				'cmd_pivot_favourite_store',
				'cmd_pivot_favourite_event',
				'cmd_pivot_user_interest_category',
			);
			

			foreach ($tables as $key => $value) {
					$this->dashs->delete_array($value,'user_id',$id);
				}	
			
		
			// $this->db->where('user_id', $id);
			// $this->db->delete($tables);

			$msg = 'Delete successfully';
			$msg_class = 'alert-success';

			$url= $_SERVER['HTTP_REFERER'];
			//$this->list_member($msg,$msg_class);
			redirect($_SERVER['HTTP_REFERER'],'refresh');
		}
		else{
			redirect('Dashboard','refresh');
		}
	}


//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function change_member_status()
	{
		$get_id = $this->input->post('chk');
		if(count($get_id) > 0){
			foreach($get_id as $id){
				$this->dashs->deleteCheckBoxUser($id);
			}
			$this->list_member();
		}else{
			$this->list_member();
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function list_trainner($msg='',$msg_class='')
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$listmember['msg'] = $msg;
			$listmember['msg_class'] = $msg_class;
		}
		$listmember['all_members'] = $this->dashs->getFullUserDetailsTypeWise('T');
		$listmember['all_membership']=$this->dashs->getFullDetails(MEMBERSHIP);
		$this->load->view('admin/list_trainner',$listmember);
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function list_class($id='')
	{
		$output = isNumaric($id);
		if(!empty($id) and !empty($output))
		{
			$msgSection['all_members'] = $this->dashs->getListDatas('cmd_trainer_class','user_id',$id);
			$msgSection['all_trainner_id'] = $id;
			if($msgSection['all_members'] != 'False'){
			$this->load->view('admin/list_class',$msgSection);
			}else{
			redirect('Dashboard/list-trainner','refresh');
			}
		}else{
			redirect('Dashboard','refresh');
		}

	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function change_class_status()
	{
		$get_id = $this->input->post('chk');
		$tra_id = $this->input->post('trainer_id');
		if(count($get_id) > 0){
			foreach($get_id as $id){
				$this->dashs->updateCheckBoxUser($id);
			}
			$this->list_class($tra_id);
		}else{
			$this->list_class($tra_id);
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function edit_trainner_view($id='',$msg='',$msg_class='')
	{
		if(!empty($id))
		{

			if(!empty($msg) and !empty($msg_class))
			{
				$listmember['msg'] = $msg;
				$listmember['msg_class'] = $msg_class;
			}

			$listmember['all_members'] = $this->dashs->getFullUserDetailsIdWise($id);
			$this->load->view('admin/edit_trainer',$listmember);

		}else{
			redirect('Dashboard','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function trainner_profile_update($id='')
	{

		if(!empty($id)){

			$this->form_validation->set_rules('first_name','First Name','required');
			$this->form_validation->set_rules('last_name','Last Name','required');
			$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
			$this->form_validation->set_rules('dob','Dob','required');
			$this->form_validation->set_rules('status','Status','required');

			if($this->form_validation->run() == FALSE)
			{
				$msg = validation_errors();
				$msg_class= "alert-danger";
				$this->edit_trainner_view($id,$msg,$msg_class);

			}else{

				$post_data = $this->input->post();

				if(count($post_data) > 0)
				{

	$this->__dataArray['first_name'] = $this->security->xss_clean(escape_str($post_data['first_name']));
	$this->__dataArray['last_name'] = $this->security->xss_clean(escape_str($post_data['last_name']));
	$this->__dataArray['phone'] = $this->security->xss_clean(escape_str($post_data['phone']));
	$this->__dataArray['about_us'] = $this->security->xss_clean(escape_str($post_data['about_us']));
	$this->__dataArray['dob'] = $this->security->xss_clean(escape_str($post_data['dob']));
	$this->__dataArray['user_facebook'] = $this->security->xss_clean(escape_str($post_data['user_facebook']));
	$this->__dataArray['user_instagram'] = $this->security->xss_clean(escape_str($post_data['user_instagram']));
	$this->__dataArray['user_twitter'] = $this->security->xss_clean(escape_str($post_data['user_twitter']));
	$this->__dataArray['member_company_name'] = $this->security->xss_clean(escape_str($post_data['member_company_name']));
	$this->__dataArray['member_function_title'] = $this->security->xss_clean(escape_str($post_data['member_function_title']));
	$this->__dataArray['update_date'] = date('Y-m-d');
	$this->__dataArray['trainer_experience'] = $this->security->xss_clean(escape_str($post_data['trainer_experience']));
	$this->__dataArray['trainer_about_yourself'] = $this->security->xss_clean(escape_str($post_data['trainer_about_yourself']));

					$return_one = $this->dashs->update_array($this->__dataArray,$id,USER_DETAILS,'user_id');

					$this->__dataArray_one['email'] = $this->security->xss_clean(escape_str($post_data['email']));
					$this->__dataArray_one['status'] = $this->security->xss_clean(escape_str($post_data['status']));
					$this->__dataArray_one['update_date'] = date('Y-m-d');

					$return_two = $this->dashs->update_array($this->__dataArray_one,$id,USER,'user_id');

					$this->__dataArray_two['street_address_1'] = $this->security->xss_clean(escape_str($post_data['street_address_1']));
					$this->__dataArray_two['street_address_2'] = $this->security->xss_clean(escape_str($post_data['street_address_2']));

					$return_three = $this->dashs->update_array($this->__dataArray_two,$id,'cmd_address','user_id');


					if( ($return_one != FALSE) and ($return_two != FALSE)  and ($return_three != FALSE) ){
						$msg = "You have succefully updated profile";
						$msg_class = "alert-success";
					}else{
						$msg = "OPPS !! Something went wrong. PLease Try after some time";
						$msg_class= "alert-danger";
					}

					$this->edit_trainner_view($id,$msg,$msg_class);

				}else{
					$this->list_trainner();
				}
			}
		}else{
			$this->list_trainner();
		}

	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function delete_trainner($id)
	{
		$output = isNumaric($id);
		$id = $output;
		if(!empty($id) and !empty($output))
		{
			$delete_data = $this->dashs->delete_array(USER,'user_id',$id);
			$delete_data_two = $this->dashs->delete_array(USER_DETAILS,'user_id',$id);
			$delete_data_three = $this->dashs->delete_array('cmd_address','user_id',$id);
			if($delete_data && $delete_data_two && $delete_data_three )
			{
				$msg = 'Delete successfully';
				$msg_class = 'alert-success';
			}
			else
			{
				$msg = 'OPPS !! Something went wrong. Please try after some time';
				$msg_class = 'alert-danger';
			}
		//$this->list_member($msg,$msg_class);
			redirect('Dashboard/list-trainner');
		}
		else{
			redirect('Dashboard','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function delete_class($id='',$trainner_id='')
	{
		$output = isNumaric($id);
		if(!empty($id) and !empty($output) and !empty($trainner_id))
		{
			$delete_data = $this->dashs->delete_array('cmd_trainer_class','trainer_class_id',$id);
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

			redirect('Dashboard/list-class/'.$trainner_id);
		}
		else{
			redirect('Dashboard','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function change_trainner_status()
	{
		$get_id = $this->input->post('chk');
		if(count($get_id) > 0){
			foreach($get_id as $id){
				$this->dashs->deleteCheckBoxUser($id);
			}
			$this->list_trainner();
		}else{
			$this->list_trainner();
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function list_company($msg='',$msg_class='')
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$listmember['msg'] = $msg;
			$listmember['msg_class'] = $msg_class;
		}
		$listmember['all_members'] = $this->dashs->getFullUserDetailsTypeWise('C');
		$listmember['all_membership']=$this->dashs->getFullDetails(MEMBERSHIP);
		$this->load->view('admin/list_company',$listmember);
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function edit_company_view($id='',$msg='',$msg_class='')
	{
		if(!empty($id))
		{

			if(!empty($msg) and !empty($msg_class))
			{
				$listmember['msg'] = $msg;
				$listmember['msg_class'] = $msg_class;
			}

			$listmember['all_members'] = $this->dashs->getFullUserDetailsIdWise($id);
			$this->load->view('admin/edit_company',$listmember);

		}else{
			redirect('Dashboard','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function company_profile_update($id='')
	{

		if(!empty($id)){

			$this->form_validation->set_rules('company_name','Company Name','required');
			$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
			$this->form_validation->set_rules('status','Status','required');

			if($this->form_validation->run() == FALSE)
			{
				$msg = validation_errors();
				$msg_class= "alert-danger";
				$this->edit_company_view($id,$msg,$msg_class);

			}else{

				$post_data = $this->input->post();

				if(count($post_data) > 0)
				{

	$this->__dataArray['company_name'] = $this->security->xss_clean(escape_str($post_data['company_name']));
	$this->__dataArray['phone'] = $this->security->xss_clean(escape_str($post_data['phone']));
	$this->__dataArray['about_us'] = $this->security->xss_clean(escape_str($post_data['about_us']));
	$this->__dataArray['user_facebook'] = $this->security->xss_clean(escape_str($post_data['user_facebook']));
	$this->__dataArray['user_instagram'] = $this->security->xss_clean(escape_str($post_data['user_instagram']));
	$this->__dataArray['user_twitter'] = $this->security->xss_clean(escape_str($post_data['user_twitter']));
	$this->__dataArray['update_date'] = date('Y-m-d');
	$this->__dataArray['company_description'] = $this->security->xss_clean(escape_str($post_data['company_description']));
	$this->__dataArray['company_person'] = $this->security->xss_clean(escape_str($post_data['company_person']));

					$return_one = $this->dashs->update_array($this->__dataArray,$id,USER_DETAILS,'user_id');

					$this->__dataArray_one['email'] = $this->security->xss_clean(escape_str($post_data['email']));
					$this->__dataArray_one['status'] = $this->security->xss_clean(escape_str($post_data['status']));
					$this->__dataArray_one['update_date'] = date('Y-m-d');

					$return_two = $this->dashs->update_array($this->__dataArray_one,$id,USER,'user_id');

					$this->__dataArray_two['street_address_1'] = $this->security->xss_clean(escape_str($post_data['street_address_1']));
					$this->__dataArray_two['street_address_2'] = $this->security->xss_clean(escape_str($post_data['street_address_2']));

					$return_three = $this->dashs->update_array($this->__dataArray_two,$id,'cmd_address','user_id');


					if( ($return_one != FALSE) and ($return_two != FALSE)  and ($return_three != FALSE) ){
						$msg = "You have succefully updated profile";
						$msg_class = "alert-success";
					}else{
						$msg = "OPPS !! Something went wrong. PLease Try after some time";
						$msg_class= "alert-danger";
					}

					$this->edit_company_view($id,$msg,$msg_class);

				}else{
					$this->list_company();
				}
			}
		}else{
			$this->list_company();
		}

	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function delete_company($id)
	{
		$output = isNumaric($id);
		if(!empty($id) and !empty($output))
		{
			$delete_data = $this->dashs->delete_array(USER,'user_id',$id);
			$delete_data_two = $this->dashs->delete_array(USER_DETAILS,'user_id',$id);
			$delete_data_three = $this->dashs->delete_array('cmd_address','user_id',$id);
			if($delete_data && $delete_data_two && $delete_data_three )
			{
				$msg = 'Delete successfully';
				$msg_class = 'alert-success';
			}
			else
			{
				$msg = 'OPPS !! Something went wrong. Please try after some time';
				$msg_class = 'alert-danger';
			}
		//$this->list_member($msg,$msg_class);
			redirect('Dashboard/list-company');
		}
		else{
			redirect('Dashboard','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function change_company_status()
	{
		$get_id = $this->input->post('chk');
		if(count($get_id) > 0){
			foreach($get_id as $id){
				$this->dashs->deleteCheckBoxUser($id);
			}
			$this->list_company();
		}else{
			$this->list_company();
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function create_product_sub_category_view($msg='',$msg_class='')
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$msgSection['msg'] = $msg;
			$msgSection['msg_class'] = $msg_class;
		}
		$msgSection['categoryDetails'] = $this->dashs->getCatagoryDetails(CATEGORY,'product');
		$this->load->view('admin/product_sub_category',$msgSection);
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function insert_product_sub_category()
	{
		$this->form_validation->set_rules('category_name', 'Sub Catagory Name','required');
		$this->form_validation->set_rules('status','Catagory Status','required');
		$this->form_validation->set_rules('parent_id', 'Category Name', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$msg = validation_errors();
			$msg_class = 'alert-danger';
			$this->create_product_sub_category_view($msg,$msg_class);
		}
		else
		{
			$post_data = $this->input->post();

			if(count($post_data) > 0){
				foreach($post_data as $key=>$value)
				{
					$this->__dataArray[$key] = $value;
				}

				$insertDataReturn = $this->dashs->insert_array(CATEGORY,$this->__dataArray);

				if($insertDataReturn){
					$msg = 'Subcategory created succefully';
					$msg_class = 'alert-success';
				}else{
					$msg = 'OPPS !! Something went wrong. Please try after some time';
					$msg_class = 'alert-danger';
				}
			}
	//$this->list_product_sub_category_view($msg,$msg_class);
			redirect('Dashboard/list-product-sub-category-view/','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function list_product_sub_category_view($msg='',$msg_class='')
	{
		if(!empty($msg) and !empty($msg_class))
		{
			$listmember['msg'] = $msg;
			$listmember['msg_class'] = $msg_class;
		}
		$listmember['alldata'] = $this->dashs->getSubOfCategoryName();
		$this->load->view('admin/list_product_sub_category',$listmember);
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function edit_product_sub_category_view($id='',$msg='',$msg_class='')
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
			$msgSection['data'] = $this->dashs->getListDatas(CATEGORY,'category_id',$id);
			if($msgSection['data'] == FALSE)
			{
				redirect('Dashboard','refresh');
			}else{
				$msgSection['category_data'] = $this->dashs->getCatagoryDetails(CATEGORY,'product');
				$this->load->view('admin/edit_product_sub_category',$msgSection);
			}
		}
		else
		{
			redirect('Dashboard','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function update_product_sub_category($id)
	{
		$output = isNumaric($id);
		$id = $output;
		if(!empty($id) and !empty($output)){

			$this->form_validation->set_rules('category_name', 'Subcategory Name', 'required');
			$this->form_validation->set_rules('parent_id', 'Category Name', 'required');
			$this->form_validation->set_rules('status', 'Subcategory Status', 'required');
			if($this->form_validation->run() == FALSE)
			{
				$msg = validation_errors();
				$msg_class = 'alert-danger';
				$this->edit_product_sub_category_view($id,$msg,$msg_class);
			}
			else
			{
				$msgSection['data'] = $this->dashs->getListDatas(CATEGORY,'category_id',$id);
				if($msgSection['data'] != FALSE){
					$post_data = $this->input->post();
					if(count($post_data) >0)
					{
						foreach($post_data as $key=>$value)
						{
							$this->__data[$key] = $value;
						}
						$updatedatareturn = $this->dashs->update_array($this->__data,$id,CATEGORY,'category_id');
					}
					if($updatedatareturn)
					{
						$msg='You have succefully updated subcatagory ';
						$msgclass= 'alert-success';
					}
					else
					{
						$msg='OPPS !! Something went wrong. Please try after some time';
						$msgclass= 'alert-danger';
					}
	//$this->list_product_sub_category_view($msg,$msgclass);
					redirect('Dashboard/list-product-sub-category-view/','refresh');
				}else{
					$this->list_product_sub_category_view();
				}
			}
		}else{
			$this->list_product_sub_category_view();
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function delete_product_sub_catagory($id)
	{
		$output = isNumaric($id);
		$id = $output;
		if(!empty($id) and !empty($output))
		{
			$delete_data = $this->dashs->delete_array(CATEGORY,'category_id',$id);
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
	//$this->list_product_sub_category_view($msg,$msg_class);
			redirect('Dashboard/list-product-sub-category-view/','refresh');
		}
		else{
			redirect('Dashboard','refresh');
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function list_class_payment()
	{
		$msgSection['payment'] = $this->dashs->getFullDetails('payments');
		$this->load->view('admin/list_class_payment',$msgSection);
	}
	public function list_order()
	{
		$msgSection['order'] = $this->dashs->getFullDetails('user_order');
		$this->load->view('admin/list_order',$msgSection);
	}

public function list_all()
{
	$listmember['all_members'] = $this->dashs->getFullUserDetailsW();
	$this->load->view('admin/list_all',$listmember);
}


//END CLASS
}
