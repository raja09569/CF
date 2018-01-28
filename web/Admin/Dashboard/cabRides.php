<?php 
	include 'header.php';
	include 'side_menu.php';
?>
<!-- RIGHT CPNTENT -->
<div class="dashboard-right  offset-0" id="main_content">
	<!-- Tab panes from left menu -->
	<div class="tab-content5">		
		<!-- CAB RIDES TAB -->					  
		<div class="tab-pane" id="cabrides">
			<div style="height:100vh;overflow:auto;">
				<table class="flatTable">
					<tr class="titleTr">
						<td colspan="2" class="titleTd">Cab Rides</td>
						<td colspan="8"></td>
					</tr>
					<tr class="headingTr">
						<td>Driver name</td>
						<td>cab type</td>
						<td>Cab no</td>
						<td>Start place</td>
						<td>date</td>
						<td>End place</td>
						<td>Date</td>
						<td>Total distance</td>
						<td>Total fee</td>
						<td>Owner commission</td>
					</tr>
					<tbody id="listcabRides"></tbody>
				</table>
			</div>
		</div>
		<!-- END OF CAB RIDES TAB -->
	</div>
	<!-- End of Tab panes from left menu -->	
</div>
<!-- END OF RIGHT CPNTENT -->
<?php include 'footer.php'; ?>