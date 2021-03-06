<?php 
$page_title = 'Create Category';
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
                <?php $formDetails= array('id'=>'insert_category','method'=>'post','class'=>'','name'=>'insert_category');?>
                <?php echo form_open_multipart('Category/insert-category',$formDetails);?>
                <input type="hidden" name="create_date" value="<?php echo date("Y-m-d");?>">
                <input type="hidden" name="update_date" value="<?php echo date("Y-m-d");?>">
                <input type="hidden" name="category_type" value="<?php echo $type; ?>">
                <div class="row">
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="name">Category Name<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="category_name" value="" id="categoryname" placeholder="Category Name" required>
                    </div>
                  </div>
				  <div class="col-md-4">
                    <div class="box-body">
                      <label for="name">Image Upload<span style="color:red">*</span></label>
                      <input type="file" class="form-control" name="img_upload" id="img_upload" placeholder="" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="exampleInputAddress">Status<span style="color:red">*</span></label>
                      <select class="form-control" name="status" id="cat_status" required>
                        <option name="status" value="" class="" selected>Select Status</option>
                        <option name="status" value="Active" class="">Active</option>
                        <option name="status" value="Inactive" class="">Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" onClick="return CategoryValidation(1);"><i class="fa fa-check"></i>&nbsp;Submit</button>
                </div>
                <?php //echo form_submit('submit', 'Save','validate()');?>
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
<script type="text/javascript">
//function validate(){
//	alert("Welcome");
//	var name = document.getElementById('member_username');
//	if(name.value==''){
//	alert("Biplab");
//	}
//	}
</script>
</body>
</html>