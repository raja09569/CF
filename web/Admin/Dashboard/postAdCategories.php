<?php 
	include 'header.php';
	include 'side_menu.php';
?>
<link rel="stylesheet" type="text/css" href="../css/custom.css">
<!-- RIGHT CPNTENT -->
<div class="dashboard-right  offset-0" id="main_content">
	<!-- Tab panes from left menu -->
	<div class="tab-content5">		
		<!-- AD Categories TAB -->
		<div id="ad_categories">
			<div>
				<table class="flatTable">
					<tr class="titleTr">
						<td class="titleTd">List of AD Categories</td>
						<td></td>
						<td class="plusTd button" onclick="openForm()"></td>
					</tr>
					<tr class="headingTr">
						<td></td>
						<td>Category Name</td>
						<td></td>
					</tr>
					<tbody id="listadCategories"></tbody>
				</table>
				
				<div id="sForm" class="sForm sFormPadding">
					<span class="button close" onclick="closeForm()">
						<img src="https://i.imgur.com/nnzONel.png" alt="X"  class="" />
					</span>
					<h2 class="title">
						Add/Edit Record
					</h2>  
					<div>
						<div class="fields">
							<label>Category Name(upto 15 characters): </label><br/>
							<input type="text" placeholder="Enter name" id="ad_category" class="form-control" maxlength="15" required />
							<label>Choose Icon: </label><br/>
							<div id="my-icon-select"></div>
							<button style="margin-top:140px;" id="btn_AddadCat" onclick="addadCat();" class="form-control">ADD</button>
							<button style="margin-top:140px;" id="btn_UpdtadCat" class="form-control">UPDATE</button>
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
						</div>
						
						<!-- Modal Footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-default"
									data-dismiss="modal">
										NO
							</button>
							<button type="button" class="btn btn-primary"
							onclick="DeleteAdCategory();">
								YES
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- close fee details modal -->
			</div>
		</div>
		<!-- End of AD Categories TAB -->
		
<script type="text/javascript">
	
	function openForm(){
		$(".sForm").addClass("open");
		LoadIcons();
	}

	function closeForm(){
		$(".fields input").val("");
		LoadIcons();
		$("#sForm button:contains('ADD')").show();
		$("#sForm button:contains('UPDATE')").hide();
		$(".sForm").removeClass("open");
	}

	var iconSelect = new IconSelect("my-icon-select", 
		{'selectedIconWidth':48,
		'selectedIconHeight':48,
		'selectedBoxPadding':5,
		'iconsWidth':48,
		'iconsHeight':48,
		'boxIconSpace':3,
		'vectoralIconNumber':8,
		'horizontalIconNumber':1});

	function LoadIcons(){
		var icons = [];
		icons.push({'iconFilePath':'../images/icons/1.png', 'iconValue':'../images/icons/1.png'});
		icons.push({'iconFilePath':'../images/icons/2.png', 'iconValue':'../images/icons/2.png'});
		icons.push({'iconFilePath':'../images/icons/3.png', 'iconValue':'../images/icons/3.png'});
		icons.push({'iconFilePath':'../images/icons/4.png', 'iconValue':'../images/icons/4.png'});
		icons.push({'iconFilePath':'../images/icons/5.png', 'iconValue':'../images/icons/5.png'});
		icons.push({'iconFilePath':'../images/icons/6.png', 'iconValue':'../images/icons/6.png'});
		icons.push({'iconFilePath':'../images/icons/7.png', 'iconValue':'../images/icons/7.png'});
		icons.push({'iconFilePath':'../images/icons/8.png', 'iconValue':'../images/icons/8.png'});
		icons.push({'iconFilePath':'../images/icons/9.png', 'iconValue':'../images/icons/9.png'});
		icons.push({'iconFilePath':'../images/icons/10.png', 'iconValue':'../images/icons/10.png'});
		icons.push({'iconFilePath':'../images/icons/11.png', 'iconValue':'../images/icons/11.png'});
		icons.push({'iconFilePath':'../images/icons/12.png', 'iconValue':'../images/icons/12.png'});
		icons.push({'iconFilePath':'../images/icons/13.png', 'iconValue':'../images/icons/13.png'});
		icons.push({'iconFilePath':'../images/icons/14.png', 'iconValue':'../images/icons/14.png'});
		iconSelect.refresh(icons);
	}

	(function(){
		LoadCategories();
	})();
	
	$("#btn_UpdtadCat").on("click", function(){
		alert(iconSelect.getSelectedValue());
		var catID = $("#btn_UpdtadCat").data("id");
		var ad_category = $("#ad_category").val();
		if(ad_category == ""){
			alert("Category name should not be empty!");
		}else{
			$.ajax({
				type: 'POST',
				url: '../PostAD/update_ad_Category.php',
				data:{
						categoryID: catID,
						name: ad_category,
						icon: iconSelect.getSelectedValue()
					},
				success: function(response) {
					//alert(response);
					if(response == "Category Updated!"){
						alert(response);
						closeForm();
						$(".fields input[type=text]").val("");
						showTab("ad_categories");
						document.getElementById('ad_category').value = "";
						LoadCategories();
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
	
	function LoadCategories(){
		$.ajax({
			type: 'POST',
			url: '../PostAD/get_categories.php',
			data:{},
			success: function(response) {
				//alert(response);			
				var a = JSON.parse(response);
				$('#listadCategories').empty();
				if(a.length != 0){
					for(i=0; i<a.length; i++){
						$("#listadCategories").append("<tr>"
						+ "<td><img src='"+a[i].icon+"' /></td>"
						+ "<td>"+a[i].name+"</td>"
						+ '<td onclick="openSetings(this)" class="controlTd">'
						+ '<div class="settingsIcons">'
						+ '<span class="settingsIcon" data-toggle="modal" data-target="#modal_deleteAdCategory" onclick="DeleteAdCat(&quot;'+a[i].categoryID+'&quot;);"><img src="../images/nnzONel.png" alt="X" /></span>'
						+ '<span class="settingsIcon" onclick="EditAdCat(&quot;'+a[i].categoryID+'&quot;,&quot;'+a[i].name+'&quot;,&quot;'+a[i].icon+'&quot;);"><img src="../../images/edit_white_20.png" alt="placeholder icon" /></span>'
						//+ '<div class="settingsIcon"><img src="https://i.imgur.com/UAdSFIg.png" alt="placeholder icon" /></div>'
						+ '</div>'
						+ '</td>'
						+ "</tr>");					
					}
				}else{
					$("#listadCategories").append("<tr><td colspan='3' style='text-align:center;'>No Records found!</td></tr>");
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

	function addadCat(){
		var ad_category = document.getElementById('ad_category').value;
		if(ad_category == ""){
			alert("Enter Ad Category");
		}else{
			$.ajax({
				type: 'POST',
				url: '../PostAD/add_ad_Category.php',
				data:{
						name: ad_category,
						icon: iconSelect.getSelectedValue()
					},
				success: function(response) {
					//alert(response);
					if(response == "Category Added!"){
						alert(response);
						closeForm();
						$(".fields input[type=text]").val("");
						showTab("ad_categories");
						document.getElementById('ad_category').value = "";
						LoadCategories();
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

	function EditAdCat(catID, name, icon){
		$("#ad_category").val(name);
		$("#btn_UpdtadCat").data("id", catID);
		$("#btn_AddadCat").hide();
		$("#btn_UpdtadCat").show();
		LoadIcons();
		$(".selected-icon img").attr("src", icon);
		$(".sForm").toggleClass("open");
	}

	function DeleteAdCat(catID){
		$("#deleteadcatID").val(catID);
	}

	function DeleteAdCategory(){
		var catID = $("#deleteadcatID").val();
		$.ajax({
			type: 'POST',
			url: '../PostAD/remove_ad_Category.php',
			data:{
					categoryID: catID
				},
			success: function(response) {
				//alert(response);
				if(response == "Category Removed!"){
					$('#modal_deleteAdCategory').modal('toggle');
					alert(response);
					showTab("ad_categories");
					LoadCategories();
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