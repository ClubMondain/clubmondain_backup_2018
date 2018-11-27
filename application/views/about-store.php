<?php 
include('include/head.php');?>
<body>
<?php 
include('include/header.php');?>

    <main>
    	<section class="page-banner">
        	<div class="image">
            	<img src="<?php echo base_url('assets/web/');?>images/bg-3.jpg" alt="">
            </div>
            <div class="content">
                <p>Lorem ipsum lorem</p>
                <h3>Cakes n Cookies</h3>
            </div>
            <div class="overlay"></div>
        </section>
        
        <div class="container-fluid max-1240">
        	<div class=" full-content">
                <div class="page-content">
                    <div class="page-inner-content">
                        <div class="page-tab-links">
                            <ul>
                                <li><a data-toggle="tab" href="#about">About Us</a></li>
                                <li class="active"><a data-toggle="tab" href="#location">Location</a></li>
                                <li><a data-toggle="tab" href="#reviews">Reviews</a></li>
                                <li><a data-toggle="tab" href="#events"><i class="fa fa-plus"></i> Events / Chat</a></li>
                            </ul>
                        </div>
                        
                        <div class="tab-content">
                            <div id="about" class="tab-pane fade">
                                <div class="page-slider">                            	
                                    <ul class="bx-slider">
                                        <li>
                                            <div class="image">
                                                <img class="slide-img" src="<?php echo base_url('assets/web/');?>images/bg-3.jpg">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                
                                <div class="page-share">
                                    <button type="button">Owner This Business?</button>
                                    <ul class="social">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                
                                <div class="page-details">
                                    <h3>Description</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a ipsum metus. Etiam justo felis, imperdiet nec odio ac, placerat sagittis massa. Phasellus dolor diam, scelerisque eu purus non, auctor tempor ipsum. Nullam sollicitudin, mauris nec cursus ornare, nulla felis ultrices lectus, pharetra vestibulum justo erat sed sem. Suspendisse et rhoncus ligula. Aliquam consectetur turpis vitae nunc varius tincidunt. Sed pharetra laoreet urna, vitae lacinia ex convallis quis.</p>
                                </div>
                                
                                <div class="page-details">
                                    <h3>Contact</h3>
                                    <div class="content">
                                        <p><strong>Address </strong> : 2/7 lorem ipsum london uk</p>
                                        <p><strong>Website </strong> : www.loremipsum.com</p>
                                        <p><strong>Category </strong> : Fast Food , Orange, Sugar Free</p>
                                        <p><strong>Location </strong> : London, Uk </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="location" class="tab-pane fade in active">
                                <div class="store-location">
                                    <div class="map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60949550.79698232!2d95.474687697975!3d-21.189562525113573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2b2bfd076787c5df%3A0x538267a1955b1352!2sAustralia!5e0!3m2!1sen!2sin!4v1485865598569" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                    <div class="map-form">
                                        <div class="text">
                                            <p>Get Direction</p>
                                            <i class="fa fa-question"></i>
                                        </div>
                                        <div class="select">
                                            <select>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                        <div class="page-search">
                                            <input type="text">
                                            <button><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="reviews" class="tab-pane fade">
                            </div>
                            
                            <div id="events" class="tab-pane fade">
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="sidebar">
                    <aside class="single-sidebar">
                        <h3>Items</h3>
                        <div class="content">
                            <div class="sidebar-items s-cont">
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo2.jpg">
                                        <span class="rate">Good</span>
                                    </div>
                                </a>
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo3.jpg">
                                        <span class="rate">Good</span>
                                    </div>
                                </a>
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo4.jpg">
                                        <span class="rate">Good</span>
                                    </div>
                                </a>
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo5.jpg">
                                        <span class="rate">Good</span>
                                    </div>
                                </a>
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo6.jpg">
                                        <span class="rate">Good</span>
                                    </div>
                                </a>
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo7.jpg">
                                        <span class="rate">Good</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </aside>
                    <aside class="single-sidebar">
                        <h3>New Shops</h3>
                        <div class="content">
                            <div class="sidebar-items s-cont">
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo8.jpg">
                                    </div>
                                    <p>London Cake shop</p>
                                </a>
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo9.jpg">
                                    </div>
                                    <p>London Cake shop</p>
                                </a>
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo10.jpg">
                                    </div>
                                    <p>London Cake shop</p>
                                </a>
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo11.jpg">
                                    </div>
                                    <p>London Cake shop</p>
                                </a>
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo12.jpg">
                                    </div>
                                    <p>London Cake shop</p>
                                </a>
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo13.jpg">
                                    </div>
                                    <p>London Cake shop</p>
                                </a>
                            </div>
                        </div>
                    </aside>
                    <aside class="single-sidebar">
                        <h3>New Posts</h3>
                        <div class="content">
                            <div class="sidebar-items s-cont">
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo14.jpg">
                                    </div>
                                    <p>
                                        London Cake shop
                                        <small> 6th March ,2016</small>
                                    </p>
                                </a>
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo15.jpg">
                                    </div>
                                    <p>
                                        London Cake shop
                                        <small> 6th March ,2016</small>
                                    </p>
                                </a>
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo1.jpg">
                                    </div>
                                    <p>
                                        London Cake shop
                                        <small> 6th March ,2016</small>
                                    </p>
                                </a>
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo2.jpg">
                                    </div>
                                    <p>
                                        London Cake shop
                                        <small> 6th March ,2016</small>
                                    </p>
                                </a>
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo3.jpg">
                                    </div>
                                    <p>
                                        London Cake shop
                                        <small> 6th March ,2016</small>
                                    </p>
                                </a>
                                <a href="#" class="single s-sec">
                                    <div class="image">
                                        <img src="<?php echo base_url('assets/web/');?>images/demo4.jpg">
                                    </div>
                                    <p>
                                        London Cake shop
                                        <small> 6th March ,2016</small>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </aside>
                    <aside class="single-sidebar">
                        <h3>Banner</h3>
                        <div class="content">
                            <a class="side-banner">
                                <img src="<?php echo base_url('assets/web/');?>images/travel.jpg">
                            </a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        
    </main>
    
   <?php include("include/footer.php");?>
    
</body>
</html>
