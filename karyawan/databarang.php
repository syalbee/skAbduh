<?php
session_start();

$title = "Data Satuan";

include 'logicBarang.php';
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
                    <h1>Data Barang</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdltambahbarang">
                    Tambah Barang
                </button>
            </div>

            <div class="card-body">

                <div class="container">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Supplier</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Gudang</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach (getBarang() as $value) {
                                $i++;
                            ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $value['id_barang']; ?></td>
                                    <td><?= $value['nama_barang']; ?></td>
                                    <td><?= $value['nama_supplier']; ?></td>
                                    <td><?= $value['satuan']; ?></td>
                                    <td><?= $value['nama_gudang']; ?></td>
                                    <td><button type="button" class="btn btn-warning btn-sm" onclick="editBarang('<?= $value['id_barang']; ?>')">Edt</button>&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-sm" onclick="hapusBarang('<?= $value['id_barang']; ?>', '<?= $value['nama_barang']; ?>')">Hps</button></td>
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

<!-- Modal Tambah Barang -->
<div class="modal fade" id="mdltambahbarang" tabindex="-1" aria-labelledby="mdltambahbarang" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdltambahbarang">Form Tambah Satuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="logicBarang.php" method="POST">
                    <div class="form-group">
                        <label for="inNamaBarang">Masukan Barang</label>
                        <input type="text" class="form-control" id="inNamaBarang" name="inNamaBarang">
                    </div>

                    <div class="form-group">
                        <label for="inSupplier">Supplier</label>
                        <select id="inSupplier" class="form-control" name="inSupplier" required>
                            <?php
                            foreach (getSupplier() as $value) {
                            ?>
                                <option value="<?= $value['id_supplier']; ?>"><?= $value['nama_supplier']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inSatuan">Satuan</label>
                        <select id="inSatuan" class="form-control" name="inSatuan" required>
                            <?php
                            foreach (getSatuan() as $value) {
                            ?>
                                <option value="<?= $value['id_satuan']; ?>"><?= $value['nama']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inGudang">Gudang</label>
                        <select id="inGudang" class="form-control" name="inGudang" required>
                            <?php
                            foreach (getGudang() as $value) {
                            ?>
                                <option value="<?= $value['id_gudang']; ?>"><?= $value['nama_gudang']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <button type="button" name="simpanBarang" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Barang -->
<div class="modal fade" id="mdleditbarang" tabindex="-1" aria-labelledby="mdleditbarang" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdleditbarang">Form Edit Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="inNamaBarangedt">Masukan Barang</label>
                        <input type="text" class="form-control" id="inNamaBarangedt" name="inNamaBarangedt">
                        <input type="hidden" id="inEdtIDbarang">
                    </div>

                    <div class="form-group">
                        <label for="inSupplieredt">Supplier</label>
                        <select id="inSupplieredt" class="form-control" name="inSupplieredt" required>
                            <?php
                            foreach (getSupplier() as $value) {
                            ?>
                                <option value="<?= $value['id_supplier']; ?>"><?= $value['nama_supplier']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inSatuanedt">Satuan</label>
                        <select id="inSatuanedt" class="form-control" name="inSatuanedt" required>
                            <?php
                            foreach (getSatuan() as $value) {
                            ?>
                                <option value="<?= $value['id_satuan']; ?>"><?= $value['nama']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inGudangedt">Gudang</label>
                        <select id="inGudangedt" class="form-control" name="inGudangedt" required>
                            <?php
                            foreach (getGudang() as $value) {
                            ?>
                                <option value="<?= $value['id_gudang']; ?>"><?= $value['nama_gudang']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <button type="button" onclick="simpaneditBarang()" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Satuan Barang -->
<div class="modal fade" id="mdlhapusbarang" tabindex="-1" aria-labelledby="mdlhapusbarang" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlhapusbarang"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idHpsBarang">
                <h3 id="modalTitlehapusbarang"></h3>
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
    function editBarang(id) {
        $.ajax({
            url: "logicBarang.php",
            type: "post",
            dataType: "text",
            data: {
                editBarang: id
            },
            success: (a) => {
                var data = JSON.parse(a);
                console.log(data);
                $('#mdleditbarang').modal('show');
                $('#inNamaBarangedt').val(data[0]);
                $('#inEdtIDbarang').val(id);
            },
            error: (a) => {
                console.log(a);
            },
        });
    }

    function simpaneditBarang() {
        $.ajax({
            url: "logicBarang.php",
            type: "post",
            dataType: "text",
            data: {
                idBarangedt: $('#inEdtIDbarang').val(),
                supplierBarangedt: $("#inSupplieredt").val(),
                satuanBarangedt: $("#inSatuanedt").val(),
                gudangBarangedt: $("#inGudangedt").val(),
                namaBarangedt: $('#inNamaBarangedt').val()
            },
            success: (a) => {
                console.log(a);
                $('#mdleditbarang').modal('hide');
                location.reload();
            },
            error: (a) => {
                console.log(a);
            },
        });
    }


    function hapusBarang(id, nama) {
        $('#mdlhapusbarang').modal('show');
        $('#idHpsBarang').val(id);
        $('#modalTitlehapusbarang').html('Yakin Hapus Data ' + nama + ' ?');
    }

    function submitHapusbarang() {
        $.ajax({
            url: "logicBarang.php",
            type: "post",
            dataType: "text",
            data: {
                idHapusbarangs: $('#idHpsBarang').val()
            },
            success: (a) => {
                $('#mdlhapusbarang').modal('hide');
                location.reload();
            },
            error: (a) => {
                console.log(a);
            },
        });
    }
</script>