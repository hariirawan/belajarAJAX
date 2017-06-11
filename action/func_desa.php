<option value="">Pilih Desa/Kelurahan</option>
<?php
require_once '../database/db.php';
	$desa= $mysqli->query("SELECT * FROM desa");
	while ($data_desa = $desa->fetch_array()) {
		echo '<option value="'.$data_desa['id_desa'].'">'.$data_desa['nama_desa'].'</option>';
	}
?>