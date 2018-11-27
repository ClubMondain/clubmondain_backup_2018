<?php
$this->load->view('include/head');?>
<body>
<?php
$this->load->view('include/header');?>
<main class="dashboard" id="dashboard-main">
<?php $this->load->view('include/left-sidebar');?>
<div class="dashboard-main">
<div class="left">
<div class="dashboard-toggle" id="dashboard-toggle">
<button><i class="fa fa-bars"></i></button>
</div>
<?php if(isset($msg) && $msg !=''){ ?>
<div class="alert <?php echo $msgclass;?>"> <?php echo $msg;?> </div>
<?php }?>
<div class="single-content">
<div class="dashboard-head">
<h2>Create Meet Up</h2>
</div>
<div class="details-form mem-form">
<?php $formDetails= array('id'=>'insert_meet_up','method'=>'post','class'=>'','name'=>'insert_meet_up');?>
<?php echo form_open_multipart('Main/insert_meet_up',$formDetails);?>
<div class="row">
<div class="col-sm-4">
<div class="single">
<p>Meet Up Title<span style="color:#F00">*</span>
<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
</p>
<div class="form-row">
<div class="field">
<input type="text" name="meet_up_name" id="meet_up_name" value="<?php echo set_value('meet_up_name');?>">
</div>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="single">
<p>Date
<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
</p>
<div class="form-row">
<div class="field">
<input type="text" name="meetup_date" id="meetup_date" value="">
</div>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="single">
<p>Meet Up Image
<a class="tooltip-btn" title="Upload Photos, Max 3"><i class="fa fa-info-circle"></i></a>
</p>
<div class="form-row">
<div class="field">
<div class="upload">
<input id="blog_pic" type="file" name="meet_up_image" onchange="document.getElementById('photo-img-label').innerHTML = document.getElementById('blog_pic').value">
<label for="blog_pic" id="photo-img-label">Upload Your Photo</label>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Country<span style="color:#F00">*</span> <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<div class="select">
<select class="js-example-basic-single" name="country" id="meetupcountry" onChange="set_country(this.value,'<?php echo base_url();?>');">
<?php foreach($country as $country){?>
<option value="">Choose Country</option>
<option value="<?php echo $country['country_id'];?>"><?php echo $country['country_name'];?></option>
<?php }?>
</select>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>City<span style="color:#F00">*</span> <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<div class="select">
<select class="js-city-single city_list meetup_city" name="city" id="eventcity_list">
<option value="">Choose City</option>
</select>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-12">
<div class="single">
<p>Meet Up Description<span style="color:#F00">*</span>
<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
</p>
<div class="form-row">
<div class="field">
<textarea name="meet_up_description" id="meet_up_description" ></textarea>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="col-sm-6 col-centered">
<div class="single">
<div class="form-row">
<div class="field">
<button type="submit" onClick="return meetupValidation();">Create Meet Up</button>
</div>
</div>
</div>
</div>
</div>
<?php echo form_close();?>
</div>
</div>
</div>
<?php $this->load->view('include/right-sidebar');?>
</div>
</main>
<?php $this->load->view('include/footer');?>
<script type="text/javascript">
$(".js-multiple-category").select2({
placeholder: "Choose Category",
allowClear: true
});
</script>
<script type="text/javascript">
$(document).ready(function() {
$(".js-example-basic-single").select2({
placeholder: "Choose Country",
});
});
$(document).ready(function() {
$(".js-city-single").select2({
});
});
</script>
</body>
</html>
