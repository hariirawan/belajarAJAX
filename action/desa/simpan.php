<?php 
error_reporting(0);
include_once '../../database/db.php';

$query = $mysqli->query("SELECT * FROM desa");
$search = $query->fetch_assoc();
$idKec = $_POST["kecamatan"];
$namaDesa = ucwords(strtolower($_POST["namaDesa"]));
$kepDesa = ucwords(strtolower($_POST["kepDesa"]));

if ($namaDesa != $search["nama_desa"]) {
	$sqli = $mysqli->prepare("INSERT INTO desa(id_kec,nama_desa,nama_kepdesa) VALUES (?,?,?)");
	$sqli->bind_param('dss',$idKec,$namaDesa,$kepDesa);
	$sqli->execute();
	$mysqli->close();
	echo "success";	
}else{
	echo "gagal";
}
?>