<?php include('include/head.php');?>
<body>
<?php include('include/header.php');
/*echo '<pre>';
print_r($CityNews_details);
echo '</pre>';*/?>
<main>
    <section class="page-banner slide">                         	
        <ul class="cities-slider">
            <li>
                <div class="image">
                    <img src="<?php echo base_url('assets/web');?>/images/bg-6.jpg" alt="">
                </div>
                <div class="content">
                    <!--<p>INFORMATION REGADING US</p>-->
                    <h3><?php 
					if(!empty($CityNews_details[0]['city_name'])){
					echo $CityNews_details[0]['city_name'];
					}else{?>
						<h3>Our City</h3>
						<?php }?></h3>
                </div>
            </li>
        </ul>
        <div class="overlay"></div>
    </section>
    <section class="cities">
        <div class="container">
            <div class="cities-head">
            	<?php if(!empty($CityNews_details)){?>
                <h3> <?php echo $CityNews_details[0]['city_name']?></h3>
                <a href="<?php echo base_url('Home/city-inner/').base64_encription($CityNews_details[0]['city_id']);?>">DISCOVER MORE +</a>
                <?php }?>
            </div>
            <div class="all-cities cities-detail">
                <div class="row s-cont">
                <?php if(count($CityNews_details)>0){?>
                <?php foreach($CityNews_details as $CityNews_details){?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single s-sec2">
                            <div class="image">
                            <?php if($CityNews_details['blog_news_image']!=''){?>
                                <img src="<?php echo base_url('upload/news_blog/').$CityNews_details['blog_news_image'];?>">
                                <?php }
										   else{?> 
											<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
										   <?php }?>
                                <!--<div class="overlay">
                                    <ul>
                                        <li><a href="#">More</a></li>
                                        <li><a href="#">Chat</a></li>
                                    </ul>
                                </div>-->
                            </div>
                            <div class="content">
                                <h4><?php echo $CityNews_details['blog_news_title']?></h4>
                                <p> <?php if($CityNews_details['company_name'] !=''){ echo $CityNews_details['company_name'];}?> <?php if($CityNews_details['user_name'] !=''){ echo $CityNews_details['user_name'];}?>,  
								<?php echo date('dS M , Y',strtotime($CityNews_details['update_date']));?></p>
                                <ul class="social">
                                   <li><a href="<?php if(!empty($CityNews_details['blog_news_instagram_link'])){ echo $CityNews_details['blog_news_instagram_link'];} else{ 'https://www.instagram.com/'; }?>" target="_blank">
                                    	<i class="fa fa-instagram"></i></a></li>
                                   <li><a href="<?php if(!empty( $CityNews_details['blog_news_fb_link'])){ echo $CityNews_details['blog_news_fb_link'];} else{ 'https://www.facebook.com/'; }?>" target="_blank">
                                    	<i class="fa fa-facebook"></i></a></li>
                                   <li><a href="<?php if(!empty($CityNews_details['blog_news_twitter_link'])){  echo $CityNews_details['blog_news_twitter_link'];} else{ 'https://twitter.com/'; }?>" target="_blank">
                                    	<i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php }}
				else{?>
                
                <h2>No News Created</h2>   
                 <?php }?>
                
                    <?php /*?><div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single s-sec2">
                            <div class="image">
                                <img src="<?php echo base_url('assets/web');?>/images/city-1.jpg">
                                <!--<div class="overlay">
                                    <ul>
                                        <li><a href="#">More</a></li>
                                        <li><a href="#">Chat</a></li>
                                    </ul>
                                </div>-->
                            </div>
                            <div class="content">
                                <h4>SPREADING HOLIDAY CHEER IN 2016</h4>
                                <p> Marry Jones, 6th June ,2017</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single s-sec2">
                            <div class="image">
                                <img src="<?php echo base_url('assets/web');?>/images/city-1.jpg">
                                <!--<div class="overlay">
                                    <ul>
                                        <li><a href="#">More</a></li>
                                        <li><a href="#">Chat</a></li>
                                    </ul>
                                </div>-->
                            </div>
                            <div class="content">
                                <h4>SPREADING HOLIDAY CHEER IN 2016</h4>
                                <p> Marry Jones, 6th June ,2017</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><?php */?>
                    
                </div>
            </div>
        </div>
    </section>
    
</main>
    
<?php include("include/footer.php");?>
</body>
</html>  