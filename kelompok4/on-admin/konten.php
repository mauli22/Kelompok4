<?php
if(!defined("INDEX")) die("Halaman Tidak diketahui...");
	
if (isset($_GET['tampil'])) $tampil = $_GET['tampil'];
else $tampil = "beranda";

if($tampil == "beranda") include("home.php");
elseif($tampil == "exit") include ("../logout.php");

elseif($tampil == "about") include ("menu/about.php");
elseif($tampil == "depbir_terbaik") include ("menu/terbaik.php");
elseif($tampil == "detail_pkhp") include ("menu/pkhp.php");
elseif($tampil == "detail_birum") include ("menu/birum.php");
elseif($tampil == "detail_deproh") include ("menu/deproh.php");
elseif($tampil == "detail_depdik") include ("menu/depdik.php");
elseif($tampil == "detail_depristek") include ("menu/depristek.php");
elseif($tampil == "detail_depniag") include ("menu/depniag.php");
elseif($tampil == "detail_depsenma") include ("menu/depsenma.php");
elseif($tampil == "detail_depor") include ("menu/depor.php");
elseif($tampil == "detail_depkesma") include ("menu/depkesma.php");
elseif($tampil == "detail_depsosling") include ("menu/depsosling.php");
elseif($tampil == "detail_depas") include ("menu/depas.php");


elseif($tampil == "add") include ("menu/user_add.php");
elseif($tampil == "user_addproses") include ("menu/user_addproses.php");

else echo "Konten tidak ada";
?>