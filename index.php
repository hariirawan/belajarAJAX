<?php 
error_reporting(0);
include_once 'database/db.php';
session_start();
if (!empty($_SESSION["id_user"])) {
	$cariNama = $mysqli->real_escape_string($_SESSION["id_user"]);
	$data= $mysqli->query("SELECT * FROM pengguna WHERE id_user='".$cariNama."'");
	$tampData = $data->fetch_assoc();
	if ($tampData["status"]==1) {
		$status="Administrator";
	}else{
		$status="User";
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Rekapitulasi ABK</title>
	<link rel="stylesheet" type="text/css" href="asset/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	<link rel="stylesheet" type="text/css" href="asset/css/sweetalert2.min.css">
	<script type="text/javascript" src="asset/js/jquery-3.2.1.min.js"></script>
</head>
<body >
<div class="container-fluid">
	<div class="row">
		<div class="navbar-fixed-top ">
			<div class="navbar navbar-default navBar">
			  <div class="container-fluid">
			    <div class="navbar-header">
			     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-min" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">
			        <i class="glyphicon glyphicon-record"></i>&nbsp;Sistem Rekapitulasi Anak Berkebutuhan Khusus
			      </a>
			    </div>
				<ul class="nav navbar-nav navbar-right" style="margin-right: 15px; ">
		        <li class="dropdown" >
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i class="glyphicon glyphicon-user" >&nbsp;</i>Account <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#"><?php echo $tampData["nama_lengkap"]; ?></a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#" id="logOut">Log Out</a></li>
		          </ul>
		        </li>
		      </ul>
			</div>
		</div>
	</div>
	<div class="sidebar">
		<div class="collapse navbar-collapse" id="nav-min">
				<div class="fotoProfil text-center">
					<img src="action/user/gambar/<?php echo $tampData["foto"]; ?>" class="img-circle img-rounded img-responsive ">
					<h3 class="page-header"><?php echo $tampData["nama_lengkap"]; ?></h3>
					<p><?php echo $status;?></p>
				</div>
				<div class="menu-sidebar">
					<div class="list-group list-sidebar">
					<?php if ($tampData["status"]==1) {
						?>
					  <a href="index.php" class="list-group-item "><i class="glyphicon glyphicon-home">&nbsp;</i>Dashbord</a>
					  <a href="index.php?menu=kec" class="list-group-item "><i class="glyphicon glyphicon-cog">&nbsp;</i>kecamatan</a>
					  <a href="index.php?menu=desa" class="list-group-item "><i class="glyphicon glyphicon-cog">&nbsp;</i>Kelola Data Desa</a>
					  <a href="index.php?menu=dusun" class="list-group-item "><i class="glyphicon glyphicon-cog">&nbsp;</i>Kelola Data Dusun</a>
					  <a href="index.php?menu=rekapAbk" class="list-group-item "><i class="glyphicon glyphicon-book">&nbsp;</i>Kelola Data ABK</a>
					  <a href="index.php?menu=user" class="list-group-item "><i class="glyphicon glyphicon-user">&nbsp;</i>Kelola Data User</a>
					<?php
					}else{ ?>
					  <a href="index.php" class="list-group-item "><i class="glyphicon glyphicon-home">&nbsp;</i>Dashbord</a>
					  <a href="index.php?menu=rekapAbk" class="list-group-item "><i class="glyphicon glyphicon-book">&nbsp;</i>Kelola Data ABK</a>
					 <?php 
					}
					 ?>
					</div>
				</div>
		</div>
	</div>
	<div id="page-wrapper" >
		<div class="row">
			<div class="col-sm-12">
				<?php include_once 'menu.php'; ?>
			</div>
		</div>
	</div>
</div>
<script src="asset/js/sweetalert2.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="ajax/pengaturan.js"></script>
</body>
</html>
<?php 
}else{
	header("location:login.php");
}
?>