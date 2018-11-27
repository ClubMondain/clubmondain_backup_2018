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
                                 
                                  <div class="join-btn"> <a href="<?php echo base_url(); ?>Home/energiser_details/<?php echo  $val['trainer_class_id']; ?>">Details</a> </div>
                                 
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
                 </div>
      </div>
   </main>
   <?php $this->load->view('include/footer');?>
</body>
</html>