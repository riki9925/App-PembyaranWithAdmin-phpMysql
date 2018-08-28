<?php
header("Content-Type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: attachment; filename=excelraport.xls");
?>

<?php
include("connect.php");
$params=$_GET['niss'];
	$param=explode('_',$params);
	$nis=$param[0];
	$sems=$param[1];
	$q_nilai2="SELECT * from nilai INNER JOIN kelas ON kelas.id_kelas=nilai.id_kelas where nis='$nis' and semester='$sems'";
	$hasil2=mysql_query($q_nilai2,$koneksi);
	$data2=mysql_fetch_array($hasil2);
	$q_nilai3="SELECT*from siswa where nis='$nis'";
	$hasil3=mysql_query($q_nilai3,$koneksi);
	$data3=mysql_fetch_array($hasil3);
	?>
	<table border="0" width="30%" id="table1" height="207" align="left">
	<tr>
		<td height="50" colspan="3" align="left"><font face="Arial" size="5"><b>Nilai</b></font></td>
	<tr><td width="38%" height="27" colspan="2" align="left"><font face="Arial" size="2"><b>NIS     </font></td>
	  <td width="62%" align="left"><font face="Arial" size="2">:<?php echo" $data2[nis]";?></font></td>
	</tr>
	<tr><td height="20" colspan="2" align="left"><font face="Arial" size="2"><b>NAMA    </font></td>
	  <td height="20" align="left"><font face="Arial" size="3">:<?php echo" $data3[nama]";?></font></td>
	 <tr><td height="20" colspan="2" align="left"><font face="Arial" size="2"><b>KELAS    </font></td>
	  <td height="20" align="left"><font face="Arial" size="3">:<?php echo" $data2[kelas]";?></font></td>
	  <tr><td height="20" colspan="2" align="left"><font face="Arial" size="2"><b>SMESTER   </font></td>
	  <td height="20" align="left"><font face="Arial" size="3">:<?php echo" $data2[semester]";?></font></td>
	<tr><td colspan="3"></tr>
	<tr>
		<td colspan="3" align="left" ><p align="justify">
<?php
	$sql_user = "select nama_guru from login";
	$hasil_user = mysql_query($sql_user,$koneksi);
	
$q_nilai1="SELECT id_nilai,matapelajaran FROM nilai INNER JOIN matapelajaran ON 
	matapelajaran.id_matapelajaran = nilai.id_matapelajaran WHERE nis='$nis'AND semester='$sems' ORDER by matapelajaran ASC";
	$hasil1=mysql_query($q_nilai1,$koneksi);
	
	$q_nilai="SELECT * from nilai WHERE nis='$nis'AND semester='$sems'";
	
	$hasil=mysql_query($q_nilai,$koneksi);
	print("<table width=600 border=1 class=table-common>
		<tr>
			<th>MAPEL</th>
		    <th >NILAI KKM</th>
			<th >NILAI ANGKA</th>
			<th >NILAI PREDIKAT</th>
			<th >UPDATE </th>
				");
    	print("</tr>");	
		
	//while($data=mysql_fetch_array($hasil_siswa))
	while($data=mysql_fetch_array($hasil))
		{
		$data1=mysql_fetch_array($hasil1);
		    		print("<tr>
			    <td align='center'>$data1[matapelajaran]</td>
				<td align='center'>".number_format ($data[kog],0,",",".")."</td>
				<td align='center'>".number_format ($data[psiko],0,",",".")."</td>
				<td align='center'>$data[afektif]</td>
				<td align='center'>$data[tglupdate]</td>
				
				");
    		print("</tr>");
			}
			print("</table>");
			print("<table width=780 border=1 class=table-common>
				<tr>");
		print("<tr><th> Wali Kelas </th>
				<th> Orang Tua Siswa </th>
				<th> Kepala Sekolah </th>");
		print("</tr>");
		$pilih_user=mysql_fetch_array($hasil_user);
		print("<tr>");
		print("<tr>");
		print("<tr>
				
				<td align='center'><b>$pilih_user[nama_guru]</b></td>
				<td align='center'>...........</td>
				<td align='center'><b>Solehin,S.Pd</b></td>");
				
		print("</tr>");		
		print("</table>");
?>
</table>