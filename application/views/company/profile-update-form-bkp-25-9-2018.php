<?php 
$this->load->view('include/head');?>
<body>
<?php 
$this->load->view('include/header');?>
<?php /*echo '<pre>' ;
print_r($opening_hour);
echo '</pre>';*/
//echo $_SESSION['user_details'][0]['id'];*/
//$trainer_dob = explode('-',$full_profile[0]['trainer_dob']);
$company_about_us = explode(',',$full_profile[0]['about_us']);
//print_r($company_about_us);?>
    <main class="dashboard" id="dashboard-main">
    	<?php $this->load->view('include/left-sidebar');?>
        <div class="dashboard-main">
        
        	<div class="left">
                <div class="dashboard-toggle" id="dashboard-toggle">
                    <button><i class="fa fa-bars"></i></button>
                </div>
     <?php if(isset($msg) && $msg !=''){ ?>
          <div class="alert <?php echo $msg_class;?>"> <?php echo $msg;?> </div>
          <?php }?>
        
        <div class="single-content">
                	<div class="dashboard-head">
                    	<h2> Profile Update</h2>
                    </div>
            	
                <div class="details-form mem-form">
                	<div class="row">
                <?php $formDetails = array('id'=>'cmp_reg','name'=>'cmp_reg','method'=>'post','novalidate'=>'novalidate','autocomplete'=>'off');
				echo form_open_multipart('CompanyDashboard/update_company_reg',$formDetails);
				?>
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Company Name<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text" name="company_name" id="company_name" value="<?php echo $full_profile[0]['company_name'];?>">
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Contact Person<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text" name="company_c_person" id="company_c_person" value="<?php echo $full_profile[0]['company_person'];?>">
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                		<div class="single">
                    	<p>Email<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="email" name="company_email" id="company_email" value="<?php echo $full_profile[0]['email'];?>">
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Phone Number
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="tel"  name="company_phone" id="company_phone" value="<?php echo $full_profile[0]['phone'];?>" onKeyUp="this.value=this.value.replace(/[^\d]/,'')">
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-12">
                    	<div class="row">
                            <div class="col-md-12">
                                <div class="single">
                                    <p>Address
                                        <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                                    </p>
                                    <div class="form-row">
                                        <div class="field">
                                            <input type="text" placeholder="Street Address" name="company_street" id="company_street" value="<?php echo $full_profile[0]['street_address_1'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">                                
                                <div class="single">
                                    <div class="form-row">
                                        <div class="field">
                                            <input type="text" placeholder="Street Address 2" name="company_street2" id="company_street2" value="<?php echo $full_profile[0]['street_address_2'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
            			<div class="col-sm-6">
                          <div class="single">
                            <p>Country <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
                            <div class="form-row">
                              <div class="field">
                                <div class="select">
                                  <select class="js-example-basic-single" name="country" id="user_country" onChange="set_country(this.value,'<?php echo base_url();?>');">
                                    <?php foreach($country as $country){?>
                                    <option value="">Choose Country</option>
                                    <option value="<?php echo $country['country_id'];?>" <?php if($full_profile[0]['country_id'] == $country['country_id']){?> selected <?php }?>><?php echo $country['country_name'];?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
           				<div class="col-sm-6">
                          <div class="single">
                            <p>City<span style="color:#F00">*</span> <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
                            <div class="form-row">
                              <div class="field">
                                <div class="select">
                                  <select class="js-example-basic-single company_city_list" name="city" id="eventcity_list">
                                    <option value="">Choose City</option>
                                    <?php foreach($city as $city){?>
                                    <option value="<?php echo $city['city_id'];?>" <?php if($full_profile[0]['city_id'] == $city['city_id']){?> selected <?php }?>><?php echo $city['city_name'];?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                            <div class="col-md-6">                                
                                <div class="single">
                                    <div class="form-row">
                                        <div class="field">
                                            <input type="text" placeholder="State" name="company_state" id="company_state" value="<?php echo $full_profile[0]['state'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">                                
                                <div class="single">
                                    <div class="form-row">
                                        <div class="field">
                                            <input type="text" placeholder="Postal Code" name="company_postal_code" id="company_postal_code" value="<?php echo $full_profile[0]['postal_code'];?>" onKeyUp="this.value=this.value.replace(/[^\d]/,'')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>                    
                    </div>
                
                    <div class="col-sm-12 opening-hours">
                        <div class="single">
                            <p><strong>Opening Hour<span style="color:#F00">*</span></strong>
                                <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                            </p>
                        </div>
                    	<div class="row">
                        <!-- TIME PICKER -->
                        	<?php /*?><div>
        <label for="timepicker_6">Time picker with period (AM/PM) in input and with hours leading 0s :</label>
        <input type="text" style="width: 70px;" id="timepicker_6" value="01:30 PM" />
        <script type="text/javascript">
            $(document).ready(function() {
                $('#timepicker_6').timepicker({
                    showPeriod: true,
                    showLeadingZero: true
                });
            });
        </script>

        <a onclick="$('#script_6').toggle(200)">[Show code]</a>
<pre id="script_6" style="display: none" class="code">$('#timepicker').timepicker({
    showPeriod: true,
    showLeadingZero: true
});</pre>
    </div><?php */?>
    
    						<div class="row">
            			<?php $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");?>
						<?php foreach($days as $k => $d){
							if(isset($opening_hour[$k]['opening_hour_from']) || isset($opening_hour[$k]['opening_hour_to']) || isset($opening_hour[$k]['opening_hour_close'])){
								$opening_hour_from_arr = explode("-", $opening_hour[$k]['opening_hour_from']);
								$opening_hour_to_arr = explode("-", $opening_hour[$k]['opening_hour_to']);
								$opening_hour_close = $opening_hour[$k]['opening_hour_close'] ? 'checked="checked"' : '';}?>
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
                                                <?php 
												for($i=1;$i<=12;$i++){
													$selected = '';
													if($opening_hour_from_arr[0] == $i){
														$selected = 'selected="selected"';
													}
												?>
                                                <option <?php echo $selected; ?> value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php }?>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <div class="row">
                                            <div class="select">
                                              <select name="from_opening_mint[<?php echo $k; ?>]" id="from_opening_mint_[<?php echo $k; ?>]"  onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
                                                <?php for($i=0;$i<60;$i+=15){
													$selected = '';
													if($opening_hour_from_arr[1] == $i){
														$selected = 'selected="selected"';
													}
												?>
                                                <option <?php echo $selected; ?> value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php }?>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <div class="row">
                                            <div class="select">
                                              <select name="from_opening_indication[<?php echo $k; ?>]" id="from_opening_indication_[<?php echo $k; ?>]">
                                                <option <?php if(isset($opening_hour_from_arr[2])) { echo ($opening_hour_from_arr[2] == "AM") ? 'selected="selected"' : ''; }?> value="AM">AM</option>
                                                <option <?php if(isset($opening_hour_from_arr[2])) { echo ($opening_hour_from_arr[2] == "PM") ? 'selected="selected"' : ''; }?> value="PM">PM</option>
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
                                                <?php 
												for($i=1;$i<=12;$i++){
													$selected = '';
													if($opening_hour_to_arr[0] == $i){
														$selected = 'selected="selected"';
													}
												?>
                                                <option <?php echo $selected; ?> value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php }?>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <div class="row">
                                            <div class="select">
                                              <select name="to_opening_mint[<?php echo $k; ?>]" id="to_opening_mint_[<?php echo $k; ?>]" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
                                                <?php for($i=0;$i<60;$i+=15){
													$selected = '';
													if($opening_hour_to_arr[1] == $i){
														$selected = 'selected="selected"';
													}?>
                                                <option <?php echo $selected; ?> <?php echo $selected; ?> value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php }?>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <div class="row">
                                            <div class="select">
                                              <select name="to_opening_indication[<?php echo $k; ?>]" id="to_opening_indication_[<?php echo $k; ?>]">
                                                <option <?php if(isset($opening_hour_to_arr[2])) { echo ($opening_hour_to_arr[2] == "AM") ? 'selected="selected"' : ''; }?> value="AM">AM</option>
                                                <option <?php if(isset($opening_hour_to_arr[2])) { echo ($opening_hour_to_arr[2] == "PM") ? 'selected="selected"' : ''; }?> value="PM">PM</option>
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
                                    <input <?php if(isset($opening_hour[$k]['opening_hour_close'])){ echo $opening_hour_close; }?> type="checkbox" onClick="disable('divf_<?php echo $k; ?>','divs_<?php echo $k; ?>','opening_hour_close_<?php echo strtolower($d); ?>')" id="opening_hour_close_<?php echo strtolower($d); ?>" name="opening_hour_close[<?php echo $k; ?>]" value="1">
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
                            <p>Your profile description
                                <a class="tooltip-btn" title="Description of your company and how you add a healthy space to clubmondain"><i class="fa fa-info-circle"></i></a>
                            </p>
                            <div class="form-row">
                                <div class="field">
                                    <textarea name="company_description" id="company_description"><?php echo $full_profile[0]['company_description'];?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Profile Picture
                        	<a class="tooltip-btn" title="" data-original-title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<div class="upload">
                            		<input id="photo-img" onchange="document.getElementById('photo-img-label').innerHTML = document.getElementById('photo-img').value" type="file" name="company_pic">
                                    <label for="photo-img" id="photo-img-label">Upload Your Photo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                	         
            <div class="col-sm-6">
              <div class="single">
                <p>Facebook<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <input type="text" name="user_facebook" value="<?php echo $full_profile[0]['user_facebook']?>" id="usr_lname" placeholder="Your Facebook Link">
                  </div>
                </div>
              </div>
            </div>
           	<div class="col-sm-6">
              <div class="single">
                <p>Instagram <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <input type="text" name="user_instagram" value="<?php echo $full_profile[0]['user_instagram']?>" id="usr_lname" placeholder="Your Instagram Link">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="single">
                <p>Twitter<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <input type="text" name="user_twitter" value="<?php echo $full_profile[0]['user_twitter']?>" id="usr_lname" placeholder="Your Twitter Link">
                  </div>
                </div>
              </div>
            </div>
                    <div class="col-sm-12">
                	<div class="single">
                    	<p>I Where Did you hear about us?<span style="color:#F00">*</span>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<div class="all-check">
                                    <div class="check">
                                        <input type="checkbox" id="company_about_check1" name="company_about_us[]" value="client_check" class="company_about_us" <?php if(!empty($company_about_us[0])){
											?>checked <?php }?>>
                                        <label for="company_about_check1">Client of ours</label>
                                    </div>
                                    <div class="check">
                                        <input type="checkbox" id="company_about_check2" name="company_about_us[]" value="aricle_check" class="company_about_us" <?php if(!empty($company_about_us[1])){
											?>checked <?php }?>>
                                        <label for="company_about_check2">News Article</label>
                                    </div>
                                    <div class="check">
                                        <input type="checkbox" id="company_about_check3" name="company_about_us[]" value="other_check" class="company_about_us" <?php if(!empty($company_about_us[2])){
											?>checked <?php }?>>
                                        <label for="company_about_check3">Other</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <input type="hidden" id="company_membership_rule" name="company_membership_rule" value="1">
                    <input type="hidden" id="company_privacy_policy"  name="company_privacy_policy" value="1">                    
                    <div class="clearfix"></div>
                
                    <div class="col-md-4 col-sm-6 col-centered">
                	<div class="single">
                        <div class="form-row">
                        	<div class="field">
                            	<button type="submit" onclick="return company_Profile_update();" >Update Profile</button>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <?php echo form_close();?>
                    
                    </div>
                </div>
            </div>
                            
            </div>
            
        	<?php $this->load->view('include/right-sidebar');?>
            
        </div>
    </main>
   <?php 
$this->load->view('include/footer');?>
<script type="text/javascript">
$(".js-multiple-category").select2({
	placeholder: "Choose Category",
  	allowClear: true
	});
</script>
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

<!--TIME PICKER -->
<?php /*?><link rel="stylesheet" href="<?php echo base_url('assets/');?>js/include/ui-1.10.0/ui-lightness"/>
<link rel="stylesheet" href="<?php echo base_url('assets/');?>js/include/jquery.ui.timepicker.css?v=0.3.3" type="text/css"/>

<script src="<?php echo base_url('assets/');?>js/include/jquery-1.9.0.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/');?>js/include/ui-1.10.0/jquery.ui.core.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/');?>js/include/ui-1.10.0/jquery.ui.widget.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/');?>js/include/ui-1.10.0/jquery.ui.tabs.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/');?>js/include/ui-1.10.0/jquery.ui.position.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/');?>js/include/jquery.ui.timepicker.js?v=0.3.3"></script>

    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><?php */?>
</body>
</html>