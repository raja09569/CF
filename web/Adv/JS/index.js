
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
	$("#input_"+ids[1]).val("");	
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
	var custID = "<?php echo $_SESSION['customer_user_ID']; ?>";
	if(custID == ""){
		window.location = "../Customer/Login.php";
		return;
	}
	var category = $("select[name='ad-categories']").val();
	var subcat = $("select[name='ad-sub-categories']").val();
	var name = $("input[name='ad_name']").val();
	var company = $("input[name='ad_company']").val();
	var country = $("input[name='ad_country']").val();
	var territory = $("input[name='ad_territory']").val();
	var location = $("input[name='ad_location']").val();
	var address1 = $("input[name='ad_address1']").val();
	var address2 = $("input[name='ad_address2']").val();
	var emailID = $("input[name='ad_email']").val();
	var mobile = $("input[name='ad_mobile']").val();
	var heading = $("input[name='ad_heading']").val();
	var compProf = $("textarea[name='ad-comp-profile']").val();
	var prdctDtls = $("textarea[name='ad-prdct-dtls']").val();
	var img1 = $(".ad-img-div input[type='file'][name='input_1']");
	var img2 = $(".ad-img-div input[type='file'][name='input_2']");
	var img3 = $(".ad-img-div input[type='file'][name='input_3']");
	var img4 = $(".ad-img-div input[type='file'][name='input_4']");
	var img5 = $(".ad-img-div input[type='file'][name='input_5']");
	var atpos = emailID.indexOf("@");
    var dotpos = emailID.lastIndexOf(".");
	if(category == "select"){
		alert("Select Category");
		$("select[name='ad-categories']").focus();
		return;
	}
	if(subcat == "select"){
		alert("Select Sub Category");
		$("select[name='ad-sub-categories']").focus();
		return;
	}
	//alert(name);
	if(name == ""){
		alert("Enter Name");
		$("input[name='ad_name']").focus();
		return;
	}
	if(company == ""){
		alert("Enter company name");
		$("input[name='ad_company']").focus();
		return;
	}
	if(country == ""){
		alert("Enter country");
		$("input[name='ad_country']").focus();
		return;
	}
	if(territory == ""){
		alert("Enter territory");
		$("input[name='ad_territory']").focus();
		return;
	}
	if(location == ""){
		alert("Enter location");
		$("input[name='ad_location']").focus();
		return;
	}
	if(address1 == ""){
		alert("Enter Address One");
		$("input[name='ad_address1']").focus();
		return;
	}
	if(emailID == ""){
		alert("Enter Email");
		$("input[name='ad_email']").focus();
		return;
	}
	if(atpos<1 || dotpos<atpos+2 || dotpos+2>=emailID.length) {
        alert("Not a valid e-mail address");
		$("input[name='ad_email']").focus();
		return;
    }
	if(mobile == ""){
		alert("Enter Mobile");
		$("input[name='ad_mobile']").focus();
		return;
	}
	if ($("input[name='ad_mobile']").intlTelInput("isValidNumber") == false) {
		alert("Mobile number not valid");
		$("input[name='ad_mobile']").focus();
		return;
	}
	if(heading == ""){
		alert("Enter Ad Heading");
		$("input[name='ad_heading']").focus();
		return;
	}
	if(compProf == ""){
		alert("Enter company profile");
		$("textarea[name='ad-comp-profile']").focus();
		return;
	}
	if(prdctDtls == ""){
		alert("Enter product details");
		$("textarea[name='ad-prdct-dtls']").focus();
		return;
	}

	var countryData = $("input[name='ad_mobile']").intlTelInput("getSelectedCountryData");	
	var dialCode = countryData['dialCode'];

	var postData = new FormData();
	postData.append("custID", custID);
	postData.append("category", category);
	postData.append("subcat", subcat);
	postData.append("name", name);
	postData.append("company", company);
	postData.append("country", country);
	postData.append("territory", territory);
	postData.append("location", location);
	postData.append("address1", address1);
	postData.append("address2", address2);
	postData.append("emailID", emailID);
	postData.append("dialCode", dialCode);
	postData.append("mobile", mobile);
	postData.append("heading", heading);
	postData.append("compProf", compProf);
	postData.append("prdctDtls", prdctDtls);
	if(img1.length != 0){
		postData.append("img1", img1[0].files[0]);
	}
	if(img2.length != 0){
		postData.append("img2", img2[0].files[0]);
	}
	if(img3.length != 0){
		postData.append("img3", img3[0].files[0]);
	}
	if(img4.length != 0){
		postData.append("img4", img4[0].files[0]);
	}
	if(img5.length != 0){
		postData.append("img5", img5[0].files[0]);
	}
	$.ajax({
		url: "phps/post_ad.php",
		type: "POST",
		data: postData,
		contentType: false,
		cache: false,
		processData: false,
		success: function(msg){
			if(msg == "success"){
				alert("Post submitted successfully");
			}else{
				alert(msg);
			}
		},
		error: function(err){
			if(err.status == "0"){
				alert("Unable to connect to server, Try again");
			}else{
				alert("Something went wrong, Try again");
			}
		}
	});
}