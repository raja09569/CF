<?php 
header("Access-Control-Allow-Origin: *");
include '../../Includes/db.php';

$catID = $_POST['catID'];

$query = mysqli_query($conn, "select subcategory_id, name from tbl_ad_subcategories where is_deleted!='yes' order by name asc");
$num = mysqli_num_rows($query);
$outp = '[';
if($num > 0){
	while ($row = mysqli_fetch_assoc($query)) {
		$subcatID = $row['subcategory_id'];
		$subcatName = $row['name'];
		if($outp != '['){
			$outp .= ',';
		}
		$outp .= '{"subcatID":"'.$subcatID.'",';
		$outp .= '"subcatName": "'.$subcatName.'"}';
	}
}
$outp .= ']';
echo $outp;
?>