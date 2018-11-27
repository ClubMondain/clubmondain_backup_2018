<?php 
$page_title = 'Edit Product';
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
      <img id="loaderData" style="display: none;width: 50px; height: 50px;" src="http://www.bebestore.com.br/images/shared/lazyloader.gif">
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
                $formDetails= array('id'=>'insert_product','method'=>'post','class'=>'','name'=>'insert_product');
                echo form_open_multipart('Product/update-product/'.$all_members[0]['product_id'],$formDetails);
                ?>
                <div class="row">
                 <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputAddress">Category<span style="color:red">*</span></label>
                    <select class="form-control" name="category_id" id="category_id" onchange="getSubcategory(this.value)">
                        <option value="" selected>Select Category</option>
                        <?php
                        if(count($categoryName) > 0){
                        foreach($categoryName as $cateName){ 
                        ?>
                        <option value="<?php echo $cateName['category_id']; ?>" <?php if($cateName['category_id'] == $productCate[0]['category_id']){?> selected <?php } ?>><?php echo  $cateName['category_name']; ?></option>
                        <?php  
                        }
                        }
                       ?>
                      </select>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="box-body">
                      <label for="exampleInputAddress">Subcategory<span style="color:red">*</span></label>
                      <select class="form-control" name="subcategory_id" id="subcategory_id">
                        <?php
                        if(count($subCategoryName) > 0){
                        foreach($subCategoryName as $subcateName){ 
                        ?>
                        <option value="<?php echo $subcateName['category_id']; ?>"<?php if($subcateName['category_id'] == $productCate[0]['subcategory_id']){?> selected <?php } ?>><?php echo  $subcateName['category_name']; ?></option>
                        <?php  
                        }
                        }
                       ?>

                      </select>
                    </div>
                  </div>
                <div class="col-md-6">
                    <div class="box-body">
                      <label for="name">Product Name<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="product_name" value="<?php echo $all_members[0]['product_name']; ?>" id="product_name" placeholder="Product Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="name">Price<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="product_price" value="<?php echo $all_members[0]['product_price']; ?>" id="product_price" placeholder="Product Price">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="box-body">
                      <label for="name">Description<span style="color:red">*</span></label>
                      <textarea class="form-control ckeditor" id="product_description" name="product_description" style="margin-top: 0px; margin-bottom: 0px; height: 251px;"><?php echo $all_members[0]['product_description']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="name">Qty<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="product_qty" value="<?php echo $all_members[0]['product_qty']; ?>" id="product_qty" placeholder="Qty">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="name">Picture</label>
                      <input type="file" multiple="multiple" class="form-control" name="file_name[]" value="" id="pic" placeholder="Qty">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="exampleInputAddress">Status<span style="color:red">*</span></label>
                      <select class="form-control" name="status" id="status">
                        <option value="">Select Status</option>
                        <option value="Active" <?php if($all_members[0]['status'] == 'Active'){?> selected <?php } ?>>Active</option>
                        <option value="Inactive" <?php if($all_members[0]['status'] == 'Inactive'){?> selected <?php } ?>>Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" onClick=""><i class="fa fa-check"></i>&nbsp;Submit</button>
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> 
<script type="text/javascript">

$(".sd").select2();

var getSubcategory = function(e)
{
  $.ajax({
    url: '<?php echo base_url('Product/get_subcategory'); ?>',
    type: 'POST',
    dataType: 'HTML',
    data: { id: e },
    beforeSend: function( ) {
      $('#loader').show();
    },
    success: function( data ) {
      $('#loader').hide();
      $('#subcategory_id').html(data);
    }
  })
}
</script>
</body>
</html>