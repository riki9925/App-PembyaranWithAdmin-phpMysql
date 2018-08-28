<?php
	include "header.php";
	include("../connect.php");
?>
<div id="content">
	<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p>      
	<h1>Input Nilai</h1>
	  <form name="form1" method="post" action="">
	  <table width="300" border="0" class="table-form">
        <tr>
          <td>Pilih Kelompok</td>
          <td><select>
		  <option value="0">--Pilih--</option>
		  <option value="0" action="nilai_siswa.php">Kelas X</option>
		  <option value="0" action="nilai_siswa_ipa.php">Kelas XI-XII-IPA</option>
		  <option value="0" action="nilai_siswa_ips.php">Kelas XI-XII-IPS</option>
		</tr>
     		
		</tr>
		 <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Cari" class="button" /></td>
        </tr>
      </table>      
     
    </div>
</div>
<?php
	include "menu.php";
?>