<?php include('include/head.php');?>
<body>
<?php include('include/header.php');?>
<?php
$GET_BANNER_PICTURE = get_banner(6);
?>
<main>
<section class="page-banner slide">
<ul class="cities-slider">
<?php
if(count($GET_BANNER_PICTURE) > 0){
foreach ($GET_BANNER_PICTURE as $val_banner) {
?>
<li>
<div class="image">
<img src="<?php echo base_url('upload/banner/'.$val_banner['banner_image']);?>" alt="">
</div>
</li>
<?php
}
}else{
?>
<li>
<div class="image">
<img src="<?php echo base_url('assets/web');?>/images/bg-6.jpg" alt="">
</div>
</li>
<?php
}
?>
</ul>
<div class="overlay"></div>
</section>
<section class="cities">
<div class="container">
<div class="cities-head">
<h3>News</h3>
<?php if(isset($_SESSION['user_login'])){ ?>
<?php if($_SESSION['user_membership_type'] != 'FREE'){ ?>
<a href="<?php echo base_url('Main/add-news-view');?>">ADD NEWS +</a>
<?php } ?>
<?php }else { ?>
<a href="#no-login-popup" data-toggle="modal">ADD NEWS +</a>
<?php }?>
</div>
<div class="all-cities cities-detail">
<div class="search-sec" style="float: none;">
<input type="text" placeholder="Search By News Category And Cities" onKeyUp="getSearch(this.value)">
<button><i class="fa fa-search"></i></button>
</div>
<div class="row s-cont">
<?php if(count($news_details)> 0)
{
for($i=0;$i<count($news_details);$i++)
{
$get_user_details = get_user_details($news_details[$i]['user_id']);
if($get_user_details['user_type'] == 'C')
{
$name = $get_user_details['company_name'];
}else{
$name = $get_user_details['first_name'].' '.$get_user_details['last_name'];
}
if(strlen($news_details [$i]['blog_news_title']) > 30){
$title = ucwords(stripslashes(substr($news_details [$i]['blog_news_title'],0,30))).'...';
}else{
$title = ucwords(stripslashes($news_details [$i]['blog_news_title']));
}
?>
<div class="col-lg-3 col-md-4 col-sm-6 newsTS" data-id="<?php echo strtolower($news_details[$i]['blog_news_city']);  echo strtolower($news_details[$i]['blog_news_title']); echo specific_category($news_details[$i]['blog_news_id']);?>">
<a href="<?php echo base_url('Home/newsDetails/'.$news_details[$i]['blog_news_id']); ?>">
<div class="single s-sec2">
<div class="image">
<?php if(isset($news_details[$i]['blog_news_image']) && $news_details[$i]['blog_news_image']!=''){?>
<img src="<?php echo base_url('upload/news_blog/').$news_details [$i]['blog_news_image'];?>">
<?php }else{?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
<?php }?>
</div>
<div class="content">
<h4><?php echo $title;?></h4>
<!-- <p> <?php echo ucwords($name);?>, <?php echo date('dS M , Y',strtotime($news_details[$i]['update_date']));?> </p> -->
<p><strong><?php echo date('dS M , Y',strtotime($news_details[$i]['update_date']));?></strong></p>
<ul class="social">
<?php if(!empty($this->session->userdata('user_login'))){
$is_presnt = favDetails('cmd_pivot_favourite_news',$news_details[$i]['blog_news_id'],'news_id');
if($is_presnt == 'Yes'){
$text = '<i class="fa fa-heart"></i>';
}else{
$text = '<i class="fa fa-heart-o"></i>';
}?>
<li><a id="news_<?php echo $news_details[$i]['blog_news_id']?>"  onClick="return favourite_news(this.id);">
  <?php echo $text;?></a></li>
<?php }else { ?>
<li> <a href="#no-login-popup" data-toggle="modal"><i class="fa fa-heart-o"></i></a> </li>
<?php }?>
<li>
<a target="_bank" href="https://www.linkedin.com/cws/share?url=<?php echo base_url('Home/newsDetails/'.$news_details[$i]['blog_news_id']);?>">
<i class="fa fa-linkedin"></i>
</a>
</li>
<li><a href="javascript:void();" onclick="shareFb('<?php echo base_url('Home/newsDetails/'.$news_details[$i]['blog_news_id']); ?>');" target="_blank">
<i class="fa fa-facebook"></i></a></li>
<li><a target="_bank" href="https://twitter.com/intent/tweet?text=<?php echo base_url('Home/newsDetails/'.$news_details[$i]['blog_news_id']); ?>"><i class="fa fa-twitter"></i></a></li>
</ul>
</div>
</div>
</a>
</div>
<?php
}
}
?>
</div>
</div>
</div>
</section>
</main>
<?php include("include/footer.php");?>
<script type="text/javascript">
function shareFb(Url_data)
{
window.open('http://www.facebook.com/sharer/sharer.php?u='+Url_data+'', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');
}
function getSearch(e)
{
var e = e.toLowerCase();
$( ".newsTS" ).each(function(index, element) {
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
</body>
</html>
