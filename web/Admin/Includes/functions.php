<?php



function sendSMS($text, $mobileNumber){
	$user = "leesoft";
	$apikey = "PtIcihedW5GofPekdaZg"; 
	$senderid  =  "LEESMS";
	$message = urlencode($text);
	$type   =  "txt";
	$ch = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".$user."&apikey=".$apikey."&mobile=".$mobileNumber."&senderid=".$senderid."&message=".$message."&type=".$type.""); 
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);      
	curl_close($ch); 
}
?>