<?php
header('Access-Control-Allow-Origin: *');
include '../db.php';

$adID = $_POST['ad_id'];
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

$query = mysqli_query($conn, "select * from tbl_ads where ad_id='".$adID."' and is_deleted != 'yes'");
$num = mysqli_num_rows($query);
if($num != 0){
	$query =  mysqli_query($conn, "update tbl_ads set category_id='".$categoryID."' and subcategory_id='".$subcategoryID."' 
	and name='".$name."' and company_name='".$companyName."' and address1='".$address1."' and address2='".$address2."' and
	location='".$location."' and territory='".$territory."'and country='".$country."' and email_id='".$emailId."'
	and dialCode='".$dialCode."' and mobile_number='".$mobile_number."' and heading='".$heading."' and comp_profile='".$comp_profile."'
	and product_dtls='".$product_details."' where ad_id='".$adID."'");
	if($query){
		$outp = '{"msg": "success"}';
	}else{
		$outp = '{"msg": "Something went wrong, Try again!"}';
	}
}else{
	$outp = '{"msg": "Invalid Ad!"}';
}
echo $outp;
?>