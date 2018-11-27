<?php 
include('inc/top.php');
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
<h1>Create Delegate Space</h1>
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
    <?php $formDetails= array('id'=>'insert_space','method'=>'post','class'=>'','name'=>'insert_event');?>
    <?php echo form_open_multipart('InviteSpace/insert_space',$formDetails);?>
      <div class="row">
      
      
        <div class="col-md-6">
          <div class="box-body">
            <label for="name">Select Company<span style="color:red">*</span></label>
            <div class="select">
            <select class="form-control" name="user_id" id="user_id" onChange="getCity(this.value)">
            <option value="">Select Company</option>
            <?php 
            if(count($company_details) > 0){
            foreach($company_details as $val) { ?>
            <option value="<?php echo $val->user_id;?>"><?php echo $val->company_name;?></option>
              <?php } } ?>
            </select>
            </div>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="box-body">
            <label for="name">Select Delegate Space  Type <span style="color:red">*</span></label>
            <div class="select">
            <select class="form-control" name="invite_type" id="invite_type">
            <option value="">Select Delegate Space </option>
            <option value="1">Public</option>
            <option value="2">Private</option>
            </select>
            </div>
          </div>
        </div>
      
      <div class="col-md-6">
        <div class="box-body">
          <label for="name">Delegate Space Name<span style="color:red">*</span></label>
          <input type="text" class="form-control" name="business_name"  id="bsn_name" placeholder="Delegate Invite Name">
        </div>
      </div>


      <div class="col-md-6">
        <div class="box-body">
          <label for="exampleInputAddress">Category Name<span style="color:red">*</span></label>
          <select class="js-example-basic-multiple form-control" name="cat_id[]" id="bsn_cat_id" multiple="multiple">
            <option value="">Choose Category</option>
            <?php 
            if(count($category) > 0){
            foreach($category as $cat_val) {?>
            <option value="<?php echo $cat_val['category_id'];?>"><?php echo $cat_val['category_name'];?></option>
            <?php } } ?>
          </select>
        </div>
      </div>


        <div class="col-md-6">
        <div class="box-body">
          <label for="name">Delegate Space Website URL<span style="color:red">*</span></label>
          <input type="text" class="form-control" name="business_website_url"  id="business_website_url" placeholder="Delegate Space Website URL">
        </div>
      </div>


        <div class="col-md-6">
        <div class="box-body">
          <label for="name">Street Address<span style="color:red">*</span></label>
          <input type="text" class="form-control" name="business_street"  id="autocomplete" onFocus="geolocate()" placeholder="Delegate Invite Business">
        </div>
      </div>

      <div class="col-md-6">
        <div class="box-body">
          <label for="name">Postal Code<span style="color:red">*</span></label>
          <input type="text" class="form-control" name="business_postal_code"  id="bsn_postal_code" placeholder="Postal Code">
        </div>
      </div>

     <div class="col-md-6">
          <div class="box-body">
            <label for="name">Select Country <span style="color:red">*</span></label>
            <div class="select">
            <select class="form-control" name="country_id" id="bsn_country" onChange="get_city(this.value)">
            <option value="">Choose Country</option>
            <?php 
            if(count($country) > 0){
            foreach($country as $country_val) { ?>
            <option value="<?php echo $country_val['country_id'];?>"><?php echo $country_val['country_name'];?></option>
              <?php } } ?>
            </select>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="box-body">
            <label for="name">City Name<span style="color:red">*</span></label>
            <div class="select">
            <select class="form-control" name="city_id" id="eventcity_list">
              <option>Select City Name</option>
            </select>
            </div>
          </div>
</div>
	
          <div class="col-md-6">
          <div class="box-body">
            <div class="upload">
              <label for="event_pic" id="photo-img-label">Upload Space Image<span style="color:red">*</span></label>
              <input id="business_image" class="form-control" type="file" name="business_image">
            </div>
          </div>
        </div>

       

          <div class="col-md-6">
          <div class="box-body">
            <div class="upload">
              <label for="event_pic" id="photo-img-label">Upload Space Banner Image<span style="color:red">*</span></label>
              <input id="business_banner_image" class="form-control" type="file" name="business_banner_image">
            </div>
          </div>
        </div>
        
        
        <?php
        $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
      ?>
        <div class="col-sm-12 opening-hours" style="padding: 30px;">
                     <div class="single">
                        <p><strong>Opening Hours <span style="color:red">*</span></strong>  </p>
                     </div>
                     <div class="row">
                        <?php foreach($days as $k => $d){?>
                        <div class="col-lg-12">
                           <div class="single">
                              <div class="row">
                                 <div class="col-lg-2 col-sm-2">
                                    <p class="day-name" style="margin-top: 67px;"><?php echo $d; ?></p>
                                    <input type="hidden" name="day_name[<?php echo $k; ?>]" value="<?php echo $d; ?>" id="day_name_[<?php echo $k; ?>]">
                                 </div>
                                 <div class="col-lg-4 col-sm-4" id="divf_<?php echo $k; ?>">
                                    <p class="difference" style="margin-top: 30px;">From</p>
                                    <div class="form-row">
                                       <div class="field">
                                          <div class="date">
                                             <div class="col-xs-4">
                                                <div class="row">
                                                   <div class="select">
                                                      <select name="from_opening_hour<?php echo $k; ?>" id="from_opening_hour_<?php echo $k; ?>" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
                                                         <option value="">Choose</option>
                                                         <?php for($i=1;$i<=12;$i++){?>
                                                         <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                         <?php }?>
                                                      </select>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-xs-4">
                                                <div class="row">
                                                   <div class="select">
                                                      <select name="from_opening_mint<?php echo $k; ?>" id="from_opening_mint_<?php echo $k; ?>"  onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
                                                         <option value="">Choose</option>
                                                         <?php for($i=00;$i<60;$i+=15){?>
                                                         <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                         <?php }?>
                                                      </select>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-xs-4">
                                                <div class="row">
                                                   <div class="select">
                                                      <select name="from_opening_indication<?php echo $k; ?>" id="from_opening_indication_[<?php echo $k; ?>]">
                                                         <option value="AM">AM</option>
                                                         <option value="PM">PM</option>
                                                      </select>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-4 col-sm-4" id="divs_<?php echo $k; ?>">
                                    <p class="difference" style="margin-top: 30px;">To</p>
                                    <div class="form-row">
                                       <div class="field">
                                          <div class="date">
                                             <div class="col-xs-4">
                                                <div class="row">
                                                   <div class="select">
                                                      <select name="to_opening_hour<?php echo $k; ?>" id="to_opening_hour_<?php echo $k; ?>" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
                                                         <option value="">Choose</option>
                                                         <?php for($i=1;$i<=12;$i++){?>
                                                         <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                         <?php }?>
                                                      </select>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-xs-4">
                                                <div class="row">
                                                   <div class="select">
                                                      <select name="to_opening_mint<?php echo $k; ?>" id="to_opening_mint_<?php echo $k; ?>" onChange="reverse_checked(this.value,'opening_hour_close_<?php echo strtolower($d); ?>');">
                                                         <option value="">Choose</option>
                                                         <?php for($i=0;$i<60;$i+=15){?>
                                                         <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                         <?php }?>
                                                      </select>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-xs-4">
                                                <div class="row">
                                                   <div class="select">
                                                      <select name="to_opening_indication<?php echo $k; ?>" id="to_opening_indication_[<?php echo $k; ?>]">
                                                         <option value="AM">AM</option>
                                                         <option value="PM">PM</option>
                                                      </select>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-2" style="margin-top: 67px;">
                                    <div class="check closed">
                                       <input type="checkbox" onClick="disable('divf_<?php echo $k; ?>','divs_<?php echo $k; ?>','opening_hour_close_<?php echo strtolower($d); ?>')" id="opening_hour_close_<?php echo strtolower($d); ?>" name="opening_hour_close<?php echo $k; ?>" value="1">
                                       <label for="opening_hour_close_<?php echo strtolower($d); ?>">Closed</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php }?>
                     </div>
                  </div>
        
	
      <div class="col-md-12">
          <div class="box-body">
          <label for="exampleInputAddress">Delegate Space Description<span style="color:red">*</span></label>
<textarea class="form-control" name="business_description" id="description" placeholder="Space Description" rows="6"></textarea>
          </div>
        </div>


        <div class="col-md-12">
            <div class="box-body">
              <label for="Status">Status<span style="color:red">*</span></label>
              <div class="select">
              <select class="form-control" name="business_status" id="business_status">
                <option value="">Select Status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="box-footer">
        <button type="submit" class="btn btn-primary" onClick="return invite_spave_validation();">
        <i class="fa fa-check"></i>&nbsp;Submit</button>
      </div>
      </div>
     <!--END DIV  -->
      </div> 
    <?php echo form_close();?> 
    </div>
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
url: '<?php echo base_url('Space/ajaxGetCityName'); ?>',
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
	.opening-hours {
    margin-bottom: 20px;
}
</style>

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


 <script>
      //=========================================Ajax For City Dropdown ==========================================
      function get_city(e)
      {
      $.ajax({
      url: '<?php echo base_url();?>'+"InviteSpace/check_city",
      dataType: 'html',
      type: 'POST',
      data:{country:e},
      success: function(result)
      {
      	//result = result[0].replace(/\s/g, '');
      	//alert(result);
      	/*<option value="">Choose City</option>
      	 $('#business_city').html(html);*/
      	 $('#eventcity_list').html(result);
      }
      });
      }
      //=========================================Ajax For City Dropdown ==========================================
   </script>



   <script>
   	//////////////////////////////////////////////// FOR INVITE SPACE VALIDATION /////////////////////////////////////////
function invite_spave_validation()
{
	var user_id = $("#user_id").val();	
	var invite_type = $("#invite_type").val();	
	var bsn_url = $("#bsn_website").val();
	var bsn_name = $("#bsn_name").val();
	var bsn_cat_id = $("#bsn_cat_id").val();	
	var business_website_url = $("#business_website_url").val();	
	var bsn_country = $("#bsn_country").val();
	var eventcity_list = $("#eventcity_list").val();
	//var bsn_description = $("#description").val();
	var bsn_description = document.getElementById('description').value;
	
	//alert(bsn_description);	
	var bsn_postal_code = $("#bsn_postal_code").val();
	var business_image = $("#business_image").val();
	var business_banner_image = $("#business_banner_image").val();
	var bsn_street = $(".bsn_street").val();
	var business_status = $("#business_status").val();	
	
	var frm_openhr1 = $("#from_opening_hour_0").val();
	var frm_openhr2 = $("#from_opening_hour_1").val();
	var frm_openhr3 = $("#from_opening_hour_2").val();
	var frm_openhr4 = $("#from_opening_hour_3").val();
	var frm_openhr5 = $("#from_opening_hour_4").val();
	var frm_openhr6 = $("#from_opening_hour_5").val();
	var frm_openhr7 = $("#from_opening_hour_6").val();
	
	
	var frm_openmin1 = $("#from_opening_mint_0").val();
	var frm_openmin2 = $("#from_opening_mint_1").val();
	var frm_openmin3 = $("#from_opening_mint_2").val();
	var frm_openmin4 = $("#from_opening_mint_3").val();
	var frm_openmin5 = $("#from_opening_mint_4").val();
	var frm_openmin6 = $("#from_opening_mint_5").val();
	var frm_openmin7 = $("#from_opening_mint_6").val();

	
	
	var to_openhr1 = $("#to_opening_hour_0").val();
	var to_openhr2 = $("#to_opening_hour_1").val();
	var to_openhr3 = $("#to_opening_hour_2").val();
	var to_openhr4 = $("#to_opening_hour_3").val();
	var to_openhr5 = $("#to_opening_hour_4").val();
	var to_openhr6 = $("#to_opening_hour_5").val();
	var to_openhr7 = $("#to_opening_hour_6").val();



	var to_openmin1 = $("#to_opening_mint_0").val();
	var to_openmin2 = $("#to_opening_mint_1").val();
	var to_openmin3 = $("#to_opening_mint_2").val();
	var to_openmin4 = $("#to_opening_mint_3").val();
	var to_openmin5 = $("#to_opening_mint_4").val();
	var to_openmin6 = $("#to_opening_mint_5").val();
	var to_openmin7 = $("#to_opening_mint_6").val();
	
	var checkbox = $('input[type=checkbox]:checked').length;
	
	if(checkbox != 7 ){
		if( (frm_openhr1 == '' || frm_openmin1 == '' || to_openhr1 == '' || to_openmin1 == '') && ( frm_openhr2 == '' || frm_openmin2 == '' || to_openhr2 == '' || to_openmin2 == '' ) && (frm_openhr3 == '' || frm_openmin3 == '' || to_openhr3 == '' || to_openmin3 == ''   ) && (frm_openhr4 == '' || frm_openmin4 == '' || to_openhr4 == '' || to_openmin4 == '') && (frm_openhr5 == '' || frm_openmin5 == '' || to_openhr5 == '' || to_openmin5 == '') && (frm_openhr6 == '' || frm_openmin6 == '' || to_openhr6 == '' || to_openmin6 == '' ) && (frm_openhr7 == '' || frm_openmin7 == '' || to_openhr7 == '' || to_openmin7 == '') ){
		alert_message('Please enter opening hours!','warning','btn-warning');
		return false;
	}
	}
	
	
	if( user_id == '')
	{
		alert_message('Please Choose Company!','warning','btn-warning');
		return false;
	}

	if( invite_type == '')
	{
		alert_message('Please Choose Delegate Space Type!','warning','btn-warning');
		return false;
	}
	

	if( bsn_name == '')
	{
		alert_message('Please Provide Delegate Space Name!','warning','btn-warning');
		return false;
	}	
	if( bsn_cat_id == null)
	{
		alert_message('Please Choose Category Name!','warning','btn-warning');
		return false;
	}
	if( business_website_url == null)
	{
		alert_message('Please Enter Delegate Space Website Url!','warning','btn-warning');
		return false;
	}
	
	
	if( bsn_postal_code == '')
	{
		alert_message('Please Provide Postal Code!','warning','btn-warning');
		return false;
	}
	if( bsn_country == '')
	{
		alert_message('Please Choose Country!','warning','btn-warning');
		return false;
	}
	if( eventcity_list == '' || eventcity_list == null )
	{
		alert_message('Please Provide Your City Name!','warning','btn-warning');
		return false;
	}
	if( bsn_street == '')
	{
		alert_message('Please Provide Your Street Address!','warning','btn-warning');
		return false;
	}
	if( bsn_description  == '')
	{
		alert_message('Please Provide Description!','warning','btn-warning');
		return false;
	}

	/*if(das){
		if( bsn_longitute == '')
		{
			alert_message('Please Provide Longitute Value!','warning','btn-warning');
			return false;
		}
		if( bsn_latitude == '')
		{
			alert_message('Please Provide Latitude Value!','warning','btn-warning');
			return false;
		}
	}*/
	if( business_image == '')
	{
		alert_message('Please Upload Delegate Space image!','warning','btn-warning');
		return false;
	}
	if( business_banner_image == '')
	{
		alert_message('Please Upload Delegate Space Banner Picture!','warning','btn-warning');
		return false;
	}
	if( business_status == '')
	{
		alert_message('Please Select Status!','warning','btn-warning');
		return false;
	}
	
	
}
//////////////////////////////////////////////// FOR INVITE SPACE VALIDATION /////////////////////////////////////////

function disable(div1,div2,check_val){
	if(document.getElementById(check_val).checked) {
		$("#"+div1+" "+"select").prop("disabled", true);
	$("#"+div2+" "+"select").prop("disabled", true);
	} else {
	   $("#"+div1+" "+"select").prop("disabled", false);
	$("#"+div2+" "+"select").prop("disabled", false);
	}
}
function reverse_checked(select_data,checked_val){
	if(select_data !=0 || select_data != ''){
		$("#"+checked_val).prop("disabled", true);
	}
	else{
		$("#"+checked_val).prop("disabled", false);
	}
}



   </script>



</body>
</html>