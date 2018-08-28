<?php
// send wml headers
header("Content-type: text/vnd.wap.wml"); 
echo "<?xml version=\"1.0\"?>"; 
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.1//EN\"" 
   . " \"http://www.wapforum.org/DTD/wml_1.1.xml\">";
?>
<?php
	
?>
<wml>
  <card id="nilai" title="Nilai">
    <p>
<?php
	include("./connect.php");
	$params=$_GET['niss'];
	$param=explode('_',$params);
	$nis=$param[0];
	$sems=$param[1];
	print("NIS : $nis<br />");
	
	print("MataPelajaran :<br />");
	$q_nilai="SELECT id_nilai,matapelajaran FROM nilai INNER JOIN matapelajaran ON 
	matapelajaran.id_matapelajaran = nilai.id_matapelajaran WHERE nis='$nis'AND semester='$sems' ORDER by matapelajaran ASC";
	$hasil=mysql_query($q_nilai,$koneksi);
	while($data=mysql_fetch_array($hasil)){
		print("<a href=\"nilaidetail.php?idn=$data[id_nilai]\">$data[matapelajaran]</a>");
		print("<br/>");	
	}	
?>
	<br /><br />
	<a href="index.php">Keluar</a>
	</p>
  </card>
</wml>