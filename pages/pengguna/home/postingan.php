<div class="card card-widget">
    <div class="card-header">
        <?php
        if ($mode == "show") {
            if ($pathfile == "index.php"){
        ?>
        <div class="user-block">
            <img class="img-circle" src="dist/img/profil/<?php echo $d['foto_profil']; ?>" alt="User Image"
                style="object-fit: cover;" />
            <span class="username"><a
                    href="pages/pengguna/profil/profil.php?id=<?= $d['id_pengguna']; ?>"><?php echo $d['nm_pengguna']; ?>
                    </li></a>
            </span>
            <span class="description"><?php echo $d['nm_topik']; ?> - <?php echo $d['kredensial']; ?></span>
        </div>

        <?php } else  { ?>
        <div class="user-block">
            <img class="img-circle" src="../../../dist/img/profil/<?php echo $d['foto_profil']; ?>" alt="User Image"
                style="object-fit: cover;" />
            <span class="username"><a
                    href="../profil/profil.php?id=<?= $d['id_pengguna']; ?>"><?php echo $d['nm_pengguna']; ?>
                    </li></a>
            </span>
            <span class="description"><?php echo $d['nm_topik']; ?> - <?php echo $d['kredensial']; ?></span>
        </div>

        <?php
        }} else {
            if ($pathfile == "index.php"){ 
        ?>
        <div class="user-block">
            <img class="img-circle" src="dist/img/anonim.png" alt="User Image" style="object-fit: cover;" />
            <span class="username">
                Anonim
            </span>
            <span class="description"><?php echo $d['nm_topik']; ?> - Informasi dirahasiakan</span>
        </div>
        <?php } else { ?>
        <div class="user-block">
            <img class="img-circle" src="../../../dist/img/anonim.png" alt="User Image" style="object-fit: cover;" />
            <span class="username">
                Anonim
            </span>
            <span class="description"><?php echo $d['nm_topik']; ?> - Informasi dirahasiakan</span>
        </div>

        <?php
        }}

        ?>

        <!-- /.user-block -->
        <div class="card-tools">
            <p>#<?php echo $d['tipe']; ?> </p>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <p class="font-weight-bold"><?php echo $d['judul']; ?>.</p>
        <p style="font-size: 0.95rem"><?php echo $d['deskripsilengkap']; ?></p>
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
                        if ($pathfile == "index.php"){
        ?>
        <div class="col-sm">
            <a href="dist/img/postingan/<?php echo $dgambar['nm_gambar'] ?>" data-toggle="lightbox"
                data-gallery="gallery">
                <img style="width: 100%;" src="dist/img/postingan/<?php echo $dgambar['nm_gambar'] ?>">
            </a>
        </div>
        <?php } else { ?>

        <div class="col-sm">
            <a href="../../../dist/img/postingan/<?php echo $dgambar['nm_gambar'] ?>" data-toggle="lightbox"
                data-gallery="gallery">
                <img style="width: 100%;" src="../../../dist/img/postingan/<?php echo $dgambar['nm_gambar'] ?>">
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
                        if ($pathfile == "index.php"){
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
                        if ($pathfile == "index.php"){
                        $path = "dist/berkas/postingan/";
                    } else {
                        $path = "../../../dist/berkas/postingan/";
                    }
                        $nama = $path . $dberkas['nm_berkas'];

                    ?>
        <li>
            <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

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
        <div class="row">
            <div class="iconnavbar ">
                <button type="button " class="btn btn-sm">
                    <i class="far fa-thumbs-up" style="font-size: 0.95rem;"></i> 22
                </button>
                <span>|</span>
                <button type="button" class="btn btn-sm">
                    <i class="far fa-thumbs-down  " style="font-size: 0.95rem;"></i>
                </button>
            </div>
            <button type="button komenlike" class="btn btn-sm">
                <form action="#" method="GET">
                    <?php if ($pathfile == "index.php"){ ?>
                    <a href="pages/pengguna/komentar.php?id_postingan=<?php echo $d['id_postingan']; ?>"
                        class="btn btn-sm" style="font-size: 1rem;" value="<?php echo $d['id_postingan']; ?>"
                        target="_blank">
                        <i class="far fa-edit"></i> <span style="font-size: 1rem;"><?php echo $jumlah_komen ?>
                            Komentar</span>
                    </a>
                    <?php } else { ?>
                    <a href="../komentar.php?id_postingan=<?php echo $d['id_postingan']; ?>" class="btn btn-sm"
                        style="font-size: 1rem;" value="<?php echo $d['id_postingan']; ?>" target="_blank">
                        <i class="far fa-edit"></i> <span style="font-size: 1rem;"><?php echo $jumlah_komen ?>
                            Komentar</span>
                    </a>
                    <?php } ?>
                </form>
            </button>

            <?php

            if (isset($_SESSION["id_pengguna"])) { ?>
            <div class="dropdown ml-auto mr-3">
                <a role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <h4> <i class="fas fa-ellipsis-h terlapor"></i></h4>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <?php

                        if ($_SESSION["id_pengguna"] == $d['id_pengguna']) { ?>

                    <a type="button" class="dropdown-item" data-toggle="modal"
                        data-target="#modaleditpostingan<?php echo $d['id_postingan'] ?>">
                        Edit
                    </a>
                    <?php
                    if ($pathfile == "index.php"){ ?>

                    <a href="pages/pengguna/hapuspostingan.php?id=<?php echo $d['id_postingan'] ?>&pathfile=<?=$pathfile?>"
                        class="dropdown-item"
                        onclick="return confirm('Apakah Anda Yakin Menghapus Postingan Ini?');">Hapus</a>

                    <?php } elseif ($pathfile == "komentar.php"){ ?>

                    <a href="hapuspostingan.php?id=<?php echo $d['id_postingan'] ?>&pathfile=<?=$pathfile?>"
                        class="dropdown-item"
                        onclick="return confirm('Apakah Anda Yakin Menghapus Postingan Ini?');">Hapus</a>

                    <?php } elseif ($pathfile == "profil.php"){ ?>

                    <a href="../hapuspostingan.php?id=<?php echo $d['id_postingan'] ?>&user=<?= $d['id_pengguna'] ?>&pathfile=<?=$pathfile?>"
                        class="dropdown-item"
                        onclick="return confirm('Apakah Anda Yakin Menghapus Postingan Ini?');">Hapus</a>

                    <?php } else { ?>

                    <a href="../hapuspostingan.php?id=<?php echo $d['id_postingan'] ?>&pathfile=<?=$pathfile?>"
                        class="dropdown-item"
                        onclick="return confirm('Apakah Anda Yakin Menghapus Postingan Ini?');">Hapus</a>

                    <?php }
                    ?>


                    <?php
                        } elseif ($_SESSION["id_pengguna"] != $d['id_pengguna']) { ?>

                    <a type="button" class="dropdown-item" data-toggle="modal"
                        data-target="#modallaporkan<?php echo $d['id_postingan'] ?>">
                        Laporkan
                    </a>

                    <?php }  ?>
                </div>
            </div>
            <?php }  ?>
        </div>
    </div>

</div>

<!-- MODAL LAPORKAN  -->
<div class="modal fade" id="modallaporkan<?php echo $d['id_postingan'] ?>">
    <div class="modal-dialog modal-lg">
        <?php if($pathfile == "index.php") { ?>
        <form action="pages/pengguna/laporkan.php" method="POST">
            <?php } else { ?>
            <form action="../laporkan.php" method="POST">
                <?php } ?>
                <div class="modal-content " style="width: 90%;">

                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="font-weight-bold text-dark " style="padding: 10px;">
                            Laporkan
                            Postingan</h4>

                        <div class="form-group">
                            <textarea class="form-control" placeholder="Opsional: Jelaskan laporan ini"
                                name="deskripsi_tambahan" id="deskripsi_tambahan" rows="2"></textarea>
                        </div>

                        <?php
                    $alasanlapor2 = mysqli_query($koneksi, "SELECT * from tb_alasanlapor where targetalasan='postingan' ORDER BY id_alasanlapor DESC");

                    while ($alasan2 = mysqli_fetch_array($alasanlapor2)) {
                    ?>

                        <div class="form-check" style="margin-left: 20px;    padding-bottom: 10px;" required>
                            <input class="form-check-input" type="radio" name="id_alasanlapor" id="id_alasanlapor"
                                value="<?php echo $alasan2['id_alasanlapor'] ?>" required>
                            <label class="form-check-label" for="exampleRadios1">
                                <span class="text-dark font-weight-bold"><?php echo $alasan2['judul_alasan'] ?></span>
                                <br>
                                <span style="font-size: 0.9rem;"><?php echo $alasan2['deskripsi'] ?>
                                </span>

                            </label>

                        </div>

                        <?php } ?>
                    </div>

                    <input type="hidden" id="topik" name="topik" value="<?php echo $d['id_topik']; ?>">
                    <input type="hidden" id="target" name="target" value="postingan">
                    <input type="hidden" id="path" name="path" value="<?php echo $pathfile ?>">
                    <input type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $d['id_pengguna']; ?>">
                    <input type="hidden" id="id_postingan" name="id_postingan"
                        value="<?php echo $d['id_postingan']; ?>">

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="input" name="simpan" value="simpan" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>