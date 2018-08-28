<?php
	include "header.php";
?>
<!--COntent -->
<div id="content">
		<div id="subcontent-wide">
    <div class="subcontent-element">
	<p>&nbsp;</p> 		
	<table border="0" width="50%" id="table1" height="211" align="left"class="table-form">
	<tr>
		<td height="54" align="left" ><font face="Arial" size="4"><b>IMPORT NILAI</b></font></td>
	</tr>
	<tr>
		<td height="150" align="left" valign="top" ><p>Silakan Pilih File Excel: </p>
		  <p><font face="Arial"><b>	      </p>
			<form method="post" enctype="multipart/form-data" action="importsiswaku.php">
			<input name="userfile" type="file"class="table-form"> <p>
			<input name="upload" type="submit" value="Import" class="button">
		  </td>
	  </tr>
</table>

	<br /><br />
	<br /><br />
	
	</p>
                     
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
