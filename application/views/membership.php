<?php 
include('include/head.php');
/*print_r($_SESSION);
echo '<pre>';
print_r($details);
echo '</pre>';*/?>
<body>
<?php include('include/header.php');?>
<main>
  <section class="membership-section">
    <div class="container">
      <h2>Membership</h2>
      <div class="row">
        <div class="col-lg-9 col-md-11 col-centered">
          <ul class="member-tabs">
            <?php if(!empty($company)){?>
            <li class="active"><a data-toggle="tab" href="#company">Company</a></li>
            <?php }?>
            <?php if(!empty($trainer)){?>
            <li class="active"><a data-toggle="tab" href="#personal">Personal Trainer</a></li>
            <?php }
                    if(empty($company) && empty($trainer)){?>
            <li class="active"><a data-toggle="tab" href="#business">Business Traveller</a></li>
            <?php }?>
          </ul>
          <div class="col-sm-12 col-centered membership-full">
            <div class="row">
              <?php if(isset($details))	{
					for($i=0;$i<count($details);$i++){
					$end_date = date_create($details[$i]['membership_end_date']);
					$start_date = date_create($details[$i]['membership_start_date']);
					$rest_days = date_diff($end_date,$start_date);
					$rest_days = $rest_days->format("%a days");
          if($details[$i]['membership_status'] == 'Active'){  
               ?>
              <div class="col-sm-4">
                <div class="row">
                  <div class="membership-single">
                    <?php if($details[$i]['membership_type'] != 'FREE'){?>
                    <h3 class="blue-bg">Popular</h3>
                    <?php }else { ?>
                    <h3></h3>
                    <?php }?>
                    <div class="plan">
                      <p><?php echo $details[$i]['membership_type']?></p>
                    </div>
                    <div class="fee">
                      <div class="cntnt">
                        <h3>&euro;<?php echo $details[$i]['membership_price']?></h3>
                        <p>
                          <?php if(date("Y-m-d") == $details[$i]['membership_end_date']){echo 'Now';} else{?>
                          
                            <?php if($details[$i]['membership_type'] != 'FREE'){?>
                            Membership Expires 
                            <?php }else{ ?>
                            Never Expires 
                            <?php } ?>

                          <br>
                           <?php if($details[$i]['membership_type'] != 'FREE'){?>
                          After <?php echo $rest_days;}?> </p>
                          <?php } ?>
                      </div>
                    </div>
                    <div class="limit">
                      <p></p>
                      <?php echo $details[$i]['membership_description'];?> </div>
                    <?php if(!empty($company)){?>
                    <a class="agree <?php if($i%2 == 0){?> bg-navy <?php }?>" href="<?php echo base_url('Home/company_reg/'.base64_encription($details[$i]['membership_id']));?>">YES</a>
                    <?php }?>
                    <?php if(!empty($trainer)){?>
                    <a class="agree <?php if($i%2 == 0){?> bg-navy <?php }?>" href="<?php echo base_url('Home/personal_trainer_reg/'.base64_encription($details[$i]['membership_id']));?>">YES</a>
                    <?php }?>
                    <?php if(empty($company) && empty($trainer)){?>
                    <a class="agree" href="<?php echo base_url('Home/member_registration/'.base64_encription($details[$i]['membership_id']));?>">YES</a>
                    <?php }?>
                  </div>
                </div>
              </div>
              <?php }}}
                        
              else {?>
              <h2>NO MEMBERSHIP CREATED</h2>
              <a class="agree" href="<?php echo base_url('Home/index');?>">GO TO HOMEPAGE</a>
              <?php  }?>
            </div>
            <?php /*?><div id="business" class="tab-pane fade in active">
                        <div class="col-sm-12 col-centered">
                        <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="membership-single">
                                    <h3 class="blue-bg">Popular</h3>
                                    <div class="plan">
                                        <p>FREE</p> 
                                    </div>
                                    <div class="fee">
                                        <div class="cntnt">
                                            <h3>FREE</h3>
                                            <p>Membership Expires <br> After 7 days</p>
                                        </div>
                                    </div>
                                    <div class="limit">
                                        <p> UNLIMITED POSTING</p>
                                    </div>
                                    <a class="agree" href="<?php echo base_url('Home/login_user/');?>">YES</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="membership-single">
                                    <h3 ></h3>
                                    <div class="plan">
                                        <p>PREMIUM</p> 
                                    </div>
                                    <div class="fee">
                                        <div class="cntnt">
                                            <h3> $35.00</h3>
                                            <p>Now</p>
                                        </div>
                                    </div>
                                    <div class="limit">
                                        <p> NO POSTING ITEMS</p>
                                    </div>
                                    <a class="agree bg-navy" href="user-registration.html">YES</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div><?php */?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php include("include/footer.php");?>
</body>
</html>