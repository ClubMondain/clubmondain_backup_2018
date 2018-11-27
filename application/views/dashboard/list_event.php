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
<div class="single-content">
<div class="dashboard-head">
<h2> My Latest <em>Events</em></h2>
<a href="<?php echo base_url('Main/add-event')?>">ADD NEW EVENTS</a> </div>
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
<?php }
else {
?>
<img src="<?php echo base_url().'upload/no_image/'.'no-photo-available.jpg';?>">
<?php } ?>
</div>
</div>
<div class="col-md-6">
<div class="content">
<h3><a href="<?php echo base_url('Main/event_details/'.base64_encription($all_events[$i]['event_id']));?>"><?php echo ucwords($all_events[$i]['event_name']);?></a><!--<span>23rd June</span>-->
<?php /*For Date Sufix Calculation*/
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
