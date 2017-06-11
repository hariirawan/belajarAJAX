<option value="">Pilih Kecamatan</option>
<?php
require_once '../database/db.php';
	$Kecamatan= $mysqli->query("SELECT * FROM kecamatan");
	while ($data_kecamatan = $Kecamatan->fetch_array()) {
		echo '<option value="'.$data_kecamatan['id_kec'].'">'.$data_kecamatan['nama_kec'].'</option>';
	}
?>