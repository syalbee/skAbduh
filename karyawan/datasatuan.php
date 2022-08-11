<?php
session_start();

$title = "Data Satuan";

include 'logicSatuan.php';
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
                    <h1>Data Satuan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdltambahsatuan">
                    Tambah Satuan
                </button>
            </div>

            <div class="card-body">

                <div class="container">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Satuan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach (getsatuan() as $value) {
                                $i++;
                            ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $value['nama']; ?></td>
                                    <td><button type="button" class="btn btn-warning btn-sm" onclick="editSatuan('<?= $value['id_satuan']; ?>')">Edt</button>&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-sm" onclick="hapusSatuan('<?= $value['id_satuan']; ?>', '<?= $value['nama']; ?>')">Hps</button></td>
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

<!-- Modal Tambah Satuan Barang -->
<div class="modal fade" id="mdltambahsatuan" tabindex="-1" aria-labelledby="mdltambahsatuan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdltambahsatuan">Form Tambah Satuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="logicSatuan.php" method="POST">
                    <div class="form-group">
                        <label for="inSatuan">Masukan Jenis Satuan</label>
                        <input type="text" class="form-control" id="inSatuan" name="inSatuan">
                    </div>
                    <button type="submit" name="simpanSatuan" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Satuan Barang -->
<div class="modal fade" id="mdleditsatuan" tabindex="-1" aria-labelledby="mdleditsatuan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdleditsatuan">Form Edit Satuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="inSatuanedt">Masukan Jenis Satuan</label>
                        <input type="text" class="form-control" id="inSatuanedt" name="inSatuanedt">
                        <input type="hidden" id="inIDsatuanedt">
                    </div>
                    <button type="button" onclick="simpaneditsatuan()" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Satuan Barang -->
<div class="modal fade" id="mdlhapusatuan" tabindex="-1" aria-labelledby="mdlhapusatuan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlhapusatuan"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idHpsSatuan">
                <h3 id="modalTitlehapus"></h3>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="submitHapussatuan()" class="btn btn-danger">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?php
include '../template/footer.php';
?>

<script>
    function editSatuan(id) {
        $.ajax({
            url: "logicSatuan.php",
            type: "post",
            dataType: "text",
            data: {
                editSatuan: id
            },
            success: (a) => {
                var data = JSON.parse(a);
                $('#mdleditsatuan').modal('show');
                $('#inSatuanedt').val(data[0]);
                $('#inIDsatuanedt').val(id);
            },
            error: (a) => {
                console.log(a);
            },
        });
    }

    function simpaneditsatuan() {
        $.ajax({
            url: "logicSatuan.php",
            type: "post",
            dataType: "text",
            data: {
                simpaneditSatuan: $('#inSatuanedt').val(),
                idsimpansatuan: $('#inIDsatuanedt').val()
            },
            success: (a) => {
                $('#mdleditsatuan').modal('hide');
                location.reload();
            },
            error: (a) => {
                console.log(a);
            },
        });
    }

    function hapusSatuan(id, nama) {
        $('#mdlhapusatuan').modal('show');
        $('#idHpsSatuan').val(id);
        $('#modalTitlehapus').html('Yakin Hapus Data ' + nama + ' ?');
    }

    function submitHapussatuan() {
        $.ajax({
            url: "logicSatuan.php",
            type: "post",
            dataType: "text",
            data: {
                idHapussatuans: $('#idHpsSatuan').val()
            },
            success: (a) => {
                $('#mdleditsatuan').modal('hide');
                location.reload();
            },
            error: (a) => {
                console.log(a);
            },
        });
    }
</script>