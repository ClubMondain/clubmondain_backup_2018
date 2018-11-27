<?php 
if(!empty($all_events[0]['cat_id'])){
	$get_cate_id_exp = explode(',',$all_events[0]['cat_id']);	
	//print_r($all_events[0]['cat_id']);
	//print_r($all_events[0]);
	}
	print_r($_SESSION);
if(!empty($all_events[0]['event_date'])){
	$get_date_exp = explode('-',$all_events[0]['event_date']);
	}	
$this->load->view('include/head');
?>
<body>
<?php 
$this->load->view('include/header');?>
<?php /*echo '<pre>' ;
print_r($all_events);
echo '</pre>';*/
//echo $_SESSION['user_details'][0]['id'];
?>
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
					<?php echo form_open_multipart('UserDashboard/update_event/'.$all_events[0]['id'],$formDetails);?>
						<?php /*?><input type="hidden" name="event_date" value="<?php echo date("d-m-y");?>"><?php */?>
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_details'][0]['id'];?>">
                        
                <div class="row">
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Event Name<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text" name="name" value="<?php echo $all_events[0]['name'];?>" id="eventname" placeholder="Event Name">
                            	
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Event Levels
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text" name="levels" value="<?php echo $all_events[0]['levels'];?>" id="levels" placeholder="Event Levels">
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-sm-6">
                		<div class="single">
                    	<p>Category Name<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                            <div class="form-row">
                               <div class="select">
                                  <select class="js-multiple-category cat-select" name="cat_id[]" id="cat_id" multiple="multiple">
                                    <option value="">Choose Category</option>
                                    <?php foreach($catdata as $catdata) {?>
                                    <option value="<?php echo $catdata['id'];?>" class="" <?php if(in_array($catdata['id'],$get_cate_id_exp)) {?> selected <?php }?>><?php echo $catdata['name'];?></option>
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
                            	<input type="text" name="website" value="<?php echo $all_events[0]['website'];?>" id="eventwebsite" placeholder="Event Website" >
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Short Description<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<textarea name="description" id="description" placeholder="Short Description"><?php echo $all_events[0]['description'];?></textarea>
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
                            	<textarea name="facilities" id="facilities" placeholder="Venue Facilities"><?php echo $all_events[0]['facilities'];?></textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Event city<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text" name="city" value="<?php echo $all_events[0]['city'];?>" id="eventcity" placeholder="City Name">
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
                                    <select class="js-example-basic-single" name="country" id="eventcountry">
                                     <?php foreach($country as $country){?>
                                     	<option value="">Choose Country</option>
                                        
                                        <option value="<?php echo $country['countryName'];?>" <?php if($all_events[0]['country'] == $country['countryName']){?> selected <?php }?>><?php echo $country['countryName'];?></option>
                                      <?php }?>  
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Event Date<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<div class="date">
                                	<div class="col-xs-4">
                                    	<div class="row">
                                            <div class="select">
                                              <select name="ev_year" id="year" onchange="setDays(month,day,this)" class="form-control">
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
                                                <select name="ev_month" id="month" onchange="setDays(this,day,year)" class="form-control">
                                <option value="">Month</option>
                                <?php
								for($i=1;$i<=12;$i++){
								$name = date('F', mktime(0, 0, 0, $i, 17));	
								?>
                                <option value="<?php echo $i; ?>" <?php if($get_date_exp[1] == $i){?> selected <?php } ?> ><?php echo $name; ?></option>
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
                                                <select name="ev_date" id="day" onchange="setDays(month,this,year)" class="form-control">
                                <option value="">Date</option>
                                <?php for($i=1;$i<=31;$i++){?>
                                <option value="<?php echo $i;?>"<?php if($get_date_exp[2] == $i){?> selected <?php }?>><?php echo $i;?></option>
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
                    	<p>Event timezone
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text" name="timezone" value="<?php echo $all_events[0]['timezone'];?>" id="timezone" placeholder="00:00:00">
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6"> 
                        		<div class="single">
                            <p>Photo’s<span style="color:#F00">*</span>
                            	<a class="tooltip-btn" title="Upload Photos, Max 3"><i class="fa fa-info-circle"></i></a>
                            </p>
                            <div class="form-row">
                                <div class="field">
                                    <div class="upload">
                                        <input type="file" name="profile_pic" id="profile_pic" onchange="document.getElementById('photo-img-label').innerHTML = document.getElementById('profile_pic').value">
                                        <label for="profile_pic" id="photo-img-label">Upload Your Photo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    	  </div>
                          
                    <div class="col-sm-6">
                		<div class="single">
                    	<p>Free Text
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<textarea name="free_text" id="free_text" placeholder="Free Text"><?php echo $all_events[0]['free_text'];?></textarea>
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
</script>
</body>
</html>