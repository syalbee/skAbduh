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
    session_start();
    // menghubungkan php dengan koneksi database
    include 'database/koneksi.php';

    $email = $_POST['Konfirmasiemail'];
    $cekEmail = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email' ");


    $cek = mysqli_num_rows($cekEmail);

    if ($cek > 0) {
        $_SESSION['emailKonfirmasi'] = $email;
        header("location:KonfirmasiPassword.php");
    } else {
        header("location:lupaPassword.php?tidakada=gagal");
    }
}

function konfirmasiPassword()
{
    // menghubungkan php dengan koneksi database
    include 'database/koneksi.php';

    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $email = $_SESSION['emailKonfirmasi'];
   
    if ($password1 !== $password2) {
        header("location:KonfirmasiPassword.php?beda=gagal");
    }

    $cekPassword = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email' ");
    $cek = mysqli_num_rows($cekPassword);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($cekPassword);
        
        $_SESSION['iduser'] = $data['id_users'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role'] = $data['role'];

        mysqli_query($koneksi, "UPDATE users SET password='$password1' WHERE email='$email'");

        if ($data['role'] === '2') {
            header("location:kepalagudang/dashboard.php");
        } else if ($data['role'] === '3') {
            header("location:karyawan/dashboard.php");
        }
    } else {
        header("location:lupaPassword.php?tidakada=gagal");
    }
}
