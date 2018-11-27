<?php
include('include/head.php');
echo '<body>';
include('include/header.php');
$GET_BANNER_PICTURE = get_banner(4);
?>
<main>
<section class="banner">
<div class="banner-img">
<?php
if(count($GET_BANNER_PICTURE) > 0){
if(count($GET_BANNER_PICTURE[0]) > 0){
?>
<img src="<?php echo base_url('upload/banner/'.$GET_BANNER_PICTURE[0]['banner_image']);?>" alt="">
<?php
}else{
?>
<img src="<?php echo base_url('assets/web/');?>images/banner.jpg" alt="">
<?php
}
}else{
?>
<img src="<?php echo base_url('assets/web/');?>images/banner.jpg" alt="">
<?php
}
?>
</div>
<div class="other-reg-button">
<ul>
<li><a href="<?php echo base_url('Home/personal_trainer_reg/');?>">I AM A PERSONAL TRAINER</a></li>
<li><a href="<?php echo base_url('Home/company_reg');?>" class="bg-grn">WE ARE A HEALTHY COMPANY </a></li>
</ul>
</div>
<div class="banner-cntnt">
<h3><?php echo strip_tags($content[0]['page_description']);?></h3>
<p><?php echo  strip_tags($content[1]['page_description']);?></p>
<div class="search">
<form action="<?php echo base_url('search.html'); ?>" method="post" class="form">
<input type="text" name="serach_query" id="tags" placeholder="Type your Destination here">
<button><i class="fa fa-search"></i></button>
</form>
</div>
<div class="members-cntnt all-members" style="position:static; transform:none; margin-top:20px;">
<ul class="members">
<?php
if(count($user_details) > 0){
foreach($user_details as $user_details_user_details){
if($user_details_user_details['user_id'] != 81){
if(!empty($user_details_user_details['membership_id'])){	
?>
<li>
<a href="javascript:void(0)">
<div class="image">
<?php 
if(!empty($user_details_user_details['user_image'])){?>
<img src="<?php echo base_url('upload/profile/').$user_details_user_details['user_image'];?>">
<?php }else{  ?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
<?php }?>
</div>
<p><a style="color: white; font-size: 14px" href="<?php echo base_url('Home/profile-view/'.base64_encode($user_details_user_details['user_id'])); ?>"><?php echo ucfirst($user_details_user_details['first_name']);?></a></p>
</a>
</li>
<?php
}
}
}
}
?>
</ul>
<?php if(!isset($_SESSION['user_login'])){ ?>
<div class="golden-btn transperant-btn"> <a href="#register-popup" data-toggle="modal">Join now</a> </div>
<?php } ?>
</div>
</div>
<div class="overlay"></div>
</section>
<section class="all-focus">
<div class="heading">
<div class="container">
<div class="row">
<div class="col-lg-10 col-centered">
<div class="top">
<h2><?php echo strip_tags($content[2]['page_description']);?>
<em> <?php echo strip_tags($content[3]['page_description']);?></em>
</h2>
</div>
<p><?php echo $content[4]['page_description'];?> </p>
</div>
</div>
</div>
</div>
<div class="focus-carousal">
<?php if(isset($category_details) && !empty($category_details) && count($category_details)>5){?>
<ul id="flexiselDemo3">
<?php foreach($category_details as $category_details){?>
<li>
<a href="<?php echo base_url('Home/specific-category-event/').base64_encription($category_details['category_id']);?>">
<div class="focus-image">
<?php if(!empty($category_details["category_image"])){?>
<img src="<?php echo base_url('upload/category/').$category_details["category_image"];?>" alt="">
<?php }
else{?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
<?php }?>
<p><?php echo $category_details['category_name']?></p>
</div>
</a>
</li>
<?php } ?>
</ul>
<?php }?>
</div>
</section>
<section class="featured">
<div class="container">
<div class="row">
<div class="col-lg-11 col-centered">
<h2> <?php echo strip_tags($content[5]['page_description'],'<em>');?></h2>
<div class="items">
<div class="row">
<?php
if(count($event_details) > 0){
foreach ($event_details as $key => $event_val) {
if( $key < 5){
?>
<div class="
<?php
if($key % 5 == 0){
echo 'col-md-6';
}else{
   echo 'col-md-3 col-sm-6';
}
?>
">
<a href="<?php echo base_url('Home/event-details/').base64_encription($event_val['event_id']);?>">
<div class="single
<?php
if($key % 5 == 0 ){
    echo 'large';
}else{
   echo 'small';
}
?>
">
<?php if(!empty($event_val['event_banner'])){?>
<img src="<?php echo base_url('upload/events/').$event_val['event_banner'];?>" alt="">
<?php }else{ ?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
<?php }?>
<div class="cntnt left">
<h3><?php echo $event_val['event_name'].' '.'('.$event_val['event_city'].')'; ?></h3>
<!-- <p><?php echo date('dS M Y',strtotime($event_details[0]['event_date_from']));?></p> -->
</div>
</div>
</a>
</div>
<?php
}
}
}
echo '<div class="clearfix"></div>';
if(count($store_details) > 0){
foreach ($store_details as $store_key => $store_details_val) {
if( $store_key < 5){
?>
<div class="<?php
if($store_key % 5 == 0){
echo 'col-md-6 col-xs-12 pull-right';
}else{
echo 'col-md-3 col-sm-6';
}
?>">
<a href="<?php echo base_url('Home/store-details/').base64_encription($store_details_val['business_id']);?>">
<div class="single
<?php
if($store_key % 5 == 0 ){
    echo 'large';
}else{
   echo 'small';
}
?>
">
<?php if(!empty($store_details_val['business_banner_image'])){?>
<img src="<?php echo base_url('upload/business/').$store_details_val['business_banner_image'];?>" alt="">
<?php }else{?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
<?php }?>
<div class="cntnt left">
<h3><?php echo $store_details_val['business_name'].' '.'('.$store_details_val['business_city'].')'; ?></h3>
<!-- <p><?php echo date('dS M Y',strtotime($store_details_val['create_date']));?></p> -->
</div>
</div>
</a>
</div>
<?php
}
}
}
?>
</div>
</div>
</div>
</div>
</section>
</main>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php include('include/footer.php');?>
<script>
$( function() {
var availableTags = [
<?php
if(count($cd) > 0){
foreach($cd as $ck){
?>
"<?php echo $ck['city_name']; ?>",
<?php
}
}
?>
];
$( "#tags" ).autocomplete({
source: availableTags
});
} );
</script>


<script>  
	$(document).ready(function() {
		
	  var chk_user = '<?php echo $this->session->userdata("check_usr");?>';
	  if(chk_user == 1){
	  	$('#register-popup').modal('show');
	  }	if(chk_user == 2){
	  	$('#login-popup').modal('show');
	  }
  		'<?php echo $this->session->unset_userdata("check_usr");?>';
  
  });
</script>
</body>
</html>
