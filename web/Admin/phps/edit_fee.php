<?php
include '../../Includes/db.php';

$id = $_POST['id'];
$cabtype = $_POST['cab_type'];
$cfpk = $_POST['cfpk'];
$ocpt = $_POST['ocpt'];

$query = mysqli_query($conn, "update customer_fee set vehicle_type='".$cabtype."',customer_fee_per_km='".$cfpk."',owner_comm_per_trip='".$ocpt."' where s_no='".$id."'");
if($query){
	echo "success";
}else{
	echo "Something went wrong, Try again.";
}

?>