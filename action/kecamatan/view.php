<?php 
error_reporting(0);
include_once '../../database/db.php';
$batas = 7;
$page= isset($_POST["no_page"])? (int)$_POST["no_page"] : 1;
$start = ($page >1)?($page*$batas)-$batas : 0;
	$cari = $_POST["kata"];
	if ($cari != "") {
		$query =  $mysqli->query("SELECT * FROM kecamatan WHERE nama_kec LIKE '%$cari%' or nama_kepcamat LIKE '%$cari%' LIMIT $start, $batas");
	}else{
		$query =  $mysqli->query("SELECT * FROM kecamatan LIMIT $start, $batas");
	}
	?>
	<div class="panel-body">
	<div class="table table-responsive" style="margin-bottom: -20px;">
		<table class="table table-hover table-bordered">
			<?php
			
			if ($query->num_rows != 0) {
			?>
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Nama Kecamatan</th>
						<th>Nama Kepala Camat</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
			<?php
			$no=$start+1;
			while($data = $query->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data["nama_kec"]; ?></td>
					<td><?php echo $data["nama_kepcamat"]; ?></td>
					<td>
						<button class="btn btn-warning btn-sm " data-toggle="modal" data-target="#edit-<?php echo $data["id_kec"];?>">
							<i class="glyphicon glyphicon-edit"></i>&nbsp; Edit
						</button>
						<button class="btn btn-danger btn-sm delete" id="<?php echo $data["id_kec"];?>">
							<i class="glyphicon glyphicon-remove-circle"></i>&nbsp; Delete
						</button>

						<!--Modal -->
							<div class="modal fade " id="edit-<?php echo $data["id_kec"];?>"">
								<div class="modal-dialog modal-sm" role="document">
								    <div class="modal-content">
								    	<div class="modal-header">
								    		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								    		<h4 class="modal-title" >Input Data Kecamatan</h4>
								    	</div>
								    	<div class="modal-body">
								    		<div class="form-group form-group-sm">
								    			<label for="nama_kec">Nama Kecamatan</label>
								    			<input type="text" id="nama_kec-<?php echo $data["id_kec"];?>" class="form-control" value="<?php echo $data["nama_kec"]; ?>">
								    		</div>
								    		<div class="form-group form-group-sm">
								    			<label for="nama_kepCamat">Nama Kepala Camat</label>
								    			<input type="text" id="nama_kepCamat-<?php echo $data["id_kec"];?>" class="form-control" placeholder="Nama Kepala Camat" value="<?php echo $data["nama_kepcamat"]; ?>">
								    		</div>
								    	</div>
								    	<div class="modal-footer">
								    		<button class="btn btn-primary text-right update" id="<?php echo $data["id_kec"]; ?>">Update</button>
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
			?>
			</tbody>
			<?php 
			}else{
				echo '<div class="alert alert-danger text-center"><h3>Data Tidak Ditemukan</h3></div>';
			}
			?>

		</table>
		</div>
		</div>

		<?php 
		$sqli = $mysqli->query("SELECT * FROM kecamatan");
		$jumlah_query = $sqli->num_rows;
		$noPage = ceil($jumlah_query/$batas);
		$next= ($page < $noPage)? $page+1 : $page;
		$prev= ($page>1)?$page-1 : 1;
		 ?>
		<div class="panel-footer">
			<div class="row">
				<div class="col-sm-3">
					Jumlah Kecamatan : <span class="badge "> <?php echo $jumlah_query; ?> </span>
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
