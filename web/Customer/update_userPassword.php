<?php
include 'db.php';

$uname = $_POST['uname'];
$oldpword = $_POST['oldpword'];
$newpword = $_POST['newpword'];

$query = mysqli_query($conn, "select * from users where phoneno='$uname' or emailid='$uname'");
$num = mysqli_num_rows($query);
if($num != 0){
	$query2 = mysqli_query($conn, "select * from users where phoneno='$uname' and password='$oldpword' or emailid='$uname' and password='$oldpword'");
	$num2 = mysqli_num_rows($query);
	if($num2 != 0){
		$query3 = mysqli_query($conn, "update users set password='$newpword' where phoneno='$uname' and password='$oldpword' or emailid='$uname' and password='$oldpword'");
		if($query3){
			echo "success";
		}else{
			echo "Something went wrong, Try again.";
		}
	}else{
		echo "Invalid Old Pasword";
	}
}else{
	echo "Invalid Username";
}

?>