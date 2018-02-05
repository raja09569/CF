window.onload = function() {
	//$('#div_driver_details').hide();
	//$("#btn_UpdtadCat").hide();
	//$("#btn_UpdtadSubCat").hide();	
	$(".button").click(function () {
		$("#ad_category").val("");
		$("#btn_UpdtadCat").data("id", "");
		$("#btn_UpdtadCat").hide();
		$("#btn_AddadCat").show();
		//$(".sForm").toggleClass("open");   
	});
	//showTab('cabtypes');
};

//// Side menu Movement //////
function showTab(tabId){
	
	/*$('#dashboard').hide();
	$('#users').hide();
	$('#cabtypes').hide();
	$('#driveractivation').hide();
	$('#cabrides').hide();
	$('#admin_commisson').hide();
	$('#ad_categories').hide();
	$('#ad_subcategories').hide();*/
	
	$('#'+tabId).show();
	
	if(tabId == "dashboard"){
		
	}else if(tabId == "users"){
		LoadUsers();
	}else if(tabId == "cabtypes"){
		LoadCabTypes();
	}else if(tabId == "driveractivation"){
		LoadDrivers();
	}else if(tabId == "cabrides"){
		loadcabRides();
	}else if(tabId == "admin_commisson"){
		loadownerCommission();
	}else if(tabId == "ad_categories"){
		LoadCategories();
	}else if(tabId == "ad_subcategories"){
		LoadsubCategories();
	}else{
		
	}
}

//// close of sidemenu movement ///
///// Cab Types Loading Tab 

function LoadCabTypes(){
	
}


/// Loading Drivers Tab
function LoadDrivers(){
	$.ajax({
		type: 'POST',
		url: 'phps/show_drivers.php',
		data: {},
		success: function(response) {
			//alert(response);
			var a = JSON.parse(response);
			$("#drivers_list").empty();
			if(a.length != 0){
				for(i=0; i<a.length; i++){
					
					var data = "<tr>";
					data += "<td style='width:8%;'><img src='../";
					data += a[i].driver_photo;
					data += "' style='width:100%;' /></td>"
					data += "<td>";
					data += '<a href="#" onclick="openDetails(&quot;'+a[i].driverID+'&quot;,&quot;'+a[i].drivername+'&quot;,&quot;'+a[i].cabtype+'&quot;,&quot;'+a[i].reg_date+'&quot;,&quot;'+
					a[i].adrs+'&quot;,&quot;'+a[i].locality+'&quot;,&quot;'+a[i].country+'&quot;,&quot;'+a[i].phoneno+'&quot;,&quot;'+a[i].email+'&quot;,&quot;'+
					a[i].licenceno+'&quot;,&quot;'+a[i].vehicleno+'&quot;,&quot;'+a[i].bankname+'&quot;,&quot;'+a[i].bankacno+'&quot;,&quot;'+
					a[i].ifscecode+'&quot;,&quot;'+a[i].banklocation+'&quot;,&quot;'+a[i].act_date+'&quot;,&quot;'+a[i].driver_photo+'&quot;,&quot;'+a[i].vehicle_photo+'&quot;);">'+a[i].drivername+'</a>';
					data += "</td>"
					data += "<td>";
					data += a[i].cabname;
					data += "</td>"
					data += "<td>";
					data += a[i].locality;
					data += "</td>"
					data += "<td>";
					data += a[i].phoneno;
					data += "</td>"
					data += "<td>";
					data += a[i].email;
					data += "</td>"
					data += "<td>";
					data += a[i].dutystatus;
					data += "</td>"
					data += "<td>";
					data += a[i].act_date;
					data += "</td>"
					data += "<td>";
					data += a[i].reg_status;
					data += "</td>"
					data += "<td>";
					data += a[i].url;
					data += "</td>"
					data += "</tr>";
					
					$("#drivers_list").append(data);
				}
			}else{
				
				$("#drivers_list").append("<tr><td colspan='10' style='text-align:center;'>No Records Found!</td></tr>");
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
function update_driverStatus(id, status){
	$.ajax({
		type: 'POST',
		url: 'phps/activate_driver.php',
		data: {id:id,status:status},
		success: function(response) {
			if(response == "success"){
				alert("Driver activated successfully!");
				showTab("driveractivation");
				LoadDrivers();
			}else{
				alert(repsonse);
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
function openDetails(sno, name, cabtype, regdate,adrs,location, country,phoneno,emailid,licenceno,vehicleno,bankname,bankacno,ifsccode,banklocation,act_date,driver_photo,vehicle_photo){
	
	$('#div_drivers').hide();
	$('#div_driver_details').show();
	$('#sno').attr("value", sno);
	$('#driver_name').attr("value", name);
	
	$.ajax({
		url: "phps/cabtypes.php",
		type: "POST",
		data: {},
		success: function(msg){
			//alert(msg);
			var a = JSON.parse(msg);
			$("#driver_cab_type").append("");
			if(a.length != 0){
				for(i=0; i<a.length; i++){
					if(a[i].cabtype == cabtype){
						$("#driver_cab_type").append("<option value='"+a[i].cabID+"' selected>"+a[i].cabtype+"</option>");
					}else{
						$("#driver_cab_type").append("<option value='"+a[i].cabID+"'>"+a[i].cabtype+"</option>");
					}
				}
			}else{
				$("#driver_cab_type").append("<option value='0'>No Records Found!</option>");
			}
		},error: function(error){
			if(error.status == "0"){
				alert("Unable to connect server, Try again.");
			}else{
				alert("Something went wrong, Try again.");
			}
		}
	});
	
	//$('#driver_cab_type').attr("value", cabtype);
	$('#reg_dt').text(regdate);
	$('#adrs').attr("value", adrs);
	$('#driver_location').attr("value", location);
	$('#cntry').attr("value", country);
	$('#phoneno').attr("value", phoneno);
	$('#emailId').attr("value", emailid);
	$('#licenceno').attr("value", licenceno);
	$('#vehicleno').attr("value", vehicleno);
	$('#bankname').attr("value", bankname);
	$('#bank_ac_no').attr("value", bankacno);
	$('#ifsc_code').attr("value", ifsccode);
	$('#location').attr("value", banklocation);
	$('#activated_dt').text(act_date);
	$('#driver_photo').attr("src", "../"+driver_photo);
	$('#vehicle_photo').attr("src", "../"+vehicle_photo);
	//alert($('#cab_type').val());
}
function cancel_driverDetails(){
	$('#div_drivers').show();
	$('#div_driver_details').hide();
	LoadDrivers();
}
function edit_driverDetails(){
	$("#div_driver_details table tr td input").prop('readonly', false);
	$("#reg_dt").prop('readonly', true);
	$("#activated_dt").prop('readonly', true);
	$("#sno").prop('readonly', true);
	$('#edt_btn').hide();
	$('#updt_btn').show();
}
function update_driverDetails(){
	
	var sno = $('#sno').val();
	var name = $('#driver_name').val();
	
	//alert(name);
	
	var cabType = $('#driver_cab_type').val();
	var adrs = $('#adrs').val();
	var location = $('#driver_location').val();
	var country = $('#cntry').val();
	var phoneno = $('#phoneno').val();
	var emailid = $('#emailId').val();
	var licenceno = $('#licenceno').val();
	var vehicleno = $('#vehicleno').val();
	var bankname = $('#bankname').val();
	var bankacno = $('#bank_ac_no').val();
	var ifsccode = $('#ifsc_code').val();
	var bnklocation = $('#location').val();
	var regdate = $('#reg_dt').val();
	var act_date = $('#activated_dt').val();
	var driver_photo = $('#driver_photo').attr('src');
	var vehicle_photo = $('#vehicle_photo').attr('src');

	
	$.ajax({
		type: 'POST',
		url: 'phps/update_driverdtls.php',
		data: {sno:sno,name:name,cabType:cabType,adrs:adrs,location:location,country:country,
		phoneno:phoneno,emailid:emailid,licenceno:licenceno,vehicleno:vehicleno,bankname:bankname,bankacno:bankacno
		,ifsccode:ifsccode,bnklocation:bnklocation},
		success: function(response) {
			//alert(response);
			if(response == "Updated Successfully"){
				alert(response);
				//openDetails(sno, name, cabtype, regdate,adrs,location, country,phoneno,emailid,licenceno,vehicleno,bankname,bankacno,ifsccode,bnklocation,act_date,driver_photo,vehicle_photo);
				//showTab("driveractivation");
				//LoadDrivers();
				$('#updt_btn').hide();
				$('#edt_btn').show();
				$("#div_driver_details table tr td input").prop('readonly', true);
				//$('#div_driver_details').hide();
				//$('#div_drivers').show();
			}else{
				alert(response);
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

/// END OF LOADING DRIVERS


/// START OF LOADING CAB RIDES ///

function loadcabRides(){
	$.ajax({
		type: 'POST',
		url: 'phps/show_cabRides.php',
		data: {},
		success: function(response) {
			//alert(response);
			var a = JSON.parse(response);
			$("#listcabRides").empty();
			if(a.length != 0){
				for(i=0; i<a.length; i++){
					var data = "<tr>";
					data += "<td>"+a[i].driver_name+"</td>";
					data += "<td>"+a[i].cabtype+"</td>";
					data += "<td>"+a[i].cabno+"</td>";
					data += "<td>"+a[i].pick_place+"</td>";
					data += "<td>"+a[i].pick_date+"</td>";
					data += "<td>"+a[i].drop_place+"</td>";
					data += "<td>"+a[i].drop_date+"</td>";
					data += "<td>"+a[i].total_distance+"</td>";
					data += "<td>"+a[i].total_fee+" Fcfa</td>";
					data += "<td>"+a[i].owner_commission+" Fcfa</td>";
					data += "</tr>";
					
					$("#listcabRides").append(data);
				}
			}else{
				$("#listcabRides").append("<tr><td colspan='16' align='center'>No Records Found!</td></tr>");
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

///END OF LOADING CAB RIDES

//// START OF LOADING OWNER COMMISSSION //
function loadownerCommission(){
	$.ajax({
		type: 'POST',
		url: 'phps/show_adminCommission.php',
		data: {},
		success: function(response) {
			//alert(response);
			var a = JSON.parse(response);
			$("#listownerCommission").empty();
			if(a.length != 0){
				for(i=0; i<a.length; i++){
					var data = "<tr>";
					/*data += "<td>"+a[i].sno+"</td>";*/
					data += "<td>"+a[i].month+"</td>";
					data += "<td>"+a[i].driver_name+"</td>";
					data += "<td>"+a[i].vehicle_no+"</td>";
					/*data += "<td>"+a[i].place+"</td>";
					data += "<td>"+a[i].phone_no+"</td>";*/
					data += "<td>"+a[i].cab_type+"</td>";
					/*data += "<td>"+a[i].fee_per_km+" Fcfa</td>";*/
					data += "<td>"+a[i].total_distance+" Km</td>";
					data += "<td>"+a[i].total_fee+" Fcfa</td>";
					data += "<td>"+a[i].owner_commission+" Fcfa</td>";
					data += "<td>"+a[i].received_amount+" Fcfa</td>";
					data += "<td>"+a[i].balance+" Fcfa</td>";
					data += "<td><a onclick='openreceiveAmount(&quot;"+a[i].driver_id+"&quot;,&quot;"+a[i].total_fee+"&quot;);' data-toggle='modal' data-target='#modal_receiveAmount'>Enter fee paid</a></td>";
					data += "<td><a onclick='LoadamountReceived("+a[i].driver_id+");' data-toggle='modal' data-target='#modal_feeDetailsview'>View paid details</a></td>";
					data += "</tr>";
					
					$("#listownerCommission").append(data);
				}
			}else{
				$("#listownerCommission").append("<tr><td colspan='16' align='center'>No Records Found!</td></tr>");
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

function openreceiveAmount(id,total){
	$('#receiveamountID').val(id);
	$('#totalAmount').val(total);
	$("#dateofreceipt").datepicker();
}
function receiveAmount(){
	var id = $('#receiveamountID').val();
	var total = $('#totalAmount').val();
	var amountreceived = $('#amountreceived').val();
	var dateofreceipt = $('#dateofreceipt').val();
	var timeofreceipt = $('#timeofreceipt').val();
	var received_by = $('#received_by').val();
	var referenceno = $('#referenceno').val();
	dateofreceipt = dateofreceipt+" "+timeofreceipt;
	$.ajax({
		type: 'POST',
		url: 'phps/enter_amountReceived.php',
		data: {driver_id:id,total_amount:total,amount_received:amountreceived,received_date:dateofreceipt,
		received_by:received_by,reference_no:referenceno},
		success: function(response) {
			//alert(response);
			if(response == "success"){
				$('#receiveamountID').val("");
				$('#totalAmount').val("");
				$('#amountreceived').val("");
				$('#dateofreceipt').val("");
				$('#timeofreceipt').val("");
				$('#received_by').val("");
				$('#referenceno').val("");
				$('#modal_receiveAmount').modal('toggle');	
				showTab("admin_commisson");
				loadownerCommission();
			}else{
				alert(response);
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
function LoadamountReceived(id){
	//alert(id);
	$.ajax({
		type: 'POST',
		url: 'phps/amountReceive.php',
		data: {driver_id: id},
		success: function(response) {
			//console.log(response);
			var a = JSON.parse(response);
			$('#amount_received_dts').empty();
			if(a.length != 0){
				for(i=0; i<a.length; i++){
					var data = "<tr>";
						data += "<td>";
					data += a[i].sno;
					data += "</td>";
					data += "<td>";
					data += a[i].date;
					data += "</td>";
					data += "<td>";
					data += a[i].amount_received+" Fcfa";
					data += "</td>";
					data += "<td>";
					data += a[i].received_by;
					data += "</td>";
					data += "<td>";
					data += a[i].reference_no;
					data += "</td>";
					data += "</tr>";
					$('#amount_received_dts').append(data);
				}
			}else{
				$('#amount_received_dts').append('<tr><td colspan="5">No Records Found!</td></tr>');
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

function addCabType(){	
	var cab_type = document.getElementById('cab_type').value;
	var cab_size = document.getElementById('cab_size').value;
	var per_km_with_ac = document.getElementById('per_km_with_ac').value;
	var per_km_without_ac = document.getElementById('per_km_without_ac').value;
	var min_km_to_charge = document.getElementById('min_km_to_charge').value;
	var min_charge_with_ac = document.getElementById('min_charge_with_ac').value;
	var min_charge_without_ac = document.getElementById('min_charge_without_ac').value;
	var owner_com_per_trip = document.getElementById('owner_com_per_trip').value;
	var tax = document.getElementById('tax').value;
	
	if(cab_type == ""){
		alert("Enter Cab Type");
	}else if(cab_size == ""){
		alert("Enter Cab Size");
	}/*else if(per_km_with_ac == ""){
		alert("Enter Charge per KM With AC");
	}else if(per_km_without_ac == ""){
		alert("Enter Charge per KM Without AC");
	}*/else if(per_km_with_ac == "" && per_km_without_ac == ""){
		alert("Enter Charge per KM");
	}else if(min_km_to_charge == ""){
		alert("Enter Min KM to Charge");
	}/*else if(min_charge_with_ac == ""){
		alert("Enter Min Charge With AC");
	}else if(min_charge_without_ac == ""){
		alert("Enter Min Charge Without AC");
	}*/else if(min_charge_with_ac == "" && min_charge_without_ac == ""){
		alert("Enter Min Charge");
	}else if(owner_com_per_trip == ""){
		alert("Enter Owner commission per Trip");
	}else if(tax == ""){
		alert("Enter Tax");
	}else{
		$.ajax({
			type: 'POST',
			url: 'phps/add_cab_category.php',
			data:{
					name: cab_type,
					icon: "",
					no_of_seats: cab_size,
					per_km_with_ac: per_km_with_ac,
					per_km_without_ac: per_km_without_ac,
					min_km_to_charge: min_km_to_charge,
					min_charge_with_ac: min_charge_with_ac,
					min_charge_without_ac: min_charge_without_ac,
					owner_comm_per_trip: owner_com_per_trip,
					tax: tax
				},
			success: function(response) {
				//alert(response);
				if(response == "Cab Added!"){
					alert(response);
					$("#cls_ad").click(); 
					$(".fields input[type=text]").val("");
					showTab("cabtypes");
					document.getElementById('cab_type').value = "";
					LoadCabTypes();
				}else{
					alert(response);
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
}
function openSetings(e){
	$(e+" .settingsIcons").toggleClass("display"); 
	$(e+" .settingsIcon").toggleClass("openIcon"); 
}
