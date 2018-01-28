<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$driverID = $_POST['driverID'];
$bookingID = $_POST['bookingID'];
$status = $_POST['response'];

$query = mysqli_query($conn, "select * from tbl_customer_trips where driver_id='".$driverID."' and booking_id='".$bookingID."'");
$num = mysqli_num_rows($query);
if($num != 0){
	$row = mysqli_fetch_assoc($query);
	$custID = $row['cust_id'];
	$isRideLater = $row['isRideLater'];
	
	$query3 = mysqli_query($conn, "select * from tbl_customers where cust_id='".$custID."'");
	$num3 = mysqli_num_rows($query3);
	if($num3 != 0){
		
		if($isRideLater == "true"){
			if($status == "Booked"){
				$status = "Scheduled";
			}
		}
		
		$query2 = mysqli_query($conn, "update tbl_customer_trips set status='".$status."' where driver_id='".$driverID."' and booking_id='".$bookingID."'");			
		
		$row3 = mysqli_fetch_assoc($query3);
		$regID = $row3['reg_id'];
		$phoneno = $row3['mobile_number'];
		$first_name = $row3['first_name'];
		$last_name = $row3['last_name'];
		$name = $first_name." ".$last_name;
		$photo = $row3['picture'];
			
		$verification_code = $row['verification_code'];
		$registrationIds = array($regID);
		$msg = array(
			'title'			=> 'CamerounFacile',
			'message' 		=> "Your Booking is Confirmed, You booking verification Code is ".$verification_code,
			'subtitle'		=> 'Your Booking is Confirmed',
			'tickerText'	=> 'Your Booking is Confirmed',
			'type'			=> 'booking',
			'bookingID'		=>  $bookingID,
			'response'		=>  $status,
			'vibrate'		=> 1,
			'sound'			=> 1,
			'largeIcon'		=> 'large_icon',
			'smallIcon'		=> 'small_icon'
		);
		$apiKey = "AIzaSyCYf3tZ6ARbtJZKuCflpu9-ripDQcMNs8I";
		$response = sendNotification($registrationIds, $apiKey, $msg);
		if($status == "Booked"){
			sendSMS($phoneno, "Your Booking is Confirmed, You booking verification Code is ".$verification_code);
		}
		if($status == "Booked"){
			$query1 = mysqli_query($conn, "update tbl_drivers set is_onRide='Booked' where driver_id='".$driverID."'");
			$location = $row['start_place'];
			$latlng = $row['startPlace_latlng'];
			$outp = '{"msg":"success", "location":"'.$location.'", "latlng":"'.$latlng.'", "cName":"'.$name.'", "cPic":"'.$photo.'", "cMobile":"'.$phoneno.'"}';
			echo $outp;
		}else{	
			$query1 = mysqli_query($conn, "update tbl_drivers set is_onRide='' where driver_id='".$driverID."'");
			$outp = '{"msg":"success"}';
			echo $outp;
		}
	}else {
		$outp = '{"msg":"Invalid Customer!"}';
		echo $outp;
	}
}else{
	$outp = '{"msg":"Invalid Booking!"}';
	echo $outp;
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
function sendSMS($mobile, $message){
	$user = "leesoft";
	$apikey = "PtIcihedW5GofPekdaZg"; 
	$senderid  =  "LEESMS";
	$message = urlencode($message);
	$type   =  "txt";

	$ch = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".$user."&apikey=".$apikey."&mobile=".$mobile."&senderid=".$senderid."&message=".$message."&type=".$type.""); 
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);      
	curl_close($ch); 
}
?>