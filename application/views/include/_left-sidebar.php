<aside class="dashboard-sidebar">
<?php $full_profile = $this->session->userdata('user_details');?>
<?php if($this->session->userdata('user_login')!=''){ ?>
<div class="sidebar-profile">
<?php if($this->session->userdata('user_type')== 'T'){?>
<h4 style="color:#fff; text-align: center;"><?php echo ucwords($full_profile[0]['first_name']).'&nbsp;&nbsp;'.ucwords($full_profile[0]['last_name']);?></h4>
<?php } ?>
<?php if($this->session->userdata('user_type')== 'M'){?>
<h4 style="color:#fff; text-align: center;"><?php echo ucwords($full_profile[0]['first_name']).'&nbsp;&nbsp;'.ucwords($full_profile[0]['last_name']);?></h4>
<?php } ?>
<?php if($this->session->userdata('user_type')== 'C'){?>
<h4 style="color:#fff; text-align: center;"><?php echo ucwords($full_profile[0]['company_name']);?></h4>
<?php } ?>
<div class="image">
<?php if(count($full_profile) > 0){ if(!empty($full_profile[0]['user_image'])){ ?>
<img src="<?php echo base_url('upload/profile/').$full_profile[0]['user_image'];?>">
<?php }else{ ?>
<img src="<?php echo base_url('upload/no_image/');?>no-image.png">
<?php }?>
</div>
<?php if($this->session->userdata('user_type')== 'C'){?>
<h3 style="text-align: center;">Company</h3>
<!-- <h3><?php echo ucwords($full_profile[0]['company_name']);?></h3> -->
<!-- <h3> <?php echo ucwords($full_profile[0]['company_person']);?></h3> -->
<?php }else if($this->session->userdata('user_type')== 'M'){ ?>
<h3 style="text-align: center;">Business Traveller</h3>
<?php }else{ ?>
<h3 style="text-align: center;">Trainers</h3>
<?php } ?>
<?php if(isset($full_profile[0]['city']) && !empty($full_profile[0]['city'])){?>
<p><?php echo $full_profile[0]['city'].' , '.$full_profile[0]['country'];?></p>
<?php } ?>
<?php if(isset($full_profile[0]['phone']) && !empty($full_profile[0]['phone'])){?>
<!-- <p><?php echo $full_profile[0]['phone'];?></p> -->
<?php }?>
<?php if(isset($full_profile[0]['email'])&& !empty($full_profile[0]['email'])){?>
<!-- <p><?php echo $full_profile[0]['email'];?></p> -->
<?php }else{ ?>
<p>Mail :No Email</p>
<?php }?>
<?php if(!empty($this->session->userdata('count_event'))){?>
<p style="text-align: center;">No of Events : <?php echo $this->session->userdata('count_event');?></p>
<?php }else{ ?>
<p style="text-align: center;">No of Events : 0</p>
<?php } ?>
<p style="text-align: center;">No of Meetups : <?php echo get_meet_up_count($full_profile[0]['user_id']); ?></p>
<?php }?>
</div>
<ul class="sidebar-nav">
<li><a href="<?php echo base_url('Main');?>">Dashboard</a></li>
<li><a href="<?php echo base_url('Main/my-favourites');?>">My Favorite</a></li>
<li><a href="">My Meet Up</a></li>
<li><a href="">My Space</a></li>
<?php if($_SESSION['user_membership_type'] != 'FREE'){ ?>
<li><a href="">My Events</a></li>
<li><a href="">My News</a></li>
<?php if($this->session->userdata('user_type')== 'T'){?>
<!-- <li><a href="<?php echo base_url('Main/list-class-view');?>">My Clases</a></li> -->
<?php } ?>
<li><a href="<?php echo base_url('shop/list-product-view');?>">Products</a></li>
<?php } ?>
<li><a href="<?php echo base_url('Main/my-purchase');?>">Purchase Product</a></li>
<li><a href="<?php echo base_url('Main/my-payment');?>">Payment</a></li>
<li><a href="<?php echo  base_url('Main/membership-update/'.base64_encription($full_profile[0]['membership_id']));?>">My Membership</a></li>
<?php if($this->session->userdata('user_type')== 'T'){?>
<li><a href="<?php echo base_url('TrainerDashboard/edit-Profile/');?>">Profile Update</a></li>
<?php }
if($this->session->userdata('user_type')== 'M'){?>
<li><a href="">Profile Update</a></li>
<?php }
if($this->session->userdata('user_type')== 'C'){?>
<li><a href="">Profile Update</a></li>
<?php }?>
<li><a href="<?php echo base_url('main/change-password');?>">Change Password</a></li>
<li><a href="javascript:void(0);" onClick="return LogOut('<?php echo base_url('Main/logOut'); ?>');">Log Out</a></li>
</ul>
<?php } ?>
</aside>
