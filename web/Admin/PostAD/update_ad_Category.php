<?php
header('Access-Control-Allow-Origin: *');
include '../../Includes/db.php';

$categoryID = $_POST['categoryID'];
$name = $_POST['name'];
$icon = $_POST['icon'];

$query1 = mysqli_query($conn, "select * from tbl_ad_categories where category_id='".$categoryID."' and is_deleted!='yes'");
$num1 = mysqli_num_rows($query1);
$outp = "";
if($num1 != 0){
	$query3 = mysqli_query($conn, "update tbl_ad_categories set name='".$name."',icon='".$icon."' where category_id='".$categoryID."' and is_deleted!='yes'");
	if($query3){
		$outp = "Category Updated!";
	}else{
		$outp = "Something went wrong, Try again";
	}
}else{
	$outp = "Invalid Category!";
}
echo $outp;

?>