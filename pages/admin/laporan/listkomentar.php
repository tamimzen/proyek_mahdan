 <tr>
     <td data-toggle="modal" data-target="#modalkomentar<?php echo $d['id_komentar']; ?>"><?php echo $no++; ?></td>
     <td data-toggle="modal" data-target="#modalkomentar<?php echo $d['id_komentar']; ?>">
         <?php echo date("d-m-Y", strtotime($d['tgl']))  ?>
     </td>
     <td data-toggle="modal" data-target="#modalkomentar<?php echo $d['id_komentar']; ?>">
         <?php echo $d['judul_alasan']; ?>
     </td>
     <td data-toggle="modal" data-target="#modalkomentar<?php echo $d['id_komentar']; ?>">
         <?php echo $d['deskripsi_tambahan']; ?></td>
     <td>
         <a href="hapuskomentar.php?id=<?php echo $d['id_lapor']; ?>">
             <button type="submit" href="<?= $d['id']; ?>" class="btn btn-success"
                 onclick="return confirm('Apakah Anda Yakin Menghapus Laporan Ini?');"> <i
                     class="fas fa-times"></i></button>
         </a>
         <a href="blokirkomentar.php?id=<?php echo $d['id_komentar']; ?>">
             <button type="submit" class="btn btn-info"
                 onclick="return confirm('Apakah Anda Yakin Memblokir Postingan Ini?');"> <i
                     class="fas fa-check"></i></button>
         </a>
     </td>
 </tr>