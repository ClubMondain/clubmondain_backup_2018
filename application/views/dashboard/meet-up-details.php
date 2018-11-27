<?php
if(!empty($meet_up_data[0]['create_data'])){
					$get_date_exp = explode('-',$all_events[$i]['event_date_from']);
					} //FOR SPECIFIC DATE CALCULATION
$this->load->view('include/head');
?>
<body>
<?php
$this->load->view('include/header');?>
<?php  /*echo '<pre>' ;
print_r($meet_up_comments);
echo '</pre>';*/
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
                    <h2>Meet Up Details</h2>
                </div>
                <div class="business-details">
                    <div class="image">
                    <?php if(!empty($meet_up_data[0]['meet_up_image'])) {?>
                    <img src="<?php echo base_url().'upload/meet-up/'.$meet_up_data[0]['meet_up_image'];?>">
                    <?php }
                    else{ ?>
                    <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>">
                    <?php }?>

                    </div>
                    <div class="content">
                        <h3> <?php echo ucwords($meet_up_data[0]['meet_up_name']);?></h3>
                        <h3> <?php echo $meet_up_data[0]['meetup_date'];?> </h3>

                        <p><strong>Decription </strong>: <?php echo ucwords($meet_up_data[0]['meet_up_description']);?></p><br>
                        <div class="page-details page-comments">
                        <?php if(count($meet_up_comments)>0){
						foreach($meet_up_comments as $comments){
							if(!empty($comments['create_date'])){
					$get_date_exp_comment = explode('-',$comments['create_date']);
					} //FOR SPECIFIC DATE CALCULATION
                     /*For Date Sufix Calculation*/
				  	$number = $get_date_exp_comment[2];
				  	$ends = array('th','st','nd','rd','th','th','th','th','th','th');
					if (($number %100) >= 11 && ($number%100) <= 13)
					   $ends_suf = $number. 'th';
					else
					   $ends_suf = $number. $ends[$number % 10];
					   /*End For Date Sufix Calculation*/?>
                    <!--Content in Loop-->
                        <?php /*?><div class="page-details">
                            <h3>Comments</h3>
                            <p><strong>Name Of Commenters </strong>: <?php echo ucwords($comments['user_name']);?></p>
                            <p><strong>Date Of Comments</strong>: <?php echo $ends_suf .' '.$month_name = date('F', mktime(0, 0, 0,$get_date_exp_comment[1] , 17)); ?></p>
                            <p><strong>Decription </strong>: <?php echo ucwords($comments['comments']);?></p><br>
                        </div><?php */?>
                        <div class="single">
                <div class="owner-det">
                  <div class="image">
                    <?php if($comments['user_image']!=''){?>
                    <img src="<?php echo base_url('upload/profile/').$comments['user_image'];?>">
                    <?php }
									  else{?>
                    <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                    <?php } ?>
                  </div>
                  <p>
                    <a href="#"><?php if($comments['user_name']!='') echo ucwords($comments['user_name']);
					 //if($comments['company_name']!='') echo $comments['company_name'];?>
                    </a> <br>
                   <?php echo $ends_suf .' '.$month_name = date('F', mktime(0, 0, 0,$get_date_exp_comment[1] , 17)); ?> </p>
                </div>

                <p><?php echo ucwords($comments['comments']);?></p>
              </div>
                    <!--End Content in Loop-->
                        <?php }
						}
						else{?>
                        <h2>No Comments Right Now</h2>
                        <?php }?>
              </div>


                        <div class="page-details">
                        <?php if(!empty($msg)){?>
                        <div class="alert-success" style="padding: 10px;
    text-align: center;font-size:18px;"> Your Comment Posted Successfully </div>
						<?php }?>
                            <h3>Post Your Comments</h3>
                            <div class="review-form">
                                <label>Comments</label>
                                <?php $form_details = array('id'=>'insert_meet_up_normal_comment','method'=>'post','class'=>'','name'=>'insert_meet_up_normal_comment');
								echo form_open('Main/insert_meet_up_normal_comment/'.base64_encription($meet_up_data[0]['meet_up_id']),$form_details);?>
                                <textarea placeholder="Enter Your Review" name="feedback"></textarea>
                                        <button class="submit" type="submit">Post Your Comments</button>
                                       <?php echo form_close();?>
                            </div>
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
