<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['nm_admin']; ?>
    </td>
    <td>
        <?php echo $d['email']; ?></td>
    <td>
        <a href="hapusadmin.php?id=<?php echo $d['id_admin']; ?>">
            <button type="submit" href="<?= $d['id']; ?>" class="btn btn-success"
                onclick="return confirm('Apakah Anda Yakin Menghapus Akun Ini?');"><i class="fas fa-trash"></i></button>
        </a>
    </td>
</tr>