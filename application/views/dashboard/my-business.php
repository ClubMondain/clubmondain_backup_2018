<?php $this->load->view('include/head'); ?>
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
<h2>My Space</h2>
<a href="<?php echo base_url('Main/add_business');?>">ADD SPACE</a>
</div>
<div class="dashboard-business">
<?php if(isset($all_data) > 0) {
if(count($all_data)){
for($i = 0; $i< count($all_data); $i++ )
{ ?>
<div class="single">
<div class="row">
<div class="col-md-4 col-sm-5">
<div class="image">
<?php if(!empty($all_data[$i]['business_image'])){?>
<img src="<?php echo base_url().'upload/business/'.$all_data[$i]['business_image'];?>">
<?php }else { ?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>">
<?php }?>
</div>
</div>
<div class="col-lg-8">
<div class="content">
<h3><?php echo ucwords($all_data[$i]['business_name']);?></h3>
<p><?php echo ucwords(substr($all_data[$i]['business_description'],0,220));?></p>
</div>
</div>
</div>
<div class="business-btm">
<!-- <div class="btm-sec">
<p>
<span class="img"><img src="<?php echo base_url()?>assets/web/icon/user.png"></span>
<span>Reviews :</span>
<strong> 37</strong>
</p>
<ul class="star">
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
</ul>
</div> -->
<div class="btm-sec">
<p>
<span class="img">
<img src="<?php echo base_url()?>assets/web/icon/map-marker2.png"></span>
<small>
<?php if(isset($all_data[$i]['business_street']) && !empty($all_data[$i]['business_street']))
{
echo $all_data[$i]['business_street'].'&nbsp,&nbsp';
}
echo $all_data[$i]['business_city'].'&nbsp,&nbsp';
echo $all_data[$i]['business_country'];
?>
</small>
</p>
</div>
<!-- <div class="btm-sec">
<p>
<span class="img">
<img src="<?php echo base_url()?>assets/web/icon/telephone.png"></span>
<?php if(isset( $all_data[$i]['business_postal_code'])){ ?>
<small>+61 2 <?php echo $all_data[$i]['business_postal_code'];?></small>
<?php } ?>
</p>
</div> -->
</div>
<ul class="business-links">
<li><a class="bg-red" href="javascript:void(0);" onClick="return delete_data('<?php echo base_url('Main/delete_full_business/'.base64_encription($all_data[$i]['business_id']));?>')">Delete</a></li>
<li><a href="<?php echo base_url('Main/business_details/'.base64_encription($all_data[$i]['business_id']));?>" class="bg-black">View</a></li>
<li><a href="<?php echo base_url('Main/edit_business/'.base64_encription($all_data[$i]['business_id']));?>">Edit</a></li>
</ul>
</div>
<?php } }
else{
echo '<h2> NO SPACE CREATED </h2>';
}
}?>
</div>
</div>
</div>
<?php $this->load->view('include/right-sidebar');?>
</div>
</main>
<?php $this->load->view('include/footer'); ?>
</body>
</html>
