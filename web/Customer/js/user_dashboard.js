function changePassword(){
	var username = $('#user_name').val();
	var oldPassword = $('#old_password').val();
	var newPassword = $('#new_password').val();
	
	if(username == ""){
		alert("Enter Username");
		$('#user_name').focus();
	}else if(oldPassword == ""){
		alert("Enter Old Password");
		$('#old_password').focus();
	}else if(newPassword == ""){
		alert("Enter New Password");
		$('#new_password').focus();
	}else{
		$.ajax({
			type: 'POST',
			url: 'update_userPassword.php',
			data: {uname:username,oldpword:oldPassword,newpword:newPassword},
			success: function(response) {
				alert(response);
				if(response == "success"){
					alert("Your password updated successfully!");
					$('#user_name').val();
					$('#old_password').val();
					$('#new_password').val();
				}else{
					alert(response);
				}
			},
			error: function(error){
				if(error.status == "0"){
					alert("Unable to connect server, Try again.");
				}else{
					alert("Something went wrong, Try again.");
				}
			}
		});
	}
}
function UpdateUserDtls(custID){
	var name = $("#name").val();
	var email = $("#email").val();
	var phoneno = $("#phoneno").val();
	var adrs = $("#adrs").val();
	
	var mob = /^[1-9]{1}[0-9]{9}$/;
	var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
	
	if(name == ""){
		alert("Enter Fullname");
		$("#name").focus();
	}else if (!/^[a-zA-Z-, ]*$/g.test(name)) {
        alert("You cannot enter numeric values in Name");
        $("#name").focus();
    }else if(phoneno == ""){
		alert("Enter Mobile Number");
		$("#phoneno").focus();
	}else if (mob.test(phoneno) == false) {
        alert("Mobile number should match 9xxxxxxxx2");
        $("#phoneno").focus();
    }else if(email == ""){
		alert("Enter Email Id");
		$("#email").focus();
	}else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
        alert("Not a valid e-mail address");
		$("#email").focus();
    }else if(adrs == ""){
		alert("Enter Address");
		$("#adrs").focus();
	}else{
		$.ajax({
			type: 'POST',
			url: 'update_userProfile.php',
			data: {custID:custID, name:name, emailID:email, phoneno:phoneno, adrs:adrs},
			success: function(response) {
				//alert(response);
				if(response == "success"){
					alert("Your Profile updated successfully!");
					$('#name').val();
					$('#email').val();
					$('#phoneno').val();
					$('#adrs').val();
					window.location = "user_dashboard.php";
				}else{
					alert(response);
				}
			},
			error: function(error){
				if(error.status == "0"){
					alert("Unable to connect server, Try again.");
				}else{
					alert("Something went wrong, Try again.");
				}
			}
		});
	}
}
function LoadReviews(email){
	$.ajax({
		type: 'POST',
		url: 'show_userComments.php',
		data: {uname:email},
		success: function(response) {
			//alert(response);
			var a = JSON.parse(response);
			if(a.length > 0){
				for(i=0; i<a.length; i++){
					var data = '<div class="wh10percent left textleft">';
					data += '<div class="circlewrap2">';
					data += '<img width="50" alt="" class="circleimg" src="'+a[i].driver_photo+'">';
					data += '</div>';
					data += '</div>';
					data += '<div class="wh80percent right">';
					data += '<a href="#" class="lblue bold">';
					data += a[i].driver_name+" ("+a[i].vehicle_no+") ";
					data += '</a>';
					data += '<br/>';
					data += a[i].comment;
					data += '<br/>';
					data += '</div>';
					data += '<div class="clearfix"></div>';
					data += '<div class="line4"></div>';
					$("#loadReview").append(data);
				}
			}else{
				$("#loadReview").append("<center>No Records Found!</center>");
			}
		},
		error: function(error){
			if(error.status == "0"){
				alert("Unable to connect server, Try again.");
			}else{
				alert("Something went wrong, Try again.");
			}
		}
	});
}