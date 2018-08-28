<?php
	include "header.php";
?>
<!--COntent -->
<style type="text/css">
<!--
.style1 {
	font-size: medium;
	font-weight: bold;
}
-->
</style>

<div id="content">
		<div id="subcontent-wide">
    <div class="subcontent-element">
			
	<p><center>
	<table border="0" width="66%" id="table1" height="150" align="left" class="table-form">
	<tr>
		<td height="50" align="center"><div align="left" class="style1"><font face="Arial">Pilihan Semester</font></div></td>
	</tr>
	<tr>
		<td height="99" align="left" valign="top" ><p align="left">
		<?php
	include("../connect.php");
	$nis=$_POST['nis'];
	//$nama=$_POST['nama'];
	
	//$query="SELECT nis FROM siswa WHERE nis='$nis' or nama='$nama'";
	$query="SELECT *FROM siswa WHERE nis='$nis'";
	
	$q=mysql_query($query,$koneksi);
	if(mysql_num_rows($q)== 1)
	{	
		print ("NIS Anda $nis<br />");
		
		//print("Semester :<br />");
		$q_sems="SELECT id_bayar,nis,semester FROM stor WHERE nis='$nis'GROUP BY semester";
		$hasil=mysql_query($q_sems,$koneksi);
		while($data=mysql_fetch_array($hasil))
		{
			print("<a href=\"nilai_2.php?niss=$data[nis]_$data[semester]\">Semester :$data[semester]</a>");
			print("<br/>");	
		}	
	}
	else
	{
		print("NIS Anda Salah!");
	}	
?>
	<br />
	<br />
	<a href="masuk1.php">Kembali</a>
	</p>	
			
			
			
			
			
			
        </td>
	</tr>
</table>

	<p>&nbsp;</p></td>
	</center></p>
	
            
      </div>
		</div>
<?php
	include "menu.php";
?>