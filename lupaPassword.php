<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Lupa Passord</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="login-logo">

        </div>
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h5"><b>Form Lupa Password</B></a>
            </div>
            <div class="card-body">
                <!-- <p class="login-box-msg">Sign-in Untuk Memulai Sesi</p> -->
                <?php
                if (isset($_GET['tidakada'])) {
                    if ($_GET['tidakada'] == "gagal") {
                        echo "<div class='alert'><p class='text-danger'>Email tidak terdaftar !</p></div>";
                    }
                }
                ?>
                <form action="logicLupapassword.php" method="POST">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="Konfirmasiemail" placeholder="Masukan Email Anda" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-at"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-6 mx-auto">
                            <button type="submit" name="btnCekemail" class="btn btn-primary btn-block">Submit</button>
                        </div>
                        <div class="col-6 mx-auto">
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>