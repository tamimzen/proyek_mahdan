<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['judul_alasan']; ?>
    </td>
    <td>
        <?php echo $d['deskripsi']; ?></td>
    <td>
        <a href="hapusalasan.php?id=<?php echo $d['id_alasanlapor'] ?>" class="btn btn-danger"
            onclick="return confirm('Apakah Anda Yakin Menghapus Laporan Ini?');"><i class="fas fa-trash"></i></a>&nbsp;
    </td>
</tr>