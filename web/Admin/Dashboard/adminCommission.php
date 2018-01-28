<?php 
	include 'header.php';
	include 'side_menu.php';
?>
<!-- RIGHT CPNTENT -->
<div class="dashboard-right  offset-0" id="main_content">
	<!-- Tab panes from left menu -->
	<div class="tab-content5">		
		<!-- ADMIN COMMISSION TAB -->					  
		<div class="tab-pane" id="admin_commisson">
			<div style="height:95vh;overflow:auto;">
				<table class="flatTable">
					<tr class="titleTr">
						<td colspan="2" class="titleTd">Owner Commission</td>
						<td colspan="12"></td>
					</tr>
					<tr class="headingTr">
						<td>Month</td>
						<td>Driver Name</td>
						<td>Vehicle number</td>
						<!--<td>Place</td>
						<td>Phone</td>-->
						<td>Cab Type</td>
						<!--<td>Fee/KM</td>-->
						<td>Total distance travelled</td>
						<td>Total Fee</td>
						<td>Owner Commission</td>
						<td>Received amount</td>
						<td>Balance</td>
						<td></td>
						<td></td>
					</tr>
					<tbody id="listownerCommission"></tbody>
				</table>
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
<?php include 'footer.php'; ?>