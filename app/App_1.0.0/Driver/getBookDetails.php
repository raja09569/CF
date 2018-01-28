<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$bookingID = $_POST['bookingID'];

$query = mysqli_query($conn, "select * from customer_trips where booking_id='".$bookingID."'");
$num = mysqli_num_rows($query);
if($num != 0){
	$row = mysqli_fetch_assoc($query);
	
	$custID = $row['cust_id'];
	
	$query2 = mysqli_query($conn, "select * from tbl_customers where cust_id='".$custID."'");
	$row2 = mysqli_fetch_assoc($query);
	$first_name = $row2['first_name'];
	$last_name = $row2['last_name']
	$name = $first_name." ".$last_name;
	$pic = $row2['picture'];
	$phoneno = $row2['mobile_number'];
	
}else{
	
}

?>