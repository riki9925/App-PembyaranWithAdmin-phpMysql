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
body { color:gray(0,0,0); font-family:����;}
th { color:rgb(0,0,0); font-family:����;}
td { color:rgb(0,0,0); font-family:����;}
h1 { color:rgb(0,0,0); font-size:12pt; font-family:����;}
h2 { color:rgb(0,0,0); font-size:12pt; font-family:����;}
p.namo-list { color:rgb(0,128,0); font-size:12pt; font-family:����;}
p.namo-sublist { color:rgb(26,89,54); font-size:10pt; font-family:����;}
a:link {}
a:visited {}
a:active {}
--></style>
</head>
<body OnLoad="printPage();" bgcolor="white" text="black" link="#1A5936" vlink="gray" alink="#857956">
<script language="javascript">setTimeout("self.close();",2000000)</script>
<font size='3' face='arial'align='center'><u></u><?php echo "$view_nilai[bulan]"?></font>
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
$params=$_GET['niss'];
	$param=explode('_',$params);
	$nis=$param[0];
	$sems=$param[1];
	$q_nilai2="SELECT * from stor INNER JOIN kelas ON kelas.id_kelas=stor.id_kelas where stor.nis='$nis' and stor.semester='$sems'";
	$hasil2=mysql_query($q_nilai2,$koneksi);
	$data2=mysql_fetch_array($hasil2);
	$q_nilai3="SELECT*from siswa where nis='$nis'";
	$hasil3=mysql_query($q_nilai3,$koneksi);
	$data3=mysql_fetch_array($hasil3);
	
?>
	<table border="0" width="30%" id="table1" height="207" align="left" >
	<tr>
		<td height="50" colspan="3" align="left"><font face="Arial" size="5"><b>BUKTI PEMBAYARAN</b></font></td>
	<tr><td width="38%" height="27" colspan="2" align="left"><font face="Arial" size="2"><b>NIM     </font></td>
	  <td width="62%" align="left"><font face="Arial" size="2">:<?php echo" $data3[nis]";?></font></td>
	</tr>
	<tr><td height="20" colspan="2" align="left"><font face="Arial" size="2"><b>NAMA    </font></td>
	  <td height="20" align="left"><font face="Arial" size="3">:<?php echo" $data3[nama]";?></font></td>
	 <tr><td height="20" colspan="2" align="left"><font face="Arial" size="2"><b>Kelas    </font></td>
	  <td height="20" align="left"><font face="Arial" size="3">:<?php echo" $data3[id_kelas]";?></font></td>
	  <tr><td height="20" colspan="2" align="left"><font face="Arial" size="2"><b>SMESTER   </font></td>
	  <td height="20" align="left"><font face="Arial" size="3">:<?php echo" $sems";?></font></td>
	  <tr><td width="38%" height="27" colspan="2" align="left"><font face="Arial" size="2"><b>TAHUN AJARAN     </font></td>
	  <td width="62%" align="left"><font face="Arial" size="2">:<?php echo" $tanggal - $tggl";?></font></td>
	</tr>
	<tr><td colspan="3"></tr>
	<tr>
		<td colspan="3" align="left" ><p align="justify">

  <?php
	include("connect.php");
	$user="select*from login";
	$quser=mysql_query($user,$koneksi);
	$huser=mysql_fetch_array($quser); 
	$tgl=date('d-M-Y');
	$sql_kelas = "select walikelas from kelas where id_kelas='$id_kelas'";
	$hasil_kelas = mysql_query($sql_kelas,$koneksi);
		
	$q_nilai1="SELECT id_bayar,bulan FROM stor INNER JOIN bulan ON 
	bulan.id_bulan = stor.id_bulan WHERE nis='$nis'AND semester='$sems' ORDER by stor.id_bulan ASC";
	$hasil1=mysql_query($q_nilai1,$koneksi);
	
	$q_nilai="SELECT * from stor WHERE nis='$nis'AND semester='$sems'";
	
	$hasil=mysql_query($q_nilai,$koneksi);
	 
	print("<table width=640 border=1 class=table-common>
		<tr>
			<th >BULAN</th>
		    <th >BAYAR</th>
			<th >BAYAR KE</th>
			<th >JUMLAH</th>
			<th >TGL BAYAR </th>
				");
    	print("</tr>");	
		/*
	// banyaknya baris per halaman 
 		$rowsPerPage = 20; 
 		// halaman pertama atau default
 		$pageNum = 1; 
 		// digunakan untuk mengambil page number 
 		if(isset($_GET['page'])) { 
    		$pageNum = $_GET['page']; 
 		} 
 		// menambah offset 
 		$offset = ($pageNum - 1) * $rowsPerPage; 
*/		
	//while($data=mysql_fetch_array($hasil_siswa))
		
	while($data=mysql_fetch_array($hasil))
		{
		$data1=mysql_fetch_array($hasil1);
		
		print("<tr>
			    <td align='left'>$data1[bulan]</td>
				<td align='center'><font color='#464646'> <b>Rp. ".number_format ($data[bayar],2,",",".")."</b></td>
				<td align='center'>".number_format ($data[id_bulan],0,",",".")."</td>
				<td align='right'>Rp. ".number_format ($data[id_bulan]*$data[bayar],2,",",".")."</td>
				<td align='center'>$data[tglupdate]</td>
				
				");
    	print("</tr>");
		}	
		print("</table>");
		
		
		print("<table width=640 border=1 class=table-common>
				<tr>");
		print("<tr>
				");
		print("</tr>");
		
		$query   = "SELECT COUNT(*) AS numrows FROM stor where nis='$nis' and semester='$sems'"; 
  		$result  = mysql_query($query); 
  		$row     = mysql_fetch_array($result); 
  		$numrows = $row['numrows']; 
		
		
		$q_stor="SELECT * from stor WHERE nis='$nis'AND semester='$sems'";
		$storan=mysql_query($q_stor,$koneksi);
		$datal=mysql_fetch_array($storan);
		$hitung= (12 - $numrows);
		//$pilih_kelas=mysql_fetch_array($hasil_kelas);
		print("<tr>");
		print("<tr>");
		/*print("<tr>
				
				<td align='right'><b>Belum Bayar :</b></td>
				<td align='right'><b>$hitung Bulan</b></td>
				<td align='right'><b>Rp. ".number_format ($hitung * $datal[bayar],2,",",".")."</td>
				");
				
		print("</tr>");	*/	
		print("</table>");
		print("</tr>");		
		print("</table>");
		
		/*
		// banyaknya row yang ada dalam database 
  		$query   = "SELECT COUNT(*) AS numrows FROM nilai where nis='$nis'"; 
  		$result  = mysql_query($query); 
  		$row     = mysql_fetch_array($result); 
  		$numrows = $row['numrows']; 
    	// banyaknya halaman yang dipunyai yang digunakan paging 
  		$maxPage = ceil($numrows/$rowsPerPage); 
  		$self = $_SERVER['PHP_SELF']; 
	
	
	
	
 		// membuat link 'previous' dan 'next'  
 		if ($pageNum > 1) 
 		{ 
    		$page = $pageNum - 1; 
			print(" <a href=\"$self?page=1\">[First Page]</a> "); 
    		print(" <a href=\"$self?page=$page\">[Prev]</a> "); 
        }	
  		else 
 		{ 
    		print(" [First Page] "); 
			print(" [Prev] ");       
 		} 
	
  		if ($pageNum < $maxPage) 
  		{ 
    		$page = $pageNum + 1; 
    		print(" <a href=\"$self?page=$page\">[Next]</a> "); 
        	print(" <a href=\"$self?page=$maxPage\">[Last Page]</a> "); 
  		}  
   		else 
  		{ 
    		print(" [Next] ");       
    		print(" [Last Page] ");  
  		}
*/
?>
	<p align="right">Bontang, <?php echo"$tgl";?><br><br><br><br>..........................</b></p>
	<p><a href="laporan.php"><input type="submit" name="exit" value="Back" class="button" /></a>
	</p>                     
        </td>
	</tr>
	</table>
	<p>&nbsp;</p></td>
	</center></p>
	
            
   
		     
<?php
//	include "menu.php";
?>

