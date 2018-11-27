<?php
$this->load->view('include/head');
?>
<body>
<?php
$this->load->view('include/header');
$days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
?>
<main class="dashboard" id="dashboard-main">
<?php $this->load->view('include/left-sidebar');?>
<div class="dashboard-main">
<div class="left">
<div class="dashboard-toggle" id="dashboard-toggle">
<button><i class="fa fa-bars"></i></button>
</div>
<?php if(isset($msg) && $msg !=''){ ?>
<div class="<?php echo $msgclass;?>"> <?php echo $msg;?> </div>
<?php }?>
<div class="single-content">
<div class="dashboard-head">
<h2> My Space</h2>
<a href="<?php echo base_url('Main/business_list_view');?>">SPACE LIST</a> </div>
<div class="details-form">
<?php $formDetails= array('id'=>'insert_business','method'=>'post','class'=>'','name'=>'insert_business');?>
<?php echo form_open_multipart('Main/insert_business',$formDetails);?>
<div class="row">
<div class="col-sm-6">
<div class="single">
<p>Name of Space<span style="color:#F00">*</span> <a class="tooltip-btn" title="Official name Business"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" name="business_name" id="bsn_name" value="<?php echo set_value('business_name');?>">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Website <a class="tooltip-btn" title="Insert the website"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" name="business_website_URL" id="bsn_website" value="<?php echo set_value('business_website_URL');?>">
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="single">
<p>Category<span style="color:#F00">*</span> <a class="tooltip-btn" title="Insert the Category item"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<div class="select">
<select class="select-box cat-select" name="cat_id[]" id="bsn_cat_id" multiple="multiple">
<option value="">Choose Category</option>
<?php foreach($category as $catdata) {?>
<option value="<?php echo $catdata['category_id'];?>" class=""><?php echo $catdata['category_name'];?></option>
<?php } ?>
</select>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="single">
<p>Country<span style="color:#F00">*</span> <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<div class="select">
<select class="js-example-basic-single" name="country" id="bsn_country" onChange="set_country(this.value,'<?php echo base_url();?>');">
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
<select class="js-city-single city_list" name="city" id="eventcity_list">
<option value="">Choose City</option>
</select>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="single">
<p> Street Address<span style="color:#F00">*</span> <a class="tooltip-btn" title="Insert the address of the health item"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" name="business_street" id="autocomplete" value="<?php echo set_value('business_street')?>" onFocus="geolocate()" class="bsn_street">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Postal Code<span style="color:#F00">*</span> <a class="tooltip-btn" title="Insert Postal Code"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" name="business_postal_code" id="bsn_postal_code" value="<?php echo set_value('business_postal_code')?>">
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="single">
<p>Space Images<a class="tooltip-btn" title="Upload Photos, Max 3"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<div class="upload">
<input id="bsn_profile_pic" type="file" name="business_pic" onChange="document.getElementById('photo-img-label').innerHTML = document.getElementById('bsn_profile_pic').files[0].name">
<label for="bsn_profile_pic" id="photo-img-label">Upload Your Photo</label>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Space Banner Images <a class="tooltip-btn" title="Upload Photos, Max 3"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<div class="upload">
<input id="bsn_banner_pic" onChange="document.getElementById('banner-img-label').innerHTML = document.getElementById('bsn_banner_pic').files[0].name" type="file" name="business_banner_pic">
<label for="bsn_banner_pic" id="banner-img-label">Upload Your Banner</label>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-12 opening-hours">
<div class="single">
<p><strong>Opening Hour</strong> <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
</div>
<div class="row">
<?php foreach($days as $k => $d){?>
<div class="col-lg-12">
<div class="single">
<div class="row">
<div class="col-lg-2 col-sm-2">
<p class="day-name"><?php echo $d; ?></p>
<input type="hidden" name="day_name[<?php echo $k; ?>]" value="<?php echo $d; ?>" id="day_name_[<?php echo $k; ?>]">
</div>
<div class="col-lg-4 col-sm-4" id="divf_<?php echo $k; ?>">
<p class="difference">From</p>
<div class="form-row">
<div class="field">
<div class="date">
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="from_opening_hour[<?php echo $k; ?>]" id="from_opening_hour_[<?php echo $k; ?>]" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
<option value="">Choose</option>
<?php for($i=1;$i<=12;$i++){?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php }?>
</select>
</div>
</div>
</div>
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="from_opening_mint[<?php echo $k; ?>]" id="from_opening_mint_[<?php echo $k; ?>]"  onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
<option value="">Choose</option>
<?php for($i=00;$i<60;$i+=15){?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php }?>
</select>
</div>
</div>
</div>
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="from_opening_indication[<?php echo $k; ?>]" id="from_opening_indication_[<?php echo $k; ?>]">
<option value="AM">AM</option>
<option value="PM">PM</option>
</select>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-4" id="divs_<?php echo $k; ?>">
<p class="difference">To</p>
<div class="form-row">
<div class="field">
<div class="date">
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="to_opening_hour[<?php echo $k; ?>]" id="to_opening_hour_[<?php echo $k; ?>]" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
<option value="">Choose</option>
<?php for($i=1;$i<=12;$i++){?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php }?>
</select>
</div>
</div>
</div>
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="to_opening_mint[<?php echo $k; ?>]" id="to_opening_mint_[<?php echo $k; ?>]" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
<option value="">Choose</option>
<?php for($i=0;$i<60;$i+=15){?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php }?>
</select>
</div>
</div>
</div>
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="to_opening_indication[<?php echo $k; ?>]" id="to_opening_indication_[<?php echo $k; ?>]">
<option value="AM">AM</option>
<option value="PM">PM</option>
</select>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-2">
<div class="check closed">
<input type="checkbox" onClick="disable('divf_<?php echo $k; ?>','divs_<?php echo $k; ?>','opening_hour_close_<?php echo strtolower($d); ?>')" id="opening_hour_close_<?php echo strtolower($d); ?>" name="opening_hour_close[<?php echo $k; ?>]" value="1">
<label for="opening_hour_close_<?php echo strtolower($d); ?>">Closed</label>
</div>
</div>
</div>
</div>
</div>
<?php }?>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="single">
<p>Description<span style="color:#F00">*</span> <a class="tooltip-btn" title="Insert the Description"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<textarea name="business_description" id="bsn_description"></textarea>
</div>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="col-sm-6 col-centered">
<div class="single">
<div class="form-row">
<div class="field">
<button type="submit" onClick="return BusinessValidation();">ADD SPACE DETAILS</button>
</div>
</div>
</div>
</div>
</div>
<?php echo form_close();?> </div>
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
placeholder: "Select Country",
});
});
$(document).ready(function() {
$(".js-city-single").select2({
placeholder: "Select City",
});
});
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACjdpaolaUHA-rjK_YEvP8UdQi9Z3YIwk&libraries=places&callback=initAutocomplete"
async defer></script>
</body>
</html>
