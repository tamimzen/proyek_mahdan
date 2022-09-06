<div class="modal fade" id="modaltambah">
    <div class="modal-dialog modal-lg">
        <?php
        if ($pathfile == "index.php"){ 
            echo '<form action="pages/pengguna/tambah.php" method="POST" enctype="multipart/form-data">';
        } 
        elseif ($pathfile == "komentar.php"){
            echo '<form action="tambah.php" method="POST" enctype="multipart/form-data">';
         } else { 
            echo '<form action="../tambah.php" method="POST" enctype="multipart/form-data">';
         } 
        ?>

        <div class="modal-content " style="width: 90%;">
            <div class="modal-header" style="border-bottom: 1px solid rgb(80, 80, 80);">
                <div class="col-md-12">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="text-center font-weight-bold" style="text-align: center;">Buat Postingan</h3>
                </div>
            </div>
            <div class="modal-body">

                <div class="col-md-12 row">
                    <div class="col-md-1">
                        <?php
                        if ($pathfile == "komentar.php") {  ?>
                        <img src="../../dist/img/profil/<?php echo $pengguna['foto_profil']; ?>"
                            class="img-circle elevation-2" alt="User Image" style="width: 60px;
                                                                height: 60px;
                                                                object-fit: cover;" />

                        <?php
                        } elseif ($pathfile == "index.php") { ?>
                        <img src="dist/img/profil/<?php echo $pengguna['foto_profil']; ?>"
                            class="img-circle elevation-2" alt="User Image" style="width: 60px;
                                                                height: 60px;
                                                                object-fit: cover;" />
                        <?php

                        } else { ?>
                        <img src="../../../dist/img/profil/<?php echo $pengguna['foto_profil']; ?>"
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
                                    <?php echo $pengguna['nm_pengguna']; ?></p>
                            </div>

                            <div class="col-md-12 row" style="margin-top: -15px">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons"
                                    style="max-height: 33px; margin-right: 10px; margin-left: 9px;">
                                    <label class="btn btn-light btn-outline-dark active tekseditortambah"
                                        style="border-radius: 6px 0px 0px 6px;">
                                        <input type="radio" name="tipe" value="TANYA" id="option_a1" autocomplete="off"
                                            checked>
                                        TANYA
                                    </label>
                                    <label class="btn btn-light btn-outline-dark tekseditortambah"
                                        style="border-radius: 0px 6px 6px 0px;">
                                        <input type="radio" name="tipe" value="BERBAGI" id="option_a3"
                                            autocomplete="off">
                                        BERBAGI
                                    </label>
                                </div>

                                <select class="form-control select2 tekseditortambah" name="id_topik" id="id_topik"
                                    style="border-radius: 6px; width: 270px ;margin-right: 10px; border-color: black; height: 33px;"
                                    required>

                                    <option value="">Pilih topik</option>
                                    <?php
                                                $data2 = mysqli_query($koneksi, "SELECT * from tb_topik order by nm_topik");
                                                while ($d2 = mysqli_fetch_array($data2)) {
                                                ?>

                                    <option value="<?php echo $d2['id_topik']; ?>">
                                        <?php echo $d2['nm_topik']; ?>
                                    </option>
                                    <?php } ?>
                                </select>

                                <input type="hidden" id="id_pengguna" name="id_pengguna"
                                    value="<?php echo $pengguna['id_pengguna']; ?>">
                                <input type="hidden" id="pathfile" name="pathfile" value="<?php echo $pathfile ?>">

                                <div class="btn-group btn-group-toggle" data-toggle="buttons" style="max-height: 33px;"
                                    data-toggle="tooltip" data-placement="bottom"
                                    title="Anonim membantu melindungi privasi dengan tidak menyertakan nama dan foto profil Anda.">
                                    <label class="btn btn-light btn-outline-dark active "
                                        style="border-radius: 8px 0px 0px 8px; ">
                                        <input type="radio" name="mode" value="hidden" id="option_a1"
                                            autocomplete="off"><i class="fas fa-eye-slash tekseditortambah"></i>
                                    </label>
                                    <label class="btn btn-light btn-outline-dark"
                                        style="border-radius: 0px 8px 8px 0px; ">
                                        <input type="radio" name="mode" value="show" id="option_a3" autocomplete="off"
                                            checked> <i class="fas fa-eye tekseditortambah"></i>
                                    </label>
                                </div>

                                <span class="float-right text-sm text-info" type="button" data-toggle="modal"
                                    data-target="#modalinfo" style="margin-left: 16px; margin-top: 5px;"><i
                                        class="far fa-question-circle" style="font-size: 1.5rem;"></i></span>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="container">
                    <p class="font-weight-bold" style="margin-bottom: 5px">Judul</p>
                    <input type="text" name="judul" class="form-control" id="exampleInputEmail1"
                        placeholder='Awali judul unggahan anda dengan "Apa", "Bagaimana", "Mengapa". dll' required>
                    <br>

                    <p class="font-weight-bold" style="margin-bottom: 5px">Deskripsi</p>
                    <textarea id="ckeditortambah" name="deskripsilengkap">
                    </textarea>

                    <p class="font-weight-bold" style="margin-bottom: 5px">File</p>
                    <div class="input-group">
                        <!-- <input type="file" name="upload[]" class="custom-file-input" multiple> -->
                        <input type="file" name="foto[]" multiple>
                    </div>
                    <p style="color: red">Ekstensi yang diperbolehkan .rar | .zip | .png | .jpg | .jpeg |
                        .gif | .doc | .docx | .pdf | .sql | .mp4 | .avi </p>

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

<div class="modal" id="modalinfo" data-backdrop="static">
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
                    <p><b>Tipe unggahan</b> dibedakan menjadi dua yaitu ASK dan SHARE. ASK digunakan
                        untuk bertanya sedangkan SHARE digunakan ketika ingin membuat unggahan informasi. </p>
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
                    <p><b>Pemilihan topik</b> berguna meningkatkan oportunitas pertanyaan ataupun informasi anda
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
                    <p><b>Anonim</b> berfungsi membantu melindungi privasi agar Anda dapat merasa aman saat
                        memposting
                        konten. Postingan anonim tidak menyertakan nama atau foto profil Anda. Untuk
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