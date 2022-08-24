<?php
session_start();

$title = "Dashboard Produksi";


include '../template/header.php';
include '../template/sidebarProduksi.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Produksi</h1>
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
                    <table class="table w-100 table-bordered table-hover" id="tblproduksi">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Gudang</th>
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


<?php
include '../template/footer.php';
?>

<script>
    $("#tblproduksi").DataTable({
        responsive: !0,
        scrollX: !0,
        ajax: 'logicDashboard.php',
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
                data: "stok"
            },
            {
                data: "gudang"
            },
        ],
    });

    $('#cariBarangproduksi').select2({
        theme: 'bootstrap4'
    });
</script>