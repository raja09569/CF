<?php 
	include 'header.php';
	include 'side_menu.php';
?>
<link rel="stylesheet" type="text/css" href="../css/custom.css">
<!-- RIGHT CPNTENT -->
<div class="dashboard-right  offset-0" id="main_content">
	<!-- Tab panes from left menu -->
	<div class="tab-content5">		
		<!-- AD Sub Categories TAB -->
		<div id="ad_subcategories">
			<div style="/*height:93vh;overflow:auto;*/">
				<table class="flatTable">
					<tr class="titleTr">
						<td class="titleTd">List of Ad Sub Categories</td>
						<td></td>
						<td class="plusTd button"></td>
					</tr>
					<tr class="headingTr">
						<td>
							<select id="slct_cts">
								<option>Select Category</option>
							</select>
						</td>
						<td>Sub Category Name</td>
						<td></td>
					</tr>
					<tbody id="listadsubCategories" class="list-values">
						<tr>
							<td colspan="3">
								Select Ad Category
							</td>
						</tr>
					</tbody>
				</table>
				
				<div id="sForm" class="sForm sFormPadding">
					<span class="button close" id="cls_ad">
						<img src="../images/nnzONel.png" alt="X" class="" />
					</span>
					<h2 class="title">
						Add a New Record
					</h2>  
					<div>
						<div class="fields">
							
							<label>Select Category: </label><br/>
							<select id="slct_ctgy">
								<option>Select Category</option>
							</select>
							
							<label>Sub Category Name(15 characters): </label><br/>
							<input type="text" placeholder="Enter name" id="ad_subcategory" class="form-control" maxlength="15" required />
							<input type="hidden" id="subcatID" />
							
							<button style="margin-top:20px;" id="btn_AddadSubCat" class="form-control">ADD</button>
							<button style="margin-top:20px;" id="btn_UpdtadSubCat" class="form-control">UPDATE</button>
			
						</div>
					</div>
				</div>
				
			<!-- Delete Ad Category modal -->
			<div class="modal fade" id="modal_deleteAdCategory" tabindex="-1" role="dialog" 
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
								Delete Ad Category 
							</h4>
						</div>
						
						<!-- Modal Body -->
						<div class="modal-body">
							<p>Are you sure that you want to Delete <strong>this</strong> Item?</p>
							<input type="hidden" id="deleteadcatID"/>
							<input type="hidden" id="deleteadsubcatID"/>
						</div>
						
						<!-- Modal Footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-default"
									data-dismiss="modal">
										NO
							</button>
							<button type="button" class="btn btn-primary"
							onclick="DeleteAdSubCategory();">
								YES
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- close fee details modal -->
			</div>
		</div>
		<!-- End of AD Sub Categories TAB -->
		<script type="text/javascript">

			(function(){
				LoadCategories();
			})();

			function LoadCategories(){
				$.ajax({
					type: 'POST',
					url: '../PostAD/get_categories.php',
					data:{},
					success: function(response) {
						//alert(response);			
						var a = JSON.parse(response);
						$('#slct_cts').empty();
						if(a.length != 0){
							$("#slct_cts").append("<option value='0' selected disabled>Select Category</option>");
							for(i=0; i<a.length; i++){
								$("#slct_cts").append("<option value='"+a[i].categoryID+"'>"+ a[i].name +"</option>");			
							}
							LoadsubCategories($("#slct_cts").val());
						}else{
							$("#slct_cts").append("<option value='0' selected disabled>No Categories</option>");
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

			function LoadsubCategories(catID){
				$.ajax({
					type: 'POST',
					url: '../PostAD/get_subcategories.php',
					data:{categoryID: catID},
					success: function(response) {
						//alert(response);			
						var a = JSON.parse(response);
						$('#listadsubCategories').empty();
						if(a.length != 0){
							for(i=0; i<a.length; i++){
								$("#listadsubCategories").append("<tr>"
								+ "<td></td>"
								+ "<td>"+a[i].name+"</td>"
								+ '<td onclick="openSetings()" class="controlTd">'
								+ '<div class="settingsIcons">'
								+ '<span class="settingsIcon" data-toggle="modal" data-target="#modal_deleteAdCategory" onclick="DeleteAdSubCat(&quot;'+a[i].categoryID+'&quot;,&quot;'+a[i].subcategoryID+'&quot;);"><img src="https://i.imgur.com/nnzONel.png" alt="X" /></span>'
								+ '<span class="settingsIcon" onclick="Edit(&quot;'+a[i].categoryID+'&quot;,&quot;'+a[i].subcategoryID+'&quot;,&quot;'+a[i].name+'&quot;);"><img src="../../images/edit_white_20.png" alt="placeholder icon" /></span>'
								+ '</div>'
								+ '</td>'
								+ "</tr>");					
							}
						}else{
							$("#listadsubCategories").append("<tr><td colspan='3'"
							+" style='text-align:center;'>No Records found!</td></tr>");
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

			$(".plusTd").on("click", function(){
				$("#btn_UpdtadSubCat").hide();
				$("#btn_AddadSubCat").show();
				$.ajax({
					type: 'POST',
					url: '../PostAD/get_categories.php',
					data:{},
					success: function(response) {
						//alert(response);			
						var a = JSON.parse(response);
						$('#slct_ctgy').empty();
						if(a.length != 0){
							$("#slct_ctgy").append("<option value='0' selected disabled>Select Category</option>");
							for(i=0; i<a.length; i++){	
								$("#slct_ctgy").append("<option value='"+a[i].categoryID+"'>"+ a[i].name +"</option>");					
							}
							$(".sForm").addClass("open");
						}else{
							$("#slct_ctgy").append("<option value='0' selected disabled>No Categories</option>");
							$(".sForm").addClass("open");
						}
					},
					error: function(error){
						$(".sForm").addClass("open");
						if(error.status == "0"){
							alert("Unable to connect server, Try again.");
						}else{
							alert("Something went wrong, Try again.");
						}
					}
				});
			});
			
			$("#cls_ad").on("click", function(){
				$('#slct_ctgy').empty();
				$("#ad_subcategory").val("");
				$("#subcatID").val("");
				$("#btn_UpdtadSubCat").hide();
				$("#btn_AddadSubCat").show();
				$(".sForm").removeClass("open");
			});
			
			$("#slct_cts").on("change", function(){
				var catID = $("#slct_cts").val();
				LoadsubCategories(catID);
			});
			
			function DeleteAdSubCat(catID, subcatID){
				$("#deleteadcatID").val(catID);
				$("#deleteadsubcatID").val(subcatID);
			}
			
			function DeleteAdSubCategory(){
				var catID = $("#deleteadcatID").val();
				var subcatID = $("#deleteadsubcatID").val();
				$.ajax({
					url: "../PostAD/remove_ad_subcategory.php",
					type: "POST",
					data: {categoryID:catID, subcategoryID:subcatID},
					success: function(msg){
						if(msg == "Category Removed!"){
							$('#modal_deleteAdCategory').modal('toggle');
							LoadsubCategories($("#slct_cts").val());
						}else{
							alert(msg);
						}
					},
					error: function(err){
						if(err.status == "0"){
							alert("Unable to connect server, Try again.");
						}else{
							alert("Something went wrong, Try again.");
						}
					}
				})
			}
			
			function Edit(catID, subcatID, name){
				//alert(catID);
				$.ajax({
					type: 'POST',
					url: '../PostAD/get_categories.php',
					data:{},
					success: function(response) {
						//alert(response);
						var a = JSON.parse(response);
						$('#slct_ctgy').empty();
						if(a.length > 0){
							$("#slct_ctgy").append("<option value='0' disabled>Select Category</option>");
							for(i=0; i<a.length; i++){
								//alert(a[i].categoryID);
								if(a[i].categoryID == catID){
									$("#slct_ctgy").append("<option value='"+a[i].categoryID+"' selected >"+ a[i].name +"</option>");
								}else{
									$("#slct_ctgy").append("<option value='"+a[i].categoryID+"'>"+ a[i].name +"</option>");
								}								
							}
						}else{
							$("#slct_cts").append("<option value='0' selected disabled>No Categories</option>");
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
				$("#subcatID").val(subcatID);
				$("#ad_subcategory").val(name);
				$("#btn_AddadSubCat").hide();
				$("#btn_UpdtadSubCat").show();
				$(".sForm").toggleClass("open");
			}
			
			$("#btn_AddadSubCat").on("click", function(){
				var slct_ctgy = document.getElementById('slct_ctgy').value;
				var ad_subcategory = document.getElementById('ad_subcategory').value;
				if(slct_ctgy == "0"){
					alert("Select Category");
				}else if(ad_subcategory == ""){
					alert("Enter Ad Sub Category");
				}else{
					$.ajax({
						type: 'POST',
						url: '../PostAD/add_ad_SubCategory.php',
						data:{
								categoryID: slct_ctgy,
								name: ad_subcategory
							},
						success: function(response) {
							//alert(response);
							if(response == "Sub Category Added!"){
								alert(response);
								$("#cls_ad").click(); 
								$(".fields input[type=text]").val("");
								$('#slct_ctgy').prop('selectedIndex',0);
								LoadsubCategories($("#slct_cts").val());
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
			});
			
			$("#btn_UpdtadSubCat").on("click", function(){
				var slct_ctgy = document.getElementById('slct_ctgy').value;
				var ad_subcategory = document.getElementById('ad_subcategory').value;
				var subcatID = $("#subcatID").val();
				if(slct_ctgy == "0"){
					alert("Select Category");
				}else if(ad_subcategory == ""){
					alert("Enter Ad Sub Category");
				}else{
					$.ajax({
						type: 'POST',
						url: '../PostAD/update_ad_subCategory.php',
						data:{
								categoryID: slct_ctgy,
								subcategoryID: subcatID,
								name: ad_subcategory
							},
						success: function(response) {
							//alert(response);
							if(response == "Sub Category Updated!"){
								alert(response);
								$("#cls_ad").click(); 
								$(".fields input[type=text]").val("");
								$('#slct_ctgy').prop('selectedIndex',0);
								LoadsubCategories($("#slct_cts").val());
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
			});
		</script>
	</div>
	<!-- End of Tab panes from left menu -->	
</div>
<!-- END OF RIGHT CPNTENT -->
<?php include 'footer.php'; ?>