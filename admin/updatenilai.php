<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}
	include("../connect.php");
	$idnilai=$_POST['idnilai'];
	$nis=$_POST['nis'];
	$matapelajaran=$_POST['matapelajaran'];
	$kelas=$_POST['kelas'];
	$kog=$_POST['kog'];
	$psiko=$_POST['psiko'];
	$afektif=$_POST['afektif'];
	$semester=$_POST['semester'];
	
	$edit_nilai="UPDATE nilai SET nis='$nis', id_matapelajaran='$matapelajaran', id_kelas='$kelas', kog='$kog', psiko='$psiko', afektif='$afektif', semester='$semester' WHERE id_nilai='$idnilai'";
	mysql_query($edit_nilai,$koneksi);
	header("Location:./nilai.php");
?>