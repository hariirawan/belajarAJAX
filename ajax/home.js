$(document).ready(function(){
	desa();
	kecamatan();
	dusun();
	abk();
});

function desa(){
	$.ajax({
		url: 'action/home.php?home=desa',
		type: 'POST',
		success:function(data){
			$("#jumDesa").html(data);
		}
	})
	
}
function kecamatan(){
	$.ajax({
		url: 'action/home.php?home=kecamatan',
		type: 'POST',
		success:function(data){
			$("#jumKec").html(data);
		}
	})
		
}
function dusun(){
	$.ajax({
		url: 'action/home.php?home=desa',
		type: 'POST',
		success:function(data){
			$("#jumDusun").html(data);
		}
	})
		
}

function abk(){
	$.ajax({
		url: 'action/home.php?home=abk',
		type: 'POST',
		success:function(data){
			$("#jumAbk").html(data);
		}
	})
		
}