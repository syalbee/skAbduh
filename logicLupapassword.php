<?php
// mengaktifkan session pada php
session_start();

if (isset($_POST['btnCekemail'])) {
    cekEmail();
} else if (isset($_POST['btnCekpasswordbaru'])) {
    konfirmasiPassword();
}

function cekEmail()
{
    // menghubungkan php dengan koneksi database
    include 'database/koneksi.php';

    $email = $_POST['Konfirmasiemail'];
    $cekEmail = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email' ");

    $cek = mysqli_num_rows($cekEmail);

    if ($cek > 0) {
        header("location:KonfirmasiPassword.php");
    } else {
        header("location:lupaPassword.php?tidakada=gagal");
    }
}

function konfirmasiPassword()
{
    // menghubungkan php dengan koneksi database
    include 'database/koneksi.php';

    $email = $_POST['Konfirmasiemail'];
    $cekEmail = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email' ");

    $cek = mysqli_num_rows($cekEmail);

    if ($cek > 0) {
        header("location:KonfirmasiPassword.php");
    } else {
        header("location:lupaPassword.php?tidakada=gagal");
    }
}
