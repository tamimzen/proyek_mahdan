<div class="modal fade" id="modaleditkredensial">
    <div class="modal-dialog modal-md">
        <form action="edit_profil.php" method="POST">
            <div class="modal-content " style="width: 90%;">
                <div class="modal-header" style="border-bottom: 1px solid rgb(80, 80, 80);">
                    <div class="col-md-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="text-center font-weight-bold" style="text-align: center;">
                            Edit Kredensial Profil</h3>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 row">
                        <p class="font-weight-bold" style="margin-bottom: -2px">Kredensial </p>
                        <p class="text-muted" style="margin-bottom: 5px; font-size: 14px">Kredensial ditampilkan pada
                            setiap postingan
                            untuk menambah kredibilitas ke konten Anda </p>
                        <input type="text" name="kredensial" class="form-control"
                            value="<?php echo $pengguna['kredensial'] ?>">
                        <br>
                    </div>
                </div>

                <input type="hidden" id="id_pengguna" name="id_pengguna"
                    value="<?php echo $pengguna['id_pengguna']; ?>">
                <input type="hidden" id="pathfile" name="pathfile" value="<?php echo $pathfile?>">
                <input type="hidden" id="edit" name="edit" value="editkredensial">

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