<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$driverID = $_POST['driverID'];
$bookingID = $_POST['bookingID'];

$outp = '[';
if($driverID != "" && $bookingID != ""){
	$query = mysqli_query($conn, "select * from tbl_driver_comments where driver_id='".$driverID."' and 
	booking_id='".$bookingID."' order by comment_date desc");
	$num = mysqli_num_rows($query);
	if($num != 0){
		if($outp != '['){ $outp .= ',';};
		$row = mysqli_fetch_assoc($query);
		$custID = $row['cust_id'];
		
		$comment = $row['comment'];
		$comment_date = $row['comment_date'];
		
		$query3 = mysqli_query($conn, "select * from users where s_no='".$custID."'");
		$num3 = mysqli_fetch_assoc($query3);
		if($num3 != 0){
			$row3 = mysqli_fetch_assoc($query3);
			$custName = $row3['name'];
			$custPic = $row3['photo'];
			$custEmail = $row3['emailid'];
		}
		
		$outp .= '{"comment":"'.$comment.'",';
		$outp .= '"custPic":"'.$custPic.'",';
		$outp .= '"date":"'.$comment_date.'",';
		$outp .= '"custName":"'.$custName.'"}';
		
	}	
}
$outp .= ']';
echo $outp;
mysqli_close($conn);
?>