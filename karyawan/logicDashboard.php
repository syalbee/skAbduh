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


function barangMin()
{
    include '../database/koneksi.php';

    $stokMin = mysqli_query($koneksi, "SELECT nama_barang, stok_barang FROM barang WHERE stok_barang < 10 LIMIT 10");

    if (!$stokMin) {
        echo "Error: " . $stokMin . "<br>" . mysqli_error($koneksi);
    } else {
        return $stokMin;
    }
}

function getBarangMasuk()
{
    include '../database/koneksi.php';

    $stokMin = mysqli_query($koneksi, "SELECT barang.`nama_barang`, DATE_FORMAT(history_barang.tanggal_transaksi, '%Y-%m-%d') AS tanggal, history_barang.`jumlah`
    FROM history_barang JOIN barang ON history_barang.`id_barang` = barang.`id_barang` WHERE history_barang.`jenis_transaksi` = 'i' ORDER BY tanggal_transaksi DESC LIMIT 10");

    if (!$stokMin) {
        echo "Error: " . $stokMin . "<br>" . mysqli_error($koneksi);
    } else {
        return $stokMin;
    }
}

function getBarangKeluar()
{
    include '../database/koneksi.php';

    $stokMin = mysqli_query($koneksi, "SELECT barang.`nama_barang`, DATE_FORMAT(history_barang.tanggal_transaksi, '%Y-%m-%d') AS tanggal, history_barang.`jumlah`
    FROM history_barang JOIN barang ON history_barang.`id_barang` = barang.`id_barang` WHERE history_barang.`jenis_transaksi` = 'o' ORDER BY tanggal_transaksi DESC LIMIT 10");

    if (!$stokMin) {
        echo "Error: " . $stokMin . "<br>" . mysqli_error($koneksi);
    } else {
        return $stokMin;
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