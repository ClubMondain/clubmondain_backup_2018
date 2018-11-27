<?php include('inc/top.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include('inc/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('inc/sidebar.php');?>
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Create Content</h1>
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
                <?php $formDetails= array('id'=>'insert_content','method'=>'post','class'=>'','name'=>'insert_content');?>
                <?php echo form_open('Dashboard/insert-content',$formDetails);?>
                <div class="row">
                <div class="col-md-6">
                 <div class="box-body">
                      <label for="exampleInputAddress">Page Name<span style="color:red">*</span></label>
                      <select class="form-control" name="page_name" id="page_name">
                        <option value="" selected>Select Page</option>
                        <option value="Home">Home</option>
                        <option value="Story">Our Story</option>
                        <option value="Reg-popup">Registartion Popup</option>
                        <option value="CMS">CMS Page</option>
                       </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="name">Title<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="page_title" value="" id="contentname" placeholder="Title" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box-body">
                      <label for="name">Description<span style="color:red">*</span></label>
                      <textarea class="form-control" name="page_description" value="" id="contentdescription" placeholder="Description" rows="6"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="box-body">
                      <label for="exampleInputAddress">Status</label>
                      <select class="form-control" name="content_status" id="content_status">
                        <option value="">Choose Status</option>
                        <option value="Active" selected>Active</option>
                        <option value="Inactive">Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" onClick="return ContentValidation();"><i class="fa fa-check"></i>&nbsp;Submit</button>
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
<script src="<?php echo base_url('ckeditor/');?>ckeditor.js"></script> 
<script src="<?php echo base_url('assets/');?>js/demo.js"></script> 
<script src="<?php echo base_url('assets/');?>js/admin_alert.js"></script>
</body>
</html>
