<?php $this->load->view('include/head'); ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" type="text/css">
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
<body>
   <?php $this->load->view('include/header');?>
   <main class="dashboard" id="dashboard-main">
      <?php $this->load->view('include/left-sidebar');?>
      <div class="dashboard-main">
         <div class="left">
            <div class="dashboard-toggle" id="dashboard-toggle">
               <button><i class="fa fa-bars"></i></button>
            </div>
            <div class="single-content">
               <div class="dashboard-head">
                  <?php if( !empty($this->session->flashdata('msg')) &&  !empty($this->session->flashdata('msg_class') ) ){ ?>
                  <div class="<?php echo $this->session->flashdata('msg_class');?>"> <?php echo $this->session->flashdata('msg');?> </div>
                  <?php }?>
                  <h2> List Of All Delegate Space </h2>
                  <a href="<?php echo base_url('Energiser/add_invite_space');?>">CREATE DELEGATE SPACE </a>
               </div>
               <div class="dashboard-events">
                  <table class="table" id="invite_space_table">
                     <thead>
                        <tr>
                           <th>Delegate Invite Name </th>
                           <th>Invite Type</th>
                           
                           <th>People Invited</th>
                           <th>CSV Upload</th>
                           <th>View CSV</th>
                           
                           <th>Create Date</th>
                           <th>Update Date</th>
                           <th style="width: 103px;">Action</th>
                        </tr>
                     </thead>
                     <?php 
                        if(count($all_data)>0){
                        foreach($all_data as $val){ 
                        ?>
                     <tr>
                        <td><?php echo $val['business_name'];?></td>
                        <td><?php if($val['invite_type'] == 1 ){ echo "Public"; } if($val['invite_type'] == 2 ){ echo "Private"; } ?> </td>
                        
                         <td><?php  echo getInvitedPeople($val['business_id']); ?></td>
                        
                        <?php 
                        if( checkEnergiserExist($val['business_id']) > 0 )
                        {
                        	if($val['is_csv_uploaded'] == 0)
                        	{
								?>
                        <td><button class="btn btn-warning" data-target="#myModal<?php echo $val['business_id']; ?>" data-toggle="modal">Upload CSV</button></td>
                        <td><b style="font-size: 14px;">Please Upload CSV</b></td>
                        
                        <?php
							}
							else
							{
							?>
								<td><span class="btn btn-primary">CSV successfully uploaded.</span></td>
								
								<td><a  href="<?php echo base_url('Energiser/list_csv/'.$val['business_id']);?>"><button class="btn btn-success">View CSV</button></a> </td>
                        
							<?php
							}
							?>
                        
                        	
						<?php	
						}
						else
						{
						?>
						 <td colspan="2"><b style="font-size: 14px;">Please, First Create a Delegate Energizer</b></td>                        
                      		
						<?php
						}
                        ?>
                        
                        <td><?php echo $val['create_date'];?></td>
                        <td><?php echo $val['create_date'];?></td>
                        <td>
                           <?php if( checkEnergiserExist($val['business_id']) == 0) { ?> 
                           <a class="btn btn-danger" href="javascript:void(0);" onclick="return delete_data('<?php echo base_url('Energiser/delete_invite_space/'.base64_encription($val['business_id']));?>')">Delete</a>
                           <?php } ?>
                           <a class="btn btn-info" href="<?php echo base_url('Energiser/edit_invite_space/'.base64_encription($val['business_id']));?>">Edit</a>
                        </td>
                     </tr>
                     
                     <div class="container">
                        <!-- Trigger the modal with a button -->
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
                                 <form action="<?php echo base_url();?>Energiser/upload_csv" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                       <input type="file" name="userfile" id="userfile<?php echo $val['business_id']; ?>"/>       
                                       <input type="hidden" value="<?php echo $val['business_id']; ?>" name="space_id"/> 
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
                                       <a download="" href="<?php echo base_url();?>upload/energiser_csv/sample_csv.xlsx" type="submit"  class="btn btn-primary" style="float: left;">DOWNLOAD SAMPLE CSV</a>                                       
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
                  </table>
               </div>
            </div>
         </div>
         <?php $this->load->view('include/right-sidebar');?>
      </div>
   </main>
   <?php $this->load->view('include/footer');?>
</body>

<script>
	$(document).ready( function () {
    $('#invite_space_table').DataTable();
} );
</script>


</html>