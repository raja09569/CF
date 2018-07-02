<?php
$local = false;
if($local){
	$conn = mysqli_connect('localhost', 'root', '', 'db_travel');
}else{
	$conn = mysqli_connect('blush.mysitehosted.com', 'crescom_travel', 'travel123', 'db_travel');
}

?>