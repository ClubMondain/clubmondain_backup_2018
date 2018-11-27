<?php 
if(!empty($all_events[0]['category_id'])){
	$get_cate_id_exp = explode(',',$all_events[0]['category_id']);
	}	
$this->load->view('include/head');
?>
<body>
<?php 
$this->load->view('include/header');?>
<?php  /*echo '<pre>' ;
//print_r($city);
print_r($galerry_data);
echo '</pre>';*/
//echo $_SESSION['user_details'][0]['id'];
?>
<main class="dashboard" id="dashboard-main">
	<?php $this->load->view('include/left-sidebar');?>
    <div class="dashboard-main">
        <div class="left">
            <div class="dashboard-toggle" id="dashboard-toggle">
                <button><i class="fa fa-bars"></i></button>
            </div>
            <div class="single-content">
                <div class="dashboard-head">
                    <h2>Product Details</h2>
                </div>
                <div class="business-details">
                    <div class="image">
                    <?php if(!empty($all_data[0]['product_images_name'])) {?>
                    <img src="<?php echo base_url().'upload/product/'.$all_data[0]['product_images_name'];?>">
                    <?php }
                    else{ ?>
                    <img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>">
                    <?php }?>
                        
                    </div>
                    <div class="content">
                        <h3> <?php echo ucwords($all_data[0]['product_name']);?></h3>
                        <div class="page-share">
                            <button type="button" onClick="location.href='<?php echo base_url('Shop/edit_product/'.base64_encription($all_data[0]['product_id']));?>'">Edit This Product</button>
                            <button type="button" onClick="show_event();">View Gallery</button>
                        </div>
                    
                         <?php /* Galery Images*/ ?>
							 <div class="gallery_images" id="details_event" style="display:none">
								<!-- FOR CATEGORY SHOW ONLY-->
								<?php if(!empty($galerry_data)){
								foreach($galerry_data as $galerry_data){?>
								<div class="meet-peoples" style="float:left;">
                                    <div class="single-meet">
                                   
                                        <div class="image">
                                         <img src="<?php echo base_url().'upload/product/'. $galerry_data['product_images_name']?>">
                                     	</div>
                                    
                                    <div class="gallery_button">  
                                        <a class="bg-red" href="javascript:void(0);" onClick="return delete_data('<?php echo base_url('Shop/delete_gallery/'.base64_encription($galerry_data['product_images_id']));?>')" style="background:#F00">Delete</a>
                                         </div>
                                    </div>
                               </div>
								<?php }
								} ?> 
						    </div>
                            <div class="clearfix"></div>
					<?php ?>
                    <div class="top-data">
                        <p><strong>Decription </strong>: <?php echo ucwords($all_data[0]['product_description']);?></p><br>
                        <div class="inner">
                            <p><strong>Creation Date  </strong>: <?php echo $all_data[0]['create_date'];?></p>
                            <p><strong>Category </strong>: <?php foreach($catdata as $catdata){
                        if($catdata['category_id'] == $pivot_category[0]['category_id']){
                        echo '&nbsp;'.$catdata['category_name'];
                        }?><?php }?></p>
                            <p><strong>Sub Category </strong>: <?php foreach($subcatdata as $subcatdata){
                            if($subcatdata['category_id'] == $pivot_category[0]['subcategory_id']){
                                echo $subcatdata['category_name'];}}?></p>
                            <p><strong>Product Price </strong>: $<?php echo $all_data[0]['product_price'];?></p>
                            <p><strong>Product Quantity </strong>: <?php echo $all_data[0]['product_qty'];?></p>   
                        </div>
                      </div>  
                    </div>
                </div>
                
            </div>
                        
        </div>
        
        <?php $this->load->view('include/right-sidebar');?>            
    </div>
</main>
    
<?php $this->load->view('include/footer');?>
</body>
</html>

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