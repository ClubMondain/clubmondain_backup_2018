<?php
include('include/head.php');?>
<body>
<?php include('include/header.php'); ?>
<main>
  <?php if(isset($details_event)){
	foreach($details_event as $header_event){?>
  <section class="page-banner events">
    <div class="image">
      <?php if($header_event['event_banner']!=''){?>
      <img class="slide-img" src="<?php echo base_url('upload/events/').$header_event['event_banner'];?>">
      <?php }
                   else{?>
      <img src="<?php echo base_url('assets/web');?>/images/bg-5.jpg" alt="">
      <?php }?>
    </div>
    <div class="content">
      <h3><?php echo ucwords($header_event['event_name']);?></h3>
      <p><?php echo $header_event['event_adress'];?> ,<?php echo date('dS M , Y',strtotime($header_event['event_date_from']));?> TO <?php echo date('dS M , Y',strtotime($header_event['event_date_to']));?></p>
    </div>
    <div class="overlay"></div>
  </section>
  <?php }}?>
  <div class="container-fluid max-1240">
    <div class="full-content">
      <?php
		if(isset($details_event)){
		foreach($details_event as $full_details_event){?>
      <div class="page-content">
        <div class="page-inner-content">
          <div class="page-tab-links">
            <ul>
              <li class="active"><a data-toggle="tab" href="#about">About Event</a></li>
              <!-- <li><a href="#"><i class="fa fa-plus"></i> Join Event</a></li> -->
              <!-- <li><a href="https://clubmondainorg.slack.com/messages" target="_blank"> Chat</a></li> -->
              <?php if($full_details_event['user_type'] == 'T'){?>
              <!-- <li><a href="<?php echo base_url('Home/trainer-classes/').base64_encription($full_details_event['event_id']).'/'.base64_encription($full_details_event['user_id']); ?>"> Classes</a></li> -->
              <?php }?>
            </ul>
          </div>
          <div class="tab-content">
            <div id="about" class="tab-pane fade in active">
              <div class="page-slider">
                <ul class="bx-slider">
                  <li>
                    <div class="image">
                      <?php if($full_details_event['event_image']!=''){?>
                      <img class="slide-img" src="<?php echo base_url('upload/events/').$full_details_event['event_image'];?>">
                      <?php }
										   else{?>
                      <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                      <?php }?>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="page-share">
                <!-- JOIN EVENT -->
                <?php if(!empty($this->session->userdata('user_id'))){
									$current_status = favDetails(PIVOT_JOIN_EVENT,$full_details_event['event_id'],'event_id');
									if($current_status == 'Yes'){
										$text = 'You signed up !';
										}
									else{
										$text = 'Join This Event?';
										}
									?>
                <button style="margin-right:10px;" type="button" class="favourite join_<?php echo $full_details_event['event_id']?>" id="join_<?php echo $full_details_event['event_id']?>" onClick="return details_join_event(this.id,'<?php echo $_SESSION['user_details'][0]['first_name']; ?>','<?php echo $_SESSION['user_details'][0]['last_name']; ?>','<?php echo $_SESSION['user_details'][0]['user_image']; ?>','<?php echo $_SESSION['user_details'][0]['company_name']; ?>')"><?php echo $text; ?></button>
                <?php }
								else{?>
                <button style="margin-right:10px;" type="button" href="#no-login-popup" data-toggle="modal"> Join This Event? </button>
                <?php }?>
                <!-- FAVOURITE EVENT -->
                <?php if(!empty($this->session->userdata('user_id'))){
									$current_status = favDetails(PIVOT_FEB_EVENT,$full_details_event['event_id'],'event_id');
									if($current_status == 'Yes'){
										$text = '<i class="fa fa-heart"></i> Remove Favourite';
										}
									else{
										$text = '<i class="fa fa-heart-o"></i> Add To Favourite';
										}
									?>
                <button style="margin-right:10px;" type="button" class="favourite" id="fev_<?php echo $full_details_event['event_id']?>" onClick="return details_favourite_event(this.id)"><?php echo $text; ?></button>
                <?php }
								else{?>
                <button type="button" href="#no-login-popup" data-toggle="modal"> <i class="fa fa-heart-o"></i> Add To Favourite </button>
                <?php }?>
                <ul class="social">
                  <li><a href="javascript:void(0)" onclick="shareFb('<?php echo base_url('Home/event-details/').base64_encription($full_details_event['event_id']);?>');"><i class="fa fa-facebook"></i></a></li>
                  <li><a target="_bank" href="https://twitter.com/intent/tweet?text=<?php echo base_url('Home/event-details/'.base64_encription($full_details_event['event_id']));?>"><i class="fa fa-twitter"></i></a></li>
                  <li><a target="_blank" href="https://www.linkedin.com/cws/share?url=<?php echo base_url('Home/event-details/'.base64_encription($full_details_event['event_id']));?>"><i class="fa fa-linkedin"></i></a></li>
                </ul>
              </div>
              <div class="page-details">
                <div class="owner-det">
                  <div class="image">
                    <?php if($full_details_event['event_user_image']!=''){?>
                    <img src="<?php echo base_url('upload/profile/').$full_details_event['event_user_image'];?>">
                    <?php }
									  else{?>
                    <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                    <?php } ?>
                  </div>
                  <p>
                    <?php
                    if($full_details_event['user_id'] != 1){
                    $text = base_url('Home/profile-view/').base64_encription($full_details_event['user_id']);
                    }else{
                    $text  = 'javascript:void(0)';
                    }
                     ?>
                    <a href="<?php echo $text;?>">
                    <?php if($full_details_event['event_company_name']!='') echo $full_details_event['event_company_name']; if($full_details_event['event_user_details']!='') echo $full_details_event['event_user_details'];?>
                    </a>

                    <?php echo 'Event @'.$full_details_event['event_city'].'&nbsp,&nbsp;'.$full_details_event['event_country']; ?>
                    <br>
                     <br>
                    <a href="<?php echo $full_details_event['event_website_url']; ?>" target="_blank">Go To Website</a>
                  </p>
                </div>
                <h3>Description</h3>
                <p><?php echo $full_details_event['event_description'];?></p>
              </div>

              <div class="page-details">
<h3>Category</h3>
<div class="content">
<p><?php echo show_category_name($details_event[0]['event_id']);?></p>
</div>
</div>

              <div class="page-details">
                <h3>Join this event just like</h3>
                <div class="join-events">
                  <ul class="member-scroller">
                    <?php foreach($joined_users as $selected_users){?>
                    <li> <a href="<?php echo base_url('Home/profile-view/').base64_encription($selected_users['user_id']);?>">
                      <div class="single">
                        <div class="image">
                          <?php if(!empty($selected_users['user_image'])){?>
                          <img src="<?php echo base_url('upload/profile/').$selected_users['user_image']?>">
                          <?php }
                    else{?>
                          <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                          <?php } ?>
                        </div>
                        <?php if(!empty($selected_users['first_name'])){?>
                        <p> <?php echo $selected_users['first_name'];?> </p>
                        <p> <?php echo $selected_users['last_name'];?></p>
                        <?php }
                        else{?>
                        <p> <?php echo $selected_users['company_person'];?> </p>
                        <?php }?>
                      </div>
                      </a> </li>
                    <?php }?>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="events-button">
                  <!-- JOIN EVENT -->
                  <?php if(!empty($this->session->userdata('user_id'))){
                  $current_status = favDetails(PIVOT_JOIN_EVENT,$full_details_event['event_id'],'event_id');
                  if($current_status == 'Yes'){
                    $text = 'You signed up !';
                    }
                  else{
                    $text = 'Join This Event?';
                    }?>
                  <a id="join_<?php echo $full_details_event['event_id']?>" onClick="return details_join_event(this.id,'<?php echo $_SESSION['user_details'][0]['first_name']; ?>','<?php echo $_SESSION['user_details'][0]['last_name']; ?>','<?php echo $_SESSION['user_details'][0]['user_image']; ?>','<?php echo $_SESSION['user_details'][0]['company_name']; ?>')" class="join_<?php echo $full_details_event['event_id']?>"><?php echo $text; ?></a>
                  <?php }
                else{?>
                  <a href="#no-login-popup" data-toggle="modal"> Join This Event? </a>
                  <?php }?>
                </div>
              </div>

              <div class="page-details">
                <div class="store-location">
                  <div id="map" class="map"></div>
                  <?php
if(!empty($full_details_event['event_latitude']) and !empty($full_details_event['event_longitute'])){
 $la = $full_details_event['event_latitude']; $lo = $full_details_event['event_longitute'];
 }?>
                  <!-- Get Value For Longitude and Latitude Address  -->
<script>
var map;
var marker;
//Map Location For Address
function initMap() {
	var image =
{
		url: '<?php echo base_url('assets/web/icon/map-marker.png');?>',
		scaledSize: new google.maps.Size(42,42)
};
	var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;

	map = new google.maps.Map(document.getElementById('map'), {
		mapTypeControl: false,
		center: {lat: <?php echo $la;?>, lng:  <?php echo $lo;?>},
		zoom:10
	});

	directionsDisplay.setMap(map);
	var myLatLng = new google.maps.LatLng(<?php echo $la; ?>, <?php echo $lo; ?>);
	marker = new google.maps.Marker({
		position: myLatLng,
		map: map,
		icon: image,
		title: 'Clubmondain : - <?php echo $full_details_event['event_adress'];?>',
	});
	var infowindow = new google.maps.InfoWindow();
	var content = "<b><?php echo $full_details_event['event_name']; ?></b><br><p><i class='fa fa-map-marker'></i>  <?php echo $full_details_event['event_adress']; ?><br><i class='fa fa-map-marker'></i> <?php echo $full_details_event['event_city']; ?> , <?php echo $full_details_event['event_country']; ?></p>";

	google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){
		return function() {
			infowindow.setContent(content);
			infowindow.open(map,marker);
		};
	})(marker,content,infowindow));

	new AutocompleteDirectionsHandler(map);

	setTimeout(function(){
		$('#destination-input').click();
	}, 500);

}//End initMap

	  // Sets the map on all markers in the array.
      function setMapOnAll(map) {
        marker.setMap(map);
      }

      // Removes the markers from the map, but keeps them in the array.
      function clearMarkers() {
        setMapOnAll(null);
      }
//////////// New Map Detected ///////////////////////////////////
      function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'WALKING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        var modeSelector = document.getElementById('mode-selector');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);
        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});

        this.setupClickListener($("select#transit-type option:selected").val());

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
      }
      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
      AutocompleteDirectionsHandler.prototype.setupClickListener = function(mode) {
        var radioButton = document.getElementById('transit-type');
        var me = this;
		$("#transit-type").change(function(){
			me.travelMode = $("select#transit-type option:selected").val();
          	me.route();
		});
      };

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.place_id) {
			alert_message('Please select an option from the dropdown list.','warning','btn-warning');
            return;
          }
          if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
          } else {
            me.destinationPlaceId = place.place_id;
          }
          me.route();
        });
      };
      AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId) {
          return;
        }

        var me = this;
		var _dest = new google.maps.LatLng(<?php echo $la; ?>, <?php echo $lo; ?>);
		clearMarkers();
        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: _dest /*{'placeId': this.destinationPlaceId}*/,
          travelMode: this.travelMode
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
          } else {
			alert_message('Directions request failed due to ' + status,'warning','btn-warning');
          }
        });
      };

</script>
                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACjdpaolaUHA-rjK_YEvP8UdQi9Z3YIwk&libraries=places&callback=initMap"
async defer></script>
                  <div class="map-form">
                    <div class="text">
                      <p>Get Direction</p>
                      <i class="fa fa-question"></i> </div>
                    <div class="page-search">
                      <input id="origin-input" class="controls" placeholder="Enter Search Location Name" type="text">
                    </div>
                    <div id="mode-selector" class="select">
                      <select id="transit-type">
                        <option value="WALKING">Walking</option>
                        <option value="TRANSIT">Transit</option>
                        <option value="DRIVING">Driving</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <!-- <div class="page-details">
                <h3>Chat with other members</h3>
                <div class="join-events">
                  <ul class="member-scroller2" id="ax">
                    <?php foreach($joined_users as $selected_users){?>
                    <li> <a href="<?php echo base_url('Home/profile-view/').base64_encription($selected_users['user_id']);?>">
                      <div class="single">
                        <div class="image">
                          <?php if(!empty($selected_users['user_image'])){?>
                          <img src="<?php echo base_url('upload/profile/').$selected_users['user_image']?>">
                          <?php }
						 else{?>
                          <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                          <?php } ?>
                        </div>
                        <?php if(!empty($selected_users['first_name'])){?>
                        <p> <?php echo $selected_users['first_name'];?> </p>
                        <p> <?php echo $selected_users['last_name'];?></p>
                        <?php }
						else{?>
                        <p> <?php echo $selected_users['company_person'];?> </p>
                        <?php }?>
                      </div>
                      </a> </li>
                    <?php }?>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="events-button Join-btn"> <a href="#">CHAT</a> </div>
              </div> -->
            </div>
            <div id="reviews" class="tab-pane fade"> </div>
            <div id="events" class="tab-pane fade"> </div>
          </div>
        </div>
      </div>
      <?php }}//END EVENT?>
      <div class="sidebar">
        <aside class="single-sidebar">
          <h3>Same Category Events</h3>
          <div class="content">
            <div class="sidebar-items s-cont">
              <?php if($categoryEvent > 0){
							for($i=0;$i< count($categoryEvent);$i++){?>
              <a href="<?php echo base_url('Home/event-details/').base64_encription($categoryEvent[$i]['event_id']);?>" class="single s-sec">
              <div class="image">
                <?php if($categoryEvent[$i]['event_banner'] != ''){?>
                <img src="<?php echo base_url('upload/events/').$categoryEvent[$i]['event_banner'];?>">
                <?php }
								 else{?>
                <img src="<?php echo base_url('upload/no_image/').'no-photo-available.jpg';?>">
                <?php }?>
              </div>
              <p> <?php echo substr(ucwords($categoryEvent[$i]['event_name']),0,28);?><br>
                <small><?php echo date('dS M Y',strtotime($categoryEvent[$i]['event_date_from']));?></small> </p>
              </a>
              <?php }}
							else{
							?>
              <h2>No Events Are Available</h2>
              <?php }?>
            </div>
          </div>
        </aside>
        <aside class="single-sidebar">
          <h3>News</h3>
          <div class="content">
            <div class="sidebar-items s-cont">
              <?php for($i=0;$i< count($recent_news);$i++){?>
              <a href=" <?php echo base_url('Home/newsDetails/'.$recent_news[$i]['blog_news_id']); ?> " class="single s-sec">
              <div class="image">
                <?php if($recent_news[$i]['blog_news_image'] != ''){?>
                <img src="<?php echo base_url('upload/news_blog/').$recent_news[$i]['blog_news_image'];?>">
                <?php }
								 else{?>
                <img src="<?php echo base_url('upload/no_image/').'no-photo-available.jpg';?>">
                <?php }?>
              </div>
              <p> <?php echo substr(ucwords($recent_news[$i]['blog_news_title']),0,28);?><br>
                <small><?php echo date('dS M Y',strtotime($recent_news[$i]['update_date']));?></small> </p>
              </a>
              <?php }?>

              <!-- <a href="#" class="single s-sec">
                                <div class="image">
                                    <img src="<?php //echo base_url('assets/web');?>/images/demo15.jpg">
                                </div>
                                <p>
                                    London Cake shop
                                    <small> 6th March ,2016</small>
                                </p>
                            </a>-->

            </div>
          </div>
        </aside>
        <aside class="single-sidebar">
          <h3>Banner</h3>
          <div class="content"> <a class="side-banner"> <img src="<?php echo base_url('assets/web');?>/images/travel.jpg"> </a> </div>
        </aside>
      </div>
    </div>
  </div>
</main>
<script type="text/javascript">
function shareFb(Url_data)
{
  window.open('http://www.facebook.com/sharer/sharer.php?u='+Url_data+'', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');
}
</script>
<?php include("include/footer.php");?>
</body>
</html>
