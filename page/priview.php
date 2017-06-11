<?php 
error_reporting(0);
include_once 'database/db.php';
session_start();
if (!empty($_SESSION["id_user"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Priview</title>
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/stylePrint.css">
	<script type="text/javascript" src="../asset/js/jquery-3.2.1.min.js"></script>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="jumbotron">
				<h3 class="text-center">Data Anak Berkebutuhan Khusus</h3>
			</div>
		</div>
		<div  id="tampil">
		
		</div>
	</div>
</body>
</html>
<?php
}else{
		header("location: ../login.php");
	} 
?>
<script src="../ajax/priview.js"></script>
