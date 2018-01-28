<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$categoryID = $_POST['categoryID'];
$subCategoryID = $_POST['subCategoryID'];
$name = $_POST['name'];

$query1 = mysqli_query($conn, "select * from tbl_ad_categories where category_id='".$categoryID."'");
$num1 = mysqli_num_rows($query1);
$outp = "";
if($num1 != 0){
	$query2 = mysqli_query($conn, "select * from tbl_ad_subcategories where subcategory_id='".$subCategoryID."'");
	$num2 = mysqli_num_rows($query2);
	if($num2 != 0){
		
		$query3 = mysqli_query($conn, "update tbl_ad_subcategories set name='".$name."',
		category_id='".$categoryID."' where subcategory_id='".$subCategoryID."'");
		if($query3){
			$outp = "Sub Category Updated!";
		}else{
			$outp = "Something went wrong, Try again";
		}
		
	}else{
		$outp = "Invalid Sub Category!";
	}
}else{
	$outp = "Invalid Category!";
}
echo $outp;

?>