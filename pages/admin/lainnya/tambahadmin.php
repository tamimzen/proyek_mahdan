<?php

include('../../../koneksi.php');

$nm_admin = $_POST['nm_admin']; 
$email = $_POST['email']; 
$password = md5($_POST['password']); 
 
// echo $nm_admin;
// menginput data ke database
 mysqli_query($koneksi,"INSERT into tb_admin values('','$nm_admin','$email','$password')"); 


 header("location:admin.php");
?>