<?php
if(!empty($all_data[0]['cat_id_FK'])){
$get_cat_id_exp = explode(",",$all_data[0]['cat_id_FK']);
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
      <?php if(isset($msg) && $msg !=''){ ?>
      <div class="alert <?php echo $msgclass;?>"> <?php echo $msg;?> </div>
      <?php }?>
      <div class="single-content">
        <div class="dashboard-head">
          <h2>Add Product</h2>
        </div>
        <div class="details-form mem-form">
          <?php $formDetails= array('id'=>'insert_product','method'=>'post','class'=>'','name'=>'insert_product');?>
          <?php echo form_open_multipart('Shop/insert_product',$formDetails);?>
          <div class="row">
            <div class="col-sm-12">
              <div class="single">
                <p>Product Name<span style="color:#F00">*</span> <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <input type="text" name="product_name" id="product_name" value="<?php echo set_value('product_name');?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="single">
                <p>Category<span style="color:#F00">*</span> <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="select">
                    <select class="select-box" name="product_cat" id="product_cat_id" onChange="set_sub_category(this.value,'<?php echo base_url();?>');">
                      <option value="10000000">Choose Category</option>
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
                <p>Sub-Category<span style="color:#F00">*</span> <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="select">
                    <select class="js-city-single news_city_list" name="product_subcat" id="sub_cat_list">
                      <option value="">Choose SubCategory</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="single">
                <p>Product Price<span style="color:#F00">*</span> <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                  <input type="text" name="product_price" id="product_price" placeholder="Price" value="<?php echo set_value('product_price');?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="single">
                <p>Product Quantity<span style="color:#F00">*</span> <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                  <input type="text" name="product_qty" id="product_qty" value="<?php echo set_value('product_qty');?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="single">
                <p>Product Picture<span style="color:#F00">*</span> <a class="tooltip-btn" title="Upload Photos, Max 3"><i class="fa fa-info-circle"></i></a> </p>
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
                <p>Product Description<span style="color:#F00">*</span> <a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a> </p>
                <div class="form-row">
                  <div class="field">
                    <textarea name="product_description" id="product_description"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-6 col-centered">
              <div class="single">
                <div class="form-row">
                  <div class="field">
                    <button type="submit" onClick="return ProductValidations();">ADD PRODUCT</button>
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
<?php $this->load->view('include/footer');?>
<script type="text/javascript">
$(".js-multiple-category").select2({
	placeholder: "Choose Category",
  	allowClear: true
	});
</script>
<script type="text/javascript">
$(".js-multiple-picture").select2({
	placeholder: "Choose Picture",
  	allowClear: true
	});
</script>
</body>
</html>
