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
				</ul>				
			</div>
			<a class="backbtn right" href="../../index.php"></a>
		</div>
		<div class="clearfix"></div>
		<div class="brlines"></div>
	</div>	

	<!-- CONTENT -->
	<div class="container">
		<div class="container pagecontainer offset-0">			
			<!-- FILTERS -->
			<div class="col-md-3 filters offset-0">
				
			</div>
			<!-- END OF FILTERS -->
			
			<!-- LIST CONTENT-->
			<div class="rightcontent col-md-12">
			
				<div class="hpadding20">
					<!-- Top filters -->
					<div class="topsortby topsortby2">
						<div class="col-md-12 offset-0">	
							<!-- <div class="left mt7">
								<b>Search :</b>
							</div> -->
							<div class="left wh40percent">
								<?php
								if(isset($_GET['q'])){
									$query = $_GET['q'];
									?>
									<input type="Search" name="search-ad" class="form-control" placeholder="Search ads.." value="<?php echo $query; ?>" />
									<?php
								}else{
									?>
									<input type="Search" name="search-ad" class="form-control" placeholder="Search ads.." />
									<?php
								}
								?>
							</div>
							<button class="btn btn-warning ml20" onclick="searchAd();">
								Search
							</button>
						</div>			
					</div>
					<!-- End of topfilters-->
				</div>
				<!-- End of padding -->
				
				<br/><br/>
				<div class="clearfix"></div>
				<div class="itemscontainer offset-1">
					<?php
					$limit = 10;
					if(isset($_GET['q'])){
						$query = $_GET['q'];
						if(isset($_GET['p'])){
							$startIndex = $_GET['p'];
							if($startIndex == 1){
								$startIndex = 0;
							}else{
								$startIndex = (($startIndex - 1) * 10) + 1;
							}
							$query = mysqli_query($conn, "select ad_id, category_id, subcategory_id, heading, address1, address2, location, territory, country, product_dtls from tbl_ads where heading like '".$query."%' order by category_id asc, subcategory_id asc limit ".$startIndex.", ".$limit);
						}else{
							$query = mysqli_query($conn, "select ad_id, category_id, subcategory_id, heading, address1, address2, location, territory, country, product_dtls from tbl_ads where heading like '".$query."%' order by category_id asc, subcategory_id asc limit 0, ".$limit);
						}
					}else{
						if(isset($_GET['p'])){
							$startIndex = $_GET['p'];
							if($startIndex == 1){
								$startIndex = 0;
							}else{
								$startIndex = (($startIndex - 1) * 10) + 1;
							}
							$query = mysqli_query($conn, "select ad_id, category_id, subcategory_id, heading, address1, address2, location, territory, country, product_dtls from tbl_ads order by category_id asc, subcategory_id asc limit ".$startIndex.", ".$limit);
						}else{
							$query = mysqli_query($conn, "select ad_id, category_id, subcategory_id, heading, address1, address2, location, territory, country, product_dtls from tbl_ads order by category_id asc, subcategory_id asc limit 0, ".$limit);
						}
					}
					$num = mysqli_num_rows($query); 
					if($num > 0){
						$preCat = "";
						$presubCat = "";
						$count = 1;
						$tabCount = 1;
						while ($row = mysqli_fetch_assoc($query)){
							$adID = $row['ad_id'];
							$heading = $row['heading'];
							$place = "";
							if($row['address1'] != ""){
								$place .= $row['address1'];
							}
							if($place != ""){
								$place .= ", ";
							}
							if($row['address2'] != ""){
								$place .= $row['address2'];
							}
							if($place != ""){
								$place .= ", ";
							}
							if($row['location'] != ""){
								$place .= $row['location'];
							}
							if($place != ""){
								$place .= ", ";
							}
							if($row['territory'] != ""){
								$place .= $row['territory'];
							}
							if($place != ""){
								$place .= ", ";
							}
							if($row['country'] != ""){
								$place .= $row['country'];
							}
							$content = $row['product_dtls'];
							$categoryID = $row['category_id'];
							$query1 = mysqli_query($conn, "select name from tbl_ad_categories where category_id='".$categoryID."'");
							$row1 = mysqli_fetch_assoc($query1);
							$catgoryName = $row1['name'];
							$subcategoryID = $row['subcategory_id'];
							$query2 = mysqli_query($conn, "select name from tbl_ad_subcategories where category_id='".$categoryID."' and subcategory_id='".$subcategoryID."'");
							$row2 = mysqli_fetch_assoc($query2);
							$subcategoryName = $row2['name'];
							$query3 = mysqli_query($conn, "select img from tbl_ad_images where ad_id='".$adID."' limit 1");
							$num3 = mysqli_num_rows($query3);
							if($num3 > 0){
								$row3 = mysqli_fetch_assoc($query3);
								$adImg = "../".$row3['img'];
							}else{
								$adImg = "../updates/update1/img/cars/car01.jpg";
							}
							?>
							<!-- FLIGHT TICKET-->
							<div id="ticketid0123" class="offset-2" >
							<?php
							if($catgoryName == $preCat && $subcategoryName == $presubCat){
									
							}else{
								if($tabCount % 2 != 0){
									?>
									<div class="fblueline">
										<b><?php echo $catgoryName; ?></b> 
										&nbsp;&nbsp;
										<span class="farrow"></span>
										&nbsp;&nbsp;
										<b><?php echo $subcategoryName; ?></b>
									</div>
									<?php
								}else{
									?>
									<div class="fgreenline">
										<b><?php echo $catgoryName; ?></b> 
										&nbsp;&nbsp;
										<span class="farrow"></span>
										&nbsp;&nbsp;
										<b><?php echo $subcategoryName; ?></b>
									</div>
									<?php
								}
								$preCat = $catgoryName;
								$presubCat = $subcategoryName;
								$tabCount = $tabCount + 1;
								$count = 1;
							}
							if($preCat == ""){
								$preCat = $catgoryName;
							}
							if($presubCat == ""){
								$presubCat = $subcategoryName;
							}
							if($count % 2 != 0){
								?>
								<!-- GOING TICKET-->
								<div class="frow1">
									<ul class="flightstable mt20">
										<li class="ft1">
											<img src="<?php echo $adImg; ?>"  alt="">
										</li>
										<li class="ft2">
											<p class="size18 bold padding0">
												<?php echo $heading; ?>
											</p>
											<p class="size16 padding0">
												<?php echo $place; ?>
											</p>
											<p class="size14 padding0">
												<?php echo $content; ?>
											</p>
										</li>
										<li class="ft5">
											<button class="lightbtn more-btn" onclick="(function(){window.location = 'Ad-Dtls.php?id=<?php echo base64_encode($adID);?>';})()">
												More
											</button>
										</li>
									</ul>
									<div class="clearfix"></div><br/><br/>
								</div>
								<?php
							}else{
								?>
								<div class="frow2">
									<ul class="flightstable mt20">
										<li class="ft1">
											<img src="<?php echo $adImg; ?>"  alt="">
										</li>
										<li class="ft2">
											<p class="size18 bold padding0">
												<?php echo $heading; ?>
											</p>
											<p class="size16 padding0">
												<?php echo $place; ?>
											</p>
											<p class="size14 padding0">
												<?php echo $content; ?>
											</p>
										</li>
										<li class="ft5">
											<button class="lightbtn more-btn" onclick="(function(){window.location = 'Ad-Dtls.php?id=<?php echo base64_encode($adID);?>';})()">
												More
											</button>
										</li>
									</ul>
									<div class="clearfix"></div><br/><br/>
								</div>
								<?php
							}
							$count = $count + 1;
							?>	
							</div>
							<!-- END OF FLIGHT TICKET-->
							<?php
						}
						?>
						<!-- END OF FLIGHT TICKET-->
						<div class="clearfix"></div>
						<div class="offset-2"><hr class="featurette-divider3"></div>
						<?php
						$query4 = mysqli_query($conn, "select ad_id from tbl_ads order by category_id asc, subcategory_id asc");
						$num4 = mysqli_num_rows($query4);
						if($num4 > 0){
							$NoPages = $num4 / $limit;
							$NoPages = ceil($NoPages);
							if($NoPages > 1){
								?>
								<div class="hpadding20">
									<ul class="pagination right paddingbtm20">
										<?php
										$myURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
										for($i=1; $i<=$NoPages; $i++){
											$myURL = "Ads.php?p=".$i;
											if(isset($_GET['p'])){
												if($i == $_GET['p']){
													?>
													<li class="active">
														<a href="<?php echo $myURL; ?>">
															<?php echo $i; ?>
														</a>
													</li>
													<?php
												}else{
													?>
													<li>
														<a href="<?php echo $myURL; ?>">
															<?php echo $i; ?>
														</a>
													</li>
													<?php
												}
											}else{
												if($i == 1){
													?>
													<li class="active">
														<a href="<?php echo $myURL; ?>">
															<?php echo $i; ?>
														</a>
													</li>
													<?php
												}else{
													?>
													<li>
														<a href="<?php echo $myURL; ?>">
															<?php echo $i; ?>
														</a>
													</li>
													<?php
												}
											}
										}
										?>
									</ul>
								</div>
								<?php
							}
						}
					}else{
						?>
						<!-- FLIGHT TICKET-->
						<div id="ticketid0123" class="offset-2" >
							<div class="frow1">
								<div class="padding30">
									<center>
										<h3>No ads Found!</h3>
									</center>
								</div>
							</div>
						</div>
						<!-- END OF FLIGHT TICKET-->
						<div class="clearfix"></div>
						<div class="offset-2">
							<hr class="featurette-divider3">
						</div>
						<?php
					}
					?>
				</div>	
				<!-- End of offset1-->	
			</div>
			<!-- END OF LIST CONTENT-->
		</div>
		<!-- END OF container-->	
	</div>
	<!-- END OF CONTENT -->

	<!-- FOOTER -->
	<?php include '../Includes/footer2.php'; ?>