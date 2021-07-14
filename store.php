<?php 
include 'config.php';

$nama_buku = $_POST['nama_buku'];
$kategori = $_POST['kategori'];
$penerbit = $_POST['penerbit'];
$harga = $_POST['harga'];
$diskon = $_POST['diskon'];

mysqli_query($koneksi, "insert into toko_buku values('', '$nama_buku', '$kategori', '$penerbit', '$harga', '$diskon')");

header("location:index.php");
