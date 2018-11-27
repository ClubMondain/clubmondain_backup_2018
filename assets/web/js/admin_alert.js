//JAVASCRIPT VALIDATION
function shortingData(p,v)
{
	var path;

	if(v == ''){
		path = p;
	}else{
		path = p+'?membership='+v;
	}
	
	window.location.href = path;
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function alert_message(msg, btn_type, btn_class,txt)
{
	swal({
	title: msg,
	type: btn_type,
	text: txt,
	confirmButtonClass: btn_class,
	confirmButtonText: "Ok!",
	closeOnConfirm: false,
	});
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function LogOut(e)
{
	swal({
	title: "Are You Sure?",
	text: "Your Want to Logout!",
	type: "success",
	showCancelButton: true,
	confirmButtonClass: "btn-danger",
	confirmButtonText: " Yes ! ",
	CancelButtonText: "No !",
	closeOnConfirm: false
	},
	function(){
	window.location.href = e;
	});
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function delete_member(e)
{
	swal({
	title: "Are you sure?",
	text: "Your will not be able to recover this data!",
	type: "warning",
	showCancelButton: true,
	confirmButtonClass: "btn-danger",
	confirmButtonText: "Yes, delete it!",
	closeOnConfirm: false
	},
	function(){
	window.location.href = e;
	});
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function EventValidation(is_picture)
{	
	var event_name        = $("#event_name").val();
	var cat_id            = $("#cat_id").val();
	var event_pic         = $("#event_pic").val();
	var event_description = CKEDITOR.instances.event_description.getData();
	var event_facilities  = CKEDITOR.instances.event_facilities.getData();
	var event_country     = $("#event_country").val();
	var event_city        = $("#event_city").val();
	var event_date_from   = $("#event_date_from").val();
	var event_date_to     = $("#event_date_to").val();
				
	if(event_name == '')
	{
	alert_message('Event Name is Required!','warning','btn-warning');
	return false;
	}
	
	if(cat_id == '')
	{	
	alert_message('Category Name is Required!','warning','btn-warning');
	return false;
	}	
	
	if( is_picture == 1)
	{
	if(event_pic =='')
	{
	alert_message('Picture is Required','warning','btn-warning');
	return false;
	}
	}
		
	if(event_description == '')
	{
	alert_message('Short Description is Required','warning','btn-warning');
	return false;
	}
	
	if(event_facilities == '')
	{
	alert_message('Venue Facilities is Required','warning','btn-warning');
	return false;
	}
	
	if(event_country == '')
	{
	alert_message('Country is Required','warning','btn-warning');
	return false;
	}
	
	if( event_city == '' )
	{
	alert_message('City is Required','warning','btn-warning');
	return false;
	}
	
	if( event_date_from == '' )
	{
	alert_message('Event Date From is Required','warning','btn-warning');
	return false;
	}
	
	if( event_date_to == '' )
	{
	alert_message('Event Date To is Required','warning','btn-warning');
	return false;
	}
	
	
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function membershipValidation()
{	
	var membership_category_id  = $("#membership_category_id").val();
	var membership_name         = $("#membership_name").val();
	var membership_type         = $("#membership_type").val();
	var membership_price        = $("#membership_price").val();
	var membership_start_date   = $("#membership_start_date").val();
	var membership_end_date     = $("#membership_end_date").val();
	var membership_description  = CKEDITOR.instances.membership_description.getData();
	var membership_status       = $("#membership_status").val();
				
	if(membership_category_id == '')
	{
	alert_message('Membership Category is Required!','warning','btn-warning');
	return false;
	}
	
	if(membership_name == '')
	{	
	alert_message('Membership Name is Required!','warning','btn-warning');
	return false;
	}	
	
	if(membership_type =='')
	{
	alert_message('Type is Required','warning','btn-warning');
	return false;
	}	
		
	if(membership_price == '')
	{
	alert_message('Price is Required','warning','btn-warning');
	return false;
	}
	
	if(membership_start_date == '')
	{
	alert_message('Start Date is Required','warning','btn-warning');
	return false;
	}
	
	if(membership_end_date == '')
	{
	alert_message('End Date is Required','warning','btn-warning');
	return false;
	}
	
	if( membership_description == '' )
	{
	alert_message('Description is Required','warning','btn-warning');
	return false;
	}
	
	if( membership_status == '' )
	{
	alert_message('Status is Required','warning','btn-warning');
	return false;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function member_validation()
{	
	var firstname  = $("#members_fname").val();
	var lastname   = $("#members_lname").val();
	var email      = $("#members_email").val();
	var username   = $("#members_username").val();
	var password   = $("#members_password").val();
	var status     = $("#members_status").val();
	var type       = $("#members_type").val();
	
	
	var firstemaiportion  = email.indexOf("@");
	var lastemailportion  = email.lastIndexOf(".");
		
	if(firstname == '')
	{
	alert_message('First Name is Required!','warning','btn-warning');
	return false;
	}
	
	if(lastname == '')
	{	
	alert_message('Last Name is Required!','warning','btn-warning');
	return false;
	}	
	
	if(email =='')
	{
	alert_message('Email is Required','warning','btn-warning');
	return false;
	}	
	
	if(firstemaiportion<1 || lastemailportion+2>email.length)
	{
	alert_message('Please Provide a Valid Email Formet!','warning','btn-warning');
	return false;
	}	
	
	if(username == '')
	{
	alert_message('Username is Required','warning','btn-warning');
	return false;
	}
	
	if(password == '')
	{
	alert_message('Password is Required','warning','btn-warning');
	return false;
	}
	
	if(status == '')
	{
	alert_message('Status is Required','warning','btn-warning');
	return false;
	}
	
	if( type == '' )
	{
	alert_message('Type is Required','warning','btn-warning');
	return false;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function member_validation_update()
{	
	var firstname  = $("#members_fname").val();
	var lastname   = $("#members_lname").val();
	var email      = $("#members_email").val();
	var status     = $("#members_status").val();
	var type       = $("#members_type").val();
	
	
	var firstemaiportion  = email.indexOf("@");
	var lastemailportion  = email.lastIndexOf(".");
		
	if(firstname == '')
	{
	alert_message('First Name is Required!','warning','btn-warning');
	return false;
	}
	
	if(lastname == '')
	{	
	alert_message('Last Name is Required!','warning','btn-warning');
	return false;
	}	
	
	if(email =='')
	{
	alert_message('Email is Required','warning','btn-warning');
	return false;
	}	
	
	if(firstemaiportion<1 || lastemailportion+2>email.length)
	{
	alert_message('Please Provide a Valid Email Formet!','warning','btn-warning');
	return false;
	}	
		
	if(status == '')
	{
	alert_message('Status is Required','warning','btn-warning');
	return false;
	}
	
	if( type == '' )
	{
	alert_message('Type is Required','warning','btn-warning');
	return false;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function company_validation_update()
{	
	var name   = $("#company_name").val();
	var email  = $("#company_email").val();
	var status = $("#company_status").val();
	
	var firstemaiportion  = email.indexOf("@");
	var lastemailportion  = email.lastIndexOf(".");
		
	if(name == '')
	{
	alert_message('Company Name is Required!','warning','btn-warning');
	return false;
	}
	
	if(email =='')
	{
	alert_message('Email is Required','warning','btn-warning');
	return false;
	}	
	
	if(firstemaiportion<1 || lastemailportion+2>email.length)
	{
	alert_message('Please Provide a Valid Email Formet!','warning','btn-warning');
	return false;
	}	
		
	if(status == '')
	{
	alert_message('Status is Required','warning','btn-warning');
	return false;
	}
	
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function trainner_validation_update()
{	
	var firstname  = $("#trainer_fname").val();
	var lastname   = $("#trainer_lname").val();
	var email      = $("#trainer_email").val();
	var status     = $("#trainer_status").val();
	var type       = $("#trainer_type").val();
	
	
	var firstemaiportion  = email.indexOf("@");
	var lastemailportion  = email.lastIndexOf(".");
		
	if(firstname == '')
	{
	alert_message('First Name is Required!','warning','btn-warning');
	return false;
	}
	
	if(lastname == '')
	{	
	alert_message('Last Name is Required!','warning','btn-warning');
	return false;
	}	
	
	if(email =='')
	{
	alert_message('Email is Required','warning','btn-warning');
	return false;
	}	
	
	if(firstemaiportion<1 || lastemailportion+2>email.length)
	{
	alert_message('Please Provide a Valid Email Formet!','warning','btn-warning');
	return false;
	}	
		
	if(status == '')
	{
	alert_message('Status is Required','warning','btn-warning');
	return false;
	}
	
	if( type == '' )
	{
	alert_message('Type is Required','warning','btn-warning');
	return false;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function CategoryValidation(e)
{
	var catname	 = $("#categoryname").val();
	var status   = $("#cat_status").val();
	var imageFile   = $("#img_upload").val();
	if( catname == '')
	{
		alert_message('Category Name is Required!','warning','btn-warning');
		return false;
	}
	if( status == '')
	{
		alert_message('Status is Required!','warning','btn-warning');
		return false;
	}	
	if(e == 1){
	if( status == '')
	{
		alert_message('Status is Required!','warning','btn-warning');
		return false;
	}		
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function SubCategoryValidation()
{
	var catname	   = $("#subCatname").val();
	var catdetails = $("#sub_status").val();
	var parent_id  = $("#parent_id").val();
	if( catname == '')
	{
		alert_message('Subcategory Name is Required!','warning','btn-warning');
		return false;
	}	
	if( catdetails == '')
	{
		alert_message('Status is Required!','warning','btn-warning');
		return false;
	}	
	if( parent_id == '')
	{
		alert_message('Category Name is Required!','warning','btn-warning');
		return false;
	}
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function ContentValidation()
{
	var contentname	       = $("#contentname").val();
	var contentdescription = CKEDITOR.instances.page_description.getData();
	var content_status     = $("#content_status").val();
	
	if( contentname == '')
	{
		alert_message('Content Title is Required!','warning','btn-warning');
		return false;
	}	
	if( contentdescription == '')
	{
		alert_message('Description is Required!','warning','btn-warning');
		return false;
	}
	if( content_status == '')
	{
		alert_message('Status is Required!','warning','btn-warning');
		return false;
	}	
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function city()
{
	var country_id_FK = $("#country_id_FK").val();
	var city_name     = $("#city_name").val();
	var city_status   = $("#city_status").val();
	
	if( country_id_FK == '')
	{
		alert_message('Please Select Country!','warning','btn-warning');
		return false;
	}	
	if( city_name == '')
	{
		alert_message('City Name is Required!','warning','btn-warning');
		return false;
	}
	if( city_status == '')
	{
		alert_message('Status is Required!','warning','btn-warning');
		return false;
	}	
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function ChangePassword()
{
	var admin_pwd_old	= $("#admin_pwd_old").val();
	var admin_pwd_new = $("#admin_pwd_new").val();
	if( admin_pwd_new == '')
	{
		alert_message('Password is Required!','warning','btn-warning');
		return false;
	}	
	if( admin_pwd_old == '')
	{
		alert_message('Old Password is Required!','warning','btn-warning');
		return false;
	}	
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function AdminProfileValidation()
{
	var admin_fname    = $("#admin_fname").val();
	var admin_lname    = $("#admin_lname").val();
	var admin_email    = $("#admin_email").val();

	var firstemaiportion= admin_email.indexOf("@");
	var lastemailportion = admin_email.lastIndexOf(".");
	
	
	if( admin_fname == '')
	{
		alert_message('Please Provide First Name!','warning','btn-warning');
		return false;
	}
	if( admin_lname == '')
	{
		alert_message('Please Provide Last Name!','warning','btn-warning');
		return false;
	}
	if( admin_email == '')
	{
		alert_message('Please Provide Email Address!','warning','btn-warning');
		return false;
	}
	if(firstemaiportion<1 || lastemailportion+2>admin_email.length)
	{
		alert_message('Please Provide a Valid Email Formet!','warning','btn-warning');
		return false;
	}	
	
	
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function AdminSettingValidation()
{
	var admin_facebook_link     = $("#admin_facebook_link").val();
	var admin_twitter_link      = $("#admin_twitter_link").val();
	var admin_google_plus_link  = $("#admin_google_plus_link").val();
	var admin_site_email        = $("#admin_site_email").val();
	var admin_form_email        = $("#admin_form_email").val();
	var admin_address           = $("#admin_address").val();
	var admin_phone_no          = $("#admin_phone_no").val();
	var admin_city              = $("#admin_city").val();
	var admin_state             = $("#admin_state").val();
	var copyright_section       = $("#copyright_section").val();
	var admin_city              = $("#admin_city").val();
	var admin_zipcode           = $("#admin_zipcode").val();
	var admingoogle_map         = $("#admingoogle_map").val();
	
	var firstemaiportion  = admin_site_email.indexOf("@");
	var lastemailportion  = admin_site_email.lastIndexOf(".");
	
	var firstemaiportion_form = admin_form_email.indexOf("@");
	var lastemailportion_form = admin_form_email.lastIndexOf(".");
	
	if( admin_facebook_link == '')
	{
		alert_message('Please Provide Facebook Link!','warning','btn-warning');
		return false;
	}
	if( admin_twitter_link == '')
	{
		alert_message('Please Provide Twitter Link!','warning','btn-warning');
		return false;
	}
	if( admin_google_plus_link == '')
	{
		alert_message('Please Choose google Link!','warning','btn-warning');
		return false;
	}
	if( admin_site_email == '')
	{
		alert_message('Please Choose Site Email!','warning','btn-warning');
		return false;
	}
	if(firstemaiportion<1 || lastemailportion+2>admin_site_email.length)
	{
		alert_message('Please Provide a Valid Email Formet!','warning','btn-warning');
		return false;
	}	
	if( admin_form_email == '')
	{
		alert_message('Please Provide Form Email!','warning','btn-warning');
		return false;
	}
	if(firstemaiportion_form<1 || lastemailportion_form+2>admin_form_email.length)
	{
		alert_message('Please Provide a Valid Email Formet!','warning','btn-warning');
		return false;
	}	
	if( admin_address == '')
	{
		alert_message('Please Provide Your Address!','warning','btn-warning');
		return false;
	}
	if( admin_phone_no == '')
	{
		alert_message('Please Provide Your Phone Number!','warning','btn-warning');
		return false;
	}
	if( admin_phone_no == '')
	{
		alert_message('Please Provide Your Phone Number!','warning','btn-warning');
		return false;
	}
	if( isNaN(admin_phone_no))
	{
		alert_message('Please Provide Your Phonenumber!','warning','btn-warning');
		return false;
	}
	if( admin_city == '')
	{
		alert_message('Please Provide Your City Name!','warning','btn-warning');
		return false;
	}
	if( admin_state == '')
	{
		alert_message('Please Provide Your State Name!','warning','btn-warning');
		return false;
	}
	if( copyright_section == '')
	{
		alert_message('Please Provide This Section Data!','warning','btn-warning');
		return false;
	}
	if( admin_zipcode == '')
	{
		alert_message('Please Provide Your Zipcode!','warning','btn-warning');
		return false;
	}
	if( admingoogle_map == '')
	{
		alert_message('Please Provide Your Google Map Address Link!','warning','btn-warning');
		return false;
	}
	
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
