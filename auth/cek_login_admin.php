<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../koneksi.php';
 
// menangkap data yang dikirim dari form
$email = $_POST['email'];
$pw = md5($_POST['password']);
 
$data = "SELECT * from tb_admin where email='".$email."' and password='".$pw."' limit 1";
$hasil = mysqli_query ($koneksi,$data);
$jumlah = mysqli_num_rows($hasil);
  

if ($jumlah>0) {
	$row = mysqli_fetch_assoc($hasil);
	$_SESSION["id_admin"]=$row["id_admin"];
	$_SESSION["nm_admin"]=$row["nm_admin"];
	$_SESSION["email"]=$row["email"]; 


	header("Location:../pages/admin/laporan/postingan.php");
	
}else {
	echo "<script>alert('Username atau kata sandi salah')</script>";
	echo "<meta http-equiv='refresh' content='1 url=loginadmin.php'>";

}