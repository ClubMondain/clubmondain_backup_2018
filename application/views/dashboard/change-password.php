<?php 
$this->load->view('include/head');?>
<body>
<?php 
$this->load->view('include/header');?>
<?php /* echo '<pre>' ;
print_r($country);
echo '</pre>';*/
//echo $_SESSION['user_details'][0]['id'];
?>
    <main class="dashboard" id="dashboard-main">
    	<?php $this->load->view('include/left-sidebar');?>
        <div class="dashboard-main">
        
        	<div class="left">
                <div class="dashboard-toggle" id="dashboard-toggle">
                    <button><i class="fa fa-bars"></i></button>
                </div>
     <?php if(isset($msg) && $msg !=''){ ?>
          <div class="alert <?php echo $msgclass;?>"> <?php echo $msg;?> </div>
          <?php }?>
        
        <div class="single-content">
                	<div class="dashboard-head">
                    	<h2> Change Password</h2>
                    </div>
            	<div class="details-form mem-form">
                <?php $formDetails= array('id'=>'Change-Password-update','method'=>'post','class'=>'','name'=>'Change_Password_update');?>
					<?php echo form_open_multipart('Main/Change-Password-update',$formDetails);?>
                <div class="row">
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Old Password<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="password" name="user_pwd_old" value="" id="old_pass" placeholder="Old Password">
                            	
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>New Password<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="password" name="user_pwd_new" value="" id="new_pass" placeholder="New Password">
                            </div>
                        </div>
                    </div>
                    </div>
                    
               <div class="clearfix"></div>
                
                    <div class="col-sm-6 col-centered">
                		<div class="single">
                        <div class="form-row">
                        	<div class="field">
                            	<button type="submit" onClick="return Changepassword_validation();">CHANGE PASSWORD</button>
                            </div>
                        </div>
                    </div>
                    </div>
                    
               </div>
                
                <?php echo form_close();?>    
                </div>
            </div>
                            
            </div>
            
        	<?php $this->load->view('include/right-sidebar');?>
            
        </div>
    </main>
   <?php 
$this->load->view('include/footer');?>
<script type="text/javascript">
$(".js-multiple-category").select2({
	placeholder: "Choose Category",
  	allowClear: true
	});
</script>
<script type="text/javascript">
$(document).ready(function() {
  $(".js-example-basic-single").select2({
	  placeholder: "Select Country",
	  });
});
$(document).ready(function() {
  $(".js-basic-city").select2({
	  placeholder: "Select City",
	  });
});
</script>
</body>
</html>