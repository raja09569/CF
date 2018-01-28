<?php
include '../../Includes/db.php';

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

$query1 = mysqli_query($conn, "select category_id from tbl_cab_categories where name='".$name."' and is_deleted!='yes'");
$num1 = mysqli_num_rows($query1);
$outp = "";
if($num1 != 0){
	$outp = "Category is already available";
}else{
	$query3 = mysqli_query($conn, "select category_id from tbl_cab_categories order by s_no desc limit 1");
	$num3 = mysqli_num_rows($query3);
	if($num3 != 0){
		$row3 = mysqli_fetch_assoc($query3);
		$categoryID = $row3['category_id'];
		$categoryID = ++$categoryID;
	}else{
		$categoryID = "CBCT0001";
	}
	$path = "";
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
					/* Live24u.com Don't allow simple caching... */
	    			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	    			/*Live24u.com  Set data type simple, size simple and simple filename */
	    			header("Content-Type: application/octet-stream");
	    			header("Content-Transfer-Encoding: binary");
	    			header("Content-Length: " . strlen($buffer));
	    			header("Content-Disposition: attachment; filename=$url");
	    			/*Live24u.com  Send our file... */
	    			//echo $buffer;
    				$path = "cab-pics/".$url;
    			}else{
    				echo "Unable to upload image, Try again.";
    				exit;
    			}
		}else{
    		echo "Uploaded image should be jpg or gif or png";
    		exit;
		}
	}
	$query2 = mysqli_query($conn, "insert into tbl_cab_categories (category_id, name, icon, no_of_seats, per_km_with_ac, per_km_without_ac, min_km_to_charge, min_charge_with_ac, min_charge_without_ac, owner_comm_per_trip, isRideLaterAvailable, tax, is_deleted, created_date) values ('".$categoryID."', '".$name."', '".$path."', '".$no_of_seats."', '".$per_km_with_ac."', '".$per_km_without_ac."', '".$min_km_to_charge."', '".$min_charge_with_ac."', '".$min_charge_without_ac."', '".$owner_comm_per_trip."', '".$isRideLater."', '".$tax."', 'no', now())");
	if($query2){
		$outp = "success";
	}else{
		$outp = "Something went wrong, Try again";
	}
}
echo $outp;

/*function img_compress_image($img_source_url, $liveupload_url, $img_qlty) {
	$img_information = getimagesize($img_source_url);
	if($img_information['mime'] == 'image/jpeg')
		$live_ifoimg = imagecreatefromjpeg($img_source_url);
	elseif($img_information['mime'] == 'image/gif')
		$live_ifoimg = imagecreatefromgif($img_source_url);
	elseif($img_information['mime'] == 'image/png')
		$live_ifoimg = imagecreatefrompng($img_source_url);
	imagejpeg($live_ifoimg, $liveupload_url, $img_qlty);
	return $liveupload_url;
}*/

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