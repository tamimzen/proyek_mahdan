<div class="modal fade" id="modaleditprofil">
    <div class="modal-dialog modal-md">
        <form action="edit_profil.php" method="POST">
            <div class="modal-content " style="width: 90%;">
                <div class="modal-header" style="border-bottom: 1px solid rgb(80, 80, 80);">
                    <div class="col-md-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="text-center font-weight-bold" style="text-align: center;">
                            Edit Profil</h3>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 row">
                        <p class="font-weight-bold" style="margin-bottom: 5px">Deskripsi </p>
                        <textarea class="form-control" type="text" id="exampleFormControlTextarea1" name="deskripsi"
                            placeholder="Jelaskan siapa anda..." value="<?php echo $pengguna['deskripsi'] ?>" rows="2"
                            style="width:100%"></textarea>
                    </div>
                    <div class="col-md-12 row">
                        <p class="font-weight-bold" style="margin-bottom: 5px">Pekerjaan </p>
                        <input type="text" name="pekerjaan" class="form-control"
                            placeholder="Contoh : Mahasiswa/Dosen/Akuntan" value="<?php echo $pengguna['pekerjaan'] ?>">
                        <br>
                    </div>
                    <div class="col-md-12 row">
                        <p class="font-weight-bold" style="margin-bottom: 5px">Pendidikan </p>
                        <input type="text" name="pendidikan" class="form-control"
                            placeholder="Masukkan pendidikan anda saat ini / terakhir..."
                            value="<?php echo $pengguna['pendidikan'] ?>">
                        <br>
                    </div>
                    <div class="col-md-12 row">
                        <p class="font-weight-bold" style="margin-bottom: 5px">Lokasi </p>
                        <input type="text" name="lokasi" class="form-control" value="<?php echo $pengguna['lokasi'] ?>"
                            placeholder="Masukkan lokasi anda terkini...">
                        <br>
                    </div>
                </div>

                <input type="hidden" id="id_pengguna" name="id_pengguna"
                    value="<?php echo $pengguna['id_pengguna']; ?>">
                <input type="hidden" id="pathfile" name="pathfile" value="<?php echo $pathfile?>">
                <input type="hidden" id="edit" name="edit" value="editprofil">

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