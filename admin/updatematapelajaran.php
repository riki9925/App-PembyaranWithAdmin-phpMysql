<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}
	include("../connect.php");
	$idmatapelajaran=$_POST['idmatapelajaran'];
	$matapelajaran=$_POST['matapelajaran'];

	$edit_matapelajaran="UPDATE matapelajaran SET matapelajaran='$matapelajaran' WHERE id_matapelajaran='$idmatapelajaran'";
	mysql_query($edit_matapelajaran,$koneksi);
	header("Location:./matapelajaran.php");
?>