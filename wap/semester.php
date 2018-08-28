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
  <card id="semester" title="Semester">
    <p>
<?php
	include("./connect.php");
	$nis=$_POST['nis'];
	//$nama=$_POST['nama'];
	
	//$query="SELECT nis FROM siswa WHERE nis='$nis' or nama='$nama'";
	$query="SELECT *FROM siswa WHERE nis='$nis'";
	
	$q=mysql_query($query,$koneksi);
	if(mysql_num_rows($q)== 1)
	{	
		print ("NIS Anda $nis<br />");
		
		print("Semester :<br />");
		$q_sems="SELECT id_nilai,nis,semester FROM nilai WHERE nis='$nis'GROUP BY semester";
		$hasil=mysql_query($q_sems,$koneksi);
		while($data=mysql_fetch_array($hasil))
		{
			print("<a href=\"nilai.php?niss=$data[nis]_$data[semester]\">$data[semester]</a>");
			print("<br/>");	
		}	
	}
	else
	{
		print("NIS Anda Salah!");
	}	
?>
	<br /><br />
	<a href="index.php">Keluar</a>
	</p>
  </card>
</wml>