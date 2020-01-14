<?php 
if(!defined("INDEX")) die("Halaman Tidak diketahui...");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MENU</title>
</head>
<body>
	<ul class="nav navbar-nav">
    	<li><a href="index.php">Beranda</a></li>
        <li><a href="?tampil=about">About</a></li>
        <li><a href="?tampil=depbir_terbaik">3 Departemen/Biro Terbaik</a></li>
        <li><a href="?tampil=depbir_terburuk">3 Departemen/Biro Terburuk</a></li>
        <li><a href="?tampil=depbir_track">Track Record Departemen/Biro</a></li>
        
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="?tampil=add"><span class="glyphicon glyphicon-user"></span>  Tambah Admin</a></li>
        <li><a href="?tampil=exit"><span class="glyphicon glyphicon-log-in"></span>  Keluar</a></li>
    </ul>

</body>
</html>