<?php
$_SESSION['GET_ADMIN'] = get_admin_details(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Club Mondain</title>
<!--Css-->
<link rel="stylesheet" href="<?php echo base_url('assets/web/');?>css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('assets/web/');?>css/style.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('assets/web/');?>css/media.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('assets/web/');?>css/compile.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('assets/web/');?>css/stylesheet.css" type="text/css">
<!--Bx Slider-->
<link rel="stylesheet" href="<?php echo base_url('assets/web/');?>css/jquery.bxslider.css" type="text/css">

<!--[if IE]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
    
<!--Font Awesome-->
<link rel="stylesheet" href="<?php echo base_url('assets/web/');?>css/font-awesome.min.css" type="text/css">

<!--jquery-->
<script src="<?php echo base_url('assets/web/');?>js/jquery.min.js"></script>

<!--carosal-->
<link href="<?php echo base_url('assets/web/');?>css/carosal.css" rel="stylesheet" type="text/css" />

<!-- SWEET ALERT -->
	<script src="<?php echo base_url('assets/');?>js/alert.js"></script>
    <script src="<?php echo base_url('assets/');?>js/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/sweetalert.css">
<!-- SELECT 2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> 
   <!-- END SELECT 2 -->
<!-- CK Editor -->
	<script src="<?php echo base_url('ckeditor/');?>ckeditor.js"></script>   
   
<!-- DATE MOTH YEAR CALCULATION -->
<script type="text/javascript">
var numDays = {
                '1': 31, '2': 28, '3': 31, '4': 30, '5': 31, '6': 30,
                '7': 31, '8': 31, '9': 30, '10': 31, '11': 30, '12': 31
              };
function setDays(oMonthSel, oDaysSel, oYearSel)
{
	var nDays, oDaysSelLgth, opt, i = 1;
	nDays = numDays[oMonthSel[oMonthSel.selectedIndex].value];
	if (nDays == 28 && oYearSel[oYearSel.selectedIndex].value % 4 == 0)
		++nDays;
	oDaysSelLgth = oDaysSel.length;
	if (nDays != oDaysSelLgth)
	{
		if (nDays < oDaysSelLgth)
			oDaysSel.length = nDays;
		else for (i; i < nDays - oDaysSelLgth + 1; i++)
		{
			opt = new Option(oDaysSelLgth + i, oDaysSelLgth + i);
                  	oDaysSel.options[oDaysSel.length] = opt;
		}
	}
	var oForm = oMonthSel.form;
	var month = oMonthSel.options[oMonthSel.selectedIndex].value;
	var day = oDaysSel.options[oDaysSel.selectedIndex].value;
	var year = oYearSel.options[oYearSel.selectedIndex].value;	
	oForm.hidden.value = month + '/' + day + '/' + year;
}
</script>   
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112843220-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112843220-1');
</script>

</head>