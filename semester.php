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
		<td height="50" align="center" bgcolor="#CCCC99"><font face="Arial" size="6"><b>Pilihan Semester</b></font></td>
	</tr>
	<tr>
		<td align="center" bgcolor="#CCCC99"><p align="center">
		<?php
	include("./connect.php");
	$nis=$_POST['nis'];
	//$nama=$_POST['nama'];
	
	//$query="SELECT nis FROM siswa WHERE nis='$nis' or nama='$nama'";
	$query="SELECT *FROM siswa WHERE nis='$nis'";
	
	$q=mysql_query($query,$koneksi);
	if(mysql_num_rows($q)== 1)
	{	
		print ("NIS Anda $nis<br />");
		
		print("Semester :<br />");
		$q_sems="SELECT id_nilai,nis,semester FROM nilai WHERE nis='$nis'GROUP BY semester";
		$hasil=mysql_query($q_sems,$koneksi);
		while($data=mysql_fetch_array($hasil))
		{
			print("<a href=\"nilai.php?niss=$data[nis]_$data[semester]\">$data[semester]</a>");
			print("<br/>");	
		}	
	}
	else
	{
		print("NIS Anda Salah!");
	}	
?>
	<br /><br />
	<a href="index.php">Keluar</a>
	</p>	
			
			
			
			
			
			
        </td>
	</tr>
</table>

</body>

</html>