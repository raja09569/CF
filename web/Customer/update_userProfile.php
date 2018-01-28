<?php
include 'db.php';

$uname = $_POST['emailid'];
$name = $_POST['name'];
$emailID = $_POST['emailID'];
$phoneno = $_POST['phoneno'];
$adrs = $_POST['adrs'];

$query = mysqli_query($conn, "update users set name='".$name."',emailid='".$emailID."',phoneno='".$phoneno."',address='".$adrs."' where emailid='".$uname."'");
if($query){
	echo "success";
	$_SESSION['customer_user_uname'] = $emailID;
}else{
	echo "Something went wrong, Try again.";
}

?>