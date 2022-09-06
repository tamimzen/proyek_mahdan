<?php

include('../../../koneksi.php');

//get id
$id = $_GET['id'];
$query = "DELETE FROM tb_topik WHERE id_topik = '$id'";
if ($koneksi->query($query)) {
    header("location: topik.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
    header("location: topik.php");
}