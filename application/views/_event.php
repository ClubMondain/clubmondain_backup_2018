<?php include('include/head.php');?>
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
                         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACjdpaolaUHA-rjK_YEvP8UdQi9Z3YIwk" type="text/javascript"></script>
                    </div>
                    
<script type="text/javascript">
var mapOptions = {
	zoom: 2,
	center: new google.maps.LatLng(20.5937, 133.7751)
};
map = new google.maps.Map(document.getElementById('single-city-map'),mapOptions);
var pinz = [
<?php
if(count($allEvent) > 0){
	foreach($allEvent as $storeDetails){	
		if(!empty($storeDetails['event_latitude']) and !empty($storeDetails['event_longitute'])){
			$la = $storeDetails['event_latitude']; $lo = $storeDetails['event_longitute'];	 
?>
	{
		'location':{
		'lat' : <?php echo $la; ?>,
		'lon' : <?php echo $lo; ?>
		},
		'title' : '<?php echo $storeDetails['event_adress']; ?>',
		
	},
<?php
		}
	}
}
?>	
];

var contentString = new Array();
var infowindow;
var image = 
{
		url: '<?php echo base_url('assets/web/icon/map-marker.png');?>',
		scaledSize: new google.maps.Size(42,42)
};

<?php 
if(count($allEvent) > 0){
	foreach($allEvent as $storeDetails){
?>
	contentString.push('<div><h5><b>ClubMondain - <?php echo $storeDetails['event_name'];?></b></h5><br><p><i class="fa fa-map-marker"></i>  <?php echo strip_tags($storeDetails['event_adress']);?></p>'+
'<p><i class="fa fa-map-marker"></i>  <?php echo $storeDetails['event_city'].'&nbsp;,&nbsp;'.$storeDetails['event_country'];?></p><p><i class="fa fa-clock-o"></i><a href="<?php echo $storeDetails['event_website_url'];?>" target="blank"><?php echo $storeDetails['event_website_url'];?></a></p>'+
'</div>');
<?php 
	}
}
?>

for(var i = 0; i < pinz.length; i++){
	var infowindow = new google.maps.InfoWindow();
	var myLatLng = new google.maps.LatLng(pinz[i].location.lat, pinz[i].location.lon);
	var marker = new google.maps.Marker({
		position: myLatLng,
		map: map,
		label: '',
		title: pinz[i].title,
		icon: image,
	});	
		
/*	marker.addListener('click', function() {
		infowindow.setContent(contentString[i]);
		infowindow.open(map, marker);
	});*/
	
	var content = contentString[i].toString();
	var prev_infowindow = false;
	
	google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
		return function() {
			if(prev_infowindow){
			prev_infowindow.close();	
			}
			prev_infowindow = infowindow;
			infowindow.setContent(content);
			infowindow.open(map,marker);
		};
	})(marker,content,infowindow));
	
}
</script>
                </div>
                <div class="col-lg-8 col-sm-7 s-sec">
                    <div class="city-container">
                        <div class="city-search" id="city-search">
                            <div class="select-sec">
                                <div class="select">
                                    <select name="category_event" onChange="category_event_search(this.value,'<?php echo base_url(uri_string());?>');">
                                    	<option value="0">Choose Categories</option>
                                    <?php foreach($allCategory as $allCat){?>
                                        <option value="<?php echo base64_encription($allCat['category_id']);?>"><?php echo $allCat['category_name']?></option>
                                    <?php }?>    
                                    </select>
                                </div>
                                <div class="select">
                                    <select name="city_event" onChange="city_event_search(this.value,'<?php echo base_url(uri_string());?>');" id="get_city_event">
                                       <option value="0">Choose City</option>
                                    <?php foreach($allCity as $Citydetails){?>
                                        <option value="<?php echo base64_encription($Citydetails['city_id']);?>"><?php echo $Citydetails['city_name']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="sort-sec">
                                <div class="sort-btn">
                                    <div class="date-picker-btn">
                                        <input type="text" class="datepicker">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <a id="grid-list-toggle" class="active"><i class="fa fa-th"></i></a>
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
                                    <a href="<?php echo base_url('Main/add_business');?>" data-toggle="modal"> + Add Space</a>
                                 <?php }
								 else{?>
                                 <a href="#no-login-popup" data-toggle="modal"> + Add Space</a>   
                                 <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="city-cont" id="city-container">
                           <div class="row" id="search_event_list">
                           <?php if(!empty($allEvent)>0){?>
                            <?php for($i=0;$i<$max_val;$i++){?>
								<?php if(!empty($allEvent[$i])){?>
                                    <div class="col-lg-4 col-sm-6 eventTS col-cont" data-id="<?php echo strtolower($allEvent[$i]['event_name']);  echo strtolower($allEvent[$i]['event_city']); echo specific_category($allEvent[$i]['event_id']);?>">
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
                                                    <?php echo date('dS M Y',strtotime($allEvent[$i]['create_date']));?>
                                                    <!--<ul class="rate">
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>-->
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
									<div class="col-lg-4 col-sm-6 eventTS col-cont" data-id="<?php echo strtolower($allBusiness[$i]['business_name']); ?>">
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
														<?php ?><li><a href="<?php echo base_url('Home/category-business-data/').base64_encription($allBusiness[$i]['business_id']);?>">More</a></li><?php ?>
														<li><a href="<?php echo base_url('Home/store-details/').base64_encription($allBusiness[$i]['business_id']);?>">Detail</a></li>
														<!--<li><a href="#delete-feature-popup">Popup</a></li>-->
													</ul>
												</div>
											</div>
											<div class="city-cntnt">
												<div class="cntnt">
													<p><?php echo $allBusiness[$i]['business_city'];?></p>
                                                    <?php echo date('dS M Y',strtotime($allBusiness[$i]['create_date']));?>
													<!--<ul class="rate">
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														
													</ul>-->
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
                                        <li><a id="fav_<?php echo $allBusiness[$i]['business_id']?>"  onClick="return favourite_store(this.id);" alt="Favourite"><?php echo $text;?></a></li>
                                                     
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
                                <?php }
								else{?>
                                    <div class="no_evnt"><h2>No Events Available</h2></div>
                                <?php }?>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  $( function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
  $('select').select2();
</script>
<script type="text/javascript">
function getSearch(e)
{
var e = e.toLowerCase();      
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