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
	$q_nilai2="SELECT * from stor INNER JOIN kelas ON kelas.id_kelas=stor.id_kelas where nis='$nis' and stor.semester='$sems'";
	$hasil2=mysql_query($q_nilai2,$koneksi);
	$data2=mysql_fetch_array($hasil2);
	$q_nilai3="SELECT*from siswa where nis='$nis'";
	$hasil3=mysql_query($q_nilai3,$koneksi);
	$data3=mysql_fetch_array($hasil3);
	
	?>
	<table border="0" width="30%" id="table1" height="207" align="left" >
	<tr>
		<td height="50" colspan="3" align="left"><font face="Arial" size="5"><b>INFO IURAN KOMITE</b></font></td>
	<tr><td width="38%" height="27" colspan="2" align="left"><font face="Arial" size="2"><b>NIS     </font></td>
	  <td width="62%" align="left"><font face="Arial" size="2">:<?php echo" $nis";?></font></td>
	</tr>
	<tr><td height="20" colspan="2" align="left"><font face="Arial" size="2"><b>NAMA    </font></td>
	  <td height="20" align="left"><font face="Arial" size="3">:<?php echo" $data3[nama]";?></font></td>
	 <tr><td height="20" colspan="2" align="left"><font face="Arial" size="2"><b>KELAS    </font></td>
	  <td height="20" align="left"><font face="Arial" size="3">:<?php echo" $data3[id_kelas]";?></font></td>
	  <tr><td height="20" colspan="2" align="left"><font face="Arial" size="2"><b>SMESTER   </font></td>
	  <td height="20" align="left"><font face="Arial" size="3">:<?php echo" $sems";?></font></td>
	  <tr><td width="38%" height="27" colspan="2" align="left"><font face="Arial" size="2"><b>TAHUN AJARAN     </font></td>
	  <td width="62%" align="left"><font face="Arial" size="2">:<?php echo" $data3[tahun_ajaran]";?></font></td>
	</tr>
	<tr><td colspan="3"></tr>
	<tr>
		<td colspan="3" align="left" ><p align="justify">


<?php
	include("connect.php");
	$stat="select * from login ";
	$q=mysql_query($stat, $koneksi);
	$tgl=date('d-M-Y');
	$sql_kelas = "select walikelas from kelas where id_kelas='$id_kelas'";
	$hasil_kelas = mysql_query($sql_kelas,$koneksi);
		
	$q_nilai1="SELECT id_bayar,bulan,tglupdate FROM stor INNER JOIN bulan ON 
	bulan.id_bulan = stor.id_bulan WHERE nis='$nis'AND semester='$sems' ORDER by stor.id_bulan ASC";
	$hasil1=mysql_query($q_nilai1,$koneksi);
	
	$q_nilai="SELECT * from stor WHERE nis='$nis'AND semester='$sems'";
	
	$hasil=mysql_query($q_nilai,$koneksi);
	 
	
	

		print("<table width=640 border=1 class=table-common>
		<tr>
			<th >IURAN / BULAN</th>
			<th >JML TUNGGAKKAN</th>
			<th >JUMLAH TUNGGAKKAN</th>
			
				");
    	print("</tr>");	
		
		//$q_stor="SELECT id_bayar,bayar,id_bulan,id_kelas,nis,semester,bln,SUM(bln)as iuran,tglupdate from stor WHERE nis='$nis'AND semester='$sems'";
		//$storan=mysql_query($q_stor,$koneksi);
		//while($datal=mysql_fetch_array($storan))
		$q_jml="SELECT * from tunggakan Inner join kelas on kelas.spp 
		Where nis='$nis'AND semester='$sems'"; 
		$stot=mysql_query($q_jml,$koneksi);
		while($datal=mysql_fetch_array($stot))
		//$dat=mysql_fetch_array($stot);
		//$pilih_kelas=mysql_fetch_array($hasil_kelas);
		{
		
		//$hitung= 12 - ($datal[id_bulan]);
		print("<tr>
			    <td align='center'><font color='#464646'> <b>Rp. ".number_format ($datal[spp],2,",",".")."</b></td>
				<td align='center'><b>".number_format ($datal[jml_bln_tunggakan],0,",",".")." Bulan </td>
				<td align='right'><b>Rp. ".number_format ($datal[jml_bln_tunggakan]* $datal[spp],2,",",".")."</td>
					
				");
    	print("</tr>");
		}	
		print("</table>");
		
		
		print("<table width=640 border=1 class=table-common>
				<tr>");
		print("<tr>
				");
		print("</tr>");
		
		$query   = "SELECT COUNT(*) AS numrows FROM stor where nis='$nis'"; 
  		$result  = mysql_query($query); 
  		$row     = mysql_fetch_array($result); 
  		$numrows = $row['numrows']; 
		
		
		
		//$pilih_kelas=mysql_fetch_array($hasil_kelas);
		print("<tr>");
		print("<tr>");
		print("<tr>
				
				
				");
				
		print("</tr>");		
		print("</table>");
		
		
		
		print("<table width=640 border=1 class=table-common>
				<tr>");
		
				
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
	<a href="laporan.php"><input type="submit" name="exit" value="Back" class="button" /></a>
	</p>                     
        </td>
	</tr>
	</table>
	<p>&nbsp;</p></td>
	</center></p>
	
   
<?php
	//include "menu.php";
?>

