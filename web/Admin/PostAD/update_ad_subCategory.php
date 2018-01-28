<?php
header('Access-Control-Allow-Origin: *');
include '../../Includes/db.php';

$subcategoryID = $_POST['subcategoryID'];
$categoryID = $_POST['categoryID'];
$name = $_POST['name'];

$query1 = mysqli_query($conn, "select * from tbl_ad_subcategories where category_id='".$categoryID."' and subcategory_id='".$subcategoryID."' and is_deleted!='yes'");
$num1 = mysqli_num_rows($query1);
if($num1 > 0){
	$query3 = mysqli_query($conn, "update tbl_ad_subcategories set category_id='".$categoryID."', name='".$name."' where 
	category_id='".$categoryID."' and subcategory_id='".$subcategoryID."' and is_deleted!='yes'");
	if($query3){
		$outp = "Sub Category Updated!";
	}else{
		$outp = "Something went wrong, Try again";
	}
}else{
	$outp = "Invalid Sub Category!";
}
echo $outp;

?>