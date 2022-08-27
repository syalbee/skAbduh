<?php
session_start();

$title = "Dashboard Karyawan";

include 'logicDashboard.php';
include '../template/header.php';
include '../template/sidebarKepala.php';
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
                        <div class="card card-success">
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

    var dataMasuk = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    var dataKeluar = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
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
                data: dataMasuk
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
                data: dataKeluar
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

    function getDatatransaksiBarang() {
        var a = $('#dataBrgtampil').val();
        var b = $('#dataThntampil').val();

        // $idBrg, $jenis, $bulan, $tahun
        for (let i = 1; i <= 12; i++) {
            console.log(i);
            getDataJumlahMasuk(a, 'i', i, b);
            getDataJumlahKeluar(a, 'o', i, b);
        }

        new Chart(barChartCanvas, {
            type: 'line',
            data: barChartData,
            options: barChartOptions
        })
    }

    function getDataJumlahMasuk(a, b, c, d) {
        $.ajax({
            url: "logicDashboard.php",
            type: "post",
            dataType: "text",
            data: {
                idJumlahdashboardmas: a,
                jenisJumlahdashboardmas: b,
                bulanJumlahdashboardmas: c,
                tahunJumlahdashboardmas: d
            },
            success: (a) => {
                dataMasuk[c-1] = a;
                // console.log(a);
            },
            error: (a) => {
                console.log(a);
            },
        });
    }

    function getDataJumlahKeluar(a, b, c, d) {
        $.ajax({
            url: "logicDashboard.php",
            type: "post",
            dataType: "text",
            data: {
                idJumlahdashboardkel: a,
                jenisJumlahdashboardkel: b,
                bulanJumlahdashboardkel: c,
                tahunJumlahdashboardkel: d
            },
            success: (a) => {
                dataKeluar[c-1] = a;
            },
            error: (a) => {
                console.log(a);
            },
        });
    }
</script>