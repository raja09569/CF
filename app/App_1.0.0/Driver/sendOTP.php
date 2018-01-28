<?php
header('Access-Control-Allow-Origin: *');
include 'db.php';

$mobile = $_POST['mobile'];

if($mobile != ""){
	$query = mysqli_query($conn, "select * from tbl_drivers where mobile_number='".$mobile."'");
	$num = mysqli_num_rows($query);
	if($num != 0){
		$query2 = mysqli_query($conn, "select * from tbl_drivers where mobile_number='".$mobile."' and is_activated='yes'");
		$num2 = mysqli_num_rows($query2);
		if($num2){
			$randomNum = generateRandomString();
			$query3 = mysqli_query($conn, "select * from tbl_verification_codes where mobile='".$mobile."'");
			$num3 = mysqli_num_rows($query3);
			if($num3 != 0){
				$query5 = mysqli_query($conn, "update tbl_verification_codes set verification_code='".$randomNum."' where mobile='".$mobile."'");
				if($query5){
					sendSMS($mobile, "Your Requested OTP is ".$randomNum);
					echo "success";
				}else{
					echo "Something went wrong, Try again.";
				}
			}else{
				$query4 = mysqli_query($conn, "insert into tbl_verification_codes (mobile, verification_code) values
				('".$mobile."', '".$randomNum."')");
				if($query4){
					sendSMS($mobile, "Your Requested OTP is ".$randomNum);
					echo "success";
				}else{
					echo "Something went wrong, Try again.";
				}
			}
		}else{
			echo "Hey, you are not activated. Contact CamerounFacile, Get Activated.";
		}
	}else{
		echo "Invalid Mobile Number";
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
mysqli_close($conn);
?>