<?php
include 'db.php';
include 'header.php';

if(!isset($_SESSION['uname'])){
?>
<script>window.location.href = "manager_login.php"</script>
<?php
}
?>
<style>
#write_review{
opacity:0.92;
position: absolute;
top: 15%;
left: 0%;
padding: 5%;
width: 90%;
background: #000;
display: none;
}
</style>
<link rel="stylesheet" type="text/css" media="all" href="css/sidemenu.css">
<div class="container breadcrub">
<div>
<a class="homebtn left" href="#"></a>
<div class="left">
<ul class="bcrumbs">
<li>/</li>
<li><a href="index.php">Home</a></li>
<li>/</li>
<li><a href="commission_received_details.php">Commission Recieved Details</a></li>					
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

<!--<div class="left mt7"><b>Sort by:</b></div>-->
<script>
	function myAlert(element) {
		//code
		var selected = element.value;
		alert(selected);
		if (selected == "all") {
			//code
			
		}else{
			
		}
	}
</script>
<div class="right wh70percent">
<!--<select class="form-control mySelectBoxClass" name="drivers_list" required>
<option selected>Manufacturer</option>
<option>Audi</option>
<option>BMW</option>
<option>Mazda</option>
<option>Lamborghini</option>
<option>Porsche</option>
<option>Volkswagen</option>
<option>...</option>
</select>-->
<input type="radio" name="type" value="all" onchange="myAlert(this);"> All Drivers
<select class="form-control mySelectBoxClass" style="width:45%;">
	<option>January</option>
	<option>February</option>
	<option>March</option>
	<option>April</option>
	<option>May</option>
	<option>June</option>
	<option>July</option>
	<option>August</option>
	<option>September</option>
	<option>October</option>
	<option>November</option>
	<option>December</option>
</select>
</div>

</div>			
<div class="col-md-4">
<div class="w70percent">
<div class="wh90percent">
<!--<select class="form-control mySelectBoxClass ">
<option selected>Automatic</option>
<option>Manual</option>
<option>CVT (Continuous variable transmission)</option>
<option>Semi automatic</option>
<option>TipTronic® gearbox</option>
<option>DSG (Direct shift gearbox)</option>
</select>-->
<input type="radio" name="type" value="individual" onchange="myAlert(this);"> Individual Driver
<select class="form-control mySelectBoxClass" style="width: 30%;">
	<option>2017</option>
	<option>2018</option>
	<option>2019</option>
	<option>2020</option>
	<option>2021</option>
	<option>2022</option>
	<option>2023</option>
	<option>2024</option>
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
</div>
</div>					
</div>
<div class="col-md-4 offset-0">
<div class="wh50percent left">
<button class="form-control" name="filter" style="width: 100px;">Filter</button>
<!--<select class="form-control mySelectBoxClass" name="selected_year" required>
<option value="">Select Year</option>
<option>Diesel</option>
<option>Petrol</option>
<option>Hibrid</option>
<option>Electric</option>
</select>-->
</div>
<div class="right">
<!--<button class="listbtn active">&nbsp;</button>
<button class="grid2btn active">&nbsp;</button>-->
</div>
</div>
</form>
</div>
<!-- End of topfilters-->
<script>
    function showReview(args) {
        //code
        //alert(args);
        $("#ride_id").attr("value", args);
        $("#write_review").css("display", "block");
    }
    function Close() {
        //code
        $('#write_review').css("display", "none");
    }
</script>
<div style="width: 100%;overflow-x: scroll;">

<?php
if(isset($_POST['filter'])){
	$query = mysqli_query($conn, "select * from customer_trips");
}else{
	$query = mysqli_query($conn, "select * from customer_trips");
}
$num = mysqli_num_rows($query);
$body = "<table cellpadding='3px' border='1em' style='width:90%;margin:5%;'>";
$body .= "<tr><th colspan='16' align='center' style='padding:2%;text-align:center;'> Cab Rides </th></tr>";
$body .= "<tr><th style='width:1%;text-align:center;'>S.No</th>
<th style='width:10%;text-align:center;'>Month</th>
<th style='width:10%;text-align:center;'>Driver Name</th>
<th style='width:10%;text-align:center;'>Vehicle number</th>
<th style='width:10%;text-align:center;'>Place</th>
<th style='width:10%;text-align:center;'>Phone</th>
<th style='width:10%;text-align:center;'>Cab Type</th>
<th style='width:10%;text-align:center;'>Fee/hour</th>
<th style='width:10%;text-align:center;'>Fee/day</th>
<th style='width:10%;text-align:center;'>Total distance travelled</th>
<th style='width:10%;text-align:center;'>Total Fee</th>
<th style='width:10%;text-align:center;'>Owner Commission</th>
<th style='width:10%;text-align:center;'>Received amount</th>
<th style='width:10%;text-align:center;'>Balance</th>
<th style='width:10%;text-align:center;'></th>
<th style='width:10%;text-align:center;'></th>
</tr>";
if($num === 0){
$body.="<tr><td colspan='16' align='center'>No Records Found!</td></tr>";
$body.="</table>";
}else{

$s_no = 1;
while($row = mysqli_fetch_assoc($query)){
//$query2 = mysqli_query($conn, "select * from driver_rides where s_no='".$row['ride_id']."'");
//$num2 = mysqli_num_rows($query2);
//$row2 = mysqli_fetch_assoc($query2);
$ride_month = $row['ride_month'];
$driverid = $row['driver_id'];
$query4 = mysqli_query($conn, "select * from drivers where s_no='".$driverid."'");
$num4 = mysqli_num_rows($query4);
$row4 = mysqli_fetch_assoc($query4);
$drivername = $row4['driver_name'];
$vehicle_no = $row4['cab_regn_no'];
$place = $row4['city'];
$mobile = $row4['phone_no'];
$cab_type = $row4['cab_type'];
$query2 = mysqli_query($conn, "select * from cab_types where s_no='".$cab_type."'");
$num2 = mysqli_num_rows($query2);
$row2 = mysqli_fetch_assoc($query2);
$cabname = $row2['cab_type'];
$query5 = mysqli_query($conn, "select * from customer_fee where vehicle_type='".$cab_type."'");
$num5 = mysqli_num_rows($query5);
$row5 = mysqli_fetch_assoc($query5);
$fee_per_hour = $row5['customer_fee_per_km'];
$fee_per_day = $row5['customer_fee_per_day'];
$query6 = mysqli_query($conn, "SELECT sum(total_distance) as total FROM `customer_trips`
					   where ride_month in (select distinct ride_month from customer_trips) and driver_id in
					   (select distinct s_no from drivers)");
$num6 = mysqli_num_rows($query6);
$row6 = mysqli_fetch_assoc($query6);
$totaldistanceinmonth = $row6['total'];

$query7 = mysqli_query($conn, "SELECT sum(total_fee) as totalfee FROM `customer_trips`
					   where ride_month in (select distinct ride_month from customer_trips) and
					   driver_id in (select distinct s_no from drivers)");
$num7 = mysqli_num_rows($query7);
$row7 = mysqli_fetch_assoc($query7);
$totalamountinmonth = $row7['totalfee']." Fcfa";

$query8 = mysqli_query($conn, "SELECT sum(owner_commission) as totalcommission FROM `customer_trips`
					   where ride_month in (select distinct ride_month from customer_trips) and
					   driver_id in (select distinct s_no from drivers)");
$num8 = mysqli_num_rows($query8);
$row8 = mysqli_fetch_assoc($query8);
$totalcommissioninmonth = $totalamountinmonth * ($row8['totalcommission']/100)." Fcfa";

$query9 = mysqli_query($conn, "SELECT sum(amount_collected) as totalcollected FROM `collection_frm_driver`
					   where on_collected_month in (select distinct ride_month from customer_trips) and
					   driver_id in (select distinct s_no from drivers)");
$num9 = mysqli_num_rows($query9);
$row9 = mysqli_fetch_assoc($query9);
$totalcollectioninmonth = $row9['totalcollected'];

$balance = $totalcommissioninmonth-$totalcollectioninmonth." Fcfa";


$body.="<tr>";
$body.="<td style='width:1%;text-align:center;'>$s_no</td>";
$body.="<td style='width:10%;text-align:center;'>$ride_month</td>";
$body.="<td style='width:1%;text-align:center;'>$drivername</td>";
$body.="<td style='width:10%;text-align:center;'>$vehicle_no</td>";
$body.="<td style='width:1%;text-align:center;'>$place</td>";
$body.="<td style='width:10%;text-align:center;'>$mobile</td>";
$body.="<td style='width:10%;text-align:center;'>$cabname</td>";
$body.="<td style='width:10%;text-align:center;'>$fee_per_hour</td>";
$body.="<td style='width:10%;text-align:center;'>$fee_per_day</td>";
$body.="<td style='width:10%;text-align:center;'>$totaldistanceinmonth</td>";
$body.="<td style='width:10%;text-align:center;'>$totalamountinmonth</td>";
$body.="<td style='width:10%;text-align:center;'>$totalcommissioninmonth</td>";
$body.="<td style='width:10%;text-align:center;'>$totalcollectioninmonth</td>";
$body.="<td style='width:10%;text-align:center;'>$balance</td>";
$body.="<td style='width:10%;text-align:center;'><a onclick='showReview($driverid)'>Enter fee paid</a></td>";
$body.="<td style='width:10%;text-align:center;'><a onclick='showReview($driverid)'>View paid details</a></td>";
$body.="</tr>";
$s_no=$s_no+1;
}
$body.="</table>";
}
echo $body; 
?>

</div>
<div id="write_review" style="margin:5%;">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
        <label style="color: #fff;">You can write your comment below *</label>
        <input type="hidden" name="rideid" id="ride_id"/>
        <textarea name="review" class="form-control" style="width:100%;height:100px;border:1px solid #eee;" placeholder="How you felt?" required></textarea>
        <br/>
        <button class="form-control" name="write_comment" style="width: 20%;float: right;" onclick="Close();">Cancel</button>
        <button class="form-control" name="write_comment" style="width: 20%;margin-right:10%;float: right;">Submit</button>
    </form>
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
<div style="display: none;">
	<h1>Hello</h1>
</div>
<!-- END OF CONTENT -->
<?php include 'footer2.php'; ?>