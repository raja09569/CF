<?php
include 'db.php';
$driver_id = $_POST['driver_id'];
$uname = $_POST['uname'];
$comment = $_POST['comment'];

$query = "insert into tbl_driver_comments (driver_id,cust_id,comment, comment_date)";
$query .= "values ('".$driver_id."','".$uname."','".$comment."',now())";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else{
	echo "Something happend, Try again.";
}
?>