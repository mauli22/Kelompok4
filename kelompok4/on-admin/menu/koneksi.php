<?php
	if(!defined("INDEX")) die("Halaman Tidak diketahui...");

	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBNAME', 'msi');

	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
	
?>
