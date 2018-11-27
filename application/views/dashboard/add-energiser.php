<?php
$this->load->view('include/head');
?>
<body>
<?php
$this->load->view('include/header');
?>
<?php /*echo '<pre>' ;
print_r($_SESSION);
echo '</pre>';
echo $_SESSION['user_details'][0]['id'];*/

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
          <h2> Add Delegate Energizer </h2>
          <a href="<?php echo base_url('Energiser/list_energiser');?>">LIST DELEGATE ENERGIZER</a> </div>
        <div class="details-form">
          <?php $formDetails= array('id'=>'insert_class','method'=>'post','class'=>'','name'=>'insert_class');?>
          <?php echo form_open_multipart('Energiser/insert_energiser',$formDetails);?>
          
          
          
          <div class="row">
            <div class="col-sm-6">
              <div class="single">
                <p>Name of Delegate Energizer<span style="color:#F00">*</span> <a class="tooltip-btn" title="Type name of Energizer"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <input type="text" name="trainer_class_name" id="trainer_class_name" value="<?php echo set_value('trainer_class_name');?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="single">
                <p>Website <a class="tooltip-btn" title="Copy Delegate Space URL here"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <input type="text" name="trainer_class_website_url" id="trainer_class_website_url" value="<?php echo set_value('trainer_class_website_url');?>">
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
                      <select class="select-box cat-select" name="cat_id[]" id="class_cat_id" multiple="multiple">
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
                <p>Country<span style="color:#F00">*</span> <a class="tooltip-btn" title="Select Energizer country"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <div class="select">
                      <select class="js-example-basic-single" name="country" id="class_country" onChange="get_city(this.value,'<?php echo base_url();?>');">
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
                <p>City<span style="color:#F00">*</span> <a class="tooltip-btn" title="Select Energizer city"><i class="fa fa-info-circle"></i></a> </p>
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
          	<div class="col-sm-12">
              <div class="single">
                <p>Energizer Address<span style="color:#F00">*</span> <a class="tooltip-btn" title="Type location of the Energizer and select by clicking google suggestion"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <input type="text" name="trainer_class_address" id="autocomplete" value="<?php echo set_value('trainer_class_address')?>" onFocus="geolocate()" class="trainer_class_address">
                  </div>
                </div>
              </div>
            </div>
         </div>
         <div class="row">
         
         	<div class="col-sm-6">
              <div class="single">
                <p> Number of Bookings <span style="color:#F00">*</span> <a class="tooltip-btn" title="Specify the maximum number of participants. Delegate will receive notification if Energizer is already fully booked"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <input type="number" name="class_no_of_booking" id="class_no_of_booking" value="" class="trainer_class_address">
                  </div>
                </div>
              </div>
            </div>
         
         
            <div class="col-sm-6">
              <div class="single">
                <p>Energizer Image<a class="tooltip-btn" title="Recommended image size 813x300"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <div class="upload">
                      <input id="class_profile_pic" type="file" name="trainer_class_image" onChange="document.getElementById('photo-img-label').innerHTML = document.getElementById('class_profile_pic').value">
                      <label for="class_profile_pic" id="photo-img-label">Upload Your Image</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
         </div>
         
         
         <div class="row">
          	<div class="col-sm-12">
              <div class="single">
                <p>Energizer Price<span style="color:#F00">*</span> <a class="tooltip-btn" title="Type the price for the Energizer. 0 for free and use decimal point for tenths"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <input type="text" name="trainer_class_price"  class="trainer_class_price">
                  </div>
                </div>
              </div>
            </div>
         </div>
         
         
         
          <div class="row">
            <div class="col-sm-12">
              <div class="single">
                <p>Select Delegate Space For Energizer<span style="color:#F00">*</span> <a class="tooltip-btn" title="Select the Delegate Space where this Energizer is taking place"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <div class="select">
                      <select class="city_list" name="space_id" id="space_id">
                        <option value="">Choose Delegate Space</option>
                        <?php foreach($allEvent as $allEvent){
                        	if($allEvent['is_csv_uploaded'] == 0){
								?>
                        	<option value="<?php echo $allEvent['business_id'];?>"><?php echo $allEvent['business_name'];?></option>
                        <?php }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
         
         
         
          <div class="col-sm-12 opening-hours">
            <div class="single">
              <p><strong>Opening Hours <span style="color:#F00">*</span></strong> <a class="tooltip-btn" title="Select the times of the Energizer"><i class="fa fa-info-circle"></i></a> </p>
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
                                  <select name="to_opening_mint[<?php echo $k; ?>]" id="to_opening_mint_<?php echo $k; ?>]" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
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
                <p>Description<span style="color:#F00">*</span> <a class="tooltip-btn" title="Write a short description of the Energizer. Include info like; recommended sportswear, level of intensity, in- or outdoors and duration"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <textarea name="trainer_class_description" id="trainer_class_description"></textarea>
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
                  <button type="submit" onClick="return energiserValidation();">ADD DELEGATE ENERGIZER</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php echo form_close();?> </div>
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
	function energiserValidation()
	{
		
	var space_id = $("#space_id").val();
	var trainer_class_price = $("trainer_class_price").val();
	var bsn_name = $("#trainer_class_name").val();
	var bsn_cat_id = $("#class_cat_id").val();
	var bsn_country = $("#class_country").val();
	var bsn_city = $(".city_list").val();
	var bsn_description = $("#trainer_class_description").val();
	var trainer_class_image = $("#trainer_class_image").val();
	var trainer_class_address = $(".trainer_class_address").val();
	
	
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
	
	
	
	
	var event_id = $("#event_id").val();	
	if( space_id == '')
	{
		alert_message('Please Select Delegate Space !','warning','btn-warning');
		return false;
	}
	
	if( trainer_class_price == '')
	{
		alert_message('Please provide Energizer Price!','warning','btn-warning');
		return false;
	}
	
	
	if( bsn_name == '')
	{
		alert_message('Please Provide Energizer Name!','warning','btn-warning');
		return false;
	}
	if( bsn_cat_id == null)
	{
		alert_message('Please Choose Category Name!','warning','btn-warning');
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
	if( trainer_class_address == '')
	{
		alert_message('Please Provide Your Address!','warning','btn-warning');
		return false;
	}
	if( event_id == '')
	{
		alert_message('Please Choose Your Event!','warning','btn-warning');
		return false;
	}
	if( bsn_description == '' || bsn_description == null)
	{
		alert_message('Please Provide Description!','warning','btn-warning');
		return false;
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
	
	
</script>



</body>
</html>
