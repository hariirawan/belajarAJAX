<?php 
error_reporting(0);
include_once '../../database/db.php';
$query = $mysqli->query("SELECT * FROM kecamatan");
$search = $query->fetch_assoc();
$id = $_POST["id_kec"];
$nama_kec = ucwords(strtolower($_POST["nama_kec"]));
$kepCamat = ucwords(strtolower($_POST["kepCamat"]));
$sqli = $mysqli->prepare("UPDATE kecamatan SET nama_kec=?, nama_kepcamat=? WHERE id_kec=?");
$sqli->bind_param('ssd',$nama_kec,$kepCamat,$id);
$sqli->execute();
$mysqli->close();
echo "success";	
?>