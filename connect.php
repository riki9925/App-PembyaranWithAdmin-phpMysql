<?php
	$host="localhost";
	$user="yapertek";
	$pass="r00t";
	$dbase="bayar";
	
	$koneksi=mysql_connect($host,$user,$pass);
	if(!$koneksi){
		die("Database mysql tidak terkoneksi");
	}
	
	$seleksi=mysql_select_db($dbase,$koneksi);
	if(!$seleksi){
		die("Database tidak terseleksi");
	}
?>