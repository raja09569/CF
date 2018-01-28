<?php
header('Access-Control-Allow-Origin: *');
include '../db.php';

$driverID = $_POST['driverID'];
$custID = $_POST['custID'];
$bookingID = $_POST['bookingID'];
$comment = $_POST['comment'];
	
$query2 = mysqli_query($conn, "select * from tbl_drivers where driver_id='".$driverID."'");
$num2 = mysqli_num_rows($query2);
if($num2 != 0){	
	$query = mysqli_query($conn, "select * from tbl_driver_comments where driver_id='".$driverID."'
	and cust_id='".$custID."' and  booking_id='".$bookingID."' and comment='".$comment."' 
	and comment_date=now()");
	$num = mysqli_num_rows($query);
	if($num != 0){
		echo "Success";
	}else{
		$query1 = mysqli_query($conn, "insert into tbl_driver_comments (driver_id, cust_id, 
		booking_id, comment, comment_date) values ('".$driverID."', '".$custID."', '".$bookingID."',
		'".$comment."', now())");
		if($query1){
			echo "Success";
		}else{
			echo "Something went wrong, Try again.";
		}
	}
}

?>