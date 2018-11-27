<?php include('include/head.php'); ?>
<script src="<?php echo base_url('assets/web');?>/js/jquery.elevatezoom.js"></script>
<body>
<?php include('include/header.php');?>
<main>
<section class="shop-details">
<div class="container">
<div class="head">
<h2><a href="<?php echo base_url('Home/shop'); ?>"><i class="fa fa-angle-left"></i> Back </a></h2>
</div>
<div class="row">
<div class="col-lg-10">
<div class="product-main">
<div class="left">
<div class="product-viewing">
<div class="main-view-img">
<?php if(!empty($product_details[0]['product_images_name'])) {?>
<img src="<?php echo base_url().'upload/product/'.$product_details[0]['product_images_name'];?>">
<?php }else{ ?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>">
<?php }?>
</div>
<div class="sliding-images" id="gal1">
<ul id="flexiselDemo2">
<?php foreach($galerry_data as $galerry_data){?>
<li><a class="inr-view-img" data-image="<?php echo base_url('upload/product/').$galerry_data['product_images_name']?>"
data-zoom-image="<?php echo base_url('upload/product/').$galerry_data['product_images_name']?>">
<img id="img_01" src="<?php echo base_url('upload/product/').$galerry_data['product_images_name']?>">
</a></li>
<?php }?>
</ul>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>
</div>
<div class="right">
<div class="product-content">
<h2><?php echo ucwords($product_details[0]['product_name']);?></h2>
<!-- <?php if($product_details[0]['product_qty']>1){?>
<p class="stock">Availability : <span style="color:#090">In Stock</span></p>
<?php }else{ ?>
<p class=" stock">Availability : <span style="color:#F00">Out Of Stock</span></p>
<?php }?> -->
<h3>Price : &euro;<?php echo $product_details[0]['product_price'];?></h3>
<p class="stock">
<strong style="margin-bottom:30px;">Description :</strong>
<?php echo $product_details[0]['product_description'];?>
</p>
<div class="product-update">
<p>QTY</p>
<form action="<?php echo base_url('ShopingCart/getAdd'); ?>" method="post" id="">
<input type="hidden" name="sku_data" class="input-number" value="<?php echo $product_details[0]['product_id']; ?>">
<input type="hidden" name="name_data" value="<?php echo $product_details[0]['product_name'];?>">
<input type="hidden" name="price_data" value="<?php echo $product_details[0]['product_price'];?>">
<div class="pro-qty">
<input type="text" name="qty_data" class="input-number" value="1">
</div>
<input type="submit" name="addToCart" value="Add to Cart" id="addToCart" class="add-to-cart">
</form>
</div>
<p class="category">Category :
<?php foreach($catdata as $catdata){?>
<?php if($catdata['category_id'] == $pivot_category[0]['category_id']){ echo $catdata['category_name'];}?>
<?php }?>
</p>
<p class="category">Sub Category :
<?php foreach($subcatdata as $subcatdata){?>
<?php if($subcatdata['category_id'] == $pivot_category[0]['subcategory_id']){ echo $subcatdata['category_name'];}?>
<?php }?>
</p>
</div>
</div>
<div class="clearfix"></div>
</div>
<div class="product-details">
<div class="head">
<h2>Product Description</h2>
</div>
<div class="des-content">
<p><?php echo $product_details[0]['product_description'] ;?></p>
</div>
<div class="review-sec">
<?php if(!empty($review_data)){
$count_review = count($review_data);?>
<div class="head">
<h2>Reviews (<?php echo $count_review;?>)</h2>
</div>
<?php for($i=0;$i<$count_review;$i++){?>
<div class="view head">
<div class="single">
<p class="name">
<?php if(isset($review_data[$i]['company_name']) && !empty($review_data[$i]['company_name']) ){
echo $review_data[$i]['company_name'];
}
else{
echo $review_data[$i]['user_name'];
}?>
</p>
<p><?php  echo date('dS M Y',strtotime($review_data[$i]['create_date']));?></p>
<ul class="star">
<?php for($j=0;$j<$review_data[$i]['user_review'];$j++){?>
<li><i class="fa fa-star"></i></li>
<?php }?>
</ul>
<p>
<?php echo $review_data[$i]['user_comment'];?>
</p>
</div>
</div>
<?php }}
else{?>
<h2>No Reviews Found</h2>
<?php }?>
<div class="head">
<h2>Add Reviews</h2>
</div>
<div class="add">
<?php if($this->session->userdata('user_login')== 'YES'){?>
<h3>Write a review about this product</h3>
<?php $formDetails= array('id'=>'insert_feedback','method'=>'post','class'=>'review-form','name'=>'insert_feedback');?>
<?php echo form_open('Shop/insert_feedback',$formDetails);?>
<?php if(isset($msg) && $msg !=''){ ?>
<div class="alert-success" style="padding: 10px;
text-align: center;font-size:18px;"> Your Feedback Submited Successfully </div>
<?php }?>
<div class="page-details">
<div class="review-form">
<div class="rating-cntnt">
<div class="single-rate">
<strong>Reviews</strong>
<ul class="rate rating-star">
<li>
<div class="radio-btn">
<input type="radio" name="store_service_ratting" id="g1" value="1" checked><label for="g1"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_service_ratting" value="2" id="g2"><label for="g2" value="2"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_service_ratting" value="3" id="g3"><label for="g3"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_service_ratting" id="g4" value="4"><label for="g4"><i class="fa fa-star"></i></label>
</div>
</li>
<li>
<div class="radio-btn">
<input type="radio" name="store_service_ratting" id="g5" value="5"><label for="g5"><i class="fa fa-star"></i></label>
</div>
</li>
</ul>
</div>
</div>
<label>Comments</label>
<input type="hidden" value="<?php echo base64_encription($product_details[0]['product_id']);?>" name="product_id">
<textarea name="user_comment" placeholder="Enter Your Review"></textarea>
</div>
<button type="submit">Submit Review</button>
</div>
<?php echo form_close();?>
<?php }else{ ?>
<h3>Write a review about this product (<a href="javascript:void(0);" data-target="#login-popup" data-toggle="modal">Please login</a>) </h3>
<?php }?>
</div>
</div>
<div class="head">
<h2>Related Products</h2>
</div>
<div class="related-product all-products">
<ul id="related-product-slide">
<?php foreach($categoryData as $categoryData){?>
<li>
<div class="single">
<div class="image">
<?php if($categoryData['product_images_name']!=''){?>
<img src="<?php echo base_url('upload/product/').$categoryData['product_images_name'];?>">
<?php }else{ ?>
<img src="<?php echo base_url('upload/no_image/').'no-photo-available.jpg';?>">
<?php }?>
</div>
<div class="content s-sec" style="height: 50px;">
<p class="name"><?php echo ucwords($categoryData['product_name']);?></p>
<p class="price">Price : $ <?php echo $categoryData['product_price'];?></p>
</div>
<div class="buttons">
<a href="#">ADD TO CART</a>
<a href="<?php echo base_url('Home/shop-details/'.$categoryData['product_id']);?>">DETAILS</a>
</div>
</div>
</li>
<?php }?>
</ul>
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
