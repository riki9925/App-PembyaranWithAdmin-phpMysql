<?php
	include "header.php";
?>
<div id="content">
	<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p>
	<h1>Kelas</h1>
	<?php
	include("../connect.php");
	$idkelas=$_GET['idk'];
	$show_kelas="SELECT * FROM jurusan WHERE id_jurusan='$idkelas'";
	$hasil_kelas=mysql_query($show_kelas,$koneksi);
	$view_kelas=mysql_fetch_row($hasil_kelas);
	?>
	<form name="form1" method="post" action="updatejurusan.php">
	  <table width="300" border="0" class="table-form">
        <tr>
          <td>Id Jurusan</td>
          <td><input name="idkelas" type="text" readonly id="idkelas" value="<?php print($view_kelas[0]);?>" /></td>
        </tr>
        <tr>
          <td>Jurusan</td>
          <td><input name="kelas" type="text" id="kelas" value="<?php print($view_kelas[1]);?>"/></td>
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