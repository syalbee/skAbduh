<?php
include '../database/koneksi.php';

$nama = $_POST['inNama'];
$email = $_POST['inEmail'];
$username = $_POST['inUsername'];
$password = $_POST['inPassword'];
$notelp = $_POST['inNotelp'];
$alamat = $_POST['inAlamat'];
$jabatan = $_POST['inJabatan'];

$user = mysqli_query($koneksi, "INSERT INTO users (username, password, nama, email, no_tlp, alamat, role) VALUES('$username','$password','$nama','$email','$notelp','$alamat', '$jabatan')");

if ($user) {
    header("location:../admin/dashboard.php");
} else {
    echo "Error: " . $user . "<br>" . mysqli_error($koneksi);
}
