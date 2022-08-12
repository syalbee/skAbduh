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
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Grafik Transaksi Barang Perbulan Dalam 1 Tahun</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                                <br>
                                <form class="form-inline">
                                    <div class="form-group mb-2">
                                        <select id="dataBrgtampil" class="form-control form-control-sm">
                                            <?php
                                            foreach (getBarang() as $value) {
                                            ?>
                                                <option value="<?= $value['id_barang']; ?>"><?= $value['nama_barang']; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <select id="dataThntampil" class="form-control form-control-sm">
                                            <?php
                                            for ($i = 1; $i <= 12; $i++) {
                                                $no++;
                                            ?>
                                                <option value="<?= 2013 + $i; ?>"><?= 2013 + $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-warning btn-sm">Tampil</button>
                                </form>
                                <hr style="border: 1px solid yellow">
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
            </div>
        </div>
    </section>
</div>

<?php
include '../template/footer.php';
?>

<script>
    $('#dataBrgtampil').select2({
        theme: 'bootstrap4'
    });
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        datasets: [{
                label: 'Data Barang Masuk',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [28, 48, 40, 19, 86, 27, 90, 40, 19, 86, 27, 90]
            },
            {
                label: 'Data Barang Keluar',
                backgroundColor: 'rgba(210, 214, 222, 1)',
                borderColor: 'rgba(210, 214, 222, 1)',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [65, 59, 80, 81, 56, 55, 40, 40, 19, 86, 27, 90]
            },
        ]
    }
    var areaChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: false,
                }
            }],
            yAxes: [{
                gridLines: {
                    display: false,
                }
            }]
        }
    }
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#lineChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
    }

    new Chart(barChartCanvas, {
        type: 'line',
        data: barChartData,
        options: barChartOptions
    })
</script>