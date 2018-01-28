<?php
include '../../Includes/db.php';

$categoryID = $_POST['categoryID'];
$name = $_POST['name'];
$no_of_seats = $_POST['no_of_seats'];
$isRideLater = $_POST['isRideLater'];
$per_km_with_ac = $_POST['per_km_with_ac'];
$per_km_without_ac = $_POST['per_km_without_ac'];
$min_km_to_charge = $_POST['min_km_to_charge'];
$min_charge_with_ac = $_POST['min_charge_with_ac'];
$min_charge_without_ac = $_POST['min_charge_without_ac'];
$owner_comm_per_trip = $_POST['owner_comm_per_trip'];
$tax = $_POST['tax'];
$cIcon = $_POST['cIcon'];

$query1 = mysqli_query($conn, "select category_id from tbl_cab_categories where category_id='".$categoryID."' and is_deleted!='yes'");
$num1 = mysqli_num_rows($query1);
$outp = "";
if($num1 > 0){
	if(isset($_FILES['file'])){
		if (($_FILES["file"]["type"] == "image/gif") || 
			($_FILES["file"]["type"] == "image/jpeg") || 
			($_FILES["file"]["type"] == "image/png")) {
    			$destination = '../../cab-pics/';
				$fname = $_FILES["file"]["name"];
    			$file_ext = pathinfo($fname, PATHINFO_EXTENSION);
    			$url = $categoryID.".".$file_ext;
				$move = move_uploaded_file($_FILES["file"]["tmp_name"] ,
				 $destination.$url);
    			if($move){
    				$filename = compressImage($destination.$url, $destination.$url);
    				$buffer = file_get_contents($destination.$url);
	    			header("Content-Type: application/force-download");
	    			header("Content-Type: application/octet-stream");
	    			header("Content-Type: application/download");
					header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	    			header("Content-Type: application/octet-stream");
	    			header("Content-Transfer-Encoding: binary");
	    			header("Content-Length: " . strlen($buffer));
	    			header("Content-Disposition: attachment; filename=$url");
	    			$path = "cab-pics/".$url;

	    			$query2 = mysqli_query($conn, "update tbl_cab_categories set name = '".$name."', icon = '".$path."', no_of_seats = '".$no_of_seats."', per_km_with_ac = '".$per_km_with_ac."', per_km_without_ac = '".$per_km_without_ac."', min_km_to_charge = '".$min_km_to_charge."', min_charge_with_ac = '".$min_charge_with_ac."', min_charge_without_ac = '".$min_charge_without_ac."', owner_comm_per_trip = '".$owner_comm_per_trip."', isRideLaterAvailable = '".$isRideLater."', tax = '".$tax."' where category_id='".$categoryID."'");

    			}else{
    				echo "Unable to upload image, Try again.";
    				exit;
    			}
		}else{
    		echo "Uploaded image should be jpg or gif or png";
    		exit;
		}
	}else{
		if($cIcon == ""){
			$query2 = mysqli_query($conn, "update tbl_cab_categories set name = '".$name."', icon = '', no_of_seats = '".$no_of_seats."', per_km_with_ac = '".$per_km_with_ac."', per_km_without_ac = '".$per_km_without_ac."', min_km_to_charge = '".$min_km_to_charge."', min_charge_with_ac = '".$min_charge_with_ac."', min_charge_without_ac = '".$min_charge_without_ac."', owner_comm_per_trip = '".$owner_comm_per_trip."', isRideLaterAvailable = '".$isRideLater."', tax = '".$tax."' where category_id='".$categoryID."'");
		}else{
			$query2 = mysqli_query($conn, "update tbl_cab_categories set name = '".$name."', no_of_seats = '".$no_of_seats."', per_km_with_ac = '".$per_km_with_ac."', per_km_without_ac = '".$per_km_without_ac."', min_km_to_charge = '".$min_km_to_charge."', min_charge_with_ac = '".$min_charge_with_ac."', min_charge_without_ac = '".$min_charge_without_ac."', owner_comm_per_trip = '".$owner_comm_per_trip."', isRideLaterAvailable = '".$isRideLater."', tax = '".$tax."' where category_id='".$categoryID."'");
		}
	}
	if($query2){
		$outp = "success";
	}else{
		$outp = "Something went wrong, Try again";
	}
}else{
	$outp = "Category is not available";
}
echo $outp;

function compressImage($source_image, $compress_image) {
	$image_info = getimagesize($source_image);
	if ($image_info['mime'] == 'image/jpeg') {
		$source_image = imagecreatefromjpeg($source_image);
		//imagejpeg($source_image, $compress_image, 75);
	} elseif ($image_info['mime'] == 'image/gif') {
		$source_image = imagecreatefromgif($source_image);
		//imagegif($source_image, $compress_image, 75);
	} elseif ($image_info['mime'] == 'image/png') {
		$source_image = imagecreatefrompng($source_image);
		//imagepng($source_image, $compress_image, 6);
	}
	$tmp = imagecreatetruecolor(120, 120);
	list($width, $height) = $image_info;
	imagecopyresampled($tmp, $source_image, 0,0,0,0, 120, 120, $width, $height);
	imagejpeg($tmp, $compress_image, 100);
	return $compress_image;
}

?>