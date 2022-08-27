<?php

if (isset($_POST['editGudangid'])) {
    editGudang();
} else if (isset($_POST['idGudang'])) {
    simpaneditGudang();
}

function getGudang($idGudang)
{
    include '../database/koneksi.php';

    $query = mysqli_query($koneksi, "SELECT gudang.`nama_gudang`, gudang.`max_kapasitas`, gudang.`alamat`,barang.stok_barang,  SUM(barang.`stok_barang`) AS jumlah 
    FROM gudang JOIN barang ON gudang.`id_gudang` = barang.`id_gudang`
    WHERE gudang.`id_gudang`= '$idGudang'");
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


function simpaneditGudang()
{
    include '../database/koneksi.php';

    $id = $_POST['idGudang'];
    $nama = $_POST['namaGudang'];
    $alamat = $_POST['alamatGudang'];
    $maxKapaGudang = $_POST['maxKapaGudang'];

    $editBarangsimpan = mysqli_query($koneksi, "UPDATE gudang SET nama_gudang='$nama', alamat='$alamat',max_kapasitas='$maxKapaGudang'  WHERE id_gudang='$id'");

    if (!$editBarangsimpan) {
        echo "Error: " . $editBarangsimpan . "<br>" . mysqli_error($koneksi);
    }
}
