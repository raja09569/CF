<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CamerounFacile</title>	
    <!-- Bootstrap -->
    <?php
    $fileName = basename($_SERVER['PHP_SELF']);
    if($fileName == "user_dashboard.php" || $fileName == "Ads.php" || $fileName == "Ad-Dtls.php"  || $fileName == "post-ad.php"){
    	?>
		<link rel="shortcut icon" type="image/png" href="../images/favicon.png"/>
    	<link href="../dist/css/bootstrap.css" rel="stylesheet" media="screen">
	    <link href="../assets/css/custom.css" rel="stylesheet" media="screen">
	    <!-- Carousel -->
		<link href="../examples/carousel/carousel.css" rel="stylesheet">
	    <!-- Fonts -->	
		<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
		<!-- Font-Awesome -->
	    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css" media="screen" />
	    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->
	    <!-- REVOLUTION BANNER CSS SETTINGS -->
	    <link rel="stylesheet" type="text/css" href="../css/fullscreen.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../rs-plugin/css/settings.css" media="screen" />
	    <!-- Picker UI-->	
		<link rel="stylesheet" href="../assets/css/jquery-ui.css" />		
		<link rel="stylesheet" href="../updates/update1/css/style01.css" />		
	    <!-- jQuery -->	
	    <!-- <script src="assets/js/jquery-3.1.1.js"></script> -->
		<script src="../assets/js/jquery.v2.0.3.js"></script>
    	<?php
    }else{
    	?>
    	<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
    	<link href="dist/css/bootstrap.css" rel="stylesheet" media="screen">
	    <link href="assets/css/custom.css" rel="stylesheet" media="screen">
	    <!-- Carousel -->
		<link href="examples/carousel/carousel.css" rel="stylesheet">
	    <!-- Fonts -->	
		<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
		<!-- Font-Awesome -->
	    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" media="screen" />
	    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->
	    <!-- REVOLUTION BANNER CSS SETTINGS -->
	    <link rel="stylesheet" type="text/css" href="css/fullscreen.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />
	    <!-- Picker UI-->	
		<link rel="stylesheet" href="assets/css/jquery-ui.css" />		
	    <!-- jQuery -->	
	    <!-- <script src="assets/js/jquery-3.1.1.js"></script> -->
		<script src="assets/js/jquery.v2.0.3.js"></script>
    	<?php
    }
    ?>
  </head>
  <body id="top">
    
	<!-- Top wrapper -->			  
	<div class="navbar-wrapper2 navbar-fixed-top">
      <div class="container">
		<div class="navbar mtnav">

			<div class="container offset-3">
			  <!-- Navigation-->
			  <div class="navbar-header">
				<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<?php
				if($fileName == "user_dashboard.php" || $fileName == "Ads.php" || $fileName == "Ad-Dtls.php" || $fileName == "post-ad.php"){
					?>
					<a href="../../index.php" class="navbar-brand">
						<img src="../images/logo.png" alt="Travel Agency Logo" class="logo" />
					</a>
					<?php
				}else{
					?>
					<a href="../index.php" class="navbar-brand">
						<img src="images/logo.png" alt="Travel Agency Logo" class="logo" />
					</a>
					<?php
				}
				?>
			  </div>
			  <div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
				  	<?php
				  	//$fileName = basename($_SERVER['PHP_SELF']);
				  	if($fileName == "index.php"){
				  	?>
				  	<li class="dropdown active">
						<a href="../index.php">
							Home
						</a>
				  	</li>
				  	<?php
				  	}else{
				  		if($fileName == "Ads.php" || $fileName == "Ad-Dtls.php" || $fileName == "post-ad.php"){
				  			?>
						  	<li class="dropdown">
								<a href="../../index.php">
									Home
								</a>
						  	</li>
						  	<?php
				  		}else{
				  			?>
						  	<li class="dropdown">
								<a href="../index.php">
									Home
								</a>
						  	</li>
						  	<?php
				  		}
				  	}
					if($fileName == "cab_list_page.php"){
					?>
					<li class="dropdown active">
						<a href="cab_list_page.php">
							Cab
						</a>
				  	</li>
					<?php
					}else{
						if($fileName == "Ads.php" || $fileName == "Ad-Dtls.php" || $fileName == "post-ad.php"){
				  			?>
							<li class="dropdown">
								<a href="../cab_list_page.php">
									Cab
								</a>
						  	</li>
							<?php
				  		}else{
				  			?>
							<li class="dropdown">
								<a href="cab_list_page.php">
									Cab
								</a>
						  	</li>
							<?php
				  		}
					}
					if($fileName == "bus.php"){
					?>
					<!-- <li><a href="hotels.php">Hotels</a></li> -->
				  	<li class="active">
				  		<a href="bus.php">Bus</a>
				  	</li>
					<?php
					}else{
						if($fileName == "Ads.php" || $fileName == "Ad-Dtls.php" || $fileName == "post-ad.php"){
				  			?>
							<li>
						  		<a href="../bus.php">Bus</a>
						  	</li>
							<?php
				  		}else{
				  			?>
							<li>
						  		<a href="bus.php">Bus</a>
						  	</li>
							<?php
				  		}
					}
					if($fileName == "Ads.php" || $fileName == "Ad-Dtls.php" || $fileName == "post-ad.php"){
					?>
				  	<li class="active"><a href="Ads.php">Post AD</a></li>			  
					<?php
					}else{
					?>
					<li><a href="Adv/Ads.php">Post AD</a></li>			  
					<?php
					}
					if($fileName == "aboutus.php"){
					?>
				  	<li class="active"><a href="aboutus.php">About us</a></li>
					<?php
					}else{
						if($fileName == "Ads.php"|| $fileName == "Ad-Dtls.php" || $fileName == "post-ad.php"){
						?>
				  			<li><a href="../aboutus.php">About us</a></li>
						<?php
						}else{
						?>
							<li><a href="aboutus.php">About us</a></li>
						<?php
						}
					}
					if($fileName == "contactus.php"){
					?>
				  	<li class="active"><a href="contactus.php">Contact us</a></li>	
					<?php
					}else{
					?>
					<li><a href="contactus.php">Contact us</a></li>		  
					<?php
					}
					if($fileName == "admin_dashboard.php"){
						?>
						<li class="dropdown active">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								My Account<b class="lightcaret mt-2"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="Admin/admin_dashboard.php">My Account</a></li>	
								<li><a href="Admin/Logout.php">Logout</a></li>
							</ul>
						</li>
						<?php
					}else if($fileName == "user_dashboard.php"){
						?>
						<li class="dropdown active">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">My Account<b class="lightcaret mt-2"></b></a>
							<ul class="dropdown-menu">
								<li><a href="user_dashboard.php">My Account</a></li>	
								<li><a href="Logout.php">Logout</a></li>
							</ul>
						</li>
						<?php
					}else{
						if(isset($_SESSION['uname'])){
							?>
							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">
									My Account<b class="lightcaret mt-2"></b>
								</a>
								<ul class="dropdown-menu">
									<li><a href="Admin/admin_dashboard.php">My Account</a></li>	
									<li><a href="Admin/Logout.php">Logout</a></li>
								</ul>
							</li>
							<?php
						}else if(isset($_SESSION['customer_user_uname'])){
							?>
							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">My Account<b class="lightcaret mt-2"></b></a>
								<ul class="dropdown-menu">
									<li><a href="Customer/user_dashboard.php">My Account</a></li>	
									<li><a href="Customer/Logout.php">Logout</a></li>
								</ul>
							</li>
							<?php
						}else{
							?>
							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">Login<b class="lightcaret mt-2"></b></a>
								<ul class="dropdown-menu">
									<li><a href="Customer/Login.php">My Account</a></li>	
									<li><a href="Admin/Login.php">Manager Login</a></li>
								</ul>
							  </li>
							<?php
						}
					}
					?>
				  	<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">Register now<b class="lightcaret mt-2"></b></a>
						<ul class="dropdown-menu">
					  		<li><a href="Customer/Register.php">User Register</a></li>	
					  		<li><a href="Driver/Register.php">Driver Register</a></li>
						</ul>
				  	</li>		
				</ul>
			  </div>
			  <!-- /Navigation-->			  
			</div>
		
        </div>
      </div>
    </div>
	<!-- /Top wrapper -->	