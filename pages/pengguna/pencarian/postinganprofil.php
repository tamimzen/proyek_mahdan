<div class="card card-widget">
    <div class="card-header">
        <div class="user-block">
            <h5 class="font-weight-bold" style="margin-bottom: -3px;">
                <i class="far fa-folder"></i> Orang
            </h5>
        </div>
        <!-- /.card-tools -->
    </div>

    <?php
    $data = mysqli_query($koneksi, "SELECT * from tb_pengguna where nm_pengguna like '%".$cari_pencarian."%' ORDER BY nm_pengguna DESC");

    while ($d = mysqli_fetch_array($data)) {
        $id_pengguna = $d['id_pengguna']; 
        
       $jumlah_berbagi_query = mysqli_query($koneksi, "SELECT * from tb_postingan  where tb_postingan.id_pengguna = '$id_pengguna' and tipe = 'BERBAGI' ORDER BY id_postingan DESC");
       $jumlah_berbagi = mysqli_num_rows($jumlah_berbagi_query);
       
       $jumlah_bertanya_query = mysqli_query($koneksi, "SELECT * from tb_postingan  where tb_postingan.id_pengguna = '$id_pengguna' and tipe = 'TANYA' ORDER BY id_postingan DESC");
       $jumlah_bertanya = mysqli_num_rows($jumlah_bertanya_query); 
    ?>

    <div class="card-header">
        <div class="user-block">
            <img class="img-circle" src="../../../dist/img/profil/<?php echo $d['foto_profil']; ?>" alt="User Image"
                style="object-fit: cover;" />
            <span class="username"><a
                    href="../profil/profil.php?id=<?= $d['id_pengguna'] ?>"><?php echo $d['nm_pengguna']; ?>
                    </li></a>
            </span>
            <span class="description">
                <?php 
                    if (!$d['kredensial']){
                        echo "Lahir pada ".$d['tgl_lahir'];
                    } else {
                        echo $d['kredensial'];
                    }
                ?>
            </span>
        </div>

        <!-- /.user-block -->
        <div class="card-tools">
            <span><?= $jumlah_berbagi ?> Berbagi - <?= $jumlah_bertanya ?> Bertanya</span>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <?php } ?>

</div>