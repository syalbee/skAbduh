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
                    <a href="dashboard.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Monitoring
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="persediaan.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Persedian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="rekapitulasi.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rekapitulasi Data Barang</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="laporan.php" class="nav-link">
                        <i class="nav-icon fas fa-file-pdf"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="perencanaan.php" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Perencanaan
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="supplier.php" class="nav-link">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>
                            Supplier
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>