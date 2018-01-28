<?php
header('Access-Control-Allow-Origin: *');
include '../../Includes/db.php';

$categoryID = $_POST['categoryID'];
$name = $_POST['name'];

$query1 = mysqli_query($conn, "select * from tbl_ad_subcategories where name='".$name."' and is_deleted!='yes'");
$num1 = mysqli_num_rows($query1);
$outp = "";
if($num1 > 0){
	$outp = "Sub Category already available.";
}else{
	$query2 = mysqli_query($conn, "select * from tbl_ad_subcategories where category_id='".$categoryID."' order by subcategory_id desc limit 1");
	$num2 = mysqli_num_rows($query2);
	if($num2 > 0){
		$row2 = mysqli_fetch_assoc($query2);
		$subcategoryID = $row2['subcategory_id'];
		$subcategoryID = substr($subcategoryID, 6);
		$subcategoryID = $subcategoryID + 1;
		$subcategoryID = str_pad($subcategoryID, 4, '0', STR_PAD_LEFT);
		$subcategoryID = "ADSBCT".$subcategoryID;
	}else{
		$subcategoryID = "ADSBCT0001";
	}
	/*$query2 = mysqli_query($conn, "select * from tbl_ad_subcategories order by s_no desc limit 1");
	$num2 = mysqli_num_rows($query2);
	if($num2 != 0){
		$row2 = mysqli_fetch_assoc($query2);
		$subcategoryID = $row2['subcategory_id'];
		$subcategoryID = ++$subcategoryID;
	}else{
		$subcategoryID = "ADSBCT0001";
	}*/
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