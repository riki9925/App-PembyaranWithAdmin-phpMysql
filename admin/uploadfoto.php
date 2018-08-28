//form untuk input foto
<table border="2" bordercolorlight="#33FF66">
<form method="post" action="simpan_foto.php" enctype="multipart/form-data">
<tr><td>nama foto </td><td> <input type="text" name="nama" /></td></tr>
<tr><td valign="top">keterangan </td><td><textarea name="keterangan"> </textarea></td></tr>
<tr><td>masukan gambar </td><td><input type="file" name="gambar" /> </td></tr>
<tr><td colspan="2"><input type="submit" value="simpan gambar " /></td></tr>
</form>
</table>
Langkah 3
Hapus.php //berfungsi untuk menghapus foto
<?php
include ('koneksi.php');
$hapus=mysql_query("delete from foto where id='$_GET[id]' ") or die ("gagal hapus");
echo "<script>alert('data telah di hapus');document.location='tampil_foto.php' </script> ";
?>
Langkah 4
Tampil.php //untuk enampilkan foto
<?php
include('koneksi.php');
echo "<center><table border=1>
<tr><td>NAMA FOTO </td><td>KETERANGAN </td><td>GAMBAR </td><td>AKSI </td></tr> ";
$lihat=mysql_query("select *from foto ");
while($data=mysql_fetch_array($lihat))
{
echo "<tr><td>$data[nama_foto]</td>
          <td width=200>$data[keterangan] </td>
                                  <td><img src=’foto/$data[gambar]’ width=70 height=50 ></td>
                                  <td><a href='hapus.php?id=$data[id]'>hapus</a> | <a href='edit.php?id=$data[id]'>edit </a> </td></tr> ";
}
echo "</table>
<a href=upload_foto.php>Input Foto Lagi </a>
</center>";
?>
Langkah 5
Simpan_foto.php //untuk menyimpan foto kedalam database
<?php
include ('koneksi.php');
$filename=$_FILES['gambar']['name'];
$move=move_uploaded_file($_FILES['gambar']['tmp_name'],'foto/'.$filename);
$simpan=mysql_query("insert into foto(nama_foto,keterangan,gambar) values('$_POST[nama]','$_POST[keterangan]','$filename')") or die ("gagal simpan");
echo "<script>alert ('data telah di simpan '); document.location='tampil_foto.php' </script> ";
?>
Langkah 6
Edit.php //form edit gambar
<?php
include ('koneksi.php');
$edit=mysql_query("select *from foto where id='$_GET[id]'");
$e=mysql_fetch_array($edit);
echo "<table border=1>
<form method=post action=update.php enctype=multipart/form-data>
<input type=hidden name=id value=$e[id]>
<tr><td>Nama Foto</td><td><input type=text name=nama value='$e[nama_foto]' </td></tr>
<tr><td>Keterangan </td><td><textarea name=keterangan>$e[keterangan] </textarea></tr></td>
<tr><td>Gambar </td><td><img src=’foto/$e[gambar]‘ width=50 height=50 > </td></tr>
<tr><td>Gambar </td><td><input type=file name=gambar>*kosongkan jika gambar tidak di ubah </td></tr>
</table>
<input type=submit value=update >
</form> ";
?>
Langkah 7
Update.php //script untuk edit foto
<?php
include ('koneksi.php');
$filename=$_FILES['gambar']['name'];
$move=move_uploaded_file($_FILES['gambar']['tmp_name'],'foto/'.$filename);
if(empty($filename))   //jika gambar kosong atau tidak di ganti
{
                $update=mysql_query("update foto set nama_foto='$_POST[nama]',keterangan='$_POST[keterangan]' where id='$_POST[id]' ") or die ("gagal update ");
echo "<script>alert ('data telah di update ');document.location='tampil_foto.php' </script> ";
}
elseif (!empty($filename)) // jika gambar di ganti
{
                $update=mysql_query("update foto set nama_foto='$_POST[nama]',keterangan='$_POST[keterangan]',gambar='$filename' where id='$_POST[id]' ") or die ("gagal update gambar ");
echo "<script>alert ('data telah di update ');document.location='tampil_foto.php' </script> ";
}
?>