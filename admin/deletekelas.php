<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}
	include("../connect.php");
	$idkelas=$_GET['idk'];
	
	$delete_kelas="DELETE FROM kelas WHERE id_kelas='$idkelas'";
	mysql_query($delete_kelas,$koneksi);
	header("Location:./kelas.php");
?>