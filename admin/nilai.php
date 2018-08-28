<?php
	include "header.php";
	include("connect.php");
	$nis=$_GET['nis'];
	$params=$_GET['nis'];
	$param=explode('_',$params);
	$nis=$param[0];
	$spp=$param[1];
	$show_siswa="SELECT * FROM kelas 
	inner join siswa on siswa.id_kelas=kelas.id_kelas
	WHERE nis='$nis'";
	$hasil_siswa=mysql_query($show_siswa,$koneksi);
	$view_siswa=mysql_fetch_array($hasil_siswa);
	//echo($nis=$view_siswa[nis]);
	//echo ($view_siswa[semester]);
?>
<div id="content">
	<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p>      
	<h1>FROM TRANSAKSI</h1>
	  <form name="form1" method="post" action="">
	  <table width="300" border="0" class="table-form">
        <tr>
		<td>NIM</td>
          <td><input name="nis" type="text" readonly id="nis" size="7"value="<?php echo "$nis";?>"/></td>
          </td>
        </tr>
		<tr>
          <td>Bayar Bulan</td>
          <td>
		  <select name="bulan" id="bulan">
		  <option value="0">--Pilih--</option>
		  <?php
		  $show_bulan="SELECT * FROM bulan order by id_bulan asc";
		  $hasil_bulan=mysql_query($show_bulan,$koneksi);
		  while($bul=mysql_fetch_row($hasil_bulan)){
		  ?>
		  <option value="<?php print($bul[0]);?>"
			<?php
			print(">$bul[1]</option>");
			}
			?>
          </select>
		  </td>
		</tr>
		<tr>
          <td>Nominal</td>
          <td><input name="bayar" type="text"readonly id="bayar" size="7"value="<?php print($spp);?>"/></td>
        </tr>  
		<tr>
          <td>Semester</td>
          <td><select name="semes" id="semes">
		  <option value="0">--Pilih--</option>
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		  <option value="5">5</option>
		  <option value="6">6</option>
		  </td>
        </tr>

		 <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Tambah" class="button" /></td>
        </tr>
		
      </table>      
      
      </form>
	  <a href="halutama.php"><input type="submit" name="exit" value="Batal" class="button" /></a>
      <p>&nbsp;</p>
	  
	<?php
		include("connect.php");
		$nis=$_POST['nis'];
		$bulan=$_POST['bulan'];
		$bayar=$_POST['bayar'];
		$semes=$_POST['semes'];
		
		//data kelas
		$q_kls="SELECT id_kelas FROM siswa WHERE nis='$nis'";
		$hsl_kls=mysql_query($q_kls,$koneksi);
		$data=mysql_fetch_array($hsl_kls);
		$kelas=$data[id_kelas];
		$tgl=date('d-m-Y');
		$n=1;
		
		if(isset($nis,$bulan,$semes)){
			if((!$nis)||(!$bulan)||(!$semes)){
			print "<script>alert ('Harap semua data diisi...!!');</script>";
			print"<script> self.history.back('Gagal Menyimpan');</script>";
			exit();
			
			}	
		$cekdata="select id_bayar from stor where id_bayar='$nis-$bulan-$semes'"; 
		$ada=mysql_query($cekdata) or die(mysql_error()); 
		if(mysql_num_rows($ada)>0){ 
		echo "<h3>Siswa telah Membayar Silahkan diulangi.</h3>"; 
			}
			
			else{
			
		
						
		$add="INSERT INTO stor (id_bayar,bayar,bln,semester,id_bulan,nis,id_kelas,tglupdate) VALUES ('$nis-$bulan-$semes','$bayar','$n','$semes','$bulan','$nis','$kelas','$tgl')";
		mysql_query($add,$koneksi) or die("Data sudah ada <br> <input type='button' value='Back' onclick='self.history.back();'>");
		print "<script> alert ('Berhasil di Simpan');</script>";
		print "<?php 'cetaknilai.php'?>";
		
		$ambil="select id_bayar,bayar,SUM(bayar)as jml_bayar,bln,SUM(bln)as jml_bul,semester,id_bulan,nis,id_kelas,tglupdate from stor Where nis='$nis'";
		$q_ambil=mysql_query($ambil,$koneksi);
		$q_jukut=mysql_fetch_array($q_ambil);
		
		$a=$q_jukut[jml_bul];
		//echo"<p>$a" ;
		$sisa=12-$a;
		//echo"<p>sisa bulan=$sisa";
		$b=$a * $q_jukut[bayar];
		//echo"<p>$b";
		$sisabayar=$sisa * $q_jukut[bayar];
		//Echo"<p>$sisabayar";
		
		$cekdata1="select id_tunggakkan from tunggakan where id_tunggakkan='$nis-$semes'"; 
		$ada1=mysql_query($cekdata1) or die(mysql_error()); 
		if(mysql_num_rows($ada1)>0){ 
		
		$nunggak="UPDATE tunggakan SET jml_bln_tunggakan='$sisa', jml_tunggakkan='$sisabayar'
		Where id_tunggakkan='$nis-$semes'";
		mysql_query($nunggak,$koneksi) or die (mysql_error());		
		
		}
		else{
		
		$masuk="INSERT INTO tunggakan (id_tunggakkan,jml_bln_tunggakan,jml_tunggakkan,nis,id_kelas,semester)
		VALUES('$nis-$semes','$sisa','$sisabayar','$nis','$kelas','$semes')";
		mysql_query($masuk,$koneksi) or die(mysql_error()); 
			}
		}
	}	
		
		print("<table width=700 border=1 class=table-common>
  		<tr>
			<th >NIM</th>
			<th >Jurusan</th>
			<th >Nama</th>
			<th >Bulan</th>
			<th >Bayar</th>
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
		$show_nilai="SELECT * FROM stor 
		INNER JOIN siswa ON siswa.nis = stor.nis 
		INNER JOIN bulan ON bulan.id_bulan = stor.id_bulan 
		where stor.nis='$nis'";
		
				
		$hasil_nilai=mysql_query($show_nilai,$koneksi);
		while($view_nilai=mysql_fetch_array($hasil_nilai)){
			print("<tr>
    			<td>$view_nilai[nis]</td>
				<td>$view_nilai[id_kelas]</td>
				<td>$view_nilai[nama]</td>
				<td>$view_nilai[bulan]</td>
				<td align=center>$view_nilai[bayar]</td>
				<td align=center>$view_nilai[semester]</td>");
				
				if($pilih_user[status]==admin){
			print("
				<td class=table-common-links><a href=editnilai.php?id=$view_nilai[id_bayar]>Edit</a>
				<a href=javascript:KonfirmasiHapus('deletenilai.php?idn','$view_nilai[id_bayar]')>Delete</a>
				<a href=cetaknilai.php?idn=$view_nilai[id_bayar]>cetak</a></td>
  		</tr>");
			}
		}
		print("</table>");		
		// banyaknya row yang ada dalam database 
  		$query   = "SELECT COUNT(*) AS numrows FROM stor"; 
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