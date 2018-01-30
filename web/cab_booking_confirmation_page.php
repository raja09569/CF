<?php
	include 'Includes/db.php';
	include 'Includes/header.php';
?>
<div class="container breadcrub">
	<div>
		<a class="homebtn left" href="#"></a>
		<div class="left">
			<ul class="bcrumbs">
				<li>/</li>
				<li><a href="cab_list_page.php">Cabs List</a></li>
				<li>/</li>
				<li><a href="cab_details_page.php">Cab Details</a></li>
				<li>/</li>					
				<li><a href="cab_booking_confirmation_page.php" class="active">Confirmation</a></li>					
			</ul>				
		</div>
		<a class="backbtn right" href="#"></a>
	</div>
	<div class="clearfix"></div>
	<div class="brlines"></div>
</div>	

<!-- CONTENT -->
<div class="container">
	<div class="container mt25 offset-0">
		<!-- LEFT CONTENT -->
		<div class="col-md-8 pagecontainer2 offset-0">
			<div class="padding30 grey">
				<?php
					$custID = $_SESSION['customer_user_ID'];
					$query = mysqli_query($conn, "select concat(first_name, ' ', last_name) as name, cust_id, isd_code, mobile_number, email_id from tbl_customers where cust_id='".$custID."'");
					$row = mysqli_fetch_assoc($query);
					$name = $row['name'];
					$number = $row['isd_code']." ".$row['mobile_number'];
					$emailid = $row['email_id'];
				?>
				<span class="size16px bold dark left">Customer </span>
				<div class="roundstep right"></div>
				<div class="clearfix"></div>
				<div class="line4"></div>
				We will never sell, share or distribute your personal information. Read our <a href="" class="lblue">privacy policy</a>.<br/>
				<br/>
				<div class="col-md-4 textright">
					<div class="margtop15">
						<span class="dark">Contact Name:</span>
						<span class="red">*</span>
					</div>
				</div>
				<div class="col-md-4">
					<span class="size12">First and Last Name*</span>
					<input type="text" class="form-control" value="<?php echo $name; ?>" readonly>
				</div>
				<div class="col-md-4 textleft margtop15">
				</div>
				<div class="clearfix"></div>
				<br/>
				<div class="col-md-4 textright">
					<div class="margtop7"><span class="dark">Phone Number:</span><span class="red">*</span></div>
				</div>
				<div class="col-md-4 textleft">
					<span class="size12">Preferred Phone Number*</span>	
					<input type="text" class="form-control" value="<?php echo $number; ?>" readonly>
				</div>
				<div class="clearfix"></div>
				<br/>
				<div class="col-md-4"></div>
				<div class="clearfix"></div>
				<br/>
				<br/>
				<span class="size16px bold dark left">Where should we send your confirmation?</span>
				<div class="roundstep right"></div>
				<div class="clearfix"></div>
				<div class="line4"></div>		
				Please enter the email address where you would like to receive your confirmation.
				<br/> 
				<div class="col-md-4 textright">
					<div class="mt15"><span class="dark">Email Address:</span><span class="red">*</span></div>
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control margtop10" value="<?php echo $emailid; ?>" readonly>
				</div>
				<div class="col-md-4 textleft"></div>
				<div class="clearfix"></div>
				<script type="text/javascript">
					<?php
					/*//echo $_SESSION['pick_date'];
					if(isset($_SESSION['pick_date'])){
						$pickdate = $_SESSION['pick_date'];
						//$picktime = $_SESSION['pick_time'];
						if($pickdate != ""){
							$dates = explode(" ", $pickdate);
							$pickdate = $dates[0];
							$picktime = $dates[1]." ".$dates[2];
						}else{
							$pickdate = "";
							$picktime = "";
						}
					}else{
						$pickdate = "";
						$picktime = "";
					}
					if(isset($_SESSION['drop_date'])){
						$dropdate = $_SESSION['drop_date'];
						//$droptime = $_SESSION['drop_time'];
						if($dropdate != ""){
							$dates = explode(" ", $dropdate);
							$dropdate = $dates[0];
							$droptime = $dates[2]." ".$dates[3];
						}else{
							$dropdate = "";
							$droptime = "";
						}
					}else{
						$dropdate = "";
						$droptime = "";
					}*/
					//$trip_confirm = $_SESSION['trip_confirm'];
					?>
					function completeBook(){
						alert("hello");
						var cust_id = "<?php echo $custID; ?>";
						var trip = sessionStorage.getItem("trip_confirm");
						alert(trip);
						//return;
						/*var driver_id = "<?php echo $_trip_confirm['driverID']; ?>";
						var pick = "<?php echo $_trip_confirm['pick']; ?>";
						var pickLatLng = "<?php echo $_trip_confirm['pick_latlng']; ?>";
						var pickdate= "<?php echo $_trip_confirm['pick_date']; ?>";
						var drop = "<?php echo $_trip_confirm['drop']; ?>";
						var dropLatLng = "<?php echo $_trip_confirm['drop_latlng']; ?>";
						var total_distance = "<?php echo $_trip_confirm['distance']; ?>";
						var total_fee = "<?php echo $_trip_confirm['price']; ?>";*/
						
						/*$("#loader-wrapper").show();
						var maxTime = 30;
						var x = setInterval(function(){
							maxTime = maxTime - 1;
							$("#loader-timer").text(maxTime+" seconds left");
							if(maxTime == 0){
								clearInterval(x);
								$("#loader-wrapper").hide();
							}
						}, 1000);*/

						/*$.ajax({
							type: 'POST',
							url: 'Admin/store_customer_trip.php',
							data: {cust_id:cust_id,driver_id:driver_id,pick:pick,pick_date:pickdate,pick_time:picktime,drop:drop,drop_date:drop_date,drop_time:drop_time,total_distance:total_distance,total_fee:total_fee},
							success: function(response) {
								if(response == "You successfully booked this cab. we will get back to with confirmation."){
									window.location = "../web/Customer/user_dashboard.php";
								}else{
									alert(response);
								}
							},
							error: function(error){
								alert(error);
							}
						});*/
						/*$.ajax({
							type: 'POST',
							url: 'Admin/store_customer_trip.php',
							data:{
									cust_id: cust_id,
									driver_id: driver_id,
									pick: pick,
									pickLatLng: pickLatLng,
									pick_date: pickdate,
									//pick_time: picktime,
									drop: drop,
									dropLatLng: dropLatLng,
									total_distance: total_distance,
									total_fee: total_fee
								},
							success: function(response) {
								if(response == "You successfully booked this cab. we will get back to with confirmation."){
									window.location = "../web/Customer/user_dashboard.php";
								}else{
									alert(response);
								}
							},
							error: function(error){
								alert(error);
							}
						});*/
					}
				</script>
				<br/>
				<br/>
				<span class="size16px bold dark left">Review and book your trip</span>
				<div class="roundstep right"></div>
				<div class="clearfix"></div>
				<div class="line4"></div>		
				<div class="alert alert-info">
					Attention! Please read important Cab information!
					<br/>
					<p class="size12">• You booked cab from pickup point to drop point at charges today time.please make sure your given details correct or not.before booking</p>
				</div>		
				By selecting to complete this booking I acknowledge that I have read and accept the <a href="#" class="clblue">rules & restrictions</a> <a href="#" class="clblue">terms & conditions</a> , and <a href="#" class="clblue">privacy policy</a>.<br/>		
				<button type="submit" class="bluebtn margtop20" onclick="completeBook()">Complete booking</button>	
			</div>
		</div>
		<!-- END OF LEFT CONTENT -->			
		<!-- <?php
			$query = mysqli_query($conn, "select * from tbl_drivers where driver_id = '".$_SESSION['id']."'");
			$num = mysqli_num_rows($query);
			//echo $num;
			$row = mysqli_fetch_assoc($query);

			$vehicle_photo = $row['vehicle_photo'];

			$query2 = mysqli_query($conn, "select * from tbl_cab_categories where category_id='".$row['vehicle_category']."'");
			$row2 = mysqli_fetch_assoc($query2);
			$vehicle_name = $row2['name'];
			$rateperhour = $row2['per_km_without_ac'];
		?> -->
		<!-- RIGHT CONTENT -->
		<div class="col-md-4" >
			<div class="pagecontainer2 paymentbox grey">
				<div class="padding20">
					<span class="opensans size18 dark bold caps">Your car</span>
				</div>
				<div class="line3"></div>
				<div class="hpadding30 margtop30" style="margin-bottom: 10px;">
					<div class="wh30percent left">
						<img src="<?php echo $vehicle_photo; ?>" class="fwimg" alt="<?php echo $vehicle_name; ?>" style="width: 80%;"/>
					</div>
					<div class="wh60percent right" style="margin-bottom: 10px;">
						<!-- <span class="size16 bold dark"><?php echo $vehicle_name; ?></span><br/> -->
						<!-- <span class="size13 bold grey"></span><br/>
						<div class="fdash mt10"></div><br/>
						<div class="fdash mt10"></div><br/> -->
					</div>
					<table class="wh100percent size12 bold grey2">
						<tr>
							<!-- <td><img src="<?php echo $row['driver_photo']; ?>" style="width:80%;"/></td>
							<td class="textright">
								<span class="size16 bold dark"><?php echo $row['name']."(".$row['vehicle_no'].")"; ?></span><br/>
								<span class="size16 bold dark"><?php echo $row['mobile_number']; ?></span><br/>
							</td> -->
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<!-- <tr>
							<td>Total Distance:</td>
							<td class="textright"><?php echo $_SESSION['distance']; ?></td>
						</tr> -->
					</table>
					<div class="clearfix"></div>
					<br/>
				</div>	
				<div class="line3"></div>
				<div class="padding30">					
					<span class="left size14 dark">Trip Total:</span>
					<!-- <span class="right lred2 bold size18"> Fcfa <?php echo $_SESSION['price']; ?></span> -->
					<div class="clearfix"></div>
				</div>
			</div>
			<br/>
			<div class="pagecontainer2 needassistancebox">
				<div class="cpadding1">
					<span class="icon-help"></span>
					<h3 class="opensans">Need Assistance?</h3>
					<p class="size14 grey">Our team is 24/7 at your service to help you with your booking issues or answer any related questions</p>
					<p class="opensans size30 lblue xslim">1-866-599-6674</p>
				</div>
			</div>
			<br/>
			<?php 
				if(!isset($_SESSION['customer_user_uname'])){
					?>
					<div class="pagecontainer2 loginbox">
						<div class="cpadding1">
							<span class="icon-lockk"></span>
							<h3 class="opensans">Log in</h3>
							<input type="text" class="form-control logpadding" placeholder="Username">
							<br/>
							<input type="text" class="form-control logpadding" placeholder="Password">
							<div class="margtop20">
								<div class="left">
									<div class="checkbox padding0">
										<label>
		  									<input type="checkbox">Remember
										</label>
									</div>
									<a href="#" class="greylink">Lost password?</a><br/>
								</div>
								<div class="right">
									<button class="btn-search5" type="submit" onclick="errorMessage()">Login</button>	
								</div>
							</div>
							<div class="clearfix"></div>
							<br/>
						</div>
					</div>
					<br/>
				<?php
				}
			?>
		</div>
		<!-- END OF RIGHT CONTENT -->
	</div>	
</div>
<!-- END OF CONTENT -->
<?php include 'Includes/footer2.php'; ?>

<!-- Loader will start -->
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/loader.css">
<script src="assets/js/modernizr-2.6.2.min.js"></script>
<script src="assets/js/jquery-1.9.1.min.js"></script>
<div id="loader-wrapper" style="display: none;">
	<div id="loader"></div>
	<h3 id="loader-timer">30 seconds left</h3>
	<h2 id="loader-text">Contacting Driver...</h2>
	<!-- <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div> -->
</div>
<!-- Loader will end -->
