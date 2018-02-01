<?php
header('Access-Control-Allow-Origin: *');
include '../Includes/db.php';
include '../../../Includes/functions.php';

if(isset($_POST['cust_id'])){
	$cust_id = $_POST['cust_id'];
	$driver_id = $_POST['driver_id'];
	$pick = $_POST['pick'];
	$pickLatLng = $_POST['pickLatLng'];
	$pick_date = $_POST['pick_date'];
	$drop = $_POST['drop'];
	$dropLatLng = $_POST['dropLatLng'];
	$distance = $_POST['distance'];
	$isAcCab = $_POST['isAcCab'];
	$trip_month = date('m');
	$trip_year = date('Y');	

	if($drop == "Choose dropoff location"){
		$drop = "";
	}
	
	if($pick_date == "Now"){
		date_default_timezone_set("Asia/Kolkata");
		$date = date('m/d/Y h:i:s a', time());
	}

	$query3 = mysqli_query($conn, "select reg_id, vehicle_category, duty_status from tbl_drivers where driver_id='".$driver_id."'");
	$row3 = mysqli_fetch_assoc($query3);
	$query4 = mysqli_query($conn, "select owner_comm_per_trip, min_charge_without_ac, min_charge_with_ac, tax, per_km_with_ac, per_km_without_ac,  from tbl_cab_categories where category_id='".$row3['vehicle_category']."'");
	$row4 = mysqli_fetch_assoc($query4);
	$status = "Requested";

	$owner_commission = $row4['owner_comm_per_trip'];
	$minKm = $row4['min_km_to_charge'];
	if($distance < $minKm){
		if($isAcCab == "true"){
			$minCharge = $row4['min_charge_with_ac'];
		}else{
			$minCharge = $row4['min_charge_without_ac'];
		}
		$tax = $row4['tax'];
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
	
	$query_incr = mysqli_query($conn, "select booking_id from tbl_customer_trips order by booking_id desc limit 1");
	$num_incr = mysqli_num_rows($query_incr);
	if($num_incr > 0){
		$row_incr = mysqli_fetch_assoc($query_incr);
		$bookid = $row_incr['booking_id'];
		$rest = substr($bookid, 4);
		$rest = str_pad(++$rest,4,'0',STR_PAD_LEFT);
		$bookid = "CFCR".$rest;
	}else{
		$bookid = "CFCR0001";
	}
	
	$query = mysqli_query($conn, "select booking_id from tbl_customer_trips where driver_id='".$driver_id."' and cust_id='".$cust_id."' and start_place='".$pick."' and start_date='".$pick_date."' and start_time='".$pick_time."' and end_place='".$drop."'");
	$num = mysqli_num_rows($query);
	if($num != 0){
		echo '{"msg":"you alreay booked this trip"}';
	}else{
		$randomNum = generateRandomString();
		if($randomNum == ""){
			$randomNum = generateRandomString();
		}
		$query2 = mysqli_query($conn, "insert into tbl_customer_trips (booking_id, driver_id, cust_id, start_place,
		startPlace_latlng,start_date,start_time,end_place,endPlace_latlng,end_date,end_time,isAcAvailable,
		isRideLater,ride_month,ride_year,total_distance,rideFare,tax,total_fee,verification_code, owner_commission, status, feedback, booked_date) values ('".$bookid."', '".$driver_id."','".$cust_id."','".$pick."','".$pickLatLng."','".$pick_date."','".$pick_time."','".$drop."', '".$dropLatLng."','','','".$isAcCab."','".$RIDE_LATER."','".$trip_month."','".$trip_year."','".$dist."','".$Charge."','".$tax."','".$total."', '".$randomNum."','".$owner_commission."','','', now())");
		if($query2){					
			$query6 = mysqli_query($conn, "select * from tbl_customer_trips where driver_id='".$driver_id."' and cust_id='".$cust_id."' and start_date='".$pick_date."' and start_time='".$pick_time."'");
			$row6 = mysqli_fetch_assoc($query6);
			$bokid = $row6['booking_id'];
			
			$regID = $row3['reg_id'];
			$dustStatus = $row3['duty_status'];
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

			$query1 = mysqli_query($conn, "select app_login_status, mobile_number, email_id, reg_id from tbl_customers where cust_id='".$cust_id."'");
			$num1 = mysqli_num_rows($query1);
			if($num1 > 0){
				$row1 = mysqli_fetch_assoc($query1);
				$appLogin = $row1['app_login_status'];
				if($appLogin == "loggedIn"){

				}else{
					
				}
				$emailID = $row1['email_id'];
				$mobileNumber = $row1['mobile_number'];
				$message = "Your request has been received. We will get back to you with confirmation.";
				sendSMS($message, $mobileNumber);
			}else{

			}
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