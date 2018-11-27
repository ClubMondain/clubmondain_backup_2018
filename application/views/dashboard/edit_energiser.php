<?php
$get_cate_id_exp   = array();
if(count($get_cate_id) > 0)
{
foreach($get_cate_id as $get_cate_id)
$get_cate_id_exp = $get_cate_id;
}else{
$get_cate_id_exp   = array();
}
$this->load->view('include/head');
?>
<body>
<?php
$this->load->view('include/header');?>
    <main class="dashboard" id="dashboard-main">
    	<?php $this->load->view('include/left-sidebar');?>
        <div class="dashboard-main">
        	<div class="left">
                <div class="dashboard-toggle" id="dashboard-toggle">
                    <button><i class="fa fa-bars"></i></button>
                </div>

            	<div class="single-content">
                	<div class="dashboard-head">
                    	<h2>Edit Delegate Energizer</h2>
                        <a href="<?php echo base_url('Energiser/list_energiser');?>">LIST DELEGATE ENERGIZER</a>
                    </div>
                      <?php if( !empty($this->session->flashdata('msg')) &&  !empty($this->session->flashdata('msg_class') ) ){ ?>
                  <div class="<?php echo $this->session->flashdata('msg_class');?>"> <?php echo $this->session->flashdata('msg');?> </div>
                  <?php }?>
                    <div class="details-form">
                    	<?php $formDetails= array('id'=>'update_class','method'=>'post','class'=>'','name'=>'update_class');?>
						<?php echo form_open_multipart('Energiser/update_energiser/'.base64_encription($all_data[0]['trainer_class_id']),$formDetails);?>
                        <div class="row">
                          <div class="col-sm-6">
                             <div class="single">
                                <p>Name of Delegate Energizer<span style="color:#F00">*</span>
                                   <a class="tooltip-btn" title="Type name of Energizer"><i class="fa fa-info-circle"></i></a>
                                </p>
                                <div class="form-row">
                                <div class="field">
                                    <input type="text" name="trainer_class_name" id="trainer_class_name" value="<?php echo $all_data[0]['trainer_class_name'];?>">
                                </div>
                             </div>
                           </div>
                         </div>
                         <div class="col-sm-6">
                                <div class="single">
                            <p>Website
                            	<a class="tooltip-btn" title="Copy Delegate Space URL here"><i class="fa fa-info-circle"></i></a>
                            </p>
                            <div class="form-row">
                                <div class="field">
                                    <input type="text" name="trainer_class_website_url" id="trainer_class_website_url" value="<?php echo $all_data[0]['trainer_class_website_url'];?>">
                                </div>
                            </div>
                        </div>
                            </div>			
                       </div>
                       
                       
                       <div class="row">
                          
                          <div class="col-sm-12">
                            <div class="single">
                              <p>Category<span style="color:#F00">*</span>
                                <a class="tooltip-btn" title="Select Vitality Category of Conference / Event"><i class="fa fa-info-circle"></i></a>                          	  </p>
                                <div class="form-row">
                                    <div class="field">
                                     <div class="select">
                                       <select class="select-box cat-select cat-select" name="cat_id[]" id="class_cat_id" multiple="multiple">
                                        <option value="">Choose Category</option>
                                        <?php foreach($catdata as $catdata) {?>
                                        <option value="<?php echo $catdata['category_id'];?>" class="" <?php if(in_array($catdata['category_id'],$get_cate_val)){?> selected <?php } ?>><?php echo $catdata['category_name'];?></option>
                                        <?php } ?>
                                      </select>
                                      </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          </div>
                       
                       

                        <div class="row">
                          
                    
                        </div>

                        <div class="row">
                        <div class="col-sm-6">
                            <div class="single">
                    	<p>Country<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Select Energizer country"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                                <div class="select">

                                    <select class="js-city-single city_list" name="country" id="bsn_country" onChange="get_city(this.value,'<?php echo base_url();?>');">
                                    <option value="">Choose Country</option>
                                     <?php foreach($country as $country){?>
                                       <option value="<?php echo $country['country_id'];?>" 
									   <?php if($all_data[0]['country_id'] == $country['country_id']){?> selected <?php }?>><?php echo $country['country_name'];?></option>
                                      <?php }?>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                          </div>
                    	<div class="col-sm-6">
                            <div class="single">
                                <p>City<span style="color:#F00">*</span>
                                    <a class="tooltip-btn" title="Select Energizer city"><i class="fa fa-info-circle"></i></a>
                                </p>
                                <div class="form-row">
                                    <div class="field">
                                        <div class="select">
                                      <select class="js-city-single city_list" name="city" id="eventcity_list">
                                     	<option value="">Choose City</option>
                                        <?php foreach($city as $city){?>
                                        <option value="<?php echo $city['city_id'];?>" <?php if($all_data[0]['city_id'] == $city['city_id']){?> selected <?php }?>><?php echo $city['city_name'];?></option>
                                        <?php }?>
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
                                <p>Energizer Address
                                	<a class="tooltip-btn" title="Type location of the Energizer and select by clicking google suggestion"><i class="fa fa-info-circle"></i></a>
                                </p>
                                <div class="form-row">
                                    <div class="field">
                                        <input type="text" name="trainer_class_address" class="bsn_street" value="<?php echo $all_data[0]['trainer_class_address'];?>" onFocus="geolocate()" id="autocomplete">
                                    </div>
                                </div>
                            </div>
                          </div>
                        	<!--
                        	 <div class="col-sm-6">
             				 <div class="single">
                                <p>Price of Energizer<span style="color:#F00">*</span> <a class="tooltip-btn" title="Insert Price For Classes"><i class="fa fa-info-circle"></i></a> </p>
                                <div class="form-row">
                                  <div class="field">
                                    <input type="text" name="trainer_class_price" id="trainer_class_price" onKeyUp="this.value=this.value.replace(/[^\d]/,'')" value="<?php echo $all_data[0]['trainer_class_price'];?>">
                                  </div>
                                </div>
                             </div>
           				 </div>-->
                        	
                        	
                          </div>
                          <div class="row">
                          
                            <div class="col-sm-6">
				              <div class="single">
				                <p> Number of Bookings <span style="color:#F00">*</span> <a class="tooltip-btn" title="Specify the maximum number of participants. Delegate will receive notification if Energizer is already fully booked"><i class="fa fa-info-circle"></i></a> </p>
				                <div class="form-row">
				                  <div class="field">
				                    <input type="number" name="class_no_of_booking" id="no_of_booking" value="<?php echo $all_data_only[0]['class_no_of_booking'];?>" class="trainer_class_address"  onblur="space_availability_check();">
				                  </div>
				                </div>
				              </div>
				            </div>
                          <input type="hidden" name="exist_space_size" value="<?php echo $all_data_only[0]['class_no_of_booking'];?>" id="exist_space_size"/>
                          
                    	  <div class="col-sm-6">
                        		<div class="single">
                            <p>Energizer Image<span style="color:red">*</span>
                            	<a class="tooltip-btn" title="Recommended image size 813x300"><i class="fa fa-info-circle"></i></a>
                            </p>
                            <div class="form-row">
                                <div class="field">
                                    <div class="upload">
                                       <input id="profile_pic_bsn" type="file" name="trainer_class_image" onChange="document.getElementById('photo-img-label').innerHTML = document.getElementById('profile_pic_bsn').value">
                                       <label for="profile_pic_bsn" id="photo-img-label">Upload Your Photo</label>
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
                    <input type="text" name="trainer_class_price" value="<?php echo $all_data_only[0]['trainer_class_price'];?>"  class="trainer_class_price">
                  </div>
                </div>
              </div>
            </div>
         </div>
                        
                        
                        
                        
                        <input type="hidden" name="space_id" value="<?php echo $all_data[0]['space_id'];?>"/>
                          <!--<div class="row">
                         <div class="col-sm-12">
                           <div class="single">
                            <p>Select Delegate Space For Energizer<span style="color:#F00">*</span> <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
                            <div class="form-row">
                              <div class="field">
                                <div class="select">
                                  <select class="city_list" name="space_id" id="space_id">
                                    <option value="">Choose Delegate Space</option>
                                    <?php foreach($allEvent as $allEvent){?>
                                        <option value="<?php echo $allEvent['business_id'];?>" <?php if($all_data[0]['space_id'] == $allEvent['business_id']){?> selected <?php }?>><?php echo $allEvent['business_name'];?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                       	 </div>
                        </div>-->
                       
                        <div class="col-sm-12 opening-hours">
            <div class="single">
              <p><strong>Opening Hours <span style="color:#F00">*</span></strong> <a class="tooltip-btn" title="Select the times of the Energizer"><i class="fa fa-info-circle"></i></a> </p>
            </div>
                        
                        
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
                                              <select name="from_opening_hour[<?php echo $k; ?>]" id="from_opening_hour_<?php echo $k; ?>" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
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
                                              <select name="from_opening_mint<?php echo $k; ?>" id="from_opening_mint_[<?php echo $k; ?>]"  onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
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
                                              <select name="to_opening_hour[<?php echo $k; ?>]" id="to_opening_hour_<?php echo $k; ?>" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
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
                                              <select name="to_opening_mint[<?php echo $k; ?>]" id="to_opening_mint_<?php echo $k; ?>" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
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
                        
                        <div class="row">
                        	<div class="col-sm-12">
                        		<div class="single">
                                 <p>Description<span style="color:#F00">*</span> <a class="tooltip-btn" title="Write a short description of the Energizer. Include info like; recommended sportswear, level of intensity, in- or outdoors and duration"><i class="fa fa-info-circle"></i></a> </p>
                                <div class="form-row">
                                    <div class="field">
                                      <textarea name="trainer_class_description" id="trainer_class_description"><?php echo $all_data[0]['trainer_class_description'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        	</div>
                        </div>
                       <div class="clearfix"></div>

                    <div class="col-sm-12 col-centered">
                		<div class="single">
                        	<div class="form-row">
                        	<div class="field">
                                <button type="submit" onClick="return energiserValidation();">UPDATE DELEGATE ENERGIZER DETAILS</button>
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
	var bsn_name = $("#trainer_class_name").val();
	var bsn_cat_id = $("#class_cat_id").val();
	var bsn_country = $("#class_country").val();
	var bsn_city = $(".city_list").val();
	var bsn_description = $("#trainer_class_description").val();
	var trainer_class_image = $("#trainer_class_image").val();
	var trainer_class_address = $(".trainer_class_address").val();
	var event_id = $("#event_id").val();
	
	
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
	
	
	
	
	
	
	
		
	if( space_id == '')
	{
		alert_message('Please Select Invite Space !','warning','btn-warning');
		return false;
	}
	
	if( bsn_name == '')
	{
		alert_message('Please Provide Class Name!','warning','btn-warning');
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


<script>
	function space_availability_check()
	{
		var exist_space =  $('#exist_space_size').val();
		var no_of_booking =  $('#no_of_booking').val();
		
		if(parseInt(no_of_booking) < parseInt(exist_space)){
			alert_message('You can not decrease booking number than previous space size!','warning','btn-warning');
			return false;
		}
		
		
	}
</script>



</body>
</html>
