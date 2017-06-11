<?php 
error_reporting(0);
include '../../database/db.php';
$status = $_POST["status"];
$nama = ucwords(strtolower($_POST["nama"]));
$user = $_POST["user"];
$pass = sha1($_POST["pass"]);
$gambarDefault= 'foto.jpg';
$namaGambar = $_FILES["gambar"]["name"];
$formatGambar = $_FILES["gambar"]["type"];
$sumberGambar = $_FILES["gambar"]["tmp_name"];
$ukuranGambar = $_FILES["gambar"]["size"];

$path = 'gambar/'.$namaGambar;

if ($namaGambar != "") {
	if (move_uploaded_file($sumberGambar, $path)) {
		$query = $mysqli->prepare("INSERT INTO pengguna(username,password,nama_lengkap,foto,status) VALUES (?,?,?,?,?)");
		$query->bind_param('ssssd', $user,$pass,$nama,$namaGambar,$status);
		$query->execute();
		$mysqli->close();
	}else{
		echo "error";
	}
}else{
	$query = $mysqli->prepare("INSERT INTO pengguna(username,password,nama_lengkap,foto,status) VALUES (?,?,?,?,?)");
	$query->bind_param('ssssd', $user,$pass,$nama,$gambarDefault,$status);
	$query->execute();
	$mysqli->close();
}

?>