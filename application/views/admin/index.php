<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Welcome To Club Mondain</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/AdminLTE.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/blue.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo"> <a href=""><b>Club</b> Mondain</a> </div>
  <div class="login-box-body">
    <h2>
      <center>
        Sign In
      </center>
    </h2>
    <?php if(isset($msg) && $msg !=''){ ?>
    <div class="alert alert-danger"> <?php echo $msg;?> </div>
    <?php }?>
    <?php $form_details = array('id' => 'myForm','method' => 'post'); ?>
    <?php echo form_open('admin/login',$form_details);?>
    <input type="hidden" name="admin_login" value="admin_login">
    <div class="form-group has-feedback">
      <input type="text" class="form-control" id="admin_username" name="admin_username" placeholder="Username" required>
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span> </div>
    <div class="form-group has-feedback">
      <input type="password" class="form-control" id="admin_pwd" name="admin_pwd" placeholder="Password" required>
      <span class="glyphicon glyphicon-lock form-control-feedback"></span> </div>
    <div class="row">
      <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
      </div>
    </div>
    <?php echo form_close();?> </div>
</div>
<script src="<?php echo base_url('assets/');?>js/jquery-2.2.3.min.js"></script> 
<script src="<?php echo base_url('assets/');?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url('assets/');?>js/icheck.min.js"></script> 
<script type="text/javascript">
$(function () {
	$('input').iCheck({
	checkboxClass: 'icheckbox_square-blue',
	radioClass: 'iradio_square-blue',
	increaseArea: '20%' // optional
	});
});
</script>
</body>
</html>
