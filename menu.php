
<?php 
error_reporting(0);
include_once 'database/db.php';
session_start();
if (!empty($_SESSION["id_user"])) {
	$menu = isset($_GET["menu"])?$_GET["menu"] : "";
	if ($menu=="rekapAbk") {
		include_once 'page/rekapAbk.php';
	}else if($menu=="kec"){
		include_once 'page/kecamatan.php';
	}else if ($menu=="desa") {
		include_once 'page/desa.php';
	}else if ($menu=="dusun") {
		include_once 'page/dusun.php';
	}else if ($menu=="user") {
		include_once 'page/pageUser.php';
	}else{
		include_once 'page/home.php';
	}
}else{
	header("location:login.php");
}
?>

