<?php
include 'db.php';

$code = $_POST['code'];
$password = $_POST['password'];

$query = mysqli_query($conn, "select * from users where code='".$code."'");
$num = mysqli_num_rows($query);
if($num != 0){
	$query2 = mysqli_num_rows($conn, "update users set password='".$password."' where code='".$code."'");
	if($query2){
		$query3 = mysqli_num_rows($conn, "update users set code='".$code."' where code='".$code."'");
	}else{
		echo "Something went wrong, Try again.";
	}
}else{
	echo "Enter valid Auto Generated Code.";
}

?>