<?php
header('Access-Control-Allow-Origin: *');

include 'db.php';

if(isset($_POST['lat']) && isset($_POST['lng'])){
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];

	$query = mysqli_query($conn, "SELECT *, ( 3959 * acos( cos( radians($lat) ) * cos( radians( lattitude )
		) * cos( radians( longitude ) - radians($lng) ) + sin( radians($lat) ) *
		sin( radians( lattitude ) ) ) ) AS distance FROM drivers where activation_status='yes' and vehicle_status='on'
		HAVING distance < 50 ORDER BY distance asc limit 3");
	$num = mysqli_num_rows($query);
	$outp = '[';
	if($num != 0){
		
		while($row = mysqli_fetch_assoc($query)){
			
			$lat1 = $row['lattitude'];
			$lng1 = $row['longitude'];
		
			$distance = GetDrivingDistance($lat, $lat1, $lng, $lng1);
			
			//print_r($distance);
			
			//echo $distance['distance'];
			//echo $distance['time'];
			
			$cabType = $row['cab_type'];
			
			$query2 = mysqli_query($conn, "select * from cab_types where s_no = '".$cabType."'");
			$row2 = mysqli_fetch_assoc($query2);
			$cabname = $row2['cab_type'];
			
			$query3 = mysqli_query($conn, "select * from customer_fee where vehicle_type = '".$cabType."'");
			$row3 = mysqli_fetch_assoc($query3);
			$cabfee = $row3['customer_fee_per_km'];
			
			$cabdistance = $distance['distance'];
			
			$cabtime = $distance['time'];
			
			$cabphoto = $row['vehicle_photo'];
			
			$driverid = $row['s_no'];
			
			$currency = "Rs";
			
			if($outp != '['){$outp .= ',';}
			$outp .= '{"cab":"'.$cabname.'",';
			$outp .= '"driverid":"'.$driverid.'",';
			$outp .= '"cabfee":"'.$cabfee.' per km",';
			$outp .= '"fee":"'.$cabfee.'",';
			$outp .= '"currency":"'.$currency.'",';
			$outp .= '"time":"'.$cabtime.' away",';
			$outp .= '"distance":"'.$cabdistance.' away",';
			$outp .= '"cabphoto":"'.$cabphoto.'"}';
			
		}
		
	}

	$outp .= ']';

	echo $outp;

}

function GetDrivingDistance($lat1, $lat2, $long1, $long2){
	
    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&language=pl-PL";
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

    return array('distance' => $dist, 'time' => $time);
}
?>