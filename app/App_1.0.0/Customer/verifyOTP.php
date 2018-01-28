<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$mobile = $_POST['mobile'];
$otp = $_POST['otp'];
$query2 = mysqli_query($conn, "select * from tbl_verification_codes where mobile='".$mobile."' and verification_code='".$otp."'");
$num2 = mysqli_num_rows($query2);
if($num2 != 0){
	$query3 = mysqli_query($conn, "update tbl_verification_codes set verification_code='' where mobile='".$mobile."'");
	echo "success";
}else{
	echo "Invalid OTP, Try again.";
}
mysqli_close($conn);
?>