$(document).ready(function() {
	$("#logOut").click(function(event) {
		$.ajax({
			url: 'action/logOut.php',
			type: 'POST',
			success:function(data){
				window.location.href="login.php";
			}
		})
	});
});