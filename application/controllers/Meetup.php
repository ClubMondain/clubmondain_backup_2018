<?php
class Meetup extends CI_Controller
{
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function __construct()
{
parent::__construct();
$this->getSessionValidate();
$this->load->model('meetups','meet');
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getSessionValidate()
{
$this->__session_details = $this->session->all_userdata();
if(!isset($this->__session_details['admin_login']))
{
redirect('Admin','refresh');
}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function index()
{
$this->load->view('admin/dashboard');
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function list_meetup()
{
try {
$list = "";
$list = $this->meet->get_list_meetup();
$msg['meetup_list'] = $list;
$this->load->view('admin/list_meetup',$msg);
} catch (Exception $e) {
echo 'Message: ' .$e->getMessage();
}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function delete_meetup($id='')
{
if(!empty($id)){
try {
$this->meet->delete_meetup($id);
$this->list_meetup();
} catch (Exception $e) {
echo 'Message: ' .$e->getMessage();
}
}else{
$this->index();
}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//END CLASS
}
