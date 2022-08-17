<?php

if (isset($_POST['btnSimpanUpdateusr'])) {
    simpaneditUser();
} else if (isset($_POST['idHapusUsers'])) {
    submitHapusUser();
}


function simpaneditUser()
{
    include '../database/koneksi.php';

    $id = $_POST['idUpdtuser'];
    $nama = $_POST['inNamaupdt'];
    $email = $_POST['inEmailupdt'];
    $username = $_POST['inUsernameupdt'];
    $password = $_POST['inPasswordupdt'];
    $notelp = $_POST['inNotelpupdt'];
    $alamat = $_POST['inAlamatupdt'];
    $jabatan = $_POST['inJabatanupdt'];

    $edituserimpan = mysqli_query($koneksi, "UPDATE users SET username='$username',  password='$password', nama='$nama',  email='$email',  no_tlp='$notelp',  alamat='$alamat',  role='$jabatan' WHERE id_user='$id'");

    if ($edituserimpan) {
        header("location:../admin/dashboard.php");
    } else {
        echo "Error: " . $edituserimpan . "<br>" . mysqli_error($koneksi);
    }
}

function submitHapusUser()
{
    include '../database/koneksi.php';

    $id = $_POST['idHapusUsers'];
    $hpsUser = mysqli_query($koneksi, "DELETE FROM users WHERE id_user = '$id'");

    if (!$hpsUser) {
        echo "Error: " . $hpsUser . "<br>" . mysqli_error($koneksi);
    }
}