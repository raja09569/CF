<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$driverID = $_POST['driverID'];

$query = mysqli_query($conn, "select * from tbl_driver_comments where driver_id='".$driverID."' order by comment_date desc");
$num = mysqli_num_rows($query);
$outp = '[';
if($num != 0){
	while($row = mysqli_fetch_assoc($query)){
		$custID = $row['cust_id'];
		$comment = $row['comment'];
		$comment_date = $row['comment_date'];
		$comment_date = date("d M y H:i A", strtotime($comment_date));
		$query3 = mysqli_query($conn, "select * from tbl_customers where cust_id='".$custID."'");
		$num3 = mysqli_num_rows($query3);
		if($num3 != 0){
			$row3 = mysqli_fetch_assoc($query3);
			$first_name = $row3['first_name'];
			$last_name = $row3['last_name'];
			$custName = $first_name."".$last_name;
			$custPic = $row3['picture'];
			$custEmail = $row3['email_id'];
		}
		
		if($outp != '['){ 
			$outp .= ',';
		};
		
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