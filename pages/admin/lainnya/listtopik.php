<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['nm_topik']; ?>
    </td>
    <td>
        <a href="hapustopik.php?id=<?php echo $d['id_topik']; ?>">
            <button type="submit" href="<?= $d['id']; ?>" class="btn btn-success"
                onclick="return confirm('Apakah Anda Yakin Menghapus Topik Ini?');"><i
                    class="fas fa-trash"></i></button>
        </a>
    </td>
</tr>