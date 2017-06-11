<?php 
error_reporting(0);
include_once '../../database/db.php';
$query = $mysqli->query("SELECT * FROM dusun");
$search = $query->fetch_assoc();
$idDesa = $_POST["idDesa"];
$namaDusun = ucwords(strtolower($_POST["namaDusun"]));
$kepDusun = ucwords(strtolower($_POST["kepDusun"]));

if ($namaDusun != $search["nama_dusun"] && idDesa != $search["id_desa"]) {
	$sqli = $mysqli->prepare("INSERT INTO dusun(id_desa,nama_dusun,nama_kadus) VALUES (?,?,?)");
	$sqli->bind_param('dss',$idDesa,$namaDusun,$kepDusun);
	$sqli->execute();
	$mysqli->close();
	echo "success";	
}else{
	echo "gagal";
}

?>