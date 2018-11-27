<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ShopingCart extends CI_Controller
{
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function __construct()
{
	parent::__construct();
	$this->load->model('Users','urs');
	$this->load->model('Dashboards','dashs');
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function index($msg='')
{
	$this->load->view('cart');
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getSessionValidate()
{
	$this->__session_user_details = $this->session->all_userdata();
	if($this->session->userdata('user_login')!='')
	{
		redirect('Main/index','refresh');
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getAdd()
{
	$get_id = $this->input->post('sku_data');
	$get_qty = $this->input->post('qty_data');
	$get_price = $this->input->post('price_data');
	$get_name = $this->input->post('name_data');
	if( (!empty($get_id))  and (!empty($get_qty)) and (!empty($get_price)) and (!empty($get_name)) )
	{

	$data = array(
        'id'      => $get_id,
        'qty'     => $get_qty,
        'price'   => $get_price,
        'name'    => $get_name,
		);
	$this->cart->insert($data);
	//redirect('Home/shop-details/'.$get_id,'refresh');
	redirect('ShopingCart','refresh');
	}else{
	redirect('ShopingCart','refresh');
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getUpdate($rowid='')
{
	if( (!empty($rowid)) )
	{
	$data = array(
        'rowid'   => $rowid,
        'qty'     => $this->input->post('qty_data')
    );
	$this->cart->update($data);
	}
	redirect('ShopingCart','refresh');
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function getRemove($rowid='')
{
	if( (!empty($rowid)) )
	{
	$this->cart->remove($rowid);
	}
	redirect('ShopingCart','refresh');
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function emptyCart()
{
	$this->cart->destroy();
	redirect('Home/shop/','refresh');
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function cdetails()
{
	$msgsection['country'] = $this->urs->getCountryDetails(COUNTRY,'country_id');
	$this->load->view('cdetails',$msgsection);
}

public function add_payment()
{
	$GET_AMOUNT = $this->input->post('total_amount');
	if(!empty($GET_AMOUNT))
	{
	$log_id = $this->session->userdata('user_id');
	$shipping_address      = 'DEMO';
	$shipping_country      =  1;
	$shipping_state        = 'DEMO';
	$shipping_city         = 'DEMO';
	$shipping_postal_code  = '1';
	if(!empty($shipping_address) and !empty($shipping_country) and !empty($shipping_state) and !empty($shipping_city) and !empty($shipping_postal_code)){
	$get_PRODUCT = $this->input->post('product_id');
	if(count($get_PRODUCT) > 0)
	{
	$dataArray_data['user_id'] = $log_id;	
	$dataArray_data['payment_id'] = 0;
	$dataArray_data['shipping_address'] = $shipping_address;
	$dataArray_data['shipping_country'] = $shipping_country;
	$dataArray_data['shipping_state'] = $shipping_state;
	$dataArray_data['shipping_city'] = $shipping_city;
	$dataArray_data['shipping_postal_code'] = $shipping_postal_code;	
	$dataArray_data['status'] = 'Processing';
	$dataArray_data['cdate'] = date('Y-m-d');
	$get_id = $this->urs->InsertDatas('user_order',$dataArray_data);
	foreach ($this->cart->contents() as $items)
	{
	$dataArray['order_id'] = $get_id;
	$dataArray['user_id'] = $log_id;
	//$dataArray['payment_id'] = 0;
	$dataArray['product_id'] = $items['id'];
	$dataArray['qty'] = $items['qty'];
	$dataArray['price'] = $items['price'];
	$dataArray['cdate'] = date('Y-m-d');
	$get_return_status = $this->urs->InsertDatas('user_order_details',$dataArray);
	}
	if($get_return_status){
	//Set variables for paypal form
	$returnURL = base_url().'paypal/shoping_success'; //payment success url
	$cancelURL = base_url().'paypal/cancel'; //payment cancel url
	$notifyURL = base_url().'paypal/ipn'; //ipn url
	//get particular product data
	$item_name = $log_id.'_'.$get_id.'_'.'shop';
	$logo = base_url().'assets/img/x-click-but01.gif';
	$this->paypal_lib->add_field('return', $returnURL);
	$this->paypal_lib->add_field('cancel_return', $cancelURL);
	$this->paypal_lib->add_field('notify_url', $notifyURL);
	$this->paypal_lib->add_field('amount',  $GET_AMOUNT);
	$this->paypal_lib->add_field('item_name',$item_name);
	$this->paypal_lib->image($logo);
	$this->paypal_lib->paypal_auto_form();
	}
	}else{
		$this->cdetails();
	}
	}else{
		$this->cdetails();
	}
	}else{
		$this->cdetails();
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
}//END CLASS
