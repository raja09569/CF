<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';
if(!isset($_POST{'custID'})){
	exit;
}
$custID = $_POST['custID'];

$query3 = mysqli_query($conn, "select * from tbl_customer_trips where cust_id='".$custID."' order by booked_date desc");
$num3 = mysqli_num_rows($query3);

$outp = '[';

if($num3 != 0){
	while($row3 = mysqli_fetch_assoc($query3)){
		
		$isAcAvailable = $row3['isAcAvailable'];
		$driverid = $row3['driver_id'];
		
		$query4 = mysqli_query($conn, "select * from tbl_drivers where driver_id='".$driverid."'");
		$num4 = mysqli_num_rows($query4);
		$row4 = mysqli_fetch_assoc($query4);
		$name = $row4['name'];
		$cabtype = $row4['vehicle_category'];
		$vehicle_photo = $row4['vehicle_photo'];
		$cabno = $row4['vehicle_no'];
		$drPhoto = $row4['driver_photo'];
		
		$query5 = mysqli_query($conn, "select * from tbl_cab_categories where category_id='".$cabtype."'");
		$num5 = mysqli_num_rows($query5);
		$row5 = mysqli_fetch_assoc($query5);
		$cabname = $row5['name'];
		
		$startplace = $row3['start_place'];
		$startdt = $row3['start_date'];
		$starttm = $row3['start_time'];
		$endplace = $row3['end_place'];
		$endtm = $row3['end_time'];
		$enddt = $row3['end_date'];
		$totaldistance= $row3['total_distance'];
		$totalfee = "FCFA ".$row3['total_fee'];
		$status = $row3['status'];
		$bookingID = $row3['booking_id'];
		
		$date = $startdt." ".$starttm;
		
		date_default_timezone_set('Asia/Kolkata');
		$now = date("d/m/Y");
		if($now == $startdt){
			$newDate = "Today ".$starttm;
		}else{
			$newDate = date("D, M d", strtotime($date));
			$newDate = $newDate.", ".$starttm;
		}
		
		if($outp != '['){$outp .= ',';}
		$outp .= '{"startPlace":"'.$startplace.'",';
		$outp .= '"endplace":"'.$endplace.'",';
		$outp .= '"date":"'.$newDate.'",';
		$outp .= '"amount":"'.$totalfee.'",';
		$outp .= '"driver_pic":"'.$drPhoto.'",';
		$outp .= '"bookingID":"'.$bookingID.'",';
		$outp .= '"status":"'.$status.'",';
		$outp .= '"vehicle":"'.$cabname.'"}';

	}
	
}
$outp .= ']';

echo $outp;
?>