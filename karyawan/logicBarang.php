<?php

if (isset($_POST['simpanBarang'])) {
    saveBarang();
} else if (isset($_POST['editBarang'])) {
    editBarang();
} else if (isset($_POST['idBarangedt'])) {
    simpaneditBarang();
} else if (isset($_POST['idHapusbarangs'])) {
    submitHapusbarang();
} else if (isset($_POST['idHapusbarangs'])) {
    submitHapusbarang();
} else if (isset($_POST['btnTbhbarangstok'])) {
    saveStockbrg();
} else if (isset($_POST['btnOutbarangstok'])) {
    outStockbrg();
}




function saveBarang()
{
    include '../database/koneksi.php';

    $nama = $_POST['inNamaBarang'];
    $supplier = $_POST['inSupplier'];
    $satuan = $_POST['inSatuan'];
    $gudang = $_POST['inGudang'];

    $barang = mysqli_query($koneksi, "INSERT INTO barang (nama_barang, stok_barang, stok_aman, id_supplier, id_gudang, id_satuan) VALUES('$nama', '0', '0', '$supplier', '$gudang', '$satuan')");

    if ($barang) {
        header("location:../karyawan/databarang.php");
    } else {
        echo "Error: " . $barang . "<br>" . mysqli_error($koneksi);
    }
}

function simpaneditBarang()
{
    include '../database/koneksi.php';

    $id = $_POST['idBarangedt'];
    $nama = $_POST['namaBarangedt'];
    $supplier = $_POST['supplierBarangedt'];
    $satuan = $_POST['satuanBarangedt'];
    $gudang = $_POST['gudangBarangedt'];

    $editBarangsimpan = mysqli_query($koneksi, "UPDATE barang SET nama_barang='$nama', id_supplier='$supplier',id_gudang='$gudang', id_satuan='$satuan'  WHERE id_barang='$id'");

    if (!$editBarangsimpan) {
        echo "Error: " . $editBarangsimpan . "<br>" . mysqli_error($koneksi);
    }
}

function editBarang()
{
    include '../database/koneksi.php';

    $id = $_POST['editBarang'];
    $editBarang = mysqli_query($koneksi, "SELECT nama_barang FROM barang WHERE id_barang = '$id'");

    if ($editBarang) {
        echo json_encode(mysqli_fetch_array($editBarang));
    } else {
        echo "Error: " . $editBarang . "<br>" . mysqli_error($koneksi);
    }
}


function getBarang()
{
    include '../database/koneksi.php';

    $query = mysqli_query($koneksi, "SELECT barang.nama_barang, barang.stok_barang, barang.id_barang, supplier.nama_supplier, satuan.`nama` AS satuan, gudang.nama_gudang FROM barang
     JOIN supplier ON barang.id_supplier = supplier.id_supplier JOIN satuan ON barang.id_satuan = satuan.`id_satuan`
     JOIN gudang ON barang.id_gudang = gudang.id_gudang");
    if (!$query) {
        printf("Error: %s\n", mysqli_error($koneksi));
        exit();
    }

    return $query;
}

function getSupplier()
{
    include '../database/koneksi.php';

    $query = mysqli_query($koneksi, "SELECT * FROM supplier");
    if (!$query) {
        printf("Error: %s\n", mysqli_error($koneksi));
        exit();
    }

    return $query;
}

function getSatuan()
{
    include '../database/koneksi.php';

    $query = mysqli_query($koneksi, "SELECT * FROM satuan");
    if (!$query) {
        printf("Error: %s\n", mysqli_error($koneksi));
        exit();
    }

    return $query;
}

function getGudang()
{
    include '../database/koneksi.php';

    $query = mysqli_query($koneksi, "SELECT * FROM gudang");
    if (!$query) {
        printf("Error: %s\n", mysqli_error($koneksi));
        exit();
    }

    return $query;
}

function submitHapusbarang()
{
    include '../database/koneksi.php';

    $id = $_POST['idHapusbarangs'];
    $hapusBarang = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang = '$id'");

    if (!$hapusBarang) {
        echo "Error: " . $hapusBarang . "<br>" . mysqli_error($koneksi);
    }
}


function saveStockbrg()
{
    include '../database/koneksi.php';

    $idBrg = $_POST['inTbhBarang'];
    $jumlah = $_POST['inJmlBrgtbh'];


    $barang = mysqli_query($koneksi, "INSERT INTO history_barang (id_barang, jenis_transaksi, jumlah) VALUES('$idBrg', 'i', '$jumlah')");

    if ($barang) {
        $jumlahBrg = mysqli_query($koneksi, "SELECT stok_barang FROM barang WHERE id_barang = '$idBrg'");
        $stok = mysqli_fetch_array($jumlahBrg);
        $stok = $stok['stok_barang'] + $jumlah;
        $update = mysqli_query($koneksi, "UPDATE barang SET stok_barang = '$stok' WHERE id_barang='$idBrg'");
        if ($update) {
            header("location:../karyawan/barangmasuk.php");
        }
    } else {
        echo "Error: " . $barang . "<br>" . mysqli_error($koneksi);
    }
}

function outStockbrg()
{
    include '../database/koneksi.php';

    $idBrg = $_POST['inTbhBarang'];
    $jumlah = $_POST['inJmlBrgtbh'];


    $barang = mysqli_query($koneksi, "INSERT INTO history_barang (id_barang, jenis_transaksi, jumlah) VALUES('$idBrg', 'o', '$jumlah')");

    if ($barang) {
        $jumlahBrg = mysqli_query($koneksi, "SELECT stok_barang FROM barang WHERE id_barang = '$idBrg'");
        $stok = mysqli_fetch_array($jumlahBrg);
        $stok = $stok['stok_barang'] - $jumlah;
        $update = mysqli_query($koneksi, "UPDATE barang SET stok_barang = '$stok' WHERE id_barang='$idBrg'");
        if ($update) {
            header("location:../karyawan/barangkeluar.php");
        }
    } else {
        echo "Error: " . $barang . "<br>" . mysqli_error($koneksi);
    }
}
