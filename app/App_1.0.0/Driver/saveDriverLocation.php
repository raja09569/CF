<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$driverID = $_POST['driverID'];
$location = $_POST['location'];
$lattitude = $_POST['lattitude'];
$longitude = $_POST['longitude'];

date_default_timezone_set('Asia/Kolkata');

$date = date("Y-m-d");
$time = date("H:i:s");

$query = mysqli_query($conn, "select * from tbl_drivers where driver_id = '".$driverID."'");
$num = mysqli_num_rows($query);
if($num != 0){
	$query2 = mysqli_query($conn, "insert into tbl_driver_locations (driver_id, location, lattitude, longitude, date, time) 
	values ('".$driverID."', '".$location."', '".$lattitude."', '".$longitude."', '".$date."', '".$time."')");
	if($query2){
		$query3 = mysqli_query($conn, "update tbl_drivers set current_location='".$location."',lattitude='".$lattitude."',longitude='".$longitude."' where driver_id='".$driverID."'");
		if($query3){
			echo "success";
		}else{
			echo "Something went wrong, Try again.";
		}
	}else{
		echo "Something went wrong, Try again.";
	}
}else{
	echo "Invalid Driver";
}

mysqli_close($conn);
?>