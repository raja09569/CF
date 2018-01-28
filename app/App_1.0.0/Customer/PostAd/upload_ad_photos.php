<?php
header('Access-Control-Allow-Origin: *');
include '../db.php';
//print_r($_FILES);
//print_r($_POST);
$adID = $_POST['value1'];
$dir = '../../../../web/postAd-Pics/'.$adID;
if(!file_exists($dir)){
	$oldmask = umask(0);  
	mkdir($dir, 0744);
}
$fileName = $_FILES["file"]["name"];
$ext = pathinfo($fileName, PATHINFO_EXTENSION);
$count = 1;
moveFile($dir, $adID, $ext, $count);
function moveFile($dir, $adID, $ext, $count){
	$fileName = $adID."(".$count.").".$ext;
	if(!file_exists($dir."/".$fileName)) {
		$move = move_uploaded_file($_FILES["file"]["tmp_name"], $dir."/".$fileName);
		$size = filesize($dir."/".$fileName);
		include '../db.php';
		$fileName = "postAd-Pics/".$adID."/".$fileName;
		if($move){
			$query = mysqli_query($conn, "insert into tbl_ad_images (ad_id, img, size, addedOn) values 
			('".$adID."', '".$fileName."', '".$size."', now())");
			if($query){
				echo "Success";
			}else{
				echo "Something went wrong, Try again!";
			}
		}else{
			echo "Not uploaded!";
		}
	}else{
		$count = $count + 1;
		moveFile($dir, $adID, $ext, $count);
	}
}
?>