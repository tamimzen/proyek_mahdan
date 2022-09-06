<?php

include('../../../koneksi.php');

//get id
$id_pengguna = $_GET['id'];


// $query1 = mysqli_fetch_array($koneksi->query("SELECT * FROM tb_lapor WHERE id_lapor = '$id'"));

if (isset($id_pengguna)) {

    $query = "DELETE FROM tb_lapor WHERE id_lapor = '$id_pengguna'";

    if ($koneksi->query($query)) {
        echo "<script>alert('Berhasil hapus laporan pengguna');window.location='pengguna.php?alert=Berhasil';</script>";
    } else {
        echo "<script>alert('Gagal hapus laporan pengguna');window.location='pengguna.php?alert=Gagal';</script>";
    }
} else {
    echo "<script>alert('Gagal, laporan pengguna tidak ditemukan');window.location='pengguna.php?alert=Gagal';</script>";
}

?>