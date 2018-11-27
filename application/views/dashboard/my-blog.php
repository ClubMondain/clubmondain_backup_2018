<?php 
if(!empty($all_data[0]['news_cate_id_FK'])){
	$get_cate_id_exp = explode(',',$all_data[0]['news_cate_id_FK']);} 
$this->load->view('include/head');
?>
<body>
<?php 
$this->load->view('include/header');?>
<?php /*echo '<pre>' ;
print_r($all_data);
echo '</pre>';*/
//echo $_SESSION['user_details'][0]['id'];
?>
    <main class="dashboard" id="dashboard-main">
    	<?php $this->load->view('include/left-sidebar');?>
        <div class="dashboard-main">
        
        	<div class="left">
                <div class="dashboard-toggle" id="dashboard-toggle">
                    <button><i class="fa fa-bars"></i></button>
                </div>
            	<div class="single-content">
                	<div class="dashboard-head">
                    	<h2>  My Blog </h2>
                        <a href="<?php echo base_url('Main/add_blog_view');?>">ADD BLOG</a>
                    </div>
                	<div class="dashboard-events">
					 <?php if(isset($all_data) > 0) {
                            if(count($all_data)){
                            for($i = 0; $i< count($all_data); $i++ )
							{ 
                            if(!empty($all_data[$i]['blog_date'])){
					$get_date_exp = explode('-',$all_data[$i]['blog_date']);
					} //FOR SPECIFIC DATE CALCULATION ?>
                        <div class="single">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="image">
                            <?php if(!empty($all_data[$i]['blog_pic'])) {?>
                            <img src="<?php echo base_url().'upload/blog/'.$all_data[$i]['blog_pic'];?>"> 
                            <?php }
                            else {
                            ?>
                             <img src="<?php echo base_url().'upload/no_image/'.'no-photo-available.jpg';?>">
                             <?php } ?>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="content">
                              <h3><a href="#"><?php echo $all_data[$i]['blog_title'];?></a><!--<span>23rd June</span>-->
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
                              <h5><?php echo $all_data[$i]['city_name'];?> ,
				  <?php echo $all_data[$i]['countryName'];?><br>
                              <h5><?php /*foreach($city as $city){
								if($all_data[$i]['city_id_FK'] == $city['id']){
									echo $city['city_name'].'&nbsp;,&nbsp;';}};//CITY
									
                             foreach($country as $country){
								if($all_data[$i]['country_id_FK'] == $country['id']){
									echo $country['countryName'];}}*/?><br></h5>
                              <p>
                                <span><?php echo substr($all_data[$i]['blog_description'],0,220);?></span>
                                <?php /*?><div class="" id="details_event" style="display:none">
                                    <!-- FOR CATEGORY SHOW ONLY-->
                                    <span class="cat_heading"> Category : </span>
                                    <?php foreach($catdata as $catdata){
                                    if(in_array($catdata['id'],$get_cate_id_exp)) {
                                        echo '&nbsp;'.$catdata['name'].'&nbsp;';}
                                    } ?> 
                                </div><?php */?>
                              </p>
                              <?php /*?><a href="<?php echo base_url('Main/event_details/'.$all_data[$i]['id']);?>" class="view">VIEW EVENT DETAILS</a> <?php */?>
                                     <ul class="business-links">
                                        <li><a class="bg-red" href="javascript:void(0);" onClick="return delete_data('<?php echo base_url('Main/delete_blog/'.$all_data[$i]['id']);?>')">Delete</a></li>
                                        <li><a href="<?php echo base_url('Main/edit_blog/'.$all_data[$i]['id']);?>">Edit</a></li>
                                    </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                   		 <?php } }
						 else{
							 	echo '<h2> NO BLOG CREATED </h2>';
							 }
					 }?>
                    </div>
                    
                </div>
                            
            </div>
            
        	<?php $this->load->view('include/right-sidebar');?>
            
        </div>
    </main>
    
   <?php 
$this->load->view('include/footer');?>
</body>
</html>