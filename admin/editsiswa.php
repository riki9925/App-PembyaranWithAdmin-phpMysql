<?php
	include "header.php";
	include "../connect.php";
	$nis=$_GET['nis'];
	$show_siswa="SELECT * FROM siswa WHERE nis='$nis'";
	$hasil_siswa=mysql_query($show_siswa,$koneksi);
	$view_siswa=mysql_fetch_row($hasil_siswa);
?>
<div id="content">
	<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p>      
	<h1>Siswa</h1>
      <form name="form1" method="post" action="updatesiswa.php">
	  <table width="327" border="0" class="table-form">
        <tr>
          <td>NIS</td>
          <td><input name="nis" type="text" readonly id="nis" value="<?php print($view_siswa[0]);?>" /></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><input name="nama" type="text" id="nama" value="<?php print($view_siswa[1]);?>"/></td>
        </tr>
		
		<tr>
          <td>Kelas</td>
          <td><select name="kelas" id="kelas">
		  <option value="0">--Pilih--</option>
		  <?php
		  $show_kelas="SELECT * FROM siswa";
		  $hasil_kelas=mysql_query($show_kelas,$koneksi);
		  while($kelas=mysql_fetch_row($hasil_kelas)){
		  ?>
		  <option value="<?php print($kelas[2]);?>"
			<?php
			print(">$kelas[2]</option>");
			}
			?>
          </select>          </td>
		</tr>
		 <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Edit" class="button" /></td>
        </tr>
      </table>         
      </form>
	  
      <p>&nbsp;</p>
	 </div>
</div>
<?php
	include "menu.php";
?>