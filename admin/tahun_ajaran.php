<?php
	include "header.php";
?>
<div id="content">
	<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p>
	<h1>Form Kelas</h1>
	<form name="form1" method="post" action="">
	  <table width="300" border="0" class="table-form">
        <tr>
          <td>ID Tahun Ajaran</td>
          <td><input name="id_kelas" type="text" id="id_kelas" /></td>
        </tr>
        <tr>
          <td>Tahun Ajaran</td>
          <td><input name="kelas" type="text" id="kelas" /></td>
        </tr>
		<td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Tambah" class="button" /></td>
		 </tr>
      </table>      
      
      </form>
      <a href="halutama.php"><input type="submit" name="exit" value="Batal" class="button" /></a>
	<?php
		include("../connect.php");
		$id_kelas=$_POST['id_kelas'];
		$kelas=addslashes($_POST['kelas']);
		//$semes=$_POST['semester'];
		//$spp=$_POST['spp'];
		if(isset($id_kelas,$kelas)){
			if((!$id_kelas)||(!$kelas)){
			print "<script>alert ('Harap semua data diisi...!!');</script>";
			print"<script> self.history.back('Gagal Menyimpan');</script>";
			exit();
			}	
		$add_kelas="INSERT INTO tahun_ajaran(id_tahun,tahun_ajaran) VALUES ('$id_kelas','$kelas')";
		mysql_query($add_kelas,$koneksi);
		}
		echo $status;
		print("<table width=600 class=table-common>
  		<tr>
    		<th >Id_Tahun</th>
    		<th >Tahun Ajaran</th>");
			if($pilih_user[status]==admin){
			print("<th >Aksi</th>");
			}
		print("</tr>");
		
		// banyaknya baris per halaman 
 		$rowsPerPage = 9; 
 		// halaman pertama atau default
 		$pageNum = 1; 
 		// digunakan untuk mengambil page number 
 		if(isset($_GET['page'])) { 
    		$pageNum = $_GET['page']; 
 		} 
 		// menambah offset 
 		$offset = ($pageNum - 1) * $rowsPerPage; 
		$show_kelas="SELECT * FROM tahun_ajaran ORDER BY tahun_ajaran ASC LIMIT $offset, $rowsPerPage";
		$hasil_kelas=mysql_query($show_kelas,$koneksi);
		while($view_kelas=mysql_fetch_row($hasil_kelas)){
			print("<tr>
    			<td><center>$view_kelas[0]</center></td>
    			<td>$view_kelas[1]</td>
				");
				if($pilih_user[status]==admin){
			print("
				<td class=table-common-links><a href=javascript:KonfirmasiHapus('deletekelas.php?idk','$view_kelas[0]')>Delete</a></td>
  		</tr>");
			}
		}
		print("</table>");
		
        // banyaknya row yang ada dalam database 
  		$query   = "SELECT COUNT(*) AS numrows FROM kelas"; 
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
	?>
	</div>
</div>
<?php
	include "menu.php";
?>
