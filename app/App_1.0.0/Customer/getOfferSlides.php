<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$query = mysqli_query($conn, "select * from tbl_offer_slides");
$num = mysqli_num_rows($query);
$outp = "[";
if($num != 0){
	$outp .= '{"no_of_slides":"'.$num.'"}';
	while($row = mysqli_fetch_assoc($query)){
		if($outp != '['){
			$outp .= ',';
		}
		$name = $row['slidename'];
		$url = $row['url'];
		$outp .= '{"name":"'.$name.'",';
		$outp .= '"url":"'.$url.'"}';
	}
}
$outp .= ']';
echo $outp;
?>