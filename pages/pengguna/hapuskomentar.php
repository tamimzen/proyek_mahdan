<?php

include('../../koneksi.php');

//get id
$id_komentar = $_GET['id'];

$queryambil = "SELECT * FROM tb_komentar where id_komentar = '$id_komentar'";
$result = mysqli_query($koneksi, $queryambil);
$d = mysqli_fetch_array($result);
$id_postingan = $d['id_postingan']; 
$id_komentar_parent = $d['id_komentar_parent']; 

if (isset($id_komentar)) {

    if ($id_komentar_parent == 0) {
         
        $queryhapusanakkomentar = "DELETE FROM tb_komentar WHERE id_komentar_parent = '$id_komentar'"; 
 
        if ($koneksi->query($queryhapusanakkomentar)) {
            $queryhapus = "DELETE FROM tb_komentar WHERE id_komentar = '$id_komentar'";
            if ($koneksi->query($queryhapus)) { 
                header("location: komentar.php?id_postingan=$id_postingan");
            } else {
                echo "DATA GAGAL DIHAPUS!";
            }
        } else {
            echo "DATA GAGAL DIHAPUS!";
        }
    } else {
        $queryhapus = "DELETE FROM tb_komentar WHERE id_komentar = '$id_komentar'";

        // echo $id_postingan;

        if ($koneksi->query($queryhapus)) {
            header("location: komentar.php?id_postingan=$id_postingan");
        } else {
            echo "DATA GAGAL DIHAPUS!";
        }
    }
} else {
    echo "KOMENTAR TIDAK DITEMUKAN!";
    header("location: komentar.php?id_postingan=$id_postingan");
}