<?php
	include "header.php";
	include("../connect.php");
	$id=$_GET['id'];
	$param=explode('-',$params);
	$nis=$param[0];
	$bulan=$param[1];
	$sems=$param[2];
	$show_nilai="SELECT * FROM nilai WHERE id_nilai='$id'";
	$hasil_nilai=mysql_query($show_nilai,$koneksi);
	$view_nilai=mysql_fetch_array($hasil_nilai);
?>
<div id="content">
	<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p>      
	<h1>Nilai</h1>
      <form name="form1" method="post" action="updatenilai.php">
	  <table width="300" border="0" class="table-form">
        <tr>
          <td>IdNilai</td>
          <td><input name="idnilai" type="text" readonly id="idnilai" value="<?php print($id);?>" /></td>
        </tr>
        <tr>
          <td>NIS</td>
          <td><input name="nis" type="text" readonly id="nis"value="<?php print($nis[0]);?>"/>
		  </td>
        </tr>
		<tr>
          <td>Matapelajaran</td>
          <td>
		  <select name="matapelajaran" id="matapelajaran">
		  <?php
		  $show_mp="SELECT * FROM matapelajaran";
		  $hasil_mp=mysql_query($show_mp,$koneksi);
		  while($mp=mysql_fetch_row($hasil_mp)){
		  ?>
		  <option value="<?php print($mp[0]);?>"
			<?php
			if ($mp[0]==$view_nilai[id_matapelajaran])	{
				print("selected");
			}
			print(">$mp[1]</option>");
			}
			?>
          </select>
		  </td>
		</tr>
		<tr>
          <td>Kelas</td>
          <td>
		  <select name="kelas" id="kelas">
		  <?php
		  $show_kls="SELECT * FROM kelas";
		  $hasil_kls=mysql_query($show_kls,$koneksi);
		  while($kls=mysql_fetch_row($hasil_kls)){
		  ?>
		  <option value="<?php print($kls[0]);?>"
			<?php
			if ($kls[0]==$view_nilai[id_kelas])	{
				print("selected");
			}
			print(">$kls[1]</option>");
			}
			?>
          </select>
		  </td>
		</tr>
		<tr>
          <td>Kognitif</td>
          <td><input name="kog" type="text" id="kog" value="<?php print($view_nilai[kog]);?>" /></td>
        </tr>
		<tr>
          <td>Psikomotor</td>
          <td><input name="psiko" type="text" id="psiko" value="<?php print($view_nilai[psiko]);?>" /></td>
        </tr>
		<tr>
          <td>Afektif</td>
          <td><input name="afektif" type="text" id="afektif" value="<?php print($view_nilai[afektif]);?>" /></td>
        </tr>
			
		<tr>
          <td>Semester</td>
          <td>
		  <select name="semester" id="semester">
			<option value="0" <?php if ($view_nilai[semester]==0) print("selected"); ?> >--Pilih--</option>
			<option value="1" <?php if ($view_nilai[semester]==1) print("selected"); ?> >1</option>
			<option value="2" <?php if ($view_nilai[semester]==2) print("selected"); ?> >2</option>
		  </select>
		  </td>
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
	include "menu.php"
?>