<?php
include '../../Includes/db.php';

$driverID = $_POST['driver_id'];
$total_amount = $_POST['total_amount'];
$amount_received = $_POST['amount_received'];
$received_date = $_POST['received_date'];
$received_by = $_POST['received_by'];
$reference_no = $_POST['reference_no'];
$on_collected_month = date('m');
$on_collected_year = date('Y');
$due_amount = floatval($total_amount) - floatval($amount_received);


$query = "insert into tbl_amount_collection_from_driver (driver_id, total_amount, amount_collected, on_collected_date, received_by, reference_no, on_collected_month, on_collected_year, due_amount) values ('".$driverID."' ,'".$total_amount."', '".$amount_received."', '".$received_date."', '".$received_by."', '".$reference_no."', '".$on_collected_month."', '".$on_collected_year."', '".$due_amount."')";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else{
	echo "something went wrong, Try again.";
}
?>