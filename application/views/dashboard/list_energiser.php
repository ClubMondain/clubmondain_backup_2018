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
                  <h2> List Of Delegate Energizer </h2>
                  <a href="<?php echo base_url('Energiser/add_energiser');?>">ADD DELEGATE ENERGIZER</a>
               </div>
               <div class="dashboard-events">
                  <table class="table"  id="energiser_table">
                     <thead>
                        <tr>
                           <th>Delegate Energizer Name </th>
                           <th>Delegate Space Name</th>
                          
                          <!-- <th>Create Date</th>
                           <th>Update Date</th>-->
                           
                           <th style="width: 103px;">Action</th>
                        </tr>
                     </thead>
                     <?php 
                        if(count($all_data)>0){
                        	
                        foreach($all_data as $val){ 
                        ?>
                     <tr>
                        <td><?php echo $val['trainer_class_name'];?></td>
                        <td><?php echo get_invite_space_details($val['space_id']);?></td>
                       
                       <!-- <td><?php echo $val['create_date'];?></td>
                        <td><?php echo $val['update_date'];?></td>-->
                       
                        <td>
                           <a class="btn btn-danger" href="javascript:void(0);" onclick="return delete_data('<?php echo base_url('Energiser/delete_energiser/'.base64_encription($val['trainer_class_id']));?>')">Delete</a>
                           <a class="btn btn-info" href="<?php echo base_url('Energiser/edit_energiser/'.base64_encription($val['trainer_class_id']));?>">Edit</a>
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
         <?php $this->load->view('include/right-sidebar');?>
      </div>
   </main>
   <?php $this->load->view('include/footer');?>
</body>

<script>
	$(document).ready( function () {
    $('#energiser_table').DataTable();
} );
</script>


<style>
/*table.dataTable tbody th, table.dataTable tbody td{
	
	padding: 0;
}
.dashboard-main > .left{
	
	width: 100%;
    padding: 15px 0px;
}*/
</style>
</html>