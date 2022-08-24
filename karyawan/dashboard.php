<?php
session_start();

$title = "Dashboard Karyawan";

include 'logicDashboard.php';
include '../template/header.php';
include '../template/sidebarKaryawan.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>

            <div class="card-body">
                <div class="container">
                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="card border-dark mb-3" style="max-width: 20rem;">
                                            <div class="card-header bg-transparent border-dark">Stok Barang Minimum</div>
                                            <div class="card-body text-dark">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Nama Barang</th>
                                                            <th scope="col">Stok</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 0;
                                                        foreach (barangMin() as $value) {
                                                            $i++;
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?= $i; ?></th>
                                                                <td><?= $value['nama_barang']; ?></td>
                                                                <td><?= $value['stok_barang']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card border-dark mb-3" style="max-width: 20rem;">
                                            <div class="card-header bg-transparent border-dark">10 Transaksi Terakhir Barang Masuk</div>
                                            <div class="card-body text-dark">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Nama Barang</th>
                                                            <th scope="col">Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 0;
                                                        foreach (getBarangMasuk() as $value) {
                                                            $i++;
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?= $i; ?></th>
                                                                <td><?= $value['tanggal']; ?></td>
                                                                <td><?= $value['nama_barang']; ?></td>
                                                                <td><?= $value['jumlah']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card border-dark mb-3" style="max-width: 20rem;">
                                            <div class="card-header bg-transparent border-dark">10 Transaksi Terakhir Barang Keluar</div>
                                            <div class="card-body text-dark">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Nama Barang</th>
                                                            <th scope="col">Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 0;
                                                        foreach (getBarangKeluar() as $value) {
                                                            $i++;
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?= $i; ?></th>
                                                                <td><?= $value['tanggal']; ?></td>
                                                                <td><?= $value['nama_barang']; ?></td>
                                                                <td><?= $value['jumlah']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
            </div>
        </div>

</div>

<div class="card-footer">

</div>
</div>
</section>

</div>

<?php
include '../template/footer.php';
?>