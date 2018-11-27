<?php
if(!empty($full_profile[0]['dob']))
{
$trainer_dob = explode("-",$full_profile[0]['dob']);
}else{
$trainer_dob = array();
}
if(!empty($full_profile[0]['fild_permission']))
{
$fild_permission = explode(',',$full_profile[0]['fild_permission']);
}else{
$fild_permission = array();
}
$this->load->view('include/head');?>
<body>
<?php
$this->load->view('include/header');
if(!empty($full_profile[0]['about_us'])){
$trainer_about_us = explode(',',$full_profile[0]['about_us']);}?>
<main class="dashboard" id="dashboard-main">
<?php $this->load->view('include/left-sidebar');?>
<div class="dashboard-main">
<div class="left">
<div class="dashboard-toggle" id="dashboard-toggle">
<button><i class="fa fa-bars"></i></button>
</div>
<?php if(isset($msg) && $msg !=''){ ?>
<div class="alert <?php echo $msg_class;?>"> <?php echo $msg;?> </div>
<?php }?>
<div class="single-content">
<div class="dashboard-head">
<h2>  Profile Update</h2>
</div>
<div class="details-form mem-form">
<div class="row">
<?php
$formDetails = array('id'=>'trainer_update','name'=>'trainer_update','method'=>'post','novalidate' => 'novalidate', 'autocomplete' => 'off');
echo form_open_multipart('TrainerDashboard/update_personal_trainer_reg',$formDetails);
?>
<div class="col-sm-6">
<div class="single">
<p>First Name<span style="color:#F00">*</span>
<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
</p>
<div class="form-row">
<div class="field">
<input type="text" required name="fname" id="trn_fname" value="<?php echo $full_profile[0]['first_name'];?>">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Last Name<span style="color:#F00">*</span>
<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
</p>
<div class="form-row">
<div class="field">
<input type="text" required name="lname" id="trn_lname" value="<?php echo $full_profile[0]['last_name'];?>">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Email<span style="color:#F00">*</span>
<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
</p>
<div class="form-row">
<div class="field">
<input type="email" required name="email" id="trn_email" value="<?php echo $full_profile[0]['email'];?>">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Phone Number
<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
</p>
<div class="form-row">
<div class="field">
<input type="number" name="phone" id="trn_phone" value="<?php echo $full_profile[0]['phone'];?>" onKeyUp="this.value=this.value.replace(/[^\d]/,'')">
</div>
</div>
</div>
</div>
<div class="col-sm-12">
<div class="single">
<p>Date Of Birth<span style="color:#F00">*</span>
<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
</p>
<div class="form-row">
<div class="field">
<div class="date">
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="dob_year" required id="trn_year" value="<?php echo set_value('dob_year');?>" onchange="setDays(month,day,this)">
<option value="">Choose Year</option>
<?php for($i=1900;$i<=2050;$i++){?>"
<option <?php if ($trainer_dob[0] == $i) { ?>selected="true" <?php }?> value="<?php echo $i;?>"><?php echo $i; ?></option>
<?php }?>
</select>
</div>
</div>
</div>
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="dob_month" required id="trn_month" onchange="setDays(this,day,year)">
<?php $dob_month = $_POST["dob_month"];?>
<option value="">Choose Month</option>
<?php
for($i=1;$i<=12;$i++){
$name = date('F', mktime(0, 0, 0, $i, 17));
?>
<option <?php if ($trainer_dob[1] == $i) { ?>selected="true" <?php }?> value="<?php echo $i;?>"><?php echo $name; ?></option>
<?php }?>
</select>
</div>
</div>
</div>
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="dob_date" required id="trn_date" onchange="setDays(month,this,year)">
<?php $dob_date = $_POST["dob_date"];?>
<option value="">Choose Date</option>
<?php for($i=1;$i<=31;$i++){?>
<option <?php if ($trainer_dob[2] == $i) { ?>selected="true" <?php }; ?> value="<?php echo $i;?>"><?php echo $i; ?>
</option>
<?php }?>
</select>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-12">
<div class="row">
<div class="col-md-12">
<div class="single">
<p>Address
<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
</p>
<div class="form-row">
<div class="field">
<input type="text" placeholder="Street Address" name="street_adr" value="<?php echo $full_profile[0]['street_address_1'];?>" id="trn_street">
</div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="single">
<div class="form-row">
<div class="field">
<input type="text" placeholder="Street Address 2" name="street_adr2" value="<?php echo $full_profile[0]['street_address_2'];?>" id="trn_street_adr2">
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="single">
<div class="form-row">
<div class="field">
<div class="select">
<select name="country" id="trn_country" class="js-example-basic-single" onChange="set_country(this.value,'<?php echo base_url();?>');">
<option value="">Choose Country</option>
<?php foreach($country as $country){?>
<option value="<?php echo $country['country_id'];?>" <?php if($full_profile[0]['country_id'] == $country['country_id']){?> selected <?php }?>><?php echo $country['country_name'];?></option>
<?php }?>
</select>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="single">
<div class="form-row">
<div class="field">
<div class="select">
<select class="js-example-basic-single trainer_city_list" name="city" id="eventcity_list">
<option value="">Choose City</option>
<?php foreach($city as $city){?>
<option value="<?php echo $city['city_id'];?>" <?php if($full_profile[0]['city_id'] == $city['city_id']){?> selected <?php }?>><?php echo $city['city_name'];?></option>
<?php }?>
</select>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="single">
<div class="form-row">
<div class="field">
<input type="text" placeholder="State" name="state" value="<?php echo $full_profile[0]['state'];?>" id="trn_state">
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="single">
<div class="form-row">
<div class="field">
<input type="text" placeholder="Postal Code" name="postal_code" value="<?php echo $full_profile[0]['postal_code'];?>" id="trn_post_code">
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-12">
<div class="single">
<p>Field Permission(Details selected will not be shown in your public profile )</p>
<div class="form-row">
<div class="field">
<div class="select">
<select class="select-box cat-select" name="field_permision[]" id="field_permision" multiple="multiple">
<option value="1" <?php if(count($fild_permission) > 0){ if(in_array('1', $fild_permission)){?> selected <?php } } ?> >Last Name</option>
<option value="2" <?php if(count($fild_permission) > 0){ if(in_array('2', $fild_permission)){?> selected <?php } } ?> >Email</option>
<option value="3" <?php if(count($fild_permission) > 0){ if(in_array('3', $fild_permission)){?> selected <?php } } ?> >Phone</option>
<option value="4" <?php if(count($fild_permission) > 0){ if(in_array('4', $fild_permission)){?> selected <?php } } ?>  >Company Name</option>
<option value="5" <?php if(count($fild_permission) > 0){ if(in_array('5', $fild_permission)){?> selected <?php } } ?> >Function Title</option>
</select>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Your profile description
<a class="tooltip-btn" title="Tell us about your field of expertise and passion"><i class="fa fa-info-circle"></i></a></p>
<div class="form-row">
<div class="field">
<textarea name="about_yourself" id="trn_yourself"><?php echo trim($full_profile[0]['trainer_about_yourself']);?></textarea>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Experience
<a class="tooltip-btn" title="Tell us about your past experience, Let us get to know you."><i class="fa fa-info-circle"></i></a>
</p>
<div class="form-row">
<div class="field">
<textarea name="experience" id="trn_exp"><?php echo trim($full_profile[0]['trainer_experience']);?></textarea>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Profile Picture
<a class="tooltip-btn" title="" data-original-title="Tooltip"><i class="fa fa-info-circle"></i></a>
</p>
<div class="form-row">
<div class="field">
<div class="upload">
<input id="photo-img" onchange="document.getElementById('photo-img-label').innerHTML = document.getElementById('photo-img').value" type="file" name="photo" id="trn_photo">
<label for="photo-img" id="photo-img-label">Upload Your Photo</label>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Facebook<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" name="user_facebook" value="<?php echo $full_profile[0]['user_facebook']?>" id="usr_lname" placeholder="Your Facebook Link">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Instagram <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" name="user_instagram" value="<?php echo $full_profile[0]['user_instagram']?>" id="usr_lname" placeholder="Your Instagram Link">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Twitter<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" name="user_twitter" value="<?php echo $full_profile[0]['user_twitter']?>" id="usr_lname" placeholder="Your Twitter Link">
</div>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="col-md-4 col-sm-6 col-centered">
<div class="single">
<div class="form-row">
<div class="field">
<!-- <button type="submit" onclick="return trainer_registration();" >Update Profile</button> -->
<button type="submit">Update Profile</button>
</div>
</div>
</div>
</div>
<?php echo form_close();?>
</div>
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
$(document).ready(function() {
$(".js-example-basic-single").select2({
placeholder: "Select Country",
});
});
</script>
</body>
</html>
