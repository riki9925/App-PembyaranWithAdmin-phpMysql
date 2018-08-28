<?php
	include "../connect.php";
	include "header.php";
?>
<div id="content">
	<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p>      
	<h1>FORM TRANSAKSI</h1>
	<p>
	 <form name="form1" method="post" action="">
	  <table width="327" border="0" class="table-form">
      <strong>CARI:</strong><br>
<form name="form1" action="" method="post" name="pencarian" id="pencarian">
  <input type="text" name="search" id="search">
  <input type="submit" name="submit" id="submit" value="CARI">
</form>

<?php
if ((isset($_POST['submit'])) AND ($_POST['search'] <> "")) {
  $search = $_POST['search'];
  $sql = mysql_query("SELECT * FROM siswa inner join kelas on kelas.spp WHERE nis LIKE '%$search%' ") or die(mysql_error());
  //menampilkan jumlah hasil pencarian
  $jumlah = mysql_num_rows($sql); 
  if ($jumlah > 0) {
    echo '<p>Ada '.$jumlah.' data yang sesuai.</p>';
   
        while ($res=mysql_fetch_array($sql)) {
        $nomor++; echo $nomor.'. ';
        echo "<a href=nilai.php?nis=$res[nis]_$res[spp]> $res[nis] = $res[nama] Klik Jika ingin transaksi <br></a>";
      }
  }
  else {
   // menampilkan pesan zero data
    echo 'Maaf, hasil pencarian tidak ditemukan.';
  }
} 
else { echo 'Masukkan NIM-nya';}

?>

	  </table>      
         </form>
      <p>&nbsp;</p>



	  <?php
	
		$nis=$_POST['nis'];
		$nama=$_POST['nama'];
		$kelas=$_POST['kelas'];
		
		if(isset($nis,$nama,$kelas)){
			if((!$nis)||(!$nama)||(!$kelas))
			{
			print("Harap semua data diisi...!!<br>");
			print"Gagal Menyimpan<br>";
			print("<input type='button' value='Back' onclick='self.history.back();'>");
			exit();
			}	
		$cekdata="select nis from siswa where nis='$nis'"; 
		$ada=mysql_query($cekdata) or die(mysql_error()); 
		if(mysql_num_rows($ada)>0){ 
		echo "<h3>NIM telah Terdaftar! Silahkan diulangi.</h3>"; 
		}else{
		$add_siswa="INSERT INTO siswa(nis,nama,id_kelas) VALUES ('$nis','$nama','$kelas')";
		mysql_query($add_siswa,$koneksi);
		echo "<h3>Data Berhasil di Simpan</h3>";
		}
		}
		print("<table width=700 border=1 class=table-common>
  		<tr>
    		<th >NIM</th>
    		<th >Nama Mahasiswa</th>
			<th >Jurusan</th>");
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
 		$show_siswa="SELECT * FROM siswa INNER JOIN kelas ON kelas.spp
		ORDER BY siswa.id_kelas ASC LIMIT $offset, $rowsPerPage";
		
		$hasil_siswa=mysql_query($show_siswa,$koneksi);
		while($view_siswa=mysql_fetch_array($hasil_siswa)){
			print("<tr>
    			<td><center><a href=nilai.php?nis=$view_siswa[nis]_$view_siswa[spp]>$view_siswa[0]</a></center></td>
    			<td>$view_siswa[1]</td>
				<td>$view_siswa[2]</td>");
					
  		print("</tr>");
			}
		
		print("</table>");
		
		
		// banyaknya row yang ada dalam database 
  		$query   = "SELECT COUNT(*) AS numrows FROM siswa"; 
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
