<?php include('inc/top.php');?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');?>
<div class="content-wrapper">
<section class="content-header">
<h1>Dashboard</h1>
<br>
<style type="text/css">
.select-address-sec
{
  margin-bottom: 15px;
}
.main-add-sec
{
  width: 100%;
  height: 150px;
  text-align: center;
}
.main-add-sec h3
{
  font-size: 19px;
  line-height: 30px;
  font-weight: 400;
  text-transform: uppercase;
  color: #fff;
  position: absolute;
  left: 0;
  right: 0;
  top: 50%;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
  margin: auto;
  padding: 10px;
}
.inner-sec
{
  width: 100%;
  height: 150px;
  background: #22aa22;
  text-align: center;
}
.inner-sec h4
{
  font-size: 16px;
  line-height: 20px;
  background: rgba(0,0,0,.1);
  color: #fff;
  padding: 10px;
  margin: auto;
}
.inner-sec p a
{
  font-size: 70px !important;
  line-height: 70px;
  color: #fff;
  margin: auto;
  text-decoration:none;
}
</style>
<div class="row">
<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-aqua">
<div class="inner">
<h3><?php echo (!empty($total_user)) ? $total_user : 0; ?></h3>
<p>Total User</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="#url" class="small-box-footer">&nbsp;</a>
</div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-green">
<div class="inner">
<h3><?php echo (!empty($member_user)) ? $member_user : 0; ?></h3>
<p>Total Business Traveller</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="<?php echo  base_url('Dashboard/list-member'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-yellow">
<div class="inner">
<h3><?php echo (!empty($trainer_user)) ? $trainer_user : 0; ?></h3>
<p>Total Trainer</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="<?php echo  base_url('Dashboard/list-trainner'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-red">
<div class="inner">
<h3><?php echo (!empty($company_user)) ? $company_user : 0; ?></h3>
<p>Total Company</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="<?php echo  base_url('Dashboard/list-company'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-6 col-xs-6">
<!-- small box -->
<div class="small-box bg-blue">
<div class="inner">
<h3><?php echo (!empty($total_space)) ? $total_space : 0; ?></h3>
<p>Total Space</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="<?php echo  base_url('Space/list-all-space-view'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-6 col-xs-6">
<!-- small box -->
<div class="small-box bg-aqua">
<div class="inner">
<h3><?php echo (!empty($toatl_event)) ? $toatl_event : 0; ?></h3>
<p>Total Event</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="<?php echo  base_url('Event/list-all-event-view'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>


<!-- ./col -->
<div class="col-lg-6">
<div class="select-address-sec">
<div class="col-sm-6">
<div class="row">
<div class="main-add-sec bg-red">
<h3>Total User</h3>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="row">
<div class="inner-sec bg-blue">
<h4 class="">Current Day</h4>
<p><a><?php echo ($total_user_c == 0)? 0 : $total_user_c; ?></a></p>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="row">
<div class="inner-sec bg-green">
<h4 class="">This Month</h4>
<p><a><?php echo ($total_user_s == 0)? 0 : $total_user_s; ?></a></p>
</div>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>


<div class="col-lg-6">
<div class="select-address-sec">
<div class="col-sm-6">
<div class="row">
<div class="main-add-sec bg-red">
<h3>Business Traveller</h3>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="row">
<div class="inner-sec bg-blue">
<h4 class="">Current Day</h4>
<p><a href="<?php echo  base_url('Dashboard/list-member'); ?>"><?php echo ($bt_count_c == 0)? 0 : $bt_count_c; ?></a></p>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="row">
<div class="inner-sec bg-green">
<h4 class="">This Month</h4>
<p><a href="<?php echo  base_url('Dashboard/list-member'); ?>"><?php echo ($bt_count_s == 0)? 0 : $bt_count_s; ?></a></p>
</div>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>

<div class="col-lg-6">
<div class="select-address-sec">
<div class="col-sm-6">
<div class="row">
<div class="main-add-sec bg-red">
<h3>Trainer</h3>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="row">
<div class="inner-sec bg-blue">
<h4 class="">Current Day</h4>
<p><a href="<?php echo  base_url('Dashboard/list-trainner'); ?>"><?php echo ($tu_count_c == 0)? 0 : $tu_count_c ; ?></a></p>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="row">
<div class="inner-sec bg-green">
<h4 class="">This Month</h4>
<p><a href="<?php echo  base_url('Dashboard/list-trainner'); ?>"><?php echo ($tu_count_s == 0)? 0 : $tu_count_s; ?></a></p>
</div>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>

<div class="col-lg-6">
<div class="select-address-sec">
<div class="col-sm-6">
<div class="row">
<div class="main-add-sec bg-red">
<h3>Company</h3>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="row">
<div class="inner-sec bg-blue">
<h4 class="">Current Day</h4>
<p><a href="<?php echo  base_url('Dashboard/list-company'); ?>"><?php echo ($cu_count_c == 0)? 0 : $cu_count_c; ?></a></p>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="row">
<div class="inner-sec bg-green">
<h4 class="">This Month</h4>
<p><a href="<?php echo  base_url('Dashboard/list-company'); ?>"><?php echo ($cu_count_s == 0)? 0 : $cu_count_s; ?></a></p>
</div>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>


</div>
</section>
</div>
<?php include('inc/footer.php');?>
</div>
<script src="<?php echo base_url('assets/');?>js/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/jquery-ui.min.js"></script>
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php echo base_url('assets/');?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/raphael-min.js"></script>
<script src="<?php echo base_url('assets/');?>js/morris.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url('assets/');?>js/jquery.knob.js"></script>
<script src="<?php echo base_url('assets/');?>js/moment.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/daterangepicker.js"></script>
<script src="<?php echo base_url('assets/');?>js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url('assets/');?>js/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/fastclick.js"></script>
<script src="<?php echo base_url('assets/');?>js/app.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/dashboard.js"></script>
<script src="<?php echo base_url('assets/');?>js/demo.js"></script>
<script src="<?php echo base_url('assets/');?>js/admin_alert.js"></script>
</body>
</html>
