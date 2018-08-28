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
		<td height="50" align="center"><div align="left" class="style1"><font face="Arial">Pilihan Kelas</font></div></td>
	</tr>
	<tr>
		<td height="99" align="left" valign="top" ><p align="left">
		<?php
	include("../connect.php");
	$bulan=$_POST['bulan'];
	$query="SELECT *FROM bulan WHERE id_bulan='$bulan'";
	$q=mysql_query($query,$koneksi);
	if(mysql_num_rows($q)== 1)
	{	
		print ("Bulan yang di Pilih $bulan<br />");
		
		//print("Semester :<br />");
		$q_sems="SELECT * FROM stor 
		where id_bulan='$bulan'
		group by id_kelas";		
		$hasil=mysql_query($q_sems,$koneksi);
		while($data=mysql_fetch_array($hasil))
		{
			print("<a href=\"pilihkelas.php?id_bln=$data[id_bulan]_$data[id_kelas]\">Kelas :$data[id_kelas]</a>");
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