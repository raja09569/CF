<?php 
	include 'header.php';
	include 'side_menu.php';
?>
<!-- RIGHT CPNTENT -->
<div class="dashboard-right  offset-0" id="main_content">
	<!-- Tab panes from left menu -->
	<div class="tab-content5">		
		<!-- Driver Activation Tab -->					  
		<div id="driveractivation">
			<div id="div_drivers" style="height:100vh;overflow:auto;">
				<table class="flatTable">
					<tr class="titleTr">
						<td colspan="2" class="titleTd">List of Drivers</td>
						<td colspan="8"></td>
					</tr>
					<tr class="headingTr">
						<td></td>
						<td>Driver name</td>
						<td>Cab type</td>
						<td>Location</td>
						<td>Phone No</td>
						<td>Email</td>
						<td>DutyStatus</td>
						<td>Activated Date</td>
						<td>Regn.Status</td>
						<td></td>
					</tr>
					<tbody id="drivers_list"></tbody>
				</table>
			</div>

			<div id="div_driver_details" style="height:100vh;overflow:auto;">
				<div class="header">
					<h1>Driver Details</h1>
				</div>
				<div class="profile-pic">
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
				<p style="margin-top:1%;text-align:right;">
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
				<p style="padding:1%;text-align:right;">
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
				</div>
			</div>
		</div>
		<!-- END of Driver activatios Tab -->
	</div>
	<!-- End of Tab panes from left menu -->	
</div>
<!-- END OF RIGHT CPNTENT -->

<script type="text/javascript">
	$(document).ready(function(){
		LoadDrivers();
	});
	function LoadDrivers(){
		$.ajax({
			type: 'POST',
			url: '../phps/show_drivers.php',
			data: {},
			success: function(response) {
				//alert(response);
				var a = JSON.parse(response);
				$("#drivers_list").empty();
				if(a.length != 0){
					for(i=0; i<a.length; i++){
						var data = "<tr>";
						if(a[i].driver_photo == ""){
							data += "<td><img src='../images/icons/car.png' style='width:50px;' /></td>";
						}else{
							data += "<td><img src='../../"+a[i].driver_photo+"' style='width:50px;' /></td>";
						}
						data += "<td>"+a[i].drivername+"</td>";
						data += "<td>"+a[i].cabname+"</td>";
						data += "<td>"+a[i].locality+"</td>";
						data += "<td>"+a[i].phoneno+"</td>";
						data += "<td>"+a[i].email+"</td>";
						data += "<td>"+a[i].dutystatus+"</td>";
						data += "<td>"+a[i].act_date+"</td>";
						data += "<td>"+a[i].reg_status+"</td>";
						data += "<td>"+a[i].url+"</td>";
						data += "</tr>";
						$("#drivers_list").append(data);	
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