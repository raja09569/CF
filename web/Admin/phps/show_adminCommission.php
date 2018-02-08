<?php
include '../../Includes/db.php';
/*if(isset($_POST['filter'])){
	$query12 = mysqli_query($conn, "select * from tbl_customer_trips");
}else{
	$query12 = mysqli_query($conn, "select * from tbl_customer_trips");
}*/

$offset = $_POST['offset'];
$year = $_POST['year'];
$month = $_POST['month'];

$outp = '[';
$limit = 10;

if($year != "" && $month != ""){
	$query4 = mysqli_query($conn, "select count(s_no) as count from tbl_customer_trips where ride_month='".$month."' and ride_year='".$year."'");
	$row4 = mysqli_fetch_assoc($query4);
	$count = $row4['count'];
	if($count > 0){
		$query1 = mysqli_query($conn, "select driver_id, count(booking_id) as count, sum(total_distance) as distance, sum(total_fee) as total, sum(owner_commission) as commission from tbl_customer_trips where ride_month='".$month."' and ride_year='".$year."' limit ".$offset.", ".$limit);
		$pages = ceil($count / $limit);
		$outp .= '{"pages": "'.$pages.'"}';
	}else{
		$outp = '[]';
		echo $outp;
		exit();
	}
}else if($year == "" && $month != ""){
	$query4 = mysqli_query($conn, "select count(s_no) as count from tbl_customer_trips where ride_month='".$month."'");
	$row4 = mysqli_fetch_assoc($query4);
	$count = $row4['count'];
	if($count > 0){
		$query1 = mysqli_query($conn, "select driver_id, count(booking_id) as count, sum(total_distance) as distance, sum(total_fee) as total, sum(owner_commission) as commission from tbl_customer_trips where ride_month='".$month."' limit ".$offset.", ".$limit);	
		$pages = ceil($count / $limit);
		$outp .= '{"pages": "'.$pages.'"}';
	}else{
		$outp = '[]';
		echo $outp;
		exit();
	}
}else if($year != "" && $month == ""){
	$query4 = mysqli_query($conn, "select count(s_no) as count from tbl_customer_trips where ride_year='".$year."'");
	$row4 = mysqli_fetch_assoc($query4);
	$count = $row4['count'];
	if($count > 0){
		$query1 = mysqli_query($conn, "select driver_id, count(booking_id) as count, sum(total_distance) as distance, sum(total_fee) as total, sum(owner_commission) as commission from tbl_customer_trips where ride_year='".$year."' limit ".$offset.", ".$limit);
		$pages = ceil($count / $limit);
		$outp .= '{"pages": "'.$pages.'"}';
	}else{
		$outp = '[]';
		echo $outp;
		exit();
	}
}else{
	$month = date('m');
	$year = date('Y');
	$query4 = mysqli_query($conn, "select count(s_no) as count from tbl_customer_trips where ride_month='".$month."' and ride_year='".$year."'");
	$row4 = mysqli_fetch_assoc($query4);
	$count = $row4['count'];
	if($count > 0){
		$query1 = mysqli_query($conn, "select driver_id, count(booking_id) as count, sum(total_distance) as distance, sum(total_fee) as total, sum(owner_commission) as commission from tbl_customer_trips where ride_month='".$month."' and ride_year='".$year."' limit ".$offset.", ".$limit);
		$pages = ceil($count / $limit);
		$outp .= '{"pages": "'.$pages.'"}';
	}else{
		$outp = '[]';
		echo $outp;
		exit();
	}
}
$num1 = mysqli_num_rows($query1);
if($num1 > 0){
	while($row1 = mysqli_fetch_assoc($query1)){
		$driverID = $row1['driver_id'];
		$trips = $row1['count'];
		$distance = $row1['distance'];
		$total = $row1['total'];
		$commission = $row1['commission'];

		$query2 = mysqli_query($conn, "select name from tbl_drivers where driver_id='".$driverID."'");
		$num2 = mysqli_num_rows($query2);
		if($num2 > 0){
			$row2 = mysqli_fetch_assoc($query2);	
			$driverName = $row2['name'];
		}else{
			$driverName = "";
		}
		
		if($year != "" && $month != ""){
			$query3 = mysqli_query($conn, "select sum(amount_collected) as paid from tbl_amount_collection_from_driver where driver_id='".$driverID."' and on_collected_month='".$year."' and on_collected_year='".$month."'");
		}else if($year == "" && $month != ""){
			$query3 = mysqli_query($conn, "select sum(amount_collected) as paid from tbl_amount_collection_from_driver where driver_id='".$driverID."' and on_collected_month='".$month."'");
		}else if($year != "" && $month == ""){
			$query3 = mysqli_query($conn, "select sum(amount_collected) as paid from tbl_amount_collection_from_driver where driver_id='".$driverID."' and on_collected_year='".$year."'");
		}else{
			$month = date('m');
			$year = date('Y');	
			$query3 = mysqli_query($conn, "select sum(amount_collected) as paid from tbl_amount_collection_from_driver where driver_id='".$driverID."' and on_collected_month='".$month."' and on_collected_year='".$year."'");
		}
		$num3 = mysqli_num_rows($query3);
		if($num3 > 0){
			$row3 = mysqli_fetch_assoc($query3);
			$paid = $row3['paid'];
			if($paid != ""){
				$due = $commission - $paid." FCFA";
				$paid = $paid." FCFA";
			}else{
				$paid = " - ";
				$due = $commission." FCFA";
			}
		}else{
			$paid = " - ";
			$due = $commission." FCFA";
		}

		if($outp != '['){
			$outp .= ',';
		}

		$outp .= '{"driverName":"'.$driverName.'",';
		$outp .= '"driverID":"'.$driverID.'",';
		$outp .= '"trips":"'.$trips.'",';
		$outp .= '"distance":"'.$distance.'",';
		$outp .= '"total":"'.$total.'",';
		$outp .= '"paid":"'.$paid.'",';
		$outp .= '"due":"'.$due.'",';
		$outp .= '"commission":"'.$commission.'"}';
		
		//$vehicle_no = $row13['vehicle_no'];
		//$place = $row13['city'];
		//$mobile = $row13['mobile_number'];
		//$cab_type = $row13['vehicle_category'];
		
		//$query14 = mysqli_query($conn, "select * from tbl_cab_categories where category_id='".$cab_type."'");
		//$num14 = mysqli_num_rows($query14);
		//$row14 = mysqli_fetch_assoc($query14);
		//$cabname = $row14['name'];
		//$fee_per_hour = $row15['customer_fee_per_km'];
		
		/*$query16 = mysqli_query($conn, "SELECT sum(total_distance) as total FROM `tbl_customer_trips`
					   where ride_month in (select distinct ride_month from tbl_customer_trips) and driver_id in
					   (select distinct s_no from tbl_drivers)");
		$num16 = mysqli_num_rows($query16);
		$row16 = mysqli_fetch_assoc($query16);
		$totaldistanceinmonth = $row16['total'];
		if($totaldistanceinmonth == ""){
			$totaldistanceinmonth = "0";
		}
	
		$query17 = mysqli_query($conn, "SELECT sum(total_fee) as totalfee FROM `tbl_customer_trips`
					   where ride_month in (select distinct ride_month from tbl_customer_trips) and
					   driver_id in (select distinct s_no from tbl_drivers)");
		$num17 = mysqli_num_rows($query17);
		$row17 = mysqli_fetch_assoc($query17);
		$totalamountinmonth = $row17['totalfee'];
		if($totalamountinmonth == ""){
			$totalamountinmonth = "0";
		}
		
		$query18 = mysqli_query($conn, "SELECT sum(owner_commission) as totalcommission FROM `tbl_customer_trips`
					   where ride_month in (select distinct ride_month from tbl_customer_trips) and
					   driver_id in (select distinct s_no from tbl_drivers)");
		$num18 = mysqli_num_rows($query18);
		$row18 = mysqli_fetch_assoc($query18);
		$totalcommissioninmonth = $totalamountinmonth * ($row18['totalcommission']/100);
		if($totalcommissioninmonth == ""){
			$totalcommissioninmonth = "0";
		}
		
		$query19 = mysqli_query($conn, "SELECT sum(amount_collected) as totalcollected FROM `tbl_amount_collection_from_driver`
					   where on_collected_month in (select distinct ride_month from tbl_customer_trips) and
					   driver_id in (select distinct s_no from tbl_drivers)");
		$num19 = mysqli_num_rows($query19);
		$row19 = mysqli_fetch_assoc($query19);
		$totalcollectioninmonth = $row19['totalcollected'];			
		if($totalcollectioninmonth == ""){
			$totalcollectioninmonth = "0";
		}
		
		$balance = $totalcommissioninmonth - $totalcollectioninmonth;
		*/
		/*if($outp != '['){$outp .= ',';}
		$outp .= '{"sno":"'.$s_no.'",';
		$outp .= '"driver_id":"'.$driverid.'",';
		$outp .= '"month":"'.$ride_month.'",';
		$outp .= '"driver_name":"'.$drivername.'",';
		$outp .= '"vehicle_no":"'.$vehicle_no.'",';
		//$outp .= '"place":"'.$place.'",';
		//$outp .= '"phone_no":"'.$mobile.'",';
		$outp .= '"cab_type":"'.$cabname.'",';
		//$outp .= '"fee_per_km":"'.$fee_per_hour.'",';
		$outp .= '"total_distance":"'.$totaldistanceinmonth.'",';
		$outp .= '"total_fee":"'.$totalamountinmonth.'",';
		$outp .= '"owner_commission":"'.$totalcommissioninmonth.'",';
		$outp .= '"received_amount":"'.$totalcollectioninmonth.'",';
		$outp .= '"balance":"'.$balance.'"}';*/
	}
}
$outp .= ']'; 
echo $outp; 
?>
