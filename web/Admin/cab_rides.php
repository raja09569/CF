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
<li><a href="cab_ride.php">Cab Rides</a></li>			
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
<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="col-md-4 offset-0">

<!--<div class="left mt7"><b>Cab Type:</b></div>-->

<div class="right wh70percent">
<select class="form-control mySelectBoxClass " name="cab_type" required>
<!--<option selected>Manufacturer</option>
<option>Audi</option>
<option>BMW</option>
<option>Mazda</option>
<option>Lamborghini</option>
<option>Porsche</option>
<option>Volkswagen</option>
<option>...</option>-->
<?php
require_once 'db.php';
$query = mysqli_query($conn, "select * from cab_types");
$num = mysqli_num_rows($query);
if($num != 0){
?>
<option value="">Select Cab</option>
<?php
while($row = mysqli_fetch_assoc($query)){
?>
<option value="<?php echo $row['s_no'];?>"><?php echo $row['cab_type'];?></option>
<?php
}
}else{
?>
<option>No Records!</option>
<?php
}
?>

</select>
</div>
</div>

<div class="col-md-4">
<div class="left w50percent">
<div class="wh100percent">
<select class="form-control mySelectBoxClass" name="driver_list" required>
<!--<option selected>Automatic</option>
<option>Manual</option>
<option>CVT (Continuous variable transmission)</option>
<option>Semi automatic</option>
<option>TipTronic® gearbox</option>
<option>DSG (Direct shift gearbox)</option>-->
<?php
require_once 'db.php';
$query = mysqli_query($conn, "select * from drivers");
$num = mysqli_num_rows($query);
if($num != 0){
?>
<option value="">Select Driver</option>
<?php
while($row = mysqli_fetch_assoc($query)){
?>
<option value="<?php echo $row['s_no'];?>"><?php echo $row['driver_name'];?></option>
<?php
}
}else{
?>
<option>No Records!</option>
<?php
}
?>
</select>
</div>
</div>
<div class="w50percentlast">
<div class="wh90percent">
<!--<select class="form-control mySelectBoxClass ">
<option selected>Price</option>
<option>Ascending</option>
<option>Descending</option>
</select>-->
<input type="date" name="filter_start_date" class="form-control mySelectCalendar" placeholder="mm/dd/yyyy" required/>
</div>
</div>					
</div>
<div class="col-md-4 offset-0">
<div class="wh50percent left">
<!--<select class="form-control mySelectBoxClass ">
<option selected>Fuel type</option>
<option>Diesel</option>
<option>Petrol</option>
<option>Hibrid</option>
<option>Electric</option>
</select>-->
<input type="date" name="filter_end_date" class="form-control mySelectCalendar" placeholder="mm/dd/yyyy" required/>
</div>
<div class="right">
<button class="form-control" style="width: 100px;" name="filter">Filter</button>
<!--<button class="listbtn active">&nbsp;</button>
<button class="grid2btn active">&nbsp;</button>-->
</div>
</div>
</form>
</div>

<!-- End of topfilters-->
<div style="width: 100%; overflow-x: scroll;"> 

<?php
if(isset($_POST['filter'])){
	$query = mysqli_query($conn, "select * from customer_trips");
}else{
	$query = mysqli_query($conn, "select * from customer_trips");
}
$num = mysqli_num_rows($query);
$body = "<table cellpadding='3px' border='1em' style='width:90%;margin:5%;'>";
$body .= "<tr><th colspan='16' align='center' style='padding:2%;text-align:center;'> Cab Rides </th></tr>";
$body .= "<tr><th style='width:1%;text-align:center;'>S.No</th><th style='width:10%;text-align:center;'>Driver name</th>
<th style='width:10%;text-align:center;'>cab type</th><th style='width:10%;text-align:center;'>Cab no</th>
<th style='width:10%;text-align:center;'>Rate per hour</th>
<th style='width:10%;text-align:center;'>Rate per day</th>
<th style='width:10%;text-align:center;'>Start place</th>
<th style='width:10%;text-align:center;'>date</th>
<th style='width:10%;text-align:center;'>time</th>
<th style='width:10%;text-align:center;'>End place</th>
<th style='width:10%;text-align:center;'>Date</th>
<th style='width:10%;text-align:center;'>time</th>
<th style='width:10%;text-align:center;'>Total distance</th>
<th style='width:10%;text-align:center;'>Total fee</th>
<th style='width:10%;text-align:center;'>Owner commission</th>
</tr>";
if($num === 0){
$body.="<tr><td colspan='16' align='center'>No Records Found!</td></tr>";
$body.="</table>";
}else{

$s_no = 1;
while($row = mysqli_fetch_assoc($query)){
$query2 = mysqli_query($conn, "select * from drivers where s_no='".$row['driver_id']."'");
$num2 = mysqli_num_rows($query2);
if($num2 != 0){
$row2 = mysqli_fetch_assoc($query2);
$name = $row2['driver_name'];
$cabtype = $row2['cab_type'];
$query4 = mysqli_query($conn, "select * from cab_types where s_no='".$cabtype."'");
$num4 = mysqli_num_rows($query4);
$row4 = mysqli_fetch_assoc($query4);
$cabname = $row4['cab_type'];
$cabno = $row2['cab_regn_no'];
}
$query3 = mysqli_query($conn, "select * from customer_fee where vehicle_type='".$cabtype."'");
$num3 = mysqli_num_rows($query3);
if($num3 != 0){
$row3 = mysqli_fetch_assoc($query3);
$rateperhour = $row3['customer_fee_per_km'];
$rateperday = $row3['customer_fee_per_day'];
}
$startplace = $row['start_place'];
$startdt = $row['start_date'];
$starttm = $row['start_time'];
$endplace = $row['end_place'];
$enddt = $row['end_date'];
$endtm = $row['end_time'];
$totaldistance= $row['total_distance'];
$totalfee = $row['total_fee'];

$ownercommission = $row['owner_commission'];


$body.="<tr>";
$body.="<td style='width:1%;text-align:center;'>$s_no</td>";
$body.="<td style='width:10%;text-align:center;'>$name</td>";
$body.="<td style='width:1%;text-align:center;'>$cabname</td>";
$body.="<td style='width:10%;text-align:center;'>$cabno</td>";
$body.="<td style='width:1%;text-align:center;'>$rateperhour</td>";
$body.="<td style='width:10%;text-align:center;'>$rateperday</td>";
$body.="<td style='width:10%;text-align:center;'>$startplace</td>";
$body.="<td style='width:10%;text-align:center;'>$startdt</td>";
$body.="<td style='width:10%;text-align:center;'>$starttm</td>";
$body.="<td style='width:10%;text-align:center;'>$endplace</td>";
$body.="<td style='width:10%;text-align:center;'>$enddt</td>";
$body.="<td style='width:10%;text-align:center;'>$endtm</td>";
$body.="<td style='width:10%;text-align:center;'>$totaldistance</td>";
$body.="<td style='width:10%;text-align:center;'>$totalfee</td>";
$body.="<td style='width:10%;text-align:center;'>$ownercommission</td>";
$body.="</tr>";
$s_no=$s_no+1;
}
$body.="</table>";
}
 
echo $body; 
?>

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
<?php include 'footer2.php';?>