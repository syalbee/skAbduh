<?php

if (isset($_POST['btnTbhbarangstok'])) {
    saveStockbrg();
} else if (isset($_POST['idJumlahdashboardmas'])) {
    getDataJumlahMas();
} else if (isset($_POST['idJumlahdashboardkel'])) {
    getDataJumlahKel();
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

function getDataJumlahMas()
{
    include '../database/koneksi.php';
    $idBrg= $_POST['idJumlahdashboardmas'];
    $jenis= $_POST['jenisJumlahdashboardmas'];
    $bulan= $_POST['bulanJumlahdashboardmas'];
    $tahun= $_POST['tahunJumlahdashboardmas'];

    $data = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah, id_barang  FROM history_barang 
    WHERE id_barang = '$idBrg' AND jenis_transaksi= '$jenis' AND MONTH(tanggal_transaksi) = '$bulan' AND YEAR(tanggal_transaksi) = '$tahun'");
    $hasil = mysqli_fetch_array($data)['jumlah'];

    $dataSatuan = mysqli_query($koneksi, "SELECT barang.`id_barang`, satuan.`nama` AS satuan  FROM barang 
                                        JOIN satuan ON barang.`id_satuan` = satuan.`id_satuan` 
                                            WHERE barang.`id_barang` = '$idBrg'");
    $satuan = mysqli_fetch_array($dataSatuan)['satuan'];
    if ($data) {
        if ($hasil !== NULL) {
            echo $hasil;
        } else {
            echo "0";
        }
    } else {
        echo "Error: " . $data . "<br>" . mysqli_error($koneksi);
    }
}

function getDataJumlahKel()
{
    include '../database/koneksi.php';
    $idBrg= $_POST['idJumlahdashboardkel'];
    $jenis= $_POST['jenisJumlahdashboardkel'];
    $bulan= $_POST['bulanJumlahdashboardkel'];
    $tahun= $_POST['tahunJumlahdashboardkel'];

    $data = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah, id_barang  FROM history_barang 
    WHERE id_barang = '$idBrg' AND jenis_transaksi= '$jenis' AND MONTH(tanggal_transaksi) = '$bulan' AND YEAR(tanggal_transaksi) = '$tahun'");
    $hasil = mysqli_fetch_array($data)['jumlah'];

    $dataSatuan = mysqli_query($koneksi, "SELECT barang.`id_barang`, satuan.`nama` AS satuan  FROM barang 
                                        JOIN satuan ON barang.`id_satuan` = satuan.`id_satuan` 
                                            WHERE barang.`id_barang` = '$idBrg'");
    $satuan = mysqli_fetch_array($dataSatuan)['satuan'];
    if ($data) {
        if ($hasil !== NULL) {
            echo $hasil;
        } else {
            echo "0";
        }
    } else {
        echo "Error: " . $data . "<br>" . mysqli_error($koneksi);
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