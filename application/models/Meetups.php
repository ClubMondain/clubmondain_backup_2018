<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Meetups extends CI_Model
{
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function __construct()
{
parent::__construct();
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_list_meetup()
{
if (defined('MEET_UP')){
$sql = "SELECT * FROM ".MEET_UP." m
								 LEFT JOIN cmd_country AS country ON m.country_id = country.country_id
								 LEFT JOIN cmd_city AS city ON m.city_id = city.city_id ";
$exe_query = $this->db->query($sql);
return $data = $exe_query->result_array();
}else{
throw new Exception("The data process wrong !! Please try after some time !!");
}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function get_user_details_meet_up()
{
if (defined('USER') && defined('USER_DETAILS')) {
$sql = "SELECT * FROM ".USER." AS u LEFT JOIN ".USER_DETAILS." AS ud ON u.user_id = ud.user_id";
$exe_query = $this->db->query($sql);
return $data = $exe_query->result();
}else{
throw new Exception("The data process wrong !! Please try after some time !!");
}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_meetup($id='')
{
if (defined('MEET_UP') && defined('MEET_UP_COMMENTS')){
if(!empty($id)){
$this->db->where('meet_up_id', $id);
$this->db->delete(array(MEET_UP, MEET_UP_COMMENTS));
}else{
throw new Exception("Everything is wrong !! Please try after some time !! ");
}
}else{
throw new Exception("The data process wrong !! Please try after some time !!");
}
}
//END CLASS
}
