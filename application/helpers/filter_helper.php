<?php
##### START ADMIN ###########################################
if ( ! function_exists('get_paid_class_details'))
{
function get_paid_class_details($id){
if(!empty($id))
{
$get_return_details = '';
$CI = & get_instance();
$CI->load->model('Users','urs');
try {
return $get_return_details = $CI->urs->get_paid_class_details($id);
} catch (Exception $e) {
echo $e->getMessage();
}
}else{
throw new Exception("The data process wrong !! Please try after some time !!");
}
}
}
function get_banner_page_name($id)
{
$page_name = '';	
if($id == 4){
$page_name = "Home";
}
if($id == 5){
$page_name = "City";
}
if($id == 6){
$page_name = "News";
}
if($id == 1){
$page_name = "Events / Spaces (under the Map)";
}
if($id == 2){
$page_name = "Detail page of an Event / Space";
}
if($id == 3){
$page_name = "News page";
}
return $page_name;
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('currentDate'))
{
	function currentDate($formate)
	{
		return date($formate);
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('currentMonthFEDate'))
{
	function currentMonthFEDate()
	{
		$data[0] = date('Y-m-1');
		$data[1] = date('Y-m-t');
		return $data;
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('statusColour'))
{
	function statusColour($value)
	{
		if($value == 'Active'){
		$text = "<strong style='color:green'>Active</strong>";
		}else{
		$text = "<strong style='color:red'>Inactive</strong>";
		}
		return $text;
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('isNumaric'))
{
	function isNumaric($data)
	{
		return preg_replace( '/[^0-9]/', '', $data );
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('get_user_details'))
{
	function get_user_details($id)
	{
		$get_user_details = '';

		$CI = & get_instance();
        $CI->load->model('Dashboards','dashs');
		$get_user_details = $CI->dashs->getFullUserDetailsIdWise($id);
		if(count($get_user_details) > 0){
		return $get_user_details[0];
		}
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('get_member_details'))
{
	function get_member_details($id)
	{
		$get_user_details = '';

		$CI = & get_instance();
        $CI->load->model('Dashboards','dashs');
		$get_member_details = $CI->dashs->getMemberDetails($id);
		if(count($get_member_details) > 0){
		return $get_member_details[0];
		}else{
		return $get_member_details[0] = 'NO DATA';	
		}
	}
}
if ( ! function_exists('space_details'))
{
	function space_details($id)
	{
		$get_user_details = '';

		$CI = & get_instance();
        $CI->load->model('Dashboards','dashs');
		$get_user_details = $CI->dashs->getListDatas('cmd_business','business_id',$id);
		return $get_user_details[0];
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('get_event_details'))
{
	function get_event_details($id)
	{
		$get_details = '';

		$CI = & get_instance();
        $CI->load->model('Dashboards','dashs');
		$get_details = $CI->dashs->getListDatas('cmd_event','event_id',$id);
		return $get_details[0];
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if( ! function_exists('get_country_details'))
{
	function get_country_details($id)
	{
		$get_details = '';

		$CI = & get_instance();
        $CI->load->model('Dashboards','dashs');
		$get_details = $CI->dashs->getListDatas('cmd_country','country_id',$id);
		return $get_details[0];
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if( ! function_exists('get_city_details'))
{
	function get_city_details($id)
	{
		$get_details = '';

		$CI = & get_instance();
        $CI->load->model('Dashboards','dashs');
		$get_details = $CI->dashs->getListDatas('cmd_city','city_id',$id);
		return $get_details[0];
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('get_meet_up_count'))
{
	function get_meet_up_count($id)
	{
		$get_user_details = '';

		$CI = & get_instance();
        $CI->load->model('Users','urs');
		$get_member_details = $CI->urs->getMeetUpCount($id);
		return $get_member_details;
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('get_class_count'))
{
	function get_class_count($id)
	{
		$get_user_details = '';

		$CI = & get_instance();
        $CI->load->model('Dashboards','dashs');
		$get_member_details = $CI->dashs->check_data_exist('cmd_trainer_class','user_id',$id);
		return $get_member_details;
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('get_admin_details'))
{
	function get_admin_details()
	{
		$CI = & get_instance();
        $CI->load->model('Dashboards','dashs');
		return $get_member_details = $CI->dashs->get_admin_setting('cmd_settings');
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('getProductDetails'))
{
	function getProductDetails($id)
	{

		$CI = & get_instance();
        $CI->load->model('Users','urs');
		$get = $CI->urs->getproductDatas('product_id',$id);
		return $get;
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('get_business_rating'))
{
	function get_business_rating($id)
	{
		$get_user_details = '';
		$CI = & get_instance();
        $CI->load->model('Dashboards','dashs');
		$CI->load->model('Users','urs');
		return $get_member_details = $CI->urs->getBusinessRating($id);
	}
}
##### START FRONTEND ####################################
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('favCity'))
{
	function favCity($city_id)
	{
		$CI =& get_instance();
		$CI->load->model('Users','urs');
		return $CI->urs->getFebCityDetails($_SESSION['user_id'],$city_id);
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('get_banner'))
{
	function get_banner($get_banner_id)
	{
		$CI =& get_instance();
		$CI->load->model('Users','urs');
		return $CI->urs->get_banner_details($get_banner_id);
	}
}
if ( ! function_exists('get_product_details'))
{
	function get_product_details($pid)
	{
		$CI =& get_instance();
		$CI->load->model('Users','urs');
		return $CI->urs->get_product_details($pid);
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('favDetails'))
{
	function favDetails($Tablename,$event_id,$field_name='')
	{
		$CI =& get_instance();
		$CI->load->model('Users','urs');
		return $CI->urs->getFebDetails($Tablename,$_SESSION['user_id'],$event_id,$field_name);
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('getLatLong'))
{
	function getLatLong($address){
		if(!empty($address)){
			//Formatted address
			$formattedAddr = str_replace(' ','+',$address);
			//Send request and receive json data by address
			$geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false');
			$output = json_decode($geocodeFromAddr);
			//Get latitude and longitute from json data
			if(!empty($output->results[0]->geometry->location->lat) and !empty($output->results[0]->geometry->location->lng)){
			$data['latitude']  = $output->results[0]->geometry->location->lat;
			$data['longitude'] = $output->results[0]->geometry->location->lng;
			}else{
			$data['latitude']  = 0;
			$data['longitude'] = 0;
			}
			//Return latitude and longitude of the given address
			return $data;
		}else{
			return false;
		}
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('base64_encription'))
{
	function base64_encription($data=''){
		return base64_encode($data);
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('base64_decription'))
{
	function base64_decription($data=''){
		return base64_decode($data);
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function urlToDomain($url) {
   if ( substr($url, 0, 8) == 'https://' ) {
      $url = substr($url, 8);
   }
   if ( substr($url, 0, 7) == 'http://' ) {
      $url = substr($url, 7);
   }
  /* if ( substr($url, 0, 4) == 'www.' ) {
      $url = substr($url, 4);
   }
   if ( strpos($url, '/') !== false ) {
      $explode = explode('/', $url);
      $url     = $explode['0'];
   }*/
   return $url;
}
//+++++++++++++++++++++++++++++++++++++++++++++++ CATEGORY DETAILS ++++++++++++++++++++++++++++
function specific_category($id)
{
	$CI =& get_instance();
	$CI->load->model('Users','urs');
	//$id = base64_decription($id);
	if($id!='' || $id!=$id){

			$category_details = $CI->urs->getTypeDetails(PIVOT_CATEGORY,$id,'pivot_unique_id','category_type','news');
		if(empty($category_details)){
			$category_details = $CI->urs->getTypeDetails(PIVOT_CATEGORY,$id,'pivot_unique_id','category_type','blog');
		}
		if(empty($category_details)){
			$category_details = $CI->urs->getTypeDetails(PIVOT_CATEGORY,$id,'pivot_unique_id','category_type','event');
		}
		if(empty($category_details)){
			return $category_details = 'No Category';
		}
		foreach($category_details as $category_details){
			$category_id_event[] = $category_details['category_id'];
		}
		if(count($category_id_event)>0){
			 $category_id = implode(',',$category_id_event);
		}
		 //echo $category_id;
			$category_name = $CI->urs->get_name_category(CATEGORY,'category_id',$category_id,'category_name');
			//print_r($category_name);
			//print_r($category_name[0]['get_name']);
			//die;
			//echo '<pre>';
			//print_r($category_name[0]['get_name']);
			return $category_name[0]['get_name'];
	}
}

function show_category_name($id)
{
	$name = array();
	$CI =& get_instance();
	$CI->load->model('Users','urs');
	$GD = $CI->urs->getFullDetails(PIVOT_CATEGORY,'pivot_unique_id',$id,'pivot_category_id');
	if(count($GD) > 0){
	foreach ($GD as $dg_val)
	{
	$cd = $CI->urs->getFullDetails(CATEGORY,'category_id',$dg_val['category_id'],'category_id');
	if(!empty($cd[0]['category_name']))
	{
	if($cd[0]['category_type'] == 'event')	
	$name[] = $cd[0]['category_name'];
	}
	}	
	if(count($name) > 0){
	$get_all_name = implode($name,',');
	}else{
	$get_all_name = 'No category found';
	}
	}else{
	$get_all_name = 'No category found';
	}

	return $get_all_name;
}

function show_category_name_class($id)
{
	$name = array();
	$CI =& get_instance();
	$CI->load->model('Users','urs');
	$GD = $CI->urs->getFullDetails(PIVOT_CATEGORY,'pivot_unique_id',$id,'pivot_category_id');
	if(count($GD) > 0){
	foreach ($GD as $dg_val)
	{
	$cd = $CI->urs->getFullDetails(CATEGORY,'category_id',$dg_val['category_id'],'category_id');
	if(!empty($cd[0]['category_name']))
	{
	if($dg_val['category_type'] == 'class')	
	$name[] = $cd[0]['category_name'];
	}
	}
		
	if(count($name) > 0){
	$get_all_name = implode($name,',');
	}else{
	$get_all_name = 'No category found';
	}
	}else{
	$get_all_name = 'No category found';
	}

	return $get_all_name;
}


function getCategoryDetails($id)
{
	$CI =& get_instance();
	$CI->load->model('Users','urs');
	return $cd = $CI->urs->getFullDetails(CATEGORY,'category_id',$id,'category_id');

}

################################### COMMON ##################################################
if ( ! function_exists('trimData'))
{
	function trimData($data)
	{
		return trim($data);
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('ltrimData'))
{
	function ltrimData($data)
	{
		return ltrim($data);
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('rtrimData'))
{
	function rtrimData($data)
	{
		return rtrim($data);
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('stripslashesData'))
{
	function stripslashesData($data)
	{
		return stripslashes($data);
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ( ! function_exists('escape_str'))
{
	function escape_str($str, $like = FALSE)
	{
		$db = get_instance()->db;
		if (is_array($str)){
		foreach ($str as $key => $val){
		$str[$key] = escape_str($val, $like);
		}
		return $str;
		}
		if (function_exists('mysqli_real_escape_string') AND is_object($db->conn_id)){
		$str = mysqli_real_escape_string($db->conn_id, $str);
		}else{
		$str = addslashes($str);
		}
		if ($like === TRUE){
		$str = str_replace(array('%', '_'), array('\\%', '\\_'), $str);
		}
		return $str;
	}
}
