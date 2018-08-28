<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}
	include("connect.php");
	$nis=$_POST['nis'];
	$nama=$_POST['nama'];
	$kelas=$_POST['kelas'];

	$edit_siswa="UPDATE siswa SET nama='$nama', id_kelas='$kelas' WHERE nis='$nis'";
	mysql_query($edit_siswa,$koneksi);
	
	$edit="UPDATE nilai SET id_kelas='$kelas' where nis='$nis'";
	mysql_query($edit,$koneksi);
	
	header("Location:./siswa.php");
?>