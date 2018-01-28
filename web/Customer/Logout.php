<?php
include '../Includes/db.php';
if(isset($_SESSION['customer_user_uname'])){
	$query = mysqli_query($conn, "update tbl_customer set web_login_status='loggedOut' where cust_id='".$_SESSION['customer_user_ID']."'");
	unset($_SESSION['customer_user_uname']);
	unset($_SESSION['pick']);
	unset($_SESSION['drop']);
	unset($_SESSION['pick_date']);
	unset($_SESSION['pick_time']);
	unset($_SESSION['drop_date']);
	unset($_SESSION['drop_time']);
	unset($_SESSION['id']);
	unset($_SESSION['distance']);
	unset($_SESSION['price']);
	unset($_SESSION['timeout']);
	unset($_SESSION['customer_user_ID']);
	session_unset();
	?>
	<script>window.location = "../../index.php"</script>
	<?php
}
if(isset($_SESSION['uname'])){
	unset($_SESSION['uname']);
	?>
	<script>window.location = "../../index.php"</script>
	<?php
}
?>