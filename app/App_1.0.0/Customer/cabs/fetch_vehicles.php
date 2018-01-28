<?php
header('Access-Control-Allow-Origin: *');
include '../db.php';

$lat = $_POST['lat'];
$lng = $_POST['lng'];

$query = mysqli_query($conn, "select category_id, name, isRideLaterAvailable, icon from tbl_cab_categories");
$num = mysqli_num_rows($query);
$outp = '[';	
if($num != 0){
	
	while($row = mysqli_fetch_assoc($query)){
		
		if($outp != '['){$outp .= ',';}
		
		$cab = $row['category_id'];
		$cab_n = $row['name'];
		$isRideLaterAvailable = $row['isRideLaterAvailable'];
		
		$query1 = mysqli_query($conn, "SELECT lattitude, longitude, vehicle_category, driver_id,( 3959 * acos( cos( radians($lat) ) * cos( radians( lattitude )) * cos( radians( longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( lattitude ) ) ) ) AS distance FROM tbl_drivers where is_activated='yes' and duty_status='on' and vehicle_category='".$cab."' and is_onRide != 'Booked' HAVING distance < 50 ORDER BY distance asc limit 1");
		$num1 = mysqli_num_rows($query1);
		if($num1 != 0){		
			$row1 = mysqli_fetch_assoc($query1);
			$lat1 = $row1['lattitude'];
			$lng1 = $row1['longitude'];
			$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$lng1."&destinations=".$lat.",".$lng."&mode=driving&language=pl-PL";
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
			
			$cabType = $row1['vehicle_category'];
			$cabname = $row['name'];
			$cabphoto = $row['icon'];
			$cabdistance = $dist;
			$cabtime = $time;
			$driverid = $row1['driver_id'];
			
			$outp .= '{"cabs":"available",';
			$outp .= '"cab":"'.$cabname.'",';
			$outp .= '"cabID":"'.$cab.'",';
			$outp .= '"isRideLaterAvailable":"'.$isRideLaterAvailable.'",';
			$outp .= '"driverid":"'.$driverid.'",';
			$outp .= '"time":"'.$cabtime.'",';
			$outp .= '"distance":"'.$cabdistance.'",';
			$outp .= '"cabphoto":"'.$cabphoto.'"}';
		}else{
			$cabname = $row['name'];
			$cabphoto = $row['icon'];
				
			$outp .= '{"cabs":"No Cabs",';
			$outp .= '"cab":"'.$cabname.'",';
			$outp .= '"cabphoto":"'.$cabphoto.'"}';
		}
	}		
}
$outp .= ']';

echo $outp;
?>