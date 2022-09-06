<?php

include('../../../koneksi.php');

//get id
$id_pengguna = $_GET['id'];  
 

if (isset($id_pengguna)){
    
//hapus pengguna 
$queryhapuspengguna = "DELETE FROM tb_pengguna WHERE id_pengguna = '$id_pengguna'";
if ($koneksi->query($queryhapuspengguna)) {  
  
    $query = "DELETE FROM tb_lapor WHERE id_pengguna = '$id_pengguna'"; 
    if ($koneksi->query($query)) {
        echo "<script>alert('Berhasil hapus pengguna');window.location='pengguna.php?alert=Berhasil';</script>";
    } else {
        echo "<script>alert('Gagal hapus pengguna');window.location='pengguna.php?alert=Gagal';</script>";
    }
  
} else { 
     echo "<script>alert('Gagal blokir pengguna');window.location='pengguna.php?alert=Gagal';</script>";
    }
 
} else { 
    $query = "DELETE FROM tb_lapor WHERE id_pengguna = '$id_pengguna'"; 
    if ($koneksi->query($query)) {
        echo "<script>alert('Berhasil hapus laporan');window.location='pengguna.php?alert=Berhasil';</script>";
    } else {
        echo "<script>alert('Gagal hapus laporan');window.location='pengguna.php?alert=Gagal';</script>";
    }
}

 