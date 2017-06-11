<?php
require_once '../database/db.php';

$data = isset($_GET["data"])? $_GET["data"] : "";
if($data=="dusun"){
	echo '<option value="">Pilihan Dusun</option>';
	$idDesa= $_POST["idDesa"];
	$dusun= $mysqli->query("SELECT * FROM dusun WHERE id_desa='".$idDesa."'");
	while ($dataDusun = $dusun->fetch_array()) {
		echo '<option value="'.$dataDusun['id_dusun'].'">'.$dataDusun['nama_dusun'].'</option>';
	}
}else if ($data=="desa") {
	echo '<option value="">Pilih Desa/Kelurahan</option>';
	$idKec= $_POST["idKec"];
	$desa= $mysqli->query("SELECT * FROM desa WHERE id_kec='".$idKec."'");
	while ($dataDesa = $desa->fetch_array()) {
		echo '<option value="'.$dataDesa['id_desa'].'">'.$dataDesa['nama_desa'].'</option>';
	}
}else{
	$id= $_POST["id"];
	echo '<option value="">Pilih Kecamatan</option>';
	$Kecamatan= $mysqli->query("SELECT * FROM kecamatan");
	while ($data_kecamatan = $Kecamatan->fetch_array()) {
		echo '<option value="'.$data_kecamatan['id_kec'].'">'.$data_kecamatan['nama_kec'].'</option>';
	}
}
?>