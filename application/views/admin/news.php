<?php
$page_title = 'Create News';
include('inc/top.php');?>
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
				$formDetails= array('id'=>'insert_news','method'=>'post','class'=>'','name'=>'insert_news');
				echo form_open_multipart('Dashboard/insert-news',$formDetails);
				?>
                <div class="row">
                <div class="col-md-6">
                    <div class="box-body">
                      <label for="News Heading">News Heading<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="news_heading" value="" id="news_heading" placeholder="New Heading">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="Category">Category<span style="color:red">*</span></label>
                      <select class="form-control js-example-basic-multiple" name="news_cate_id_FK[]" id="news_cate_id_FK" multiple="multiple">
                        <option value="">Select Category</option>
                       	<?php
						if(count($news_category) > 0){
						foreach($news_category as $newsc){
						?>
                        <option value="<?php echo $newsc['category_id']; ?>"><?php echo $newsc['category_name']; ?></option>
                        <?php
						}
						}
						?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="box-body">
                      <label for="Description">Description<span style="color:red">*</span></label>
                      <textarea class="form-control ckeditor" name="news_description" value="" id="news_description" placeholder="Description" rows="6"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <label for="Date">Date<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="news_date" value="" id="news_date" placeholder="Date">
                    </div>
                  </div>
                   <div class="col-md-6">
                    <div class="box-body">
                      <label for="Address">Address<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="news_address" id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="Country">Country<span style="color:red">*</span></label>
                      <select class="form-control" name="country_id_FK" id="country_id_FK" onChange="getCity(this.value)">
                        <option value="" selected>Select Country</option>
                       	<?php
						if(count($countries) > 0){
						foreach($countries as $country){
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
                      <label for="City">City<span style="color:red">*</span></label>
                      <select class="form-control" name="city_id_FK" id="city_id_FK"></select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="name">Picture</label>
                      <input type="file" class="form-control" name="img_upload" value="" id="img_upload">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="Address">Facebook Link</label>
                      <input type="text" class="form-control" name="news_fb_link" id="news_fb_link" placeholder="Facebook Link" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="Address">Twitter Link</label>
                      <input type="text" class="form-control" name="news_twitter_link" id="news_twitter_link" placeholder="Twitter Link" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <label for="Address">Instagram Link</label>
                      <input type="text" class="form-control" name="news_instagram_link" id="news_instagram_link" placeholder="Instagram Link" >
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="box-body">
                      <label for="exampleInputAddress">Status<span style="color:red">*</span></label>
                      <select class="form-control" name="news_status" id="news_status">
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
<script src="<?php echo base_url('assets/');?>js/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/fastclick.js"></script>
<script src="<?php echo base_url('assets/');?>js/app.min.js"></script>
<script src="<?php echo base_url('ckeditor/');?>ckeditor.js"></script>
<script src="<?php echo base_url('assets/');?>js/demo.js"></script>
<script src="<?php echo base_url('assets/');?>js/admin_alert.js"></script>
<script src="<?php echo base_url('assets/');?>js/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript">
$(function(){
$(".js-example-basic-multiple").select2();
})
var getCity = function(e)
{
	$.ajax({
	url : "<?php echo base_url('dashboard/ajax_city'); ?>",
	type: "POST",
	dataType: "html",
	data:{e:e},
	success: function(x){
	if(x == 'ERROR'){
	swal('OOPS !! SORRY SOMETHING WENT WRONG. PLEASE TRY AFTER SOME TIME');
	}else{
	$('#city_id_FK').html('');
	$('#city_id_FK').html(x);
	}
	}
	});
}
</script>
<script type="text/javascript">
$('#news_date').datepicker({
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
