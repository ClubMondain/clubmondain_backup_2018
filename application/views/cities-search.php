<?php include('include/head.php');?>
<body>
<?php include('include/header.php');?>
<main>
<section class="page-banner slide">
<ul class="cities-slider">
<li>
<div class="image"> <img src="<?php echo base_url('assets/web');?>/images/bg-6.jpg" alt=""> </div>
</li>
</ul>
<div class="overlay"></div>
</section>
<section class="cities">
<div class="container">
<div class="cities-head">
<h3>Which city are you going to?</h3>
<?php if(isset($_SESSION['user_login'])){ ?>
<a href="#city-request-popup" data-toggle="modal">REQUEST CITY ADDITION +</a>
<?php }
else { ?>
<a href="#no-login-popup" data-toggle="modal">REQUEST CITY ADDITION +</a>
<?php }?>
</div>
<div class="cities-scroll"> <a class="all-cities-btn" onClick="window.location.href='<?php echo base_url('Home/cities-main'); ?>'">ALL</a>
<div class="other-cities">
<ul class="scrolling-city">
<?php foreach($country_details as $cd){?>
<li><a onClick=" return getCityForCountry('<?php echo $cd['country_id']?>');"><?php echo $cd['country'];?></a></li>
<?php }?>
</ul>
<div class="clearfix"></div>
</div>
</div>
<div class="all-cities">
<div class="row" id="concity_list">
<?php 
if($city_details == 'N-A'){
?>
<h3 style="text-align:center"><?php echo 'No City Found'; ?></h3>
<?php	
}else{
foreach($city_details as $city_details){?>
<div class="col-md-4 col-sm-6">
<div class="single">
<div class="image">
<?php if($city_details['city_image'] != ''){?>
<img src="<?php echo base_url('upload/city/').$city_details['city_image'];?>">
<?php }
else{  ?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
<?php }?>
<div class="overlay">
<ul>
<li><a href="<?php echo base_url('Home/city-details/').base64_encription($city_details['city_id']);?>">More</a></li>
<?php if(isset($_SESSION['user_login'])){ 
$is_presnt = favCity($city_details['city_id']);
if($is_presnt == 'Yes'){
$text = 'Remove Favourite';
}else{
$text = 'Add Favourite';	 
}	 
?>
<li><a id="fav_<?php echo $city_details['city_id'];?>"  onClick="return favourite_city(this.id);"><?php echo $text; ?></a></li>
<?php }
else { ?>
<li> <a href="#no-login-popup" data-toggle="modal">Add to Favourite</a> </li>
<?php }?>
<!--<li><a href="#">Chat</a></li>-->
</ul>
</div>
</div>
<p><?php echo $city_details['city_name'];?></p>
</div>
</div>
<?php }}?>

</div>
</div>
</div>
</section>
</main>
<!--City Request Popup-->
<div class="modal fade" id="city-request-popup" role="dialog">
<div class="login-sec city-request">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<form class="city-request-form">
<h3>Request For City</h3>
<input type="text" placeholder="City Name" name="city_name" id="req_city_name">
<button type="button" class="submit" onClick="return request_city();">Submit Your City Name</button>
</form>
</div>
</div>
<?php include('include/footer.php');?>
</body>
</html>
