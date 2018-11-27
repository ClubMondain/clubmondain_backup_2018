<?php include('include/head.php');?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACjdpaolaUHA-rjK_YEvP8UdQi9Z3YIwk" type="text/javascript"></script>
<body>
<?php include('include/header.php');
if(!empty($allEvent)){
$count_event = count($allEvent);
}
else{
$count_event=0;
}
if(!empty($allBusiness)){
$count_business = count($allBusiness);
}
else{
$count_business=0;
}
if($count_business>$count_event) 
$max_val = $count_business;
else 
$max_val = $count_event;
?>
<main>
    <section class="city-inner">
        <div class="container-fluid max-1310">
            <div class="row s-cont">
                <div class="col-lg-4 col-sm-5 map-cont s-sec">
                    <div class="single-city-map" id="single-city-map">
                        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60949550.79698232!2d95.474687697975!3d-21.189562525113573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2b2bfd076787c5df%3A0x538267a1955b1352!2sAustralia!5e0!3m2!1sen!2sin!4v1485865598569" style="border:0" allowfullscreen="" frameborder="0"></iframe>-->
                         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACjdpaolaUHA-rjK_YEvP8UdQi9Z3YIwk" type="text/javascript"></script>
                    </div>
<script type="text/javascript">
var mapOptions = {
	zoom: 2,
	center: new google.maps.LatLng(20, 133.7751)
};
map = new google.maps.Map(document.getElementById('single-city-map'),mapOptions);
var pinz = [
<?php
if(count($allBusiness) > 0){
foreach($allBusiness as $full_details_event){	
if(!empty($full_details_event['business_latitude']) and !empty($full_details_event['business_longitute'])){
 $la = $full_details_event['business_latitude']; $lo = $full_details_event['business_longitute'];	 
?>
	{
		'location':{
		'lat' : <?php echo $la; ?>,
		'lon' : <?php echo $lo; ?>
		},
		//'label' : 'CLUB_MONDAIN:- <?php //echo $body_business['business_name']; ?>'
		'title' : '<?php echo $full_details_event['business_street']; ?>'
	},
<?php
}
}
}?>	
];
//alert(pinz.length);
//var image = '<?php //echo base_url('assets/web/icon/map-marker.png');?>'
var point_image = 
{
		url: '<?php echo base_url('assets/web/icon/map-marker.png');?>',
		scaledSize: new google.maps.Size(42,42)
};
for(var i = 0; i <= pinz.length; i++){
var myLatLng = new google.maps.LatLng(pinz[i].location.lat, pinz[i].location.lon);
var marker = new google.maps.Marker({
	position: myLatLng,
	map: map,
	label: '',
	title: pinz[i].title,
	icon: point_image
});
}
//}
</script>
                </div>
                <div class="col-lg-8 col-sm-7 s-sec">
                    <div class="city-container">
                        <div class="city-search" id="city-search">
                            <div class="select-sec">
                                <div class="select">
                                    <select name="category_event" onChange="category_event_search(this.value);">
                                    	<option value="">Choose Categories</option>
                                    <?php foreach($allCategory as $allCat){?>
                                        <option value="<?php echo base64_encription($allCat['category_id']);?>"><?php echo $allCat['category_name']?></option>
                                    <?php }?>    
                                    </select>
                                </div>
                                <div class="select">
                                    <select name="city_event" onChange="city_event_search(this.value);" id="get_city_event">
                                       <option value="">Choose City</option>
                                    <?php foreach($allCity as $Citydetails){?>
                                        <option value="<?php echo base64_encription($Citydetails['city_id']);?>"><?php echo $Citydetails['city_name']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                               <!-- <div class="select">
                                    <select>
                                        <option>Views</option>
                                    </select>
                                </div>-->
                            </div>
                            <div class="sort-sec">
                                <div class="sort-btn">
                                    <a href="#" class="active"><i class="fa fa-th"></i></a>
                                    <a href="#"><i class="fa fa-th-list"></i></a>
                                </div>
                                <div class="search-sec">
                                    <input type="text" onKeyUp="getSearch(this.value)">
                                    <button><i class="fa fa-search"></i></button>
                                </div>
                                <div class="add-event-sec">
                                 <?php if(!empty($this->session->userdata('user_login'))){ ?>
                                    <a href="<?php echo base_url('Main/add_event');?>" data-toggle="modal"> + Add Event</a>
                                 <?php }
								 else{?>
                                 <a href="#no-login-popup" data-toggle="modal"> + Add Event</a>   
                                 <?php }?>
                                   <?php if(!empty($this->session->userdata('user_login'))){ ?>
                                    <a href="<?php echo base_url('Main/add_business');?>" data-toggle="modal"> + Add Hub</a>
                                 <?php }
								 else{?>
                                 <a href="#no-login-popup" data-toggle="modal"> + Add Hub</a>   
                                 <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="city-cont">
                           <div class="row" id="search_event_list">
                            <?php for($i=0;$i<$max_val;$i++){?>
								<?php if(!empty($allEvent[$i])){?>
                                    <div class="col-lg-4 col-sm-6 eventTS" data-id="<?php echo strtolower($allEvent[$i]['event_name']);  echo strtolower($allEvent[$i]['event_city']); echo specific_category($allEvent[$i]['event_id']);?>">
                                        <div class="single">
                                            <div class="city-image">
                                                <div class="image">
                                                <?php if(isset($allEvent[$i]['event_banner']) && !empty($allEvent[$i]['event_banner'])){?>
                                                   <img src="<?php echo base_url('upload/events/').$allEvent[$i]['event_banner'];?>" alt="">
                                                   <?php }
                                                   else{?>
                                                   <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                                                   <?php }?>
                                                </div>
                                                <h4><?php echo ucwords($allEvent[$i]['event_name']);?></h4>
                                                <div class="overlay">
                                                    <ul>
                                                     <li><a href="<?php echo base_url('Home/category-event/').base64_encription($allEvent[$i]['event_id']);?>">More</a></li>
													 <?php /*?><li><a id="fav_<?php echo $allEvent[$i]['event_id']?>"  onClick="return favourite_event(this.id);"><?php echo $text;?></a></li>
													 <?php */?>
                                                     <li><a href="<?php echo base_url('Home/event-details/').base64_encription($allEvent[$i]['event_id']);?>">Detail</a></li>
                                                    <?php /*?><li><a href="#delete-feature-popup" data-toggle="modal">Popup</a></li><?php */?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="city-cntnt">
                                                <div class="cntnt">
                                                    <p><?php echo $allEvent[$i]['event_city'];?>(Event)</p>
                                                    <ul class="rate">
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <ul class="social">
                                                    <li><a href="<?php if(isset($allEvent[$i]['event_user_facebook'])){echo $allEvent[$i]['event_user_facebook'];}else{ '#';}?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?php if(isset( $allEvent[$i]['event_user_twitter'])){ echo $allEvent[$i]['event_user_twitter'];}else{ '#';}?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="<?php if(isset( $allEvent[$i]['event_user_instagram'])){ echo $allEvent[$i]['event_user_instagram'];}else{ '#';}?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    
                                         <?php if(!empty($this->session->userdata('user_login'))){ 
										 $is_presnt = favDetails(PIVOT_FEB_EVENT,$allEvent[$i]['event_id'],'event_id');
										 if($is_presnt == 'Yes'){
										 $text = '<i class="fa fa-heart"></i>';
										 }else{
										 $text = '<i class="fa fa-heart-o"></i>';	 
										 }?>
                                        <li><a id="fav_<?php echo $allEvent[$i]['event_id']?>"  onClick="return favourite_event(this.id);"><?php echo $text;?></a></li>
                                                     
                                                     <?php }
                 else { ?>
                    <li> <a href="#no-login-popup" data-toggle="modal"><i class="fa fa-heart-o"></i></a> </li>
                    <?php }?>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php }   
								  if(!empty($allBusiness[$i])){?>
									<div class="col-lg-4 col-sm-6 eventTS" data-id="<?php echo strtolower($allBusiness[$i]['business_name']); ?>">
										<div class="single">
											<div class="city-image">
												<div class="image">
                                                <?php if(isset($allBusiness[$i]['business_image']) && !empty($allBusiness[$i]['business_image'])){?>
												   <img src="<?php echo base_url('upload/business/').$allBusiness[$i]['business_image'];?>" alt=""> <?php }
												    else{?>
                                                   <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                                                   <?php }?>
												</div>
												<h4><?php echo ucwords($allBusiness[$i]['business_name']);?></h4>
												<div class="overlay">
													<ul>
														<?php ?><li><a href="<?php echo base_url('User/more').$allBusiness[$i]['business_id'];?>">More</a></li><?php ?>
														<li><a href="<?php echo base_url('Home/store-details/').base64_encription($allBusiness[$i]['business_id']);?>">Detail</a></li>
														<!--<li><a href="#delete-feature-popup">Popup</a></li>-->
													</ul>
												</div>
											</div>
											<div class="city-cntnt">
												<div class="cntnt">
													<p><?php echo $allBusiness[$i]['business_city'];?>(Dell / Shop)</p>
													<ul class="rate">
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														
													</ul>
												</div>
												<ul class="social">
													 <li><a href="<?php if(isset($allBusiness[$i]['business_user_facebook'])){echo $allBusiness[$i]['business_user_facebook'];}else{ '#';}?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?php if(isset($allBusiness[$i]['business_user_twitter'])){ echo $allBusiness[$i]['business_user_twitter'];}else{ '#';}?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    
                                    <li><a href="<?php if(isset($allBusiness[$i]['business_user_instagram'])){ echo $allBusiness[$i]['business_user_instagram'];}else{ '#';}?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    
													<?php if(!empty($this->session->userdata('user_login'))){ 
										 $is_presnt = favDetails(PIVOT_FEB_STORE,$allBusiness[$i]['business_id'],'business_id');
										 if($is_presnt == 'Yes'){
										 $text = '<i class="fa fa-heart"></i>';
										 }else{
										 $text = '<i class="fa fa-heart-o"></i>';	 
										 }	 
										?>
                                        <li><a id="favv_<?php echo $allBusiness[$i]['business_id']?>"  onClick="return favourite_store(this.id);" alt="Favourite"><?php echo $text;?></a></li>
                                                     
                                                     <?php }
                 else { ?>
                    <li> <a href="#no-login-popup" data-toggle="modal" alt="Favourite"><i class="fa fa-heart-o"></i></a> </li>
                    <?php }?>
												</ul>
											</div>
										</div>
									</div>
								<?php }
							 }?>    
                                <div class="city-load">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="clearfix"></div>
</main>
<?php include("include/footer.php");?>
</body>
<script type="text/javascript">
function getSearch(e)
{
$( ".eventTS" ).each(function(index, element) {
    if(e == '' || e == null){
    $(this).show(); 
    }else{
    var get_val = $(element).attr("data-id");
    if(get_val.indexOf(e) > -1){
    $(this).show(); 
    }else{
    $(this).hide(); 
    }   
    }
});

}

     var mapOptions = {
    zoom: 16,
    center: new google.maps.LatLng(-37.808846, 144.963435)
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);


var pinz = [
    {
        'location':{
            'lat' : -37.807817,
            'lon' : 144.958377
        },
        'lable' : 2
    },
    {
        'location':{
            'lat' : -37.807885,
            'lon' : 144.965415
        },
        'lable' : 42
    },
    {
        'location':{
            'lat' : -37.811377,
            'lon' : 144.956596
        },
        'lable' : 87
    },
    {
        'location':{
            'lat' : -37.811293,
            'lon' : 144.962883
        },
        'lable' : 145
    },
    {
        'location':{
            'lat' : -37.808089,
            'lon' : 144.962089
        },
        'lable' : 999
    },
];

  var labels = '12';
  var labelIndex = 0; 
  var image = 't.png'

for(var i = 0; i <= pinz.length; i++){

var xL = pinz[i].lable;
    xL = String(xL);

   var myLatLng = new google.maps.LatLng(pinz[i].location.lat, pinz[i].location.lon);
   var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
	  label: xL,
	  icon: image
     
  });
}
</script>
</html>