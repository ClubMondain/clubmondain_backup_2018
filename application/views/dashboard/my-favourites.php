<?php $this->load->view('include/head');?>
<body>
<?php $this->load->view('include/header');?>
<main class="dashboard" id="dashboard-main">
  <?php $this->load->view('include/left-sidebar');?>
  <div class="dashboard-main">
    <div class="left">
      <div class="dashboard-toggle" id="dashboard-toggle">
        <button><i class="fa fa-bars"></i></button>
      </div>
      <div class="single-content">
        <div class="dashboard-head">
          <h2> My <em>Favorite</em></h2>
          <a href="<?php echo base_url('Main/index')?>">Dashboards</a> </div>
        <div class="dashboard-events">
        </div>
      </div>
      <div class="single-content">
       <?php if(isset($fav_event) && !empty($fav_event)) { ?>
        <div class="dashboard-head">
        	<h2>My Favorite <em>Events</em></h2>
        </div>
        <div class="all-cities">
       		<div class="favourite-city-slide">
        <?php if(isset($fav_event)) { ?>
          <ul id="favourite-event">
		  <?php foreach($fav_event as $all_events){ ?>
            <li>
              <div class="single">
                <div class="image">
                <?php if($all_events['event_banner']!=''){?> 
                <img src="<?php echo base_url().'upload/events/'.$all_events['event_banner'];?>">
                <?php }
				   else{?> 
					<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
				   <?php }?>
                   <div class="overlay">
                      <ul>
                        <li style="width:100%"><a id="fav_<?php echo $all_events['event_id'];?>" onclick="return favourite_event_remove(this.id);">Remove Favorite</a></li>
                      </ul>
                  </div>
                 </div>
                <a href="#"><?php echo ucwords($all_events['event_name']);?></a> </div>
            </li>
         <?php }} ?> 
          </ul>
          <div class="clearfix"></div>
        </div>
        </div>
         <?php } 
		  else{ ?>
       <div class="dashboard-head">
          <h2>No Favorite <em>Events List</em></h2>
       </div>   
       <?php }?>
        
      </div>
      
      <div class="single-content">
       <?php if(isset($fav_store) && !empty($fav_store)) { ?>
        <div class="dashboard-head">
        	<h2>My Favorite <em>Space</em></h2>
        </div>
        <div class="all-cities">
           <div class="favourite-city-slide">
        <?php if(isset($fav_store)) { ?>
          <ul id="favourite-store">
		  <?php foreach($fav_store as $fav_store){ ?>
            <li>
              <div class="single">
                <div class="image">
                <?php if($fav_store['business_image']!=''){?> 
                <img src="<?php echo base_url().'upload/business/'.$fav_store['business_image'];?>">
                <?php }
				   else{?> 
					<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
				   <?php }?>
                   <div class="overlay">
                      <ul>
                        <li style="width:100%"><a id="fav_<?php echo $fav_store['business_id'];?>" onclick="return favourite_store_remove(this.id);">Remove Favorite</a></li>
                      </ul>
                  </div>
                 </div>
                <a href="#"><?php echo ucwords($fav_store['business_name']);?></a> </div>
            </li>
         <?php }} ?> 
          </ul>
          <div class="clearfix"></div>
        </div>
        </div>
         <?php } 
		  else{ ?>
       <div class="dashboard-head">
          <h2>No Favorite <em>Space List</em></h2>
       </div>   
       <?php }?>
        
      </div>
      <!-- <div class="single-content">
       <?php if(isset($fav_city) && !empty($fav_city)) { ?>
        <div class="dashboard-head">
        	<h2>My Favorite <em>Cities</em></h2>
        </div>
        <div class="all-cities">
        <div class="favourite-city-slide">
        <?php if(isset($fav_city)) { ?>
          <ul id="favourite-city">
		  <?php foreach($fav_city as $fav_city){ ?>
            <li>
              <div class="single">
                <div class="image">
                <?php if($fav_city['city_image']!=''){?> 
                <img src="<?php echo base_url('upload/city/').$fav_city['city_image'];?>">
                <?php }
				   else{?> 
					<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
				   <?php }?>
                   <div class="overlay">
                      <ul>
                        <li style="width:100%"><a id="fav_<?php echo $fav_city['city_id'];?>" onclick="return favourite_city(this.id);">Remove Favorite</a></li>
                      </ul>
                  </div>
                 </div>
                <a href="#"><?php echo ucwords($fav_city['city_name']);?></a> </div>
            </li>
         <?php }} ?> 
          </ul>
          <div class="clearfix"></div>
        </div>
        </div>
         <?php } 
		  else{ ?>
       <div class="dashboard-head">
          <h2>No Favorite <em>Cities Created</em></h2>
       </div>   
       <?php }?>
        
      </div> -->
      
    </div>
    <?php $this->load->view('include/right-sidebar');?>
  </div>
</main>
<?php $this->load->view('include/footer');?>
</body>
</html>
<!--////////////////////////////////////////////// BIPLAB /////////////////////////////////////////////-->
<script>
function show_event() {
    var x = document.getElementById('details_event');
    if (x.style.display === 'none') {
        $("#details_event").show(500);;
    } else {
       $("#details_event").hide(500);;
    }
}
</script>