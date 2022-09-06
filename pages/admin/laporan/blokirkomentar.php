<?php

include('../../../koneksi.php');

//get id
$id_komentar = $_GET['id'];  
$querykomentar    = mysqli_query($koneksi, "SELECT * FROM tb_komentar WHERE id_komentar = $id_komentar");
$komentar    = mysqli_fetch_array($querykomentar);
$id_komentarrow = $komentar['id_komentar'];

if (isset($id_komentarrow)){
    
//hapus komentar 
$queryhapuskomentar = "DELETE FROM tb_komentar WHERE id_komentar = '$id_komentar'";
if ($koneksi->query($queryhapuskomentar)) {  
  
    $query = "DELETE FROM tb_lapor WHERE id_komentar = '$id_komentar'"; 
    if ($koneksi->query($query)) {
        echo "<script>alert('Berhasil hapus komentar');window.location='komentar.php?alert=Berhasil';</script>";
    } else {
        echo "<script>alert('Gagal hapus komentar');window.location='komentar.php?alert=Gagal';</script>";
    }
  
} else { 
     echo "<script>alert('Gagal blokir komentar');window.location='komentar.php?alert=Gagal';</script>";
    }
 
} else { 
    $query = "DELETE FROM tb_lapor WHERE id_komentar = '$id_komentar'"; 
    if ($koneksi->query($query)) {
        echo "<script>alert('Berhasil hapus laporan');window.location='komentar.php?alert=Berhasil';</script>";
    } else {
        echo "<script>alert('Gagal hapus laporan');window.location='komentar.php?alert=Gagal';</script>";
    } 
}

 