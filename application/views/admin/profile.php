<?php 
include('inc/top.php');
?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include('inc/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('inc/sidebar.php');?>
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Admin Profile</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
         <?php
		  if(isset($msg) && $msg !=''){
		   if($msg != 'Error'){	  
		   ?>
            <div class="alert <?php echo $msg_class;?>"> <?php echo $msg;?> </div>
            <?php }else{ ?>
            <div class="alert <?php echo $msg_class;?>"> <?php echo validation_errors() ;?> </div>
            <?php }}?>
          <div class="row">
            <!-- left column -->
            <div class="col-md-12"> 
              <!-- general form elements -->
              <div class="box box-primary"> 
                <!-- /.box-header --> 
                <!-- form start -->
                <?php $formDetails= array('id'=>'profile','method'=>'post','class'=>'');?>
                <?php echo form_open('Dashboard/profile-update',$formDetails);?> 
                <!--<input type="hidden" name="id" value="">-->
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputFname">First Name<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="first_name" value="<?php echo $admin_deatils[0]['first_name']; ?>" id="first_name" placeholder="First Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputLname">Last Name<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $admin_deatils[0]['last_name']; ?>" placeholder="Last Name">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box-body">
                      <label for="exampleInputEmail">Email Address<span style="color:red">*</span></label>
                      <input type="email" class="form-control" name="admin_email" id="admin_email" value="<?php echo $admin_deatils[0]['email']; ?>" placeholder="Email Address" required>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" onClick="return AdminProfileValidation();"><i class="fa fa-check"></i>&nbsp;Save</button>
                </div>
                <?php echo form_close();?> 
                </div>
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
  <!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
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
<script src="<?php echo base_url('assets/');?>js/admin_alert.js"></script>
</body>
</html>
