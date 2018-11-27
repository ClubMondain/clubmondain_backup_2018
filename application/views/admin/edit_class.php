<?php
include('inc/top.php');
if(!empty($cataEventdata[0]['category_id'])){
$getExplodeArray = explode(',',$cataEventdata[0]['category_id']);
}else{
$getExplodeArray = array();
}
?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include('inc/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('inc/sidebar.php');?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit Event</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
       <img id="loaderData" style="display: none;width: 50px; height: 50px;" src="http://www.bebestore.com.br/images/shared/lazyloader.gif">
      <div class="col-md-12">
        <?php if(isset($msg) && $msg !=''){ ?>
        <div class="alert <?php echo $msg_class;?>"> <?php echo $msg;?> </div>
        <?php }?>
        <!-- left column -->
         <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <?php $formDetails= array('id'=>'insert_event','method'=>'post','class'=>'','name'=>'insert_event');?>
            <?php echo form_open_multipart('Education/update-class/'.$dataSection[0]['trainer_class_id'],$formDetails);?>
            <input type="hidden" name="old_image_name" value="<?php echo $dataSection[0]['trainer_class_image']; ?>">
            <div class="row">
            <div class="col-md-12">
                  <div class="box-body">
                    <label for="name">Space List<span style="color:red">*</span></label>
                    <div class="select">
                    <select class="form-control" name="event_id" id="event_id">
                    <option value="">Choose</option>
                    <?php
                    if(count($event_list) > 0){
                    foreach($event_list as $event) { ?>
                    <option value="<?php echo $event['business_id'];?>" <?php if($event['business_id'] == $dataSection[0]['event_id']){?> selected <?php }?> ><?php echo $event['business_name'];?></option>
                      <?php } } ?>
                    </select>
                    </div>
                  </div>
                </div>
              <div class="col-md-6">
                <div class="box-body">
                  <label for="name">Class Name<span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="trainer_class_name" value="<?php echo $dataSection[0]['trainer_class_name']; ?>" id="trainer_class_name" placeholder="Class Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="box-body">
                  <label for="exampleInputAddress">Category Name<span style="color:red">*</span></label>
                  <select class="js-example-basic-multiple form-control" name="cat_id[]" id="cat_id" multiple="multiple">
                    <option value="">Choose Category</option>
                    <?php
                    if(count($catdata) > 0){
                    foreach($catdata as $catdata) {?>
                    <option value="<?php echo $catdata['category_id'];?>" <?php if(count($getExplodeArray > 0)){
                    if(in_array($catdata['category_id'],$getExplodeArray)){?> selected <?php }
                     } ?>  ><?php echo $catdata['category_name'];?></option>
                    <?php } } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                  <div class="box-body">
                  <label for="exampleInputAddress">Description<span style="color:red">*</span></label>
                    <textarea class="form-control" name="trainer_class_description" value="" id="trainer_class_description" placeholder="Short Description" rows="6"><?php echo $dataSection[0]['trainer_class_description']; ?></textarea>
                  </div>
                </div>
              <div class="col-md-4">
                <div class="box-body">
                  <label for="name">Website</label>
                  <input type="text" class="form-control" name="trainer_class_website_url" value="<?php echo $dataSection[0]['trainer_class_website_url']; ?>" id="trainer_class_website_url" placeholder="Event Website">
                </div>
              </div>
               <div class="col-md-4">
                  <div class="box-body">
                    <label for="name">Type<span style="color:red">*</span></label>
                    <div class="select">
                    <select class="form-control" name="trainer_class_type" id="trainer_class_type">
                    <option value="Free" <?php if($dataSection[0]['trainer_class_type'] == 'Free'){?> selected <?php } ?>>Free</option>
                    <option value="Paid" <?php if($dataSection[0]['trainer_class_type'] == 'Paid'){?> selected <?php }?>>Paid</option>
                    </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="box-body">
                    <label for="exampleInputAddress">Price <span style="color:red">(Paid classes)*</span></label>
                    <input type="text" class="form-control" name="trainer_class_price" value="<?php echo $dataSection[0]['trainer_class_price']; ?>" id="trainer_class_price" placeholder="Price">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body">
                    <label for="name">Country Name<span style="color:red">*</span></label>
                    <div class="select">
                    <select class="form-control" name="country_id_name" id="country_id" onChange="getCity(this.value)">
                    <option value="">Choose Country</option>
                    <?php
                    if(count($countrydata) > 0){
                    foreach($countrydata as $country) { ?>
                    <option value="<?php echo $country['country_id'];?>" <?php if($dataSection[0]['country_id'] == $country['country_id']){?> selected <?php } ?>><?php echo $country['country_name'];?></option>
                      <?php } } ?>
                    </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body">
                    <label for="name">City Name<span style="color:red">*</span></label>
                    <div class="select">
                    <select class="form-control" name="city_id_name" id="city_id">
                    <?php
                    if(count($citydata) > 0){
                    foreach($citydata as $city) {
                    ?>
                    <option value="<?php echo $city['city_id'];?>" <?php if($dataSection[0]['city_id'] == $city['city_id']){?> selected <?php } ?>><?php echo $city['city_name'];?></option>
                    <?php
                    }
                    }
                    ?>
                    </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body">
                    <label for="name">Address<span style="color:red">*</span></label>
                    <input type="text" class="form-control" name="trainer_class_address" value="<?php echo $dataSection[0]['trainer_class_address']; ?>" id="autocomplete" placeholder="Address">
                  </div>
                </div>
               <div class="col-md-6">
                  <div class="box-body">
                    <label for="name">No of Booking<span style="color:red">*</span></label>
                    <input type="number" class="form-control" name="class_no_of_booking" value="<?php echo $dataSection[0]['class_no_of_booking']; ?>" id="class_no_of_booking" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="upload">
                      <label for="event_pic" id="photo-img-label">Upload Picture</label>
                      <input id="event_pic" class="form-control" type="file" name="trainer_class_image">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body">
                    <label for="name">Status<span style="color:red">*</span></label>
                    <div class="select">
                    <select class="form-control" name="trainer_class_status" id="trainer_class_status">
<option value="Active" <?php if($dataSection[0]['trainer_class_status'] == 'Active'){?> selected <?php } ?>>Active</option>
              <option value="Inactive" <?php if($dataSection[0]['trainer_class_status'] == 'Inactive'){?> selected <?php } ?>>Inactive</option>
                    </select>
                    </div>
                  </div>
                </div>

              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" onClick="return EventValidation(2);"><i class="fa fa-check"></i>&nbsp;Submit</button>
              </div>
              <?php echo form_close();?> </div>
          </div>
        </div>
        </div>
      </div>
      <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
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
<!-- SELECT 2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
$(function(){
   $("select").select2();
})
var getCity = function(e)
{
  $.ajax({
    url: '<?php echo base_url('Event/ajaxGetCityName'); ?>',
    type: 'POST',
    dataType: 'HTML',
    data: {
        id: e
    },
    beforeSend: function( ) {
      $('#loader').show();
    },
    success: function( data ) {
      $('#loader').hide();
      $('#city_id').html(data);
    }
  });
}
</script>
<style type="text/css">
#ui-datepicker-div { font-size: 12px; }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACjdpaolaUHA-rjK_YEvP8UdQi9Z3YIwk&libraries=places&callback=initAutocomplete" async defer></script>
<script type="text/javascript">
//========================================== Get Locate Address ============================================
var placeSearch, autocomplete;
var componentForm = {
street_number: 'short_name',
route: 'long_name',
locality: 'long_name',
administrative_area_level_1: 'short_name',
country: 'long_name',
postal_code: 'short_name'
};

function initAutocomplete()
{
	// Create the autocomplete object, restricting the search to geographical
	// location types.
	autocomplete = new google.maps.places.Autocomplete(
	/** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
	{types: ['geocode']});
	// When the user selects an address from the dropdown, populate the address
	// fields in the form.
	autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress()
{
// Get the place details from the autocomplete object.
var place = autocomplete.getPlace();

for (var component in componentForm)
{
	document.getElementById(component).value = '';
	document.getElementById(component).disabled = false;
}

// Get each component of the address from the place details
// and fill the corresponding field on the form.
for (var i = 0; i < place.address_components.length; i++)
{
	var addressType = place.address_components[i].types[0];
	if (componentForm[addressType]) {
		var val = place.address_components[i][componentForm[addressType]];
			document.getElementById(addressType).value = val;
		}
	}
}
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate()
{
	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(function(position) {
		var geolocation = {
			lat: position.coords.latitude,
			lng: position.coords.longitude
		};
		var circle = new google.maps.Circle({
			center: geolocation,
			radius: position.coords.accuracy
		});
		autocomplete.setBounds(circle.getBounds());
		});
	}
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
</script>
</body>
</html>
