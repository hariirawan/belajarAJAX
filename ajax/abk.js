$(document).ready(function(){
	tampKecamatan();
	viewData();
	$("#priview").click(function(event) {
		/* Act on the event */
		window.location.href="page/priview.php";
	});
	$("#printOrEx").click(function(event) {
		/* Act on the event */
		window.location.href="action/print.php";
	});
	$("#simpan").click(function(event) {
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
		},function (dismiss) {
		  if (dismiss === 'cancel') {
		    swal(
		      'Cancelled',
		      'Your imaginary file is safe :)',
		      'error'
		    )
		   }
		});
	});
	$(document).on('click', '.btn-update', function(event) {
		event.preventDefault();
		var id = $(this).attr('id');
		$('.modal-backdrop').remove();
		swal({
		  title: 'Are you sure?',
		  text: "Anda ingin Update data ini !",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, Update it!'
		}).then(function () {
		  swal(
		    'success',
		    'Data berhasil diUpdate !',
		    'success'
		  )
			
			updateData(id);
			$("#edit-"+id).modal('hide');
			$('body').removeClass('modal-open');
		},function (dismiss) {
		  if (dismiss === 'cancel') {
		    swal(
		      'Cancelled',
		      'Your imaginary file is safe :)',
		      'error'
		    )
		    $("#edit-"+id).modal('hide');
		   }
		});
	});

	$(document).on('click', '.delete', function(event) {
		var id = $(this).attr('id');
		swal({
		  title: 'Are you sure?',
		  text: "Anda ingin Delete data ini !",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, Delete it!'
		}).then(function () {
		  swal(
		    'success',
		    'Data berhasil diDeslete!',
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
		});
	});
	$(document).on('keyup', '#cari', function(event) {
		var kata = $("#cari").val();
		cari(kata);
	});


	//Fungsi Untuk Menampilkan Alamat secara Otomatis 
	$(document).on('change', '#kec', function(event) {
		event.preventDefault();
		var kec = $("#kec").val();
		desa(kec);
	});
	$(document).on('change',"#kel", function(event){
		event.preventDefault();
		var desa = $("#kel").val();
		dusun(desa);
	});
	$(document).on('click', '.paging', function(event){
		event.preventDefault();
		var no = $(this).attr('id');;
		viewData(no);
	});
});

function tampKecamatan(){
	$.ajax({
		url: 'action/funcDataAbk.php',
		type: 'POST',
		success: function(data){
			$("#kec").html(data);
		}
	})
}
function desa(idKec){
	$.ajax({
		url: 'action/funcDataAbk.php?data=desa',
		type: 'POST',
		data: {idKec: idKec},
		success:function(data){
			$("#kel").html(data);
		}
	})
	
}
function dusun(idDesa){
	$.ajax({
		url: 'action/funcDataAbk.php?data=dusun',
		type: 'POST',
		data: {idDesa: idDesa},
		success:function(data){
			$("#dusun").html(data);
		}
	})
	
}

//fungsi CRUD (CREATE , READ, UPDATE, DELETE) 
function cari(kata){
	$.ajax({
		url: 'action/anakAbk/view.php',
		type: 'POST',
		data: {kata: kata},
		success:function(data){
			$('.table-tampil').html(data);
		}
	})
	
}

function viewData(page){
	$.ajax({
    type: 'POST',
    url: 'action/anakAbk/view.php',
    data: {no_page: page},
    success:function(data){
      $('.table-tampil').html(data);
    }
  });
}

function simpanData(){
	var formAbk = document.getElementById('formAbk');
	formData = new FormData(formAbk);
	$.ajax({
		url: 'action/anakAbk/simpan.php',
		dataType: 'text',
		cache: false,
		contentType: false,
		processData: false,
		data: formData,
		type: 'post',
		success: function(){
			viewData();
		}
	});
}

function updateData(id){
	var formAbk = document.getElementById('formAbk-'+id);
	formData = new FormData(formAbk);
	$.ajax({
		url: 'action/anakAbk/update.php?id='+id,
		dataType: 'text',
		cache: false,
		contentType: false,
		processData: false,
		data: formData,
		type: 'post',
		success: function(){
			viewData();
		}
	});
}
function deleteData(id){
	$.ajax({
		url: 'action/anakAbk/delete.php',
		type: 'POST',
		data: {idAbk: id},
		success: function(data){
			viewData();
		}
	})
	
}