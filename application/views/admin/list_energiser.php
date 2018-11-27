<?php
$page_title = 'List Of Delegate Energizer';
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
      <?php if(!empty($this->session->flashdata('msg')) &&  !empty($this->session->flashdata('msg_class') ) ){?>
      <div class="alert <?php echo $this->session->flashdata('msg_class');?>"> <?php echo $this->session->flashdata('msg');?> </div>
      <?php }?>
      
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header"> </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th>Delegate Energizer Name</th>
                      <th>Delegate Space Name</th>                      
                      
                      <th>Action</th>
                    </tr>
                  </thead>
                <?php
                if(count($all_data)>0){
                foreach($all_data as $val){
                ?>
                <tr>                   				
					<td><?php echo $val['trainer_class_name'];?></td>                    
                    <td><?php echo get_invite_space_details($val['space_id']);?></td>     
                  
                    
                    <td>
                    <a href="<?php echo base_url('InviteSpace/edit_energiser/'.$val['trainer_class_id']);?>" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                    
                  
                    <a href="javascript:void(0);" onClick="return delete_member('<?php echo base_url('InviteSpace/delete_energiser/'.$val['trainer_class_id']); ?>');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                   
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
