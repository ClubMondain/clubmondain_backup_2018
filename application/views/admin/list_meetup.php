<?php
$page_title = 'List Meetup';
include('inc/top.php');
?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');?>
<div class="content-wrapper">
<section class="content-header">
<h1> <?php echo $page_title;?> </h1>
</section>
<section class="content">
<?php if(isset($msg) && $msg !=''){?>
<div class="alert <?php echo $msg_class;?>"> <?php echo $msg;?> </div>
<?php }?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header"> </div>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>User</th>
<th>Meet up Name</th>
<th>Meetup Date</th>
<th>Description</th>
<th>City</th>
<th>Country</th>
<th>Creted Date</th>
<th>Action</th>
</tr>
</thead>
<?php
if(count($meetup_list)>0){
foreach($meetup_list as $list){
$get_user_details = get_user_details($list['user_id']);
if($get_user_details['user_type'] == 'C'){
$user_name = $get_user_details['company_name'];
}else{
$user_name = $get_user_details['first_name'].' '.$get_user_details['last_name'];
}
?>
<tr>
<td><?php echo $user_name ;?></td>
<td><?php echo $list['meet_up_name'];?></td>
<td><?php echo $list['meetup_date'];?></td>
<td><?php echo strip_tags($list['meet_up_description']);?></td>
<td><?php echo $list['country_name'];?></td>
<td><?php echo $list['city_name'];?></td>
<td><?php echo $list['create_date'];?></td>
<td>
<a href="javascript:void(0);" onClick="return delete_member('<?php echo base_url('Meetup/delete-meetup/'.$list['meet_up_id']); ?>');" data-toggle="tooltip" title="Delete">
<i class="fa fa-trash"></i>
</a>
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
</div>
</section>
</div>
<?php include('inc/footer.php');?>
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
