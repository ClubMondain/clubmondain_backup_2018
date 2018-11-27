<?php
$this->load->view('include/head');?>
<meta property="og:title" content="<?php echo ucwords($allClass[0]['trainer_class_name']);?>" />
<meta property="og:type" content="Trainer.class" />
<meta property="og:description" content="<?php echo $allClass[0]['trainer_class_description'];?>" />
<meta property="og:url" content="<?php echo base_url('Home/trainer-details-classes/').base64_encription($allClass[0]['trainer_class_id']);?>" />
<?php if(!empty($allClass[0]['trainer_class_event_image'])){?>
<meta property="og:image" content="<?php echo base_url('upload/events/').$allClass[0]['trainer_class_event_image'];?>" />
<?php }else{?>
<meta property="og:image" content="<?php echo base_url('assets/web/');?>/images/bg-12.jpg" />
<?php }?>

<body>
<?php $this->load->view('include/header');?>
<main>
  <section class="page-banner events">
    <div class="image">
      <?php if(!empty($allClass[0]['trainer_class_event_image'])){?>
      <img src="<?php echo base_url('upload/events/').$allClass[0]['trainer_class_event_image'];?>" alt="">
      <?php }
			else{?>
      <img src="<?php echo base_url('assets/web/');?>/images/bg-12.jpg" alt="">
      <?php }?>
    </div>
    <div class="content">
      <h3><?php echo ucwords($allClass[0]['trainer_class_name']);?></h3>
      <?php if(!empty($allClass[0]['trainer_class_address_details'])){ ?>
        <p><?php echo $allClass[0]['trainer_class_address_details'];?></p>
      <?php } ?>  
    </div>
    <div class="overlay"></div>
  </section>
  <div class="container-fluid max-1240">
    <div class="full-content">
      <div class="page-content">
        <div class="page-inner-content">
          <div class="page-tab-links">
            <ul>
              <li class="active"><a data-toggle="tab" href="#about">About Class</a></li>
              <!-- <li><a data-toggle="tab" href="#reviews">Review</a></li> -->
              <!--<li><a data-toggle="tab" href="#join-class"><i class="fa fa-plus"></i> Join Class</a></li>-->
              <!-- <li><a href="#"> Chat</a></li> -->
            </ul>
          </div>
          <div class="tab-content">
            <div id="about" class="tab-pane fade in active">
              <div class="page-slider">
                <ul class="bx-slider">
                  <li>
                    <div class="image">
                      <?php if(!empty($allClass[0]['trainer_class_image'])){?>
                      <img src="<?php echo base_url('upload/class/').$allClass[0]['trainer_class_image'];?>" alt="">
                      <?php }
                                        else{?>
                      <img class="slide-img" src="<?php echo base_url('assets/web');?>/images/bg-11.jpg">
                      <?php }?>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="page-share">
                <!-- <button type="button">Join This Class?</button>-->
                <!-- JOIN CLASS -->

<?php if(!empty($this->session->userdata('user_id'))){
$current_status = favDetails(PIVOT_JOIN_CLASS,$allClass[0]['trainer_class_id'],'trainer_class_id');
if($current_status == 'Yes'){
?>  
<!-- <button type="button" onClick="window.location.href='<?php echo base_url('Main/join-class-withoutpay/'.$allClass[0]['trainer_class_id']); ?>'" class="favourite join_<?php echo $allClass[0]['trainer_class_id']?>">Already Joined This Class!</button> -->
<button type="button" onClick="window.location.href='<?php echo base_url('Main/join-class-withoutpay/'.$allClass[0]['trainer_class_id']); ?>'" class="btn btn-danger">Already Joined This Class!</button>
<?php
}else{
if($allClass[0]['trainer_class_type'] == 'Free'){
?>
<button type="button" class="btn btn-success" onClick="window.location.href='<?php echo base_url('Main/join-class-withoutpay/'.$allClass[0]['trainer_class_id']); ?>'">Join this class</button>
<?php
}else{  
?>
<div class="select" style="max-width:140px; height:40px; float: left;">
<select>
<option>Paypal</option>
<option>Credit Card</option>
</select>
</div>
<button type="button" class="favourite join_<?php echo $allClass[0]['trainer_class_id']?>" 
  onClick="window.location.href='<?php echo base_url('Main/join-class/'.$allClass[0]['trainer_class_id']); ?>'">Join this class</button>
<?php
}
}
}else{?>
<button type="button" href="#no-login-popup" data-toggle="modal"> Join This Class? </button>
<?php }?>




                <ul class="social">
                  <li><a  href="javascript:void(0)" onclick="shareFb('<?php echo base_url('Home/trainer-details-classes/').base64_encription($allClass[0]['trainer_class_id']);?>');"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="https://twitter.com/intent/tweet?text=<?php echo base_url('Home/trainer-details-classes/'.base64_encription($allClass[0]['trainer_class_id']));?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <!--     <li><a href="https://www.linkedin.com/cws/share?url=<?php echo base_url('Home/trainer-details-classes/'.base64_encription($allClass[0]['trainer_class_id']));?>" target="_blank"><i class="fa fa-linkedin"></i></a></li> -->
                </ul>
              </div>
              <div class="page-details">
                <div class="owner-det">
                  <div class="image">
                    <?php if(!empty($allClass[0]['trainer_class_user_image'])){?>
                    <img src="<?php echo base_url('upload/profile/').$allClass[0]['trainer_class_user_image'];?>" alt="">
                    <?php }
                                    else{?>
                    <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                    <?php }?>
                  </div>
                  <?php
                  if($allClass[0]['user_id'] == 1){
                  $url = 'javascript:void(0)';
                  }else{
                  $url = base_url('Home/profile-view/').base64_encription($allClass[0]['user_id']);
                  }

                   ?>
                  <p> <a href="<?php echo $url;?>"><?php echo ucwords($allClass[0]['trainer_class_user_details']);?></a> <br>
                    <?php echo $allClass[0]['trainer_class_country'];?> </p>
                </div>
                <h3>Description</h3>
                <p><?php echo $allClass[0]['trainer_class_description'];?></p>
              </div>
              <div class="page-details">
                <h3>Contact</h3>
                <div class="content">
                  <p><strong>Address </strong> : <?php echo $allClass[0]['trainer_class_address'];?></p>
                  <p><strong>Website </strong> : <a href="<?php echo $allClass[0]['trainer_class_website_url'];?>" target="_blank">Go To Website</a></p>
                  <p><strong>Category </strong> : <?php echo show_category_name_class($allClass[0]['trainer_class_id']); ?></p>
                  <p><strong>Location </strong> : <?php echo $allClass[0]['trainer_class_city'].'&nbsp;,&nbsp;'.$allClass[0]['trainer_class_country'];?></p>
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
                <h3>Join this Class just like</h3>
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
                <?php /* ?>
                <div class="events-button">
                  <!-- JOIN THIS CLASS -->
                  <?php if(!empty($this->session->userdata('user_id'))){
									$current_status = favDetails(PIVOT_JOIN_CLASS,$allClass[0]['trainer_class_id'],'trainer_class_id');
									if($current_status == 'Yes'){
										$text = 'Already Joined!';
										}
									else{
										$text = 'Join This Class?';
										}?>
                  <a id="join_<?php echo $allClass[0]['trainer_class_id']?>" onClick="return details_join_class(this.id)" class="join_<?php echo $allClass[0]['trainer_class_id']?>"><?php echo $text; ?></a>
                  <?php }
								else{?>
                  <!-- <a href="#no-login-popup" data-toggle="modal"> Join This Class? </a> -->
                  <?php }?>
                </div>
                <?php */ ?>
              </div>

            </div>
            <div id="reviews" class="tab-pane fade">
              <div class="store-review">
                <div class="page-details">
                  <h3>Cakes n Cookies</h3>
                  <div class="store-ratings">
                    <ul class="rate">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                    <a class="review" href="#">5 reviews</a> <a class="review" href="#"><i class="fa fa-user"></i> 25 Total</a> </div>
                  <div class="rating-cntnt">
                    <div class="left">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a ipsum metus. Etiam justo felis, imperdiet nec odio ac, placerat sagittis massa. Phasellus dolor diam, scelerisque eu purus non, auctor tempor ipsum. Nullam sollicitudin, mauris nec cursus ornare, nulla felis ultrices lectus, pharetra vestibulum justo erat sed sem. Suspendisse et rhoncus ligula. Aliquam consectetur turpis vitae nunc varius tincidunt. Sed pharetra laoreet urna, vitae lacinia ex convallis quis.</p>
                    </div>
                    <div class="right">
                      <div class="single-rate"> <strong>Service</strong>
                        <ul class="rate">
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                        </ul>
                      </div>
                      <div class="single-rate"> <strong>Location</strong>
                        <ul class="rate">
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                        </ul>
                      </div>
                      <div class="single-rate"> <strong>Quality</strong>
                        <ul class="rate">
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                        </ul>
                      </div>
                      <div class="single-rate"> <strong>Others</strong>
                        <ul class="rate">
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="page-details">
                  <h3>Leave a Review</h3>
                  <div class="review-form">
                    <div class="rating-cntnt">
                      <div class="single-rate"> <strong>Service</strong>
                        <ul class="rate">
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                      </div>
                      <div class="single-rate"> <strong>Location</strong>
                        <ul class="rate">
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                      </div>
                      <div class="single-rate"> <strong>Quality</strong>
                        <ul class="rate">
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                      </div>
                      <div class="single-rate"> <strong>Others</strong>
                        <ul class="rate">
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <label>Comments</label>
                    <textarea></textarea>
                    <button class="submit">Leave A Review</button>
                  </div>
                </div>
              </div>
            </div>
            <div id="join-class" class="tab-pane fade">
              <div class="all-trainer-classes">
                <?php //print_r($totalClass);?>
                <div class="row">
                  <?php foreach($categoryClass as $allClass){?>
                  <div class="col-lg-4 col-sm-6">
                    <div class="single">
                      <div class="image">
                        <?php if($allClass['trainer_class_image']){?>
                        <img src="<?php echo base_url('upload/class/').$allClass['trainer_class_image']?>">
                        <?php }else{?>
                        <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                        <?php }?>
                      </div>
                      <div class="content">
                        <h4><?php echo $allClass['trainer_class_name'];?></h4>
                        <p class="date"><?php echo date('dS M Y',strtotime($allClass['create_date']));?></p>
                        <p class="location"><?php echo $allClass['trainer_class_city'].'&nbsp;,&nbsp;'.$allClass['trainer_class_country'];?></p>
                        <p class="price">£<?php echo $allClass['trainer_class_price'];?></p>
                        <div class="join-btn"> <a href="<?php echo base_url('Home/trainer-details-classes/').base64_encription($allClass['trainer_class_id']);?>">Details This Class</a> </div>
                      </div>
                    </div>
                  </div>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sidebar">
        <?php /*?><aside class="single-sidebar">
                    <h3>Highlights</h3>
                    <div class="content">
                        <div class="sidebar-items s-cont">
                            <a href="#" class="single s-sec">
                                <div class="image">
                                    <img src="<?php echo base_url('assets/web');?>/images/demo2.jpg">
                                    <span class="rate">Class</span>
                                </div>
                            </a>
                            <!--<a href="#" class="single s-sec">
                                <div class="image">
                                    <img src="assets/images/demo3.jpg">
                                    <span class="rate">Good</span>
                                </div>
                            </a>-->
                        </div>
                    </div>
                </aside><?php */?>
        <aside class="single-sidebar">
          <h3>Other's Classes</h3>
          <div class="content">
            <div class="sidebar-items s-cont">
              <?php if(!empty($categoryClass)){
                    for($i=0;$i< count($categoryClass);$i++){?>
              <a href="<?php echo base_url('Home/trainer-details-classes/').base64_encription($categoryClass[$i]['trainer_class_id']);?>" class="single s-sec">
              <div class="image">
                <?php if($categoryClass[$i]['trainer_class_image'] != ''){?>
                <img src="<?php echo base_url('upload/class/').$categoryClass[$i]['trainer_class_image'];?>">
                <?php }
                         else{?>
                <img src="<?php echo base_url('upload/no_image/').'no-photo-available.jpg';?>">
                <?php }?>
                <span class="rate">Class</span> </div>
              <p> <?php echo substr(ucwords($categoryClass[$i]['trainer_class_name']),0,28);?><br>
                <small><?php echo date('dS M Y',strtotime($categoryClass[$i]['trainer_class_event_date_from']));?></small> </p>
              </a>
              <?php }}
                    else{
                    ?>
              <h2 style="text-align:center">No Classes Are Available</h2>
              <?php }?>
            </div>
          </div>
        </aside>
        <aside class="single-sidebar">
          <h3>Same Category Events</h3>
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
              <span class="rate">Event</span>
              <p> <?php echo substr(ucwords($categoryEvent[$i]['event_name']),0,28);?><br>
                <small><?php echo date('dS M Y',strtotime($categoryEvent[$i]['event_date_from']));?></small> </p>
              </a>
              <?php }}
                    else{
                    ?>
              <h2 style="text-align:center">No Events Are Available</h2>
              <?php }?>
            </div>
          </div>
        </aside>
        <aside class="single-sidebar">
          <h3>News</h3>
          <div class="content">
            <div class="sidebar-items s-cont">
              <?php if($recent_news > 0){
                   	 for($i=0;$i< count($recent_news);$i++){?>
              <a href="#" class="single s-sec">
              <div class="image">
                <?php if($recent_news[$i]['blog_news_image'] != ''){?>
                <img src="<?php echo base_url('upload/news_blog/').$recent_news[$i]['blog_news_image'];?>">
                <?php }
                         else{?>
                <img src="<?php echo base_url('upload/no_image/').'no-photo-available.jpg';?>">
                <?php }?>
              </div>
              <span class="rate">News</span>
              <p> <?php echo substr(ucwords($recent_news[$i]['blog_news_title']),0,28);?><br>
                <small><?php echo date('dS M Y',strtotime($recent_news[$i]['update_date']));?></small> </p>
              </a>
              <?php }}
					else{?>
              <h2 style="text-align:center">No News Are Available</h2>
              <?php }?>
            </div>
          </div>
        </aside>
        <!--<aside class="single-sidebar">
                    <h3>Banner</h3>
                    <div class="content">
                        <a class="side-banner">
                            <img src="<?php //echo base_url('assets/web');?>/images/travel.jpg">
                        </a>
                    </div>
                </aside>-->
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
