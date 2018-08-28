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
	$spp=$_POST['spp'];
	$edit_kelas="UPDATE kelas SET kelas='$kelas',spp='$spp'WHERE id_kelas='$idkelas'";
	mysql_query($edit_kelas,$koneksi);
	header("Location:./kelas.php");
	
?>