<!DOCTYPE HTML>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Altmetric</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!--Jquery-->

</head>


<body style="width: 100%;max-width: 840px;margin: auto;border: 1px solid #000000;">
<!--start header-->

<!--end header-->

<main>
    <!--start banner-->
   
    
     <div style="color:#000;padding:10px 20px;border-bottom: 1px solid #000;">
   <p style="font-family: 'roboto';font-size: 15px;color: #6a6a6a;margin: 2px;">
   	
<?php	
if(!empty($invite_msg))
{
	echo $invite_msg;
} 
else
{
?>
Dear delegate,<br>
Union is excited to offer you a range of Vitality Services in cooperation with World Forum The Hague and Club Mondain during your upcoming conference visit! Joining is fast, easy and fun so remember to pack your sportswear.<br>
Healthy stays!

<?php
}	
	
?>
   
</p>			
    
   </div> 
    
    <!--end banner-->

<!--start information-sec-->
    
     <!--end information-sec-->

    <!--start table-sec-->
    <?php if( !empty($new_no_of_booking) && $new_no_of_booking> 0){ ?>
    <hr style="color: #f00;background-color: #373737;height: 5px;-webkit-margin-before: 0;-webkit-margin-after: 0"></hr>
    <p style="padding: 0px 20px 0 20px;font-family: 'roboto';font-size: 20px;">
    	<b>The number of booking of the <?php  echo $trainer_class_name ;?> has been increased from <?php echo $exist_space_size ;?> to <?php echo $new_no_of_booking;?></b>
    </p>
    
    <?php
        }
        ?>
    
    <div style="border-bottom: 1px solid #000;">
    
    <div style="color: #f00;padding:0 20px;">
    <p style="font-family: 'roboto';font-size: 18px;color: #6a6a6a;"><b>
    	Sign-up in 2 simple steps:</b></p>
		<ul style="-webkit-padding-start: 20px;">
		<li style="font-size: 16px;list-style-type: decimal;color: #6a6a6a;"><i class="fa fa-angle-right" style="font-size: 20px;font-weight: 800;"></i> Click here to sign-up <a href="<?php echo $link;?>">Link</a></li> 
		<li style="font-size: 16px;list-style-type: decimal;color: #6a6a6a;"><i class="fa fa-angle-right" style="font-size: 20px;font-weight: 800;"></i> Go to the (private) event page: 
		<ul style="margin-top: 8px;">
		<li style="list-style-type:circle;padding-bottom: 3px;">Copy Toke: <span><?php echo $token; ?></span></li>
		<li style="list-style-type:circle;">Click here to sign-up: <a href="<?php echo $link;?>">Link</a></li>
		</ul>
		</li> 		
				
		</ul>
		<!--<p style="padding: 0px 20px 0 20px;font-family: 'roboto';font-size: 18px;color: #6a6a6a;">You are now successfully registered! Want more? Click 'Back to Space' button and sign-up for as many Energizers as you want!</p>-->
   
    <!--end table-sec-->
    </div>
</div>

<div style="padding:6px 20px;">
    <p style="font-family: 'roboto';font-size: 15px;color: #6a6a6a;font-style: italic;">
			The information transmitted is intended only for the person or entity to which it is
addressed and may contain confidential and/ or privileged material.</p>
</div>

    <!--start footer-->
<footer style="padding:0 20px;">
<div  style="width:100%;">	
<div style="margin-bottom: 3px;">
<img src="<?php echo base_url('assets/web/');?>images/logo.jpg" alt="" style="width:100%;max-width: 165px;">
</div>
<p style="font-size: 15px;">Kind regards & Healthy travels!<br>Team Club Mondain<br><i>Club Mondain aspires to enable every business (wo)man to create a space for a healthy lifestyle from any place in the world.</i></p>





<p>Connect with us via:</p>
<ul style="-webkit-padding-start: 0;padding: 0;">
<li style="list-style: none;padding-bottom: 5px;padding-right: 0;margin-left: 0;"><span>T:</span> 0031(0)20 716 31 14</li>
<li style="list-style: none;padding-bottom: 5px;margin-left: 0;"><span>E:</span> vitalityincongress@clubmondain.com</li>
<li style="list-style: none;padding-bottom: 5px;margin-left: 0;"><span>W:</span> <a href="<?php echo base_url();?>" style="color:#12919d;">www.clubmondain.com</a></li>
<li style="list-style: none;padding-bottom: 5px;margin-left: 0;"><span><img src="<?php echo base_url('assets/web/');?>images/linkedin.png" alt="" style="width: 18px;vertical-align: middle;"> </span>  <a href="<?php echo $_SESSION['GET_ADMIN'][0]['linkedIn_link']; ?>" style="color:#12919d;vertical-align: middle;"> Linkedin</a></li>
<li style="list-style: none;padding-bottom: 5px;margin-left: 0;"><span><img src="<?php echo base_url('assets/web/');?>images/twit.png" alt="" style="width:18px;vertical-align: middle;"></span> <a href="<?php echo $_SESSION['GET_ADMIN'][0]['twitter_link']; ?>" style="color:#12919d;vertical-align: middle;"> Twitter</a></li>
<li style="list-style: none;padding-bottom: 5px;margin-left: 0;"><span><img src="<?php echo base_url('assets/web/');?>images/fb.png" alt="" style="width:18px;vertical-align: middle;"></span> <a href="<?php echo $_SESSION['GET_ADMIN'][0]['facebook_link']; ?>" style="color:#12919d;vertical-align: middle;">Facebook</a></li>
<li style="list-style: none;padding-bottom: 5px;margin-left: 0;"><span><img src="<?php echo base_url('assets/web/');?>images/instagram.png" alt="" style="width:18px;vertical-align: middle;"></span> <a href="<?php echo $_SESSION['GET_ADMIN'][0]['instagram_link']; ?>" style="color:#12919d;vertical-align: middle;">Instagram</a></li>

</ul>

</div>


</footer>
<!--end footer-->



</main>

<div style="clear: both"></div>


</body>
<!--Js-->
