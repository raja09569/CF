<?php
header('Access-Control-Allow-Origin: *');
include '../db.php';

$cabID =$_POST['cabID'];
$driverID =$_POST['driverID'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];

$outp = '[';	

$query = mysqli_query($conn, "select * from tbl_drivers where driver_id='".$driverID."'");
$num = mysqli_num_rows($query);
if($num > 0){
	$row = mysqli_fetch_assoc($query);
	$condition = $row['is_ac_available'];
	
	$outp .= '{"condition": "'.$condition.'",';
	
	$query1 = mysqli_query($conn, "select * from tbl_drivers where vehicle_category='".$cabID."'");
	$num1 = mysqli_num_rows($query1);
	if($num1 > 0){
		$outp .= '"brands":[';
		$outp .= '{"no_of_brands": "'.$num1.'"}';
		while($row1 = mysqli_fetch_assoc($query1)){
			$brand = $row1['vehicle_name'];
			if($outp != '['){$outp .= ',';}
			$outp .= '{"brand_name": "'.$brand.'"}';
		}
		$outp .= '],';
	}else{
		$outp .= '"brands":[],';
	}
	
	$query2 = mysqli_query($conn, "select * from tbl_cab_categories where category_id='".$cabID."'");
	$num2 = mysqli_num_rows($query2);
	if($num2 > 0){
		$row2 = mysqli_fetch_assoc($query2);
		$cabName = $row2['name'];
		$per_km_with_ac = $row2['per_km_with_ac'];
		$per_km_without_ac = $row2['per_km_without_ac'];
		$min_charge_with_ac = $row2['min_charge_with_ac'];
		$min_charge_without_ac = $row2['min_charge_without_ac'];
		$min_charge_km = $row2['min_km_to_charge'];
		$outp .= '"cab_type": "'.$cabName.'",';
		$outp .= '"per_km_with_ac": "FCFA '.$per_km_with_ac.'",';
		$outp .= '"per_km_without_ac": "FCFA '.$per_km_without_ac.'",';
		$outp .= '"min_charge_with_ac": "FCFA '.$min_charge_with_ac.'",';
		$outp .= '"min_charge_without_ac": "FCFA '.$min_charge_without_ac.'",';
		$outp .= '"min_charge_km": "'.$min_charge_km.'Km"},';
	}
	
	$lat1 = $row['lattitude'];
	$lng1 = $row['longitude'];
	$cabphoto = $row['vehicle_photo'];
		
	$outp .= '{"lat":"'.$lat1.'",';
	$outp .= '"lng":"'.$lng1.'",';
	$outp .= '"cabphoto":"'.$cabphoto.'"}';
}
$outp .= ']';
echo $outp;

?>