<?php include('inc/top.php');?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include('inc/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('inc/sidebar.php');?>
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Change Password</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <?php
		  if(isset($msg) && $msg !=''){
		   ?>
            <div class="alert <?php echo $msg_class;?>"> <?php echo $msg;?> </div>
            <?php 
		 	 }
		  	?>
          <div class="row">
            <!-- /.box-header --> 
            <!-- form start -->
            <div class="col-md-12">
              <div class="box box-primary">
                <?php $form_details = array('id' => 'changepassword','method' => 'post'); ?>
                <?php echo form_open('Dashboard/change-password-update',$form_details);?>
                <input type="hidden" name="admin_change_pwd" value="admin_change_pwd" id="admin_change_pwd">
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputOldPwd">Old Passworde<span style="color:red">*</span></label>
                      <input type="password" class="form-control" name="admin_pwd_old" id="admin_pwd_old" placeholder="Old Password">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputNewPwd">New Password<span style="color:red">*</span></label>
                      <input type="password" class="form-control" name="admin_pwd_new" id="admin_pwd_new" placeholder="New Password">
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" onClick="return changePassword();"><i class="fa fa-check"></i>&nbsp;Save</button>
                </div>
                <?php echo form_close();?> </div>
            </div>
          </div>
        </div>
        <!-- /.row --> 
      </div>
    </section>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper --> 
  <!-- Control Sidebar --> 
  <!-- /.control-sidebar --> 
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <?php include('inc/footer.php');?>
</div>
<!-- ./wrapper --> 
<!-- jQuery 2.2.3 --> 
<script src="<?php echo base_url('assets/');?>js/jquery-2.2.3.min.js"></script> 
<!-- Bootstrap 3.3.6 --> 
<script src="<?php echo base_url('assets/');?>js/bootstrap.min.js"></script> 
<!-- FastClick --> 
<script src="<?php echo base_url('assets/');?>js/fastclick.js"></script> 
<!-- AdminLTE App --> 
<script src="<?php echo base_url('assets/');?>js/app.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo base_url('assets/');?>js/demo.js"></script> 
<!-- For Alert--> 
<script src="<?php echo base_url('assets/');?>js/admin_alert.js"></script>
</body>
</html>
