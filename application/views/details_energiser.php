<?php
$this->load->view('include/head');?>
<meta property="og:title" content="<?php echo ucwords($all_data[0]['trainer_class_name']);?>" />
<meta property="og:type" content="Trainer.class" />
<meta property="og:description" content="<?php echo $all_data[0]['trainer_class_description'];?>" />
<meta property="og:url" content="<?php echo base_url('Home/trainer-details-classes/').base64_encription($all_data[0]['trainer_class_id']);?>" />
<?php if(!empty($all_data[0]['trainer_class_event_image'])){?>
<meta property="og:image" content="<?php echo base_url('upload/events/').$all_data[0]['trainer_class_event_image'];?>" />
<?php }else{?>
<meta property="og:image" content="<?php echo base_url('assets/web/');?>/images/bg-12.jpg" />
<?php }?>

<body>
<?php $this->load->view('include/header');?>
<main>
  <section class="page-banner events">
    <div class="image">
      <?php if(!empty($all_data[0]['trainer_class_event_image'])){?>
      <img src="<?php echo base_url('upload/events/').$all_data[0]['trainer_class_event_image'];?>" alt="">
      <?php }
			else{?>
      <img src="<?php echo base_url('assets/web');?>/images/eb.jpg" alt="">
      <?php }?>
    </div>
    <div class="content">
      <h3><?php echo ucwords($all_data[0]['trainer_class_name']);?></h3>
      <?php if(!empty($all_data[0]['trainer_class_address'])){ ?>
        <p><?php echo $all_data[0]['trainer_class_address'];?></p>
      <?php } ?>  
    </div>
    <div class="overlay"></div>
  </section>
  
  
  <div class="container-fluid max-1240">
    <div class="full-content">
      <div class="page-content">
      
      
     <?php if($this->session->flashdata('success_msg') !=''){ ?> 
  	<div class="<?php echo $this->session->flashdata('msg_class');?>" style="font-size: 16px;">
 	 <?php echo $this->session->flashdata('success_msg');?>
	</div>
	<?php } ?>
      
        <div class="page-inner-content">
          <div class="page-tab-links">
         
            <ul>
              <li class="active"><a data-toggle="tab" href="#about">About Energizer</a></li>
             <li><a  href="<?php echo base_url();?>Home/invite_space_details/<?php echo base64_encode(getInviteSpaceId($all_data[0]['trainer_class_id'])) ?>">Back to Space</a></li> 
            </ul>
          </div>
          <div class="tab-content">
            <div id="about" class="tab-pane fade in active">
              <div class="page-slider">
                <ul class="bx-slider">
                  <li>
                    <div class="image">
                      <?php if(!empty($all_data[0]['trainer_class_image'])){?>
                      <img src="<?php echo base_url('upload/class/').$all_data[0]['trainer_class_image'];?>" alt="">
                      <?php }
                                        else{?>
                      <img class="slide-img" src="<?php echo base_url('assets/web');?>/images/bg-11.jpg">
                      <?php }?>
                    </div>
                  </li>
                </ul>
              </div>
              
              
              
            <div class="page-share">
			<?php 			
				if(getCheckEnergiserJoinedOrNot($this->session->userdata('user_id'),$all_data[0]['trainer_class_id'])  == 1)
	              {
	            	?>
	              	<a  href="<?php echo base_url('Home/remove_energizer');?>/<?php echo $this->session->userdata('user_id');?>/<?php echo  $all_data[0]['trainer_class_id'];?>"> <button type="button" class="btn btn-danger">Remove this Energizer</button></a>          <?php
	              }
				else
				{
					$user_mail= getUserDetails($this->session->userdata('user_id'));
					$user_exist_tocsv = getUserexistToCSV(getInviteSpaceId($all_data[0]['trainer_class_id']),$user_mail['email']);
					
					if($all_data[0]['trainer_class_type'] == 'Free')
					{
					?>
						<?php
						if(!empty($this->session->userdata('user_id')))
						{
							?>
						<button type="button" class="favourite join_<?php echo $all_data[0]['trainer_class_id']?>" 
						  onClick="window.location.href='<?php echo base_url('Home/join_energizer_withfree/'.$this->session->userdata('user_id').'/'.$all_data[0]['trainer_class_id']); ?>'">Join this Energizer</button>
						  
						  <?php
						}
						else
						{
							?>
							<button type="button" href="#no-login-popup" data-toggle="modal"> Join This Energizer? </button>
							<?php
						}
						?>
						
					<?php	
					}					
					if($all_data[0]['trainer_class_type'] == 'Paid')
					{
					?>
						<div class="select" style="max-width:140px; height:40px; float: left;">
						<select>
						<option>Paypal</option>
						</select>
						</div>
						
						<?php
						if(!empty($this->session->userdata('user_id')))
						{
						?>
						<button type="button" class="favourite join_<?php echo $all_data[0]['trainer_class_id']?>" 
						  onClick="window.location.href='<?php echo base_url('Home/join_energizer_withpay/'.$all_data[0]['trainer_class_id']); ?>'">Join this Energizer</button>
						<?php
						}
						else
						{
							?>
							<button type="button" href="#no-login-popup" data-toggle="modal" style="margin-left: 10px;"> Join This Energizer? </button>
							<?php
						}
							
					}
					
				}
			?>


			  <ul class="social">
			  
			      <li><a href="https://www.linkedin.com/cws/share?url=<?php echo base_url('Home/energiser-details/').$all_data[0]['trainer_class_id'];?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
			      
                  <li><a  href="javascript:void(0)" onclick="shareFb('<?php echo base_url('Home/energiser-details/').$all_data[0]['trainer_class_id'];?>')"><i class="fa fa-facebook"></i></a></li>
                  
                  <li><a href="https://twitter.com/intent/tweet?text=<?php echo base_url('Home/energiser-details/').$all_data[0]['trainer_class_id'];?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
              
                </ul>


              </div>
              
              <div class="page-details">
                <div class="owner-det">
                  <div class="image">
                                       
                  <!--<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">-->
                  
                  
                  <img src="<?php echo base_url().'upload/profile/1525771739_logo.jpg';?>" alt="">
                  
                  </div>
                 
                  <p> <a href="#"><?php echo $all_data[0]['trainer_class_name'];?></a> <br>
                    <?php echo getCountryname($all_data[0]['country_id']);?> </p>
                </div>
                <h3>Description</h3>
                <p><?php echo $all_data[0]['trainer_class_description'];?></p>
              </div>
              <div class="page-details">
                <h3>Contact</h3>
                <div class="content">
                  <p><strong>Address </strong> : <?php echo $all_data[0]['trainer_class_address'];?></p>
                  <p><strong>Website </strong> : <a href="<?php echo $all_data[0]['trainer_class_website_url'];?>" target="_blank">Go To Website</a></p>
                  <p><strong>Category </strong> : <?php echo get_energizer_category_name($all_data[0]['trainer_class_id']); ?></p>
                  <p><strong>Location </strong> : <?php echo  getCityname($all_data[0]['city_id']).'&nbsp;,&nbsp;'.getCountryname($all_data[0]['country_id']);?></p>
                </div>
              </div>

              <div class="page-details">
                <?php if(isset($opening_hour) && !empty($opening_hour)){
						foreach($opening_hour as $opening_hour){
							$opening_hour_from_arr = explode('-',$opening_hour['opening_hour_from']);
							$opening_hour_to_arr = explode('-',$opening_hour['opening_hour_to']);
							//print_r($opening_hour_from_arr);?>
                <div class="content">
                  <p><strong><?php echo $opening_hour['opening_hour_day'];?> </strong> : &nbsp;
                    <?php if($opening_hour['opening_hour_close'] == 0){
									if($opening_hour['opening_hour_from'] == 0 && $opening_hour['opening_hour_to'] == 0){
									echo '<strong>Not Maintain</strong>';
									}
									else{
								 echo $opening_hour_from_arr[0].'.'.$opening_hour_from_arr[1].'.'.$opening_hour_from_arr[2]. '&nbsp; to &nbsp;'.$opening_hour_to_arr[0].'.'.$opening_hour_to_arr[1].'.'.$opening_hour_to_arr[2];}?>
                  </p>
                  <?php  }
						 else{?>
                  <strong>Closed</strong>
                  <?php  }?>
                  <!--<p><strong>Monday </strong> : 10.00 P.M - 07.00 P.M</p>-->
                </div>
                <?php }
						}
						else{?>
                <h3>No Hours Available</h3>
                <?php }?>
              </div>




		<div class="page-details">
                <h3>Join this Energizer just like</h3>
                <div class="join-events">
                  <ul class="member-scroller">
                    <?php foreach($joined_users as $selected_users){?>
                    <li> <a href="<?php echo base_url('Home/profile-view/').base64_encription($selected_users['user_id']);?>">
                      <div class="single">
                        <div class="image">
                          <?php if(!empty($selected_users['user_image'])){?>
                          <img src="<?php echo base_url('upload/profile/').$selected_users['user_image']?>">
                          <?php }
									         else{?>
                          <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                          <?php } ?>
                        </div>
                        <?php if(!empty($selected_users['first_name'])){?>
                        <p> <?php echo $selected_users['first_name'];?> </p>
                        <p> <?php echo $selected_users['last_name'];?></p>
                        <?php }
												else{?>
                        <p> <?php echo $selected_users['company_person'];?> </p>
                        <?php }?>
                      </div>
                      </a> </li>
                    <?php }?>
                  </ul>
                  <div class="clearfix"></div>
                </div>
              
              </div>

	
	
	
             

            </div>
          
           
          </div>
        </div>
      </div>
     
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('include/footer');?>
<script type="text/javascript">
function shareFb(Url_data)
{
  window.open('http://www.facebook.com/sharer/sharer.php?u='+Url_data+'', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');
}
</script>
</body>
</html>
