// JavaScript Document

//Image Scaler
$(function() {
  $(".scale").imageScale({ 
  rescaleOnResize: true
});
});

$(document).ready(function(){
	$('#banner-slider').bxSlider({
	controls: true,
	speed: 500,
	});
});

$(document).ready(function(){
	var loadNext = $("#main-carousel .item:nth-of-type(2)").find('.banner-section').children('img').attr('src'); 
	var loadPrev = $("#main-carousel .item:last-child").find('.banner-section').children('img').attr('src');
	$('#r-banner').children('img').attr('src', loadNext);
	$('#l-banner').children('img').attr('src', loadPrev);
	
	$('#r-banner').click( function(){
		var srcNext = $("#main-carousel .active").find('.banner-section').children('img').attr('src');  
		var srcNext2 = $("#main-carousel .item:first-child").find('.banner-section').children('img').attr('src'); 
		var srcPrev = $("#main-carousel .active").find('.banner-section').children('img').attr('src');
		
		if ($("#main-carousel .active").is('.item:last-child')){
			$('#r-banner').children('img').attr('src', srcNext2);
		}else{
		$('#r-banner').children('img').attr('src', srcNext);}
		
		$('#l-banner').children('img').attr('src', srcPrev);
	});
	
	$('#l-banner').click( function(){
		var srcNext = $("#main-carousel .active").find('.banner-section').children('img').attr('src');
		var srcPrev = $("#main-carousel .active").prev(".item").find('.banner-section').children('img').attr('src');  
		var srcPrev2 = $("#main-carousel .item:last-child").find('.banner-section').children('img').attr('src'); 
		
		if ($("#main-carousel .active").prev('.item').is(':first-child')){
			$('#l-banner').children('img').attr('src', srcPrev2);
		}else{
		$('#l-banner').children('img').attr('src', srcPrev);}
		
		$('#r-banner').children('img').attr('src', srcNext);
	});
});