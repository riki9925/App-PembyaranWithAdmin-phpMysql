<?php
	include "header.php";
?>
<!--COntent -->
<div id="content">
		<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p> 	
	<h1> Laporan Pembayaran </h1>
	  <table width="300" border="0" class="table-form">
        <tr>
          <td>&nbsp;Cari Berdasar NIM</td><td>:</td>
          <td>
		  <form method="post" action="printsppnim.php" id="form-login"name="form1">
		  <input type="text" id="nis" name="nis"/>
		  <td><input name="login" type="submit" value="Enter" class="button" /></td></td>
		  </form>
        </tr>
        <tr>
          <td>&nbsp;Cari Berdasar Jurusan</td><td>:</td>
          <td>
		  <form method="post" action="aksi.php" id="form-login"name="form1">		
		  <select name="kelas" id="kelas">
		  <option value="0">--Pilih--</option>
		  <?php
		  $show_kelas="SELECT * FROM kelas inner join jurusan on jurusan.id_jurusan";
		  $hasil_kelas=mysql_query($show_kelas,$koneksi);
		  while($kelas=mysql_fetch_array($hasil_kelas)){
		  ?>
		  <option value="<?php print($kelas[kelas]);print('-'); print($kelas[kjurusan]);?>"
			<?php
			print(">$kelas[kelas]-$kelas[kjurusan]</option>");
			}
			?>
          </select>          
		  <td><input name="login" type="submit" value="Enter" class="button" /></td>
		  </td>
		</form>
        </tr>	
		<tr>
          <td>&nbsp;Cari Berdasar Bulan</td><td>:</td>
          <td>
		  <form method="post" action="aksiku.php" id="form-login"name="form1">		
		  <select name="bulan" id="bulan">
		  <option value="0">--Pilih--</option>
		  <?php
		  $show_bulan="SELECT * FROM bulan order  by id_bulan asc";
		  $hasil_bulan=mysql_query($show_bulan,$koneksi);
		  while($bulan=mysql_fetch_row($hasil_bulan)){
		  ?>
		  <option value="<?php print($bulan[0]);?>"
			<?php
			print(">$bulan[1]</option>");
			}
			?>
          </select>         
		  <td><input name="login" type="submit" value="Enter" class="button" /></td>
		 </td> 
		 </form>
	    </tr>	
	
</table>
<h1> Laporan Tunggakan Pembayaran </h1>
	  <table width="300" border="0" class="table-form">
        <tr>
          <td>&nbsp;Cari Berdasar NIM</td><td>:</td>
          <td>
		  <form method="post" action="tunggaknis.php" id="form-login"name="form1">
		  <input type="text" id="nis" name="nis"/>
		  <td><input name="login" type="submit" value="Enter" class="button" /></td></td>
		  </form>
        </tr>
        <tr>
          <td>&nbsp;Cari Berdasar Jurusan</td><td>:</td>
          <td>
		  <form method="post" action="tunggakkelas.php" id="form-login"name="form1">		
		  <select name="kelas" id="kelas">
		  <option value="0">--Pilih--</option>
		  <?php
		  $show_kelas="SELECT * FROM kelas inner join jurusan on jurusan.id_jurusan";
		  $hasil_kelas=mysql_query($show_kelas,$koneksi);
		  while($kelas=mysql_fetch_array($hasil_kelas)){
		  ?>
		  <option value="<?php print($kelas[kelas]);print('-'); print($kelas[kjurusan]);?>"
			<?php
			print(">$kelas[kelas]-$kelas[kjurusan]</option>");
			}
			?>
          </select>          
		  <td><input name="login" type="submit" value="Enter" class="button" /></td>
		  </td>
		</form>
        </tr>	
			
</table>
	<br /><br />
	<br /><br />
	
	              
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
                
