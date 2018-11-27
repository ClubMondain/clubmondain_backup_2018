<?php 
$page_title = 'Edit Membership';
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
				$formDetails = array('id'=>'update_membership','method'=>'post','class'=>'','name'=>'update_membership');
				echo form_open('Membership/update_membership/'.$all_members[0]['membership_id'],$formDetails);
				?>
                <div class="row">
                <div class="col-md-6">
                    <div class="box-body">
                      <label for="Membership Category">Membership Category<span style="color:red">*</span></label>
                      <select class="form-control" name="membership_category_id" id="membership_category_id">
                        <option value="" selected>Select Category</option>
                        <option value="Business_Traveler" <?php if($all_members[0]['membership_category_id'] == 'Business_Traveler'){?> selected <?php } ?>>Business Traveler</option>
                        <option value="Company" <?php if($all_members[0]['membership_category_id'] == 'Company'){?> selected <?php } ?>>Company</option>
                        <option value="Personal_Trainer" <?php if($all_members[0]['membership_category_id'] == 'Personal_Trainer'){?> selected <?php } ?>>Personal Trainer</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="Membership Name">Membership Name<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="membership_name" value="<?php echo $all_members[0]['membership_name']; ?>" id="membership_name" placeholder="Membership Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="Type">Type<span style="color:red">*</span></label>
                      <select class="form-control" name="membership_type" id="membership_type">
                        <option value="">Select Type</option>
                        <option value="PAID" <?php if($all_members[0]['membership_type'] == 'PAID'){?> selected <?php } ?>>PAID</option>
                        <option value="FREE" <?php if($all_members[0]['membership_type'] == 'FREE'){?> selected <?php } ?>>FREE</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="Price">Price<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="membership_price" value="<?php echo $all_members[0]['membership_price']; ?>" id="membership_price" placeholder="Membership Price">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="Start Date">Start Date<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="membership_start_date" value="<?php echo $all_members[0]['membership_start_date']; ?>" id="membership_start_date" placeholder="Start Date">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="End Date">End Date<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="membership_end_date" value="<?php echo $all_members[0]['membership_end_date']; ?>" id="membership_end_date" placeholder="End Date">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="box-body">
                      <label for="Description">Description</label>
                      <textarea class="form-control ckeditor" name="membership_description" value="" id="membership_description" placeholder="Description" rows="6"><?php echo stripslashes($all_members[0]['membership_description']); ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="box-body">
                      <label for="Status">Status<span style="color:red">*</span></label>
                      <select class="form-control" name="membership_status" id="membership_status">
                        <option value="">Select Status</option>
                        <option value="Active" <?php if($all_members[0]['membership_status'] == 'Active'){?> selected <?php } ?>>Active</option>
                        <option value="Inactive" <?php if($all_members[0]['membership_status'] == 'Inactive'){?> selected <?php } ?>>Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" onClick="return membershipValidation();"><i class="fa fa-check"></i>&nbsp;Submit</button>
                </div>
                <?php echo form_close();?> 
                </div>
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
<script src="<?php echo base_url('ckeditor/');?>ckeditor.js"></script> 
<script src="<?php echo base_url('assets/');?>js/demo.js"></script> 
<script src="<?php echo base_url('assets/');?>js/admin_alert.js"></script> 
<script src="<?php echo base_url('assets/');?>js/jquery-ui.js"></script>
<script type="text/javascript">
$('#membership_start_date,#membership_end_date').datepicker({
    dateFormat: 'yy-mm-dd',
	changeMonth: true,
	changeYear:  true
});
</script> 
<style type="text/css">
#ui-datepicker-div { font-size: 12px; } 
</style>
</body>
</html>