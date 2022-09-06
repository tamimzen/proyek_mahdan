<?php include('../koneksi.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MOCO</title>
    <link rel="icon" href="../dist/img/logo/mini-moco.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css" />
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="../dist/css/style.css" />
    </script>


</head>

<body class="hold-transition login-page" style="background-image: url('../dist/img/login/login.jpg');
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;">



    <div class="login-box" style="width: 650px">
        <!-- /.login-logo -->
        <div class="card" style="height: 540px;">
            <div class="row">
                <div class="col-12 text-center row" style="padding-top: 40px;">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <img src="../dist/img/logo/moco.png" style="width: 90%; background-position: center center;
                        background-size: cover;
                        background-repeat: no-repeat;">
                    </div>
                    <div class="col-4"></div>
                </div>
                <div class="col-12 text-center" style="padding-top: 10px;">
                    <p class="text-center" style="color: #636466; font-weight: bold;">A place to share knowledge and
                        better understand
                        technology</p>
                </div>


                <!-- login -->

                <div class="col-12 row" style="margin-top: -40px;">
                    <div class="col-6">
                        <div class="container" style="margin-top: 50px; margin-bottom: 50px">
                            <div class="card-body login-card-body" style="color: #282829">
                                <h5
                                    style="border-bottom: 1px solid #dee0e1; margin-bottom: 30px; font-weight:500; padding-bottom: 7px;">
                                    Masuk
                                </h5>

                                <form action="cek_login_pengguna.php" method="post">
                                    <p class="font-weight-bold" style="margin-bottom: 5px">
                                        Email
                                    </p>
                                    <div class="input-group mb-3">
                                        <input type="text" name="email" class="form-control"
                                            placeholder="Masukkan email" required />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-weight-bold" style="margin-bottom: 5px">
                                        Kata Sandi
                                    </p>
                                    <div class="input-group mb-3">
                                        <input type="password" name="pw" class="form-control"
                                            placeholder="Masukkan kata sandi" required />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <br />
                                    <div class="row">
                                        <!-- /.col -->
                                        <div class="col-4"></div>
                                        <div class="col-4">
                                            <button type="submit" value="login" class="btn btn-primary btn-block"
                                                style="margin-top: 10px">
                                                Masuk
                                            </button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- daftar -->
                    <div class="col-6">
                        <div class="container"
                            style=" border-left: 1px solid #dee0e1;  margin-top: 50px;  margin-bottom: 50px; ">
                            <div class="card-body login-card-body" style="color: #282829">
                                <h5
                                    style="border-bottom: 1px solid #dee0e1; margin-bottom: 30px; font-weight:500; padding-bottom: 7px;">
                                    Buat akun
                                </h5>

                                <form action="cek_daftar_pengguna.php" method="post">
                                    <p class="font-weight-bold" style="margin-bottom: 5px">
                                        Email
                                    </p>
                                    <div class="input-group mb-3">
                                        <input type="text" name="email" class="form-control"
                                            placeholder="Masukkan email" required />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-weight-bold" style="margin-bottom: 5px">
                                        Nama pengguna
                                    </p>
                                    <div class="input-group mb-3">
                                        <input type="text" name="nm_pengguna" class="form-control"
                                            placeholder="Masukkan nama pengguna" required />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <p class="font-weight-bold" style="margin-bottom: 5px">
                                                Kata sandi
                                            </p>
                                            <div class="input-group mb-3">
                                                <input type="password" name="pw" class="form-control" required />
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <p class="font-weight-bold" style="margin-bottom: 5px">
                                                Tanggal lahir
                                            </p>
                                            <div class="input-group mb-3">
                                                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"
                                                    required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- /.col -->
                                        <div class="col-3"></div>
                                        <div class="col-5">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                Buat akun
                                            </button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- /.login-box -->


    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>