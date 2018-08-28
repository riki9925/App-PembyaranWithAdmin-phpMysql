<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}
	include("../connect.php");
	$idmatapelajaran=$_GET['idmp'];
	
	$delete_matapelajaran="DELETE FROM matapelajaran WHERE id_matapelajaran='$idmatapelajaran'";
	mysql_query($delete_matapelajaran,$koneksi);
	header("Location:./matapelajaran.php");
?>