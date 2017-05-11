<?php 
require_once '../database/db.php';
$page = isset($_GET["page"])?$_GET['page'] : '';
if ($page == 'add') {
	$nama = $_POST["nama"];
	$email = $_POST["email"];
	$kategori = $_POST["kategori"];
	$pesan = $_POST["pesan"];

	$sqli = $mysqli->prepare("INSERT INTO tbl_pesan(nama,email,kategori,pesan) VALUES (?, ?, ?, ?)");
	$sqli->bind_param('ssss',$nama,$email,$kategori,$pesan);
	$sqli->execute();

/*
=============
fungsi edit
============
*/
}else if ($page=="edit") {
	$id = $_POST["id"];
	$nama = $_POST["nama"];
	$email = $_POST["email"];
	$kategori = $_POST["kategori"];
	$pesan = $_POST["pesan"];
	$sqli = $mysqli->prepare("UPDATE tbl_pesan set nama=?,email=?,kategori=?, pesan=? WHERE id_pesan=?");
	$sqli->bind_param('ssssd',$nama,$email,$kategori,$pesan,$id);
	$sqli->execute();
	$mysqli->close();
}else if ($page=="del") {
	$id = $_POST["id"];
	$sqli = $mysqli->prepare("DELETE FROM tbl_pesan WHERE id_pesan = ?");
	$sqli->bind_param('d',$id);
	$sqli->execute();
	$mysqli->close();
}else{

	$x=10;
	$paging = '';
	if (isset($_POST["paging"])) {
		$paging = $_POST["paging"];
	}else{
		$paging =1;
	}
	$start = ($paging-1)*$x;
	if ($page=="cari") {
		$cari = $_POST["cari"];
		if ($cari != "") {
			$sqli = $mysqli->query("SELECT * FROM tbl_pesan where nama like '%$cari%' or email like '%$cari%' or kategori like '%$cari%'");
		}else{
			$sqli = $mysqli->query('SELECT * FROM tbl_pesan ');
		}
	}else{
		$sqli = $mysqli->query("SELECT * FROM tbl_pesan ORDER by id_pesan LIMIT $start,$x");
	}
	if ($sqli->num_rows !=0) {
		?>
		<table class="table table-bordered table-striped">
			<thead class="text-center">
				<tr >
					<th style="width: 20px;">No</th>
					<th>Nama </th>
					<th>Email</th>
					<th>Kategori</th>
					<th>Pesan</th>
					<th style="width: 160px;">Aktion</th>
				</tr>
			</thead>
			<tbody>
		<?php
		$i=1;
		while ($data = $sqli->fetch_assoc()) {
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $data["nama"]; ?></td>
			<td><?php echo $data["email"]; ?></td>
			<td><?php echo $data["kategori"]; ?></td>
			<td><?php echo $data["pesan"]; ?></td>
			<td>
				<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-<?php echo $data["id_pesan"]; ?>">Edit</button>
				<button class="btn btn-danger btn-sm " onclick="deleteData(<?php echo $data["id_pesan"]; ?>)">Delete</button>

				<!--Modal Edit -->

				<div class="modal fade" id="edit-<?php echo $data["id_pesan"]; ?>" tabindex="-1" role="dialog">
					<div class="modal-dialog modal-md" role="document">
					    <div class="modal-content">
					    	<div class="modal-header">
					    		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					    		<h4 class="modal-title" ">Input Pesan</h4>
					    	</div>
							
					    	<form>
					    	<div class="modal-body">
					    	<input type="hidden" id="<?php echo $data["id_pesan"]; ?>" value="<?php echo $data["id_pesan"]; ?>" >
						    		<div class="form-group">
						    			<label for="nama">Nama Lengkap</label>
						    			<input type="text" id="nama-<?php echo $data["id_pesan"]; ?>" value="<?php echo $data["nama"]; ?>" class="form-control">
						    		</div>
						    		<div class="form-group">
						    			<label for="email">Email Anda</label>
						    			<input type="text" id="email-<?php echo $data["id_pesan"]; ?>" class="form-control" value="<?php echo $data["email"]; ?>">
						    		</div>
						    		<div class="form-group">
						    			<label for="kategori">Kategori</label>
						    			<select  id="kategori-<?php echo $data["id_pesan"]; ?>" class="form-control">
						    				<option value="">-- Choose Category --</option>
						    				<?php 
						    					$kat = $data["kategori"]; 
						    					if ($kat == 'Web Developer') {
						    						?>
														<option value="Web Developer" selected="selected">Web Developer</option>
						    							<option value="Desain Grafis">Desain Grafis</option>
						    						<?php 
						    					}else if ($kat == 'Desain Grafis') {
						    						?>
														<option value="Web Developer" >Web Developer</option>
						    							<option value="Desain Grafis" selected="selected">Desain Grafis</option>
						    						<?php 
						    					}else{
						    						?>
														<option value="Web Developer" >Web Developer</option>
						    							<option value="Desain Grafis" >Desain Grafis</option>
						    						<?php 
						    					}
						    				 ?>
						    			</select>
						    		</div>
						    		<div class="form-group">
						    			<label for="pesan">pesan</label>
						    			<textarea  id="pesan-<?php echo $data["id_pesan"]; ?>" cols="30" rows="10" class="form-control"><?php echo $data["pesan"]; ?></textarea>
						    		</div>
					    	</div>
					    	<div class="modal-footer">
					    		<button class="btn btn-primary text-right" onclick="updateData(<?php echo $data["id_pesan"]?>)">Update</button>
					    	</div>
								</form>		

					    </div>
				  	</div>
				</div>

				<!--Modal Edit -->
			</td>
		</tr>
		<?php
		$i++;

		}
	  $sqli = $mysqli->query("SELECT * FROM tbl_pesan");
	  $jumlah_query = $sqli->num_rows;
	  $no_page = ceil($jumlah_query/$x);
	  $no=1;
		?>
			</tbody>
		</table>
		<nav class="style-page text-right">
		  <ul class="pagination ">
		    <li>
		    	<span class="paging" aria-label="Previous" id="<?php echo $no; ?>">&laquo;</span>
		    </li>
		  
		  <?php 
		    
	    	while( $no<=$no_page){
	    		?>
				    <li><span class="paging" id="<?php echo $no; ?>"><?php echo $no; ?></span></li>
	    		<?php
	    		$no++;
	    	}
		 ?>
	    <li>
	      <a href="#" aria-label="Next">
	        <span aria-hidden="true">&raquo;</span>
	      </a>
	    </li>
	  </ul>
	</nav>

<?php
	}else{
		?>
		<div class="alert alert-info text-center" role="alert">
  			<h3>Data yang anda cari tidak ditemukan </h3>
			<button class="btn btn-warning btn-sm" id="back">Kembali kehalaman awal</button>
		</div>
		<?php 
	} 
}
?>
