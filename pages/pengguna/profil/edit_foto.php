<?php

include('../../../koneksi.php');  

$edit = $_POST['edit'];
$id_pengguna = $_POST['id_pengguna'];
$nm_pengguna = $_POST['nm_pengguna'];
$foto_lama = $_POST['foto_lama'];
$pathfile = $_POST['pathfile'];

 
$ekstensi =  array('png','jpg','jpeg','gif');
$namafile = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name']; 
$ukuran = $_FILES['foto']['size']; 
$limit = 10 * 2048 * 2048;
$tipefile = pathinfo($namafile, PATHINFO_EXTENSION);
 
 
if(!in_array($tipefile,$ekstensi) ) {
	header("location:profil.php?id=".$id_pengguna."&alert=gagal_ekstensi");
}else{
	if($ukuran < $limit){		
        if($edit == "editfotoprofil"){  
            
            move_uploaded_file($tmp, '../../../dist/img/profil/'.$id_pengguna.$nm_pengguna.'-'.date('d m Y').$namafile);
            $path = $id_pengguna.$nm_pengguna.'-'.date('d m Y').$namafile; 
            mysqli_query($koneksi,"UPDATE tb_pengguna set id_pengguna='$id_pengguna', foto_profil='$path' where id_pengguna='$id_pengguna'");
            if ($foto_lama == "profil_default.png"){ 
            } else {unlink("../../../dist/img/profil/".$foto_lama);}
            header("location:profil.php?id=".$id_pengguna."&alert=berhasil");
        
        } elseif ($edit == "editfotopage"){ 

            move_uploaded_file($tmp, '../../../dist/img/page/'.$id_pengguna.$nm_pengguna.'-'.date('d m Y').$namafile);
            $path = $id_pengguna.$nm_pengguna.'-'.date('d m Y').$namafile; 
            mysqli_query($koneksi,"UPDATE tb_pengguna set id_pengguna='$id_pengguna', foto_page='$path' where id_pengguna='$id_pengguna'");
            if ($foto_lama == "page_default.jpg"){
            }else { unlink("../../../dist/img/page/".$foto_lama);}
            header("location:profil.php?id=".$id_pengguna."&alert=berhasil");
        
        } 
 
	}else{
		header("location:index.php?alert=gagak_ukuran");
	}
}