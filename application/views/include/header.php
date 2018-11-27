<?php
$login_check = $this->session->userdata('user_login');
$login_details =  $this->session->userdata('user_details');
?>
<header>
<div class="container">
<div class="col-md-3">
<div class="row">
<div class="logo">
<a href="<?php echo base_url('Home');?>"><img src="<?php echo base_url('assets/web/');?>images/logo.png" alt=""></a>
</div>
</div>
</div>
<div class="col-md-9">
<div class="row">
<div class="header-right">
<?php if(isset($login_check)){?>
<div class="login-nav">
<p>Official site for Club Mondain ( Space for a healthy lifestyle )</p>
<ul>
<li>
<a href="<?php echo base_url('ShopingCart/index'); ?>" data-toggle="">
<i><img src="<?php echo base_url('assets/web/');?>icon/cart.png" alt="">
<span class="cart-cont"><?php echo count($this->cart->contents()); ?></span></i></a>
</li>
<li>
<a href="#profile-btn" data-toggle="collapse">
<i class="profile-btn">
<?php if(isset($login_check)){
if(!empty($login_details[0]['user_image'])){?>
<img src="<?php echo base_url('upload/profile/').$login_details[0]['user_image'];?>" alt="">
<?php }
else{ ?>
<img src="<?php echo base_url('upload/no_image/no-image.png');?>" alt="">
<?php }
}?>
</i>
<span class="name"><?php echo $_SESSION['user_details'][0]['first_name']; ?></span>
</a>
<ul class="drop-nav collapse" id="profile-btn">
<li><a href="<?php echo base_url('Main');?>">DASHBOARD</a></li>
<li><a href="<?php echo  base_url('Home/profile-view/').base64_encription($this->session->userdata('user_id'));?>">PROFILE</a></li>
<li><a href = "javascript:void(0);" onClick="LogOut();">LOGOUT</a></li>
</ul>
</li>
</ul>
</div>
<?php }
else {?>
<div class="login-nav before-login">
<p>Official site for Club Mondain ( Space for a healthy lifestyle )</p>
<ul>
<?php if(!$this->session->userdata('user_login')){?>
<li>
<a href="<?php echo base_url('ShopingCart/index'); ?>" data-toggle="">
<i><img src="<?php echo base_url('assets/web/');?>icon/cart.png" alt="">
<span class="cart-cont">
<?php echo count($this->cart->contents()); ?>
</span></i></a>
</li>
<li><a href="#register-popup" data-toggle="modal"><i><img src="<?php echo base_url('assets/web/');?>icon/key.png" alt=""></i> <span>Register</span></a></li>
<li><a href="#login-popup" data-toggle="modal"><i><img src="<?php echo base_url('assets/web/');?>icon/lock.png" alt=""></i> <span>Login</span></a></li>
<?php }
else {?>
<li><a href="<?php echo base_url('Main')?>" data-toggle="modal"><i><img src="<?php echo base_url('assets/web/');?>icon/key.png" alt=""></i><span>Dashboard</span></a></li>
<li><a href="javascript:void(0);" onClick="return LogOut('<?php echo base_url();?>');" data-toggle="modal"><i><img src="<?php echo base_url('assets/web/');?>icon/lock.png" alt=""></i> <span>Logout</span></a></li>
<?php } ?>
</ul>
</div>
<?php }?>
<div class="menu">
<nav>
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
<i class="fa fa-bars"></i>
</button>
</div>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav">
<li><a href="<?php echo base_url('Home/our-story/');?>">OUR STORY</a></li>
<li><a href="<?php echo base_url('Home/cities-main/');?>">CITY</a></li>
<li><a href="<?php echo base_url('Home/full-event/');?>">Events & Spaces</a></li>
<li><a href="<?php echo base_url('Home/news/');?>">NEWS</a></li>
<li><a href="<?php echo base_url('Home/shop/');?>">SHOP</a></li>
</ul>
</div>
</nav>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>
</div>
</header>
<!--<div class="beat-verson"><img src="<?php// echo base_url()?>/assets/beat-version.png" style="width:110px"></div>-->
