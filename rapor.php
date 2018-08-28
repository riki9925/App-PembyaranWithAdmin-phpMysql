<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>:: Informasi Nilai ::</title>
</head>

<body style="background-image: url('edu.gif')">

<p>&nbsp;</p>
<p>&nbsp;</p>

<table border="1" width="66%" id="table1" height="325" align="center">
	<tr>
		<td height="50" align="center" bgcolor="lightblue"><font face="Arial" size="6"><b>Laporan Hasil Belajar Siswa</b></font></td>
	</tr>
	<tr>
		<td align="left" bgcolor="#CCCC99"><p align="left">
<?php
	include("connect.php");
	$params=$_GET['idl'];
	$param=explode('_',$params);
	$nis=$param[0];
	$sems=$param[1];
	$query="SELECT *FROM leger WHERE nis='$nis'";
	
	$q=mysql_query($query,$koneksi);
	if(mysql_num_rows($q)== 0)
	{
		print("<table width=700 border=1 class=table-common>
  		<tr>
				<td align=center>Data dengan NIS :<b>$nis</b>, BELUM ADA</td>
				</tr>");
		print("</table>");
	}
	else
	{
	$q_nilai="SELECT * FROM leger INNER JOIN kelas ON 
	kelas.id_kelas = leger.id_kelas 
	WHERE nis='$nis'AND semester='$sems' ORDER by kelas ASC";
	$hasil=mysql_query($q_nilai,$koneksi);
	while($data=mysql_fetch_array($hasil))
	if(mysql_num_rows($hasil)>0)
		{
		if ($data[id_kelas]=='10.1' OR $data[id_kelas]=='10.2' OR $data[id_kelas]=='10.3' OR $data[id_kelas]=='10.4' OR $data[id_kelas]=='10.5' OR $data[id_kelas]=='10.6' OR $data[id_kelas]=='10.7' OR $data[id_kelas]=='10.8' OR $data[id_kelas]=='10.9')
		{
		print(" Nama : <b>$data[nama]</b><br/> ");
		print("NIS : <b>$nis</b><br />");
	    print(" Kelas : <b>$data[kelas]</b><br/> ");
		print("Semester : <b>$sems</b><br />");
		print("Rapor Umum<br />");
		print("<table width=700 border=1 class=table-common>
  		<tr>
			<th >No</th>
			<th >Komponen</th>
			<th >KKM</th>
			<th >Kognitif</th>
	  	   	<th >Psikomotor</th>
	        <th >Afektif</th>
		</tr>");
	       print("<tr>
				<td align=center><b>A</b></td>
				<td align=left><b>Mata Pelajaran</b></td>
				</tr>");
			
			print("<tr>
				<td align=center>1</td>
				<td align=left>Pendidikan Agama</td>
				<td align=center>75</td>
				<td align=center>$data[agm_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[agm_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>2</td>
				<td align=left>Pendidikan Kewarganegaraan</td>
				<td align=center>75</td>
				<td align=center>$data[kwn_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[kwn_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>3</td>
				<td align=left>Bahasa Indonesia</td>
				<td align=center>75</td>
				<td align=center>$data[ind_kog]</td>
				<td align=center>$data[ind_psi]</td>
				<td align=center>$data[ind_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>4</td>
				<td align=left>Bahasa Inggris</td>
				<td align=center>75</td>
				<td align=center>$data[ing_kog]</td>
				<td align=center>$data[ing_psi]</td>
				<td align=center>$data[ing_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>5</td>
				<td align=left>Matematika</td>
				<td align=center>75</td>
				<td align=center>$data[mtk_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[mtk_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>6</td>
				<td align=left>Fisika</td>
				<td align=center>75</td>
				<td align=center>$data[fis_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[fis_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>7</td>
				<td align=left>Biologi</td>
				<td align=center>75</td>
				<td align=center>$data[bio_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[bio_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>8</td>
				<td align=left>Kimia</td>
				<td align=center>75</td>
				<td align=center>$data[kim_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[kim_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>9</td>
				<td align=left>Sejarah</td>
				<td align=center>75</td>
				<td align=center>$data[sjr_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[sjr_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>10</td>
				<td align=left>Geografi</td>
				<td align=center>75</td>
				<td align=center>$data[geo_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[geo_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>11</td>
				<td align=left>Ekonomi</td>
				<td align=center>75</td>
				<td align=center>$data[eko_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[eko_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>12</td>
				<td align=left>Sosiologi</td>
				<td align=center>75</td>
				<td align=center>$data[sos_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[sos_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>13</td>
				<td align=left>Seni Budaya</td>
				<td align=center>75</td>
				<td align=center>$data[sbd_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[sbd_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>14</td>
				<td align=left>Penjasorkes</td>
				<td align=center>75</td>
				<td align=center>$data[or_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[or_afek]</td>
			</tr>");
             print("<tr>
				<td align=center>15</td>
				<td align=left>Teknologi Informasi dan Komunikasi</td>
				<td align=center>75</td>
				<td align=center>$data[tik_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[tik_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>16</td>
				<td align=left>Bahasa Jerman</td>
				<td align=center>75</td>
				<td align=center>$data[jer_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[jer_afek]</td>
			</tr>");
            print("<tr>
				<td align=center><b>B</b></td>
				<td align=left><b>Muatan Lokal</b></td>
				</tr>");
			print("<tr>
				<td align=center>1</td>
				<td align=left>Batik</td>
				<td align=center>75</td>
				<td align=center>$data[btk_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[btk_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>2</td>
				<td align=left>Bahasa Jawa</td>
				<td align=center>75</td>
				<td align=center>$data[bj_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[bj_afek]</td>
			</tr>");
		print("</table>");		
		print("<br />");
         print("<b>Ketidakhadiran</b><br />");
			
    	print("<table width=700 border=1 class=table-common>
  		<tr>
			<th >No</th>
			<th >Alasan Ketidakhadiran</th>
			<th >Keterangan</th>
			
		</tr>");
					print("<tr>
				<td align=center>1</td>
				<td align=left>Sakit</td>
				<td align=center>$data[sakit]</td>
				</tr>");
			print("<tr>
				<td align=center>2</td>
				<td align=left>Izin</td>
				<td align=center>$data[ijin]</td>
				</tr>");
			print("<tr>
				<td align=center>3</td>
				<td align=left>Tanpa Keterangan</td>
				<td align=center>$data[alpha]</td>
				</tr>");
		print("</table>");
		}
		else
		{
		if ($data[id_kelas]=='11.1' OR $data[id_kelas]=='11.2' OR $data[id_kelas]=='11.3' OR $data[id_kelas]=='11.4' OR $data[id_kelas]=='11.5' OR $data[id_kelas]=='12.1' OR $data[id_kelas]=='12.2' OR $data[id_kelas]=='12.3' OR $data[id_kelas]=='12.4' OR $data[id_kelas]=='12.5')
		{
		print(" Nama : <b>$data[nama]</b><br/> ");
		print("NIS : <b>$nis</b><br />");
	    print(" Kelas : <b>$data[kelas]</b><br/> ");
		print("Semester : <b>$sems</b><br />");
		print("Rapor IPA<br />");
		print("<table width=700 border=1 class=table-common>
  		<tr>
			<th >No</th>
			<th >Komponen</th>
			<th >KKM</th>
			<th >Kognitif</th>
	  	   	<th >Psikomotor</th>
	        <th >Afektif</th>
		</tr>");
	       print("<tr>
				<td align=center><b>A</b></td>
				<td align=left><b>Mata Pelajaran</b></td>
				</tr>");
			
			print("<tr>
				<td align=center>1</td>
				<td align=left>Pendidikan Agama</td>
				<td align=center>75</td>
				<td align=center>$data[agm_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[agm_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>2</td>
				<td align=left>Pendidikan Kewarganegaraan</td>
				<td align=center>75</td>
				<td align=center>$data[kwn_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[kwn_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>3</td>
				<td align=left>Bahasa Indonesia</td>
				<td align=center>75</td>
				<td align=center>$data[ind_kog]</td>
				<td align=center>$data[ind_psi]</td>
				<td align=center>$data[ind_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>4</td>
				<td align=left>Bahasa Inggris</td>
				<td align=center>75</td>
				<td align=center>$data[ing_kog]</td>
				<td align=center>$data[ing_psi]</td>
				<td align=center>$data[ing_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>5</td>
				<td align=left>Matematika</td>
				<td align=center>75</td>
				<td align=center>$data[mtk_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[mtk_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>6</td>
				<td align=left>Fisika</td>
				<td align=center>75</td>
				<td align=center>$data[fis_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[fis_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>7</td>
				<td align=left>Biologi</td>
				<td align=center>75</td>
				<td align=center>$data[bio_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[bio_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>8</td>
				<td align=left>Kimia</td>
				<td align=center>75</td>
				<td align=center>$data[kim_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[kim_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>9</td>
				<td align=left>Sejarah</td>
				<td align=center>75</td>
				<td align=center>$data[sjr_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[sjr_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>10</td>
				<td align=left>Geografi</td>
				<td align=center>75</td>
				<td align=center>$data[geo_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[geo_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>11</td>
				<td align=left>Ekonomi</td>
				<td align=center>75</td>
				<td align=center>$data[eko_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[eko_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>12</td>
				<td align=left>Sosiologi</td>
				<td align=center>75</td>
				<td align=center>$data[sos_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[sos_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>13</td>
				<td align=left>Seni Budaya</td>
				<td align=center>75</td>
				<td align=center>$data[sbd_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[sbd_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>14</td>
				<td align=left>Penjasorkes</td>
				<td align=center>75</td>
				<td align=center>$data[or_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[or_afek]</td>
			</tr>");
             print("<tr>
				<td align=center>15</td>
				<td align=left>Teknologi Informasi dan Komunikasi</td>
				<td align=center>75</td>
				<td align=center>$data[tik_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[tik_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>16</td>
				<td align=left>Bahasa Jerman</td>
				<td align=center>75</td>
				<td align=center>$data[jer_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[jer_afek]</td>
			</tr>");
            print("<tr>
				<td align=center><b>B</b></td>
				<td align=left><b>Muatan Lokal</b></td>
				</tr>");
			print("<tr>
				<td align=center>1</td>
				<td align=left>Batik</td>
				<td align=center>75</td>
				<td align=center>$data[btk_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[btk_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>2</td>
				<td align=left>Bahasa Jawa</td>
				<td align=center>75</td>
				<td align=center>$data[bj_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[bj_afek]</td>
			</tr>");
		print("</table>");		
		print("<br />");
         print("<b>Ketidakhadiran</b><br />");
			
    	print("<table width=700 border=1 class=table-common>
  		<tr>
			<th >No</th>
			<th >Alasan Ketidakhadiran</th>
			<th >Keterangan</th>
			
		</tr>");
					print("<tr>
				<td align=center>1</td>
				<td align=left>Sakit</td>
				<td align=center>$data[sakit]</td>
				</tr>");
			print("<tr>
				<td align=center>2</td>
				<td align=left>Izin</td>
				<td align=center>$data[ijin]</td>
				</tr>");
			print("<tr>
				<td align=center>3</td>
				<td align=left>Tanpa Keterangan</td>
				<td align=center>$data[alpha]</td>
				</tr>");
		print("</table>");
		}
		else
		{
		print(" Nama : <b>$data[nama]</b><br/> ");
		print("NIS : <b>$nis</b><br />");
	    print(" Kelas : <b>$data[kelas]</b><br/> ");
		print("Semester : <b>$sems</b><br />");
		print("Rapor IPS<br />");
		print("<table width=700 border=1 class=table-common>
  		<tr>
			<th >No</th>
			<th >Komponen</th>
			<th >KKM</th>
			<th >Kognitif</th>
	  	   	<th >Psikomotor</th>
	        <th >Afektif</th>
		</tr>");
	       print("<tr>
				<td align=center><b>A</b></td>
				<td align=left><b>Mata Pelajaran</b></td>
				</tr>");
			
			print("<tr>
				<td align=center>1</td>
				<td align=left>Pendidikan Agama</td>
				<td align=center>75</td>
				<td align=center>$data[agm_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[agm_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>2</td>
				<td align=left>Pendidikan Kewarganegaraan</td>
				<td align=center>75</td>
				<td align=center>$data[kwn_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[kwn_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>3</td>
				<td align=left>Bahasa Indonesia</td>
				<td align=center>75</td>
				<td align=center>$data[ind_kog]</td>
				<td align=center>$data[ind_psi]</td>
				<td align=center>$data[ind_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>4</td>
				<td align=left>Bahasa Inggris</td>
				<td align=center>75</td>
				<td align=center>$data[ing_kog]</td>
				<td align=center>$data[ing_psi]</td>
				<td align=center>$data[ing_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>5</td>
				<td align=left>Matematika</td>
				<td align=center>75</td>
				<td align=center>$data[mtk_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[mtk_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>6</td>
				<td align=left>Fisika</td>
				<td align=center>75</td>
				<td align=center>$data[fis_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[fis_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>7</td>
				<td align=left>Biologi</td>
				<td align=center>75</td>
				<td align=center>$data[bio_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[bio_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>8</td>
				<td align=left>Kimia</td>
				<td align=center>75</td>
				<td align=center>$data[kim_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[kim_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>9</td>
				<td align=left>Sejarah</td>
				<td align=center>75</td>
				<td align=center>$data[sjr_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[sjr_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>10</td>
				<td align=left>Geografi</td>
				<td align=center>75</td>
				<td align=center>$data[geo_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[geo_afek]</td>
			</tr>");
            print("<tr>
				<td align=center>11</td>
				<td align=left>Ekonomi</td>
				<td align=center>75</td>
				<td align=center>$data[eko_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[eko_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>12</td>
				<td align=left>Sosiologi</td>
				<td align=center>75</td>
				<td align=center>$data[sos_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[sos_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>13</td>
				<td align=left>Seni Budaya</td>
				<td align=center>75</td>
				<td align=center>$data[sbd_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[sbd_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>14</td>
				<td align=left>Penjasorkes</td>
				<td align=center>75</td>
				<td align=center>$data[or_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[or_afek]</td>
			</tr>");
             print("<tr>
				<td align=center>15</td>
				<td align=left>Teknologi Informasi dan Komunikasi</td>
				<td align=center>75</td>
				<td align=center>$data[tik_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[tik_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>16</td>
				<td align=left>Bahasa Jerman</td>
				<td align=center>75</td>
				<td align=center>$data[jer_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[jer_afek]</td>
			</tr>");
            print("<tr>
				<td align=center><b>B</b></td>
				<td align=left><b>Muatan Lokal</b></td>
				</tr>");
			print("<tr>
				<td align=center>1</td>
				<td align=left>Batik</td>
				<td align=center>75</td>
				<td align=center>$data[btk_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[btk_afek]</td>
			</tr>");
			print("<tr>
				<td align=center>2</td>
				<td align=left>Bahasa Jawa</td>
				<td align=center>75</td>
				<td align=center>$data[bj_kog]</td>
				<td align=center>---</td>
				<td align=center>$data[bj_afek]</td>
			</tr>");
		print("</table>");		
		print("<br />");
         print("<b>Ketidakhadiran</b><br />");
			
    	print("<table width=700 border=1 class=table-common>
  		<tr>
			<th >No</th>
			<th >Alasan Ketidakhadiran</th>
			<th >Keterangan</th>
			
		</tr>");
					print("<tr>
				<td align=center>1</td>
				<td align=left>Sakit</td>
				<td align=center>$data[sakit]</td>
				</tr>");
			print("<tr>
				<td align=center>2</td>
				<td align=left>Izin</td>
				<td align=center>$data[ijin]</td>
				</tr>");
			print("<tr>
				<td align=center>3</td>
				<td align=left>Tanpa Keterangan</td>
				<td align=center>$data[alpha]</td>
				</tr>");
		print("</table>");
		}}
		}
		 else
		{print(" Data <b>BELUM ADA</b><br/> ");}}
?>
	<br /><br />
	<div align="center">
	<a href="index.php">Keluar</a>
	</p>
        </td>
	</tr>
</table>

</body>

</html>