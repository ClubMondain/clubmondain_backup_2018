<?php include('include/head.php');?>
<body>
<?php include('include/header.php');?>
<main>
  <section class="page-banner">
    <div class="image"> <img src="<?php echo base_url('assets/web');?>/images/bb4.png" alt=""> </div>
    <div class="content"> 
      <!--<p>INFORMATION REGADING US</p>-->
      <h3><?php echo strip_tags($content[3]['page_title'],'<em>');?></h3>
    </div>
    <div class="overlay"></div>
  </section>
  <section class="about-us">
    <div class="container">
      <div class="content">
        <h3><?php echo strip_tags($content[0]['page_title'],'<em>');?></em></h3>
      </div>
      <div class="row">
      <div class="col-md-4">
          <div class="image"> <img src="<?php echo base_url('assets/web');?>/images/about.jpg"> </div>
        </div>
        <div class="col-md-8">
          <div class="content">
            <p><?php echo ($content[0]['page_description']);?></p>
          </div>
        </div>
        
      </div>
    </div>
  </section>
  <?php /*?><section class="join-members">
    <div class="members-cntnt all-members">
      <h3> <?php echo strip_tags($content[1]['page_description'],'<em>');?><br>
        <small><em><?php echo strip_tags($content[2]['page_description'],'<em>');?></em></small> </h3>
      <h4>JUST JOINED</h4>
      <ul class="members">
        <li><a href="#">
          <div class="image"><img src="<?php echo base_url('assets/web');?>/images/user1.jpg" alt=""></div>
          <p>Rose Appleased <br>
            <small>( London )</small> </p>
          </a></li>
        <li><a href="#">
          <div class="image"><img src="<?php echo base_url('assets/web');?>/images/user2.jpg" alt=""></div>
          <p>Steve Appleased <br>
            <small>( London )</small> </p>
          </a></li>
        <li><a href="#">
          <div class="image"><img src="<?php echo base_url('assets/web');?>/images/user1.jpg" alt=""></div>
          <p>Rose Appleased <br>
            <small>( London )</small> </p>
          </a></li>
        <li><a href="#">
          <div class="image"><img src="<?php echo base_url('assets/web');?>/images/user2.jpg" alt=""></div>
          <p>Steve Appleased <br>
            <small>( London )</small> </p>
          </a></li>
        <li><a href="#">
          <div class="image"><img src="<?php echo base_url('assets/web');?>/images/user1.jpg" alt=""></div>
          <p>Rose Appleased <br>
            <small>( London )</small> </p>
          </a></li>
      </ul>
      <div class="golden-btn"> <a href="#register-popup" data-toggle="modal">Join now</a> </div>
    </div>
  </section><?php */?>
  <section class="contact-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-11 col-centered">
          <h3>Contact <em>Information</em></h3>
          <ul>
            <li>
              <p><strong>Address : </strong> <span><?php echo $admin_details[0]['address'];?></span></p>
            </li>
            <li>
              <p><strong>Email : </strong> <span><?php echo $admin_details[0]['site_email'];?> </span></p>
            </li>
            <!-- <li>
              <p><strong>Phone : </strong> <span> <?php echo $admin_details[0]['phone_no'];?></span></p>
            </li> -->
          </ul>
        </div>
      </div>
    </div>
  </section>
</main>
<?php include('include/footer.php')?>
</body>
</html>
