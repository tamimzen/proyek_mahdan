<div class="modal fade" id="modaleditpage">
    <div class="modal-dialog modal-md">
        <form action="edit_foto.php" method="POST" enctype="multipart/form-data">
            <div class="modal-content " style="width: 90%;">
                <div class="modal-header" style="border-bottom: 1px solid rgb(80, 80, 80);">
                    <div class="col-md-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="text-center font-weight-bold" style="text-align: center;">
                            Edit
                            Foto Sampul</h3>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 row">
                        <?php 
                        if (!isset($pengguna["foto_page"])) {
                        ?>
                        <img src="../../../dist/img/page/contoh.jpg" alt="User Image"
                            style="width: 100%; height: 140px; object-fit: cover;" />
                        <?php
                        } else {                        
                        ?>
                        <img src="../../../dist/img/page/<?php echo $pengguna['foto_page']; ?>" alt="User Image"
                            style="width: 100%; height: 140px; object-fit: cover;" />
                        <?php
                        } 
                        ?>
                        <div style="margin-top: 20px;">
                            <p class="font-weight-bold" style="margin-bottom: 5px">Pilih foto halaman</p>
                            <div class="input-group">
                                <!-- <input type="file" name="upload[]" class="custom-file-input" multiple> -->
                                <input type="file" name="foto" id="foto" required="required">
                            </div>
                            <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg |
                                .gif </p>
                        </div>
                    </div>
                </div>

                <input type="hidden" id="id_pengguna" name="id_pengguna"
                    value="<?php echo $pengguna['id_pengguna']; ?>">
                <input type="hidden" id="nm_pengguna" name="nm_pengguna"
                    value="<?php echo $pengguna['nm_pengguna']; ?>">
                <input type="hidden" id="foto_lama" name="foto_lama" value="<?php echo $pengguna['foto_page']; ?>">
                <input type="hidden" id="pathfile" name="pathfile" value="<?php echo $pathfile?>">
                <input type="hidden" id="edit" name="edit" value="editfotopage">

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











<!-- modal informasi -->

<div class="modal" class="modalinfo" data-backdrop="static">
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