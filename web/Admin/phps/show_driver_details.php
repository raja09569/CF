<?php
include '../../Includes/db.php';

$driverID = $_POST['driverID'];

$query = mysqli_query($conn, "select name, email_id, mobile_number, registered_date, driver_photo, duty_status, is_activated, vehicle_category, vehicle_no, owner_name, vehicle_name, is_ac_available, licence_no, is_onRide, address, locality, city, state, country, pincode, vehicle_photo, bank_name, bank_ac_no, IFSCcode, bank_location, other_details from tbl_drivers where driver_id='".$driverID."' and is_deleted!='yes'");
$num = mysqli_num_rows($query);
$outp = '';
if($num > 0){
	$row = mysqli_fetch_assoc($query);

	$name = $row['name'];
	$emailID = $row['email_id'];
	$mobileNumber = $row['mobile_number'];
	$regOn = $row['registered_date'];
	$dutyStatus = $row['duty_status'];
	if($dutyStatus == "on"){
		$dutyStatus = "On Duty";
	}else{
		$dutyStatus = "Off Duty";
	}
	$isActivated = $row['is_activated'];
	if($isActivated == "yes"){
		$query1 = mysqli_query($conn, "select on_date from tbl_driver_activation_tracking where driver_id='".$driverID."' order by on_date desc limit 1");
		$num1 = mysqli_num_rows($query1);
		if($num1 > 0){
			$row1 = mysqli_fetch_assoc($query1);
			$activationDate = $row1['on_date'];
			$activationDate = date("d D M y, h:i A", strtotime($activationDate));
		}else{
			$activationDate = "Not Yet";
		}
		$isActivated = "Active";
	}else{
		$activationDate = "Not Yet";
		$isActivated = "DeActive";
	}
	$regOn = date("d D M y, h:i A", strtotime($regOn));
	$vehicleCategory = $row['vehicle_category'];
	$query2 = mysqli_query($conn, "select name from tbl_cab_categories where category_id='".$vehicleCategory."'");
	$num2 = mysqli_num_rows($query2);
	if($num2 > 0){
		$row2 = mysqli_fetch_assoc($query2);
		$categoryName = $row2['name'];
	}else{
		$categoryName = "";
	}
	$vehicleNumber = $row['vehicle_no'];
	$ownerName = $row['owner_name'];
	$vehicleName = $row['vehicle_name'];
	$condition = $row['is_ac_available'];
	if($condition == "ye"){
		$condition = "ac";
	}else{
		$condition = "nonAC";
	}
	$licenceNo = $row['licence_no'];
	$vehicleStatus = $row['is_onRide'];
	$address = $row['address'];
	$locality = $row['locality'];
	$city = $row['city'];
	$state = $row['state'];
	$country = $row['country'];
	$zipCode = $row['pincode'];
	$bankName = $row['bank_name'];
	$acNo = $row['bank_ac_no'];
	$IFSCcode = $row['IFSCcode'];
	$bankLocation = $row['bank_location'];
	$otherDetails = $row['other_details'];
	if($vehicleStatus == ""){
		$vehicleStatus = "Available";
	}
	$drImage = $row['driver_photo'];
	$vhclImage = $row['vehicle_photo'];

	$outp = '{"msg": "success", "name": "'.$name.'", "driverID": "'.$driverID.'", "EmailID": "'.$emailID.'", "Mobile":"'.$mobileNumber.'", "regOn": "'.$regOn.'", "duty": "'.$dutyStatus.'", "isActivated": "'.$isActivated.'", "activatedOn": "'.$activationDate.'", "categoryName": "'.$categoryName.'", "category": "'.$vehicleCategory.'", "vehicleName": "'.$vehicleName.'", "vehicleNumber": "'.$vehicleNumber.'", "ownerName": "'.$ownerName.'", "condition": "'.$condition.'", "LicenceNo": "'.$licenceNo.'", "vehicleStatus": "'.$vehicleStatus.'", "address": "'.$address.'", "locality": "'.$locality.'", "city": "'.$city.'", "state": "'.$state.'", "country": "'.$country.'", "zipCode": "'.$zipCode.'", "bankName": "'.$bankName.'", "ACno": "'.$acNo.'", "IFSCcode": "'.$IFSCcode.'", "bankLocation": "'.$bankLocation.'", "otherDetails": "'.$otherDetails.'", "drImage": "'.$drImage.'", "vhclImage": "'.$vhclImage.'"}';
}else{
	$outp = '{"msg":"Invalid Driver"}';
}
echo $outp;
?>