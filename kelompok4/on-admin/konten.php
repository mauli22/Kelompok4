<?php
if(!defined("INDEX")) die("Halaman Tidak diketahui...");
	
if (isset($_GET['tampil'])) $tampil = $_GET['tampil'];
else $tampil = "beranda";

if($tampil == "beranda") include("beranda.php");
elseif($tampil == "exit") include ("../logout.php");

elseif($tampil == "about") include ("menu/about.php");
elseif($tampil == "depbir_terbaik") include ("menu/terbaik.php");
elseif($tampil == "depbir_terburuk") include ("menu/terburuk.php");
elseif($tampil == "depbir_track") include ("menu/track.php");

elseif($tampil == "add") include ("menu/user_add.php");
elseif($tampil == "user_addproses") include ("menu/user_addproses.php");

else echo "Konten tidak ada";
?>