<?php 
error_reporting(0);
require_once '../../database/db.php';
$namaAnak = ucwords(strtolower($_POST["namaAnak"]));
$jk = $_POST["jk"];
$umurAnak = $_POST["umur"];
$namaOrtu = ucwords(strtolower($_POST["namaOrtu"]));
$pekerjaan= ucwords(strtolower($_POST["pekerjaan"]));
$idDesa = $_POST['desa'];
$idDusun= $_POST["dusun"];
$APS = $_POST["APS"];
$ABA = $_POST["ABA"];
$BGM = $_POST["BGM"];
$HIV = $_POST["HIV"];
$ABM = $_POST["ABM"];
$APC = $_POST["APC"];
$AYP = $_POST["AYP"];
$ATA = $_POST["ATA"];
$ATD = $_POST["ATD"];
$ADL = $_POST["ADL"];

if ($APS==null) {
	$APS=0;
}
if ($ABA==null) {
	$ABA=0;
}
if ($BGM==null) {
	$BGM=0;
}
if ($HIV==null) {
	$HIV=0;
}
if ($ABM==null) {
	$ABM=0;
}
if ($APC==null) {
	$APC=0;
}
if ($AYP==null) {
	$AYP=0;
}
if ($ATA==null) {
	$ATA=0;
}
if ($ATD==null) {
	$ATD=0;
}
if ($ADL==null) {
	$ADL=0;
}
$sqli = $mysqli->prepare("INSERT INTO tabel_abk(nama_anak,jk,umur,nama_ortu,pekerjaan,id_desa,id_dusun,APS,ABA,BGM,HIV,ABM,APC,AYP,ATA,ATD,ADL) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$sqli->bind_param('ssdsssddddddddddd',$namaAnak,$jk,$umurAnak,$namaOrtu,$pekerjaan,$idDesa,$idDusun,$APS,$ABA,$BGM,$HIV,$ABM,$APC,$AYP,$ATA,$ATD,$ADL);
$sqli->execute();
$mysqli->close();
 ?>