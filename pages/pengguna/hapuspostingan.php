<?php

include('../../koneksi.php');

//get id
$id_postingan = $_GET['id'];  
$id_pengguna = $_GET['user'];
$pathfile = $_GET['pathfile'];  

$tampilpengguna    = mysqli_query($koneksi, "SELECT * FROM tb_postingan WHERE id_postingan='$id_postingan'");
$topik    = mysqli_fetch_array($tampilpengguna);
$pathtopik = $topik['id_topik'];
 
if (isset($id_postingan)){
    
    //hapus postingan 
    $queryhapuspostingan = "DELETE FROM tb_postingan WHERE id_postingan = '$id_postingan'";
    if ($koneksi->query($queryhapuspostingan)) {  
    //hapus komentar
    $queryhapuskomentar = "DELETE FROM tb_komentar WHERE id_postingan = '$id_postingan'"; 
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
            unlink("../../dist/img/postingan/".$nama1);
            $queryhapusgambar = "DELETE FROM tb_gambar WHERE id_postingan = $id_postingan"; 
        } 
    } 
    if ($cekberkas > 0) { 
        while ($d2 = mysqli_fetch_array($cekberkasquery)) {
            $nama2 = $d2['nm_berkas'];
            unlink("../../dist/berkas/postingan/".$nama2);
            $queryhapusberkas = "DELETE FROM tb_berkas WHERE id_postingan = $id_postingan"; 
        } 
    }
    
    if ($cekvideo > 0) { 
        while ($d3 = mysqli_fetch_array($cekvideoquery)) {
            $nama3 = $d3['nm_video'];
            unlink("../../dist/video/postingan/".$nama3);
            $queryhapusvideo = "DELETE FROM tb_video WHERE id_postingan = $id_postingan"; 
        } 
    } 
      
    if ($pathfile == "index.php"){ 
        echo "<script>alert('Berhasil Hapus postingan');window.location='../../index.php?alert=Berhasil';</script>";
    } elseif($pathfile == "komentar.php"){  
        echo "<script>alert('Berhasil Hapus postingan');window.location='../../index.php?id_postingan=$id_postingan & alert=Berhasil';</script>";
    } elseif($pathfile == "topik.php") { 
        echo "<script>alert('Berhasil Hapus postingan');window.location='home/topik.php?topik=$pathtopik';</script>";
    } elseif($pathfile == "profil.php") { 
        echo "<script>alert('Berhasil Hapus postingan');window.location='profil/profil.php?id=$id_pengguna & alert=Berhasil';</script>";
    } else { 
    echo "<script>alert('Berhasil Hapus postingan');window.location='../../index.php?alert=Berhasil';</script>";
    }


    } else { 
          

         if ($pathfile == "index.php"){ 
            echo "<script>alert('Gagal hapus postingan');window.location='../../index.php?alert=Gagal';</script>";
        } elseif($pathfile == "komentar.php"){ 
            echo "<script>alert('Gagal hapus postingan');window.location='komentar.php?id_postingan=$id_postingan';</script>";
        } elseif($pathfile == "topik.php") {
            echo "DATA GAGAL DIHAPUS!";
            header("location: home/topik.php?topik=$pathtopik");
            echo "<script>alert('Gagal hapus postingan');window.location='../../index.php?topik=$pathtopik';</script>";
        } elseif($pathfile == "profil.php") { 
            echo "<script>alert('Gagal hapus postingan');window.location='profil/profil.php?id=$id_pengguna & alert=Gagal';</script>";
        } else { 
            echo "<script>alert('Gagal hapus postingan');window.location='../../index.php?alert=Gagal';</script>";
         }
        }
     
    } else {  
        echo "<script>alert('Gagal, postingan tidak ditemukan!');window.location='../../index.php?alert=Gagal';</script>";
    }