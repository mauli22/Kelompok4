<?php
session_start();
define("INDEX",true);
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
if ( !isset($_SESSION['user_login']) || 
    ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'admin' ) ) {

	header('location:./../login.php');
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrator Page</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/admin.css"/>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
</head>
<body>
	<div class="bg-image bg-parallax overlay" style="background-image:url(img/bg.png)"></div>
	<!-- Backgound Image -->
	<div class="container-fluid">
   <nav class="navbar navbar-default">
      <div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Administrator</a>
		</div>
			<?php include("menu.php");?>
      </div>
	</nav>
	</div>

<div id="content">
    	<?php include("konten.php"); ?>
    </div>
    <div id="footer">
    	<p align="center"> Copyright &copy; KELOMPOK 4</p>
    </div>
</body>
</html>