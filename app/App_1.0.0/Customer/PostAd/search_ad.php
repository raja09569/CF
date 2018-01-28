<?php
header('Access-Control-Allow-Origin: *');
include '../db.php';

$search = $_GET['query'];

$query = mysqli_query($conn, "select * from tbl_ads where is_deleted != 'yes' and heading like '%".$search."%'");
$num = mysqli_num_rows($query);
$outp = "[";
if($num != 0){
	while($row = mysqli_fetch_assoc($query)){
		$ad_id = $row['ad_id'];
		$heading = $row['heading'];
		
		$category_id = $row['category_id'];
		$query1 = mysqli_query($conn, "select name from tbl_ad_categories where category_id='".$category_id."'");
		$row1 = mysqli_fetch_assoc($query1);
		$catName = $row1['name'];
		
		$subcategory_id = $row['subcategory_id'];
		$query2 = mysqli_query($conn, "select name from tbl_ad_subcategories where subcategory_id='".$subcategory_id."'");
		$row2 = mysqli_fetch_assoc($query2);
		$scatName = $row2['name'];
		
		if($outp != "["){
			$outp .= ",";
		}
		
		$outp .= '{"heading":"'.$heading.'",';
		$outp .= '"category":"'.$catName.'",';
		$outp .= '"subcategory":"'.$scatName.'",';
		$outp .= '"adID":"'.$ad_id.'"}';
	
	}
}
$outp .= "]";
echo $outp;
?>