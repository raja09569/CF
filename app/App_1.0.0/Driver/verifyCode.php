<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$bookingID = $_POST['bookingID'];
$otp = $_POST['otp'];

$query = mysqli_query($conn, "select * from tbl_customer_trips where booking_id='".$bookingID."' and verification_code='".$otp."'");
$num = mysqli_num_rows($query);
if($num != 0){
	$row = mysqli_fetch_assoc($query);
	$startPlace = $row['start_place'];
	$endPlace = $row['end_place'];
	$endPlaceLatLng = $row['endPlace_latlng'];
	$totalFee = $row['total_fee'];
	$query2 = mysqli_query($conn, "update tbl_customer_trips set status='Arrived' where booking_id='".$bookingID."'");
	if($query2){
		//$row = mysqli_fetch_assoc($query);
		$custID = $row['cust_id'];
	
		$query3 = mysqli_query($conn, "select * from tbl_customers where cust_id='".$custID."'");
		$num3 = mysqli_num_rows($query3);
		if($num3 != 0){
			$row3 = mysqli_fetch_assoc($query3);
			$regID = $row3['reg_id'];
			$phoneno = $row3['mobile_number'];
			$first_name = $row3['first_name'];
			$last_name = $row3['last_name'];
			$name = $first_name."".$last_name;
			$photo = $row3['picture'];
			
			$registrationIds = array($regID);
			$msg = array(
				'title'			=> 'CamerounFacile',
				'message' 		=> "Your trip Arrived!",
				'subtitle'		=> 'Your trip Arrived!',
				'tickerText'	=> 'Your trip Arrived!',
				'type'			=> 'booking',
				'bookingID'		=>  $bookingID,
				'response'		=>  "Arrive",
				'vibrate'		=> 1,
				'sound'			=> 1,
				'largeIcon'		=> 'large_icon',
				'smallIcon'		=> 'small_icon'
			);
			$apiKey = "AIzaSyCYf3tZ6ARbtJZKuCflpu9-ripDQcMNs8I";
			$response = sendNotification($registrationIds, $apiKey, $msg);
			$outp = '{"msg":"success","startPlace":"'.$startPlace.'","endPlace":"'.$endPlace.'","endPlaceLatLng":"'.$endPlaceLatLng.'","totalFee":"'.$totalFee.'"}';
		}else {
			$outp = '{"msg":"Invalid Customer!"}';
			echo $outp;
		}
		
	}else{
		$outp = '{"msg":"Something went wrong, Try again."}';
	}
}else{
	$outp = '{"msg":"Invalid, Try again."}';
}
echo $outp;

function sendNotification($regID, $apikey, $msg){
	define( 'API_ACCESS_KEY', $apikey );	
	
	$fields = array(
		'registration_ids' 	=> $regID,
		'data'				=> $msg
	);
	 
	$headers = array(
		'Authorization: key=' . API_ACCESS_KEY,
		'Content-Type: application/json'
	);
	 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
	curl_setopt($ch, CURLOPT_POST, true );
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers );
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
	$result = curl_exec($ch );
	curl_close( $ch );
	//echo $result;
}
?>