<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$custID = $_POST['custID'];
$oldPword = $_POST['oldPword'];
$newPword = $_POST['newPword'];

//echo $username;
//echo $oldPword;
//echo $newPword;

if($username != "" && $oldPword != ""){
	$query = mysqli_query($conn, "select * from tbl_customers where cust_id='".$custID."'");
	$num = mysqli_num_rows($query);
	if($num != 0){
		$query2 = mysqli_query($conn, "select * from tbl_customers where cust_id='".$custID."' and password='".$oldPword."'");
		$num2 = mysqli_num_rows($query2);
		if($num2 != 0){
			$query3 = mysqli_query($conn, "update tbl_customers set password='".$newPword."' where cust_id='".$custID."'");
			if($query3){
				echo "Your Password updated successfully!";
			}else{
				echo "Something went wrong, Try again.";
			}	
		}else{
			echo "You entered old password is wrong.";
		}
	}else{
		echo "Invalid UserName";
	}	
}
mysqli_close($conn);
?>