<?php

include('../../../koneksi.php');

$nm_kata = $_POST['nm_kata']; 
 
echo $nm_kata;
// menginput data ke database
 mysqli_query($koneksi,"INSERT into tb_kata values('','$nm_kata')");


 header("location:kata.php");
?>