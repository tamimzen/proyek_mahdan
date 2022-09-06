<?php

include('../../../koneksi.php');

//get id
$id_postingan = $_GET['id'];


// $query1 = mysqli_fetch_array($koneksi->query("SELECT * FROM tb_lapor WHERE id_lapor = '$id'"));

if (isset($id_postingan)) {

    $query = "DELETE FROM tb_lapor WHERE id_lapor = '$id_postingan'";

    if ($koneksi->query($query)) {
        echo "<script>alert('Berhasil laporan hapus postingan');window.location='postingan.php?alert=Berhasil';</script>";
    } else {
        echo "<script>alert('Gagal laporan hapus postingan');window.location='postingan.php?alert=Gagal';</script>";
    }
} else {
    echo "<script>alert('Gagal, laporan postingan tidak ditemukan');window.location='postingan.php?alert=Gagal';</script>";
}

?>