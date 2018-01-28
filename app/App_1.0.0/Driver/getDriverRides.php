<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$driverID = $_POST['driverID'];

$outp = '[';
if($driverID != ""){
	$query = mysqli_query($conn, "select * from tbl_drivers where driver_id='".$driverID."'");
	$num = mysqli_num_rows($query);
	if($num != 0){
		$query2 = mysqli_query($conn, "select * from tbl_customer_trips where driver_id='".$driverID."' and status='Finished'");
		$num2 = mysqli_num_rows($query2);
		if($num2 != 0){
			while($row2 = mysqli_fetch_assoc($query2)){
				$date = $row2['start_date'];
				$start_time = $row2['start_time'];
				$custID = $row2['cust_id'];
				date_default_timezone_set('Asia/Kolkata');
				$now = date("d/m/Y");
				if($now == $date){
					$newDate = "Today";
				}else{
					$date = $date." ".$start_time;
					$newDate = date_create_from_format("d/m/Y h:i A",$date);
					$newDate = date_format($newDate,"D, d M y");
				}
				$query3 = mysqli_query($conn, "select * from tbl_customers where cust_id='".$custID."'");
				$num3 = mysqli_num_rows($query3);
				if($num3 != 0){
					$row3 = mysqli_fetch_assoc($query3);
					$first_name = $row3['first_name'];
					$last_name = $row3['last_name'];
					$custName = $first_name."".$last_name;
					$custPic = $row3['picture'];
				}
				$startPlace = $row2['start_place'];
				$endPlace = $row2['end_place'];
				$totalFee = $row2['total_fee'];
				$bookingID = $row2['booking_id'];

				if($outp != '['){ $outp .= ',';};
			
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
}
$outp .= ']';
echo $outp;
mysqli_close($conn);
?>