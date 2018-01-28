<?php
include 'db.php';

$cab_type = $_POST['vehicle_type'];
$cfph = $_POST['cfph'];
//$cfpd = $_POST['cfpd'];
$ccph = $_POST['ccph'];
//$ccpd = $_POST['ccpd'];
//echo $cab_type;
if($cab_type != "Select CabType"){
$query = mysqli_query($conn, "select * from customer_fee where vehicle_type='$cab_type'");
$num = mysqli_num_rows($query);
if($num != 0){
echo "Already added!";
}else{
$query2 = mysqli_query($conn, "insert into customer_fee (vehicle_type, customer_fee_per_km, 
customer_fee_per_day, owner_comm_per_trip, comm_perc_per_day) values ('$cab_type','$cfph',''
,'$ccph','')");
if($query2){
	echo "success";
}else{
echo "Something happend! try again.";
}
}
}else{
echo "Enter cab type";
}	
?>