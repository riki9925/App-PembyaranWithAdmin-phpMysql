<?php
	include "header.php";
?>
<div id="content">
	<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p>      
	<h1>Data Guru</h1>
      <form name="form1" method="post" action="">
	  <table width="300" border="0" class="table-form">
        <tr>
          <td>NIY</td>
          <td><input name="id_guru" type="text" id="id_guru" /></td>
        </tr>
		<tr>
          <td>Nama Lengkap</td>
          <td><input name="guru" type="text" id="guru" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Tambah" class="button" /></td>
        </tr>
      </table>      
      
      </form>
      <p>&nbsp;</p>
	<?php
		include("connect.php");
		$id_guru=$_POST['id_guru'];
		$guru=addslashes($_POST['guru']);
		if(isset($id_guru,$guru)){
			if((!$id_guru)||(!$guru)){
			print("Harap semua data diisi...!!<br>");
			print("<input type='button' value='Back' onclick='self.history.back();'>");
			exit();
			}	
		$add_user="INSERT INTO guru(id_guru,guru) VALUES ('$id_guru','$guru')";
		mysql_query($add_user,$koneksi);
		}
	
		print("<table width=600 border=1 class=table-common>
  		<tr>
    		<th >NIY</th>
			<th >Nama Lengkap</th>
    		<th >Aksi</th>
  		</tr>");
		
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
		$show_user="SELECT * FROM guru ORDER BY guru asc LIMIT $offset, $rowsPerPage";	
		$hasil_user=mysql_query($show_user,$koneksi);
		while($view_user=mysql_fetch_row($hasil_user)){
			print("<tr>
    			<td>$view_user[0]</td>
				<td>$view_user[1]</td>
    			<td class=table-common-links><a href=editguru.php?id=$view_user[0]>Edit</a>
				<a href=javascript:KonfirmasiHapus('deletguru.php?id','$view_user[0]')>Delete</a></td>
  		</tr>");
		}
		print("</table>");
		
		// banyaknya row yang ada dalam database 
  		$query   = "SELECT COUNT(*) AS numrows FROM guru"; 
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