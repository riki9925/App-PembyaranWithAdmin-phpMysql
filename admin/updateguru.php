<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}
	include("../connect.php");
	$id_guru=$_POST['id_guru'];
	$guru=$_POST['guru'];

	$edit_kelas="UPDATE guru SET guru='$guru' WHERE id_guru='$id_guru'";
	mysql_query($edit_kelas,$koneksi);
	header("Location:./inputguru.php");
?>