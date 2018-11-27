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
      <h1>Edit Category</h1>
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
			  echo form_open_multipart('Category/update-category/'.$all_members[0]['category_id'].'',$formDetails);
			  ?>
                <div class="row">
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="exampleInputFname">Category Name<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="category_name" id="categoryname" value="<?php echo $all_members[0]['category_name']; ?>" required  placeholder="Category Name">
                    </div>
                  </div>
				  <div class="col-md-4">
                    <div class="box-body">
                      <label for="name">Image Upload</label>
                      <input type="file" class="form-control" name="img_upload" id="img_upload" placeholder="">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="exampleInputAddress"> Select Status<span style="color:red">*</span></label>
                      <select class="form-control" name="status" id="cat_status" required>
                        <option name="status" value="Active" <?php if( $all_members[0]['status'] == 'Active'){?> selected  <?php } ?>>Active</option>
                        <option name="status" value="Inactive" <?php if( $all_members[0]['status'] == 'Inactive'){?> selected  <?php } ?>>Inactive</option>
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
