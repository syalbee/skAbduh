<?php
session_start();

$title = "Barang Keluar";

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
                    <h1>Data Barang Keluar</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlstokKeluar">
                    Stok Keluar
                </button>
            </div>

            <div class="card-body">

                <div class="container">
                    <table class="table w-100 table-bordered table-hover" id="tblbarangkeluar">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Tanggal Masuk</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

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

<!-- Modal tambah stok barang -->
<div class="modal fade" id="mdlstokKeluar" aria-labelledby="mdlstokKeluar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlstokKeluar">Form Tambah Stok Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="logicBarang.php" method="POST">
                    <div class="form-group">
                        <label for="inTbhBarang">Pilih Barang</label>
                        <select id="inTbhBarang" class="form-control" name="inTbhBarang">
                            <?php
                            foreach (getBarang() as $value) {
                            ?>
                                <option value="<?= $value['id_barang']; ?>"><?= $value['nama_barang']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inJmlBrgtbh">Masukan Jumlah</label>
                        <input type="text" class="form-control" id="inJmlBrgtbh" name="inJmlBrgtbh">
                    </div>

                    <button type="submit" name="btnOutbarangstok" class="btn btn-primary">Simpan</button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
include '../template/footer.php';
?>

<script>
    let url,
        barangMasuk = $("#tblbarangkeluar").DataTable({
            responsive: !0,
            scrollX: !0,
            ajax: 'getBarangKeluar.php',
            columnDefs: [{
                searcable: !1,
                orderable: !1,
                targets: 0
            }],
            order: [
                [1, "asc"]
            ],
            columns: [{
                    data: "no"
                },
                {
                    data: "id"
                },
                {
                    data: "nama"
                },
                {
                    data: "tanggal"
                },
                {
                    data: "jumlah"
                },
                {
                    data: "action"
                },
            ],
        });

    $('#inTbhBarang').select2({
        dropdownParent: $("#mdlstokKeluar"),
        theme: 'bootstrap4'
    });

</script>