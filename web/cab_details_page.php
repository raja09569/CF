<?php
include 'Includes/db.php';
include 'Includes/header.php';
if(isset($_SESSION['trip'])){
	$trip = $_SESSION['trip'];
	print_r($trip);
	$type = $trip['type'];
	if($type == "withLocation"){
		$pick = $trip['pick'];
		$pickLatLng = $trip['pickLatLng'];
		$drop = $trip['drop'];
		$pickType = $trip['pickType'];
		if($pickType == "Later"){
			$pick_date = $trip['pick_date'];
		}else{
			$pick_date = "";
		}
		$driverID = $trip['driverID'];
		if($pickLatLng != ""){
			$pickLat = $pickLatLng[0];
			$pickLong = $pickLatLng[1];
			$pickLatLng = $pickLat.",".$pickLong;
			if($drop != ""){
				$dropLatLng = get_lat_long($drop); // create a function with the name "get_lat_long" given as below
				$drpLatLng = explode(',' ,$dropLatLng);
				$dropLat = $drpLatLng[0];
				$dropLong = $drpLatLng[1];
				$distance = GetDrivingDistance($pickLat, $dropLat, $pickLong, $dropLong);
			}
		}else{
			?>
			<script>window.location.href = "cab_list_page.php"</script>
			<?php		
		}
	}else{
		$dirverID = $trip['driverID'];
	}
}else{
	?>
	<script>window.location.href = "cab_list_page.php"</script>
	<?php
}
/*if(isset($_GET['pick'])){
	$pick = $_GET['pick'];
	$drop = $_GET['drop'];
	$pick_date = $_GET['pick_date'];
	$drop_date = $_GET['drop_date'];

	$latlong    =   get_lat_long($pick); // create a function with the name "get_lat_long" given as below
	$map        =   explode(',' ,$latlong);
	$mapLat     =   $map[0];
	$mapLong    =   $map[1];

	$latlong2   =   get_lat_long($drop); // create a function with the name "get_lat_long" given as below
	$map2       =   explode(',' ,$latlong2);
	$mapLat2    =   $map2[0];
	$mapLong2   =   $map2[1];
	$distance = GetDrivingDistance($mapLat, $mapLat2, $mapLong, $mapLong2);
}
*/
function get_lat_long($address){
	$address = str_replace(" ", "+", $address);
	$json = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
	$json = json_decode($json, true); 
	if(isset($json['status']) && ($json['status'] == 'OK')) {
		$latitude = $json['results'][0]['geometry']['location']['lat']; // Latitude
		$longitude = $json['results'][0]['geometry']['location']['lng']; // Longitude
	}else{
		$latitude = 0; // Latitude
		$longitude = 0;
	}
	return $latitude.','.$longitude;
}

function GetDrivingDistance($lat1, $lat2, $long1, $long2){
    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&language=pl-PL";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response, true);
    $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
    $time = $response_a['rows'][0]['elements'][0]['duration']['text'];

    return array('distance' => $dist, 'time' => $time);
}

?>  
<!-- Updates -->
<link href="updates/update1/css/style01.css" rel="stylesheet" media="screen">
<script src="cabs.js"></script>
<div class="container breadcrub">
	<div>
		<a class="homebtn left" href="#"></a>
		<div class="left">
			<ul class="bcrumbs">
				<li>/</li>
				<li><a href="../index.php">Home</a></li>
				<li>/</li>
				<li><a href="cab_list_page.php">Cabs</a></li>
				<li>/</li>					
				<li><a href="cab_details_page.php" class="active">Cab Details</a></li>	
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
<?php
	$query = mysqli_query($conn, "select vehicle_category,vehicle_photo from tbl_drivers where driver_id = '".$driverID."'");
	$num = mysqli_num_rows($query);
	$row = mysqli_fetch_assoc($query);
	$query2 = mysqli_query($conn, "select name, per_km_without_ac, per_km_with_ac from tbl_cab_categories where category_id='".$row['vehicle_category']."'");
	$row2 = mysqli_fetch_assoc($query2);
	$vehicle_name = $row2['name'];
	$rateperhourwitAC = $row2['per_km_with_ac'];
	$rateperhourwithoutAC = $row2['per_km_without_ac'];
	if($rateperhourwitAC == ""){
		$rateperhour = $rateperhourwithoutAC;
	}else{
		$rateperhour = $rateperhourwitAC;
	}
?>
<!-- SLIDER -->
<div class="col-md-8 details-slider">
	<div class="wh80percent center">
		<img src="<?php echo $row['vehicle_photo']; ?>" class="fwimg" alt="<?php echo $vehicle_name; ?>"/>
	</div>
	<script>
	//Popover tooltips
		$(function (){
			$("#infottip2").popover({placement:'top', trigger:'hover'});
		});
	</script>
</div>
<!-- END OF SLIDER -->			

<!-- RIGHT INFO -->
<div class="col-md-4 detailsright offset-0">
	<div class="padding20">
		<div class="wh70percent left">
			<span class="opensans size18 dark bold"><?php echo $vehicle_name; ?></span><br/>
			<span class="opensans size13 grey bold"></span>
		</div>
		<div class="wh30percent right">
			<table class="right">
				<tr>
					<td><span class="size14 grey bold"> <?php echo $rateperhour; ?> Fcfa</span></td>
					<td><span class="size13 bold"><i>per KM  </i></span></td>
				</tr>
				<tr>
					<!--<td><span class="size12 lgrey"><a href="" class="lblue">change</a></span></td>
						<td><span class="size12 grey">(6 days)</span></td>-->
					<td><span class="size12 lgrey"><i></i></span></td>
					<td><span class="size14 grey bold"></span></td>
				</tr>							
			</table>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="line3"></div>
	<?php
		if($type == "withLocation"){
			?>
			<div class="padding20">
			<script>
				//Popover tooltips
				$(function (){
					$("#infottip").popover({placement:'top', trigger:'hover'});
				});
			</script>
			<div class="rchkbox size13 grey2">
				<div class="checkbox">
					<label>
						Pick up place <span class="right grey"><?php echo $pick; ?></span>
					</label>
				</div>
				<div class="checkbox">
					<label>
						Drop place <span class="right grey"><?php echo $drop; ?></span>
					</label>
				</div>
				<div class="checkbox">
					<label>
						<?php
							if($pick_date != ""){
								echo "Pickup Date <span class='right grey'>".$pick_date."</span>";
							}else{
								$pick_date = "Now";
								?>
								<span class='right grey size14'>Pick Now</span> <!-- <span class='right grey'>
								<script type="text/javascript">
									var currentTime = new Date();
									var hours = currentTime.getHours() > 12 ? currentTime.getHours() - 12 : currentTime.getHours();
									var am_pm = currentTime.getHours() >= 12 ? "PM" : "AM";
									hours = hours < 10 ? "0" + hours : hours;
									var minutes = currentTime.getMinutes() < 10 ? "0" + currentTime.getMinutes() : currentTime.getMinutes();
									var seconds = currentTime.getSeconds() < 10 ? "0" + currentTime.getSeconds() : currentTime.getSeconds();
									var time = hours + ":" + minutes+ " " + am_pm;
									if((currentTime.getMonth()+1).toString().length == 1){
										currentTime = currentTime.getDate()
													+"/0"+(currentTime.getMonth()+1)
													+"/"+currentTime.getFullYear();		
									}else{
										currentTime = currentTime.getDate()
													+"/"+(currentTime.getMonth()+1)
													+"/"+currentTime.getFullYear();	
									}
									currentTime = currentTime+" "+time;
									document.write(currentTime);
								</script>
								</span> -->
								<?php
							}
							?>
					</label>
				</div>
			</div>
		</div>
		<div class="line3"></div>	
		<div class="padding20">
			<table class="wh100percent size12 bold dark">
				<tr>
					<td>Total Distance</td>
					<td class="textright"><?php echo $distance['distance']; ?></td>
				</tr>
			</table>
			<?php
				$dist = explode(" ", $distance['distance']);
				$price = $dist[0]*$rateperhour;
			?>
			<div class="fdash mt10"></div><br/>
			<span class="size14 dark bold">Total price:</span>
			<span class="size24 green bold right margtop-5">Fcfa <?php echo $price; ?></span>
		</div>
		<?php
	}else{
		?>	
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPLC2WagSO9xVsvC29-CZ4xnvpfMFZ2S4&libraries=places"></script>
		<script>
			function initialize(){
				var input = document.getElementById('pick_from');
				var autocomplete = new google.maps.places.Autocomplete(input);
				var input2 = document.getElementById('drop_off');
				var autocomplete = new google.maps.places.Autocomplete(input2);
			}
			google.maps.event.addDomListener(window, 'load', initialize);
			function show_date(rd){
				if(rd.value == "later"){
					document.getElementById('date_div').style.display = "block";
				}else{
					document.getElementById('date_div').style.display = "none";
				}
			}
			function FindDistance(){
				var pick = document.getElementById('pick_from').value;
				var drop = document.getElementById('drop_off').value;	
				//alert(pick+"   "+drop);
			}
		</script>
		<div class="padding20">
			<div class="w50percent">
				<div class="wh90percent textleft">
					<span class="opensans size13"><b>Pick up place</b></span>
					<input type="text" class="form-control" placeholder="Airport, address" name="pick_from" id="pick_from" required>
				</div>
			</div>
			<div class="w50percentlast">
				<div class="wh90percent textleft right">
					<span class="opensans size13"><b>Drop place</b></span>
					<input type="text" class="form-control" placeholder="Airport, address" name="drop_off" id="drop_off" onchange="FindDistance();" required>
				</div>
			</div>
			<div class="clearfix"></div><br/>
			<div class="radio rclick1">
				<label>
					<input type="radio" checked name="optionsRadios12" id="cab_now" onclick="show_date(this);" value="now">
						Now 
				</label>
			</div>
			<div class="radio rclick2">
				<label>
					<input type="radio" name="optionsRadios12" id="cab_later" onclick="show_date(this);" value="later">
						Later
				</label>
			</div>
			<div class="clearfix"></div>
			<div class="room1" id="date_div" style="display:none;" >
				<div class="w50percent">
					<div class="wh90percent textleft">
						<span class="opensans size13">Pickup Date</span>
						<input type="text" class="form-control mySelectCalendar" id="datepicker6" placeholder="mm/dd/yyyy" name="pick_date"/>
					</div>
				</div>
				<div class="w50percentlast">	
					<div class="wh90percent textleft right">
						<span class="opensans size13">Hour</span>
							<select class="form-control mySelectBoxClass" name="pick_time" id="pick_time">
								<option>Select Time</option>
								<option>12:00 AM</option>
								<option>12:30 AM</option>
								<option>01:00 AM</option>
								<option>01:30 AM</option>
								<option>02:00 AM</option>
								<option>02:30 AM</option>
								<option>03:00 AM</option>
								<option>03:30 AM</option>
								<option>04:00 AM</option>
								<option>04:30 AM</option>
								<option>05:00 AM</option>
								<option>05:30 AM</option>
								<option>06:00 AM</option>
								<option>06:30 AM</option>
								<option>07:00 AM</option>
								<option>07:30 AM</option>
								<option>08:00 AM</option>
								<option>08:30 AM</option>
								<option>09:00 AM</option>
								<option>09:30 AM</option>
								<option>10:00 AM</option>
								<option>10:30 AM</option>
								<option>11:00 AM</option>
								<option>11:30 AM</option>
								<option>12:00 PM</option>
								<option>12:30 PM</option>								  
								<option>01:00 PM</option>
								<option>01:30 PM</option>
								<option>02:00 PM</option>
								<option>02:30 PM</option>
								<option>03:00 PM</option>
								<option>03:30 PM</option>
								<option>04:00 PM</option>
								<option>04:30 PM</option>
								<option>05:00 PM</option>
								<option>05:30 PM</option>
								<option>06:00 PM</option>
								<option>06:30 PM</option>
								<option>07:00 PM</option>
								<option>07:30 PM</option>
								<option>08:00 PM</option>
								<option>08:30 PM</option>
								<option>09:00 PM</option>
								<option>09:30 PM</option>
								<option>10:00 PM</option>
								<option>10:30 PM</option>
								<option>11:00 PM</option>
								<option>11:30 PM</option>		
							</select>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
?>
<div class="line3"></div>
<div class="clearfix"></div>
<div class="hpadding20">
<?php 
	if($type == "withLocation"){
		/*$_SESSION['pick'] = $pick;
		$_SESSION['drop'] = $drop;*/
		//echo $pick_date;
		/*if($pick_date != ""){
			$dates = explode(" ", $pick_date);
			//echo sizeof($dates);
			$_SESSION['pick_date'] = $dates[0];
			$_SESSION['pick_time'] = $dates[1]." ".$dates[2];
		}
		if($drop_date != ""){
			$dates = explode(" ", $drop_date);
			$_SESSION['drop_date'] = $dates[0];
			$_SESSION['drop_time'] = $dates[2]." ".$dates[3];
		}*/
		/*$_SESSION['pick_latlng'] = $latlong;
		$_SESSION['drop_latlng'] = $latlong2;
		$_SESSION['pick_date'] = $pick_date;
		$_SESSION['drop_date'] = $drop_date;
		$_SESSION['id'] = $id;
		$_SESSION['distance'] = $distance['distance'];
		$_SESSION['price'] = $price;*/
		if($drop != ""){
			$trip = array(
				"pick" => $pick,
				"pickLatLng" => $pickLatLng,
				"drop" => $drop,
				"dropLatLng" => $drpLatLng,
				"pick_date" => $pick_date,
				"driverID" => $driverID,
				"distance" => $distance['distance'],
				"price" => $price
			);
		}else{
			$trip = array(
				"pick" => $pick,
				"pickLatLng" => $pickLatLng,
				"pick_date" => $pick_date,
				"drop" => $drop,
				"dropLatLng" => "",
				"driverID" => $driverID,
				"distance" => "",
				"price" => ""
			);
		}
		$_SESSION['trip_confirm'] = $trip;
		$_session['timeout'] = time();
		if(isset($_SESSION['customer_user_uname'])){
			$_session['pickup_uname'] = $_SESSION['customer_user_uname'];
			?>
			<a href="cab_booking_confirmation_page.php" class="booknow margtop20 btnmarg">Book now</a><br/>
			<?php
		}else{
			?>
			<a href="Customer/Login.php" class="booknow margtop20 btnmarg">Book now</a><br/>	
			<?php
		}
	}else{
		?>
		<script type="text/javascript">
			alert("Choose pickup location");
		</script>
		<?php
	}
?>
</div>
</div>
<!-- END OF RIGHT INFO -->

</div>
<!-- END OF container-->

<div class="container mt25 offset-0">

<!-- CONTENT -->	
<div class="col-md-8 pagecontainer2 offset-0">

<br/>

<br/><br/>

<div id="collapse6" class="collapse in">
	<div class="hpadding20">
		<div id="googleMap" style="width:100%;height:400px;"></div>
		<?php
			$query9 = mysqli_query($conn, "select lattitude, longitude from tbl_drivers where driver_id='".$driverID."' and duty_status='on' and is_activated='yes'");
			$row9 = mysqli_fetch_assoc($query9);
			$current_lat = floatval($row9['lattitude']);
			$current_lng = floatval($row9['longitude']);
			?>
			<script>
				function myMap() {
					var currentlat = "<?php echo $current_lat; ?>";
					var currentlng = "<?php echo $current_lng; ?>";
					if(currentlat != 0 && currentlng != 0){
						var mapProp= {
    						center:new google.maps.LatLng(currentlat,currentlng),
    						zoom:14,
						};
						var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
						var marker = new google.maps.Marker({
  							position: new google.maps.LatLng(currentlat,currentlng),
  							map: map
						});	
					}else{
						//alert("Driver is offline");
						var mapProp= {
    						center:new google.maps.LatLng(currentlat,currentlng),
    						zoom:5,
						};
						var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
						var marker = new google.maps.Marker({
  							position: new google.maps.LatLng(currentlat,currentlng),
  							map: map
						});	
					}
				}
			</script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPLC2WagSO9xVsvC29-CZ4xnvpfMFZ2S4&callback=myMap"></script>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- End of collapse 6 -->		
<div class="hpadding20">
	<span class="size14 dark bold">Comment Below</span>
	<div class="line4"></div>
	<textarea class="" style="width: 100%;margin-bottom: 20px;" id="driver_comment" rows="3"></textarea>
	<?php
		if(!isset($_SESSION['customer_user_uname'])){
			?>
			<a href="Customer/Login.php" style="text-decoration:none !important;">
				<button class="btn-search5">
					Post <span class="glyphicon glyphicon-arrow-down"></span>
				</button>
			</a>
			<?php	
		}else{
			$un = $_SESSION['customer_user_uname'];
			?>
			<button onclick="submitComment('<?php echo $id;?>','<?php echo $un; ?>');" class="btn-search5">
				Post <span class="glyphicon glyphicon-arrow-down"></span>
			</button>
			<?php
		}
	?>
	<br/>
	<br/>
	<br/>
	<?php
		$query7 = mysqli_query($conn, "select cust_id, comment from tbl_driver_comments where driver_id='".$driverID."' order by comment_date desc limit 10");
		$num7 = mysqli_num_rows($query7);
		if($num7 > 0){
			?>
			<span class="size14 dark bold">
				<?php echo $num7; ?> comments
			</span>
			<div class="line4"></div>
			<?php
			while($row7 = mysqli_fetch_assoc($query7)){
				$custid = $row7['cust_id'];
				$query8 = mysqli_query($conn, "select concat('first_name', ' ', 'last_name') as name from tbl_customers where cust_id='".$custid."'");
				$row8 = mysqli_fetch_assoc($query8);
				$custname = $row8['name'];
				$feedback = $row7['comment'];
				?>
				<div class="wh20percent left textleft">
					<div class="circlewrap2">
						<img alt="" class="circleimg" src="images/user-avatar.jpg">
					</div>
				</div>
				<div class="wh80percent right">
					<a href="#" class="lblue bold">
						<?php echo $custname; ?>
					</a>
					<br/>
					<?php echo $feedback; ?> 
					<br/>
				</div>
				<div class="clearfix"></div>
				<div class="line4"></div>			
				<?php
			}	
		}else{
			?>
			<center>No Comments</center>
			<?php
		}
	?>
</div>

<br/><br/>
<br/><br/>
<br/>

</div>
<!-- END OF CONTENT -->	

<div class="col-md-4" >

<?php
	if(!isset($_SESSION['customer_user_uname'])){
	?>
	<div class="pagecontainer2 testimonialbox">
		<div class="cpadding0 mt-10">
			<span class="icon-quote"></span>
			<p class="opensans size16 grey2">
				Don't Have account? Get beauitifull offers by rigestering.
				<br/>
				<span class="lato lblue bold size13"><i>Register</i></span>
			</p> 
		</div>
	</div>
	<?php
	}
?>
<!--<div class="pagecontainer2 testimonialbox">
<div class="cpadding0 mt-10">
<span class="icon-quote"></span>
<p class="opensans size16 grey2">Best car choice, low consumption and a very comfortable ride. I kindly recomend it.<br/>
<span class="lato lblue bold size13"><i>by Ellison from United Kingdom</i></span></p> 
</div>
</div>-->
<div class="pagecontainer2 mt20 needassistancebox">
<div class="cpadding1">
<span class="icon-help"></span>
<h3 class="opensans">Need Assistance?</h3>
<p class="size14 grey">Our team is 24/7 at your service to help you with your booking issues or answer any related questions</p>
<p class="opensans size30 lblue xslim">1-866-599-6674</p>
</div>
</div><br/>

<div class="pagecontainer2 mt20 alsolikebox">
<div class="cpadding1">
<span class="icon-location"></span>
<h3 class="opensans">You May Also Like</h3>
<div class="clearfix"></div>
</div>
<?php
	$query4 = mysqli_query($conn, "SELECT driver_id, vehicle_photo, vehicle_category FROM tbl_drivers where is_activated='yes' and duty_status='on' and driver_id!='".$driverID."' limit 3");
	$num4 = mysqli_num_rows($query4);
	if($num4 != 0){
		while($row4 = mysqli_fetch_assoc($query4)){
			$driverID = $row4['driver_id'];
			$vehicle_photo = $row4['vehicle_photo'];
			$vehicle_type = $row4['vehicle_category'];
			$query5 = mysqli_query($conn, "select name, per_km_with_ac, per_km_without_ac from tbl_cab_categories where category_id='".$vehicle_type."'");
			$row5 = mysqli_fetch_assoc($query5);
			$vehicle_name = $row5['name'];
			$rateperhourwitAC = $row5['per_km_with_ac'];
			$rateperhourwithoutAC = $row5['per_km_without_ac'];
			if($rateperhourwitAC == ""){
				$rateperhour = $rateperhourwithoutAC;
			}else{
				$rateperhour = $rateperhourwitAC;
			}
			?>
			<div class="cpadding1 ">
				<a href="cab_details_page.php">
					<img src="<?php echo $vehicle_photo;?>" width="60" class="left mr20" alt=""/>
				</a>
				<?php 
					$trip = $_SESSION['trip'];
					$trip['driverID'] = $driverID;
					$_SESSION['trip'] = $trip;
					if($type == "withLocation"){
						?>
						<a href="cab_details_page.php" class="dark">
							<b><?php echo $vehicle_name;?></b>
						</a>
						<?php
					}else{
						?>
						<a href="cab_details_page.php" class="dark">
							<b><?php echo $vehicle_name;?></b>
						</a>
						<?php
					}
				?>
				<br/>
				<span class="opensans green bold size14"><?php echo $rateperhour;?></span> 
				<span class="grey">FCFA/Hour</span>
				<br/>
			</div>
			<div class="line5"></div>
			<?php
		}
	}
?>
<br/>
</div>				
</div>
</div>
</div>
<!-- END OF CONTENT -->
<?php include 'Includes/footer2.php'; ?>