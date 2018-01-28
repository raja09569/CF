<?php
include '../../Includes/db.php';
$id = $_POST['id'];

$query = mysqli_query($conn, "update tbl_cab_categories set is_deleted='yes' where category_id='".$id."'");
if($query){
	echo "success";
}else{
	echo "Something went wrong, Try again.";
}
?>