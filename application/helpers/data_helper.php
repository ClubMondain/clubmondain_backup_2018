<?php
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	function get_invite_space_details($id)
	{
		$get_invite_space_details = '';

		$CI = & get_instance();
        $CI->load->model('EnergiserData','energiserdata');
		$invite_details = $CI->energiserdata->getSpaceName($id);
		return $invite_details->business_name;
		
	}
	
	function get_invite_space_company_name($id)
	{
		$get_invite_space_details = '';
		$CI = & get_instance();
        $CI->load->model('EnergiserData','energiserdata');
		$invite_details = $CI->energiserdata->getInvteSpaceDetalis($id);
		return $invite_details->user_id;
		
	}
	
	
	
	function get_company_id($id)
	{
		$get_invite_space_details = '';

		$CI = & get_instance();
        $CI->load->model('EnergiserData','energiserdata');
		$invite_details = $CI->energiserdata->getSpaceName($id);
		return $invite_details->user_id;
		
	}
	
	
	function checkEnergiserExist($id){		
		$CI = & get_instance();
		$CI->load->model('EnergiserData','energiserdata');
		$get_invite_space_details = $CI->energiserdata->getExistEnergiser($id);
		return $get_invite_space_details;
	}
	
	
	
	function getCompanyname($companyid)
	{
		$get_invite_space_details = '';

		$CI = & get_instance();
        $CI->load->model('EnergiserData','energiserdata');
		$get_invite_space_details = $CI->energiserdata->getCompanyname($companyid);		
		return $get_invite_space_details->company_name;
		
	}
	
	function getInvitedPeople($space_id){
		$get_invited_pple = '';
		$CI = & get_instance();
		$CI->load->model('EnergiserData','energiserdata');
		$get_invited_pple = $CI->energiserdata->getInvitedPeople($space_id);
		return $get_invited_pple;
	}
	
	
	function getEnergisername($space_id)
	{
		$get_energiser_details = '';
		$CI = & get_instance();
        $CI->load->model('EnergiserData','energiserdata');
		$get_energiser_details = $CI->energiserdata->getEnergisername($space_id);
		return $get_energiser_details->trainer_class_name;
		
	}
	
	
	function getEnergizerDetails($energiser_id)
	{
		$get_energiser_details = '';
		$CI = & get_instance();
        $CI->load->model('EnergiserData','energiserdata');
		$get_energiser_details = $CI->energiserdata->getEnergisername($energiser_id);
		return $get_energiser_details->class_no_of_booking;
		
	}
	
	
	function getEnergizerJoinedPeople($energiser_id)
	{
		$get_energiser_details = '';
		$CI = & get_instance();
        $CI->load->model('EnergiserData','energiserdata');
		$get_energiser_details = $CI->energiserdata->getEnergizerJoinedPeople($energiser_id);
		return $get_energiser_details;
		
	}
	
	
	
	function getCityname($city_id){
		$get_city_details = '';
		$CI = & get_instance();
        $CI->load->model('EnergiserData','energiserdata');
		$get_city_details = $CI->energiserdata->getCityname($city_id);
		return $get_city_details->city_name;
	}
	
	function getCountryname($country_id){
		$get_country_details = '';
		$CI = & get_instance();
        $CI->load->model('EnergiserData','energiserdata');
		$get_country_details = $CI->energiserdata->getCountryname($country_id);
		return $get_country_details->country_name;
	}
	
	
	
	
	
function get_category_name($id)
{

	$name = array();
	$CI =& get_instance();
	$CI->load->model('Users','urs');
	$CI->load->model('EnergiserData','energiserdata');
	//$GD = $CI->urs->getFullDetails(PIVOT_CATEGORY,'pivot_unique_id',$id,'pivot_category_id');
	
	$msgsection['get_cate_id']   = $CI->energiserdata->get_pivot_category('invite_space',$id);	
	for($i=0; $i <count($msgsection['get_cate_id']);$i++){
			$msgsection['get_cate_val'][] = $msgsection['get_cate_id'][$i]['category_id'];
		}
	
	if(count($msgsection['get_cate_val']) > 0){
	foreach ($msgsection['get_cate_val'] as $dg_val)
	{
	$cd = $CI->urs->getFullDetails(CATEGORY,'category_id',$dg_val,'category_id');
	if(!empty($cd[0]['category_name']))
	{
	if($cd[0]['category_type'] == 'event')	
	$name[] = $cd[0]['category_name'];
	}
	}	
	if(count($name) > 0){
	$get_all_name = implode($name,' ,');
	}else{
	$get_all_name = 'No category found';
	}
	}else{
	$get_all_name = 'No category found';
	}
	return $get_all_name;
}
	
	
	
	
function get_energizer_category_name($id)
{

	$name = array();
	$CI =& get_instance();
	$CI->load->model('Users','urs');
	$CI->load->model('EnergiserData','energiserdata');
	//$GD = $CI->urs->getFullDetails(PIVOT_CATEGORY,'pivot_unique_id',$id,'pivot_category_id');
	
	$msgsection['get_cate_id']   = $CI->energiserdata->get_pivot_category('energiser_space',$id);	
	for($i=0; $i <count($msgsection['get_cate_id']);$i++){
			$msgsection['get_cate_val'][] = $msgsection['get_cate_id'][$i]['category_id'];
		}
	
	if(count($msgsection['get_cate_val']) > 0){
	foreach ($msgsection['get_cate_val'] as $dg_val)
	{
	$cd = $CI->urs->getFullDetails(CATEGORY,'category_id',$dg_val,'category_id');
	if(!empty($cd[0]['category_name']))
	{
	if($cd[0]['category_type'] == 'event')	
	$name[] = $cd[0]['category_name'];
	}
	}	
	if(count($name) > 0){
	$get_all_name = implode($name,' ,');
	}else{
	$get_all_name = 'No category found';
	}
	}else{
	$get_all_name = 'No category found';
	}
	return $get_all_name;
}	
	


//+++++++++++++++++++++++++++++++ Check Energiser seat already filled up or not +++++++++++++++++++++++++++++++++++++++++++++++++

function getCheckEnergiserSeatAlreadyFilledUpNot($energizer_id)
{
	$CI =& get_instance();	
	$energiser_total_booking_seat = $CI->energiserdata->getEnergiserTotalBookingSeat($energizer_id);
	return $energiser_total_booking_seat;
}
//+++++++++++++++++++++++++++++++ Check Energiser seat already filled up or not +++++++++++++++++++++++++++++++++++++++++++++++++
	
//+++++++++++++++++++++++++++++++ Check Weather Energiser is joined or not +++++++++++++++++++++++++++++++++++++++++++++++++

function getCheckEnergiserJoinedOrNot($user_id,$energizer_id)
{
	$CI =& get_instance();
	$CI->sql = "SELECT * FROM  ".JOIN_US_ENERGIZER." WHERE  user_id = '".$user_id."' AND trainer_class_id = '".$energizer_id."'";
	$CI->exe = $CI->db->query($CI->sql);
	return $CI->exe->num_rows();
	
}
//+++++++++++++++++++++++++++++++ Check Weather Energiser is joined or not +++++++++++++++++++++++++++++++++++++++++++++++++



function getUserDetails($user_id)
{
	$CI =& get_instance();
	$CI->sql = "SELECT * FROM  ".USER." WHERE  user_id = '".$user_id."'";
	$CI->exe = $CI->db->query($CI->sql);
	return $CI->exe->row_array();
	
}





function getUserexistToCSV($space_id,$email_id)
{
	$CI =& get_instance();	
	$user_exist_tocsv = $CI->energiserdata->getUserexistToCSV($space_id,$email_id);
	return $user_exist_tocsv;
}	
	
	
function getInviteSpaceId($energizer_id)
{
	$get_energiser_details = '';
	$CI = & get_instance();
	$CI->load->model('EnergiserData','energiserdata');
	$get_energiser_details = $CI->energiserdata->getInviteSpaceId($energizer_id);
	return $get_energiser_details->space_id;
		
}

function getEnergizerName($energizer_id){
	$get_energiser_details = '';
	$CI = & get_instance();
	$CI->load->model('EnergiserData','energiserdata');
	$get_energiser_details = $CI->energiserdata->getEnergizerName($energizer_id);
	return $get_energiser_details->trainer_class_name;
}	
	
	
	
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++





















