<?php include '../../koneksi.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$pathfile = "komentar.php";
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
    <link rel="icon" href="../../dist/img/logo/mini-moco.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="../../plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="../../plugins/codemirror/theme/monokai.css">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="../../plugins/simplemde/simplemde.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css" />
    <link rel="stylesheet" href="../../dist/css/style.css" />
    <script src="../../dist/js/script.js" type="text/javascript"></script>
    <script src="../../dist/ckeditor/ckeditor.js"></script>
</head>

<?php

$pathfile = "komentar.php";

?>

<body class="hold-transition layout-top-nav layout-navbar-fixed"
    style="margin: 0px; padding: 0px; background-color: rgb(241, 242, 242);">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../../dist/img/logo/moco.png" width="100" />
        </div>


        <!-- Navbar -->

        <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm">
            <div class="container">
                <!-- Left navbar links -->
                <div class="col-md-9">
                    <ul class="navbar-nav">
                        <div class="col-md-2">
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="../../index.php" class="nav-link">
                                    <img src="../../dist/img/logo/moco.png" style="height: 25px; margin-top: -5px; background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;">
                                </a>
                            </li>
                        </div>
                        <div class="col-md-10">
                            <form method="GET" action="pencarian/pencarian.php">

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
                        <a class="nav-link" href="../../index.php" role="button">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pertanyaan/pertanyaan.php" role="button">
                            <i class="fas fa-server"></i>
                        </a>
                    </li>

                    <?php
                    if (!isset($_SESSION["id_pengguna"])) {
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="../../auth/loginpengguna.php" role="button">
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
                                    <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar"
                                        class="img-size-50 mr-3 img-circle" />
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
                            <img src="../../dist/img/profil/<?php echo $pengguna ["foto_profil"]; ?>" class="img-circle"
                                alt="User Image" style="object-fit: cover; height: 130%;width: 2rem;" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="profil/profil.php?id=<?= $pengguna['id_pengguna'] ?>" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="../../dist/img/profil/<?php echo $pengguna['foto_profil'] ?>"
                                        alt="User Avatar" class="img-circle"
                                        style="object-fit: cover; height: 2rem;width: 2rem;" />
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
                            <a href="../../auth/logout_pengguna.php" class="dropdown-item"
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
                            $id_postingan = $_GET["id_postingan"];
                            $data = mysqli_query($koneksi, "SELECT * from tb_postingan inner join tb_pengguna on tb_postingan.id_pengguna = tb_pengguna.id_pengguna INNER JOIN tb_topik ON tb_postingan.id_topik = tb_topik.id_topik where tb_postingan.id_postingan = '$id_postingan' ORDER BY id_postingan DESC");

                            $jumlah_komen = 0;
                            $jumlah_komen_query = mysqli_query($koneksi, "SELECT * from tb_komentar inner join tb_pengguna on tb_komentar.id_pengirim = tb_pengguna.id_pengguna where tb_komentar.id_postingan = '$id_postingan' ORDER BY id_komentar DESC");
                            $jumlah_komen = mysqli_num_rows($jumlah_komen_query);

                            $jumlah_gambar = 0;
                            $jumlah_gambar_query = mysqli_query($koneksi, "SELECT * from tb_gambar inner join tb_postingan on tb_gambar.id_postingan = tb_postingan.id_postingan where tb_gambar.id_postingan = '$id_postingan' ORDER BY id_gambar DESC");
                            $jumlah_gambar = mysqli_num_rows($jumlah_gambar_query);

                            $jumlah_video = 0;
                            $jumlah_video_query = mysqli_query($koneksi, "SELECT * from tb_video inner join tb_postingan on tb_video.id_postingan = tb_postingan.id_postingan where tb_video.id_postingan = '$id_postingan' ORDER BY id_video DESC");
                            $jumlah_video = mysqli_num_rows($jumlah_video_query);

                            $jumlah_berkas = 0;
                            $jumlah_berkas_query = mysqli_query($koneksi, "SELECT * from tb_berkas inner join tb_postingan on tb_berkas.id_postingan = tb_postingan.id_postingan where tb_berkas.id_postingan = '$id_postingan' ORDER BY id_berkas DESC");
                            $jumlah_berkas = mysqli_num_rows($jumlah_berkas_query);


                            while ($d = mysqli_fetch_array($data)) {
                                $mode = $d['mode'];
                                $id_postingan = $d['id_postingan'];
                            ?>

                            <!-- MODAL EDIT -->
                            <?php include('edit_modal_postingan.php'); ?>
                            <!-- MODAL EDIT -->
                            <!-- munculin postingan -->

                            <div class="card card-widget">

                                <!-- POSTINGAN -->
                                <?php include('komentar_postingan.php'); ?>
                                <!-- POSTINGAN -->


                                <!-- /.card-body -->
                                <?php
                                    if (!isset($_SESSION["id_pengguna"])) {
                                    } else {
                                    ?>
                                <div class="card-footer ">
                                    <form method="POST" action="komentar_tambah.php">

                                        <input type="hidden" id="id_pengirim" name="id_pengirim"
                                            value="<?php echo $_SESSION["id_pengguna"]; ?>">
                                        <input type="hidden" id="id_komentar_parent" name="id_komentar_parent"
                                            value="<?php echo 0 ?>">
                                        <input type="hidden" id="id_postingan" name="id_postingan"
                                            value=" <?php echo $_GET["id_postingan"]; ?> ">


                                        <div class="img-push">
                                            <textarea id="ckeditorkomentarutama" name="komentar">

                                            </textarea>
                                            <br>
                                            <div class="d-flex justify-content-center  mb-3">
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons"
                                                    style="margin-right: 10px" data-toggle="tooltip"
                                                    data-placement="bottom"
                                                    title="Anonim membantu melindungi privasi dengan tidak menyertakan nama dan foto profil Anda.">
                                                    <label class="btn btn-light btn-outline-dark active "
                                                        style="border-radius: 8px 0px 0px 8px; ">
                                                        <input type="radio" name="mode" value="hidden" id="option_a1"
                                                            autocomplete="off"><i
                                                            class="fas fa-eye-slash tekseditortambah"></i>
                                                    </label>
                                                    <label class="btn btn-light btn-outline-dark"
                                                        style="border-radius: 0px 8px 8px 0px; ">
                                                        <input type="radio" name="mode" value="show" id="option_a3"
                                                            autocomplete="off" checked> <i
                                                            class="fas fa-eye tekseditortambah"></i>
                                                    </label>
                                                </div>
                                                <button type="submit" value="simpan" class="btn btn-primary "
                                                    style="border-radius: 8px ">Tambahkan</button>
                                            </div>

                                        </div>

                                    </form>

                                    <!-- </form> -->
                                </div>
                                <?php } ?>
                                <div class="card-footer card-comments " style="background-color: white ; ">

                                    <?php
                                        $data2 = mysqli_query($koneksi, "SELECT * from tb_komentar inner join tb_pengguna on tb_komentar.id_pengirim = tb_pengguna.id_pengguna where tb_komentar.id_postingan = '$id_postingan' and tb_komentar.id_komentar_parent = '0' ORDER BY id_komentar DESC");

                                        while ($d2 = mysqli_fetch_array($data2)) {
                                        ?>


                                    <!-- komentar utama -->
                                    <?php
                                            $mode = $d2['mode'];
                                            if ($mode == "show") {
                                            ?>
                                    <div class="card-comment">
                                        <!-- FOTOPROFIL -->
                                        <img class="img-circle"
                                            src="../../dist/img/profil/<?php echo $d2['foto_profil']; ?>"
                                            alt="User Image" style="object-fit: cover;" />

                                        <div class="comment-text">

                                            <!-- NAMA PENGGUNA DAN KREDENSIAL -->
                                            <span class="username">
                                                <a
                                                    href="profil/profil.php?id=<?= $d2['id_pengguna']; ?>"><?php echo $d2['nm_pengguna']; ?></a>
                                                <?php } else { ?>
                                                <div class="card-comment">
                                                    <img class="img-circle" src="../../dist/img/anonim.png"
                                                        style="object-fit: cover;" alt="User Image" />
                                                    <div class="comment-text">
                                                        <span class="username">
                                                            Anonim
                                                            <?php } ?>
                                                            <span class="text-muted float-right">
                                                                <?php echo $d2['tgl_buat_komentar'] ?>
                                                            </span>
                                                        </span>
                                                        <?php echo $d2['komentar'] ?> <br>

                                                        <?php if (isset($_SESSION["id_pengguna"])) { ?>
                                                        <span
                                                            class="font-weight-bold komentar<?php echo $d2['id_komentar']; ?>"
                                                            type="button">Balas</span>
                                                        <?php } else { ?>
                                                        <span style="visibility: hidden;"
                                                            class="font-weight-bold komentar<?php echo $d2['id_komentar']; ?>"
                                                            type="button">Balas</span>

                                                        <?php
                                                                    }
                                                                    if (isset($_SESSION["id_pengguna"])) {

                                                                    ?>
                                                        <div class="dropdown float-right">
                                                            <a role="button" id="dropdownMenuLink"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <h4> <i class="fas fa-ellipsis-h terlapor"></i></h4>
                                                            </a>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuLink">
                                                                <?php

                                                                                if ($_SESSION["id_pengguna"] == $d2['id_pengguna']) { ?>

                                                                <a href="hapuskomentar.php?id=<?php echo $d2['id_komentar'] ?>"
                                                                    class="dropdown-item"
                                                                    onclick="return confirm('Apakah Anda Yakin Menghapus Komentar Ini?');">Hapus</a>

                                                                <?php
                                                                                } elseif ($_SESSION["id_pengguna"] != $d2['id_pengguna']) { ?>

                                                                <a type="button" class="dropdown-item"
                                                                    data-toggle="modal"
                                                                    data-target="#modallaporkan<?php echo $d2['id_komentar'] ?>">
                                                                    Laporkan
                                                                </a>

                                                                <?php } ?>
                                                            </div>
                                                        </div>

                                                        <?php } ?>

                                                        <!-- MODAL LAPORKAN 1 -->
                                                        <div class="modal fade"
                                                            id="modallaporkan<?php echo $d2['id_komentar'] ?>">
                                                            <div class="modal-dialog modal-lg">
                                                                <form action="laporkan.php" method="POST">
                                                                    <div class="modal-content " style="width: 90%;">

                                                                        <div class="modal-body">
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                            <h4 class="font-weight-bold text-dark "
                                                                                style="padding: 10px;">
                                                                                Laporkan
                                                                                Komentar</h4>

                                                                            <div class="form-group">
                                                                                <textarea class="form-control"
                                                                                    placeholder="Opsional: Jelaskan laporan ini"
                                                                                    name="deskripsi_tambahan"
                                                                                    id="deskripsi_tambahan"
                                                                                    rows="2"></textarea>
                                                                            </div>

                                                                            <?php
                                                                                        $alasanlapor = mysqli_query($koneksi, "SELECT * from tb_alasanlapor where targetalasan='komentar' ORDER BY id_alasanlapor DESC");

                                                                                        while ($alasan = mysqli_fetch_array($alasanlapor)) {
                                                                                        ?>

                                                                            <div class="form-check"
                                                                                style="margin-left: 20px;    padding-bottom: 10px;"
                                                                                required>
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="id_alasanlapor"
                                                                                    id="id_alasanlapor"
                                                                                    value="<?php echo $alasan['id_alasanlapor'] ?>"
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="exampleRadios1">
                                                                                    <span
                                                                                        class="text-dark font-weight-bold"><?php echo $alasan['judul_alasan'] ?></span>
                                                                                    <br>
                                                                                    <span
                                                                                        style="font-size: 0.9rem;"><?php echo $alasan['deskripsi'] ?>
                                                                                    </span>

                                                                                </label>

                                                                            </div>

                                                                            <?php } ?>
                                                                        </div>

                                                                        <input type="hidden" id="path" name="path"
                                                                            value="<?php echo $pathfile ?>">
                                                                        <input type="hidden" id="target" name="target"
                                                                            value="komentar">
                                                                        <input type="hidden" id="id_pengguna"
                                                                            name="id_pengguna"
                                                                            value="<?php echo $d2['id_pengguna']; ?>">
                                                                        <input type="hidden" id="id_komentar"
                                                                            name="id_komentar"
                                                                            value="<?php echo $d2['id_komentar']; ?>">
                                                                        <input type="hidden" id="id_postingan"
                                                                            name="id_postingan"
                                                                            value="<?php echo $d2['id_postingan']; ?>">

                                                                        <div
                                                                            class="modal-footer justify-content-between">
                                                                            <button type="button"
                                                                                class="btn btn-default"
                                                                                data-dismiss="modal">Tutup</button>
                                                                            <button type="input" name="simpan"
                                                                                value="simpan"
                                                                                class="btn btn-primary">Kirim</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>

                                                        <!-- TAMBAH KOMENTAR SUMMERNOTE -->
                                                        <form method="POST"
                                                            class="balas<?php echo $d2['id_komentar']; ?>"
                                                            action="komentar_tambah.php" style="display:none">

                                                            <input type="hidden" id="id_pengirim" name="id_pengirim"
                                                                value="<?php echo $_SESSION["id_pengguna"]; ?>">
                                                            <input type="hidden" id="id_komentar_parent"
                                                                name="id_komentar_parent"
                                                                value="<?php echo $d2['id_komentar']; ?>">
                                                            <input type="hidden" id="id_postingan" name="id_postingan"
                                                                value=" <?php echo $_GET["id_postingan"]; ?> ">
                                                            <div class="img-push">
                                                                <textarea
                                                                    id="ckeditorkomentarbalasan<?= $d2['id_komentar']; ?>"
                                                                    name="komentar">
                                                                </textarea>

                                                                <script>
                                                                CKEDITOR.replace(
                                                                    'ckeditorkomentarbalasan<?= $d2['id_komentar']; ?>'
                                                                );
                                                                </script>

                                                                <div class="d-flex justify-content-center  mb-3">
                                                                    <div class="btn-group btn-group-toggle"
                                                                        data-toggle="buttons" style="margin-right: 10px"
                                                                        data-toggle="tooltip" data-placement="bottom"
                                                                        title="Anonim membantu melindungi privasi dengan tidak menyertakan nama dan foto profil Anda.">
                                                                        <label
                                                                            class="btn btn-light btn-outline-dark active "
                                                                            style="border-radius: 8px 0px 0px 8px; ">
                                                                            <input type="radio" name="mode"
                                                                                value="hidden" id="option_a1"
                                                                                autocomplete="off"><i
                                                                                class="fas fa-eye-slash tekseditortambah"></i>
                                                                        </label>
                                                                        <label class="btn btn-light btn-outline-dark"
                                                                            style="border-radius: 0px 8px 8px 0px; ">
                                                                            <input type="radio" name="mode" value="show"
                                                                                id="option_a3" autocomplete="off"
                                                                                checked>
                                                                            <i class="fas fa-eye tekseditortambah"></i>
                                                                        </label>
                                                                    </div>
                                                                    <button type="submit" value="simpan"
                                                                        class="btn btn-primary "
                                                                        style="border-radius: 8px ">Tambahkan</button>
                                                                </div>
                                                            </div>

                                                        </form>

                                                        <?php
                                                                    $id_komentar = $d2['id_komentar'];
                                                                    $data3 = mysqli_query($koneksi, "SELECT * from tb_komentar inner join tb_pengguna on tb_komentar.id_pengirim = tb_pengguna.id_pengguna where tb_komentar.id_postingan = '$id_postingan'and id_komentar_parent = $id_komentar  ORDER BY id_postingan DESC");

                                                                    while ($d3 = mysqli_fetch_array($data3)) {
                                                                    ?>

                                                        <!-- komentar balasan -->
                                                        <?php
                                                                        $mode = $d3['mode'];
                                                                        if ($mode == "show") {
                                                                        ?>
                                                        <div class="card-comment"
                                                            style="border-bottom: none;
                                                                                        border-top: 1px solid #e9ecef;
                                                                                        border-top-width: 1px;
                                                                                        border-top-style: solid;
                                                                                        border-top-color: rgb(233, 236, 239);">
                                                            <!-- FOTOPROFIL -->
                                                            <img class="img-circle"
                                                                src="../../dist/img/profil/<?php echo $d2['foto_profil']; ?>"
                                                                alt="User Image" style="object-fit: cover;" />

                                                            <div class="comment-text">

                                                                <!-- NAMA PENGGUNA DAN KREDENSIAL -->
                                                                <span class="username">
                                                                    <a
                                                                        href="profil/profil.php?id=<?= $d3['id_pengguna']; ?>"><?php echo $d3['nm_pengguna']; ?></a>
                                                                    <?php } else { ?>
                                                                    <div class="card-comment"
                                                                        style="border-bottom: none;
                                                                                        border-top: 1px solid #e9ecef;
                                                                                        border-top-width: 1px;
                                                                                        border-top-style: solid;
                                                                                        border-top-color: rgb(233, 236, 239);">
                                                                        <img class="img-circle"
                                                                            src="../../dist/img/anonim.png"
                                                                            style="object-fit: cover;"
                                                                            alt="User Image" />
                                                                        <div class="comment-text">
                                                                            <span class="username">
                                                                                Anonim
                                                                                <?php } ?>
                                                                                <span class="text-muted float-right">
                                                                                    <?php echo $d3['tgl_buat_komentar'] ?>
                                                                                </span>
                                                                            </span>
                                                                            <?php echo $d3['komentar'] ?> <br>

                                                                            <?php if (isset($_SESSION["id_pengguna"])) { ?>
                                                                            <span
                                                                                class="font-weight-bold komentar2<?php echo $d3['id_komentar']; ?>"
                                                                                type="button">Balas</span>
                                                                            <?php } else { ?>
                                                                            <span style="visibility: hidden;"
                                                                                class="font-weight-bold komentar2<?php echo $d3['id_komentar']; ?>"
                                                                                type="button">Balas</span>

                                                                            <?php }
                                                                                                if (isset($_SESSION["id_pengguna"])) { ?>
                                                                            <div class="dropdown float-right">
                                                                                <a role="button" id="dropdownMenuLink"
                                                                                    data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    <h4> <i
                                                                                            class="fas fa-ellipsis-h terlapor"></i>
                                                                                    </h4>
                                                                                </a>
                                                                                <div class="dropdown-menu"
                                                                                    aria-labelledby="dropdownMenuLink">
                                                                                    <?php

                                                                                                            if ($_SESSION["id_pengguna"] == $d3['id_pengguna']) { ?>

                                                                                    <a href="hapuskomentar.php?id=<?php echo $d3['id_komentar'] ?>"
                                                                                        class="dropdown-item"
                                                                                        onclick="return confirm('Apakah Anda Yakin Menghapus Komentar Ini?');">Hapus</a>

                                                                                    <?php
                                                                                                            } elseif ($_SESSION["id_pengguna"] != $d3['id_pengguna']) { ?>

                                                                                    <a type="button"
                                                                                        class="dropdown-item"
                                                                                        data-toggle="modal"
                                                                                        data-target="#modallaporkan<?php echo $d3['id_komentar']; ?>">
                                                                                        Laporkan
                                                                                    </a>

                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                            <?php } ?>


                                                                            <!-- MODAL LAPORKAN KOMENTAR 2  -->
                                                                            <div class="modal fade"
                                                                                id="modallaporkan<?php echo $d3['id_komentar'] ?>">
                                                                                <div class="modal-dialog modal-lg">
                                                                                    <form action="laporkan.php"
                                                                                        method="POST">
                                                                                        <div class="modal-content "
                                                                                            style="width: 90%;">

                                                                                            <div class="modal-body">
                                                                                                <button type="button"
                                                                                                    class="close"
                                                                                                    data-dismiss="modal"
                                                                                                    aria-label="Close">
                                                                                                    <span
                                                                                                        aria-hidden="true">×</span>
                                                                                                </button>
                                                                                                <h4 class="font-weight-bold text-dark "
                                                                                                    style="padding: 10px;">
                                                                                                    Laporkan
                                                                                                    Komentar</h4>

                                                                                                <div class="form-group">
                                                                                                    <textarea
                                                                                                        class="form-control"
                                                                                                        placeholder="Opsional: Jelaskan laporan ini"
                                                                                                        name="deskripsi_tambahan"
                                                                                                        id="deskripsi_tambahan"
                                                                                                        rows="2"></textarea>
                                                                                                </div>

                                                                                                <?php
                                                                                                                    $alasanlapor2 = mysqli_query($koneksi, "SELECT * from tb_alasanlapor where targetalasan='komentar' ORDER BY id_alasanlapor  DESC");

                                                                                                                    while ($alasan2 = mysqli_fetch_array($alasanlapor2)) {
                                                                                                                    ?>

                                                                                                <div class="form-check"
                                                                                                    style="margin-left: 20px;    padding-bottom: 10px;"
                                                                                                    required>
                                                                                                    <input
                                                                                                        class="form-check-input"
                                                                                                        type="radio"
                                                                                                        name="id_alasanlapor"
                                                                                                        id="id_alasanlapor"
                                                                                                        value="<?php echo $alasan2['id_alasanlapor'] ?>"
                                                                                                        required>
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="exampleRadios1">
                                                                                                        <span
                                                                                                            class="text-dark font-weight-bold"><?php echo $alasan2['judul_alasan'] ?></span>
                                                                                                        <br>
                                                                                                        <span
                                                                                                            style="font-size: 0.9rem;"><?php echo $alasan2['deskripsi'] ?>
                                                                                                        </span>

                                                                                                    </label>

                                                                                                </div>

                                                                                                <?php } ?>
                                                                                            </div>

                                                                                            <input type="hidden"
                                                                                                id="path" name="path"
                                                                                                value="<?php echo $pathfile ?>">
                                                                                            <input type="hidden"
                                                                                                id="target"
                                                                                                name="target"
                                                                                                value="komentar">
                                                                                            <input type="hidden"
                                                                                                id="id_pengguna"
                                                                                                name="id_pengguna"
                                                                                                value="<?php echo $d3['id_pengguna']; ?>">
                                                                                            <input type="hidden"
                                                                                                id="id_komentar"
                                                                                                name="id_komentar"
                                                                                                value="<?php echo $d3['id_komentar']; ?>">
                                                                                            <input type="hidden"
                                                                                                id="id_postingan"
                                                                                                name="id_postingan"
                                                                                                value="<?php echo $d3['id_postingan']; ?>">

                                                                                            <div
                                                                                                class="modal-footer justify-content-between">
                                                                                                <button type="button"
                                                                                                    class="btn btn-default"
                                                                                                    data-dismiss="modal">Tutup</button>
                                                                                                <button type="input"
                                                                                                    name="simpan"
                                                                                                    value="simpan"
                                                                                                    class="btn btn-primary">Kirim</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                    <!-- /.modal-content -->
                                                                                </div>
                                                                                <!-- /.modal-dialog -->
                                                                            </div>


                                                                            <!-- TAMBAH KOMENTAR SUMMERNOTE -->
                                                                            <form method="POST"
                                                                                class="balas2<?php echo $d3['id_komentar'] ?>"
                                                                                action="komentar_tambah.php"
                                                                                style="display:none">

                                                                                <input type="hidden" id="id_pengirim"
                                                                                    name="id_pengirim"
                                                                                    value="<?php echo $_SESSION["id_pengguna"]; ?>">
                                                                                <input type="hidden"
                                                                                    id="id_komentar_parent"
                                                                                    name="id_komentar_parent"
                                                                                    value="<?php echo $d2['id_komentar']; ?>">
                                                                                <input type="hidden" id="id_postingan"
                                                                                    name="id_postingan"
                                                                                    value=" <?php echo $_GET["id_postingan"]; ?> ">
                                                                                <div class="img-push">
                                                                                    <textarea
                                                                                        id="ckeditorkomentarbalasan<?= $d3['id_komentar']; ?>"
                                                                                        name="komentar">

                                                                </textarea>

                                                                                    <script>
                                                                                    CKEDITOR.replace(
                                                                                        'ckeditorkomentarbalasan<?= $d3['id_komentar']; ?>'
                                                                                    );
                                                                                    </script>

                                                                                    <div
                                                                                        class="d-flex justify-content-center  mb-3">
                                                                                        <div class="btn-group btn-group-toggle"
                                                                                            data-toggle="buttons"
                                                                                            style="margin-right: 10px"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="bottom"
                                                                                            title="Anonim membantu melindungi privasi dengan tidak menyertakan nama dan foto profil Anda.">
                                                                                            <label
                                                                                                class="btn btn-light btn-outline-dark active "
                                                                                                style="border-radius: 8px 0px 0px 8px; ">
                                                                                                <input type="radio"
                                                                                                    name="mode"
                                                                                                    value="hidden"
                                                                                                    id="option_a1"
                                                                                                    autocomplete="off"><i
                                                                                                    class="fas fa-eye-slash tekseditortambah"></i>
                                                                                            </label>
                                                                                            <label
                                                                                                class="btn btn-light btn-outline-dark"
                                                                                                style="border-radius: 0px 8px 8px 0px; ">
                                                                                                <input type="radio"
                                                                                                    name="mode"
                                                                                                    value="show"
                                                                                                    id="option_a3"
                                                                                                    autocomplete="off"
                                                                                                    checked> <i
                                                                                                    class="fas fa-eye tekseditortambah"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                        <button type="submit"
                                                                                            value="simpan"
                                                                                            class="btn btn-primary "
                                                                                            style="border-radius: 8px ">Tambahkan</button>
                                                                                    </div>

                                                                                </div>

                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <!-- komentar balasan -->

                                                                    <?php } ?>

                                                            </div>
                                                        </div>

                                                        <?php }
                                                                        ?>


                                                        <!-- komentar utama -->




                                                        <!-- /.card-comment -->

                                                        <!-- /.card-comment -->
                                                    </div>
                                                    <!-- /.card-footer -->

                                                    <!-- /.card-footer -->
                                                </div>


                                                <!-- munculin postingan -->
                                                <?php
                                                            ?>

                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <?php

                                                            // $id_pengguna = $_GET["id_pengguna"]; 
                                                            // $data2 = mysqli_query($koneksi, "SELECT * from tb_postingan inner join tb_pengguna on tb_postingan.id_pengguna = tb_pengguna.id_pengguna INNER JOIN tb_topik ON tb_postingan.id_topik = tb_topik.id_topik where tb_postingan.id_pengguna = id_pengguna ORDER BY id_postingan DESC");
                                                            // while ($d2 = mysqli_fetch_array($data2)) {
                                                            // 
                                                            ?>
                                                <div class="col-md-11">
                                                    <!-- Box Comment -->
                                                    <?php
                                                    $mode = $d['mode'];
                                                    if ($mode == "show") {
                                                    ?>
                                                    <div class="card card-widget"
                                                        style="position: fixed; width: 15rem;">
                                                        <div class="card card-widget widget-user-2">
                                                            <!-- Add the bg color to the header using any of the bg-* classes -->

                                                            <div class="widget-user-header"
                                                                style="background: linear-gradient(0deg, rgb(255 255 255), rgb(255 255 255 / 30%)),url(../../dist/img/page/contoh.jpg); background-size: cover;background-repeat: no-repeat;">

                                                                <div class="widget-user-image">
                                                                    <img class="img-circle"
                                                                        src="../../dist/img/profil/<?php echo $d['foto_profil']; ?>"
                                                                        alt="User Avatar"
                                                                        style="object-fit: cover; height: 60px; width: 60px;">
                                                                </div>

                                                                <?php 
                                                                if ((!isset($d["pekerjaan"])) || ($d["pekerjaan"] == "" || $d["pekerjaan"] == " " || $d["pekerjaan"] == "  " || $d["pekerjaan"] == "   ")) {
                                                                ?>

                                                                <h5 class="widget-user-username"
                                                                    style="font-size: 1.25rem; margin-top: 15px;">
                                                                    <span
                                                                        class="font-weight-bold"><?php echo $d['nm_pengguna']; ?>
                                                                    </span>
                                                                </h5>

                                                                <?php } else { ?>

                                                                <h5 class="widget-user-username"
                                                                    style="font-size: 1.25rem;">
                                                                    <span
                                                                        class="font-weight-bold"><?php echo $d['nm_pengguna']; ?></span>
                                                                </h5>
                                                                <h5 class="widget-user-desc" style="font-size: 0.9rem;">
                                                                    <span>
                                                                        <?php echo $d['pekerjaan']; ?></span>
                                                                </h5>

                                                                <?php } ?>
                                                            </div>
                                                            <?php 
                                                            if ((!isset($d["deskripsi"])) || ($d["deskripsi"] == "" || $d["deskripsi"] == " " || $d == "  " || $d["deskripsi"] == "   ")) {
                                                            ?>
                                                            <div class="card-body">
                                                            </div>
                                                            <?php } else {?>
                                                            <div class="card-body">
                                                                <p style="font-size: 0.9rem;">
                                                                    <?php echo $d['deskripsi']; ?>
                                                                </p>
                                                            </div>
                                                            <?php }
                                                             $id_pengguna = $d['id_pengguna']; 
                                                             
                                                            $jumlah_berbagi_query = mysqli_query($koneksi, "SELECT * from tb_postingan  where tb_postingan.id_pengguna = '$id_pengguna' and tipe = 'BERBAGI' ORDER BY id_postingan DESC");
                                                            $jumlah_berbagi = mysqli_num_rows($jumlah_berbagi_query);
                                                            
                                                            $jumlah_bertanya_query = mysqli_query($koneksi, "SELECT * from tb_postingan  where tb_postingan.id_pengguna = '$id_pengguna' and tipe = 'TANYA' ORDER BY id_postingan DESC");
                                                            $jumlah_bertanya = mysqli_num_rows($jumlah_bertanya_query);
                                                            
                                                            ?>
                                                            <div class="card-footer"
                                                                style="font-size: 0.8rem; margin-top: -40px; background-color: white">
                                                                <div class="row">
                                                                    <div class="col border-right">
                                                                        <div class="description-block">
                                                                            <h5 class="description-header">
                                                                                <?=$jumlah_bertanya?>
                                                                            </h5>
                                                                            <span
                                                                                class="description-text">Pertanyaan</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col ">
                                                                        <div class="description-block">
                                                                            <h5 class="description-header">
                                                                                <?=$jumlah_bertanya?></h5>
                                                                            <span
                                                                                class="description-text">Berbagi</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class="card card-widget"
                                                        style="position: fixed; width: 15rem;">
                                                        <div class="card card-widget widget-user-2">
                                                            <!-- Add the bg color to the header using any of the bg-* classes -->

                                                            <div class="widget-user-header"
                                                                style="background: linear-gradient(0deg, rgb(255 255 255), rgb(255 255 255 / 30%)),url(../../dist/img/page/contoh.jpg); background-size: cover;background-repeat: no-repeat;">

                                                                <div class="widget-user-image">
                                                                    <img class="img-circle"
                                                                        src="../../dist/img/anonim.png"
                                                                        alt="User Avatar"
                                                                        style="object-fit: cover; height: 60px; width: 60px;">
                                                                </div>


                                                                <h5 class="widget-user-username"
                                                                    style="font-size: 1.25rem;">
                                                                    <span class="font-weight-bold">Anonim</span>
                                                                </h5>
                                                                <h5 class="widget-user-desc" style="font-size: 0.9rem;">
                                                                    <span>
                                                                        <?php echo $d['pekerjaan']; ?></span>
                                                                </h5>


                                                            </div>
                                                            <div class="card-body">
                                                            </div>
                                                            <?php  
                                                             $id_pengguna = $d['id_pengguna']; 
                                                              
                                                            $jumlah_berbagi_query = mysqli_query($koneksi, "SELECT * from tb_postingan  where tb_postingan.id_pengguna = '$id_pengguna' and tipe = 'BERBAGI' ORDER BY id_postingan DESC");
                                                            $jumlah_berbagi = mysqli_num_rows($jumlah_berbagi_query);
                                                            
                                                            $jumlah_bertanya_query = mysqli_query($koneksi, "SELECT * from tb_postingan  where tb_postingan.id_pengguna = '$id_pengguna' and tipe = 'TANYA' ORDER BY id_postingan DESC");
                                                            $jumlah_bertanya = mysqli_num_rows($jumlah_bertanya_query);
                                                            
                                                            ?>
                                                            <div class="card-footer"
                                                                style="font-size: 0.8rem; margin-top: -40px; background-color: white">
                                                                <div class="row">
                                                                    <div class="col border-right">
                                                                        <div class="description-block">
                                                                            <h5 class="description-header">
                                                                                <?=$jumlah_bertanya?>
                                                                            </h5>
                                                                            <span
                                                                                class="description-text">Pertanyaan</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col ">
                                                                        <div class="description-block">
                                                                            <h5 class="description-header">
                                                                                <?=$jumlah_bertanya?></h5>
                                                                            <span
                                                                                class="description-text">Berbagi</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>

                                                </div>
                                                <?php } ?>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- /.col -->

                                    <!-- /.col -->
                                </div>
                            </div>
                        </div>




                        <!-- modal tambah -->
                        <?php include 'tambah_modal_postingan.php' ?>

                    </div>
                    <!-- ./wrapper -->


                    <!-- jQuery -->
                    <script src="../../plugins/jquery/jquery.min.js"></script>
                    <!-- jQuery UI 1.11.4 -->
                    <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
                    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
                    <script>
                    $.widget.bridge("uibutton", $.ui.button);
                    </script>
                    <!-- Bootstrap 4 -->
                    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <!-- ChartJS -->
                    <script src="../../plugins/chart.js/Chart.min.js"></script>
                    <!-- Sparkline -->
                    <script src="../../plugins/sparklines/sparkline.js"></script>
                    <!-- JQVMap -->
                    <script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
                    <script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
                    <!-- jQuery Knob Chart -->
                    <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
                    <!-- daterangepicker -->
                    <script src="../../plugins/moment/moment.min.js"></script>
                    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
                    <!-- Tempusdominus Bootstrap 4 -->
                    <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
                    </script>
                    <!-- Summernote -->
                    <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
                    <!-- overlayScrollbars -->
                    <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
                    <!-- AdminLTE App -->
                    <script src="../../dist/js/adminlte.js"></script>
                    <!-- Summernote -->
                    <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
                    <!-- CodeMirror -->
                    <script src="../../plugins/codemirror/codemirror.js"></script>
                    <script src="../../plugins/codemirror/mode/css/css.js"></script>
                    <script src="../../plugins/codemirror/mode/xml/xml.js"></script>
                    <script src="../../plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
                    <!-- AdminLTE for demo purposes -->
                    <script src="../../dist/js/demo.js"></script>
                    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                    <script src="../../dist/js/pages/dashboard.js"></script>

                    <!-- ckeditor -->
                    <script>
                    CKEDITOR.replace('ckeditortambah');
                    CKEDITOR.replace('ckeditorkomentarutama');
                    CKEDITOR.editorConfig = function(config) {
                        // misc options
                        config.height = '350px';
                    };
                    </script>
                    <!-- ckeditor -->

                    <script>
                    $(function() {
                        // Summernote

                        $('#summernote').summernote({
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

                        $('.summernotekomentar').summernote({
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

                        <?php
                            $data5 = mysqli_query($koneksi, "SELECT * from tb_komentar inner join tb_pengguna on tb_komentar.id_pengirim = tb_pengguna.id_pengguna where tb_komentar.id_postingan = '$id_postingan' and tb_komentar.id_komentar_parent = '0' ORDER BY id_komentar DESC");

                            while ($d5 = mysqli_fetch_array($data5)) {
                            ?>
                        $('.summernotebalaskomentar<?php echo $d5['id_komentar']; ?>').summernote({
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
                        $(document).ready(function() {
                            $(".komentar<?php echo $d5['id_komentar']; ?>").click(function() {
                                $(".balas<?php echo $d5['id_komentar']; ?>").toggle();
                            });
                        });


                        <?php
                                $id_komentar = $d5['id_komentar'];
                                $data6 = mysqli_query($koneksi, "SELECT * from tb_komentar inner join tb_pengguna on tb_komentar.id_pengirim = tb_pengguna.id_pengguna where tb_komentar.id_postingan = '$id_postingan'and id_komentar_parent = $id_komentar  ORDER BY id_postingan DESC");

                                while ($d6 = mysqli_fetch_array($data6)) {
                                ?>

                        $('.summernotebalaskomentar2<?php echo $d6['id_komentar']; ?>').summernote({
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
                        $(document).ready(function() {
                            $(".komentar2<?php echo $d6['id_komentar']; ?>").click(function() {
                                $(".balas2<?php echo $d6['id_komentar']; ?>").toggle();
                            });
                        });

                        <?php }
                            } ?>

                        $('.note-editable').css('font-size', '15px');


                        // CodeMirror
                        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                            mode: "htmlmixed",
                            theme: "monokai"
                        });
                    })

                    $(function() {
                        $('[data-toggle="tooltip"]').tooltip()
                    })
                    </script>



</body>

</html>