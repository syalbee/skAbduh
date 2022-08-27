<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin.php" class="brand-link">
        <span class="brand-text font-weight-light"><b>PT. Gita Persada Rajawali</b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info mx-auto">
                <a href="#" class="d-block"><?= $_SESSION['nama']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <?php
                    include '../database/koneksi.php';

                    $query = mysqli_query($koneksi, "SELECT id_gudang, nama_gudang FROM gudang");
                    if (!$query) {
                        printf("Error: %s\n", mysqli_error($koneksi));
                        exit();
                    }
                    foreach ($query as $gudang) { ?>

                <li class="nav-item">
                    <a href="dashboard.php?q=<?= $gudang['id_gudang']; ?>" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p><?= $gudang['nama_gudang']; ?></p>
                    </a>
                </li>
                     <?php } ?>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>