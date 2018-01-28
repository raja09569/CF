<?php
//print_r($_)
move_uploaded_file($_FILES["file"]["tmp_name"], "../../customers/".$_FILES["file"]["name"])
/*if(){
	echo "success";
}else{
	echo "error";
}*/
?>