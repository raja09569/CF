function searchAd(){
	var query = $('input[name="search-ad"]').val();
	if(query == ""){
		alert("Enter a keyword to search");
	}else{
		window.location = "Ads.php?q="+query;
	}
}