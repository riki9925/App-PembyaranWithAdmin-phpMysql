<?php
	include "header.php";
	include "../connect.php";
	$id_guru=$_GET['id'];
	$show_user="SELECT * FROM guru WHERE id_guru='$id_guru'";
	$hasil_user=mysql_query($show_user,$koneksi);
	$view_user=mysql_fetch_row($hasil_user);
?>
<div id="content">
	<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p>
	<h1>Edit Data Guru</h1>
	<form name="form1" method="post" action="updateguru.php">
	  <table width="300" border="0" class="table-form">
        <tr>
          <td>NIY</td>
          <td><input name="id_guru" type="label" id="id_guru"value="<?php print($view_user[0]);?>" Readonly/></td>
        </tr>
		<tr>
          <td>Nama Lengkap</td>
          <td><input name="guru" type="text" id="guru" value="<?php print($view_user[1]);?>"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Edit" class="button" />
		  
        </tr>
      </table>      
      
      </form>
    <p>&nbsp;</p></td>
  </div>
 </div>
 <?php
	include "menu.php";
?>