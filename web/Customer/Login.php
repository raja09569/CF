<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="../image/png" href="images/favicon.png"/>
<title>Cameroun Facile</title>

<!-- Bootstrap -->
<link href="../dist/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="../assets/css/custom.css" rel="stylesheet" media="screen">

<!-- Animo css-->
<link href="../plugins/animo/animate+animo.css" rel="stylesheet" media="screen">

<link href="../examples/carousel/carousel.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
<!-- Font-Awesome -->
<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css" media="screen" />
<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->
<!-- Load jQuery -->
<script src="../assets/js/jquery.v2.0.3.js"></script>
</head>
<body>
<!-- 100% Width & Height container  -->
<div class="login-fullwidith">

<!-- Login Wrap  -->
<div class="login-wrap">
<?php
	include '../Includes/db.php';
	if(isset($_POST['user_login'])){
		$username = $_POST['user_name'];
		$password = $_POST['password'];
		if($username == ""){
			echo "<center>Enter usename</center>";
			//exit;
		}else if($password == ""){
			echo "<center>Enter password</center>";
			//exit;
		}else{
			$query = mysqli_query($conn, "select * from tbl_customers where mobile_number='".$username."' and password='".$password."' or email_id='".$username."' and password='".$password."'");
			$num = mysqli_num_rows($query);
			if($num > 0){
				$row = mysqli_fetch_assoc($query);
				$custID = $row['cust_id'];
				$query1 = mysqli_query($conn, "update tbl_customers set web_login_status='loggedIn', web_login_at=now() where cust_id='".$custID."'");
				$hour = time() + 7200 * 24 * 30;
				if(isset($_POST['rememberme'])){
					$rememberme = $_POST['rememberme'];
					if($rememberme == "on"){
				        setcookie('username', $username, $hour);
				        setcookie('password', $password, $hour);
					}
				}else{
					setcookie('username', "", $hour);
				    setcookie('password', "", $hour);
				}
				$_SESSION['customer_user_uname'] = $username;
				$_SESSION['customer_user_ID'] = $row['cust_id'];
				if(isset($_SESSION['from_booking'])){
					unset($_SESSION['from_booking']);
					?>
					<script>window.location.href = "../cab_details_page.php"</script>
					<?php
				}else if(isset($_SESSION['from_postAd'])){
					unset($_SESSION['from_postAd']);
					?>
					<script>window.location.href = "../Adv/post-ad.php"</script>
					<?php
				}else{
					?>
					<script>window.location.href = "user_dashboard.php"</script>
					<?php	
				}
			}else{
				echo "<center><p style='color:red;'>Login details incorret. Please try again!</p></center>";
				//exit;
			} 
		}
	}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<img src="../images/logo.png" class="login-img" alt="logo"/><br/>
<?php
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
?>
<div class="login-c1">
<div class="cpadding50">
<input type="text" name="user_name" class="form-control logpadding" value="<?php echo $_COOKIE['username']; ?>">
<br/>
<input type="password" name="password" class="form-control logpadding" value="<?php echo $_COOKIE['password']; ?>">
</div>
</div>
<div class="login-c2">
<div class="logmargfix">
<div class="chpadding50">
<div class="alignbottom">
<button class="btn-search4" name="user_login" type="submit" onclick="errorMessage()">Submit</button>							
</div>
<div class="alignbottom2">
<div class="checkbox">
<label>
<input type="checkbox" name="rememberme" checked>Remember
</label>
</div>
</div>
</div>
</div>
</div>
<?php
}else{
?>	
<div class="login-c1">
<div class="cpadding50">
<input type="text" name="user_name" class="form-control logpadding" placeholder="Username">
<br/>
<input type="password" name="password" class="form-control logpadding" placeholder="Password">
</div>
</div>
<div class="login-c2">
<div class="logmargfix">
<div class="chpadding50">
<div class="alignbottom">
<button class="btn-search4" name="user_login" type="submit" onclick="errorMessage()">Submit</button>							
</div>
<div class="alignbottom2">
<div class="checkbox">
<label>
<input type="checkbox" name="rememberme">Remember
</label>
</div>
</div>
</div>
</div>
</div>
<?php
}
?>
</form>
<div class="login-c3">
<div class="left"><a href="../../index.php" class="whitelink"><span></span>Website</a></div>
<div class="right"><a href="lost_password.php" class="whitelink">Lost password?</a></div>
<div class="right"><a href="Register.php" class="whitelink">Register now</a></div>
</div>			
</div>
<!-- End of Login Wrap  -->

</div>	
<!-- End of Container  -->

<!-- Javascript  -->
<script src="../assets/js/initialize-loginpage.js"></script>
<script src="../assets/js/jquery.easing.js"></script>
<!-- Load Animo -->
<script src="../plugins/animo/animo.js"></script>
<script>
function errorMessage(){
$('.login-wrap').animo( { animation: 'tada' } );
}
</script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../dist/js/bootstrap.min.js"></script>	
</body>
</html>