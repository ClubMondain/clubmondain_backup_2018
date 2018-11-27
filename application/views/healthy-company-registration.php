<?php include('include/head.php');?>
<body>
<?php include('include/header.php');?>
<main>
  <section class="form-sec shadow-top">
    <div class="container">
      <h3>Company <em>Registration</em></h3>
      <p>Great you are joining to co-create the easiest way to stay fit for business travellers. </p>
      <div class="error_reg">
        <?php if(isset($msg) && $msg !=''){ ?>
        <div class="alert <?php echo $msgclass;?>"> <?php echo $msg;?> </div>
        <?php }?>
      </div>
      <div class="details-form mem-form">
        <div class="row">
        <?php
		$formDetails = array('id'=>'cmp_reg','name'=>'cmp_reg','method'=>'post','novalidate'=>'novalidate','autocomplete'=>'off');
        echo form_open_multipart('Home/insert_company_reg',$formDetails);
        ?>
          <div class="col-sm-6">
            <div class="single">
              <p>Company Name<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please Enter Your Company Name"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
                  <input type="text" name="company_name" id="company_name" value="<?php echo set_value('company_name')?>">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="single">
              <p>Contact Person<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please Enter Contact Person Name"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
                  <input type="text" name="company_c_person" id="company_c_person" value="<?php echo set_value('company_c_person')?>">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="single">
              <p>Email<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please Enter Company Email Address"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
                  <input type="email" name="company_email" id="company_email" value="<?php echo set_value('company_email')?>">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="single">
              <p>Phone Number <a class="tooltip-btn" title="Please Enter Company Phone No"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
                  <input type="tel"  name="company_phone" id="company_phone" value="<?php echo set_value('company_phone')?>" onKeyUp="this.value=this.value.replace(/[^\d]/,'')">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="single">
              <p>Password<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please Enter Password"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
                  <input type="password"  name="company_password" id="company_password" value="<?php echo set_value('company_password')?>">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="single">
              <p>Confirm Password<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please Confirm Password"><i class="fa fa-info-circle"></i></a> </p>
              <div class="form-row">
                <div class="field">
                  <input type="password"  name="cnf_password" id="company_cnf_password" value="<?php echo set_value('cnf_password')?>">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-12">
                <div class="single">
                  <p>Address <a class="tooltip-btn" title="Please Enter Street Address"><i class="fa fa-info-circle"></i></a> </p>
                  <div class="form-row">
                    <div class="field">
                      <input type="text" placeholder="Street Address" name="company_street" id="company_street" value="<?php echo set_value('company_street')?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="single">
                  <div class="form-row">
                    <div class="field">
                      <input type="text" placeholder="Street Address 2" name="company_street2" id="company_street2" value="<?php echo set_value('company_street2')?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="single">
                  <div class="form-row">
                    <div class="field">
                      <input type="text" placeholder="State" name="company_state" id="company_state" value="<?php echo set_value('company_state')?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="single">
                  <div class="form-row">
                    <div class="field">
                      <input type="text" placeholder="Postal Code" name="company_postal_code" id="company_postal_code" value="<?php echo set_value('company_postal_code')?>" onKeyUp="this.value=this.value.replace(/[^\d]/,'')">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="single">
                  <div class="form-row">
                    <div class="field">
                      <div class="select">
                        <select name="country" id="company_country" class="js-example-basic-single" onChange="set_country(this.value,'<?php echo base_url();?>');">
                          <?php /*?>multiple="multiple"<?php */?>
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
              <div class="col-md-4">
                <div class="single">
                  <div class="form-row">
                    <div class="field">
                      <div class="select">
                        <select class="js-city-single company_city_list" name="city" id="eventcity_list">
                          <option value="">Choose City</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
              <div class="single">
              <div class="form-row">
              <div class="field">
              <input type="text" placeholder="New city name if not present in the city dropdown" name="new_city" value="<?php echo set_value('new_city');?>" id="new_city">
              </div>
              </div>
              </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 opening-hours">
            <div class="single">
              <p><strong>Opening Hour<span style="color:#F00">*</span></strong> <a class="tooltip-btn" title="Please Select Opening Hours"><i class="fa fa-info-circle"></i></a> </p>
            </div>
            <div class="row">
              <?php $days = array('Monday','Tuesday','Thursday','Wednesday','Friday','Saturday','Sunday');
               /* for($j=0;$j<7;$j++){?>
              <div class="col-lg-12">
                <div class="single">
                  <div class="row">
                    <div class="col-lg-1 col-sm-2">
                      <p class="day-name"><?php echo $day[$j];?></p>
                      <input type="hidden" name="data[<?php echo $j;?>][day_name]" value="<?php echo $day[$j];?>">
                    </div>
                    <div class="col-lg-3 col-sm-4">
                      <p class="difference">From</p>
                      <div class="form-row">
                        <div class="field">
                          <div class="date">
                            <div class="col-xs-4">
                              <div class="row">
                                <div class="select">
                                  <select name="data[<?php echo $j;?>][from_opening_hour]" id="from_opening_hour">
                                    <option value="">Choose</option>
                                    <?php for($i=1;$i<=12;$i++){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-4">
                              <div class="row">
                                <div class="select">
                                  <select name="data[<?php echo $j;?>][from_opening_mint]" id="from_opening_mint">
                                    <option value="">Choose</option>
                                    <?php for($i=0;$i<60;$i++){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-4">
                              <div class="row">
                                <div class="select">
                                  <select name="data[<?php echo $j;?>][from_opening_indication]" id="from_opening_indication">
                                    <option value="">Choose</option>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-4">
                      <p class="difference">To</p>
                      <div class="form-row">
                        <div class="field">
                          <div class="date">
                            <div class="col-xs-4">
                              <div class="row">
                                <div class="select">
                                  <select name="data[<?php echo $j;?>][to_opening_hour]" id="from_opening_hour">
                                    <option value="">Choose</option>
                                    <?php for($i=1;$i<=12;$i++){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-4">
                              <div class="row">
                                <div class="select">
                                  <select name="data[<?php echo $j;?>][to_opening_mint]" id="from_opening_mint">
                                    <option value="">Choose</option>
                                    <?php for($i=0;$i<60;$i++){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-4">
                              <div class="row">
                                <div class="select">
                                  <select name="data[<?php echo $j;?>][to_opening_indication]" id="from_opening_indication">
                                    <option value="">Choose</option>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="check closed">
                        <input type="checkbox" id="opening_hour_close_<?php echo $j;?>" name="data[<?php echo $j;?>][opening_hour_close]" value="1">
                        <label for="opening_hour_close_<?php echo $j;?>">Closed</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php }*/?>

               <?php foreach($days as $k => $d){?>
              <div class="col-lg-12">
                <div class="single">
                  <div class="row">
                    <div class="col-lg-2 col-sm-2">
                      <p class="day-name"><?php echo $d; ?></p>
                      <input type="hidden" name="day_name[<?php echo $k; ?>]" value="<?php echo $d; ?>" id="day_name_[<?php echo $k; ?>]">
                    </div>
                    <div class="col-lg-4 col-sm-4" id="divf_<?php echo $k; ?>">
                      <p class="difference">From</p>
                      <div class="form-row">
                        <div class="field">
                          <div class="date">
                            <div class="col-xs-4">
                              <div class="row">
                                <div class="select">
                                  <select name="from_opening_hour[<?php echo $k; ?>]" id="from_opening_hour_[<?php echo $k; ?>]" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
                                    <option value="">Choose</option>
                                    <?php for($i=1;$i<=12;$i++){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-4">
                              <div class="row">
                                <div class="select">
                                  <select name="from_opening_mint[<?php echo $k; ?>]" id="from_opening_mint_[<?php echo $k; ?>]"  onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
                                    <option value="">Choose</option>
                                    <?php for($i=00;$i<60;$i+=15){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-4">
                              <div class="row">
                                <div class="select">
                                  <select name="from_opening_indication[<?php echo $k; ?>]" id="from_opening_indication_[<?php echo $k; ?>]">
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-sm-4" id="divs_<?php echo $k; ?>">
                      <p class="difference">To</p>
                      <div class="form-row">
                        <div class="field">
                          <div class="date">
                            <div class="col-xs-4">
                              <div class="row">
                                <div class="select">
                                 <select name="to_opening_hour[<?php echo $k; ?>]" id="to_opening_hour_[<?php echo $k; ?>]" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
                                    <option value="">Choose</option>
                                    <?php for($i=1;$i<=12;$i++){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-4">
                              <div class="row">
                                <div class="select">
                                  <select name="to_opening_mint[<?php echo $k; ?>]" id="to_opening_mint_[<?php echo $k; ?>]" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
                                    <option value="">Choose</option>
                                    <?php for($i=0;$i<60;$i+=15){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-4">
                              <div class="row">
                                <div class="select">
                                  <select name="to_opening_indication[<?php echo $k; ?>]" id="to_opening_indication_[<?php echo $k; ?>]">
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="check closed">
                        <input type="checkbox" onClick="disable('divf_<?php echo $k; ?>','divs_<?php echo $k; ?>','opening_hour_close_<?php echo strtolower($d); ?>')" id="opening_hour_close_<?php echo strtolower($d); ?>" name="opening_hour_close[<?php echo $k; ?>]" value="1">
                        <label for="opening_hour_close_<?php echo strtolower($d); ?>">Closed</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="single">
            <p>Description <a class="tooltip-btn" title="Description of your company and how you add a healthy space to clubmondain"><i class="fa fa-info-circle"></i></a> </p>
            <div class="form-row">
              <div class="field">
                <textarea name="company_description" id="company_description"><?php echo set_value('company_description')?></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="single">
            <p>Company Logo<a class="tooltip-btn" title="" data-original-title="Please Upload Company Logo"><i class="fa fa-info-circle"></i></a> </p>
            <div class="form-row">
              <div class="field">
                <div class="upload">
                  <input id="photo-img" onChange="document.getElementById('photo-img-label').innerHTML = document.getElementById('photo-img').value" type="file" name="company_pic">
                  <label for="photo-img" id="photo-img-label">Upload Your Photo</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="single">
            <p>Where Did you hear about us?<span style="color:#F00">*</span> </p>
            <div class="form-row">
              <div class="field">
                <div class="all-check">
                  <div class="check">
                    <input type="checkbox" id="company_about_check1" name="company_about_us[]" value="client_check" class="company_about_us">
                    <label for="company_about_check1">Client of ours</label>
                  </div>
                  <div class="check">
                    <input type="checkbox" id="company_about_check2" name="company_about_us[]" value="aricle_check" class="company_about_us">
                    <label for="company_about_check2">News Article</label>
                  </div>
                  <div class="check">
                    <input type="checkbox" id="company_about_check3" name="company_about_us[]" value="other_check" class="company_about_us">
                    <label for="company_about_check3">Other</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="single">
            <p>Membership Rules<span style="color:#F00">*</span> <br>
              <a href="<?php echo base_url('Home/membershp-rules'); ?>" target="_blank">Click Here</a> </p>
            <div class="form-row">
              <div class="field">
                <div class="all-check">
                  <div class="check">
                    <input type="checkbox" id="company_membership_rule" name="company_membership_rule" value="1">
                    <label for="company_membership_rule">Accept our membership rules</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="single">
            <p>Privacy Policy<span style="color:#F00">*</span><br>
              <a href="<?php echo base_url('Home/privacy'); ?>" target="_blank">Click Here</a> </p>
            <div class="form-row">
              <div class="field">
                <div class="all-check">
                  <div class="check">
                    <input type="checkbox" id="company_privacy_policy" name="company_privacy_policy" value="1">
                    <label for="company_privacy_policy">Accept our privacy policy</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--<div class="col-sm-12">
            <div class="single text-center">
                <p><em>Once you submit your application, we will contact you sortly</em></p>
                <p><em>Thank you for considering Club Mondain as your space for healthy lifestyle.</em></p>
            </div>
            </div>-->

        <div class="clearfix"></div>
        <div class="col-md-4 col-sm-6 col-centered">
          <div class="single">
            <div class="form-row">
              <div class="field">
                <button type="submit" onClick="return company_registration();" >Register</button>
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
<script type="text/javascript">
$(document).ready(function() {
  $(".js-example-basic-single").select2({
	  placeholder: "Choose Country",
	  });
});
$(document).ready(function() {
  $(".js-city-single").select2({
	  });
});
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACjdpaolaUHA-rjK_YEvP8UdQi9Z3YIwk&libraries=places&callback=initAutocomplete"
async defer></script>
</body>
</html>
