/*
@autor : Hari irawan
 */
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
	$(document).on('click', '#simpan', function(event) {
		event.preventDefault();
		/* Act on the event */
		swal({
		  title: 'Are you sure?',
		  text: "Anda ingin simpan data ini !",
		  type: 'info',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, Save it!'
		}).then(function () {
		  swal(
		    'success',
		    'Data berhasil disimpan !',
		    'success'
		  )
			$("#crud").modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
		  simpanData();
		},function (dismiss) {
		  if (dismiss === 'cancel') {
		    swal(
		      'Cancelled',
		      'Your imaginary file is safe :)',
		      'error'
		    )
		   }
		})
	});
	$(document).on('click', '.btn-update', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id_pesan = $(this).attr('id');
		swal({
		  title: 'Are you sure?',
		  text: "Kamu ingin update data ini !",
		  type: 'info',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, Update it!'
		}).then(function () {
		  swal(
		    'success',
		    'Update Data Berhasil !',
		    'success'
		  )
		  updateData(id_pesan)
		},function (dismiss) {
		  if (dismiss === 'cancel') {
		    swal(
		      'Cancelled',
		      'Your imaginary file is safe :)',
		      'error'
		    )
		   }
		})
	});

	$(document).on('click', '.btn-hapus', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id_pesan = $(this).attr('id');
		swal({
		  title: 'Apakah anda yakin?',
		  text: "Ingin menghapus data ini!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, Delet !',
		  cancelButtonText: 'No, Cancel!',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: false
		}).then(function () {
		  swal(
		    'Deleted!',
		    'Your file has been deleted.',
		    'success'
		  )
			deleteData(id_pesan);
		}, function (dismiss) {
		  if (dismiss === 'cancel') {
		    swal(
		      'Cancelled',
		      'Your imaginary file is safe :)',
		      'error'
		    )
		  }
		})
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
		data: {
			nama : nm,
			email : em,
			kategori : kat,
			pesan : pes,
		},
	})
	.done(function() {
		viewData();
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
		success:function(){
			$("#edit").getElemenClass()
			$("#edit").modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			viewData();
		}
	});
	
}

function deleteData(id){
	var id_pesan = id;
	$.ajax({
		type: 'POST',
		url: 'action/pesan.php?page=del',
		data: {id : id_pesan},
		success:function(){
			viewData();
		}
	})
	
}





