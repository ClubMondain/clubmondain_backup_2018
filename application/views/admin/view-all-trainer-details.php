<?php
$page_title = 'Details';
include('inc/top.php');
?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');?>
<form method="post" action="<?php echo base_url('Dashboard/change-company-status'); ?>">
<div class="content-wrapper">
<section class="content-header">
<h1> <?php echo $page_title;?> </h1>
</section>
<!-- Main content -->
<section class="content">
<?php if(isset($msg) && $msg !=''){?>
<div class="alert <?php echo $msg_class;?>"> <?php echo $msg;?> </div>
<?php }?>
<div class="row">
<div class="col-md-12">
<!-- Custom Tabs -->
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false"><strong>Space</strong></a></li>
<li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><strong>Event</strong></a></li>
<li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false"><strong>News</strong></a></li>
<!-- <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="true"><strong>Blog</strong></a></li> -->
<li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="true"><strong>Classes</strong></a></li>
<li class="">
<a href="#tab_6" data-toggle="tab" aria-expanded="true"><strong>Membership Details</strong></a></li>
</ul>
<div class="tab-content">

<div class="tab-pane active" id="tab_1">
<div class="box-body">
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Space Name</th>
<th>Country Name</th>
<th>State Name</th>
<th>Business Website Url</th>
<th>Business Street</th>
<th>Latitude</th>
<th>longitute</th>
<th>Postal Code</th>
<th>Facebook Link</th>
<th>Twitter Link</th>
<th>Instagram Link</th>
<th>Status</th>
<th>Create Date</th>
<th>Update Date</th>
<th>Action</th>
</tr>
</thead>
<?php
if(count($space)>0){
foreach($space as $space_single){
?>
<tr>
<td><?php echo $space_single['business_name']; ?></td>
<td><?php echo $space_single['country_name']; ?></td>
<td><?php echo $space_single['city_name']; ?></td>
<td><?php echo $space_single['business_website_url']; ?></td>
<td><?php echo $space_single['business_street']; ?></td>
<td><?php echo $space_single['business_latitude']; ?></td>
<td><?php echo $space_single['business_longitute']; ?></td>
<td><?php echo $space_single['business_postal_code']; ?></td>
<td><a href="<?php echo $space_single['business_facebook_link']; ?>" target="_blank">Facebook Link</a></td>
<td><a href="<?php echo $space_single['business_twitter_link']; ?>"  target="_blank">Twitter Link</a></td>
<td><a href="<?php echo $space_single['business_instagram_link']; ?>"  target="_blank">Instagram Link</a></td>
<td><?php echo statusColour($space_single['business_status']); ?></td>
<td><?php echo $space_single['create_date']; ?></td>
<td><?php echo $space_single['update_date']; ?></td>
<td><a href="<?php echo base_url('Space/edit-space-view/'.$space_single['business_id']);?>" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;
<a href="javascript:void(0);" onClick="return delete_member('<?php echo base_url('Space/delete-space/'.$space_single['business_id']); ?>');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a></td>
</tr>
<?php
}
}
?>
</table>
</div>
</div>
</div>

<div class="tab-pane" id="tab_2">
<div class="box-body">
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Event Name</th>
<th>Event Picture</th>
<th>Description</th>
<th>City Name</th>
<th>Country Name</th>
<th>Start Date</th>
<th>End Date</th>
<th>Action</th>
</tr>
</thead>
<?php if( (count($all_event) > 0) ){ ?>
<tr>
<?php foreach($all_event as $all_data){
if($all_data['user_id'] == $data_id){
?>
<td><?php echo $all_data['event_name'];?></td>
<?php if($all_data['image_url'] == '') {?>
<td><img src="<?php echo base_url('upload/no_image/noimage.jpg')?>" style="width: 120px;height: auto;"></td>
<?php }else{?>
<td><img src="<?php echo base_url('upload/events/'.$all_data['image_url']);?>" style="width: 120px;height: 80px;"></td>
<?php }?>
<td><?php echo strip_slashes($all_data['event_description']);?></td>
<td><?php echo $all_data['city_name'];?></td>
<td><?php echo $all_data['country_name'];?></td>
<td><?php echo $all_data['event_date_from'];?></td>
<td><?php echo $all_data['event_date_to'];?></td>
<td><a href="<?php echo base_url('Event/edit-event-view/'.$all_data['event_id']);?>" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;
<a href="javascript:void(0);" onClick="return delete_member('<?php echo base_url('Event/delete-event/'.$all_data['event_id']); ?>');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a></td>
</tr>
<?php
}
}
}
?>
</table>
</div>
</div>
</div>

<div class="tab-pane" id="tab_3">
<div class="box-body">
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Heading</th>
<th>Country</th>
<th>City</th>
<th>Address</th>
<th>Picture</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<?php
if(count($all_news)>0){
foreach($all_news as $all_members){
$get_user_details = get_user_details($all_members['user_id']);
if($get_user_details['user_id'] == $data_id){
?>
<tr>
<td><?php echo $all_members['blog_news_title'];?></td>
<td><?php echo $all_members['country_name'];?></td>
<td><?php echo $all_members['city_name'];?></td>
<td><?php echo $all_members['blog_news_address'];?></td>
<td><img src="<?php echo  site_url('upload/blog_news/').$all_members['blog_news_image']; ?>" style="width: 50px; height: 50px;" /></td>
<td><?php echo $all_members['create_date'];?></td>
<td><?php echo statusColour($all_members['blog_news_status']);?></td>
<td>
<a href="<?php echo base_url('Dashboard/edit_news_view/'.$all_members['blog_news_id']);?>" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;
<a href="javascript:void(0);" onClick="return delete_member('<?php echo base_url('Dashboard/delete_news/'.$all_members['blog_news_id']); ?>');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a></td>
</tr>
<?php
}
}
}
?>
</table>
</div>
</div>
</div>

<div class="tab-pane" id="tab_4">
<div class="box-body">
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Heading</th>
<th>Country</th>
<th>City</th>
<th>Address</th>
<th>Picture</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<?php
if(count($all_blog)>0){
foreach($all_blog as $all_members_details){
$get_user_details = get_user_details($all_members_details['user_id']);
if($get_user_details['user_id'] == $data_id){
?>
<tr>
<td><?php echo $all_members_details['blog_news_title'];?></td>
<td><?php echo $all_members_details['country_name'];?></td>
<td><?php echo $all_members_details['city_name'];?></td>
<td><?php echo $all_members_details['blog_news_address'];?></td>
<td><img src="<?php echo  site_url('upload/blog_news/').$all_members_details['blog_news_image']; ?>" style="width: 50px; height: 50px;" /></td>
<td><?php echo $all_members_details['create_date'];?></td>
<td><?php echo statusColour($all_members_details['blog_news_status']);?></td>
<td>
<a href="<?php echo base_url('Dashboard/edit-blog-view/'.$all_members_details['blog_news_id']);?>" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;
<a href="javascript:void(0);" onClick="return delete_member('<?php echo base_url('Dashboard/delete-blog/'.$all_members_details['blog_news_id']); ?>');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a></td>
</tr>
<?php
}
}
}
?>
</table>
</div>
</div>
</div>

<div class="tab-pane" id="tab_5">
<div class="box-body">
<div class="table-responsive">
<table class="table table-bordered table-striped text-center">
<thead>
<tr>
<th>Space Name</th>
<th>Class Name</th>
<th>Address</th>
<th>Price</th>
<th>Type</th>
<th>Image</th>
<th>No of Seat</th>
<th>Country Name</th>
<th>City Name</th>
<th>Website</th>
<th>Latitude</th>
<th>Longitute</th>
<th>Status</th>
<th>Create Date</th>
<th>Update Date</th>
<th>Action</th>
</tr>
</thead>
<?php
if( (count($all_classes) > 0) and (!empty($all_classes) ) ){
foreach($all_classes as $all_members){
$get_event_details = space_details($all_members['event_id']);
$get_counrty_details = get_country_details($all_members['country_id']);
$get_city_details = get_city_details($all_members['city_id']);
?>
<tr>
<td><?php echo $get_event_details['business_name'];?></td>
<td><?php echo $all_members['trainer_class_name'];?></td>
<td><?php echo $all_members['trainer_class_address'];?></td>
<td><?php echo $all_members['trainer_class_price'];?></td>
<td><?php echo $all_members['trainer_class_type'];?></td>
<td><?php echo $all_members['trainer_class_image'];?></td>
<td><?php echo $all_members['class_no_of_booking'];?></td>
<td><?php echo $get_counrty_details['country_name'];?></td>
<td><?php echo $get_city_details['city_name'];?></td>
<td><a href="<?php echo $all_members['trainer_class_website_url'];?>" target="_blank">Link</a></td>
<td><?php echo $all_members['trainer_class_latitude'];?></td>
<td><?php echo $all_members['trainer_class_longitute'];?></td>
<td><?php echo statusColour($all_members['trainer_class_status']);?></td>
<td><?php echo $all_members['create_date'];?></td>
<td><?php echo $all_members['update_date'];?></td>
<td>
<a href="javascript:void(0);" onClick="return delete_member('<?php echo base_url('Dashboard/delete-class/'.$all_members['trainer_class_id'].'/'.$all_members['user_id']); ?>');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
</td>
</tr>
<?php
}
}
?>
</table>
</div>
</div>
</div>


<div class="tab-pane" id="tab_6">
<div class="box-body">
<div class="table-responsive">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Category</th>
<th>Name</th>
<th>Type</th>
<th>Price($)</th>
<th>Start Date</th>
<th>End Date</th>
</tr>
</thead>
<?php
if(count($membershipduse>0)){
foreach($membershipduse as $a_mem){
?>
<tr>
<td><?php echo 'Trainner'; ?></td>
<td><?php echo $a_mem['membership_name'];?></td>
<td><?php echo $a_mem['membership_type'];?></td>
<td><?php echo $a_mem['membership_price'];?></td>
<td><?php echo $a_mem['membership_start_date'];?></td>
<td><?php echo $a_mem['membership_end_date'];?></td>
</tr>
<?php
}
}
?>
</table>
</div>
</div>
</div>

</div>
</div>
</div>
</section>
</div>
</form>
<?php include('inc/footer.php');?>
</div>
<script src="<?php echo base_url('assets/');?>js/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/fastclick.js"></script>
<script src="<?php echo base_url('assets/');?>js/app.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/demo.js"></script>
<script src="<?php echo base_url('assets/');?>js/admin_alert.js"></script>
<script>
$(function () {
$('#example1').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false
});
});
</script>
</body>
</html>
