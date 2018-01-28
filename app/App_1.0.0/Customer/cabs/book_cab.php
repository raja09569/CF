<?php
header('Access-Control-Allow-Origin: *');
include '../db.php';

if(isset($_POST['cust_id'])){
	$cust_id = $_POST['cust_id'];
	$driver_id = $_POST['driver_id'];
	$pick = $_POST['pick'];
	$pickLatLng = $_POST['pickLatLng'];
	$pick_date = $_POST['pick_date'];
	$pick_time = $_POST['pick_time'];
	$drop = $_POST['drop'];
	$dropLatLng = $_POST['dropLatLng'];
	$isAcCab = $_POST['isAcCab'];
	$RIDE_LATER = $_POST['RIDE_LATER'];
	$trip_month = date('m');
	$trip_year = date('Y');
	
	if($drop == "Choose dropoff location"){
		$drop = "";
	}
	
	$query3 = mysqli_query($conn, "select * from tbl_drivers where driver_id='".$driver_id."'");
	$row3 = mysqli_fetch_assoc($query3);
	
	$query4 = mysqli_query($conn, "select * from tbl_cab_categories where category_id='".$row3['vehicle_category']."'");
	$row4 = mysqli_fetch_assoc($query4);
	
	$status = "Booked";
	
	//echo $pickLatLng;
	//echo $dropLatLng;
	if($dropLatLng != ""){		
		$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$pickLatLng."&destinations=".$dropLatLng."&mode=driving&language=pl-PL";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		//echo $response;
		$response_a = json_decode($response, true);
		$dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
		$time = $response_a['rows'][0]['elements'][0]['duration']['text'];

		$dists = explode(" ", $dist);
		$dist = $dists[0];
		$parts = explode(",", $dist);
		$dist = $parts[0].".".$parts[1];
	}else{
		$dist = "0";
	}
	
	$owner_commission = $row4['owner_comm_per_trip'];
	$minKm = $row4['min_km_to_charge'];
	if($dist < $minKm){
		if($isAcCab == "true"){
			$minCharge = $row4['min_charge_with_ac'];
		}else{
			$minCharge = $row4['min_charge_without_ac'];
		}
		$tax = $row4['tax'];
		//$Charge = $dist*$minCharge;
		$Charge = $minCharge;
		$tax = $tax/100*$minCharge + 0.5/100*$minCharge + 0.5/100*$minCharge;
		$total = $minCharge + $tax;
		$owner_commission = $total*($owner_commission/100);
	}else{
		if($isAcCab == "true"){
			$Charge = $row4['per_km_with_ac'];
		}else{
			$Charge = $row4['per_km_without_ac'];
		}
		$tax = $row4['tax'];
		$Charge = $dist*$Charge;
		$tax = $tax/100*$Charge + 0.5/100*$Charge + 0.5/100*$Charge;
		$total = $Charge + $tax;
		$owner_commission = $total*($owner_commission/100);
	}
	
	$query_incr = mysqli_query($conn, "select * from tbl_customer_trips order by booking_id desc limit 1");
	$num = mysqli_num_rows($query_incr);
	if($num != 0){
		$row_incr = mysqli_fetch_assoc($query_incr);
		$bookid = $row_incr['booking_id'];
		$rest = substr($bookid, 4);
		$rest = str_pad(++$rest,4,'0',STR_PAD_LEFT);
		$bookid = "CFCR".$rest;
	}else{
		$bookid = "CFCR0001";
	}
	
	$query = mysqli_query($conn, "select * from tbl_customer_trips where driver_id='".$driver_id."' and cust_id='".$cust_id."' and start_place='".$pick."' and start_date='".$pick_date."' and start_time='".$pick_time."' and end_place='".$drop."'");
	$num = mysqli_num_rows($query);
	if($num != 0){
		echo '{"msg":"you alreay booked this trip"}';
	}else{
		
		$randomNum = generateRandomString();
		if($randomNum == ""){
			$randomNum = generateRandomString();
		}
		
		$query2 = mysqli_query($conn, "insert into tbl_customer_trips (booking_id,driver_id,cust_id,start_place,
		startPlace_latlng,start_date,start_time,end_place,endPlace_latlng,end_date,end_time,isAcAvailable,
		isRideLater,ride_month,ride_year,total_distance,rideFare,tax,total_fee,verification_code, owner_commission, status, feedback, booked_date) values ('".$bookid."',
		'".$driver_id."','".$cust_id."','".$pick."','".$pickLatLng."','".$pick_date."','".$pick_time."','".$drop."',
		'".$dropLatLng."','','','".$isAcCab."','".$RIDE_LATER."','".$trip_month."','".$trip_year."','".$dist."','".$Charge."','".$tax."','".$total."',
		'".$randomNum."','".$owner_commission."','','', now())");
		if($query2){
						
			$query6 = mysqli_query($conn, "select * from tbl_customer_trips where driver_id='".$driver_id."' and cust_id='".$cust_id."' and start_date='".$pick_date."' and start_time='".$pick_time."'");
			$row6 = mysqli_fetch_assoc($query6);
			$bokid = $row6['booking_id'];
			
			$regID = $row3['reg_id'];
			define( 'API_ACCESS_KEY', 'AIzaSyCYf3tZ6ARbtJZKuCflpu9-ripDQcMNs8I' );
			$registrationIds = array($regID);
			// prep the bundle
			$msg = array
			(
				'title'			=> 'CamerounFacile',
				'message' 		=> 'New Booking Arrived',
				'subtitle'		=> 'New Booking Arrived',
				'tickerText'	=> 'New Booking Arrived',
				'type'			=> 'booking',
				'bookingID'		=> $bokid,
				'custID'		=> $cust_id,
				'pickLocation'	=> $pick,
				'response'		=>  "Booked",
				'vibrate'		=> 1,
				'sound'			=> 1,
				'largeIcon'		=> 'large_icon',
				'smallIcon'		=> 'small_icon'
			);
			$fields = array
			(
				'registration_ids' 	=> $registrationIds,
				'data'			=> $msg
			);
			 
			$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
			 
			$ch = curl_init();
			curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
			curl_setopt( $ch,CURLOPT_POST, true );
			curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
			$result = curl_exec($ch );
			curl_close( $ch );

			echo '{"msg":"success","outp":"You successfully booked this cab. we will get back to with confirmation.","bookid":"'.$bokid.'"}';
		}else{
			echo '{"msg":"Something went wrong, Try again."}';
		}
	}
}

function generateRandomString($length = 6) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>