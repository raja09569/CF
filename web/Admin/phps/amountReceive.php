<?php
include '../../Includes/db.php';

$driver_id = $_POST['driver_id'];

$query = mysqli_query($conn, "select amount_collected, on_collected_date, received_by, reference_no, s_no from tbl_amount_collection_from_driver where driver_id='".$driver_id."' order by on_collected_date desc");
$num = mysqli_num_rows($query);
$outp = '[';
if($num != 0){
	$sno = 1;
	while($row = mysqli_fetch_assoc($query)){
		
		$amountReceived = $row['amount_collected'];
		$date = $row['on_collected_date'];
		$date = date("D d M y, h:i A", strtotime($date));
		$received_by = $row['received_by'];
		$reference_no = $row['reference_no'];
		$sNo = $row['s_no'];
		
		if($outp != '['){
			$outp .= ',';
		}
		
		$outp .= '{"sno":"'.$sno.'",';
		$outp .= '"date":"'.$date.'",';
		$outp .= '"amount_received":"'.$amountReceived.'",';
		$outp .= '"received_by":"'.$received_by.'",';
		$outp .= '"reference_no":"'.$reference_no.'"}';

		$sno = $sno + 1;
	}
}
$outp .= ']';
echo $outp;

?>