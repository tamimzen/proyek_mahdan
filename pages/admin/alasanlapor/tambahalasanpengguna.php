<?php

include('../../../koneksi.php');

$judul_alasan = $_POST['judul_alasan'];
$deskripsi = $_POST['deskripsi'];
$targetalasan = $_POST['targetalasan'];
 
echo $judul_alasan;
// menginput data ke database
mysqli_query($koneksi,"INSERT into tb_alasanlapor values('','$judul_alasan','$deskripsi','$targetalasan')");


header("location:pengguna.php");
?>