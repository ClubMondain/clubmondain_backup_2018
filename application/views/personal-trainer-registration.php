<?php
include ('include/head.php');
?>
<body>
<?php include('include/header.php');?>
<main>
<section class="form-sec shadow-top">
<div class="container">
<h3>Personal Trainer <em>Registration</em></h3>
<p>We would like to get to know who you are and how you will co-create the easiest way to stay fit with our members. Therefore we kindly request you to fill out the following fields. </p>
<p>We will get in contact after your application to connect you directly to the platform as a Personal Trainer. </p>
<div class="error_reg">
<?php if(isset($msg) && $msg !=''){ ?>
<div class="alert <?php echo $msgclass;?>">
<?php echo $msg;?> </div>
<?php }?>
</div>
<div class="details-form mem-form">
<div class="row">
<div class="col-sm-12">
<div class="single">
</div>
</div>
<?php
$formDetails = array(
  'id'=>'trainer_reg',
  'name'=>'trainer_reg',
  'method'=>'post',
  'novalidate' => 'novalidate',
  'autocomplete' => 'off'
);
echo form_open_multipart('Home/insert_personal_trainer_reg',$formDetails);
?>
<div class="col-sm-6">
<div class="single">
<p>First Name<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please Enter Your First Name"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" name="fname" id="trn_fname" value="<?php echo set_value('fname');?>">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Last Name<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please Enter Your Last Name"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" name="lname" id="trn_lname" value="<?php echo set_value('lname');?>">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Email<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please Enter Your Email Address"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="email" name="email" id="trn_email" value="<?php echo set_value('email');?>">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Phone Number <a class="tooltip-btn" title="Please Enter Your Phone No"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="tel" name="phone" id="trn_phone" value="<?php echo set_value('phone');?>" onKeyUp="this.value=this.value.replace(/[^\d]/,'')">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Password<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please Create Your Password"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="password" name="password" id="trn_password" value="<?php echo set_value('password');?>">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Confirm Password<span style="color:#F00">*</span> <a class="tooltip-btn" title="Please Confirm Your Password"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="password" name="conf_password" id="trn_conf_password" value="<?php echo set_value('conf_password');?>">
</div>
</div>
</div>
</div>
<div class="col-sm-12">
<div class="single">
<p>Date Of Birth<span style="color:#F00">*</span>
<a class="tooltip-btn" title="Please Enter Your Date of Birth">
<i class="fa fa-info-circle"></i>
</a>
</p>
<div class="form-row">
<div class="field">
<div class="date">
<div class="col-xs-4">
<div class="row">
    <div class="select">
        <select name="dob_year" id="trn_year" value="<?php echo set_value('dob_year');?>" onChange="setDays(month,day,this)">
<?php $dob_year = $_POST["dob_year"];?>
<option value="">Choose Year</option>
<?php for($i=1900;$i<=2050;$i++){?>

<option <?php if ($dob_year == $i) { ?>selected="true" <?php }?> value="<?php echo $i;?>"><?php echo $i; ?></option>
<?php }?>
</select>
    </div>
</div>
</div>
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="dob_month" id="trn_month" onChange="setDays(this,day,year)">
<?php $dob_month = $_POST["dob_month"];?>
<option value="">Choose Month</option>
<?php for($i=1;$i<=12;$i++){
$name = date('F', mktime(0, 0, 0, $i, 17));
?>
<option <?php if ($dob_month == $i) { ?>selected="true" <?php }?> value="<?php echo $i;?>"><?php echo $name; ?></option>
<?php }?>
</select>
</div>
</div>
</div>
<div class="col-xs-4">
<div class="row">
<div class="select">
<select name="dob_date" id="trn_date" onChange="setDays(month,this,year)">
<?php $dob_date = $_POST["dob_date"];?>
<option value="">Choose Date</option>
<?php for($i=1;$i<=31;$i++){?>
<option <?php if ($dob_date == $i) { ?>selected="true" <?php }; ?> value="<?php echo $i;?>"><?php echo $i; ?></option>
<?php }?>
</select>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-12">
<div class="row">
<div class="col-md-12">
<div class="single">
<p>Address <a class="tooltip-btn" title="Please Enter Your Address"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<input type="text" placeholder="Street Address" name="street_adr" value="<?php echo set_value('street_adr');?>" id="trn_street">
</div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="single">
<div class="form-row">
<div class="field">
<input type="text" placeholder="Street Address 2" name="street_adr2" value="<?php echo set_value('street_adr2');?>" id="trn_street_adr2">
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="single">
<div class="form-row">
<div class="field">
<input type="text" placeholder="State" name="state" value="<?php echo set_value('state');?>" id="trn_state">
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="single">
<div class="form-row">
<div class="field">
<input type="text" placeholder="Postal Code" name="postal_code" value="<?php echo set_value('postal_code');?>" id="trn_post_code" onKeyUp="this.value=this.value.replace(/[^\d]/,'')">
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="single">
<div class="form-row">
<div class="field">
<div class="select">
    <select name="country" id="trn_country" class="js-example-basic-single" onChange="set_country(this.value,'<?php echo base_url();?>');">
<?php /*?>multiple="multiple"<?php */ ?>
<option value="">Choose Country</option>
<?php foreach($country as $country){?>
<option value="<?php echo $country['country_id']; ?>"><?php echo $country['country_name']; ?></option>
<?php } ?>
</select>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="single">
<div class="form-row">
<div class="field">
<div class="select">
<select class="js-city-single trainer_city_list" name="city" id="eventcity_list">
<option value="">Choose City</option>
</select>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="single">
<div class="form-row">
<div class="field">
<input type="text" placeholder="New city name if not present in the city dropdown" name="new_city" value="<?php echo set_value('new_city');?>" id="new_city">
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>About Yourself<span style="color:#F00">*</span> <a class="tooltip-btn" title="Tell us about your field of expertise and passion"><i class="fa fa-info-circle"></i></a></p>
<div class="form-row">
<div class="field">
<textarea name="about_yourself" id="trn_yourself"><?php echo set_value('about_yourself'); ?></textarea>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Experience <a class="tooltip-btn" title="Tell us about your past experience, Let us get to know you."><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<textarea name="experience" id="trn_exp"><?php echo set_value('experience'); ?></textarea>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Profile Picture <a class="tooltip-btn" title="" data-original-title="Please Upload Your Profile Picture"><i class="fa fa-info-circle"></i></a> </p>
<div class="form-row">
<div class="field">
<div class="upload">
<input id="photo-img" onchange="document.getElementById('photo-img-label').innerHTML = document.getElementById('photo-img').value" type="file" name="photo" id="trn_photo">
<label for="photo-img" id="photo-img-label">Upload Your Photo</label>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Where Did you hear about us?<span style="color:#F00">*</span></p>
<div class="form-row">
<div class="field">
<div class="all-check">
<div class="check">
<input type="checkbox" id="about_check1" name="about_us[]" value="client_check" class="about_check">
<label for="about_check1">Client of ours</label>
</div>
<div class="check">
<input type="checkbox" id="about_check2" name="about_us[]" value="aricle_check" class="about_check">
<label for="about_check2">News Article</label>
</div>
<div class="check">
<input type="checkbox" id="about_check3" name="about_us[]" value="other_check" class="about_check">
<label for="about_check3">Other</label>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Membership Rules<span style="color:#F00">*</span> <br>
<a href="<?php echo base_url('Home/membershp-rules'); ?>" target="_blank">Click Here</a> </p>
<div class="form-row">
<div class="field">
<div class="all-check">
<div class="check">
<input type="checkbox" id="trainer_membership_rule" name="membership_rule" value="membership_rule">
<label for="trainer_membership_rule">Accept our membership rules</label>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="single">
<p>Privacy Policy<span style="color:#F00">*</span><br>
<a href="<?php echo base_url('Home/privacy'); ?>" target="_blank">Click Here</a> </p>
<div class="form-row">
<div class="field">
<div class="all-check">
<div class="check">
<input type="checkbox" id="trainer_privacy_policy" name="privacy_policy" value="privacy_policy">
<label for="trainer_privacy_policy">Accept our privacy policy</label>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-12">
<div class="single text-center">
<p><em>Once you submit your application, we will contact you sortly</em></p>
<p><em>Thank you for considering Club Mondain as your space for a healthy lifestyle.</em></p>
</div>
</div>
<div class="clearfix"></div>
<div class="col-md-4 col-sm-6 col-centered">
<div class="single">
<div class="form-row">
<div class="field">
<button type="submit" onClick="return trainer_registration();">Register</button>
</div>
</div>
</div>
</div>
<?php echo form_close(); ?> </div>
</div>
</div>
</section>
</main>
<?php
include ('include/footer.php');
?>
</body>

</html>
