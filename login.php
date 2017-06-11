<?php 
error_reporting(0);
session_start();
if (!empty($_SESSION["id_user"])) {
	header("location: index.php?page=home");
}else{
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD ajax</title>
	<link rel="stylesheet" type="text/css" href="asset/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="asset/css/login.css">
	<script type="text/javascript" src="asset/js/jquery-3.2.1.min.js"></script>
</head>
<body >
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="alert alert-info alert-dismissible info" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<strong> Info!</strong> Untuk dapat mengakses halaman Admin ini diwajibkan untuk Login terlebih dahulu.
				</div>
				<div class="panel panel-primary" id="formLogin">
					<div class="panel-heading">
						<div class="row text-center">
							<img src="asset/img/user.png" alt="" class="img-thumbnail img-circle img-responsive " id="hlogin">	
						</div>
						<div class="row">
							<h3 class="text-center">Login Member</h3>
						</div>
					</div>
					<div class="panel-body">
						<div id="pesan"></div>
						<form >
							<div class="form-group">
								<label for="username">Username </label>
								<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
								<input type="text" class="form-control" id="username" placeholder="Username" title="Username">
							</div>
							</div>
								<div class="form-group">
									<label for="password">Password </label>
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
									<input type="password" class="form-control" id="password" placeholder="Password" title="Password">
								</div>
							</div>
						</form>
					</div>				
					<div class="panel-footer">
						<button type="submit" id="login" class="btn btn-primary"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</button>
						<div class="pull-right">
							<button type="submit" name="reset" id="reset" class="btn btn-danger"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
						</div>
					</div>
			</div>
		</div>
	<footer>
		<div class="container text-center">
			<h5>&copy; Sistem Rekapitulasi Anak Berkebutuhan Khusus</h5>
		</div>
	</footer>
	</div>
	<script src="ajax/login.js"></script>
</body>
</html>
<?php 
}
 ?>