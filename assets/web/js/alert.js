///////////////////////////////////////////////// JavaScript Document /////////////////////////////////////////
var baseUrl  = window.location.origin;
var pathName = window.location.pathname.split('/');
//var conurl   = baseUrl+'/'+pathName[1]+'/';
var conurl   = baseUrl+'/';
var imageUrl = conurl+'upload/city/';
//=============================================== For Unique Swal Function Only ================================= //
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
//=================================== For Unique Swal Function With Cancel Button Only ========================= //
function alert_message_cancel(msg,btn_type,btn_class,txt){
	swal({
		title: msg,
		type: btn_type,
		text: txt,
		showCancelButton: cancel_btn,
		confirmButtonClass: btn_class,
		confirmButtonText: "Ok!",
		closeOnConfirm: false
	});
}
//=================================== For Category Data ================================================= //
function category_product_list(cateid,get_url)
{
	$.ajax({
	url: conurl+"Home/GetProductCategoryData",
	dataType: 'JSON',
	type: 'POST',
	data: "cateid=" + cateid,
	success: function(response){
		var tmpArrData= new Array();
		var get_pic = conurl+'upload/no_image/no-photo-available.jpg';
		$.each(response,function(i,v){
		if(v.product_images_name != ''){
				get_pic = conurl+'upload/product/'+v.product_images_name;
			}
		tmpArrData.push('<div class="col-lg-4 col-sm-6">'
                                    	+'<div class="single">'
                                        	+'<div class="image">'
                                    +'<img src="'+get_pic+'">'
                                           +'</div>'
                                            +'<div class="content s-sec">'
                                            	+'<p class="name">'+v.product_name+'</p>'
                                                +'<p class="price">Price : $'+v.product_price+'</p>'
                                            +'</div>'
                                            +'<div class="buttons">'
                                            	+'<a href="'+v.product_id+'">ADD TO CART</a>'
                                            	+'<a href="'+conurl+'Home/shop-details/'+v.product_id+'">DETAILS</a>'
                                            +'</div>'
                                        +'</div>'
                                    +'</div>');
		$('#category_search_product').html(tmpArrData);
		});
	}
	});
}
//=================================== For Category Data ================================================= //
function category_product_list_multiple()
{
//var cateid = $("#product_form").serialize();
var cateid = $('input[name="product_check"]:checked').val();
	$.ajax({
	url: conurl+"Home/GetProductCategoryData",
	dataType: 'JSON',
	type: 'POST',
	data: cateid,
	success: function(response){
		var tmpArrData= new Array();
		//var resultdata = JSON.parse(response); // sometimes data which we get in response is in string. JS each() is not able to iterate/loop through data. By using JSON.parse() we are converting it to JSON OR OBJECT.
		var get_pic = conurl+'upload/no_image/no-photo-available.jpg';
		$.each(response,function(i,v){
		if(v.product_images_name != ''){
				get_pic = conurl+'upload/product/'+v.product_images_name;
			}
		tmpArrData.push('<div class="col-lg-4 col-sm-6">'
                                    	+'<div class="single">'
                                        	+'<div class="image">'
                                    +'<img src="'+get_pic+'">'
                                           +'</div>'
                                            +'<div class="content s-sec">'
                                            	+'<p class="name">'+v.product_name+'</p>'
                                                +'<p class="price">Price : $'+v.product_price+'</p>'
                                            +'</div>'
                                            +'<div class="buttons">'
                                            	+'<a href="'+v.product_id+'">ADD TO CART</a>'
                                            	+'<a href="'+conurl+'Home/shop-details/'+v.product_id+'">DETAILS</a>'
                                            +'</div>'
                                        +'</div>'
                                    +'</div>');
		$('#category_search_product').html(tmpArrData);
		});
	}
	});
}
// =================================================== For Username Check Only ====================================
/*function valid_username(username)
{
	$.ajax({
    url: "Home/checkusername",
    dataType: 'html',
	type:'POST',
	data: "username=" + username,
    success: function(result){
		result = result.replace(/\s/g, '');
		if(result == 'SUCCESS'){
		//alert(result);
		$("#user-check i").removeClass("fa-user").removeClass("fa-times-circle-o").addClass("fa-check-circle-o");
			if(username.length < 5 || username.length > 15){
			$("#user-check i").removeClass("fa-user").removeClass("fa-check-circle-o").addClass("fa-times-circle-o");
			}
			else{
				$("#user-check i").removeClass("fa-user").removeClass("fa-times-circle-o").addClass("fa-check-circle-o");
			}

		}else{
			$("#user-check i").removeClass("fa-user").removeClass("fa-check-circle-o").addClass("fa-times-circle-o");
		}
    }});
}*/
// ================================================ For Username Check Only ==================================
function valid_user_email(email)
{
	$.ajax({
    url: "Home/CheckUserEmail",
    dataType: 'html',
	type:'POST',
	data: "email=" + email,
    success: function(result){
		result = result.replace(/\s/g, '');
		if(result == 'SUCCESS'){
		//alert(result);
		/*$("#user-email-check").removeClass("fa-times-circle-o").addClass("fa-check-circle-o");
			var firstemaiportion= email.indexOf("@");
			var lastemailportion = email.lastIndexOf(".");
			if(firstemaiportion<1 || lastemailportion+2>email.length){
				$("#user-email-check").removeClass("fa-check-circle-o").addClass("fa-times-circle-o");
				}
			else{
				$("#user-email-check").removeClass("fa-times-circle-o").addClass("fa-check-circle-o");
			}*/
			//alert_message('Email is Exists!','success','btn-warning','Email Validate!');
			return false;

		}else{
			//$("#user-email-check").removeClass("fa-check-circle-o").addClass("fa-times-circle-o");
			alert_message('Email is Exists!','warning','btn-warning','Please Choose Your Valid Email!');
			return false;
			}
    }});
}
/*// ======================================== For Username Check in Member Only ==================================
function valid_membername(username){
	//alert(username);
	  $.ajax({
    url: "dashboard/Check_Member_Data",
    dataType: 'html',
	type:'POST',
	data: "username=" + username,
    success: function(result){
		if(result == 'SUCCESS'){
		//alert('Username Exists');
		alert_message('Please Provide Valid Username!','warning','btn-danger');
		return false;
		}else{
			alert_message('Hellow Valid Username!','warning','btn-danger');
			return false;
			if(username.length < 5 || username.length > 15){
				$("#user-check i").removeClass("fa-user").removeClass("fa-check-circle-o").addClass("fa-times-circle-o");
			}
			//alert('Valid Username');
			else{
				$("#user-check i").removeClass("fa-user").removeClass("fa-times-circle-o").addClass("fa-check-circle-o");
			}
		}
    }});
}*/
//====================================== For Registration Check Data Only (WORKED)=========================

function Register()
{
	var loc = 'Home/registration';
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	var members_fname    = $("#members_fname").val();
	var members_lname    = $("#members_lname").val();
	var members_password = $("#members_password").val();
	var members_passconf = $("#members_passconf").val();
	var members_email    = $("#members_email").val();
	var members_phone    = $("input#members_phone").val();
	var firstemaiportion = members_email.indexOf("@");
	var lastemailportion = members_email.lastIndexOf(".");
	var members_status   = 'Active';
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	if( members_fname == '')
	{
		alert_message('First Name is Required!','warning','btn-warning','Please enter first name!');
		return false;
	}else{
		if( members_lname == ''){
			alert_message('Last Name is Required!','warning','btn-warning','Please enter last name!');
			return false;
		}else{
			if( members_email == ''){
				alert_message('Email is Required!','warning','btn-warning','Please enter email address!');
				return false;
			}else{
				if(firstemaiportion<1 || lastemailportion+2>members_email.length){
					alert_message('Email is Invalid!','warning','btn-warning','Please enter valid email address!');
					return false;
				}else{
				if( members_password == ''){
					alert_message('Password is Required!','warning','btn-warning','Please Choose Your Password!');
					return false;
					}else{
						if( members_passconf != members_password || members_passconf == '' )
						{
							alert_message('Confirm Password Doesnot Match!','warning','btn-warning','Please Choose a Same Password');
							return false;
						}else{
							$.ajax({
								url: conurl+"Home/CheckUserEmail",
								dataType: 'html',
								type:'POST',
								data: "email=" + members_email,
								success: function(result){
								result = result.replace(/\s/g, '');
								if(result == 'SUCCESS'){
									$.ajax({
										type: "POST",
										url: conurl+loc,
										dataType: 'html',
										data: {
										members_password : members_password ,
										members_email    : members_email,
										members_lname    : members_lname,
										members_fname    : members_fname,
										members_phone    : members_phone,
										members_status   : members_status
										},
										success: function(data) {
										data = data.replace(/\s/g, '');
										if( data == "SUCCESS" ){
											window.location.href = conurl+'Home/membership';
										}else{
											alert_message('Error Occure!','danger','btn-danger');
											return false;
										}
										}
									});
								}else{
									alert_message('Email is Exists!','warning','btn-warning','Please Choose Your Valid Email!');
									return false;
								}
							}
							});
						}

					}
				}
			}
		}
	}
//END
}

//================================== For Login User Check Data Only (WORKED)================================
function loginUserData()
{
	var loc = 'Home/loginUser';
	var password = $("#login-password").val();
	var email    = $("#login-email").val();
	if( email == ''){
		alert_message('Email is Required!','warning','btn-warning','Please Provide Your Email Address!');
		return false;
		}
	if( password == '' ){
		alert_message('Password is Required!','warning','btn-warning','Please Provide Your Password!');
		return false;
		}
	$.ajax({
	type: "POST",
	url: 'http://www.clubmondain.com/Home/loginUser',
	dataType:'html',
	data: {email: email, password: password},
	success: function(result)
	{
	result = result.replace(/\s/g, '');
	//alert(result);
	if(result == "SUCCESS_LOGIN"){
	window.location.href = conurl+"Main/index";
	}
	else{
	//alert('ERROR');
	alert_message('Error!','warning','btn-danger','Your Password Or Email Address is Invalid!');
	return false;
	}
	}
	});	//Ajax End
}
//=================================================== For Request City To Admin ===============================
function request_city(){
	var req_city_name = $("#req_city_name").val();

if( req_city_name == ''){
		alert_message('City Name is Required!','warning','btn-warning','Please chhose a city name!');
		return false;
		}
else{
$.ajax({
	type:"POST",
	url:conurl+"Main/request_city_insert",
	dataType:"html",
	data:{req_city_name:req_city_name},
}).done(function(response){
	if(response == "SUCCESS"){
		swal({
		title: "Your Request Submited Successfully!",
		text: "Please Wait For Admin Response.",
		type: "success"
		},
		function(){
				window.location.href = conurl+'Home/cities_main';
		});
	}
	else {
			alert_message('Error!','danger','btn-danger','Your Data Not Submited Properly!');
		 }
});

}
}
//=================================================== Comments For Meet Up ===============================
function call_meet_up_comments(e){

	var meet_up_comments = $("#meet_up_comments"+e).val();
if( meet_up_comments == ''){
		alert_message('Your Comment Required!','warning','btn-warning','Please Provide Your Comment!');
		return false;
		}
else{
$.ajax({
	type:"POST",
	url:conurl+"Main/insert_meet_up_comments",
	dataType:"html",
	data:{comments:	meet_up_comments,meet_up_id:e},
}).done(function(response){
	if(response == "SUCCESS"){
		swal({
		title: "Your Comments Submited Successfully!",
		type: "success"
		},
		function(){
				window.location.href = conurl+'Main/index';
		});
	}
	else {
			alert_message('Error!','danger','btn-danger','Your Comment Not Submited Properly!');
		 }
});

}
}
//======================================== FOR ALL VALIDATION ADMIN DATA ONLY =================================== //
////////////////////////////////////////////// For Admin-Form Check Data Only //////////////////////////////////
function validateMember()
{
	// FOR MEMBER DATA
	var username = $("#member_username").val();
	var password = $("#member_password").val();
	var email_address = $("#member_email").val();
	var member_status = $("#member_status").val();
	//alert(password);

	//var firstname = $("#member_fname").val();
	//var lastname = $("#member_lname").val();
	//var phone = $("#phone").val();
	//var pin = $("#pin").val();
	//var phonenumber = /^\d{10}$/;
	//var pinnumber = /^\d{5}$/;
	//var member_type = $("#member_type").val();

	var firstemaiportion= email_address.indexOf("@");
	var lastemailportion = email_address.lastIndexOf(".");

	if( username == '' )
	{
		alert_message('Please Provide Valid Username!','warning','btn-danger');
		return false;
	}
	//FOR CHECKING USERNAME IS ON THE DATABASE OR NOT
	if( username != '' )
	{
		//alert(username);
	  $.ajax({
    url: "dashboard/Check_Member_Data",
    dataType: 'html',
	type:'POST',
	data: "username=" + username,
    success: function(result){
		if(result == 'SUCCESS'){
		//alert('Username Exists');
		alert_message('Please Provide Valid Username!','warning','btn-danger');
		return false;
		}else{
			alert_message('Hellow Valid Username!','warning','btn-danger');
			return false;
			if(username.length < 5 || username.length > 15){
				$("#user-check i").removeClass("fa-user").removeClass("fa-check-circle-o").addClass("fa-times-circle-o");
			}
			//alert('Valid Username');
			else{
				$("#user-check i").removeClass("fa-user").removeClass("fa-times-circle-o").addClass("fa-check-circle-o");
			}
		}
    //$('.btn-danger').show();
    //$( "#rewards" ).append( result );
    }});
	}

	if( password == '')
	{
			alert_message('Please Provide  Valid Password!','warning','btn-warning');
			return false;
	}

	if( email_address =='')
	{
			alert_message('Please Provide a Valid Email!','warning','btn-warning');
			return false;
	}
	if(firstemaiportion<1 || lastemailportion+2>email_address.length)
	{

			alert_message('Please Provide a Valid Email Formet!','warning','btn-warning');
			return false;
	}
	if(  member_status == '' )
	{
			alert_message('Please Choose a Your Status!','warning','btn-warning');
			return false;
	}
	/* LATER USE */

	/*if( firstname == '')
	{
			alert_message('Please Provide a First Name!','warning','btn-warning');
			return false;
	}

	if( lastname == '')
	{
			alert_message('Please Provide a Last Name!','warning','btn-warning');
			return false;
	}


	if( isNaN (phone) )
	{
			alert_message('Please Provide Your Valid Phone Number!','warning','btn-warning');
			return false;
	}
	if( isNaN (pin) )
	{
			alert_message('Please Provide Your Valid Pin Number!','warning','btn-warning');
			return false;
	}
	if(  member_type == '' )
	{
			alert_message('Please Choose a Your Member Type!','warning','btn-warning');
			return false;
	}
		*/
}
/////////////////////////////////////////////// FOR CATEGORY VALIDATION /////////////////////////////////////////
function CategoryValidation()
{
	// FOR CATEGORY CHECKING
	var catname	= $("#categoryname").val();
	var status = $("#cat_status").val();
	if( catname == '')
	{
			alert_message('Please Provide a Your Category Name!','warning','btn-warning');
			return false;
	}
	if( status == '')
	{
			alert_message('Please Choose Your Status!','warning','btn-warning');
			return false;
	}
}
////////////////////////////////////////////// FOR SUB-CATEGORY VALIDATION ///////////////////////////////////////
function SubCategoryValidation()
{
	// FOR SUB-CATEGORY DATA
	var catname	= $("#subCatname").val();
	var catdetails = $("#sub_status").val();
	var parent_id = $("#parent_id").val();
	//FOR SUB-CATEGORY CHECKING
	if( catname == '')
	{
			alert_message('Please Provide Sub-Category Name!','warning','btn-warning');
			return false;
	}
	if( catdetails == '')
	{
			alert_message('Please Choose Your Status!','warning','btn-warning');
			return false;
	}
	if( parent_id == '')
	{
			alert_message('Please Choose Category Name!','warning','btn-warning');
			return false;
	}
}
////////////////////////////////////////////// FOR CONTENT VALIDATION ///////////////////////////////////////
function ContentValidation()
{
	// FOR CONTENT DATA
	var contentname	= $("#contentname").val();
	var contentdescription = $("#contentdescription").val();
	var content_status = $("#content_status").val();
	//FOR CONTENT CHECKING
	if( contentname == '')
	{
			alert_message('Please Provide Content Name!','warning','btn-warning');
			return false;
	}
	if( contentdescription == '')
	{
			alert_message('Please Provide Description!','warning','btn-warning');
			return false;
	}
	if( content_status == '')
	{
			alert_message('Please Choose Content Status!','warning','btn-warning');
			return false;
	}
}
/////////////////////////////////////// FOR ChangePassword VALIDATION /////////////////////////////////////
function ChangePassword()
{
	// FOR ChangePassword DATA
	var admin_pwd_old	= $("#admin_pwd_old").val();
	var admin_pwd_new = $("#admin_pwd_new").val();
	//FOR ChangePassword CHECKING
	if( admin_pwd_new == '')
	{
			alert_message('Please Provide Any Password!','warning','btn-warning');
			return false;
	}
	if( admin_pwd_old == '')
	{
			alert_message('Please Provide Valid Old Password!','warning','btn-warning');
			return false;
	}
}
//////////////////////////////////////////////// FOR PROFILE VALIDATION /////////////////////////////////////////
function AdminProfileValidation()
{
	var admin_username = $("#admin_username").val();
	var admin_fname = $("#admin_fname").val();
	var admin_lname = $("#admin_lname").val();
	var admin_email = $("#admin_email").val();
	var admin_phone = $("#admin_phone").val();
	var admin_city = $("#admin_city").val();
	var admin_state = $("#admin_state").val();
	var admin_country = $("#admin_country").val();
	//var phonenumber = /^\d([0-9])$/;

	var firstemaiportion= admin_email.indexOf("@");
	var lastemailportion = admin_email.lastIndexOf(".");

	if( admin_username == '')
	{
		alert_message('Please Provide Username!','warning','btn-warning');
		return false;
	}
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
	if( admin_phone == '' )

	{
		alert_message('Please Provide Your Phonenumber!','warning','btn-warning');
		return false;
	}
	if( isNaN(admin_phone))
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

	if( admin_country == '')
	{
		alert_message('Please Provide Your Country Name!','warning','btn-warning');
		return false;
	}

}
//////////////////////////////////////////////// FOR SETTINGS VALIDATION /////////////////////////////////////////
function AdminSettingValidation()
{
	var admin_facebook_link = $("#admin_facebook_link").val();
	var admin_twitter_link = $("#admin_twitter_link").val();
	var admin_google_plus_link = $("#admin_google_plus_link").val();
	var admin_site_email = $("#admin_site_email").val();
	var admin_form_email = $("#admin_form_email").val();
	var admin_address = $("#admin_address").val();
	var admin_phone_no = $("#admin_phone_no").val();
	var admin_city = $("#admin_city").val();
	var admin_state = $("#admin_state").val();
	var copyright_section = $("#copyright_section").val();
	var admin_city = $("#admin_city").val();
	var admin_zipcode = $("#admin_zipcode").val();
	var admingoogle_map = $("#admingoogle_map").val();

	var firstemaiportion= admin_site_email.indexOf("@");
	var lastemailportion = admin_site_email.lastIndexOf(".");

	var firstemaiportion_form= admin_form_email.indexOf("@");
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
//================================== For Admin Changepassword Message Only ==============================
function Changepassword(){
	swal("Success!", "You Success-Fully Change Your Password.", "success");
	return false;
}
//================================== For User Changepassword Validation Only ==============================
function Changepassword_validation(){
	var old_pass = $('#old_pass').val();
	var new_pass = $('#new_pass').val();
	if( old_pass == '')
	{
		alert_message('Please Provide Your Old Password!','warning','btn-warning');
		return false;
	}
	if( new_pass == '')
	{
		alert_message('Please Provide Your New Password!','warning','btn-warning');
		return false;
	}
	/*$.ajax({
	type: "POST",
	url: loc,
	dataType:'html',
	data: {email: email, password: password},
	success: function(result)
	{
	result = result.replace(/\s/g, '');
	//alert(result);
	if(result == "SUCCESS_LOGIN"){
	 alert_message('SUCCESS!','success','btn-success','Your Password is Successfully Changed!');
	}
	else{
	//alert('ERROR');
	alert_message('Error!','warning','btn-danger','Your Password Or Email Address is Invalid!');
	return false;
	}
	}
	});	//Ajax End*/
}
//================================== For Forget password Validation Only ==============================
function forgetPassword_validation(){
	var old_pass = $('#old_pass').val();
	var new_pass = $('#new_pass').val();
	if( new_pass == '')
	{
		alert_message('Please Provide Your New Password!','warning','btn-warning');
		return false;
	}
	if( old_pass == '')
	{
		alert_message('Please Provide Your Confirm Password!','warning','btn-warning');
		return false;
	}
	if( new_pass != old_pass)
	{
		alert_message('Your Confirm Password is Not Matched!','warning','btn-warning');
		return false;
	}
}
//================================== For Forget Email Validation Only ==============================
function forgetemail_validation(){
	var members_email = $('#forgot_email').val();
	if( members_email == ''){
		alert_message('Email is Required!','warning','btn-warning','Please Choose Your Email!');
		return false;
		}
	if(firstemaiportion<1 || lastemailportion+2>members_email.length){
		alert_message('Email is Invalid!','warning','btn-warning','Please Choose Your Valid Email Formet!');
		return false;
		}
}
//////////////////////////////////////////////// FOR EVENT VALIDATION /////////////////////////////////////////
function EventValidation()
{
	var eventname = $("#eventname").val();
	var eventcategory = $("#cat_id").val();
	var eventuser = $("#members_id").val();
	var eventcity = $("#eventcity_list").val();
	var description = $("#description").val();
	var facilities = $("#facilities").val();
	var eventcountry = $("#eventcountry").val();
	var eventyear = $("#year").val();
	var eventmonth = $("#month").val();
	var eventday = $("#day").val();
	var eventyear_to = $("#year_to").val();
	var eventmonth_to = $("#month_to").val();
	var eventday_to = $("#day_to").val();
	var event_address = $(".event_address").val();
	if( eventname == '')
	{
		alert_message('Please Provide Event Name!','warning','btn-warning');
		return false;
	}
	if( eventcategory == null)
	{
		alert_message('Please Choose Category Name!','warning','btn-warning');
		return false;
	}
	if( description == '')
	{
		alert_message('Please Provide Description!','warning','btn-warning');
		return false;
	}
	if( facilities == '')
	{
		alert_message('Please Provide Facilities!','warning','btn-warning');
		return false;
	}
	if( eventuser == '')
	{
		alert_message('Please Choose Username Name!','warning','btn-warning');
		return false;
	}
	if( eventwebsite == '')
	{
		alert_message('Please Provide Your Website Name!','warning','btn-warning');
		return false;
	}
	if( eventcountry == '')
	{
		alert_message('Please Provide Your Country Name!','warning','btn-warning');
		return false;
	}
	if( eventcity == '' || eventcity == null)
	{
		alert_message('Please Provide Your City Name!','warning','btn-warning');
		return false;
	}
	if( eventyear == '')
	{
		alert_message('Please Choose From Year!','warning','btn-warning');
		return false;
	}
	if( eventmonth == '')
	{
		alert_message('Please Choose From Month!','warning','btn-warning');
		return false;
	}
	if( eventday == '')
	{
		alert_message('Please Choose From Date!','warning','btn-warning');
		return false;
	}
	if( eventyear_to == '')
	{
		alert_message('Please Choose To Year!','warning','btn-warning');
		return false;
	}
	if( eventmonth_to == '')
	{
		alert_message('Please Choose To Month!','warning','btn-warning');
		return false;
	}
	if( eventday_to == '')
	{
		alert_message('Please Choose To Date!','warning','btn-warning');
		return false;
	}
	if( event_address == '')
	{
		alert_message('Please Provide Your Event Address!','warning','btn-warning');
		return false;
	}
}


function isUrlValid(url)
{
    if(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(url)){
		return true;
	} else {
		return false;
	}
}

//////////////////////////////////////////////// FOR BUSINESS VALIDATION /////////////////////////////////////////
function BusinessValidation()
{
	var bsn_url = $("#bsn_website").val();
	var bsn_name = $("#bsn_name").val();
	var bsn_cat_id = $("#bsn_cat_id").val();
	var bsn_country = $("#bsn_country").val();
	var bsn_city = $(".city_list").val();
	var bsn_description = $("#bsn_description").val();
	var bsn_postal_code = $("#bsn_postal_code").val();
	var bsn_profile_pic = $("#bsn_profile_pic").val();
	var bsn_banner_pic = $("#bsn_banner_pic").val();
	var bsn_street = $(".bsn_street").val();


	if( bsn_name == '')
	{
		alert_message('Please Provide Business Name!','warning','btn-warning');
		return false;
	}
	// if( bsn_url == '' )
	// {
	// 	alert_message('Please Enter a Valid URL','warning','btn-warning');
	// 	return false;
	// }
	if( bsn_cat_id == null)
	{
		alert_message('Please Choose Category Name!','warning','btn-warning');
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
	if( bsn_city == '' || bsn_city == null )
	{
		alert_message('Please Provide Your City Name!','warning','btn-warning');
		return false;
	}
	if( bsn_street == '')
	{
		alert_message('Please Provide Your Street Address!','warning','btn-warning');
		return false;
	}
	if( bsn_description == '' || bsn_description == null)
	{
		alert_message('Please Provide Description!','warning','btn-warning');
		return false;
	}

	if(das){
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
	}
	/*if( bsn_profile_pic == '')
	{
		alert_message('Please Provide Profile Picture!','warning','btn-warning');
		return false;
	}
	if( bsn_banner_pic == '')
	{
		alert_message('Please Provide Banner Picture!','warning','btn-warning');
		return false;
	}*/
}
//////////////////////////////////////////////// FOR BUSINESS VALIDATION /////////////////////////////////////////
function ClassValidation()
{
	var bsn_name = $("#trainer_class_name").val();
	var bsn_cat_id = $("#class_cat_id").val();
	var bsn_country = $("#class_country").val();
	var bsn_city = $(".city_list").val();
	var bsn_description = $("#trainer_class_description").val();
	var trainer_class_image = $("#trainer_class_image").val();
	var trainer_class_address = $(".trainer_class_address").val();
	var event_id = $("#event_id").val();
	if( bsn_name == '')
	{
		alert_message('Please Provide Class Name!','warning','btn-warning');
		return false;
	}
	if( bsn_cat_id == null)
	{
		alert_message('Please Choose Category Name!','warning','btn-warning');
		return false;
	}
	if( bsn_country == '')
	{
		alert_message('Please Choose Country!','warning','btn-warning');
		return false;
	}
	if( bsn_city == '' || bsn_city == null )
	{
		alert_message('Please Provide Your City Name!','warning','btn-warning');
		return false;
	}
	if( trainer_class_address == '')
	{
		alert_message('Please Provide Your Address!','warning','btn-warning');
		return false;
	}
	if( event_id == '')
	{
		alert_message('Please Choose Your Event!','warning','btn-warning');
		return false;
	}
	if( bsn_description == '' || bsn_description == null)
	{
		alert_message('Please Provide Description!','warning','btn-warning');
		return false;
	}

	/*if( bsn_profile_pic == '')
	{
		alert_message('Please Provide Profile Picture!','warning','btn-warning');
		return false;
	}
	if( bsn_banner_pic == '')
	{
		alert_message('Please Provide Banner Picture!','warning','btn-warning');
		return false;
	}*/
}
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
//////////////////////////////////////////////// FOR News VALIDATION /////////////////////////////////////////
function NewsValidation()
{
	var news_heading = $("#news_heading").val();
	var news_cat_id = $("#news_cat_id").val();
	/*var news_year = $("#news_year").val();
	var news_month = $("#news_month").val();
	var news_day = $("#news_day").val();
	var news_address = $("$news_address").val();*/
	var news_country = $("#news_country").val();
	var news_city = $(".news_city_list").val();
	var news_description = $("#news_description").val();
	if( news_heading == '')
	{
		alert_message('Please Provide News Name!','warning','btn-warning');
		return false;
	}
	if( news_cat_id == null)
	{
		alert_message('Please Choose Category Name!','warning','btn-warning');
		return false;
	}
	/*if( news_year == '')
	{
		alert_message('Please Choose From Year!','warning','btn-warning');
		return false;
	}
	if( news_month == '')
	{
		alert_message('Please Choose From Month!','warning','btn-warning');
		return false;
	}
	if( news_day == '')
	{
		alert_message('Please Choose From Date!','warning','btn-warning');
		return false;
	}
	if( news_address == '')
	{
		alert_message('Please Choose Address!','warning','btn-warning');
		return false;
	}*/
	if( news_country == '')
	{
		alert_message('Please Provide Your Country Name!','warning','btn-warning');
		return false;
	}
	if( news_city == '' || news_city == null)
	{
		alert_message('Please Provide Your City Name!','warning','btn-warning');
		return false;
	}
	/*if( news_description == '')
	{
		alert_message('Please Provide Description!','warning','btn-warning');
		return false;
	}*/
}
//////////////////////////////////////////////// FOR Product VALIDATION /////////////////////////////////////////
function ProductValidations(update)
{
	var product_name = $("#product_name").val();
	var product_cat_id = $("#product_cat_id").val();
	var product_image = $("#product_images_name").val();
	/*var news_month = $("#news_month").val();
	var news_day = $("#news_day").val();*/
	var product_price = $("#product_price").val();
	var product_qty = $("#product_qty").val();
	var product_description = $("#product_description").val();
	if( product_name == '')
	{
		alert_message('Please Provide Product Name!','warning','btn-warning');
		return false;
	}
	if( product_cat_id == null || product_cat_id == 10000000)
	{
		alert_message('Please Choose Category Name!','warning','btn-warning');
		return false;
	}
	/*if( news_year == '')
	{
		alert_message('Please Choose From Year!','warning','btn-warning');
		return false;
	}
	if( news_month == '')
	{
		alert_message('Please Choose From Month!','warning','btn-warning');
		return false;
	}
	if( news_day == '')
	{
		alert_message('Please Choose From Date!','warning','btn-warning');
		return false;
	}
	if( news_address == '')
	{
		alert_message('Please Choose Address!','warning','btn-warning');
		return false;
	}*/
	/*if( product_subcat_id == null || product_subcat_id == '' )
	{
		alert_message('Please Provide Your Subcategory Name!','warning','btn-warning');
		return false;
	}*/
	if( product_price == '')
	{
		alert_message('Please Provide Your Product Price!','warning','btn-warning');
		return false;
	}
	if( isNaN(product_price))
	{
		alert_message('Please Provide Valid Product Price!','warning','btn-warning');
		return false;
	}
	if( product_qty == '')
	{
		alert_message('Please Provide Your Product Quantity!','warning','btn-warning');
		return false;
	}
	if( isNaN(product_qty))
	{
		alert_message('Please Provide Valid Product Quantity!','warning','btn-warning');
		return false;
	}
	if( product_image == '' && update == undefined)
	{
		alert_message('Please Provide Your Product Image!','warning','btn-warning');
		return false;
	}
	if( product_description == '')
	{
		alert_message('Please Provide Description!','warning','btn-warning');
		return false;
	}
}
//////////////////////////////////////////////// FOR Blogs VALIDATION /////////////////////////////////////////
function BlogValidation()
{
	var blog_heading = $("#blog_heading").val();
	var blog_cat_id = $("#blog_cat_id").val();
	var blog_year = $("#blog_year").val();
	var blog_month = $("#blog_month").val();
	var blog_day = $("#blog_day").val();
	var blog_address = $("#blog_address").val();
	var blog_country = $("#blog_country").val();
	var blog_city = $(".blog_city_list").val();
	var blog_description = $("#blog_description").val();
	if( blog_heading == '')
	{
		alert_message('Please Provide Blog Name!','warning','btn-warning');
		return false;
	}
	if( blog_cat_id == null)
	{
		alert_message('Please Choose Category Name!','warning','btn-warning');
		return false;
	}
	/*if( blog_year == '')
	{
		alert_message('Please Choose From Year!','warning','btn-warning');
		return false;
	}
	if( blog_month == '')
	{
		alert_message('Please Choose From Month!','warning','btn-warning');
		return false;
	}
	if( blog_day == '')
	{
		alert_message('Please Choose From Date!','warning','btn-warning');
		return false;
	}
	if( blog_address == '')
	{
		alert_message('Please Choose Address!','warning','btn-warning');
		return false;
	}
	if( blog_country == '')
	{
		alert_message('Please Provide Your Country Name!','warning','btn-warning');
		return false;
	}
	if( blog_city == '' || blog_city == null)
	{
		alert_message('Please Provide Your City Name!','warning','btn-warning');
		return false;
	}
	if( blog_description == '')
	{
		alert_message('Please Provide Description!','warning','btn-warning');
		return false;
	}*/
}
//////////////////////////////////////////////// FOR Meet Up VALIDATION /////////////////////////////////////////
function meetupValidation()
{
	var meet_up_name = $("#meet_up_name").val();
	var meet_up_description = $("#meet_up_description").val();
	var meet_up_country = $("#meetupcountry").val();
	var meet_up_city = $(".meetup_city").val();
	if( meet_up_name == '')
	{
		alert_message('Please Provide Meet Up Name!','warning','btn-warning');
		return false;
	}
	if( meet_up_country == '')
	{
		alert_message('Please Choose Meet Up Country!','warning','btn-warning');
		return false;
	}
	if( meet_up_city == '')
	{
		alert_message('Please Choose Meet Up City!','warning','btn-warning');
		return false;
	}
	if( meet_up_description == '')
	{
		alert_message('Please Provide Description!','warning','btn-warning');
		return false;
	}
}

//====================================== END ALL ADMIN VALIDATION  ==================================

//====================================== For Admin Member Deletion Message Only =====================
function delete_data(e){
	swal({
  title: "Are you sure?",
  text: "Your will not be able to recover this Data!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},
function(){
  swal("Deleted!", "Your imaginary file has been deleted.", "success");
  window.location.href = e;
});
}
//===================================== For Logout Message Only ========================================
function LogOut(e){
	swal({
  title: "Are you sure !!!",
  text: "Your will be logged out!",
  type: "success",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: " Yes ! ",
  CancelButtonText: "No !",
  closeOnConfirm: false
},
	function(){
	  //swal("Logout!!", "Your imaginary file has been deleted.", "success");
	  window.location.href = conurl+'Main/logOut';
	});
}
//============================================ For Success Message Only =========================================
function Success(e){
  swal({
  title: "Are you Sure?",
  text: "Your will be Successfully Inserted!",
  type: "success",
  showCancelButton: true,
  confirmButtonClass: "btn-success",
  confirmButtonText: " Yes ! ",
  CancelButtonText: "No !",
  closeOnConfirm: false
},
	function(){
	  //swal("Logout!!", "Your imaginary file has been deleted.", "success");
	  window.location.href = e;
	});
}
//============================================= For Profile Update Check Data Only ===============================
function Profile_update()
{
	var profile_fname = $("#profile_fname").val();
	var profile_lname = $("#profile_lname").val();
	var profile_email = $("#profile_email").val();
	var profile_phone = $("#profile_phone").val();
	var profile_city = $("#profile_city").val();
	//var member_country = $("#member_country").val();
	var usr_street = $("#usr_street").val();
	var profile_state = $("#profile_state").val();
	//var member_profile_pic = $("#member_profile_pic").val();
	var  profile_firstemaiportion= profile_email.indexOf("@");
	var  profile_lastemailportion = profile_email.lastIndexOf(".");
	if( usr_street == '')
	{
			alert_message('Please Provide Your Street Name!','warning','btn-warning');
			return false;
	}
	if( profile_fname == '')
	{
			alert_message('Please Provide a First Name!','warning','btn-warning');
			return false;
	}

	if( profile_lname == '')
	{
			alert_message('Please Provide a Last Name!','warning','btn-warning');
			return false;
	}
	if( profile_email == '')
	{
			alert_message('Please Provide Your Email!','warning','btn-warning');
			return false;
	}
	if(profile_firstemaiportion<1 || profile_lastemailportion+2>profile_email.length)
	{

			alert_message('Please Provide a Valid Email Formet!','warning','btn-warning');
			return false;
	}
	if(profile_phone == '')
	{
			alert_message('Please Provide Your Phone Number!','warning','btn-warning');
			return false;
	}

	if( isNaN (profile_phone) )
	{
			alert_message('Please Provide Your Valid Phone Number!','warning','btn-warning');
			return false;
	}
	if(  profile_city == '' )
	{
			alert_message('Please Choose Your City!','warning','btn-warning');
			return false;
	}

	if( profile_state == '')
	{
			alert_message('Please Provide Your State!','warning','btn-warning');
			return false;
	}
	/*if( member_profile_pic == '')
	{
			alert_message('Please Provide Your Profile Picture!','warning','btn-warning');
			return false;
	}*/
}
//========================================= For MEMBER Registration Only =================================
function user_registration()
{
	var usr_fname               = $("#usr_fname").val();
	var usr_lname               = $("#usr_lname").val();
	var usr_email               = $("#usr_email").val();
	var usr_firstemaiportion    = usr_email.indexOf("@");
	var usr_lastemailportion    = usr_email.lastIndexOf(".");
	var usr_cat_id              = $("#usr_cat_id").val();
	var usr_membership_rules    = $("#usr_membership_rules:checked").val();
	var usr_privacy_rules       = $("#usr_privacy_rules:checked").val();
	var profile_city            = $(".member_city_list").val();
	var profile_country         = $("#member_country").val();
	var usr_year                = $("#usr_year").val();
	var usr_month               = $("#usr_month").val();
	var usr_date                = $("#usr_date").val();

	if( usr_fname == '')
	{
			alert_message('Please Provide a First Name!','warning','btn-warning');
			return false;
	}

	if( usr_lname == '')
	{
			alert_message('Please Provide a Last Name!','warning','btn-warning');
			return false;
	}
	if( usr_email == '')
	{
			alert_message('Please Provide Your Email Address!','warning','btn-warning');
			return false;
	}
	if(usr_firstemaiportion<1 || usr_lastemailportion+2>usr_email.length)
	{

			alert_message('Please Provide a Valid Email Formet!','warning','btn-warning');
			return false;
	}
	if( usr_year == '')
	{
			alert_message('Please Choose Date Of Birth!','warning','btn-warning','Please Provide Your Year');
			return false;
	}
	if( usr_month == '')
	{
			alert_message('Please Choose Date Of Birth!','warning','btn-warning','Please Provide Your Month');
			return false;
	}
	if( usr_date == '')
	{
			alert_message('Please Choose Date Of Birth!','warning','btn-warning','Please Provide Your Date');
			return false;
	}
	if( profile_country == '')
	{
			alert_message('Please Provide Your Country!','warning','btn-warning');
			return false;
	}
	// if(  profile_city == null )
	// {
	// 		alert_message('Please Choose Your City!','warning','btn-warning');
	// 		return false;
	// }

	if( usr_cat_id == null)
	{
			alert_message('Please Choose Category!','warning','btn-warning','Please Provide Category');
			return false;
	}
	/*if( usr_membership_rules == null)
	{
			alert_message('Please Check Membership Rules!','warning','btn-warning');
			return false;
	}*/
	/*if( usr_privacy_rules == null)
	{
			alert_message('Please Check Privacy Policy!','warning','btn-warning');
			return false;
	}	*/
	/*if(usr_phone == '')
	{
			alert_message('Please Provide Your Phone Number!','warning','btn-warning');
			return false;
	}

	if( isNaN (usr_phone) )
	{
			alert_message('Please Provide Your Valid Phone Number!','warning','btn-warning');
			return false;
	}
	*/
}
//=========================================== For Trainer Registration Only ====================================
function trainer_registration(){
var trn_fname = $("#trn_fname").val();
var trn_lname = $("#trn_lname").val();
var trn_email = $("#trn_email").val();
var  trn_firstemaiportion= trn_email.indexOf("@");
var  trn_lastemailportion = trn_email.lastIndexOf(".");
var trn_password = $("#trn_password").val();
var trn_conf_password = $("#trn_conf_password").val();
var trn_date = $("#trn_date").val();
var trn_month = $("#trn_month").val();
var trn_year = $("#trn_year").val();
var trn_country = $("#trn_country").val();
var trn_about_us = $(".about_check:checked").val();
var trainer_membership_rule = $("#trainer_membership_rule:checked").val();
var trainer_privacy_policy = $("#trainer_privacy_policy:checked").val();

var trn_street = $("#trn_street").val();
var trainer_city_list = $(".trainer_city_list").val();
var trn_state = $("#trn_state").val();
var trn_post_code = $("#trn_post_code").val();
if( trn_fname == '')
	{
			alert_message('Please Provide Your First Name!','warning','btn-warning');
			return false;
	}
if( trn_lname == '')
	{
			alert_message('Please Provide Your Last Name!','warning','btn-warning');
			return false;
	}
if( trn_email == '')
	{
			alert_message('Please Provide Your Email Address!','warning','btn-warning');
			return false;
	}
if(trn_firstemaiportion<1 || trn_lastemailportion+2>trn_email.length)
{

		alert_message('Please Provide a Valid Email Formet!','warning','btn-warning');
		return false;
}
if( trn_password == '')
	{
			alert_message('Please Provide Your Password!','warning','btn-warning','Please Choose Your Password');
			return false;
	}
if( trn_conf_password != trn_password || trn_conf_password == '')
	{
		alert_message('Confirm Password Doesnot Match!','warning','btn-warning','Please Choose a Same Password');
		return false;
	}

if( trn_year == '')
	{
			alert_message('Please Choose a Year!','warning','btn-warning');
			return false;
	}
if( trn_month == '')
	{
			alert_message('Please Choose a Month!','warning','btn-warning');
			return false;
	}
if( trn_date == '')
	{
			alert_message('Please Choose a Date!','warning','btn-warning');
			return false;
	}
if( trn_country == '')
	{
			alert_message('Please Choose Your Country!','warning','btn-warning');
			return false;
	}
// if( trainer_city_list == null)
// 	{
// 			alert_message('Please Choose City!','warning','btn-warning');
// 			return false;
// 	}
if( trn_about_us == null)
	{
			alert_message('Where Did you hear about us!','warning','btn-warning');
			return false;
	}
if( trainer_membership_rule == null)
	{
			alert_message('Please Check Membership Rules!','warning','btn-warning');
			return false;
	}
if( trainer_privacy_policy == null)
	{
			alert_message('Please Check Privacy Policy!','warning','btn-warning');
			return false;
	}
}
//=========================================== For COMPANY Registration Only ====================================
function company_registration(){
var company_name = $("#company_name").val();
var company_c_person = $("#company_c_person").val();
var trn_email = $("#company_email").val();
var  trn_firstemaiportion= trn_email.indexOf("@");
var  trn_lastemailportion = trn_email.lastIndexOf(".");
var trn_password = $("#company_password").val();
var trn_conf_password = $("#company_cnf_password").val();
//var trn_date = $("#trn_date").val();
//var trn_month = $("#trn_month").val();
//var trn_year = $("#trn_year").val();
var company_country = $("#company_country").val();
var company_about_us = $(".company_about_us:checked").val();
var trainer_membership_rule = $("#company_membership_rule:checked").val();
var trainer_privacy_policy = $("#company_privacy_policy:checked").val();
var company_city_list = $(".company_city_list").val();
/*var trn_post_code = $("#trn_post_code").val();*/

if( company_name == '')
	{
			alert_message('Please Provide Your Company Name!','warning','btn-warning');
			return false;
	}
if( company_c_person == '')
	{
			alert_message('Please Provide Your Contact Person Name!','warning','btn-warning');
			return false;
	}
if( trn_email == '')
	{
			alert_message('Please Provide Your Email Address!','warning','btn-warning');
			return false;
	}
if(trn_firstemaiportion<1 || trn_lastemailportion+2>trn_email.length)
{

		alert_message('Please Provide a Valid Email Formet!','warning','btn-warning');
		return false;
}
if( trn_password == '')
	{
			alert_message('Please Provide Your Password!','warning','btn-warning','Please Choose Your Password');
			return false;
	}
if( trn_conf_password != trn_password || trn_conf_password == '')
	{
		alert_message('Confirm Password Doesnot Match!','warning','btn-warning','Please Choose a Same Password');
		return false;
	}
if( company_country == '')
	{
			alert_message('Please Choose Country!','warning','btn-warning');
			return false;
	}
// if( company_city_list == null)
// 	{
// 			alert_message('Please Choose Your City!','warning','btn-warning');
// 			return false;
// 	}
if( company_about_us == null)
	{
			alert_message('Please Provide Your About Us Name!','warning','btn-warning');
			return false;
	}
if( trainer_membership_rule == null)
	{
			alert_message('Please Check Membership Rules!','warning','btn-warning');
			return false;
	}
if( trainer_privacy_policy == null)
	{
			alert_message('Please Check Privacy Policy!','warning','btn-warning');
			return false;
	}
/*if( trn_date == '')
	{
			alert_message('Please Choose a Date!','warning','btn-warning');
			return false;
	}*/
/*if( trn_street == '')
	{
			alert_message('Please Provide Your Street Address!','warning','btn-warning');
			return false;
	}
if( trn_password == '')
	{
			alert_message('Please Provide Your Password!','warning','btn-warning','Please Choose Your Password');
			return false;
	}
if( trn_conf_password != trn_password || trn_conf_password == '')
	{
		alert_message('Confirm Password Doesnot Match!','warning','btn-warning','Please Choose a Same Password');
		return false;
	}		*/
}
//=========================================== For COMPANY Registration Only ====================================
function company_Profile_update(){
var company_name = $("#company_name").val();
var company_c_person = $("#company_c_person").val();
var trn_email = $("#company_email").val();
var  trn_firstemaiportion= trn_email.indexOf("@");
var  trn_lastemailportion = trn_email.lastIndexOf(".");
var company_country = $("#company_country").val();
var company_about_us = $(".company_about_us:checked").val();
var trainer_membership_rule = $("#company_membership_rule:checked").val();
var trainer_privacy_policy = $("#company_privacy_policy:checked").val();
var company_city_list = $(".company_city_list").val();
/*var trn_post_code = $("#trn_post_code").val();*/

if( company_name == '')
	{
			alert_message('Please Provide Your Company Name!','warning','btn-warning');
			return false;
	}
if( company_c_person == '')
	{
			alert_message('Please Provide Your Contact Person Name!','warning','btn-warning');
			return false;
	}
if( trn_email == '')
	{
			alert_message('Please Provide Your Email Address!','warning','btn-warning');
			return false;
	}
if(trn_firstemaiportion<1 || trn_lastemailportion+2>trn_email.length)
{

		alert_message('Please Provide a Valid Email Formet!','warning','btn-warning');
		return false;
}
if( company_country == '')
	{
			alert_message('Please Choose Country!','warning','btn-warning');
			return false;
	}
if( company_city_list == null)
	{
			alert_message('Please Choose Your City!','warning','btn-warning');
			return false;
	}
if( company_about_us == null)
	{
			alert_message('Please Provide Your About Us Name!','warning','btn-warning');
			return false;
	}
if( trainer_membership_rule == null)
	{
			alert_message('Please Check Membership Rules!','warning','btn-warning');
			return false;
	}
if( trainer_privacy_policy == null)
	{
			alert_message('Please Check Privacy Policy!','warning','btn-warning');
			return false;
	}
/*if( trn_date == '')
	{
			alert_message('Please Choose a Date!','warning','btn-warning');
			return false;
	}*/
/*if( trn_street == '')
	{
			alert_message('Please Provide Your Street Address!','warning','btn-warning');
			return false;
	}
if( trn_password == '')
	{
			alert_message('Please Provide Your Password!','warning','btn-warning','Please Choose Your Password');
			return false;
	}
if( trn_conf_password != trn_password || trn_conf_password == '')
	{
		alert_message('Confirm Password Doesnot Match!','warning','btn-warning','Please Choose a Same Password');
		return false;
	}		*/
}
//========================================= Country List For City (WORKED)==========================================
function getCityForCountry(e)
{
	$.ajax({
	url: conurl+"Home/get_city/"+e,
	type: 'POST',
	data:{country:e},
	success: function(response){
		var tmpArr = new Array();
		var result = JSON.parse(response);
		var get_pic = conurl+'upload/no_image/no-photo-available.jpg';
		$.each(result,function(i,v){
		if(v.city_image == ''){
		get_pic = conurl+'upload/no_image/no-photo-available.jpg';
		}
		else{
		get_pic = imageUrl+v.city_image;
		}
		getId = 'fav_'+v.city_id;
		tmpArr.push('<div class="col-md-4 col-sm-6">'
					  +'<div class="single">'
						+'<div class="image">'
							+'<img src="'+get_pic+'">'
							+'<div class="overlay">'
								+'<ul>'
									+'<li><a href="'+conurl+'Home/city-inner/'+btoa(v.city_id)+'">More</a></li>'
									+'<li><a href="'+conurl+'Home/news/'+btoa(v.city_id)+'">News</a></li>'
								+'</ul>'
							+'</div>'
						+'</div>'
						+'<p>'+v.city_name+'</p>'
					+'</div>'
				+'</div>');
		});
		$('#concity_list').html(tmpArr);
	}
	});
}
//========================================= Country List For City (WORKED) ==========================================
function set_country(e)
{
	$.ajax({
	url: conurl+"Home/check_city",
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
//========================================= Country List For City (WORKED) ==========================================
function set_sub_category(e)
{
	$.ajax({
	url: conurl+"Shop/check_sub_category",
	dataType: 'html',
	type: 'POST',
	data:{sub_category:e},
	success: function(result)
	{
		 $('#sub_cat_list').html(result);
	}
	});
}
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

function initAutocomplete() {
// Create the autocomplete object, restricting the search to geographical
// location types.
autocomplete = new google.maps.places.Autocomplete(
/** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
{types: ['geocode']});

// When the user selects an address from the dropdown, populate the address
// fields in the form.
autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
// Get the place details from the autocomplete object.
var place = autocomplete.getPlace();

for (var component in componentForm) {
document.getElementById(component).value = '';
document.getElementById(component).disabled = false;
}

// Get each component of the address from the place details
// and fill the corresponding field on the form.
for (var i = 0; i < place.address_components.length; i++) {
var addressType = place.address_components[i].types[0];
if (componentForm[addressType]) {
var val = place.address_components[i][componentForm[addressType]];
document.getElementById(addressType).value = val;
}
}
}
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
if (navigator.geolocation) {
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
//========================================== Favourite City ============================================
function favourite_city(e)
{
	var text = '';
	var res = e.split("_");
	$.ajax({
	url: conurl+"Main/favourite_city/",
	dataType: 'html',
	type: 'POST',
	data:{city_id:res[1]},
	success: function(result)
	{
	if(result == 'SUCCESS_1'){
	text = 'Remove Favourite';
	}else{
	text = 'Add Favourite';
	}
	$('#fav_'+res[1]).html(text);
	}
	});
}
//======================================== Favourite Event In Event Listing ===================================
function favourite_event(e)
{
	var text = '';
	var res = e.split("_");
	$.ajax({
	url: conurl+"Main/favourite_event/",
	dataType: 'html',
	type: 'POST',
	data:{send_id:res[1]},
	success: function(result)
	{
	if(result == 'SUCCESS_1'){
	text = '<i class="fa fa-heart"></i>';
	}else{
	text = '<i class="fa fa-heart-o"></i>';
	}
	$('#fav_'+res[1]).html(text);
	}
	});
}
function favourite_news(e)
{
	var text = '';
	var res = e.split("_");
	$.ajax({
	url: conurl+"Main/favourite_news/",
	dataType: 'html',
	type: 'POST',
	data:{send_id:res[1]},
	success: function(result)
	{
	if(result == 'SUCCESS_1'){
	text = '<i class="fa fa-heart"></i>';
	}else{
	text = '<i class="fa fa-heart-o"></i>';
	}
	$('#news_'+res[1]).html(text);
	}
	});
}
//======================================== Favourite Event In Event Listing ===================================
function details_favourite_event(e)
{
	var text ='';
	var res = e.split("_");
	$.ajax({
		url:conurl+"Main/favourite_event/",
		dataType:"html",
		type:'POST',
		data:{send_id:res[1]},
		success: function(result)
		{
			if(result=='SUCCESS_1'){
				text = '<i class="fa fa-heart"></i> Remove Favourite';
				}
			else{
					text = '<i class="fa fa-heart-o"></i> Add To Favourite';
				}
			$('#fev_'+res[1]).html(text);
		}
		});
}
//======================================== Favourite Store In Event Listing ===================================
function favourite_store(e)
{
	var text = '';
	var res = e.split("_");
	$.ajax({
	url: conurl+"Main/favourite_store/",
	dataType: 'html',
	type: 'POST',
	data:{send_id:res[1]},
	success: function(result)
	{
	if(result == 'SUCCESS_1'){
	text = '<i class="fa fa-heart"></i>';
	}else{
	text = '<i class="fa fa-heart-o"></i>';
	}
	$('#favv_'+res[1]).html(text);
	}
	});
}
//======================================== Favourite Event In Event Listing ===================================
function details_favourite_store(e)
{
	var res = e.split("_");
	var text = '';
	$.ajax({
	url:conurl+"Main/favourite_store/",
	dataType:"html",
	type:"POST",
	data:{send_id:res[1]},
	success: function(result){
		if(result == 'SUCCESS_1'){
			text = '<i class="fa fa-heart"></i> Remove Favourite';
				}
			else{
					text = '<i class="fa fa-heart-o"></i> Add To Favourite';
				}
		$("#fev_"+res[1]).html(text);
	}
	});

}
//======================================== Select City In Event Listing WORKING)===================================
function city_event_search(e,get_url)
{
	if(e == 0){
		window.location.href = get_url;
	}
	else{
	var text = '';
	//var res = e.split("_");
	$.ajax({
		url: conurl+"Home/city_event_find/",
		dataType: 'JSON',
		type: 'POST',
		data:{send_id:e},
		success: function(response){
			var tmpArr = new Array();
			if(response == 'Error'){
				tmpArr.push('<div class="col-lg-4 col-sm-6">'
  +'<div class="single no_data">'+'<h2>'+'No Data Found'+'</h2>'+'</div>');
			}
			else{
			$.each(response, function(i, v){
				if(v.event_banner == ''){
				get_pic = conurl+'upload/no_image/no-photo-available.jpg';
			}
			else{
			get_pic = conurl+'upload/events/'+v.event_banner;
			}
				tmpArr.push('<div class="col-lg-4 col-sm-6 eventTS" data-id="'+v.event_name+''+v.event_name+''+v.event_city+''+v.event_id+'">'
  +'<div class="single">'
    +'<div class="city-image">'
      +'<div class="image">'+'<img src="'+get_pic+'" alt="">'+'</div>'
      +'<h4>'+v.event_name+'</h4>'
      +'<div class="overlay">'
        +'<ul>'
          +'<li><a href="'+conurl+'Home/category-details/'+btoa(v.event_id)+'">More</a></li>'
          +'<li><a href="'+conurl+'Home/event-details/'+btoa(v.event_id)+'">Detail</a></li>'
        +'</ul>'
      +'</div>'
    +'</div>'
    +'<div class="city-cntnt">'
      +'<div class="cntnt">'
        +'<p>'+v.event_city+'</p>'
        +'<ul class="rate">'
          +'<li><i class="fa fa-star"></i></li>'
          +'<li><i class="fa fa-star"></i></li>'
          +'<li><i class="fa fa-star"></i></li>'
          +'<li><i class="fa fa-star"></i></li>'
          +'<li><i class="fa fa-star"></i></li>'
        +'</ul>'
      +'</div>'
      +'<ul class="social">'
        +'<li><a href="'+v.event_user_instagram+'" target="_blank"><i class="fa fa-instagram"></i></a></li>'
        +'<li><a href="'+v.event_user_facebook+'" target="_blank"><i class="fa fa-facebook" target="_blank"></i></a></li>'
        +'<li><a href="'+v.event_user_twitter+'" target="_blank"><i class="fa fa-twitter" target="_blank"></i></a></li>'
      +'</ul>'
    +'</div>'
  +'</div>'
+'</div>');
			});
			}
			//console.log(tmpArr);
			$('#search_event_list').html(tmpArr);
		}
	});
  }
}
//===========================================================================
function get_design()
{
	$(".s-sec").height("auto");
	$('.s-cont').each(function(){
		// Cache the highest
		var highestBox = 0;
		// Select and loop the elements you want to equalise
		$('.s-sec', this).each(function(){
		// If this box is higher than the cached highest then store it
		if($(this).height() > highestBox) {
		highestBox = $(this).height();
		}
		});
		// Set the height of all those children to whichever was highest
		if( $(window).width() >= 992 ) {
		$('.s-sec',this).height(highestBox);
		} else {
		$('.s-sec',this).css( "height" , "auto");
		}
	});
}
//===========================================================================
function category_event_search(e)
{
	var city_id = $("select#city_event_id option:selected").val();
	var send_id = $("select#category_event_id option:selected").val();
	$.ajax({
		url: "http://www.clubmondain.com/Home/category_event_find/",
		dataType: 'HTML',
		type: 'POST',
		data:{
			send_id:send_id,
			city_id:city_id
		},
		success: function(responseData){
		$('#search_event_list').html('');
		$('#search_event_list').html(responseData);
		get_design();
		}
	});
}

//======================================== Join This Event ===================================
function details_join_event(e,nameF,nameL,imageUrl,companyName)
{
	var text ='';
	var res = e.split("_");
	$.ajax({
		url:conurl+"Main/join_event/",
		dataType:"html",
		type:'POST',
		data:{send_id:res[1]},
		success: function(result)
		{
			if(result=='SUCCESS_1'){
				text = 'You signed up !'
				}
			else{
					text = 'Join This Event?';
				}
			$('.join_'+res[1]).html(text);

			if(result=='SUCCESS_1'){
				if(companyName == ''){
				var namex = nameF+' '+nameL;
				}else{
				var namex = companyName;
				}
				if(imageUrl == ''){
				var imageX = conurl+'upload/no_image/no-photo-available.jpg';
				}else{
				var imageX = conurl+'upload/profile/'+imageUrl;
				}
				//var dataL = '<li><a href=""><div class="single"><div class="image"><img src='+imageX+'></div><p>'+namex+'</p></div></a></li>';
				//var dataL = '<li><a href=""><div class="single"><div class="image"><img src='+imageX+'></div><p>'+namex+'</p></div></a></li>';
				//$("#ax").append(dataL);
			}
		}
		});
}
//======================================== Join This Class ===================================
function details_join_class(e)
{
	var text ='';
	var res = e.split("_");
	$.ajax({
		url:conurl+"Main/join_class/",
		dataType:"html",
		type:'POST',
		data:{send_id:res[1]},
		success: function(result)
		{
			if(result == 'Full'){
			alert_message('SORRY!! BOOKING FULL','warning','btn-warning');
			}else{

			if(result=='SUCCESS_1'){
				text = 'Already Joined This Class!'
				}
			else{
					text = 'Join This Class?';
				}
			$('.join_'+res[1]).html(text);
			}

		}
		});
}
////////////////////////////////////////////// USE LSTER ///////////////////////////////////////////////
function searchTerm(t){
	alert('Biplab');
	var _searchTerm = t.toLowerCase();

	$('ul#side-menu-bar').find('li.treeview').each(function() {
		var _linkName = $(this).attr('data-link').toLowerCase();

		if(_linkName.indexOf(_searchTerm) == -1){
			$(this).slideUp();
		}else{
			$(this).slideDown();
		}
	});
}
//=========================================== For Dashboard View Message Only ====================================
function Dashboard(e){
$.ajax({
type: "POST",
url: 'Main/index',
dataType: 'html',
success: function() {
	swal({
  title: "Are you Sure?",
  text: "Your will be go to Dashboard!",
  type: "success",
  showCancelButton: true,
  confirmButtonClass: "btn-success",
  confirmButtonText: " Yes ! ",
  CancelButtonText: "No !",
  closeOnConfirm: false
},
	function(){
	  //swal("Logout!!", "Your imaginary file has been deleted.", "success");
	  window.location.href = url;
	});
	}
});//Ajax End
}
