<?php
$page_title = 'List Of Joined People of <span style="color:#3c8dbc"> '.getEnergizerName($energizer_id).'</span>' ;
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
                      <th>Name</th>        
                      <th>Email</th>
                      <th>Phone Number</th> 
                    </tr>
                  </thead>
                <?php
                if(count($user_details)>0){
                foreach($user_details as $val){
                ?>
                <tr>                   			
                  	<td><?php echo $val->first_name.' '.$val->last_name;?></td>  	
					<td><?php echo $val->email;?></td>
					<td><?php echo $val->phone;?></td>
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
