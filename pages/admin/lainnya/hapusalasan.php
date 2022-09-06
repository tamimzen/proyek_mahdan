<?php

include('../../../koneksi.php');

//get id
$id = $_GET['id'];

 

$query = "DELETE FROM tb_admin WHERE id_admin = '$id'";

if ($koneksi->query($query)) {
    header("location: postingan.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}