<?php 
$this->load->view('include/head');
if(!empty($all_events[0]['cat_id'])){
	$get_cate_id_exp = explode(',',$all_events[0]['cat_id']);} ?>
<body>
<?php 
$this->load->view('include/header');?>
<?php  echo '<pre>' ;
print_r($trainer);
echo '</pre>';
if(isset($_SESSION['user_details'][0]['email'])){
  $user_email = $_SESSION['user_details'][0]['email'];
}?>
<main class="dashboard" id="dashboard-main">
 <?php $this->load->view('include/left-sidebar');?>
 <div class="dashboard-main">
    <div class="left">
  <div class="membership-section">
    <div class="container">
      <h2>Membership</h2>
      <div class="row">
        <div class="col-lg-9 col-md-11 col-centered">
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
          <div class="col-sm-12 col-centered membership-full">
            <div class="row">
              <?php if(isset($details)){
                            for($i=0;$i<count($details);$i++){
                                $end_date = date_create($details[$i]['membership_end_date']);
                                $start_date = date_create($details[$i]['membership_start_date']);
                                $rest_days = date_diff($end_date,$start_date);
                                $rest_days = $rest_days->format("%a days");
                            ?>
              <div class="col-sm-4">
                <div class="row">
                  <div class="membership-single">
                    <?php if($details[$i]['membership_type'] == 'FREE'){?>
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
                        <h3>$<?php echo $details[$i]['membership_price']?></h3>
                        <p>
                          <?php if(date("Y-m-d") == $details[$i]['membership_end_date']){echo 'Now';} else{?>
                          Membership Expires <br>
                          After <?php echo $rest_days;}?> </p>
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
                    <a class="agree" href="#">YES</a>
                    <?php }?>
                  </div>
                </div>
              </div>
              <?php }}
                        
              else {?>
              <h2>NO MEMBERSHIP CREATED</h2>
              <a class="agree" href="<?php echo base_url('Home/index');?>">GO TO HOMEPAGE</a>
              <?php  }?>
            </div>
          </div>
        </div>
      </div>
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
<!--////////////////////////////////////////////// BIPLAB /////////////////////////////////////////////-->
<script>
function show_event() {
    var x = document.getElementById('details_event');
    if (x.style.display === 'none') {
        $("#details_event").show(500);;
    } else {
       $("#details_event").hide(500);;
    }
}
</script>