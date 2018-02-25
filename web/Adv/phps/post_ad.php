<?php
header('Access-Control-Allow-Origin: *');
include '../../Includes/db.php';

$custID = $_POST['custID'];
$categoryID = $_POST['category'];
$subcategoryID = $_POST['subcat'];
$name = $_POST['name'];
$companyName = $_POST['company'];
$address1 = $_POST['country'];
$address2 = $_POST['territory'];
$location = $_POST['location'];
$territory = $_POST['address1'];
$country = $_POST['address2'];
$emailId = $_POST['emailID'];
$dialCode = $_POST['dialCode'];
$mobile_number = $_POST['mobile'];
$heading = $_POST['heading'];
$comp_profile = $_POST['compProf'];
$product_details = $_POST['prdctDtls'];
//$photos = $_POST['photos'];

$query = mysqli_query($conn, "select ad_id from tbl_ads where email_id='".$emailId."' and mobile_number='".$mobile_number."' and heading='".$heading."' and comp_profile='".$comp_profile."' and product_dtls='".$product_details."' and is_deleted!='yes'");
$num = mysqli_num_rows($query);
if($num != 0){
	$outp = '{"msg": "This Post is already available!"}';
}else{
	
	$query2 = mysqli_query($conn, "select ad_id from tbl_ads order by s_no desc limit 1");
	$num2 = mysqli_num_rows($query2);
	if($num2 != 0){
		$row2 = mysqli_fetch_assoc($query2);
		$adID = $row2['ad_id'];
		$adID = ++$adID;
	}else{
		$adID = "CFAD0001";
	}
	
	$query3 = mysqli_query($conn, "insert into tbl_ads (ad_id, category_id, subcategory_id, name, company_name, address1, address2, location, territory, country, email_id, dialCode, mobile_number, heading, comp_profile, product_dtls, created_by, created_at) value ('".$adID."', '".$categoryID."', '".$subcategoryID."', '".$name."', '".$companyName."', '".$address1."', '".$address2."', '".$location."', '".$territory."', '".$country."', '".$emailId."', '".$dialCode."', '".$mobile_number."', '".$heading."', '".$comp_profile."', '".$product_details."', '".$custID."', now())");
	if($query3){
		$outp = '{"msg":"success"}';
	}else{
		$outp = '{"msg":"Something went wrong, Try again"}';
	}
	
}
echo $outp;
?>