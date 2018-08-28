<?php
include "connect.php";
$stat="select * from login where user='$username'";
$q=mysql_query($stat, $koneksi);
$t=mysql_fetch_array($q);
?>
<!--sideleft -->
<div id="sidebar"> 
    <div id="sidebarContents"> 
      <!--Menu Aktif-->
      <div> 
	  <div class="cssvertical">
        <h2><center> Menu Admin</center></h2>
		<ul id="cssvertical"></ul>
				<?php
				if($t['status']=='admin'){
				echo "<ul><li><a href='kelas.php'>.: Input Master Kelas</a></li>";
				echo "<li><a href='jurusan.php'>.: Input Master Jurusan</a></li>";
				echo "<li><a href='tahun_ajaran.php'>.: Input Tahun Ajaran</a></li>";
				echo "<li><a href='siswa.php'>.: Input Data Siswa</a></li>";
				echo "<li><a href='transaksi.php'>.: Transaksi</a></li>";
				
				echo "<li><a href='laporan.php'>.: Laporan</a></li>";
				echo "<li><a href='user.php'>.: User</a></li>";
				echo "<li><a href='password.php'>.: Ubah Password</a></li></ul>";
				}if($t['status']=='kepsek'){
				echo "<ul><li><a href='laporan.php'>.: Laporan</a></li>";
				echo "<li><a href='password.php'>.: Ubah Password</a></li></ul>";
				}if($t['status']=='siswa'){
				echo "<ul><li><a href='masuk1.php'>.: Lihat Info SPP</a>";
				echo "<li><a href='masuk3.php'>.: Cetak SPP</a></li>";
				echo "<li><a href='logout.php'>.: Logout</a></li></ul>";
				//echo "<li><a href='masuk3.php'>.: Cetak Lap SPP</a></li></ul>";
				}
				echo "<ul><li><a href='logout.php'>.: Logout</a></li></ul>";
				?>
		</div>
      </div>
      <hr />
      <small>SMK PB Bontang &copy; 2014 </small> </div>

  </div>
  
    
 </div>
 <div style="height: 250px"></div>
</body>
</html>
