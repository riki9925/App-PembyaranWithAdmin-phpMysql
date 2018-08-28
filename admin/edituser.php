<?php
	include "header.php";
	include "../connect.php";
	$user=$_GET['usr'];
	$show_user="SELECT * FROM login WHERE user='$user'";
	$hasil_user=mysql_query($show_user,$koneksi);
	$view_user=mysql_fetch_row($hasil_user);
?>
<div id="content">
	<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p>
	<h1>Pengguna</h1>
	<form name="form1" method="post" action="updateuser.php">
	  <table width="300" border="0" class="table-form">
        <tr>
          <td>User</td>
          <td><input name="user" type="text" id="user" value="<?php print($view_user[0]);?>" /></td>
        </tr>
		<tr>
          <td>Nama Lengkap</td>
          <td><input name="nama_guru" type="text" id="nama_guru" value="<?php print($view_user[1]);?>" /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input name="password" type="text" id="password" value="<?php print($view_user[3]);?>"/></td>
        </tr>
		<tr>
		<td>Status</td>
          <td>
		  <select name="status" id="status">
		  <option value="admin">Admin</option>
		  <option value="kepsek">Kepala Sekolah</option>
		  <option value="siswa">Siswa/Wali</option>
		  </select>
		  </td>
		  </tr>
		 <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Edit" class="button" />
		  <input type="submit" name="Submit" value="Back" class="button" /></td>
        </tr>
      </table>      
      
      </form>
    <p>&nbsp;</p></td>
  </div>
 </div>
 <?php
	include "menu.php";
?>