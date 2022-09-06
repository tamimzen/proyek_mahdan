<?php include 'koneksi.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} 
 
$pathfile = "index.php";

$pengguna=array();
if(!empty($_SESSION['id_pengguna'])){
    $tampilpengguna= mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna='$_SESSION[id_pengguna]'");
    $pengguna    = mysqli_fetch_array($tampilpengguna);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MOCO</title>
    <link rel="icon" href="dist/img/logo/mini-moco.png">
    <link rel="stylesheet" href="dist/css/style.css" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="plugins/ekko-lightbox/ekko-lightbox.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="plugins/codemirror/theme/monokai.css">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="plugins/simplemde/simplemde.min.css">
    <!-- Theme saya -->
    <link rel="stylesheet" href="dist/css/style.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css" />
    <link rel="stylesheet" href="dist/css/style.css" />
    <script src="dist/ckeditor/ckeditor.js"></script>
</head>


<body class="hold-transition layout-top-nav layout-navbar-fixed"
    style="margin: 0px; padding: 0px; background-color: rgb(241, 242, 242);">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/logo/moco.png" width="100" />
        </div>


        <!-- Navbar -->

        <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm">
            <div class="container">
                <!-- Left navbar links -->
                <div class="col-md-9">
                    <ul class="navbar-nav">
                        <div class="col-md-2">
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="index.php" class="nav-link">
                                    <img src="dist/img/logo/moco.png" style="height: 25px; margin-top: -5px; background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;">
                                </a>
                            </li>
                        </div>
                        <div class="col-md-10">
                            <form method="GET" action="pages/pengguna/pencarian/pencarian.php">

                                <div class="form-inline">
                                    <div class="input-group" style="width: 100%; height: 36px">
                                        <input class="form-control form-control-sidebar" placeholder="Cari Moco"
                                            aria-label="Search" type="text" name="cari_pencarian" id="cari_pencarian" />
                                        <div class="form-group">
                                            <select name="cari_tipe" id="cari_tipe" class="form-control">
                                                <option value="">Filter Tipe</option>
                                                <option value="TANYA">
                                                    TANYA</option>
                                                <option value="BERBAGI">
                                                    BERBAGI</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-light" value="cari"
                                            style="background-color: white;">
                                            <i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </ul>
                </div>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto iconnavbar" style="margin-top: -15px;">
                    <!-- Navbar Search -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" role="button">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/pengguna/pertanyaan/pertanyaan.php" role="button">
                            <i class="fas fa-server"></i>
                        </a>
                    </li>

                    <?php
                    if (!isset($_SESSION["id_pengguna"])) {
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="auth/loginpengguna.php" role="button">
                            <button type="button" class="btn btn-primary">Masuk / Daftar</button>
                        </a>
                    </li>

                    <?php
                    } else {
                    ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-danger navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="dist/img/profil/<?php echo $pengguna ["foto_profil"]; ?>"
                                        alt="User Avatar" class="img-size-50 mr-3 img-circle" />
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-right text-sm text-info"><i
                                                    class="fas fa-circle"></i></span>
                                        </h3>
                                        <p class="text-sm">Call me whenever you can...</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                        </div>
                    </li>
                    <!-- profil -->
                    <li class="nav-item dropdown">
                        <a class="nav-link iconnavbar" role="button" data-toggle="dropdown">
                            <img src="dist/img/profil/<?php echo $pengguna ["foto_profil"]; ?>" class="img-circle"
                                alt="User Image" style="object-fit: cover; height: 130%;width: 2rem;" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="pages/pengguna/profil/profil.php?id=<?= $pengguna['id_pengguna'] ?>"
                                class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="dist/img/profil/<?php echo $pengguna['foto_profil'] ?>" alt="User Avatar"
                                        class="img-circle" style="object-fit: cover; height: 2rem;width: 2rem;" />
                                    <div class="media-body">
                                        <h2 class="dropdown-item-title font-weight-bold"
                                            style="margin-left: 10px;    margin-top: 5px;">
                                            <?php echo $pengguna['nm_pengguna'] ?>
                                        </h2>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="auth/logout_pengguna.php" class="dropdown-item"
                                onclick="return confirm('Apakah Anda Yakin Keluar?');">
                                <p>Keluar</p>
                            </a>
                        </div>
                    </li>
                    <!-- modal tambah -->
                    <li class="nav-item">

                        <a class="nav-link" type="button" data-toggle="modal" data-target="#modaltambah">
                            <i class="far fa-plus-square"></i><i class="fas fa-sign-out"></i>
                        </a>
                    </li>

                    <?php
                    }
                    ?>
                    <!-- notifikasi -->

                </ul>
            </div>
        </nav>

        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <br />
        <br />
        <br />

        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="12">


                            <?php

                            if (!isset($_SESSION["id_pengguna"])) {
                            } else {
                            ?>

                            <div class="card card-widget">
                                <div class="card-header">
                                    <div class="user-block">
                                        <img class="img-circle" style="object-fit: cover;"
                                            src="dist/img/profil/<?php echo $pengguna["foto_profil"]; ?>"
                                            alt="User Image" />
                                        <span class="username"><?php echo $pengguna['nm_pengguna']; ?>

                                        </span>
                                        <span class="description"><?php echo $pengguna['kredensial']; ?></span>
                                        <a class="btn font-weight-bold" type="button" data-toggle="modal"
                                            data-target="#modaltambah" style="position: relative; margin-left: -12px;">
                                            Apa yang ingin anda tanyakan atau bagikan?
                                        </a>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <?php
                            }
                            $data = mysqli_query($koneksi, "SELECT * from tb_postingan inner join tb_pengguna on tb_postingan.id_pengguna = tb_pengguna.id_pengguna INNER JOIN tb_topik ON tb_postingan.id_topik = tb_topik.id_topik ORDER BY id_postingan DESC");

                            while ($d = mysqli_fetch_array($data)) {


                                $id_postingan = $d['id_postingan'];
                                $mode = $d['mode'];

                                $jumlah_gambar = 0;
                                $jumlah_gambar_query = mysqli_query($koneksi, "SELECT * from tb_gambar inner join tb_postingan on tb_gambar.id_postingan = tb_postingan.id_postingan where tb_gambar.id_postingan = '$id_postingan' ORDER BY id_gambar DESC");
                                $jumlah_gambar = mysqli_num_rows($jumlah_gambar_query);

                                $jumlah_video = 0;
                                $jumlah_video_query = mysqli_query($koneksi, "SELECT * from tb_video inner join tb_postingan on tb_video.id_postingan = tb_postingan.id_postingan where tb_video.id_postingan = '$id_postingan' ORDER BY id_video DESC");
                                $jumlah_video = mysqli_num_rows($jumlah_video_query);

                                $jumlah_berkas = 0;
                                $jumlah_berkas_query = mysqli_query($koneksi, "SELECT * from tb_berkas inner join tb_postingan on tb_berkas.id_postingan = tb_postingan.id_postingan where tb_berkas.id_postingan = '$id_postingan' ORDER BY id_berkas DESC");
                                $jumlah_berkas = mysqli_num_rows($jumlah_berkas_query);

                                $jumlah_komen = 0;
                                $jumlah_komen_query = mysqli_query($koneksi, "SELECT * from tb_komentar inner join tb_pengguna on tb_komentar.id_pengirim = tb_pengguna.id_pengguna where tb_komentar.id_postingan = '$id_postingan' ORDER BY id_komentar DESC");
                                $jumlah_komen = mysqli_num_rows($jumlah_komen_query);
                            ?>

                            <!-- munculin postingan -->
                            <?php include 'pages/pengguna/home/postingan.php';


                                // <!-- MODAL EDIT -->
                                include('pages/pengguna/edit_modal_postingan.php');
                                // <!-- MODAL EDIT -->
                            } ?>

                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-3">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-1"></div>

                                <div class="col-md-11">
                                    <!-- Box Comment -->

                                    <div class="card card-widget" style="position: sticky; width: 15rem;">
                                        <div class="card-header " style="height: 55px;">
                                            <p class="font-weight-bold" style="font-size: 1.1rem">Temukan topik untukmu
                                            </p>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <?php
                                            $data2 = mysqli_query($koneksi, "SELECT * from tb_topik order by nm_topik");
                                            while ($d2 = mysqli_fetch_array($data2)) {
                                            ?>
                                            <div class="col-md-12">
                                                <form action="#" method="GET">
                                                    <a href="pages/pengguna/home/topik.php?topik=<?php echo $d2['id_topik']; ?>"
                                                        class="btn btn-sm" style="font-size: 1rem;"
                                                        value="<?php echo $d2['id_topik']; ?>">
                                                        <i class="far fa-folder"></i> <?php echo $d2['nm_topik']; ?>
                                                    </a>
                                                </form>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <!-- /.card-body -->

                                        <!-- /.card-footer -->
                                    </div>
                                    <!-- /.card -->

                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- /.col -->

                    <!-- /.col -->
                </div>
            </div>
        </div>

        <?php include 'pages/pengguna/tambah_modal_postingan.php' ?>

        <!-- /.modal-dialog -->
    </div>
    <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Ekko Lightbox -->
    <script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- CodeMirror -->
    <script src="plugins/codemirror/codemirror.js"></script>
    <script src="plugins/codemirror/mode/css/css.js"></script>
    <script src="plugins/codemirror/mode/xml/xml.js"></script>
    <script src="plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>

    <!-- ckeditor -->
    <script>
    CKEDITOR.replace('ckeditortambah');
    </script>
    <!-- ckeditor -->

    <script>
    $(function() {


        // ekko
        $(document).on("click", '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true,
            });
        });


        // Summernote
        $('#tambahsummernote').summernote({
            fontSizes: ['8', '9', '10', '11', '12', '14', '15', '16', '17', '18', '24'],
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
            ],
        })

        // Summernote
        $('.summernoteedit').summernote({
            fontSizes: ['8', '9', '10', '11', '12', '14', '15', '16', '17', '18', '24'],
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
            ],
        })

        $('.note-editable').css('font-size', '15px');

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });


    })
    </script>
    <script>
    CKEDITOR.replace('editor1');
    </script>
</body>

</html>