<?php
header('Access-Control-Allow-Origin: *');
include '../db.php';

$query = mysqli_query($conn, "select * from tbl_ad_categories where is_deleted='no'");
$num = mysqli_num_rows($query);
$outp = "[";
if($num != 0){
	while($row = mysqli_fetch_assoc($query)){
		$name = $row['name'];
		$categoryID = $row['category_id'];
		$icon = $row['icon'];
		
		if($outp != "["){
			$outp .= ",";
		}
		$outp .= '{"categoryID":"'.$categoryID.'",';
		$outp .= '"name":"'.$name.'",';
		$outp .= '"icon":"'.$icon.'"}';
	}
}
$outp .= "]";
echo $outp;
?>