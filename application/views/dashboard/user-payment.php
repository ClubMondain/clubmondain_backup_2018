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
<h2> My Payment </h2>
</div>
<div class="dashboard-events">
<table class="table">
<thead>
<tr>
<th>Transaction ID</th>
<th>Payment Type</th>
<th>Gross Amount</th>
</tr>
</thead>
<?php 
if(count($all_payment)>0){
foreach($all_payment as $payment){ 
?>
<tr>
<td><?php echo $payment['txn_id'];?></td>
<td><?php echo strtoupper($payment['payment_type']);?></td>
<td><?php echo number_format($payment['payment_gross'],2);?></td>
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
