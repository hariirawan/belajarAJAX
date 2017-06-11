<?php 
error_reporting(0);
include '../../database/db.php';
$id=$_GET["edit"];
$status = $_POST["status"];
$nama = $_POST["nama"];
$user = $_POST["user"];
$pass = $_POST["pass"];
$passBaru= sha1($_POST["passBaru"]);
$gambarDefault= 'foto.jpg';
$namaGambar = $_FILES["gambar"]["name"];
$formatGambar = $_FILES["gambar"]["type"];
$sumberGambar = $_FILES["gambar"]["tmp_name"];
$ukuranGambar = $_FILES["gambar"]["size"];

$path = 'gambar/'.$namaGambar;

if ($namaGambar != "") {
	if (move_uploaded_file($sumberGambar, $path)) {
		if ($passBaru != "") {
			$query = $mysqli->prepare("UPDATE pengguna SET username=?, password=?, nama_lengkap=?, foto=?, status=? WHERE id_user=?");
			$query->bind_param('ssssdd', $user,$passBaru,$nama,$namaGambar,$status,$id);
			$query->execute();
			$mysqli->close();
		}else{
			$query = $mysqli->prepare("UPDATE pengguna SET username=?, nama_lengkap=?, foto=?, status=? WHERE id_user=?");
			$query->bind_param('ssssdd', $user,$nama,$namaGambar,$status,$id);
			$query->execute();
			$mysqli->close();
		}
	}else{
		echo "error";
	}
}else{
	if ($passBaru != " ") {
		$query = $mysqli->prepare("UPDATE pengguna SET username=?, password=?, nama_lengkap=?, status=? WHERE id_user=?");
		$query->bind_param('sssdd', $user,$passBaru,$nama,$status,$id);
		$query->execute();
		$mysqli->close();
	}else{
		$query = $mysqli->prepare("UPDATE pengguna SET username=?, nama_lengkap=?, status=? WHERE id_user=?");
		$query->bind_param('sssdd', $user,$nama,$status,$id);
		$query->execute();
		$mysqli->close();
	}
	
}

?>