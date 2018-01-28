<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$bookingID = $_POST['bookingID'];

$query = mysqli_query($conn, "select * from tbl_customer_trips where booking_id='".$bookingID."'");
$num = mysqli_num_rows($query);
if($num != 0){
	date_default_timezone_set('Asia/Kolkata');
	$date = date("d/m/Y");
	$time = date("H:i:s");
	$query2 = mysqli_query($conn, "update tbl_customer_trips set status='Boarded',end_date='".$date."',end_time='".$time."' where booking_id='".$bookingID."'");
	if($query2){
		$row = mysqli_fetch_assoc($query);
		$custID = $row['cust_id'];
		$query3 = mysqli_query($conn, "select * from tbl_customers where cust_id='".$custID."'");
		$num3 = mysqli_num_rows($query3);
		if($num3 != 0){
			$row3 = mysqli_fetch_assoc($query3);
			$regID = $row3['reg_id'];
			$registrationIds = array($regID);
			$msg = array(
				'title'			=> 'CamerounFacile',
				'message' 		=> "Your trip Started!",
				'subtitle'		=> 'Your trip Started!',
				'tickerText'	=> 'Your trip Started!',
				'type'			=> 'booking',
				'bookingID'		=>  $bookingID,
				'response'		=>  "Started",
				'vibrate'		=> 1,
				'sound'			=> 1,
				'largeIcon'		=> 'large_icon',
				'smallIcon'		=> 'small_icon'
			);
			$apiKey = "AIzaSyCYf3tZ6ARbtJZKuCflpu9-ripDQcMNs8I";
			$response = sendNotification($registrationIds, $apiKey, $msg);
		}
		echo "success";
	}else{
		echo "Something went wrong, Try again.";
	}
}else{
	echo "Invalid Booking";
}

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