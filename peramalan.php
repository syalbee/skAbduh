<?php
include('koneksi.php');
include('inc_admin/header.php');

?>


<!-- Isi-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div>

            <div>
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div>
                                    <h1 class="h4 text-gray-900 mb-4">Perencanaan Pengadaan</h1>
                                </div>

                                <!-- Form inputan -->

                                <form action="peramalan.php" method="GET">
                                    <div class="form-group my-4">
                                        <label class="font-weight-bold text-dark">Tanggal</label>
                                        <input class="form-control my-1" type="date" name="tanggal" required="" />
                                        <button type="submit" class="btn btn-primary mt-2">Search</button>
                                    </div>
                                </form>


                                <?php


                                if (isset($_GET['tanggal'])) {

                                    $tanggal = $_GET['tanggal'];
                                    $query = "SELECT tb_stok.jumlah as stok,
                                tb_bahanbaku.nama_bahanbaku as nama_bahanbaku, 
                                ROUND(SUM(tb_pengeluaran.jumlah) / 5) as hasil FROM tb_pengeluaran 
                                LEFT JOIN tb_bahanbaku ON tb_pengeluaran.id_bahanbaku = tb_bahanbaku.id_bahanbaku
                                LEFT JOIN tb_stok ON tb_pengeluaran.id_stok = tb_stok.id_stok
                                WHERE tb_pengeluaran.tanggal BETWEEN DATE('$tanggal' - INTERVAL 5 MONTH) AND '$tanggal'
                                GROUP BY tb_pengeluaran.id_bahanbaku ";


                                    $result = mysqli_query($koneksi, $query);

                                    //mengecek apakah ada error ketika menjalankan at
                                    if (!$result) {
                                        die("Query Error: " . mysqli_errno($koneksi) .
                                            " - " . mysqli_error($koneksi));
                                    }
                                    //buat perulangan untuk element tabel dari data pasien
                                    $no = 1; //variabel untuk membuat nomor urut
                                    // hasil query akan disimpan dalam bentuk array
                                    // kemudian dicetak dengan perulangan while
                                ?>
                                    <form action="proses_tambah_pengadaan.php" method="POST" enctype="multipart/form-data">

                                        <section class="base">
                                            <div class="form-group my-2">
                                                <button class="btn-primary mx-auto align-text-center" type="submit">TAMBAH PERAMALAN</button>
                                            </div>
                                            <table class="table table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Bahan Baku</th>
                                                        <th scope="col">Stok</th>
                                                        <th scope="col">Hasil Peramalan</th>
                                                        <th scope="col">Jumlah Harus Pengadaan</th>
                                                        <th scope="col">Keterangan</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php


                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <?php $value = array(
                                                            'hasil' => $row['hasil']
                                                        );
                                                        ?>
                                                        <?php
                                                        $stok = ($row['stok']);
                                                        $SMA = ($row['hasil']);
                                                        $jumlah = ($row['hasil'] * 5);
                                                        $waktu = 3;
                                                        $h_kerja = 26;
                                                        $service_l = 95 / 100;
                                                        $z = 1.645;
                                                        $rt_bahanBaku = $jumlah / $h_kerja;
                                                        $sdp = $rt_bahanBaku / 10;
                                                        $sdlt = $waktu / 10;
                                                        $ss = round($z * (pow($rt_bahanBaku, 2) * pow($sdlt, 2)) + ($waktu * (pow($sdp, 2))));

                                                        // HITUNG ROP
                                                        $d = $SMA / $h_kerja;
                                                        $hitung_rop = round(($waktu * $d) + $ss);

                                                        // HITUNG NILAI PENGADAAN
                                                        $n_total = round($SMA + $ss);

                                                        $total_p = $n_total - $stok;
                                                        ?>
                                                        <tr>

                                                            <td><?php echo $no; ?></td>

                                                            <td><?php echo $row['nama_bahanbaku']; ?></td>

                                                            <td><?php echo $row['stok']; ?> Roll</td>

                                                            <td><?php echo $n_total; ?> Roll</td>

                                                            <td><?php echo $total_p; ?> Roll</td>

                                                            <?php
                                                            if ($ss < $stok) {
                                                                echo  "<td style='background-color: green;color: white;'>AMAN</td>";
                                                            } else {
                                                                echo  "<td style='background-color: red;color: white;'>LAKUKAN PENGADAAN</td>";
                                                            }
                                                            ?>


                                                            <input type="hidden" name="tanggal" value="<?= $_GET['tanggal'] ?>">

                                                            <td>
                                                                <input type="checkbox" name="pengadaan[]" value="<?= $row['id_bahanbaku'] . ',' . $n_total ?>">
                                                            </td>


                                                        </tr>

                                                    <?php $no++; //untuk nomor urut terus bertambah 1
                                                    } ?>


                                                </tbody>
                                            </table>

                                        <?php } ?>


                            </div>
                            <br>
                            <div>
                            </div>
                            </section>
                            </form>
                            <!-- Akhir form input -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

</div>
</div>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>

</html>