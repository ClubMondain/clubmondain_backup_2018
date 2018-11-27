<?php
$page_title = 'List Of Delegate Space';
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
                      <th>Compnay Name</th>
                      <th>Delegate Space Name</th>
                      <th>Delegate Space Type</th>
                       
                      <th>People Invited</th>
                      <th>CSV Upload</th>
                      <th>View CSV</th>
                      
                      <th>Create Date</th>
                      <th>Update Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                <?php
                if(count($all_data)>0){
                foreach($all_data as $val){
                   
                ?>
                <tr>
					 <td><?php echo getCompanyname($val['user_id']);?></td>
                    
                    <td><?php echo $val['business_name'];?></td>
                    
                    <td><?php if($val['invite_type'] == 1 ){ echo "Public"; } if($val['invite_type'] == 2 ){ echo "Private"; } ?></td>
                    <td><?php  echo getInvitedPeople($val['business_id']); ?></td>
                        <?php 
                        if( checkEnergiserExist($val['business_id']) > 0 )
                        {
                        	if($val['is_csv_uploaded'] == 0)
                        	{
								?>
                        <td><span class="btn btn-warning" data-target="#myModal<?php echo $val['business_id']; ?>" data-toggle="modal">Upload CSV</span></td>
                         <td><b style="font-size: 14px;">Please Upload CSV</b></td>
                        <?php
							}
							else
							{
							?>
								<td><span class="btn btn-primary">CSV successfully uploaded.</span></td>
								<td><a class="btn btn-success" href="<?php echo base_url('InviteSpace/list_csv/'.$val['business_id']);?>"> View CSV </a></td>
							<?php
							}
							?>
                        
                        	
						<?php	
						}
						else
						{
						?>
						  <td><b style="font-size: 14px;">Please, First Create a Delegate Energizer</b></td> 
						  <td><b style="font-size: 14px;">Please, First Create a Delegate Energizer</b></td>   
						<?php
						}
                        ?>
                                
                    <td><?php echo $val['create_date'];?></td>

                    <td><?php echo $val['create_date'];?></td>

                    <td>
                    <a href="<?php echo base_url('InviteSpace/edit_invite_space/'.$val['business_id']);?>" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                    
                    <?php if( checkEnergiserExist($val['business_id']) == 0) { ?> 
                    <a href="javascript:void(0);" onClick="return delete_member('<?php echo base_url('InviteSpace/delete_invite_space/'.$val['business_id']); ?>');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                    <?php } ?>
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


 <?php
if(count($all_data)>0){
foreach($all_data as $val){
?>
 <div class="container">
 
  <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $val['business_id']; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload CSV to invite Delegates</h4>
            <span style="font-size: 12px;font-weight: bold;color: #ff0000;">Please note to only use CSV files from Excel or other desktop-based software (not Google drive or One drive)</span>
        </div>
        <form action="<?php echo base_url();?>InviteSpace/upload_csv" method="post" enctype="multipart/form-data">   
        <div class="modal-body">
          	<input type="file" name="userfile" id="userfile<?php echo $val['business_id']; ?>"/>       
          	<input type="hidden" value="<?php echo $val['business_id'];?>" name="space_id"/>
        </div>
        
        
        <div class="modal-body"><span style="font-size: 12px;font-weight: bold;"> Invitation Message:</span>
                                      <textarea class="ckeditor" id="ckeditor" name="invite_msg" rows="8" cols="92" style="resize: none;padding: 17px;width: 100%">Dear conference delegate,
Union is excited to offer you a range of Vitality Services in cooperation with World Forum The Hague and Club Mondain during your upcoming conference visit! Joining is fast, easy and fun so remember to pack your sportswear.
Healthy stays!</textarea> 

<style>
	.cke_top.cke_reset_all{
	display:none;	
	}
</style>
                                
</div>
        
        
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" onClick="return valid_csv_upload<?php echo $val['business_id']; ?>();">Upload and Send</button>
        </div>
         </form> 
      </div>
      
    </div>
  </div>
  
</div>


 <script>
	function valid_csv_upload<?php echo $val['business_id']; ?>()
	{
		var userfile = $("#userfile<?php echo $val['business_id']; ?>").val();
		if( userfile == '')
		{
			alert_message('Please Upload CSV !','warning','btn-warning');
			return false;
		}
	}
</script>
 
 <?php 
}
}
?>







</body>
</html>
