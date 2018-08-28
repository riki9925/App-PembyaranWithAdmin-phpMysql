<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}
	include("../connect.php");
	$user=$_POST['user'];
	$password=$_POST['password'];
	$status=$_POST['status'];
	$nama_guru=addslashes($_POST['nama_guru']);
	$edit_user="UPDATE login SET nama_guru=('$nama_guru'),password=md5('$password'), password_asli='$password', status='$status' WHERE user='$user'";
	mysql_query($edit_user,$koneksi);
	header("Location:./user.php");
?>