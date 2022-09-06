 <tr>
     <td data-toggle="modal" data-target="#modalpostingan<?php echo $d['id_postingan']; ?>"><?php echo $no++; ?></td>
     <td data-toggle="modal" data-target="#modalpostingan<?php echo $d['id_postingan']; ?>">
         <?php echo date("d-m-Y", strtotime($d['tgl']))  ?>
     </td>
     <td data-toggle="modal" data-target="#modalpostingan<?php echo $d['id_postingan']; ?>">
         <?php echo $d['judul_alasan']; ?>
     </td>
     <td data-toggle="modal" data-target="#modalpostingan<?php echo $d['id_postingan']; ?>">
         <?php echo $d['deskripsi_tambahan']; ?></td>
     <td>
         <a href="hapuspostingan.php?id=<?php echo $d['id_lapor']; ?>">
             <button type="submit" class="btn btn-success"
                 onclick="return confirm('Apakah Anda Yakin Menghapus Laporan Ini?');"> <i
                     class="fas fa-times"></i></button>
         </a>
         <a href="blokirpostingan.php?id=<?php echo $d['id_postingan']; ?>">
             <button type="submit" class=" btn btn-info"
                 onclick="return confirm('Apakah Anda Yakin Memblokir Postingan Ini?');"> <i
                     class="fas fa-check"></i></button>
         </a>
     </td>
 </tr>