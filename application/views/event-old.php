<?php include('include/head.php');?>
<body>
   <?php include('include/header.php'); ?>
   <main>
      <section class="city-inner">
         <div class="container-fluid max-1310">
            <div class="row s-cont">
               <div class="col-lg-4 col-sm-5 map-cont s-sec">
                  <div class="single-city-map" id="single-city-map">
                     <div id="map" style="width: 100%; height: 100%;"></div>
                  </div>
               </div>
               <div class="col-lg-8 col-sm-7 s-sec">
                  <div class="city-container">
                     <div class="city-search" id="city-search">
                        <div class="select-sec">
                           <div class="select">
                              <select name="category_event" id="category_event_id" onChange="category_event_search()">
                                 <option value="<?php echo base64_encription(0);?>">Select Categories</option>
                                 <?php
                                    if(count($allCategory) > 0){
                                    foreach($allCategory as $allCat){
                                    ?>
                                 <option value="<?php echo base64_encription($allCat['category_id']);?>" <?php if(isset($category_id) and $category_id != ''){ if($category_id == $allCat['category_id']){?> selected <?php } } ?>><?php echo $allCat['category_name']?></option>
                                 <?php
                                    }
                                    }
                                    ?>
                              </select>
                           </div>
                           <div class="select">
                              <select name="city_event" id="city_event_id" onChange="category_event_search()">
                                 <option value="0">Select City</option>
                                 <?php
                                    if(count($allCity) > 0){
                                    foreach($allCity as $Citydetails){
                                    ?>
                                 <option value="<?php echo $Citydetails['city_id'];?>"><?php echo $Citydetails['city_name']?></option>
                                 <?php
                                    }
                                    }
                                    ?>
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
                              <?php if($_SESSION['user_membership_type'] != 'FREE'){ ?>
                              <a href="<?php echo base_url('Main/add_event');?>" data-toggle="modal"> + Add Event</a>
                              <?php }else{ ?>
                              <a href="#" onclick="alert('Sorry !! this feature is for paid member only')" data-toggle="modal"> + Add Event</a>
                              <?php }}else{?>
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
                        <div class="row" id="search_event_list" >
                           <?php
                              if(count($allEvent) > 0){
                              foreach($allEvent as $event){
                              ?>
                           <div class="col-lg-4 col-sm-6 col-cont eventTS" data-date-id="<?php echo $event['create_date']; ?>" data-city-id="<?php echo $event['city_id']; ?>" data-id="<?php echo strtolower($event['event_name']);  echo strtolower($event['event_city']); echo specific_category($event['event_id']);?>">
                              <div class="single">
                                 <div class="city-image">
                                    <div class="image">
                                       <?php if(isset($event['event_banner']) && !empty($event['event_banner'])){?>
                                       <img src="<?php echo base_url('upload/events/').$event['event_banner'];?>" alt="">
                                       <?php
                                          }else{
                                          ?>
                                       <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                                       <?php }?>
                                    </div>
                                    <h4><?php echo ucwords($event['event_name']);?></h4>
                                    <p><?php echo ucwords(stripslashes(strip_tags($event['event_description'])));?></p>
                                    <div class="overlay">
                                       <ul>
                                          <li><a href="<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>">Detail</a></li>
                                          <li><a href="<?php echo base_url('Home/news/').base64_encription($event['city_id']);?>">News</a></li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="city-cntnt">
                                    <div class="cntnt">
                                       <p><?php echo $event['event_city'];?></p>
                                       <p><?php echo date('dS M Y',strtotime($event['event_date_from']));?></p>
                                    </div>
                                    <ul class="social">
                                       <li><a target="_bank" href="https://www.linkedin.com/cws/share?url=<?php echo base_url('Home/event-details/'.base64_encription($event['event_id']));?>"><i class="fa fa-linkedin"></i></a></li>
                                       <li><a href="javascript:void(0)" onclick="shareFb('<?php echo base_url('Home/event-details/').base64_encription($event['event_id']);?>');"><i class="fa fa-facebook"></i></a></li>
                                       <li><a target="_bank" href="https://twitter.com/intent/tweet?text=<?php echo base_url('Home/event-details/'.base64_encription($event['event_id']));?>"><i class="fa fa-twitter"></i></a></li>
                                       <?php if(!empty($this->session->userdata('user_login'))){
                                          $is_presnt = favDetails(PIVOT_FEB_EVENT,$event['event_id'],'event_id');
                                          if($is_presnt == 'Yes'){
                                          $text = '<i class="fa fa-heart"></i>';
                                          }else{
                                          $text = '<i class="fa fa-heart-o"></i>';
                                          }?>
                                       <li><a id="fav_<?php echo $event['event_id']?>"  onClick="return favourite_event(this.id);"><?php echo $text;?></a></li>
                                       <?php }else { ?>
                                       <li> <a href="#no-login-popup" data-toggle="modal"><i class="fa fa-heart-o"></i></a> </li>
                                       <?php }?>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <?php
                              }
                              }
                              if(count($allBusiness) > 0){
                              foreach($allBusiness as $business){
                              ?>
                           <div class="col-lg-4 col-sm-6 col-cont eventTS" data-date-id="<?php echo $business['create_date']; ?>" data-city-id="<?php echo $business['city_id']; ?>" data-id="<?php echo strtolower($business['business_name']); echo strtolower($business['business_city']);  ?>">
                              <div class="single">
                                 <div class="city-image">
                                    <div class="image">
                                       <?php if(isset($business['business_image']) && !empty($business['business_image'])){?>
                                       <img src="<?php echo base_url('upload/business/').$business['business_image'];?>" alt="">
                                       <?php
                                          }else{
                                          ?>
                                       <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                                       <?php }?>
                                    </div>
                                    <h4><?php echo ucwords(stripslashes(strip_tags($business['business_name'])));?></h4>
                                    <p><?php echo ucwords(stripslashes(strip_tags($business['business_description'])));?></p>
                                    <div class="overlay">
                                       <ul>
                                          <li><a href="<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>">Detail</a></li>
                                          <li><a href="<?php echo base_url('Home/news/').base64_encription($business['city_id']);?>">News</a></li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="city-cntnt">
                                    <div class="cntnt">
                                       <p><?php echo ucwords(stripslashes(strip_tags($business['business_city'])));?></p>
                                       <p><?php echo 'Space';?></p>
                                    </div>
                                    <ul class="social">
                                       <li><a target="_bank" href="https://www.linkedin.com/cws/share?url=<?php echo base_url('Home/store-details/'.base64_encription($business['business_id']));?>"><i class="fa fa-linkedin"></i></a></li>
                                       <li><a href="javascript:void(0)" onclick="shareFb('<?php echo base_url('Home/store-details/').base64_encription($business['business_id']);?>');"><i class="fa fa-facebook"></i></a></li>
                                       <li><a target="_bank" href="https://twitter.com/intent/tweet?text=<?php echo base_url('Home/store-details/'.base64_encription($business['business_id']));?>"><i class="fa fa-twitter"></i></a></li>
                                       <?php if(!empty($this->session->userdata('user_login'))){
                                          $is_presnt = favDetails(PIVOT_FEB_STORE,$business['business_id'],'business_id');
                                          if($is_presnt == 'Yes'){
                                          $text = '<i class="fa fa-heart"></i>';
                                          }else{
                                          $text = '<i class="fa fa-heart-o"></i>';
                                          }
                                          ?>
                                       <li><a id="favv_<?php echo $business['business_id']?>"  onClick="return favourite_store(this.id);" alt="Favourite"><?php echo $text;?></a></li>
                                       <?php
                                          }else {
                                          ?>
                                       <li> <a href="#no-login-popup" data-toggle="modal" alt="Favourite"><i class="fa fa-heart-o"></i></a> </li>
                                       <?php
                                          }
                                          ?>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <?php
                              }
                              }
                              ?>
                           <!--BUSINESS LOOP-->
                        </div>
                     </div>
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
              <!---ADD BY SUBHASIS FOR INVITE SPACE PUBLIC OR PRIVATE START--->       
                     <?php
                     if(!empty($all_invitespace)){
					 	?>
					
                     <div class="city-cont" id="city-container">
                        <div class="row" id="search_event_list" >
                           <?php
                              if(count($all_invitespace) > 0){
                              foreach($all_invitespace as $val){
                              ?>
                           <div class="col-lg-4 col-sm-6 col-cont eventTS" data-date-id="" data-city-id="" data-id="">
                              <div class="single">
                                 <div class="city-image">
                                    <div class="image">
                                       <?php if(isset($val['business_image']) && !empty($val['business_image'])){?>
                                       <img src="<?php echo base_url('upload/business/').$val['business_image'];?>" alt="">
                                       <?php
                                          }else{
                                          ?>
                                       <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
                                       <?php }?>
                                    </div>
                                    <h4><?php echo ucwords($val['business_name']);?></h4>
                                    <p><?php echo ucwords(stripslashes(strip_tags($val['business_description'])));?></p>
                                    <div class="overlay">
                                       <ul>
                                          <li><a href="<?php echo base_url('Home/invite_space_details/').base64_encription($val['business_id']);?>">Detail</a></li>
                                          <li><a href="<?php /*echo base_url('Home/news/').base64_encription($event['city_id']);*/?>">News</a></li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="city-cntnt">
                                    <div class="cntnt">
                                       <p><?php echo getCityname($val['city_id']);?></p>
                                       <p><?php echo date('dS M Y',strtotime($val['create_date']));?></p>
                                    </div>
                                    <ul class="social">
                                       <li><i class="fa fa-linkedin"></i></li>
                                       <li><i class="fa fa-facebook"></i></li>
                                       <li><i class="fa fa-twitter"></i></li>
                                       
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <?php
                              }
                              }
                              ?>
                        </div>
                     </div>
                      	<?php
					 }
                      ?>
                     
         <!---ADD BY SUBHASIS FOR INVITE SPACE PUBLIC OR PRIVATE END--->         
                     
                  </div>
               </div>
            </div>
         </div>
      </section>
      <div class="clearfix"></div>
   </main>
   <?php include("include/footer.php");?>
   <style type="text/css">
      .ui-datepicker-calendar{ display:none }
   </style>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACjdpaolaUHA-rjK_YEvP8UdQi9Z3YIwk" type="text/javascript"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
   <script type="text/javascript">
      function shareFb(Url_data)
      {
        window.open('http://www.facebook.com/sharer/sharer.php?u='+Url_data+'', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');
      }
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
   </script>
   <script type="text/javascript">
      $(function(){
      $('select').select2();
      })
      $( function() {
      $('.ui-datepicker-calendar').css("display","none");
      $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: '2015:<?php echo date('Y')+3; ?>',
      onChangeMonthYear: function (year, month, inst) {
      $( ".eventTS" ).each(function(index, element) {
      if(year == '' && month == null){
      $(this).show();
      }else{
      var get_val = $(element).attr("data-date-id");
      var spliteDate = get_val.split('-');
      if(spliteDate[0] == year && spliteDate[1]  == month){
      $(this).show();
      }else{
      $(this).hide();
      }
      }
      });
      },
      });
      } );
   </script>
   <script type="text/javascript">
      var mapOptions = {
      zoom: 2,
      center: new google.maps.LatLng(32.815331,-42.9740649)
      };
      map = new google.maps.Map(document.getElementById('map'),mapOptions);
      var pinz = [
      <?php
         if(count($allEvent) > 0)
         {
         foreach($allEvent as $storeDetails)
         {
         if(!empty($storeDetails['event_latitude']) and !empty($storeDetails['event_longitute']))
         {
         $la = $storeDetails['event_latitude'];
         $lo = $storeDetails['event_longitute'];
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
      url: "<?php echo base_url('assets/web/icon/map-marker.png');?>",
      scaledSize: new google.maps.Size(42,42)
      };
      <?php
         $data_string = '';
         if(count($allEvent) > 0){
         foreach($allEvent as $storeDetails){
         $get_name = strip_tags($storeDetails['event_name']);
         $get_name = htmlentities($get_name);
         $data_string  = "<div>";
         $data_string .= "<h5><b>ClubMondain - ".$storeDetails['event_name']."</b></h5>";
         $data_string .= "<br>";
         $data_string .= "<p>Address: ".strip_tags($storeDetails['event_adress'])."</p>";
         $data_string .= "<p>City: ".$storeDetails['event_city']."</p>";
         $data_string .= "<p>Country: ".$storeDetails['event_country']."</p>";
         $data_string .= "<a href='".$storeDetails['event_website_url']."' target='blank'>".$storeDetails['event_website_url']."</a>";
         $data_string .= "</div>";
         ?>
      contentString.push("<?php echo $data_string; ?>");
      <?php
         }
         }
         ?>
      for(var i = 0; i < pinz.length; i++)
      {
      var infowindow = new google.maps.InfoWindow();
      var myLatLng = new google.maps.LatLng(pinz[i].location.lat, pinz[i].location.lon);
      var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      label: '',
      title: pinz[i].title,
      icon: image,
      });
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
      function get_dynamic_lat_long(city_id)
      {
      $.ajax({
      url: "http://www.clubmondain.com/Home/gcna",
      dataType: 'HTML',
      type: 'POST',
      data:{
      city_id:city_id
      },
      success: function(responseData){
      $.getJSON("https://maps.googleapis.com/maps/api/geocode/json?address="+encodeURIComponent(responseData), function(val){
      if(responseData == ''){
      var uluru = {lat: 32.815331, lng: -42.9740649};
      }else{
      var location = val.results[0].geometry.location;
      var uluru = {lat: location.lat, lng: location.lng};
      }	
      var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 2,
      center: uluru
      });
      var marker = new google.maps.Marker({
      position: uluru,
      map: map
      });
      })
      }
      });
      }
   </script>
</body>
</html>