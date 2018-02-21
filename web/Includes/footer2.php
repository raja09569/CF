

	
	
	<!-- FOOTER -->
	<div class="footerbgblack">
		<div class="container">		
			
			<div class="col-md-3">
				<span class="ftitleblack">Let's socialize</span>
				<div class="scont">
					<?php
					if($fileName == "user_dashboard.php" || $fileName == "Ads.php" || $fileName == "Ad-Dtls.php" || $fileName == "post-ad.php"){
					?>
					<a href="#" class="social1b">
						<img src="../images/icon-facebook.png" alt=""/>
					</a>
					<a href="#" class="social2b">
						<img src="../images/icon-twitter.png" alt=""/>
					</a>
					<a href="#" class="social3b">
						<img src="../images/icon-gplus.png" alt=""/>
					</a>
					<a href="#" class="social4b">
						<img src="../images/icon-youtube.png" alt=""/>
					</a>
					<br/><br/><br/>
					<a href="#">
						<img src="../images/logosmal2.png" alt="" />
					</a>
					<br/>
					<span class="grey2">
						&copy; 2013  |  <a href="#">Privacy Policy</a>
						<br/>
						All Rights Reserved 
					</span>
					<br/><br/>
					<?php
					}else{
					?>
					<a href="#" class="social1b">
						<img src="images/icon-facebook.png" alt=""/>
					</a>
					<a href="#" class="social2b">
						<img src="images/icon-twitter.png" alt=""/>
					</a>
					<a href="#" class="social3b">
						<img src="images/icon-gplus.png" alt=""/>
					</a>
					<a href="#" class="social4b">
						<img src="images/icon-youtube.png" alt=""/>
					</a>
					<br/><br/><br/>
					<a href="#">
						<img src="images/logosmal2.png" alt="" />
					</a>
					<br/>
					<span class="grey2">
						&copy; 2013  |  <a href="#">Privacy Policy</a>
						<br/>
						All Rights Reserved 
					</span>
					<br/><br/>	
					<?php
					}
					?>
				</div>
			</div>
			<!-- End of column 1-->
			
			<div class="col-md-3">
				<span class="ftitleblack">Travel Specialists</span>
				<br/><br/>
				<ul class="footerlistblack">
					<li><a href="#">Golf Vacations</a></li>
					<li><a href="#">Ski & Snowboarding</a></li>
					<li><a href="#">Disney Parks Vacations</a></li>
					<li><a href="#">Disneyland Vacations</a></li>
					<li><a href="#">Disney World Vacations</a></li>
					<li><a href="#">Vacations As Advertised</a></li>
				</ul>
			</div>
			<!-- End of column 2-->		
			
			<div class="col-md-3">
				<span class="ftitleblack">Travel Specialists</span>
				<br/><br/>
				<ul class="footerlistblack">
					<li><a href="#">Weddings</a></li>
					<li><a href="#">Accessible Travel</a></li>
					<li><a href="#">Disney Parks</a></li>
					<li><a href="#">Cruises</a></li>
					<li><a href="#">Round the World</a></li>
					<li><a href="#">First Class Flights</a></li>
				</ul>				
			</div>
			<!-- End of column 3-->		
			
			<div class="col-md-3 grey">
				<span class="ftitleblack">Newsletter</span>
				<div class="relative">
					<input type="email" class="form-control fccustom2black" id="exampleInputEmail1" placeholder="Enter email">
					<?php
					if($fileName == "user_dashboard.php" || $fileName == "Ads.php" || $fileName == "Ad-Dtls.php" || $fileName == "post-ad.php"){
						?>
						<button type="submit" class="btn btn-default btncustom">Submit<img src="../images/arrow.png" alt=""/></button>
						<?php
					}else{
						?>
						<button type="submit" class="btn btn-default btncustom">Submit<img src="images/arrow.png" alt=""/></button>
						<?php
					}
					?>
				</div>
				<br/><br/>
				<span class="ftitleblack">Customer support</span><br/>
				<span class="pnr">1-866-599-6674</span><br/>
				<span class="grey2">office@travel.com</span>
			</div>			
			<!-- End of column 4-->			
		
			
		</div>	
	</div>
	
	<div class="footerbg3black">
		<div class="container center grey"> 
		<a href="#">Home</a> | 
		<a href="#">About</a> | 
		<a href="#">Last minute</a> | 
		<a href="#">Early booking</a> | 
		<a href="#">Special offers</a> | 
		<a href="#">Blog</a> | 
		<a href="#">Contact</a>
		<?php
		if($fileName == "user_dashboard.php" || $fileName == "Ads.php" || $fileName == "Ad-Dtls.php" || $fileName == "post-ad.php"){
			?>
			<a href="#top" class="gotop scroll">
				<img src="../images/spacer.png" alt=""/>
			</a>
			<?php
		}else{
			?>
			<a href="#top" class="gotop scroll">
				<img src="images/spacer.png" alt=""/>
			</a>
			<?php
		}
		?>
		</div>
	</div>
	
	
	

	<?php
	if($fileName == "user_dashboard.php" || $fileName == "Ads.php" || $fileName == "Ad-Dtls.php" || $fileName == "post-ad.php"){
		?>
		<!-- Javascript -->	
	    <script src="../assets/js/js-list.js"></script>	

	    <!-- Custom Select -->
		<script type='text/javascript' src='../assets/js/jquery.customSelect.js'></script>
		
	    <!-- JS Ease -->	
	    <script src="../assets/js/jquery.easing.js"></script>
		
	    <!-- Custom functions -->
	    <script src="../assets/js/functions.js"></script>
		
	    <!-- jQuery KenBurn Slider  -->
	    <script type="text/javascript" src="../rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

	    <!-- Counter -->	
	    <script src="../assets/js/counter.js"></script>	
		
	    <!-- Nicescroll  -->	
		<script src="../assets/js/jquery.nicescroll.min.js"></script>
		
	    <!-- Picker -->	
		<script src="../assets/js/jquery-ui.js"></script>
		
	    <!-- Bootstrap -->	
	    <script src="../dist/js/bootstrap.min.js"></script>
		<?php
	}else{
		?>
		<!-- Javascript -->	
	    <script src="assets/js/js-list.js"></script>	

	    <!-- Custom Select -->
		<script type='text/javascript' src='assets/js/jquery.customSelect.js'></script>
		
	    <!-- JS Ease -->	
	    <script src="assets/js/jquery.easing.js"></script>
		
	    <!-- Custom functions -->
	    <script src="assets/js/functions.js"></script>
		
	    <!-- jQuery KenBurn Slider  -->
	    <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

	    <!-- Counter -->	
	    <script src="assets/js/counter.js"></script>	
		
	    <!-- Nicescroll  -->	
		<script src="assets/js/jquery.nicescroll.min.js"></script>
		
	    <!-- Picker -->	
		<script src="assets/js/jquery-ui.js"></script>
		
	    <!-- Bootstrap -->	
	    <script src="dist/js/bootstrap.min.js"></script>
		<?php
	}
	?>
  </body>
</html>
