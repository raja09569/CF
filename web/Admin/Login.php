<?php
include '../Includes/db.php';
if(isset($_SESSION['uname'])){
?>
<script>window.location.href = "Dashboard/"</script>
<?php
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cameroun Facile</title>

<!-- Bootstrap -->
<link href="../dist/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="../assets/css/custom.css" rel="stylesheet" media="screen">

<!-- Animo css-->
<link href="../plugins/animo/animate+animo.css" rel="stylesheet" media="screen">

<link href="../examples/carousel/carousel.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->

<!-- Fonts -->	
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
if(isset($_POST['manager_login'])){
$username = $_POST['user_name'];
$password = $_POST['password'];
if($username == ""){
echo "<center>Enter usename</center>";
//exit;
}else if($password == ""){
echo "<center>Enter password</center>";
//exit;
}else{
$query = mysqli_query($conn, "select * from tbl_admin where username='$username' and password='$password'");
$num = mysqli_num_rows($query);
if($num != 0){
$hour = time() + 7200 * 24 * 30;
if(isset($_POST['rememberme'])){
	$rememberme = $_POST['rememberme'];
	if($rememberme == "on"){
        setcookie('admin_username', $username, $hour);
        setcookie('admin_password', $password, $hour);
	}
}else{
	setcookie('admin_username', "", $hour);
    setcookie('admin_password', "", $hour);
}
$_SESSION['uname'] = $username;
//header("Location: http://localhost/cameroon/CabAdmin/main.php");
?>
<script>window.location.href = "Dashboard/index.php"</script>
<?php
exit;
}else{
echo "<center><p style='color:red;'>Login details incorret. Please try again!</p></center>";
//exit;
} 
}
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<center><h1 style="color:#B6B0AF;">Manager - Login</h1></center>
<img src="../images/logo.png" class="login-img" alt="logo"/><br/>
<?php
if(isset($_COOKIE['admin_username']) && isset($_COOKIE['admin_password'])){
	?>
	<div class="login-c1">
	
<div class="cpadding50">
<input type="text" name="user_name" value="<?php echo $_COOKIE['admin_username']; ?>" class="form-control logpadding">
<br/>
<input type="password" name="password" value="<?php echo $_COOKIE['admin_password']; ?>" class="form-control logpadding">
</div>
</div>
<div class="login-c2">
<div class="logmargfix">
<div class="chpadding50">
<div class="alignbottom">
<button class="btn-search4" name="manager_login" type="submit" onclick="errorMessage()">Submit</button>							
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
<button class="btn-search4" name="manager_login" type="submit" onclick="errorMessage()">Submit</button>							
</div>
<div class="alignbottom2">
<div class="checkbox">
<label>
<input type="checkbox" name="rememberme" >Remember
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
<!--<div class="right"><a href="#" class="whitelink">Lost password?</a></div>-->
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
<script src="../dist/js/bootstrap.min.js"></script>	<script>	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');	  ga('create', 'UA-50123757-1', 'titanicthemes.com');	  ga('send', 'pageview');	</script>	
</body>
</html>