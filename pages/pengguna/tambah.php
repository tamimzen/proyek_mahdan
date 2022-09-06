<?php

include('../../koneksi.php');  

$judul = $_POST['judul'];
$judul = mysqli_real_escape_string($koneksi, $judul);

$deskripsilengkap = $_POST['deskripsilengkap'];
$deskripsilengkap = mysqli_real_escape_string($koneksi, $deskripsilengkap);

$id_topik = $_POST['id_topik'];
$mode = $_POST['mode'];
$tipe = $_POST['tipe'];
$id_pengguna = $_POST['id_pengguna'];
$tgl_buat = date("Y-m-d");
$pathfile = $_POST['pathfile'];


$limit = 10 * 1024 * 1024;
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif', 'mp4', 'avi', 'mkv', 'rar', 'zip', 'doc', 'docx', 'pdf', 'sql');
$ekstensigambar =  array('png', 'jpg', 'jpeg', 'gif');
$ekstensivideo =  array('mp4', 'avi', 'mkv');
$ekstensiberkas =  array('rar', 'zip', 'doc', 'docx', 'pdf', 'sql'); 
$jumlahFile = count($_FILES['foto']['name']);   
$cekfile = count(array_filter($_FILES['foto']['name']));


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

 

if (isset($judul)) {

	if($cekfile > 0){  
 
	$data = "INSERT INTO tb_postingan (id_postingan,judul,deskripsilengkap,id_topik,mode,tipe,id_pengguna,tgl_buat)
			 VALUES ('','$judul','$deskripsilengkap','$id_topik','$mode','$tipe','$id_pengguna','$tgl_buat')";

	$hasil = mysqli_query($koneksi, $data) or die(mysqli_error($koneksi));

	if ($hasil) {
	} else {
	if ($pathfile == "profil.php"){
		echo "<script>alert('Gagal menyimpan postingan');window.location='profil/profil.php?id=$id_pengguna & alert=gagal';</script>";
		// header("location:profil/profil.php?id=$id_pengguna & alert=simpan");
	} else {
		echo "<script>alert('Gagal menyimpan postingan');window.location='../../index.php?alert=gagal';</script>";
		// header("location:../../index.php?alert=simpan");
	}
	}

	$id_postingan = mysqli_insert_id($koneksi);

	for ($x = 0; $x < $jumlahFile; $x++) {
		$namafile = $_FILES['foto']['name'][$x];
		$tmp = $_FILES['foto']['tmp_name'][$x];
		$tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
		$ukuran = $_FILES['foto']['size'][$x];
		if ($ukuran > $limit) {
			echo "<script>alert('Ukuran maksimal file sebesar 10 MB');window.location='../../index.php';</script>";
		} else {
			if (in_array($tipe_file, $ekstensi) === true ) {

				if (in_array($tipe_file, $ekstensigambar) === true) {
					move_uploaded_file($tmp, "../../dist/img/postingan/".$id_pengguna.$id_postingan.'-'.date('d m Y Hisv').$namafile);
					// move_uploaded_file($_FILES['nm_file']['tmp_name'], 'file/gambar/' . $filename);  
					$path = $id_pengguna.$id_postingan.'-'.date('d m Y Hisv').$namafile;
					mysqli_query($koneksi, "INSERT INTO tb_gambar VALUES('', '$path','$id_postingan')");  
				}
				elseif  (in_array($tipe_file, $ekstensivideo) === true) {
					move_uploaded_file($tmp, '../../dist/video/postingan/'.$id_pengguna.$id_postingan.'-'.date('d m Y Hisv').$namafile);
					$path = $id_pengguna.$id_postingan.'-'.date('d m Y Hisv').$namafile;
					mysqli_query($koneksi, "INSERT INTO tb_video VALUES('', '$path','$id_postingan')");
				}
				else {
					move_uploaded_file($tmp, '../../dist/berkas/postingan/'.$id_pengguna.$id_postingan.'-'.date('d m Y Hisv').$namafile);
					$path = $id_pengguna.$id_postingan.'-'.date('d m Y Hisv').$namafile;
					mysqli_query($koneksi, "INSERT INTO tb_berkas VALUES('', '$path','$ukuran','$id_postingan')");
				}
			} else {
				$queryhapuspostingan = "DELETE FROM tb_postingan WHERE id_postingan = '$id_postingan'";
				if ($koneksi->query($queryhapuspostingan)) {  
				echo "<script>alert('Ekstensi tidak tepat');window.location='../../index.php';</script>";
				}
			}
		}
		// echo 'sayang'.$x.'sayang';
	}

} else {

	$data = "INSERT INTO tb_postingan (id_postingan,judul,deskripsilengkap,id_topik,mode,tipe,id_pengguna,tgl_buat)
			 VALUES ('','$judul','$deskripsilengkap','$id_topik','$mode','$tipe','$id_pengguna','$tgl_buat')";

	$hasil = mysqli_query($koneksi, $data) or die(mysqli_error($koneksi));

	if ($hasil) { 
		if ($pathfile == "profil.php"){
			echo "<script>alert('Berhasil menyimpan postingan');window.location='profil/profil.php?id=$id_pengguna & alert=Berhasil';</script>";
			// header("location:profil/profil.php?id=$id_pengguna & alert=simpan");
		} else {
			echo "<script>alert('Berhasil menyimpan postingan');window.location='../../index.php?alert=Berhasil';</script>";
			// header("location:../../index.php?alert=simpan");
		}
		exit;
	} else {
		if ($pathfile == "profil.php"){
			echo "<script>alert('Gagal menyimpan postingan');window.location='profil/profil.php?id=$id_pengguna & alert=gagal';</script>";
			// header("location:profil/profil.php?id=$id_pengguna & alert=simpan");
		} else {
			echo "<script>alert('Gagal menyimpan postingan');window.location='../../index.php?alert=gagal';</script>";
			// header("location:../../index.php?alert=simpan");
		}
		exit;
	}


}
} else {
	if ($pathfile == "profil.php"){
		echo "<script>alert('Gagal menyimpan postingan');window.location='profil/profil.php?id=$id_pengguna & alert=gagal';</script>";
		// header("location:profil/profil.php?id=$id_pengguna & alert=simpan");
	} else {
		echo "<script>alert('Gagal menyimpan postingan');window.location='../../index.php?alert=gagal';</script>";
		// header("location:../../index.php?alert=simpan");
	}
}
// menginput data ke database


// echo $id_postingan;

if ($pathfile == "profil.php"){
	echo "<script>alert('Berhasil');window.location='profil/profil.php?id=$id_pengguna & alert=simpan';</script>";
	// header("location:profil/profil.php?id=$id_pengguna & alert=simpan");
} else { 
	echo "<script>alert('Berhasil');window.location='../../index.php?alert=simpan';</script>";
	// header("location:../../index.php?alert=simpan");
}