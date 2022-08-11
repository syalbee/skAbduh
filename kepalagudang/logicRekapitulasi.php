<?php

if(isset($_POST['submitRekap'])){
    getRekapitulasi();
}

function getDataJumlah($idBrg, $jenis, $bulan, $tahun)
{
    include '../database/koneksi.php';

    $data = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah, id_barang  FROM history_barang 
    WHERE id_barang = '$idBrg' AND jenis_transaksi= '$jenis' AND MONTH(tanggal_transaksi) = '$bulan' AND YEAR(tanggal_transaksi) = '$tahun'");
    $hasil = mysqli_fetch_array($data)['jumlah'];

    $dataSatuan = mysqli_query($koneksi, "SELECT barang.`id_barang`, satuan.`nama` AS satuan  FROM barang 
                                        JOIN satuan ON barang.`id_satuan` = satuan.`id_satuan` 
                                            WHERE barang.`id_barang` = '$idBrg'");
    $satuan = mysqli_fetch_array($dataSatuan)['satuan'];
    if ($data) {
        if ($hasil !== NULL) {
            return  $hasil . " " . $satuan;
        } else {
            return "0";
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

 function getRekapitulasi()
{
    session_start();

    $_SESSION['idRekap'] = $_POST['inRekapitulasibrg'];
    $_SESSION['tahunRekap'] = $_POST['inRekapitulasitahun'];
    
    header("location:../kepalagudang/rekapitulasi.php");
}
