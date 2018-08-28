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
		<td height="50" align="center" bgcolor="#CCCC99"><font face="Arial" size="6"><b>Pilihan Mata Pelajaran</b></font></td>
	</tr>
	<tr>
		<td align="center" bgcolor="#CCCC99"><p align="justify">
			<?php
	include("./connect.php");
	$params=$_GET['niss'];
	$param=explode('_',$params);
	$nis=$param[0];
	$sems=$param[1];
	print("NIS : $nis<br />") ;
	print("<br />");
	print("<br />");
	print("MataPelajaran :<br />");
	
	$q_nilai="SELECT id_nilai,matapelajaran FROM nilai INNER JOIN matapelajaran ON 
	matapelajaran.id_matapelajaran = nilai.id_matapelajaran WHERE nis='$nis'AND semester='$sems' ORDER by matapelajaran ASC";
	$hasil=mysql_query($q_nilai,$koneksi);
	while($data=mysql_fetch_array($hasil)){
		print("<a href=\"nilaidetail.php?idn=$data[id_nilai]\">$data[matapelajaran]</a>");
		print("<br/>");	
	}	
?>
	<br /><br />
	<br /><br />
	<a href="masuk1.php">Keluar</a>
	</p>
                     
        </td>
	</tr>
</table>

</body>

</html>