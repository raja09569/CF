<?php
include '../../Includes/db.php';
if(isset($_POST['filter'])){
	$query8 = mysqli_query($conn, "select * from tbl_customer_trips");
}else{
	$query8 = mysqli_query($conn, "select * from tbl_customer_trips");
}
$num8 = mysqli_num_rows($query8);
$outp = '[';
if($num8 != 0){
	$s_no = 1;
	while($row8 = mysqli_fetch_assoc($query8)){
		
		$query9 = mysqli_query($conn, "select * from tbl_drivers where driver_id='".$row8['driver_id']."'");
		$num9 = mysqli_num_rows($query9);
		$row9 = mysqli_fetch_assoc($query9);
		$name = $row9['name'];
		$cabtype = $row9['vehicle_category'];
		$cabno = $row9['vehicle_no'];
		
		$query10 = mysqli_query($conn, "select * from tbl_cab_categories where category_id='".$cabtype."'");
		$num10 = mysqli_num_rows($query10);
		$row10 = mysqli_fetch_assoc($query10);
		$cabname = $row10['name'];
		$startplace = $row8['start_place'];
		$startdt = $row8['start_date'];
		$starttm = $row8['start_time'];
		if($startdt != ""){
			$startdt = $startdt;
			//$startdt = date("d M y", strtotime($startdt));
			$startdt = $startdt." ".$starttm;
		}else{
			$startdt = "";
		}
		$endplace = $row8['end_place'];
		$enddt = $row8['end_date'];
		$endtm = $row8['end_time'];
		if($enddt != ""){
			$enddt = $enddt;
			//$enddt = date("d M y", strtotime($enddt));
			$enddt = $enddt." ".$endtm;
		}else{
			$enddt = "";
		}
		$totaldistance= $row8['total_distance'];
		$totalfee = $row8['total_fee'];
		$ownercommission = $row8['owner_commission'];

		if($outp != '['){$outp .= ',';}
		$outp .= '{"sno":"'.$s_no.'",';
		$outp .= '"driver_name":"'.$name.'",';
		$outp .= '"cabtype":"'.$cabtype.'",';
		$outp .= '"cabno":"'.$cabno.'",';
		$outp .= '"pick_place":"'.$startplace.'",';
		$outp .= '"pick_date":"'.$startdt.'",';
		$outp .= '"pick_time":"'.$starttm.'",';
		$outp .= '"drop_place":"'.$endplace.'",';
		$outp .= '"drop_date":"'.$enddt.'",';
		$outp .= '"drop_time":"'.$endtm.'",';
		$outp .= '"total_distance":"'.$totaldistance.'",';
		$outp .= '"total_fee":"'.$totalfee.'",';
		$outp .= '"owner_commission":"'.$ownercommission.'"}';
		
		$s_no= $s_no+1;
	}
}
$outp .= ']';
echo $outp; 
?>