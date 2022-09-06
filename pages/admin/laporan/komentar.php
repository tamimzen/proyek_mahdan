<?php include '../header.php'; ?>


<?php
if (!isset($_SESSION["id_admin"])) {
?>

<section class="content">
    <div class="error-page">
        <div class="error-content" style="display: block;  margin-left: 60px; margin-top: 200px; width: 75%;">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Sepertinya anda belum Masuk.</h3>

            <p>
                Sebelum melakukan akses terhadap halaman admin, diharapkan untuk anda melakukan <a
                    href="../../../auth/loginadmin.php">Masuk</a> terlebih dahulu
            </p>
            <a class="nav-link" href="../../../auth/loginadmin.php" role="button">
                <button type="button" class="btn btn-primary">Masuk</button>
            </a>


        </div>
    </div>
    <!-- /.error-page -->

</section>

<?php
} else {
?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li>
            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <form action="komentar.php" method="get">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Cari..." aria-label="Search" name="cari"
                            style="width: 26rem;" />
                        <div class="input-group-append">
                            <button class="btn btn-sidebar" type="submit" value="Cari">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="../../../auth/logout_admin.php" class="dropdown-item"
                onclick="return confirm('Apakah Anda Yakin Keluar?');">
                <p>Keluar</p>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="pengguna.php" class="brand-link">
        <img src="../../../dist/img/logo/mini-moco.png" class="brand-image" style="max-height: 27px;margin-top: 1px;" />
        <span class="brand-text font-weight-light">MOCO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-header">DAFTAR LAPORAN</li>
                <li class="nav-item">
                    <a href="postingan.php" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Postingan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="komentar.php" class="nav-link active">
                        <i class="nav-icon far fa-comment-alt"></i>
                        <p>Komentar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pengguna.php" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>Pengguna</p>
                    </a>
                </li>

                <br />

                <li class="nav-header">ALASAN LAPOR</li>
                <li class="nav-item">
                    <a href="../alasanlapor/postingan.php" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Postingan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../alasanlapor/komentar.php" class="nav-link">
                        <i class="nav-icon far fa-comment-alt"></i>
                        <p>Komentar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../alasanlapor/pengguna.php" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>Pengguna</p>
                    </a>
                </li>

                <br />

                <li class="nav-item">
                    <a href="../lainnya/admin.php" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Daftar Admin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../lainnya/topik.php" class="nav-link ">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Daftar Topik</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../lainnya/kata.php" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Daftar Kata Terlarang</p>
                    </a>
                </li>

                <!-- /.sidebar -->
</aside>

<?php 
    $data_laporan1 = mysqli_query($koneksi, "SELECT * FROM tb_lapor where target = 'postingan' ORDER BY id_lapor ASC");
    $data_laporan2 = mysqli_query($koneksi, "SELECT * FROM tb_lapor where target = 'komentar' ORDER BY id_lapor ASC");
    $data_laporan3 = mysqli_query($koneksi, "SELECT * FROM tb_lapor where target = 'pengguna' ORDER BY id_lapor ASC");


$jumlah_laporam1 = mysqli_num_rows($data_laporan1);
$jumlah_laporam2 = mysqli_num_rows($data_laporan2);
$jumlah_laporam3 = mysqli_num_rows($data_laporan3);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <div class="icon">
                                <i class="nav-icon far fa-file-alt"></i>
                            </div>
                            <h4 style="font-weight: 100">Jumlah Laporan</h4>
                            <h4><?php echo $jumlah_laporam1 ; ?> Unggahan</h4>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <div class="icon">
                                <i class="nav-icon far fa-file-alt"></i>
                            </div>
                            <h4 style="font-weight: 100">Jumlah Laporan</h4>
                            <h4><?php echo $jumlah_laporam2 ; ?> Komentar</h4>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <div class="icon">
                                <i class="nav-icon far fa-file-alt"></i>
                            </div>
                            <h4 style="font-weight: 100">Jumlah Laporan</h4>
                            <h4><?php echo $jumlah_laporam3 ; ?> Pengguna</h4>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-12">


                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 20px;">No</th>
                                    <th style="width: 100px;">Tgl Lapor</th>
                                    <th style="width: 150px;">Tipe Laporan</th>
                                    <th>Deskripsi</th>
                                    <th style="width: 85px;">Blokir</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                  $no = 1;
                  $batas = 10;
                  $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                  $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                  $previous = $halaman - 1;
                  $next = $halaman + 1;

                  $data_hal = mysqli_query($koneksi, "select * from tb_lapor WHERE target='komentar'");
                  $jumlah_data = mysqli_num_rows($data_hal);
                  $total_halaman = ceil($jumlah_data / $batas);

                  if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $data = mysqli_query($koneksi, "SELECT * from tb_la
                    por inner join tb_alasanlapor on tb_lapor.id_alasanlapor = tb_alasanlapor.id_alasanlapor where target ='komentar' AND tgl like '%" . $cari . "%' OR deskripsi_tambahan like '%" . $cari . "%' OR judul_alasan like '%" . $cari . "%' ORDER BY id_lapor DESC ");
                    while ($d = mysqli_fetch_array($data)) {
                  ?>
                                <?php include 'listkomentar.php' ?>
                            </tbody>
                            <!-- MODAL EDIT -->
                            <?php include('modal.php'); ?>
                            <!-- MODAL EDIT -->

                            <?php
                    }
                  } else {
                    $data = mysqli_query($koneksi, "select * from tb_lapor inner join tb_alasanlapor on tb_lapor.id_alasanlapor = tb_alasanlapor.id_alasanlapor where target ='komentar ' ORDER BY id_lapor DESC limit $halaman_awal, $batas   ");
                    $nomor = $halaman_awal + 1;
                    while ($d = mysqli_fetch_array($data)) {
              ?>
                            <?php include 'listkomentar.php' ?>
                            </tbody>
                            <!-- MODAL EDIT -->
                            <?php include('modal.php'); ?>
                            <!-- MODAL EDIT -->
                            <?php
                    }
                  } ?>

                            <tfoot>
                                <tr class="text-center">
                                    <th style="width: 20px;">No</th>
                                    <th style="width: 100px;">Tgl Lapor</th>
                                    <th style="width: 150px;">Tipe Laporan</th>
                                    <th>Deskripsi</th>
                                    <th style="width: 85px;">Blokir</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>


                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" <?php if ($halaman > 1) {
                                          echo "href='?halaman=$previous'";
                                        } ?>>Previous</a>
                            </li>
                            <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                            <li class="page-item"><a class="page-link"
                                    href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                            <?php
                }
                ?>
                            <li class="page-item">
                                <a class="page-link" <?php if ($halaman < $total_halaman) {
                                          echo "href='?halaman=$next'";
                                        } ?>>Next</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.card-body -->

                    <!-- /.card -->


                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


</div>
<?php
}
?>
</div>
</body>
<!-- ./wrapper -->

<?php include 'footer.php'; ?>