<?php 
error_reporting(0);
include_once '../../database/db.php';
$query = $mysqli->query("SELECT * FROM dusun");

$batas = 7;
$page= isset($_POST["no_page"])? (int)$_POST["no_page"] : 1;
$start = ($page >1)?($page*$batas)-$batas : 0;
$kata=$_POST["kata"];
$kata= $_POST["kata"];
if ($kata != "") {
$query =  $mysqli->query("SELECT * FROM dusun WHERE nama_dusun LIKE '%$kata%' or nama_kadus LIKE '%$kata%' limit $start, $batas");
}else{
$query =  $mysqli->query("SELECT * FROM dusun limit $start, $batas");
}
?>
<div class="panel-body">
<div class="table-responsive"  style="margin-bottom: -20px;">
	<table class="table table-hover table-bordered" >
	<?php 
	if ($query->num_rows != 0) {
	$no=$start+1;
	 ?>
		<thead class="text-center">
			<tr>
				<th>No</th>
				<th>Kecamatan</th>
				<th>Nama Desa/Kelurahan</th>
				<th>Nama Dusun</th>
				<th>Nama Kadus</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while($data = $query->fetch_assoc()) {
			$desa = $mysqli->query("SELECT * FROM desa WHERE id_desa ='".$data["id_desa"]."'");
			$dataDesa= $desa->fetch_assoc();
			$kec = $mysqli->query("SELECT * FROM kecamatan WHERE id_kec ='".$dataDesa["id_kec"]."'");
			$dataKec= $kec->fetch_assoc();
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $dataKec["nama_kec"]; ?></td>
				<td><?php echo $dataDesa["nama_desa"]; ?></td>
				<td><?php echo $data["nama_dusun"]; ?></td>
				<td><?php echo $data["nama_kadus"]; ?></td>
				<td>
					<button class="btn btn-warning btn-sm " data-toggle="modal" data-target="#edit-<?php echo $data["id_dusun"];?>">
						<i class="glyphicon glyphicon-edit"></i>&nbsp; Edit
					</button>
					<button class="btn btn-danger btn-sm delete" id="<?php echo $data["id_dusun"] ?>">
						<i class="glyphicon glyphicon-remove-circle"></i>&nbsp; Delete
					</button>

					<!--Modal -->
						<div class="modal fade" id="edit-<?php echo $data["id_dusun"];?>">
							<div class="modal-dialog modal-sm" role="document">
							    <div class="modal-content">
							    	<div class="modal-header">
							    		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							    		<h4 class="modal-title" >Input Data Dusun</h4>
							    	</div>
							    	<div class="modal-body">
								    	<div class="form-group form-group-sm">
							    			<label for="namaDesa">Nama Desa</label>
							    			<select id="namaDesa" class="form-control" >
							    			<option value="" >Pilih Desa</option>
												<?php 
												$desa= $mysqli->query("SELECT * FROM desa ");
												while ($dataDesa = $desa->fetch_array()) {
													if ($data["id_desa"]==$dataDesa["id_desa"]) {
														echo '<option value="'.$dataDesa["id_desa"].'" selected="selected">'.$dataDesa['nama_desa'].'</option>';
													}else{
														echo '<option value="'.$dataDesa["id_desa"].'" >'.$dataDesa['nama_desa'].'</option>';
													}
													
												}
									      	 ?>
							    			</select>
							    		</div>
							    		<div class="form-group form-group-sm">
							    			<label for="namaDusun">Nama Dusun</label>
							    			<input type="text" id="namaDusun-<?php echo $data["id_dusun"];?>" class="form-control" value="<?php echo $data["nama_dusun"]; ?>">
							    		</div>
							    		<div class="form-group form-group-sm">
							    			<label for="KepDusun">Nama Kepala Desa</label>
							    			<input type="text" id="kepDusun-<?php echo $data["id_dusun"];?>" class="form-control" placeholder="Nama Kepala Dusun" value="<?php echo $data["nama_kadus"]; ?>">
							    		</div>
							    	</div>
							    	<div class="modal-footer">
							    		<button class="btn btn-primary text-right update" id="<?php echo $data["id_dusun"]; ?>">Update</button>
							    		<button class="btn btn-danger text-right" id="close" data-dismiss="modal">Close</button>
							    	</div>	
							    </div>
						  	</div>
						</div>
				<!--Modal -->
				</td>
			</tr>
			<?php 
			$no++;
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
$sqli = $mysqli->query("SELECT * FROM dusun");
$jumlah_query = $sqli->num_rows;
$noPage = ceil($jumlah_query/$batas);
$next= ($page < $noPage)? $page+1 : $page;
$prev= ($page>1)?$page-1 : 1;
 ?>
<div class="panel-footer">
	<div class="row">
		<div class="col-sm-2">
			Jumlah Dusun : <span class="badge "> <?php echo $jumlah_query; ?> </span>
		</div>
		<div class="col-sm-2">
			Pages : <span class="badge "> <?php echo $page; ?> </span>
		</div>
		<div class="col-sm-8">

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
