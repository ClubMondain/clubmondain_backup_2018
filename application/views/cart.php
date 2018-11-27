<?php
include ('include/head.php');
?>
<body>
<?php
include ('include/header.php');
?>
<main>
<main>
<section class="shop-details">

<div class="container">
<div class="head">
<h2><a href="#"><i class="fa fa-angle-left"></i> Back </a></h2>
</div>
<div class="shop-checkout-table">
<div class="table-responsive">
<table class="table table-bordered">
<thead>
<tr>
<th></th>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Subtotal</th>
<th></th>
</tr>
</thead>
<tbody>

<?php $i = 1; ?>
<?php foreach ($this->cart->contents() as $items): ?>
<?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
<?php $product_details = getProductDetails($items['id']); ?>
<tr>
<td>
<div class="image">
<?php if(!empty($product_details[0]['product_images_name'])) {?>
<img src="<?php echo base_url() . 'upload/product/' . $product_details[0]['product_images_name']; ?>">
<?php }
	else{
 ?>
<img src="<?php echo base_url() . 'upload/no_image/no-photo-available.jpg'; ?>">
<?php } ?>
</div>
</td>
<td>
<div class="content">
<a target="_blank" href="<?php echo base_url('Home/shop-details/' . $product_details[0]['product_id']); ?>"><?php echo $items['name']; ?></a>
<p><?php echo strip_tags(substr(ucwords($product_details[0]['product_description']), 0, 170)); ?></p>
</div>
</td>
<td>
<h3>$<?php echo $this -> cart -> format_number($items['price']); ?></h3>
</td>
<td>

<form class="cart-updater" method="post" action="<?php echo base_url('ShopingCart/getUpdate/' . $items['rowid']); ?>">
<input type="text" name="qty_data" value="<?php echo $items['qty']; ?>">
<button type="submit">Update</button>
</form>

</td>
<td>
<h3>$<?php echo $this -> cart -> format_number($items['subtotal']); ?></h3>
</td>
<td>
<a class="remove" onClick="return confirm('Are you sure you want to remove the item !!')" href="<?php echo base_url('ShopingCart/getRemove/' . $items['rowid']); ?>"><i class="fa fa-trash-o"></i></a>
</td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>

</tbody>
</table>
</div>
<div class="table-bottom">

<div class="shop-continue">
<div class="left">
<button onClick="continueShopping()">Continue Shopping</button>
</div>
<div class="right">
<button class="bg-blk" onClick="clearCart()" >Clear Cart</button>

</div>
</div>
<div class="shop-total">
<h3>Total Price</h3>
<h4>$<?php echo $this -> cart -> format_number($this -> cart -> total()); ?></h4>
</div>

<div class="shop-checkout">
<div class="img">
<img src="<?php echo site_url('assets/web/images/payment.jpg'); ?>">
</div>
<?php if(count($this->cart->contents()) > 0){ ?>
<button onclick="window.location.href='<?php echo base_url('ShopingCart/cdetails'); ?>'">Proceed To Checkout</button>
<?php } ?>
</div>
</div>
</div>
</div>

</section>
</main>
</main>
<?php include('include/footer.php');?>
<script type="text/javascript">
var clearCart = function()
{
window.location.href = "<?php echo base_url('ShopingCart/emptyCart'); ?>";
}
var continueShopping = function()
{
window.location.href = "<?php echo base_url('Home/shop/'); ?>";
}
</script>
</body>
</html>
