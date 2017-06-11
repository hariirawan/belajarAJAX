<?php 
error_reporting(0);include_once '../../database/db.php';include_once '../database/db.php';
$id = $_POST["idKec"];
$query = $mysqli->prepare("DELETE FROM kecamatan where id_kec = ?");
$query->bind_param('d', $id);
$query->execute();
?>