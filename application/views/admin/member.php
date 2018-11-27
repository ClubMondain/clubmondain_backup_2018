<?php
include('inc/top.php');?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include('inc/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('inc/sidebar.php');?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Create Members</h1>
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
              <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <?php
				$formDetails= array('id'=>'create_member','method'=>'post','class'=>'','name'=>'create_member');
                echo form_open('Dashboard/insert_member',$formDetails);
				?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="username">First Name<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="members_fname" id="members_fname" placeholder="First Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="username">Last Name<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="members_lname" id="members_lname" placeholder="Last Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputEmail">Email Address<span style="color:red">*</span></label>
                      <input type="email" class="form-control" name="members_email" id="members_email" placeholder="Email Address" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="username">Username<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="members_username" id="members_username" placeholder="Username">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputFname">Password<span style="color:red">*</span></label>
                      <input type="password" class="form-control" name="members_password" value="" id="members_password" placeholder="Password">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputAddress">Status <span style="color:red">*</span></label>
                      <select class="form-control" name="members_status" id="members_status">
                        <option name="member_status" value="" selected>Select Status</option>
                        <option value="Active" class="">Active</option>
                        <option value="In-Active" class="">Inactive</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="box-body">
                      <label for="exampleInputAddress">Member Type <span style="color:red">*</span></label>
                      <select class="form-control" name="members_type" id="members_type">
                        <option name="" value="" selected>Select Member Type</option>
                        <option name="member_type" value="Paid" class="">Paid</option>
                        <option name="member_type" value="Free" class="">Free</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" onClick="return member_validation();"><i class="fa fa-check"></i>&nbsp;Submit</button>
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
