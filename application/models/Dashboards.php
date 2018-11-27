<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboards extends CI_Model
{
	 private $__old_password;
	 private $__new_password;
	 private $__query;
	 private $__count;
	 private $__fetch;
	 private $sql;
	 private $exe;
	 private $__username;
	 private $__password;

//++++++++++++++++++++++++++++++ FOR ADMIN LOGIN ONLY ++++++++++++++++++++++++++++++++++++++++++
public function __construct()
{
	parent::__construct();
	$this->load->helper('filter');
}
//++++++++++++++++++++++++++++++ FOR ADMIN LOGIN ONLY ++++++++++++++++++++++++++++++++++++++++++
public function loginAdmins($tablename,$username,$password)
{
	if(!empty($username) and !empty($password) and !empty($tablename))
	{
	
	$password = md5($password);

	$this->db->select('*');
	$this->db->from('cmd_user');
	$this->db->where('email',$username);
	$this->db->where('password',$password);
	$this->db->where('user_type','Admin');

	$query_one = $this->db->get();
	$count_one = $query_one->num_rows();	
	if($count_one > 0){
	return $query_one->result_array();
	}else{
	return FALSE;
	}
	}else{
	return FALSE;
	}
}

//+++++++++++++++++++++++++++++ All Admin Details View +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_admin_details($tablename,$id=1)
{
	if(!empty($tablename) and !empty($id))
	{
	$this->sql = "SELECT * FROM ".$tablename." WHERE user_id='".$id."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
	}
}
//+++++++++++++++++++++++++++++ All Admin Details View +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_full_admin_details($id=1)
{
	if(!empty($id))
	{
	$this->sql = "SELECT * FROM ".USER." AS U INNER JOIN ".USER_DETAILS." AS D ON U.user_id = D.user_id WHERE U.user_id = '".$id."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
	}
}
//+++++++++++++++++++++++++++++ All Admin Details View +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_admin_setting($tablename,$id=1)
{
	if(!empty($tablename) and !empty($id))
	{
	$this->sql = "SELECT * FROM ".$tablename." WHERE setting_id='".$id."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++ ADMIN TABLE DATA FOR CHANGE PASSWORD ++++++++++++++++++++++++++++
public function change_passwords($tablename,$oldPassword,$newPassword)
{
	if(!empty($tablename) and !empty($oldPassword) and !empty($newPassword)){
	$this->data = $this->get_admin_details($tablename,1);
	$oldPassword = md5($oldPassword);
	$newPassword = md5($newPassword);
	if($this->data[0]['password'] == $oldPassword)
	{
	$data = array('password'=>$newPassword);
	$this->db->where('user_id', $this->data[0]['user_id']);
	$this->db->update($tablename, $data);
	return TRUE;
	}else{
	return FALSE;
	}
	}else{
	return FALSE;
	}
}
//++++++++++++++++++++++++++++++++++++++++++ADMIN TABLE DATA UPDATE+++++++++++++++++++++++++++++++++++++++++++++++++
public function adminDataUpdate($tablename1,$tablename2,$data)
{
	if((count($data) > 0) and ($tablename1 != '') and ($tablename2 != '')){

	$this->data = $this->get_admin_details($tablename1,1);

	$firstArray['email'] = $data['admin_email'];
	$this->db->where('user_id', $this->data[0]['user_id']);
	$this->db->update($tablename1, $firstArray);

	$secoundArray['first_name'] = $data['first_name'];
	$secoundArray['last_name']  = $data['last_name'];
	$this->db->where('user_id', $this->data[0]['user_id']);
	$this->db->update($tablename2, $secoundArray);

	return TRUE;
	}else{
	return FALSE;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function adminSettingDataUpdate($tablename,$data)
{
	if((count($data) > 0) and $tablename != ''){
	$this->data = $this->get_admin_setting($tablename,1);
	$this->db->where('setting_id', $this->data[0]['setting_id']);
	$this->db->update($tablename, $data);
	return TRUE;
	}else{
	return FALSE;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getFullDetails($tablename)
{
	if(!empty($tablename)){
	$this->sql = "SELECT * FROM ".$tablename."";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
	}
}

public function get_m_for_front($tablename)
{
	if(!empty($tablename)){
	$this->sql = "SELECT * FROM ".MEMBERSHIP." WHERE membership_status = 'Active' ORDER BY membership_category_id ASC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
	}
}
//++++++++++++++++++++++++++++++++++ All Members And Catagory View And Content +++++++++++++++++++++++++++++++++++++++
public function getFullUserDetailsTypeWise($type)
{
	if(!empty($type)){
	$this->sql = "SELECT * FROM ".USER." AS U INNER JOIN ".USER_DETAILS." AS D ON U.user_id = D.user_id WHERE U.user_type = '".$type."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
	}
}
public function getFullUserDetailsW()
{
	$this->sql = "SELECT * FROM ".USER." AS U RIGHT JOIN ".USER_DETAILS." AS D ON   U.user_id = D.user_id ";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++ All Members And Catagory View And Content +++++++++++++++++++++++++++++++++++++++
public function getFullUserDetailsIdWise($id)
{
	if(!empty($id)){
	$this->sql = "SELECT * FROM ".USER." AS U
				LEFT JOIN ".USER_DETAILS." AS D ON (U.user_id = D.user_id)
				LEFT JOIN ".ADDRESS." AS A ON (U.user_id = A.user_id)
				WHERE U.user_id = '".$id."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
	}
}
//+++++++++++++++++++++++++++++++++++++++Specific Edit List Members And Catagory View++++++++++++++++++++++++++++++
public function getListDatas($tablename='',$fildnmae='',$id='')
{

	if(!empty($tablename) and !empty($id)){
	$id  = escape_str($id);
	if($id){
	$this->sql = "SELECT * FROM ".$tablename." WHERE $fildnmae = ".$id." ORDER BY $fildnmae DESC";
	$this->exe = $this->db->query($this->sql);
	$this->__count = $this->exe->num_rows();
	if($this->__count > 0){
	return $this->exe->result_array();
	}else{
	return FALSE;
	}
	}else{
	return FALSE;
	}
	}else{
	return FALSE;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function update_array($data='',$id='',$tablename='',$fildname=''){

	if(!empty($id) and !empty($tablename) and (count($data) > 0)){
	$this->db->where($fildname,$id);
	$this->db->update($tablename, $data);
	return TRUE;
	}else{
	return FALSE;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_array($tablename='',$fiildname='',$id='')
{
	if(!empty($id) and !empty($tablename)){
	$this->db->query("DELETE FROM ".$tablename." WHERE $fiildname = ".$id."");
	return TRUE;
	}else{
	return FALSE;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_array_FK($tablename='',$fildname='',$id='')
{
	if(!empty($id) and !empty($tablename) and !empty($fildname)){
	$this->db->query("DELETE FROM ".$tablename." WHERE $fildname = ".$id."");
	return TRUE;
	}else{
	return FALSE;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_event_category($id='')
{
	if(!empty($id)){
	$this->db->query("DELETE FROM ".PIVOT_CATEGORY." WHERE pivot_unique_id = ".$id." AND category_type='event'");
	return TRUE;
	}else{
	return FALSE;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_new_category($id='')
{
	if(!empty($id)){
	$this->db->query("DELETE FROM ".PIVOT_CATEGORY." WHERE pivot_unique_id = ".$id." AND category_type='news'");
	return TRUE;
	}else{
	return FALSE;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_class_category($id='')
{
	if(!empty($id)){
	$this->db->query("DELETE FROM ".PIVOT_CATEGORY." WHERE pivot_unique_id = ".$id." AND category_type='class'");
	return TRUE;
	}else{
	return FALSE;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_event_category_type($id='',$type='')
{
	if(!empty($id)){
	$this->db->query("DELETE FROM ".PIVOT_CATEGORY." WHERE pivot_unique_id = ".$id." AND category_type='".$type."'");
	return TRUE;
	}else{
	return FALSE;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function insert_array($tablename,$data)
{
	if((count($data) > 0) and (!empty($tablename))){
	$this->db->insert($tablename, $data);
	$insert_id = $this->db->insert_id();
	if(!empty($insert_id))
	return $insert_id;
	else
	return FALSE;
	}else{
	return FALSE;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function insert_array_batch($tablename,$data)
{
	if((count($data) > 0) and (!empty($tablename))){
	$this->db->insert_batch($tablename, $data);
	$insert_id = $this->db->insert_id();
	if(!empty($insert_id))
	return $insert_id;
	else
	return FALSE;
	}else{
	return FALSE;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getCatagoryDetails($tablename,$type)
{
	if(!empty($tablename) && !empty($type))
	{
	$this->sql = "SELECT * FROM ".$tablename." WHERE parent_id = '0' AND category_type='".$type."' ORDER BY category_id DESC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getSubOfCategoryName()
{
	$this->sql = "SELECT c1.category_name catnm,
						 c2.category_id,
						 c2.category_name sucatnm,
						 c2.status,
						 c2.create_date
						 FROM ".CATEGORY." c1 LEFT JOIN ".CATEGORY." c2 ON c2.parent_id = c1.category_id
						 WHERE c1.parent_id = 0 AND c2.parent_id <> 0";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function check_data_exist($tablename,$fildname, $value)
{
	if(!empty($tablename) && !empty($fildname) && !empty($value))
	{
	$sql  = "SELECT * FROM ".$tablename." WHERE $fildname ='".$value."'";
	$this->__query = $this->db->query($sql);
	$this->__count = $this->__query->num_rows();
	if( $this->__count > 0 )
	return TRUE;
	else
	return FALSE;
	}else{
	return FALSE;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_event_full_admin($id)
{

	$this->sql  = "SELECT * FROM ".EVENT." AS  e ";
	$this->sql .= "INNER JOIN ".EVENT_IMAGE." AS i ON e.event_id = i.event_id ";
	$this->sql .= "INNER JOIN ".CITY." AS c ON c.city_id = e.city_id ";
	$this->sql .= "INNER JOIN ".COUNTRY." AS u ON u.country_id = e.country_id WHERE e.user_id = '".$id."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();

}
public function get_event_full_class($id)
{

	$this->sql  = "SELECT * FROM cmd_trainer_class AS  class_data ";
	$this->sql .= "LEFT JOIN ".EVENT." AS i ON   i.event_id   = class_data.event_id ";
	$this->sql .= "LEFT JOIN ".CITY." AS c ON    c.city_id    = class_data.city_id ";
	$this->sql .= "LEFT JOIN ".COUNTRY." AS u ON u.country_id = class_data.country_id ";
	if($id == 1){
	$this->sql .= "WHERE class_data.user_id = '".$id."'";
	}
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();

}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_event_full_all()
{
	$this->sql  = "SELECT * FROM ".EVENT." AS  e ";
	$this->sql .= "LEFT JOIN ".EVENT_IMAGE." AS i ON e.event_id = i.event_id ";
	$this->sql .= "LEFT JOIN ".CITY." AS c ON c.city_id = e.city_id ";
	$this->sql .= "LEFT JOIN ".COUNTRY." AS u ON u.country_id = e.country_id ";
	//echo $this->sql;
	//die();
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();

}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_space($id='')
{
	$this->sql  = "SELECT * FROM cmd_business AS  e ";
	$this->sql .= "LEFT JOIN ".CITY." AS c ON c.city_id = e.city_id ";
	$this->sql .= "LEFT JOIN ".COUNTRY." AS u ON u.country_id = e.country_id ";
	if(!empty($id)){
		$this->sql .= " WHERE e.user_id = '".$id."' ";
	}
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_space_full_all($id='')
{
	$sql  = "SELECT * FROM cmd_business AS  b ";
	$sql .= "INNER JOIN ".USER." AS c ON c.user_id = b.user_id ";
	$sql .= "INNER JOIN ".USER_DETAILS." AS d ON d.user_id = b.user_id ";
	$sql .= "INNER JOIN ".ADDRESS." AS e ON e.user_id = b.user_id ";
	$sql .= "INNER JOIN ".CITY." AS f ON f.city_id = b.city_id ";
	$sql .= "INNER JOIN ".COUNTRY." AS g ON g.country_id = b.country_id ";

	if(!empty($id)){
	$sql .= "WHERE b.user_id = '".$id."'";
	}

	$exe  = $this->db->query($sql);
	return  $exe->result_array();

}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getCategoryNameEvent($cate_id)
{
	if(!empty($cate_id)){
	$this->sql = "SELECT name FROM  ".CATEGORY." WHERE  id = '".$cate_id."'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->result_array();
	return $data[0]['name'];
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_city_list($tablename1,$tablename2)
{
	if(!empty($tablename1) and !empty($tablename2))
	{
	$this->sql = "SELECT TBL_1.*,TBL_2.country_name FROM  ".$tablename1." AS TBL_1 INNER JOIN ".$tablename2." AS TBL_2 ON TBL_1.country_id = TBL_2.country_id  WHERE  type = '1'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->result_array();
	return $data;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getReqestedCity($tablename1)
{
	if(!empty($tablename1))
	{
	$this->sql = "SELECT * FROM  ".CITY." WHERE  type = '0'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->result_array();
	return $data;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_ajax_city($e)
{
	if(!empty($e)){
	$this->sql = "SELECT * FROM  ".CITY." WHERE  country_id = '".$e."'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->result_array();
	return $data;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getMemberDetails($id)
{
	if(!empty($id)){
	$this->sql = "SELECT * FROM  ".MEMBERSHIP." WHERE  membership_id = '".$id."'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->result_array();
	return $data;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_news_blog_full($tablename1='',$tablename2='',$tablename3='',$type='')
{
	$data_sql = '';
	$data_exe = '';

	if(!empty($tablename1) && !empty($tablename2) && !empty($tablename3) && !empty($type))
	{

	$data_sql .= " SELECT * FROM ";
	$data_sql .= " ".$tablename1." ";
	$data_sql .= "LEFT JOIN ".$tablename2." ON ".$tablename1.".country_id = ".$tablename2.".country_id ";
	$data_sql .= "LEFT JOIN ".$tablename3." ON ".$tablename1.".city_id = ".$tablename3.".city_id ";
	$data_sql .= "WHERE  ".$tablename1." .blog_news_type = '".$type."' ";
	$data_sql .= "AND ".$tablename1.".user_id <> 1 ";

	$data_exe  = $this->db->query($data_sql);
	return $data_exe->result_array();

	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_news_full_admin($tablename1='',$tablename2='',$tablename3='',$id='')
{
	if(!empty($tablename1) && !empty($tablename2) && !empty($tablename3) && !empty($id))
	{
	$this->sql .= " SELECT * FROM ";
	$this->sql .= " ".$tablename1." ";
	$this->sql .= "LEFT JOIN ".$tablename2." ON ".$tablename1.".country_id = ".$tablename2.".country_id ";
	$this->sql .= "LEFT JOIN ".$tablename3." ON ".$tablename1.".city_id = ".$tablename3.".city_id
	WHERE ".$tablename1.".user_id='".$id."' AND ".$tablename1.".blog_news_type = 'news'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_blog_full_admin($tablename1='',$tablename2='',$tablename3='',$id='')
{
	if(!empty($tablename1) && !empty($tablename2) && !empty($tablename3) && !empty($id))
	{
	$this->sql .= " SELECT * FROM ";
	$this->sql .= " ".$tablename1." ";
	$this->sql .= "LEFT JOIN ".$tablename2." ON ".$tablename1.".country_id = ".$tablename2.".country_id ";
	$this->sql .= "LEFT JOIN ".$tablename3." ON ".$tablename1.".city_id = ".$tablename3.".city_id
				   WHERE ".$tablename1.".user_id='".$id."' AND ".$tablename1.".blog_news_type = 'news' ";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_pivot_category($type,$pivot_unique_id)
{
    if(!empty($type) && !empty($pivot_unique_id))
	{
	$this->sql = "SELECT * FROM ".PIVOT_CATEGORY." WHERE category_type='".$type."' AND pivot_unique_id='".$pivot_unique_id."'";
    $this->exe = $this->db->query($this->sql);
    return  $this->__fetch =  $this->exe->result_array();
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function deleteCheckBoxUser($id)
{
	if(!empty($id)){
		$get_data  = $this->getFullUserDetailsIdWise($id);
		$getStatus =  ($get_data[0]['status'] == 'Active')? 'Inactive' : 'Active' ;
		$this->db->query("UPDATE ".USER." SET status='".$getStatus."' WHERE user_id = ".$id."");
		return TRUE;
	}else{
		return FALSE;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function updateCheckBoxUser($id)
{
	if(!empty($id)){
		$get_data  = $this->dashs->getListDatas('cmd_trainer_class','trainer_class_id',$id);
		$getStatus =  ($get_data[0]['trainer_class_status'] == 'Active')? 'Inactive' : 'Active' ;
		$this->db->query("UPDATE cmd_trainer_class SET trainer_class_status='".$getStatus."' WHERE trainer_class_id = ".$id."");
		return TRUE;
	}else{
		return FALSE;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_sql_count($sql)
{
	if(!empty($sql))
	{
		$sql  = $sql;
		$this->__query = $this->db->query($sql);
		$this->__count = $this->__query->num_rows();
		if( $this->__count > 0 )
		return $this->__count;
		else
		return FALSE;
		}else{
		return FALSE;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getSubcategoryName($id)
{
	if(!empty($id))
	{
		$sql  = "SELECT * FROM ".CATEGORY." WHERE parent_id='".$id."'";
		$this->__query = $this->db->query($sql);
		$this->__fetch =  $this->__query->result_array();
		return $this->__fetch;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getProductPicture($id)
{
	if(!empty($id))
	{
		$sql  = "SELECT * FROM ".PRODUCT_IMAGES." WHERE product_id='".$id."'";
		$this->__query = $this->db->query($sql);
		$this->__fetch =  $this->__query->result_array();
		return $this->__fetch;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getEventCategoryList($event_id)
{
	$sql = "SELECT GROUP_CONCAT(category_id) AS category_id FROM ".PIVOT_CATEGORY." WHERE pivot_unique_id='".$event_id."' AND category_type='event'";
	$this->__query = $this->db->query($sql);
	$this->__fetch =  $this->__query->result_array();
	return $this->__fetch;
}
public function getClassCategoryList($event_id)
{
	$sql = "SELECT GROUP_CONCAT(category_id) AS category_id FROM ".PIVOT_CATEGORY." WHERE pivot_unique_id='".$event_id."' AND category_type='class'";
	$this->__query = $this->db->query($sql);
	$this->__fetch =  $this->__query->result_array();
	return $this->__fetch;
}
public function getBlogCategoryList($event_id)
{
	$sql = "SELECT GROUP_CONCAT(category_id) AS category_id FROM ".PIVOT_CATEGORY." WHERE pivot_unique_id='".$event_id."' AND category_type='news'";
	$this->__query = $this->db->query($sql);
	$this->__fetch =  $this->__query->result_array();
	return $this->__fetch;
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getSpaceCategoryList($id)
{
	$sql = "SELECT GROUP_CONCAT(category_id) AS category_id FROM ".PIVOT_CATEGORY." WHERE pivot_unique_id='".$id."' AND category_type='business'";
	$this->__query = $this->db->query($sql);
	$this->__fetch =  $this->__query->result_array();
	return $this->__fetch;
}
//END CLASS
}
