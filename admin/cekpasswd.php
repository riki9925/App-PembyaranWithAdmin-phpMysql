<?php
	session_start();
	include("../connect.php");
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql_user = "select * from login where user='$username' and password=md5('$password') ";
	$hasil_user = mysql_query($sql_user,$koneksi);
	$rowcount = mysql_num_rows($hasil_user);
	if ($rowcount == 1) {
		$_SESSION['username'] = $username;
		header("Location: halutama.php");
	}
	else
	{
		header("Location:./login.php?msg=Username atau password yang anda masukkan salah");
	}
?>