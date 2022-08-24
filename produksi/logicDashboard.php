<?php

include '../database/koneksi.php';

header('Content-type: application/json');

$i = 0;

$query = mysqli_query($koneksi, "SELECT barang.nama_barang, barang.stok_barang, barang.id_barang, supplier.nama_supplier, satuan.`nama` AS satuan, gudang.nama_gudang FROM barang
     JOIN supplier ON barang.id_supplier = supplier.id_supplier JOIN satuan ON barang.id_satuan = satuan.`id_satuan`
     JOIN gudang ON barang.id_gudang = gudang.id_gudang");

if (!$query) {
    printf("Error: %s\n", mysqli_error($koneksi));
    exit();
}

foreach ($query as $barang) {
    $data[] = array(
        'no' => $i++,
        'id' => $barang['id_barang'],
        'nama' => $barang['nama_barang'],
        'stok' => $barang['stok_barang'] . ' ' . $barang['satuan'],
        'gudang' => $barang['nama_gudang'],
    );
}

$databarang = array(
    'data' => $data
);

echo json_encode($databarang);
