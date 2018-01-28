<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$driverID = $_POST['driverID'];
$date = $_POST['date'];
$date = date("d/m/Y", strtotime($date));

$outp = '{"trips":[';
$query = mysqli_query($conn, "select * from tbl_customer_trips where driver_id='".$driverID."' and start_date='".$date."' and status='Finished'");
$num = mysqli_num_rows($query);
if($num != 0){
	while($row = mysqli_fetch_assoc($query)){
		$custID = $row['cust_id'];
		$startPlace = $row['start_place'];
		$endPlace = $row['end_place'];
		$totalFee = $row['total_fee'];
		
		$query3 = mysqli_query($conn, "select * from tbl_customers where cust_id='".$custID."'");
		$num3 = mysqli_num_rows($query3);
		if($num3 != 0){
			$row3 = mysqli_fetch_assoc($query3);
			$first_name = $row3['first_name'];
			$last_name = $row3['last_name'];
			$custName = $first_name." ".$last_name;
			$custPic = $row3['picture'];
			$custEmail = $row3['email_id'];
		}
		
		if($outp != '{"trips":['){ 
			$outp .= ',';
		};
		
		$outp .= '{"startPlace":"'.$startPlace.'",';
		$outp .= '"endplace":"'.$endPlace.'",';
		$outp .= '"amount":"'.$totalFee.'",';
		$outp .= '"custPic":"'.$custPic.'",';
		$outp .= '"custName":"'.$custName.'"}';
	}
}
$outp .= '],';
$query2 = mysqli_query($conn, "select sum(total_fee) as total, sum(owner_commission) as total_commission from tbl_customer_trips where driver_id='".$driverID."' and start_date='".$date."'");
$num2 = mysqli_num_rows($query2);
if($num2 != 0){
	$row2 = mysqli_fetch_assoc($query2);
	$total = $row2['total'];
	$totalCommission = $row2['total_commission'];
	//$due = 
	
	$outp .= '"totals":{"total": "'.$total.'",';
	$outp .= '"totalCommission":"'.$totalCommission.'"}';
}
$outp .= '}';
echo $outp;
mysqli_close($conn);
?>