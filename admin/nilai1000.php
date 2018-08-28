<?php
	include "header.php";
	include("../connect.php");
?>
<div id="content">
	<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p>      
	<h1>Nilai</h1>
	  <form name="form1" method="post" action="">
	  <table width="300" border="0" class="table-form">
        <tr>
          <td>NIS</td>
          <td><select name="nis" id="nis">
		  <option value="0">--Pilih--</option>
		  <?php
		  $show_siswa="SELECT * FROM siswa order by nis asc";
		  $hasil_siswa=mysql_query($show_siswa,$koneksi);
		  while($siswa=mysql_fetch_row($hasil_siswa)){
		  ?>
		  <option value="<?php print($siswa[0]);?>"
			<?php
			print(">$siswa[0]</option>");
			}
			?>
          </select>
		  </td>
        </tr>
		<tr>
          <td>Mata Pelajaran</td>
          <td>
		  <select name="matapelajaran" id="matapelajaran">
		  <option value="0">--Pilih--</option>
		  <?php
		  $show_mp="SELECT * FROM matapelajaran order by matapelajaran asc";
		  $hasil_mp=mysql_query($show_mp,$koneksi);
		  while($mp=mysql_fetch_row($hasil_mp)){
		  ?>
		  <option value="<?php print($mp[0]);?>"
			<?php
			print(">$mp[1]</option>");
			}
			?>
          </select>
		  </td>
		</tr>
		<tr>
          <td>Nilai</td>
          <td><input name="nilai" type="text" id="nilai" /></td>
        </tr>
		<tr>
          <td>Semester</td>
          <td>
		  <select name="semester" id="semester">
			<option value="0">--Pilih--</option>
			<option value="1">1</option>
			<option value="2">2</option>
		  </select>
		  </td>
        </tr>
		 <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Tambah" class="button" /></td>
        </tr>
      </table>      
      
      </form>
      <p>&nbsp;</p>
	<?php
		//include("../connect.php");
		$nis=$_POST['nis'];
		$matapelajaran=$_POST['matapelajaran'];
		$nilai=$_POST['nilai'];
		$semester=$_POST['semester'];
		//data kelas
		$q_kls="SELECT id_kelas FROM siswa WHERE nis='$nis'";
		$hsl_kls=mysql_query($q_kls,$koneksi);
		$data=mysql_fetch_array($hsl_kls);
		$kelas=$data[id_kelas];
		$tgl=date('d-m-Y');
		if(isset($nis,$matapelajaran,$nilai,$semester)){
			if((!$nis)||(!$matapelajaran)||(!$nilai)){
			print("Harap semua data diisi...!!<br>");
			print("<input type='button' value='Back' onclick='self.history.back();'>");
			exit();
			}	
		$add_nilai="INSERT INTO nilai(id_nilai,nilai,semester,id_matapelajaran,nis,id_kelas,tglupdate) VALUES ('$nis-$matapelajaran-$semester','$nilai','$semester','$matapelajaran','$nis','$kelas','$tgl')";
		mysql_query($add_nilai,$koneksi) or die("Data sudah ada <br> <input type='button' value='Back' onclick='self.history.back();'>");
		}
		
		print("<table width=700 border=1 class=table-common>
  		<tr>
			<th >Kelas</th>
    		<th >NIS</th>
			<th >Nama</th>
			<th >MataPelajaran</th>
			<th >Nilai</th>
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
		
 		$show_nilai="SELECT id_nilai,nilai.nis,nama,nilai,semester,kelas,matapelajaran FROM nilai INNER JOIN siswa ON siswa.nis = nilai.nis INNER JOIN matapelajaran ON matapelajaran.id_matapelajaran = nilai.id_matapelajaran INNER JOIN kelas ON kelas.id_kelas = nilai.id_kelas ORDER BY matapelajaran ASC LIMIT $offset, $rowsPerPage";
		$hasil_nilai=mysql_query($show_nilai,$koneksi);
		while($view_nilai=mysql_fetch_array($hasil_nilai)){
			print("<tr>
    			<td>$view_nilai[kelas]</td>
				<td>$view_nilai[nis]</td>
				<td>$view_nilai[nama]</td>
				<td>$view_nilai[matapelajaran]</td>
				<td align=center>$view_nilai[nilai]</td>
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
		
		?>
    </div>
</div>
<?php
	include "menu.php";
?>