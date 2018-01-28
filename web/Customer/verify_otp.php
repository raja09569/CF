<?php
require_once '../Includes/db.php';

$mobile = $_POST['phoneno'];
$otp = $_POST['otp'];

if($mobile == ""){
	$outp = '{"msg": "Parameters should not be empty"}';
	echo $outp;
	exit();
}
if($otp == ""){
	$outp = '{"msg": "Parameters should not be empty"}';
	echo $outp;
	exit();
}

$query = mysqli_query($conn, "select mobile from tbl_verification_codes where mobile='".$mobile."' and verification_code='".$otp."'");
$num = mysqli_num_rows($query);
if($num > 0){
	$query1 = mysqli_query($conn, "update tbl_verification_codes set verification_code='' where mobile='".$mobile."'");
	$outp = '{"msg": "Success"}';
	echo $outp;
	exit();
}else{
	$outp = '{"msg": "Otp incorrect, Try again."}';
	echo $outp;
	exit();
}


?>