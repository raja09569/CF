<?php 
header("Access-Control-Allow-Origin: *");
include '../../Includes/db.php';

$query = mysqli_query($conn, "select category_id, name from tbl_ad_categories where is_deleted!='yes' order by name asc");
$num = mysqli_num_rows($query);
$outp = '[';
if($num > 0){
	while ($row = mysqli_fetch_assoc($query)) {
		$categoryID = $row['category_id'];
		$catName = $row['name'];
		if($outp != '['){
			$outp .= ',';
		}
		$outp .= '{"catID":"'.$categoryID.'",';
		$outp .= '"catName": "'.$catName.'"}';
	}
}
$outp .= ']';
echo $outp;
?>