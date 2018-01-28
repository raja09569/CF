<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$driverID = $_POST['driverID'];
$month = $_POST['month'];
$year = $_POST['year'];

$query = mysqli_query($conn, "select *, sum(total_fee) as total from tbl_customer_trips where driver_id='".$driverID."' and ride_month='".$month."' and ride_year='".$year."' and status='Finished' group by start_date");
$num = mysqli_num_rows($query);
$outp = '{"trips":[';
if($num != 0){
	while($row = mysqli_fetch_assoc($query)){
		$date = $row['start_date'];
		$date = date_create_from_format("d/m/Y",$date);
		$date = date_format($date,"D, d M y");
		$total = $row['total'];
		
		if($outp != '{"trips":['){ 
			$outp .= ',';
		};
		
		$outp .= '{"date":"'.$date.'",';
		$outp .= '"total":"'.$total.'"}';
	}
}
$outp .= '],';
$query2 = mysqli_query($conn, "select sum(total_fee) as total, sum(owner_commission) as total_commission from tbl_customer_trips where driver_id='".$driverID."' and ride_month='".$month."' and ride_year='".$year."' group by ride_month");
$num2 = mysqli_num_rows($query2);
if($num2 != 0){
	$row2 = mysqli_fetch_assoc($query2);
	$total = $row2['total'];
	$totalCommission = $row2['total_commission'];
	$outp .= '"totals":{"total": "'.$total.'",';
	$outp .= '"totalCommission":"'.$totalCommission.'"}';
}else{
	$outp .= '"totals":{}';
}
$outp .= '}';
echo $outp;
mysqli_close($conn);
?>