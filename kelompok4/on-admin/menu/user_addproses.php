<?php 
	require_once("koneksi.php");

	$username =$_POST['username'];
	$nama =$_POST['nama'];
	$pass = $_POST['password'];
	$password = md5($pass);
	$level = $_POST['level'];
	$sql = "INSERT INTO users (`username`, `password`, `nama`, `level_user`) VALUES ('$username', '$password', '$nama', '$level')";
	if($_POST['password'] == ""){
		echo "<p style='color:red'> Field Password Kosong! </p>";
		
		} else{
			if($pass != $_POST['password_ulang']){
					echo "<p style='color:red'> password, dan Repeat password tidak sama </p>";
				}
			else{
					$check_log = mysqli_query($conn,$sql);
    				echo "Suksess";
				}
		}
	echo "<meta http-equiv='refresh' content='1; url=?tampil=add'>";
?>