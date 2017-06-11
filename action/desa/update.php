<?php 
error_reporting(0);
include_once '../../database/db.php';
$idDesa= $_POST["idDesa"];
$idKec = $_POST["idKec"];
$namaDesa = ucwords(strtolower($_POST["namaDesa"]));
$kepDesa = ucwords(strtolower($_POST["kepDesa"]));
$sqli = $mysqli->prepare("UPDATE desa SET id_kec=?, nama_desa=?, nama_kepdesa=? WHERE id_desa=?");
$sqli->bind_param('dssd',$idKec,$namaDesa,$kepDesa,$idDesa);
if ($sqli->execute()) {
	echo "success";	
}else{
	echo "gagal";
}	
$mysqli->close();
?>