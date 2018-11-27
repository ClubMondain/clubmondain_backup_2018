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
      <h1>Create Product Subcategory</h1>
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
                    <?php $formDetails= array('id'=>'insert_category','method'=>'post','class'=>'','name'=>'insert_category');?>
                    <?php echo form_open('Dashboard/insert_product_sub_category',$formDetails);?>
                    <div style="color:#F00"></div>
                    <input type="hidden" name="create_date" value="<?php echo date("Y-m-d");?>">
                    <input type="hidden" name="category_type" value="sub-product">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="box-body">
                          <label for="exampleInputAddress">Category <span style="color:red">*</span></label>
                          <select class="form-control" name="parent_id" value="" id="parent_id">
                            <option value="" selected>Select Category</option>
                            <?php foreach($categoryDetails as $categoryDetailsSingle){ ?>
                            <option value="<?php echo $categoryDetailsSingle['category_id'] ?>"><?php echo $categoryDetailsSingle['category_name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="box-body">
                          <label for="name">Sub-Category Name<span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="category_name" value="" id="category_name" placeholder="Sub-Category Name" maxlength="55" minlength="2">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="box-body">
                          <label for="exampleInputAddress">Status<span style="color:red">*</span></label>
                          <select class="form-control" name="status" value="" id="sub_status">
                            <option value="" selected>Select Status</option>
                            <option value="Active" >Active</option>
                            <option value="Inactive">Inactive</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary" onClick="return SubCategoryValidation();"><i class="fa fa-check"></i>&nbsp;Submit</button>
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
