<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$bookingID = $_POST['bookingID'];

$outp = '[';
if($bookingID != ""){
	$query = mysqli_query($conn, "select * from tbl_customer_trips where booking_id='".$bookingID."'");
	$num = mysqli_num_rows($query);
	if($num != 0){
		if($outp != '['){ $outp .= ',';};
		$row = mysqli_fetch_assoc($query);
		$date = $row['start_date'];
		$start_time = $row['start_time'];
		$bookingID = $row['booking_id'];
		date_default_timezone_set('Asia/Kolkata');
		$now = date("d/m/Y");
		if($now == $date){
			$newDate = "Today";
		}else{
			$date = $date." ".$start_time;
			$newDate = date_create_from_format("d/m/Y h:i A",$date);
			$newDate = date_format($newDate,"D, d M y");
		}
		$startPlaceLatLng = $row['startPlace_latlng'];
		$endPlaceLatLng = $row['endPlace_latlng'];
		$startTime = $row['start_time'];
		$endTime = $row['end_time'];
		$startPlace = $row['start_place'];
		$endPlace = $row['end_place'];
		$totalFee = $row['total_fee'];
		$rideFare = $row['rideFare'];
		$tax = $row['tax'];
		
		$custID = $row['cust_id'];
		
		$query3 = mysqli_query($conn, "select * from tbl_customers where cust_id='".$custID."'");
		$num3 = mysqli_num_rows($query3);
		if($num3 != 0){
			$row3 = mysqli_fetch_assoc($query3);
			$first_name = $row3['first_name'];
			$last_name = $row3['last_name'];
			$custName = $first_name."".$last_name;
			$custPic = $row3['picture'];
			$custEmail = $row3['email_id'];
			$custNumber = $row3['mobile_number'];
		}
		
		$outp .= '{"startPlace":"'.$startPlace.'",';
		$outp .= '"endplace":"'.$endPlace.'",';
		$outp .= '"date":"'.$newDate.'",';
		$outp .= '"amount":"Rs '.$rideFare.'",';
		$outp .= '"tax":"Rs '.$tax.'",';
		$outp .= '"total":"Rs '.$totalFee.'",';
		$outp .= '"amountBy":"",';
		$outp .= '"custPic":"'.$custPic.'",';
		$outp .= '"custName":"'.$custName.'",';
		$outp .= '"custEmail":"'.$custEmail.'",';
		$outp .= '"custNumber":"'.$custNumber.'",';
		$outp .= '"startTime":"'.$startTime.'",';
		$outp .= '"endTime":"'.$endTime.'",';
		$outp .= '"startPlaceLatLng":"'.$startPlaceLatLng.'",';
		$outp .= '"endPlaceLatLng":"'.$endPlaceLatLng.'",';
		$outp .= '"bookingID":"'.$bookingID.'"}';
		
	}	
}
$outp .= ']';
echo $outp;
mysqli_close($conn);
?>