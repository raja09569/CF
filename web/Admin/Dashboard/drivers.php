<?php 
	include 'header.php';
	include 'side_menu.php';
?>
<link rel="stylesheet" type="text/css" href="../css/custom.css">
<!-- RIGHT CPNTENT -->
<div class="dashboard-right  offset-0" id="main_content">
	<!-- Tab panes from left menu -->
	<div class="tab-content5">		
		<!-- Driver Activation Tab -->					  
		<div id="driveractivation">
			<div id="div_drivers">
				<table class="flatTable">
					<tr class="titleTr">
						<td colspan="2" class="titleTd">List of Drivers</td>
						<td colspan="8"></td>
					</tr>
					<tr class="headingTr">
						<td></td>
						<td>Name</td>
						<td>Phone No</td>
						<td>Email</td>
						<td>Vehicle</td>
						<td>Duty</td>
						<td>Status</td>
						<td></td>
					</tr>
					<tbody id="drivers_list"></tbody>
				</table>
				<div class="pagination">
					<ul></ul>
				</div>
			</div>

			<div id="div_driver_details">
				<div class="sctn-1 row">
					<div class="row">
						<div class="col-md-4 dv-dr-img">
							<img src="../../images/driver.png" >
						</div>
						<div class="col-md-8">
							<div class="child-dv">
								<label>Name <span class="mandatory">&#x2605;</span></label>
								<input type="text" name="dirverName" placeholder="Driver Name (max 100 characters)" class="form-control" maxlength="100" readonly="true" required />
							</div>
							<div class="child-dv">
								<label>Email <span class="mandatory">&#x2605;</span></label>
								<input type="email" name="dirverEmail" placeholder="driver@driver.com" class="form-control" readonly="true" required />
							</div>
							<div class="child-dv">
								<label>Mobile Number <span class="mandatory">&#x2605;</span></label>
								<input type="text" name="dirverPhone" placeholder="9441294890" class="form-control" pattern="{0-9}" readonly="true" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="child-dv">
								<label>Duty Status</label>
								<input type="text" name="dutyStatus" placeholder="Duty Status" class="form-control" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="child-dv">
								<label>Activation </label>
								<input type="text" name="isActivated" placeholder="Driver Activation Status" class="form-control"  />
							</div>
						</div>
						<div class="col-md-4">
							<div class="child-dv">
								<label>Activated On</label>
								<input type="text" name="activatedOn" placeholder="Activated On" class="form-control" />
							</div>
						</div>
					</div>
					<p class="text-success size18 reg_status">Registered On <span id="reg_date">Wed 12 Feb 2018, 02:30 PM</span></p>
				</div>
				<div class="sctn-1 row">
					<div class="row">
						<div class="col-md-4 dv-dr-img">
							<img src="../../images/car.jpg" >
							<div class="child-dv" style="margin-top: 30px;">
								<label>Name <span class="mandatory">&#x2605;</span></label>
								<input type="text" name="vhclName" placeholder="Maruthi 800" class="form-control" />
							</div>
						</div>
						<div class="col-md-8">
							<h3>Vehicle Details</h3>
							<div class="child-dv">
								<label>Category <span class="mandatory">&#x2605;</span></label>
								<input type="text" name="vhclType" placeholder="Vehicle Category" class="form-control" />
							</div>
							<div class="child-dv">
								<label>Number <span class="mandatory">&#x2605;</span></label>
								<input type="email" name="vhclNumber" placeholder="AP22 AF 1569" class="form-control" />
							</div>
							<div class="child-dv">
								<label>Owner Name</label>
								<input type="text" name="vhclownrName" placeholder="Mark boucher" class="form-control" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="child-dv">
								<label>Condition (AC / NON AC) <span class="mandatory">&#x2605;</span></label>
								<select name="vhclCndtn" class="form-control" >
									<option>Select Condition</option>
									<option>AC</option>
									<option>NON AC</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="child-dv">
								<label>Licence Number <span class="mandatory">&#x2605;</span></label>
								<input type="text" name="driverLcncNumber" placeholder="Licence Number" class="form-control" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="child-dv">
								<label>Vechicle Status</label>
								<input type="text" name="vhclRidSts" placeholder="Vechicle Riding Status" class="form-control" />
							</div>
						</div>
					</div>
				</div>
				<div class="sctn-1 row">
					<h3>Address </h3>
					<div class="child-dv">
						<label>Address line 1 <span class="mandatory">&#x2605;</span></label>
						<input type="text" name="dirverAdrsln1" placeholder="Address Line 1" class="form-control" />
					</div>
					<div class="child-dv">
						<label>Address line 2</label>
						<input type="text" name="dirverAdrsln2" placeholder="Address Line 2" class="form-control" />
					</div>
					<div class="child-dv row">
						<div class="col-md-6">
							<label>Locality</label>
							<input type="email" name="dirverLocality" placeholder="Chandapura" class="form-control" />
						</div>
						<div class="col-md-6">
							<label>City <span class="mandatory">&#x2605;</span></label>
							<input type="email" name="dirverCity" placeholder="Banglore" class="form-control" />
						</div>
					</div>
					<div class="child-dv row">
						<div class="col-md-4">
							<label>State <span class="mandatory">&#x2605;</span> </label>
							<input type="email" name="dirverState" placeholder="Karnataka" value="driver@driver.com" class="form-control" />
						</div>
						<div class="col-md-4">
							<label>Country <span class="mandatory">&#x2605;</span></label>
							<input type="email" name="dirverCountry" placeholder="India" class="form-control" />
						</div>
						<div class="col-md-4">
							<label>ZipCode: <span class="mandatory">&#x2605;</span> </label>
							<input type="email" name="dirverZip" placeholder="500096" class="form-control" />
						</div>
					</div>
				</div>
				<div class="sctn-1 row">
					<h3>Bank Details </h3>
					<div class="row">
						<div class="col-md-6">
							<div class="child-dv">
								<label>Bank Name <span class="mandatory">&#x2605;</span></label>
								<input type="text" name="bankName" placeholder="Bank Name" class="form-control" />
							</div>	
						</div>
						<div class="col-md-6">
							<div class="child-dv">
								<label>AC Number <span class="mandatory">&#x2605;</span></label>
								<input type="text" name="bankAcNo" placeholder="Bank Ac Number" class="form-control" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="child-dv">
								<label>IFSC Code <span class="mandatory">&#x2605;</span></label>
								<input type="text" name="bankIFSC" placeholder="Bank IFSC Code" class="form-control" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="child-dv">
								<label>Location <span class="mandatory">&#x2605;</span></label>
								<input type="text" name="bankLocation" placeholder="Bank Location" class="form-control" />
							</div>
						</div>
					</div>
				</div>
				<div class="sctn-1 row">
					<h3>Other Details </h3>
					<div class="child-dv">
						<textarea name="otherDetails" class="form-control" placeholder="If any other details (max 250 characters)" maxlength="250"></textarea>
					</div>
				</div>
				<div class="sctn-1 row" style="display: none;">
					<h3>Comments </h3>
					<div class="child-dv">
						<div class="cmnt-lst-item">
							<p class="left">Customer Name</p>
							<span class="right">Trip ID</span>
							<div class="clear"></div>
							<p class="cmnt">dafsjk jalskfjd jasfkldj saklfjdskla jfdjas;fk j;ladsfj djasflsj ;klsajf;kl jasdklfjkl asjkljask ;jfd;lksajfldjsa;jf;asjf;ja ;skljf;dlj ;lkfajslk ja;lk jkaj lkja;lk jaj aj ljl jalkj lkaj ljslk jl jls jlj ;lj</p>
						</div>
					</div>
				</div>
				<div class="sctn-1 row">
					<div class="col-md-6 text-center">
						<button class="btn btn-primary" id="editButton">EDIT</button>
						<button class="btn btn-success" id="updateButton">UPDATE</button>
					</div>
					<div class="col-md-6 text-center">
						<button class="btn btn-danger" id="cancelButton">CANCEL</button>
					</div>
				</div>
				<!-- <div class="header">
					<h1>Driver Details</h1>
				</div> -->
				<!-- <div class="profile-pic">
					<img id="driver_photo" src="../../Driver/pics/CBDR0001PC.png" alt="Driver Photo" />
				</div>
				<div class="about-driver">
					<div class="left">
						<div>
							<label>Name: </label><br/>
							<input class="input" type="text" id="driver_name" readonly />
						</div>
						<div>
							<label>Email ID: </label><br/>
							<input class="input" type="text" id="emailId" readonly />
						</div>
						<div>
							<label>Mobile Number: </label><br/>
							<input class="input" type="text" id="phoneno" readonly />
						</div>
						<div>
							<label>License No: </label><br/>
							<input class="input" type="text" id="licenceno" readonly />
						</div>
						<div>
							<label>Address: </label><br/>
							<input class="input" type="text" id="adrs" readonly />
						</div>
					</div>
					<div class="right">
						<div>
							<label>Locality: </label><br/>
							<input class="input" type="text" id="driver_location" readonly />
						</div>
						<div>
							<label>City: </label><br/>
							<input class="input" type="text" id="driverCity" readonly />
						</div>
						<div>
							<label>State: </label><br/>
							<input class="input" type="text" id="driverState" readonly />
						</div>
						<div>
							<label>Country: </label><br/>
							<input class="input" type="text" id="cntry" readonly />
						</div>
						<div>
							<label>PinCode: </label><br/>
							<input class="input" type="text" id="pinCode" readonly />
						</div>
					</div>
				</div>			
				<p>
					<i>Registered on <span id="reg_dt"></span></i>
				</p>
				<div class="profile-pic">
					<img id="vehicle_photo" alt="Vehicle Photo" />
				</div>
				<div class="about-driver">
					<div class="left">
						<div>
							<label>Vehicle No: </label><br/>
							<input class="input" type="text" id="vehicleno" readonly />
						</div>
						<div>
							<label>Vehicle Name: </label><br/>
							<input class="input" type="text" id="vehicleName" readonly />
						</div>
						<div>
							<label>AC Availability: </label><br/>
							<input class="input" type="text" id="isAcCar" readonly />
						</div>
						<div>
							<label>Owner Name: </label><br/>
							<input class="input" type="text" id="ownerName" readonly />
						</div>
					</div>
					<div class="right">
						<div>
							<label>Bank Name: </label><br/>
							<input class="input" type="text" id="bankname" readonly />
						</div>
						<div>
							<label>Bank AC No: </label><br/>
							<input class="input" type="text" id="bank_ac_no" readonly />
						</div>
						<div>
							<label>IFSC Code: </label><br/>
							<input class="input" type="text" id="ifsc_code" readonly />
						</div>
						<div>
							<label>Bank Location: </label><br/>
							<input class="input" type="text" id="location" readonly />
						</div>
					</div>
				</div>
				<p>
					<i>Activated on <span id="activated_dt"></span></i>
				</p>
				<div>
					<div id="dv_cncl">
						<button onclick="cancel_driverDetails();" id="btn_cncl">Cancel</button>
					</div>
					<div id="dv_btns">
						<button onclick="edit_driverDetails();" id="edt_btn">Edit</button>
						<button onclick="update_driverDetails();" id="updt_btn">Update</button>
					</div>
				</div> -->
			</div>
		</div>
		<!-- END of Driver activatios Tab -->
	</div>
	<!-- End of Tab panes from left menu -->	
</div>
<!-- END OF RIGHT CPNTENT -->

<script type="text/javascript">
	$(document).ready(function(){
		//LoadDrivers(0);
		$("#div_drivers").hide();
		$("#div_driver_details").show();
	});
	

	function LoadDriverDtls(driverID){
		//$("#div_drivers").hide();
		//$("#div_driver_details").show();
		$.ajax({
			url: "showDriverDetails.php",
			type: "POST",
			data: {driverID: driverID},
			success: function(msg){

			},
			error: function(error){
				
			}
		})
	}

	function LoadDrivers(index){
		var offset = (index * 5);
		$.ajax({
			type: 'POST',
			url: '../phps/show_drivers.php',
			data: {offset: offset},
			success: function(response) {
				//alert(response);
				var a = JSON.parse(response);
				$("#drivers_list").empty();
				$(".pagination ul").empty();
				if(a.length != 0){
					for(i=1; i<a.length; i++){
						var data = "<tr>";
						if(a[i].driver_photo == ""){
							data += "<td><img src='../images/icons/car.png' style='width:50px;padding:10px 0px;' /></td>";
						}else{
							data += "<td><img src='../../"+a[i].driver_photo+"' style='width:50px;padding:10px 0px;' /></td>";
						}
						data += "<td><a onclick='LoadDriverDtls(&quot;"+a[i].driverID+"&quot;)' ><b><u>"+a[i].drivername+"</u></b></a></td>";
						data += "<td>"+a[i].phoneno+"</td>";
						data += "<td>"+a[i].email+"</td>";
						data += "<td class='text-center'>"+a[i].cabname+"</td>";
						data += "<td class='text-center'>"+a[i].dutystatus+"</td>";
						data += "<td>"+a[i].reg_status+"</td>";
						data += "<td>"+a[i].url+"</td>";
						data += "</tr>";
						$("#drivers_list").append(data);	
					}
					var pages = a[0].pages;
					//alert(pages);
					if(pages > 1){
						var pageData = '';
						if(index != 0){
							pageData += '<li class="double-sym" onclick="LoadDrivers(0)">&#xab;</li>';
							var previous = index - 1;
							pageData += '<li onclick="LoadDrivers('+previous+')">&#x276E;</li>';
						}
						for(var j=1; j<=pages; j++){
							if((index + 1) == j){
								pageData += '<li class="active" onclick="LoadDrivers('+(j-1)+')">'+j+'</li>';
							}else{
								pageData += '<li onclick="LoadDrivers('+(j-1)+')">'+j+'</li>';
							}
						}
						if(index != (pages - 1)){
							var next = index + 1;
							pageData += '<li onclick="LoadDrivers('+next+')">&#x276F;</li>';
							var lastIndex = pages - 1;
							pageData += '<li class="double-sym" onclick="LoadDrivers('+lastIndex+')">&#xbb;</li>'
						}
						$(".pagination ul").append(pageData);
					}
				}else{
					$("#drivers_list").append("<tr><td colspan='11' align='center'>No Records Found!</td></tr>");
				}
			},
			error: function(error){
				if(error.status == "0"){
					alert("Unable to connect server, Try again.");
				}else{
					alert("Something went wrong, Try again.");
				}
			}
		});
	}

</script>


<?php include 'footer.php'; ?>