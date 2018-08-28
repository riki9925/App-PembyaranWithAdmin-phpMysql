<?php
	include "header.php";
?>
<div id="content">
	<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p>      
	<h1>Mata Pelajaran</h1>
	<form name="form1" method="post" action="">
	  <table width="300" border="0" class="table-form">
        <tr>
          <td>ID Bulan</td>
          <td><input name="id_bulan" size="10" type="text" id="id_bulan" /></td>
        </tr>
        <tr>
          <td>Nama Bulan</td>
          <td><input name="bulan" size="50" type="text" id="bulan" /></td>
        </tr>
		 <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Submit" class="button" /></td>
        </tr>
      </table>      
      
      </form>
      <p>&nbsp;</p>
	<?php
		include("../connect.php");
		$id_bulan=$_POST['id_bulan'];
		$bulan=$_POST['bulan'];
		if(isset($id_bulan,$bulan)){
			if((!$id_bulan)||(!$bulan)){
			print("Harap semua data diisi...!!<br>");
			print("<input type='button' value='Back' onclick='self.history.back();'>");
			exit();
			}	
		$add_matapelajaran="INSERT INTO bulan(id_bulan,bulan) VALUES ('$id_bulan','$bulan')";
		mysql_query($add_matapelajaran,$koneksi);
		}
		
		print("<table width=600 border=1 class=table-common>
  		<tr>
    		<th >ID Mata Pelajaran</th>
    		<th >Mata Pelajaran</th>");
			if($pilih_user[status]==admin){
			print("<th >Aksi</th>");
			}
		print("</tr>");
		
        // banyaknya baris per halaman 
 		$rowsPerPage = 9; 
 		// halaman pertama atau default
 		$pageNum = 1; 
 		// digunakan untuk mengambil page number 
 		if(isset($_GET['page'])) { 
    		$pageNum = $_GET['page']; 
 		} 
 		// menambah offset 
 		$offset = ($pageNum - 1) * $rowsPerPage; 
		$show_matapelajaran="SELECT * FROM bulan ORDER BY id_bulan ASC LIMIT $offset, $rowsPerPage";		
		$hasil_matapelajaran=mysql_query($show_matapelajaran,$koneksi);
		while($view_matapelajaran=mysql_fetch_row($hasil_matapelajaran)){
			print("<tr>
    			<td>$view_matapelajaran[0]</td>
    			<td>$view_matapelajaran[1]</td>");
				if($pilih_user[status]==admin){
			print("
				<td class=table-common-links><a href=editmatapelajaran.php?idmp=$view_matapelajaran[0]>Edit</a>
				<a href=javascript:KonfirmasiHapus('deletematapelajaran.php?idmp','$view_matapelajaran[0]')>Delete</a></td>
  		</tr>");
			}
		}
		print("</table>");
		// banyaknya row yang ada dalam database 
  		$query   = "SELECT COUNT(*) AS numrows FROM bulan"; 
  		$result  = mysql_query($query); 
  		$row     = mysql_fetch_array($result); 
  		$numrows = $row['numrows']; 
    	// banyaknya halaman yang dipunyai yang digunakan paging 
  		$maxPage = ceil($numrows/$rowsPerPage); 
  		$self = $_SERVER['PHP_SELF']; 
		
 		// membuat link 'previous' dan 'next'  
 		if ($pageNum > 1) 
 		{ 
    		$page = $pageNum - 1; 
			print(" <a href=\"$self?page=1\">[First Page]</a> "); 
    		print(" <a href=\"$self?page=$page\">[Prev]</a> "); 
        }	
  		else 
 		{ 
    		print(" [First Page] "); 
			print(" [Prev] ");       
 		} 
	
  		if ($pageNum < $maxPage) 
  		{ 
    		$page = $pageNum + 1; 
    		print(" <a href=\"$self?page=$page\">[Next]</a> "); 
        	print(" <a href=\"$self?page=$maxPage\">[Last Page]</a> "); 
  		}  
   		else 
  		{ 
    		print(" [Next] ");       
    		print(" [Last Page] ");  
  		}

		?>
    </div>
</div>
<?php
	include "menu.php";
?>