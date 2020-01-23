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
        <li><a href="?tampil=about" class="text-info"><span class="glyphicon glyphicon-question-sign"></span>About</a></li>
        <li><a href="?tampil=depbir_terbaik" class="text-info"><span class="glyphicon glyphicon-list-alt"></span> Departemen/Biro Terbaik</a></li>
        <li>
        <div class="btn-group">
			  <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span> Detail Departemen/Biro</button>
			  <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <span class="sr-only">Toggle Dropdown</span>
			  </button>
			  <div class="dropdown-menu">
				    <a class="dropdown-item" href="?tampil=detail_pkhp">Biro Perencanaan Kemahasiswaan Humas dan Protokol</a>
				    <a class="dropdown-item" href="?tampil=detail_birum">Biro Umum</a>
				    <div class="dropdown-divider"></div>
				    <a class="dropdown-item" href="?tampil=detail_deproh">Departemen Rohani</a>
				    <a class="dropdown-item" href="?tampil=detail_depristek">Departemen Riset Teknologi</a>
				    <a class="dropdown-item" href="?tampil=detail_depdik">Departemen Pendidikan</a>
				    <div class="dropdown-divider"></div>
				    <a class="dropdown-item" href="?tampil=detail_depniag">Departemen Perniagaan</a>
				    <a class="dropdown-item" href="?tampil=detail_depsenma">Departemen Kesenian</a>
				    <a class="dropdown-item" href="?tampil=detail_depor">Departemen Olahraga</a>
				    <div class="dropdown-divider"></div>
				    <a class="dropdown-item" href="?tampil=detail_depas">Departemen Asrama</a>
				    <a class="dropdown-item" href="?tampil=detail_depkesma">Departemen Kesejahteraan Mahasiswa</a>
				    <a class="dropdown-item" href="?tampil=detail_depsosling">Departemen Sosial dan Lingkungan</a>
			  </div>
		</div>
        
        </li>
        <!-- <a href="" class="text-info" data-toggle=”dropdown” ><span class="glyphicon glyphicon-eye-open"></span> Detail Departemen/Biro</a> -->
        <li><a href="?tampil=add" class="text-info"><span class="glyphicon glyphicon-user"></span>  Tambah Admin</a></li>
        <li><a href="?tampil=exit" class="btn btn-outline-success my-2 my-sm-0"><span class="glyphicon glyphicon-log-in"></span>  Logout</a></li>

</body>
</html>