<?php 
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
      <?php if(isset($msg) && $msg !=''){ ?>
      <div class="alert <?php echo $msgclass;?>"> <?php echo $msg;?> </div>
      <?php }?>
      <div class="single-content">
        <div class="dashboard-head">
          <h2> Add Events</h2>
          <a href="<?php echo base_url('Main/list_event_view/'); ?>">EVENT LIST</a> </div>
        <div class="details-form mem-form">
          <?php $formDetails= array('id'=>'insert_event','method'=>'post','class'=>'','name'=>'insert_event');?>
          <?php echo form_open_multipart('Main/insert_event',$formDetails);?>
          <div class="row">
            <div class="col-sm-6">
              <div class="single">
                <p>Event Name<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter event name"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <input type="text" name="name" value="<?php echo set_value('name');?>" id="eventname" placeholder="Event Name">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="single">
                <p>Event timezone <a class="tooltip-btn" title="Please enter event timezone"><i class="fa fa-info-circle"></i></a> </p>
                <div class="select">
                  <select class="js-example-zone-single" name="event_timezone" id="event_timezone">
                    <option value="" selected>Choose Timezone</option>
                    <?php foreach($timezone as $timezone){?>
                    <option value="<?php echo $timezone['timezid'];?>"><?php echo $timezone['tz'];?></option>
                    <?php }?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="single">
                <p>Category<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter category"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="select">
                    <select class="select-box cat-select" name="cat_id[]" id="cat_id" multiple="multiple" value="<?php echo set_value('cat_id[]');?>">
                      <option value="">Choose Category</option>
                      <?php foreach($category as $catdata) {?>
                      <option value="<?php echo $catdata['category_id'];?>" class=""><?php echo $catdata['category_name'];?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="single">
                <p>Event Website <a class="tooltip-btn" title="Please enter category"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <input type="text" name="website" value="<?php echo set_value('website');?>" id="eventwebsite" placeholder="Event Website" >
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="single">
                <p>Description<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter description"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <textarea name="description" id="description" placeholder="Short Description"><?php echo set_value('description');?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="single">
                <p>Venue Facilities<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter venue facilities"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <textarea name="facilities" id="facilities" placeholder="Venue Facilities"><?php echo set_value('facilities');?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="single">
                <p>Event country<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter country"><i class="fa fa-info-circle"></i></a> </p>
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
            <div class="col-sm-6">
              <div class="single">
                <p>Event City<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter city"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <div class="select">
                      <select class="js-basic-city" name="city" id="eventcity_list" class="city_list">
                      <option value="">Choose City</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="single">
                <p>Event Address<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter address"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <input id="autocomplete" name="address" placeholder="Enter your address" onFocus="geolocate()" type="text" value="<?php echo set_value('address');?>" class="event_address">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="single">
                <p>Event From Date<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter from date"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <div class="date">
                      <div class="col-xs-4">
                        <div class="row">
                          <div class="select"> 
                            <!--<select name="ev_year" id="year" onchange="setDays(month,day,this)">-->
                            <select name="ev_year" id="year" onChange="setDays(day,month,this)">
                              <?php $ev_year = $_POST["ev_year"];?>
                              <option value="">Year</option>
                              <?php for($i=2016;$i<=2030;$i++){?>
                              <option <?php if ($ev_year == $i) { ?>selected="true" <?php }?> value="<?php echo $i;?>"><?php echo $i;?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="row">
                          <div class="select">
                            <select name="ev_month" id="month" onChange="setDays(day,year,this)">
                              <option value="">Month</option>
                              <option value="1">January</option>
                              <option value="2">February</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="row">
                          <div class="select">
                            <select name="ev_date" id="day" onChange="setDays(this,month,year)">
                              <?php $ev_date = $_POST["ev_date"];?>
                              <option value="">Date</option>
                              <?php for($i=1;$i<=31;$i++){?>
                              <option <?php if($ev_date == $i){?> selected <?php }?> value="<?php echo $i;?>"><?php echo $i;?></option>
                              <?php } ?>
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
                <p>Event To Date<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please enter to date"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <div class="date">
                      <div class="col-xs-4">
                        <div class="row">
                          <div class="select">
                            <select name="ev_to_year" id="year_to" onChange="setDays(this,month,day)">
                              <?php $ev_to_year = $_POST["ev_to_year"];?>
                              <option value="">Year</option>
                              <?php for($i=2016;$i<=2030;$i++){?>
                              <option <?php if ($ev_to_year == $i) { ?>selected="true" <?php }?> value="<?php echo $i;?>"><?php echo $i;?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="row">
                          <div class="select">
                            <select name="ev_to_month" id="month_to" onChange="setDays(this,year,day)">
                              <option value="">Month</option>
                              <option value="1">January</option>
                              <option value="2">February</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="row">
                          <div class="select">
                            <select name="ev_to_date" id="day_to" onChange="setDays(this,month,year)">
                              <?php $ev_to_date = $_POST["ev_to_date"];?>
                              <option value="">Date</option>
                              <?php for($i=1;$i<=31;$i++){?>
                              <option <?php if($ev_to_date == $i){?> selected <?php }?> value="<?php echo $i;?>"><?php echo $i;?></option>
                              <?php } ?>
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
                <p>Event Picture<span style="color:#F00">* (Event Picture should be max 5mb)</span> <a class="tooltip-btn" title="Event image should be max 5mb"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <div class="upload">
                      <input type="file" name="event_pic" id="event_pic" onChange="document.getElementById('photo-img-label').innerHTML = document.getElementById('event_pic').value">
                      <label for="event_pic" id="photo-img-label">Upload Your Photo</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="single">
                <p>Banner <span style="color:#F00">(Banner Picture should be max 5mb)</span> <a class="tooltip-btn" title="The picture will show on the first page  (5 MB Max)"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <div class="upload">
                      <input type="file" name="event_banner" id="event_banner" onChange="document.getElementById('photo-banner-label').innerHTML = document.getElementById('event_banner').value">
                      <label for="event_banner" id="photo-banner-label">Upload Your Banner</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="single">
                <p>Event Condition<a class="tooltip-btn" title="Insert here the deatils for the event"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <textarea name="free_text" id="free_text" placeholder="Free Text"><?php echo set_value('free_text');?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-6 col-centered">
              <div class="single">
                <div class="form-row">
                  <div class="field">
                    <button type="submit" onClick="return EventValidation();">ADD EVENT DETAILS</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php echo form_close();?> </div>
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
	  placeholder: "Select Country",
	  });
});
$(document).ready(function() {
  $(".js-basic-city").select2({
	  placeholder: "Select City",
	  });
});
$(document).ready(function() {
  $(".js-example-zone-single").select2({
	  placeholder: "Select Timezone",
	  });
});
</script> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACjdpaolaUHA-rjK_YEvP8UdQi9Z3YIwk&libraries=places&callback=initAutocomplete" async defer></script>
</body>
</html>