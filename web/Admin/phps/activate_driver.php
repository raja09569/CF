<?php
include '../../Includes/db.php';

$driverID = $_POST['driverID'];
$status = $_POST['status'];

$query1 = mysqli_query($conn, "select driver_id from tbl_drivers where driver_id='".$driverID."'");
$num1 = mysqli_num_rows($query1);
if($num1 > 0){
	$query = mysqli_query($conn, "update tbl_drivers set is_activated='".$status."' where driver_id='".$driverID."'");
	if($query){
		$query2 = mysqli_query($conn, "insert into tbl_driver_activation_tracking (driver_id, activation_status, on_date) values ('".$driverID."','".$status."',now())");
		if($query2){
			echo "success";
		}else{
			echo "Something happend try again.";
		}
	}else{
		echo "Something happend try again.";
	}
}else{
	echo "Invalid Driver";
}
mysqli_close($conn);
?>