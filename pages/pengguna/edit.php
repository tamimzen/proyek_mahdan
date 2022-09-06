<?php

include('../../koneksi.php');  


$id_postingan = $_POST['id_postingan'];
$judul = $_POST['judul'];
$judul = mysqli_real_escape_string($koneksi, $judul);
$deskripsilengkap = $_POST['deskripsilengkap'];
$deskripsilengkap = mysqli_real_escape_string($koneksi, $deskripsilengkap);
$id_topik = $_POST['id_topik'];
$mode = $_POST['mode'];
$tipe = $_POST['tipe'];
$id_pengguna = $_POST['id_pengguna'];
$tgl_buat = date("Y-m-d");
$pathfile = $_POST['path'];

// sensor judul
$judul_to_array = explode(" ", $judul); 

foreach($judul_to_array as $kata){
	$query = mysqli_query($koneksi,"SELECT * FROM tb_kata WHERE nm_kata LIKE '$kata'");
	while($row = mysqli_fetch_assoc($query))
	{
		$kata_dapat = $row['nm_kata'];
		$kata_baru = preg_replace('/(?!^.?).(?!.{0}$)/','*',$kata_dapat);

		$key = array_search($kata_dapat,$judul_to_array);
		$panjang = strlen($kata_dapat)-1;

		$replace = array($key =>$kata_baru);
		$judul_to_array = array_replace($judul_to_array,$replace);
	}
}

// sensor deskripsi 
$deskripsi_to_array = explode(" ", $deskripsilengkap);

foreach($deskripsi_to_array as $kata2){
	$query2 = mysqli_query($koneksi,"SELECT * FROM tb_kata WHERE nm_kata LIKE '$kata2'");
	while($row2 = mysqli_fetch_assoc($query2))
	{
		$kata_dapat2 = $row2['nm_kata'];
		$kata_baru2 = preg_replace('/(?!^.?).(?!.{0}$)/','*',$kata_dapat2);

		$key2 = array_search($kata_dapat2,$deskripsi_to_array);
		$panjang2 = strlen($kata_dapat2)-1;

		$replace2 = array($key2 =>$kata_baru2);
		$deskripsi_to_array = array_replace($deskripsi_to_array,$replace2);
	}
}

$judul = implode(" ", $judul_to_array);
$deskripsilengkap = implode(" ", $deskripsi_to_array);
// echo $judul;
// echo $deskripsilengkap;
 

mysqli_query($koneksi,"UPDATE tb_postingan set id_postingan='$id_postingan', judul='$judul', deskripsilengkap='$deskripsilengkap', id_topik='$id_topik', mode='$mode', tipe='$tipe',tgl_buat='$tgl_buat', id_pengguna='$id_pengguna'  where id_postingan='$id_postingan'");
 
if ($pathfile == "komentar.php"){
	echo "<script>alert('Berhasil menyimpan postingan');window.location='$pathfile?id_postingan=$id_postingan & alert=Berhasil';</script>"; 
} elseif ($pathfile == "index.php"){
	echo "<script>alert('Berhasil menyimpan postingan');window.location='../../index.php?alert=Berhasil';</script>"; 
} elseif ($pathfile == "topik.php"){ 
	echo "<script>alert('Berhasil menyimpan postingan');window.location='home/$pathfile?topik=$id_topik & alert=Berhasil';</script>"; 
} elseif ($pathfile == "profil.php"){ 
	echo "<script>alert('Berhasil menyimpan postingan');window.location='profil/profil.php?id=$id_pengguna & alert=Berhasil';</script>"; 
} else { 
	echo "<script>alert('Berhasil menyimpan postingan');window.location='../../index.php alert=Berhasil';</script>"; 
}



?>