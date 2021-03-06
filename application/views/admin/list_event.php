<?php
$page_title = 'List Event';
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
	<?php if(count($all_data) > 0){ 
	?>
	<tr>
	 	<?php foreach($all_data as $all_data){ ?>
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