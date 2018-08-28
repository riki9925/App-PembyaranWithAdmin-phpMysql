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
	include("connect.php");
	$params=$_GET['id_bln'];
	$param=explode('_',$params);
	$bulan=$param[0];
	$kelas=$param[1];
	
	$q_bulan="SELECT*from bulan
	WHERE id_bulan='$bulan'";
	$hasil0=mysql_query($q_bulan,$koneksi);
	
	$q_kelas="SELECT*from stor where id_kelas='$kelas'";
	$hasil1=mysql_query($q_kelas,$koneksi);
	
	if(mysql_num_rows($hasil0)== 1)
	{	
		print ("Bulan yang di Pilih $bulan IDJur $kelas<br />");
		
		//print("Semester :<br />");
		$q_sems="SELECT * FROM stor Where id_bulan='$bulan' And id_kelas='$kelas' group by semester";		
		$hasil=mysql_query($q_sems,$koneksi);
		while($data=mysql_fetch_array($hasil))
		{
			print("<a href=\"aksibulan.php?sems=$data[id_bulan]_$data[id_kelas]_$data[semester]\">Semester :$data[semester]</a>");
			print("<br/>");	
		}	
	}
	else
	{
		print("Tentukan Bulan!");
	}	
?>
	<br />
	<br />
	<a href="laporan.php">Kembali</a>
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