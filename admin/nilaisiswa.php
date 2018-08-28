<?php
	include "header.php";
?>
<!--COntent -->
<div id="content">
		<div id="subcontent-wide">
    <div class="subcontent-element">
			
	<p><center>
	<table border="1" width="66%" id="table1" height="325" align="center">
	<tr>
		<td height="50" align="center" bgcolor="#CCCC99"><font face="Arial" size="6"><b>Pilihan Mata Pelajaran</b></font></td>
	</tr>
	<tr>
		<td align="center" bgcolor="#CCCC99"><p align="justify">
			<?php
	include("connect.php");
	$params=$_GET['niss'];
	$param=explode('_',$params);
	$nis=$param[0];
	$sems=$param[1];
	print("NIS : $nis<br />") ;
	print("<br />");
	print("<br />");
	print("MataPelajaran :<br />");
	
//	$q_nilai="SELECT id_nilai,matapelajaran FROM nilai INNER JOIN matapelajaran ON 
	//matapelajaran.id_matapelajaran = nilai.id_matapelajaran WHERE nis='$nis'AND semester='$sems' ORDER by matapelajaran ASC";
	//$hasil=mysql_query($q_nilai,$koneksi);
	//while($data=mysql_fetch_array($hasil)){
	print("<table width=700 border=1 class=table-common>
  		<tr>
			<th >Kelas</th>
    		<th >NIS</th>
			<th >Nama</th>
			<th >MataPelajaran</th>
			<th >Kognitif</th>
			<th >Pasikomotor</th>
			<th >Afektif</th>
			<th >Semester</th>");
			if($pilih_user[status]==admin){
			print("<th >Aksi</th>");
			}
		print("</tr>");
		
		// banyaknya baris per halaman 
 		$rowsPerPage = 16; 
 		// halaman pertama atau default
 		$pageNum = 1; 
 		// digunakan untuk mengambil page number 
 		if(isset($_GET['page'])) { 
    		$pageNum = $_GET['page']; 
 		} 
 		// menambah offset 
 		$offset = ($pageNum - 1) * $rowsPerPage; 
		$show_nilai="SELECT id_nilai,nilai.nis,nama,kog,psiko,afektif,semester,kelas,matapelajaran 
		FROM nilai 
		INNER JOIN siswa ON siswa.nis = nilai.nis 
		INNER JOIN matapelajaran ON matapelajaran.id_matapelajaran = nilai.id_matapelajaran 
		INNER JOIN kelas ON kelas.id_kelas = nilai.id_kelas ORDER BY kelas ASC LIMIT $offset, $rowsPerPage";
		
				
		$hasil_nilai=mysql_query($show_nilai,$koneksi);
		while($view_nilai=mysql_fetch_array($hasil_nilai)){
			print("<tr>
    			<td>$view_nilai[kelas]</td>
				<td>$view_nilai[nis]</td>
				<td>$view_nilai[nama]</td>
				<td>$view_nilai[matapelajaran]</td>
				<td align=center>$view_nilai[kog]</td>
				<td align=center>$view_nilai[psiko]</td>
				<td align=center>$view_nilai[afektif]</td>
				<td align=center>$view_nilai[semester]</td>");
				if($pilih_user[status]==admin){
			print("
				<td class=table-common-links><a href=editnilai.php?idn=$view_nilai[id_nilai]>Edit</a>
				<a href=javascript:KonfirmasiHapus('deletenilai.php?idn','$view_nilai[id_nilai]')>Delete</a></td>
  		</tr>");
			}
		}
		print("</table>");		
		// banyaknya row yang ada dalam database 
  		$query   = "SELECT COUNT(*) AS numrows FROM nilai"; 
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
		
		//print("<a href=\"nilaidetail.php?idn=$data[id_nilai]\">$data[matapelajaran]</a>");
		//print("<br/>");	
	//}	
?>
	<br /><br />
	<br /><br />
	<a href="masuk1.php">Keluar</a>
	</p>
                     
        </td>
	</tr>
</table>
	<p>&nbsp;</p></td>
	</center></p>
	
            
      </div>
		</div>
<?php
	include "menu.php";
?>