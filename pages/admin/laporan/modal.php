                    <!-- MODAL POSTINGAN -->
                    <div class="modal fade" id="modalpostingan<?php echo $d['id_postingan'] ?>" style="padding-bottom: 300px;
                        padding-top: 50px;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <?php
                                    $id = $d['id_postingan'];
                                    // $query_edit = mysqli_query($koneksi, "SELECT * FROM tb_postingan WHERE id_postingan='$id'");
                                    $query_edit = mysqli_query($koneksi, "SELECT * from tb_postingan inner join tb_pengguna on tb_postingan.id_pengguna = tb_pengguna.id_pengguna INNER JOIN tb_topik ON tb_postingan.id_topik = tb_topik.id_topik WHERE id_postingan='$id'");

                                    while ($row = mysqli_fetch_array($query_edit)) {

                                        $id_postingan = $row['id_postingan'];
                                        $mode = $row['mode'];
        
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

                                    <div class="card card-widget">
                                        <div class="card-header">

                                            <div class="user-block">
                                                <img class="img-circle"
                                                    src="../../../dist/img/profil/<?php echo $row['foto_profil']; ?>"
                                                    alt="User Image" style="object-fit: cover;" />
                                                <span class="username"><a
                                                        href="../profil/profil.php?id=<?= $row['id_pengguna']; ?>"><?php echo $row['nm_pengguna']; ?>
                                                        <?php if ($mode == 'show') {echo "- Anonim";} ?>
                                                    </a>
                                                </span>
                                                <span class="description"><?php echo $row['nm_topik']; ?> -
                                                    <?php echo $row['kredensial']; ?></span>
                                            </div>


                                            <!-- /.user-block -->
                                            <div class="card-tools">
                                                <p>#<?php echo $row['tipe']; ?> </p>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">

                                            <p class="font-weight-bold"><?php echo $row['judul']; ?>.</p>
                                            <p style="font-size: 0.95rem"><?php echo $row['deskripsilengkap']; ?></p>
                                            <?php

                                                // GAMBAR


                                                $pembagian = $jumlah_gambar / 3;
                                                $jumlahrow = floor($pembagian);

                                                if ($jumlah_gambar > 0) {
                                                    for ($x = 0; $x <= $jumlahrow; $x++) {
                                                        echo "<div class='row' style='padding-bottom: 5px;'>";
                                                        for ($y = 0; $y <= 2; $y++) {
                                                            $dgambar = mysqli_fetch_array($jumlah_gambar_query);
                                                            if (isset($dgambar)) {
                                                                if ($pathfile == "index.php") {
                                                ?>
                                            <div class="col-sm">
                                                <a href="dist/img/postingan/<?php echo $dgambar['nm_gambar'] ?>"
                                                    data-toggle="lightbox" data-gallery="gallery">
                                                    <img style="width: 100%;"
                                                        src="dist/img/postingan/<?php echo $dgambar['nm_gambar'] ?>">
                                                </a>
                                            </div>
                                            <?php } else { ?>

                                            <div class="col-sm">
                                                <a href="../../../dist/img/postingan/<?php echo $dgambar['nm_gambar'] ?>"
                                                    data-toggle="lightbox" data-gallery="gallery">
                                                    <img style="width: 100%;"
                                                        src="../../../dist/img/postingan/<?php echo $dgambar['nm_gambar'] ?>">
                                                </a>
                                            </div>

                                            <?php
                                                                }
                                                            }
                                                        }
                                                        echo "</div>";
                                                    }
                                                }

                                                // GAMBAR
                                                // VIDEO

                                                $pembagian = $jumlah_video / 3;
                                                $jumlahrow = floor($pembagian);

                                                if ($jumlah_video > 0) {
                                                    for ($x = 0; $x <= $jumlahrow; $x++) {
                                                        echo "<div class='row' style='padding-bottom: 5px;'>";
                                                        for ($y = 0; $y <= 1; $y++) {
                                                            $dvideo = mysqli_fetch_array($jumlah_video_query);
                                                            if (isset($dvideo)) {
                                                                $nm_video = $dvideo['nm_video'];
                                                                if ($pathfile == "index.php") {
                                                                    $path = "dist/video/postingan/";
                                                                } else {
                                                                    $path = "../../../dist/video/postingan/";
                                                                }
                                                                $nama = $path . $dvideo['nm_video'];
                                                                ?>
                                            <div class="col-sm">
                                                <video <?php echo "src='$nama'" ?> controls width='100%'></video>

                                            </div>
                                            <?php
                                                            }
                                                        }
                                                        echo "</div>";
                                                    }
                                                }


                                                // GAMBAR
                                                // BERKAS

                                                $pembagian = $jumlah_berkas / 3;
                                                $jumlahrow = floor($pembagian);

                                                if ($jumlah_berkas > 0) {

                                                    for ($x = 0; $x <= $jumlahrow; $x++) {
                                                        echo "<ul class='mailbox-attachments d-flex align-items-stretch clearfix'>";
                                                        for ($y = 0; $y <= 3; $y++) {
                                                            $dberkas = mysqli_fetch_array($jumlah_berkas_query);
                                                            if (isset($dberkas)) {
                                                                $nm_berkas = $dberkas['nm_berkas'];
                                                                $size_berkas = $dberkas['ukuran'];
                                                                $size_berkas = round($size_berkas / 1024, 2);
                                                                if ($pathfile == "index.php") {
                                                                    $path = "dist/berkas/postingan/";
                                                                } else {
                                                                    $path = "../../../dist/berkas/postingan/";
                                                                }
                                                                $nama = $path . $dberkas['nm_berkas'];

                                                            ?>
                                            <li>
                                                <span class="mailbox-attachment-icon"><i
                                                        class="far fa-file-pdf"></i></span>

                                                <div class="mailbox-attachment-info">
                                                    <?php
                                                                        echo "<a href='$nama' class='mailbox-attachment-name' download><i class='fas fa-paperclip'></i>"
                                                                            . $nm_berkas . "</a>";
                                                                        ?>
                                                    <span class="mailbox-attachment-size clearfix mt-1">
                                                        <span><?php echo $size_berkas ?> KB</span>
                                                        <?php
                                                                            echo "<a href='$nama' class='btn btn-default btn-sm float-right' download><i class='fas fa-cloud-download-alt'></i></a>";
                                                                            ?>

                                                    </span>
                                                </div>
                                            </li>
                                            <?php
                                                            }
                                                        }
                                                        echo "</ul>";
                                                    }

                                                    ?>



                                            <?php
                                                }
                                                // BERKAS  
                                                ?>

                                            <br>
                                        </div>

                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL POSTINGAN -->








                    <!-- MODAL KOMENTAR -->
                    <div class="modal fade" id="modalkomentar<?php echo $d['id_postingan'] ?>" style="padding-bottom: 300px;
                         padding-top: 50px;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form role="form" action="edit_masuk.php" method="get">
                                        <?php
                                            $id = $d['id_postingan'];
                                            // $query_edit = mysqli_query($koneksi, "SELECT * FROM tb_postingan WHERE id_postingan='$id'");
                                            $query_edit = mysqli_query($koneksi, "SELECT * FROM tb_postingan INNER JOIN tb_topik ON tb_postingan.id_topik = tb_topik.id_topik INNER JOIN tb_pengguna ON tb_postingan.id_pengguna = tb_pengguna.id_pengguna WHERE id_postingan='$id'");

                                            while ($row = mysqli_fetch_array($query_edit)) {

                                            ?>

                                        <div class="card card-widget">
                                            <div class="card-header">
                                                <div class="user-block">
                                                    <img class="img-circle" src="../../../dist/img/user1-128x128.jpg"
                                                        alt="User Image" />
                                                    <span class="username"><a
                                                            href="#"><?php echo $row['nm_pengguna'] ?>.
                                                        </a>
                                                    </span>
                                                    <span class="description"><?php echo $row['nm_topik'] ?> -
                                                        <?php echo $row['kredensial'] ?></span>
                                                </div>
                                                <!-- /.user-block -->
                                                <div class="card-tools">
                                                    <p>#<?php echo $row['tipe'] ?></p>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">

                                                <p class="font-weight-bold"><?php echo $row['judul'] ?></p>
                                                <p><?php echo $row['deskripsilengkap'] ?></p>
                                                <img class="img-fluid pad" src="../../../../dist/img/photo2.png"
                                                    alt="Photo" />
                                                <br>

                                            </div>



                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                            </div>
                                            <?php } ?>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- MODAL KOMENTAR -->










                    <!-- MODAL PEGGUNA -->
                    <div class="modal fade" id="modalpengguna<?php echo $d['id_postingan'] ?>" style="padding-bottom: 300px;
                            padding-top: 50px;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form role="form" action="edit_masuk.php" method="get">
                                        <?php
                                            $id = $d['id_postingan'];
                                            // $query_edit = mysqli_query($koneksi, "SELECT * FROM tb_postingan WHERE id_postingan='$id'");
                                            $query_edit = mysqli_query($koneksi, "SELECT * FROM tb_postingan INNER JOIN tb_topik ON tb_postingan.id_topik = tb_topik.id_topik INNER JOIN tb_pengguna ON tb_postingan.id_pengguna = tb_pengguna.id_pengguna WHERE id_postingan='$id'");

                                            while ($row = mysqli_fetch_array($query_edit)) {

                                            ?>

                                        <div class="card card-widget">
                                            <div class="card-header">
                                                <div class="user-block">
                                                    <img class="img-circle" src="../../../dist/img/user1-128x128.jpg"
                                                        alt="User Image" />
                                                    <span class="username"><a
                                                            href="#"><?php echo $row['nm_pengguna'] ?>.
                                                        </a>
                                                    </span>
                                                    <span class="description"><?php echo $row['nm_topik'] ?> -
                                                        <?php echo $row['kredensial'] ?></span>
                                                </div>
                                                <!-- /.user-block -->
                                                <div class="card-tools">
                                                    <p>#<?php echo $row['tipe'] ?></p>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">

                                                <p class="font-weight-bold"><?php echo $row['judul'] ?></p>
                                                <p><?php echo $row['deskripsilengkap'] ?></p>
                                                <img class="img-fluid pad" src="../../../../dist/img/photo2.png"
                                                    alt="Photo" />
                                                <br>

                                            </div>



                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                            </div>
                                            <?php } ?>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- MODAL P[ENGGUNA] -->