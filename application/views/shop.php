<?php include('include/head.php');?>
<body>
<?php
include('include/header.php');?>
<main>
<section class="shop-section">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="shop-contents">
<div class="top">
<div class="select">
<select>
<?php foreach($category_data as $category_datas):?>
<option value="<?php echo $category_datas['category_id'];?>"><?php echo $category_datas['category_name'];?></option>
<?php  endforeach; ?>
</select>
</div>
</div>
<div class="all-products">
<div class="row s-cont" id="category_search_product">
<?php foreach($data as $all_data){?>
<div class="col-md-3 col-sm-6">
<div class="single">
<div class="image">
<?php if(!empty($all_data['product_images_name'])) {?>
<img src="<?php echo base_url().'upload/product/'.$all_data['product_images_name'];?>">
<?php }
else{ ?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>">
<?php }?>
</div>
<div class="content s-sec">
<p class="name"><?php echo ucwords($all_data['product_name']);?></p>
<p class="price">Price : &euro; <?php echo $all_data['product_price'];?></p>
</div>
<div class="buttons">
<form action="<?php echo base_url('ShopingCart/getAdd'); ?>" method="post" id="">
<input type="hidden" name="sku_data" class="input-number" value="<?php echo $all_data['product_id']; ?>">
<input type="hidden" name="name_data" value="<?php echo $all_data['product_name'];?>">
<input type="hidden" name="price_data" value="<?php echo $all_data['product_price'];?>">
<input type="hidden" name="qty_data" class="input-number" value="1">
<button type="submit" name="addToCart" id="addToCart" class="">Add to Cart</button>
</form>
<a href="<?php echo base_url('Home/shop-details/'.$all_data['product_id']);?>">DETAILS</a>
</div>
</div>
</div>
<?php }?>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</main>
<?php include("include/footer.php");?>
</body>
</html>
