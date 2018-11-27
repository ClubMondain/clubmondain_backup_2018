<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EnergiserData extends CI_Model
{
	 private $__username;
	 private $__email;
	 private $__password;
	 private $__query;
	 private $__count;
	 private $__fetch;
	 private $sql;
	 public function __construct()
	 {
		parent::__construct();
	 }
//+++++++++++++++++++++++++++++++ Details All Data +++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getFullDetails($Tablename,$field_name='',$field_id='',$primary_id='')
{
	$this->sql = "SELECT * FROM ".$Tablename." 
	WHERE ".$field_name." = '".$field_id."' ORDER BY ".$primary_id." DESC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}

public function getCityFullDetails($Tablename,$field_name='',$field_id='',$primary_id='')
{
	$this->sql = "SELECT * FROM ".$Tablename." 
	WHERE ".$field_name." = '".$field_id."' ORDER BY `city_name` ASC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}




public function fetchmembership($Tablename,$field_name='',$field_id='',$primary_id='')
{
	$this->sql = "SELECT * FROM ".$Tablename." WHERE ".$field_name." = '".$field_id."' ORDER BY membership_type  ASC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}


public function getAllCategoryList()
{
	$this->sql = "SELECT * FROM ".CATEGORY." 
				  WHERE `category_type` = 'event' 
				  AND status ='Active' ORDER BY `category_name` ASC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}

//+++++++++++++++++++++++++++++++ Details All Data +++++++++++++++++++++++++++++++++++++++++++++++++
public function getEventStoreDetailsbylimit($Tablename,$status_field='',$table_id,$limit_value)
{
	$this->sql = "SELECT * FROM ".$Tablename." WHERE ".$status_field." = 'Active' ORDER BY ".$table_id." DESC LIMIT 0,".$limit_value."";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++ Details Active Data +++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getFullActiveDetails($Tablename,$field_name='',$field_id='',$primary_id='',$status_field)
{
	$this->sql = "SELECT * FROM ".$Tablename." WHERE ".$field_name." = '".$field_id."' And ".$status_field."= 'Active' ORDER BY ".$primary_id." DESC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++Use Country Details,City Details ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getCountryDetails($TableName='',$primary_id='')
{
	if($TableName == 'cmd_country'){
	$this->sql = "SELECT * FROM ".$TableName." ORDER BY `country_name` ASC";
	}else{
	$this->sql = "SELECT * FROM ".$TableName." ORDER BY `city_name` ASC";
	}
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++ Insert All Data +++++++++++++++++++++++++++++++++++++++++++++++++++++
public function InsertDatas($TableName,$data)
{
	$this->db->insert($TableName, $data);
	$insert_id = $this->db->insert_id();
	if(!empty($insert_id))
	return $insert_id;
	else
	return FALSE;
}

//+++++++++++++++++++++++++++++++ Insert CSV  Data +++++++++++++++++++++++++++++++++++++++++++++++++++++
public function insert_csv_data($TableName,$data)
{
	for($i=0;$i<count($data);$i++){
		$this->db->insert($TableName, $data[$i]);
	}
	$insert_id = $this->db->insert_id();
	if(!empty($insert_id))
	return $insert_id;
	else
	return FALSE;
}

//+++++++++++++++++++++++++++++++ Insert CSV  Data+++++++++++++++++++++++++++++++++++++++++++++++++++++


//+++++++++++++++++++++++++++++++ Insert Individual CSV USER +++++++++++++++++++++++++++++++++++++++++++++++++++++

public function insert_user_to_csv($TableName,$data)
{
	$this->db->insert($TableName, $data);
	$insert_id = $this->db->insert_id();
	if(!empty($insert_id))
	return $insert_id;
	else
	return FALSE;
}

//+++++++++++++++++++++++++++++++ Insert Individual CSV USER +++++++++++++++++++++++++++++++++++++++++++++++++++++




//+++++++++++++++++++++++++++++++ Insert CSV Code Aanalizer Data +++++++++++++++++++++++++++++++++++++++++++++++++++++
public function insert_code_analizer_data($TableName,$data)
{
	$this->db->insert($TableName, $data);
	$insert_id = $this->db->insert_id();
	if(!empty($insert_id))
	return $insert_id;
	else
	return FALSE;
}

//+++++++++++++++++++++++++++++++ Insert CSV Code Aanalizer Data +++++++++++++++++++++++++++++++++++++++++++++++++++++


public function DeleteRegisterEnergizer($TABLENAME,$data)
{
	$this->db->delete($TABLENAME, $data);
	return TRUE;
}






//+++++++++++++++++++++++++++++++ Register  energizer Data +++++++++++++++++++++++++++++++++++++++++++++++++++++
public function register_energizer($TableName,$data)
{
	$this->db->insert($TableName, $data);
	$insert_id = $this->db->insert_id();
	if(!empty($insert_id))
	return $insert_id;
	else
	return FALSE;
}

//+++++++++++++++++++++++++++++++ Register  energizer Data +++++++++++++++++++++++++++++++++++++++++++++++++++++










//+++++++++++++++++++++++++++++++++++++++++Specific Update User ++++++++++++++++++++++++++++++++++
public function UpdateAllDatas($data='',$id='',$TABLENAME='')
{
	$this->db->WHERE('user_id',$id);
	$this->db->UPDATE($TABLENAME, $data);
	return TRUE;
}
//+++++++++++++++++++++++++++++++++++++++++Specific Update Event ++++++++++++++++++++++++++++++++++
public function UpdateDatas($data='',$id='',$TABLENAME='',$field_name)
{
	$this->db->WHERE($field_name,$id);
	$this->db->UPDATE($TABLENAME, $data);
	return TRUE;
}

public function UpdateCsvEnergiser($data='',$id='',$TABLENAME='',$field_name)
{
	$this->db->WHERE($field_name,$id);
	$this->db->UPDATE($TABLENAME, $data);
	return TRUE;
}




//+++++++++++++++++++++++++++++++ Details All Data (WORKED)+++++++++++++++++++++++++++++++++++++++++++++++++
public function getFullUserDetails($Tablename,$id='',$primary_id='')
{
	$this->sql = "SELECT * FROM ".$Tablename." WHERE $primary_id ='".$id."'ORDER BY ".$primary_id." DESC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}


public function getInviteSpaceDetails($Tablename,$invite_type)
{
	$this->sql = "SELECT * FROM ".$Tablename." WHERE invite_type ='".$invite_type."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}


public function getEnergiserDetails($Tablename1,$Tablename2, $id='',$primary_id='', $use_mail='')
{
	$this->sql = "SELECT * FROM ".$Tablename1." WHERE trainer_class_id IN ( SELECT energiser_id FROM ".$Tablename2." WHERE $primary_id ='".$id."' AND email = '".$use_mail."')";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}

public function getEnergiserDetailsPublic($Tablename1, $id='',$primary_id='')
{
	$this->sql = "SELECT * FROM ".$Tablename1." WHERE $primary_id ='".$id."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}



public function getFullUserDetails_city($Tablename,$id='',$primary_id='')
{
	$this->sql = "SELECT * FROM ".$Tablename." WHERE $primary_id ='".$id."' AND city_status = 'Active'  ORDER BY ".$primary_id." DESC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++Get Ivite Space Details Start+++++++++++++++++++++++++++++++++++++
public function getInviteSpace($TableName)
{
	$this->sql = "SELECT * FROM ".$TableName."";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++Get Ivite Space Details End+++++++++++++++++++++++++++++++++++++


public function getSpaceName($id)
{
	if(!empty($id)){
	$this->sql = "SELECT * FROM  ".INVITE_SPACE." WHERE  business_id = '".$id."'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->row();
	return $data;
	}
}



public function getInvteSpaceDetalis($id)
{
	if(!empty($id)){
	$this->sql = "SELECT * FROM  ".INVITE_SPACE." WHERE  business_id = '".$id."'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->row();
	return $data;
	}
}



public function getExistEnergiser($spaceid)
{
	if(!empty($spaceid)){
	$this->sql = "SELECT * FROM  ".ENERGISER." WHERE  space_id = '".$spaceid."'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->result_array();
	return $this->exe->num_rows();
	}
}


public function getCompanyname($companyid)
{
	if(!empty($companyid)){
	$this->sql = "SELECT * FROM  ".USER_DETAILS." WHERE  user_id = '".$companyid."'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->row();
	return $data;
	}
}


public function getEnergisername($space_id)
{
	if(!empty($space_id)){
	$this->sql = "SELECT * FROM  ".ENERGISER." WHERE  space_id = '".$space_id."'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->row();
	return $data;
	}
}



public function getInviteSpaceId($energizer_id)
{
	if(!empty($energizer_id)){
	$this->sql = "SELECT * FROM  ".ENERGISER." WHERE  trainer_class_id = '".$energizer_id."'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->row();
	return $data;
	}
}

public function getEnergizerName($energizer_id)
{
	if(!empty($energizer_id)){
	$this->sql = "SELECT * FROM  ".ENERGISER." WHERE  trainer_class_id = '".$energizer_id."'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->row();
	return $data;
	}
}




public function getCityname($city_id)
{
	if(!empty($city_id)){
	$this->sql = "SELECT * FROM cmd_city WHERE city_id = '".$city_id."'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->row();
	return $data;
	}
}

public function getCountryname($country_id)
{
	if(!empty($country_id)){
	$this->sql = "SELECT * FROM cmd_country WHERE country_id = '".$country_id."'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->row();
	return $data;
	}
}





public function getCsvdetails($csv_id)
{
	if(!empty($csv_id)){
	$this->sql = "SELECT * FROM  ".ERERGISER_CSV." WHERE  id = '".$csv_id."'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->row();
	return $data;
	}
}


public function getEnergiserCodeAnalizer($token)
{
	if(!empty($token)){
	$this->sql = "SELECT * FROM  ".ERERGISER_CODE_ANALIZER." WHERE  token = '".$token."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->num_rows();
	}
}

public function getEnergiserCodeAnalizerForExitEnergizer($space_id,$user_id)
{
	
	$this->sql = "SELECT * FROM  ".ERERGISER_CODE_ANALIZER." WHERE  space_id = '".$space_id."' AND user_id = '".$user_id."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->num_rows();
	
}

public function getCsvdetailsForUserNotForEnergizer($space_id,$mail_id)
{
	
	$this->sql = "SELECT * FROM  ".ERERGISER_CSV." WHERE  space_id = '".$space_id."' AND email = '".$mail_id."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->num_rows();
	
}




public function getEnergiserSeatCount($energiser_id)
{
	if(!empty($energiser_id)){
	$this->sql = "SELECT * FROM  ".ENERGISER." WHERE  trainer_class_id = '".$energiser_id."'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->row();
	return $data;
	}
}


public function getEnergiserTotalBookingSeat($energiser_id)
{
	if(!empty($energiser_id)){
	$this->sql = "SELECT * FROM  ".JOIN_US_ENERGIZER." WHERE trainer_class_id = '".$energiser_id."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->num_rows();
	}
}


public function getEnergizerJoinedPeople($energiser_id)
{
	if(!empty($energiser_id)){
	$this->sql = "SELECT * FROM  ".JOIN_US_ENERGIZER." WHERE  trainer_class_id = '".$energiser_id."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->num_rows();
	}
}

public function getViewEnergizerJoinedPeople($energizer_id){
	
		$this->db->select('t1.email,t3.phone,t3.first_name,t3.last_name');
    	$this->db->from('cmd_joining_us_energizer as t2');
   		$this->db->join('cmd_user as t1','t1.user_id = t2.user_id'); 
   		$this->db->join('cmd_user_details as t3','t2.user_id = t3.user_id'); 
   		$this->db->WHERE('t2.trainer_class_id',$energizer_id);
    	$query = $this->db->get();
    	return $query->result();
}

public function getUserexistToCSV($space_id,$email)
{
	if(!empty($email)){
	$this->sql = "SELECT * FROM  ".ERERGISER_CSV." WHERE  space_id = '".$space_id."' AND email = '".$email."'";
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->num_rows();
	return $data;
	}
}


public function getCsvdetailsUsingEmailID($email_id,$space_id)
{
	if(!empty($email_id)){
	$this->sql = "SELECT * FROM  ".ERERGISER_CSV." WHERE  space_id = '".$space_id."' AND email = '".$email_id."'";	
	$this->exe = $this->db->query($this->sql);
	$data = $this->exe->row();
	return $data;
	}
}




public function getInvitedPeople($space_id)
{
	if(!empty($space_id)){
	$this->sql = "SELECT * FROM  ".ERERGISER_CSV." WHERE  space_id = '".$space_id."'";
	$this->exe = $this->db->query($this->sql);
	$count= $this->exe->num_rows();
	return $count;
	}
}



public function getAllEmailOfThisSpace($space_id)
{
	if(!empty($space_id)){
	$this->sql = "SELECT * FROM  ".ERERGISER_CSV." WHERE  space_id = '".$space_id."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
	}
}


public function getUserexist($mailid)
{
	$sql = "SELECT * FROM ".USER." WHERE email='".$mailid."'";
	$this->exe = $this->db->query($sql);
	return  $this->exe->num_rows();
}

public function getUser($mailid)
{
	$sql = "SELECT * FROM ".USER." WHERE email='".$mailid."'";
	$this->exe = $this->db->query($sql);
	return  $this->exe->row();
}


public function getUserEmail($user_id)
{
	$sql = "SELECT * FROM ".USER." WHERE user_id='".$user_id."'";
	$this->exe = $this->db->query($sql);
	return  $this->exe->row();
}



//+++++++++++++++++++++++++++++++ Get Pivot category +++++++++++++++++++++++++++++++++++++++++++++++++

public function get_pivot_category($type,$pivot_unique_id)
{
    if(!empty($type) && !empty($pivot_unique_id))
	{
	$this->sql = "SELECT * FROM ".PIVOT_CATEGORY." WHERE category_type='".$type."' AND pivot_unique_id='".$pivot_unique_id."'";
    $this->exe = $this->db->query($this->sql);
    return  $this->__fetch =  $this->exe->result_array();
	}
}
//+++++++++++++++++++++++++++++++ Get Pivot category+++++++++++++++++++++++++++++++++++++++++++++++++


public function getCatagoryDetails($tablename,$type)
{
	if(!empty($tablename) && !empty($type))
	{
	$this->sql = "SELECT * FROM ".$tablename." WHERE parent_id = '0' AND category_type='".$type."' ORDER BY category_id DESC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
	}
}


public function delete_array($tablename='',$fiildname='',$id='')
{
	if(!empty($id) and !empty($tablename)){
	$this->db->query("DELETE FROM ".$tablename." WHERE $fiildname = ".$id."");
	return TRUE;
	}else{
	return FALSE;
	}
}


public function delete_pivot($tablename='',$fiildname='',$id='',$fildtype)
{
	if(!empty($id) and !empty($tablename)){
	$this->db->query("DELETE FROM ".$tablename." WHERE $fiildname = ".$id." AND category_type = '".$fildtype."' ");
	return TRUE;
	}else{
	return FALSE;
	}
}


public function getTypeDetails($Tablename,$id='',$primary_id='',$field_name='',$field_id='')
{
	$this->sql = "SELECT * FROM ".$Tablename." WHERE $primary_id ='".$id."' and ".$field_name." ='".$field_id."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
public function get_banner_details($id)
{
	$this->sql = "SELECT * FROM cmd_banner WHERE page_name = '".$id."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++ Details All Data (WORKED)+++++++++++++++++++++++++++++++++++++++++++++++++
public function getUserDetailsbylimit($Tablename,$id='',$primary_id='')
{
	$this->sql = "SELECT * FROM ".$Tablename." WHERE $primary_id ='".$id."' and blog_news_status = 'Active' LIMIT 0,6";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++ Details All Data (WORKED)+++++++++++++++++++++++++++++++++++++++++++++++++
public function getDetailsbylimit($Tablename,$id='',$primary_id='',$status,$order_field)
{
	$this->sql = "SELECT * FROM ".$Tablename." WHERE $primary_id ='".$id."' and ".$status." = 'Active' ORDER BY ".$order_field." DESC LIMIT 0,6";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++ Details All Data +++++++++++++++++++++++++++++++++++++++++++++++++
public function getDetailsbyLimitCount($Tablename,$id='',$primary_id='',$status,$order_field)
{
	$this->sql = "SELECT *, (select count(".MEET_UP_COMMENTS.".{$order_field}) from ".MEET_UP_COMMENTS." where ".MEET_UP_COMMENTS.".{$order_field} = {$Tablename}.{$order_field} GROUP BY {$order_field}) count_comments,(
    IF(`user_id`=0,'',(
            SELECT CONCAT(`first_name`,' ',`last_name`) FROM ".USER_DETAILS."  WHERE `user_id` = ".MEET_UP.".`user_id`
        ))
    ) `user_name`,(
    IF(`user_id`=0,'',(
            SELECT `company_name` FROM ".USER_DETAILS." WHERE `user_id` = ".MEET_UP.".`user_id`
        ))
    ) `company_name`  FROM ".$Tablename." WHERE $primary_id ='".$id."' and ".$status." = 'Active' ORDER BY ".$order_field." DESC LIMIT 0,6";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++++++++++++++ ALL TABLE DATA FOR CHANGE PASSWORD ++++++++++++++++++++++++++++
public function changePasswords($Tablename,$oldPassword,$newPassword,$id)
{
	$this->data = $this->getFullUserDetails($Tablename,$id,'user_id');
	$oldPassword = md5($oldPassword);
	$newPassword = md5($newPassword);
	if($this->data[0]['password'] == $oldPassword)
	{
		$data = array('password'=>$newPassword);
		$this->db->where('user_id', $this->data[0]['user_id']);
		$this->db->update($Tablename, $data);
		return TRUE;
	}else{
		return FALSE;
	}
}
//++++++++++++++++++++++++++++++++++ FOR Login USER ONLY ++++++++++++++++++++++++++++++++++++++
public function loginUsers($Tablename,$email, $password)
{
	$this->__email = $email;
	$this->__password = $password;
	//$this->__password = md5($this->__password);
	$sql  = "SELECT * FROM ".$Tablename." WHERE ";
	$sql .= "email ='" .$this->__email."' ";
	$sql .= "AND ";
	$sql .= "password='".$this->__password."' ";
	$sql .= "AND ";
	$sql .= "status = 'Active'";
	$this->__query = $this->db->query($sql);
	$this->__count = $this->__query->num_rows();
	if( $this->__count > 0 ){
	return $this->__query->result_array();
	}else{
	return FALSE;
	}
}
//++++++++++++++++++++++++++++++++++ FOR Login USER ONLY ++++++++++++++++++++++++++++++++++++++
public function CityNews_UserDetails($Tablename1,$Tablename2,$Tablename3,$field_name,$id)
{
	$sql = "SELECT ".$Tablename1.".*,CONCAT(".$Tablename2.".`first_name`,'',".$Tablename2.".`last_name`) as user_name,".$Tablename2.".`company_name`,".$Tablename3.".`city_name`";
	$sql.= "FROM ".$Tablename1." ";
	$sql.= "LEFT JOIN ".$Tablename2." ON ".$Tablename2.".`user_id` = ".$Tablename1.".`user_id`";
	$sql.= " LEFT JOIN ".$Tablename3." ON ".$Tablename3.".`city_id` = ".$Tablename1.".`city_id`";
	$sql.= " WHERE ".$Tablename1.".`".$field_name."` = ".$id."";
	$this->exe = $this->db->query($sql);
	return $this->exe->result_array();

}
//++++++++++++++++++++++++++++++++++Only Catagory View(In Desending Order)+++++++++++++++++++++++++++++++++++++++
public function getDetailsDesc($TableName,$primary_id='')
{
	$this->sql = "SELECT * FROM ".$TableName." WHERE parent_id = '0' ORDER BY $primary_id DESC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++Only Catagory View(In Asending Order)+++++++++++++++++++++++++++++++++++++++
public function getDetailsASC($TableName,$primary_id='')
{
	$this->sql = "SELECT * FROM ".$TableName." WHERE parent_id = '0' ORDER BY $primary_id ASC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++++ FOR Login Check-EMAIL ONLY ++++++++++++++++++++++++++++++++++++
public function CheckEmails($Tablename,$emails)
{
	$this->__email = trim(stripslashes($emails));
	$sql  = "SELECT email FROM ".$Tablename." WHERE ";
	$sql .= "email='".$this->__email."' ";
	$this->__query = $this->db->query($sql);
	$this->__count = $this->__query->num_rows();
	if( $this->__count > 0 )
	return FALSE;
	else
	return TRUE;
}
//++++++++++++++++++++++++++++++++++++++++++++++ FORGOT CHANGE PASSWORD ++++++++++++++++++++++++++++
public function changeForgotPasswords($Tablename,$newPassword,$email)
{
	 $this->data 	= $this->getFullUserDetails($Tablename,$email,'email');
	 $newPassword 	= md5($newPassword);
	if($this->data[0]['email'] == $email)
	{
		$data = array('password'=>$newPassword);
		$this->db->where('email', $this->data[0]['email']);
		$this->db->update($Tablename, $data);
		return TRUE;
	}else{
		return FALSE;
	}
}
//++++++++++++++++++++++++++ GET USER DETAILS AND USER TABLE(JOINING)(2 TABLE JOINING) +++++++++++++++++++++++++++++
public function getUserDetails($Tablename1,$Tablename2,$tab2_field,$id=''){
		$this->db->select("{$Tablename1}.*, {$Tablename2}.$tab2_field");
		$this->db->from($Tablename1);
		$this->db->join($Tablename2, $Tablename2.'.'.'user_id'.' ='.$Tablename1.'.'.'user_id','left');
		$this->db->WHERE($Tablename2.'.user_id',$id);
		$this->exe = $this->db->get();
		return $this->exe->result_array();
}



//++++++++++++++++++++++++++ GET USER DETAILS AND USER TABLE(JOINING)(2 TABLE JOINING) +++++++++++++++++++++++++++++

public function getCompanyTypeUserDetails($Tablename1,$Tablename2,$user_type){	
		$this->db->select('t1.email,t2.user_id,t2.company_name');
    	$this->db->from('cmd_user_details as t2');
   		$this->db->join('cmd_user as t1','t1.user_id = t2.user_id'); 
   		$this->db->WHERE('t1.user_type',$user_type);
    	$query = $this->db->get();
    	return $query->result();		
}

//++++++++++++++++++++++++++++++++++++++ Get Pivot Data ++++++++++++++++++++++++++++++++++++
public function getUserBlogData($TableName1,$TableName2,$id){
	$query = "SELECT ".$TableName1.".*,".$TableName2.".* FROM ".$TableName1."  LEFT JOIN  ".$TableName2." ON ".$TableName2.".".'user_id'." = ".$id." WHERE ".$TableName1.".user_id = $id";
	$this->exe = $this->db->query($query);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++ GET USER DETAILS AND USER TABLE(JOINING)(2 TABLE JOINING) +++++++++++++++++++++++++++++
public function detailsUserDetails($id=''){
		$this->db->select("".USER_DETAILS.".*, ".USER.".email, ".USER.".user_type, ".ADDRESS.".*");
		$this->db->from(USER_DETAILS);
		$this->db->join(USER, USER.'.'.'user_id'.' ='.USER_DETAILS.'.'.'user_id','left');
		$this->db->join(ADDRESS, ADDRESS.'.'.'user_id'.' ='.USER_DETAILS.'.'.'user_id','left');
		//$this->db->join(CITY, CITY.'.'.'user_id'.' ='.USER_DETAILS.'.'.'user_id','left');
		$this->db->WHERE(USER_DETAILS.'.user_id',$id);
		$this->exe = $this->db->get();
		return $this->exe->result_array();
}
//++++++++++++++++++++++++ GET EVNT AND OTHERS RELATED TABLE(JOINING)(3 TABLE JOINING) NOT USE ++++++++++++++++++++++++++
public function getEventDetails($Tablename1,$Tablename2,$tab2_field,$id=''){
		$this->db->select("{$Tablename1}.*, {$Tablename2}.$tab2_field");
		$this->db->from($Tablename1);
		$this->db->join($Tablename2, $Tablename2.'.'.'user_id'.' ='.$Tablename1.'.'.'user_id','left');
		$this->db->WHERE($Tablename2.'.user_id',$id);
		$this->exe = $this->db->get();
		return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++++++++++++Specific Update Event ++++++++++++++++++++++++++++++++++
public function DeleteDatas($TABLENAME='',$id='',$field_name='')
{
	$this->db->query("DELETE FROM ".$TABLENAME." WHERE ".$field_name." = ".$id."");
	return TRUE;
}
//+++++++++++++++++++++++++++++++++++++++++Specific Update Event ++++++++++++++++++++++++++++++++++
public function DeletePivoteDatas($TABLENAME='',$id='',$field_name='',$type='',$type_id='')
{
	$this->db->query("DELETE FROM `".$TABLENAME."` WHERE ".$field_name." = ".$id." && ".$type." = '".$type_id."'");
	return TRUE;
}
//++++++++++++++++++++++++++++++++++Only OPENING_HOUR View(In Asending Order)+++++++++++++++++++++++++++++++++++++++
public function openingHourDetails($id,$type_id)
{
	$this->sql = "SELECT * FROM ".OPENING_HOUR." WHERE `company_business_id` = ".$id." && `opening_hour_type` = ".$type_id." ORDER BY company_business_id ASC";
	//$this->sql = "SELECT * FROM ".$TableName." WHERE parent_id = '0' ORDER BY $primary_id DESC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++Only OPENING_HOUR View(In Asending Order)+++++++++++++++++++++++++++++++++++++++
public function pivot_categories($id,$type_id)
{
	$this->sql = "SELECT * FROM ".PIVOT_CATEGORY." WHERE `pivot_unique_id` = ".$id." && `category_type` = '$type_id' ORDER BY pivot_category_id ASC";
	//$this->sql = "SELECT * FROM ".$TableName." WHERE parent_id = '0' ORDER BY $primary_id DESC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getCountryCityNames($Tablename,$city_status,$Active){
		$query = "SELECT ".$Tablename.".*,( IF(`country_id`=0,'',( SELECT `country_name` FROM ".COUNTRY." WHERE `country_id` = ".$Tablename.".`country_id` ))) `country` FROM ".CITY." WHERE ".$Tablename.".".$city_status." = 'Active' ORDER BY `city_name` ASC ";
		$this->exe = $this->db->query($query);
		return $this->exe->result_array();
}




//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getSpecificCountryNames($Tablename,$city_status,$Active){
		$query = "SELECT ".$Tablename.".*,( IF(`country_id`=0,'',( SELECT `country_name` FROM ".COUNTRY." WHERE `country_id` = ".$Tablename.".`country_id` ))) `country` FROM ".CITY." WHERE ".$Tablename.".`city_status` = 'Active' group by country_id";
		$this->exe = $this->db->query($query);
		return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++ Details All Data ++++++++++++++++++++++++++++++++++++++++++++++++++
public function getFebCityDetails($session_id,$city_id)
{
	$this->sql = "SELECT city_id FROM ".PIVOT_FEB_CITY." WHERE user_id = '".$session_id."' AND  city_id = ".$city_id."";
	$this->exe = $this->db->query($this->sql);
	$this->__count = $this->exe->num_rows();
	if( $this->__count > 0 )
	return 'Yes';
	else
	return 'No';
}
//+++++++++++++++++++++++++++++++ Details All Data ++++++++++++++++++++++++++++++++++++++++++++++++++
public function getFebDetails($Tablename,$session_id,$get_id,$field_name='')
{
	$this->sql = "SELECT ".$field_name." FROM ".$Tablename." WHERE user_id = '".$session_id."' AND  ".$field_name." = ".$get_id."";
	$this->exe = $this->db->query($this->sql);
	$this->__count = $this->exe->num_rows();
	if( $this->__count > 0 )
	return 'Yes';
	else
	return 'No';
}
//++++++++++++++++++++++++++++++++++++++ Get Pivot Data ++++++++++++++++++++++++++++++++++++
public function getFavDatas($TableName1,$TableName2,$fieldName,$session_id,$status){
	$query = "SELECT ".$TableName1.".* FROM ".$TableName1." WHERE EXISTS (SELECT ".$TableName2.".".$fieldName." AS `id` FROM ".$TableName2." WHERE ".$TableName2.".`user_id` = '$session_id' AND ".$TableName2.".".$fieldName." =".$TableName1.".".$fieldName." AND ".$TableName1.".".$status." = 'Active')";
	$this->exe = $this->db->query($query);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++++++ Get Pivot Data ++++++++++++++++++++++++++++++++++++
public function getFavCitys($TableName1,$TableName2,$fieldName,$session_id){
	$query = "SELECT ".$TableName1.".* FROM ".$TableName1." WHERE EXISTS (SELECT ".$TableName2.".`city_id` AS `id` FROM ".$TableName2." WHERE ".$TableName2.".`user_id` = '$session_id' AND ".$TableName2.".`city_id`=".$TableName1.".`city_id` AND ".$TableName1.".`city_status` = 'Active')";
	$this->exe = $this->db->query($query);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++++++ Get Joining User Details ++++++++++++++++++++++++++++++++++++
public function getJoinUser($TableName1,$TableName2,$fieldName,$user_id){
	$query = "SELECT ".$TableName1.".* FROM ".$TableName1." WHERE EXISTS (SELECT ".$TableName2.".`user_id` AS `id` FROM ".$TableName2." WHERE ".$TableName2.".".$fieldName." = '$user_id' AND ".$TableName2.".`user_id`=".$TableName1.".`user_id`)";
	$this->exe = $this->db->query($query);
	return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++++++++++++Specific Update Event ++++++++++++++++++++++++++++++++++
public function DeleteFavCity($TABLENAME='',$session_id='',$get_id='',$fild_name='')
{
	$this->db->query("DELETE FROM ".$TABLENAME." WHERE user_id = '".$session_id."' AND $fild_name = ".$get_id."");
	return TRUE;
}
//++++++++++++++++++++++++++++++++++ For All User Details View +++++++++++++++++++++++++++++++++++++++
public function get_address_details($tablename1='',$tablename2='',$tablename3='',$tablename4='',$tablename5='',$id='')
{
	if(!empty($tablename1) && !empty($tablename2) && !empty($tablename3) && !empty($id))
	{
	$this->sql  = "SELECT ".$tablename1.".*,".$tablename2.".country_name,".$tablename3.".city_name,".$tablename4.".*,".$tablename5.".email FROM ".$tablename1."";
	$this->sql .= " LEFT JOIN ".$tablename2." ON ".$tablename1.".country_id = ".$tablename2.".country_id ";
	$this->sql .= " LEFT JOIN ".$tablename3." ON ".$tablename1.".city_id = ".$tablename3.".city_id ";
	$this->sql .= " LEFT JOIN ".$tablename4." ON ".$tablename1.".user_id = ".$tablename4.".user_id";
	$this->sql .= " LEFT JOIN ".$tablename5." ON ".$tablename4.".user_id = ".$tablename5.".user_id";
	$this->sql.= " WHERE ".$tablename4.".user_id = ".$id."";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_blog_full_admin($tablename1='',$tablename2='',$tablename3='',$id='')
{
	if(!empty($tablename1) && !empty($tablename2) && !empty($tablename3) && !empty($id))
	{
	$this->sql .= " SELECT * FROM ";
	$this->sql .= " ".$tablename1." ";
	$this->sql .= "LEFT JOIN ".$tablename2." ON ".$tablename1.".country_id = ".$tablename2.".country_id ";
	$this->sql .= "LEFT JOIN ".$tablename3." ON ".$tablename1.".city_id = ".$tablename3.".city_id WHERE ".$tablename1.".user_id='".$id."' AND ".$tablename1.".blog_news_type = 'Blog'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_Active_Status_data($tablename1='',$tablename2='',$tablename3='',$id='',$status_field='',$desc_field)
{
	if(!empty($tablename1) && !empty($tablename2) && !empty($tablename3) && !empty($id))
	{
	$this->sql .= " SELECT * FROM ";
	$this->sql .= " ".$tablename1." ";
	$this->sql .= "LEFT JOIN ".$tablename2." ON ".$tablename1.".country_id = ".$tablename2.".country_id ";
	$this->sql .= "LEFT JOIN ".$tablename3." ON ".$tablename1.".city_id = ".$tablename3.".city_id WHERE ".$tablename1.".user_id='".$id."' AND ".$tablename1.".".$status_field." = 'Active' ORDER BY `".$desc_field."` DESC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
	}
}
//++++++++++++++++++++++++++ Event Same Category Details ++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_category_details($get_id){
$this->sql = "SELECT * FROM cmd_view_event_details AS E LEFT JOIN ".PIVOT_CATEGORY." AS C ON E.event_id = C.pivot_unique_id  WHERE C.category_id IN (".$get_id.") GROUP BY event_id limit 0,6";
	//$this->sql = "SELECT * FROM ".$TableName." WHERE parent_id = '0' ORDER BY $primary_id DESC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_category_details_business($get_id){
	$this->sql = "SELECT * FROM cmd_view_business_details AS E LEFT JOIN ".PIVOT_CATEGORY." AS C ON E.business_id = C.pivot_unique_id  WHERE C.category_id IN (".$get_id.") GROUP BY business_id";
	//$this->sql = "SELECT * FROM ".$TableName." WHERE parent_id = '0' ORDER BY $primary_id DESC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_category_details_products($get_id){
$this->sql = "SELECT * FROM ".PRODUCT." AS E LEFT JOIN ".PRODUCT_CAT_SUBCAT." AS C ON E.product_id = C.product_id  WHERE C.category_id = ".$get_id." GROUP BY product_id";
	//$this->sql = "SELECT * FROM ".$TableName." WHERE parent_id = '0' ORDER BY $primary_id DESC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_all_category($Tablename,$field_name,$get_id){
$this->sql = "SELECT * FROM ".$Tablename."  WHERE ".$field_name." IN (".$get_id.")";
	//$this->sql = "SELECT * FROM ".$TableName." WHERE parent_id = '0' ORDER BY $primary_id DESC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_name_category($Tablename,$field_name,$get_id,$get_name){
$this->sql = "SELECT GROUP_CONCAT(".$get_name." SEPARATOR ' ') AS get_name FROM ".$Tablename."  WHERE ".$field_name." IN (".$get_id.")";
	//$this->sql = "SELECT * FROM ".$TableName." WHERE parent_id = '0' ORDER BY $primary_id DESC";
	$this->exe = $this->db->query($this->sql);
	//print_r($this->exe);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++++ FOR Login Check-USERNAME ONLY ++++++++++++++++++++++++++++++++++++
public function CheckDatas($Tablename,$fieldname,$id)
{
	$this->__username = trim(stripslashes($id));
	$sql  = "SELECT ".$fieldname." FROM ".$Tablename." WHERE ";
	$sql .= "".$fieldname."='".$this->__username."' ";
	$this->__query = $this->db->query($sql);
	$this->__count = $this->__query->num_rows();
	if( $this->__count > 0 )
	return TRUE;
	else
	return FALSE;
}
//++++++++++++++++++++++++++++++++++++ FOR Login Check-USERNAME ONLY ++++++++++++++++++++++++++++++++++++
public function groupDatas($Tablename,$fieldname,$specific_field,$specific_field_id)
{
	$this->sql = "SELECT ".$fieldname." FROM ".$Tablename." WHERE ".$specific_field." = ".$specific_field_id." GROUP BY ".$fieldname."";
	$this->exe  = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++++ FOR Login Check-USERNAME ONLY ++++++++++++++++++++++++++++++++++++
public function comment_user_data($Tablename,$fieldname,$field_id,$status,$order_field='')
{
	$this->sql = "SELECT ".MEET_UP_COMMENTS.".*,(IF(`user_id`=0,'',(
            SELECT CONCAT(`first_name`,' ',`last_name`) FROM ".USER_DETAILS." WHERE `user_id` = ".MEET_UP_COMMENTS.".`user_id`
        ))
    ) `user_name`,(
    IF(`user_id`=0,'',(
            SELECT `company_name` FROM ".USER_DETAILS." WHERE `user_id` = ".MEET_UP_COMMENTS.".`user_id`
        ))
    ) `company_name`,(
    IF(`user_id`=0,'',(
            SELECT `user_image` FROM ".USER_DETAILS." WHERE `user_id` = ".MEET_UP_COMMENTS.".`user_id`
        ))
    ) `user_image` FROM ".MEET_UP_COMMENTS." WHERE ".MEET_UP_COMMENTS.".".$fieldname." = ".$field_id." AND ".$status." = 'Active' ORDER BY ".$order_field." DESC";
	$this->exe  = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++ Get Ratting +++++++++++++++++++++++++++++++++++++++++++++++++
public function getFeedbackRatting($Tablename,$id='',$primary_id='')
{
	$this->sql = "SELECT `store_feedback_id`, `business_id`, `user_id`, `store_feedback`, round(`store_service_ratting_sum`) store_service_ratting_sum, round(`store_location_ratting_sum`) store_location_ratting_sum, round(`store_quality_ratting_sum`) store_quality_ratting_sum, round(`store_others_ratting_sum`) store_others_ratting_sum, round((`store_service_ratting_sum`+`store_location_ratting_sum`+`store_quality_ratting_sum`+`store_others_ratting_sum`)/5)`avg_rating`, `create_date`, `status` FROM (SELECT `store_feedback_id`, `business_id`, `user_id`, `store_feedback`, SUM(`store_service_ratting`)/COUNT(`business_id`) `store_service_ratting_sum`, SUM(`store_location_ratting`)/COUNT(`business_id`) `store_location_ratting_sum`, SUM(`store_quality_ratting`)/COUNT(`business_id`) `store_quality_ratting_sum`, SUM(`store_others_ratting`)/COUNT(`business_id`) `store_others_ratting_sum`, `create_date`, `status` FROM ".$Tablename." WHERE $primary_id ='".$id."' and `status` ='Active' Group By `business_id` ORDER BY `create_date` DESC) `t`";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++++ Column Name ++++++++++++++++++++++++++++++++++++++++
public function getCoulmnName($Tablename,$id='')
{
	$this->sql = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='club_mondain_database' AND `TABLE_NAME`='".$Tablename."'";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++++ Column Name ++++++++++++++++++++++++++++++++++++++++
public function Permission_User($Tablename,$tempPermittedField,$id='')
{
		/*$data = implode('`, `'.USER_DETAILS.'`.`',$tempPermittedField);
		$this->db->select("`".USER_DETAILS."`.`".$data."`, ".USER.".email, ".USER.".user_type, ".ADDRESS.".*");
		$this->db->from(USER_DETAILS);
		$this->db->join(USER, USER.'.'.'user_id'.' ='.USER_DETAILS.'.'.'user_id','left');
		$this->db->join(ADDRESS, ADDRESS.'.'.'user_id'.' ='.USER_DETAILS.'.'.'user_id','left');
		//$this->db->join(CITY, CITY.'.'.'user_id'.' ='.USER_DETAILS.'.'.'user_id','left');
		$this->db->WHERE(USER_DETAILS.'.user_id',$id);
		$this->exe = $this->db->get();
		return $this->exe->result_array();*/
}
//+++++++++++++++++++++++++++++++ Details All Product Feedback Data +++++++++++++++++++++++++++++++++++++++++++++++++
public function getDetailsProductDatas($Tablename,$id='',$primary_id='',$status,$order_field)
{
	$this->sql = "SELECT *, (select count(".$Tablename.".{$order_field}) from ".$Tablename." where ".$Tablename.".{$primary_id} = ".$id." GROUP BY {$primary_id}) count_feedback,(
    IF(`user_id`=0,'',(
            SELECT CONCAT(`first_name`,' ',`last_name`) FROM ".USER_DETAILS."  WHERE `user_id` = ".$Tablename.".`user_id`
        ))
    ) `user_name`,(
    IF(`user_id`=0,'',(
            SELECT `company_name` FROM ".USER_DETAILS." WHERE `user_id` = ".$Tablename.".`user_id`
        ))
    ) `company_name`  FROM ".$Tablename." WHERE $primary_id ='".$id."' and ".$status." = 'Active' ORDER BY ".$order_field." DESC LIMIT 0,3";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++ Same Product Category Data(31-05-17) +++++++++++++++++++++++++++++++++++++++++++++++++
public function getSameProductCategoryData($cat_id)
{
	$this->sql = "SELECT ".PRODUCT_CAT_SUBCAT.".`category_id`,".PRODUCT.".*,".PRODUCT_IMAGES.".`product_images_name` FROM ".PRODUCT_CAT_SUBCAT."
LEFT JOIN ".PRODUCT." ON ".PRODUCT.".`product_id` = ".PRODUCT_CAT_SUBCAT.".`product_id`
LEFT JOIN ".PRODUCT_IMAGES." ON ".PRODUCT_IMAGES.".`product_id` = ".PRODUCT.".`product_id`
WHERE ".PRODUCT_CAT_SUBCAT.".`category_id` = ".$cat_id." GROUP BY ".PRODUCT.".`product_id`";
$this->exe = $this->db->query($this->sql);
return $this->exe->result_array();

}
/*//++++++++++++++++++++++++++++++++++ FOR Login USER ONLY ++++++++++++++++++++++++++++++++++++++
public function loginTrainer($Tablename,$email, $password, $status, $field_email ,$field_password)
{
	echo $field_email;
	$this->__email = $email;
	$this->__password = $password;
	//$this->__password = md5($this->__password);

	$sql  = "SELECT * FROM ".$Tablename." WHERE ";
	$sql  = "trainer_email='". $this->__email;
	$sql .= "AND ";
	$sql .= "trainer_password='".$this->__password."' ";
	$sql .= "AND ".$status == "Active";

	$this->__query = $this->db->query($sql);
	$this->__count = $this->__query->num_rows();
	if( $this->__count > 0 ){
	return $this->__query->result_array();
	}else{
	return FALSE;
	}
}*/
//+++++++++++++++++++++++++++++++ Details All Data Asending Order ++++++++++++++++++++++++++++++++++++++++++++++++++
public function getFullASCDetails($Tablename,$field_name='',$field_id='')
{
	$this->sql = "SELECT * FROM ".$Tablename." WHERE ".$field_name." = ".$field_id."";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++Only Catagory View(In Dash)++++++++++++++++++++++++++++++++++++++
public function getFieldDetails($TableName)
{
	$this->sql = "SELECT * FROM ".$TableName."";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++ Details All Data ++++++++++++++++++++++++++++++++++++++++++++++++++
public function getFullNameDetails($Tablename,$field_name='',$ForeignKeyfield='',$id='')
{
	$this->sql = "SELECT ".$field_name." FROM ".$Tablename." WHERE ".$ForeignKeyfield." = ".$id."";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++ Details Event Data With City & Country Name +++++++++++++++++++++++++++++++
public function get_city_country_details($TABLENAME,$TABLECITY,$TABLECOUNTRY,$field_fk_city,$field_fk_country,$field_name,$id)
{
	$this->sql = "SELECT ".$TABLENAME.".*,".$TABLECITY.".city_name,".$TABLECOUNTRY.".countryName FROM ".$TABLENAME." LEFT JOIN ".$TABLECITY." ON ".$TABLENAME.".".$field_fk_city."=".$TABLECITY.".id LEFT JOIN ".$TABLECOUNTRY." ON ".$TABLENAME.".".$field_fk_country."=".$TABLECOUNTRY.".id WHERE ".$TABLENAME.".$field_name=".$id." ORDER BY id DESC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++++++++++++++++ GET ALL DETAILS ++++++++++++++++++++++++++++++++++++++++++++
public function getEventNameWithCitys($Tablename1,$Tablename2,$order=''){
		$this->db->select("{$Tablename1}.*, {$Tablename2}.city_name");
		$this->db->from($Tablename1);
		$this->db->join($Tablename2, $Tablename2.'.city_id ='.$Tablename1.'.city_id','left');
		$this->db->order_by('city_id',$order);
		$this->exe = $this->db->get();
		return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++++++++++++++++ GET PRODUCT ++++++++++++++++++++++++++++++++++++++++++++
public function getproductDatas($field_name,$user_id){
$this->sql = "SELECT ".PRODUCT.".*,".PRODUCT_IMAGES.".`product_images_name` FROM ".PRODUCT."
LEFT JOIN ".PRODUCT_IMAGES." ON ".PRODUCT_IMAGES.".`product_id` = ".PRODUCT.".`product_id`
WHERE ".PRODUCT_IMAGES.".`primary_image` = 1 AND ".PRODUCT.".".$field_name." = '".$user_id."'";
$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++ Details Event Data With User,City & Country Name +++++++++++++++++++++++++++++++
/*public function get_user_city_country_details($TABLENAME,$TABLECITY,$TABLECOUNTRY,$TABLEUSER,$field_fk_user,$field_fname,$field_lname,$field_fk_city,$field_fk_country,$field_name= '',$id='')
{
	$this->sql = "SELECT ".$TABLENAME.".*,".$TABLECITY.".city_name,".$TABLECOUNTRY.".countryName,".$TABLEUSER.".".$field_fname." fname,".$TABLEUSER.".".$field_lname." lname FROM ".$TABLENAME." LEFT JOIN ".$TABLECITY." ON ".$TABLENAME.".".$field_fk_city."=".$TABLECITY.".id LEFT JOIN ".$TABLECOUNTRY." ON ".$TABLENAME.".".$field_fk_country."=".$TABLECOUNTRY.".id LEFT JOIN ".$TABLEUSER." ON ".$TABLENAME.".".$field_fk_user."=".$TABLEUSER.".id WHERE ".$TABLENAME.".$field_name=".$id." ORDER BY id DESC";
	$this->exe = $this->db->query($this->sql);
	//print_r($this->sql);die;
	return $this->exe->result_array();
}*/
/*SELECT cmd_event.*,cmd_city.city_name,cmd_countries.countryName FROM cmd_event LEFT JOIN cmd_city ON cmd_event.event_city_FK=cmd_city.id LEFT JOIN cmd_countries ON cmd_event.event_country_FK=cmd_countries.id WHERE cmd_event.members_id_FK=1*/
// +++++++++++++++++++++++++++++++++++++++ GET DATA FROM VERTUAL TABLE +++++++++++++++++++++++++++++++++++++++++++++
public function getNewsDetails($city_id,$fk_field =''){
	//echo $city_id.$fk_field;die;
		$query = "select * from `view_news_details` where ".$fk_field."= ?";
		$this->exe = $this->db->query($query, array($city_id));
		return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getCityInCountryNames($Tablename,$city_status,$Active){
		$query = "SELECT distint country_id_FK, ".$Tablename.".*,( IF(`country_id_FK`=0,'',( SELECT `countryName` FROM ".COUNTRY." WHERE `country_id` = ".$Tablename.".`country_id` ))) `country` FROM ".CITY." WHERE ".$Tablename.".".$city_status." = ".$Active."";
		$this->exe = $this->db->query($query);
		return $this->exe->result_array();
}
//+++++++++++++++++++++++++++++++++++ GET SPECIFIC DETAILS +++++++++++++++++++++++++++++++++++++++++++++++++
public function getSpecificEventDetailsWithCitys($Tablename1,$Tablename2,$Tablename3,$tab1_field,$tab2_field,$tab3_field,$tab1_field2,$id=''){
		$this->db->select("{$Tablename1}.*, {$Tablename2}.city_name");
		$this->db->from($Tablename1);
		$this->db->join($Tablename2, $Tablename2.'.'.$tab2_field.' ='.$Tablename1.'.'.$tab1_field,'left');
		$this->db->join($Tablename3, $Tablename3.'.'.$tab3_field.' ='.$Tablename1.'.'.$tab1_field2,'left');
		$this->db->where($Tablename1.'.id',$id);
		$this->exe = $this->db->get();
		return $this->exe->result_array();
		//print_r($this->db->queries);
		//die;
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++ ++++++++++++++++++++++++++++++++++++++++
public function getMyFavEvent($userId='')
{
	$data = array();
	$sql = "SELECT event_id FROM cmd_pivot_favourite_event  WHERE user_id='".$userId."'";
	$this->exe = $this->db->query($sql);
	$getEventId = $this->exe->result_array();
	if(count($getEventId) > 0)
	{
	foreach($getEventId as $evnId)
		{
			$data[] = $this->getFullASCDetails(EVENT,'event_id',$evnId['event_id']);
		}
	}
	return 	$data;
}
public function getMyFavSpace($userId='')
{
$data = array();
$sql = "SELECT business_id FROM cmd_pivot_favourite_store  WHERE user_id='".$userId."'";
$this->exe = $this->db->query($sql);
$getEventId = $this->exe->result_array();
if(count($getEventId) > 0)
{
foreach($getEventId as $evnId)
{
$data[] = $this->getFullASCDetails('cmd_business','business_id',$evnId['business_id']);
}
}
return 	$data;
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getClassCount($id)
{
	$sql = "SELECT * FROM ".PIVOT_JOIN_CLASS." WHERE trainer_class_id='".$id."'";
	$this->exe = $this->db->query($sql);
	return $count = $this->exe->num_rows();
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getBusinessRating($business_id)
{
	$sql = "SELECT * FROM ".STORE_FEEDBACK." WHERE business_id='".$business_id."'";
	$this->exe = $this->db->query($sql);
	return $count = $this->exe->num_rows();
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getMeetUpCount($id)
{
	$sql = "SELECT * FROM ".MEET_UP." WHERE user_id='".$id."'";
	$this->exe = $this->db->query($sql);
	return $count = $this->exe->num_rows();
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function searchCity($get_search)
{
	if(!empty($get_search))
	{
	$sql  = "SELECT city.*,country.country_name FROM ".CITY." AS city LEFT JOIN ".COUNTRY." As country ON ";
	$sql .= "city.`country_id` = country.country_id  WHERE city.city_name = '".$get_search."'  ";
	$this->exe = $this->db->query($sql);
	$count = $this->exe->num_rows();
		if($count > 0){
			$data = $this->exe->result_array();
		}else{
			$data = 'N-A';
		}
	}else{
	$data = FALSE;
	}
	return $data;
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getRandUser()
{
	$this->sql = "SELECT * FROM ".USER." AS U INNER JOIN ".USER_DETAILS." AS D ON U.user_id = D.user_id WHERE U.user_type = 'M' ORDER BY RAND() LIMIT 0,5";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//MODIFIED
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_all_user_paid_class_id($uid='')
{
		if(!empty($uid)){
			$sql  = "SELECT * FROM cmd_pivot_joining_class WHERE user_id = '".$uid."'";
			$this->exe = $this->db->query($sql);
			return $data = $this->exe->result_array();
		}else{
			throw new Exception("The data process wrong !! Please try after some time !!");
		}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_paid_class_details($cid='')
{
		if(!empty($cid)){
			$sql  = "SELECT * FROM cmd_trainer_class WHERE trainer_class_id = '".$cid."'";
			$this->exe = $this->db->query($sql);
			return $data = $this->exe->result_array();
		}else{
			throw new Exception("The data process wrong !! Please try after some time !!");
		}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_product_details($primary_id='')
{
	$this->sql = "SELECT * FROM cmd_product  ORDER BY ".$primary_id." DESC";
	$this->exe = $this->db->query($this->sql);
	return $this->exe->result_array();
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//MODIFIED
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


}?>
