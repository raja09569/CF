<?php 
	include 'header.php';
	include 'side_menu.php';
?>
<!-- RIGHT CPNTENT -->
<div class="dashboard-right  offset-0" id="main_content">
	<!-- Tab panes from left menu -->
	<div class="tab-content5">		
		<!-- List of CabTypes Tab -->					  
		<div id="cabtypes">
			<div style="/*height:100vh;*/overflow:auto;">
				<table class="flatTable">
					<tr class="titleTr">
						<td colspan="2" class="titleTd">List of Cab Types</td>
						<td colspan="8"></td>
						<td class="plusTd button" onclick="openForm()"></td>
					</tr>
					<tr class="headingTr">
						<td></td>
						<td>Cab Type Name</td>
						<td>No of Seats</td>
						<td>per KM(with AC)</td>
						<td>per KM(without AC)</td>
						<td>Min KM Charge</td>
						<td>Min Charge(with AC)</td>
						<td>Min Charge(without AC)</td>
						<td>Owner Commission</td>
						<td>Tax</td>
						<td></td>
					</tr>
					<tbody id="listcabTypes"></tbody>
				</table>
				
				
				
				<!-- Update CabType modal -->
				<!-- <div class="modal fade" id="modal_editcabType" tabindex="-1" role="dialog" 
				 aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Modal Header -->
						<!--<div class="modal-header">
							<button type="button" class="close" 
							   data-dismiss="modal">
								   <span aria-hidden="true">&times;</span>
								   <span class="sr-only">Close</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">
								Update Cab Type
							</h4>
						</div>
						
						<!-- Modal Body -->
						<!--<div class="modal-body">
							<form class="form-horizontal" role="form">
							  <div class="form-group">
								<label  class="col-sm-4 control-label"
										  for="inputEmail3">CabType :</label>
								<div class="col-sm-8">
									<input type="hidden" id="editcabID" />
									<input type="text" id="editcabTYPE" class="form-control" />
								</div>
							  </div>
							</form>
						</div>
						
						<!-- Modal Footer -->
						<!--<div class="modal-footer">
							<button type="button" class="btn btn-default"
									data-dismiss="modal">
										Close
							</button>
							<button type="button" onclick='updatecabType();'
							class="btn btn-primary">
								Submit
							</button>
						</div>
					</div>
				</div>
			</div> -->
			<!-- Close of Update cabtype modal -->
	
			<!-- Delete CabType modal -->
			<div class="modal fade" id="modal_deletecabType" tabindex="-1" role="dialog" 
				 aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header">
							<button type="button" class="close" 
							   data-dismiss="modal">
								   <span aria-hidden="true">&times;</span>
								   <span class="sr-only">Close</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">
								Delete Cab Type 
							</h4>
						</div>
						
						<!-- Modal Body -->
						<div class="modal-body">
							<p>Are you sure that you want to Delete <strong>this</strong> Item?</p>
							<input type="hidden" id="deletecabID"/>
						</div>
						
						<!-- Modal Footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-default"
									data-dismiss="modal">
										NO
							</button>
							<button type="button" class="btn btn-primary"
							onclick="deletingcabType();">
								YES
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- close fee details modal -->
			</div>
		</div>
		<!-- End of List of CabTypes -->
	</div>
	<!-- End of Tab panes from left menu -->
</div>
<!-- END OF RIGHT CPNTENT -->
<!--  -->

<div id="sForm" class="sForm sFormPadding">
	<span class="button close" onclick="closeForm()">
		<img src="https://i.imgur.com/nnzONel.png" alt="X"  class="" />
	</span>
	<h2 class="title">
		Add/Edit Record
	</h2>  
	<div style="height: 80vh;overflow-y: auto;">
		<div class="fields">
			<div id="div_cbName">
				<label>Cab Name: <span class="imp">*</span></label><br/>
				<input type="text" placeholder="Enter cab name" class="form-control" required />
				<input type="hidden" />
			</div>
			<div id="div_cbIcon">
				<label>Choose Icon: <span class="imp">*</span></label><br/>
				<!-- <div id="my-icon-select"></div> -->
				<img src="../images/icons/car.png" id="cIcon" style="width: 80px;height: 80px;padding: 5px;" /><br/>
				<button style="" onclick="clearImage()">RESET</button>
				<input type="file" name="icon" value="Choose File" style="margin-top: 10px;" accept="image/*" onchange="readFile(this)">
			</div>
			<div id="div_cbsize">
				<label>Size: <span class="imp">*</span></label><br/>
				<input type="number" placeholder="No of seats" class="form-control" required /> 
			</div>
			<div id="div_crideLater">
				<label>Ride Later (Is Available): <span class="imp">*</span></label><br/>
				<div>
					<input type="radio" id="f-option" name="isRideLater" value="YES">
					<label for="f-option">YES</label>
					<div class="check"></div>
				</div>
				<div>
					<input type="radio" id="f-option1" name="isRideLater" value="NO">
					<label for="f-option1">NO</label>
					<div class="check"></div>
				</div>  								
			</div>
			<label>Charges /KM: <span class="imp">*</span></label><br/>
			<div id="dv_chrgWithAC">
				<input type="text" placeholder="AC" class="form-control" required /> 
			</div>
			<div id="dv_chrgWithoutAC">
				<input type="text" placeholder="NON AC" class="form-control" required /> 
			</div>
			<label>Minimum KM: <span class="imp">*</span></label><br/>
			<input type="text" placeholder="Minimum km to charge" 
			id="min_km_to_charge" class="form-control" required /> 
			<label>Minimum charge /KM: </label><br/>
			<div id="dv_mnchrgWithAC">
				<input type="text" placeholder="AC" class="form-control" required /> 
			</div>
			<div id="dv_mnchrgWithoutAC">
				<input type="text" placeholder="NON AC" class="form-control" required />
			</div>
			<label>Owner Commission per Trip (in %): <span class="imp">*</span></label><br/>
			<input type="text" placeholder="Owner Commission per Trip" id="owner_com_per_trip" class="form-control" required /> 
			<label>Tax (in %): <span class="imp">*</span></label><br/>
			<input type="text" placeholder="Tax" id="tax"
				class="form-control" required />
			
			<button style="margin-top:10px;" onclick="addCabType();" class="form-control">ADD</button>

			<button style="margin-top:10px;display: none;" onclick="addCabType();" class="form-control">UPDATE</button>

		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		showCabs();
	});

	function openForm(){
		$(".sForm").addClass("open");
	}

	function clearImage(){
		$("#div_cbIcon img").attr("src", "../images/icons/car.png");
		$("#div_cbIcon input").val("");
	}

	function closeForm(){
		$("#div_cbName input[type='text']").val("");
		$("#div_cbName input[type='hidden']").val("");
		$("#div_cbIcon img").attr("src", "../images/icons/car.png");
		$("#div_cbIcon input").val("");
		$("#div_cbsize input").val("");
		$("#div_crideLater input[name='isRideLater']").prop("checked", false);
		$("#dv_chrgWithAC input").val("");
		$("#dv_chrgWithoutAC input").val("");
		$("#min_km_to_charge").val("");
		$("#dv_mnchrgWithAC input").val("");
		$("#dv_mnchrgWithoutAC input").val("");
		$("#owner_com_per_trip").val("");
		$("#tax").val("");

		$("#sForm button:contains('ADD')").show();
		$("#sForm button:contains('UPDATE')").hide();

		$(".sForm").removeClass("open");
	}

	function showCabs(){
		$.ajax({
			type: 'POST',
			url: '../phps/show_cabTypes.php',
			data: {},
			success: function(response) {
				//alert(response);
				var a = JSON.parse(response);
				$("#listcabTypes").empty();
				if(a.length != 0){
					for(i=0; i<a.length; i++){
						var data = "<tr>";
						if(a[i].icon == ""){
							data += "<td><img src='../images/icons/car.png' style='width:50px;' /></td>";
						}else{
							data += "<td><img src='../../"+a[i].icon+"' style='width:50px;' /></td>";
						}
						data += "<td>"+a[i].name+"</td>";
						data += "<td>"+a[i].no_of_seats+"</td>";
						data += "<td>"+a[i].per_km_with_ac+"</td>";
						data += "<td>"+a[i].per_km_without_ac+"</td>";
						data += "<td>"+a[i].min_km_to_charge+"</td>";
						data += "<td>"+a[i].min_charge_with_ac+"</td>";
						data += "<td>"+a[i].min_charge_without_ac+"</td>";
						data += "<td>"+a[i].owner_comm_per_trip+"</td>";
						data += "<td>"+a[i].tax+"</td>";
						data += "<td onclick='openSetings()' class='controlTd'>"
						data += "<div class='settingsIcons'>"
						data += "<span class='settingsIcon' data-toggle='modal' data-target='#modal_deletecabType' onclick='deletecabType(&quot;"+a[i].id+"&quot;);'><img src='https://i.imgur.com/nnzONel.png' alt='X' /></span>"
						data += "<span class='settingsIcon' onclick='editcabType(&quot;"+a[i].id+"&quot;,&quot;"+a[i].name+"&quot;,&quot;"+a[i].icon+"&quot;,&quot;"+a[i].no_of_seats+"&quot;,&quot;"+a[i].isRideLaterAvailable+"&quot;,&quot;"+a[i].per_km_with_ac+"&quot;,&quot;"+a[i].per_km_without_ac+"&quot;,&quot;"+a[i].min_km_to_charge+"&quot;,&quot;"+a[i].min_charge_with_ac+"&quot;,&quot;"+a[i].min_charge_without_ac+"&quot;,&quot;"+a[i].owner_comm_per_trip+"&quot;,&quot;"+a[i].tax+"&quot;);'><img src='../../images/edit_white_20.png' alt='placeholder icon' /></span>"
						data += "</div>"
						data += "</td>"
						data += "</tr>";
						$("#listcabTypes").append(data);	
					}
				}else{
					$("#listcabTypes").append("<tr><td colspan='11' align='center'>No Records Found!</td></tr>");
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
		var cabType = $("#div_cbName input[type='text']").val();
		var cIcon = $("#div_cbIcon input").val();
		var cSize = $("#div_cbsize input").val();
		var isRideLater = $("#div_crideLater input[name='isRideLater']:checked").val();
		var cWithAc = $("#dv_chrgWithAC input").val();
		var cWithoutAC = $("#dv_chrgWithoutAC input").val();
		var min_km_to_charge = $("#min_km_to_charge").val();
		var mnCwithAC = $("#dv_mnchrgWithAC input").val();
		var mnCwithoutAC = $("#dv_mnchrgWithoutAC input").val();
		var owComm = $("#owner_com_per_trip").val();
		var tax = $("#tax").val();
		var postType = "";
		if($("#sForm button:contains('ADD')").is(":visible")){
			postType = "ADD";
		}else if($("#sForm button:contains('UPDATE')").is(":visible")){
			postType = "UPDATE";
		}else{
			return;
		}
		if(cabType == ""){
			alert("Enter cab name!");
			$("#div_cbName input[type='text']").focus();
			return;
		}
		if(postType == "ADD"){
			//alert("yes");
			if(cIcon == ""){
				alert("Select Cab Icon");
				$("#div_cbIcon input").focus();
				return;
			}	
		}
		if(cSize == ""){
			alert("Enter no of seats!");
			$("#div_cbsize input").focus();
			return;
		}
		if($("#div_crideLater input[name='isRideLater']").is(":checked") == false){
			alert("Is Ride Later is Available?");
			$("#div_crideLater input[name='isRideLater']").focus();
			return;
		}
		/*if(cWithAc == ""){
			alert("Enter Charge with AC");
			$("#dv_chrgWithAC input").focus();
			return;
		}*/
		if(cWithoutAC == ""){
			alert("Enter Charge without AC");
			$("#dv_chrgWithoutAC input").focus();
			return;
		}
		if(min_km_to_charge == ""){
			alert("Enter minimum KM");
			$("#min_km_to_charge").focus();
			return;
		}
		/*if(mnCwithAC == ""){
			alert("Enter minimum charge with AC");
			$("#dv_mnchrgWithAC input").focus();
			return;
		}*/
		if(mnCwithoutAC == ""){
			alert("Enter mininum charge without AC");
			$("#dv_mnchrgWithoutAC input").focus();
			return;
		}
		if(owComm == ""){
			alert("Enter owner Commission");
			$("#owner_com_per_trip").focus();
			return;
		}
		if(tax == ""){
			alert("Enter Tax");
			$("#tax").focus();
			return;
		}
		var postData = new FormData();
		postData.append("name", cabType);
		postData.append("name", cabType);
		postData.append("no_of_seats", cSize);
		postData.append("isRideLater", isRideLater);
		postData.append("per_km_with_ac", cWithAc);
		postData.append("per_km_without_ac", cWithoutAC);
		postData.append("min_km_to_charge", min_km_to_charge);
		postData.append("min_charge_with_ac", mnCwithAC);
		postData.append("min_charge_without_ac", mnCwithoutAC);
		postData.append("owner_comm_per_trip", owComm);
		postData.append("tax", tax);
		var postURL = "";
		if(postType == "ADD"){
			postData.append("file", $("#div_cbIcon input")[0].files[0]);
			postData.append("type", "ADD");
			postURL = '../phps/add_cab_category.php';
		}else{
			var catID = $("#div_cbName input[type='hidden']").val();
			postData.append("type", "UPDATE");
			postData.append("categoryID", catID);
			if(cIcon == ""){
				if($("#div_cbIcon img").attr("src") == "../images/icons/car.png"){
					alert("Select Cab Icon");
					$("#div_cbIcon input").focus();
					return;
					postData.append("cIcon", "");
				}else{
					postData.append("cIcon", "image");
				}
			}else{
				postData.append("cIcon", "newImage");
				postData.append("file", $("#div_cbIcon input")[0].files[0]);
			}
			postURL = '../phps/update_cab_category.php';
		}

		$.ajax({
			url: postURL,
			type: "POST",
			data: postData,
			contentType: false,
			processData: false,
			success: function(msg){
				alert(msg);
				if(msg == "success"){
					if(postType == "ADD"){
						closeForm();
						alert("Cab Added Successfully!");
						showCabs();
					}else{
						closeForm();
						alert("Cab Updated Successfully!");	
						showCabs();
					}
				}else{
					alert(msg);
				}
			},
			error: function(error){
				//alert(error.status);
				if(error.status == "0"){
					alert("Unable to connect server, Try again.");
				}else{
					alert("Something went wrong, Try again.");
				}
			}
		})
	}

	function editcabType(categoryID, name, icon, no_of_seats, isRideLater, per_km_with_ac, per_km_without_ac, min_km_to_charge, min_charge_with_ac, min_charge_without_ac, owner_com_per_trip, tax){
		//alert(isRideLater);
		$("#div_cbName input[type='text']").val(name);
		$("#div_cbName input[type='hidden']").val(categoryID);
		$("#div_cbIcon img").attr("src", "../../"+icon);
		$("#div_cbsize input").val(no_of_seats);
		$("#div_crideLater input[name='isRideLater'][value='"+isRideLater+"']").prop("checked", true);
		$("#dv_chrgWithAC input").val(per_km_with_ac);
		$("#dv_chrgWithoutAC input").val(per_km_without_ac);
		$("#min_km_to_charge").val(min_km_to_charge);
		$("#dv_mnchrgWithAC input").val(min_charge_with_ac);
		$("#dv_mnchrgWithoutAC input").val(min_charge_without_ac);
		$("#owner_com_per_trip").val(owner_com_per_trip);
		$("#tax").val(tax);

		$("#sForm button:contains('ADD')").hide();
		$("#sForm button:contains('UPDATE')").show();

		openForm();
	}

	function deletecabType(id){
		$('#deletecabID').val(id);
	}

	function deletingcabType(){
		var id = $('#deletecabID').val();	
		$.ajax({
			type: 'POST',
			url: '../phps/delete_cabtype.php',
			data: {id: id},
			success: function(response) {
				if(response == "success"){
					document.getElementById('deletecabID').value = "";
					$("#modal_deletecabType").modal('toggle');	
					alert("Deleted Successfully");
					showCabs();
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

	function readFile(input){
		if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cIcon').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
	}
</script>
<?php include 'footer.php'; ?>