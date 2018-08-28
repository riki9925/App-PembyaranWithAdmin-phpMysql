<?php
	include "header.php";
?>
<div id="content">
	<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p>      
	<h1>Pengguna</h1>
      <form name="form1" method="post" action="">
	  <table width="300" border="0" class="table-form">
        <tr>
          <td>User</td>
          <td><input name="user" type="text" id="user" /></td>
        </tr>
		<tr>
          <td>Nama Lengkap</td>
          <td><input name="nama_guru" type="text" id="nama_guru" /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input name="password" type="password" id="password" /></td>
        </tr>
		<tr>
          <td>Status</td>
          <td>
		  <select name="status" id="status">
		  <option value="admin">Admin</option>
		  <option value="guru">Guru</option>
		  <option value="siswa">Siswa/Wali</option>
		  </select>
		  </td>
        </tr>
		 <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Tambah" class="button" /></td>
        </tr>
      </table>      
      
      </form>
      <p>&nbsp;</p>
	<?php
		include("../connect.php");
		$user=$_POST['user'];
		$nama_guru=addslashes($_POST['nama_guru']);
		$password=$_POST['password'];
		$status=$_POST['status'];
		if(isset($user,$password)){
			if((!$user)||(!$password)){
			print("Harap semua data diisi...!!<br>");
			print("<input type='button' value='Back' onclick='self.history.back();'>");
			exit();
			}	
		$cekdata="select user from login where user='$user'"; 
		$ada=mysql_query($cekdata) or die(mysql_error()); 
		if(mysql_num_rows($ada)>0){ 
		echo "<h3>Nama Telah Terdaftar! Silahkan diulangi.</h3>"; 
		}else{
		$add_user="INSERT INTO login(user,nama_guru,password,password_asli,status) VALUES ('$user','$nama_guru',md5('$password'),'$password','$status')";
		mysql_query($add_user,$koneksi);
		echo "<h3>Data User Berhasil di Simpan</h3>";
		}
	}
		print("<table width=780 border=1 class=table-common>
  		<tr>
    		<th >User Name</th>
			<th >Nama Lengkap</th>
    		<th >Password</th>
			<th >Password Asli</th>
			<th >Status</th>
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
		$show_user="SELECT * FROM login ORDER BY user asc LIMIT $offset, $rowsPerPage";	
		$hasil_user=mysql_query($show_user,$koneksi);
		while($view_user=mysql_fetch_row($hasil_user)){
			print("<tr>
    			<td>$view_user[0]</td>
				<td>$view_user[1]</td>
    			<td>$view_user[2]</td>
				<td>$view_user[3]</td>
				<td>$view_user[4]</td>
				<td class=table-common-links><a href=edituser.php?usr=$view_user[0]>Edit</a>
				<a href=javascript:KonfirmasiHapus('deleteuser.php?usr','$view_user[0]')>Delete</a></td>
  		</tr>");
		}
		print("</table>");
		
		// banyaknya row yang ada dalam database 
  		$query   = "SELECT COUNT(*) AS numrows FROM login"; 
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