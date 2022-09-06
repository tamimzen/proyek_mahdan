<?php

include('../../../koneksi.php');

//get id
$id_postingan = $_GET['id'];


if (isset($id_postingan)) {

    //hapus postingan 
    $queryhapuspostingan = "DELETE FROM tb_postingan WHERE id_postingan = '$id_postingan'";
    if ($koneksi->query($queryhapuspostingan)) {

        //hapus laporan

        $query = "DELETE FROM tb_lapor WHERE id_postingan = '$id_postingan'";
        if ($koneksi->query($query)) {
            echo "<script>alert('Berhasil hapus laporan');window.location='postingan.php?alert=Berhasil';</script>";
        } else {
            echo "<script>alert('Gagal hapus laporan');window.location='postingan.php?alert=Gagal';</script>";
        }


        //cek gambar
        $cekgambarquery = mysqli_query($koneksi, "SELECT * from tb_gambar where id_postingan = '$id_postingan'");
        $cekgambar = mysqli_num_rows($cekgambarquery);

        //cek berkas
        $cekberkasquery = mysqli_query($koneksi, "SELECT * from tb_berkas where id_postingan = '$id_postingan'");
        $cekberkas = mysqli_num_rows($cekberkasquery);

        //cek video
        $cekvideoquery = mysqli_query($koneksi, "SELECT * from tb_video where id_postingan = '$id_postingan'");
        $cekvideo = mysqli_num_rows($cekvideoquery);


        if ($cekgambar > 0) {
            while ($d1 = mysqli_fetch_array($cekgambarquery)) {
                $nama1 = $d1['nm_gambar'];
                unlink("../../../dist/img/postingan/" . $nama1);
                $queryhapusgambar = "DELETE FROM tb_gambar WHERE id_postingan = $id_postingan";
            }
        }
        if ($cekberkas > 0) {
            while ($d2 = mysqli_fetch_array($cekberkasquery)) {
                $nama2 = $d2['nm_berkas'];
                unlink("../../../dist/berkas/postingan/" . $nama2);
                $queryhapusberkas = "DELETE FROM tb_berkas WHERE id_postingan = $id_postingan";
            }
        }

        if ($cekvideo > 0) {
            while ($d3 = mysqli_fetch_array($cekvideoquery)) {
                $nama3 = $d3['nm_video'];
                unlink("../../../dist/video/postingan/" . $nama3);
                $queryhapusvideo = "DELETE FROM tb_video WHERE id_postingan = $id_postingan";
            }
        }

        echo "<script>alert('Berhasil blokir postingan');window.location='postingan.php?alert=Berhasil';</script>";
    } else {
        echo "<script>alert('Gagal blokir postingan');window.location='postingan.php?alert=Gagal';</script>";
    }
} else {
    //hapus laporan 

    $query = "DELETE FROM tb_lapor WHERE id_postingan = '$id_postingan'";
    if ($koneksi->query($query)) {
        echo "<script>alert('Berhasil hapus laporan');window.location='postingan.php?alert=Berhasil';</script>";
    } else {
        echo "<script>alert('Gagal hapus laporan');window.location='postingan.php?alert=Gagal';</script>";
    }
 
}


// if ($koneksi->query($query)) {
//     header("location: postingan.php");
// } else {
//     echo "DATA GAGAL DIHAPUS!";
// }