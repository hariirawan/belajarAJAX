$(document).ready(function(event) {

	viewData();
	desa();

	$("#simpan").click(function(event) {
		/* Act on the event */
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
			$("#input").getElemenClass()
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();	
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
		  text: "Anda ingin update data ini !",
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
			$("#edit-"+id).getElemenClass()
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
		  text: "Anda ingin hapus data ini !",
		  type: 'info',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, Delete it!'
		}).then(function () {
		  swal(
		    'success',
		    'Data berhasil dihapus !',
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
		var kata = $("#cari").val();
		cari(kata);
	}); 
	$(document).on('click', '.paging', function(event){
		event.preventDefault();
		var no = $(this).attr('id');;
		viewData(no);
		
	});

});

function desa(){
	$.ajax({
		url: 'action/func_desa.php',
		type: 'POST',
		success:function(data){
			$("#Desa").html(data);
		}
	})
	
}

function simpanData(){
	var idDesa = $("#Desa").val();
	var namaDusun = $("#namaDusun").val();
	var kepDusun = $("#kepDusun").val();
	$.ajax({
		url: 'action/dusun/simpan.php',
		type: 'POST',
		data: {
			idDesa:idDesa,
			namaDusun: namaDusun,
			kepDusun: kepDusun
		},
		success:function(data){
			viewData();
		}
	});	
}
function editData(id){
	var idDesa = $("#namaDesa").val();
	var namaDusun = $("#namaDusun-"+id).val();
	var kepDusun = $("#kepDusun-"+id).val();
	$.ajax({
		url: 'action/dusun/update.php',
		type: 'POST',
		data: {
			idDesa: idDesa,
			namaDusun: namaDusun,
			kepDusun: kepDusun,
			idDusun: id
		},
		success:function(data){
			viewData();
		}
	});	
}

function deleteData(id){
	$.ajax({
		url: 'action/dusun/delete.php',
		type: 'POST',
		data: {idDusun: id},
		success:function(data){
			viewData();
		}
	});	
}

function viewData(page){
	$.ajax({
		url: 'action/dusun/view.php',
		type: 'POST',
		data: {no_page: page},
		success: function(data){
			$(".table-tampil").html(data);
		}
	});
	
}
function cari(kata){
	$.ajax({
		url: 'action/dusun/view.php',
		type: 'POST',
		data: {kata: kata},
		success: function(data){
			$(".table-tampil").html(data);
		}
	});
	
}