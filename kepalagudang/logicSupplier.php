<?php

if (isset($_POST['simpanSupplier'])) {
    saveSupplier();
} else if (isset($_POST['editSupplier'])) {
    editSupplier();
} else if (isset($_POST['simpaneditSupplier'])) {
    simpaneditSupplier();
} else if(isset($_POST['idHapussuppliers'])){
    submitHapussupplier();
}

function getSupplier()
{
    include '../database/koneksi.php';

    $query = mysqli_query($koneksi, "SELECT * FROM supplier");
    if (!$query) {
        printf("Error: %s\n", mysqli_error($koneksi));
        exit();
    }

   return $query;
}


function saveSupplier()
{
    include '../database/koneksi.php';

    $nama = $_POST['inNamaSupplier'];
    $alamat = $_POST['inAlamatSup'];
    $notelp = $_POST['inNotelpsup'];
    $supplier = mysqli_query($koneksi, "INSERT INTO supplier (nama_supplier,alamat, notelp ) VALUES('$nama', '$alamat', '$notelp')");

    if ($supplier) {
        header("location:../kepalagudang/supplier.php");
    } else {
        echo "Error: " . $supplier . "<br>" . mysqli_error($koneksi);
    }
}

function editSupplier()
{
    include '../database/koneksi.php';

    $id = $_POST['editSupplier'];
    $editSupplier = mysqli_query($koneksi, "SELECT nama_supplier, alamat, notelp FROM supplier WHERE id_supplier = '$id'");

    if ($editSupplier) {
        echo json_encode(mysqli_fetch_array($editSupplier));
    } else {
        echo "Error: " . $editSupplier . "<br>" . mysqli_error($koneksi);
    }
}

function simpaneditSupplier()
{
    include '../database/koneksi.php';

    $id = $_POST['simpaneditSupplier'];
    $nama = $_POST['namaSimpanSupplier'];
    $alamat = $_POST['alamatSimpanSupplier'];
    $notelp = $_POST['notelpSimpanSupplier'];

    $editSupplierSimpan = mysqli_query($koneksi, "UPDATE supplier SET nama_supplier='$nama', alamat='$alamat', notelp='$notelp' WHERE id_supplier='$id'");

    if (!$editSupplierSimpan) {
        echo "Error: " . $editSupplierSimpan . "<br>" . mysqli_error($koneksi);
    }
}

function submitHapussupplier(){
    include '../database/koneksi.php';

    $id = $_POST['idHapussuppliers'];
    $hapusSupplier = mysqli_query($koneksi, "DELETE FROM supplier WHERE id_supplier = '$id'");

    if (!$hapusSupplier) {
        echo "Error: " . $hapusSupplier . "<br>" . mysqli_error($koneksi);
    }
}
