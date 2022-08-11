<?php
include '../database/koneksi.php';

header('Content-type: application/json');
$i = 1;
$barangMasuk = mysqli_query($koneksi, " SELECT history_barang.*, barang.* FROM history_barang JOIN barang ON barang.`id_barang` = history_barang.`id_barang` 
WHERE jenis_transaksi = 'i' ");

if (!$barangMasuk) {
    echo "Error: " . $barangMasuk . "<br>" . mysqli_error($koneksi);
}

foreach ($barangMasuk as $brgMasuk) {
    $data[] = array(
        'no' => $i++,
        'id' => $brgMasuk['id_barang'],
        'nama' => $brgMasuk['nama_barang'],
        'tanggal' => $brgMasuk['tanggal_transaksi'],
        'jumlah' => $brgMasuk['jumlah'],
    );
}
$dataBarangmasuk = array(
    'data' => $data
);
echo json_encode($dataBarangmasuk);
