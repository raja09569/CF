<?php

header('Access-Control-Allow-Origin: *');

include 'db.php';

//$outp = '[';
if(isset($_POST['bookingID'])){
	
	$bookingID = $_POST['bookingID'];
	$custLat = $_POST['custLat'];
	$custLng = $_POST['custLng'];
	
	$query2 = mysqli_query($conn, "select * from customer_trips where booking_id='".$bookingID."'");
	$num2 = mysqli_num_rows($query2);
	if($num2 != 0){	
		$row2 = mysqli_fetch_assoc($query2);
		$driverID = $row2['driver_id'];
		
		$query = mysqli_query($conn, "select * from drivers where s_no='".$driverID."'");
		$row = mysqli_fetch_assoc($query);
		$driverName = $row['driver_name'];
		$cab_regn_no = $row['cab_regn_no'];
		$current_location = $row['current_location'];
		$lattitude = $row['lattitude'];
		$longitude = $row['longitude'];
		$vehicle_photo = $row['vehicle_photo'];
		
		$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lattitude.",".$longitude."&destinations=".$custLat.",".$custLng."&mode=driving&language=pl-PL";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		$response_a = json_decode($response, true);
		$dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
		$time = $response_a['rows'][0]['elements'][0]['duration']['text'];

		
		$phone_no = $row['phone_no'];
		$vehicle_name = $row['cab_type'];
		
		$query3 = mysqli_query($conn, "select * from cab_types where s_no='".$vehicle_name."'");
		$row3 = mysqli_fetch_assoc($query3);
		$vehicle_name = $row3['cab_type'];
		$driver_photo = $row['driver_photo'];
		
		$startPlace = $row2['start_place'];
		$endPlace = $row2['end_place'];
		$pickTime = $row2['start_date']." ".$row2['start_time'];
		$pickTime = date("D, M d, h:i A", strtotime($pickTime));
		$startTime = $row2['start_time'];
		$endTime = $row2['end_time'];
		$totalFare = "Rs".$row2['total_fee'];
		$startLatLng = $row2['startPlace_latlng'];
		$endLatLng = $row2['endPlace_latlng'];
		$status = $row2['status'];
		
		$outp = '{"timeLeft":"'.$time.'",';
		$outp .= '"distLeft":"'.$dist.'",';
		$outp .= '"vehicle_name":"'.$vehicle_name.'",';
		$outp .= '"cab_regn_no":"'.$cab_regn_no.'",';
		$outp .= '"driver_photo":"'.$driver_photo.'",';
		$outp .= '"vehicle_photo":"'.$vehicle_photo.'",';
		$outp .= '"driverName":"'.$driverName.'",';
		$outp .= '"phone_no":"'.$phone_no.'",';
		$outp .= '"status":"'.$status.'",';
		$outp .= '"current_location":"'.$current_location.'",';
		$outp .= '"lattitude":"'.$lattitude.'",';
		$outp .= '"longitude":"'.$longitude.'"}';
		
		/*$outp .= '{"driverName":"'.$driverName.'",';
		$outp .= '"cab_regn_no":"'.$cab_regn_no.'",';
		$outp .= '"current_location":"'.$current_location.'",';
		$outp .= '"lattitude":"'.$lattitude.'",';
		$outp .= '"longitude":"'.$longitude.'",';
		$outp .= '"phone_no":"'.$phone_no.'",';
		$outp .= '"startPlace":"'.$startPlace.'",';
		$outp .= '"startLatLng":"'.$startLatLng.'",';
		$outp .= '"endPlace":"'.$endPlace.'",';
		$outp .= '"endLatLng":"'.$endLatLng.'",';
		$outp .= '"pickTime":"'.$pickTime.'",';
		$outp .= '"totalFare":"'.$totalFare.'",';
		$outp .= '"vehicle_name":"'.$vehicle_name.'",';
		$outp .= '"startTime":"'.$startTime.'",';
		$outp .= '"endTime":"'.$endTime.'",';
		$outp .= '"distLeft":"'.$dist.'",';
		$outp .= '"timeLeft":"'.$time.'",';
		$outp .= '"status":"'.$status.'",';
		$outp .= '"driver_photo":"'.$driver_photo.'"}';*/
	
	}
	
}

//$outp .= ']';
echo $outp;

?>