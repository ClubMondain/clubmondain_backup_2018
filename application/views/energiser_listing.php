<?php
   $this->load->view('include/head');?>
<body>
   <?php
      $this->load->view('include/header');?>
   <main>
      <section class="page-banner events">
         <div class="image">
            <?php if(!empty($allClass[0]['trainer_class_event_image'])){?>
            <img src="<?php echo base_url('upload/events/').$allClass[0]['trainer_class_event_image'];?>" alt="">
            <?php }
               else{?>
            <img src="<?php echo base_url('assets/web/');?>/images/bg-5.jpg" alt="">
            <?php }?>
         </div>
         <div class="content">
            <h3><?php if(!empty($userEvent[0]['event_user_details'])) { echo ucwords($userEvent[0]['event_user_details']); } ?></h3>
            <?php if(!empty($allClass[0]['trainer_class_address_details'])){?>
            <p><?php echo ucwords($allClass[0]['trainer_class_address_details'].'&nbsp;,&nbsp;').date('dS m Y');?></p>
            <?php }?>
         </div>
         <div class="overlay"></div>
      </section>
      <div class="container-fluid max-1240">
         <div class="full-content">
            <div class="page-content">
               <div class="page-inner-content">
                  <?php if(count($all_data)>0){?>
                  <div class="all-trainer-classes">
                     <div class="row">
                        <?php foreach($all_data as $val){?>
                        <div class="col-lg-4 col-sm-6">
                           <div class="single">
                              <div class="image">
                                 <?php if($val['trainer_class_image']){?>
                                 <img src="<?php echo base_url('upload/class/').$val['trainer_class_image']?>">
                                 <?php }
                                    else{?>
                                 <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                                 <?php }?>
                              </div>
                              <div class="content">
                                 <h4><?php echo $val['trainer_class_name'];?></h4>
                                 <p class="location"><?php echo getCityname($val['city_id']).'&nbsp;,&nbsp;'. getCountryname($val['country_id']);?></p>
                                 
                                  <div class="join-btn"> <a href="<?php echo base_url(); ?>Energiser/verify-energizer-code/<?php echo  $space_id; ?>/<?php echo  $val['trainer_class_id']; ?>/<?php echo $user_id;?>/<?php echo $user_mail;?>/<?php echo $csv_id;?>">Book this Energizer</a> </div>
                                 
                              </div>
                           </div>
                        </div>
                        <?php }?>
                     </div>
                  </div>
                  <?php }
                     else{?>
                  <div class="no_data">
                     <h2>No Energiser Available</h2>
                  </div>
                  <?php }?>
               </div>
            </div>
            <!--<div class="sidebar">
               <aside class="single-sidebar">
                  <h3>Other Events</h3>
                  <?php $userEvent = ''; ?>
                  <div class="content">
                     <div class="sidebar-items s-cont">
                        <?php if($userEvent > 0){
                           for($i=0;$i< count($userEvent);$i++){?>
                        <a href="<?php echo base_url('Home/event-details/').base64_encription($userEvent[$i]['event_id']);?>" class="single s-sec">
                           <div class="image">
                              <?php if($userEvent[$i]['event_banner'] != ''){?>
                              <img src="<?php echo base_url('upload/events/').$userEvent[$i]['event_banner'];?>">
                              <?php }
                                 else{?>
                              <img src="<?php echo base_url('upload/no_image/').'no-photo-available.jpg';?>">
                              <?php }?>
                           </div>
                           <p>
                              <?php echo substr(ucwords($userEvent[$i]['event_name']),0,28);?><br>
                              <small><?php echo date('dS M Y',strtotime($userEvent[$i]['event_date_from']));?></small>
                           </p>
                        </a>
                        <?php
                           }} else{
                           ?>
                        <h2 style="text-align:center">No Events Are Available</h2>
                        <?php
                           }
                           ?>
                     </div>
                  </div>
               </aside>
               <aside class="single-sidebar">
                  <h3>Same Category Events</h3>
                  <?php  $categoryEvent =''; ?>
                  <div class="content">
                     <div class="sidebar-items s-cont">
                        <?php if($categoryEvent > 0){
                           for($i=0;$i< count($categoryEvent);$i++){?>
                        <a href="<?php echo base_url('Home/event-details/').base64_encription($categoryEvent[$i]['event_id']);?>" class="single s-sec">
                           <div class="image">
                              <?php if($categoryEvent[$i]['event_banner'] != ''){?>
                              <img src="<?php echo base_url('upload/events/').$categoryEvent[$i]['event_banner'];?>">
                              <?php }
                                 else{?>
                              <img src="<?php echo base_url('upload/no_image/').'no-photo-available.jpg';?>">
                              <?php }?>
                           </div>
                           <p>
                              <?php echo substr(ucwords($categoryEvent[$i]['event_name']),0,28);?><br>
                              <small><?php echo date('dS M Y',strtotime($categoryEvent[$i]['event_date_from']));?></small>
                           </p>
                        </a>
                        <?php
                           }}else{
                           ?>
                        <h2 style="text-align:center">No Events Are Available</h2>
                        <?php
                           }
                           ?>
                     </div>
                  </div>
               </aside>
               <aside class="single-sidebar">
                  <h3>News</h3>
                  <?php $recent_news=''; ?>
                  <div class="content">
                     <div class="sidebar-items s-cont">
                        <?php if($recent_news > 0){
                           for($i=0;$i< count($recent_news);$i++){?>
                        <a href="#" class="single s-sec">
                           <div class="image">
                              <?php if($recent_news[$i]['blog_news_image'] != ''){?>
                              <img src="<?php echo base_url('upload/news_blog/').$recent_news[$i]['blog_news_image'];?>">
                              <?php }else{ ?>
                              <img src="<?php echo base_url('upload/no_image/').'no-photo-available.jpg';?>">
                              <?php }?>
                           </div>
                           <p>
                              <?php echo substr(ucwords($recent_news[$i]['blog_news_title']),0,28);?><br>
                              <small><?php echo date('dS M Y',strtotime($recent_news[$i]['update_date']));?></small>
                           </p>
                        </a>
                        <?php
                           }}else{
                           ?>
                        <h2 style="text-align:center">No News Are Available</h2>
                        <?php }?>
                     </div>
                  </div>
               </aside>
            </div>-->
         </div>
      </div>
   </main>
   <?php $this->load->view('include/footer');?>
</body>
</html>