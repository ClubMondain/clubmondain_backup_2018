<?php $this->load->view('include/head'); ?>
<body>
<?php $this->load->view('include/header');?>
<main class="dashboard" id="dashboard-main">
<?php $this->load->view('include/left-sidebar');?>
<div class="dashboard-main">
<div class="left">
<div class="dashboard-toggle" id="dashboard-toggle">
<button><i class="fa fa-bars"></i></button>
</div>
<div class="single-content">
<div class="dashboard-head">
<h2> My Purchased Product </h2>
</div>
<div class="dashboard-events">
<table class="table">
<thead>
<tr>
<th>Name</th>
<th>Qty</th>
<th>Price</th>
<th>Total Price</th>
<th>Date</th>
</tr>
</thead>
<?php 
if(count($all_p_order)>0){
foreach($all_p_order as $all_p){ 
$product_details = getProductDetails($all_p['product_id']); 	
$total_price = $all_p['price']*$all_p['qty'];
?>
<tr>
<td><a href="<?php echo base_url('Home/shop-details/'.$product_details[0]['product_id']); ?>" target="_blank"><?php echo $product_details[0]['product_name'];?></td>
<td><?php echo $all_p['qty'];?></td>
<td><?php echo number_format($all_p['price'],2);?></td>
<td><?php echo number_format($total_price,2);?></td>
<td><?php echo $all_p['cdate'];?></td>
</tr>
<?php 
}
} 
?>
</table>
</div>
</div>
</div>
<?php $this->load->view('include/right-sidebar');?>
</div>
</main>
<?php $this->load->view('include/footer');?>
</body>
</html>
