<?php 
error_reporting(0);
include_once '../../database/db.php';
$query = $mysqli->query("SELECT * FROM dusun");

$id = $_POST["idDusun"];
$idDesa = $_POST["idDesa"];
$namaDusun = ucwords(strtolower($_POST["namaDusun"]));
$kepDusun = ucwords(strtolower($_POST["kepDusun"]));
$sqli = $mysqli->prepare("UPDATE dusun SET id_desa=?, nama_dusun=?, nama_kadus=? WHERE id_dusun=?");
$sqli->bind_param('dssd', $idDesa,$namaDusun,$kepDusun,$id);
if ($sqli->execute()) {
	echo "success";	
}else{
	echo "gagal";
}	
$mysqli->close();

?>