<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'db_travel');
//$conn = mysqli_connect('blush.mysitehosted.com', 'crescom_travel', 'travel123', 'db_travel');

$inactive = 120; 
if(isset($_SESSION['timeout'])){
$session_life = time() - $_SESSION['timeout'];
if($session_life > $inactive)
{  
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
?>
<script>alert("Your order is timed out, Book it again.");</script>
<?php	
}
}else{
}
?>