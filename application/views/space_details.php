<?php



   include('include/head.php'); ?>
<body>
   <?php include('include/header.php');?>
   <main>
      <?php /*foreach($details_store as $header_business){*/?>
      
      <section class="page-banner">
		<div class="image">
		<?php if($all_data[0]['business_banner_image']!=''){?>
		<img class="slide-img" src="<?php echo base_url('upload/business/').$all_data[0]['business_banner_image'];?>">
		<?php }else{?>
		<img src="<?php echo base_url('assets/web/images/')?>bg-3.jpg" alt="">
		<?php }?>
		</div>
		<div class="content">
		<h3><?php echo ucwords($all_data[0]['business_name']);?></h3>
		<br>
		<p><?php echo ucwords($all_data[0]['business_street']);?></p>
		</div>
		<div class="overlay"></div>
		</section>
      <?php /*}*/?>
      
       
      
      
      <div class="container-fluid max-1240">
         <div class=" full-content">
            
            
            
            <div class="page-content">
               <div class="page-inner-content">
                  <div class="page-tab-links golden">
                     <ul>
                        <li class="active">
                           <a data-toggle="tab" href="#about">About Us</a>
                        </li>
                      
                        <li><a href="<?php echo base_url();?>Home/energiser-listing/<?php echo base64_encode($all_data[0]['business_id']);?>">Energizer</a></li>
                        
                     </ul>
                  </div>
                  <div class="tab-content">
                  
                     <div id="about" class="tab-pane fade  in active">
                        <div class="page-slider">
							<ul class="bx-slider">
							<li>
							<div class="image">
							<?php if(!empty($all_data[0]['business_banner_image'])){?>
							<img class="slide-img" src="<?php echo base_url('upload/business/').$all_data[0]['business_banner_image'];?>">
							<?php }
							else{?>
							<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
							<?php }?>
							</div>
							</li>
							</ul>
							</div>
                        
                        <div class="page-details">
                           <div class="owner-det">
                              <div class="image">
									<img src="<?php echo base_url('upload/profile/').'/1525771739_logo.jpg';?>">
									</div>
                              <?php
                              $body_business['user_id'] = 0;
                                 if($body_business['user_id'] != 1){
                                 $text = base_url('Home/profile-view/').base64_encription($body_business['user_id']);
                                 }else{
                                 $text  = 'javascript:void(0)';
                                 }
                                 ?>
                              <p> <a href="#">
                                 <?php echo $all_data[0]['business_name'];?>
                                 </a>
                                <?php echo getCityname($all_data[0]['city_id']).'&nbsp;,&nbsp;'. getCountryname($all_data[0]['country_id']);?>
                              </p>
                           </div>
                           <h3>Description</h3>
                           <p><?php echo $all_data[0]['business_description'];?></p>
                        </div>
                        <div class="page-details">
                           <h3>Category</h3>
                         	 <div class="content">
                              <p><?php echo get_category_name($all_data[0]['business_id']);?></p>
                           </div>
                        </div>
                        <div class="page-details">
                           <h3>Contact</h3>
                           <div class="content">
                              <p><strong>Address </strong> : <?php echo $all_data[0]['business_street'];?></p>
                              <p><strong>Website </strong> : <a href="<?php echo $all_data[0]['business_website_url'];?>" target="_blank" style="color:#0775f5">Go To Website</a></p>
                              <p><strong>Location </strong> : <?php echo getCityname($all_data[0]['city_id']).'&nbsp;,&nbsp;'. getCountryname($all_data[0]['country_id']);?></p>
                           </div>
                        </div>
                        
                        
                        <?php if(isset($opening_hour) && !empty($opening_hour)){ ?>
                        <div class="page-details">
                           <h3>Opening Hours</h3>
                           <?php
                              $i = 1;
                              foreach($opening_hour as $opening_hour){
                              if($i <= 7){	
                              $opening_hour_from_arr = explode('-',$opening_hour['opening_hour_from']);
                              $opening_hour_to_arr = explode('-',$opening_hour['opening_hour_to']);?>
                           <div class="content">
                              <p><strong><?php echo $opening_hour['opening_hour_day'];?> </strong> : &nbsp;
                                 <?php if($opening_hour['opening_hour_close'] == 0){
                                    if($opening_hour['opening_hour_from'] == 0 && $opening_hour['opening_hour_to'] == 0){
                                    echo '<strong>Not Mentioned</strong>';
                                    }
                                    else{
                                    echo $opening_hour_from_arr[0].'.'.$opening_hour_from_arr[1].'.'.$opening_hour_from_arr[2]. '&nbsp; to &nbsp;'.$opening_hour_to_arr[0].'.'.$opening_hour_to_arr[1].'.'.$opening_hour_to_arr[2];}?>
                              </p>
                              <?php  
                                 }else{?>
                              <strong style="color:#F00">Closed</strong>
                              <?php  }?>
                           </div>
                           <?php 
                              }
                              $i++;
                              }?>
                        </div>
                        <?php } ?>
                     </div>
                   
                     <div id="events" class="tab-pane fade"> </div>
                  </div>
               </div>
            </div>
           
           
         </div>
      </div>
   </main>
   <?php include('include/footer.php');?>
   <!--Login Popup-->
   <div class="modal fade" id="my-company" role="dialog">
      <div class="login-sec">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="login-form">
            <h3>My Company</h3>
            <div class="input-sec">
               <input type="text" placeholder="Name" id="user_name_xpx" name="user_name" value="">
            </div>
            <div class="input-sec">
               <input type="email" placeholder="Email Address" id="user_email_xpx" name="user_email" value="">
            </div>
            <div class="input-sec">
               <input type="number" placeholder="Phone No" id="user_ph_xpx" name="user_ph" value="">
            </div>
            <button type="button" class="submit" onClick="getCompanyMail('<?php echo $details_store[0]['business_id']; ?>')">Send</button>
         </div>
      </div>
   </div>
   <script>
      function getCompanyMail(e)
      {
        var user_name_xpx = $("#user_name_xpx").val();
        var user_email_xpx = $("#user_email_xpx").val();
        var user_ph_xpx = $("#user_ph_xpx").val();
      
        var atpos = user_email_xpx.indexOf("@");
        var dotpos = user_email_xpx.lastIndexOf(".");
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=user_email_xpx.length) {
              alert("Not a valid e-mail address");
              return false;
        }else{
      
      	if (isNaN(user_ph_xpx) || user_ph_xpx < 1) {
              alert("Not a valid number");
              return false;
          } else {
             
          $.ajax({
      	url: "<?php echo base_url('Home/getMe'); ?>",
      	type: "POST",
      	dataType: "html",
      	data: {
      	id: e,
      	user_name_xpx: user_name_xpx,
      	user_email_xpx:user_email_xpx,
      	user_ph_xpx:user_ph_xpx,
      	business_name:'<?php echo $details_store[0]['business_name']; ?>'
      	},
      	success: function(x) {
      	alert(x);
      	}
      	});
      
          }
      
        }
      
      	
      }
   </script>
   <script type="text/javascript">
      function shareFb(Url_data)
      {
        window.open('http://www.facebook.com/sharer/sharer.php?u='+Url_data+'', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');
      }
   </script>
   
  
   
   
</body>
</html>