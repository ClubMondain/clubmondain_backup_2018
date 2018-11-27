<?php
$this->load->view('include/head');
?>
<body>
<?php
$this->load->view('include/header');
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
<h2>My News</h2>
<a href="<?php echo base_url('Main/add-news-view');?>">ADD NEWS</a>
</div>
<div class="dashboard-events">
<?php
if(!empty($all_data_event[0]['news_cate_id_FK']))
{
$get_cate_id_exp = explode(',',$all_data_event[0]['news_cate_id_FK']);
}
if(isset($all_data_event) > 0) {
if(count($all_data_event)){
for($i = 0; $i< count($all_data_event); $i++ )
{
if(!empty($all_data_event[$i]['update_date'])){
$get_date_exp = explode('-',$all_data_event[$i]['update_date']);
}
?>
<div class="single">
<div class="row">
<div class="col-md-6">
<a href="<?php echo base_url('Main/blog_details/'.base64_encription($all_data_event[$i]['blog_news_id']));?>">
<div class="image">
<?php if(!empty($all_data_event[$i]['blog_news_image'])) {?>
<img src="<?php echo base_url().'upload/news_blog/'.$all_data_event[$i]['blog_news_image'];?>">
<?php }else { ?>
<img src="<?php echo base_url().'upload/no_image/'.'no-photo-available.jpg';?>">
<?php } ?>
</div>
</a>
</div>
<div class="col-md-6">
<div class="content">
<h3>
<a href="<?php echo base_url('Main/blog_details/'.base64_encription($all_data_event[$i]['blog_news_id']));?>">
<?php echo stripslashes($all_data_event[$i]['blog_news_title']);?>
</a>
<?php
$number = $get_date_exp[2];
$ends = array('th','st','nd','rd','th','th','th','th','th','th');
if (($number %100) >= 11 && ($number%100) <= 13)
$ends_suf = $number. 'th';
else
$ends_suf = $number. $ends[$number % 10];
?>
<span><?php echo $ends_suf .' '.$month_name = date('F', mktime(0, 0, 0,$get_date_exp[1] , 17)); ?>
</span>
</h3>
<h5><?php echo $all_data_event[$i]['city_name'];?> ,
<?php echo $all_data_event[$i]['country_name'];?><br>
<p>
<span><?php echo ucwords(strip_tags(substr($all_data_event[$i]['blog_news_description'],0,220)));?></span>
</p>
<ul class="business-links">
<?php
if($all_data_event[$i]['blog_news_type'] == 'News'){
?>
<li>
<a class="bg-red" href="javascript:void(0);" onClick="return delete_data('<?php echo base_url('Main/delete_news/'.base64_encription($all_data_event[$i]['blog_news_id']));?>')">Delete</a>
</li>
<li>
<a href="<?php echo base_url('Main/edit-news-view/'.base64_encription($all_data_event[$i]['blog_news_id']));?>">Edit</a></li>
<?php
}else{
?>
<li>
<a class="bg-red" href="javascript:void(0);" onClick="return delete_data('<?php echo base_url('Main/delete_blog/'.base64_encription($all_data_event[$i]['blog_news_id']));?>')">Delete</a>
</li>
<li>
<a href="<?php echo base_url('Main/edit_blog/'.base64_encription($all_data_event[$i]['blog_news_id']));?>">Edit</a>
</li>
<li>
<a href="<?php echo base_url('Main/blog_details/'.base64_encription($all_data_event[$i]['blog_news_id']));?>" class="bg-black">View</a>
</li>
<?php
}
?>
</ul>
</div>
</div>
</div>
</div>
<?php
}
}
}
?>
</div>
</div>
</div>
<?php $this->load->view('include/right-sidebar');?>
</div>
</main>
<?php
$this->load->view('include/footer');
?>
</body>
</html>
