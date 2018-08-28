<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}
	include("../connect.php");
	$nis=$_GET['nis'];
	
	$delete_siswa="DELETE FROM siswa WHERE nis='$nis'";
	mysql_query($delete_siswa,$koneksi);
	$delete_nilai="DELETE FROM nilai WHERE nis='$nis'";
	mysql_query($delete_nilai,$koneksi);
	header("Location:./siswa.php");
?>