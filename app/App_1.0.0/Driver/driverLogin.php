<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$mobile = $_POST['mobile'];
$pword = $_POST['pword'];
$regID = $_POST['regID'];
$deviceID = $_POST['deviceID'];

$outp = '[';
if($mobile != "" && $pword != ""){
	$query = mysqli_query($conn, "select * from tbl_drivers where mobile_number='".$mobile."'");
	$num = mysqli_num_rows($query);
	if($num != 0){
		$query1 = mysqli_query($conn, "select * from tbl_drivers where mobile_number='".$mobile."' and password=''");
		$num1 = mysqli_num_rows($query1);
		if($num1 != 0){
			$outp .= '{"msg":"Create password to Login!"}';
		}else{
			$query2 = mysqli_query($conn, "select * from tbl_drivers where mobile_number='".$mobile."' and password='".$pword."'");
			$num2 = mysqli_num_rows($query2);
			if($num2 != 0){
				$query3 = mysqli_query($conn, "select * from tbl_drivers where mobile_number='".$mobile."' and is_activated='yes'");
				$num3 = mysqli_num_rows($query3);
				if($num3 != 0){
					
					$query4 = mysqli_query($conn, "update tbl_drivers set reg_id='".$regID."' where mobile_number='".$mobile."' and password='".$pword."'");
					
					$query5 = mysqli_query($conn, "select * from tbl_drivers where mobile_number='".$mobile."' and device_id='".$deviceID."'");
					$num5 = mysqli_num_rows($query5);
					if($num5 != 0){
						if($outp != '['){ $outp .= ',';}
						$row3 = mysqli_fetch_assoc($query3);
						$driverID = $row3['driver_id'];
						$driverName = $row3['name'];
						$vehicleNo = $row3['vehicle_no'];
						$pic = $row3['driver_photo'];
						$vehicle_status = $row3['duty_status'];
						$outp .= '{"msg":"success",';
						$outp .= '"driverID":"'.$driverID.'",';
						$outp .= '"driverName":"'.$driverName.'",';
						$outp .= '"vehicleNo":"'.$vehicleNo.'",';
						$outp .= '"vehicle_status":"'.$vehicle_status.'",';
						$outp .= '"pic":"'.$pic.'"}';
					}else{					
						$outp .= '{"msg":"You are connecting with new device!."}';
					}
				}else{
					$outp .= '{"msg":"Hey, you are not activated. Contact CamerounFacile, Get Activated."}';
				}
			}else{
				$outp .= '{"msg":"Check Your password, Try again!"}';
			}
		}		
	}else{
		$outp .= '{"msg":"Invalid Mobile Number"}';
	}	
}
$outp .= ']';
echo $outp;
mysqli_close($conn);
?>