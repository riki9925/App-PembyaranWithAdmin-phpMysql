<?php
include "connect.php"
?>
<html>
<head>
<Body>
<?php
$data="select * from siswa where nis";
$query=mysql_query($data,$koneksi);
$hasil=mysql_fetch_array($query);

print("<tr
<table border="1px">
<th>NIS</th>
<th>Nama</th>
<th>Mapel</th>
");
print("</tr>");
print("<td>$hasil[nis]</td>");
</table>
</body>
</head>
</html>