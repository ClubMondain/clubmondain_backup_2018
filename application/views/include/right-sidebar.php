<div class="right">
   <?php /* ?>
    <aside class="meet-section">
        <h2>Meet Ups</h2>

        <a href="<?php echo base_url('Main/create-meet-up');?>" class="add">ADD NEW MEET UPS</a>
      
        <div class="all-meet-ups">
        <?php if(!empty($all_meetup)){
            foreach($all_meetup as $get_meetup){

				if(!empty($get_meetup['create_date'])){
					$get_date_exp = explode('-',$get_meetup['create_date']);
					} //FOR CREATION DATE CALCULATION
                    ?>
            <div class="single">
                <h3><?php 
				  	$number = $get_date_exp[2];
				  	$ends = array('th','st','nd','rd','th','th','th','th','th','th');
					if (($number %100) >= 11 && ($number%100) <= 13)
					   $ends_suf = $number. 'th';
					else
					   $ends_suf = $number. $ends[$number % 10];
					  ?>
                  <span><?php echo $ends_suf .' '.$month_name = date('F', mktime(0, 0, 0,$get_date_exp[1] , 17)); ?>
                  </span></h3>
                <div class="meet-peoples">
                    <div class="single-meet">
                    <a href="<?php echo base_url('Main/meet_up_details/'.base64_encription($get_meetup['meet_up_id']));?>" >
                        <div class="image">
                        <?php if(!empty($get_meetup['meet_up_image'])) {?>
                            <img src="<?php echo base_url('upload/meet-up/').$get_meetup['meet_up_image'];?>">
                            <?php }
				else {
				?>
                 <img src="<?php echo base_url().'upload/no_image/'.'no-photo-available.jpg';?>">
                 <?php } ?>
                        </div>
                    </a>
                        <p><?php echo ucwords($get_meetup['meet_up_name']);?></p>
                    </div>
                </div>
                <p><span> “ </span> <em><?php echo ucwords(substr($get_meetup['meet_up_description'],0,220));?></em> <span> ” </span> </p>
                <p>- <a href="#city-request-popup<?php echo $get_meetup['meet_up_id'];?>" data-toggle="modal"><?php
				if(!empty($get_meetup['count_comments'])){echo $get_meetup['count_comments'];}else{echo '0';}?> Comments</a></p>
            </div>
            <!--Meet_Up Request Popup-->
            <div class="modal fade" id="city-request-popup<?php echo $get_meetup['meet_up_id'];?>" role="dialog">
            <div class="login-sec city-request">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <form class="city-request-form">
            <h3>Meet Up Comment</h3>
            <textarea name="comments" id="meet_up_comments<?php echo $get_meetup['meet_up_id'];?>" placeholder="Enter Your Comment"></textarea>
            <button type="button" class="submit" onClick="return call_meet_up_comments(<?php echo $get_meetup['meet_up_id'];?>,this.id);">Submit Your Comment
            </button>
            </form>
            </div>
            </div>
            <?php
            }//End Foreach
            }//End If
            else{
            ?>
            <h2>NO MEET UP CREATED</h2>
            <?php }?>

            <?php /*?><div class="single">
                <h3>Tommorow</h3>
                <div class="meet-peoples">
                    <div class="single-meet">
                        <div class="image">
                            <img src="<?php echo base_url('assets/web/');?>images/user1.jpg">
                        </div>
                        <p>Rose Stevejones</p>
                    </div>
                    <div class="plus">
                        +
                    </div>
                    <div class="single-meet">
                        <div class="image">
                            <img src="<?php echo base_url('assets/web/');?>images/user1.jpg">
                        </div>
                        <p>Rose Stevejones</p>
                    </div>
                </div>
                <p><span> “ </span> <em>Have to spare opera tickets if  <br> some one would like to join</em> <span> ” </span> </p>
                <p>- <a href="#">5 Comments</a></p>
            </div>

            <div class="single">
                <h3>8th July</h3>
                <div class="meet-peoples">
                    <div class="single-meet">
                        <div class="image">
                            <img src="<?php echo base_url('assets/web/');?>images/user1.jpg">
                        </div>
                        <p>Rose Stevejones</p>
                    </div>
                    <div class="plus">
                        +
                    </div>
                    <div class="single-meet">
                        <div class="image">
                            <img src="<?php echo base_url('assets/web/');?>images/user1.jpg">
                        </div>
                        <p>Rose Stevejones</p>
                    </div>
                </div>
                <p><span> “ </span> <em>Have to spare opera tickets if  <br> some one would like to join</em> <span> ” </span> </p>
                <p>- <a href="#">3 Comments</a></p>
            </div>

        </div>

        <div class="clearfix"></div>
    </aside>
    <?php */?>
</div>
