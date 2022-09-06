<?php include '../header.php';
$pathfile = "pertanyaan.php";
?>

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
                        <?php

                        // $cari_pencarian = "";
                        // $cari_tipe = "";

                        // if (isset($_GET['cari'])) {
                        //     $cari_pencarian = $_GET['cari_pencarian'];
                        //     $cari_tipe = $_GET['cari_tipe'];
                        // }

                        ?>
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
                    <li class="nav-item dropdown">
                        <a class="nav-link iconnavbar" role="button" data-toggle="dropdown">
                            <img src="../../../dist/img/profil/<?php echo $pengguna ["foto_profil"]; ?>"
                                class="img-circle" alt="User Image"
                                style="object-fit: cover; height: 130%;width: 2rem;" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="../profil/profil.php?id=<?= $pengguna['id_pengguna'] ?>" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="../../../dist/img/profil/<?php echo $pengguna['foto_profil'] ?>"
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
                    <div class="col-md-9">
                        <div class="12">


                            <?php

                            if (!isset($_SESSION["id_pengguna"])) {
                            } else {
                            ?>

                            <div class="card card-widget">
                                <div class="card-header">
                                    <div class="user-block">
                                        <img class="img-circle"
                                            src="../../../dist/img/profil/<?php echo $pengguna['foto_profil']; ?>"
                                            alt="User Image" style="
                                                                object-fit: cover;" />
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
                            $jumlah_topik_query =  mysqli_query($koneksi, "SELECT * from tb_topik");
                            $jumlah_topik = mysqli_num_rows($jumlah_topik_query);
                            $data = mysqli_query($koneksi, "SELECT * from tb_topik ORDER BY nm_topik DESC limit $jumlah_topik  ");

                            while ($d = mysqli_fetch_array($data)) {
                                
                            ?>

                            <!-- munculin postingan -->
                            <?php include 'postingan.php';
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
                                    <div class="card card-widget" style="    position: sticky; width: 15rem;">
                                        <div class="card-header " style="height: 55px;">
                                            <p class="font-weight-bold" style="font-size: 1.1rem;">Temukan topik untukmu
                                            </p>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <?php
                                            $data3 = mysqli_query($koneksi, "SELECT * from tb_topik order by nm_topik");
                                            while ($d3 = mysqli_fetch_array($data3)) {
                                            ?>
                                            <div class="col-md-12">
                                                <form action="#" method="GET">
                                                    <a href="../home/topik.php?topik=<?php echo $d3['id_topik']; ?>"
                                                        class="btn btn-sm" style="font-size: 1rem;"
                                                        value="<?php echo $d3['id_topik']; ?>">
                                                        <i class="far fa-folder"></i> <?php echo $d3['nm_topik']; ?>
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

        <?php include '../tambah_modal_postingan.php' ?>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->


    <?php include '../footer.php';
    ?>