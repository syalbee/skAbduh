<?php
session_start();

$title = "Supplier";

include 'logicSupplier.php';
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
                    <h1>Supplier</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdltambahsupplier">
                    Tambah Supplier
                </button>
            </div>

            <div class="card-body">
                <div class="container">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Supplier</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Telp</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach (getSupplier() as $value) {
                                $i++;
                            ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $value['nama_supplier']; ?></td>
                                    <td><?= $value['alamat']; ?></td>
                                    <td><?= $value['notelp']; ?></td>
                                    <td><button type="button" class="btn btn-warning btn-sm" onclick="editSupplier('<?= $value['id_supplier']; ?>')">Edt</button>&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-sm" onclick="hapusSupplier('<?= $value['id_supplier']; ?>', '<?= $value['nama_supplier']; ?>')">Hps</button></td>
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
<div class="modal fade" id="mdltambahsupplier" tabindex="-1" aria-labelledby="mdltambahsupplier" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdltambahsupplier">Form Tambah Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="logicSupplier.php" method="POST">
                    <div class="form-group">
                        <label for="inNamaSupplier">Masukan Nama Supplier</label>
                        <input type="text" class="form-control" id="inNamaSupplier" name="inNamaSupplier" required>
                    </div>
                    <div class="form-group">
                        <label for="inAlamatSup">Masukan Alamat Supplier</label>
                        <input type="text" class="form-control" id="inAlamatSup" name="inAlamatSup" required>
                    </div>
                    <div class="form-group">
                        <label for="inNotelpsup">Masukan No Telp Supplier</label>
                        <input type="text" class="form-control" id="inNotelpsup" name="inNotelpsup" required>
                    </div>
                    <button type="submit" name="simpanSupplier" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Satuan Barang -->
<div class="modal fade" id="mdeditSupplier" tabindex="-1" aria-labelledby="mdeditSupplier" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdeditSupplier">Form Edit Satuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="inedtNamaSupplier">Masukan Nama Supplier</label>
                        <input type="text" class="form-control" id="inedtNamaSupplier" name="inedtNamaSupplier" required>
                        <input type="hidden" id="idedtSupplier" name="idedtSupplier">
                    </div>
                    <div class="form-group">
                        <label for="inedtAlamatSup">Masukan Alamat Supplier</label>
                        <input type="text" class="form-control" id="inedtAlamatSup" name="inedtAlamatSup" required>
                    </div>
                    <div class="form-group">
                        <label for="inedtNotelpsup">Masukan No Telp Supplier</label>
                        <input type="text" class="form-control" id="inedtNotelpsup" name="inedtNotelpsup" required>
                    </div>
                    <button type="button" onclick="simpaneditsupplier()" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Satuan Barang -->
<div class="modal fade" id="mdlHapusSupplier" tabindex="-1" aria-labelledby="mdlHapusSupplier" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlHapusSupplier"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idHpsSupplier">
                <h3 id="modalTitlehapus"></h3>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="submitHapussupplier()" class="btn btn-danger">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?php
include '../template/footer.php';
?>

<script>
    function editSupplier(id) {
        $.ajax({
            url: "logicSupplier.php",
            type: "post",
            dataType: "text",
            data: {
                editSupplier: id
            },
            success: (a) => {
                console.log(a);
                var data = JSON.parse(a);
                $('#mdeditSupplier').modal('show');
                $('#inedtNamaSupplier').val(data[0]);
                $('#inedtAlamatSup').val(data[1]);
                $('#inedtNotelpsup').val(data[2]);
                $('#idedtSupplier').val(id);
            },
            error: (a) => {
                console.log(a);
            },
        });
    }

    function simpaneditsupplier() {
        if ($('#inedtNamaSupplier').val() == "" || $('#inedtAlamatSup').val() == ""  || $('#inedtNotelpsup').val() == "") {
            alert("Perhatikan Kolom Inputan");
        } else {
            $.ajax({
                url: "logicSupplier.php",
                type: "post",
                dataType: "text",
                data: {
                    simpaneditSupplier: $('#idedtSupplier').val(),
                    namaSimpanSupplier: $('#inedtNamaSupplier').val(),
                    alamatSimpanSupplier: $('#inedtAlamatSup').val(),
                    notelpSimpanSupplier: $('#inedtNotelpsup').val(),
                },
                success: (a) => {
                    $('#mdeditSupplier').modal('hide');
                    location.reload();
                },
                error: (a) => {
                    console.log(a);
                },
            });
        }
    }

    function hapusSupplier(id, nama) {
        $('#mdlHapusSupplier').modal('show');
        $('#idHpsSupplier').val(id);
        $('#modalTitlehapus').html('Yakin Hapus Supplier ' + nama + ' ?');
    }

    function submitHapussupplier() {
        $.ajax({
            url: "logicSupplier.php",
            type: "post",
            dataType: "text",
            data: {
                idHapussuppliers: $('#idHpsSupplier').val()
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