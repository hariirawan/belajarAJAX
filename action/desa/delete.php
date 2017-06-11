<?php 
error_reporting(0);
include_once '../../database/db.php';
$id = $_POST["idDesa"];
$sqli = $mysqli->prepare("DELETE FROM desa WHERE id_desa = ?");
$sqli->bind_param('d',$id);
$sqli->execute();
$mysqli->close();
?>