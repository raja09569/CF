<?php
require_once '../Includes/db.php';

$name = $_POST['name'];
$address = $_POST['address'];
$location = $_POST['location'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$pin = $_POST['pin'];
$license = $_POST['license'];
$phoneno = $_POST['phone_no'];
$email_id = $_POST['email_id'];
$bank_name = $_POST['bank_name'];
$bank_ac_no = $_POST['bank_ac_no'];
$ifsc_code = $_POST['ifsc_code'];
$bank_location = $_POST['bank_location'];
$cab_type = $_POST['cab_type'];
$cab_regno = $_POST['cab_regno'];
$vehicle_name = $_POST['vehicle_name'];
$is_ac_available = $_POST['is_ac_available'];
$owner_name = $_POST['owner_name'];
$other_details = $_POST['driver_other_details'];
//echo $cab_type;

if($cab_type != ""){
	$query = mysqli_query($conn, "select * from tbl_drivers where mobile_number='".$phoneno."'");
	$num = mysqli_num_rows($query);
	$query2 = mysqli_query($conn, "select * from tbl_drivers where email_id='".$email_id."'");
	$num2 = mysqli_num_rows($query2);
	if($num != 0){
		echo "Mobile number already added!";
		exit;
	}else if ($num2 != 0){
		echo "Email id already added!";
		exit;
	}else{
		
		$query1 = mysqli_query($conn, "select * from tbl_drivers order by s_no limit 1");
		$num1 = mysqli_num_rows($query1);
		if($num1 != 0){
			$row1 = mysqli_fetch_assoc($query1);
			$driverID = $row1['driver_id'];
			$driverID = ++$driverID;
		}else{
			$driverID = "CBDR0001";
		}
		
		$target_dir = "pics/";
		$fileName = $_FILES["driver_photo"]["name"];
		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		$target_file = $target_dir.$driverID."PC.".$ext;
		if($_FILES['driver_photo']['size'] != 0){
			if(move_uploaded_file($_FILES['driver_photo']['tmp_name'], $target_file)){

			}else{
				echo "Something wrong while uploading image, try again!";
				exit;
			}
		}
		$target_file = "Driver/".$target_file;
		
		$target_dir2 = "vehicle_pics/";
		$fileName2 = $_FILES["vehicle_photo"]["name"];
		$ext2 = pathinfo($fileName2, PATHINFO_EXTENSION);
		$target_file2 = $target_dir2.$driverID."VCL.".$ext2;
		if($_FILES['vehicle_photo']['size'] != 0){
			if(move_uploaded_file($_FILES['vehicle_photo']['tmp_name'], $target_file2)){

			}else{
				echo "Something while uploading image, try again!";
				exit;
			}
		}
		$target_file2 = "Driver/".$target_file2;
		
		$query3 = mysqli_query($conn, "insert into tbl_drivers (driver_id, name, mobile_number,
		email_id, driver_photo, address, locality, city, state, country, pincode,
		licence_no, vehicle_category, vehicle_no, vehicle_photo, vehicle_name, is_ac_available,
		bank_name, bank_ac_no,IFSCcode, bank_location, owner_name, other_details, 
		is_deleted ,registered_date) values ('".$driverID."', '".$name."','".$phoneno."',
		'".$email_id."', '".$target_file."', '".$address."', '".$location."', '".$city."',
		'".$state."','".$country."','".$pin."', '".$license."', '".$cab_type."',
		'".$cab_regno."', '".$target_file2."', '".$vehicle_name."',
		'".$is_ac_available."', '".$bank_name."', '".$bank_ac_no."', '".$ifsc_code."',
		'".$bank_location."', '".$owner_name."', '".$other_details."', 'no',now())");
		if($query3){
			echo "success";
			//echo "<center><p>Registration successful. We will contact you soon</p></center>";
		}else{
			echo "Something happend! try again.";
		}
	}
}else{
	echo "Enter cab type";
}	
?>