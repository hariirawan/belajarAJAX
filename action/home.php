<?php 
error_reporting(0);
include_once '../database/db.php';
$page=isset($_GET["home"])?$_GET["home"]:" ";
if ($page=="desa") {
	$data= $mysqli->query("SELECT * FROM desa");
	$banyak = $data->num_rows;
	echo $banyak;
}
if ($page=="kecamatan") {
	$data= $mysqli->query("SELECT * FROM kecamatan");
	$banyak = $data->num_rows;
	echo $banyak;
}
if ($page=="dusun") {
	$data= $mysqli->query("SELECT * FROM dusun");
	$banyak = $data->num_rows;
	echo $banyak;
}
if ($page=="abk") {
	$data= $mysqli->query("SELECT * FROM tabel_abk");
	$banyak = $data->num_rows;
	echo $banyak;
}
?>