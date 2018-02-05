<?php 
	include 'header.php';
	include 'side_menu.php';
?>
<link rel="stylesheet" type="text/css" href="../css/custom.css">
<!-- RIGHT CPNTENT -->
<div class="dashboard-right  offset-0" id="main_content">
	<!-- Tab panes from left menu -->
	<div class="tab-content5">		
		<!-- ADMIN COMMISSION TAB -->					  
		<div id="admin_commisson">
			<div>
				<div class="row search-div">
					<div class="col-md-4 col-sm-4">
						<select class="form-control" name="trip-month">
							<option value="0">Select Month</option>
							<option value="01">January</option>
							<option value="02">February</option>
							<option value="03">March</option>
							<option value="04">April</option>
							<option value="05">May</option>
							<option value="06">June</option>
							<option value="07">July</option>
							<option value="08">August</option>
							<option value="09">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
					</div>
					<div class="col-md-4 col-sm-4">
						<input type="text" name="trip-year" class="form-control" placeholder="Enter Year">
					</div>
					<div class="col-md-4 col-sm-4">
						<button class="btn btn-success" onclick="searchCommissions();">SEARCH</button>
					</div>
				</div>
				<div class="clear"></div>
				<table class="flatTable">
					<tr class="titleTr">
						<td colspan="3" class="titleTd">Owner Commission</td>
						<td colspan="9"></td>
					</tr>
					<tr class="headingTr">
						<!-- <td>Month</td> -->
						<!-- <td>Vehicle number</td> -->
						<!--<td>Place</td>
						<td>Phone</td>-->
						<!-- <td>Cab Type</td> -->
						<!--<td>Fee/KM</td>-->
						<td>Driver</td>
						<td>Trips</td>
						<td>Distance</td>
						<td>Amount</td>
						<td>Commission</td>
						<td>Received</td>
						<td>Balance</td>
						<td></td>
						<td></td>
					</tr>
					<tbody id="listownerCommission"></tbody>
				</table>
				<div class="pagination">
					<ul></ul>
				</div>
			</div>
			<!-- Enter fee paid modal -->
			<div class="modal fade" id="modal_receiveAmount" tabindex="-1" role="dialog" 
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
								Enter fee paid
							</h4>
						</div>
						
						<!-- Modal Body -->
						<div class="modal-body">
							
							<form class="form-horizontal" role="form">
							<input type="hidden" id="receiveamountID" />
							<input type="hidden" id="totalAmount" />
							  <div class="form-group">
								<label  class="col-sm-4 control-label"
										  for="inputEmail3">Amount received</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" 
									id="amountreceived"/> (in Rupees)
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-sm-4 control-label"
									  for="inputPassword3" >Date of receipt</label>
								<div class="col-sm-4">
									<input type="text" class="form-control mySelectCalendar"
										id="dateofreceipt"/>
								</div>
								<div class="col-sm-4">
								<select class="form-control mySelectBoxClass" name="timeofreceipt" id="timeofreceipt">
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
							  <div class="form-group">
								<label class="col-sm-4 control-label"
									  for="inputPassword3" >Received by</label>
								<div class="col-sm-8">
									<select id="received_by" class="form-control">
									<option value="cash">Cash</option>
									<option value="cheque">Cheque</option>
									<option value="online">Online</option>
									<option value="dd">DD</option>
									<option value="wallet">Wallet</option>
									<option value="creditcard">Credit card</option>
									</select>
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-sm-4 control-label"
									  for="inputPassword3" >Reference No </label>
								<div class="col-sm-8">
									<input type="text" class="form-control"
										id="referenceno"/>
								</div>
							  </div>
							</form>
						</div>
						
						<!-- Modal Footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-default"
									data-dismiss="modal">
										Close
							</button>
							<button type="button" onclick='receiveAmount();' class="btn btn-primary">
								Submit
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Close Enter fee paid modal -->

			<!-- Fee details modal -->
			<div class="modal fade" id="modal_feeDetailsview" tabindex="-1" role="dialog" 
				 aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="height:100% !important;width:100% !important;">
					<div class="modal-content" style="height:100% !important;width:100% !important;">
						<!-- Modal Header -->
						<div class="modal-header">
							<button type="button" class="close" 
							   data-dismiss="modal">
								   <span aria-hidden="true">&times;</span>
								   <span class="sr-only">Close</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">
								Fee details view 
							</h4>
						</div>
						
						<!-- Modal Body -->
						<div class="modal-body" style="overflow-y:auto !important;max-height:calc(100% - 150px) !important;">
							<table>
							<thead>
							<tr><th></th></tr>
							<tr>
							<th>S.No</th>
							<th>Date</th>
							<th>Amount Received</th>
							<th>Received by</th>
							<th>Reference no</th>
							</tr>
							</thead>
							<tbody id="amount_received_dts">
							</tbody>
							</table>
						</div>
						
						<!-- Modal Footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-default"
									data-dismiss="modal">
										Close
							</button>
							<button type="button" class="btn btn-primary">
								Submit
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- close fee details modal -->
		</div>
		<!-- END OF ADMIN COMMISSION TAB -->
	</div>
	<!-- End of Tab panes from left menu -->	
</div>
<!-- END OF RIGHT CPNTENT -->

<script type="text/javascript">
	
	$(document).ready(function(){
		LoadCommissions(0, "", "");
	});

	function searchCommissions() {
		var month = $("select[name='trip-month']").val();
		var year = $("input[name='trip-year']").val();
		if(month == "0" && year == ""){
			alert("Select Month or Enter Year");
		}else{
			LoadCommissions(0, month, year);
		}
	}

	function LoadCommissions(index, month, year){
		var offset = index * 10;
		$.ajax({
			type: 'POST',
			url: '../phps/show_adminCommission.php',
			data: {offset: offset, month: month, year: year},
			success: function(response) {
				//alert(response);
				var a = JSON.parse(response);
				$("#listownerCommission").empty();
				if(a.length > 1){
					for(i=1; i<a.length; i++){
						var data = "<tr>";
						data += "<td>"+a[i].driverName+"</td>";
						data += "<td>"+a[i].trips+"</td>";
						data += "<td>"+a[i].distance+" KM</td>";
						data += "<td>"+a[i].total+" FCFA</td>";
						data += "<td>"+a[i].commission+" FCFA</td>";
						data += "<td>"+a[i].paid+"</td>";
						data += "<td>"+a[i].due+"</td>";
						data += "<td><a onclick='openreceiveAmount(&quot;"+a[i].driver_id+"&quot;,&quot;"+a[i].total_fee+"&quot;);' data-toggle='modal' data-target='#modal_receiveAmount'>PAY</a></td>";
						data += "<td><a onclick='LoadamountReceived("+a[i].driver_id+");' data-toggle='modal' data-target='#modal_feeDetailsview'>Details</a></td>";
						data += "</tr>";
						
						$("#listownerCommission").append(data);
					}
					var pages = a[0].pages;
					if(pages > 1){
						var pageData = '';
						if(index != 0){
							pageData += '<li class="double-sym" onclick="LoadCommissions(0, '+month+', '+year+')">&#xab;</li>';
							var previous = index - 1;
							pageData += '<li onclick="LoadCommissions('+previous+', '+month+', '+year+')">&#x276E;</li>';
						}
						for(var j=1; j<=pages; j++){
							if((index + 1) == j){
								pageData += '<li class="active" onclick="LoadCommissions('+(j-1)+', '+month+', '+year+')">'+j+'</li>';
							}else{
								pageData += '<li onclick="LoadCommissions('+(j-1)+', '+month+', '+year+')">'+j+'</li>';
							}
						}
						if(index != (pages - 1)){
							var next = index + 1;
							pageData += '<li onclick="LoadCommissions('+next+', '+month+', '+year+')">&#x276F;</li>';
							var lastIndex = pages - 1;
							pageData += '<li class="double-sym" onclick="LoadCommissions('+lastIndex+', '+month+', '+year+')">&#xbb;</li>'
						}
						$(".pagination ul").append(pageData);
					}
				}else{
					$("#listownerCommission").append("<tr><td colspan='16' align='center'>No Records Found!</td></tr>");
				}
			},
			error: function(error){
				alert(error);
			}
		});
	}
</script>

<?php include 'footer.php'; ?>