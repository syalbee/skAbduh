<?php
session_start();

$title = "Dashboard Admin";

include 'logicUpdate.php';
include '../template/header.php';
include '../template/sidebarAdmin.php';

if (isset($_POST['btnUpdateuser'])) {
    include '../database/koneksi.php';

    $idUser = $_POST['btnUpdateuser'];
    $user = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '$idUser'");
    $user = mysqli_fetch_array($user);
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update User <?= $user['nama']; ?></h1>
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
                    <form action="logicUpdate.php" method="POST">
                        <input type="hidden" name="idUpdtuser" value="<?= $user['id_user']; ?>">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inNamaupdt">Nama</label>
                                <input value="<?= $user['nama']; ?>" type="text" class="form-control" id="inNamaupdt" name="inNamaupdt" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inUsernameupdt">Username</label>
                                <input value="<?= $user['username']; ?>" type="text" class="form-control" id="inUsernameupdt" name="inUsernameupdt" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inEmailupdt">Email</label>
                                <input value="<?= $user['email']; ?>" type="email" class="form-control" id="inEmailupdt" name="inEmailupdt" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inPasswordupdt">Password</label>
                                <input type="password" class="form-control" id="inPasswordupdt" name="inPasswordupdt" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inNotelpupdt">No Telp</label>
                                <input value="<?= $user['no_tlp']; ?>" type="text" class="form-control" id="inNotelpupdt" name="inNotelpupdt" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inJabatanupdt">Jabatan</label>
                                <select id="inJabatanupdt" class="form-control" name="inJabatanupdt" required>
                                    <option value="2">Kepala Gudang</option>
                                    <option value="3">Karyawan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inAlamatupdt">Alamat</label>
                                <textarea class="form-control" id="inAlamatupdt" name="inAlamatupdt" rows="3" required><?= $user['alamat']; ?></textarea>
                            </div>
                        </div>
                        <button type="submit" name="btnSimpanUpdateusr" class="btn btn-primary">Submit</button>
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