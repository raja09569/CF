<?php
include '../../Includes/db.php';

$query3 = mysqli_query($conn, "select * from customer_fee");
$num3 = mysqli_num_rows($query3);
$outp = '[';
if($num3 != 0){
	$sno = 1;
	while($row3 = mysqli_fetch_assoc($query3)){
		$vehicle_type = $row3['vehicle_type'];
		$feeId = $row3['s_no'];
		$cfpk = $row3['customer_fee_per_km'];
		$ocpt = $row3['owner_comm_per_trip'];
		if($outp != '['){$outp .= ',';}
		$outp .= '{"sno":"'.$sno.'",';
		$outp .= '"feeId":"'.$feeId.'",';
		$query4 = mysqli_query($conn, "select * from cab_types where s_no='".$row3['vehicle_type']."'");
		$num4 = mysqli_num_rows($query4);
		if($num4 != 0){
			$row4 = mysqli_fetch_assoc($query4);
			$vehicle_name = $row4['cab_type'];
			$outp .= '"cabtype":"'.$vehicle_name.'",';
		}else{
			$vehicle_name = $row3['vehicle_type'];
			$outp .= '"cabtype":"'.$vehicle_name.'",';
		}
		$outp .= '"cabtypeId":"'.$vehicle_type.'",';
		$outp .= '"cfpk":"'.$cfpk.'",';
		$outp .= '"ocpt":"'.$ocpt.'"}';
		$sno = $sno+1;
	}
}
$outp .= ']';
echo $outp; 
?>