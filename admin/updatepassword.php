<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}
	include("../connect.php");
	$user=$_POST['user'];
	$password=$_POST['password'];

	$edit_user="UPDATE login SET password=md5('$password'), password_asli='$password' WHERE user='$user'";
	mysql_query($edit_user,$koneksi);
	header("Location:./password.php");
?>