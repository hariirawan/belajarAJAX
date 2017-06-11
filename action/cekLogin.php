<?php 
session_start();
require_once '../database/db.php';
$user=$mysqli->real_escape_string($_POST['user']);
$pass=$mysqli->real_escape_string(sha1($_POST['pass']));
$select=$mysqli->query('SELECT * FROM pengguna WHERE username ="'.$user.'" AND password="'.$pass.'"');
$data= $select->fetch_assoc();
if ($data>1) {
	@$_SESSION['id_user']=$data['id_user'];
	echo "sukses";
}else{
	echo "gagal";
}
?>