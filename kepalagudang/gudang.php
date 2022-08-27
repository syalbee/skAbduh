<?php
session_start();

$title = "Data Satuan";

include 'logicGudang.php';
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
                    <h1>Data Gudang</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nama Gudang</th>
                                <th scope="col">Max Kapasitas</th>
                                <th scope="col">Kapasitas Sekarang</th>
                                <th scope="col">Sisa Kapasitas</th>
                                <th scope="col">Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach (getGudang($_GET['q']) as $value) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?= $value['nama_gudang']; ?></td>
                                    <td><?= $value['max_kapasitas']; ?></td>
                                    <td><?= $value['jumlah'] == NULL ? '0' : $value['jumlah']; ?></td>
                                    <td><?= $value['max_kapasitas'] - $value['jumlah']; ?></td>
                                    <td><?= $value['alamat']; ?></td>
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