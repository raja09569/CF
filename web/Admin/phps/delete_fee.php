<?php
include '../../Includes/db.php';

$id = $_POST['id'];

$query = mysqli_query($conn, "delete from customer_fee where s_no='".$id."'");
if($query){
	echo "success";
}else{
	echo "Something went wrong, Try again.";
}
?>