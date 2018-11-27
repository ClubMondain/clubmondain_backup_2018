<?php 
if(!empty($all_data[0]['news_cate_id_FK'])){
	$get_cate_id_exp = explode(',',$all_data[0]['news_cate_id_FK']);} 
$this->load->view('include/head');
?>
<body>
<?php $this->load->view('include/header');?>
<?php /*echo '<pre>' ;
print_r($all_data);
echo '</pre>';*/
?>
<main class="dashboard" id="dashboard-main">
    	<?php $this->load->view('include/left-sidebar');?>
        <div class="dashboard-main">
        
        	<div class="left">
                <div class="dashboard-toggle" id="dashboard-toggle">
                    <button><i class="fa fa-bars"></i></button>
                </div>
                 <?php if(isset($msg) && $msg !=''){ ?>
         			 <div class="alert <?php echo $msgclass;?>"> <?php echo $msg;?> </div>
          		<?php }?>
            	<div class="single-content">
                	<div class="dashboard-head">
                    	<h2>  My Blog </h2>
                        <a href="<?php echo base_url('Main/add-blog-view');?>">ADD BLOG</a>
                    </div>
                	<div class="dashboard-events">
					 <?php if(isset($all_data) > 0) {
                            if(count($all_data)){
                            for($i = 0; $i< count($all_data); $i++ )
							{ 
                            if(!empty($all_data[$i]['update_date'])){
					$get_date_exp = explode('-',$all_data[$i]['update_date']);
					} //FOR SPECIFIC DATE CALCULATION ?>
                        <div class="single">
                        <div class="row">
                          <div class="col-md-6">
                           <a href="<?php echo base_url('Main/blog_details/'.base64_encription($all_data[$i]['blog_news_id']));?>">
                           		<div class="image">
                            <?php if(!empty($all_data[$i]['blog_news_image'])) {?>
                            <img src="<?php echo base_url().'upload/news_blog/'.$all_data[$i]['blog_news_image'];?>"> 
                            <?php }
                            else {
                            ?>
                             <img src="<?php echo base_url().'upload/no_image/'.'no-photo-available.jpg';?>">
                             <?php } ?>
                            </div>
                            </a>
                          </div>
                          <div class="col-md-6">
                            <div class="content">
                              <h3><a href="<?php echo base_url('Main/blog_details/'.base64_encription($all_data[$i]['blog_news_id']));?>"><?php echo $all_data[$i]['blog_news_title'];?></a><!--<span>23rd June</span>-->
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
				  <?php echo $all_data[$i]['country_name'];?><br>
                              <p>
                                <span><?php echo ucwords(substr($all_data[$i]['blog_news_description'],0,220));?></span>
                              </p>
                                     <ul class="business-links">
                                        <li><a class="bg-red" href="javascript:void(0);" onClick="return delete_data('<?php echo base_url('Main/delete_blog/'.base64_encription($all_data[$i]['blog_news_id']));?>')">Delete</a></li>
                                        <li><a href="<?php echo base_url('Main/edit_blog/'.base64_encription($all_data[$i]['blog_news_id']));?>">Edit</a></li>
                                        <li><a href="<?php echo base_url('Main/blog_details/'.base64_encription($all_data[$i]['blog_news_id']));?>" class="bg-black">View</a></li>
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
<?php $this->load->view('include/footer');?>
</body>
</html>