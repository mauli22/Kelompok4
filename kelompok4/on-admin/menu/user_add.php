<?php 
if(!defined("INDEX")) die("Halaman tidak ada !");
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 
		<title>Administrator - Home</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Quicksand:400,700%7CCabin:400%7CDancing+Script" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Owl Carousel -->
		<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
		<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

    </head>
<!-- Home -->
<div id="home" class="banner-area">

<!-- Backgound Image -->
<div class="bg-image " style="background-image:url(img/lolo.jpg)"></div>
<!-- /Backgound Image -->

<div class="home-wrapper">
	<div class="col-md-10 col-md-offset-1 text-center">
		<div class="home-content">
			<div class="form-group">
				<h2>Tambah Admin User</h2>
			</div>
			
			<form name="edit" method="post" action="?tampil=user_addproses">
				<div class="form-group">
				        <label >Username</label>
				        <input type="text" name="username" class="form-control"  placeholder="Username">
				</div>
			    
			    <div class="form-group">
				        <label >Nama</label>
				        <input type="text" name="nama" class="form-control"  placeholder="Nama">
			    </div>
			    
				<div class="form-group">
			    	<label>Level User</label>
			        <select name="level" placeholder="Level User" value="" class="form-control form-control-sm">
			            <option value="admin">Administrator</option>
			            <option value="member">Member</option>
			        </select>
			    </div>

			    <div class="form-group">
			    	<label>Password</label>
			        <input type="password" name="password" class="form-control" placeholder="Password">
			    </div>

			    <div class="form-group">
			    	<label>Confirm Password</label>
			        <input type="password" name="password_ulang" class="form-control" placeholder="Confirm Password">
			    </div>

			    
			    <button type="submit" name="edit" value="Add Admin" class="btn btn-primary">Add Admin</button>
			   
			</form>
		</div>
	</div>

</div>

</div>
<!-- /Home -->