<?php
include '../../Includes/db.php';
if(!isset($_SESSION['uname'])){
?>
<script>window.location.href = "../Login.php"</script>
<?php
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/png" href="../../images/favicon.png"/>
<title>CamerounFacile</title>
<!-- Bootstrap -->
<link href="../../dist/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="../../assets/css/custom.css" rel="stylesheet" media="screen">
<link href="../../assets/css/dashboard.css" rel="stylesheet" media="screen">
<!-- Carousel -->
<link href="../../examples/carousel/carousel.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../../assets/css/jquery.easy-pie-chart.css">
<link rel="stylesheet" href="../../assets/css/jquery-ui.css" />		
<!-- jQuery -->	
<script src="../../assets/js/jquery.v2.0.3.js"></script>
<script type="text/javascript" src="../js/admin_dashboard.js"></script>
<link rel="stylesheet" href="../css/admin_dashboard.css" />
<link href='../css/fonts.css' rel='stylesheet' type='text/css'>	
<link rel="stylesheet" type="text/css" href="../css/iconselect.css" >
<script type="text/javascript" src="../js/iconselect.js"></script>
<script type="text/javascript" src="../js/iscroll.js"></script>
</head>
<body id="top">
<!-- CONTENT -->
<div class="container2">
<div class="container2 offset-0">
<!-- CONTENT -->
<div class="col-md-12  offset-0">