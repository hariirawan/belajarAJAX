<?php 
error_reporting(0);
require_once '../../database/db.php';
$id = $_POST["idAbk"];
$sqli = $mysqli->prepare("DELETE FROM tabel_abk WHERE id= ?");
$sqli->bind_param('d', $id);
$sqli->execute();
$mysqli->close;

?>