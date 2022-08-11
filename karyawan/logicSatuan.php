<?php

if (isset($_POST['simpanSatuan'])) {
    saveSatuan();
} else if (isset($_POST['editSatuan'])) {
    editSatuan();
} else if (isset($_POST['simpaneditSatuan'])) {
    simpaneditSatuan();
} else if(isset($_POST['idHapussatuans'])){
    submitHapussatuan();
}

function getsatuan()
{
    include '../database/koneksi.php';

    $query = mysqli_query($koneksi, "SELECT * FROM satuan");
    if (!$query) {
        printf("Error: %s\n", mysqli_error($koneksi));
        exit();
    }

   return $query;
}


function saveSatuan()
{
    include '../database/koneksi.php';

    $nama = $_POST['inSatuan'];
    $satuan = mysqli_query($koneksi, "INSERT INTO satuan (nama) VALUES('$nama')");

    if ($satuan) {
        header("location:../karyawan/datasatuan.php");
    } else {
        echo "Error: " . $satuan . "<br>" . mysqli_error($koneksi);
    }
}

function editSatuan()
{
    include '../database/koneksi.php';

    $id = $_POST['editSatuan'];
    $editSatuan = mysqli_query($koneksi, "SELECT nama FROM satuan WHERE id_satuan = '$id'");

    if ($editSatuan) {
        echo json_encode(mysqli_fetch_array($editSatuan));
    } else {
        echo "Error: " . $editSatuan . "<br>" . mysqli_error($koneksi);
    }
}

function simpaneditSatuan()
{
    include '../database/koneksi.php';

    $id = $_POST['idsimpansatuan'];
    $nama = $_POST['simpaneditSatuan'];
    $editSatuansimpan = mysqli_query($koneksi, "UPDATE satuan SET nama='$nama' WHERE id_satuan='$id'");

    if (!$editSatuansimpan) {
        echo "Error: " . $editSatuansimpan . "<br>" . mysqli_error($koneksi);
    }
}

function submitHapussatuan(){
    include '../database/koneksi.php';

    $id = $_POST['idHapussatuans'];
    $hapusSatuan = mysqli_query($koneksi, "DELETE FROM satuan WHERE id_satuan = '$id'");

    if (!$hapusSatuan) {
        echo "Error: " . $hapusSatuan . "<br>" . mysqli_error($koneksi);
    }
}
