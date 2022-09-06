<?php

include('../../../koneksi.php');

//get id
$id_komentar = $_GET['id'];


// $query1 = mysqli_fetch_array($koneksi->query("SELECT * FROM tb_lapor WHERE id_lapor = '$id'"));

if (isset($id_komentar)) {

    $query = "DELETE FROM tb_lapor WHERE id_lapor = '$id_komentar'";

    if ($koneksi->query($query)) {
        echo "<script>alert('Berhasil hapus laporan komentar');window.location='komentar.php?alert=Berhasil';</script>";
    } else {
        echo "<script>alert('Gagal hapus laporan komentar');window.location='komentar.php?alert=Gagal';</script>";
    }
} else {
    echo "<script>alert('Gagal, laporan komentar tidak ditemukan');window.location='komentar.php?alert=Gagal';</script>";
}

?>