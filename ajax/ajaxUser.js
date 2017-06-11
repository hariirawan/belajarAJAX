$(document).ready(function() {
	viewData();
	$("#simpan").on('click', function(event) {
		/* Act on the event */
		event.preventDefault();
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
		});
	});
	$(document).on('click','.update',function(event){
			/* Act on the event */
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
	$(document).on('click','.delete',function(event){
			/* Act on the event */
		event.preventDefault();
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
	$(document).on('click', '.paging', function(event){
		event.preventDefault();
		var no = $(this).attr('id');
		viewData(no);
		
	});
	$(document).on('keyup', '#cari', function(event) {
		event.preventDefault();
		var kata = $("#cari").val();
		cari(kata);

	});
	
});

function viewData(page){
	$.ajax({
		url: 'action/user/view.php',
		type: 'POST',
		data: {page: page},
		success:function(data){
			$(".table-tampil").html(data);
		}
	});
	
}

function deleteData(id){
	$.ajax({
		url: 'action/user/delete.php?id='+id,
		type: 'GET',
		success:function(){
			viewData();
		}
	});
}

function updateData(id){
	var formEdit = document.getElementById('formEdit-'+id);
	formUpdate = new FormData(formEdit);
	$.ajax({
		url: 'action/user/update.php?edit='+id,
		dataType: 'text',
		cache: false,
		contentType: false,
		processData: false,
		data: formUpdate,
		type: 'post',
		success:function(){
			console.log("success");
		}
	});
	
}
function cari(kata){
	$.ajax({
		url: 'action/user/view.php',
		type: 'POST',
		data: {kata: kata},
		success: function(data){
			$(".table-tampil").html(data);
		}
	})
	
}

function simpanData(){
	var formUser = document.getElementById('formUser');
	formData = new FormData(formUser);
	$.ajax({
		url: 'action/user/simpan.php',
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