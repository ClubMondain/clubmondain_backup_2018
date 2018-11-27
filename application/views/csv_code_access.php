<?php $this->load->view('include/head');?>
<body>
<?php $this->load->view('include/header');?>


<?php if($this->session->flashdata('energiser_filled_msg')=='' && $this->session->flashdata('incorrect_energiser') ==''){ ?>


<section class="main-banner">
	
	<form action="<?php echo base_url(); ?>Energiser/book-energizer/<?php echo $space_id; ?>/<?php echo $energiser_id; ?>/<?php echo $csv_id; ?>/<?php echo $user_id;?>/<?php echo $user_mail;?>" method="post" enctype="multipart/form-data">
	<div class="banner-content transform-middle">

	<?php if($this->session->flashdata('msg') !=''){ ?>
	<div class="<?php echo $this->session->flashdata('msg_class');?>"> <?php echo $this->session->flashdata('msg');?> </div>
	<?php }?>

	<input type="hidden" value="<?php echo $token;?>" name="token_id">
	<h2>Please Enter The<br> Energizer Token Code</h2>
	<div class="text">
	<input type="text" placeholder="Enter The Energizer Token Code" name="user_enter_token_id" id="csv_code_id"></input>
	</div>
	<button type="submit" onclick="return csv_codeValidation();">SUBMIT</button>

	</div>
	
	</form>
</section>
 
 <?php } ?>      
       
       
       
       
 <?php if($this->session->flashdata('energiser_filled_msg') !='' && $this->session->flashdata('incorrect_energiser') ==''){ ?>

<section class="main-banner">
	<!--<div class="image">
	<img src="<?php echo base_url();?>upload/energiser_csv/banner-bg.jpg" alt="">
	</div>-->
	
	<div class="banner-content transform-middle" style="height: 314px;">

	<h2 style="color: #0e94a2;">This Energizer<br>already fully booked</h2>
	
	<a href="<?php echo base_url()?>"> <button>BACK</button></a> 

	</div>
	
</section>
 
 <?php } ?> 
 
 
 
 <?php if($this->session->flashdata('incorrect_energiser') !=''){ ?>

<section class="main-banner">
	<!--<div class="image">
	<img src="<?php echo base_url();?>upload/energiser_csv/banner-bg.jpg" alt="">
	</div>-->
	
	<div class="banner-content transform-middle" style="height: 314px;">

	<h2 style="color: #0e94a2;">Sorry !! <br>The request has not been sent you for this Energizer </h2>
	
	<a href="<?php echo base_url()?>"> <button>BACK</button></a> 

	</div>
	
</section>
 
 <?php } ?> 
 
 
 
       
       
       
       
       
<?php $this->load->view('include/footer');?>
</body>



<script>
	function csv_codeValidation()
	{		
	var csv_code_id = $("#csv_code_id").val();	
	if( csv_code_id == '')
	{
		alert_message('Please Enter The Energizer Token Code!','warning','btn-warning');
		return false;
	}	
}
	
</script>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,600');
@import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400');
.transform-middle {
   transform: translateY(-50%);
   -webkit-transform: translateY(-50%);
   -ms-transform: translateY(-50%);
   -o-transform: translateY(-50%);
   -moz-transform: translateY(-50%)
}
.main-banner {
   height: 600px;
   position: relative;
       float: left;
    width: 100%;
    background: #1c222e;
}
.main-banner .banner-content {
   text-align: center;
   font-family: 'Roboto';
   font-weight: 400;
   position: absolute;
   top: 50%;
   left: 0;
   right: 0;
   width: 100%;
   max-width: 500px;
   margin: auto;
   padding: 5px;
   background: #fff;
   border: 10px solid #000;
}

.main-banner .banner-content h2 {
	font-family: 'Montserrat';
    font-weight: 600;
    font-size: 28px;
    margin-bottom: 50px;
    color: #000;
}

.main-banner .banner-content input{
	
	font-family: 'Open Sans';
    font-size: 15px;
    font-weight: 300;
    font-style: italic;
    color: #b2b2b2;
    background: #fafafa;
    box-shadow: inset 0 0 10px #ccc;
-moz-box-shadow:    inset 0 0 10px #ccc;
-webkit-box-shadow: inset 0 0 10px #ccc;
    border: none;
    width: 100%;
    max-width: 400px;
    text-align: center;
    height: 36px;
    border-radius: 5px;
    margin-bottom: 40px;
    
}
.main-banner .banner-content button{
	
    background: #1c222e;
    border: none;
    border-bottom: 5px solid #114c52;
    color: #fff;
    width: 100%;
    max-width: 160px;
    height: 50px;
    border-radius: 5px;
    font-size: 18px;
    font-family: 'Montserrat';
    font-weight: 300;
    letter-spacing: 2px;
        margin-bottom: 45px;
            line-height: 40px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, .5);
}

</style>

</html>
