<?php
require_once '../../Includes/db.php';
$query = mysqli_query($conn, "select * from tbl_cab_categories");
$num = mysqli_num_rows($query);
$outp = '[';
if($num != 0){
	while($row = mysqli_fetch_assoc($query)){
		$s_no = $row['category_id'];
		$cabtype = $row['name'];
		$no_of_seats = $row['no_of_seats'];
		if($outp != '['){
			$outp .= ',';
		}
		$outp .= '{"cabID":"'.$s_no.'",';
		$outp .= '"cabtype":"'.$no_of_seats." Seat(s) - ".$cabtype.'"}';
	}
}
$outp .= ']';
echo $outp;
?>