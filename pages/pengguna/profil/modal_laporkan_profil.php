<div class="modal fade" id="modallaporkan<?php echo $pengguna['id_pengguna'] ?>">
    <div class="modal-dialog modal-lg">
        <form action="../laporkan.php" method="POST">
            <div class="modal-content " style="width: 90%;">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="font-weight-bold text-dark " style="padding: 10px;">
                        Laporkan
                        Pengguna</h4>

                    <div class="form-group">
                        <textarea class="form-control" placeholder="Opsional: Jelaskan laporan ini"
                            name="deskripsi_tambahan" id="deskripsi_tambahan" rows="2"></textarea>
                    </div>

                    <?php
                        $alasanlapor2 = mysqli_query($koneksi, "SELECT * from tb_alasanlapor where targetalasan='pengguna' ORDER BY id_alasanlapor DESC");

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

                <input type="hidden" id="target" name="target" value="pengguna">
                <input type="hidden" id="path" name="path" value="<?php echo $pathfile ?>">
                <input type="hidden" id="id_pengguna" name="id_pengguna"
                    value="<?php echo $pengguna['id_pengguna']; ?>">

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