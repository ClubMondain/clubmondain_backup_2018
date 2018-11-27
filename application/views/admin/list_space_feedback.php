<?php
$page_title = 'List All Space Feedback';
include('inc/top.php');
?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');?>
<div class="content-wrapper">
<section class="content-header">
<h1>
<?php echo $page_title;?>
</h1>   
</section>
<!-- Main content -->
<section class="content">
<?php if(isset($msg) && $msg !=''){?>
<div class="alert <?php echo $msgclass;?>"> <?php echo $msg;?> </div>
<?php }?>

<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
</div>
<!-- /.box-header -->
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
	<tr>
		<th>Space Name</th>
        <th>User Name</th>
        <th>Comments</th>
        <th>Action</th>
	</tr>
</thead>
	<?php if(count($all_data) > 0){ 
	?>
	<tr>
	 	<?php foreach($all_data as $all_data){
      $get_user_details = get_user_details($all_data['user_id']);
      $get_business_details = space_details($all_data['business_id']);
      if($get_user_details['user_type'] == 'C'){
      $name = $get_user_details['company_name'];   
      }else{  
      $name = $get_user_details['first_name'].' '.$get_user_details['last_name'];
      }
     ?>
      <td><?php echo $get_business_details['business_name'];?></td>
      <td><?php echo $name; ?></td>
      <td><?php echo $all_data['store_feedback'];?></td>
               
		<td><a href="<?php echo base_url('Space/edit-space-feedback-view/'.$all_data['store_feedback_id']);?>" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;
		<a href="javascript:void(0);" onClick="return delete_member('<?php echo base_url('Space/delete-space-feedback/'.$all_data['store_feedback_id']); ?>');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a></td>		              
	</tr>  
    <?php  } //End Foreach EVENT
	} // End If EVENT
	?>          
</table>
</div>
</div>
</div>
</div>
</section>
</div><!-- content-wrapper -->
<?php include('inc/footer.php');?>  <!-- Control Sidebar -->


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
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>