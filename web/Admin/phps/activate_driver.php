<?php
include '../../Includes/db.php';

$sno = $_POST['id'];
$status = $_POST['status'];
$query = mysqli_query($conn, "update tbl_drivers set is_activated='".$status."' where driver_id='".$sno."'");
if($query){
	$query2 = mysqli_query($conn, "insert into tbl_driver_activation_tracking (driver_id, activation_status, on_date) values ('".$sno."','".$status."',now())");
	if($query2){
		echo "success";
	}else{
		echo "Something happend try again.";
	}
}else{
	echo "Something happend try again.";
}

mysqli_close($conn);
?>