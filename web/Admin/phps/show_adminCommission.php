<?php
include '../../Includes/db.php';
/*if(isset($_POST['filter'])){
	$query12 = mysqli_query($conn, "select * from tbl_customer_trips");
}else{
	$query12 = mysqli_query($conn, "select * from tbl_customer_trips");
}*/
$query12 = mysqli_query($conn, "select * from tbl_customer_trips");
$num12 = mysqli_num_rows($query12);
$outp = '[';
if($num12 != 0){
	$s_no = 1;
	while($row12 = mysqli_fetch_assoc($query12)){
		$ride_month = $row12['ride_month'];
		$driverid = $row12['driver_id'];
		$query13 = mysqli_query($conn, "select * from tbl_drivers where driver_id='".$driverid."'");
		$num13 = mysqli_num_rows($query13);
		$row13 = mysqli_fetch_assoc($query13);
		$drivername = $row13['name'];
		$vehicle_no = $row13['vehicle_no'];
		$place = $row13['city'];
		$mobile = $row13['mobile_number'];
		$cab_type = $row13['vehicle_category'];
		$query14 = mysqli_query($conn, "select * from tbl_cab_categories where category_id='".$cab_type."'");
		$num14 = mysqli_num_rows($query14);
		$row14 = mysqli_fetch_assoc($query14);
		$cabname = $row14['name'];
		//$fee_per_hour = $row15['customer_fee_per_km'];
		$query16 = mysqli_query($conn, "SELECT sum(total_distance) as total FROM `tbl_customer_trips`
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
		
		$balance = $totalcommissioninmonth-$totalcollectioninmonth;
		
		if($outp != '['){$outp .= ',';}
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
		$outp .= '"balance":"'.$balance.'"}';
		
		$s_no=$s_no+1;
	}
}
$outp .= ']'; 
echo $outp; 
?>
