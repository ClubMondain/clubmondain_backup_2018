<?php 
$page_title = 'Edit Banner';
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
      <h1> <?php echo $page_title;?> </h1>
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
        <?php 
			  $formDetails= array('id'=>'list_category_update','method'=>'post','class'=>'','name'=>'list_category_update');
			  echo form_open_multipart('Banner/UpdateBanner/'.$dataSection[0]['banner_id'].'',$formDetails);
			  ?>
                <div class="row">
                 <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputAddress">Page Name<span style="color:red">*</span></label>
                      <select class="form-control" name="page_name" id="page_name" required>
                        <option value="" selected>Select Status</option>
                        <option value="4" <?php if($dataSection[0]['page_name'] == 4){?> selected <?php } ?>>Home</option>
                        <option value="5" <?php if($dataSection[0]['page_name'] == 5){?> selected <?php } ?>>City</option>
                        <option value="6" <?php if($dataSection[0]['page_name'] == 6){?> selected <?php } ?>>News</option>
                        <option value="1" <?php if($dataSection[0]['page_name'] == 1){?> selected <?php } ?>>Events / Spaces (under the Map)</option>
                        <option value="2" <?php if($dataSection[0]['page_name'] == 2){?> selected <?php } ?>>Detail page of an Event / Space</option>
                        <option value="3" <?php if($dataSection[0]['page_name'] == 3){?> selected <?php } ?>>News page</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="name">Banner Link</label>
                      <input type="text" class="form-control" name="banner_link" value="<?php echo $dataSection[0]['banner_link']; ?>" id="banner_link" placeholder="Banner Link">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="name">Image Upload</label>
                      <input type="file" class="form-control" name="banner_image" id="banner_image" placeholder="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputAddress">Status<span style="color:red">*</span></label>
                      <select class="form-control" name="status" id="status" required>
                        <option value="">Select Status</option>
                        <option value="Active" <?php if($dataSection[0]['status'] == 'Active'){?> selected <?php } ?>>Active</option>
                        <option value="Inactive" <?php if($dataSection[0]['status'] == 'Inactive'){?> selected <?php } ?>>Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" onClick="return CategoryValidation(2);"><i class="fa fa-check"></i>&nbsp;Submit</button>
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
