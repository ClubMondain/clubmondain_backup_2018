<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Search extends CI_Controller {
	
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function __construct()
{
	parent::__construct();
	$this->load->helper('filter');
	$this->load->helper('country');
	$this->load->model('Users','urs');
	$this->load->model('Dashboards','dashs');
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function index()
{
		redirect('Home','refresh');
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function serach_data()
{
	$get_search_query = $this->security->xss_clean($this->input->post('serach_query'));
	if(!empty($get_search_query)){
	$data = $this->urs->searchCity($get_search_query);
	if($data == FALSE){
	$this->index();	
	}elseif($data == 'N-A'){
	$detailSection['city_details'] = 'N-A'; 
	$detailSection['country_details'] 	= $this->urs->getSpecificCountryNames(CITY,'city_status','Active');
	$this->load->view("cities-search",$detailSection);		
	}else{
	$detailSection['city_details'] = $data;
	$detailSection['country_details'] 	= $this->urs->getSpecificCountryNames(CITY,'city_status','Active');
	$this->load->view("cities-search",$detailSection);			
	}
	}else{
	$this->index();	
	}
	
}
}//END CLASS