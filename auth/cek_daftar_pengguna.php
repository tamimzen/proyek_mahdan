<?php
include "../koneksi.php";

$email = $_POST['email'];
$nm_pengguna = $_POST['nm_pengguna']; 
$pw = md5($_POST['pw']);
$tz = 'Asia/Jakarta';
$dt = new DateTime("now", new DateTimeZone($tz));  
$tgl_lahir = date("Y-m-d", strtotime($_POST['tgl_lahir'])); 
$tgl_daftar =  $dt->format("Y-m-d");
$foto_page = "page_default.jpg";
$foto_profil = "profil_default.png";

// echo $email , $pw , $nm_pengguna , $tgl_lahir , $tgl_daftar;

$cekemailquery =  mysqli_query($koneksi, "SELECT email FROM tb_pengguna WHERE email='$email'");
$cekemail    = mysqli_fetch_array($cekemailquery);
  
if ($cekemail > 0){  
	echo "<script>alert('Email sudah pernah didaftarkan, gunakan email baru')</script>";
	echo "<meta http-equiv='refresh' content='1 url=loginpengguna.php'>";
} else {

$data = "INSERT INTO tb_pengguna (id_pengguna,email,nm_pengguna,pw,tgl_lahir,foto_profil,foto_page,tgl_daftar) VALUES ('','$email','$nm_pengguna','$pw','$tgl_lahir','$foto_profil','$foto_page','$tgl_daftar')" ; 
$hasil= mysqli_query($koneksi,$data) or die(mysqli_error($koneksi));
 
if ($hasil) {   
	echo "<script>alert('Daftar berhasil! silahkan login')</script>";
	echo "<meta http-equiv='refresh' content='1 url=loginpengguna.php'>";
	exit;
  } else {  
	echo "<script>alert('Daftar gagal, mohon coba lagi')</script>";
	echo "<meta http-equiv='refresh' content='1 url=loginpengguna.php'>";
}  

}