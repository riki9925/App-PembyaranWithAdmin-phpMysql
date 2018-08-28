<?php
// send wml headers
header("Content-type: text/vnd.wap.wml"); 
echo "<?xml version=\"1.0\"?>"; 
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.1//EN\"" 
   . " \"http://www.wapforum.org/DTD/wml_1.1.xml\">";
?>
<wml>
	<card id="home" title=".:: Info Nilai ::."> 
		<p align="center"><br/>
			Sistem Informasi Nilai Siswa<br/>
			SMA Negeri Cipete<br/><br/>
                     Jl. RS. Fatmawati<br/>

	<a href="#masuk">Masuk</a>
	</p>
	</card>
 
	<card id="masuk" title=".:: Info Nilai  ::."> 
 	<p align="center"><br/>
 	<b>DAFTAR NILAI</b><br/> Jika ada kekeliruan mohon berhubungan dengan Guru Mapel masing-masing<br/><br/>
 	<do type="accept" label="Simpan">
  		<go method="post" href="semester.php">
  		<postfield name="nis" value="$nis"/>
  		
  		</go>
  	</do>
  	<b>Masukkan Data</b><br/><br/>
  	NIS: <input type="text" name="nis" maxlength="25" />
  	

 </p>
 </card>     
</wml>

