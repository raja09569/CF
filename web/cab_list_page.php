<?php
include "Includes/db.php";
include "Includes/header.php";
if(isset($_GET['pick'])){
	$pick = $_GET['pick'];
	$drop = $_GET['drop'];
	$pickType = $_GET['pickType'];
	if($pickType == "Later"){
		if(isset($_GET['pick_date'])){
			$pick_date = $_GET['pick_date'];
			$pick_date = urldecode($pick_date);
		}else{
			?>
			<script type="text/javascript">
				alert("PIkcup Date and Time is Empty!");
				window.location = "../index.php";
			</script>
			<?php
		}
	}else{
		$pick_date = "";
	}
	if($pick != ""){
		$latlong    =   get_lat_long($pick); // create a function with the name "get_lat_long" given as below
		$pickLatLng =   explode(',' ,$latlong);
		$pickLat     =   $pickLatLng[0];
		$pickLong    =   $pickLatLng[1];
		$radius = 10; 
	}else{
		?>
		<script type="text/javascript">
			alert("PIkcup location should not be Empty!");
			window.location = "../index.php";
		</script>
		<?php
	}
}else{
	$pickLat     =   0;
	$pickLong    =   0;
	$radius = 50;
}

// function to get  the address
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

?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPLC2WagSO9xVsvC29-CZ4xnvpfMFZ2S4&libraries=places"></script>
<link href="updates/update1/css/style01.css" rel="stylesheet" media="screen">
<div class="container breadcrub">
	<div>
		<a class="homebtn left" href="#"></a>
		<div class="left">
			<ul class="bcrumbs">
				<li>/</li>
				<li><a href="../index.php">Home</a></li>
				<li>/</li>
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
	<!-- FILTERS -->
		<div class="col-md-3 filters offset-0">
		<!-- TOP TIP -->
			<div class="filtertip">
				<div class="padding20">
					<p class="size13" style="margin-bottom: 15px;">
						<b>
							<?php
								if(isset($_GET['pick'])){
									if(isset($_GET['type'])){
										$type = $_GET['type'];	
										$query = mysqli_query($conn, "SELECT s_no, ( 3959 * acos( cos( radians($pickLat) ) * cos( radians( lattitude )) * cos( radians( longitude ) - radians($pickLong) ) + sin( radians($pickLat) ) * sin( radians( lattitude ) ) ) ) AS distance FROM tbl_drivers where is_activated='yes' and duty_status='on' and vehicle_category='$type' HAVING distance < 50 ORDER BY distance asc");
									}else{
										$query = mysqli_query($conn, "SELECT s_no, ( 3959 * acos( cos( radians($pickLat) ) * cos( radians( lattitude )) * cos( radians( longitude ) - radians($pickLong) ) + sin( radians($pickLat) ) * sin( radians( lattitude ) ) ) ) AS distance FROM tbl_drivers where is_activated='yes' and duty_status='on' HAVING distance < 50 ORDER BY distance asc");
									}
								}else{
									if(isset($_GET['type'])){
										$type = $_GET['type'];	
										$query = mysqli_query($conn, "SELECT s_no FROM tbl_drivers where is_activated='yes' and duty_status='on' and vehicle_category='$type'");
									}else{
										$query = mysqli_query($conn, "SELECT s_no FROM tbl_drivers where is_activated='yes' and duty_status='on'");
									}
								}
								$num = mysqli_num_rows($query);
								if($num > 0){
									$row = mysqli_fetch_assoc($query);
									echo $num;
									if($num == 1){
										?>
										</b> vehicle found</p>
										<?php
									}else{
										?>
										</b> vehicles found</p>
										<?php
									}
									/*?>
									<p class="size30 bold">
										<span class="size13 normal darkblue">
											Starting
										</span>Fcfa
										<?php
										$vehicle_type = $row['vehicle_category'];
										echo $vehicle_type;
										$query2 = mysqli_query($conn, "SELECT per_km_with_ac, per_km_without_ac FROM `tbl_cab_categories` where category_id='$vehicle_type'");
										$row2 = mysqli_fetch_assoc($query2);
										$withAc = $row2['per_km_with_ac'];
										if($withAc != ""){
											?>
											<span>
												<?php echo $row2['per_km_with_ac']; ?>
											</span>
											<span class="size13 normal darkblue">
												/KM (AC)
											</span>
											<?php
										}else{
											$withoutAc = $row2['per_km_without_ac'];
											if($withoutAc != ""){
											?>
												<span>
													<?php echo $row2['per_km_without_ac']; ?>
												</span>
												<span class="size13 normal darkblue">
													/KM
												</span>
											<?php	
											}
										}
									?>
									</p>
									<?php*/
								}else{
									echo "NO";
									?>
									</b> vehicle found</p>
									<?php
								}
								?>
							</div>
<div class="tip-arrow"></div>
</div>

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

function submit_search(){
	var pick_place = document.getElementById('pick_from').value;
	var drop_place = document.getElementById('drop_off').value;
	var pick_now = document.getElementById('cab_now');
	var pick_later = document.getElementById('cab_later');
	//alert(pick_place);
	//alert(drop_place);
	var pick_time;
	if(pick_place == ""){
		alert("Please enter pickup place");
	}/*else if(drop_place == ""){
		alert("Please enter drop place");
	}*/else if(pick_now.checked == false && pick_later.checked == false){
		alert("When you want to Go");
	}else{
		 if(pick_now.checked == true){
			/*pick_time = new Date();
			var hours = pick_time.getHours() > 12 ? pick_time.getHours() - 12 : pick_time.getHours();
			var am_pm = pick_time.getHours() >= 12 ? "PM" : "AM";
			hours = hours < 10 ? "0" + hours : hours;
			var minutes = pick_time.getMinutes() < 10 ? "0" + pick_time.getMinutes() : pick_time.getMinutes();
			var seconds = pick_time.getSeconds() < 10 ? "0" + pick_time.getSeconds() : pick_time.getSeconds();
			var time = hours + ":" + minutes+ " " + am_pm;
			if((pick_time.getMonth()+1).toString().length == 1){
				pick_time = "0"+(pick_time.getMonth()+1)
							+"/"+pick_time.getDate()
							+"/"+pick_time.getFullYear()
							+" ";		
			}else{
				pick_time = (pick_time.getMonth()+1)
							+"/"+pick_time.getDate()
							+"/"+pick_time.getFullYear()
							+" ";	
			}
			pick_time = pick_time+" "+time;*/
			var pickType = "Now";
			var url = "cab_list_page.php?pick="+pick_place+"&drop="+drop_place+"&pickType="+pickType;
			url = encodeURI(url);
			window.location.href = url;	
		}else if(pick_later.checked == true){
			var pick_date = document.getElementById('datepicker6').value;
			var pick_t = document.getElementById('pick_time').value;
			if(pick_date == ""){
				alert("Select date!");
			}else if(pick_t == "Select Time"){
				alert("Select time!");
			}else{
				var drop_date = pick_date+" "+pick_t;
				pick_time = new Date();
				var hours = pick_time.getHours() > 12 ? pick_time.getHours() - 12 : pick_time.getHours();
				var am_pm = pick_time.getHours() >= 12 ? "PM" : "AM";
				hours = hours < 10 ? "0" + hours : hours;
				var minutes = pick_time.getMinutes() < 10 ? "0" + pick_time.getMinutes() : pick_time.getMinutes();
				var seconds = pick_time.getSeconds() < 10 ? "0" + pick_time.getSeconds() : pick_time.getSeconds();
				var time = hours + ":" + minutes+ " " + am_pm;
				if((pick_time.getMonth()+1).toString().length == 1){
					pick_time = "0"+(pick_time.getMonth()+1)
								+"/"+pick_time.getDate()
								+"/"+pick_time.getFullYear()
								+" ";		
				}else{
					pick_time = (pick_time.getMonth()+1)
								+"/"+pick_time.getDate()
								+"/"+pick_time.getFullYear()
								+" ";	
				}
				pick_time = pick_time+" "+time;
				var dateOne = new Date(drop_date);
				dateOne = dateOne.getTime();
				var dateTwo = new Date(pick_time);
				dateTwo = dateTwo.getTime();
				//alert(pick_time+"Please select Greater date"+drop_date);
				if (dateOne < dateTwo) {
					alert("Please select Greater date & time");
				}else {
					var pickType = "Later";
					var url = "cab_list_page.php?pick="+pick_place+"&drop="+drop_place+"&pickType="+pickType+"&pick_date="+drop_date;
					url = encodeURI(url);
					window.location.href = url;	
				}
			}
		}
	}
}

function filtering(){
	var cab_type = document.getElementById('cab_list');
	var selected = cab_type.options[cab_type.selectedIndex].value;
	if(selected == "0"){
		alert("select cab type");
	}else{
		var pick_place = "<?php echo $_GET['pick']; ?>";
		var drop_place = "<?php echo $_GET['drop']; ?>";
		var pickType = "<?php echo $_GET['pickType']; ?>";
		if(pickType == "Later"){
			var pick_date = "<?php echo $pick_date; ?>";
			var url = "cab_list_page.php?pick="+pick_place+"&drop="+drop_place+"&pickType="+pickType+"&pick_date="+pick_date+"&type="+selected;
		}else{
			var url = "cab_list_page.php?pick="+pick_place+"&drop="+drop_place+"&pickType="+pickType+"&type="+selected;
		}
		url = encodeURI(url);
		window.location = url;
	}
	
}
</script>
			<div class="bookfilters hpadding20">
				<div class="size30 dark">Book a car</div>				
				<!-- CARS TAB -->
				<link rel="stylesheet" href="assets/css/jquery-ui2.css">
				<script src="assets/js/jquery-1.12.4.js"></script>
				<script src="assets/js/jquery-ui2.js"></script>
			<div>
		<div>
		<div class="wh90percent textleft">
			<span class="opensans size13">Pick up place</span>
			<?php 
				if(isset($_GET['pick'])){
					?>
					<input type="text" class="form-control" placeholder="Airport, address" name="pick_from" id="pick_from" value="<?php echo $_GET['pick']; ?>">
					<?php
				}else{
					?>
					<input type="text" class="form-control" placeholder="Airport, address" name="pick_from" id="pick_from" >
					<?php	
				} 
			?>
		</div>
	</div>
	<div>
		<div class="wh90percent textleft">
			<span class="opensans size13">Drop place</span>
			<?php 
				if(isset($_GET['drop'])){
					?>
					<input type="text" class="form-control" placeholder="Airport, address" name="drop_off" id="drop_off" value="<?php echo $_GET['drop']; ?>">
					<?php
				}else{
					?>
					<input type="text" class="form-control" placeholder="Airport, address" name="drop_off" id="drop_off" >
					<?php
				}
			?>
		</div>
	</div>
	<div class="clearfix pbottom15"></div>
	<div class="w50percent" style="padding:5px;">
		<div class="wh90percent textleft">
			<input type="radio" checked name="optionsRadios12" id="cab_now" onclick="show_date(this);" value="now">
			Now 
		</div>
	</div>
	<div class="w50percentlast" style="padding:5px;">
		<div class="wh90percent textleft right">
			<input type="radio" name="optionsRadios12" id="cab_later" onclick="show_date(this);" value="later">
			Later
		</div>
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
	<div class="clearfix"></div><br/>
	<button type="submit" onclick="submit_search();" class="btn-search3">
		Search
	</button>
</div>
</form>
<!-- END OF CARS TAB -->
</div>
<!-- END OF BOOK FILTERS -->	

<div class="line2"></div>
<div class="clearfix"></div>
<br/>
<br/>
<br/>
</div>
<!-- END OF FILTERS -->

<!-- LIST CONTENT-->
<div class="rightcontent col-md-9 offset-0">
<div class="hpadding20">
<!-- Top filters -->
<div class="topsortby">
<div class="col-md-4 offset-0">

<div class="left mt7"><b>Sort by:</b></div>
<div class="right wh70percent">
<select class="form-control mySelectBoxClass " id="cab_list">
<?php
$query1 = mysqli_query($conn, "select name, category_id from tbl_cab_categories");
$num1 = mysqli_num_rows($query1);
if($num1 != 0){
?>
<option value="0">Select CabType</option>
<?php
while($row1 = mysqli_fetch_assoc($query1)){
	if(isset($_GET['type'])){
		$type = $_GET['type'];
		if($row1['category_id'] == $type){
			?>
			<option value="<?php echo $row1['category_id'];?>" selected>
				<?php echo $row1['name'];?>
			</option>
			<?php
		}else{
			?>
			<option value="<?php echo $row1['category_id'];?>">
				<?php echo $row1['name'];?>
			</option>
			<?php
		}
	}else{
		?>
		<option value="<?php echo $row1['category_id'];?>">
			<?php echo $row1['name'];?>
		</option>
		<?php
	}
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
<div class="right">
<button class="form-control" onclick="filtering();" style="width:100px;">Filter</button>
</div>
<!--</div> -->
</div>
<!-- End of topfilters-->
</div>
<!-- End of padding -->
<br/><br/>
<div class="clearfix"></div>
<div class="itemscontainer offset-1">
	<script>
		//Popover tooltips
		/*$(function (){
			$("#username").popover({placement:'top', trigger:'hover'});
		});*/
	</script>
	<?php
		if(isset($_GET['startIndex'])){
			$startIndex = $_GET['startIndex'];
			if($startIndex == 1){
				$startIndex = 0;
			}else{
				$startIndex = (($startIndex - 1) * 10) - 1;
			}
		}else{
			$startIndex = 0;
		}
		$limit = 9;
		if(isset($_GET['pick'])){
			if(isset($_GET['type'])){
				$type = $_GET['type'];
				$query3 = mysqli_query($conn, "SELECT *, ( 3959 * acos( cos( radians($pickLat) ) * cos( radians( lattitude )) * cos( radians( longitude ) - radians($pickLong) ) + sin( radians($pickLat) ) * sin( radians( lattitude ) ) ) ) AS distance FROM tbl_drivers where vehicle_category='$type' and is_activated='yes' and duty_status='on' HAVING distance < 50 ORDER BY distance asc limit $startIndex, $limit");
			}else{
				$query3 = mysqli_query($conn, "SELECT *, ( 3959 * acos( cos( radians($pickLat) ) * cos( radians( lattitude )) * cos( radians( longitude ) - radians($pickLong) ) + sin( radians($pickLat) ) * sin( radians( lattitude ) ) ) ) AS distance FROM tbl_drivers where is_activated='yes' and duty_status='on' HAVING distance < 50 ORDER BY distance asc limit $startIndex, $limit");	
			}
		}else{
			if(isset($_GET['type'])){
				$type = $_GET['type'];
				$query3 = mysqli_query($conn, "SELECT * FROM tbl_drivers where vehicle_category='$type' and is_activated='yes' and duty_status='on' limit $startIndex, $limit");
			}else{
				$query3 = mysqli_query($conn, "SELECT * FROM tbl_drivers where is_activated='yes' and duty_status='on' limit $startIndex, $limit");
			}
		}
		$num3 = mysqli_num_rows($query3);
		if($num3 != 0){
			while($row3 = mysqli_fetch_assoc($query3)){
				$driverID = $row3['driver_id'];
				$vehicle_photo = $row3['vehicle_photo'];
				$vehicle_type = $row3['vehicle_category'];
				$query7 = mysqli_query($conn, "select name, per_km_without_ac, per_km_with_ac, no_of_seats from tbl_cab_categories where category_id='".$vehicle_type."'");
				$row7 = mysqli_fetch_assoc($query7);
				$vehicle_name = $row7['name'];
				$rateperhourwithAC = $row7['per_km_with_ac'];
				$rateperhourwithoutAC = $row7['per_km_without_ac'];
				$NoofSeats = $row7['no_of_seats'];
				?>
				<div class="col-md-4 border">
				<!-- CONTAINER-->
					<div class="carscontainer">
						<div class="center" style="background-color: lightgrey;">
							<?php
								if(isset($_GET['pick'])){
									$pick 	=   $_GET['pick'];
									$drop 		=   $_GET['drop'];
									$pickType 	=   $_GET['pickType'];
									if($pickType == "Later"){
										//$pick_date 	=   $_GET['pick_date'];
										?>
										<!-- <a href="cab_details_page.php?id=<?php echo $id; ?>&pick=<?php echo $location;?>&drop=<?php echo $drop; ?>&pick_date=<?php echo $pick_date;?>&drop_date=<?php echo $drop_date;?>"> -->
										<?php
										$trip = array(
											"type" => "withLocation",
											"pick" => $pick,
											"pickLatLng" => $pickLatLng,
											"drop" => $drop,
											"pickType" => $pickType,
											"pick_date" => $pick_date,
											"driverID" => $driverID
										);
										$_SESSION['trip'] = $trip;
									}else{
										$trip = array(
											"type" => "withLocation",
											"pick" => $pick,
											"pickLatLng" => $pickLatLng,
											"drop" => $drop,
											"pickType" => $pickType,
											"driverID" => $driverID
										);
										$_SESSION['trip'] = $trip;
									}
								}else{
									$trip = array(
										"type" => "withoutLocation",
										"driverID" => $driverID
									);
									//print_r($trip);
									$_SESSION['trip'] = $trip;
								}
							?>
							<a href="cab_details_page.php">
								<img src="<?php echo $vehicle_photo; ?>" alt="<?php echo $vehicle_name; ?>" style="height:120px;width:70%;"/>
								<div class="clearfix"></div>
								<span class="left padding5 size14 grey2">
									<i class="fa fa-wheelchair" aria-hidden="true"></i>&nbsp;<?php echo $NoofSeats; ?> Seats
								</span>
								<span class="right padding5 size14 grey2">
									<i class="fa fa-road" aria-hidden="true"></i>&nbsp;<?php echo number_format((float)$row3['distance'], 2, '.', ''); ?> km away
								</span>
							</a>
						</div>
						<div class="clearfix"></div>
						<div class="padding5">
							<p class="size16 bold margbtm5">
								<?php echo $vehicle_name;?>
							</p>
							<p>
								<span class="left size13"><b>Ac Fair </b></span>
								<span class="right size13"><?php echo $rateperhourwithAC; ?>FCFA <i class="size12">per KM</i></span> 
							</p>
							<div class="clearfix"></div>
							<p class="margtop5">
								<span class="left size13"><b>Non-Ac Fair </b></span>
								<span class="right size13"><?php echo $rateperhourwithoutAC; ?>FCFA <i class="size12">per KM</i></span> 
							</p>
							<div class="clearfix"></div>
							<p class="size14 margtop5" style="margin-bottom: 0px;">
								<i class="fa fa-location-arrow" aria-hidden="true">&nbsp;</i><b>Current At</b>
							</p>
							<p class="size12 txt-jsty" style="margin: 0;padding: 2px;"><?php echo $row3['current_location']; ?></p>
							<?php
								if(isset($_GET['pick'])){
									$pick 	=   $_GET['pick'];
									$drop 		=   $_GET['drop'];
									$pickType 	=   $_GET['pickType'];
									if($pickType == "Later"){
										//$pick_date 	=   $_GET['pick_date'];
										?>
										<!-- <a href="cab_details_page.php?id=<?php echo $id; ?>&pick=<?php echo $location;?>&drop=<?php echo $drop; ?>&pick_date=<?php echo $pick_date;?>&drop_date=<?php echo $drop_date;?>"> -->
										<?php
										$trip = array(
											"type" => "withLocation",
											"pick" => $pick,
											"pickLatLng" => $pickLatLng,
											"drop" => $drop,
											"pickType" => $pickType,
											"pick_date" => $pick_date,
											"driverID" => $driverID
										);
										$_SESSION['trip'] = $trip;
									}else{
										$trip = array(
											"type" => "withLocation",
											"pick" => $pick,
											"pickLatLng" => $pickLatLng,
											"drop" => $drop,
											"pickType" => $pickType,
											"driverID" => $driverID
										);
										$_SESSION['trip'] = $trip;
									}
								}else{
									$trip = array(
										"type" => "withoutLocation",
										"driverID" => $driverID
									);
									$_SESSION['trip'] = $trip;
								}
							?>
							<a class="btn bookbtn wdth100perc margtop5" href="cab_details_page.php">Book</a>	
						</div>
					</div>
				<!-- END OF CONTAINER-->
				</div>
				<?php
			}
			?>
			<div class="clearfix"></div>
			<div class="offset-2"><hr class="featurette-divider3"></div>
		</div>	
		<!-- End of offset1-->		
		<div class="hpadding20">
			<?php
				$page = $row['count']/9; 
				$page = ceil($page);
				//echo $page;
				if($page > 1){
					?>
					<ul class="pagination right paddingbtm20">
						<?php
						if(isset($_GET['pickType'])){
							$pickType = $_GET['pickType'];
							if($pickType == "Later"){
								$linkUrl = "cab_list_page.php?pick=".$_GET['pick']."&drop=".$_GET['drop']."&pickType=".$_GET['pickType']."&pick_date=".$_GET['pick_date'];
							}else{
								$linkUrl = "cab_list_page.php?pick=".$_GET['pick']."&drop=".$_GET['drop']."&pickType=".$_GET['pickType'];
							}
						}else{
							$linkUrl = "cab_list_page.php?";
						}
						//echo $linkUrl;
						if($page > 8){
							?>
							<li><a href="#">&laquo;</a></li>
							<?php
							for($i=($page-8); $i<8; $i++){
								$linkUrl = $linkUrl."&startIndex=".($i+1);
								if(isset($_GET['startIndex'])){
									if(($i + 1) == $_GET['startIndex']){
										?>
										<li class="active"><a href="<?php echo $linkUrl; ?>"><?php echo $i+1; ?></a></li>
										<?php
									}else{
										?>
										<li><a href="<?php echo $linkUrl; ?>"><?php echo $i+1; ?></a></li>
										<?php
									}
								}else{
									if($i == 0){
										?>
										<li class="active"><a href="<?php echo $linkUrl; ?>"><?php echo $i+1; ?></a></li>
										<?php
									}else{
										?>
										<li><a href="<?php echo $linkUrl; ?>"><?php echo $i+1; ?></a></li>
										<?php
									}	
								}
							}
							?>
							<li><a href="#">&raquo;</a></li>
							<?php
						}else{
							?>
							<li class="disabled"><a href="#">&laquo;</a></li>
							<?php
							for($i=0; $i<$page; $i++){
								$linkUrl = $linkUrl."&startIndex=".($i+1);
								//echo $linkUrl;
								if(isset($_GET['startIndex'])){
									if(($i + 1) == $_GET['startIndex']){
										?>
										<li class="active"><a href="<?php echo $linkUrl; ?>"><?php echo $i+1; ?></a></li>
										<?php
									}else{
										?>
										<li><a href="<?php echo $linkUrl; ?>"><?php echo $i+1; ?></a></li>
										<?php
									}
								}else{
									if($i == 0){
										?>
										<li class="active"><a href="<?php echo $linkUrl; ?>"><?php echo $i+1; ?></a></li>
										<?php
									}else{
										?>
										<li><a href="<?php echo $linkUrl; ?>"><?php echo $i+1; ?></a></li>
										<?php
									}	
								}
							}
							?>
							<li class="disabled"><a href="#">&raquo;</a></li>
							<?php	
						}
						?>
					</ul>
					<?php
				}
			?>
		</div>
	</div>
		<?php
		}else{
		?>
			<center><p>No Records Found!</p></center>
			<div class="clearfix"></div>
			<div class="offset-2"><hr class="featurette-divider3"></div>
		</div>	
		<!-- End of offset1-->
	</div>
	<?php
	}
	?>
	<!-- END OF LIST CONTENT-->
</div>
<!-- END OF container-->

</div>
<!-- END OF CONTENT -->

<?php include 'Includes/footer2.php';?>