<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$uname = $_POST['uname'];
$pword = $_POST['pword'];
$regID = $_POST['regID'];
$deviceID = $_POST['deviceID'];

$outp = '[';
if($uname != "" && $pword != ""){
	$query = mysqli_query($conn, "select * from tbl_customers where email_id='".$uname."' and password='".$pword."'");
	$num = mysqli_num_rows($query);
	if($num != 0){
		$query1 = mysqli_query($conn, "select * from tbl_customers where email_id='".$uname."' and device_id='".$deviceID."'");
		$num1 = mysqli_num_rows($query1);
		if($num1 != 0){
			$query4 = mysqli_query($conn, "update tbl_customers set regID='".$regID."' where email_id='".$uname."' and password='".$pword."'");
			if($outp != '['){
				$outp .= ',';
			}
			$row = mysqli_fetch_assoc($query);
			$uname = $row['email_id'];
			$name = $row['first_name']." ".$row['last_name'];
			$id = $row['cust_id'];
			$isd = $row['isd_code'];
			$phoneno = $row['mobile_number'];
			$notification_status = $row['notification_status'];
			$photo = $row['picture'];
			
			$outp .= '{"msg":"success",';
			$outp .= '"uname":"'.$uname.'",';
			$outp .= '"id":"'.$id.'",';
			$outp .= '"photo":"'.$photo.'",';
			$outp .= '"isd":"'.$isd.'",';
			$outp .= '"phoneno":"'.$phoneno.'",';
			$outp .= '"notification_status":"'.$notification_status.'",';
			$outp .= '"name":"'.$name.'"}';
		}else{
			$outp .= '{"msg":"You are Contacting with new device."}';
		}
	}else{
		$outp .= '{"msg":"Check username or password, Try again."}';
	}	
}
$outp .= ']';
echo $outp;
mysqli_close($conn);
?>