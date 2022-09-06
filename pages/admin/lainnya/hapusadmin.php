<?php

include('../../../koneksi.php');

//get id
$id = $_GET['id']; 
$query = "DELETE FROM tb_admin WHERE id_admin = '$id'"; 
if ($koneksi->query($query)) {
    header("location: admin.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
    header("location: admin.php");
}