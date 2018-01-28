<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$custID = $_POST['custID'];
$status = $_POST['status'];
//echo $custID;
$query = mysqli_query($conn, "select * from tbl_customers where cust_id='".$custID."'");
$num = mysqli_num_rows($query);
if($num != 0){
	$query2 = mysqli_query($conn, "update tbl_customers set notification_status='".$status."' where cust_id='".$custID."'");
	if($query2){
		echo "success";
	}else{
		echo "something went wrong, try again.";
	}
}else{
	echo "Invalid Customer!";
}

?>