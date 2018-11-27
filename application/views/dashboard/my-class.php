<?php
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
                    	<h2>  My Classes</h2>
                        <a href="<?php echo base_url('Main/add-class');?>">ADD CLASS</a>
                    </div>
                	<div class="dashboard-business">
					 <?php if(isset($all_data) > 0) {
                            if(count($all_data)){
                            for($i = 0; $i< count($all_data); $i++ )
							{ ?>
                             <div class="single">
                                <div class="row">
                                    <div class="col-md-4 col-sm-5">
                                        <div class="image">
                                        	<?php if(!empty($all_data[$i]['trainer_class_image']))
											{?>
                                            <img src="<?php echo base_url().'upload/class/'.$all_data[$i]['trainer_class_image'];?>">
                                            <?php }
                                            else {?>
                                           <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>">
                                        	<?php }?>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="content">
                                            <a href="<?php echo base_url('Home/trainer-details-classes/'.base64_encription($all_data[$i]['trainer_class_id']));?>"><h3><?php echo ucwords($all_data[$i]['trainer_class_name']);?></h3></a>
                                            <p><?php echo ucwords(substr($all_data[$i]['trainer_class_description'],0,220));?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="business-btm">

                                    <div class="btm-sec">
                                        <p>
                                           <span class="img">
                                            <img src="<?php echo base_url()?>assets/web/icon/map-marker2.png"></span>
                                            <small><?php if(isset($all_data[$i]['trainer_class_address']) && !empty($all_data[$i]['trainer_class_address'])){echo $all_data[$i]['trainer_class_address'].'&nbsp,&nbsp';}?>  <?php echo $all_data[$i]['trainer_class_city'].'&nbsp,&nbsp';?> <?php echo $all_data[$i]['trainer_class_country'];?></small>
                                        </p>
                                    </div>
                                    <!-- <div class="btm-sec">
                                        <p>
                                          <span class="img">
                                            <?php if(isset( $all_data[$i]['trainer_class_phone'])){ ?>
                                            <img src="<?php echo base_url()?>assets/web/icon/telephone.png"></span>
                                            <small>+61 2 <?php echo $all_data[$i]['trainer_class_phone'];?></small>
                                            <?php } ?>
                                        </p>
                                    </div> -->
                                </div>
                                <ul class="business-links">
                                    <li><a class="bg-red" href="javascript:void(0);" onClick="return delete_data('<?php echo base_url('Main/delete-full-class/'.base64_encription($all_data[$i]['trainer_class_id']));?>')">Delete</a></li>
                                    <?php /*?><li><a href="<?php echo base_url('Main/class-details/'.base64_encription($all_data[$i]['trainer_class_id']));?>" class="bg-black">View</a></li><?php */?>
                                    <li><a href="<?php echo base_url('Main/edit-class/'.base64_encription($all_data[$i]['trainer_class_id']));?>">Edit</a></li>
                                </ul>
                            </div>

                   		 <?php } }
						 else{?>
							 	<div class="no_evnt"><h4>No Class List </h4></div>
							 <?php }
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
