<?php
require_once './config.php';

$nama_buku = $_POST['nama_buku'];
$kategori = $_POST['kategori'];
$penerbit = $_POST['penerbit'];
$harga = $_POST['harga'];
$diskon = $_POST['diskon'];


$result = $koneksi->
    query("INSERT INTO toko_buku VALUES(0,'$nama_buku', '$kategori', '$penerbit', '$harga', '$diskon')");
    if($result){
        header("location:./index.php");
    }else {
        echo $koneksi->error; 
    }
?>