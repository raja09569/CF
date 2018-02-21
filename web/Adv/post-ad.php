<?php
include '../Includes/db.php';
include '../Includes/header.php';
?>	
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<script type="text/javascript" src="JS/index.js"></script>
	<div class="container breadcrub">
	    <div>
			<a class="homebtn left" href="../../index.php"></a>
			<div class="left">
				<ul class="bcrumbs">
					<li>/</li>
					<li><a href="../../index.php">Home</a></li>
					<li>/</li>
					<li><a href="Ads.php">Post Ad</a></li>
					<li>/</li>
					<li><a href="post-ad.php">Submit Post</a></li>
				</ul>				
			</div>
			<a class="backbtn right" href="Ads.php"></a>
		</div>
		<div class="clearfix"></div>
		<div class="brlines"></div>
	</div>	

	<!-- CONTENT -->
	<div class="container">
		<div class="container pagecontainer offset-0">
			<div class="text-center bold grey">
				<h3>Post Free Ads</h3>
			</div>
			<div class="padding20 post-ad-form">
				<div class="row">
					<div class="hpadding20 col-sm-6 col-md-6">
						<label>Select Category</label>
						<select class="form-control">
							<option value="select">Select Category</option>
						</select>
					</div>
					<div class="hpadding20 col-sm-6 col-md-6">
						<label>Select Category</label>
						<select class="form-control">
							<option value="select">Select Category</option>
						</select>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="hpadding20 col-sm-12 col-md-12">
						<label>
							Name (Max 50 characters)<span class="mandatory">*</span>
						</label>
						<input type="text" name="ad_name" class="form-control" maxlength="50">
					</div>
				</div>
				<div class="row">
					<div class="hpadding20 col-sm-12 col-md-12">
						<label>
							Company Name (Max 50 characters)<span class="mandatory">*</span>
						</label>
						<input type="text" name="ad_company" class="form-control" maxlength="50">
					</div>
				</div>
				<div class="row">
					<div class="hpadding20 col-sm-4 col-md-4">
						<label>
							Country <span class="mandatory">*</span>
						</label>
						<input type="text" name="ad_country" class="form-control" maxlength="100">
					</div>
					<div class="hpadding20 col-sm-4 col-md-4">
						<label>
							Territory<span class="mandatory">*</span>
						</label>
						<input type="text" name="ad_territory" class="form-control" maxlength="100">
					</div>
					<div class="hpadding20 col-sm-4 col-md-4">
						<label>Location<span class="mandatory">*</span></label>
						<input type="text" name="ad_name" class="form-control" maxlength="100">
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="hpadding20 col-sm-6 col-md-6">
						<label>
							Address 1 (Max 100 characters)<span class="mandatory">*</span>
						</label>
						<input type="text" name="ad_name" class="form-control" maxlength="100">
					</div>
					<div class="hpadding20 col-sm-6 col-md-6">
						<label>
							Address 2 (Max 100 characters)<span class="mandatory">*</span>
						</label>
						<input type="text" name="ad_name" class="form-control" maxlength="100">
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="hpadding20 col-sm-6 col-md-6">
						<label>Email ID<span class="mandatory">*</span></label>
						<input type="text" name="ad_name" class="form-control" maxlength="150">
					</div>
					<div class="hpadding20 col-sm-6 col-md-6">
						<label>Phone No<span class="mandatory">*</span></label>
						<input type="text" name="ad_name" class="form-control" maxlength="20">
					</div>
				</div>
				<div class="clearfix"></div>
				<br/>
				<h4 class="bold">
					Description about your company and products
				</h4>
				<br/>
				<div class="row">
					<div class="hpadding20 col-sm-12 col-md-12">
						<label>Company profile (Max length 300 characters)<span class="mandatory">*</span></label>
						<textarea class="form-control" maxlength="300"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="hpadding20 col-sm-12 col-md-12">
						<label>Product details (Max length 500 characters)<span class="mandatory">*</span></label>
						<textarea class="form-control" maxlength="500"></textarea>
					</div>
				</div>
				<div class="clearfix"></div>
				<br/>
				<div class="row">
					<div class="hpadding20 col-sm-12 col-md-12">
						<label>Photos (Max 5 photos)</label>
						<input type="file" name="ad_name" class="form-control" accept="image/x-png, image/gif, image/jpeg" multiple>
					</div>
					<div class="row padding20">
						<div class="hpadding20 col-md-2 col-sm-2">
							<img src="../images/No-Image/no-image-found.gif" class="img-responsive img-thumbnail">
						</div>
						<div class="hpadding20 col-md-2 col-sm-2">
							<img src="../images/No-Image/no-image-found.gif" class="img-responsive img-thumbnail">
						</div>
						<div class="hpadding20 col-md-2 col-sm-2">
							<img src="../images/No-Image/no-image-found.gif" class="img-responsive img-thumbnail">
						</div>
						<div class="hpadding20 col-md-2 col-sm-2">
							<img src="../images/No-Image/no-image-found.gif" class="img-responsive img-thumbnail">
						</div>
						<div class="hpadding20 col-md-2 col-sm-2">
							<img src="../images/No-Image/no-image-found.gif" class="img-responsive img-thumbnail">
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="padding20 col-md-6 col-sm-6 text-center">
						<button class="btn btn-danger btn-block bold">CANCEL</button>
					</div>
					<div class="padding20 col-md-6 col-sm-6 text-center">
						<button class="btn btn-primary btn-block bold">SUBMIT</button>
					</div>
				</div>
			</div>
		</div>
		<!-- END OF container-->	
	</div>
	<!-- END OF CONTENT -->

	<!-- FOOTER -->
	<?php include '../Includes/footer2.php'; ?>