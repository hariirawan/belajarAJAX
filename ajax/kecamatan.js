$(document).ready(function(event) {
	/* Act on the event */
	viewData();

	$("#simpan").click(function(event) {
		/* Act on the event */
		event.preventDefault();		
		$("#input").modal('hide');
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
		event.preventDefault();
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
			$("#edit-"+id).modal('hide');
			$("#edit-"+id).getElemenClass('remove');
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
		event.preventDefault();
		var id = $(this).attr('id');
		swal({
		  title: 'Are you sure?',
		  text: "Anda ingin simpan data ini !",
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
		var kata = $(this).val();
		cari(kata);

	});

	$(document).on('click', '.paging', function(event){
		event.preventDefault();
		var no = $(this).attr('id');;
		viewData(no);
		
	});
});


function simpanData(){
	var nama_kec = $("#nama_kec").val();
	var kepCamat = $("#nama_kepCamat").val();
	$.ajax({
		url: 'action/kecamatan/simpan.php',
		type: 'POST',
		data: {
			nama_kec: nama_kec,
			kepCamat: kepCamat
		},
		success:function(data){
			viewData();			
			resetForm();
		}
	});	
}

function editData(id){
	var nama_kec = $("#nama_kec-"+id).val();
	var kepCamat = $("#nama_kepCamat-"+id).val();
	$.ajax({
		url: 'action/kecamatan/update.php',
		type: 'POST',
		data: {
			nama_kec: nama_kec,
			kepCamat: kepCamat,
			id_kec: id
		},
		success: function(data){
			viewData();
		}
	});
	
}

function deleteData(id){
	$.ajax({
		url: 'action/kecamatan/delete.php',
		type: 'POST',
		data: {idKec: id},
		success:function(data){
			viewData();
		}
	});	
}
function viewData(page){
	$.ajax({
		url: 'action/kecamatan/view.php',
		type: 'POST',
		data: {no_page: page},
		success: function(data){
			$(".table-tampil").html(data);
		}
	});
	
}

function cari(kata){
	$.ajax({
		url: 'action/kecamatan/view.php',
		type: 'POST',
		data: {kata: kata},
		success: function(data){
			$(".table-tampil").html(data);
		}
	});
}

function resetForm(){
	$('[type=text]').val('');
} 