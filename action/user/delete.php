<?php 
error_reporting(0);
include_once '../../database/db.php';
$id = $_GET["id"];
$sqli = $mysqli->prepare("DELETE FROM pengguna WHERE id_user = ?");
$sqli->bind_param('d',$id);
$sqli->execute();
$mysqli->close();
?>