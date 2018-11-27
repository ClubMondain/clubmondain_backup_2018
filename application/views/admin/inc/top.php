<?php
$admin = $this->session->userdata('admin_details');
if(count($admin) == 0)
{
header("Location:".base_url('Admin/logOut').""); 
} 
$adminTopDetails = strtoupper($admin[0]['first_name'].' '.$admin[0]['last_name']);
$get_the_third_parameter = $this->uri->segment('3');

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo SITE_NAME; ?></title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/_all-skins.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/blue.css">
<!-- Morris chart -->
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/morris.css">
<!-- jvectormap -->
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/jquery-jvectormap-1.2.2.css">
<!-- Date Picker -->
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/datepicker3.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/jquery-ui.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/jquery.dataTables.min.css">
<!-- SWEET ALERT -->
<script src="<?php echo base_url('assets/');?>js/sweetalert.js"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/sweetalert.css">
<!-- Date Picker -->
<script src="<?php echo base_url('assets/plugins/datepicker/');?>bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/');?>datepicker3.css">
<!-- SELECT 2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<!-- stylesheet -->
<link rel="stylesheet" href="<?php echo base_url('assets/');?>web/css/stylesheet.css">
<script src="<?php echo base_url('ckeditor/');?>ckeditor.js"></script> 
