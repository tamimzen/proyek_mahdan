<?php

include('../../../koneksi.php');  

$edit = $_POST['edit'];
$id_pengguna = $_POST['id_pengguna'];
$pathfile = $_POST['pathfile'];

if($edit == "editprofil"){ 
     
    $deskripsi = $_POST['deskripsi'];
    $pekerjaan = $_POST['pekerjaan'];
    $pendidikan = $_POST['pendidikan']; 
    $lokasi = $_POST['lokasi']; 

} elseif ($edit == "editnama"){

    $nm_pengguna = $_POST['nm_pengguna'];  

} elseif ($edit == "editkredensial"){

    $kredensial = $_POST['kredensial']; 
    
}
 
 
if (isset($id_pengguna)) {

    if ($edit == "editprofil") {
        mysqli_query($koneksi,"UPDATE tb_pengguna set id_pengguna='$id_pengguna',deskripsi='$deskripsi',pekerjaan='$pekerjaan', pendidikan='$pendidikan', lokasi='$lokasi' where id_pengguna ='$id_pengguna'"); 
        header("location:profil.php?id=".$id_pengguna);

}   elseif ($edit == "editkredensial") {
        mysqli_query($koneksi,"UPDATE tb_pengguna set id_pengguna='$id_pengguna',kredensial='$kredensial' where id_pengguna ='$id_pengguna'"); 
        header("location:profil.php?id=".$id_pengguna);

}    elseif ($edit == "editnama") { 
        mysqli_query($koneksi,"UPDATE tb_pengguna set id_pengguna='$id_pengguna',nm_pengguna='$nm_pengguna' where id_pengguna ='$id_pengguna'"); 
        header("location:profil.php?id=".$id_pengguna); 

}  
} else {
    echo "gak ada id pengguna";
    header("location:profil.php?id=".$id_pengguna."&alert= Pengguna tidak ditemukan.");
}


?>