<?php 
error_reporting(0);
include_once '../../database/db.php';
$batas = 3;
$page= isset($_POST["page"])? (int)$_POST["page"] : 1;
$start = ($page >1)?($page*$batas)-$batas : 0;
$kata=$_POST["kata"];
if ($kata != "") {
	$query =  $mysqli->query("SELECT * FROM pengguna WHERE nama_lengkap LIKE '%$kata%' OR username LIKE '%$kata%' limit $start, $batas");
}else{
	$query =  $mysqli->query("SELECT * FROM pengguna ORDER BY status LIMIT $start, $batas ");
}
$i=$start+1;
?>
<div class="panel-body">
<div class="table table-responsive"  style="margin-bottom: -20px;">
	<table class="table table-hover table-bordered">
	<thead class="text-center">
		<tr>
			<th>No</th>
			<th>Foto</th>
			<th>Nama Lengkap</th>
			<th>Username</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
			
		while($data = $query->fetch_assoc()) {
			if ($data["status"]== 1) {
				$status ="Administrator";
			}else{
				$status ="User";
			}
			?>
		<tr>
			<td class="text-center"><?php echo $i; ?></td>
			<td class="text-center"><img src="action/user/gambar/<?php echo $data["foto"]; ?>" class="img img-thumbnail" style="width: 100px; height: 100px;"></td>
			<td><?php echo $data["nama_lengkap"]; ?></td>
			<td><?php echo $data["username"]; ?></td>
			<td><?php echo $status; ?></td>
			
			<td>
				<button class="btn btn-warning btn-sm " data-toggle="modal" data-target="#edit-<?php echo $data["id_user"];?>">
					<i class="glyphicon glyphicon-edit"></i>&nbsp; Edit
				</button>
				<button class="btn btn-danger btn-sm delete" id="<?php echo $data["id_user"] ?>">
					<i class="glyphicon glyphicon-remove-circle"></i>&nbsp; Delete
				</button>

				<!--Modal -->
					<div class="modal fade" id="edit-<?php echo $data["id_user"];?>">
						<div class="modal-dialog " role="document">
						    <div class="modal-content">
						    	<div class="modal-header">
						    		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						    		<h4 class="modal-title" >Edit Data User</h4>
						    	</div>
						    	<form id="formEdit-<?php echo $data["id_user"];?>" >
						    	<div class="modal-body">
						    		<div class="form-group ">
						    			<label for="status">Status Pengguna</label>
						    			<select name="status" class="form-control">
						    				<option value="">-- Chose Category --</option>
						    				<?php 
						    					if ($data["status"]==1) {
						    						?>
													<option value="1" selected="selected">Administrator</option>
						    						<option value="2">Pegawai</option>
						    						<?php
						    					}else if ($data["status"]==2) {
						    						?>
													<option value="1" >Administrator</option>
						    						<option value="2" selected="selected">Pegawai</option>
						    						<?php
						    					}else{
						    						?>
													<option value="1">Administrator</option>
						    						<option value="2">Pegawai</option>
						    						<?php
						    					}
						    				 ?>
						    			</select>
						    		</div>
						    		<div class="form-group ">
						    			<label for="namaLengkap">Nama Lengkap</label>
						    			<input type="text" name="nama" class="form-control" value="<?php echo $data["nama_lengkap"]; ?>">
						    		</div>
						    		<div class="form-group ">
						    			<label for="username">Username</label>
						    			<input type="text" name="user" class="form-control" value="<?php echo $data["username"]; ?>">
						    		</div>
						    		<div class="form-group ">
						    			<label for="password">Password Lama</label>
						    			<input type="password" name="pass" class="form-control" value="<?php echo $data["password"]; ?> " disabled="disabled">
						    		</div>
						    		<div class="form-group ">
						    			<label for="password">Password Baru</label>
						    			<input type="password" name="passBaru" class="form-control" placeholder="Password Baru ...">
						    		</div>
						    		<div class="form-group ">
						    			<input type="file" name="gambar" class="form-control">
						    		</div>
						    	</div>
					    		</form>
						    	<div class="modal-footer">
						    		<button class="btn btn-primary text-right update" id="<?php echo $data["id_user"]; ?>">Update</button>
						    		<button class="btn btn-danger text-right" id="close">Close</button>
						    	</div>	
						    </div>
					  	</div>
					</div>
			<!--Modal -->
			</td>
		</tr>
		<?php 
		$i++;
		}
	?>
	</tbody>
	</table>
</div>
</div>
<?php 
$sqli = $mysqli->query("SELECT * FROM pengguna");
$jumlah_query = $sqli->num_rows;
$noPage = ceil($jumlah_query/$batas);
$next= ($page < $noPage)? $page+1 : $page;
$prev= ($page>1)?$page-1 : 1;
 ?>
<div class="panel-footer">
	<div class="row">
		<div class="col-sm-3">
			Jumlah Pengguna : <span class="badge "> <?php echo $jumlah_query; ?> </span>
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