<?php
	include "header.php";
?>
<?php
include("connect.php");
	$id_nilai=$_GET['idn'];
	$q_nilai="SELECT * FROM nilai INNER JOIN matapelajaran ON 
	matapelajaran.id_matapelajaran = nilai.id_matapelajaran INNER JOIN siswa ON siswa.nis=nilai.nis 
	INNER JOIN kelas ON kelas.id_kelas=nilai.id_kelas
	WHERE id_nilai='$id_nilai'";
	$hasil=mysql_query($q_nilai,$koneksi);
	$data=mysql_fetch_array($hasil);
	?>
<!--COntent -->
<div id="content">
		<div id="subcontent-wide">
    <div class="subcontent-element">
			
	<p>
	<table border="0" width="30%" id="table1" height="207" align="left">
	<tr>
		<td height="50" colspan="3" align="left"><font face="Arial" size="5"><b>Nilai</b></font></td>
	<tr><td width="38%" height="27" colspan="2" align="left"><font face="Arial" size="2"><b>NIS     </font></td>
	  <td width="62%" align="left"><font face="Arial" size="2">:<?php echo" $data[nis]";?></font></td>
	</tr>
	<tr><td height="20" colspan="2" align="left"><font face="Arial" size="2"><b>NAMA    </font></td>
	  <td height="20" align="left"><font face="Arial" size="2">:<?php echo" $data[nama]";?></font></td>
	 <tr><td height="20" colspan="2" align="left"><font face="Arial" size="2"><b>KELAS    </font></td>
	  <td height="20" align="left"><font face="Arial" size="2">:<?php echo" $data[kelas]";?></font></td>
	  <tr><td height="20" colspan="2" align="left"><font face="Arial" size="2"><b>SMESTER   </font></td>
	  <td height="20" align="left"><font face="Arial" size="2">:<?php echo" $data[semester]";?></font></td>
	<tr><td colspan="3"></tr>
	<tr>
		<td colspan="3" align="left" ><p align="justify">

	
			<?php
	include("connect.php");
	$id_nilai=$_GET['idn'];
	$q_nilai="SELECT * FROM nilai INNER JOIN matapelajaran ON 
	matapelajaran.id_matapelajaran = nilai.id_matapelajaran INNER JOIN siswa ON siswa.nis=nilai.nis 
	INNER JOIN kelas ON kelas.id_kelas=nilai.id_kelas
	WHERE id_nilai='$id_nilai'";
	$hasil=mysql_query($q_nilai,$koneksi);
	$data=mysql_fetch_row($hasil);
	print("<table width=600 border=1 class=table-common>
		<tr>
			<th>MAPEL</th>
		    <th >NILAI KOG</th>
			<th >NILAI PSI</th>
			<th >NILAI AFE</th>
			<th >UPDATE </th>
				");
    	print("</tr>");	
		
	//while($data=mysql_fetch_array($hasil_siswa))
		{
		    		print("<tr>
			    <td align='center'>$data[matapelajaran]</td>
				<td align='center'>".number_format ($data[kog],2,",",".")."</td>
				<td align='center'>".number_format ($data[psiko],2,",",".")."</td>
				<td align='center'>$data[afektif]</td>
				<td align='center'>$data[tglupdate]</td>
				
				");
    		print("</tr>");
			}
			print("</table>");
			/*
	print("NIS :<b>$data[nis]</b><br/>");
	print("Nama : <b>$data[nama]</b><br/>");
	print("Kelas : <b>$data[kelas]</b><br/>");
	print("Semester : <b>$data[semester]</b><br/>");
	print("<br/>");	
	print("<b>$data[matapelajaran] : </b><br/>");
	print("Nilai Kognitif   = $data[kog]<br/>");
	print("Nilai Psikomotor = $data[psiko]<br/>");
	print("Nilai Afektif    = $data[afektif]<br/>");
	print("Update : $data[tglupdate]");		*/
?><br />
			<br />
	<br /><br />
	<a href="masuk1.php">Keluar</a>
	</p>        </td>
	</tr>
</table>
	<p>&nbsp;</p></td>
	</center></p>
	
            
      </div>
		</div>
<?php
	include "menu.php";
?>
