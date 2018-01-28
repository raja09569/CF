<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Travel Agency - HTML5 Booking template</title>

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
<script>
function sendMail(){
	var email = document.getElementById('user_email').value;
	if(email == ""){
		alert("Enter your registered email");
	}else{
		$.ajax({
			type: 'POST',
			url: 'sendMail.php',
			data: {email:email},
			success: function(response) {
				if(response == "success"){
					window.location.href = "reset_password.php";
				}else{
					alert(response);
				}
			},
			error: function(error){
				alert(error);
			}
		});
	}
}
</script>
<!-- 100% Width & Height container  -->
<div class="login-fullwidith">
<!-- Login Wrap  -->
<div class="login-wrap">

<img src="../images/logo.png" class="login-img" alt="logo"/><br/>
<div class="login-c1" style="height:145px!important;">
<div class="cpadding50">
<input type="email" name="user_email" id="user_email" class="form-control logpadding" placeholder="Enter registered email">
<br/>
</div>
</div>
<div class="login-c2" style="height:180px !important;">
<div class="logmargfix">
<div class="chpadding50">
<div class="alignbottom">
<button style="width:245px;" class="btn-search4" name="user_login" onclick="sendMail();" type="submit" onclick="errorMessage()">Submit</button>							
</div>
</div>
</div>
</div>	
<div class="login-c3" style="margin-top:230px!important;">
<div class="left"><a href="../index.php" class="whitelink"><span></span>Website</a></div>
<div class="right"><a href="Login.php" class="whitelink">Login here</a></div>
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