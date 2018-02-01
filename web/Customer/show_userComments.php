<?php
include '../Includes/db.php';

$uname = $_POST['uname'];

$query = mysqli_query($conn, "select * from tbl_driver_comments where cust_id='".$uname."' order by comment_date desc");
$num = mysqli_num_rows($query);
$outp = '[';
if($num != 0){
	while($row = mysqli_fetch_assoc($query)){
		if($outp != '['){
			$outp .= ',';
		}
		$sno = $row['s_no'];
		$driver_id = $row['driver_id'];
		$query2 = mysqli_query($conn,"select name, driver_photo, vehicle_no from tbl_drivers where driver_id='".$driver_id."'");
		$row2 = mysqli_fetch_assoc($query2);
		$driver_name = $row2['name'];
		$driver_photo = $row2['driver_photo'];
		$vehicle_no = $row2['vehicle_no'];
		$cust_id = $row['cust_id'];
		$comment = $row['comment'];
		$comment_date = $row['comment_date'];
		
		$outp .= '{"driver_name":"'.$driver_name.'",';
		$outp .= '"driver_photo":"'.$driver_photo.'",';
		$outp .= '"vehicle_no":"'.$vehicle_no.'",';
		$outp .= '"comment_date":"'.$comment_date.'",';
		$outp .= '"comment":"'.$comment.'"}';
	}	
}
$outp .= ']';
echo $outp;
?>