<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$driverID = $_POST['driverID'];
$regID = $_POST['regID'];

$query = mysqli_query($conn, "select * from tbl_drivers where driver_id='".$driverID."'");
$num = mysqli_num_rows($query);
if($num != 0){
	$query2 = mysqli_query($conn, "update tbl_drivers set reg_id='".$regID."' where driver_id='".$driverID."'");
	if($query2){
		$outp = '{"msg":"success"}';
	}else{
		$outp = '{"msg":"Something went wrong, Try again."}';
	}
}else{
	$outp = '{"msg":"Invalid Driver!"}';
}

echo $outp;
?>