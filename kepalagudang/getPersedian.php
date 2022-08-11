<?php
include '../database/koneksi.php';

header('Content-type: application/json');
$i = 0;
$barangPersedian = mysqli_query($koneksi, "SELECT barang.*, satuan.`nama` FROM barang JOIN satuan ON barang.`id_satuan` = satuan.`id_satuan`");

if (!$barangPersedian) {
    echo "Error: " . $barangPersedian . "<br>" . mysqli_error($koneksi);
}

foreach ($barangPersedian as $perediaan) {
    $data[] = array(
        'no' => $i++,
        'id' => $perediaan['id_barang'],
        'nama' => $perediaan['nama_barang'],
        'stok' => $perediaan['stok_barang'] . ' ' . $perediaan['nama'] ,
    );
}
$databarangPersedian = array(
    'data' => $data
);
echo json_encode($databarangPersedian);
