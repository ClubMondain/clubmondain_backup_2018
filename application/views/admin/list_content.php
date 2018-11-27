<?php
$page_title = 'List Content';
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
    <!-- Main content -->
    <section class="content">
      <?php if(isset($msg) && $msg !=''){?>
      <div class="alert <?php echo $msg_class;?>"> <?php echo $msg;?> </div>
      <?php }?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header"> </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
            <th>Page Name</th>
            <th>Page Title</th>
            <th>Page Status</th>
            <th>Action</th>
            </tr>
            </thead>
            <?php if(count($all_members)> 0){
            foreach($all_members as $all_members){ ?>
            <tr>
            <td><?php echo stripslashes($all_members['page_name']);?></td>
            <td><?php echo stripslashes(strip_tags($all_members['page_title']));?></td>
            <td><?php echo statusColour($all_members['content_status']);?></td>
            <td>
            <a href="<?php echo base_url('Dashboard/edit_content_view/'.$all_members['content_id']);?>" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>	
            <!-- <a href="javascript:void(0);" onClick="return delete_member('<?php echo base_url('Dashboard/delete_content/'.$all_members['content_id']); ?>');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a> --></td>
            </tr>
            <?php }
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
<script type="text/javascript">
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