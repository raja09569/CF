<?php
header('Access-Control-Allow-Origin: *');
include '../db.php';

$adID = $_POST['adID'];

$query = mysqli_query($conn, "select * from tbl_ads where is_deleted!='yes' and ad_id='".$adID."'");
$num = mysqli_num_rows($query);
if($num != 0){
	$query1 = mysqli_query($conn, "update tbl_ads set is_deleted='yes' where adID='".$adID."'");
	if($query1){
		echo "success";
	}else{
		echo "Something went wrong, Try again.";
	}
}else{
	echo "Invalid Ad!";
}
?>