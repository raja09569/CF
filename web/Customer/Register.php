<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CamerounFacile</title>
		<!-- Bootstrap -->
		<link href="../dist/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="../assets/css/custom.css" rel="stylesheet" media="screen">
		<!-- Animo css-->
		<link href="../plugins/animo/animate+animo.css" rel="stylesheet" media="screen">
		<link href="../examples/carousel/carousel.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
		<!-- Font-Awesome -->
		<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css" media="screen" />
		<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->
		<!-- Load jQuery -->
		<script src="../assets/js/jquery.v2.0.3.js"></script>
		<script src="../assets/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="../css/intlTelInput.css" >
		<style>
			.iti-flag {background-image: url("../img/flags.png");}
			/*@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
	  		.iti-flag {background-image: url("../img/flags@2x.png");}
			}*/
		</style>
		<script src="../assets/js/intlTelInput.js"></script>
	</head>
	<body>
		<!-- 100% Width & Height container  -->
		<div class="login-fullwidith" style="background-image:url(../images/palmleafs.png) !important;background-repeat:no-repeat !important;background-size:cover !important;">
			<!-- Login Wrap  -->
			<div class="login-wrap">
				<script>
					function RegisterUser(){
						$('#result').empty();
						var fname = document.getElementById('fname');
						var lname = document.getElementById('lname');
						var mobile = document.getElementById('phoneno');
						var emailId = document.getElementById('email_id');
						var adrs = document.getElementById('address');
						var pword = document.getElementById('password');
						var repword = document.getElementById('repeat_password');
						var file = document.getElementById('profile_pic').files[0];
						var mob = /^[1-9]{1}[0-9]{9}$/;
						var atpos = emailId.value.indexOf("@");
					    var dotpos = emailId.value.lastIndexOf(".");
						if(fname.value == ""){
							alert("Enter First name");
							fname.focus();
						}else if(lname.value == ""){
							alert("Enter Last name");
							lname.focus();
						}else if (!/^[a-zA-Z-, ]*$/g.test(name.value)) {
					        alert("You cannot enter numeric values in Name");
					        name.focus();
					    }else if(mobile.value == ""){
							alert("Enter Mobile Number");
							mobile.focus();
						}else if ($("#phoneno").intlTelInput("isValidNumber") == false) {
							alert("Mobile number not valid");
							$('#phoneno').focus();
						} else if(emailId.value == ""){
							alert("Enter Email Id");
							emailId.focus();
						}else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=emailId.value.length) {
					        alert("Not a valid e-mail address");
							emailId.focus();
					    }else if(adrs.value == ""){
							alert("Enter Address");
							adrs.focus();
						}else if(pword.value == ""){
							alert("Enter Password");
							pword.focus();
						}else if(repword.value == ""){
							alert("Repeat Password");
							repword.focus();
						}else if(pword.value != repword.value){
							alert("Passwords should Match!");
							repword.focus();
						}else{
							var countryData = $("#phoneno").intlTelInput("getSelectedCountryData");
							//alert(countryData);
							var country = countryData['name'];
							country = country.split(" ");
							country = country[0];	
							var dialCode = countryData['dialCode'];

							var postData = new FormData();
							postData.append("fname", fname.value);
							postData.append("lname", lname.value);
							postData.append("dialCode", dialCode);
							postData.append("phoneno", mobile.value);
							postData.append("email_id", emailId.value);
							postData.append("address", address.value);
							postData.append("country", country);
							postData.append("password", pword.value);
							var isVarified = $("#phoneno").data("status");
							//alert(isVarified);
							if(isVarified != null){
								if(isVarified == "yes"){
									if(document.getElementById("profile_pic").files.length == 0 ){
										
									}else{
										postData.append("profile_pic", file);
									}		
								}else{
									postData.append("sendOTP", "yes");
								}
							}else{
								postData.append("sendOTP", "yes");
							}
							$.ajax({
								url: "create_user.php",
								data: postData,
								processData: false,
								contentType: false,
								type: "POST",
								success: function(msg){
									console.log(msg);
									var output = JSON.parse(msg);
									if(output.msg == "Success"){
										if(isVarified != null){
											if(isVarified == "yes"){
												//alert("yes");
												$("#phoneno").data("status", "");
												$("#verfied span").css("color", "#7f8c8d");
												$("#result").css("color", "#27ae60");
												//$('#result').append("Registration successful. Now you can login. <a href='user_login.php'>Click here</a> to login");
												alert("Registration successful. Now you can login.");
												window.location = "Login.php";
											}else{
												$("#regi_form").hide();
												$("#hdn_mobNumber").text(mobile.value);
												$("#dv_verify").show();
											}
										}else{
											$("#regi_form").hide();
											$("#hdn_mobNumber").text(mobile.value);
											$("#dv_verify").show();
										}
									}else{
										$("#result").css("color", "#e74c3c");
										$('#result').append(output.msg);
									}
								},
								error: function(err){
									if(err.status == 0){
										$("#result").css("color", "#e74c3c");
										$('#result').append("Unable to connect to server.");	
									}else{
										$("#result").css("color", "#e74c3c");
										$('#result').append("Something went wrong, try again");	
									}
								}
							});
						}
					}

					function verifyOTP(){
						var otp = $("#otp").val();
						if(otp == ""){
							alert("Enter OTP");
						}else{
							$.ajax({
								url: "verify_otp.php",
								data: {phoneno: $("#phoneno").val(), otp: otp},
								type: "POST",
								success: function(msg){
									//alert(msg);
									var output = JSON.parse(msg);
									if(output.msg == "Success"){
										$("#hdn_mobNumber").text("");
										$("#phoneno").data("status", "yes");
										$("#verfied span").css("color", "#27ae60");
										$("#dv_verify").hide();
										$("#regi_form").show();	
									}else{
										$("#otp_result").css("color", "#e74c3c");
										$('#otp_result').append(output.msg);	
									}
								},
								error: function(err){
									if(err.status == 0){
										$("#otp_result").css("color", "#e74c3c");
										$('#otp_result').append("Unable to connect to server.");	
									}else{
										$("#otp_result").css("color", "#e74c3c");
										$('#otp_result').append("Something went wrong, try again");	
									}	
								}
							});
						}					
					}
				</script>
				<div id="reg_form" >
					<div id="regi_form">
						<div style="text-align: center;padding-bottom: 10px;">
							<img src="../images/logo.png" class="login-img" alt="logo"/>
						</div>
						<div class="login-c1" style="height:420px !important;">
							<div class="cpadding50" style="padding-top: 20px;">
								<div id="result" style="text-align:center;font-size:15px;margin-bottom: 15px;"></div>
								<div style="margin-bottom: 10px;">
									<div style="display: inline-table;vertical-align: middle;width: 49%;">
										<input type="text" id="fname" name="fname" placeholder="First name" class="form-control" required />	
									</div>
									<div style="display: inline-table;vertical-align: middle;width: 49%;">
										<input type="text" id="lname" name="lname" placeholder="Last name" class="form-control" required />
									</div>
								</div>
								<div style="margin-bottom: 10px;">
									<div style="display: inline-block;vertical-align: middle;width: 84%;">
										<input type="tel" id="phoneno" title="Enter your mobile number" placeholder="Moible number" class="form-control" name="phoneno" required/>
									</div>
									<div style="display: inline-block;vertical-align: middle;width: 14%;">
										<span class="form-control" id="verfied" >
											<i class="fa fa-check" aria-hidden="true"></i>
										</span>
									</div>
								</div>
								<div style="margin-bottom: 10px;">
									<input type="email" id="email_id" title="Enter your Email ID" placeholder="E-mail address" class="form-control" name="email_id" required />
								</div>
								<div style="margin-bottom: 10px;">
									<textarea id="address" placeholder="Address" name="address" class="form-control" required></textarea>
								</div>
								<div style="margin-bottom: 10px;">
									<input type="file" id="profile_pic" name="profile_pic" multiple accept='image/*' class="form-control"/>
								</div>
								<div style="margin-bottom: 10px;">
									<input type="password" id="password" placeholder="set new password" name="password" class="form-control" required />
								</div>
								<div style="margin-bottom: 10px;">
									<input type="password" id="repeat_password" placeholder="repeat new password" name="repeat_password" class="form-control" required />
								</div>
							</div>
						</div>
						<div class="login-c2" style="height:470px !important">
							<div class="logmargfix">
								<div class="chpadding50">
									<div class="alignbottom" style="margin-right: 0;right: 10px !important;">
										<button class="btn-search4" name="user_registration" onclick="RegisterUser();" type="button" onclick="errorMessage()">Register</button>							
									</div>
									<div class="alignbottom2"></div>
								</div>
							</div>
						</div>
						<div class="login-c3" style="margin-top: 520px !important;margin-bottom:30px !important;">
							<div class="left"><a href="../../index.php" class="whitelink"><span></span>Website</a></div>
							<div class="right"><a href="Login.php" class="whitelink">Login here</a></div>
						</div>
					</div>
					<div id="dv_verify" style="display: none;">
						<div style="text-align: center;padding-bottom: 10px;">
							<img src="../images/logo.png" class="login-img" alt="logo"/>
						</div>
						<div class="login-c1" style="height:230px !important;">
							<div class="cpadding50">
								<div style="margin-bottom: 10px;text-align: center;">
									<p>We have sent a verification code on your number <span id="hdn_mobNumber"></span></p>
								</div>
								<div style="margin-bottom: 10px;">
									<input type="text" id="otp" title="Enter your OTP" maxlength="8" placeholder="Enter OTP" class="form-control" name="otp" required />
								</div>
								<!-- <div style="text-align: center;" onclick="resendOTP();">
									<p style="text-decoration: underline;font-size: 12px;font-weight: bold;">
										RESEND OTP
									</p>
								</div> -->
								<div style="text-align: center;">
									<button class="btn-search4" style="width: 100%;" onclick="verifyOTP();">VERIFY</button>
								</div>
							</div>
						</div>
					</div>
				</div>	
				<script>
				  	$("#phoneno").intlTelInput({
					  initialCountry: "auto",
					  	geoIpLookup: function(callback) {
							$.get('http://ipinfo.io', function() {}, "jsonp").
								always(function(resp) {
						  		var countryCode = (resp && resp.country) ? resp.country : "";
						  		callback(countryCode);
						  		//alert(countryCode);
							});
					  	},
					  	utilsScript: "../assets/js/utils.js", // just for formatting/placeholders etc
						autoPlaceholder: true
					});
				</script>		
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