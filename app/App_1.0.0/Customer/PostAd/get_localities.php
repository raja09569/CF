<?php
header('Access-Control-Allow-Origin: *');
include '../db.php';

$query = mysqli_query($conn, "select distinct(location) from tbl_ads where is_deleted != 'yes'");
$num = mysqli_num_rows($query);
$outp = "[";
if($num != 0){
	while($row = mysqli_fetch_assoc($query)){
		$location = $row['location'];
		if($outp != "["){
			$outp .= ",";
		}
		$outp .= '{"location":"'.$location.'"}';
	}
}
$query2 = mysqli_query($conn, "select distinct(territory) from tbl_ads where is_deleted != 'yes'");
$num2 = mysqli_num_rows($query2);
if($num != 0){
	while($row2 = mysqli_fetch_assoc($query2)){
		$territory = $row2['territory'];
		if($outp != "["){
			$outp .= ",";
		}
		$outp .= '{"location":"'.$territory.'"}';
	}
}
$outp .= "]";

echo $outp;
?>