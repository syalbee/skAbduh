<?php
session_start();

$title = "Laporan";

include '../database/query.php';
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
                    <h1>Laporan</h1>
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
                    <form method="POST" action="logicLaporan.php">
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Bulan</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="inLapBrgbulan" required>
                                    <?php
                                    $no = 0;
                                    $bulan = array("", "Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                    for ($i = 1; $i <= 12; $i++) {
                                        $namaBulan = $bulan[$i];
                                        $no++;
                                    ?>
                                        <option value="<?= $i; ?>"><?= $namaBulan; ?></option>
                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="inLapBrgtahun" required>
                                    <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        $no++;
                                    ?>
                                        <option value="<?= 2013 + $i; ?>"><?= 2013 + $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <button type="submit" name="BtnLaporanBrgMasuk" class="btn btn-success mb-2">Laporan Data Barang Masuk</button>
                        <button type="submit" name="BtnLaporanBrgKeluar" class="btn btn-warning mb-2">Laporan Data Barang Keluar</button>
                    </form>
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