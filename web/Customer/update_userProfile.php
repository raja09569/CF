<?php
require_once '../Includes/db.php';

$custID = $_POST['custID'];
$name = $_POST['name'];
$emailID = $_POST['emailID'];
$phoneno = $_POST['phoneno'];
$adrs = $_POST['adrs'];

$query1 = mysqli_query($conn, "select cust_id from tbl_customers where cust_id='".$custID."' and is_deleted!='yes'");
$num1 = mysqli_num_rows($query1);
if($num1 > 0){
	$query = mysqli_query($conn, "update tbl_customers set name='".$name."', email_id='".$emailID."', mobile_number='".$phoneno."',address='".$adrs."' where cust_id='".$custID."'");
	if($query){
		echo "success";
		$_SESSION['customer_user_uname'] = $emailID;
	}else{
		echo "Something went wrong, Try again.";
	}
}else{
	echo "Invalid Customer";
}
?>