<?php 
include('include/head.php');?>
<body>
<?php 
include('include/header.php');?>    
    
    <main>
    	<section class="page-banner">
        	<div class="image">
            	<img src="<?php echo base_url('assets/web/');?>images/bg-7.jpg" alt="">
            </div>
            <div class="content">
                <p>ADD BUSINESS DETAILS</p>
                <h3>Business</h3>
            </div>
            <div class="overlay"></div>
        </section>
        
        <section class="form-sec">
        	<div class="container">
                <h3>Add Business <em>Details</em></h3>
            	<div class="details-form mem-form">
                
                	<div class="row">
                    <div class="col-sm-6">
                    <div class="single">
                    	<p>Name of Business
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text">
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Category
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text">
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Website
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text">
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Opening Hours
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text">
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Street , Number
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text">
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Postal Code
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text">
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>City
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text">
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Photo’s
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<div class="upload">
                            		<input type="file" id="photo-img" onChange="document.getElementById('photo-img-label').innerHTML = document.getElementById('photo-img').value">
                                    <label for="photo-img" id="photo-img-label">Upload Your Photo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Banner / Logo
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<div class="upload">
                            		<input type="file" id="banner-img" onChange="document.getElementById('banner-img-label').innerHTML = document.getElementById('banner-img').value">
                                    <label for="banner-img" id="banner-img-label">Upload Your Banner</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                
                    <div class="col-sm-6">
                	<div class="single">
                    	<p>Description
                        	<a class="tooltip-btn" title="Tooltip"><i class="fa fa-info-circle"></i></a>
                        </p>
                        <div class="form-row">
                        	<div class="field">
                            	<textarea></textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="clearfix"></div>
                
                    <div class="col-sm-6 col-centered">
                	<div class="single">
                        <div class="form-row">
                        	<div class="field">
                            	<button type="submit">ADD BUSINESS DETAILS</button>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </main>
    
    <?php include("include/footer.php");?>
    
</body>
</html>
