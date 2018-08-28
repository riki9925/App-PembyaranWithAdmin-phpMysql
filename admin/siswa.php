<?php
	include "../connect.php";
	include "header.php";
?>
<div id="content">
	<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p>      
	<h1>FORM DATA SISWA</h1>
	
	 <form enctype="multipart/form-data" name="form1" method="post" action="">
	  <table width="327" border="0" class="table-form">
        <tr>
          <td>NIM</td>
          <td><input name="nis" type="text" id="nis" maxlength="6" /></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><input name="nama" type="text" id="nama" /></td>
        </tr>
		
		<tr>
          <td>Kelas</td>
          <td><select name="kelas" id="kelas">
		  <option value="0">--Pilih--</option>
		  <?php
		  $show_kelas="SELECT * FROM kelas";
		  $hasil_kelas=mysql_query($show_kelas,$koneksi);
		  while($kelas=mysql_fetch_row($hasil_kelas)){
		  ?>
		  <option value="<?php print($kelas[1]);?>"
			<?php
			print(">$kelas[1]</option>");
			}
			?>
          </select>          </td>
		</tr>
		<tr>
          <td>Jurusan</td>
          <td><select name="jur" id="jur">
		  <option value="0">--Pilih--</option>
		  <?php
		  $show_jur="SELECT * FROM jurusan";
		  $hasil_jur=mysql_query($show_jur,$koneksi);
		  while($jur=mysql_fetch_row($hasil_jur)){
		  ?>
		  <option value="<?php print($jur[1]);?>"
			<?php
			print(">$jur[1]</option>");
			}
			?>
          </select>          </td>
		</tr>
		<tr>
          <td>Tahun Ajaran</td>
          <td><select name="ta" id="ta">
		  <option value="0">--Pilih--</option>
		  <?php
		  $show_jur="SELECT * FROM tahun_ajaran";
		  $hasil_jur=mysql_query($show_jur,$koneksi);
		  while($jur=mysql_fetch_row($hasil_jur)){
		  ?>
		  <option value="<?php print($jur[1]);?>"
			<?php
			print(">$jur[1]</option>");
			}
			?>
          </select>          </td>
		</tr>
		<tr><td>Photo </td><td><input type="file" name="gambar" /> </td></tr>
		 <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Tambah" class="button" /></td>
        </tr>
      </table>      
         </form>
<a href="halutama.php"><input type="submit" name="exit" value="Batal" class="button" /></a>
<p><strong>CARI:</strong><br>
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


	  <?php
		$folder = "../foto/"; 
		$folder = $folder . basename( $_FILES['gambar']['name']); 
		$gambar =($_FILES['gambar']['name']); 
		$nis=$_POST['nis'];
		$nama=$_POST['nama'];
		$kelas=$_POST['kelas'];
		$jur=$_POST['jur'];
		$ta=$_POST['ta'];
		//if (!empty($_FILES["nama_file"]["tmp_name"]))
		
		if(isset($nis,$nama,$kelas,$jur,$gambar)){
			if((!$nis)||(!$nama)||(!$kelas)||(!$jur)||(!$ta)||(!$gambar))
			{
			print "<script>alert ('Harap semua data diisi...!!');</script>";
			print"<script> self.history.back('Gagal Menyimpan');</script>";
			exit();
			}	
		$cekdata="select nis from siswa where nis='$nis'"; 
		$ada=mysql_query($cekdata) or die(mysql_error()); 
		if(mysql_num_rows($ada)>0){ 
		echo "<h3>NIM telah Terdaftar! Silahkan diulangi.</h3>"; 
		}else{
		$add_siswa="INSERT INTO siswa(nis,nama,id_kelas,tahun_ajaran,foto) VALUES ('$nis','$nama','$kelas-$jur','$ta','$gambar')";
		mysql_query($add_siswa,$koneksi);
		if(move_uploaded_file($_FILES['gambar']['tmp_name'], $folder)){
		echo "<script>alert ('Data telah di simpan ');</script> ";
		} else { 
		echo "<script>alert ('Sorry, there was a problem uploading your file'); </script>"; 
				} 
			}
		}
		print("<table width=700 border=1 class=table-common>
  		<tr>
    		<th >NIS</th>
    		<th >Nama Siswa</th>
			<th >Kelas</th>
			<th >Photo</th>");
    		
			if($pilih_user[status]==admin){
			print("<th >Aksi</th>");
			}
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
 		$show_siswa="SELECT * FROM siswa  
		LIMIT $offset, $rowsPerPage";
		//<a href=nilai.php?nis=$view_siswa[nis]_$view_siswa[spp]>
		$hasil_siswa=mysql_query($show_siswa,$koneksi);
		while($view_siswa=mysql_fetch_array($hasil_siswa)){
			print("<tr>
    			<td><center>$view_siswa[nis]</a></center></td>
    			<td>$view_siswa[nama]</td>
				<td>$view_siswa[id_kelas]</td>
				<td><center><img class='gambar' src='../foto/$view_siswa[foto]' width=50px height=60px /></a></center></td>
				");
				if($pilih_user[status]==admin){
			print("	<td class=table-common-links><a href=editsiswa.php?nis=$view_siswa[0]>Edit</a>
				<a href=javascript:KonfirmasiHapus('deletesiswa.php?nis','$view_siswa[0]')>Delete</a></td>
  		</tr>");
			}
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