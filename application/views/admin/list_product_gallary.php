<?php
$page_title = 'List Gallary';
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
                <div class="timeline-body">
                  <?php 
                  if(count($all_data)> 0){
                    foreach($all_data as $all_details){ 
                      ?>
                      <img src="<?php echo base_url('upload/product/'.$all_details['product_images_name']); ?>" alt="" style=" background: #dfdee5; padding: 3px; width:128px" class="margin">
                      <a href="javascript:void(0)" onClick="return delete_member('<?php echo base_url('Product/delete-product-gallary/'.$all_details['product_images_id']); ?>');"><i class="fa fa-times " aria-hidden="true"></i></a>  
                      <?php 
                    } 
                  }
                  ?>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include('inc/footer.php');?>
    <!-- Control Sidebar --> 
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