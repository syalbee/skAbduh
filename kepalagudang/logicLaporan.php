<?php

if (isset($_POST['BtnLaporanBrgMasuk'])) {
    getLaporanMasuk();
} else if (isset($_POST['BtnLaporanBrgKeluar'])) {
    getLaporanKeluar();
}

function getLaporanMasuk()
{
    include '../database/koneksi.php';

    require_once '../vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();


    $tahun = $_POST['inLapBrgtahun'];
    $bulan = $_POST['inLapBrgbulan'];
    $namaBulan = array("", "Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");


    $data = mysqli_query($koneksi, "SELECT history_barang.*, barang.`nama_barang`, satuan.`nama` AS satuan FROM history_barang JOIN barang
    ON history_barang.`id_barang` = barang.`id_barang` JOIN satuan ON satuan.`id_satuan` = barang.`id_satuan` 
    WHERE jenis_transaksi= 'i' AND MONTH(tanggal_transaksi) = '$bulan' AND YEAR(tanggal_transaksi) = '$tahun'");

    $mpdf->WriteHTML('<h3 style="text-align: center;">Laporan Barang Masuk</h3>');
    $mpdf->WriteHTML('<h4>Periode : ' . $namaBulan[$bulan] . "-" . $tahun . '</h4>');
    $mpdf->WriteHTML('<p>Tanggal cetak : ' . date('Y-m-d H:m') . '</p>');

    $table = '<table border="1">
<thead>
  <tr>
    <th scope="col">No</th>
    <th scope="col">Tanggal Masuk</th>
    <th scope="col">Kode Barang</th>
    <th scope="col">Nama Barang</th>
    <th scope="col">Jumlah</th>
  </tr>
</thead>
<tbody>';
    $i = 0;
    foreach ($data as $tabel) {
        $i++;
        $table .= '<tr>
    <th scope="row">' . $i . '</th>
    <td>' . $tabel['tanggal_transaksi'] . '</td>
    <td>' .  $tabel['id_barang'] . '</td>
    <td>' .  $tabel['nama_barang'] . '</td>
    <td>' .  $tabel['jumlah'] .' '. $tabel['satuan'].'</td>
  </tr>';
    }
    $table .= '  </tbody>
</table>';
    $mpdf->WriteHTML($table);
    $mpdf->Output();
}

function getLaporanKeluar()
{
    include '../database/koneksi.php';

    require_once '../vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();


    $tahun = $_POST['inLapBrgtahun'];
    $bulan = $_POST['inLapBrgbulan'];
    $namaBulan = array("", "Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");


    $data = mysqli_query($koneksi, "SELECT history_barang.*, barang.`nama_barang`, satuan.`nama` AS satuan FROM history_barang JOIN barang
    ON history_barang.`id_barang` = barang.`id_barang` JOIN satuan ON satuan.`id_satuan` = barang.`id_satuan` 
    WHERE jenis_transaksi= 'o' AND MONTH(tanggal_transaksi) = '$bulan' AND YEAR(tanggal_transaksi) = '$tahun'");

    $mpdf->WriteHTML('<h3 style="text-align: center;">Laporan Barang Keluar</h3>');
    $mpdf->WriteHTML('<h4>Periode : ' . $namaBulan[$bulan] . "-" . $tahun . '</h4>');
    $mpdf->WriteHTML('<p>Tanggal cetak : ' . date('Y-m-d H:m') . '</p>');

    $table = '<table border="1">
<thead>
  <tr>
    <th scope="col">No</th>
    <th scope="col">Tanggal Masuk</th>
    <th scope="col">Kode Barang</th>
    <th scope="col">Nama Barang</th>
    <th scope="col">Jumlah</th>
  </tr>
</thead>
<tbody>';
    $i = 0;
    foreach ($data as $tabel) {
        $i++;
        $table .= '<tr>
    <th scope="row">' . $i . '</th>
    <td>' . $tabel['tanggal_transaksi'] . '</td>
    <td>' .  $tabel['id_barang'] . '</td>
    <td>' .  $tabel['nama_barang'] . '</td>
    <td>' .  $tabel['jumlah'] .' '. $tabel['satuan'].'</td>
  </tr>';
    }
    $table .= '  </tbody>
</table>';
    $mpdf->WriteHTML($table);
    $mpdf->Output();
}
