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
					<input type="hidden" id="input_driveID">
					<div class="row">
						<div class="col-md-4 dv-dr-img">
							<img src="../../images/driver.png" id="img_driver" >
							<div id="chooseDrImage" class="child-dv">
								<input type="file" name="driverImage" accept="image/x-png,image/jpeg" onchange="changeImage(this, 'driver');" />
							</div>
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
								<input type="text" name="dirverPhone" placeholder="9441294890" class="form-control" pattern="[0-9]" readonly="true" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="child-dv">
								<label>Duty Status</label>
								<input type="text" name="dutyStatus" placeholder="Duty Status" class="form-control" readonly/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="child-dv">
								<label>Activation </label>
								<div>
									<input type="text" name="isActivated" placeholder="Driver Activation Status" class="form-control radio-inline" style="width: 45%;" readonly />
									<a class="btn radio-inline" id="changeActive" style="width: 45%;"></a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="child-dv">
								<label>Activated On</label>
								<input type="text" name="activatedOn" placeholder="Activated On" class="form-control" readonly />
							</div>
						</div>
					</div>
					<p class="text-success size18 reg_status">Registered On <span id="reg_date"></span></p>
				</div>
				<div class="sctn-1 row">
					<div class="row">
						<div class="col-md-4 dv-dr-img">
							<img src="../../images/car.jpg" id="img_vhcl" >
							<div id="choosevhclImage" class="child-dv">
								<input type="file" name="vhclImage" accept="image/x-png,image/jpeg" onchange="changeImage(this, 'vehicle');" />
							</div>
							<div class="child-dv">
								<label>Name <span class="mandatory">&#x2605;</span></label>
								<input type="text" name="vhclName" placeholder="Maruthi 800" class="form-control" readonly="true" required />
							</div>
						</div>
						<div class="col-md-8">
							<h3>Vehicle Details</h3>
							<div class="child-dv">
								<label>Category <span class="mandatory">&#x2605;</span></label>
								<select name="vhclType" class="form-control" readonly="true" required>
									
								</select>
							</div>
							<div class="child-dv">
								<label>Number <span class="mandatory">&#x2605;</span></label>
								<input type="email" name="vhclNumber" placeholder="AP22 AF 1569" class="form-control" readonly="true" required />
							</div>
							<div class="child-dv">
								<label>Owner Name</label>
								<input type="text" name="vhclownrName" placeholder="Mark boucher" class="form-control" readonly="true"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="child-dv">
								<label>Condition (AC / NON AC) <span class="mandatory">&#x2605;</span></label>
								<select name="vhclCndtn" class="form-control"  readonly="true" required>
									<option value="0">Select Condition</option>
									<option value="ac">AC</option>
									<option value="nonAC">NON AC</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="child-dv">
								<label>Licence Number <span class="mandatory">&#x2605;</span></label>
								<input type="text" name="driverLcncNumber" placeholder="Licence Number" class="form-control" readonly="true" required />
							</div>
						</div>
						<div class="col-md-4">
							<div class="child-dv">
								<label>Vechicle Status</label>
								<input type="text" name="vhclRidSts" placeholder="Vechicle Riding Status" class="form-control" readonly="true" />
							</div>
						</div>
					</div>
				</div>
				<div class="sctn-1 row">
					<h3>Address </h3>
					<div class="child-dv">
						<label>Address line 1 <span class="mandatory">&#x2605;</span></label>
						<input type="text" name="dirverAdrsln1" placeholder="Address Line 1" class="form-control" readonly="true" required />
					</div>
					<!-- <div class="child-dv">
						<label>Address line 2</label>
						<input type="text" name="dirverAdrsln2" placeholder="Address Line 2" class="form-control" />
					</div> -->
					<div class="child-dv row">
						<div class="col-md-6">
							<label>Locality</label>
							<input type="email" name="dirverLocality" placeholder="Chandapura" class="form-control" readonly="true"/>
						</div>
						<div class="col-md-6">
							<label>City <span class="mandatory">&#x2605;</span></label>
							<input type="email" name="dirverCity" placeholder="Banglore" class="form-control" readonly="true" required/>
						</div>
					</div>
					<div class="child-dv row">
						<div class="col-md-4">
							<label>State <span class="mandatory">&#x2605;</span> </label>
							<input type="email" name="dirverState" placeholder="Karnataka" value="driver@driver.com" class="form-control" readonly="true" required />
						</div>
						<div class="col-md-4">
							<label>Country <span class="mandatory">&#x2605;</span></label>
							<input type="email" name="dirverCountry" placeholder="India" class="form-control" readonly="true" required  />
						</div>
						<div class="col-md-4">
							<label>ZipCode: <span class="mandatory">&#x2605;</span> </label>
							<input type="email" name="dirverZip" placeholder="500096" class="form-control" readonly="true" required />
						</div>
					</div>
				</div>
				<div class="sctn-1 row">
					<h3>Bank Details </h3>
					<div class="row">
						<div class="col-md-6">
							<div class="child-dv">
								<label>Bank Name <span class="mandatory">&#x2605;</span></label>
								<input type="text" name="bankName" placeholder="Bank Name" class="form-control" readonly="true" required/>
							</div>	
						</div>
						<div class="col-md-6">
							<div class="child-dv">
								<label>AC Number <span class="mandatory">&#x2605;</span></label>
								<input type="text" name="bankAcNo" placeholder="Bank Ac Number" class="form-control" readonly="true" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="child-dv">
								<label>IFSC Code <span class="mandatory">&#x2605;</span></label>
								<input type="text" name="bankIFSC" placeholder="Bank IFSC Code" class="form-control" readonly="true" required />
							</div>
						</div>
						<div class="col-md-6">
							<div class="child-dv">
								<label>Location <span class="mandatory">&#x2605;</span></label>
								<input type="text" name="bankLocation" placeholder="Bank Location" class="form-control" readonly="true" required />
							</div>
						</div>
					</div>
				</div>
				<div class="sctn-1 row">
					<h3>Other Details </h3>
					<div class="child-dv">
						<textarea name="otherDetails" class="form-control" placeholder="If any other details (max 250 characters)" maxlength="250" readonly="true"></textarea>
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
						<button class="btn btn-primary" id="editButton" onclick="editDriver();">EDIT</button>
						<button class="btn btn-success" id="updateButton" onclick="updateDriver(this);">UPDATE</button>
					</div>
					<div class="col-md-6 text-center">
						<button class="btn btn-danger" id="cancelButton" onclick="cancelEdit();">CANCEL</button>
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
		LoadDrivers(0);
	});
	
	function changeImage(input, type){
		if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	//alert(type);
	        	if(type == "driver"){
	        		$('#img_driver').attr('src', e.target.result);
	        	}else{
	        		$('#img_vhcl').attr('src', e.target.result);
	        	}
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	function LoadDriverDtls(driverID){
		$.ajax({
			url: "../phps/show_driver_details.php",
			type: "POST",
			data: {driverID: driverID},
			success: function(msg){
				//alert(msg);
				var a = JSON.parse(msg);
				$(".child-dv input[name='dirverName']").val(a.name);
				$(".child-dv input[name='dirverEmail']").val(a.EmailID);
				$(".child-dv input[name='dirverPhone']").val(a.Mobile);
				$(".child-dv input[name='dutyStatus']").val(a.duty);
				$(".child-dv input[name='isActivated']").val(a.isActivated);
				//alert(a.isActivated);
				if(a.isActivated == "Active"){
					$("#changeActive").attr("onclick",  "update_driverStatus('"+driverID+"', 'no')");
					$("#changeActive").text("De Activate");
					$("#changeActive").removeClass("btn-success");
					$("#changeActive").addClass("btn-danger");
				}else{
					$("#changeActive").attr("onclick",  "update_driverStatus('"+driverID+"', 'yes')");
					$("#changeActive").text("Activate");
					$("#changeActive").removeClass("btn-danger");
					$("#changeActive").addClass("btn-success");
				}
				$("#reg_date").text(a.regOn);
				$(".child-dv input[name='activatedOn']").val(a.activatedOn);
				$(".child-dv input[name='vhclName']").val(a.vehicleName);
				$(".child-dv select[name='vhclType']").append("<option value='"+a.category+"'>"+a.categoryName+"</option>");
				$(".child-dv input[name='vhclNumber']").val(a.vehicleNumber);
				$(".child-dv input[name='vhclownrName']").val(a.ownerName);
				$(".child-dv input[name='driverLcncNumber']").val(a.LicenceNo);
				$(".child-dv input[name='vhclRidSts']").val(a.vehicleStatus);
				$(".child-dv input[name='dirverAdrsln1']").val(a.address);
				$(".child-dv input[name='dirverLocality']").val(a.locality);
				$(".child-dv input[name='dirverCity']").val(a.city);
				$(".child-dv input[name='dirverState']").val(a.state);
				$(".child-dv input[name='dirverCountry']").val(a.country);
				$(".child-dv input[name='dirverZip']").val(a.zipCode);
				$(".child-dv input[name='bankName']").val(a.bankName);
				$(".child-dv input[name='bankAcNo']").val(a.ACno);
				$(".child-dv input[name='bankIFSC']").val(a.IFSCcode);
				$(".child-dv input[name='bankLocation']").val(a.bankLocation);
				$(".child-dv input[name='otherDetails']").val(a.otherDetails);
				$(".child-dv select[name='vhclCndtn']").val(a.condition);
				$("#input_driveID").val(a.driverID);
				if(a.drImage == ""){
					$("#img_driver").attr("src", "../../images/car.jpg");
				}else{
					$("#img_driver").attr("src", "../../"+a.drImage);
				}
				if(a.vhclImage == ""){
					$("#img_vhcl").attr("src", "../../images/car.jpg");
				}else{
					$("#img_vhcl").attr("src", "../../"+a.vhclImage);
				}
				$("#div_drivers").hide();
				$("#div_driver_details").show();
			},
			error: function(error){
				if(error.status == "0"){
					alert("Unable to connect to server, Try again");
				}else{
					alert("Something went wrong, Try again");
				}
			}
		})
	}

	function editDriver(){
		LoadCategories();
		$("#editButton").hide();
		$("#updateButton").show();
		$("#chooseDrImage, #choosevhclImage").show();
		$(".child-dv input[name='dirverName']").attr("readonly", false);
		$(".child-dv input[name='dirverEmail']").attr("readonly", false);
		$(".child-dv input[name='dirverPhone']").attr("readonly", false);
		$("#changeActive").removeAttr("onclick");
		$(".child-dv input[name='vhclName']").attr("readonly", false);
		$(".child-dv select[name='vhclType']").attr("readonly", false);
		$(".child-dv input[name='vhclNumber']").attr("readonly", false);
		$(".child-dv input[name='vhclownrName']").attr("readonly", false);
		$(".child-dv input[name='driverLcncNumber']").attr("readonly", false);
		$(".child-dv input[name='dirverAdrsln1']").attr("readonly", false);
		$(".child-dv input[name='dirverLocality']").attr("readonly", false);
		$(".child-dv input[name='dirverCity']").attr("readonly", false);
		$(".child-dv input[name='dirverState']").attr("readonly", false);
		$(".child-dv input[name='dirverCountry']").attr("readonly", false);
		$(".child-dv input[name='dirverZip']").attr("readonly", false);
		$(".child-dv input[name='bankName']").attr("readonly", false);
		$(".child-dv input[name='bankAcNo']").attr("readonly", false);
		$(".child-dv input[name='bankIFSC']").attr("readonly", false);
		$(".child-dv input[name='bankLocation']").attr("readonly", false);
		$(".child-dv textarea[name='otherDetails']").attr("readonly", false);
		$(".child-dv select[name='vhclCndtn']").attr("readonly", false);
	}

	function cancelEdit(){
		$("#updateButton").hide();
		$("#editButton").show();
		$("#chooseDrImage, #choosevhclImage").hide();
		$("#chooseDrImage, #choosevhclImage").attr("src", "");
		$(".child-dv input[name='dirverName']").attr("readonly", true);
		$(".child-dv input[name='dirverEmail']").attr("readonly", true);
		$(".child-dv input[name='dirverPhone']").attr("readonly", true);
		$(".child-dv input[name='vhclName']").attr("readonly", true);
		$(".child-dv select[name='vhclType']").attr("readonly", true);
		$(".child-dv input[name='vhclNumber']").attr("readonly", true);
		$(".child-dv input[name='vhclownrName']").attr("readonly", true);
		$(".child-dv input[name='driverLcncNumber']").attr("readonly", true);
		$(".child-dv input[name='dirverAdrsln1']").attr("readonly", true);
		$(".child-dv input[name='dirverLocality']").attr("readonly", true);
		$(".child-dv input[name='dirverCity']").attr("readonly", true);
		$(".child-dv input[name='dirverState']").attr("readonly", true);
		$(".child-dv input[name='dirverCountry']").attr("readonly", true);
		$(".child-dv input[name='dirverZip']").attr("readonly", true);
		$(".child-dv input[name='bankName']").attr("readonly", true);
		$(".child-dv input[name='bankAcNo']").attr("readonly", true);
		$(".child-dv input[name='bankIFSC']").attr("readonly", true);
		$(".child-dv input[name='bankLocation']").attr("readonly", true);
		$(".child-dv textarea[name='otherDetails']").attr("readonly", true);
		$(".child-dv select[name='vhclCndtn']").attr("readonly", true);
		$("#div_driver_details").hide();
		$("#div_drivers").show();
		LoadDrivers(0);
	}

	function updateDriver(id) {
		var driverID = $("#input_driveID").val();
		//alert(driverID);
		var dirverName = $(".child-dv input[name='dirverName']").val();
		var dirverEmail = $(".child-dv input[name='dirverEmail']").val();
		var dirverPhone = $(".child-dv input[name='dirverPhone']").val();
		var vehicleName = $(".child-dv input[name='vhclName']").val();
		var vehicleType = $(".child-dv select[name='vhclType']").val();
		var vhclNumber = $(".child-dv input[name='vhclNumber']").val();
		var vhclownrName = $(".child-dv input[name='vhclownrName']").val();
		var driverLcncNumber = $(".child-dv input[name='driverLcncNumber']").val();
		var dirverAdrsln1 = $(".child-dv input[name='dirverAdrsln1']").val();
		var dirverLocality = $(".child-dv input[name='dirverLocality']").val();
		var dirverCity = $(".child-dv input[name='dirverCity']").val();
		var dirverState = $(".child-dv input[name='dirverState']").val();
		var dirverCountry = $(".child-dv input[name='dirverCountry']").val();
		var dirverZip = $(".child-dv input[name='dirverZip']").val();
		var bankName = $(".child-dv input[name='bankName']").val();
		var bankAcNo = $(".child-dv input[name='bankAcNo']").val();
		var bankIFSC = $(".child-dv input[name='bankIFSC']").val();
		var bankLocation = $(".child-dv input[name='bankLocation']").val();
		var otherDetails = $(".child-dv textarea[name='otherDetails']").val();
		var vhclCndtn = $(".child-dv select[name='vhclCndtn']").val();
		var drImage = $(".child-dv input[name='driverImage']")[0].files[0];
		var vhclImage = $(".child-dv input[name='vhclImage']")[0].files[0];

		var driverData = new FormData();
		driverData.append("driverID", driverID);
		driverData.append("name", dirverName);
		driverData.append("email", dirverEmail);
		driverData.append("mobile", dirverPhone);
		driverData.append("vehicleName", vehicleName);
		driverData.append("vehicleType", vehicleType);
		driverData.append("vehicleNumber", vhclNumber);
		driverData.append("ownerName", vhclownrName);
		driverData.append("Licence", driverLcncNumber);
		driverData.append("address", dirverAdrsln1);
		driverData.append("locality", dirverLocality);
		driverData.append("city", dirverCity);
		driverData.append("state", dirverState);
		driverData.append("country", dirverCountry);
		driverData.append("zipCode", dirverZip);
		driverData.append("bankName", bankName);
		driverData.append("bankAcNo", bankAcNo);
		driverData.append("bankIFSC", bankIFSC);
		driverData.append("bankLocation", bankLocation);
		driverData.append("otherDetails", otherDetails);
		driverData.append("condition", vhclCndtn);
		driverData.append("drImage", drImage);
		driverData.append("vhclImage", vhclImage);

		$.ajax({
			url: "../phps/update_driverdtls.php",
			type: "POST",
			//data: {driverID: driverID, name: dirverName, email: dirverEmail, mobile: dirverPhone, vehicleName: vehicleName, vehicleType: vehicleType, vehicleNumber: vhclNumber, ownerName: vhclownrName, Licence: driverLcncNumber, address: dirverAdrsln1, locality: dirverLocality, city: dirverCity, state: dirverState, country: dirverCountry, zipCode: dirverZip, bankName: bankName, bankAcNo: bankAcNo, bankIFSC: bankIFSC, bankLocation: bankLocation, otherDetails: otherDetails, condition: vhclCndtn},
			data: driverData,
			contentType: false,
			processData: false,
			cache: false,
			success: function(msg){
				if(msg == "success"){
					alert("Driver details are updated!");
					cancelEdit();
				}else{
					alert(msg);
				}
			},
			error: function(error){
				if(error.status == "0"){
					alert("Unable to connect to server, Try again");
				}else{
					alert("Something went wrong, Try again");
				}	
			}
		})
	}

	function LoadCategories(){
		var selectedCab = $(".child-dv select[name='vhclType']").val();
		$.ajax({
			url: "../phps/show_cabTypes.php",
			type: "POST",
			data: {},
			success: function(msg){
				//alert(msg);
				var a = JSON.parse(msg);
				$(".child-dv select[name='vhclType']").empty();
				if(a.length > 0){
					for(var i=0; i<a.length; i++){
						if(selectedCab == a[i].id){
							$(".child-dv select[name='vhclType']").append("<option value='"+a[i].id+"' selected>"+a[i].name+"</option>");
						}else{
							$(".child-dv select[name='vhclType']").append("<option value='"+a[i].id+"'>"+a[i].name+"</option>");
						}
					}
				}else{
					$(".child-dv select[name='vhclType']").append("<option value='no'>No Categories Found</option>");
				}
			},
			error: function(error){
				if(error.status == "0"){
					alert("Unable to connect to server, Try again");
				}else{
					alert("Something went wrong, Try again");
				}	
			}
		})
	}

	function update_driverStatus(driverID, status){
		//alert(driverID+" status "+status);
		$.ajax({
			url: "../phps/activate_driver.php",
			type: "POST",
			data: {driverID: driverID, status: status},
			success:function(msg){
				//alert(msg);
				if(msg == "success"){
					$("#div_driver_details").hide();
					$("#div_drivers").show();
					LoadDrivers(0);
				}else{
					alert(msg);
				}
			},
			error: function(err){
				if(err.status == "0"){
					alert("Unable to connect to server, Try again");
				}else{
					alert("Something went wrong, Try again");
				}
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