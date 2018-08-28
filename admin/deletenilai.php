<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}
	include("../connect.php");
	$idn=$_GET['idn'];
	
	$delete_nilai="DELETE FROM stor WHERE id_bayar='$idn'";
	mysql_query($delete_nilai,$koneksi);
	header("Location:./nilai.php");
?>