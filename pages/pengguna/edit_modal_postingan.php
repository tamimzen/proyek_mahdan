<div class="modal fade" id="modaleditpostingan<?php echo $d['id_postingan']; ?>">
    <div class="modal-dialog modal-lg">
        <?php
        if ($pathfile == "komentar.php") {
            echo '<form action="edit.php" method="POST">';
        } elseif ($pathfile == "index.php") {
            echo  '<form action="pages/pengguna/edit.php" method="POST">';
        } else {
            echo '<form action="../edit.php" method="POST">';
        }
        ?>
        <div class="modal-content " style="width: 90%;">
            <div class="modal-header" style="border-bottom: 1px solid rgb(80, 80, 80);">
                <div class="col-md-12">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="text-center font-weight-bold" style="text-align: center;">
                        Edit
                        Postingan</h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="col-md-12 row">
                    <div class="col-md-1">
                        <?php
                        if ($pathfile == "komentar.php") {  ?>
                        <img src="../../dist/img/profil/<?php echo $d['foto_profil']; ?>" class="img-circle elevation-2"
                            alt="User Image" style="width: 60px;
                                                                height: 60px;
                                                                object-fit: cover;" />

                        <?php
                        } elseif ($pathfile == "index.php") { ?>
                        <img src="dist/img/profil/<?php echo $d['foto_profil']; ?>" class="img-circle elevation-2"
                            alt="User Image" style="width: 60px;
                                                                height: 60px;
                                                                object-fit: cover;" />
                        <?php

                        } else { ?>
                        <img src="../../../dist/img/profil/<?php echo $d['foto_profil']; ?>"
                            class="img-circle elevation-2" alt="User Image" style="width: 60px;
                                                                height: 60px;
                                                                object-fit: cover;" />
                        <?php
                        }
                        ?>

                    </div>
                    <div class="col-md-11">
                        <div class="row container">
                            <div class="col-md-12">
                                <p class="font-weight-bold" style="font-size: 1.2rem;margin-left: 2px;">
                                    <?php echo $d['nm_pengguna']; ?></p>
                            </div>

                            <div class="col-md-12 row" style="margin-top: -15px">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons"
                                    style="max-height: 33px; margin-right: 10px; margin-left: 9px;">
                                    <label class="btn btn-light btn-outline-dark active tekseditortambah"
                                        style="border-radius: 6px 0px 0px 6px;">
                                        <input type="radio" name="tipe" value="TANYA" id="option_a1" autocomplete="off"
                                            <?php if ($d['tipe'] == 'TANYA') echo 'checked' ?>>
                                        TANYA
                                    </label>
                                    <label class="btn btn-light btn-outline-dark tekseditortambah"
                                        style="border-radius: 0px 6px 6px 0px;">
                                        <input type="radio" name="tipe" value="BERBAGI" id="option_a3"
                                            autocomplete="off" <?php if ($d['tipe'] == 'BERBAGI') echo 'checked' ?>>
                                        BERBAGI
                                    </label>
                                </div>

                                <select class="form-control select2 tekseditortambah" name="id_topik" id="id_topik"
                                    style="border-radius: 6px; width: 270px ;margin-right: 10px; border-color: black; height: 33px;">

                                    <option>Pilih topik</option>
                                    <?php
                                    $data2 = mysqli_query($koneksi, "SELECT * from tb_topik order by nm_topik");
                                    while ($d2 = mysqli_fetch_array($data2)) {
                                    ?>

                                    <option value="<?php echo $d2['id_topik']; ?>" <?php if ($d['id_topik'] == $d2['id_topik']) {
                                                                                            echo 'selected';
                                                                                        } ?> required>
                                        <?php echo $d2['nm_topik']; ?>
                                    </option>
                                    <?php } ?>
                                </select>

                                <input type="hidden" id="id_pengguna" name="id_pengguna"
                                    value="<?php echo $d['id_pengguna']; ?>">
                                <input type="hidden" id="id_postingan" name="id_postingan"
                                    value="<?php echo $d['id_postingan']; ?>">
                                <input type="hidden" id="path" name="path" value="<?php echo $pathfile ?>">

                                <div class="btn-group btn-group-toggle" data-toggle="buttons" style="max-height: 33px;"
                                    data-toggle="tooltip" data-placement="bottom"
                                    title="Anonim membantu melindungi privasi dengan tidak menyertakan nama dan foto profil Anda.">
                                    <label class="btn btn-light btn-outline-dark active "
                                        style="border-radius: 8px 0px 0px 8px; ">
                                        <input type="radio" name="mode" value="hidden" id="option_a1" autocomplete="off"
                                            <?php if ($d['mode'] == 'hidden') echo 'checked' ?>><i
                                            class="fas fa-eye-slash tekseditortambah"></i>
                                    </label>
                                    <label class="btn btn-light btn-outline-dark"
                                        style="border-radius: 0px 8px 8px 0px; ">
                                        <input type="radio" name="mode" value="show" id="option_a3" autocomplete="off"
                                            <?php if ($d['mode'] == 'show') echo 'checked' ?>> <i
                                            class="fas fa-eye tekseditortambah"></i>
                                    </label>
                                </div>
                                <span class="float-right text-sm text-info" type="button" data-toggle="modal"
                                    data-target="#modalinfo<?= $d['id_postingan'] ?>"
                                    style="margin-left: 16px; margin-top: 5px;"><i class="far fa-question-circle"
                                        style="font-size: 1.5rem;"></i></span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="container">
                    <p class="font-weight-bold" style="margin-bottom: 5px">Judul </p>
                    <input type="text" name="judul" class="form-control" id="exampleInputEmail1"
                        placeholder='Awali judul unggahan anda dengan "Apa", "Bagaimana", "Mengapa". dll'
                        value="<?php echo $d['judul'] ?>">
                    <br>

                    <p class="font-weight-bold" style="margin-bottom: 5px">Deskripsi</p>
                    <textarea id="ckeditoreditpostingan<?= $d['id_postingan'] ?>" name="deskripsilengkap">
                    <?php echo $d['deskripsilengkap'] ?>
                    </textarea>

                    <script>
                    CKEDITOR.replace('ckeditoreditpostingan<?= $d['id_postingan'] ?>');
                    </script>
                    <br>

                    <p class="text-red font-weight-bold">Gambar, video, dan berkas yang sudah diupload tidak
                        dapat
                        diperbarui!</p>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="input" name="tambah" value="tambah" class="btn btn-primary">Kirim</button>
            </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>











<!-- modal informasi -->

<div class="modal" id="modalinfo<?= $d['id_postingan'] ?>" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Informasi tambahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container"></div>
            <div class="modal-body">
                <ol style="font-size: 0.9rem">

                    <?php
                    if ($pathfile == "komentar.php") {
                    ?><li><img src="../../dist/img/informasi/1.png" style="height: 40px;"></li>
                    <?php
                    } elseif ($pathfile == "index.php") {
                    ?>
                    <li><img src="dist/img/informasi/1.png" style="height: 40px;"></li>
                    <?php
                    } else {
                    ?>
                    <li><img src="../../../dist/img/informasi/1.png" style="height: 40px;"></li>
                    <?php
                    }
                    ?>
                    <p><b>Tipe unggahan</b> dibedakan menjadi dua yaitu BERTANYA dan BERBAGI.
                        BERTANYA
                        digunakan
                        untuk mempertanyakan sebuah masalah sedangkan BERBAGI digunakan ketika
                        ingin
                        membuat
                        unggahan yang bersifat informasi. </p>
                    <?php
                    if ($pathfile == "komentar.php") {
                    ?><li><img src="../../dist/img/informasi/2.png" style="height: 40px;"></li>
                    <?php
                    } elseif ($pathfile == "index.php") {
                    ?>
                    <li><img src="dist/img/informasi/2.png" style="height: 40px;"></li>
                    <?php
                    } else {
                    ?>
                    <li><img src="../../../dist/img/informasi/2.png" style="height: 40px;"></li>
                    <?php
                    }
                    ?>
                    <p><b>Pemilihan topik</b> berguna meningkatkan oportunitas pertanyaan
                        ataupun
                        informasi anda
                        dilihat
                        dan dijawab oleh Pengguna lain dengan keahlian yang sesuai.</p>
                    <?php
                    if ($pathfile == "komentar.php") {
                    ?><li><img src="../../dist/img/informasi/3.png" style="height: 40px;"></li>
                    <?php
                    } elseif ($pathfile == "index.php") {
                    ?>
                    <li><img src="dist/img/informasi/3.png" style="height: 40px;"></li>
                    <?php
                    } else {
                    ?>
                    <li><img src="../../../dist/img/informasi/3.png" style="height: 40px;"></li>
                    <?php
                    }
                    ?>
                    <p><b>Anonim</b> berfungsi membantu melindungi privasi agar Anda dapat
                        merasa aman
                        saat
                        memposting
                        konten. Postingan anonim tidak menyertakan nama atau foto profil Anda.
                        Untuk
                        mengaktifkan, klik
                        mata sebalah kiri.</p>
                </ol>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn">Keluar</a>
            </div>
        </div>
    </div>
</div>