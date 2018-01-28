<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$custID = $_POST['custID'];
$regID = $_POST['regID'];

$query = mysqli_query($conn, "select * from tbl_customers where cust_id='".$custID."'");
$num = mysqli_num_rows($query);

if($num != 0){
	$query2 = mysqli_query($conn, "update tbl_customers set reg_id='".$regID."' where cust_id='".$custID."'");
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