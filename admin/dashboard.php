<?php
session_start();

$title = "Dashboard Admin";

include '../database/query.php';
include '../template/header.php';
include '../template/sidebarAdmin.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar User</h1>
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
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID User</th>
                                <th scope="col">Username</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">No Telp</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach (getUserAdmin() as $value) {
                                if ($value['role'] != '1') {
                                    $i++;
                            ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $value['id_user']; ?></td>
                                        <td><?= $value['username']; ?></td>
                                        <td><?= $value['nama']; ?></td>
                                        <td><?= $value['email']; ?></td>
                                        <td><?= $value['no_tlp']; ?></td>
                                        <td><?= $value['alamat']; ?></td>
                                        <td><?= $value['role'] == '2' ? 'Kepala Gudang' : 'Karyawan'; ?></td>
                                        <td><a class="btn btn-warning btn-sm" href="updateUser.php" role="button">Edt</a>&nbsp;<a class="btn btn-danger btn-sm" href="#" role="button">Hps</a></td>
                                    </tr>
                            <?php
                                }
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