<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
	<title>CamerounFacile</title>
	
    <!-- Bootstrap -->
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
    <script src="assets/js/jquery-3.1.1.js"></script>
	<!--<script src="assets/js/jquery.v2.0.3.js"></script>-->

	
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
				<a href="index.php" class="navbar-brand"><img src="images/logo.png" alt="Travel Agency Logo" class="logo"/></a>
			  </div>
			  <div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
				  <li class="dropdown active">
					<a href="index.php">
						Home
					</a>
				  </li>
				  <li class="dropdown">
					<a href="cab_list_page.php">
						Cab
					</a>
				  </li>
				  <li><a href="hotels.php">Hotels</a></li>
				  <li><a href="bus.php">Bus</a></li>
				  <li><a href="ads.php">Post AD</a></li>			  
				  <li><a href="aboutus.php">About us</a></li>			  
				  <li><a href="contactus.php">Contact us</a></li>	
				  <?php
					if(isset($_SESSION['uname'])){
						?>
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">My Account<b class="lightcaret mt-2"></b></a>
							<ul class="dropdown-menu">
								<li><a href="admin_dashboard.php">My Account</a></li>	
								<li><a href="logout.php">Logout</a></li>
							</ul>
						  </li>
						<?php
					}else if(isset($_SESSION['customer_user_uname'])){
						?>
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">My Account<b class="lightcaret mt-2"></b></a>
							<ul class="dropdown-menu">
								<li><a href="user_dashboard.php">My Account</a></li>	
								<li><a href="logout.php">Logout</a></li>
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
				  ?>
				  <li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">Register now<b class="lightcaret mt-2"></b></a>
					<ul class="dropdown-menu">
					  <!--<li class="dropdown-header">Aligned Right Dropdown</li>-->
					  <li><a href="Customer/Register.php">User Register</a></li>	
					  <li><a href="Driver/Register.php">Driver Register</a></li>
					  <!--<li><a href="#">Manager Login</a></li>-->
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