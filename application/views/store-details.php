<?php
include('include/head.php'); ?>
<body>
<?php include('include/header.php');?>
<main>
<?php foreach($details_store as $header_business){?>
<section class="page-banner">
<div class="image">
<?php if($header_business['business_banner_image']!=''){?>
<img class="slide-img" src="<?php echo base_url('upload/business/').$header_business['business_banner_image'];?>">
<?php }else{?>
<img src="<?php echo base_url('assets/web/images/')?>bg-3.jpg" alt="">
<?php }?>
</div>
<div class="content">
<h3><?php echo ucwords($header_business['business_name']);?></h3>
<br>
<p><?php echo ucwords($header_business['business_street']);?></p>
</div>
<div class="overlay"></div>
</section>
<?php }?>
<div class="container-fluid max-1240">
<div class=" full-content">
<?php foreach($details_store as $body_business){?>
<div class="page-content">
<div class="page-inner-content">
<div class="page-tab-links golden">
<ul>
<li <?php if(isset($msg) and empty($msg)){ ?> class="active" <?php } ?>>
<a data-toggle="tab" href="#about">About Us</a>
</li>
<li <?php if(isset($msg) and !empty($msg)){  ?> class="active" <?php } ?>>
<a data-toggle="tab" href="#reviews">Reviews</a>
</li>
<!-- <li><a href="#"><i class="fa fa-plus"></i> businesss / Chat</a></li> -->
<?php if(!empty($class_details)){ ?>
<li><a href="<?php echo base_url('Home/trainer-classes/').base64_encription($details_store[0]['business_id']).'/'.base64_encription($details_store[0]['user_id']); ?>"> Classes</a></li>
<?php } ?>
</ul>
</div>
<div class="tab-content">
<div id="about" class="tab-pane fade <?php if(isset($msg) and empty($msg)){ ?>  in active <?php } ?>">
<div class="page-slider">
<ul class="bx-slider">
<li>
<div class="image">
<?php if($body_business['business_image']!=''){?>
<img class="slide-img" src="<?php echo base_url('upload/business/').$body_business['business_image'];?>">
<?php }else{?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
<?php }?>
</div>
</li>
</ul>
</div>

<div class="page-share">
<ul class="social">

<li><a href="javascript:void(0)" onclick="shareFb('<?php echo base_url('Home/store-details/').base64_encription($body_business['business_id']);?>');"><i class="fa fa-facebook"></i></a></li>

<li><a target="_bank" href="https://twitter.com/intent/tweet?text=<?php echo base_url('Home/store-details/'.base64_encription($body_business['business_id']));?>"><i class="fa fa-twitter"></i></a></li>

<li><a target="_blank" href="https://www.linkedin.com/cws/share?url=<?php echo base_url('Home/store-details/'.base64_encription($body_business['business_id']));?>"><i class="fa fa-linkedin"></i></a></li>

</ul>

<button type="button" data-target="#my-company" data-toggle="modal" >Your Company?</button>


<button type="button" class="blue hidden">Verified</button>
<?php if($this->session->userdata('user_id')){
$return_status = favDetails(PIVOT_FEB_STORE,$body_business['business_id'],'business_id');
if($return_status == 'Yes')
{
$text = '<i class="fa fa-heart"></i>Remove Favourite';
}
else{
$text = '<i class="fa fa-heart-o"></i> Add To Favourite';
}
?>
<button type="button" class="favourite" id="fev_<?php echo $body_business['business_id'];?>" onClick="return details_favourite_store(this.id);"><?php echo $text;?></button>
<?php }
else{?>
<button type="button" class="favourite" href="#no-login-popup" data-toggle="modal"><i class="fa fa-heart-o"></i> Add To Favourite</button>
<?php }?>
</div>

<div class="page-details">
<div class="owner-det">
<div class="image">
<?php if($body_business['business_user_image']!=''){?>
<img src="<?php echo base_url('upload/profile/').$body_business['business_user_image'];?>">
<?php }
else{?>
<img src="<?php echo base_url('upload/no_image/').'no-photo-available.jpg';?>">
<?php }?>
</div>
<?php
if($body_business['user_id'] != 1){
$text = base_url('Home/profile-view/').base64_encription($body_business['user_id']);
}else{
$text  = 'javascript:void(0)';
}
?>
<p> <a href="<?php echo $text; ?>">
<?php if($body_business['business_company_name']!='') echo $body_business['business_company_name']; if($body_business['business_user_details']!='') echo $body_business['business_user_details'];?>
</a>
<?php echo $body_business['business_city'].' , '.$body_business['business_country']?> </p>
</div>
<h3>Description</h3>
<p><?php echo $body_business['business_description'];?></p>
</div>

<div class="page-details">
<h3>Category</h3>
<div class="content">
<p><?php echo show_category_name($details_store[0]['business_id']);?></p>
</div>
</div>

<div class="page-details">
<h3>Contact</h3>
<div class="content">
<p><strong>Address </strong> : <?php echo $body_business['business_street'];?></p>
<p><strong>Website </strong> : <a href="<?php echo $body_business['business_website_url'];?>" target="_blank" style="color:#0775f5">Go To Website</a></p>
<p><strong>Location </strong> : <?php echo $body_business['business_city'];?>, <?php echo $body_business['business_country'];?> </p>
</div>
</div>

<div class="page-details">
<div class="store-location">
<div id="map" class="map"></div>
<?php
if(!empty($body_business['business_latitude']) and !empty($body_business['business_longitute'])){
$la = $body_business['business_latitude']; 
$lo = $body_business['business_longitute'];
}else{
$la = '52.3488';
$lo = '4.89388';	
}
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACjdpaolaUHA-rjK_YEvP8UdQi9Z3YIwk&libraries=places&callback=initMap"
async defer></script>
<script>
var map;
var marker;
//Map Location For Address
function initMap() {
var image =
{
url: '<?php echo base_url('assets/web/icon/map-marker.png');?>',
scaledSize: new google.maps.Size(42,42)
};
var directionsService = new google.maps.DirectionsService;
var directionsDisplay = new google.maps.DirectionsRenderer;
map = new google.maps.Map(document.getElementById('map'), {
mapTypeControl: false,
center: {lat: <?php echo $la; ?>, lng:  <?php echo $lo; ?>},
zoom:10
});
directionsDisplay.setMap(map);
/*var onChangeHandler = function() {
calculateAndDisplayRoute(directionsService, directionsDisplay);
//new AutocompleteDirectionsHandler(map);
};
document.getElementById('start').addEventListener('change', onChangeHandler);
document.getElementById('end').addEventListener('change', onChangeHandler);*/
var myLatLng = new google.maps.LatLng(<?php echo $la; ?>, <?php echo $lo; ?>);
marker = new google.maps.Marker({
position: myLatLng,
map: map,
icon: image,
title: 'Clubmondain',
});
var infowindow = new google.maps.InfoWindow();
var content = "";

google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){
return function() {
infowindow.setContent(content);
infowindow.open(map,marker);
};
})(marker,content,infowindow));
new AutocompleteDirectionsHandler(map);
setTimeout(function(){
$('#destination-input').click();
}, 500);
}//End initMap
// Sets the map on all markers in the array.
function setMapOnAll(map) {
marker.setMap(map);
}
// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
setMapOnAll(null);
}
/**
* @constructor
*/
function AutocompleteDirectionsHandler(map) {
//alert(map);
this.map = map;
this.originPlaceId = null;
this.destinationPlaceId = null;
this.travelMode = 'WALKING';
var originInput = document.getElementById('origin-input');
//var destinationInput = document.getElementById('destination-input');
var destinationInput = document.getElementById('destination-input');
var modeSelector = document.getElementById('mode-selector');
this.directionsService = new google.maps.DirectionsService;
this.directionsDisplay = new google.maps.DirectionsRenderer;
this.directionsDisplay.setMap(map);
var originAutocomplete = new google.maps.places.Autocomplete(
originInput, {placeIdOnly: true});
/*var destinationAutocomplete = new google.maps.places.Autocomplete(
destinationInput, {placeIdOnly: true});*/
this.setupClickListener($("select#transit-type option:selected").val());
/*$("select#transit-type option:selected").val();*/
this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
/*this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');*/
//this.map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(originInput);
//this.map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(destinationInput);
//this.map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(modeSelector);
}
// Sets a listener on a radio button to change the filter type on Places
// Autocomplete.
AutocompleteDirectionsHandler.prototype.setupClickListener = function(mode) {
var radioButton = document.getElementById('transit-type');
var me = this;
//alert($("select#transit-type option:selected").val())
$("#transit-type").change(function(){
me.travelMode = $("select#transit-type option:selected").val();
me.route();
//alert($("select#transit-type option:selected").val());
});
};
AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
var me = this;
autocomplete.bindTo('bounds', this.map);
autocomplete.addListener('place_changed', function() {
var place = autocomplete.getPlace();
if (!place.place_id) {
alert_message('Please select an option from the dropdown list.','warning','btn-warning');
return;
}
if (mode === 'ORIG') {
me.originPlaceId = place.place_id;
} else {
me.destinationPlaceId = place.place_id;
}
me.route();
});
};
AutocompleteDirectionsHandler.prototype.route = function() {
if (!this.originPlaceId) {
return;
}
var me = this;
//console.log(this.map.center.lat());
var _dest = new google.maps.LatLng(<?php echo $la; ?>, <?php echo $lo; ?>);
clearMarkers();
this.directionsService.route({
origin: {'placeId': this.originPlaceId},
destination: _dest /*{'placeId': this.destinationPlaceId}*/,
travelMode: this.travelMode
}, function(response, status) {
if (status === 'OK') {
me.directionsDisplay.setDirections(response);
} else {
//window.alert('Directions request failed due to ' + status);
alert_message('Directions request failed due to ' + status,'warning','btn-warning');
}
});
};
</script>

<div class="map-form">
<div class="text">
<p>Get Direction</p>
<i class="fa fa-question"></i> </div>
<div class="page-search">
<input id="origin-input" class="controls" placeholder="Enter Search Location Name" type="text">
</div>
<div id="mode-selector" class="select">
<select id="transit-type">
<option value="WALKING">Walking</option>
<option value="TRANSIT">Transit</option>
<option value="DRIVING">Driving</option>
</select>
</div>
</div>
</div>
</div>

<?php if(isset($opening_hour) && !empty($opening_hour)){ ?>
<div class="page-details">
<h3>Opening Hours</h3>

<?php
$i = 1;
foreach($opening_hour as $opening_hour){
if($i <= 7){	
$opening_hour_from_arr = explode('-',$opening_hour['opening_hour_from']);
$opening_hour_to_arr = explode('-',$opening_hour['opening_hour_to']);?>
<div class="content">
<p><strong><?php echo $opening_hour['opening_hour_day'];?> </strong> : &nbsp;
<?php if($opening_hour['opening_hour_close'] == 0){
if($opening_hour['opening_hour_from'] == 0 && $opening_hour['opening_hour_to'] == 0){
echo '<strong>Not Mentioned</strong>';
}
else{
echo $opening_hour_from_arr[0].'.'.$opening_hour_from_arr[1].'.'.$opening_hour_from_arr[2]. '&nbsp; to &nbsp;'.$opening_hour_to_arr[0].'.'.$opening_hour_to_arr[1].'.'.$opening_hour_to_arr[2];}?>
</p>
<?php  
}else{?>
<strong style="color:#F00">Closed</strong>
<?php  }?>
</div>
<?php 
}
$i++;
}?>
</div>
<?php } ?>

</div>

<div id="reviews" class="tab-pane fade <?php if(isset($msg) and !empty($msg)){ ?> in active <?php } ?>">
<div class="store-review">
<div class="page-details">
<h3><?php echo $body_business['business_name']; ?></h3>
<div class="store-ratings">
<?php if(!empty($feedback_data)){
for($t=(count($feedback_data)-1);$t<count($feedback_data);$t++)
{
$avg_rating = ($feedback_data[$t]['store_service_ratting']+$feedback_data[$t]['store_location_ratting']+$feedback_data[$t]['store_quality_ratting']+$feedback_data[$t]['store_others_ratting'])/5;
}
for($k=0;$k<round($avg_rating);$k++){?>
<ul class="rate">
<li><i class="fa fa-star"></i></li>
</ul>
<?php
}
}else{
?>
<ul class="rate">
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
</ul>
<?php }?>
<a class="review" href="#"><?php echo count($feedback_data);?> reviews</a> <a class="review" href="#"><i class="fa fa-user"></i> <?php echo  count($feedback_data);?> Total</a> </div>
<?php for($i=0;$i<count($feedback_data);$i++){?>
<div class="rating-cntnt">
<div class="left">
<p>
<?php
if(!empty($feedback_data[$i]['store_feedback']))
{
echo $feedback_data[$i]['store_feedback'];
}
else{?>
<h2>No Feedback Here</h2>
<?php }?>
</p>
</div>
<div class="right">
<div class="single-rate"> <strong>Service</strong>
<ul class="rate">
<?php if(!empty($feedback_data[$i]['store_service_ratting'])){
for($j=0;$j<$feedback_data[$i]['store_service_ratting'];$j++){?>
<li><i class="fa fa-star"></i></li>
<?php }}
else{?>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<?php }?>
</ul>
</div>
<div class="single-rate"> <strong>Location</strong>
<ul class="rate">
<?php if(!empty($feedback_data[$i]['store_location_ratting'])){
for($j=0;$j<$feedback_data[$i]['store_location_ratting'];$j++){?>
<li><i class="fa fa-star"></i></li>
<?php }}
else{?>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<?php }?>
</ul>
</div>
<div class="single-rate"> <strong>Quality</strong>
<ul class="rate">
<?php if(!empty($feedback_data[$i]['store_quality_ratting'])){
for($j=0;$j<$feedback_data[$i]['store_quality_ratting'];$j++){?>
<li><i class="fa fa-star"></i></li>
<?php }}
else{?>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<?php }?>
</ul>
</div>
<!-- <div class="single-rate"> <strong>Others</strong>
<ul class="rate">
<?php if(!empty($feedback_data[$i]['store_others_ratting'])){
for($j=0;$j<$feedback_data[$i]['store_others_ratting'];$j++){?>
<li><i class="fa fa-star"></i></li>
<?php }}
else{?>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<li><i class="fa fa-star" style="color: #999;"></i></li>
<?php }?>
</ul>
</div> -->
</div>
</div>
<?php }?>
</div>
<?php if($this->session->userdata('user_login')){?>
<?php $formDetails= array('id'=>'insert_feedback','method'=>'post','class'=>'','name'=>'insert_feedback');?>
<?php echo form_open('Main/insert_feedback',$formDetails);?>
<div class="page-details">
<?php if(isset($msg) && $msg !=''){ ?>
<div class="alert-success" style="padding: 10px;
text-align: center;font-size:18px;"> Your Feedback Submited Successfully </div>
<?php }?>
<h3>Leave a Review</h3>
<div class="review-form">
<div class="rating-cntnt">
<div class="single-rate"> <strong>Service</strong>
<ul class="rate rating-star">
<li>
<div class="radio-btn">
<input type="radio" name="store_service_ratting" id="s1" value="1" checked>
<label for="s1"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_service_ratting" id="s2" value="2">
<label for="s2"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_service_ratting" id="s3" value="3">
<label for="s3"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_service_ratting" id="s4" value="4">
<label for="s4"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_service_ratting" id="s5" value="5">
<label for="s5"><i class="fa fa-star"></i></label>
</div>
</li>
</ul>
</div>
<div class="single-rate"> <strong>Location</strong>
<ul class="rate rating-star">
<li>
<div class="radio-btn">
<input type="radio" name="store_location_ratting" id="s6" value="1" checked>
<label for="s6"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_location_ratting" id="s7" value="2">
<label for="s7"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_location_ratting" id="s8" value="3">
<label for="s8"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_location_ratting" id="s9" value="4">
<label for="s9"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_location_ratting" id="s10" value="5">
<label for="s10"><i class="fa fa-star"></i></label>
</div>
</li>
</ul>
</div>
<div class="single-rate"> <strong>Quality</strong>
<ul class="rate rating-star">
<li>
<div class="radio-btn">
<input type="radio" name="store_quality_ratting" id="s11" checked value="1">
<label for="s11"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_quality_ratting" id="s12" value="2">
<label for="s12"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_quality_ratting" id="s13" value="3">
<label for="s13"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_quality_ratting" id="s14" value="4">
<label for="s14"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_quality_ratting" id="s15" value="5">
<label for="s15"><i class="fa fa-star"></i></label>
</div>
</li>
</ul>
</div>
<input type="hidden" name="store_others_ratting" id="s21" value="1">
<input type="hidden" name="store_others_ratting" id="s22" value="2">
<input type="hidden" name="store_others_ratting" id="s23" value="3">
<input type="hidden" name="store_others_ratting" id="s24" value="4">
<input type="hidden" name="store_others_ratting" id="s25" value="5">
<!-- <div class="single-rate"> <strong>Others</strong>
<ul class="rate rating-star">
<li>
<div class="radio-btn">
<input type="radio" name="store_others_ratting" id="s21" checked value="1">
<label for="s21"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_others_ratting" id="s22" value="2">
<label for="s22"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_others_ratting" id="s23" value="3">
<label for="s23"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_others_ratting" id="s24" value="4">
<label for="s24"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_others_ratting" id="s25" value="5">
<label for="s25"><i class="fa fa-star"></i></label>
</div>
</li>
</ul>
</div> -->


</div>
<label>Comments</label>
<textarea placeholder="Enter Your Review" name="feedback"></textarea>
<input type="hidden" value="<?php echo base64_encription($body_business['business_id']);?>" name="store_id">
<button class="submit" type="submit">Leave A Review</button>
</div>
</div>
<?php echo form_close();
}//End If User Login

else{?>
<p>Please <a href="javascript:void(0);" data-target="#login-popup" data-toggle="modal">login</a> to your account for review.</p>
<?php }?>
</div>
</div>



<div id="events" class="tab-pane fade"> </div>
</div>
</div>
</div>
<?php }?>
<div class="sidebar">
<!--<aside class="single-sidebar">
<h3>Highlights</h3>
<div class="content">
<div class="sidebar-items s-cont">
<a href="#" class="single s-sec">
<div class="image">
<img src="<?php echo base_url('assets/web');?>/images/demo2.jpg">
<span class="rate">Good</span>
</div>
</a>
<a href="#" class="single s-sec">
<div class="image">
<img src="<?php echo base_url('assets/web');?>/images/demo3.jpg">
<span class="rate">Good</span>
</div>
</a>
<a href="#" class="single s-sec">
<div class="image">
<img src="<?php echo base_url('assets/web');?>/images/demo4.jpg">
<span class="rate">Good</span>
</div>
</a>
<a href="#" class="single s-sec">
<div class="image">
<img src="<?php echo base_url('assets/web');?>/images/demo5.jpg">
<span class="rate">Good</span>
</div>
</a>
<a href="#" class="single s-sec">
<div class="image">
<img src="<?php echo base_url('assets/web');?>/images/demo6.jpg">
<span class="rate">Good</span>
</div>
</a>
<a href="#" class="single s-sec">
<div class="image">
<img src="<?php echo base_url('assets/web');?>/images/demo7.jpg">
<span class="rate">Good</span>
</div>
</a>
</div>
</div>
</aside>-->
<aside class="single-sidebar">
<h3>Same Category Spaces</h3>
<div class="content">
<div class="sidebar-items s-cont">
<?php if($categoryBusiness > 0){
for($i=0;$i< count($categoryBusiness);$i++){
if($i <= 8){
?>
<a href="<?php echo base_url("Home/store-details/".base64_encription($categoryBusiness[$i]['business_id'])); ?>" class="single s-sec">
<div class="image">
<?php if($categoryBusiness[$i]['business_banner_image'] != ''){?>
<img src="<?php echo base_url('upload/business/').$categoryBusiness[$i]['business_banner_image'];?>">
<?php }
else{?>
<img src="<?php echo base_url('upload/no_image/').'no-photo-available.jpg';?>">
<?php }?>
</div>
<p> <?php echo substr(ucwords($categoryBusiness[$i]['business_name']),0,28);?><br>
<small><?php echo date('dS M Y',strtotime($categoryBusiness[$i]['create_date']));?></small> </p>
</a>
<?php }}
}
else{
?>
<h2>No Stores Are Available</h2>
<?php }?>

<!-- <a href="#" class="single s-sec">
<div class="image">
<img src="<?php //echo base_url('assets/web');?>/images/demo15.jpg">
</div>
<p>
London Cake shop
<small> 6th March ,2016</small>
</p>
</a>-->

</div>
</div>
</aside>
<aside class="single-sidebar">
<h3>News</h3>
<div class="content">
<div class="sidebar-items s-cont">
<?php for($i=0;$i< count($recent_news);$i++){?>
<a href="<?php echo base_url('Home/newsDetails/'.$recent_news[$i]['blog_news_id']); ?>" class="single s-sec">
<div class="image">
<?php if($recent_news[$i]['blog_news_image'] != ''){?>
<img src="<?php echo base_url('upload/news_blog/').$recent_news[$i]['blog_news_image'];?>">
<?php }
else{?>
<img src="<?php echo base_url('upload/no_image/').'no-photo-available.jpg';?>">
<?php }?>
</div>
<p> <?php echo substr(ucwords($recent_news[$i]['blog_news_title']),0,28);?><br>
<small><?php echo date('dS M Y',strtotime($recent_news[$i]['update_date']));?></small> </p>
</a>
<?php }?>

<!-- <a href="#" class="single s-sec">
<div class="image">
<img src="<?php //echo base_url('assets/web');?>/images/demo15.jpg">
</div>
<p>
London Cake shop
<small> 6th March ,2016</small>
</p>
</a>-->
</div>
</div>
</aside>
<aside class="single-sidebar">
<h3>Banner</h3>
<div class="content"> <a class="side-banner"> <img src="<?php echo base_url('assets/web');?>/images/travel.jpg"> </a> </div>
</aside>
</div>
</div>
</div>
</main>
<?php include('include/footer.php');?>

<!--Login Popup-->
<div class="modal fade" id="my-company" role="dialog">
<div class="login-sec">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="login-form">
<h3>My Company</h3>
<div class="input-sec">
<input type="text" placeholder="Name" id="user_name_xpx" name="user_name" value="">
</div>
<div class="input-sec">
<input type="email" placeholder="Email Address" id="user_email_xpx" name="user_email" value="">
</div>
<div class="input-sec">
<input type="number" placeholder="Phone No" id="user_ph_xpx" name="user_ph" value="">
</div>
<button type="button" class="submit" onClick="getCompanyMail('<?php echo $details_store[0]['business_id']; ?>')">Send</button>
</div>
</div>
</div>
<script>
function getCompanyMail(e)
{
  var user_name_xpx = $("#user_name_xpx").val();
  var user_email_xpx = $("#user_email_xpx").val();
  var user_ph_xpx = $("#user_ph_xpx").val();

  var atpos = user_email_xpx.indexOf("@");
  var dotpos = user_email_xpx.lastIndexOf(".");
  if (atpos<1 || dotpos<atpos+2 || dotpos+2>=user_email_xpx.length) {
        alert("Not a valid e-mail address");
        return false;
  }else{

	if (isNaN(user_ph_xpx) || user_ph_xpx < 1) {
        alert("Not a valid number");
        return false;
    } else {
       
    $.ajax({
	url: "<?php echo base_url('Home/getMe'); ?>",
	type: "POST",
	dataType: "html",
	data: {
	id: e,
	user_name_xpx: user_name_xpx,
	user_email_xpx:user_email_xpx,
	user_ph_xpx:user_ph_xpx,
	business_name:'<?php echo $details_store[0]['business_name']; ?>'
	},
	success: function(x) {
	alert(x);
	}
	});

    }

  }

	
}
</script>
<script type="text/javascript">
function shareFb(Url_data)
{
  window.open('http://www.facebook.com/sharer/sharer.php?u='+Url_data+'', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');
}
</script>

</body>
</html>
