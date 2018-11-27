<?php 
$page_title = 'Edit Space Feedback';
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
				$formDetails= array('id'=>'update-feedback','method'=>'post','class'=>'','name'=>'insert_city');
				echo form_open_multipart('Space/update-feedback/'.$dataSection[0]['store_feedback_id'],$formDetails);
				?>
                <div class="row">
              
                  <div class="col-md-12">
                    <div class="box-body">
                      <label for="name">Feedback<span style="color:red">*</span></label>
                      <textarea style="margin: 0px -712px 0px 0px; width: 1022px; height: 162px;" class="form-control" name="store_feedback"><?php echo $dataSection[0]['store_feedback']; ?></textarea>
                    </div> 
                  </div>

                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="exampleInputAddress">Service<span style="color:red">*</span></label>
                      <select class="form-control" name="store_service_ratting" id="store_service_ratting">
                        <option value="" selected>Select Star</option>
                          <?php for($i=1;$i<=5;$i++){?>
                         <option value="<?php echo $i; ?>" <?php if($dataSection[0]['store_service_ratting'] == $i ){?> selected <?php } ?>><?php echo $i; ?></option>
                         <?php } ?>
                      </select>
                    </div>
                  </div>
  
      <div class="col-md-4">
                    <div class="box-body">
                      <label for="exampleInputAddress">Location<span style="color:red">*</span></label>
                      <select class="form-control" name="store_location_ratting" id="store_location_ratting">
                        <option value="" selected>Select Star</option>
                          <?php for($i=1;$i<=5;$i++){?>
                         <option value="<?php echo $i; ?>" <?php if($dataSection[0]['store_location_ratting'] == $i ){?> selected <?php } ?>><?php echo $i; ?></option>
                         <?php } ?>
                      </select>
                    </div>
                  </div>


                      <div class="col-md-4">
                    <div class="box-body">
                      <label for="exampleInputAddress">Quality<span style="color:red">*</span></label>
                      <select class="form-control" name="store_quality_ratting" id="store_quality_ratting">
                        <option value="" selected>Select Star</option>
                          <?php for($i=1;$i<=5;$i++){?>
                         <option value="<?php echo $i; ?>" <?php if($dataSection[0]['store_quality_ratting'] == $i ){?> selected <?php } ?>><?php echo $i; ?></option>
                         <?php } ?>
                      </select>
                    </div>
                  </div>                  
      
                  <div class="col-md-12">
                    <div class="box-body">
                      <label for="exampleInputAddress">Status<span style="color:red">*</span></label>
                      <select class="form-control" name="status" id="status">
                        <option value="">Select Status</option>
                        <option value="Active" <?php if($dataSection[0]['status'] == 'Active' ){?> selected <?php } ?>>Active</option>
                        <option value="Inactive" <?php if($dataSection[0]['status'] == 'Inactive' ){?> selected <?php } ?>>Inactive</option>
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