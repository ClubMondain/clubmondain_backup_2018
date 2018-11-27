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
      <h1>Settings Page</h1>
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
                <?php $formDetails= array('id'=>'setting','method'=>'post','class'=>'');?>
                <?php echo form_open('Dashboard/setting-update',$formDetails);?> 
                <!--<input type="hidden" name="id" value="">-->
                <div class="row">
                  <div class="box-body">
                    <div class="col-md-12">
                      <h3 style="font-weight:600">Social Links</h3>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="exampleInputFname">Facebook<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="facebook_link" value="<?php echo $admin_setting[0]['facebook_link']; ?>" id="admin_facebook_link" placeholder="First Name">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="exampleInputLname">Twitter<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="twitter_link" value="<?php echo $admin_setting[0]['twitter_link']; ?>" id="admin_twitter_link" placeholder="Last Name">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="exampleInputFname">Google<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="google_plus_link" value="<?php echo $admin_setting[0]['google_plus_link']; ?>" id="admin_google_plus_link" placeholder="First Name">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="exampleInputLname">Pinterest</label>
                      <input type="text" class="form-control" name="pinterest_link" value="<?php echo $admin_setting[0]['pinterest_link']; ?>" id="admin_pinterest_link" placeholder="Last Name">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="exampleInputFname">Instagram</label>
                      <input type="text" class="form-control" name="instagram_link" value="<?php echo $admin_setting[0]['instagram_link']; ?>" id="admin_instagram_link" placeholder="First Name">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="exampleInputLname">Linkedin</label>
                      <input type="text" class="form-control" name="linkedIn_link" value="<?php echo $admin_setting[0]['linkedIn_link']; ?>" id="admin_linkedIn_link" placeholder="Last Name">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="box-body">
                    <div class="col-md-12">
                      <h3 style="font-weight:600">Details Settings</h3>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputEmail">Site Email Address<span style="color:red">*</span></label>
                      <input type="email" class="form-control" name="site_email" value="<?php echo $admin_setting[0]['site_email']; ?>" id="admin_site_email" placeholder="Site Email Address" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputPhone">Form Email<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="form_email" value="<?php echo $admin_setting[0]['form_email']; ?>" id="admin_form_email" placeholder="Form Email Address">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputAddress">Address<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="address" value="<?php echo $admin_setting[0]['address']; ?>" id="admin_address" placeholder="Address">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputPhone">Phone Number<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="phone_no" value="<?php echo $admin_setting[0]['phone_no']; ?>" id="admin_phone_no" placeholder="Phone Number" onKeyUp="this.value=this.value.replace(/[^\d]/,'')">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputCity">City<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="city" value="<?php echo $admin_setting[0]['city']; ?>" id="admin_city" placeholder="City">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputState">State<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="state" value="<?php echo $admin_setting[0]['state']; ?>" id="admin_state" placeholder="State">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputState">Copyright Section<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="copyright_section" value="<?php echo $admin_setting[0]['copyright_section']; ?>" id="copyright_section" placeholder="State">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputCountry">Zipcode<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="zipcode" value="<?php echo $admin_setting[0]['zipcode']; ?>" id="admin_zipcode" placeholder="zip" onKeyUp="this.value=this.value.replace(/[^\d]/,'')">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box-body">
                      <label for="exampleInputCountry">Google Map</label>
                      <textarea class="form-control" name="google_map"  id="admingoogle_map" placeholder="Enter Your Google Map" style="min-height:100px"><?php echo $admin_setting[0]['google_map']; ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" onClick="return AdminSettingValidation();"><i class="fa fa-check"></i>&nbsp;Save</button>
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
