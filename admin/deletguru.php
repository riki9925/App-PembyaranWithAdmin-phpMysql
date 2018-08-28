<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}
	include("../connect.php");
	$id=$_GET['id'];
	
	$delete_guru="DELETE FROM guru WHERE id_guru='$id'";
	mysql_query($delete_guru,$koneksi);
	header("Location:./inputguru.php");
?>