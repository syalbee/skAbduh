<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'database/koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND PASSWORD='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {
	$data = mysqli_fetch_assoc($login);

	$_SESSION['iduser'] = $data['id_user'];
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['role'] = $data['role'];

	if ($data['role'] === '1') {
		header("location:admin/dashboard.php");
	} else if ($data['role'] === '2') {
		header("location:kepalagudang/dashboard.php");
	} else if ($data['role'] === '3') {
		header("location:karyawan/dashboard.php");
	} else if ($data['role'] === '4') {
		header("location:produksi/dashboard.php");
	}
} else {
	header("location:index.php?pesan=gagal");
}
