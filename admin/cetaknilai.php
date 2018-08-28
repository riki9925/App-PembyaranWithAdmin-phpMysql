<html>
<head>
<title>Storan Bulan <?php ?></title>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function printPage() {
if (window.print) {
agree = confirm('Apakah Akan Mencetak ? > Klik OK');
if (agree) window.print();
   }
}
//  End -->
</script>

<style><!--
body { color:gray(0,0,0); font-family:±¼¸²;}
th { color:rgb(0,0,0); font-family:±¼¸²;}
td { color:rgb(0,0,0); font-family:±¼¸²;}
h1 { color:rgb(0,0,0); font-size:12pt; font-family:±¼¸²;}
h2 { color:rgb(0,0,0); font-size:12pt; font-family:±¼¸²;}
p.namo-list { color:rgb(0,128,0); font-size:12pt; font-family:±¼¸²;}
p.namo-sublist { color:rgb(26,89,54); font-size:10pt; font-family:±¼¸²;}
a:link {}
a:visited {}
a:active {}
--></style>
</head>
<body OnLoad="printPage();" bgcolor="white" text="black" link="#1A5936" vlink="gray" alink="#857956">
<script language="javascript">setTimeout("self.close();",2000000)</script>
<font size='3' face='arial'align='center'><?php echo "$view_nilai[bulan]"?></font>
<br>

<?php
 $day=array("MINGGU","SENIN","SELASA","RABU","KAMIS","JUM'AT","SABTU");
 $bl=array("JANUARI","FEBRUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");
 $d=date("w");
 $b=date("n");
 $hari=$day[$d];
 //$tanggal=date("d")." ".$bl[($b-1)].date("  Y");
 $tanggal=date("  Y");
 $tggl=date("  Y").date("  Y" )+(1);
 ?>
<?php
	include "headerprint.php";
	include("connect.php");
	$idn=$_GET['idn'];
	//$param=explode('_',$params);
	//$nis=$param[0];
	//$sems=$param[1];
	$q_nilai2="SELECT * from stor where id_bayar='$idn'";
	$hasil2=mysql_query($q_nilai2,$koneksi);
	$data2=mysql_fetch_array($hasil2);
	$q_nilai3="SELECT*from login ";
	$hasil3=mysql_query($q_nilai3,$koneksi);
	$data3=mysql_fetch_array($hasil3);
	
	$show_nilai="SELECT *FROM stor 
		inner join bulan on bulan.id_bulan=stor.id_bulan
		INNER JOIN siswa ON siswa.nis
		INNER JOIN kelas ON kelas.id_kelas 
	where id_bayar='$idn'";
		$hasil_nilai=mysql_query($show_nilai,$koneksi);
		$view_nilai=mysql_fetch_array($hasil_nilai);
		$bayar +=($view_nilai[bayar]);
	?>
	<table border="0" width="30%" id="table1" height="207" align="left" >
	<tr>
	<tr><td width="38%" height="27" colspan="2" align="left"><font face="Arial" size="2"><b>NIM     </font></td>
	<td width="62%" align="left"><font face="Arial" size="2">:<?php echo" $data2[nis]";?></font></td>
	</tr>
	<tr><td height="20" colspan="2" align="left"><font face="Arial" size="2"><b>Nama    </font></td>
	  <td height="20" align="left"><font face="Arial" size="2">:<?php echo" $view_nilai[nama]";?></font></td>
	 <tr><td height="20" colspan="2" align="left"><font face="Arial" size="2"><b>Jurusan   </font></td>
	  <td height="20" align="left"><font face="Arial" size="2">:<?php echo" $view_nilai[kelas]";?></font></td>
	  <tr><td height="20" colspan="2" align="left"><font face="Arial" size="2"><b>Semester   </font></td>
	  <td height="20" align="left"><font face="Arial" size="2">:<?php echo" $data2[semester]";?></font></td>
	  <tr><td width="38%" height="27" colspan="2" align="left"><font face="Arial" size="2"><b>TAHUN AJARAN     </font></td>
	  <td width="62%" align="left"><font face="Arial" size="2">:<?php echo" $view_nilai[tahun_ajaran]";?></font></td>
	 	<tr><td colspan="3"></tr>
	<tr>
		<td colspan="3" align="left" ><p align="justify">
<?php
	include("../connect.php");
	print("<table width=640px border=1 class=table-common td>
		<tr>
			<th >Id Bayar</th>
			<th >Tanggal Bayar </th>
		    <th >Bulan</th>
			<th >Total</th>
				");
    	print("</tr>");
		
		$hasil_nilai=mysql_query($show_nilai,$koneksi);
		while($view_nilai=mysql_fetch_array($hasil_nilai)){
			
		print("<tr>
			    <td align='left'>$view_nilai[id_bayar]</td>
				<td align='center'>$view_nilai[tglupdate]</td>
				<td align='center'>$view_nilai[bulan]</td>
				<td align='center'>".number_format ($view_nilai[bayar],0,",",".")."</td>
				
				");
				}
    	print("</tr>");
		print("</table>");
		print("<table width=640px border=1 class=table-common>
				<tr>");
		print("<tr><th>Total = </th>
				<th>Rp.".number_format ($bayar,2,",",".")."</th>");
		print("</tr>");
		print("<tr>");
		print("<tr>");
		print("<tr>");
		print("</tr>");		
		print("</table>");
		print("<table width=640px border=1 class=table-common>
				<tr>");
		print("<tr><th> Orang Tua Siswa </th>
				<th> Petugas </th>");
		print("</tr>");
		print("<tr>");
		print("<tr>");
		print("<tr>
				
				<td align='center'><br><br>...........</td>
				<td align='center'><br><br>...........</td>");
				
		print("</tr>");		
		print("</table>");
		
		
?>
	</p>                     
        </td>
	</tr>
	</table>
	<p>&nbsp;</p></td>
	</center></p>
	
            
    </div>
	</div>


