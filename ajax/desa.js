$(document).ready(function(event) {

	viewData();
	kecamatan();

	$("#simpan").click(function(event) {
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
			simpanData();
			$("#input").modal('hide');
			$("#input").getElemenClass();
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			resetForm();
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

	$(document).on('click', '.update', function(event) {
		var id = $(this).attr('id');
		$('.modal-backdrop').remove();	
		swal({
		  title: 'Are you sure?',
		  text: "Anda ingin simpan data ini !",
		  type: 'info',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, Update it!'
		}).then(function () {
		  swal(
		    'success',
		    'Data berhasil diupdate !',
		    'success'
		  )
			editData(id);
			$("#edit-"+id).getElemenClass();
			$("#edit-"+id).modal('hide');
			$('body').removeClass('modal-open');
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

	
	$(document).on('click', '.delete', function(event) {
		var id = $(this).attr('id');
		swal({
		  title: 'Are you sure?',
		  text: "Anda ingin delete data ini !",
		  type: 'info',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, Delete it!'
		}).then(function () {
		  swal(
		    'warning',
		    'Data berhasil didelete !',
		    'success'
		  )
		deleteData(id);
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

	$(document).on('keyup', '#cari', function(event) {
		event.preventDefault();
		var kata = $("#cari").val();
		cari(kata);

	});

	$(document).on('click', '.paging', function(event){
		event.preventDefault();
		var no = $(this).attr('id');;
		viewData(no);
		
	});

});

function kecamatan(){
	$.ajax({
		url: 'action/func_kecamatan.php',
		type: 'POST',
		success:function(data){
			$("#nama_kec").html(data);
		}
	})
	
}

function simpanData(){
	var kecamatan = $("#nama_kec").val();
	var namaDesa = $("#nama_desa").val();
	var kepDesa = $("#nama_kepDesa").val();
	$.ajax({
		url: 'action/desa/simpan.php',
		type: 'POST',
		data: {
			kecamatan:kecamatan,
			namaDesa: namaDesa,
			kepDesa: kepDesa
		},
		success:function(data){
			viewData();
			resetForm();
		}
	});	
}
function editData(id){
	var idKec = $("#namaKec").val();
	var namaDesa = $("#namaDesa-"+id).val();
	var KepDesa = $("#kepDesa-"+id).val();
	$.ajax({
		url: 'action/desa/update.php',
		type: 'POST',
		data: {
			idKec: idKec,
			namaDesa: namaDesa,
			kepDesa: KepDesa,
			idDesa: id
		},
		success: function(data){
			viewData();
			
		}
	})	
}

function deleteData(id){
	$.ajax({
		url: 'action/desa/delete.php',
		type: 'POST',
		data: {idDesa: id},
		success:function(data){
			viewData();
		}
	});	
}

function viewData(page){
	$.ajax({
		url: 'action/desa/view.php',
		type: 'POST',
		data: {no_page: page},
		success: function(data){
			$(".table-tampil").html(data);
		}
	});
	
}

function cari(kata){
	$.ajax({
		url: 'action/desa/view.php',
		type: 'POST',
		data: {kata: kata},
		success: function(data){
			$(".table-tampil").html(data);
		}
	})
	
}

function resetForm(){
	$('type=text').val('');
}
