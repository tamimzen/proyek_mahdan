<div class="modal fade" id="modaleditfotoprofil">
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
                            Foto Profil</h3>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 row">
                        <div class="col-12 row">
                            <div class="col"></div>
                            <?php 
                        if (!isset($pengguna["foto_profil"])) {
                        ?>
                            <div class="col">
                                <img src="../../../dist/img/profil/default.png" class="img-circle"
                                    style="width: 140px; height: 140px; object-fit: cover;" />
                            </div>
                            <?php
                        } else {                        
                        ?>
                            <div class="col">
                                <img src="../../../dist/img/profil/<?php echo $pengguna['foto_profil']; ?>"
                                    class="img-circle" style="width: 140px; height: 140px; object-fit: cover;" />
                            </div>
                            <?php
                        } 
                        ?>
                            <div class="col"></div>
                        </div>
                        <div style="margin-top: 20px;">
                            <p class="font-weight-bold" style="margin-bottom: 5px">Pilih foto halaman</p>
                            <div class="input-group">
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
                <input type="hidden" id="foto_lama" name="foto_lama" value="<?php echo $pengguna['foto_profil']; ?>">
                <input type="hidden" id="pathfile" name="pathfile" value="<?php echo $pathfile?>">
                <input type="hidden" id="edit" name="edit" value="editfotoprofil">

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