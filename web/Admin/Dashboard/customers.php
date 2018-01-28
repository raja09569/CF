<?php 
	include 'header.php';
	include 'side_menu.php';
?>
<!-- RIGHT CPNTENT -->
<div class="dashboard-right  offset-0" id="main_content">
	<!-- Tab panes from left menu -->
	<div class="tab-content5">		
		<!-- LIST OF USERS TAB -->					  
		<div id="users">
			<div style="/*height:100vh;overflow:auto;*/">
				<table class="flatTable">
					<tr class="titleTr">
						<td class="titleTd">Users</td>
						<td colspan="6"></td>
						<!--<td class="plusTd button"></td>-->
					</tr>
					<tr class="headingTr">
						<td></td>
						<td>Name</td>
						<td>Phone No</td>
						<td>Email ID</td>
						<td>Address</td>
						<td>Regn. date</td>
						<td></td>
					</tr>
					<tbody id="userListtbody"></tbody>
				</table>
				<!-- Delete CabType modal -->
				<div class="modal fade" id="modal_deleteUser" tabindex="-1" role="dialog" 
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
								<input type="hidden" id="userId"/>
							</div>
							
							<!-- Modal Footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-default"
										data-dismiss="modal">
											NO
								</button>
								<button type="button" class="btn btn-primary"
								onclick="deletingUser();">
									YES
								</button>
							</div>
						</div>
					</div>
				</div>
				<!-- close delete user modal -->
			</div>
		</div>
		<!-- END OF USERS TAB -->
		<script type="text/javascript">
			$.ajax({
				type: 'POST',
				url: '../phps/show_users.php',
				data:{},
				success: function(response) {
					//alert(response);			
					var a = JSON.parse(response);
					$('#userListtbody').empty();
					if(a.length != 0){
						for(i=0; i<a.length; i++){
							//alert(a[i].name);
							if(a[i].photo == ""){
								$("#userListtbody").append("<tr>"
								+"<td><img src='../../images/user-avatar.jpg' width='50' style='padding:5%;'></img></td>"
								+"<td>"+a[i].name+"</td>"
								+"<td>"+a[i].phoneno+"</td>"
								+"<td>"+a[i].emailid+"</td>"
								+"<td>"+a[i].adrs+"</td>"
								+"<td>"+a[i].reg_date+"</td>"
								+'<td class="controlTd">'
								+"<span class='settingsIcon' data-toggle='modal' data-target='#modal_deleteUser' onclick='deleteUser(&quot;"+a[i].id+"&quot;);' >"						+'<img src="https://i.imgur.com/nnzONel.png" alt="X" />'
								+"</span>"
								+"</td>"
								+"</tr>");
							}else{
								$("#userListtbody").append("<tr>"
								+"<td><img src='"+a[i].photo+"' width='50' style='padding:5%;'></img></td>"
								+"<td>"+a[i].name+"</td>"
								+"<td>"+a[i].phoneno+"</td>"
								+"<td>"+a[i].emailid+"</td>"
								+"<td>"+a[i].adrs+"</td>"
								+"<td>"+a[i].reg_date+"</td>"
								+'<td class="controlTd">'
								+'<span class="settingsIcon"><img src="https://i.imgur.com/nnzONel.png" alt="X" /></span>'
								+"</td>"
								+"</tr>");
							}					
						}
					}else{
						$("#userListtbody").append("<tr><td colspan='7' style='text-align:center;'>No Records found!</td></tr>");
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
			function deleteUser(id){
				$("#userId").val(id);
			}
			function deletingUser(){
				var id = $('#userId').val();	
				$.ajax({
					type: 'POST',
					url: 'phps/delete_user.php',
					data: {id: id},
					success: function(response) {
						if(response == "success"){
							$("#modal_deleteUser").modal('toggle');	
							alert("Removed Successfully");
							showTab("users");
							document.getElementById('userId').value = "";
							LoadUsers();
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
		</script>
	</div>
	<!-- End of Tab panes from left menu -->	
</div>
<!-- END OF RIGHT CPNTENT -->
<?php include 'footer.php'; ?>