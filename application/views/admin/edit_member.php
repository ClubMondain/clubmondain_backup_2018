<?php include('inc/top.php');?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include('inc/header.php');?>
		<!-- Left side column. contains the logo and sidebar -->
		<?php include('inc/sidebar.php');?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>Edit Members</h1>
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<?php if(isset($msg) && $msg !=''){ ?>
						<div class="alert <?php echo $msg_class;?>">
							<?php echo $msg;?>
						</div>
						<?php }?>
						<div class="row">
							<div class="col-md-12">
								<div class="box box-primary">
									<?php $formDetails= array('id'=>'create_member','method'=>'post','class'=>'','name'=>'create_member');?>
									<?php echo form_open('Dashboard/member-profile-update/'.$all_members[0]['user_id'].'',$formDetails);?>
									<div style="color:#F00"><?php  //echo validation_errors(); ?></div>
									<input type="hidden" name="date_reg" value="<?php echo date("d-m-Y");?>">
									<div class="row">
										<div class="col-md-6">
											<div class="box-body">
												<label for="member_username">First Name<span style="color:red">*</span></label>
												<input type="text" class="form-control" name="first_name" value="<?php echo $all_members[0] ['first_name']?>" id="first_name" placeholder="First Name" maxlength="25" minlength="2">
											</div>
										</div>
										<div class="col-md-6">
											<div class="box-body">
												<label for="member_username">Last Name<span style="color:red">*</span></label>
												<input type="text" class="form-control" name="last_name" value="<?php echo $all_members[0] ['last_name']?>" id="last_name" placeholder="Last Name" maxlength="25" minlength="2">
											</div>
										</div>
										<div class="col-md-6">
											<div class="box-body">
												<label for="exampleInputEmail">Email Address<span style="color:red">*</span></label>
												<input type="email" class="form-control" name="email" value="<?php echo $all_members[0]['email']; ?>" placeholder="Email Address" id="member_email">
											</div>
										</div>
										<div class="col-md-6">
											<div class="box-body">
												<label for="exampleInputEmail">Phone No</label>
												<input type="text" class="form-control" name="phone" value="<?php echo $all_members[0]['phone']; ?>" placeholder="Phone No" id="phone">
											</div>
										</div>
										<div class="col-md-4">
											<div class="box-body">
												<label for="exampleInputEmail">DOB<span style="color:red">*</span></label>
												<input type="text" class="form-control dp" name="dob" value="<?php echo $all_members[0]['dob']; ?>" placeholder="DOB" id="dob">
											</div>
										</div>
										<div class="col-md-4">
											<div class="box-body">
												<label for="exampleInputEmail">Company Name</label>
												<input type="text" class="form-control" name="member_company_name" value="<?php echo $all_members[0]['member_company_name']; ?>" placeholder="Company Name" id="member_company_name">
											</div>
										</div>
										<div class="col-md-4">
											<div class="box-body">
												<label for="exampleInputEmail">Functional Title</label>
												<input type="text" class="form-control" name="member_function_title" value="<?php echo $all_members[0]['member_function_title']; ?>" placeholder="Functional Title" id="member_function_title">
											</div>
										</div>
										<div class="col-md-12">
											<div class="box-body">
												<label for="exampleInputEmail">About Us</label>
												<textarea class="form-control" name="about_us" value="" id="about_us" placeholder="About Us" rows="6"><?php echo strip_tags($all_members[0]['about_us']); ?></textarea>
											</div>
										</div>
										<div class="col-md-6">
											<div class="box-body">
												<label for="exampleInputEmail">Facebook Link</label>
												<input type="text" class="form-control" name="user_facebook" value="<?php echo $all_members[0]['user_facebook']; ?>" placeholder="Facebook Link" id="user_facebook">
											</div>
										</div>
										<div class="col-md-6">
											<div class="box-body">
												<label for="exampleInputEmail">Instagram Link</label>
												<input type="text" class="form-control" name="user_instagram" value="<?php echo $all_members[0]['user_instagram']; ?>" placeholder="Instagram Link" id="user_instagram">
											</div>
										</div>
										<div class="col-md-6">
											<div class="box-body">
												<label for="exampleInputEmail">Twitter Link</label>
												<input type="text" class="form-control" name="user_twitter" value="<?php echo $all_members[0]['user_twitter']; ?>" placeholder="Twitter Link" id="user_twitter">
											</div>
										</div>
										<div class="col-md-6">
											<div class="box-body">
												<label for="exampleInputEmail">Street Address</label>
												<input type="text" class="form-control" name="street_address_1" value="<?php echo $all_members[0]['street_address_1']; ?>" placeholder="Street Address" id="street_address_1">
											</div>
										</div>
										<div class="col-md-6">
											<div class="box-body">
												<label for="exampleInputEmail">Password</label>
												<input type="password" class="form-control" name="password" value="" placeholder="" id="password">
											</div>
										</div>
										<div class="col-md-6">
											<div class="box-body">
												<label for="exampleInputAddress">Status <span style="color:red">*</span></label>
												<select class="form-control" name="status" id="status">
													<option  value="">Choose Status</option>
<option  value="Active" <?php if($all_members[0]['status'] == 'Active'){ ?> selected <?php } ?> >Active</option>
<option  value="Inactive" <?php if($all_members[0]['status'] == 'Inactive'){ ?> selected <?php } ?>>Inactive</option>
												</select>
											</div>
										</div>
										<div class="col-md-12">
											<div class="box-body">
												<label for="exampleInputEmail">Full Address</label>
												<textarea class="form-control" name="street_address_2" id="street_address_2" placeholder="Full Address" rows="6"><?php echo strip_tags($all_members[0]['street_address_2']); ?></textarea>
											</div>
										</div>
									</div>
									<div class="box-footer">
										<button type="submit" class="btn btn-primary" ><i class="fa fa-check"></i>&nbsp;Submit</button>
									</div>
									<?php echo form_close();?>
								</div>
							</div>
						</div>
					</div>
					<!-- /.row -->
				</section>
				<!-- /.content -->
			</div>
			<?php include('inc/footer.php');?>
		</div>
		<!-- ./wrapper -->
		<!-- jQuery 2.2.3 -->
		<script src="<?php echo base_url('assets/');?>js/jquery-2.2.3.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="<?php echo base_url('assets/');?>js/bootstrap.min.js"></script>
		<!-- FastClick -->
		<script src="<?php echo base_url('assets/');?>js/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url('assets/');?>js/app.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?php echo base_url('assets/');?>js/demo.js"></script>
		<script src="<?php echo base_url('assets/');?>js/admin_alert.js"></script>
		<script src="<?php echo base_url('assets/');?>js/jquery-ui.js"></script>
<script type="text/javascript">
$('.dp').datepicker({
    dateFormat: 'yy-mm-dd',
	changeMonth: true,
	changeYear:  true
});
</script>
<style type="text/css">
#ui-datepicker-div { font-size: 12px; }
</style>
	</body>
	</html>
