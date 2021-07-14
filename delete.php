<?php
    include 'config.php';

    $id = $_GET['id'];


    mysqli_query($koneksi, "delete from toko_buku where id='$id'");

    header("location:index.php");