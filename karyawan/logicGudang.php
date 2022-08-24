<?php

if (isset($_POST['editGudangid'])) {
    editGudang();
}

function getGudang()
{
    include '../database/koneksi.php';

    $query = mysqli_query($koneksi, "SELECT gudang.*, SUM(barang.`stok_barang`) AS jumlah FROM gudang JOIN barang ON gudang.`id_gudang` = barang.`id_gudang`");
    if (!$query) {
        printf("Error: %s\n", mysqli_error($koneksi));
        exit();
    }

    return $query;
}

function editGudang()
{
    include '../database/koneksi.php';

    $id = $_POST['editGudangid'];
    $editGudang = mysqli_query($koneksi, "SELECT * FROM gudang WHERE id_gudang = '$id'");

    if ($editGudang) {
        echo json_encode(mysqli_fetch_array($editGudang));
    } else {
        echo "Error: " . $editGudang . "<br>" . mysqli_error($koneksi);
    }
}


function simpaneditBarang()
{
    include '../database/koneksi.php';

    echo "asa";
    die;
    $id = $_POST['idGudang'];
    $nama = $_POST['namaGudang'];
    $alamat = $_POST['alamatGudang'];
    $maxKapaGudang = $_POST['inMaxKapasitas'];

    $editBarangsimpan = mysqli_query($koneksi, "UPDATE gudang SET nama_gudang='$nama', alamat='$alamat',max_kapasitas='$maxKapaGudang'  WHERE id_gudang='$id'");

    if (!$editBarangsimpan) {
        echo "Error: " . $editBarangsimpan . "<br>" . mysqli_error($koneksi);
    }
}
