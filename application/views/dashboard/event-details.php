<?php 
if(!empty($all_events[0]['category_id'])){
	$get_cate_id_exp = explode(',',$all_events[0]['category_id']);
	}	
$this->load->view('include/head');
?>
<body>
<?php 
$this->load->view('include/header');?>
<?php /* echo '<pre>' ;
//print_r($city);
print_r($all_events);
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
                    <h2>Event Details</h2>
                </div>
                <div class="business-details">
                    <div class="image">
                    <?php if(!empty($all_events[0]['event_image'])) {?>
                    <img src="<?php echo base_url().'upload/events/'.$all_events[0]['event_image'];?>">
                    <?php }
                    else{ ?>
                    <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>">
                    <?php }?>
                        
                    </div>
                    <div class="content">
                        <h3> <?php echo ucwords($all_events[0]['event_name']);?></h3>
                        <?php if($all_events[0]['user_id'] == $this->session->userdata('user_id')){?>
                        <div class="page-share">
                            <button type="button" onClick="location.href='<?php echo base_url('Main/edit_event/'.base64_encription($all_events[0]['event_id']));?>'">Edit This Event</button>
                        </div>
                        <?php } ?>
                         <?php if(!empty($all_events[0]['category_name'])){?>
                        <p><strong>Category </strong>: <?php foreach($catdata as $catdata){
                        if(in_array($catdata['category_id'],$get_cate_id_exp)){
                        echo '&nbsp;'.$catdata['category_name'].'&nbsp;,&nbsp;';
                        }
                        }?></p><?php }?>
                        <p><strong>Decription </strong>: <?php echo ucwords($all_events[0]['event_description']);?></p><br>
                        <div class="inner">
                            <p><strong>Website </strong>: <a href="<?php echo $all_events[0]['event_website_url'];?>" target="_blank">Go to Website</a></p><p></p>
                            <?php if(!empty($all_events[0]['event_timezone'])){?>
                             <p><strong>Event Time </strong>: <?php echo $all_events[0]['event_timezone'];?></p>
                             <?php }?>
                            
                            <p><strong>Event Date  </strong>: <?php echo $all_events[0]['event_date_from'];?> To <?php echo $all_events[0]['event_date_to'];?></p>
                            
                            <p><strong>Country </strong>: <?php foreach($country as $country){
                            if($all_events[0]['country_id'] == $country['country_id']){
                                echo $country['country_name'];}}?></p>
                            <p><strong>City </strong>: <?php echo $all_events[0]['event_city'];?></p>
                            <br>
                            <p><?php echo ucwords($all_events[0]['event_facilities']);?></p>
                        </div>
                    </div>
                </div>
                
            </div>
                        
        </div>
        
        <?php $this->load->view('include/right-sidebar');?>            
    </div>
</main>
    
<?php $this->load->view('include/footer');?>
</body>
</html>