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
                                        <td>
                                            <form action="updateUser.php" method="POST">
                                                <button class="btn btn-warning btn-sm" name="btnUpdateuser" value="<?= $value['id_user']; ?>" type="submit">Edt</button>&nbsp;
                                            </form>
                                            <button class="btn btn-danger btn-sm" type="button" onclick="hapusUser('<?= $value['id_user']; ?>', '<?= $value['nama']; ?>')">Hps</button>
                                        </td>

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

<!-- Modal Hapus Satuan Barang -->
<div class="modal fade" id="mdlHpsUser" aria-labelledby="mdlHpsUser" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlHpsUser"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idHpsUser">
                <h3 id="modalTitlehapususer"></h3>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="submitHapusbarang()" class="btn btn-danger">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
include '../template/footer.php';
?>

<script>
    function hapusUser(id, nama) {
        console.log(nama);
        $('#mdlHpsUser').modal('show');
        $('#idHpsUser').val(id);
        $('#modalTitlehapususer').html('Yakin Hapus Data ' + nama + ' ?');
    }

    function submitHapusbarang() {
        $.ajax({
            url: "logicUpdate.php",
            type: "post",
            dataType: "text",
            data: {
                idHapusUsers: $('#idHpsUser').val()
            },
            success: (a) => {
                $('#mdlHpsUser').modal('hide');
                location.reload();
            },
            error: (a) => {
                console.log(a);
            },
        });
    }
</script>