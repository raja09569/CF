<?php
include '../../Includes/db.php';

$driverID = $_POST['driverID'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$vehicleName = $_POST['vehicleName'];
$vehicleType = $_POST['vehicleType'];
$vehicleNumber = $_POST['vehicleNumber'];
$ownerName = $_POST['ownerName'];
$Licence = $_POST['Licence'];
$address = $_POST['address'];
$locality = $_POST['locality'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$zipCode = $_POST['zipCode'];
$bankName = $_POST['bankName'];
$bankAcNo = $_POST['bankAcNo'];
$bankIFSC = $_POST['bankIFSC'];
$bankLocation = $_POST['bankLocation'];
$otherDetails = $_POST['otherDetails'];
$condition = $_POST['condition'];

$query1 = mysqli_query($conn, "select driver_id from tbl_drivers where driver_id='".$driverID."'");
$num1 = mysqli_num_rows($query1);
if($num1 > 0){
	/*$row1 = mysqli_fetch_assoc($query1);
	$driverImage = $row1['driver_photo'];
	$vhclImage = $row1['vehicle_photo'];*/
	if(isset($_FILES['drImage'])){
		$drDir = '../../Driver/pics/';
		$fileName = $_FILES["drImage"]["name"];
		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		$target_file = $drDir.$driverID."PC.".$ext;
		if(move_uploaded_file($_FILES['drImage']['tmp_name'], $target_file)){

		}else{
			echo "Something wrong while uploading Driver image, try again!";
			exit;
		}
	}
	
	if(isset($_FILES['vhclImage'])){
		$vhclDir = '../../Driver/vehicle_pics/';	
		$fileName = $_FILES["vhclImage"]["name"];
		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		$target_file = $vhclDir.$driverID."VCL.".$ext;
		if(move_uploaded_file($_FILES['vhclImage']['tmp_name'], $target_file)){

		}else{
			echo "Something wrong while uploading Driver image, try again!";
			exit;
		}
	}
	
	$query = mysqli_query($conn, "update tbl_drivers set name='".$name."', mobile_number='".$mobile."', email_id='".$email."', address='".$address."', locality='".$locality."', city='".$city."', state='".$state."', country='".$country."', pincode='".$zipCode."', licence_no='".$Licence."', vehicle_category='".$vehicleType."', vehicle_no='".$vehicleNumber."', vehicle_name='".$vehicleName."', is_ac_available='".$condition."', bank_name='".$bankName."', bank_ac_no='".$bankAcNo."', IFSCcode='".$bankIFSC."', bank_location='".$bankLocation."', owner_name='".$ownerName."', other_details='".$otherDetails."' where driver_id='".$driverID."'");
	if($query){
		echo "success";
	}else{
		echo "Something went wrong, Try again.";
	}
}else{
	echo "Invalid Driver";
}

?>