<?php
header('Access-Control-Allow-Origin: *');
include '../../Includes/db.php';

$categoryID = $_POST['categoryID'];

$query = mysqli_query($conn, "select * from tbl_ad_categories where category_id='".$categoryID."' and is_deleted='no'");
$num = mysqli_num_rows($query);
$outp = "[";
if($num != 0){
	$query1 = mysqli_query($conn, "select * from tbl_ad_subcategories where category_id='".$categoryID."' and is_deleted='no'");
	$num1 = mysqli_num_rows($query1);
	if($num1 != 0){
		while($row1 = mysqli_fetch_assoc($query1)){
			$name = $row1['name'];
			$categoryID = $row1['category_id'];
			$subcategoryID = $row1['subcategory_id'];
			
			if($outp != "["){
				$outp .= ",";
			}
			$outp .= '{"categoryID":"'.$categoryID.'",';
			$outp .= '"name":"'.$name.'",';
			$outp .= '"subcategoryID":"'.$subcategoryID.'"}';
		}
	}
}
$outp .= "]";
echo $outp;
?>