<?php
include '../../Includes/db.php';

$sno = $_POST['sno'];
$name = $_POST['name'];
$cabType = $_POST['cabType'];
$adrs = $_POST['adrs'];
$location = $_POST['location'];
$country = $_POST['country'];
$phoneno = $_POST['phoneno'];
$emailid = $_POST['emailid'];
$licenceno = $_POST['licenceno'];
$vehicleno = $_POST['vehicleno'];
$bankname = $_POST['bankname'];
$bankacno = $_POST['bankacno'];
$ifsccode = $_POST['ifsccode'];
$bnklocation = $_POST['bnklocation'];

//echo $name;

$query = "update drivers set driver_name='$name', cab_type='$cabType', address='$adrs', location='$location' ";
$query .= ", country='$country', phone_no='$phoneno', email_id='$emailid', licence_no='$licenceno', cab_regn_no='$vehicleno',";
$query .= " bank_name='$bankname', bank_ac_no='$bankacno', IFSCcode='$ifsccode', bank_location='$bnklocation' where s_no='$sno'";
$result = mysqli_query($conn, $query);
if($result){
	echo "Updated Successfully";
}else{
	echo "Something went wrong, Try again.";
}

?>