<?php include('include/head.php');?>
<body>
<?php include('include/header.php');?>
<main>
<section class="page-banner">
<div class="image"> <img src="<?php echo base_url('assets/web');?>/images/bg-1.png" alt=""> </div>
<div class="content">
<h3>Overview Of Memberships</h3>
</div>
<div class="overlay"></div>
</section>
<section class="about-us">
<div class="container">
<div class="content">
<h3>Overview Of Memberships</h3>
</div>
<div class="row">
<?php if(isset($ownership)){
for($i=0;$i<count($ownership);$i++){
$end_date = date_create($ownership[$i]['membership_end_date']);
$start_date = date_create($ownership[$i]['membership_start_date']);
$rest_days = date_diff($end_date,$start_date);
$rest_days = $rest_days->format("%a days");
?>
<div class="col-md-4">
<div class="row">
<div class="membership-single">
<?php if($ownership[$i]['membership_type'] != 'FREE'){?>
<h3 class="blue-bg">Popular</h3>
<?php } 
else { ?>
<h3></h3>
<?php }?>
<div class="plan">
<p><?php echo $ownership[$i]['membership_name']?></p>
</div>
<div class="fee">
<div class="cntnt">
<h3>&euro;<?php echo $ownership[$i]['membership_price']?></h3>
<p>
<?php if(date("Y-m-d") == $ownership[$i]['membership_end_date']){echo 'Now';} else{?>
<?php if($ownership[$i]['membership_type'] != 'FREE'){?>
Membership Expires 
<?php }else{ ?>
Never Expires 
<?php } ?>
<br>
After <?php echo $rest_days;}?> 
</p>
</div>
</div>
<div class="limit">
<p></p>
<?php echo $ownership[$i]['membership_description'];?> 
</div>
</div>
</div>
</div>
<?php 
}
}
?>
</div>
</div>
</section>
</main>
<?php include('include/footer.php'); ?>
</body>
</html>
