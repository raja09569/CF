<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$driverID = $_POST['driverID'];
$status = $_POST['status'];

$query = mysqli_query($conn, "select * from tbl_drivers where driver_id='".$driverID."'");
$num = mysqli_num_rows($query);
if($num != 0){
	$query2 = mysqli_query($conn, "update tbl_drivers set duty_status='".$status."' where driver_id='".$driverID."'");
	if($query2){
		echo "success";
	}else{
		echo "Something went wrong, try again.";
	}
}else{
	echo "Invalid Driver!";
}

?>