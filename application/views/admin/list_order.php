<?php
$page_title = 'Order List';
include('inc/top.php');
?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> <?php echo $page_title;?> </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <?php if(isset($msg) && $msg !=''){?>
    <div class="alert <?php echo $msg_class;?>"> <?php echo $msg;?> </div>
    <?php }?>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header"> </div>
            <div class="box-body">
            <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
				          <th>User</th>
                  <th>Product Name</th>
                  <th>Amount(&euro;)</th>
                  <th>Qty</th>
                  <th>Total Price</th>
                  <th>Shipping Address</th>
                  <th>Shipping Country</th>
                  <th>Shipping State</th>
                  <th>Shipping City</th>
                  <th>Shipping Postal Code</th>
                  <th>Date</th>
                  </tr>
              </thead>
          <?php
         if(count($order)>0){
	       foreach($order as $payment_single){
         if($payment_single['status'] == 'Purchase'){
		     $get_user_details = get_user_details($payment_single['user_id']);
         if($get_user_details['user_type'] == 'C'){
           $name = $get_user_details['company_name'];
         }else{
        $name = $get_user_details['first_name'].' '.$get_user_details['last_name'];
         }
         $get_product_details = get_product_details($payment_single['product_id']);
	       ?>
              <tr>
                <td><?php echo $name;?></td>
                <td><?php echo $get_product_details[0]['product_name']; ?></td>
                <td><?php echo $get_product_details[0]['product_price']; ?></td>
                <td><?php echo $payment_single['qty']; ?></td>
                <td><?php echo ($payment_single['qty']*$get_product_details[0]['product_price']); ?></td>
                <td><?php echo $payment_single['shipping_address']; ?></td>
                <td><?php echo $payment_single['shipping_country']; ?></td>
                <td><?php echo $payment_single['shipping_state']; ?></td>
                <td><?php echo $payment_single['shipping_city']; ?></td>
                <td><?php echo $payment_single['shipping_postal_code']; ?></td>
                <td><?php echo $payment_single['date']; ?></td>
              </tr>
              <?php
			  }
      }
			  }
	          ?>
            </table>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include('inc/footer.php');?>
<!-- Control Sidebar -->
<script src="<?php echo base_url('assets/');?>js/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/fastclick.js"></script>
<script src="<?php echo base_url('assets/');?>js/app.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/demo.js"></script>
<script src="<?php echo base_url('assets/');?>js/admin_alert.js"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
