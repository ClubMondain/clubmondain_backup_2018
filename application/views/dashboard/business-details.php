<?php 
if(!empty($all_data[0]['cat_id_FK'])){
	$get_cate_id_exp = explode(',',$all_data[0]['cat_id_FK']);
	}	
$this->load->view('include/head');
?>
<body>
<?php 
$this->load->view('include/header');?>
<?php /*echo '<pre>' ;
//print_r($all_data);
print_r($opening_hour);
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
                    	<h2>Spaces Details</h2>
                    </div>
                    
                    <div class="business-details">
                    	<div class="image">
                        <?php if(!empty($all_data[0]['business_banner_image'])) {?>
                        <img src="<?php echo base_url().'upload/business/'.$all_data[0]['business_banner_image'];?>">
                        <?php }
                        else{ ?>
                        <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>">
                        <?php }?>
                        	
                        </div>
                        <div class="content">
                        	<h3> <?php echo ucwords($all_data[0]['business_name']);?></h3>
                            <div class="page-share">
                                <button type="button" onClick="location.href='<?php echo base_url('Main/edit_business/'.base64_encription($all_data[0]['business_id']));?>'">Edit This Business</button>
                            </div>
                            <?php /*?><p><strong>Category </strong>: <?php foreach($catdata as $catdata){
							if(in_array($catdata['category_id'],$get_cate_id_exp)){
							echo '&nbsp;'.$catdata['category_name'].'&nbsp;,&nbsp;';
							}
							}?></p><?php */?>
                            <p><strong>Decription </strong>: <?php echo ucwords($all_data[0]['business_description']);?></p>
                            <div class="inner">
                                <p><strong>Website </strong>: <a href="<?php echo $all_data[0]['business_website_url'];?>" target="_blank"> Go to Website</a></p>
                                <p><strong>Street Number </strong>: <?php echo $all_data[0]['business_street'];?></p>
                                <p><strong>Postal Code </strong>: <?php echo $all_data[0]['business_postal_code'];?></p>
                                <p><strong>City </strong>: <?php echo $all_data[0]['business_city'];?></p>
                                <p><strong>Country </strong>: <?php echo $all_data[0]['business_country'];?></p>
                                <!--<p><strong>Longitute </strong>: 37.0902° N</p>
                                <p><strong>Latitide  </strong>: 37.0902° E</p>-->
                            </div>
                        </div>
                    </div>
                     <?php //if(isset($opening_hour['opening_hour_from']) || isset($opening_hour['opening_hour_to'])){?>
                    	<div class="page-details">
                        <h3>Opening Hours</h3>
                        <?php foreach($opening_hour as $opening_hour){?>
                        <div class="content">
                            <p><strong><?php echo $opening_hour['opening_hour_day'];?> </strong> : &nbsp;
							<?php if($opening_hour['opening_hour_close'] == 0){?>
							<?php echo $opening_hour['opening_hour_from'].'&nbsp; to &nbsp;'.$opening_hour['opening_hour_to'];?></p>
                         <?php  }
						 else{?> 
                         <strong>Closed</strong>
                         <?php  }?>
                        </div>
                        <?php }?>
                    </div>
                    <?php // }?>
                </div>
                            
            </div>
            
        	<?php $this->load->view('include/right-sidebar');?>            
        </div>
    </main>
    
    <?php 
$this->load->view('include/footer');?>
</body>
</html>