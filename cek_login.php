<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include ('function.php');

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];



// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($con,"SELECT * FROM tb_login where username='$username'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){
	$data = mysqli_fetch_assoc($login);
	if (password_verify($password, $data['password'])) {

		// cek jika user login sebagai admin
		if($data['level']=="admin"){

			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "admin";
			// alihkan ke halaman dashboard admin
			$_SESSION['admin'] = true;
			header("location:user/home_admin.php");

		// cek jika user login sebagai pegawai
		}else if($data['level']=="pegawai"){
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "pegawai";
			// alihkan ke halaman dashboard pegawai
			$_SESSION['pegawai'] = true;
			header("location:user/halaman_pegawai.php");
		}

	}else {
		header("location:index.php?pesan=gagal");
	}
}else {
        header("location:index.php?pesan=gagal");
}



?>