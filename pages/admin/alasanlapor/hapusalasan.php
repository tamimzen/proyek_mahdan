<?php

include('../../../koneksi.php');

//get id
$id = $_GET['id'];
$query = "DELETE FROM tb_alasanlapor WHERE id_alasanlapor = '$id'";
if ($koneksi->query($query)) {
    header("location: postingan.php");
} else {
    echo "DATA GAGAL DIHAPUS!"; 
    header("location: postingan.php");
}