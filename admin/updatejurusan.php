<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}
	include("../connect.php");
	$idkelas=$_POST['idkelas'];
	$kelas=$_POST['kelas'];
//	$walikelas=$_POST['walikelas'];
	
	$edit_kelas="UPDATE jurusan SET kjurusan='$kelas'WHERE id_jurusan='$idkelas'";
	mysql_query($edit_kelas,$koneksi);
	header("Location:./jurusan.php");
	
?>