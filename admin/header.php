<?php
	session_start();
	$username=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php?msg=Silahkan Login Dahulu");
	}
	include "../connect.php";
	$sql_user = "select * from login where user='$username'";
	$hasil_user = mysql_query($sql_user,$koneksi);
	$pilih_user=mysql_fetch_array($hasil_user);
?>
<html>
<head>
<title>Halaman Administrasi</title>
	<link href="./admin.css" rel="stylesheet" type="text/css" title="Default" />
</head>

<script language="JavaScript" type="text/JavaScript">
	var newwindow;

	function KonfirmasiHapus(submodule,id) {
		var jawaban;
		jawaban=confirm("Anda Yakin record ini akan dihapus?");
		if(jawaban) 
		{
			location.href=""+submodule+"="+id;
		}
	}
</script>

<body>
<!--Header-->
	<div id="header" style="padding: 0px">

		<div id="header-image">
				<h1 class="hidden" align="left">				</h1>
		</div>
		<div id="header-filler">
&nbsp;		</div>
</div>
	
	<!--Navigation-->
	<div id="navigation" align="left">
		<div style="float: left">
		<ul>
			<li><a href="halutama.php">Halaman Depan</a> 			
		</ul>

		</div>
		<div class="navigation-infobar">Login sebagai : <?=$username?>, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="logout.php"><strong>LogOut</strong></a>
		</div>

</div>