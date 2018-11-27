<?php
$get_cate_id_exp   = array();
if(count($get_cate_id) > 0){
foreach($get_cate_id as $get_cate_id)
$get_cate_id_exp = $get_cate_id;
}else{
$get_cate_id_exp   = array();
}
$this->load->view('include/head');
?>
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
<div class="single-content">
<div class="dashboard-head">
<h2> My Space</h2>
<a href="<?php echo base_url('Main/business_list_view');?>">SPACE LIST</a> </div>
<?php if(isset($msg) && $msg !=''){ ?>
<div class="alert <?php echo $msgclass;?>"> <?php echo $msg;?> </div>
<?php }?>
<div class="details-form">
<?php $formDetails= array('id'=>'update_business','method'=>'post','class'=>'','name'=>'update_business');?>
<?php echo form_open_multipart('Main/update_business/'.base64_encription($all_data[0]['business_id']),$formDetails);?>
<div class="row">
<div class="col-sm-6">
<div class="single">
<p>Name of Space<span style="color:#F00">*</span> <a class="tooltip-btn" title="Official name Business"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" name="business_name" id="bsn_name" value="<?php echo $all_data[0]['business_name'];?>">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Website <a class="tooltip-btn" title="Insert the website"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" name="business_website_URL" id="bsn_website" value="<?php echo $all_data[0]['business_website_url'];?>">
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
<select class="select-box cat-select cat-select" name="cat_id[]" id="bsn_cat_id" multiple="multiple">
<option value="">Choose Category</option>
<?php foreach($catdata as $catdata) {?>
<option value="<?php echo $catdata['category_id'];?>" class="" <?php if(in_array($catdata['category_id'],$get_cate_id_exp)){?> selected <?php } ?>><?php echo $catdata['category_name'];?></option>
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
<option value="">Choose Country</option>
<?php foreach($country as $country){?>
<option value="<?php echo $country['country_id'];?>"
<?php if($all_data[0]['business_country'] == $country['country_name']){?> selected <?php }?>><?php echo $country['country_name'];?></option>
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
<select class="js-basic-city city_list" name="city" id="eventcity_list">
<option value="">Choose City</option>
<?php foreach($city as $city){?>
<option value="<?php echo $city['city_id'];?>" <?php if($all_data[0]['city_id'] == $city['city_id']){?> selected <?php }?>><?php echo $city['city_name'];?></option>
<?php }?>
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
<p> Street Address <span style="color:red">*</span><a class="tooltip-btn" title="Insert the address of the health item"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" name="business_street" class="bsn_street" value="<?php echo $all_data[0]['business_street'];?>" onFocus="geolocate()" id="autocomplete">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Postal Code<span style="color:#F00">*</span> <a class="tooltip-btn" title="Insert Postal Code"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" name="business_postal_code" id="bsn_postal_code" value="<?php echo $all_data[0]['business_postal_code'];?>" ">
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="single">
<p>Space Images <span style="color:red">*</span> <a class="tooltip-btn" title="Business image/banner should be max 5mb"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<div class="upload">
<input id="profile_pic_bsn" type="file" name="business_pic" onChange="document.getElementById('photo-img-label').innerHTML = document.getElementById('profile_pic_bsn').value">
<label for="profile_pic_bsn" id="photo-img-label">Upload Your Photo</label>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Space Banner Images <span style="color:red">*</span> <a class="tooltip-btn" title="Upload Photos, Max 3"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<div class="upload">
<input id="banner_pic_bsn" onChange="document.getElementById('banner-img-label').innerHTML = document.getElementById('banner_pic_bsn').value" type="file" name="business_banner_pic">
<label for="banner_pic_bsn" id="banner-img-label">Upload Your Banner</label>
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
<?php $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");?>
<?php foreach($days as $k => $d){
if(isset($opening_hour[$k]['opening_hour_from']) || isset($opening_hour[$k]['opening_hour_to']) || isset($opening_hour[$k]['opening_hour_close'])){
$opening_hour_from_arr = explode("-", $opening_hour[$k]['opening_hour_from']);
$opening_hour_to_arr = explode("-", $opening_hour[$k]['opening_hour_to']);
$opening_hour_close = $opening_hour[$k]['opening_hour_close'] ? 'checked="checked"' : '';}?>
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
<?php
for($i=1;$i<=12;$i++){
$selected = '';
if($opening_hour_from_arr[0] == $i){
$selected = 'selected="selected"';
}
?>
<option <?php echo $selected; ?> value="<?php echo $i;?>"><?php echo $i;?></option>
<?php }?>
</select>
</div>
</div>
</div>
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="from_opening_mint[<?php echo $k; ?>]" id="from_opening_mint_[<?php echo $k; ?>]"  onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
<?php
for($i=0;$i<60;$i+=15){
$selected = '';
if($opening_hour_from_arr[1] == $i){
$selected = 'selected="selected"';
}
?>
<option <?php echo $selected; ?> value="<?php echo $i;?>"><?php echo $i;?></option>
<?php }?>
</select>
</div>
</div>
</div>
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="from_opening_indication[<?php echo $k; ?>]" id="from_opening_indication_[<?php echo $k; ?>]">
<option <?php if(isset($opening_hour_from_arr[2])) { echo ($opening_hour_from_arr[2] == "AM") ? 'selected="selected"' : ''; }?> value="AM">AM</option>
<option <?php if(isset($opening_hour_from_arr[2])) { echo ($opening_hour_from_arr[2] == "PM") ? 'selected="selected"' : ''; }?> value="PM">PM</option>
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
<?php
for($i=1;$i<=12;$i++){
$selected = '';
if($opening_hour_to_arr[0] == $i){
$selected = 'selected="selected"';
}
?>
<option <?php echo $selected; ?> value="<?php echo $i;?>"><?php echo $i;?></option>
<?php }?>
</select>
</div>
</div>
</div>
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="to_opening_mint[<?php echo $k; ?>]" id="to_opening_mint_[<?php echo $k; ?>]" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
<?php for($i=0;$i<60;$i+=15){
$selected = '';
if($opening_hour_to_arr[1] == $i){
$selected = 'selected="selected"';
}?>
<option <?php echo $selected; ?> <?php echo $selected; ?> value="<?php echo $i;?>">
<?php echo $i;?>
</option>
<?php }?>
</select>
</div>
</div>
</div>
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="to_opening_indication[<?php echo $k; ?>]" id="to_opening_indication_[<?php echo $k; ?>]">
<option <?php if(isset($opening_hour_to_arr[2])) { echo ($opening_hour_to_arr[2] == "AM") ? 'selected="selected"' : ''; }?> value="AM">AM</option>
<option <?php if(isset($opening_hour_to_arr[2])) { echo ($opening_hour_to_arr[2] == "PM") ? 'selected="selected"' : ''; }?> value="PM">PM</option>
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
<input <?php if(isset($opening_hour[$k]['opening_hour_close'])){ echo $opening_hour_close; }?> type="checkbox" onClick="disable('divf_<?php echo $k; ?>','divs_<?php echo $k; ?>','opening_hour_close_<?php echo strtolower($d); ?>')" id="opening_hour_close_<?php echo strtolower($d); ?>" name="opening_hour_close[<?php echo $k; ?>]" value="1">
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
<textarea name="business_description" id="bsn_description"><?php echo $all_data[0]['business_description'];?></textarea>
</div>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="col-sm-12 col-centered">
<div class="single">
<div class="form-row">
<div class="field">
<button type="submit" onClick="return BusinessValidation();">UPDATE SPACE DETAILS</button>
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
placeholder: "Choose Country",
});
});
$(document).ready(function() {
$(".js-city-single").select2({
});
});
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACjdpaolaUHA-rjK_YEvP8UdQi9Z3YIwk&libraries=places&callback=initAutocomplete"
async defer></script>
</body>
</html>
