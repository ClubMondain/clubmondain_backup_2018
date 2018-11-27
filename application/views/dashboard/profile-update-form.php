<?php
if(!empty($full_profile[0]['dob']))
{
$get_date_exp = explode('-',$full_profile[0]['dob']);
}else{
$get_date_exp = array();
}
if(count($user_catdata) > 0){
foreach ($user_catdata as $for_data) {
$cate_id[] = $for_data['category_id'];
}
}else{
$cate_id = array();
}
if(!empty($full_profile[0]['fild_permission']))
{
$fild_permission = explode(',',$full_profile[0]['fild_permission']);
}else{
$fild_permission = array();
}
$this->load->view('include/head');
?>
<body>
<?php $this->load->view('include/header'); ?>
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
<h2> Profile Update</h2>
</div>
<div class="details-form mem-form">
<?php $formDetails= array('id'=>'profile_update','method'=>'post','class'=>'','name'=>'profile_update');?>
<?php echo form_open_multipart('UserDashboard/profile_update',$formDetails);?>
<div class="row">
<div class="col-sm-6">
<div class="single">
<p>First Name<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter first name"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" required name="fname" value="<?php echo $full_profile[0]['first_name']?>" id="usr_fname" placeholder="First Name">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Last Name<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter last name"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" required name="lname" value="<?php echo $full_profile[0]['last_name']?>" id="usr_lname" placeholder="Last Name">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Email Address<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter email address"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="email" required name="email" value="<?php echo $full_profile[0]['email']?>" id="usr_email" placeholder="Email Address" >
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Phone Number<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter phone number"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="number" required name="phone" id="usr_phone" value="<?php echo $full_profile[0]['phone']?>"  placeholder="Phone Number">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Country <a class="tooltip-btn" title="Please enter country"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<div class="select">
<select class="js-example-basic-single" name="country" id="user_country" onChange="set_country(this.value,'<?php echo base_url();?>');" required >
<?php foreach($country as $country){?>
<option value="">Choose Country</option>
<option value="<?php echo $country['country_id'];?>" <?php if($full_profile[0]['country_id'] == $country['country_id']){?> selected <?php }?>><?php echo $country['country_name'];?></option>
<?php }?>
</select>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>City<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter city"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<div class="select">
<select class="js-example-basic-single member_city_list" name="city" id="eventcity_list" required >
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
<div class="col-sm-6">
<div class="single">
<p>Company Name
<a class="tooltip-btn" title="Please enter company name"><i class="fa fa-info-circle"></i></a>
</p>
<div class="form-row">
<div class="field">
<input type="text" name="member_company_name" value="<?php echo $full_profile[0]['member_company_name']?>" id="member_company_name">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Function Title
<a class="tooltip-btn" title="Please enter function title"><i class="fa fa-info-circle"></i></a>
</p>
<div class="form-row">
<div class="field">
<input type="text" name="member_function_title" value="<?php echo $full_profile[0]['member_function_title']?>" id="member_function_title">
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
<p>Date Of Birth<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter date of birth"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<div class="date">
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="dob_year" id="usr_year" onchange="setDays(month,day,this)" required >
<option value="">Choose Year</option>
<?php for($i=1900;$i<=2050;$i++){?>
<option value="<?php echo $i;?>" <?php if(count($get_date_exp) > 0){ if($get_date_exp[0] == $i){?> selected <?php }} ?>><?php echo $i;?></option>
<?php }?>
</select>
</div>
</div>
</div>
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="dob_month" id="usr_month" onchange="setDays(this,day,year)" required >
<option value="">Choose Month</option>
<?php for($i=1;$i<=12;$i++){
$name = date('F', mktime(0, 0, 0, $i, 17));?>
<option value="<?php echo $i;?>" <?php if(count($get_date_exp) > 0){ if($get_date_exp[1] == $i){?> selected <?php }} ?>><?php echo $name; ?></option>
<?php }?>
</select>
</div>
</div>
</div>
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="dob_date" id="usr_date" onchange="setDays(month,this,year)" required >
<option value="">Choose Date</option>
<?php for($i=1;$i<=31;$i++){?>
<option value="<?php echo $i;?>" <?php if(count($get_date_exp) > 0){ if($get_date_exp[2] == $i){?> selected <?php }} ?>><?php echo $i; ?></option>
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
<div class="col-sm-6">
<div class="single">
<p>Profile Picture <a class="tooltip-btn" title="Please enter profile picture"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<div class="upload">
<input type="file" name="profile_pic" id="member_profile_pic" onchange="document.getElementById('photo-img-label').innerHTML = document.getElementById('member_profile_pic').value">
<label for="member_profile_pic" id="photo-img-label">Upload Your Photo</label>
</div>
</div>
</div>
</div>
</div>
<input type="hidden" required name="street1" id="usr_street"  value="No Applied" id="autocomplete">
<!-- <div class="col-sm-6">
<div class="single">
<p>Street Address<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter street address"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" required name="street1" id="usr_street" onFocus="geolocate()" value="<?php if (isset($full_profile[0]['street_address_1'])) { echo $full_profile[0]['street_address_1']; }?>" id="autocomplete">
</div>
</div>
</div>
</div> -->
<div class="col-sm-12">
<div class="single">
<p>Interested Categories<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter interested categories"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<div class="select" style="height: auto; min-height: 40px;">
<select required class="select-box cat-select" name="cat_id[]" id="usr_cat_id" multiple="multiple" value="<?php echo set_value('cat_id[]');?>">
<option value="">Choose Category</option>
<?php foreach($catdata as $catdata) {?>
<option value="<?php echo $catdata['category_id'];?>" <?php if(count($cate_id) > 0){ if(in_array($catdata['category_id'],$cate_id)){?> selected <?php }  }?>  ><?php echo $catdata['category_name'];?> </option>
<?php } ?>
</select>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Full Address <a class="tooltip-btn" title="Please enter full address"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<textarea name="address" id="usr_address"><?php if (isset($full_profile[0]['street_address_2'])) { echo trim($full_profile[0]['street_address_2']); }?>
</textarea>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p contenteditable="">Your profile description
<a class="tooltip-btn" title="Please enter about me"><i class="fa fa-info-circle"></i></a>
</p>
<div class="form-row">
<div class="field">
<textarea name="other" id="usr_other"><?php if (isset($full_profile[0]['member_other'])) { echo trim($full_profile[0]['member_other']); } ?></textarea>
</div>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="single">
<p>Facebook<a class="tooltip-btn" title="Please enter facebook link"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" name="user_facebook" value="<?php echo $full_profile[0]['user_facebook']?>" id="usr_lname" placeholder="Your Facebook Link">
</div>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="single">
<p>Instagram <a class="tooltip-btn" title="Please enter intagram link"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" name="user_instagram" value="<?php echo $full_profile[0]['user_instagram']?>" id="usr_lname" placeholder="Your Instagram Link">
</div>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="single">
<p>Twitter<a class="tooltip-btn" title="Please enter twitter link"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" name="user_twitter" value="<?php echo $full_profile[0]['user_twitter']?>" id="usr_lname" placeholder="Your Twitter Link">
</div>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="col-sm-6 col-centered">
<div class="single">
<div class="form-row">
<div class="field">
<!-- <button type="submit" onClick="return user_registration();">UPDATE PROFILE</button> -->
<button type="submit">UPDATE PROFILE</button>
</div>
</div>
</div>
</div>
</div>
<?php echo form_close();?> </div>
</div>
</div>
<?php $this->load->view('include/right-sidebar');?>
</div>
</main>
<?php
$this->load->view('include/footer');
?>
<script type="text/javascript">
$(".js-multiple-category").select2({
placeholder: "Choose Category",
allowClear: true
});
</script>
<script type="text/javascript">
$(document).ready(function() {
$(".js-example-basic-single").select2({
placeholder: "Select Country",
});
});
</script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACjdpaolaUHA-rjK_YEvP8UdQi9Z3YIwk&libraries=places&callback=initAutocomplete" async defer></script> -->
</body>
</html>
