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
                    <h1>Tambah User</h1>
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
                    <form action="insertAdmin.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inNama">Nama</label>
                                <input type="text" class="form-control" id="inNama" name="inNama" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inUsername">Username</label>
                                <input type="text" class="form-control" id="inUsername" name="inUsername" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inEmail">Email</label>
                                <input type="email" class="form-control" id="inEmail" name="inEmail" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inPassword">Password</label>
                                <input type="password" class="form-control" id="inPassword" name="inPassword" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inNotelp">No Telp</label>
                                <input type="text" class="form-control" id="inNotelp" name="inNotelp" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inJabatan">Jabatan</label>
                                <select id="inJabatan" class="form-control" name="inJabatan" required>
                                    <option value="2">Kepala Gudang</option>
                                    <option value="3">Karyawan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inAlamat">Alamat</label>
                                <textarea class="form-control" id="inAlamat" name="inAlamat" rows="3"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
