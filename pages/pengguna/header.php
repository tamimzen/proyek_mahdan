<?php include '../../../koneksi.php';
if (!session_status() === PHP_SESSION_NONE) {
    session_start();
} else {
    session_start();
    $pengguna=array();
    if(!empty($_SESSION['id_pengguna'])){
        $tampilpengguna= mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna='$_SESSION[id_pengguna]'");
        $pengguna    = mysqli_fetch_array($tampilpengguna);
    }
     
}
 

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MOCO</title>
    <link rel="icon" href="../../../dist/img/logo/mini-moco.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css" />
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="../../../plugins/ekko-lightbox/ekko-lightbox.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../../plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/adminlte.min.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="../../../plugins/summernote/summernote-bs4.min.css">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="../../../plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="../../../plugins/codemirror/theme/monokai.css">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="../../../plugins/simplemde/simplemde.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="../../../plugins/summernote/summernote-bs4.min.css" />
    <link rel="stylesheet" href="../../../dist/css/style.css" />
    <script src="../../../dist/js/script.js" type="text/javascript"></script>

    <script src="../../../dist/ckeditor/ckeditor.js"></script>
</head>