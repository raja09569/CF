<?php
header('Access-Control-Allow-Origin: *');
include '../db.php';

$custID = $_POST['cust_id'];
$categoryID = $_POST['category_id'];
$subcategoryID = $_POST['subcategory_id'];
$name = $_POST['name'];
$companyName = $_POST['comp_name'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$location = $_POST['location'];
$territory = $_POST['territory'];
$country = $_POST['country'];
$emailId = $_POST['email_id'];
$dialCode = $_POST['dialCode'];
$mobile_number = $_POST['mobile_number'];
$heading = $_POST['heading'];
$comp_profile = $_POST['comp_profile'];
$product_details = $_POST['product_details'];
$photos = $_POST['photos'];

$query = mysqli_query($conn, "select * from tbl_ads where email_id='".$emailId."' and 
mobile_number='".$mobile_number."' and heading='".$heading."' and comp_profile='".$comp_profile."'
and product_dtls='".$product_details."' and is_deleted!='yes'");
$num = mysqli_num_rows($query);
if($num != 0){
	$outp = '{"msg": "This Post is already available!"}';
}else{
	
	$query2 = mysqli_query($conn, "select * from tbl_ads order by s_no desc limit 1");
	$num2 = mysqli_num_rows($query2);
	if($num2 != 0){
		$row2 = mysqli_fetch_assoc($query2);
		$adID = $row2['ad_id'];
		$adID = ++$adID;
	}else{
		$adID = "CFAD0001";
	}
	
	$query3 = mysqli_query($conn, "insert into tbl_ads (ad_id, category_id, subcategory_id,
	name, company_name, address1, address2, location, territory, country, email_id, dialCode, mobile_number,
	heading, comp_profile, product_dtls, photos,created_by, created_at) value ('".$adID."', '".$categoryID."',
	'".$subcategoryID."', '".$name."', '".$companyName."', '".$address1."', '".$address2."',
	'".$location."', '".$territory."', '".$country."', '".$emailId."', '".$dialCode."', '".$mobile_number."',
	'".$heading."', '".$comp_profile."', '".$product_details."', '".$photos."', '".$custID."', now())");
	if($query3){
		$outp = '{"msg":"success","adID":"'.$adID.'"}';
	}else{
		$outp = '{"msg":"Something went wrong, Try again"}';
	}
	
}
echo $outp;
?>