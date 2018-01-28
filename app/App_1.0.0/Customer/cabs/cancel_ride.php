<?php
header('Access-Control-Allow-Origin: *');
include '../db.php';

$bookid = $_POST['bookingID'];

$query = mysqli_query($conn, "select * from tbl_customer_trips where booking_id='".$bookid."'");
$num = mysqli_num_rows($query);

if($num != 0){
	$query2 = mysqli_query($conn, "update tbl_customer_trips set status='Cancelled' where booking_id='".$bookid."'");
	if($query2){
		
		
		$row = mysqli_fetch_assoc($query);
		$driverID = $row['driver_id'];
	
		$query1 = mysqli_query($conn, "update tbl_drivers set is_onRide='' where driver_id='".$driverID."'");
	
		$query3 = mysqli_query($conn, "select * from tbl_drivers where driver_id='".$driverID."'");
		$num3 = mysqli_num_rows($query3);
		if($num3 != 0){
			$row3 = mysqli_fetch_assoc($query3);
			$regID = $row3['reg_id'];
			
			$registrationIds = array($regID);
			$msg = array(
				'title'			=> 'CamerounFacile',
				'message' 		=> "Booking Cancelled!",
				'subtitle'		=> 'Booking Cancelled!',
				'tickerText'	=> 'Booking Cancelled!',
				'type'			=> 'booking',
				'bookingID'		=>  $bookid,
				'response'		=>  "Cancelled",
				'vibrate'		=> 1,
				'sound'			=> 1,
				'largeIcon'		=> 'large_icon',
				'smallIcon'		=> 'small_icon'
			);
			$apiKey = "AIzaSyCYf3tZ6ARbtJZKuCflpu9-ripDQcMNs8I";
			if(isset($_POST['notification'])){
				$notification = $_POST['notification'];
				if($notification == "no"){
					
				}else{
					$response = sendNotification($registrationIds, $apiKey, $msg);
				}
			}else{
				$response = sendNotification($registrationIds, $apiKey, $msg);
			}
			
		}
		
		echo "success";
	}else{
		echo "something went wrong.";
	}
}else{
	echo "Invalid Booking ID";
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