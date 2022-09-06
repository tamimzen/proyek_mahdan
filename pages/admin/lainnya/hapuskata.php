<?php

include('../../../koneksi.php');

//get id
$id = $_GET['id']; 
$query = "DELETE FROM tb_kata WHERE id_kata = '$id'"; 
if ($koneksi->query($query)) {
    header("location: kata.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}