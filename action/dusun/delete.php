<?php 
error_reporting(0);
include_once '../../database/db.php';
$query = $mysqli->query("SELECT * FROM dusun");

$id = $_POST["idDusun"];
$sqli = $mysqli->prepare("DELETE FROM dusun WHERE id_dusun = ?");
$sqli->bind_param('d',$id);
$sqli->execute();
$mysqli->close();


?>