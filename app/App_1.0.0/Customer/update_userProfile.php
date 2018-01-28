<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$custID = $_POST['custID'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mobile = $_POST['mobile'];

if($custID != "" && $fname != ""){
	$query = mysqli_query($conn, "select * from tbl_customers where cust_id='".$custID."'");
	$num = mysqli_num_rows($query);
	if($num != 0){
		$query2 = mysqli_query($conn, "update tbl_customers set first_name='".$fname."',last_name='".$lname."',mobile_number='".$mobile."' where cust_id='".$custID."'");
		if($query2){
			echo "Your profile updated successfully!";
		}else{
			echo "Something went wrong, Try again.";
		}
	}else{
		echo "Invalid UserName";
	}	
}
mysqli_close($conn);
?>