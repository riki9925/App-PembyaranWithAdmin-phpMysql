<html>
<head>
<title>Laporan Pembayaran <?php ?></title>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function printPage() {
if (window.print) {
agree = confirm('Apakah Akan Mencetak ? > Klik OK');
if (agree) window.print();
else
("masuk3.php");
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
<font size='3' face='arial'align='center'></font>
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
	$params=$_GET['sems'];
	$param=explode('_',$params);
	$bulan=$param[0];
	$kelas=$param[1];
	$sem=$param[2];
	
	$q_bulan="SELECT * FROM bulan where id_bulan='$bulan'";
	$hasil2=mysql_query($q_bulan,$koneksi);
	$data2=mysql_fetch_array($hasil2);
	
	$q_nilai3="SELECT*from kelas where id_kelas='$kelas'";
	$hasil3=mysql_query($q_nilai3,$koneksi);
	$data3=mysql_fetch_array($hasil3);

	$olih="SELECT semester,nama,stor.id_kelas FROM stor INNER JOIN siswa ON siswa.nis=stor.nis where siswa.id_kelas='$kelas' AND semester='$sem'";
	$q_olih=mysql_query($olih,$koneksi);
	$toli=mysql_fetch_array($q_olih);
	
	$olih1="SELECT*FROM siswa INNER JOIN stor ON stor.nis=siswa.nis";
	$q_olih1=mysql_query($olih1,$koneksi);
	
	?>

	<h1> Laporan Bulanan </h1>	
	<table border="0" width="50%" id="table1" height="50" align="left" class= "table-common">
	<tr><td height="37" colspan="2" align="left"><font face="Arial" size="2"><b>Bulan    </font></td>
	  <td width="75%" height="37" align="left"><font face="Arial" size="3">:<?php echo" $data2[bulan]";?></font></td>
	  <tr><td height="37" colspan="2" align="left"><font face="Arial" size="2"><b>Kelas   </font></td>
	  <td width="75%" height="37" align="left"><font face="Arial" size="3">:<?php echo" $kelas";?></font></td>
	  <tr><td height="37" colspan="2" align="left"><font face="Arial" size="2"><b>Semester    </font></td>
	  <td width="75%" height="37" align="left"><font face="Arial" size="3">:<?php echo" $sem";?></font></td>
	 
<?php
	
	$sql_kelas = "select walikelas from kelas where id_kelas='$id_kelas'";
	$hasil_kelas = mysql_query($sql_kelas,$koneksi);
		
	$q_nilai1="SELECT bln,sum(bln) as sisa,id_bayar,stor.nis,nama,bulan,bayar,SUM(bayar) as total FROM stor
	INNER JOIN siswa ON siswa.nis=stor.nis 
	INNER JOIN bulan ON bulan.id_bulan=stor.id_bulan
	WHERE stor.id_bulan='$bulan' AND stor.id_kelas='$kelas' AND stor.semester='$sem' Group by nis";
	$hasil1=mysql_query($q_nilai1,$koneksi);
	//$q_nis="SELECT nis sum(bayar) as dibayar from stor GROUP BY nis ";
	$q_sortir="SELECT nis,bayar ,SUM(bayar) as total,id_kelas,semester  from stor where id_bulan='$bulan' and stor.id_kelas='$kelas' and semester='$sem' GROUP By id_bulan and bayar";

	$tot=mysql_query($q_sortir,$koneksi);
	$hasil=mysql_query($q_nilai,$koneksi);
	$data1=mysql_fetch_array($tot);
	$hitung=mysql_num_rows($hasil1);
	print("<table width=640 border=1 class=table-common>
		<tr>
			<th>NO</th>
			<th >NIM</th>
			<th >NAMA</th>
		    <th >BAYAR</th>
			<th >TERBAYAR</th>
			<th >JUMLAH</th>
			");
    	print("</tr>");	
	
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
	
	//while($data=mysql_fetch_array($hasil_siswa))
	$no=1;	
	$jml=$data[bayar];
	
	
	
	
	$query   = "SELECT COUNT(*) AS numrows FROM stor where nis='$nis'"; 
	$query1  = "SELECT * FROM stor where id_kelas='$kelas' and id_bulan='$bulan' and semester='$sem' group by nis";
	$j_siswa  = "SELECT *from siswa Where id_kelas='$kelas'";
		$result = mysql_query($query);
		$result1= mysql_query($query1);	
		$j_no= mysql_query($j_siswa,$koneksi);
  		$row    = mysql_fetch_array($result);
		$numrows= $row['numrows']; 
		$rows   = mysql_num_rows($result1);
		$j_rows = mysql_num_rows($j_no);	
			
	while($data=mysql_fetch_array($hasil1) )
	
				{
				$toli1=mysql_fetch_array($q_olih1);
			print("<tr>
				<td align='center'>$no</td>
			    <td align='left'>$data[nis]</td>
				<td align='left'>$data[nama]</td>
				<td align='center'>Rp. ".number_format ($data[bayar],2,",",".")."</td>
				<td align='center'>Bulan $data[bulan]</td>
				<td align='center'><font color='#464646'> <b>Rp. ".number_format ($data[total],2,",",".")."</b></td>
				
				");
    	print("</tr>");
		$no++;
		
		}	
		print("<tr>
		
		<td ></td>
		<td ></td>
		<td></td>
		<td></td>
		<td align='right'><b>Jumlah Total = </b></td>
		<td align='center'><b>Rp. ".number_format ($data1[total],2,",",".")."</b></td>
		
		
				
				");
		print("</table>");
		
		print("<table width=640 border=1 class=table-common>
				<tr>");
		
		print("</tr>");
				
		$q_stor="SELECT * from stor INNER JOIN siswa ON siswa.id_kelas=stor.id_kelas WHERE siswa.nis='$nis'AND semester='$sems'";
		$storan=mysql_query($q_stor,$koneksi);
		$datal=mysql_fetch_array($storan);
		$hitung= (12 - $numrows);
		$tgl=date('d-M-Y');
		//$pilih_kelas=mysql_fetch_array($hasil_kelas);
		print("<tr>");
		print("<tr>");
		
		print("</table>");
		
				
		print("</tr>");		
		print("</table>");
		
		
	/*	// banyaknya row yang ada dalam database 
  		$query   = "SELECT COUNT(*) AS numrows FROM stor where id_kelas='$kelas'"; 
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
        <td width="1%"></td>
	</tr>
	</table>
	<p>&nbsp;</p></td>
	</center></p>
	
   
<?php
//	include "menu.php";
?>

