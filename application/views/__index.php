<?php include('include/head.php');?>
<body>
<?php include('include/header.php');?>
<?php
$GET_BANNER_PICTURE = get_banner(4);
?>
<main>
  <section class="banner">
    <div class="banner-img"> 
    
    <?php
    if(count($GET_BANNER_PICTURE) > 0){
    if(count($GET_BANNER_PICTURE[0]) > 0){
    ?>
    <img src="<?php echo base_url('upload/banner/'.$GET_BANNER_PICTURE[0]['banner_image']);?>" alt="">
    <?php  
    }else{
    ?>
    <img src="<?php echo base_url('assets/web/');?>images/banner.jpg" alt="">
    <?php  
    }
    }else{
    ?>
    <img src="<?php echo base_url('assets/web/');?>images/banner.jpg" alt="">
    <?php  
    }
    ?>
     
    </div>
    <div class="other-reg-button">
      <ul>
        <li><a href="<?php echo base_url('Home/personal_trainer_reg/');?>">I AM A PERSONAL TRAINER</a></li>
        <li><a href="<?php echo base_url('Home/company_reg');?>" class="bg-grn">HEALTHY COMPANY? CLICK HERE</a></li>
      </ul>
    </div>
    <div class="banner-cntnt">
      <h3><?php echo $content[0]['page_description'];?></h3>
      <p><?php echo  $content[1]['page_description'];?></p>
      <div class="search">
        <form action="search.html" method="post" class="form">
          <input type="text" name="serach_query" id="tags" placeholder="Type your Destination here">
          <button><i class="fa fa-search"></i></button>
        </form>
      </div>
      <div class="members-cntnt all-members" style="position:static; transform:none; margin-top:20px;">
        <ul class="members">
        <?php
		 if(count($user_details) > 0){
		 foreach($user_details as $user_details_user_details){
	     ?>
        <li>
        <a href="javascript:void(0)">
        <div class="image">
         <?php if($user_details_user_details['user_image'] != ''){?>
                <img src="<?php echo base_url('upload/profile/').$user_details_user_details['user_image'];?>">
                <?php }else{  ?>
                <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                <?php }?>
        </div>
        <p><?php echo $user_details_user_details['first_name'];?></p>
        </a>
        </li>
        <?php
		 }
		 }
		?>
        </ul>
        <?php if(!isset($_SESSION['user_login'])){ ?>
        <div class="golden-btn transperant-btn"> <a href="#register-popup" data-toggle="modal">Join now</a> </div>
        <?php } ?>
      </div>
    </div>
    <div class="overlay"></div>
  </section>
  <section class="all-focus">
    <div class="heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-centered">
            <div class="top">
              <h2><?php echo $content[2]['page_description'];?> <em> 
              <?php echo $content[3]['page_description'];?></em></h2>
            </div>
            <p><?php echo $content[4]['page_description'];?> </p>
          </div>
        </div>
      </div>
    </div>
    <div class="focus-carousal">
    <?php if(isset($category_details) && !empty($category_details) && count($category_details)>5){?>
      <ul id="flexiselDemo3">
      <?php foreach($category_details as $category_details){?>
        <li>
            <a href="<?php echo base_url('Home/specific-category-event/').base64_encription($category_details['category_id']);?>">
              <div class="focus-image">
              <?php if(!empty($category_details["category_image"])){?>
               <img src="<?php echo base_url('upload/category/').$category_details["category_image"];?>" alt="">
               <?php } 
               else{?> 
                    <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
             <?php }?>
                <p><?php echo $category_details['category_name']?></p>
              </div>
            </a>  
        </li>
       <?php } ?>
      </ul>
      <?php }?>
    </div>
  </section>
  <!-- section class="featured">
    <div class="container">
      <div class="row">
        <div class="col-lg-11 col-centered">
          <h2> <?php echo strip_tags($content[5]['page_description'],'<em>');?></h2>
          <div class="items">
            <div class="row">
              <div class="col-md-6">
                <a href="<?php echo base_url('Home/event-details/').base64_encription($event_details[0]['event_id']);?>">               <div class="single large"> 
                  <?php if(!empty($event_details[0]['event_banner'])){?>
                  <img src="<?php echo base_url('upload/events/').$event_details[0]['event_banner'];?>" alt="">
                    <?php }
               else{?>
               <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
               <?php }?>
                    
                  
                        <div class="cntnt">
                            <h3><?php echo $event_details[0]['event_name'];?></h3>
                            <p><?php echo date('dS M Y',strtotime($event_details[0]['event_date_from']));?></p>
                          </div>
                </div>
                </a>
                <div class="row">
                <?php for($i=0;$i<2;$i++){?>
                  <div class="col-sm-6">
                  <a href="<?php echo base_url('Home/store-details/').base64_encription($store_details[$i]['business_id']);?>">
                    <div class="single small"> 
                      <?php if(!empty($store_details[$i]['business_banner_image'])){?>
                        <img src="<?php echo base_url('upload/business/').$store_details[0]['business_banner_image'];?>" alt="">
                        <?php }
                           else{?>
                           <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                           <?php }?>
                      
                      <div class="cntnt left">
                        <h3><?php echo $store_details[$i]['business_name']?></h3>
                        <p><?php echo date('dS M Y',strtotime($store_details[$i]['create_date']));?></p>
                      </div>
                    </div>
                  </a>  
                  </div>
                 <?php }?> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                 <?php for($i=2;$i<4;$i++){?>
                  <div class="col-sm-6">
                  <a href="<?php echo base_url('Home/store-details/').base64_encription($store_details[$i]['business_id']);?>">
                    <div class="single small"> 
                      <?php if(!empty($store_details[$i]['business_banner_image'])){?>
                        <img src="<?php echo base_url('upload/business/').$store_details[0]['business_banner_image'];?>" alt="">
                        <?php }
                           else{?>
                           <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                           <?php }?>
                      <div class="cntnt left">
                        <h3><?php echo $store_details[$i]['business_name']?></h3>
                        <p><?php echo date('dS M Y',strtotime($store_details[$i]['create_date']));?></p>
                      </div>
                    </div>
                  </a>  
                  </div>
                 <?php }?> 
                </div>
                <a href="<?php echo base_url('Home/event-details/').base64_encription($event_details[1]['event_id']);?>">
                    <div class="single large"> 
                  <?php if(!empty($event_details[1]['event_banner'])){?>
                  <img src="<?php echo base_url('upload/events/').$event_details[1]['event_banner'];?>" alt="">
                    <?php }
               else{?>
               <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
               <?php }?>
                        <div class="cntnt">
                    <h3><?php echo $event_details[1]['event_name'];?></h3>
                    <p><?php echo date('dS M Y',strtotime($event_details[1]['event_date_from']));?></p>
                  </div>
                </div>
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
               <a href="<?php echo base_url('Home/event-details/').base64_encription($event_details[2]['event_id']);?>">
                <div class="single large"> 
                  <?php if(!empty($event_details[2]['event_banner'])){?>
                  <img src="<?php echo base_url('upload/events/').$event_details[2]['event_banner'];?>" alt="">
                    <?php }
               else{?>
               <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
               <?php }?>
                        <div class="cntnt">
                    <h3><?php echo $event_details[2]['event_name'];?></h3>
                    <p><?php echo date('dS M Y',strtotime($event_details[2]['event_date_from']));?></p>
                  </div>
                </div>
               </a> 
              </div>
              
              <?php for($i=4;$i<8;$i++){?>
                  <div class="col-sm-6">
                  <a href="<?php echo base_url('Home/store-details/').base64_encription($store_details[$i]['business_id']);?>">
                    <div class="single small"> 
                      <?php if(!empty($store_details[$i]['business_banner_image'])){?>
                        <img src="<?php echo base_url('upload/business/').$store_details[0]['business_banner_image'];?>" alt="">
                        <?php }
                           else{?>
                           <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                           <?php }?>
                      <div class="cntnt left">
                        <h3><?php echo $store_details[$i]['business_name']?></h3>
                        <p><?php echo date('dS M Y',strtotime($store_details[$i]['create_date']));?></p>
                      </div>
                    </div>
                    </a>
                  </div>
                 <?php }?> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
</main>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php include('include/footer.php');?>
<script>
  $( function() {
    var availableTags = [
	<?php
	if(count($cd) > 0){
	foreach($cd as $ck){
	?>
    "<?php echo $ck['city_name']; ?>",
	<?php
	}
	}
	?>  
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
</body>
</html>
