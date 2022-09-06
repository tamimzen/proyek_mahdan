<?php

include('../../../koneksi.php');

$nm_topik = $_POST['nm_topik']; 
  
// menginput data ke database
 mysqli_query($koneksi,"INSERT into tb_topik values('','$nm_topik')");


 header("location:topik.php");
?>