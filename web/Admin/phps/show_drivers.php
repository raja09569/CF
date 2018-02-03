<?php
include '../../Includes/db.php';

$query4 = mysqli_query($conn, "select count(s_no) as count from tbl_drivers where is_deleted!='yes'");
$row4 = mysqli_fetch_assoc($query4);
$pages = $row4['count'];
$limit = 5;
$pages = ceil($pages/$limit);

$offset = $_POST['offset'];

$query1 = mysqli_query($conn, "select name, vehicle_category, driver_id, mobile_number, email_id, driver_photo, duty_status, is_activated from tbl_drivers where is_deleted != 'yes' limit ".$offset.", ".$limit);
$num1 = mysqli_num_rows($query1);
$outp = '[';
if($num1 != 0){
	$outp .= '{"pages":"'.$pages.'"}';
	while($row1 = mysqli_fetch_assoc($query1)){
		$driver_name = $row1['name'];
		$cabID = $row1['vehicle_category'];
		$query2 = mysqli_query($conn, "select name from tbl_cab_categories where category_id='".$cabID."'");
		$num2 = mysqli_num_rows($query2);
		$row2 = mysqli_fetch_assoc($query2);
		$cabname = $row2['name'];
		$driverID = $row1['driver_id'];
		$phoneno = $row1['mobile_number'];
		$email_id = $row1['email_id'];
		$is_activated = $row1['is_activated'];
		$duty_staus = $row1['duty_status'];
		$driver_photo = $row1['driver_photo'];
		
		if($duty_staus == "on"){
			$duty_staus = "On";
		}else if($duty_staus == "onride"){
			$duty_staus = "In travel";
		}else{
			$duty_staus = "Off";
		}			

		if($is_activated == "yes"){
			$is_activated = "Active";
			$url = "<a class='cust-link' onclick='update_driverStatus(&quot;".$driverID."&quot;,&quot;no&quot;);'>DeActivate</a>";
		}else{
			$is_activated = "DeActive";
			$url = "<a class='cust-link' onclick='update_driverStatus(&quot;".$driverID."&quot;,&quot;yes&quot;);'>Activate</a>";
		}
		
		if($outp != '['){ $outp .= ',';}
		
		$outp .= '{"driverID":"'.$driverID.'",';
		$outp .= '"drivername":"'.$driver_name.'",';
		$outp .= '"cabname":"'.$cabname.'",';
		$outp .= '"phoneno":"'.$phoneno.'",';
		$outp .= '"email":"'.$email_id.'",';
		$outp .= '"dutystatus":"'.$duty_staus.'",';
		$outp .= '"url":"'.$url.'",';
		$outp .= '"driver_photo":"'.$driver_photo.'",';
		$outp .= '"reg_status":"'.$is_activated.'"}';
	}
}
$outp .= ']';
echo $outp;
?>