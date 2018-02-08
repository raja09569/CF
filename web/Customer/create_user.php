<?php

include '../Includes/db.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$dialCode = $_POST['dialCode'];
$phoneno = $_POST['phoneno'];
$email_id = $_POST['email_id'];
$address = $_POST['address'];
$country = $_POST['country'];
$password = $_POST['password'];

if($fname == ""){
	//$outp = '{"msg": "Parameters should not be empty"}';
	$outp = '{"msg": "Parameters should not be empty"}';
	echo json_encode($outp);
	exit();
}
if($lname == ""){
	$outp = '{"msg": "Parameters should not be empty"}';
	echo $outp;
	exit();
}
if($dialCode == ""){
	$outp = '{"msg": "Parameters should not be empty"}';
	echo $outp;
	exit();
}
if($phoneno == ""){
	$outp = '{"msg": "Parameters should not be empty"}';
	echo $outp;
	exit();
}
if($email_id == ""){
	$outp = '{"msg": "Parameters should not be empty"}';
	echo $outp;
	exit();
}
if($address == ""){
	$outp = '{"msg": "Parameters should not be empty"}';
	echo $outp;
	exit();
}
if($country == ""){
	$outp = '{"msg": "Parameters should not be empty"}';
	echo $outp;
	exit();
}
if($password == ""){
	$outp = '{"msg": "Parameters should not be empty"}';
	echo $outp;
	exit();
}
$query = mysqli_query($conn, "select cust_id from tbl_customers where isd_code='".$dialCode."' and mobile_number='".$phoneno."' and is_deleted!='yes'");
$num = mysqli_num_rows($query);
if($num > 0){
	$outp = '{"msg": "Mobile Number already Exist"}';
	echo $outp;
	exit();
}
$query1 = mysqli_query($conn, "select cust_id from tbl_customers where email_id='".$email_id."' and is_deleted!='yes'");
$num1 = mysqli_num_rows($query1);
if($num1 > 0){
	$outp = '{"msg": "EmailID already Exist"}';
	echo $outp;
	exit();
}
if(isset($_POST['sendOTP'])){
	$query2 = mysqli_query($conn, "select mobile from tbl_verification_codes where mobile='".$phoneno."'");
	$num2 = mysqli_num_rows($query2);
	if($num2 > 0){
		$randomNum = generateRandomString();
		$query4 = mysqli_query($conn, "update tbl_verification_codes set verification_code='".$randomNum."' where mobile='".$phoneno."'");
		if($query4){
			sendSMS($phoneno, "Your Requested Verification Code is ".$randomNum);
			$outp = '{"msg": "Success"}';
			echo $outp;
			exit();
		}else{
			$outp = '{"msg": "Something went wrong, try again"}';
			echo $outp;
			exit();
		}
	}else{
		$randomNum = generateRandomString();
		$query3 = mysqli_query($conn, "insert into tbl_verification_codes (mobile, verification_code) values ('".$phoneno."', '".$randomNum."')");
		if($query3){
			sendSMS($phoneno, "Your Requested Verification Code is ".$randomNum);
			$outp['msg'] = "Success";
			echo json_encode($outp);
			exit();
		}else{
			$outp = '{"msg": "Something went wrong, try again"}';
			echo $outp;
			exit();
		}
	}
}else{

	$query6 = mysqli_query($conn, "select cust_id from tbl_customers order by cust_id limit 1");
	$num6 = mysqli_num_rows($query6);
	if($num6 > 0){
		$row6 = mysqli_fetch_assoc($query6);
		$custID = $row6['cust_id'];
		$custID = substr($custID, 4);
		$custID = $custID + 1;
		$custID = str_pad($custID, 4, '0', STR_PAD_LEFT);
		$custID = "CUST".$custID;
	}else{
		$custID = "CUST0001";
	}
	if(isset($_FILES['profile_pic'])){
		$target_dir = "pics/";
		$target_file = $target_dir.$custID;
		if($_FILES['profile_pic']['size'] != 0){
			if(move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)){
				$query7 = mysqli_query($conn, "insert into tbl_customers (cust_id, first_name, last_name, isd_code, mobile_number, email_id, picture, address, country, password, registered_date) values ('".$custID."', '".$fname."', '".$lname."', '".$dialCode."', '".$phoneno."', '".$email_id."', '".$target_file."', '".$address."', '".$country."', '".$password."', now())");
				if($query7){
					$outp = '{"msg": "Success"}';
					echo $outp;
					exit();
				}else{
					$outp = '{"msg", "Something went wrong, try again"}';
					echo $outp;
					exit();
				}
			}else{
				$outp = '{"msg": "Error in uploading Profile Pic, Try again"}';
				echo $outp;
				exit();
			}
		}else{   
			$query8 = mysqli_query($conn, "insert into tbl_customers (cust_id, first_name, last_name, isd_code, mobile_number, email_id, address, country, password, registered_date) values ('".$custID."', '".$fname."', '".$lname."', '".$dialCode."', '".$phoneno."', '".$email_id."', '".$address."', '".$country."', '".$password."', now())");
			if($query8){
				//echo "<meta http-equiv='refresh' content='0'>";
				//echo "Registration successful. Now you can login. <a href='user_login.php'>Click here</a> to login";
				$outp = '{"msg": "Success"}';
				echo $outp;
				exit();
			}else{
				$outp = '{"msg", "Something went wrong, try again"}';
				echo $outp;
				exit();
			}  
		}
	}else{
		$query5 = mysqli_query($conn, "insert into tbl_customers (cust_id, first_name, last_name, isd_code, mobile_number, email_id, address, country, password, registered_date) values ('".$custID."', '".$fname."', '".$lname."', '".$dialCode."', '".$phoneno."', '".$email_id."', '".$address."', '".$country."', '".$password."', now())");
		if($query5){
			$outp = '{"msg": "Success"}';
			echo $outp;
			exit();
		}else{
			$outp = '{"msg", "Something went wrong, try again"}';
			echo $outp;
			exit();
		}
	}
}

function generateRandomString($length = 6) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function sendSMS($mobile, $message){
	$user = "leesoft";
	$apikey = "PtIcihedW5GofPekdaZg"; 
	$senderid  =  "LEESMS";
	$message = urlencode($message);
	$type   =  "txt";
	$ch = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".$user."&apikey=".$apikey."&mobile=".$mobile."&senderid=".$senderid."&message=".$message."&type=".$type.""); 
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);      
	curl_close($ch); 
	//echo $output;
}

?>