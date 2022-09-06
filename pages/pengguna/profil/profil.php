<?php include '../header.php';

$pathfile = "profil.php";


if (isset($_GET['id'])) {

    $id_penggunasession = 0;
    if (isset($_SESSION["id_pengguna"])) {  
        $id_penggunasession = $_SESSION["id_pengguna"];
    }  
    $id_penggunalain = $_GET['id'];
    $perbandingan = ($id_penggunalain == $id_penggunasession);
  
    // if ($id_penggunasession != $id_penggunalain) {
        $tampilpengguna    = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna='$id_penggunalain'");
        $pengguna    = mysqli_fetch_array($tampilpengguna);
    // }
}



?>

<style type="text/css">
a {
    color: grey;
}

.nav-tabs .nav-item.show .nav-link,
.nav-tabs .nav-link.active {
    color: #b92b27;
}
</style>

<body class="hold-transition layout-top-nav layout-navbar-fixed"
    style="margin: 0px; padding: 0px; background-color: rgb(241, 242, 242);">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../../../dist/img/logo/moco.png" width="100" />
        </div>


        <!-- Navbar -->

        <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm">
            <div class="container">
                <!-- Left navbar links -->
                <div class="col-md-9">
                    <ul class="navbar-nav">
                        <div class="col-md-2">
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="../../../index.php" class="nav-link">
                                    <img src="../../../dist/img/logo/moco.png" style="height: 25px; margin-top: -5px; background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;">
                                </a>
                            </li>
                        </div>
                        <div class="col-md-10">
                            <form method="GET" action="../pencarian/pencarian.php">

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
                        <a class="nav-link" href="../../../index.php" role="button">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pertanyaan/pertanyaan.php" role="button">
                            <i class="fas fa-server"></i>
                        </a>
                    </li>

                    <?php
                    if (!isset($_SESSION["id_pengguna"])) {
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="../../../auth/loginpengguna.php" role="button">
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
                                    <img src="../../../dist/img/user1-128x128.jpg" alt="User Avatar"
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
                    <?php 
                             
                             $id_penggunasession = $_SESSION["id_pengguna"];
                             $tampilpengguna2 = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna='$id_penggunasession'");
                             $pengguna2 = mysqli_fetch_array($tampilpengguna2);
                    ?>


                    <li class="nav-item dropdown">
                        <a class="nav-link iconnavbar" role="button" data-toggle="dropdown">
                            <img src="../../../dist/img/profil/<?= $pengguna2["foto_profil"] ?>" class="img-circle"
                                alt="User Image" style="object-fit: cover; height: 130%;width: 2rem;" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="../profil/profil.php?id=<?= $pengguna2["id_pengguna"] ?>" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="../../../dist/img/profil/<?= $pengguna2["foto_profil"] ?>"
                                        alt="User Avatar" class="img-circle"
                                        style="object-fit: cover; height: 2rem;width: 2rem;" />
                                    <div class="media-body">
                                        <h2 class="dropdown-item-title font-weight-bold"
                                            style="margin-left: 10px;margin-top: 5px;">
                                            <?= $pengguna2["nm_pengguna"] ?>
                                        </h2>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="../../../auth/logout_pengguna.php" class="dropdown-item"
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
                    <div class="col-md-12">
                        <div class="col-md-12" style="height: 170px;  ">
                            <div class="fotopage">
                                <?php
                                if (!isset($pengguna["foto_page"])) {
                                ?>
                                <img src="../../../dist/img/page/contoh.jpg" alt="Responsive image" style="
                                height: 250px;
                                width: 100%;
                                object-fit: cover;" />
                                <?php
                                } else {
                                ?>
                                <img src="../../../dist/img/page/<?= $pengguna['foto_page']; ?>" alt="Responsive image"
                                    style="
                                height: 250px;
                                width: 100%;
                                object-fit: cover;" />
                                <?php
                                }
                                ?>

                                <div class="overlay"></div>
                                <div class="overlay1"></div>
                                <div class="overlay2"></div>
                                <div class="overlay2"></div>
                            </div>
                        </div>

                        <div class="col-md-12" style="height: 170px;z-index: 1; ">
                            <div class="container">
                                <div class="card-header" style="border-bottom: none">
                                    <div class="user-block" style="width: 80%;">
                                        <div class="col-12 row">
                                            <div class="col-2">
                                                <img class="profile-user-img img-circle edithide"
                                                    src="../../../dist/img/profil/<?= $pengguna['foto_profil']; ?>"
                                                    alt="User Image"
                                                    style="object-fit: cover; width: 130px; height:130px" />

                                                <?php if ($perbandingan) { ?>

                                                <a class="editmunculprofil" data-toggle="modal"
                                                    data-target="#modaleditfotoprofil">
                                                    <i class="fas fa-pen-square" style="color: #f1f2f2;
                                                                                            font-size: 37px;
                                                                                            position: absolute;
                                                                                            top: 50%;
                                                                                            -ms-transform: translateY(-50%);
                                                                                            transform: translateY(-50%);
                                                                                            left: 38%;">
                                                    </i>
                                                </a>
                                                <?php } ?>
                                            </div>
                                            <div class=" col-9">
                                                <div
                                                    style="margin-top: 25px; position: relative; margin-left: 10px !important">
                                                    <span class="username" style="margin-left: 10px ;">
                                                        <div class="row">
                                                            <h2 class="font-weight-bold edithide">
                                                                <?= $pengguna['nm_pengguna']; ?>
                                                            </h2>
                                                            <?php if ($perbandingan) { ?>
                                                            <a class="editmuncul" type="button" data-toggle="modal"
                                                                data-target="#modaleditnama" style="margin-top: 12px;">
                                                                &nbsp;Edit</a>
                                                            <?php } ?>
                                                        </div>
                                                    </span>
                                                    <?php
                                                    if ((!isset($pengguna["kredensial"])) || ($pengguna["kredensial"] == "" || $pengguna["kredensial"] == " " || $pengguna["kredensial"] == "  " || $pengguna["kredensial"] == "   ")) {
                                                    ?>
                                                    <?php if ($perbandingan) { ?>
                                                    <span class="description"
                                                        style="margin-top: -10px;margin-left: 10px ;">
                                                        <div class="row">
                                                            <a class="text-muted" type="button" data-toggle="modal"
                                                                data-target="#modaleditkredensial">
                                                                &nbsp;Tambahkan Kredensial profil</a>
                                                        </div>
                                                    </span>
                                                    <?php } else { ?>
                                                    <span class="description"
                                                        style="margin-top: -10px;margin-left: 10px ;">
                                                        <div class="row">
                                                            <p class="text-muted">
                                                                &nbsp;Kredensial profil belum diatur</p>
                                                        </div>
                                                    </span>
                                                    <?php } ?>
                                                    <?php
                                                    } else {
                                                    ?>
                                                    <span class="description"
                                                        style="margin-top: -10px;margin-left: 10px ;">
                                                        <div class="row">
                                                            <h5 class="edithide">
                                                                <?= $pengguna['kredensial']; ?>
                                                            </h5>
                                                            <?php if ($perbandingan) { ?>
                                                            <a class="editmuncul" type="button" data-toggle="modal"
                                                                data-target="#modaleditkredensial">
                                                                &nbsp;Edit</a>
                                                            <?php } ?>
                                                        </div>
                                                    </span>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                    if (isset($_SESSION["id_pengguna"])) {
                                    if ($perbandingan) { ?>
                                    <!-- /.user-block -->
                                    <div class="card-tools">
                                        <div class="float-right font-weight-bold"
                                            style="font-size: 1.0625rem; margin-top: 60px;">
                                            <a type="button" data-toggle="modal" data-target="#modaleditpage">
                                                <i class="fas fa-cog"></i> Ubah foto sampul <br>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- /.card-tools -->
                                    <?php } else { ?>
                                    <!-- /.user-block -->
                                    <div class="card-tools" style="margin-top: 60px;">
                                        <div class="dropdown ml-auto mr-3 float-right">
                                            <a role="button" id="dropdownMenuLinkprofil" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <h4> <i class="fas fa-ellipsis-h terlapor"></i></h4>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkprofil">
                                                <a type="button" class="dropdown-item" data-toggle="modal"
                                                    data-target="#modallaporkan<?php echo $pengguna['id_pengguna'] ?>">
                                                    Laporkan
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-tools -->
                                    <?php } }?>
                                </div>
                            </div>
                        </div>
                        <div class="container ">
                            <div class="col-md-12" style="background-color: white; height: 117px; margin-top: -90px;  ">
                                <br>
                                <div class="col-md-12" style="border-top: 1.5px solid rgb(189, 189, 189);"></div>
                                <br>
                                <br>
                                <div class="card-outline card-outline-tabs" style="width:100%; z-index: 1;">
                                    <div class="col-md-12">
                                        <?php
                                        $id_pengguna = $pengguna['id_pengguna'];

                                        $jumlah_postingan_query = mysqli_query($koneksi, "SELECT * from tb_postingan  where tb_postingan.id_pengguna = '$id_pengguna' ORDER BY id_postingan DESC");
                                        $jumlah_postingan = mysqli_num_rows($jumlah_postingan_query);

                                        $jumlah_berbagi_query = mysqli_query($koneksi, "SELECT * from tb_postingan  where tb_postingan.id_pengguna = '$id_pengguna' and tipe = 'BERBAGI' ORDER BY id_postingan DESC");
                                        $jumlah_berbagi = mysqli_num_rows($jumlah_berbagi_query);

                                        $jumlah_bertanya_query = mysqli_query($koneksi, "SELECT * from tb_postingan  where tb_postingan.id_pengguna = '$id_pengguna' and tipe = 'TANYA' ORDER BY id_postingan DESC");
                                        $jumlah_bertanya = mysqli_num_rows($jumlah_bertanya_query);
                                        ?>
                                        <ul class="nav nav-tabs row" id="custom-tabs-four-tab" role="tablist"
                                            style="width:100%">
                                            <li class="nav-item col text-center active">
                                                <a class="nav-link active">
                                                    <?= $jumlah_postingan ?> Postingan
                                                </a>
                                            </li>
                                            <li class="nav-item col text-center">
                                                <a class="nav-link"
                                                    href="profil_pertanyaan.php?id=<?= $id_penggunalain ?>">
                                                    <?= $jumlah_bertanya ?> Pertanyaan
                                                </a>
                                            </li>
                                            <li class="nav-item col text-center">
                                                <a class="nav-link"
                                                    href="profil_berbagi.php?id=<?= $id_penggunalain ?>">
                                                    <?= $jumlah_berbagi ?> Berbagi
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- /.card -->
                            </div>
                        </div>
                        <br>
                    </div>

                    <div class="container">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Box Comment -->
                                            <div class="card card-widget">
                                                <div class="card-header ">
                                                    <?php
                                                    if ((!isset($pengguna["deskripsi"])) || ($pengguna["deskripsi"] == "" || $pengguna["deskripsi"] == " " || $pengguna["deskripsi"] == "  " || $pengguna["deskripsi"] == "   ")) {
                                                    ?>
                                                    <?php if ($perbandingan) { ?>
                                                    <span class="description" style="margin-left: 10px ;">
                                                        <div class="row">
                                                            <a class="text-muted" type="button" data-toggle="modal"
                                                                style="margin-top: -20px;"
                                                                data-target="#modaleditprofil">
                                                                &nbsp;Tulis Deskripsi Tentang Anda</a>
                                                        </div>
                                                    </span>
                                                    <?php } else { ?>
                                                    <span class="description" style="margin-left: 10px ;">
                                                        <div class="row">
                                                            <p class="text-muted" style="margin-top: 0px;">
                                                                &nbsp;Deskripsi belum diatur</p>
                                                        </div>
                                                    </span>
                                                    <?php } ?>
                                                    <?php
                                                    } else {
                                                    ?>

                                                    <p class="font-weight-bold"
                                                        style="margin-left: 10px; margin-bottom: 0px;">
                                                        <?= $pengguna['deskripsi'] ?>
                                                    </p>
                                                    <?php } ?>
                                                </div>
                                                <!-- EDIT DAN TAMPIL PROFIL -->
                                                <div class="card-body" style="padding-top: 0px;">
                                                    <div class="col-12">
                                                        <table>
                                                            <tr>
                                                                <?php
                                                                if ((!isset($pengguna["pekerjaan"])) || ($pengguna["pekerjaan"] == "" || $pengguna["pekerjaan"] == " " || $pengguna["pekerjaan"] == "  " || $pengguna["pekerjaan"] == "   ")) {
                                                                ?>

                                                                <?php if ($perbandingan) { ?>
                                                                <td><i class="fas fa-suitcase"></i> &emsp; </td>
                                                                <td><a class="text-muted" type="button"
                                                                        data-toggle="modal"
                                                                        data-target="#modaleditprofil">Tambahkan
                                                                        Kredensial Pekerjaan</a>
                                                                </td>
                                                                <?php } else { ?>
                                                                <td><i class="fas fa-suitcase"></i> &emsp; </td>
                                                                <td><a class="text-muted">Pekerjaan belum diatur</a>
                                                                </td>
                                                                <?php } ?>
                                                                <?php } else { ?>

                                                                <a class="font-weight-bold" type="button"
                                                                    data-toggle="modal" data-target="#modaleditprofil">
                                                                    <td><i class="fas fa-suitcase"></i> &emsp;</td>
                                                                    <td><?= $pengguna['pekerjaan']; ?></td>
                                                                </a>

                                                                <?php } ?>
                                                            </tr>

                                                            <tr>
                                                                <?php
                                                                if ((!isset($pengguna["pendidikan"])) || ($pengguna["pendidikan"] == "" || $pengguna["pendidikan"] == " " || $pengguna["pendidikan"] == "  " || $pengguna["pendidikan"] == "   ")) {
                                                                ?>

                                                                <?php if ($perbandingan) { ?>
                                                                <td><i class="fas fa-graduation-cap"></i> &emsp;
                                                                </td>
                                                                <td><a class="text-muted" type="button"
                                                                        data-toggle="modal"
                                                                        data-target="#modaleditprofil">Tambahkan
                                                                        Kredensial Pendidikan</a>
                                                                </td>
                                                                <?php } else { ?>
                                                                <td><i class="fas fa-graduation-cap"></i> &emsp;
                                                                </td>
                                                                <td><a class="text-muted">Pendidikan belum diatur</a>
                                                                </td>
                                                                <?php } ?>
                                                                <?php } else { ?>

                                                                <a class="font-weight-bold" type="button"
                                                                    data-toggle="modal" data-target="#modaleditprofil">
                                                                    <td><i class="fas fa-graduation-cap"></i> &emsp;
                                                                    </td>
                                                                    <td><?= $pengguna['pendidikan']; ?></td>
                                                                </a>

                                                                <?php } ?>
                                                            </tr>

                                                            <tr>
                                                                <?php
                                                                if ((!isset($pengguna["lokasi"])) || ($pengguna["lokasi"] == "" || $pengguna["lokasi"] == " " || $pengguna["lokasi"] == "  " || $pengguna["lokasi"] == "   ")) {
                                                                ?>

                                                                <?php if ($perbandingan) { ?>

                                                                <td><i class="fas fa-map-marker-alt"></i> &emsp;
                                                                </td>
                                                                <td><a class="text-muted" type="button"
                                                                        data-toggle="modal"
                                                                        data-target="#modaleditprofil">Tambahkan
                                                                        Kredensial Lokasi</a>
                                                                </td>

                                                                <?php } else { ?>

                                                                <td><i class="fas fa-map-marker-alt"></i> &emsp;
                                                                </td>
                                                                <td><a class="text-muted">Lokasi belum diatur</a>
                                                                </td>

                                                                <?php }  ?>
                                                                <?php } else { ?>

                                                                <a class="font-weight-bold" type="button"
                                                                    data-toggle="modal" data-target="#modaleditprofil">
                                                                    <td><i class="fas fa-map-marker-alt"></i> &emsp;
                                                                    </td>
                                                                    <td><?= $pengguna['lokasi']; ?></td>
                                                                </a>

                                                                <?php } ?>
                                                            </tr>
                                                        </table>
                                                        <?php if ($perbandingan) { ?>
                                                        <br>
                                                        <a class="btn btn-light" type="button" data-toggle="modal"
                                                            data-target="#modaleditprofil"
                                                            style="border: 1px solid black; width: 100%">
                                                            Edit profil
                                                        </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <!-- EDIT DAN TAMPIL PROFIL -->

                                                <!-- /.card-footer -->
                                            </div>
                                            <!-- /.card -->

                                        </div>


                                    </div>

                                </div>

                                <div class="col-md-8">
                                    <div class="12">

                                        <?php if ($perbandingan) { ?>
                                        <div class="card card-widget">
                                            <div class="card-header">
                                                <div class="user-block">
                                                    <img class="img-circle" style="object-fit: cover;"
                                                        src="../../../dist/img/profil/<?php echo $pengguna["foto_profil"]; ?>"
                                                        alt="User Image" />
                                                    <span class="username"><?php echo $pengguna['nm_pengguna']; ?>

                                                    </span>
                                                    <span
                                                        class="description"><?php echo $pengguna['kredensial']; ?></span>
                                                    <a class="btn font-weight-bold" type="button" data-toggle="modal"
                                                        data-target="#modaltambah"
                                                        style="position: relative; margin-left: -12px;">
                                                        Apa yang ingin anda tanyakan atau bagikan?
                                                    </a>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-footer -->
                                        </div>
                                        <?php } ?>
                                        <div class="tab-content">

                                            <?php
                                            $id_pengguna = $pengguna['id_pengguna'];

                                            //TAMPIL SEMUA POSTINGAN


                                            $data = mysqli_query($koneksi, "SELECT * from tb_postingan inner join tb_pengguna on tb_postingan.id_pengguna = tb_pengguna.id_pengguna INNER JOIN tb_topik ON tb_postingan.id_topik = tb_topik.id_topik where tb_postingan.id_pengguna = '$id_pengguna' ORDER BY id_postingan DESC");

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
                                            <div id="home1" class="content active">
                                                <?php
                                                    include '../home/postingan.php';

                                                    // <!-- MODAL EDIT -->
                                                    include('../edit_modal_postingan.php');
                                                    // <!-- MODAL EDIT -->

                                                    ?>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- /.col -->

                    <!-- /.col -->
                </div>
            </div>
        </div>
    </div>

    <br>


    <?php include '../tambah_modal_postingan.php';
    include 'modal_edit_page.php';
    include 'modal_editfoto_profil.php';
    include 'modal_edit_nama.php';
    include 'modal_edit_kredensial.php';
    include 'modal_edit_profil.php'; 
    include('modal_laporkan_profil.php');  
    ?>

    <!-- /.modal -->

    <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <?php include '../footer.php'; ?>