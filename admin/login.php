<html>
<head>
<title>Form Login</title>
<link rel="stylesheet" type="text/css" href="./login.css">
</head>
<body>
<center>
	<div id="loginWrapper">
		<div id="loginBox">	
			<div id="loginBox-head">
				<h1>ADMINISTRATOR LOGIN </h1>
			</div>
			<div id="loginBox-title">
				<h2>ADMINISTRATOR LOGIN </h2>
			<div id="loginBox-body">
			
				<form method="post" action="cekpasswd.php" id="form-login">
				<center><small>Silakan Login dengan username anda..!</small></center><p>
					<label for="aid_username">Username</label>
					<input type="text" id="username" name="username"/>
					<br />
					<label for="aid_password">Password</label>
					<input type="password" id="password" name="password"/>
					<br />
					<label> </label>
					<input name="login" type="submit" value="Login" class="button" />
					<div>
					</div>
				</form>
			</div>
			
			<div id="loginBox-foot">
					
			<?php
				//$msg=$_GET['msg'];
				if(!empty($msg)){
					//print("<b>$msg</b><br>");
					print("Klik <a href='../admin/login.php'><b>kembali</b></a> untuk melakukan login ulang");
				}
				
			?>
			</div>
		</div>
	</div>
	</center>

</body>
</html>
