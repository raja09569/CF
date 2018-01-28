<?php
header('Access-Control-Allow-Origin: *');
include '../../Includes/db.php';

$categoryID = $_POST['categoryID'];
$subcategoryID = $_POST['subcategoryID'];

$query1 = mysqli_query($conn, "select * from tbl_ad_subcategories where category_id='".$categoryID."' and subcategory_id='".$subcategoryID."'");
$num1 = mysqli_num_rows($query1);
$outp = "";
if($num1 > 0){
	$query3 = mysqli_query($conn, "update tbl_ad_subcategories set is_deleted='yes' where category_id='".$categoryID."' and subcategory_id='".$subcategoryID."'");
	if($query3){
		$outp = "Category Removed!";
	}else{
		$outp = "Something went wrong, Try again";
	}
}else{
	$outp = "Invalid Sub Category!";
}
echo $outp;

?>