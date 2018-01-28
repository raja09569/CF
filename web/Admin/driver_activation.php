<?php
include 'db.php';
include 'header.php';

if(!isset($_SESSION['uname'])){
?>
<script>window.location.href = "manager_login.php"</script>
<?php
}
?>
<link rel="stylesheet" type="text/css" media="all" href="css/sidemenu.css">
<div class="container breadcrub">
<div>
<a class="homebtn left" href="#"></a>
<div class="left">
<ul class="bcrumbs">
<li>/</li>
<li><a href="index.php">Home</a></li>
<li>/</li>
<li><a href="driver_activation.php">Drivers Activation</a></li>					
</ul>				
</div>
<a class="backbtn right" href="#"></a>
</div>
<div class="clearfix"></div>
<div class="brlines"></div>
</div>

<!-- CONTENT -->
<div class="container">
<div class="container pagecontainer offset-0">	

<?php include 'side_menu.php' ?>

<!-- LIST CONTENT-->
<div class="rightcontent col-md-9 offset-0">

<div class="hpadding20">
<!-- Top filters -->
<div class="topsortby">
<!--<div class="col-md-4 offset-0">

<div class="left mt7"><b>Sort by:</b></div>

<div class="right wh70percent">
<select class="form-control mySelectBoxClass ">
<option selected>Manufacturer</option>
<option>Audi</option>
<option>BMW</option>
<option>Mazda</option>
<option>Lamborghini</option>
<option>Porsche</option>
<option>Volkswagen</option>
<option>...</option>
</select>
</div>

</div>			
<div class="col-md-4">
<div class="w50percent">
<div class="wh90percent">
<select class="form-control mySelectBoxClass ">
<option selected>Automatic</option>
<option>Manual</option>
<option>CVT (Continuous variable transmission)</option>
<option>Semi automatic</option>
<option>TipTronic® gearbox</option>
<option>DSG (Direct shift gearbox)</option>
</select>
</div>
</div>
<div class="w50percentlast">
<div class="wh90percent">
<select class="form-control mySelectBoxClass ">
<option selected>Price</option>
<option>Ascending</option>
<option>Descending</option>
</select>
</div>
</div>					
</div>
<div class="col-md-4 offset-0">
<div class="wh50percent left">
<select class="form-control mySelectBoxClass ">
<option selected>Fuel type</option>
<option>Diesel</option>
<option>Petrol</option>
<option>Hibrid</option>
<option>Electric</option>
</select>
</div>
<div class="right">
<button class="gridbtn active">&nbsp;</button>
<button class="listbtn active">&nbsp;</button>
<button class="grid2btn active">&nbsp;</button>
</div>
</div>-->
</div>
<!-- End of topfilters-->

<div style="width:100%; overflow-x: scroll;">
<center>
<?php

if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
}


$query = mysqli_query($conn, "select * from drivers");
$num = mysqli_num_rows($query);
					
$body = "<table cellpadding='3px' border='1em' style='width:90%;margin:5%;overflow-x: scroll;'>";
$body .= "<tr><th colspan='15' align='center' style='padding:2%;text-align:center;'> List of Drivers </th></tr>";
$body .= "<tr>";
$body .= "<th style='width:1%;text-align:center;'>S.No</th>";
$body .= "<th style='width:10%;text-align:center;'>Cab driver name</th>";
$body .= "<th style='width:10%;text-align:center;'>Cab type</th>";
$body .= "<th style='width:10%;text-align:center;'>Registered date</th>";
$body .= "<th style='width:10%;text-align:center;'>Address</th>";
$body .= "<th style='width:10%;text-align:center;'>Location</th>";
$body .= "<th style='width:10%;text-align:center;'>City</th>";
$body .= "<th style='width:10%;text-align:center;'>State</th>";
$body .= "<th style='width:10%;text-align:center;'>Country</th>";
$body .= "<th style='width:10%;text-align:center;'>Phone No</th>";
$body .= "<th style='width:10%;text-align:center;'>Email</th>";
$body .= "<th style='width:10%;text-align:center;'>Bank name</th>";
$body .= "<th style='width:10%;text-align:center;'>Bank Account</th>";
$body .= "<th style='width:10%;text-align:center;'>Activated Date</th>";
$body .= "<th style='width:10%;text-align:center;'></th>";
$body .= "</tr>";
if($num === 0){
$body.="<tr><td colspan='15' align='center'>No Records Found!</td></tr>";
$body.="</table>";
}else{

$s_no = 1;
while($row = mysqli_fetch_assoc($query)){
$driver_name = $row['driver_name'];
$query2 = mysqli_query($conn, "select * from cab_types where s_no='".$row['cab_type']."'");
$num2 = mysqli_num_rows($query2);
if($num2 != 0){
$row2 = mysqli_fetch_assoc($query2);
$cab_type = $row2['cab_type'];
}
$reg_dt = $row['registered_date'];
$adrs = $row['address'];
$location = $row['location'];
$city = $row['city'];
$state = $row['state'];
$country = $row['country'];
$phoneno = $row['phone_no'];
$email_id = $row['email_id'];
$bank_name = $row['bank_name'];
$bank_ac_no = $row['bank_ac_no'];
if($row['activation_status'] == "yes"){
$url = "<a href='activate_driver.php?id=".$row['s_no']."&status=no'>DeActivate</a>";
}else{
$url = "<a href='activate_driver.php?id=".$row['s_no']."&status=yes'>Activate</a>";
}
$body.="<tr>";
$body.="<td style='width:1%;text-align:center;'>$s_no</td>";
$body.="<td style='width:10%;text-align:center;'>$driver_name</td>";
$body.="<td style='width:10%;text-align:center;'>$cab_type</td>";
$body.="<td style='width:10%;text-align:center;'>$reg_dt</td>";
$body.="<td style='width:10%;text-align:center;'>$adrs</td>";
$body.="<td style='width:10%;text-align:center;'>$location</td>";
$body.="<td style='width:10%;text-align:center;'>$city</td>";
$body.="<td style='width:10%;text-align:center;'>$state</td>";
$body.="<td style='width:10%;text-align:center;'>$country</td>";
$body.="<td style='width:10%;text-align:center;'>$phoneno</td>";
$body.="<td style='width:10%;text-align:center;'>$email_id</td>";
$body.="<td style='width:10%;text-align:center;'>$bank_name</td>";
$body.="<td style='width:10%;text-align:center;'>$bank_ac_no</td>";
$body.="<td style='width:10%;text-align:center;'></td>";
$body.="<td style='width:10%;text-align:center;'>$url</td>";
$body.="</tr>";
$s_no=$s_no+1;
}
$body.="</table>";
}
echo $body; 

?>                           

</center>
</div>

</div>
<!-- End of padding -->

<br/><br/>
<div class="clearfix"></div>

<div class="clearfix"></div>
<div class="offset-2"><hr class="featurette-divider3"></div>
</div>
<!-- END OF LIST CONTENT-->


</div>
<!-- END OF container-->

</div>
<!-- END OF CONTENT -->
<?php include 'footer2.php'; ?>