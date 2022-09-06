<div class="card card-widget">
    <div class="card-header">
        <div class="user-block">
            <h5 class="font-weight-bold" style="margin-bottom: -3px;">
                <i class="far fa-folder"></i> Postingan
            </h5>
        </div>
        <!-- /.card-tools -->
    </div>
    <?php 
        
        if (isset($cari_tipe)){
            $data2 = mysqli_query($koneksi, "SELECT * from tb_postingan inner join tb_pengguna on tb_postingan.id_pengguna = tb_pengguna.id_pengguna INNER JOIN tb_topik ON tb_postingan.id_topik = tb_topik.id_topik where judul like '%$cari_pencarian%' or nm_pengguna like '%$cari_pencarian%' AND tipe like '%$cari_tipe%' order by id_postingan DESC ");
        } else {
            $data2 = mysqli_query($koneksi, "SELECT * from tb_postingan inner join tb_pengguna on tb_postingan.id_pengguna = tb_pengguna.id_pengguna INNER JOIN tb_topik ON tb_postingan.id_topik = tb_topik.id_topik where judul like '%$cari_pencarian%' or nm_pengguna like '%$cari_pencarian%' order by id_postingan DESC "); 
        }
        while ($d2 = mysqli_fetch_array($data2)) {

            $id_postingan = $d2['id_postingan'];
            $mode = $d2['mode'];
            $jumlah_komen = 0;
            $jumlah_komen_query = mysqli_query($koneksi, "SELECT * from tb_komentar inner join tb_pengguna on tb_komentar.id_pengirim = tb_pengguna.id_pengguna where tb_komentar.id_postingan = '$id_postingan' ORDER BY id_komentar DESC");
            $jumlah_komen = mysqli_num_rows($jumlah_komen_query);
    ?>

    <div class="card-header" style="border-bottom: none">
        <?php
        if ($mode == "show") { ?>
        <div class="user-block">
            <img class="img-circle" src="../../../dist/img/profil/<?php echo $d2['foto_profil']; ?>" alt="User Image"
                style="object-fit: cover;" />
            <span class="username"><a
                    href="../profil/profil.php?id=<?= $d2['id_pengguna'] ?>"><?php echo $d2['nm_pengguna']; ?>
                    </li></a>
            </span>
            <span class="description"><?php echo $d2['nm_topik']; ?> - <?php echo $d2['kredensial']; ?></span>
        </div>

        <?php
        }  else { ?>
        <div class="user-block">
            <img class="img-circle" src="../../../dist/img/anonim.png" alt="User Image" style="object-fit: cover;" />
            <span class="username">
                Anonim
            </span>
            <span class="description"><?php echo $d2['nm_topik']; ?> - Informasi dirahasiakan</span>
        </div>

        <?php
        }

        ?>

        <!-- /.user-block -->
        <div class="card-tools">
            <p>#<?php echo $d2['tipe']; ?></p>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body" style="margin-top: -20px; border-bottom: 1px #cee0e0 solid">

        <a href="../komentar.php?id_postingan=<?php echo $d2['id_postingan']; ?>" class="text-dark "
            value="<?php echo $d2['id_postingan']; ?>" target="_blank">
            <p class="font-weight-bold">
                <?php echo $d2['judul']; ?>.
            </p>
        </a>
        <div class="row" style="margin-top: -20px;">
            <div class="iconnavbar">
                <button type="button " class="btn btn-sm">
                    <i class="far fa-thumbs-up" style="font-size: 0.95rem;"></i> 22
                </button>
                <span>|</span>
                <button type="button" class="btn btn-sm">
                    <i class="far fa-thumbs-down  " style="font-size: 0.95rem;"></i>
                </button>
            </div>
            <button type="button" class="btn btn-sm">
                <form action="#" method="GET">
                    <a href="../komentar.php?id_postingan=<?php echo $d2['id_postingan']; ?>" class="btn btn-sm"
                        style="font-size: 1rem;" value="<?php echo $d2['id_postingan']; ?>" target="_blank">
                        <i class="far fa-edit"></i> <span style="font-size:1rem;"> <?php echo $jumlah_komen ?>
                            Komentar</span>
                    </a>
                </form>
            </button>
        </div>
    </div>

    <?php } ?>

</div>