<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$driverID = $_POST['driverID'];

$query = mysqli_query($conn, "select * from tbl_drivers where driver_id='".$driverID."'");
$num = mysqli_num_rows($query);
$outp = '[';
if($num != 0){
	$row = mysqli_fetch_assoc($query);
	$status = $row['is_activated'];
	$outp .= '{"msg":"success","status":"'.$status.'"}';
}else{
	$outp .= '{"msg":"Invalid Driver!"}';
}
$outp .= ']';
echo $outp;
?>