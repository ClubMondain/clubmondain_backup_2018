<?php 
if(count($get_cate_id) > 0){
foreach($get_cate_id as $get_cate_id)
$get_cate_id_exp[] = $get_cate_id['category_id']; 
}else{
$get_cate_id_exp   = array(); 
}	
$get_date_exp = explode("-",$all_events[0]['event_date_from']);
$get_date_to = explode("-",$all_events[0]['event_date_to']);
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
                    	<h2> Update Events</h2>
                       <?php /*?> <a href="<?php echo base_url('UserDashboard/list_event/'.$_SESSION['user_details'][0]['id']); ?>">EVENT LIST</a><?php */?>
                    </div>
            	<div class="details-form mem-form">
                <?php $formDetails= array('id'=>'update_event','method'=>'post','class'=>'','name'=>'update_event');?>
					<?php echo form_open_multipart('Main/update_event/'.base64_encription($all_events[0]['event_id']),$formDetails);?>
                <div class="row">
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Event Name<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text" name="name" value="<?php echo $all_events[0]['event_name'];?>" id="eventname" placeholder="Event Name">
                            	
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="single">
                            <p>Event timezone From
                                <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                            </p>
                            <div class="form-row">
                                <div class="select">
                               <select class="js-example-zone-single" name="event_timezone" id="event_timezone">
                                <option value="" selected>Choose Timezone</option>
                                 <?php foreach($timezone as $timezone){?>
                                   <option value="<?php echo $timezone['timezid'];?>" <?php if($timezone['tz'] == $all_events[0]['event_timezone']){?>selected<?php }?>><?php echo $timezone['tz'];?></option>
                                  <?php }?>  
                            </select>
                          </div>
                            </div>
                         </div>
                    </div>
                
                    <div class="col-sm-6">
                		<div class="single">
                    	<p>Category<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                            <div class="form-row">
                               <div class="select">
                                  <select class="js-multiple-category cat-select" name="cat_id[]" id="cat_id" multiple="multiple">
                                    <option value="">Choose Category</option>
                                    <?php foreach($catdata as $catdata) {?>
                                    <option value="<?php echo $catdata['category_id'];?>" class="" <?php if(in_array($catdata['category_id'],$get_cate_id_exp)){?> selected <?php } ?>><?php echo $catdata['category_name'];?></option>
                                    <?php } ?>
                                  </select>
                               </div>
                           </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Event Website
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text" name="website" value="<?php echo $all_events[0]['event_website_url'];?>" id="eventwebsite" placeholder="Event Website" >
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Description<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<textarea name="description" id="description" placeholder="Short Description"><?php echo $all_events[0]['event_description'];?></textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Venue Facilities<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<textarea name="facilities" id="facilities" placeholder="Venue Facilities"><?php echo $all_events[0]['event_facilities'];?></textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Event country<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <?php  //echo $all_events[0]['country'];?>
                        <div class="form-row">
                        	<div class="field">
                                <div class="select">
                                    <select class="js-example-basic-single" name="country" id="eventcountry" onChange="set_country(this.value,'<?php echo base_url();?>');">
                                     <?php foreach($country as $country){?>
                                     	<option value="">Choose Country</option>
                                       <option value="<?php echo $country['country_id'];?>" <?php if($all_events[0]['country_id'] == $country['country_id']){?> selected <?php }?>><?php echo $country['country_name'];?></option>
                                      <?php }?>  
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Event City<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                                <div class="select">
                                    <select class="js-basic-city" name="city" id="eventcity_list">
                                     	<option value="">Choose City</option>
                                        <?php foreach($city as $city){?>
                                        <option value="<?php echo $city['city_id'];?>" <?php if($all_events[0]['city_id'] == $city['city_id']){?> selected <?php }?>><?php echo $city['city_name'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-sm-12">
                	<div class="single">
                    	<p>Event Address<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                                <input id="autocomplete" name="address" placeholder="Enter your address" onFocus="geolocate()" type="text" value="<?php echo $all_events[0]['event_adress'];?>">
                            </div>
                        </div>
                    </div>
                    </div>
                  <div class="col-sm-6">
                	<div class="single">
                    	<p>Event From Date<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<div class="date">
                                	<div class="col-xs-4">
                                    	<div class="row">
                                            <div class="select">
                                              <select name="ev_year" id="year" onChange="setDays(month,day,this)" class="form-control">
                                                <option value="">Year</option>
                                                <?php for($i=2016;$i<=2030;$i++){?>
                                                <option value="<?php echo $i;?>" <?php if($get_date_exp[0] == $i){?> selected<?php }?>><?php echo $i;?></option>
                                <?php } ?>
                              				</select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                	<div class="col-xs-4">
                                    	<div class="row">
                                            <div class="select">
                                                <select name="ev_month" id="month" onChange="setDays(this,day,year)" class="form-control">
                                                    <option value="">Month</option>
                                                    <?php
                                                    for($i=1;$i<=12;$i++){
                                                    $name = date('F', mktime(0, 0, 0, $i, 17));	
                                                    ?>
                                                    <option value="<?php echo $i; ?>" <?php if($get_date_exp[1] == $i){?> selected <?php } ?> ><?php echo $name; ?></option>
                                                    <?php }?>
                              					</select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                	<div class="col-xs-4">
                                    	<div class="row">
                                            <div class="select">
                                                <select name="ev_date" id="day" onChange="setDays(month,this,year)" class="form-control">
                                                    <option value="">Date</option>
                                                    <?php for($i=1;$i<=31;$i++){?>
                                                    <option value="<?php echo $i;?>"<?php if($get_date_to[2] == $i){?> selected <?php }?>><?php echo $i;?></option>
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
                    	<p>Event To Date<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<div class="date">
                                	<div class="col-xs-4">
                                    	<div class="row">
                                            <div class="select">
                                              <select name="ev_to_year" id="year_to" onChange="setDays(month,day,this)" class="form-control">
                                                <option value="">Year</option>
                                                <?php for($i=2016;$i<=2030;$i++){?>
                                                <option value="<?php echo $i;?>" <?php if($get_date_to[0] == $i){?> selected<?php }?>><?php echo $i;?></option>
												<?php } ?>
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                	<div class="col-xs-4">
                                    	<div class="row">
                                            <div class="select">
                                                <select name="ev_to_month" id="month_to" onChange="setDays(this,day,year)" class="form-control">
                                                    <option value="">Month</option>
                                                    <?php
                                                    for($i=1;$i<=12;$i++){
                                                    $name = date('F', mktime(0, 0, 0, $i, 17));	
                                                    ?>
                                                    <option value="<?php echo $i; ?>" <?php if($get_date_to[1] == $i){?> selected <?php } ?> ><?php echo $name; ?></option>
                                                    <?php } ?>
                                                  </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                	<div class="col-xs-4">
                                    	<div class="row">
                                            <div class="select">
                                                <select name="ev_to_date" id="day_to" onChange="setDays(month,this,year)" class="form-control">
                                                <option value="">Date</option>
                                                <?php for($i=1;$i<=31;$i++){?>
                                                <option value="<?php echo $i;?>"<?php if($get_date_to[2] == $i){?> selected <?php }?>><?php echo $i;?></option>
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
                            <p>Event Picture <span style="color:#F00">* (Event Picture should be max 5mb)</span>
                              <a class="tooltip-btn" title="Event image should be max 5mb"><i class="fa fa-info-circle"></i></a>
                            </p>
                            <div class="form-row">
                                <div class="field">
                                    <div class="upload">
                                        <input type="file" name="event_pic" id="event_pic" onChange="document.getElementById('event-img-label').innerHTML = document.getElementById('event_pic').value">
                                        <label for="event_pic" id="event-img-label">Upload Your Photo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    	  </div>
                    
                    <div class="col-sm-6"> 
                        <div class="single">
                    		<p>Banner <span style="color:#F00">(Banner Picture should be max 5mb)</span>
                      	 <a class="tooltip-btn" title="The picture will show on the first page"><i class="fa fa-info-circle"></i></a>
                    		</p>
                   		 <div class="form-row">
                        	<div class="field">
                            	<div class="upload">
                                <input type="file" name="event_banner" id="event_banner" onChange="document.getElementById('banner-img-label').innerHTML = document.getElementById('event_banner').value">
                                <label for="event_banner" id="banner-img-label">Upload Your Banner</label>
                            	</div>
                        	</div>
                   		 </div>
                	</div>
                  </div>  
                  
                    <div class="col-sm-12">
                		<div class="single">
                    	<p>Event Condition
                        	<a class="tooltip-btn" title="Insert here the deatils for the event"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<textarea name="free_text" id="free_text" placeholder="Free Text"><?php echo $all_events[0]['event_free_text'];?></textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                                        
               <div class="clearfix"></div>
                
                    <div class="col-sm-6 col-centered">
                		<div class="single">
                        <div class="form-row">
                        	<div class="field">
                            	<button type="submit" onClick="return EventValidation();">UPDATE EVENT DETAILS</button>
                            </div>
                        </div>
                    </div>
                    </div>
               </div>
                <?php echo form_close();?>    
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