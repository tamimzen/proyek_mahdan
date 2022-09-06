 <tr>
     <td data-toggle="modal" data-target="#modalpengguna<?php echo $d['id_postingan']; ?>"><?php echo $no++; ?></td>
     <td data-toggle="modal" data-target="#modalpengguna<?php echo $d['id_postingan']; ?>">
         <?php echo date("d-m-Y", strtotime($d['tgl']))  ?></td>
     <td data-toggle="modal" data-target="#modalpengguna<?php echo $d['id_postingan']; ?>">
         <?php echo $d['nm_pengguna']; ?></td>
     <td data-toggle="modal" data-target="#modalpengguna<?php echo $d['id_postingan']; ?>">
         <?php echo $d['judul_alasan']; ?>
     </td>
     <td data-toggle="modal" data-target="#modalpengguna<?php echo $d['id_postingan']; ?>">
         <?php echo $d['deskripsi_tambahan']; ?></td>
     <td>
         <a href="hapuspengguna.php?id=<?php echo $d['id_lapor']; ?>">
             <button type="submit" href="<?= $d['id']; ?>" class="btn btn-success"
                 onclick="return confirm('Apakah Anda Yakin Menghapus Laporan Ini?');"> <i
                     class="fas fa-times"></i></button>
         </a>
         <a href="blokirpengguna.php?id=<?php echo $d['id_pengguna']; ?>">
             <button type="submit" class="btn btn-info"
                 onclick="return confirm('Apakah Anda Yakin Memblokir Postingan Ini?');"> <i
                     class="fas fa-check"></i></button>
         </a>
     </td>
 </tr>