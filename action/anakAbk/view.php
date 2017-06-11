<?php 
error_reporting(0);
require_once '../../database/db.php';

$batas = 7;
$page= isset($_POST["no_page"])? (int)$_POST["no_page"] : 1;
$start = ($page >1)?($page*$batas)-$batas : 0;
$kata = $_POST["kata"];
if ($kata != "") {
	$kec = $mysqli->query("SELECT * FROM kecamatan WHERE nama_kec = '".$kata."'");
	$data= $kec->fetch_assoc();
	$dataC= $kec->num_rows;
	$kataKec= $data["id_kec"];
	if ($dataC !=0) {
		$sqli = $mysqli->query("SELECT * FROM tabel_abk WHERE nama_anak LIKE '%$kata%' or alamat LIKE '%$kataKe%' limit $start, $batas");
	}else{
		$sqli = $mysqli->query("SELECT * FROM tabel_abk WHERE nama_anak LIKE '%$kata%' limit $start, $batas");
	}
}else{
	$sqli = $mysqli->query("SELECT * FROM tabel_abk limit $start, $batas");
}
?>
<div class="panel-body">
<div class="table-responsive" style="margin-bottom: -20px;">
	<table class="table table-bordered" >
	<?php 
	if ($sqli->num_rows != 0) {
	$no=$start+1;
	 ?>
		<thead class="text-center">
			<tr >
				<th style="width: 20px;">No</th>
				<th>Nama Anak </th>
				<th>Umur</th>
				<th>Nama Ortu</th>
				<th>Pekerjaan</th>
				<th>Dusun</th>
				<th>Nama Kadus</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
	<?php
	$i=1;
		while ($data = $sqli->fetch_assoc()) {
			$dusun = $mysqli->query("SELECT * FROM dusun WHERE id_dusun='".$data["id_dusun"]."'");
			$dataDn= $dusun->fetch_assoc();
			#$desa = $mysqli->query("SELECT * FROM desa WHERE id_desa='".$angkaA[1]."'");
			#$dataD= $desa->fetch_assoc();

		?>
		<tr>
			<td class="text-center"><?php echo $i; ?></td>
			<td><?php echo $data["nama_anak"]; ?></td>
			<td><?php echo $data["umur"]; ?></td>
			<td><?php echo $data["nama_ortu"]; ?></td>
			<td><?php echo $data["pekerjaan"]; ?></td>
			<td><?php echo $dataDn["nama_dusun"]; ?></td>
			<td><?php echo $dataDn["nama_kadus"]; ?></td>
			<td>
				<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-<?php echo $data["id"]; ?>" ><i class="glyphicon glyphicon-edit"></i></button>
				<button class="btn btn-danger btn-sm delete" id="<?php echo $data["id"]; ?>"><i class="glyphicon glyphicon-remove-circle"></i></button>

				<!--Modal Edit -->

				<div class="modal fade" id="edit-<?php echo $data["id"]; ?>">
					<div class="modal-dialog modal-md" role="document">
					    <div class="modal-content">
					    	<div class="modal-header">
					    		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					    		<h4 class="modal-title" ">Input Data</h4>
					    	</div>
				    		<div class="modal-body" style="overflow-y: scroll;  max-height: 500px; ">
				    			<form class="form-horizontal" id="formAbk-<?php echo $data["id"];?>">
				    				<div class="panel panel-default">
							    		<div class="panel-heading">
										    <h3 class="panel-title">Biodata Anak</h3>
										</div>
										<div class="panel-body" >
										  <div class="form-group form-group-sm">
										    <label class="col-sm-3 control-label" for="namaAnak">Nama Lengkap Anak</label>
										    <div class="col-sm-9">
										      <input class="form-control" type="text" id="namaAnak" name="namaAnak" placeholder="Nama Lengkap Anak" value="<?php echo $data["nama_anak"]; ?>">
										    </div>
										  </div>
										  <div class="form-group form-group-sm">
										    <label class="col-sm-3 control-label" for="jkEdit">Jenis Kelamin</label>
										    <div class="col-sm-9">
										      <select id="jkEdit" name="jk" class="form-control">
										      	<option >-- Jenis Kelamin --</option>
										      	<?php 
										      		if ($data["jk"]=="L") {
										      			echo '
															<option value="L" selected="selected">Laki-Laki</option>
										      				<option value="P">Perempuan</option>
										      			';
										      		}else if($data["jk"]=="P"){
										      			echo '
															<option value="L">Laki-Laki</option>
										      				<option value="P" selected="selected">Perempuan</option>
										      			';
										      		}else{
										      			echo '
															<option value="L">Laki-Laki</option>
										      				<option value="P">Perempuan</option>
										      			';
										      		}

										      	 ?>
										      	
										      </select>
										    </div>
										  </div>
										  <div class="form-group form-group-sm">
										    <label class="col-sm-3 control-label" for="umur">Umur</label>
										    <div class="col-sm-9">
										      <input class="form-control" type="text" id="umur" name="umur" placeholder="Umur Anak" value="<?php echo $data["umur"];?>">
										    </div>
										  </div>
										  <div class="form-group form-group-sm">
										    <label class="col-sm-3 control-label" for="nama_ortu">Nama Ortu</label>
										    <div class="col-sm-9">
										      <input class="form-control" type="text" id="namaOrtu" name="namaOrtu" placeholder="Nama Orang Tua" value="<?php echo $data["nama_ortu"];?>">
										    </div>
										  </div>
										  <div class="form-group form-group-sm">
										    <label class="col-sm-3 control-label" for="pekerjaan">Pekerjaan</label>
										    <div class="col-sm-9">
										      <input class="form-control" type="text" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="<?php echo $data["pekerjaan"];?>">
										    </div>
										  </div>
										  <div class="form-group form-group-sm">
										    	<label class="col-sm-3 control-label" for="editDusun">Alamat Desa</label>
											    <div class="col-sm-9">
											     <select class="form-control" id="editKel" name="desa">
											      	<option value="">Pilih Desa</option>
											      	<?php 
														$desa= $mysqli->query("SELECT * FROM desa WHERE id_desa='".$data["id_desa"]."'");
														while ($datadesa = $desa->fetch_array()) {
															if ($data["id_desa"]==$datadesa["id_desa"]) {
																echo '<option value="'.$datadesa["id_desa"].'" selected="selected">'.$datadesa['nama_desa'].'</option>';
															}else{
																echo '<option value="'.$datadesa['id_desa'].'" >'.$datadesa['nama_desa'].'</option>';
															}
															
														}
											      	 ?>
											      </select>
											    </div>
										  	</div>
										    <div class="form-group form-group-sm">
										    	<label class="col-sm-3 control-label" for="editDusun">Alamat Dusun</label>
											    <div class="col-sm-9">
											     <select class="form-control" id="editDusun" name="dusun">
											      	<option value="">Pilih Dusun</option>
											      	<?php 
														$dusun= $mysqli->query("SELECT * FROM dusun WHERE id_dusun='".$data["id_dusun"]."'");
														while ($dataDusun = $dusun->fetch_array()) {
															if ($data["id_dusun"]==$dataDusun["id_dusun"]) {
																echo '<option value="'.$dataDusun["id_dusun"].'" selected="selected">'.$dataDusun['nama_dusun'].'</option>';
															}else{
																echo '<option value="'.$dataDusun['id_dusun'].'" >'.$dataDusun['nama_dusun'].'</option>';
															}
															
														}
											      	 ?>
											      </select>
											    </div>
										  	</div>
												  	
				    						<div class="panel panel-default ">
									  		<div class="panel-heading ">
									  			<h3 class="panel-title">
									  				Kebutuhan Khusus yang dialami anak
									  			</h3>
									  		</div>
								  			<div class="panel-body">
								  				<div class="col-sm-2 col-sm-offset-1">
								  					<div class="checkbox">
													  <label>
													  	<?php 
													  		if ($data["APS"]==1) {
													  			echo '<input type="checkbox" checked="checked" name="APS" value="1"> APS';
													  		}else{
													  			echo '<input type="checkbox" name="APS" value="1"> APS';
													  		}
													  	 ?>													    
													  </label>
													</div>
													<div class="checkbox">
													  <label>
													  <?php 
													  		if ($data["ABA"]==1) {
													  			echo '<input type="checkbox" checked="checked" name="ABA" value="1"> ABA';
													  		}else{
													  			echo '<input type="checkbox" name="ABA" value="1"> ABA';
													  		}
													  ?>													    
													  </label>
													</div>
								  				</div>
								  				<div class="col-sm-2">
													<div class="checkbox">
													  <label>
													   <?php 
													  		if ($data["BGM"]==1) {
													  			echo '<input type="checkbox" checked="checked" name="BGM" value="1"> BGM';
													  		}else{
													  			echo '<input type="checkbox" name="BGM" value="1"> BGM';
													  		}
													  ?>	
													    
													  </label>
													</div>
								  					<div class="checkbox">
													  <label>
													   <?php 
													  		if ($data["HIV"]==1) {
													  			echo '<input type="checkbox" checked="checked" name="HIV" value="1"> HIV';
													  		}else{
													  			echo '<input type="checkbox" name="HIV" value="1"> HIV';
													  		}
													  ?>	
													    
													  </label>
													</div>
								  				</div>
								  				<div class="col-sm-2">
													<div class="checkbox">
													  <label>
													   <?php 
													  		if ($data["ABM"]==1) {
													  			echo '<input type="checkbox" checked="checked" name="ABM" value="1"> ABM';
													  		}else{
													  			echo '<input type="checkbox" name="ABM" value="1"> ABM';
													  		}
													  ?>	
													    
													  </label>
													</div>
													<div class="checkbox">
													  <label>
													   <?php 
													  		if ($data["APC"]==1) {
													  			echo '<input type="checkbox" checked="checked" name="APC" value="1"> APC';
													  		}else{
													  			echo '<input type="checkbox" name="APC" value="1"> APC';
													  		}
													  ?>	
													    
													  </label>
													</div>
								  					
								  				</div>
								  				<div class="col-sm-2">
								  					<div class="checkbox">
													  <label>
													   <?php 
													  		if ($data["AYP"]==1) {
													  			echo ' <input type="checkbox" checked="checked" name="AYP" value="1"> AYP';
													  		}else{
													  			echo '<input type="checkbox" name="AYP" value="1"> AYP';
													  		}
													  ?>	
													   
													  </label>
													</div>
													<div class="checkbox">
													  <label>
													   <?php 
													  		if ($data["ATA"]==1) {
													  			echo '<input type="checkbox" checked="checked" name="ATA" value="1"> ATA';
													  		}else{
													  			echo '<input type="checkbox" name="ATA" value="1"> ATA';
													  		}
													  ?>	
													    
													  </label>
													</div>
								  				</div>
								  				<div class="col-sm-2">
													<div class="checkbox">
													  <label>
													   <?php 
													  		if ($data["ATD"]==1) {
													  			echo '<input type="checkbox" checked="checked" name="ATD" value="1"> ATD';
													  		}else{
													  			echo '<input type="checkbox"  name="ATD" value="1"> ATD';
													  		}
													  ?>														    
													  </label>
													</div>
													<div class="checkbox">
													  <label>
													   <?php 
													  		if ($data["ADL"]==1) {
													  			echo '<input type="checkbox" checked="checked" name="ADL" value="1"> ADL';
													  		}else{
													  			echo '<input type="checkbox" name="ADL" value="1"> ADL';
													  		}
													  ?>	
													    
													  </label>
													</div>
								  				</div>
								  			</div>
									  	</div>
										</div>
									</div>
						    	</form>
			    			</div>
					    	<div class="modal-footer">
					    		<button class="btn btn-primary text-right btn-update" id="<?php echo $data["id"]?>">Update</button>
							    <button class="btn btn-danger text-right" id="close" data-dismiss="modal">Close</button>

					    	</div>
					    </div>
				  	</div>
				</div>

				<!--Modal Edit -->
			</td>
		</tr>
		<?php
		$i++;
		}
	}else{
		echo '<div class="alert alert-danger text-center" role="alert">Data yang anda cari tidak ditemukan</div>';
	}
	 ?>
	 	</tbody>
	</table>
</div>
</div>
<?php 
$sqli = $mysqli->query("SELECT * FROM tabel_abk");
$jumlah_query = $sqli->num_rows;
$noPage = ceil($jumlah_query/$batas);
$next= ($page < $noPage)? $page+1 : $page;
$prev= ($page>1)?$page-1 : 1;
 ?>
<div class="panel-footer">
	<div class="row">
		<div class="col-sm-3">
			Jumlah Anak BK : <span class="badge "> <?php echo $jumlah_query; ?> </span>
		</div>
		<div class="col-sm-3">
			Pages : <span class="badge "> <?php echo $page; ?> </span>
		</div>
		<div class="col-sm-6">

			<nav class="text-right">
			  <ul class="pagination pagination-sm" style="margin-top: -10px; margin-bottom:-10px;">
			  	<li>
			    	<a href="" class="paging" aria-label="Previous" id="<?php echo $prev; ?>">Prev</a>
			    </li>
			  <?php 
			  for ($i=1; $i <= $noPage ; $i++) { 
			  	?>
			  	<li>
			    	<a href="" class="paging" aria-label="Previous" id="<?php echo $i; ?>"><?php echo $i; ?></a>
			    </li>
			    <?php
			  }
			  ?>
			    <li>
			    	<a href="" class="paging" aria-label="Previous" id="<?php echo $next; ?>">Next</a>
			    </li>
			  </ul>
			</nav>
		</div>
	</div>
</div>
</div>