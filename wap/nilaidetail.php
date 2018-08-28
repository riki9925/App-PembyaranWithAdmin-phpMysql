<?php
// send wml headers
header("Content-type: text/vnd.wap.wml"); 
echo "<?xml version=\"1.0\"?>"; 
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.1//EN\"" 
   . " \"http://www.wapforum.org/DTD/wml_1.1.xml\">";
?>
<wml>
  <card id="nilai" title="Nilai Anda">
    <p>
<?php
	include("./connect.php");
	$id_nilai=$_GET['idn'];
	$q_nilai="SELECT * FROM nilai INNER JOIN matapelajaran ON 
	matapelajaran.id_matapelajaran = nilai.id_matapelajaran INNER JOIN siswa ON siswa.nis=nilai.nis 
	INNER JOIN kelas ON kelas.id_kelas=nilai.id_kelas
	WHERE id_nilai='$id_nilai'";
	$hasil=mysql_query($q_nilai,$koneksi);
	$data=mysql_fetch_array($hasil);
	print("NIS : <b>$data[nis]</b><br/>");
	print("Nama : <b>$data[nama]</b><br/>");
	print("Kelas : <b>$data[kelas]</b><br/>");
	print("Semester : <b>$data[semester]</b><br/>");
	print("<br/>");	
	print("<b>$data[matapelajaran] : </b><br/>");
	print("Nilai Kognitif   = $data[kog]<br/>");
	print("Nilai Psikomotor = $data[psiko]<br/>");
	print("Nilai Afektif    = $data[afektif]<br/>");
	print("Update : $data[tglupdate]");		
?>
	<br /><br />
	<a href="index.php">Keluar</a>
	</p>
  </card>
</wml>