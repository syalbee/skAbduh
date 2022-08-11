<?php 
// mengaktifkan session php
session_start();

// menghapus semua session
session_destroy();

// mengalihkan halaman ke halaman login
header("location:index.php");
?>



<div class="form-group">
                        <label for="inNamaBarang">Masukan Nama Barang</label>
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
                    </div>

                    <div class="form-group">
                        <label for="inSupplier">Supplier</label>
                        <select id="inSupplier" class="form-control" name="inSupplier" required>
                            <?php
                            foreach (getSupplier() as $value) {
                            ?>
                                <option value="<?= $value['id_supplier']; ?>"><?= $value['nama_supplier']; ?> </option>
                            <?php } ?>
                    </div>
