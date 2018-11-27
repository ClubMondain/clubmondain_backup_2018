<?php include('include/head.php');
/*echo '<pre>';
print_r($email);
echo '</pre>';*/?>
<body>
<?php include('include/header.php');?>
<main>
	<section>
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
                <?php $formDetails= array('id'=>'Forgot-Change-Password','method'=>'post','class'=>'','name'=>'Forgot-Change-Password');?>
					<?php echo form_open_multipart('Home/Forgot-Change-Password',$formDetails);?>
                    <input type="hidden" name="user_email" value="<?php if(isset($email)){ echo $email;}?>">
                <div class="row">
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>New Password<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                              <input type="password" name="user_pwd_old" value="" id="old_pass" placeholder="New Password">
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Confirm Password<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="password" name="user_pwd_new" value="" id="new_pass" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                    </div>
                    
               <div class="clearfix"></div>
                
                    <div class="col-sm-6 col-centered">
                		<div class="single">
                        <div class="form-row">
                        	<div class="field">
                            	<button type="submit" onClick="return forgetPassword_validation();">CHANGE PASSWORD</button>
                            </div>
                        </div>
                    </div>
                    </div>
               </div>
                <?php echo form_close();?>    
                </div>
            </div>
                            
            </div>            
        </div>
    </section>    
</main>
<?php include('include/footer.php');?>
</body>
</html>
