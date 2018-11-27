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
                  <h2> List Of Invited Peoples </h2>
              
               <button type="button" class="btn btn-primary" style="margin-left: 200px;" data-toggle="modal" data-target="#add_people" >ADD PERSON</button>   
                  
             <a href="<?php echo base_url('Energiser/list_invite_space');?>">BACK TO LIST</a>
               </div>
               <div class="dashboard-events">
                  <table class="table"  id="energiser_table">
                     <thead>
                        <tr>
                      	  	<!--<th>Delegate Energiser</th>-->
                           <th> Name of the User</th>
                           <th>Email ID</th>
                           <th>Phone Number</th>
                           <th>Token</th>
                           <th>Mail Send</th>
                           <th style="width: 103px;">Action</th>
                        </tr>
                     </thead>
                     <?php 
                     
                        if(count($all_data)>0)
                        {
                        	
                        foreach($all_data as $val){ 
                        ?>
                     <tr>
                     	<!--<td><?php echo getEnergisername($space_id);?></td>-->
                        <td><?php echo $val['name'];?></td>
                        <td><?php echo $val['email']?></td>
                        <td><?php echo $val['phone']?></td>
                        <td><?php echo $val['token']?></td>
                       <!-- <td><button class="btn btn-warning" onclick="mailsend('<?php echo base_url(); ?>Energiser/mail_sent_csv_user/<?php echo base64_encode($val['id']);?>/<?php echo base64_encode($space_id);?>')">Mail</button></td> -->    
                        
                        
                    	<td><button class="btn btn-warning" data-target="#myModal_mail<?php echo $val['id']; ?>" data-toggle="modal">Mail</button></td>   
                        
                        
          			 <td>
                        <a class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $val['id'];?>" href="javascript:void(0);">Edit</a>                          
                        </td>
                     </tr>
                     
                 	<div class="modal fade" id="myModal<?php echo $val['id'];?>" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Edit Information</h4>
				          
				        </div>
				         <form action="<?php echo base_url();?>Energiser/update_csv_listing_user/<?php echo $space_id;?>" method="post" enctype="multipart/form-data">
				        <div class="modal-body">
				       <input type="hidden" value="<?php echo $val['id'];?>" name="csv_user_id"/>
				      
						    <div class="form-group">
						      <label for="usr">Name:</label>
						      <input type="text" class="form-control" value="<?php echo $val['name'];?>" name="usr_name">
						    </div>
						    <div class="form-group">
						      <label for="pwd">Email Id:</label>
						      <input type="text" class="form-control" value="<?php echo $val['email']?>" name="usr_email">
						    </div>
						    
						    <div class="form-group">
						      <label for="pwd">Phone Number:</label>
						      <input type="text" class="form-control" value="<?php echo $val['phone']?>" name="usr_phone">
						    </div>
						    
						  
				        </div>
				        <div class="modal-footer">
				          <button type="submit" class="btn btn-success">Update</button>
				        </div>
				        </form>
				      </div>
				      
				    </div>
				  </div>
                                
                                
                                <div class="container">
                        <!-- Trigger the modal with a button -->
                        <!-- Modal -->
                        <div class="modal fade" id="myModal_mail<?php echo $val['id']; ?>" role="dialog">
                           <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Resend Invitation for newly added person</h4>
                                    
                                 </div>
                                 <form action="<?php echo base_url(); ?>Energiser/mail_sent_csv_user/<?php echo base64_encode($val['id']);?>/<?php echo base64_encode($space_id);?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-body"><span style="font-size: 12px;font-weight: bold;"> Invitation Message:</span>
                                      <textarea class="ckeditor" id="ckeditor" name="invite_msg" rows="8" cols="92" style="resize: none;padding: 17px;width: 100%;color: #000000;">Dear conference delegate,
Union is excited to offer you a range of Vitality Services in cooperation with World Forum The Hague and Club Mondain during your upcoming conference visit! Joining is fast, easy and fun so remember to pack your sportswear.
Healthy stays!</textarea> 



</div>
                                    
                                    <div class="modal-footer">
                                       <button type="submit" class="btn btn-success" onClick="return valid_csv_upload<?php echo $val['id']; ?>();">Send</button>
                                                                            
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                                
                                                                
                                   
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
   
   
   
   <div class="modal fade" id="add_people" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Add Person</h4>
				          
				        </div>
				         <form action="<?php echo base_url();?>Energiser/add_people_to_csv/<?php echo $space_id;?>" method="post" enctype="multipart/form-data">
				        <div class="modal-body">
				       <input type="hidden" value="" name="csv_user_id"/>
				      
						    <div class="form-group">
						      <label for="usr">Name:</label>
						      <input type="text" class="form-control" name="usr_name" id="usr_name">
						    </div>
						    <div class="form-group">
						      <label for="pwd">Email Id:</label>
						      <input type="text" class="form-control"  name="usr_email" id="usr_email">
						    </div>
						    
						    <div class="form-group">
						      <label for="pwd">Phone Number:</label>
						      <input type="text" class="form-control"  name="usr_phone" id="usr_phone">
						    </div>
						    
						  
				        </div>
				        <div class="modal-footer">
				          <button type="submit" class="btn btn-success" onClick="return people_add();" >ADD PERSON</button>
				        </div>
				        </form>
				      </div>
				      
				    </div>
				  </div>
</body>

<script>
	$(document).ready( function () {
    $('#energiser_table').DataTable();
} );
</script>

<script>
	function mailsend(e){
	swal({
  title: "Are you sure?",
  text: "You are about to resend the invitation and token to this delegate.",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-success",
  confirmButtonText: "Yes, Send it.", 
  cancelButtonText: "No, cancel",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    swal("Sent !", "Mail has been successfully.", "success");
    window.location.href = e;
  } else {
    swal("Cancelled", "Mail has not been sent", "error");
  }
});
}
</script>



<script>
	
//////////////////////////////////////////////// FOR CSV USER ADD VALIDATION ////////////////////////////////////////
function people_add()
{
	var usr_name = $("#usr_name").val();	
	var usr_email = $("#usr_email").val();
	var usr_phone = $("#usr_phone").val();
	if( usr_name == '')
	{
		alert_message('Please Enter Your Name!','warning','btn-warning');
		return false;
	}
	if( usr_email == '')
	{
		alert_message('Please Enter Your Email ID!','warning','btn-warning');
		return false;
	}	
	if( usr_phone == '')
	{
		alert_message('Please Enter Your Phone Number!','warning','btn-warning');
		return false;
	}
	
}
////////////////////////////////////////////////  FOR CSV USER ADD VALIDATION/////////////////////////////////////////
</script>







<style>
	.modal-content {
   background-color: #f6f6f6;
}


	.cke_top.cke_reset_all{
	display:none;	
	}

</style>

</html>