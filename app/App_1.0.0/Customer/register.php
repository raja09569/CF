<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$isd = $_POST['isd'];
$mobile = $_POST['mobile'];
$country = $_POST['country'];
$pword = $_POST['pword'];
$repword = $_POST['repword'];
$deviceID = $_POST['deviceID'];

$outp = '[';
if($fname != "" && $pword != ""
	&& $lname != "" && $email != "" 
	&& $mobile != "" && $repword != ""){
	
	if($pword == $repword){		
		
		$query = mysqli_query($conn, "select * from tbl_customers where email_id = '".$email."'");
		$num = mysqli_num_rows($query);
		
		$query2 = mysqli_query($conn, "select * from tbl_customers where mobile_number = '".$mobile."'");
		$num2 = mysqli_num_rows($query2);
		
		if($num != 0){
			
			$outp .= '{"msg":"EmailId Already registered!"}';
		
		}else if($num2 != 0){
			
			$outp .= '{"msg":"MobieNumber Already registered!"}';
		
		}else{
			
			$query1 = mysqli_query($conn, "select * from tbl_customers order by cust_id desc limit 1");
			$num1 = mysqli_num_rows($query1);
			if($num1 != 0){
				$row1 = mysqli_fetch_assoc($query1);
				$custID = $row1['cust_id'];
				$custID = substr($custID, 4);
				$custID = $custID + 1;
				$custID = str_pad($custID, 4, '0', STR_PAD_LEFT);
				$custID = "CUST".$custID;
			}else{
				$custID = "CUST0001";
			}
			
			$query3 = mysqli_query($conn, "insert into tbl_customers (cust_id, first_name, last_name,
			isd_code, mobile_number, email_id, picture, address, city, state, country, reg_id, device_id,
			notification_status, password, is_deleted, ip_address, registered_date) values ('".$custID."',
			'".$fname."', '".$lname."', '".$isd."', '".$mobile."', '".$email."', '', '', '', '',
			'".$country."', '', '".$deviceID."', 'on', '".$pword."', 'no', '', now())");
			
			if($query3){
				$outp .= '{"msg":"success"}';
			}else{
				$outp .= '{"msg":"Something went wrong, Try again!"}';
			}
		
		}
	}else{
		$outp .= '{"msg":"Passwords should match!"}';
	}	
}else{
	$outp .= '{"msg":"Required fields should not be Empty!"}';
}
$outp .= ']';
echo $outp;
mysqli_close($conn);

?>