<?php
$page_title = 'List Of Company';
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
      <div class="col-md-2" style="float: right;">
      <button type="submit" class="btn btn-block btn-primary btn-flat">Toggle Status</button>
      </div>

      <div class="col-md-3">
      <div class="box-body" style="margin-left: -23px; margin-top: -10px;">
      <select class="form-control" name="membership" id="membership" onChange="shortingData('<?php echo base_url('Dashboard/list-company'); ?>',this.value)">
      <option value="">All</option>
      <?php
      if(count($all_membership) > 0){
      foreach($all_membership as $mem){
      ?>
      <option value="<?php echo $mem['membership_id']; ?>" <?php if( isset($_GET['membership']) && !empty($_GET['membership']) && $_GET['membership'] == $mem['membership_id']){?> selected <?php } ?>><?php echo $mem['membership_name']; ?></option>
      <?php
      }
      }
      ?>
      </select>
      </div>
      </div>

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
                      <th>Select</th>
                      <th>Compnay Name</th>
                      <th>Email</th>
                      <th>Phone No</th>
                      <th>Company Person</th>
                      <th>Membership</th>
                      <th>Facebook Link</th>
                      <th>Instagram Link</th>
                      <th>Twitter Link</th>
                      <th>Current Status</th>
                      <th>Date</th>
                      <th>Update Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                <?php
                if(count($all_members)>0){
                foreach($all_members as $all_members){
                    if($all_members['membership_id'] != 0){
                $get_member = get_member_details($all_members['membership_id']);
                if(isset($_GET['membership']) && !empty($_GET['membership'])){
                if($_GET['membership'] == $get_member['membership_id']){
                ?>
                <tr>
                    <td><input type="checkbox" name="chk[]" value="<?php echo $all_members['user_id'];?>"></td>

                    <td>
                       <a href="<?php echo base_url('Dashboard/view-all-company-details/'.$all_members['user_id']);?>">
                    <?php echo $all_members['company_name']; ?>
                    </a>
                    </td>


                    <td><?php echo $all_members['email'];?></td>
                    <td><?php echo $all_members['phone'];?></td>
                    <td><?php echo $all_members['company_person'];?></td>
                    <td><?php echo $get_member['membership_name'];?></td>

                    <td><a href="<?php echo $all_members['user_facebook'];?>" target="_blank">Facebook</a></td>
                    <td><a href="<?php echo $all_members['user_instagram'];?>" target="_blank">Instagram</a></td>
                    <td><a href="<?php echo $all_members['user_twitter'];?>" target="_blank">Twitter</a></td>

                    <td><?php echo statusColour($all_members['status']);?></td>
                    <td><?php echo $all_members['create_date'];?></td>
                    <td><?php echo $all_members['update_date'];?></td>

                    <td>
                    <a href="<?php echo base_url('Dashboard/edit-company-view/'.$all_members['user_id']);?>" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                    <a href="javascript:void(0);" onClick="return delete_member('<?php echo base_url('Dashboard/delete-member/'.$all_members['user_id']); ?>');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                <?php
                }
                }else{
                ?>
                  <tr>
                    <td><input type="checkbox" name="chk[]" value="<?php echo $all_members['user_id'];?>"></td>

                    <td>
   <a href="<?php echo base_url('Dashboard/view-all-company-details/'.$all_members['user_id']);?>">
                    <?php echo $all_members['company_name']; ?>
                    </a>
                    </td>


                    <td><?php echo $all_members['email'];?></td>
                    <td><?php echo $all_members['phone'];?></td>
                    <td><?php echo $all_members['company_person'];?></td>
                    <td><?php echo $get_member['membership_name'];?></td>



                    <td><a href="<?php echo $all_members['user_facebook'];?>" target="_blank">Facebook</a></td>
                    <td><a href="<?php echo $all_members['user_instagram'];?>" target="_blank">Instagram</a></td>
                    <td><a href="<?php echo $all_members['user_twitter'];?>" target="_blank">Twitter</a></td>

                    <td><?php echo statusColour($all_members['status']);?></td>
                    <td><?php echo $all_members['create_date'];?></td>
                    <td><?php echo $all_members['update_date'];?></td>
                    <td>
                    <a href="<?php echo base_url('Dashboard/edit-company-view/'.$all_members['user_id']);?>" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                    <a href="javascript:void(0);" onClick="return delete_member('<?php echo base_url('Dashboard/delete-member/'.$all_members['user_id']); ?>');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a></td>
                  </tr>
                  <?php
                  }
                }
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
