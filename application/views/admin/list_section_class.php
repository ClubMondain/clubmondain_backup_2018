<?php
$page_title = 'List Of Classes';
include('inc/top.php');
?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include('inc/header.php');?>
  <?php include('inc/sidebar.php');?>
  <form method="post" action="<?php echo base_url('Dashboard/change-class-status'); ?>"> 
  <!-- <input type="hidden" name="trainer_id" id="trainer_id" value="<?php echo $all_trainner_id; ?>">  --><!-- <input type="hidden" name="trainer_id" id="trainer_id" value="<?php echo $all_trainner_id; ?>">  -->
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

     <!--  <div class="col-md-2" style="float: right; margin-bottom: 30px;">
     <button type="submit" class="btn btn-block btn-primary btn-flat">Toggle Status</button>
     </div> -->

      </div>
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header"> </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                     <!--  <th>Select</th> -->
                      <th>Event Name</th>
                      <th>Class Name</th>
                      <th>Address</th>
                      <th>Price</th>
                      <th>Type</th>
                      <!-- <th>Image</th> -->
                      <th>No of Seat</th>
                      <th>Country Name</th>
                      <th>City Name</th>
                      <th>Website</th>
                     <!--  <th>Latitude</th> -->
                      <!-- <th>Longitute</th> -->
                      <th>Status</th>
                      <!-- <th>Create Date</th>
                      <th>Update Date</th> -->
                      <th>Action</th>
                    </tr>
                  </thead>
                <?php 
                if(count($all_data)>0){
                foreach($all_data as $all_members){ 
                $get_event_details = get_event_details($all_members['event_id']);
                $get_counrty_details = get_country_details($all_members['country_id']);
                $get_city_details = get_city_details($all_members['city_id']);  
                ?>
                <tr>
                    <!-- <td><input type="checkbox" name="chk[]" value="<?php echo $all_members['trainer_class_id'];?>"></td> -->
                    <td><?php echo $get_event_details['event_name'];?></td>
                    <td><?php echo $all_members['trainer_class_name'];?></td>
                    <td><?php echo $all_members['trainer_class_address'];?></td>
                    <td><?php echo $all_members['trainer_class_price'];?></td>
                    <td><?php echo $all_members['trainer_class_type'];?></td>
                    <!-- <td><?php echo $all_members['trainer_class_image'];?></td> -->
                    <td><?php echo $all_members['class_no_of_booking'];?></td>
                    <td><?php echo $get_counrty_details['country_name'];?></td>
                    <td><?php echo $get_city_details['city_name'];?></td>
                    <td><a href="<?php echo $all_members['trainer_class_website_url'];?>" target="_blank">Link</a></td>
                    <!-- <td><?php echo $all_members['trainer_class_latitude'];?></td>
                    <td><?php echo $all_members['trainer_class_longitute'];?></td> -->
                    <td><?php echo statusColour($all_members['trainer_class_status']);?></td>
                  <!--   <td><?php echo $all_members['create_date'];?></td>
                  <td><?php echo $all_members['update_date'];?></td> -->

                    <td>
                    <a href="<?php echo base_url('education/edit-class-view/'.$all_members['trainer_class_id']);?>" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                    <!-- <a href="javascript:void(0);" onClick="return delete_member('<?php echo base_url('Dashboard/delete-class/'.$all_members['trainer_class_id'].'/'.$all_members['user_id']); ?>');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a> -->
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