<?php
if(!empty($all_events[0]['category_id']))
{
$get_cate_id_exp = explode(',',$all_events[0]['category_id']);
}
$this->load->view('include/head');
?>
<body>
<?php
$this->load->view('include/header');?>
<main class="dashboard" id="dashboard-main">
<?php $this->load->view('include/left-sidebar');?>
<div class="dashboard-main">
<div class="left">
<div class="dashboard-toggle" id="dashboard-toggle">
<button><i class="fa fa-bars"></i></button>
</div>
<div class="single-content">
<div class="dashboard-head">
<h2>News Details</h2>
</div>
<div class="business-details">
<div class="image">
<?php if(!empty($all_blog[0]['blog_news_image'])) {?>
<img src="<?php echo base_url().'upload/news_blog/'.$all_blog[0]['blog_news_image'];?>">
<?php }else{ ?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>">
<?php }?>
</div>
<div class="content">
<h3> <?php echo ucwords($all_blog[0]['blog_news_title']);?></h3>
<div class="page-share">
<button type="button" onClick="location.href='<?php echo base_url('Main/edit-news-view/'.base64_encription($all_blog[0]['blog_news_id']));?>'">Edit This News</button>
</div>
<?php if(!empty($all_blog[0]['category_name'])){?>
<p><strong>Category </strong>: <?php foreach($catdata as $catdata){
if(in_array($catdata['category_id'],$get_cate_id_exp)){
echo '&nbsp;'.$catdata['category_name'].'&nbsp;,&nbsp;';
}
}?></p><?php }?>
<p><strong>Decription </strong>: <?php echo ucwords($all_blog[0]['blog_news_description']);?></p><br>
<div class="inner">
<p><strong>News Date  </strong>: <?php echo $all_blog[0]['update_date'];?></p>
<p><strong>Country </strong>: <?php foreach($country as $country){
if($all_blog[0]['country_id'] == $country['country_id']){
echo $country['country_name'];}}?></p>
<p><strong>City </strong>: <?php foreach($city as $city){
if($all_blog[0]['city_id'] == $city['city_id']){
echo $city['city_name'];}}?></p>
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
