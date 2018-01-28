<?php
header('Access-Control-Allow-Origin: *');
include '../db.php';

if(isset($_POST['bookingID'])){
	
	$bookingID = $_POST['bookingID'];
	
	$query2 = mysqli_query($conn, "select * from tbl_customer_trips where booking_id='".$bookingID."'");
	$num2 = mysqli_num_rows($query2);
	if($num2 != 0){	
		$row2 = mysqli_fetch_assoc($query2);
		$driverID = $row2['driver_id'];
		$cust_id = $row2['cust_id'];
		
		$query = mysqli_query($conn, "select * from tbl_drivers where driver_id='".$driverID."'");
		$row = mysqli_fetch_assoc($query);
		$driverName = $row['name'];
		$cab_regn_no = $row['vehicle_no'];
		$current_location = $row['current_location'];
		$lattitude = $row['lattitude'];
		$longitude = $row['longitude'];
		$vehicle_photo = $row['vehicle_photo'];
		
		if(isset($_POST['custLat'])){
			$custLat = $_POST['custLat'];
			$custLng = $_POST['custLng'];		
		
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
		
		}else{
			$dist = "";
			$time = "";	
		}
				
		$phone_no = $row['mobile_number'];
		$vehicle_name = $row['vehicle_category'];
		
		$query3 = mysqli_query($conn, "select * from tbl_cab_categories where category_id='".$vehicle_name."'");
		$row3 = mysqli_fetch_assoc($query3);
		$vehicle_name = $row3['name'];
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
		
		$query4 = mysqli_query($conn, "select * from tbl_driver_comments where booking_id='".$bookingID."'");
		$num4 = mysqli_num_rows($query4);
		if($num4 != 0){
			$row4 = mysqli_fetch_assoc($query4);
			$cmnt = $row4['comment'];
		}else{
			$cmnt = "";
		}
		
		$outp = '{"timeLeft":"'.$time.'",';
		$outp .= '"distLeft":"'.$dist.'",';
		$outp .= '"vehicle_name":"'.$vehicle_name.'",';
		$outp .= '"cab_regn_no":"'.$cab_regn_no.'",';
		$outp .= '"driver_photo":"'.$driver_photo.'",';
		$outp .= '"vehicle_photo":"'.$vehicle_photo.'",';
		$outp .= '"driverID":"'.$driverID.'",';
		$outp .= '"custID":"'.$cust_id.'",';
		$outp .= '"driverName":"'.$driverName.'",';
		$outp .= '"comment":"'.$cmnt.'",';
		$outp .= '"phone_no":"'.$phone_no.'",';
		$outp .= '"current_location":"'.$current_location.'",';
		$outp .= '"lattitude":"'.$lattitude.'",';
		$outp .= '"longitude":"'.$longitude.'",';
		$outp .= '"totalFare":"'.$totalFare.'",';
		$outp .= '"startPlace":"'.$startPlace.'",';
		$outp .= '"startLatLng":"'.$startLatLng.'",';
		$outp .= '"endPlace":"'.$endPlace.'",';
		$outp .= '"endLatLng":"'.$endLatLng.'",';
		$outp .= '"pickTime":"'.$pickTime.'",';
		$outp .= '"startTime":"'.$startTime.'",';
		$outp .= '"endTime":"'.$endTime.'",';
		$outp .= '"status":"'.$status.'"}';
		
	}
	
}

echo $outp;

?>