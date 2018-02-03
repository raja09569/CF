<?php
include '../../Includes/db.php';

$driverID = $_POST['driverID'];

$query = mysqli_query($conn, "select name, email_id, mobile_number, registered_date, driver_photo, duty_status, is_activated, vehicle_category, vehicle_no, owner_name, vehicle_name, is_ac_available, licence_no, is_onRide, address, locality, city, state, country, pincode, vehicle_photo, bank_name, IFSCcode, bank_location, other_datails from tbl_drivers where driver_id='".$driverID."' and is_deleted!='yes'");
$num = mysqli_num_rows($query);
$outp = '';
if($num > 0){
	$row = mysqli_fetch_assoc($query);

	$name = $row['name'];
	$name = $row['name'];
	$name = $row['name'];
	$name = $row['name'];
	$name = $row['name'];
	$name = $row['name'];
	$name = $row['name'];
	$name = $row['name'];
	$name = $row['name'];
	$name = $row['name'];
	$name = $row['name'];
	$name = $row['name'];
	$name = $row['name'];
	$name = $row['name'];
	$name = $row['name'];
	$name = $row['name'];
	$name = $row['name'];
	$name = $row['name'];
	
	
	

	$outp = '{"msg": "success", "name": }'
}else{
	$outp = '{"msg":"Invalid Driver"}';
}
echo $outp;
?>