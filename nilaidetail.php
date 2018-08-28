<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>:: Informasi Nilai ::</title>
<link rel="shortcut icon" href="image/favicon.ico">
</head>

<body style="background-image: url('edu.gif')">

<p>&nbsp;</p>
<p>&nbsp;</p>

<table border="1" width="66%" id="table1" height="325" align="center">
	<tr>
		<td height="50" align="center" bgcolor="#CCCC99"><font face="Arial" size="6"><b>Data Nilai Siswa</b></font></td>
	</tr>
	<tr>
		<td align="center" bgcolor="#CCCC99"><p align="justify">
			<?php
	include("./connect.php");
	$id_nilai=$_GET['idn'];
	$q_nilai="SELECT * FROM nilai INNER JOIN matapelajaran ON 
	matapelajaran.id_matapelajaran = nilai.id_matapelajaran INNER JOIN siswa ON siswa.nis=nilai.nis 
	INNER JOIN kelas ON kelas.id_kelas=nilai.id_kelas
	WHERE id_nilai='$id_nilai'";
	$hasil=mysql_query($q_nilai,$koneksi);
	$data=mysql_fetch_array($hasil);
	print("NIS : <b>$data[nis]</b><br/>");
	print("Nama : <b>$data[nama]</b><br/>");
	print("Kelas : <b>$data[kelas]</b><br/>");
	print("Semester : <b>$data[semester]</b><br/>");
	print("<br/>");	
	print("<b>$data[matapelajaran] : </b><br/>");
	print("Nilai Kognitif   = $data[kog]<br/>");
	print("Nilai Psikomotor = $data[psiko]<br/>");
	print("Nilai Afektif    = $data[afektif]<br/>");
	print("Update : $data[tglupdate]");		
?>
	<br /><br />
	<a href="index.php">Keluar</a>
	</p>
        </td>
	</tr>
</table>

</body>

</html>