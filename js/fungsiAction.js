$(document).ready(function(){
	viewData();

	//Sintax Penjarian pada ajax;
	$("#cari").keyup(function(event) {
		var search = $("#cari").val();

		$.ajax({
			url: 'action/pesan.php?page=cari',
			type: 'POST',
			data: {cari: search},
			success:function(data){
				$('.table-tampil').html(data);
			}
		});
	});
	$(document).on('click','.paging',function(event) {
		var no = $(this).attr('id');
		viewData(no);
	});

	//fungsi back
	
	$(document).on('click', '#back', function(event) {
		event.preventDefault();
		$("#cari").trigger('reset');
		viewData();
	});
});

function simpanData(){
	var nm = $("#nama").val();
	var em = $("#email").val();
	var kat = $("#kategori").val();
	var pes = $("#pesan").val();
	$.ajax({
		type: 'POST',
		url: 'action/pesan.php?page=add',
		data: {nama : nm, email : em, kategori: kat, pesan : pes}
		//data: 'nama='+nama+'&email='+email+'&kategori='+kategori+'&pesan='+pesan,
		/*success:function(){
			viewData();
		}*/
	}).done(function(data) {
    	viewData();
    	$("#pesan").text("Data Berhasil Diinputkan");
 	});
}
function viewData(page){
	$.ajax({
		type: 'POST',
		url: 'action/pesan.php',
		data: {paging : page},
		success:function(data){
			$('.table-tampil').html(data);
		}
	});
	
}

function updateData(id){
	var id_pesan = id;
	var nama = $("#nama-"+id_pesan).val();
	var email = $("#email-"+id_pesan).val();
	var kategori = $("#kategori-"+id_pesan).val();
	var pesan = $("#pesan-"+id_pesan).val();
	$.ajax({
		type: 'POST',
		url: 'action/pesan.php?page=edit',
		data: 'nama='+nama+'&email='+email+'&kategori='+kategori+'&pesan='+pesan+'&id='+id_pesan,
		success:function(data){
			viewData();
		}
	});
	
}

function deleteData(id){
	var id_pesan = id;
	$.ajax({
		type: 'POST',
		url: 'action/pesan.php?page=del',
		data: 'id='+id_pesan,
		success:function(){
			console.log('Data didelete');
			viewData();
		}
	})
	
}





