<?php
	include "header.php";
	
?>
<!--COntent -->
<div id="content">
		<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p> 		
	<table border="0" width="50%" id="table1" height="211" align="left">
	<tr>
		<td height="54" align="left" ><font face="Arial" size=""><b>IMPORT NILAI</b></font>
	
	<?php
	include "excel_reader.php";
	include "connect.php";
// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
  // membaca data nim (kolom ke-1)
	$id_nilai = $data->val($i, 1);
  // membaca data nama (kolom ke-2)
	$kog = $data->val($i, 2);
  // membaca data alamat (kolom ke-3)
	$psiko= $data->val($i, 3);
	$afektif= $data->val($i, 4);
	$semester= $data->val($i, 5);
	$id_matapelajaran= $data->val($i, 6);
	$nis= $data->val($i, 7);
	$id_kelas= $data->val($i, 8);
	$tglupdate= $data->val($i, 9);
  // setelah data dibaca, sisipkan ke dalam tabel mhs
  $query = "INSERT INTO nilai VALUES ('$id_nilai', '$kog', '$psiko', '$afektif', '$semester','$id_matapelajaran','$nis','$id_kelas','$tglupdate')";
  $hasil = mysql_query($query);

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
  if ($hasil) $sukses++;
  else $gagal++;
}

// tampilan status sukses dan gagal

echo "<h3>Proses import data selesai.</h3>";
echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
echo "Jumlah data yang gagal diimport : ".$gagal."</p>";

?>
</table>

	<br /><br />
	<br /><br />
	
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




