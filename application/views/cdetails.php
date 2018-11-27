<?php include('include/head.php'); ?>
<body>
<?php include('include/header.php'); ?>
<main>
<form class="pay" method="post" action="<?php echo base_url('ShopingCart/add-payment'); ?>">
<input type="hidden" name="total_amount" value="<?php echo $this -> cart -> total(); ?>">
<section class="shop-details">
<div class="container">
<div class="head">
<h2><a href="<?php echo base_url('ShopingCart/index'); ?>"><i class="fa fa-angle-left"></i> Back to Cart Page</a></h2>
</div>
<div class="customer-information">
<div class="row">
<div class="col-md-12">
<div class="cart-sidebar">
<div class="all-cart-product">
<?php foreach ($this->cart->contents() as $items): ?>
<?php $product_details = getProductDetails($items['id']); ?>
<?php echo form_hidden("product_id[".$items['qty']."]", $product_details[0]['product_id']); ?>
<div class="single">
<div class="image">
<?php if(!empty($product_details[0]['product_images_name'])) {?>
<img src="<?php echo base_url() . 'upload/product/' . $product_details[0]['product_images_name']; ?>">
<?php }else{ ?>
<img src="<?php echo base_url() . 'upload/no_image/no-photo-available.jpg'; ?>">
<?php } ?>
<span><?php echo $items['qty']; ?></span>
</div>
<div class="cntnt">
<p><?php echo $product_details[0]['product_description']; ?></p>
</div>
<div class="price">
<p>$<?php echo $this -> cart -> format_number($items['price']); ?></p>
</div>
</div>
<?php endforeach; ?>
</div>
<div class="all-cart-price">
<p><strong>Total</strong><span>$<?php echo $this -> cart -> format_number($this -> cart -> total()); ?></span></p>
</div>
</div>
</div>
<div class="col-sm-12">
<div class="single">
<div class="shop-checkout" style="border: none;">
<?php
if(isset($_SESSION['user_details'])){
?>
<button type="submit">Pay</button>
<?php
}else{
?>
<button type="button" data-target="#login-popup" data-toggle="modal">please login to continue</button>
<?php	
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</form>
</main>
<?php include('include/footer.php')?>
</body>
</html>
