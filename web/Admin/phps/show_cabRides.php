<?php
include '../../Includes/db.php';
/*if(isset($_POST['filter'])){
	$query8 = mysqli_query($conn, "select driver_id, booking_id, start_place, start_date, start_time, end_place, end_date, end_time, total_distance, total_fee, owner_commission from tbl_customer_trips order by start_date desc, start_time desc");
}else{
	$query8 = mysqli_query($conn, "select driver_id, booking_id, start_place, start_date, start_time, end_place, end_date, end_time, total_distance, total_fee, owner_commission from tbl_customer_trips order by start_date desc, start_time desc");
}*/

$query1 = mysqli_query($conn, "select count(s_no) as count from tbl_customer_trips");
$row1 = mysqli_fetch_assoc($query1);
$pages = $row1['count'];
$limit = 10;
$pages = ceil($pages / $limit);

$offset = $_POST['offset'];

$query8 = mysqli_query($conn, "select driver_id, booking_id, start_place, start_date, start_time, end_place, end_date, end_time, total_distance, total_fee, owner_commission from tbl_customer_trips order by start_date desc, start_time desc limit ".$offset.", ".$limit);
$num8 = mysqli_num_rows($query8);
$outp = '[';
if($num8 > 0){
	$outp .= '{"pages": "'.$pages.'"}';
	while($row8 = mysqli_fetch_assoc($query8)){
		$driverID = $row8['driver_id'];
		$bookingID = $row8['booking_id'];
		$startplace = $row8['start_place'];
		$startdt = $row8['start_date'];
		$starttm = $row8['start_time'];
		$endplace = $row8['end_place'];
		$enddt = $row8['end_date'];
		$endtm = $row8['end_time'];
		$totaldistance= $row8['total_distance'];
		$totalfee = $row8['total_fee'];
		$ownercommission = $row8['owner_commission'];

		$query9 = mysqli_query($conn, "select name, vehicle_category, vehicle_no from tbl_drivers where driver_id='".$driverID."'");
		$num9 = mysqli_num_rows($query9);
		$row9 = mysqli_fetch_assoc($query9);
		$name = $row9['name'];
		$cabtype = $row9['vehicle_category'];
		$cabno = $row9['vehicle_no'];
		
		$query10 = mysqli_query($conn, "select name from tbl_cab_categories where category_id='".$cabtype."'");
		$num10 = mysqli_num_rows($query10);
		$row10 = mysqli_fetch_assoc($query10);
		$cabname = $row10['name'];

		if($startdt != ""){
			$startdt = $startdt;
			$startdt = $startdt." ".$starttm;
			$startdt = date("d D m Y, h:i A", strtotime($startdt));
		}else{
			$startdt = "";
		}
		
		if($enddt != ""){
			$enddt = $enddt;
			//$enddt = date("d M y", strtotime($enddt));
			$enddt = $enddt." ".$endtm;
			$enddt = date("d D m Y, h:i A", strtotime($enddt));
		}else{
			$enddt = "";
		}

		if($outp != '['){$outp .= ',';}

		$outp .= '{"bookingID":"'.$bookingID.'",';
		$outp .= '"drName":"'.$name.'",';
		$outp .= '"cabtype":"'.$cabname.'",';
		//$outp .= '"cabno":"'.$cabno.'",';
		$outp .= '"pick_place":"'.$startplace.'",';
		$outp .= '"pick_date":"'.$startdt.'",';
		$outp .= '"drop_place":"'.$endplace.'",';
		$outp .= '"drop_date":"'.$enddt.'",';
		$outp .= '"distance":"'.$totaldistance.'",';
		$outp .= '"fee":"'.$totalfee.' FCFA",';
		$outp .= '"commission":"'.$ownercommission.' FCFA"}';
	}
}
$outp .= ']';
echo $outp; 
?>