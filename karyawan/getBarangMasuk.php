<?php
include '../database/koneksi.php';

header('Content-type: application/json');
$i = 1;
$barangMasuk = mysqli_query($koneksi, "SELECT history_barang.*, barang.*, gudang.`nama_gudang` FROM history_barang JOIN barang ON barang.`id_barang` = history_barang.`id_barang` 
JOIN gudang ON barang.`id_gudang` = gudang.`id_gudang` WHERE jenis_transaksi = 'i' ");

if (!$barangMasuk) {
    echo "Error: " . $barangMasuk . "<br>" . mysqli_error($koneksi);
}

foreach ($barangMasuk as $brgMasuk) {
    $data[] = array(
        'no' => $i++,
        'id' => $brgMasuk['id_barang'],
        'nofak' => $brgMasuk['no_faktur'],
        'nama' => $brgMasuk['nama_barang'],
        'tanggal' => $brgMasuk['tanggal_transaksi'],
        'jumlah' => $brgMasuk['jumlah'],
        'gudang' => $brgMasuk['nama_gudang'],
    );
}
$dataBarangmasuk = array(
    'data' => $data
);
echo json_encode($dataBarangmasuk);
