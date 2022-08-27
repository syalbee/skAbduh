<?php
session_start();

$title = "Data Satuan";

include 'logicGudang.php';
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
                                <th scope="col">Aksi</th>
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
                                    <td><?= $value['jumlah'] == NULL ? '0': $value['jumlah']; ?></td>
                                    <td><?= $value['max_kapasitas'] - $value['jumlah']; ?></td>
                                    <td><?= $value['alamat']; ?></td>
                                    <td><button type="button" class="btn btn-warning btn-sm" onclick="editGudang('<?= $value['id_gudang']; ?>')">Edit</button></td>
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

<!-- Modal Edit Gudang -->
<div class="modal fade" id="mdlEdtGudang" tabindex="-1" aria-labelledby="mdlEdtGudang" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlEdtGudang">Form Edit Satuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="inNamaGudang">Nama Gudang</label>
                        <input type="text" class="form-control" id="inNamaGudang" name="inNamaGudang" required>
                        <input type="hidden" id="inIDgudangedt">
                    </div>
                    <div class="form-group">
                        <label for="inMaxKapasitas">Max Jumlah Kapasitas</label>
                        <input type="text" class="form-control" id="inMaxKapasitas" name="inMaxKapasitas" required>
                    </div>
                    <div class="form-group">
                        <label for="inAlamatgudang">Alamat</label>
                        <input type="text" class="form-control" id="inAlamatgudang" name="inAlamatgudang" required>
                    </div>
                    <button type="button" onclick="simpaneditgudang()" class="btn btn-primary">Simpan</button>
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
    function editGudang(id) {
        $.ajax({
            url: "logicGudang.php",
            type: "post",
            dataType: "text",
            data: {
                editGudangid: id
            },
            success: (a) => {
                var data = JSON.parse(a);
                $('#mdlEdtGudang').modal('show');
                $('#inNamaGudang').val(data['nama_gudang']);
                $('#inMaxKapasitas').val(data['max_kapasitas']);
                $('#inAlamatgudang').val(data['alamat']);
                $('#inIDgudangedt').val(id);
            },
            error: (a) => {
                console.log(a);
            },
        });
    }

    function simpaneditgudang() {
        console.log("hehe");
        if ($('#inNamaGudang').val() == "" || $('#inMaxKapasitas').val() == "" || $('#inAlamatgudang').val() == "") {
            alert("Perhatikan Kolom Inputan");
        } else {
            $.ajax({
                url: "logicGudang.php",
                type: "post",
                dataType: "text",
                data: {
                    namaGudang: $('#inNamaGudang').val(),
                    maxKapaGudang: $('#inMaxKapasitas').val(),
                    alamatGudang: $('#inAlamatgudang').val(),
                    idGudang: $('#inIDgudangedt').val(),
                },
                success: (a) => {
                    console.log(a);
                    $('#mdlEdtGudang').modal('hide');
                    location.reload();
                },
                error: (a) => {
                    console.log(a);
                },
            });
        }
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
                $('#mdlhapusatuan').modal('hide');
                location.reload();
            },
            error: (a) => {
                console.log(a);
            },
        });
    }
</script>