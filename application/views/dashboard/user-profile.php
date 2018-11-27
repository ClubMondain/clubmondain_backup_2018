<?php
if(!empty($user_details[0]['fild_permission']))
{
$fild_permission = explode(',',$user_details[0]['fild_permission']);
}else{
$fild_permission = array();
}
if(count($catdata) > 0){
foreach ($catdata as $for_data) {
$cate_id[] = $for_data['category_id'];
}
}else{
$cate_id = array();
}
?>
<?php $this->load->view('include/head');?>
<body>
<?php $this->load->view('include/header');?>
<main class="user-profile">
<div class="container">
<div class="profile-contain">
<div class="profile-top">
<div class="left">
<div class="image">
<?php if($user_details[0]['user_image']!=''){?>
<img src="<?php echo base_url('upload/profile/').$user_details[0]['user_image'];?>">
<?php }
else{?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
<?php } ?>
</div>
</div>
<div class="right">
<div class="content">
<?php
if(count($fild_permission) > 0){ 
if(!in_array('1', $fild_permission)){
$last_name_data = $user_details[0]['first_name'].'&nbsp;'.$user_details[0]['last_name'];
}else{
$last_name_data = $user_details[0]['first_name'];
}
}else{
$last_name_data = $user_details[0]['first_name'].'&nbsp;'.$user_details[0]['last_name'];	
}	
?> 
<?php if(($user_details[0]['user_type'] != 'C')){?>
<h3><?php echo $last_name_data;?> </h3>
<?php }else{ ?>
<h3><?php echo $user_details[0]['company_person'];?></h3>
<?php }?>
<?php
if(count($fild_permission) > 0){ 
if(!in_array('4', $fild_permission)){
?> 
<?php if(isset($user_details[0]['member_company_name'])){?>
<h5>Company Name: <?php echo $user_details[0]['member_company_name'];?> <br>
<?php }?></h5>
<?php 
} 
}else{
?>
<?php if(isset($user_details[0]['member_company_name'])){?>
<h5>Company Name: <?php echo $user_details[0]['member_company_name'];?> <br>
<?php }?></h5>
<?php
} 
?>
<?php
if(count($fild_permission) > 0){ 
if(!in_array('5', $fild_permission)){
?> 
<?php if(isset($user_details[0]['member_function_title'])){ ?>
<h5>Function Title: <?php echo $user_details[0]['member_function_title'];?> <br>
<?php }?></h5>
<?php 
} 
}else{
?>
<?php if(isset($user_details[0]['member_function_title'])){ ?>
<h5>Function Title: <?php echo $user_details[0]['member_function_title'];?> <br>
<?php }?></h5>
<?php	
} 
?>
<?php
if(count($fild_permission) > 0){ 
if(!in_array('2', $fild_permission)){
?> 
<h5> Email: <?php echo $user_details[0]['email'];?> <br>
<?php } }else{
?>
<h5> Email: <?php echo $user_details[0]['email'];?> <br>
<?php
} ?>
<?php
if(count($fild_permission) > 0){ 
if(!in_array('3', $fild_permission)){
?> 
<?php if(!empty($user_details[0]['phone'])){?>
<h5>Phone Number: <?php echo $user_details[0]['phone'];?></h5> <br>
<?php }?>
<?php } }else{
?>
<?php if(!empty($user_details[0]['phone'])){?>
<h5>Phone Number: <?php echo $user_details[0]['phone'];?></h5><br>
<?php }?>
<?php	
} 
?> 

</h5>
<br>
<?php if(($user_details[0]['user_type'] == 'C')){?>
<p><?php echo strip_tags($user_details[0]['company_description']);?></p>
<?php }else{ ?>
<p><?php echo strip_tags($user_details[0]['member_other']);?></p>
<?php } ?>
<br>
<?php if(count($catdata) > 0){  ?>
<h5>Interested Categories</h5>
<?php 
$text_cate = '';
foreach($catdata as $catdata) {
if(!empty($catdata['category_id'])){	
$get_getCategoryDetails = getCategoryDetails($catdata['category_id']);	
$text_cate .= $get_getCategoryDetails[0]['category_name'].' , ';
}
}
$text_cate = substr($text_cate,0,-2); 
?>
<p><?php echo !empty($text_cate)? $text_cate : ''; ?></p>
<?php } ?>
</div>
</div>
<div class="clearfix"></div>
</div>
<div class="profile-main-content">
<div class="left">

<div class="inner">
<h2> My Latest Events</h2>

<ul class="profile-tab-sec">
	<li class="active"><a data-toggle="tab" href="#profile-general">GENERAL</a></li>
	<li><a data-toggle="tab" href="#profile-favorite">FAVORITE</a></li>
</ul>

<div class="tab-content">
<!--General Tab-->
<div id="profile-general" class="tab-pane fade in active">

<div class="dashboard-events">
<?php if(isset($all_events) > 0) {
if(count($all_events)){
$total_event = count($all_events);
for($i = 0; $i< $total_event; $i++ ){
if(!empty($all_events[$i]['event_date_from'])){
$get_date_exp = explode('-',$all_events[$i]['event_date_from']);
}
?>
<div class="single">
<div class="row">
<div class="col-md-6">
<div class="image">
<?php if(!empty($all_events[$i]['event_banner'])) {?>
<img src="<?php echo base_url().'upload/events/'.$all_events[$i]['event_banner'];?>">
<?php }else { ?>
<img src="<?php echo base_url().'upload/no_image/'.'no-photo-available.jpg';?>">
<?php } ?>
</div>
</div>
<div class="col-md-6">
<div class="content">
<h3>
	<a href="<?php echo base_url('Home/event-details/'.base64_encription($all_events[$i]['event_id'])); ?>" target="_blank"><?php echo $all_events[$i]['event_name'];?>
		
	</a>
</span><span><?php echo date('dS M Y',strtotime($all_events[$i]['event_date_from']));?></span> </h3>
<h5><?php echo $all_events[$i]['event_city'];?> , <?php echo $all_events[$i]['event_country'];?><br>
<?php if(isset($all_events[$i]['event_date_to']) && !empty($all_events[$i]['event_date_from'])) { echo $all_events[$i]['event_date_from'];?>
to <?php echo $all_events[$i]['event_date_to']; }?> </h5>
<p> <span><?php echo substr($all_events[$i]['event_description'],0,220);?></span></p>
<a href="<?php echo base_url('Home/event-details/'.base64_encription($all_events[$i]['event_id']));?>" class="view">VIEW EVENT DETAILS</a> </div>
</div>
</div>
</div>
<?php } }
else{
echo '<h3> NO EVENT FOUND </h3>';
} //End Count
} //End Isset Section
?>
</div>

</div>

<!--Favourite Tab-->
<div id="profile-favorite" class="tab-pane fade">


<div class="dashboard-events">
<?php 
if(count($all_fav_events)){
foreach($all_fav_events as $asEvent){
if(count($asEvent) > 0){
if(!empty($asEvent[0]['event_date_from'])){
$get_date_exp = explode('-',$asEvent[0]['event_date_from']);
}
?>
<div class="single">
<div class="row">
<div class="col-md-6">
<div class="image">
<?php if(!empty($asEvent[0]['event_banner'])) {?>
<img src="<?php echo base_url().'upload/events/'.$asEvent[0]['event_banner'];?>">
<?php }else { ?>
<img src="<?php echo base_url().'upload/no_image/'.'no-photo-available.jpg';?>">
<?php } ?>
</div>
</div>
<div class="col-md-6">
<div class="content">
<h3>
	<a href="<?php echo base_url('Home/event-details/'.base64_encription($asEvent[0]['event_id'])); ?>" target="_blank">
	<?php echo $asEvent[0]['event_name'];?>
	</a>
</span><span><?php echo date('dS M Y',strtotime($asEvent[0]['event_date_from']));?></span> </h3>
<h5>
<?php if(isset($asEvent[0]['event_date_to']) && !empty($asEvent[0]['event_date_from'])) { echo $asEvent[0]['event_date_from'];?>
to <?php echo $asEvent[0]['event_date_to']; }?> </h5>
<p> <span><?php echo substr($asEvent[0]['event_description'],0,220);?></span></p>
<a href="<?php echo base_url('Home/event-details/'.base64_encription($asEvent[0]['event_id']));?>" class="view">VIEW EVENT DETAILS</a> </div>
</div>
</div>
</div>
<?php 
} 
}
}else{
echo '<h3> NO FAVORITE EVENT FOUND </h3>';
} //End Count
?>
</div>


   
</div>
    
</div>

</div>

</div>

<div class="right">

<div class="inner">
<h2> My Space Lists</h2>
	
<ul class="profile-tab-sec">
	<li class="active"><a data-toggle="tab" href="#space-general">GENERAL</a></li>
	<li><a data-toggle="tab" href="#space-favorite">FAVORITE</a></li>
</ul>

<div class="tab-content">
<!--General Tab-->
<div id="space-general" class="tab-pane fade in active">

<div class="business-list">
<?php if(isset($all_business) > 0) {
if(count($all_business)){
for($i = 0; $i< count($all_business); $i++ )
{ ?>
<div class="single">
<div class="image">
<?php if(!empty($all_business[$i]['business_banner_image']))
{
?>
<img src="<?php echo base_url('upload/business/').$all_business[$i]['business_banner_image'];?>">
<?php }
else {?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>">
<?php }?>
</div>
<h3><?php echo $all_business[$i]['business_name'];?></h3>
<p><?php echo substr($all_business[$i]['business_description'],0,220);?></p>
<a href="<?php echo base_url('Home/store-details/'.base64_encription($all_business[$i]['business_id']));?>" class="view">VIEW DETAILS</a>
</div>
<?php 
}
}else{
echo '<h3> NO SPACE CREATED </h3>';
}
}?>
</div>

</div>

<!--Favourite Tab-->
<div id="space-favorite" class="tab-pane fade">
   

<div class="business-list">
<?php 
if(count($all_fav_space)){
foreach($all_fav_space as $asSpace)
{ 
if(count($asSpace) > 0){	
?>
<div class="single">
<div class="image">
<?php if(!empty($asSpace[0]['business_banner_image']))
{
?>
<img src="<?php echo base_url('upload/business/').$asSpace[0]['business_banner_image'];?>">
<?php }
else {?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>">
<?php }?>
</div>
<h3><?php echo $asSpace[0]['business_name'];?></h3>
<p><?php echo substr($asSpace[0]['business_description'],0,220);?></p>
<a href="<?php echo base_url('Home/store-details/'.base64_encription($asSpace[0]['business_id']));?>" class="view">VIEW DETAILS</a>
</div>
<?php 
}
}
}else{
echo '<h3> NO FAVORITE SPACE CREATED </h3>';
}
?>
</div>

</div>
    
</div>

</div>

</div>

<div class="left" style="width:100%; display: none;">

<div class="inner">
<h2>My Meet Ups</h2>
<?php
if(!empty($all_meetup)){
foreach($all_meetup as $get_meetup){?>

<div class="all-meet-ups">
<?php if(!empty($get_meetup['create_date'])){
$get_date_exp = explode('-',$get_meetup['create_date']);
}
?>
<div class="single">
<h3>
<?php /*For Date Sufix Calculation*/
$number = $get_date_exp[2];
$ends = array('th','st','nd','rd','th','th','th','th','th','th');
if (($number %100) >= 11 && ($number%100) <= 13)
$ends_suf = $number. 'th';
else
$ends_suf = $number. $ends[$number % 10];
/*End For Date Sufix Calculation*/?>
<span><?php echo $ends_suf .' '.$month_name = date('F', mktime(0, 0, 0,$get_date_exp[1] , 17)); ?> </span></h3>
<div class="meet-top">
<div class="meet-peoples">
<div class="single-meet">
<div class="image">
<?php if(!empty($get_meetup['meet_up_image'])) {?>
<a href="<?php echo base_url('Main/meet_up_details/'.base64_encription($get_meetup['meet_up_id']));?>"><img src="<?php echo base_url('upload/meet-up/').$get_meetup['meet_up_image'];?>"></a>
<?php }
else {
?>
<img src="<?php echo base_url().'upload/no_image/'.'no-photo-available.jpg';?>">
<?php } ?></a>
</div>
</div>
</div>
<div class="people-name">
<p><strong style="font-size: 16px;">User Name </strong>:<?php echo ucwords($get_meetup['user_name']);?></p>
<p><strong style="font-size: 16px;">Mett Up Name </strong>:<?php echo ucwords($get_meetup['meet_up_name']);?></p>
</div>
</div>
<p><?php echo ucwords(substr($get_meetup['meet_up_description'],0,220));?></p>
<p>- <a href="#city-request-popup<?php echo $get_meetup['meet_up_id'];?>" data-toggle="modal">
<?php
if(!empty($get_meetup['count_comments'])){echo $get_meetup['count_comments'];}else{echo '0';}?>
Comments</a></p>
</div>
<!--Meet_Up Request Popup-->
<div class="modal fade" id="city-request-popup<?php echo $get_meetup['meet_up_id'];?>" role="dialog">
<div class="login-sec city-request">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<form class="city-request-form">
<h3>Meet Up Comment</h3>
<textarea name="comments" id="meet_up_comments<?php echo $get_meetup['meet_up_id'];?>" placeholder="Enter Your Comment"></textarea>
<button type="button" class="submit" onClick="return call_meet_up_comments(<?php echo $get_meetup['meet_up_id'];?>,this.id);">Submit Your Comment </button>
</form>
</div>
</div>
</div>

<?php 
}//End Foreach
}//End If
else{
?>
<h3>NO MEET UP CREATED</h3>
<?php }?>

<div class="clearfix"></div>
</div>

</div>

<div class="clearfix"></div>
</div>
</div>
</div>
</main>
<?php $this->load->view('include/footer');?>
</body>
</html>
