<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$categoryID = $_POST['categoryID'];
$name = $_POST['name'];

$query1 = mysqli_query($conn, "select * from tbl_ad_subcategories where name='".$name."'");
$num1 = mysqli_num_rows($query1);
$outp = "";
if($num1 != 0){
	$outp = "Sub Category already available.";
}else{
	$query2 = mysqli_query($conn, "select * from tbl_ad_subcategories order by s_no limit 1");
	$num2 = mysqli_num_rows($query2);
	if($num2 != 0){
		$row2 = mysqli_fetch_assoc($query2);
		$subcategoryID = $row2['subcategory_id'];
		$subcategoryID = ++$subcategoryID;
	}else{
		$subcategoryID = "ADSBCT0001";
	}
	$query3 = mysqli_query($conn, "insert into tbl_ad_subcategories (category_id, subcategory_id,
	name,is_deleted,created_date) values ('".$categoryID."', '".$subcategoryID."', '".$name."', 'no', now())");
	if($query3){
		$outp = "Sub Category Added!";
	}else{
		$outp = "Something went wrong, Try again";
	}
}
echo $outp;

?>