<?php 
$page_title = 'Create City';
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
      <h1><?php echo $page_title;?></h1>
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
            <div class="alert <?php echo $msg_class;?>"> <?php echo validation_errors(); ?> </div>
            <?php }}?>
          <div class="row">
            <!-- left column -->
            <div class="col-md-12"> 
              <!-- general form elements -->
              <div class="box box-primary">
                <?php 
				$formDetails= array('id'=>'insert_city','method'=>'post','class'=>'','name'=>'insert_city');
				echo form_open_multipart('City/insert-city',$formDetails);
				?>
                <div class="row">
                <div class="col-md-4">
                    <div class="box-body">
                      <label for="exampleInputAddress">Country<span style="color:red">*</span></label>
                      <select class="form-control" name="country_id_FK" id="country_id_FK">
                        <option value="" selected>Select Country</option>
						<?php
                        if(count($countryNames) > 0){
                        foreach($countryNames as $country){
                        ?>
                        <option value="<?php echo $country['country_id']; ?>"><?php echo $country['country_name']; ?></option>
                        <?php
                        }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="name">City Name<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="city_name" value="" id="city_name" placeholder="City Name">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="name">Picture</label>
                      <input type="file" class="form-control" name="event_pic" value="" id="event_pic">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="box-body">
                      <label for="exampleInputAddress">Status<span style="color:red">*</span></label>
                      <select class="form-control" name="city_status" id="city_status">
                        <option value="" selected>Select Status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" onClick="return city();"><i class="fa fa-check"></i>&nbsp;Submit</button>
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