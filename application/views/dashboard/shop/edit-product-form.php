<?php 
if(!empty($all_data[0]['cat_id_FK'])){
	$get_cat_id_exp = explode(",",$all_data[0]['cat_id_FK']);
	}	
$this->load->view('include/head');
?>
<body>
<?php 
$this->load->view('include/header');?>
<?php /*echo '<pre>' ;
print_r($pivot_category);
print_r($subcatdata);
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
                    	<h2>Edit Product</h2>
                        <!--<a href="#">ADD BUSINESS</a>-->
                    </div>
                    <div class="details-form mem-form">
                    <?php $formDetails= array('id'=>'insert_product','method'=>'post','class'=>'','name'=>'insert_product');?>
						<?php echo form_open_multipart('Shop/update_product/'.base64_encription($all_data[0]['product_id']),$formDetails);?>
                	<div class="row">
                    <div class="col-sm-12">
                	<div class="single">
                    	<p>Product Name<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text" name="product_name" id="product_name" value="<?php echo $all_data[0]['product_name'];?>">
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
                                  <select class="select-box" name="product_cat" id="product_cat_id" onChange="set_sub_category(this.value,'<?php echo base_url();?>');">
                                    <option value="10000000">Choose Category</option>
                                    <?php foreach($catdata as $catdata) {?>
                                    <option value="<?php echo $catdata['category_id'];?>" class="" <?php if($catdata['category_id'] == $pivot_category[0]['category_id']){?> selected<?php }?>><?php echo $catdata['category_name'];?></option>
                                    <?php } ?>
                                  </select>
                               </div>
                           </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                		<div class="single">
                    	<p>Sub-Category<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                            <div class="form-row">
                               <div class="select">
                                  <select class="js-city-single news_city_list" name="product_subcat" id="sub_cat_list">
                                       <?php foreach($subcatdata as $subcatdata) {?>
                                    <option value="<?php echo $subcatdata['category_id'];?>" class="" <?php if($subcatdata['category_id'] == $pivot_category[0]['subcategory_id']){?> selected<?php }?>><?php echo $subcatdata['category_name'];?></option>
                                    <?php } ?>
                                  </select>
                               
                                </div>
                           </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Product Price<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text" name="product_price" id="product_price" value="<?php echo $all_data[0]['product_price'];?>">
                            </div>
                        </div>
                    </div>
                    </div>                      
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Product Quantity<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text" name="product_qty" id="product_qty" value="<?php echo $all_data[0]['product_qty'];?>">
                            </div>
                        </div>
                    </div>
                    </div>
                    
                	<div class="col-sm-12"> 
                       <div class="single">
                        <p>Product Picture<span style="color:#F00">*</span>
                            <a class="tooltip-btn" title="Upload Photos, Max 3"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                            <div class="field">
                                <div class="upload">
                                    <input id="product_images_name" type="file" name="file_name[]" multiple style="display:block">
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-sm-12">
                	<div class="single">
                    	<p>Product Description<span style="color:#F00">*</span>
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<textarea name="product_description" id="product_description"><?php echo $all_data[0]['product_description'];?></textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="clearfix"></div>
                    <div class="col-sm-6 col-centered">
                	<div class="single">
                        <div class="form-row">
                        	<div class="field">
                            	<button type="submit" onClick="return ProductValidations('send_data');">UPDATE PRODUCT</button>
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