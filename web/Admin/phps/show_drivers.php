<?php
include '../../Includes/db.php';

$query1 = mysqli_query($conn, "select * from tbl_drivers where is_deleted != 'yes'");
$num1 = mysqli_num_rows($query1);
$outp = '[';
if($num1 != 0){
	while($row1 = mysqli_fetch_assoc($query1)){
		
		$driver_name = $row1['name'];
		$cabID = $row1['vehicle_category'];
		
		$query2 = mysqli_query($conn, "select name from tbl_cab_categories where category_id='".$cabID."'");
		$num2 = mysqli_num_rows($query2);
		$row2 = mysqli_fetch_assoc($query2);
		$cabname = $row2['name'];
		
		$driverID = $row1['driver_id'];
		$reg_dt = $row1['registered_date'];
		//$reg_dt = date("d M Y h:i A");
		$adrs = $row1['address'];
		$locality = $row1['locality'];
		$city = $row1['city'];
		$state = $row1['state'];
		$country = $row1['country'];
		$phoneno = $row1['mobile_number'];
		$email_id = $row1['email_id'];
		$bank_name = $row1['bank_name'];
		$bank_ac_no = $row1['bank_ac_no'];
		$is_activated = $row1['is_activated'];
		$duty_staus = $row1['duty_status'];
		$vehicleno = $row1['vehicle_no'];
		$licenceno = $row1['licence_no'];
		$driver_photo = $row1['driver_photo'];
		$vehicle_photo = $row1['vehicle_photo'];
		
		if($duty_staus == "on"){
			$duty_staus = "On Duty";
		}else if($duty_staus == "onride"){
			$duty_staus = "In travel";
		}else{
			$duty_staus = "Off Duty";
		}			
	
		$query3 = mysqli_query($conn, "select on_date from tbl_driver_activation_tracking where driver_id='".$driverID."' order by on_date desc limit 1");
		$num3 = mysqli_num_rows($query3);
		if($num3 != 0){
			$row3 = mysqli_fetch_assoc($query3);
			$dat = $row3['on_date'];
			$dat = date("d M Y h:i A");
		}else{
			$dat = "Not Yet";	
		}
		if($is_activated == "yes"){
			$is_activated = "Active";
			$url = "<a onclick='update_driverStatus(&quot;".$driverID."&quot;,&quot;no&quot;);'>DeActivate</a>";
		}else{
			$is_activated = "DeActive";
			$url = "<a onclick='update_driverStatus(&quot;".$driverID."&quot;,&quot;yes&quot;);'>Activate</a>";
		}
		
		if($outp != '['){ $outp .= ',';}
		$outp .= '{"driverID":"'.$driverID.'",';
		$outp .= '"drivername":"'.$driver_name.'",';
		$outp .= '"cabtype":"'.$cabID.'",';
		$outp .= '"cabname":"'.$cabname.'",';
		$outp .= '"locality":"'.$locality.'",';
		$outp .= '"phoneno":"'.$phoneno.'",';
		$outp .= '"email":"'.$email_id.'",';
		$outp .= '"dutystatus":"'.$duty_staus.'",';
		$outp .= '"act_date":"'.$dat.'",';
		$outp .= '"url":"'.$url.'",';
		$outp .= '"reg_date":"'.$reg_dt.'",';
		$outp .= '"adrs":"'.$adrs.'",';
		$outp .= '"country":"'.$country.'",';
		$outp .= '"licenceno":"'.$licenceno.'",';
		$outp .= '"vehicleno":"'.$vehicleno.'",';
		$outp .= '"bankname":"'.$bank_name.'",';
		$outp .= '"bankacno":"'.$bank_ac_no.'",';
		$outp .= '"driver_photo":"'.$driver_photo.'",';
		$outp .= '"vehicle_photo":"'.$vehicle_photo.'",';
		$outp .= '"ifscecode":"",';
		$outp .= '"banklocation":"",';
		$outp .= '"reg_status":"'.$is_activated.'"}';
	}
}
$outp .= ']';
echo $outp;
?>