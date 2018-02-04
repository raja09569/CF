<?php 
	include 'header.php';
	include 'side_menu.php';
?>
<!-- RIGHT CPNTENT -->
<div class="dashboard-right  offset-0" id="main_content">
	<!-- Tab panes from left menu -->
	<div class="tab-content5">		
		<!-- CAB RIDES TAB -->					  
		<div id="cabrides">
			<div>
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
				<div class="pagination">
					<ul>
						
					</ul>
				</div>
			</div>
		</div>
		<!-- END OF CAB RIDES TAB -->
	</div>
	<!-- End of Tab panes from left menu -->	
</div>
<!-- END OF RIGHT CPNTENT -->

<script type="text/javascript">
	$(document).ready(function(){
		LoadTrips(0);
	})

	function LoadTrips(index){
		var offset = index * 10;
		$.ajax({
			url: "../phps/show_cabRides.php",
			type: "POST",
			data: {offset: offset},
			success: function(msg){
				//alert(msg);
				var a = JSON.parse(msg);
				$('#listcabRides').empty();
				$(".pagination ul").empty();
				if(a.length > 0){
					for(var i=1; i<a.length; i++){
						var data = "<tr>";
						data += "<td>"+a[i].drName+"</td>";
						data += "<td>"+a[i].cabtype+"</td>";
						data += "<td>"+a[i].cabno+"</td>";
						data += "<td>"+a[i].pick_place+"</td>"; 
						data += "<td>"+a[i].pick_date+"</td>"; 
						data += "<td>"+a[i].drop_place+"</td>"; 
						data += "<td>"+a[i].drop_date+"</td>";
						data += "<td>"+a[i].distance+"</td>";
						data += "<td>"+a[i].fee+"</td>";
						data += "<td>"+a[i].commission+"</td>";
						data += "</tr>";
						$("#listcabRides").append(data);
					}
					var pages = a[0].pages;
					if(pages > 1){
						var pageData = '';
						if(index != 0){
							pageData += '<li class="double-sym" onclick="LoadTrips(0)">&#xab;</li>';
							var previous = index - 1;
							pageData += '<li onclick="LoadTrips('+previous+')">&#x276E;</li>';
						}
						for(var j=1; j<=pages; j++){
							if((index + 1) == j){
								pageData += '<li class="active" onclick="LoadTrips('+(j-1)+')">'+j+'</li>';
							}else{
								pageData += '<li onclick="LoadTrips('+(j-1)+')">'+j+'</li>';
							}
						}
						if(index != (pages - 1)){
							var next = index + 1;
							pageData += '<li onclick="LoadTrips('+next+')">&#x276F;</li>';
							var lastIndex = pages - 1;
							pageData += '<li class="double-sym" onclick="LoadTrips('+lastIndex+')">&#xbb;</li>'
						}
						$(".pagination ul").append(pageData);
					}
				}else{
					$("#listcabRides").append("<tr><td colspan='7' style='text-align:center;'>No Records found!</td></tr>");
				}
			},
			error: function(error){
				if(error.status == "0"){
					alert("Unable to connect to server, Try again");
				}else{
					alert("Something went wrong, Try again");
				}
			}
		});
	}
</script>

<?php include 'footer.php'; ?>