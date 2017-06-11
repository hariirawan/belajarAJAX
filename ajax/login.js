$(document).ready(function() {
	$("#login").click(function(event) {
		/* Act on the event */
		var user = $("#username").val();
		var pass = $("#password").val();
		$.ajax({
			url: 'action/cekLogin.php',
			type: 'POST',
			data: {user: user, pass: pass},
			success:function(data){
			  if(data == 'sukses'){
                    var success = $("#pesan").html('<div class="alert alert-success">Loggin Success ...!!!</div>');          
	                setTimeout(function(){$(success).slideDown('slow');}, 500);
                    setTimeout("location.href='index.php?page=home'", 3000);
	            }else{
	            	var error = $("#pesan").html('<div class="alert alert-danger"><i class="glyphicon glyphicon-ban-circle">&nbsp;</i>Terjadi Kesalahan...!!!</div>');          
	                setTimeout(function(){$(error).slideDown('slow');}, 500);
	            }
	            setTimeout(function(){$(error).slideUp('slow');}, 3000);
			}
		});
	});
	$(document).on('click','#reset',function(event) {
		/* Act on the event */
		event.preventDefault();
		resetForm();
	});
	
});


function resetForm(){
	$("[type=text]").val('');
	$("[type=password]").val('');
}