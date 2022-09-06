<?php

include('../../koneksi.php');

$id_komentar_parent = $_POST['id_komentar_parent']; 
$id_postingan = $_POST['id_postingan']; 
$komentar = $_POST['komentar']; 
$mode = $_POST['mode'];  
$tz = 'Asia/Jakarta';
$dt = new DateTime("now", new DateTimeZone($tz)); 
$tgl_buat_komentar = $dt->format('Y-m-d G:i:s');
$id_pengirim = $_POST['id_pengirim'];  
 
// sensor komentar
$komentar_to_array = explode(" ", $komentar); 

foreach($komentar_to_array as $kata){
	$query = mysqli_query($koneksi,"SELECT * FROM tb_kata WHERE nm_kata LIKE '$kata'");
	while($row = mysqli_fetch_assoc($query))
	{
		$kata_dapat = $row['nm_kata'];
		$kata_baru = preg_replace('/(?!^.?).(?!.{0}$)/','*',$kata_dapat);

		$key = array_search($kata_dapat,$komentar_to_array);
		$panjang = strlen($kata_dapat)-1;

		$replace = array($key =>$kata_baru);
		$komentar_to_array = array_replace($komentar_to_array,$replace);
	}
}
 
$komentar = implode(" ", $komentar_to_array);
  
// menginput data ke database
$data = "INSERT INTO tb_komentar (id_komentar,id_komentar_parent,id_postingan,komentar,mode,tgl_buat_komentar,id_pengirim) 
            					  VALUES ('','$id_komentar_parent','$id_postingan','$komentar','$mode','$tgl_buat_komentar','$id_pengirim')" ; 

$hasil= mysqli_query($koneksi,$data) or die(mysqli_error($koneksi));

if ($hasil) {
	echo "Berhasil ";
    header("location:komentar.php?id_postingan=$id_postingan"); 
	exit;
  }
else {
	echo "Gagal simpan";
	exit;
}  
?>