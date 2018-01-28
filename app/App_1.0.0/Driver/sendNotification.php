<?php
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyCYf3tZ6ARbtJZKuCflpu9-ripDQcMNs8I' );
$registrationIds = array("APA91bE0maZFjy4EfcKRc--mlrwPFfqXRCgz2cFYSdsK28KhDd6YfUVp8ZsI_D-R_TWYS28c-RzPSfJb7cCwz4jBtquYbuLm8kSjG4YdLP3291XMabVL_xhfY36V71Yj-XYs5sgr4T1Y");
// prep the bundle
$msg = array
(
	'title'			=> 'CamerounFacile',
	'message' 		=> 'New Booking Arrived',
	'subtitle'		=> 'New Booking Arrived',
	'tickerText'	=> 'New Booking Arrived',
	'type'			=> 'booking',
	'bookingID'		=>  "CFCR0009",
	'response'		=>  "Booked",
	'vibrate'		=> 1,
	'sound'			=> 1,
	'largeIcon'		=> 'large_icon',
	'smallIcon'		=> 'small_icon'
);
$fields = array
(
	'registration_ids' 	=> $registrationIds,
	"priority" => "high",
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
echo $result;
?>