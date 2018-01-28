<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$name = $_POST['name'];
$icon = $_POST['icon'];

$query1 = mysqli_query($conn, "select * from tbl_ad_categories where name='".$name."'");
$num1 = mysqli_num_rows($query1);
$outp = "";
if($num1 != 0){
	$outp = "Category already available.";
}else{
	$query2 = mysqli_query($conn, "select * from tbl_ad_categories order by s_no limit 1");
	$num2 = mysqli_num_rows($query2);
	if($num2 != 0){
		$row2 = mysqli_fetch_assoc($query2);
		$categoryID = $row2['category_id'];
		$categoryID = ++$categoryID;
	}else{
		$categoryID = "ADCT0001";
	}
	$query3 = mysqli_query($conn, "insert into tbl_ad_categories (category_id, name, icon,
	is_deleted, created_date) values ('".$categoryID."', '".$name."', '".$icon."', 'no', now())");
	if($query3){
		$outp = "Category Added!";
	}else{
		$outp = "Something went wrong, Try again";
	}
}
echo $outp;

?>