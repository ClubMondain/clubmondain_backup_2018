<?php $this->load->view('include/head');?>
<body>
<?php $this->load->view('include/header');?>
<main class="dashboard" id="dashboard-main">
  <?php $this->load->view('include/left-sidebar');?>
  <div class="dashboard-main">
    <div class="left">
      <div class="dashboard-toggle" id="dashboard-toggle">
        <button><i class="fa fa-bars"></i></button>
      </div>
      <div class="single-content">
        <div class="dashboard-head">
          <h2>My Membership</h2>
        </div>
        <div class="dashboard-membership">
          <ul class="member-tabs">
            <?php if(!empty($company)){?>
            <li class="active"><a data-toggle="tab" href="#company">company</a></li>
            <?php }?>
            <?php if(!empty($trainer)){?>
            <li class="active"><a data-toggle="tab" href="#personal">personal Trainer</a></li>
            <?php }
                    if(empty($company) && empty($trainer)){?>
            <li class="active"><a data-toggle="tab" href="#business">business Traveler</a></li>
            <?php }?>
          </ul>
          <div class="tab-content">
            <div id="personal" class="tab-pane fade in active">
              <div class="container-fluid">
                <div class="row">
                  <?php if(isset($details)){
                            for($i=0;$i<count($details);$i++){
                                $end_date = date_create($details[$i]['membership_end_date']);
                                $start_date = date_create($details[$i]['membership_start_date']);
                                $rest_days = date_diff($end_date,$start_date);
                                $rest_days = $rest_days->format("%a days");
                              if($details[$i]['membership_status'] == 'Active'){  
                            ?>
                  <div class="col-md-4">
                    <div class="row">
                      <div class="membership-single">
                        <?php if($details[$i]['membership_type'] != 'FREE'){?>
                        <h3 class="blue-bg">Popular</h3>
                        <?php }
                                     else { ?>
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
                              After <?php echo $rest_days;?>
                              <br>

                              <?php }else{ ?>
                              Never Expires
                              <?php } ?>

                               </p>
                               <?php } ?>
                          </div>
                        </div>
                        <div class="limit">
                          <p></p>
                          <?php echo $details[$i]['membership_description'];?> </div>
                        <?php if(!empty($company)){?>
                        <a class="agree <?php if($i%2 == 0){?> bg-navy <?php }?>" href="#">YES</a>
                        <?php }?>
                        <?php if(!empty($trainer)){?>
                        <a class="agree <?php if($i%2 == 0){?> bg-navy <?php }?>" href="<?php //echo base_url('Home/personal_trainer_reg/'.$details[$i]['membership_id']);?>#">YES</a>
                        <?php }?>
                        <?php if(empty($company) && empty($trainer)){?>
                        <?php if($details[$i]['membership_type'] != 'FREE'){?>
                        <a class="agree" href="<?php echo base_url('Home/upgrade-membership/'.$details[$i]['membership_id']); ?>">YES</a>
                        <?php } ?>
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
              </div>
            </div>
            <div id="business" class="tab-pane fade">
              <div class="col-md-4">
                <div class="row">
                  <div class="membership-single">
                    <h3 class="blue-bg">Popular</h3>
                    <div class="plan">
                      <p>Membership <br>
                        <strong>0</strong></p>
                    </div>
                    <div class="fee">
                      <div class="cntnt">
                        <h3>FREE</h3>
                        <p>Membership Expires <br>
                          After 7 days</p>
                      </div>
                    </div>
                    <div class="limit">
                      <p> UNLIMITED POSTING</p>
                    </div>
                    <a class="agree" href="#">ACTIVE</a> </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">
                  <div class="membership-single">
                    <h3></h3>
                    <div class="plan">
                      <p>Membership <br>
                        <strong>1</strong></p>
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
                    <a class="agree bg-navy" href="#">UPGRADE</a> </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">
                  <div class="membership-single">
                    <h3></h3>
                    <div class="plan">
                      <p>Membership <br>
                        <strong>2</strong></p>
                    </div>
                    <div class="fee">
                      <div class="cntnt">
                        <h3> $35.00</h3>
                        <p>Membership Expires <br>
                          After 7 days</p>
                      </div>
                    </div>
                    <div class="limit">
                      <p> NO POSTING ITEMS</p>
                    </div>
                    <a class="agree bg-navy" href="#">UPGRADE</a> </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('include/right-sidebar');?>
  </div>
</main>

<!--City Request Popup-->
<div class="modal fade" id="city-request-popup" role="dialog">
  <div class="login-sec city-request">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <form class="city-request-form">
      <h3>Request For City</h3>
      <input type="text" placeholder="City Name">
      <button type="submit" class="submit">Log in</button>
    </form>
  </div>
</div>
<?php $this->load->view('include/footer');?>
</body>
</html>
