<footer>
<div class="foot-top">
<div class="container">
<div class="row">
<div class="col-lg-11 col-centered">
<?php if(!isset($_SESSION['user_login'])){ ?>
<a href="#register-popup" data-toggle="modal"><i class="fa fa-envelope-o"></i> Join Club Mondain Now</a>
<?php } ?>
</div>
</div>
</div>
</div>
<div class="footer">
<div class="container">
<div class="row">
<div class="col-lg-11 col-centered">
<div class="footer-links s-cont">
<div class="row">
<div class="single s-sec2 border">
<h3><em>Pages</em></h3>
<ul>
<li><a href="<?php echo base_url('Home/our-story'); ?>">Our Story </a></li>
<li><a href="<?php echo base_url('Home/membership-ownership'); ?>">Overview Of Memberships</a></li>
<li><a href="<?php echo base_url('Home/membershp-rules'); ?>">Membership Rules</a></li>
<li><a href="<?php echo base_url('Home/privacy'); ?>">Privacy Policy</a></li>
</ul>
</div>
<div class="single pull-right s-sec2">
<h3><em>Social media</em></h3>
<ul>
<li><a href="<?php echo $_SESSION['GET_ADMIN'][0]['twitter_link']; ?>" target="_blank"><i class="fa fa-twitter"></i> Twitter</a></li>
<li><a href="<?php echo $_SESSION['GET_ADMIN'][0]['instagram_link']; ?>" target="_blank"><i class="fa fa-instagram"></i> Instagram</a></li>
<!-- <li><a href="<?php echo $_SESSION['GET_ADMIN'][0]['google_plus_link']; ?>" target="_blank"><i class="fa fa-youtube"></i> You Tube</a></li> -->
<li><a href="<?php echo $_SESSION['GET_ADMIN'][0]['facebook_link']; ?>" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></li>
<!-- <li><a href="<?php echo $GET_ADMIN[0]['google_plus_link']; ?>"><i class="fa fa-google-plus"></i> Google+</a></li> -->
</ul>
</div>
<div class="single middle border">
<div class="footer-btm">
<ul>
<li><a href="<?php echo base_url('Home/cities_main/');?>">CITY</a></li>
<li><a href="<?php echo base_url('Home/full-event/');?>">EVENTS</a></li>
<li><a href="<?php echo base_url('Home/news/');?>">NEWS & BLOGS</a></li>
<li><a href="<?php echo base_url('Home/shop/');?>">SHOP</a></li>
<li><a href="<?php echo base_url('Home/our-story/');?>">OUR STORY</a></li>
</ul>
<div class="footer-logo">
<a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/web/');?>images/logo2.png" alt=""></a>
</div>
<p>© <?php echo date('Y'); ?> Club Mondain. All Rights Reserved.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</footer>
<!--Register Popup-->
<div class="modal fade" id="register-popup" role="dialog">
<div class="login-sec registration-form-select">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="heading">
<div class="top">
<h2> Registration <em> Form</em></h2>
</div>
</div>
<div class="clearfix"></div>
<div class="registration-form-sec">
<div class="reg-form" style="border:none; margin-bottom:0">
<div class="row">
<div class="col-sm-6">
<label>First Name<span style="color:#F00">*</span> <a class="tooltip-btn" data-original-title="Please Enter Your First Name"><i class="fa fa-info-circle"></i></a></label>
<input type="name" name="members_fname" id="members_fname" placeholder="First Name" value="<?php echo set_value('fname');?>" class="input-sec">
<?php echo form_error('fname');?> </div>
<div class="col-sm-6">
<label>Last Name<span style="color:#F00">*</span> <a class="tooltip-btn" data-original-title="Please Enter Your Last Name"><i class="fa fa-info-circle"></i></a></label>
<input type="name" name="members_lname" id="members_lname" placeholder="Last Name" value="<?php echo set_value('lname');?>" class="input-sec">
<?php echo form_error('lname');?> </div>
<div class="col-sm-6">
<label>Email Address<span style="color:#F00">*</span> <a class="tooltip-btn" data-original-title="Please Enter Your Email Address"><i class="fa fa-info-circle"></i></a></label>
<input type="email" name="members_email" id="members_email" placeholder="Email Address" value="<?php echo set_value('email');?>">
<?php /*?><i class="fa " id="user-email-check"></i><?php */?>
<?php echo form_error('email');?> </div>
<div class="col-sm-6">
<label>Phone Number <span style="color:#F00">*</span> <a class="tooltip-btn" data-original-title="Please use the following format: +31612345678"><i class="fa fa-info-circle"></i></a></label>
<input type="text" name="members_phone" id="members_phone_data" placeholder="Phone Number" onKeyUp="this.value=this.value.replace(/[^\d]/,'')">
<?php echo form_error('member_phone');?> </div>
<div class="col-sm-6">
<label>Password<span style="color:#F00">*</span> <a class="tooltip-btn" data-original-title="Please Create Your Password"><i class="fa fa-info-circle"></i></a></label>
<input type="password" name="members_password" id="members_password" placeholder="Password" value="<?php echo set_value('password');?>">
<?php echo form_error('password');?> </div>
<div class="col-sm-6">
<label>Confirm Password<span style="color:#F00">*</span> <a class="tooltip-btn" data-original-title="Please Confirm Your Password"><i class="fa fa-info-circle"></i></a></label>
<input type="password" name="passconf" id="members_passconf" placeholder="Confirm Password">
<?php echo form_error('passconf');?> </div>
</div>
<div class="reg-btn">
<button type="button" class="submit" onClick="Register();">Create Free Account</button>
<p>Already have an account ? <a id="login-btn">LOGIN</a></p>
<p><a href="<?php echo base_url('Home/privacy'); ?>" target="_blank">PRIVACY POLICY</a> &nbsp; <a href="<?php echo base_url('Home/membershp-rules'); ?>" target="_blank">MEMBERSHIP RULES</a></p>
</div>
</div>

<div class="login-form">
<div class="pop-head">
<p>or</p>
</div>
<div class="row">
<div class="col-sm-6">
<button type="button" class="facebook"><i class="fa fa-facebook"></i> <span>Continue with Facebook</span> </button>
<!-- <a href="<?php echo $authUrl; ?>" class="facebook">
<i class="fa fa-facebook"></i> 
<span>Continue with Facebook</span>  -->
</a>
</div>
<div class="col-sm-6">
<button type="button" class="google"><i class="fa fa-google-plus"></i> <span>Continue with Google</span> </button>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>



<!--Login Popup-->
<div class="modal fade" id="login-popup" role="dialog">
<div class="login-sec">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="login-form" style="border:none;">
<button type="button"  class="facebook"><i class="fa fa-facebook"></i> <span>Log in with Facebook</span></button>
<button type="button" class="google"><i class=""><img src="<?php echo base_url('assets/web/');?>icon/google_logo.png" alt=""></i> <span>Log in with Google</span></button>
<div class="pop-head">
<p>or</p>
</div>
</div>
<div class="login-form">
<h3>Login Form</h3>
<div class="input-sec"> <i class="fa fa-envelope-o"></i>
<input type="email" placeholder="Email Address" id="login-email" name="email" value="<?php set_value('email');?>">
</div>
<div class="input-sec"> <i class="fa fa-lock"></i>
<input type="password" placeholder="Password" name="password" id="login-password" value="<?php set_value('password');?>">
</div>
<div class="login-form-btm">
<!--<div class="check">
<input type="checkbox" id="remember">
<label for="remember">Remember Me</label>
</div>-->
<a id="forget-btn">Retrieve Password?</a> </div>
<button type="button" class="submit" onClick="return loginUserData();">Log in</button>
</div>
<div class="popup-btm">
<p>Dont have an account?</p>
<a id="register-btn">Sign Up</a> </div>
</div>
</div>

<!--Forget Password Popup-->
<div class="modal fade" id="forget-popup" role="dialog">
<div class="login-sec">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="login-form" style="border:none;"> </div>
<div class="login-form">
<h3>Retrieve Password</h3>
<?php
echo $this->session->flashdata('email_sent');
echo form_open('/Home/send_mail');
?>
<div class="input-sec"> <i class="fa fa-envelope-o"></i>
<input type="email" placeholder="Email Address" id="forgot_email" name="email" value="<?php set_value('email');?>">
</div>
<div class="login-form-btm">
<button type="submit" class="submit" onClick="return forgetemail_validation();">Send Mail</button>
</div>
<?php echo form_close();?> </div>
</div>
</div>
<!--Delete Feature Popup-->
<div class="modal fade" id="delete-feature-popup" role="dialog">
<div class="login-sec city-request">
<div class="city-request-form">
<h3>Delete This Feature?</h3>
<div class="row">
<div class="col-sm-10 col-centered">
<div class="row">
<div class="col-xs-6"> <a href="#" class="del-yes-btn">Yes</a> </div>
<div class="col-xs-6"> <a href="#" data-dismiss="modal" class="del-no-btn">No</a> </div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Not Login Popup-->
<div class="modal fade" id="no-login-popup" role="dialog">
<div class="login-sec city-request">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="city-request-form" id="not-login-pop">
<h3>You are Not Logged In.</h3>
<div class="row">
<div class="col-sm-10 col-centered">
<div class="row">
<div class="col-xs-6"> <a class="del-yes-btn" id="register-btn-pop">Register</a> </div>
<div class="col-xs-6"> <a data-dismiss="modal" class="del-no-btn" id="login-btn-pop">Login</a> </div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--Js-->
<script type="text/javascript" src="<?php echo base_url('assets/web/');?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/web/');?>js/jquery.flexisel.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/web/');?>js/script.js"></script>
<!--Bx Slider Js-->
<script type="text/javascript" src="<?php echo base_url('assets/web/');?>js/jquery.bxslider.min.js"></script>
<!-- SWEET ALERT -->
<script src="<?php echo base_url('assets/');?>js/alert.js"></script>
<script src="<?php echo base_url('assets/');?>js/sweetalert.js"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/sweetalert.css">
<script type="text/javascript">
$(document).ready(function() {
  $(".js-example-basic-single").select2({
	  placeholder: "Select Country",
	  });
});
$(document).ready(function() {
  $(".js-city-single").select2({
	  });
});
</script>
