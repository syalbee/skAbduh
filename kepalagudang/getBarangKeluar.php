<?php
include '../database/koneksi.php';

header('Content-type: application/json');
$i = 1;
$BarangKeluar = mysqli_query($koneksi, "SELECT history_barang.*, barang.*, gudang.`nama_gudang`, users.`nama` AS petugas FROM history_barang JOIN barang ON barang.`id_barang` = history_barang.`id_barang` 
JOIN gudang ON barang.`id_gudang` = gudang.`id_gudang` JOIN users ON history_barang.`id_user` = users.`id_user` WHERE jenis_transaksi = 'o'");

if (!$BarangKeluar) {
    echo "Error: " . $BarangKeluar . "<br>" . mysqli_error($koneksi);
}

foreach ($BarangKeluar as $brgKeluar) {
    $data[] = array(
        'no' => $i++,
        'id' => $brgKeluar['id_barang'],
        'nofak' => $brgKeluar['no_faktur'],
        'nama' => $brgKeluar['nama_barang'],
        'tanggal' => $brgKeluar['tanggal_transaksi'],
        'jumlah' => $brgKeluar['jumlah'],
        'gudang' => $brgKeluar['nama_gudang'],
        'petugas' => $brgKeluar['petugas'],
    );
}
$dataBarangKeluar = array(
    'data' => $data
);
echo json_encode($dataBarangKeluar);
