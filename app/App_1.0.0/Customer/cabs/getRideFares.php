<?php
header('Access-Control-Allow-Origin: *');
include '../db.php';

$pickLatLng = $_POST['pickLatLng'];
$dropLatLng = $_POST['dropLatLng'];
$cab_type = $_POST['cab_type'];
$isAcCab = $_POST['isAcCab'];

$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$pickLatLng."&destinations=".$dropLatLng."&mode=driving&language=pl-PL";
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

$dists = explode(" ", $dist);
$dist = $dists[0];
$parts = explode(",", $dist);
$dist = $parts[0].".".$parts[1];

/*$query = mysqli_query($conn, "select * from tbl_drivers where driver_id='".$driverID."'");
$num = mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);
$cabType = $row['vehicle_category'];*/

//echo $cabType;

$query2 = mysqli_query($conn, "select * from tbl_cab_categories where category_id='".$cab_type."'");
$num2 = mysqli_num_rows($query2);
$row2 = mysqli_fetch_assoc($query2);
$minKm = $row2['min_km_to_charge'];

if($dist < $minKm){
	if($isAcCab == "true"){
		$minCharge = $row2['min_charge_with_ac'];
	}else{
		$minCharge = $row2['min_charge_without_ac'];
	}
	$tax = $row2['tax'];
	$tax = $tax/100*$minCharge + 0.5/100*$minCharge + 0.5/100*$minCharge;
	$total = $minCharge + $tax;
	echo '{"msg":"success","charge":"Min Charge Rs '.$minCharge.'","tax":"Rs '.$tax.'","total":"Rs '.$total.'"}';
}else{
	if($isAcCab == "true"){
		$Charge = $row2['per_km_with_ac'];
	}else{
		$Charge = $row2['per_km_without_ac'];
	}
	$tax = $row2['tax_perc'];
	$Charge = $dist*$Charge;
	$tax = $tax/100*$Charge + 0.5/100*$Charge + 0.5/100*$Charge;
	$total = $Charge + $tax;
	echo '{"msg":"success","charge":"Rs '.$Charge.'","tax":"Rs '.$tax.'","total":"Rs '.$total.'"}';
}
?>