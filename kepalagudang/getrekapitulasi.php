<?php
include '../database/koneksi.php';

header('Content-type: application/json');

$i = 1;
$barangMasuk = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah, id_barang  FROM history_barang 
WHERE jenis_transaksi= '$jenis' AND MONTH(tanggal_transaksi) = '$bulan' AND YEAR(tanggal_transaksi) = '$tahun'");

if (!$barangMasuk) {
    echo "Error: " . $barangMasuk . "<br>" . mysqli_error($koneksi);
}


$no = 0;
$bulan = array("", "Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
for ($i = 1; $i <= 12; $i++) {
    $namaBulan = $bulan[$i];
    $data[] = array(
        'no' => $no++,
        'bulan' => $brgMasuk['id_barang'],
        'nama' => $brgMasuk['nama_barang'],
        'tanggal' => $brgMasuk['tanggal_transaksi'],
        'jumlah' => $brgMasuk['jumlah'],
        'action' => '<button class="btn btn-sm btn-warning" onclick="detail(\'' . $brgMasuk['id_barang']  . '\')"><i class="fas fa-edit"></i></button> &nbsp; <button class="btn btn-sm btn-primary" onclick="lunas(\'' . $brgMasuk['id_barang'] . '\')"><i class="fas fa-check"></i></button>',
    );
}
$dataBarangmasuk = array(
    'data' => $data
);
echo json_encode($dataBarangmasuk);
