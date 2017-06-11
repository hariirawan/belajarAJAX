$(document).ready(function(event) {
	/* Act on the event */
	priview();
	$(document).on('click', '.paging', function(event){
		event.preventDefault();
		var no = $(this).attr('id');
		priview(no);
		
	});
	$(document).on("change","#short", function(event){
		var data = $(this).val();
		console.log(data);
	});

	$(document).on("click", "#back", function(event){
		event.preventDefault();
		/* Act on the event */
		window.location.href="../index.php?menu=rekapAbk";
	});
	
});


function priview(page){
	$.ajax({
		url: '../action/priview.php',
		type: 'POST',
		data: {no_page: page},
		success:function(data){
			$('#tampil').html(data);
			
		}
	});	
}
function short(data){
	$.ajax({
		url: '../action/priview.php',
		type: 'POST',
		data: {data: data},
	});
}