<?php include('include/head.php');?>
<body>
<?php include('include/header.php');?>
<main>
<section class="page-banner slide">
<ul class="cities-slider">
<li>
<div class="image">
<?php if(isset($nb_details[0]['blog_news_image']) && $nb_details[0]['blog_news_image']!=''){?>
<img src="<?php echo base_url('upload/news_blog/').$nb_details[0]['blog_news_image'];?>">
<?php }else{ ?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
<?php }?>
</div>
<div class="content">
<h3><?php echo  ucwords(stripslashes($nb_details[0]['blog_news_title'])); ?></h3>
</div>
<div class="overlay"></div>
</li>
</ul>
</section>
<div class="container">
<div class="blog-inner">
<div class="row">
<div class="col-md-8">
<div class="blog-left">
<div class="inner">
<div class="image">
<?php if(isset($nb_details[0]['blog_news_image']) && $nb_details[0]['blog_news_image']!=''){?>
<img src="<?php echo base_url('upload/news_blog/').$nb_details[0]['blog_news_image'];?>">
<?php }else{?>
<img src="<?php echo base_url().'upload/no_image/no-photo-available.jpg';?>" alt="">
<?php }?>
</div>
<div class="content">
<h3><?php echo  ucwords(stripslashes($nb_details[0]['blog_news_title'])); ?></h3>
<ul>
<li>
<p><i class="fa fa-clock-o"></i><?php echo date('l, F, d, Y',strtotime($nb_details[0]['create_date'])); ?></p>
</li>
<li>
<?php
if($nb_details[0]['user_id'] != 1){
$text = base_url('Home/profile-view/').base64_encription($nb_details[0]['user_id']);
}else{
$text  = 'javascript:void(0)';
}
?>
<a href="<?php echo $text; ?>"><p><i class="fa fa-user"></i> <?php echo $nb_details[0]['blog_news_user_details']; ?></p></a>
</li>
</ul>
<div class="text">
<?php
$string = $nb_details[0]['blog_news_description'];
//$string = trim(preg_replace('/\s\s+/', ' ', $string));
//$string = str_ireplace(array("\r","\n",'\r','\n'),'', $string);
echo stripslashes($string);
?>
</div>
<ul>
<li>
<p>Share
<a href="javascript:void(0)" onclick="shareFb('<?php echo base_url('Home/newsDetails/'.$nb_details[0]['blog_news_id']); ?>');"><i class="fa fa-facebook"></i></a>
<a target="_bank" href="https://twitter.com/intent/tweet?text=<?php echo base_url('Home/newsDetails/'.$nb_details[0]['blog_news_id']); ?>"><i class="fa fa-twitter"></i></a>
<a target="_bank" href="https://www.linkedin.com/cws/share?url=<?php echo base_url('Home/newsDetails/'.$nb_details[0]['blog_news_id']);?>"><i class="fa fa-linkedin"></i></a>
</p>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="blog-sidebar">
<h3>Latest News</h3>
<ul>
<?php
if(count($all_nb_details)> 0){
foreach($all_nb_details as $key => $allNB){
if($key <= 8){
if($nb_details[0]['blog_news_id'] != $allNB['blog_news_id']){
?>
<li> <a href="<?php echo base_url('Home/newsDetails/'.$allNB['blog_news_id']); ?>"><?php echo  ucwords(stripslashes($allNB['blog_news_title'])); ?></a>
<p>
<?php
$string = trim(preg_replace('/\s\s+/', ' ', $allNB['blog_news_description']));
$string = str_ireplace(array("\r","\n",'\r','\n'),'', $string);
$string = preg_replace('/\\\\/', '', $string);;
echo  ucfirst(strip_tags(stripslashes(substr($string,0,300))));
?>
</p>
</li>
<?php
}
}
}
}
?>
</ul>
</div>
</div>
</div>
</div>
</div>
</main>
<?php include("include/footer.php");?>
<script type="text/javascript">
function shareFb(Url_data){
window.open('http://www.facebook.com/sharer/sharer.php?u='+Url_data+'', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');
}
</script>
</body>
</html>
