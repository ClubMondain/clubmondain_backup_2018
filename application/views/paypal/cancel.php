<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PAYMENT CANCEL</title>
</head>
<body>
<div>
<h3 style="font-family: 'quicksandbold'; font-size:16px; color:#313131; padding-bottom:8px;">Dear Member
</h3>
<span style="color:#D70000; font-size:16px; font-weight:bold;">
We are sorry! Your last transaction was cancelled.
</span>
<br/>
<br/>
<button onclick="getHome()">Home</button>
</div>
<script type="text/javascript">
function getHome()
{
	window.location.href = "<?php echo base_url('Home'); ?>";	
}	
</script>
</body>
</html>