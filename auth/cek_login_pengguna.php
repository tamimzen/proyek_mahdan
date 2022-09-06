<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../koneksi.php';
 
// menangkap data yang dikirim dari form
$email = $_POST['email'];
$pw = md5($_POST['pw']);
 
$data = "SELECT * from tb_pengguna where email='".$email."' and pw='".$pw."' limit 1";
$hasil = mysqli_query ($koneksi,$data);
$jumlah = mysqli_num_rows($hasil);
  

if ($jumlah>0) {
	$row = mysqli_fetch_assoc($hasil);
	foreach($row as $key => $value){
	
		$_SESSION[$key]=$value;

	
	}
	header("Location:../index.php");
	
}else {
	echo "<script>alert('Username atau password salah')</script>";
	echo "<meta http-equiv='refresh' content='1 url=loginpengguna.php'>";

}