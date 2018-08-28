<?php
	include "header.php";
?>
<div id="content">
	<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p>      
	<h1>Mata Pelajaran</h1>
	<?php
	include("../connect.php");
	$idmatapelajaran=$_GET['idmp'];
	$show_matapelajaran="SELECT * FROM matapelajaran WHERE id_matapelajaran='$idmatapelajaran'";
	$hasil_matapelajaran=mysql_query($show_matapelajaran,$koneksi);
	$view_matapelajaran=mysql_fetch_row($hasil_matapelajaran);
	?>
	<form name="form1" method="post" action="updatematapelajaran.php">
	  <table width="300" border="0" class="table-form">
        <tr>
          <td>ID Mata Pelajaran</td>
          <td><input name="idmatapelajaran" type="text" id="idmatapelajaran" size="10" value="<?php print($view_matapelajaran[0]);?>" /></td>
        </tr>
        <tr>
          <td>Mata Pelajaran</td>
          <td><input name="matapelajaran" type="text" id="matapelajaran" size="50" value="<?php print($view_matapelajaran[1]);?>"/></td>
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

