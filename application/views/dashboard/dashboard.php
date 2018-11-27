<?php
$this->load->view('include/head');
if(!empty($all_events[0]['cat_id'])){
$get_cate_id_exp = explode(',',$all_events[0]['cat_id']);} ?>
<body>
<?php $this->load->view('include/header');
if(isset($_SESSION['user_details'][0]['email'])){
$user_email = $_SESSION['user_details'][0]['email'];
}?>
<main class="dashboard" id="dashboard-main">
<?php $this->load->view('include/left-sidebar');?>
<div class="dashboard-main">
<div class="left">
<div class="dashboard-toggle" id="dashboard-toggle">
<button><i class="fa fa-bars"></i></button>
</div>
<?php /* ?>
<div class="single-content">
<div class="dashboard-head">
<h2> My Latest <em>Events</em></h2>
<?php if($_SESSION['user_membership_type'] != 'FREE'){ ?>
<a href="<?php echo base_url('Main/add-event')?>">ADD NEW EVENTS</a>
<?php } ?>
</div>
<div class="dashboard-events">
<?php if(isset($all_events) > 0) {
if(count($all_events)){
$total_event = count($all_events);
for($i = 0; $i< $total_event; $i++ ){
if(!empty($all_events[$i]['event_date_from'])){
$get_date_exp = explode('-',$all_events[$i]['event_date_from']);
} //FOR SPECIFIC DATE CALCULATION
?>
<div class="single">
<div class="row">
<div class="col-md-6">
<div class="image">
<?php if(!empty($all_events[$i]['event_banner'])) {?>
<img src="<?php echo base_url().'upload/events/'.$all_events[$i]['event_banner'];?>">
<?php }else {?>
<img src="<?php echo base_url().'upload/no_image/'.'no-photo-available.jpg';?>">
<?php } ?>
</div>
</div>
<div class="col-md-6">
<div class="content">
<h3><a href="<?php echo base_url('Main/event_details/'.base64_encription($all_events[$i]['event_id']));?>"><?php echo ucwords($all_events[$i]['event_name']);?></a><!--<span>23rd June</span>-->
<?php
$number = $get_date_exp[2];
$ends = array('th','st','nd','rd','th','th','th','th','th','th');
if (($number %100) >= 11 && ($number%100) <= 13)
$ends_suf = $number. 'th';
else
$ends_suf = $number. $ends[$number % 10];
?>
<span><?php echo $ends_suf .' '.$month_name = date('F', mktime(0, 0, 0,$get_date_exp[1] , 17)); ?>
</span>
</h3>
<h5><?php echo $all_events[$i]['event_city'];?> ,
<?php echo $all_events[$i]['event_country'];?><br>
<?php if(isset($all_events[$i]['event_timezone_from']) && !empty($all_events[$i]['event_timezone_from'])) { echo $all_events[$i]['event_timezone_from'];?> to <?php echo $all_events[$i]['event_timezone_to']; }?> </h5>
<p>
<span><?php echo substr($all_events[$i]['event_description'],0,220);?></span>
</p>
<a href="<?php echo base_url('Main/event_details/'.base64_encription($all_events[$i]['event_id']));?>" class="view">VIEW EVENT DETAILS</a>
<ul class="business-links">
<li><a class="bg-red" href="javascript:void(0);" onClick="return delete_data('<?php echo base_url('Main/delete_event/'.base64_encription($all_events[$i]['event_id']));?>')">Delete</a></li>
<li><a href="<?php echo base_url('Main/edit_event/'.base64_encription($all_events[$i]['event_id']));?>">Edit</a></li>
</ul>
</div>
</div>
</div>
</div>
<?php
} }else{
echo '<h2> NO EVENT FOUND </h2>';
} //End Count
} //End Isset Section
?>
</div>
</div>
<?php */ ?>

<?php if($this->session->flashdata('msg') !=''){ ?>
	<div class="<?php echo $this->session->flashdata('msg_class');?>"> <?php echo $this->session->flashdata('msg');?> </div>
	<?php }?>

<?php if(count($all_paid_class) > 0) { ?>
<div class="single-content">
<div class="dashboard-head">
<h2>My Paid <em>Class</em></h2>
</div>
<div class="favourite-city-slide">
<?php if(isset($all_paid_class)) { ?>
<ul id="favourite-city">
<?php
foreach($all_paid_class as $pc){
$allClass =  get_paid_class_details($pc['trainer_class_id']);
if(count($allClass) > 0){
?>
<li>
<div class="single">
<div class="image">
<?php if($allClass[0]['trainer_class_image']){?>
<img src="<?php echo base_url('upload/class/').$allClass[0]['trainer_class_image']?>">
<?php }
else{?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
<?php }?>
</div>
<a href="<?php echo base_url('Home/trainer-details-classes/'.base64_encode($allClass[0]['trainer_class_id'])); ?>"><?php echo $allClass[0]['trainer_class_name'];?></a> </div>
</li>
<?php }}} ?>
</ul>
<div class="clearfix"></div>
</div>
</div>
<?php } ?>

<!-- <div class="single-content">
<?php if(isset($my_blog) && !empty($my_blog)){?>
<div class="dashboard-head">
<h2>My <em>Blogs</em></h2>
</div>
<div class="dashboard-blogs">
<div class="row">
<?php foreach($my_blog as $my_blog){?>
<div class="col-md-4">
<div class="single">
<div class="image">
<?php if(!empty($my_blog['blog_news_image'])){?>
<img src="<?php echo base_url('upload/news_blog/').$my_blog['blog_news_image'];?>">
<?php }else{ ?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
<?php }?>
</div>
<a href="#"><?php echo $my_blog['blog_news_title'];?></a>
<?php $full_profile = $this->session->userdata('full_profile');?>
<p><?php if (!empty($my_blog['city_name'])){ echo ucwords($my_blog['city_name']) .'&nbsp,&nbsp'. ucwords($my_blog['country_name']);}?>, <?php echo date('dS m ,Y',strtotime($my_blog['update_date']));?></p>
</div>
</div>
<?php }?>
</div>
</div>
<?php }else{ ?>
<div class="dashboard-head">
<h2>No <em>Blogs</em> Created</h2>
</div>
<?php }?>
</div> -->

<div class="single-content">
<?php if(count($all_fav_events) > 0){
?>
<div class="dashboard-head">
<h2>My <em>Favorite Event</em> List</h2>
</div>
<div class="dashboard-blogs">
<div class="row">
<?php foreach($all_fav_events as $asEvent){
if(count($asEvent) > 0){
?>
<div class="col-md-4">
<div class="single">
<div class="image">
<?php if(!empty($asEvent[0]['event_banner'])){?>
<img src="<?php echo base_url('upload/events/').$asEvent[0]['event_banner'];?>">
<?php }else{ ?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
<?php }?>
</div>
<a href="<?php echo base_url('Main/event_details/'.base64_encription($asEvent[0]['event_id']));?>"><?php echo $asEvent[0]['event_name'];?></a>
</div>
</div>
<?php }
}
?>
</div>
</div>
<?php }else{ ?>
<div class="dashboard-head">
<h2>No <em>Favorite Event </em> List</h2>
</div>
<?php }?>
</div>


<div class="single-content">
<?php if(count($all_fav_space) > 0){
?>
<div class="dashboard-head">
<h2>My <em>Favorite Space</em> List</h2>
</div>
<div class="dashboard-blogs">
<div class="row">
<?php foreach($all_fav_space as $asSpace){
if(count($asSpace) > 0){
?>
<div class="col-md-4">
<div class="single">
<div class="image">
<?php if(!empty($asSpace[0]['business_image'])){?>
<img src="<?php echo base_url('upload/business/').$asSpace[0]['business_image'];?>">
<?php }else{ ?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
<?php }?>
</div>
<a href="<?php echo base_url('Home/store-details/'.base64_encription($asSpace[0]['business_id']));?>"><?php echo $asSpace[0]['business_name'];?></a>
</div>
</div>
<?php }
}
?>
</div>
</div>
<?php }else{ ?>
<div class="dashboard-head">
<h2>No <em>Favorite Space </em> List</h2>
</div>
<?php }?>
</div>


</div>
<?php $this->load->view('include/right-sidebar');?>
</div>
</main>
<?php $this->load->view('include/footer');?>
</body>
</html>
<script>
function show_event() {
var x = document.getElementById('details_event');
if (x.style.display === 'none') {
$("#details_event").show(500);;
} else {
$("#details_event").hide(500);;
}
}
</script>
