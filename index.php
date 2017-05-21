<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD ajax</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
</head>
<body >
<div class="container-fluid">

	<div class="row">
		<div class="col-sm-10 col-sm-offset-1 navbar-fixed-top ">
			<nav class="navbar navbar-inverse ">
			  <div class="container-fluid">
			    <div class="navbar-header">
			     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-min" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">
			        <i class="glyphicon glyphicon-record"></i>&nbsp;Sistem Simpel
			      </a>
			    </div>
			    <ul class="nav navbar-nav navbar-right">
			        <li><a href="index.php?menu=about">About</a></li>
			        <li><a href="index.php?menu=contact">Contact</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">Action</a></li>
			            <li><a href="#">Another action</a></li>
			            <li><a href="#">Something else here</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">Separated link</a></li>
			          </ul>
			        </li>
			    </ul>
			  </div>
			</nav>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">			
			<div class="jumbotron text-center">
				<img src="img/irawan.jpg" alt="" class="img-circle">
				<h1>Hari Irawan</h1>
				<p class="text">JQUERY || AJAX || BOOTSTRAP || PHP 7 VESI OOP</p>
			</div>
		</div>
	</div>
	<div class="navSearch">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 styleNav">
				<button type="button" class="btn btn-success navbar-btn " data-toggle="modal" data-target="#crud"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah Data</button>
				<form class="navbar-form navbar-right " role="search">
				  	<div class="input-group">
					    <input type="text" placeholder="Search For.." class="form-control" id="cari">
						<span class="input-group-btn">
							<input class="btn btn-warning" type="reset">Reset !</input>
						</span>
					</div>
				</form>

			</div>
		</div>
	</div>
<!--Modal -->

		<div class="modal fade" id="crud">
			<div class="modal-dialog modal-md" role="document">
			    <div class="modal-content">
			    	<div class="modal-header">
			    		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    		<h4 class="modal-title" id="myModalLabel">Input Pesan</h4>
			    	</div>
			    	<div class="modal-body">
				    		<div class="form-group">
				    			<label for="nama">Nama Lengkap</label>
				    			<input type="text" id="nama" class="form-control">
				    		</div>
				    		<div class="form-group">
				    			<label for="email">Email Anda</label>
				    			<input type="text" id="email" class="form-control">
				    		</div>
				    		<div class="form-group">
				    			<label for="kategori">Kategori</label>
				    			<select  id="kategori" class="form-control">
				    				<option value="">-- Choose Category --</option>
				    				<option value="Web Developer">Web Developer</option>
				    				<option value="Desain Grafis">Desain Grafis</option>
				    			</select>
				    		</div>
				    		<div class="form-group">
				    			<label for="pesan">pesan</label>
				    			<textarea  id="pesan" cols="30" rows="10" class="form-control"></textarea>
				    		</div>
			    	</div>
			    	<div class="modal-footer">
			    		<button class="btn btn-primary text-right" id="simpan">Simpan</button>
			    	</div>	
			    </div>
		  	</div>
		</div>

		<!--Modal -->
	
	<div class="contTabel">
		<div class="table">
			<div class="row">
				<?php include_once 'menu.php'; ?>		
			</div>
		</div>
	</div>

	<div class="bgfooter text-center">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 footer">
				<h5>&copy;Copyright : By Hari Irawan</h5>
			</div>
		</div>
	</div>
</div>

<script src="js/sweetalert2.min.js"></script>
<script src="js/paralax.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
