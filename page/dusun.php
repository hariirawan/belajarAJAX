<?php 
error_reporting(0);
include_once 'database/db.php';
session_start();
if (!empty($_SESSION["id_user"])) {
	$cariNama = $mysqli->real_escape_string($_SESSION["id_user"]);
	$data= $mysqli->query("SELECT * FROM pengguna WHERE id_user='".$cariNama."'");
	$tampData = $data->fetch_assoc();
	if ($tampData["status"]==1) {
?>
<h2 class="page-header"><i class="fa fa-archive">&nbsp;</i>Page Dusun</h2>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-2">
				<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#input">
					<i class="glyphicon glyphicon-plus-sign">&nbsp;</i>Tambah Data
				</button>
			</div>
			<div class="col-sm-7">
				
			</div>
			<div class="col-sm-3">
			  	<div class="input-group search">
				    <input type="text" placeholder="Search For.." class="form-control" id="cari">
					<span class="input-group-btn">
						<input class="btn btn-warning" type="reset">Reset !</input>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="table-tampil">

	</div>
</div>
<!--Modal -->
				<div class="modal fade" id="input">
					<div class="modal-dialog modal-sm" role="document">
					    <div class="modal-content">
					    	<div class="modal-header">
					    		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					    		<h4 class="modal-title" id="myModalLabel">Input Data Dusun</h4>
					    	</div>
					    	<div class="modal-body">
					    		<div class="form-group form-group-sm">
					    			<label for="Desa">Nama Desa/Kelurahan</label>
					    			<select id="Desa" class="form-control" >
			
					    			</select>
					    		</div>
					    		<div class="form-group form-group-sm">
					    			<label for="namaDusun">Nama Dusun</label>
					    			<input type="text" id="namaDusun" class="form-control" placeholder="Nama Dusun">
					    		</div>
					    		<div class="form-group form-group-sm">
					    			<label for="kepDusun">Nama Kepala Dusun</label>
					    			<input type="text" id="kepDusun" class="form-control" placeholder="Nama Kepala Dusun">
					    		</div>
					    	</div>
					    	<div class="modal-footer">
					    		<button class="btn btn-primary text-right" id="simpan">Simpan</button>
					    		<button class="btn btn-danger text-right" id="close" data-dismiss="modal">Close</button>
					    	</div>	
					    </div>
				  	</div>
				</div>
		<!--Modal -->
<?php 
	}else{
		echo '<div class="alert alert-danger text-center" role="alert" style="margin-top:60px;"><h1>Stop !!!</h1><h3>Maaf Halaman Ini hanya bisa diakses oleh Administrator Saja</h3><button class="btn btn-warning" id="back">Back</button></div>';
	}
}else{
		echo '<div class="alert alert-danger" role="alert">404 NOT FOUND</div>';
	} ?>
<script src="ajax/dusun.js"></script>