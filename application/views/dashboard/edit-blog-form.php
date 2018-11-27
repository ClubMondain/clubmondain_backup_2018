<?php 
	if(count($get_cate_id) > 0){
	$get_cat_id_exp = $get_cate_id[0];
	}
	else{
		$get_cat_id_exp = array();
		}
		/*print_r($get_cate_id);
		echo '<pre>';
		print_r($blog_category);
		echo '</pre>';*/
if(!empty($all_data[0]['blog_news_date'])){
	$get_date_id_exp = explode("-",$all_data[0]['blog_news_date']);
	}		
$this->load->view('include/head');?>
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
                    	<h2>Update Blog</h2>
                        <!--<a href="#">ADD BUSINESS</a>-->
                    </div>
                    <div class="details-form mem-form">
                    <?php $formDetails= array('id'=>'update_blog','method'=>'post','class'=>'','name'=>'update_blog');?>
						<?php echo form_open_multipart('Main/update_blog/'.base64_encription($all_data[0]['blog_news_id'],$formDetails));?>
                	<div class="row">
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Blog Title
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text" name="blog_heading" id="blog_title" value="<?php echo $all_data[0]['blog_news_title']?>">
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                		<div class="single">
                    	<p>Blog Category<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                            <div class="form-row">
                               <div class="select">
                                  <select class="select-box cat-select" name="blog_cate_id_FK[]" id="blog_cat_id" multiple="multiple">
                                    <option value="">Choose Category</option>
                                    <?php foreach($blog_category as $catdata) {?>
                                    <option value="<?php echo $catdata['category_id'];?>"<?php if(in_array($catdata['category_id'],$get_cat_id_exp)){?> selected <?php }?> class=""><?php echo $catdata['category_name'];?></option>
                                    <?php } ?>
                                  </select>
                               </div>
                           </div>
                        </div>
                    </div>
                <?php /*?>
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Blog Date<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<div class="date">
                                	<div class="col-xs-4">
                                    	<div class="row">
                                            <div class="select">
                                                <select name="ev_year" id="blog_year" onchange="setDays(month,day,this)">
                                                	<option value="">Year</option>
                                                    <?php for($i=2016;$i<=2030;$i++){?>
                                                    <option <?php if ($get_date_id_exp[0] == $i) { ?>selected="true" <?php }?> value="<?php echo $i;?>"><?php echo $i;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                	<div class="col-xs-4">
                                    	<div class="row">
                                            <div class="select">
                                                <select name="ev_month" id="blog_month" onchange="setDays(this,day,year)">
                                                <?php if(!empty($get_date_id_exp[1])){?>
                                                	<option value="<?php echo $get_date_id_exp[1]?>" selected <?php echo $get_date_id_exp[1]?>><?php echo $get_date_id_exp[1];?></option>
                                                    <?php }?>
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
                                                <select name="ev_date" id="blog_day" onchange="setDays(month,this,year)">
                                                	<option value="">Date</option>
                                                    <?php for($i=1;$i<=31;$i++){?>
                                                    <option <?php if($get_date_id_exp[2] == $i){?> selected <?php }?> value="<?php echo $i;?>"><?php echo $i;?></option>
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
                    	<p>Blog Address
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text" name="blog_address" id="blog_address" value="<?php echo $all_data[0]['blog_news_address'];?>">
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-sm-6">
                            <div class="single">
                                <p>Country<span style="color:#F00">*</span>
                                    <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                                </p>
                                <div class="form-row">
                                    <div class="field">
                                        <div class="select">
                                            <select class="js-example-basic-single" name="country" id="news_country" onChange="set_country(this.value,'<?php echo base_url();?>');">
                                             <?php foreach($country as $country){?>
                                                <option value="">Choose Country</option>
                                               <option value="<?php echo $country['country_id'];?>"<?php if($all_data[0]['country_id'] == $country['country_id']){?> selected <?php }?>><?php echo $country['country_name'];?></option>
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
                                    <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                                </p>
                                <div class="form-row">
                                    <div class="field">
                                        <div class="select">
                                            <select class="js-city-single blog_city_list" name="city" id="newscity_list">
                                            <?php foreach($city as $city){?>
                                                <option value="<?php echo $city['city_id'];?>" <?php if($all_data[0]['city_id'] == $city['city_id']){?> selected <?php }?>><?php echo $city['city_name']?></option> 
                                                <?php }?>
                                            </select>
                                       
                                        </div>
                                    </div>
                                </div>
                    </div>
                          </div>
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Facebook link
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text" name="blog_fb_link" id="blog_fb_link" value="<?php echo $all_data[0]['blog_news_fb_link'];?>">
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Instagram Link
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text" name="blog_twitter_link" id="blog_twitter_link" value="<?php echo $all_data[0]['blog_news_twitter_link'];?>">
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Twiter link
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text" name="blog_instagram_link" id="blog_instagram_link" value="<?php echo $all_data[0]['blog_news_instagram_link'];?>">
                            </div>
                        </div>
                    </div>
                    </div><?php */?>
                	<div class="col-sm-6"> 
                        		<div class="single">
                            <p>Feature Image
                            	<a class="tooltip-btn" title="Upload Photos, Max 3"><i class="fa fa-info-circle"></i></a>
                            </p>
                            <div class="form-row">
                                <div class="field">
                                    <div class="upload">
                                        <input id="blog_pic" type="file" name="blog_pic" onchange="document.getElementById('photo-img-label').innerHTML = document.getElementById('blog_pic').value">
                                        <label for="blog_pic" id="photo-img-label">Upload Your Photo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    	  </div>
                    
                    <div class="col-sm-12">
                	<div class="single">
                    	<p>Blog Description
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<textarea name="blog_description" id="blog_description" class="ckeditor"><?php echo $all_data[0]['blog_news_description'];?></textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="clearfix"></div>
                    <div class="col-sm-6 col-centered">
                	<div class="single">
                        <div class="form-row">
                        	<div class="field">
                            	<button type="submit" onClick="return BlogValidation();">UPDATE NEWS</button>
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
</body>
</html>