<?php
	include "header.php";
	include "../connect.php";
	$show_user="SELECT * FROM login WHERE user='$username'";
	$hasil_user=mysql_query($show_user,$koneksi);
	$view_user=mysql_fetch_row($hasil_user);
?>
<div id="content">
	<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p>
	<h1>Ganti Password</h1>
	<form name="form1" method="post" action="updatepassword.php">
	  <table width="300" border="0" class="table-form">
        <tr>
          <td>User</td>
          <td><input name="user" type="text" id="user" readonly="true" value="<?php print($view_user[0]);?>" /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input name="password" type="password" id="password" value="<?php print($view_user[2]);?>"/></td>
        </tr>
		 <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Edit" class="button" /></td>
        </tr>
      </table>      
      
      </form>
    <p>&nbsp;</p></td>
  </div>
 </div>
 <?php
	include "menu.php";
?>