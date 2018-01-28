<?php
include '../Includes/db.php';

if(isset($_SESSION['customer_user_uname'])){
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