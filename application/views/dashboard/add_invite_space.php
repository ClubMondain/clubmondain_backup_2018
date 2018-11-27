<?php
   $this->load->view('include/head');
   ?>
<body>
   <?php
      $this->load->view('include/header');
      $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
      ?>
   <main class="dashboard" id="dashboard-main">
      <?php $this->load->view('include/left-sidebar');?>
      <div class="dashboard-main">
         <div class="left">
            <div class="dashboard-toggle" id="dashboard-toggle">
               <button><i class="fa fa-bars"></i></button>
            </div>
            <?php if(isset($msg) && $msg !=''){ ?>
            <div class="<?php echo $msgclass;?>"> <?php echo $msg;?> </div>
            <?php }?>
            <div class="single-content">
               <div class="dashboard-head">
                  <h2> Add Delegate Space</h2>
                  <a href="<?php echo base_url('Energiser/list_invite_space');?>">LIST DELEGATE SPACE </a> 
               </div>
               <div class="details-form">
                  <?php $formDetails= array('id'=>'insert_business','method'=>'post','class'=>'','name'=>'insert_business');?>
                  <?php echo form_open_multipart('Energiser/insert_invite_space',$formDetails);?>
                  <div class="row">
                  
                     <div class="col-sm-12">
                        <div class="single">
                           <p>Select Delegate Space Type<span style="color:#F00">*</span> <a class="tooltip-btn" title="Select Public for your Conference / Event to be visible to all or Private if only visible for delegates"><i class="fa fa-info-circle"></i></a> </p>
                           <div class="form-row">
                              <div class="field">
                                 <div class="select">
                                    <select class="select-box cat-select" name="invite_type" id="invite_type">
                                       <option value="">Select Delegate Space Type </option>
                                       <option value="1" class="">Public</option>
                                        <option value="2" class="">Private</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="single">
                           <p>Name of Delegate Space<span style="color:#F00">*</span> <a class="tooltip-btn" title="Type name of Conference / Event"><i class="fa fa-info-circle"></i></a> </p>
                           <div class="form-row">
                              <div class="field">
                                 <input type="text" name="business_name" id="bsn_name" value="<?php echo set_value('business_name');?>">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="single">
                           <p>Website <a class="tooltip-btn" title="Type Conference website URL"><i class="fa fa-info-circle"></i></a> </p>
                           <div class="form-row">
                              <div class="field">
                                 <input type="text" name="business_website_URL" id="bsn_website" value="<?php echo set_value('business_website_URL');?>">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="single">
                           <p>Category<span style="color:#F00">*</span> <a class="tooltip-btn" title="Select Vitality Category of Conference / Event"><i class="fa fa-info-circle"></i></a> </p>
                           <div class="form-row">
                              <div class="field">
                                 <div class="select">
                                    <select class="select-box cat-select" name="cat_id[]" id="bsn_cat_id" multiple="multiple">
                                       <option value="">Choose Category</option>
                                       <?php foreach($category as $catdata) {?>
                                       <option value="<?php echo $catdata['category_id'];?>" class=""><?php echo $catdata['category_name'];?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="single">
                           <p>Country<span style="color:#F00">*</span> <a class="tooltip-btn" title="Select the venue country"><i class="fa fa-info-circle"></i></a> </p>
                           <div class="form-row">
                              <div class="field">
                                 <div class="select">
                                    <select class="js-example-basic-single" name="country" id="bsn_country" onChange="get_city(this.value,'<?php echo base_url();?>');">
                                       <?php foreach($country as $country){?>
                                       <option value="">Choose Country</option>
                                       <option value="<?php echo $country['country_id'];?>"><?php echo $country['country_name'];?></option>
                                       <?php }?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="single">
                           <p>City<span style="color:#F00">*</span> <a class="tooltip-btn" title="Select the venue city"><i class="fa fa-info-circle"></i></a> </p>
                           <div class="form-row">
                              <div class="field">
                                 <div class="select">
                                    <select class="js-city-single city_list" name="city" id="eventcity_list">
                                       <option value="">Choose City</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="single">
                           <p> Street Address<span style="color:#F00">*</span> <a class="tooltip-btn" title="Type street address and select by clicking google suggestion"><i class="fa fa-info-circle"></i></a> </p>
                           <div class="form-row">
                              <div class="field">
                                 <input type="text" name="business_street" id="autocomplete" value="<?php echo set_value('business_street')?>" onFocus="geolocate()" class="bsn_street">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="single">
                           <p>Postal Code<span style="color:#F00">*</span> <a class="tooltip-btn" title="Type (numeric) postal code"><i class="fa fa-info-circle"></i></a> </p>
                           <div class="form-row">
                              <div class="field">
                                 <input type="text" name="business_postal_code" id="bsn_postal_code" value="<?php echo set_value('business_postal_code')?>">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="single">
                           <p>Space Image<a class="tooltip-btn" title="Recommended image size 813x300"><i class="fa fa-info-circle"></i></a> </p>
                           <div class="form-row">
                              <div class="field">
                                 <div class="upload">
                                    <input id="bsn_profile_pic" type="file" name="business_pic" onChange="document.getElementById('photo-img-label').innerHTML = document.getElementById('bsn_profile_pic').files[0].name">
                                    <label for="bsn_profile_pic" id="photo-img-label">Upload Your Photo</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="single">
                           <p>Space Banner Image<a class="tooltip-btn" title="Recommended image size 1346x250"><i class="fa fa-info-circle"></i></a> </p>
                           <div class="form-row">
                              <div class="field">
                                 <div class="upload">
                                    <input id="bsn_banner_pic" onChange="document.getElementById('banner-img-label').innerHTML = document.getElementById('bsn_banner_pic').files[0].name" type="file" name="business_banner_pic">
                                    <label for="bsn_banner_pic" id="banner-img-label">Upload Your Banner</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12 opening-hours">
                     <div class="single">
                        <p><strong>Opening Hours <span style="color:#F00">*</span> </strong> <a class="tooltip-btn" title="Select main program times"><i class="fa fa-info-circle"></i></a> </p>
                     </div>
                     <div class="row">
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
                                                      <select name="from_opening_hour[<?php echo $k; ?>]" id="from_opening_hour_<?php echo $k; ?>" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
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
                                                      <select name="from_opening_mint[<?php echo $k; ?>]" id="from_opening_mint_<?php echo $k; ?>"  onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
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
                                                      <select name="to_opening_hour[<?php echo $k; ?>]" id="to_opening_hour_<?php echo $k; ?>" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
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
                                                      <select name="to_opening_mint[<?php echo $k; ?>]" id="to_opening_mint_<?php echo $k; ?>" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
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
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="single">
                           <p>Description<span style="color:#F00">*</span> <a class="tooltip-btn" title="Type a short summary about your Conference / Event"><i class="fa fa-info-circle"></i></a> </p>
                           <div class="form-row">
                              <div class="field">
                                 <textarea name="business_description" id="bsn_description"></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-sm-6 col-centered">
                     <div class="single">
                        <div class="form-row">
                           <div class="field">
                              <button type="submit" onClick="return invite_spave_validation();">ADD DELEGATE SPACE DETAILS</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php echo form_close();?> 
            </div>
         </div>
         <?php $this->load->view('include/right-sidebar');?>
      </div>
   </main>
   <?php $this->load->view('include/footer');?>
   <script type="text/javascript">
      $(".js-multiple-category").select2({
      placeholder: "Choose Category",
      allowClear: true
      });
   </script>
   <script type="text/javascript">
      $(document).ready(function() {
      $(".js-example-basic-single").select2({
      placeholder: "Select Country",
      });
      });
      $(document).ready(function() {
      $(".js-city-single").select2({
      placeholder: "Select City",
      });
      });
   </script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACjdpaolaUHA-rjK_YEvP8UdQi9Z3YIwk&libraries=places&callback=initAutocomplete"
      async defer></script>
   <script>
      //=========================================Ajax For City Dropdown ==========================================
      function get_city(e)
      {
      $.ajax({
      url: '<?php echo base_url();?>'+"Energiser/check_city",
      dataType: 'html',
      type: 'POST',
      data:{country:e},
      success: function(result)
      {
      	//result = result[0].replace(/\s/g, '');
      	//alert(result);
      	/*<option value="">Choose City</option>
      	 $('#business_city').html(html);*/
      	 $('#eventcity_list').html(result);
      }
      });
      }
      //=========================================Ajax For City Dropdown ==========================================
   </script>
   
   
   
   <script>
   	//////////////////////////////////////////////// FOR INVITE SPACE VALIDATION /////////////////////////////////////////
function invite_spave_validation()
{
	var invite_type = $("#invite_type").val();	
	var bsn_url = $("#bsn_website").val();
	var bsn_name = $("#bsn_name").val();
	var bsn_cat_id = $("#bsn_cat_id").val();
	var bsn_country = $("#bsn_country").val();
	var bsn_city = $(".city_list").val();
	var bsn_description = $("#bsn_description").val();
	var bsn_postal_code = $("#bsn_postal_code").val();
	var bsn_profile_pic = $("#bsn_profile_pic").val();
	var bsn_banner_pic = $("#bsn_banner_pic").val();
	var bsn_street = $(".bsn_street").val();
	
	var frm_openhr1 = $("#from_opening_hour_0").val();
	var frm_openhr2 = $("#from_opening_hour_1").val();
	var frm_openhr3 = $("#from_opening_hour_2").val();
	var frm_openhr4 = $("#from_opening_hour_3").val();
	var frm_openhr5 = $("#from_opening_hour_4").val();
	var frm_openhr6 = $("#from_opening_hour_5").val();
	var frm_openhr7 = $("#from_opening_hour_6").val();
	
	
	var frm_openmin1 = $("#from_opening_mint_0").val();
	var frm_openmin2 = $("#from_opening_mint_1").val();
	var frm_openmin3 = $("#from_opening_mint_2").val();
	var frm_openmin4 = $("#from_opening_mint_3").val();
	var frm_openmin5 = $("#from_opening_mint_4").val();
	var frm_openmin6 = $("#from_opening_mint_5").val();
	var frm_openmin7 = $("#from_opening_mint_6").val();

	
	
	var to_openhr1 = $("#to_opening_hour_0").val();
	var to_openhr2 = $("#to_opening_hour_1").val();
	var to_openhr3 = $("#to_opening_hour_2").val();
	var to_openhr4 = $("#to_opening_hour_3").val();
	var to_openhr5 = $("#to_opening_hour_4").val();
	var to_openhr6 = $("#to_opening_hour_5").val();
	var to_openhr7 = $("#to_opening_hour_6").val();



	var to_openmin1 = $("#to_opening_mint_0").val();
	var to_openmin2 = $("#to_opening_mint_1").val();
	var to_openmin3 = $("#to_opening_mint_2").val();
	var to_openmin4 = $("#to_opening_mint_3").val();
	var to_openmin5 = $("#to_opening_mint_4").val();
	var to_openmin6 = $("#to_opening_mint_5").val();
	var to_openmin7 = $("#to_opening_mint_6").val();
	
	var checkbox = $('input[type=checkbox]:checked').length;
	
	if(checkbox != 7 ){
		if( (frm_openhr1 == '' || frm_openmin1 == '' || to_openhr1 == '' || to_openmin1 == '') && ( frm_openhr2 == '' || frm_openmin2 == '' || to_openhr2 == '' || to_openmin2 == '' ) && (frm_openhr3 == '' || frm_openmin3 == '' || to_openhr3 == '' || to_openmin3 == ''   ) && (frm_openhr4 == '' || frm_openmin4 == '' || to_openhr4 == '' || to_openmin4 == '') && (frm_openhr5 == '' || frm_openmin5 == '' || to_openhr5 == '' || to_openmin5 == '') && (frm_openhr6 == '' || frm_openmin6 == '' || to_openhr6 == '' || to_openmin6 == '' ) && (frm_openhr7 == '' || frm_openmin7 == '' || to_openhr7 == '' || to_openmin7 == '') ){
		alert_message('Please enter opening hours!','warning','btn-warning');
		return false;
	}
	}
	

	if( invite_type == '')
	{
		alert_message('Please Choose Delegate Space Type!','warning','btn-warning');
		return false;
	}
	

	if( bsn_name == '')
	{
		alert_message('Please Provide Delegate Space Name!','warning','btn-warning');
		return false;
	}	
	if( bsn_cat_id == null)
	{
		alert_message('Please Choose Category Name!','warning','btn-warning');
		return false;
	}
	if( bsn_postal_code == '')
	{
		alert_message('Please Provide Postal Code!','warning','btn-warning');
		return false;
	}
	if( bsn_country == '')
	{
		alert_message('Please Choose Country!','warning','btn-warning');
		return false;
	}
	if( bsn_city == '' || bsn_city == null )
	{
		alert_message('Please Provide Your City Name!','warning','btn-warning');
		return false;
	}
	if( bsn_street == '')
	{
		alert_message('Please Provide Your Street Address!','warning','btn-warning');
		return false;
	}
	if( bsn_description == '' || bsn_description == null)
	{
		alert_message('Please Provide Description!','warning','btn-warning');
		return false;
	}

	if(das){
		if( bsn_longitute == '')
		{
			alert_message('Please Provide Longitute Value!','warning','btn-warning');
			return false;
		}
		if( bsn_latitude == '')
		{
			alert_message('Please Provide Latitude Value!','warning','btn-warning');
			return false;
		}
	}
	/*if( bsn_profile_pic == '')
	{
		alert_message('Please Provide Profile Picture!','warning','btn-warning');
		return false;
	}
	if( bsn_banner_pic == '')
	{
		alert_message('Please Provide Banner Picture!','warning','btn-warning');
		return false;
	}*/
}
//////////////////////////////////////////////// FOR INVITE SPACE VALIDATION /////////////////////////////////////////
   </script>
   
   
</body>
</html>