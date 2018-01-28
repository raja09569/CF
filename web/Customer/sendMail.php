<?php
include 'db.php';
include 'mail/library.php'; // include the library file
include 'mail/class.phpmailer.php';

$email = $_POST['email'];

$query = mysqli_query($conn, "select * from users where emailid='".$email."'");
$num = mysqli_num_rows($query);
if(num != 0){
	$code = generateRandomString();
	
	
	
	$query2 = mysqli_query($conn, "update users set code='".$code."' where emailid='".$email."'");
	if($query2){
		$name='CamerounFacile.com';
		$semail = 'info@crescom.in';
		//$mobile='985644';
		$subject='Forgot Password';
		$massage = 'Yours Auto Generated code is '.$code;
		
		$mail   = new PHPMailer; // call the class 
		$mail->IsSMTP(); 
		$mail->Host = SMTP_HOST; //Hostname of the mail server
		$mail->Port = SMTP_PORT; //Port of the SMTP like to be 25, 80, 465 or 587
		$mail->SMTPAuth = true; //Whether to use SMTP authentication
		$mail->Username = SMTP_UNAME; //Username for SMTP authentication any valid email created in your domain
		$mail->Password = SMTP_PWORD; //Password for SMTP authentication
		$mail->AddReplyTo($semail, "Reply To"); //reply-to address
		$mail->SetFrom($semail,$name); //From address of the mail
		// put your while loop here like below,
		$mail->Subject = "Forgot Password from : ".$semail; //Subject od your mail
		$mail->AddAddress($email, "CamerounFacile.com"); //To address who will receive this email
		$mail->MsgHTML($massage); //Put your body of the message you can place html code here
		//$mail->AddAttachment("images/asif18-logo.png"); //Attach a file here if any or comment this line, 
		$send = $mail->Send(); //Send the mails*/
		if($send){
			echo "success";
		}else{
			echo "something went wrong, Try again.";
		}
	}else{
		echo "something went wrong, Try again.";
	}
}else{
	echo "Enter valid Email Id";
}



function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
	
	$query3 = mysqli_query($conn, "select * from users where code='".$randomString."'");
	$num3 = mysqli_num_rows($query3);
	if($num3 != 0){
		generateRandomString();
	}
	
    return $randomString;
}

?>