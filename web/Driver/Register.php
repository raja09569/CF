<?php
include '../Includes/db.php';
include 'Includes/header.php';
?>
<div class="container breadcrub">
<div>
<a class="homebtn left" href="#"></a>
<div class="left">
<ul class="bcrumbs">
<li>/</li>
<li><a href="../index.php">Home</a></li>
<li>/</li>
<li><a href="Driver/Register.php">Driver Registration</a></li>				
</ul>				
</div>
<a class="backbtn right" href="#"></a>
</div>
<div class="clearfix"></div>
<div class="brlines"></div>
</div>
<link rel="stylesheet" type="text/css" media="all" href="../css/style.css">
<div class="container">
<script src="../assets/js/jquery.v2.0.3.js"></script>
<script>
function RegisterDriver(){
	
	$(window).scrollTop(0);
	
	var driverPhoto = document.getElementById('driver_photo').files[0];
	var driverName = document.getElementById('driverName').value;
	var mobile = document.getElementById('phoneno').value;
	var emailId = document.getElementById('email_id').value;
	var adrs = document.getElementById('address').value;
	var location = document.getElementById('location').value;
	var city = document.getElementById('city').value;
	var state = document.getElementById('state').value;
	var country = document.getElementById('country').value;
	var pin = document.getElementById('pin').value;
	var vehicle_photo = document.getElementById('vehicle_photo').files[0];
	var cab_type = document.getElementById('cab_type').value;
	var cab_regno = document.getElementById('cab_regno').value;
	var vehicle_name = document.getElementById('vehicle_name').value;
	var isacVehicle = document.getElementById('isacVehicle').value;
	var license = document.getElementById('license').value;
	var bank_name = document.getElementById('bank_name').value;
	var bank_ac_no = document.getElementById('bank_ac_no').value;
	var bank_ifsc_code = document.getElementById('bank_ifsc_code').value;
	var bank_location = document.getElementById('bank_location').value;
	var owner_name = document.getElementById('owner_name').value;
	var driver_other_details = document.getElementById('driver_other_details').value;
	var mob = /^[1-9]{1}[0-9]{9}$/;
	var atpos = emailId.indexOf("@");
    var dotpos = emailId.lastIndexOf(".");
	
	if(document.getElementById("driver_photo").files.length == 0){
		alert("Select Driver Photo");
		$('#driver_photo').focus();
	}else if(driverName == ""){
		alert("Enter Fullname");
		$('#driverName').focus();
	}else if (!/^[a-zA-Z, ]*$/g.test(driverName)) {
        alert("You cannot enter numeric values in Name");
        $('#driverName').focus();
    }else if(mobile == ""){
		alert("Enter Mobile Number");
		$('#phoneno').focus();
	}else if (mob.test(mobile) == false) {
        alert("Mobile number should match 9xxxxxxxx2");
        $('#phoneno').focus();
    }else if(emailId == ""){
		alert("Enter Email Id");
		$('#email_id').focus();
	}else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=emailId.length) {
        alert("Not a valid e-mail address");
		$('#email_id').focus();
    }else if(adrs == ""){
		alert("Enter Address");
		$('#address').focus();
	}else if(location == ""){
		alert("Enter Location");
		$('#location').focus();
	}else if(city == ""){
		alert("Enter City");
		$('#city').focus();
	}else if (!/^[a-zA-Z, ]*$/g.test(city)) {
        alert("You cannot enter numeric values in City");
        $('#city').focus();
    }else if(state == ""){
		alert("Enter State");
		$('#state').focus();
	}else if (!/^[a-zA-Z, ]*$/g.test(state)) {
        alert("You cannot enter numeric values in State");
        $('#state').focus();
    }else if(country == ""){
		alert("Enter Country");
		$('#country').focus();
	}else if (!/^[a-zA-Z]*$/g.test(country)) {
        alert("You cannot enter numeric values in Country");
        $('#country').focus();
    }else if(pin == ""){
		alert("Enter PinCode");
		$('#pin').focus();
	}else if(document.getElementById("vehicle_photo").files.length == 0){
		alert("Select Vehicle Photo");
		$('#vehicle_photo').focus();
	}else if(cab_type == "n"){
		alert("Select CabType");
		$('#cab_type').focus();
	}else if(cab_type == "No Records!"){
		alert("No Cabs Available!");
		$('#cab_type').focus();
	}else if(cab_regno == ""){
		alert("Enter Cab Regno");
		$('#cab_regno').focus();
	}else if(license == ""){
		alert("Enter Licence No");
		$('#license').focus();
	}else if(bank_name == ""){
		alert("Enter Bank Name");
		$('#bank_name').focus();
	}else if (!/^[a-zA-Z, ]*$/g.test(bank_name)) {
        alert("You cannot enter numeric values in Bank Name");
        $('#bank_name').focus();
    }else if(bank_ac_no == ""){
		alert("Enter Bank Ac No");
		$('#bank_ac_no').focus();
	}else if(owner_name == ""){
		alert("Enter Owner Name");
		$('#owner_name').focus();
	}else if (!/^[a-zA-Z, ]*$/g.test(owner_name)) {
        alert("You cannot enter numeric values in Owner Name");
        $('#owner_name').focus();
    }else{
		//alert(file.name);
		var data = new FormData();
		data.append('name',driverName);
		data.append('phone_no', mobile);
		data.append('email_id', emailId);
		data.append('address', adrs);
		data.append('location',location);
		data.append('city', city);
		data.append('state', state);
		data.append('country', country);
		data.append('pin', pin);
		data.append('cab_type', cab_type);
		data.append('cab_regno', cab_regno);
		data.append('vehicle_name', vehicle_name);
		data.append('is_ac_available', isacVehicle);
		data.append('license', license);
		data.append('bank_name', bank_name);
		data.append('bank_ac_no', bank_ac_no);
		data.append('ifsc_code', bank_ifsc_code);
		data.append('bank_location', bank_location);
		data.append('owner_name', owner_name);
		data.append('driver_other_details', driver_other_details);
		data.append('driver_photo', driverPhoto, driverPhoto.name);
		data.append('vehicle_photo', vehicle_photo, vehicle_photo.name);
		
		var xhr = new XMLHttpRequest();    
		 xhr.open('POST', 'add_driver.php', true);  

		 xhr.send(data);
		 xhr.onload = function () {                  

		 if (xhr.status === 200) {
		   
		   if(xhr.responseText == "success"){
			   alert("Registration successful. We will contact you soon");
			   document.getElementById("myForm").reset();
		   }else{
			   alert(xhr.responseText);
		   }
		  } else {
		   alert("Something went wrong, Try again.");
		  }
		  
		 };
	}
}
</script>
<form id="myForm">
<div class="col-1">
<label>
Drivr Photo
<input type="file" id="driver_photo" name="driver_photo" multiple accept='image/*' required />
<!--<input id="name" name="name" tabindex="1">-->
</label>
</div>
<div class="col-3">
<label>
Name
<input placeholder="What is your full name?" type="text" style="text-transform:capitalize;" class="input_type_text" id="driverName" tabindex="1" required />
<!--<input id="name" name="name" tabindex="1">-->
</label>
</div>
<div class="col-3">
<label>
Phone Number
<!--<input id="company" name="company"--> 
<input type="text" maxlength="10" 
placeholder="What is the best # to reach you?" class="input_type_text" 
id="phoneno"  tabindex="2" required/>
</label>
</div>

<div class="col-3">
<label>
Email
<!--<input id="phone" name="phone">-->
<input type="text" placeholder="What is your e-mail address?" class="input_type_text" id="email_id" tabindex="3" required />
</label>
</div>
<div class="col-2">
<label>
Address:
<!--<input placeholder="What is your e-mail address?" id="email" name="email">-->
<input placeholder="What is your address?" type="text" class="input_type_text" id="address" tabindex="4" required />
</label>
</div>

<div class="col-2">
<label>
Location
<!--<input placeholder="What is your e-mail address?" id="email" name="email">-->
<input placeholder="What is your location?" type="text" class="input_type_text" id="location" tabindex="5" required />
</label>
</div>
<div class="col-4">
<label>
City
<!--<input placeholder="What is your e-mail address?" id="email" name="email">-->
<input placeholder="What is your city?" type="text" class="input_type_text" id="city" tabindex="6" required />
</label>
</div>
<div class="col-4">
<label>
State
<!--<input placeholder="What is your e-mail address?" id="email" name="email">-->
<input placeholder="What is your state?" type="text" class="input_type_text" id="state" tabindex="7" required />
</label>
</div>
<div class="col-4">
<label>
Country
<!--<input placeholder="What is your e-mail address?" id="email" name="email">-->
<input placeholder="What is your country?" type="text" class="input_type_text" id="country" tabindex="8" required />
</label>
</div>
<div class="col-4">
<label>
PinCode
<!--<input placeholder="What is your e-mail address?" id="email" name="email">-->
<input placeholder="What is your pincode?" type="text" class="input_type_text" id="pin" tabindex="9" required />
</label>
</div>
<div class="col-4">
<label>
Bank Name
<input placeholder="will you mention Bank Name!" type="text" class="input_type_text" id="bank_name" tabindex="10" required />
</label>
</div>
<div class="col-4">
<label>
Bank Ac No
<input placeholder="will you mention bank ac no!" type="text" class="input_type_text" id="bank_ac_no" tabindex="11" required />
</label>
</div>
<div class="col-4">
<label>
IFSC Code
<input placeholder="will you mention Bank IFSC Code!" type="text" class="input_type_text" id="bank_ifsc_code" tabindex="12" required />
</label>
</div>
<div class="col-4">
<label>
Bank Location
<input placeholder="will you mention Bank Location" type="text" class="input_type_text" id="bank_location" tabindex="13" required />
</label>
</div>
<div class="col-1">
<label>
Vehicle Photo
<input type="file" id="vehicle_photo" name="vehicle_photo" multiple accept='image/*' required />
<!--<input id="name" name="name" tabindex="1">-->
</label>
</div>
<div class="col-3">
<label>
Cab Type
<select id="cab_type" tabindex="14" required>
<?php
$query = mysqli_query($conn, "select * from tbl_cab_categories");
$num = mysqli_num_rows($query);
if($num != 0){
?>
<option value='n'>--- select ---</option>
<?php
while($row = mysqli_fetch_assoc($query)){
?>
<option value="<?php echo $row['category_id'];?>"><?php echo $row['no_of_seats'];?> Seat(s) - <?php echo $row['name'];?></option>
<?php
}
}else{
?>
<option>No Records!</option>
<?php
}
?>
</select>
</label>
</div>
<div class="col-3">
<label>
Cab RegNo
<input placeholder="will you mention your cab registration no!" type="text" class="input_type_text" id="cab_regno" tabindex="15" required />
</label>
</div>
<div class="col-3">
<label>
Licence No
<input placeholder="What is your licence no?" type="text" class="input_type_text" id="license" tabindex="16" required />
</label>
</div>
<div class="col-4">
<label>
Vehicle Name
<input placeholder="What is your Vehicle name?" type="text" class="input_type_text" id="vehicle_name" tabindex="17" required />
</label>
</div>
<div class="col-4">
<label>
AC Available
<select id="isacVehicle" required>
	<option value="no">No</option>
	<option value="yes">YES</option>
</select>
</label>
</div>
<div class="col-4">
<label>
Owner Name
<input placeholder="What is Owner name?" type="text" class="input_type_text" id="owner_name" tabindex="17" required />
</label>
</div>
<div class="col-4">
<label>
Other Details
<input placeholder="Enter other details (if therer)" type="text" class="input_type_text" id="driver_other_details" tabindex="18" required />
</label>
</div>
<script>
function closeRegForm(){
	window.location = 'index.php';
}
</script>
<div class="col-submit">
	<center>
		<div style="display:inline-block;vertical-align:middle;margin-right:20px;">
			<input type="button" value="Cancel" class="form-control" style="width:150px;" onclick="closeRegForm();" />
		</div>
		<div style="display:inline-block;vertical-align:middle;margin-left:20px;">
			<input type="button" value="Register" class="form-control" style="width:150px;" onclick="RegisterDriver();" />
		</div>
	</center>
</div>
</form>  
</div>
<?php include 'Includes/footer2.php'?>