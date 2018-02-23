$(document).ready(function(){
	$("#div_1").show();
	LoadCategories();
});

function searchAd(){
	var query = $('input[name="search-ad"]').val();
	if(query == ""){
		alert("Enter a keyword to search");
	}else{
		window.location = "Ads.php?q="+query;
	}
}

function checkImages(input){
	if (input.files && input.files[0]) {
        var reader = new FileReader();
        var id = $(input).attr("id");
		var ids = id.split("_");
        reader.onload = function (e) {
			$("#img_"+ids[1]).attr("src", e.target.result);
			$("#close_"+ids[1]).show();
        }
        reader.readAsDataURL(input.files[0]);
	    $("#div_"+(parseInt(ids[1]) + 1)).show();
    }
}

function showChooser(img){
	var id = $(img).attr("id");
	var ids = id.split("_");
	$("#input_"+ids[1]).click();
}

function removeThis(ele){
	var id = $(ele).attr("id");
	var ids = id.split("_");
	$("#close_"+ids[1]).hide();
	$("#img_"+ids[1]).attr("src", "../images/plus.png");
}

function cancelForm(){

}

function LoadCategories(){
	$.ajax({
		url: "phps/get_categories.php",
		type: "POST",
		success: function(msg){
			$("select[name='ad-categories']").empty();
			//alert(msg);
			var a = JSON.parse(msg);
			if(a.length > 0){
				var data = "<option value='select' disable selected>Select Category</option>";
				$("select[name='ad-categories']").append(data);
				for(var i=0; i<a.length; i++){
					var data = "<option value='"+a[i].catID+"'>"+a[i].catName+"</option>";
					$("select[name='ad-categories']").append(data);
				}
			}else{
				var data = "<option value='no' disable selected>No categories found!</option>";
				$("select[name='ad-categories']").append(data);
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

function loadSubCat(select){
	var catID = $(select).val();
	$.ajax({
		url: "phps/get_sub_categories.php",
		type: "POST",
		data: {catID: catID},
		success: function(msg){
			$("select[name='ad-sub-categories']").empty();
			var a = JSON.parse(msg);
			if(a.length > 0){
				var data = "<option value='select' disable selected>Select Sub Category</option>";
				$("select[name='ad-sub-categories']").append(data);
				for(var i=0; i<a.length; i++){
					var data = "<option value='"+a[i].subcatID+"'>"+a[i].subcatName+"</option>";
					$("select[name='ad-sub-categories']").append(data);
				}
			}else{
				var data = "<option value='no' disable selected>No sub categories found!</option>";
				$("select[name='ad-sub-categories']").append(data);
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

function submitAd(){
	var category = $("select[name='ad-categories']").val();
	var subcat = $("select[name='ad-categories']").val();
	var name = $("input[name='ad-name']").val();
	var company = $("input[name='ad-company']").val();
	var country = $("input[name='ad-country']").val();
	var country = $("input[name='ad-country']").val();
}