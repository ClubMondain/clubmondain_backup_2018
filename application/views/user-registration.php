<?php
include('include/head.php');
if(isset($get_cate_id_exp))
{
$get_cate_id_exp = explode(" ",$all_data[0]['cat_id']);
}
?>
<body>
<?php include('include/header.php');?>
<main>
  <section class="form-sec shadow-top">
    <div class="container">
      <h3>User <em>Registration</em></h3>
      <div class="error_reg">
        <?php if(isset($msg) && $msg !=''){ ?>
        <div class="alert <?php echo $msg_class;?>"> <?php echo $msg;?> </div>
        <?php }?>
      </div>
      <div class="details-form mem-form">
        <div class="row">
          <?php
		  $formDetails = array(
		  'id'=>'update_user_registration',
		  'name'=>'update_user_registration',
		  'method'=>'post',
		  'novalidate' => 'novalidate',
		  'autocomplete' => 'off'
		  );
          echo form_open_multipart('Home/insert_user_registration',$formDetails); ?>
          <div class="col-sm-6">
            <div class="single">
              <p>First Name<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please Enter Your First Name"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
                  <input type="text" name="fname" value="<?php if (isset($all_data[0]['first_name'])) { echo $all_data[0]['first_name']; }?>" id="usr_fname">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="single">
              <p>Last Name<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please Enter Your Last Name"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
                  <input type="text" name="lname" value="<?php if (isset($all_data[0]['last_name'])) { echo $all_data[0]['last_name']; }?>" id="usr_lname">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="single">
              <p>Email<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please Enter Your Email Address"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
                  <input type="text" name="email" value="<?php if (isset($all_data[0]['email'])) { echo $all_data[0]['email']; }?>" id="usr_email">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="single">
              <p>Profile Picture <a class="tooltip-btn" title="Please Upload Photos"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
                  <div class="upload">
                    <input type="file" name="profile_pic" id="usr_pic" style="display:block">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="single">
             <p>Date Of Birth<span style="color:#F00">*</span>
             <a class="tooltip-btn" title="Please Select Your DOB"><i class="fa fa-info-circle"></i></a>
             </p>
              <div class="form-row">
                <div class="field">
                  <div class="date">
                    <div class="col-xs-4">
                      <div class="row">
                        <div class="select">
                          <select name="dob_year" id="usr_year" onChange="setDays(month,day,this)">
                            <option value="">Choose Year</option>
                            <?php for($i=1900;$i<=2050;$i++){?>
                            <option value="<?php echo $i;?>"><?php echo $i; ?></option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="row">
                        <div class="select">
                          <select name="dob_month" id="usr_month" onChange="setDays(this,day,year)">
                            <option value="">Choose Month</option>
                            <?php
							for($i=1;$i<=12;$i++){
                            $name = date('F', mktime(0, 0, 0, $i, 17));
                            ?>
                            <option value="<?php echo $i;?>"><?php echo $name; ?></option>
                            <?php
							}
							?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="row">
                        <div class="select">
                          <select name="dob_date" id="usr_date" onChange="setDays(month,this,year)">
                            <option value="">Choose Date</option>
                            <?php for($i=1;$i<=31;$i++){?>
                            <option value="<?php echo $i;?>"><?php echo $i; ?></option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="single">
              <p>Street Address <a class="tooltip-btn" title="Please Enter Your Street Address"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
<input type="text" name="street" id="usr_street" value="<?php if (isset($all_data[0]['members_street'])) { echo $all_data[0]['members_street']; }?>">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="single">
              <p>Country<span style="color:#F00">*</span></p>
              <div class="form-row">
                <div class="field">
                  <div class="select">
                    <select name="country" id="member_country" class="js-example-basic-single" onChange="set_country(this.value);">
                      <option value="">Choose Country</option>
                      <?php foreach($country as $country){?>
                      <option value="<?php echo $country['country_id'];?>"><?php echo $country['country_name'];?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="single">
              <p>Homebased in(City)</p>
              <div class="form-row">
                <div class="field">
                  <div class="select">
                    <select class="js-city-single member_city_list" name="city" id="eventcity_list">
                      <option value="">Choose City</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
          <div class="single">
            <p>New city name<span style="color:#F00"> ( If not present in the city dropdown ) </span></p>
          <div class="form-row">
          <div class="field">
          <input type="text" placeholder="New city name if not present in the city dropdown" name="new_city" value="<?php echo set_value('new_city');?>" id="new_city">
          </div>
          </div>
          </div>
          </div>
          <div class="col-sm-6">
            <div class="single">
              <p>Company Name <a class="tooltip-btn" title="Please Enter Your Company Name"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
                  <input type="text" name="member_company_name" value="" id="member_company_name">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="single">
              <p>Function Title <a class="tooltip-btn" title="Please Enter Your Designation"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
                  <input type="text" name="member_function_title" value="" id="member_function_title">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="single">
              <p>Phone Number <a class="tooltip-btn" title="Please Enter Your Phone Number"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
                  <input type="text" onKeyUp="this.value=this.value.replace(/[^\d]/,'')" name="phone" id="usr_phone" value="<?php if (isset($all_data[0]['members_phone'])) { echo $all_data[0]['members_phone']; }?>">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="single">
              <p>Interested Categories<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please Select Interested Categories"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
                <div class="select">
                    <select class="select-box cat-select" name="cat_id[]" id="usr_cat_id" multiple="multiple" value="<?php echo set_value('cat_id[]');?>">
                      <option value="">Choose Category</option>
                      <?php foreach($catdata as $catdata) {?>
                      <option value="<?php echo $catdata['category_id'];?>" class=""><?php echo $catdata['category_name'];?> </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-sm-6">
            <div class="single">
              <p>Full Address <a class="tooltip-btn" title="Please Enter Your Full Address"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
<textarea name="address" id="usr_address"><?php if (isset($all_data[0]['members_address'])) { echo $all_data[0]['members_address']; }?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="single">
              <p contenteditable="">Your profile description <a class="tooltip-btn" title="Please Enter Other Details"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
<textarea name="other" id="usr_other"><?php if (isset($all_data[0]['members_other'])) { echo $all_data[0]['members_other']; }?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="single">
              <p>Privacy Policy and Membership Rules <span style="color:#F00">*</span> </p>
              <div class="form-row">
                <div class="field">
                  <div class="all-check">
                    <div class="check">
                      <input type="checkbox" id="usr_membership_rules" name="membership_rules" value="1" required>
                      <label for="usr_membership_rules"><a href="<?php echo base_url('Home/privacy'); ?>" target="_blank">Accept our privacy policy and membership rules.</a></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php /*?>
		  <div class="col-sm-6">
            <div class="single">
              <p>Privacy Policy<span style="color:#F00">*</span><br>
                <a>Click Here</a> </p>
              <div class="form-row">
                <div class="field">
                  <div class="all-check">
                    <div class="check">
                      <input type="checkbox" id="usr_privacy_rules" name="privacy_policy" value="privacy_policy">
                      <label for="usr_privacy_rules">Accept our privacy policy and membership rules</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  <?php */?>
          <div class="clearfix"></div>
          <div class="col-md-4 col-sm-6 col-centered">
            <div class="single">
              <div class="form-row">
                <div class="field">
                  <button type="submit" onClick="return user_registration();" >Register</button>
                </div>
              </div>
            </div>
          </div>
          <?php echo form_close();?> </div>
      </div>
    </div>
  </section>
</main>
<?php include('include/footer.php');?>
</body>
</html>
