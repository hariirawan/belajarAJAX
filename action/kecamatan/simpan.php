<?php 
error_reporting(0);
include_once '../../database/db.php';
$query = $mysqli->query("SELECT * FROM kecamatan");
$search = $query->fetch_assoc();

$nama_kec = ucwords(strtolower($_POST["nama_kec"]));
$kepCamat = ucwords(strtolower($_POST["kepCamat"]));

if ($nama_kec!=$search["nama_kec"]) {
	$sqli = $mysqli->prepare("INSERT INTO kecamatan(nama_kec,nama_kepcamat) VALUES (?, ?)");
	$sqli->bind_param('ss',$nama_kec,$kepCamat);
	$sqli->execute();
	$mysqli->close();
	echo "success";	
}else{
	echo "gagal";
}
?>