<?php 
if(!empty($all_data[0]['news_cate_id_FK'])){
	$get_cate_id_exp = explode(',',$all_data[0]['news_cate_id_FK']);} 
$this->load->view('include/head');?>
<body>
<?php $this->load->view('include/header');?>
<?php /*echo '<pre>' ;
print_r($all_data);
echo '</pre>';*/
//echo $_SESSION['user_details'][0]['id'];
?>

    <main class="user-profile">
    	<div class="container">
        	<div class="profile-contain">
            	<div class="profile-top">
                	<div class="left">
                         <?php if(isset($_SESSION['member_login'])){?>
                        <div class="image">
                        <?php if(!empty($all_profile_data[0]['members_profile_pic'])){?>
                        <img src="<?php echo base_url('upload/profile/').$all_profile_data[0]['members_profile_pic']?>">
                         <?php }
						 else{?>
						 <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>">
						<?php } ?>
						</div>
                        <?php }//End Member Section?>
                        
                        <?php if(isset($_SESSION['company_login'])){?>
                        <div class="image">
                        <?php if(!empty($all_profile_data[0]['company_pic'])){?>
                            <img src="<?php echo base_url('upload/company/').$all_profile_data[0]['company_pic']?>">
                            <?php }
                             else{?>
                             <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>">
                            <?php } ?>
                            </div>
                        <?php }//End Company Section?>
                        
                        <?php if(isset($_SESSION['trainer_login'])){?>
                        <div class="image">
                        <?php if(!empty($all_profile_data[0]['trainer_profile_pic'])){?>
                            <img src="<?php echo base_url('upload/trainer/').$all_profile_data[0]['trainer_profile_pic']?>">
                            <?php }
                             else{?>
                             <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>">
                            <?php } ?>
                            </div>
                        <?php }//End Trainer Section?>
                    </div>
                    
                	<div class="right">
                     <?php if(isset($_SESSION['member_login'])){?>
                    	<div class="content">
                        	<h3><?php echo $all_profile_data[0]['members_fname'].'&nbsp;'.$all_profile_data[0]['members_lname'];?> </h3>
                            <h5>
                            	Email:  <?php echo $all_profile_data[0]['members_email'];?> <br>
                                <?php if(!empty($all_profile_data[0]['members_phone'])){?>
                                Phone Number:  <?php echo $all_profile_data[0]['members_phone'];?> <br>
                                <?php }?>
                                Members of : <?php echo $all_profile_data[0]['members_city'].'&nbsp;,&nbsp;'.$all_profile_data[0]['members_country'];?>
                            </h5><br>
                            <p>Successful CEO in a technology company, love sport, travel and fine dining. Would like to meet similar people. Business wise looking for interesting projects</p>
                        </div>
                     <?php }//End Member Section?>
                     <?php if(isset($_SESSION['company_login'])){?>
                    	<div class="content">
                        	<h3><?php echo $all_profile_data[0]['company_c_person'];?> </h3>
                            <h5>
                            	Co Founder and CEO <?php echo $all_profile_data[0]['company_name'];?> <br>
                                Members of : Arts Club , Soho House
                            </h5><br>
                            <p><?php echo $all_profile_data[0]['company_description'];?></p>
                        </div>
                     <?php }//End Company Section?>
                     <?php if(isset($_SESSION['trainer_login'])){?>
                    	<div class="content">
                        	<h3><?php echo $all_profile_data[0]['trainer_fname'].'&nbsp;'.$all_profile_data[0]['trainer_lname'];?> </h3>
                            <h5>
                            	Email:  <?php echo $all_profile_data[0]['trainer_email'];?> <br>
                                 <?php if(!empty($all_profile_data[0]['trainer_experience'])){?>
                                Experience of : <?php echo $all_profile_data[0]['trainer_experience'];?>
                                <?php }?>
                            </h5><br>
                            <p><?php echo $all_profile_data[0]['trainer_about_yourself'];?></p>
                        </div>
                     <?php }//End Trainer Section?>
                    </div>  
                                  
                    <div class="clearfix"></div>
                </div>
                
                <div class="profile-main-content">
                	<div class="left">
                    	<div class="inner">
                        	<h2> My Latest Events</h2>
                            <div class="dashboard-events">
                            <?php if(isset($all_events) > 0) {
				if(count($all_events)){
				$total_event = count($all_events);
				for($i = 0; $i< $total_event; $i++ ){
					
					if(!empty($all_events[$i]['event_date_from'])){
					$get_date_exp = explode('-',$all_events[$i]['event_date_from']);
					} //FOR SPECIFIC DATE CALCULATION
			 ?>
          <div class="single">
            <div class="row">
              <div class="col-md-6">
                <div class="image">
                <?php if(!empty($all_events[$i]['event_pic'])) {?>
                <img src="<?php echo base_url().'upload/events/'.$all_events[$i]['event_pic'];?>"> 
                <?php }
				else {
				?>
                 <img src="<?php echo base_url().'upload/no_image/'.'no-photo-available.jpg';?>">
                 <?php } ?>
                
                </div>
              </div>
              <div class="col-md-6">
                <div class="content">
                  <h3><a href="#"><?php echo $all_events[$i]['event_name'];?></a><!--<span>23rd June</span>-->
                  <?php /*For Date Sufix Calculation*/
				  	$number = $get_date_exp[2];
				  	$ends = array('th','st','nd','rd','th','th','th','th','th','th');
					if (($number %100) >= 11 && ($number%100) <= 13)
					   $ends_suf = $number. 'th';
					else
					   $ends_suf = $number. $ends[$number % 10];
					   /*End For Date Sufix Calculation*/?>
                  <span><?php echo $ends_suf .' '.$month_name = date('F', mktime(0, 0, 0,$get_date_exp[1] , 17)); ?>
                  </span>
                  </h3>
                  <h5><?php echo $all_events[$i]['city_name'];?> ,
				  <?php echo $all_events[$i]['countryName'];?><br>
                    <?php if(isset($all_events[$i]['event_timezone_from']) && !empty($all_events[$i]['event_timezone_from'])) { echo $all_events[$i]['event_timezone_from'];?> to <?php echo $all_events[$i]['event_timezone_to']; }?> </h5>
                  <p>
                  	<span><?php echo substr($all_events[$i]['event_description'],0,220);?></span>
                    <?php /*?><div class="" id="details_event" style="display:none">
                        <!-- FOR CATEGORY SHOW ONLY-->
                        <span class="cat_heading"> Category : </span>
                        <?php foreach($catdata as $catdata){
                        if(in_array($catdata['id'],$get_cate_id_exp)) {
                            echo '&nbsp;'.$catdata['name'].'&nbsp;';}
                        } ?> 
                    </div><?php */?>
                  </p>
                  <a href="<?php echo base_url('Main/event_details/'.$all_events[$i]['id']);?>" class="view">VIEW EVENT DETAILS</a> 
                </div>
              </div>
            </div>
          </div>
          	
			<?php } }
			else{
					echo '<h2> NO EVENT FOUND </h2>';
				} //End Count
		} //End Isset Section ?>                      
                            </div>
                        </div>
                        
                    	<div class="inner">
                        	<h2> Meetups</h2>
                            <div class="all-meet-ups">                    
                                <div class="single">
                                    <h3>Today</h3>
                                    <div class="meet-top">
                                        <div class="meet-peoples">
                                            <div class="single-meet">
                                                <div class="image">
                                                    <img src="<?php echo base_url('assets/web/');?>images/user1.jpg">
                                                </div>
                                            </div>
                                            <div class="plus">
                                                +
                                            </div>
                                            <div class="single-meet">
                                                <div class="image">
                                                    <img src="<?php echo base_url('assets/web/');?>images/user1.jpg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="people-name">
                                        	<p>John Appleseed</p>
                                            <p>Steve Jones</p>
                                        </div>
                                    </div>
                                    <p>Have to spare opera tickets if some one would like to join</p>
                                    <p>- <a href="#">3 Comments</a></p>
                                </div> 
                                
                                <div class="single">
                                    <div class="meet-top">
                                        <div class="meet-peoples">
                                            <div class="single-meet">
                                                <div class="image">
                                                    <img src="<?php echo base_url('assets/web/');?>images/user1.jpg">
                                                </div>
                                            </div>
                                            <div class="plus">
                                                +
                                            </div>
                                            <div class="single-meet">
                                                <div class="image">
                                                    <img src="<?php echo base_url('assets/web/');?>images/user1.jpg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="people-name">
                                        	<p>John Appleseed</p>
                                            <p>Steve Jones</p>
                                        </div>
                                    </div>
                                    <p>Have to spare opera tickets if some one would like to join</p>
                                    <p>- <a href="#">3 Comments</a></p>
                                </div>                               
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                	<div class="right">
                    	<div class="inner">
                        	<h2> My Business Lists</h2>
                            <div class="business-list">
                             <?php if(isset($all_data) > 0) {
                            if(count($all_data)){
                            for($i = 0; $i< count($all_data); $i++ )
							{ ?>
                            
                            	<div class="single">
                                	<div class="image">
                                    	<?php if(!empty($all_data[0]['business_pic']))
											{?>
                                            <img src="<?php echo base_url().'upload/business/'.$all_data[$i]['business_pic'];?>">
                                            <?php }
                                            else {?>
                                           <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>">
                                        	<?php }?>
                                    </div>
                                    <h3><?php echo $all_data[$i]['business_name'];?></h3>
                                    <p><?php echo substr($all_data[$i]['business_description'],0,220);?></p>
                                    <div class="business-btm">
                                        <div class="btm-sec">
                                            <p>
                                                <span class="img"><img src="<?php echo base_url()?>assets/web/icon/user.png"></span>
                                                <span>Reviews :</span>
                                                <strong> 37</strong>
                                            </p>
                                            <ul class="star">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="btm-sec">
                                            <p>
                                                <span class="img">
                                            <img src="<?php echo base_url()?>assets/web/icon/map-marker2.png"></span>
                                            <small><?php if(isset($all_data[$i]['business_street']) && !empty($all_data[$i]['business_street'])){echo $all_data[$i]['business_street'].'&nbsp,&nbsp';}?>  <?php echo $all_data[$i]['city_name'].'&nbsp,&nbsp';?> <?php echo $all_data[$i]['countryName'];?></small>
                                            </p>
                                        </div>
                                        <div class="btm-sec">
                                            <p><span class="img">
                                          	<img src="<?php echo base_url()?>assets/web/icon/telephone.png"></span>
                                            <?php if(isset( $all_data[$i]['business_postal_code'])){ ?>
                                            <small>+61 2 <?php echo $all_data[$i]['business_postal_code'];?></small>
                                            <?php } ?>
                                            </p>
                                        </div>
                                        <ul class="business-links">
                                    <li><a href="<?php echo base_url('Main/business_details/'.$all_data[$i]['id'])?>" class="bg-black" style="width:auto">View Business Details</a></li>
                                    
                                </ul>
                                    </div>
                                </div>
                                
                                 <?php } }
						 else{
							 	echo '<h2> NO BUSINESS CREATED </h2>';
							 }
						 
					 }?>
                            
                            	<!--<div class="single">
                                	<div class="image">
                                    	<img src="../assets/images/bg-8.jpg">
                                    </div>
                                    <h3>Black Star Pastry Newtown</h3>
                                    <p>Specialty cakes & coffee in a cosy cafe Newtown NSW, Australia. Busy bakery featuring inventive sweet and savoury delicacies, plus gluten-free and vegan options. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel eros non tellus cursus ornare. </p>
                                    <div class="business-btm">
                                        <div class="btm-sec">
                                            <p>
                                                <span class="img"><img src="../assets/icon/user.png"></span>
                                                <span>Reviews :</span>
                                                <strong> 37</strong>
                                            </p>
                                            <ul class="star">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="btm-sec">
                                            <p>
                                                <span class="img"><img src="../assets/icon/map-marker2.png"></span>
                                                <small>277 Australia St, Newtown NSW 2042, Australia</small>
                                            </p>
                                        </div>
                                        <div class="btm-sec">
                                            <p>
                                                <span class="img"><img src="../assets/icon/telephone.png"></span>
                                                <small>+61 2 9557 8656</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            
                            	<div class="single">
                                	<div class="image">
                                    	<img src="../assets/images/bg-8.jpg">
                                    </div>
                                    <h3>Black Star Pastry Newtown</h3>
                                    <p>Specialty cakes & coffee in a cosy cafe Newtown NSW, Australia. Busy bakery featuring inventive sweet and savoury delicacies, plus gluten-free and vegan options. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel eros non tellus cursus ornare. </p>
                                    <div class="business-btm">
                                        <div class="btm-sec">
                                            <p>
                                                <span class="img"><img src="../assets/icon/user.png"></span>
                                                <span>Reviews :</span>
                                                <strong> 37</strong>
                                            </p>
                                            <ul class="star">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="btm-sec">
                                            <p>
                                                <span class="img"><img src="../assets/icon/map-marker2.png"></span>
                                                <small>277 Australia St, Newtown NSW 2042, Australia</small>
                                            </p>
                                        </div>
                                        <div class="btm-sec">
                                            <p>
                                                <span class="img"><img src="../assets/icon/telephone.png"></span>
                                                <small>+61 2 9557 8656</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>-->
                                
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
            </div>
        </div>
    </main>
<?php $this->load->view('include/footer');?>
</body>
</html>