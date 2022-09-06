<?php
include('../../koneksi.php');

$path = $_POST['path'];
$id_alasanlapor = $_POST['id_alasanlapor'];
$tgl = date("Y-m-d");
$deskripsi_tambahan = $_POST['deskripsi_tambahan'];
$id_postingan = $_POST['id_postingan'];
$id_pengguna = $_POST['id_pengguna'];
$target = $_POST['target'];
$topik = $_POST['topik'];


echo $topik;
if (isset($_POST['id_komentar'])){ 
	$id_komentar = $_POST['id_komentar'];
	}

	if (isset($_POST['id_postingan'])){ 
		$id_postingan = $_POST['id_postingan'];
		}
	 
		
  
// menginput data ke database
if ($target == 'komentar'){ 
	mysqli_query($koneksi,"INSERT into tb_lapor (id_lapor,id_alasanlapor,tgl,deskripsi_tambahan,id_postingan,id_komentar,id_pengguna,target) values('','$id_alasanlapor','$tgl','$deskripsi_tambahan','$id_postingan','$id_komentar','$id_pengguna','$target')");
	} elseif ($target == 'postingan') {
		mysqli_query($koneksi,"INSERT into tb_lapor (id_lapor,id_alasanlapor,tgl,deskripsi_tambahan,id_postingan,id_pengguna,target) values('','$id_alasanlapor','$tgl','$deskripsi_tambahan','$id_postingan','$id_pengguna','$target')");
	} elseif ($target == 'pengguna') {
		mysqli_query($koneksi,"INSERT into tb_lapor (id_lapor,id_alasanlapor,tgl,deskripsi_tambahan,id_pengguna,target) values('','$id_alasanlapor','$tgl','$deskripsi_tambahan','$id_pengguna','$target')");
	}

 
if ($path == "komentar.php"){
	header("location:$path?id_postingan=$id_postingan"); 
} elseif  ($path == "profil.php"){
	header("location:profil/profil.php?id=$id_pengguna");
} elseif  ($path == "topik.php"){
	header("location:home/topik.php?topik=$id_topik"); 
} else {
	header("location:../../index.php");
}