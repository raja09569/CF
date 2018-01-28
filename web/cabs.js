function submitComment(id, name){
	var comment = $("#driver_comment").val();
	if(comment == ""){
		alert("Please enter comment!");
	}else{
		$.ajax({
			type: 'POST',
			url: 'save_userComment.php',
			data: {driver_id:id,uname:name,comment:comment},
			success: function(response) {
				if(response == "success"){
					location.reload();
				}else{
					alert(response);
				}
			},
			error: function(error){
				alert(error);
			}
		});
	}
}