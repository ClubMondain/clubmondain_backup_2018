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
                <p>ADD MEMBERS DETAILS</p>
                <h3>Members</h3>
            </div>
            <div class="overlay"></div>
        </section>
        
        <section class="form-sec">
        	<div class="container">
                <h3>Add Members <em>Details</em></h3>
            	<div class="details-form">
                
                	<div class="single">
                    	<p>Name of Members</p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text">
                            </div>
                            <div class="cntnt">
                            	<p>Official name Business</p>
                            </div>
                        </div>
                    </div>
                
                	<div class="single">
                    	<p>Category</p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text">
                            </div>
                            <div class="cntnt">
                            	<p>Select the category the item belongs to</p>
                            </div>
                        </div>
                    </div>
                
                	<div class="single">
                    	<p>Description</p>
                        <div class="form-row">
                        	<div class="field">
                            	<textarea></textarea>
                            </div>
                            <div class="cntnt">
                            	<p>How would you describe this health item in your own words with a  maximum of 300 characters </p>
                            </div>
                        </div>
                    </div>
                
                	<div class="single">
                    	<p>Website</p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text">
                            </div>
                            <div class="cntnt">
                            	<p>Insert the website</p>
                            </div>
                        </div>
                    </div>
                
                	<div class="single">
                    	<p>Opening Hours</p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text">
                            </div>
                            <div class="cntnt">
                            	<p>Insert the opening hours of the health item</p>
                            </div>
                        </div>
                    </div>
                
                	<div class="single">
                    	<p>Street , Number</p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text">
                            </div>
                            <div class="cntnt">
                            	<p>Insert the address of the health item</p>
                            </div>
                        </div>
                    </div>
                
                	<div class="single">
                    	<p>Postal Code</p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text">
                            </div>
                            <div class="cntnt">
                            	<p>Insert the Postal Code</p>
                            </div>
                        </div>
                    </div>
                
                	<div class="single">
                    	<p>City</p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text">
                            </div>
                            <div class="cntnt">
                            	<p>Insert City Name</p>
                            </div>
                        </div>
                    </div>
                
                	<div class="single">
                    	<p>Longitute</p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text">
                            </div>
                            <div class="cntnt">
                            	<p>Insert the Longitute</p>
                            </div>
                        </div>
                    </div>
                
                	<div class="single">
                    	<p>Latitude</p>
                        <div class="form-row">
                        	<div class="field">
                            	<input type="text">
                            </div>
                            <div class="cntnt">
                            	<p>Insert the Latitude</p>
                            </div>
                        </div>
                    </div>
                
                	<div class="single">
                    	<p>Photo’s</p>
                        <div class="form-row">
                        	<div class="field">
                            	<div class="upload">
                            		<input type="file" id="photo-img" onChange="document.getElementById('photo-img-label').innerHTML = document.getElementById('photo-img').value">
                                    <label for="photo-img" id="photo-img-label">Upload Your Photo</label>
                                </div>
                            </div>
                            <div class="cntnt">
                            	<p>Upload Photos, Max 3</p>
                            </div>
                        </div>
                    </div>
                
                	<div class="single">
                        <div class="form-row">
                        	<div class="field">
                            	<button type="submit">ADD BUSINESS DETAILS</button>
                            </div>
                            <div class="blank"></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </main>
    
    
<?php 
include('include/footer.php');?>

    
</body>
</html>
