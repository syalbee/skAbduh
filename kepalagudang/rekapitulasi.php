<?php
session_start();

$title = "Rekapitulasi Data Barang";

include 'logicRekapitulasi.php';
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
                    <h1>Rekapitulasi Data Barang</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <form class="form-inline" method="POST" action="logicRekapitulasi.php">
                    <div class="form-group ">
                        <select id="inRekapitulasibrg" class="form-control" name="inRekapitulasibrg" required>
                            <?php
                            $i = 0;
                            foreach (getBarang() as $value) {
                                $i++;
                            ?>
                                <option value="<?= $value['id_barang']; ?>"><?= $value['nama_barang']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mx-sm-3">
                        <select id="inRekapitulasitahun" class="form-control" name="inRekapitulasitahun" required>
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                $no++;
                            ?>
                                <option value="<?= 2013 + $i; ?>"><?= 2013 + $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" name="submitRekap" class="btn btn-primary mb-2">Tampil</button>
                </form>
            </div>

            <div class="card-body">
                <div class="container">
                    <table class="table w-100 table-bordered table-hover" id="tblRekapitulasibarang">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Bulan</th>
                                <th scope="col">Barang Masuk</th>
                                <th scope="col">Barang Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $idRek = 0;
                            $tahunRek = 0;
                            if (empty($_SESSION['idRekap']) || empty($_SESSION['tahunRekap'])) {
                                $idRek = 1;
                                $tahunRek = date('Y');
                            } else {
                                $idRek =  $_SESSION['idRekap'];
                                $tahunRek =  $_SESSION['tahunRekap'];
                            }

                            $bulan = array("", "Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                            for ($i = 1; $i <= 12; $i++) {
                                $namaBulan = $bulan[$i];
                                $no++;
                            ?>
                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <td><?= $namaBulan; ?></td>
                                    <td><?= getDataJumlah($idRek, 'i', $i, $tahunRek); ?></td>
                                    <td><?= getDataJumlah($idRek, 'o', $i, $tahunRek); ?></td>
                                </tr>
                            <?php
                            }

                            ?>
                        </tbody>
                    </table>
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

<script>
    $('#inTbhBarang').select2({
        dropdownParent: $("#mdlstokKeluar"),
        theme: 'bootstrap4'
    });

    $('#inRekapitulasibrg').select2({
        theme: 'bootstrap4'
    });

    function tampilrekapitulasi() {
        console.log($('#inRekapitulasibrg').val());
        console.log($('#inRekapitulasitahun').val());
    }
</script>