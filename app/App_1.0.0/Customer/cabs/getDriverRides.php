<?php
header('Access-Control-Allow-Origin: *');
include '../db.php';

$driverID = $_POST['driverID'];
$outp = '[';
if($driverID != ""){
	$query = mysqli_query($conn, "select * from drivers where s_no='".$driverID."'");
	$num = mysqli_num_rows($query);
	if($num != 0){
		$query2 = mysqli_query($conn, "select * from customer_trips where driver_id='".$driverID."'");
		$num2 = mysqli_num_rows($query2);
		if($num2 != 0){
			if($outp != '['){ $outp .= ',';};
			$row2 = mysqli_fetch_assoc($query2);
			$date = $row2['start_date'];
			$custID = $row2['cust_id'];
			date_default_timezone_set('Asia/Kolkata');
			$now = date("d/m/Y");
			if($now == $startdt){
				$newDate = "Today";
			}else{
				$newDate = date("D, M d y", strtotime($date));
			}
			$query3 = mysqli_query($conn, "select * from tbl_customers where cust_id='".$custID."'");
			$num3 = mysqli_fetch_assoc($query3);
			if($num3 != 0){
				$row3 = mysqli_fetch_assoc($query3);
				$custName = $row3['name'];
				$custPic = $row3['photo'];
			}
			$startPlace = $row2['start_place'];
			$endPlace = $row2['end_place'];
			$totalFee = $row2['total_fee'];
			$bookingID = $row2['booking_id'];
			
			$outp .= '{"startPlace":"'.$startPlace.'",';
			$outp .= '"endplace":"'.$endPlace.'",';
			$outp .= '"date":"'.$newDate.'",';
			$outp .= '"amount":"'.$totalfee.'",';
			$outp .= '"pic":"'.$custPic.'",';
			$outp .= '"bookingID":"'.$bookingID.'",';
			$outp .= '"custName":"'.$custName.'"}';
			
		}
	}	
}
$outp .= ']';
echo $outp;
mysqli_close($conn);
?>