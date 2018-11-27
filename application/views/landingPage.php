<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="robots" content="noindex">
<title>Club Mondain | Login</title>
<link rel="stylesheet" type="text/css" href="http://www.clubmondain.com/_bkp/bkp/wp-content/plugins/password-protect-wordpress/skins/defaultcustom/static/styles.css"/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>
<body class="" >
<div class="notice logout-message">
  <div class="inner"> You have been logged out. </div>
</div>
<div class="notice incorrect-credentials error">
  <div class="inner"> The password you submitted was wrong. </div>
</div>
<div class="notice security-provider">
  <div class="inner"> Security Provided by Platinum Mirror LTD (programmer: Daniel Chatfield) </div>
</div>
<div class="logo" style="background-image:url(http://www.clubmondain.com/_bkp/bkp/wp-content/plugins/password-protect-wordpress/skins/defaultcustom/static/images/logo.png)"></div>
<div class="login-form">
  <div class="text"> <strong style="font-size: 130%; font-weight: bold;">"Club Mondain, your space to keep fit and connected"</strong><br/>
    <br/>
    Are you a business traveller who wants to enjoy the easiest way to stay fit ?
    <br>
    At the platform of Club Mondain you’ll find the places you would want to visit; restaurants, juice bars, yoga places or find out about the best running spots. You even have the possibility to share your favourites and to connect with cool like-minded people.
Club Mondain is for members only. <br/>
    <br/>
    Fore more info, please contact through <a href="mailto:lois@clubmondain.com">lois@clubmondain.com</a>
    <br/>
    <br>

    A member of Club Mondain?<br/>
    Welcome! Please log in:<br/>
    <br/>
  </div>
  <?php
  if(isset($message))
  {
  ?>
  <p style="color:rgba(255,0,0,1)"><?php echo $message; ?></p>
  <?php
  }
  ?>
  <form method="post" action="<?php echo base_url('Welcome/getLoging'); ?>">
    <label style="font-weight: bold;" for="password">Password <br>
      <input id="password" class="input" type="password" name="private_blog_password" value="" />
    </label>
    <input id="submit" class="" type="submit" name="private_blog_submit" value="Login" />
  </form>
</div>
<script type="text/javascript">
jQuery("#password").focus();
</script>
</body>
</html>