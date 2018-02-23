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
						<label>Select Category<span class="mandatory">*</span></label>
						<select class="form-control" name="ad-categories" onchange="loadSubCat(this)">
							<option value="select">Select Category</option>
						</select>
					</div>
					<div class="hpadding20 col-sm-6 col-md-6">
						<label>Select Sub Category<span class="mandatory">*</span></label>
						<select class="form-control" name="ad-sub-categories">
							<option value="select">Select Sub Category</option>
						</select>
					</div>
				</div>
				<div class="clearfix"></div>
				<br/>
				<div class="row">
					<div class="hpadding20 col-sm-12 col-md-12">
						<label>
							Name (Max 50 characters)<span class="mandatory">*</span>
						</label>
						<input type="text" name="ad_name" class="form-control" maxlength="50">
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="hpadding20 col-sm-12 col-md-12">
						<label>
							Company Name (Max 50 characters)<span class="mandatory">*</span>
						</label>
						<input type="text" name="ad_company" class="form-control" maxlength="50">
					</div>
				</div>
				<br/>
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
						<input type="text" name="ad_location" class="form-control" maxlength="100">
					</div>
				</div>
				<div class="clearfix"></div>
				<br/>
				<div class="row">
					<div class="hpadding20 col-sm-6 col-md-6">
						<label>
							Address 1 (Max 100 characters)<span class="mandatory">*</span>
						</label>
						<input type="text" name="ad_address1" class="form-control" maxlength="100">
					</div>
					<div class="hpadding20 col-sm-6 col-md-6">
						<label>
							Address 2 (Max 100 characters)<span class="mandatory">*</span>
						</label>
						<input type="text" name="ad_address2" class="form-control" maxlength="100">
					</div>
				</div>
				<div class="clearfix"></div>
				<br/>
				<div class="row">
					<div class="hpadding20 col-sm-6 col-md-6">
						<label>Email ID<span class="mandatory">*</span></label>
						<input type="text" name="ad_email" class="form-control" maxlength="150">
					</div>
					<div class="hpadding20 col-sm-6 col-md-6">
						<label>Phone No<span class="mandatory">*</span></label>
						<input type="text" name="ad_mobile" class="form-control" maxlength="20">
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
						<textarea class="form-control" name="ad-comp-profile" maxlength="300"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="hpadding20 col-sm-12 col-md-12">
						<label>Product details (Max length 500 characters)<span class="mandatory">*</span></label>
						<textarea class="form-control" name="ad-prdct-dtls" maxlength="500"></textarea>
					</div>
				</div>
				<div class="clearfix"></div>
				<br/>
				<div class="row ">
					<label class="hpadding20 col-sm-12 col-md-12">Photos (Max 5 photos)</label>
					<br/><br/>
					<div class="row" style="margin: 0px;">
						<div class="hpadding20 col-md-2 col-sm-2 ad-img-div" id="div_1">
							<span class="ad-img-close" id="close_1" onclick="removeThis(this)">X</span>
							<input type="file" name="files" title="Load File" style="display: none;" id="input_1" onchange="checkImages(this)"/>
							<img src="../images/plus.png" height="120" width="120" class="img-responsive img-thumbnail ad-img" onclick="showChooser(this);" id="img_1">
						</div>
						<div class="hpadding20 col-md-2 col-sm-2 ad-img-div" id="div_2">
							<span class="ad-img-close" id="close_2" onclick="removeThis(this)">X</span>
							<input type="file" name="files" title="Load File" style="display: none;" id="input_2" onchange="checkImages(this)"/>
							<img src="../images/plus.png" height="120" width="120" class="img-responsive img-thumbnail ad-img" onclick="showChooser(this);" id="img_2">
						</div>
						<div class="hpadding20 col-md-2 col-sm-2 ad-img-div" id="div_3">
							<span class="ad-img-close" id="close_3" onclick="removeThis(this)">X</span>
							<input type="file" name="files" title="Load File" style="display: none;" id="input_3" onchange="checkImages(this)"/>
							<img src="../images/plus.png" height="120" width="120" class="img-responsive img-thumbnail ad-img" onclick="showChooser(this);" id="img_3">
						</div>
						<div class="hpadding20 col-md-2 col-sm-2 ad-img-div" id="div_4">
							<span class="ad-img-close" id="close_4" onclick="removeThis(this)">X</span>
							<input type="file" name="files" title="Load File" style="display: none;" id="input_4" onchange="checkImages(this)"/>
							<img src="../images/plus.png" height="120" width="120" class="img-responsive img-thumbnail ad-img" onclick="showChooser(this);" id="img_4">
						</div>
						<div class="hpadding20 col-md-2 col-sm-2 ad-img-div" id="div_5">
							<span class="ad-img-close" id="close_5" onclick="removeThis(this)">X</span>
							<input type="file" name="files" title="Load File" style="display: none;" id="input_5" onchange="checkImages(this)"/>
							<img src="../images/plus.png" height="120" width="120" class="img-responsive img-thumbnail ad-img" onclick="showChooser(this);" id="img_5">
						</div>
					</div>
					
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="padding20 col-md-6 col-sm-6 text-center">
						<button class="btn btn-danger btn-block bold" onclick="cancelForm();">CANCEL</button>
					</div>
					<div class="padding20 col-md-6 col-sm-6 text-center">
						<button class="btn btn-primary btn-block bold" onclick="submitAd();">SUBMIT</button>
					</div>
				</div>
			</div>
		</div>
		<!-- END OF container-->	
	</div>
	<!-- END OF CONTENT -->

	<!-- FOOTER -->
	<?php include '../Includes/footer2.php'; ?>