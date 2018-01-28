<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$mobile = $_POST['mobile'];
$pword = $_POST['pword'];
$deviceID = $_POST['deviceID'];

if($mobile != "" && $pword != ""){
	$query = mysqli_query($conn, "select * from tbl_drivers where mobile_number='".$mobile."'");
	$num = mysqli_num_rows($query);
	if($num != 0){
		$query2 = mysqli_query($conn, "update tbl_drivers set password='".$pword."', device_id='".$deviceID."' where mobile_number='".$mobile."'");
		if($query2){
			echo "success";
		}else{
			echo "Something went wrong, Try again.";
		}
	}else{
		echo "Invalid Mobile Number";
	}	
}
mysqli_close($conn);
?>