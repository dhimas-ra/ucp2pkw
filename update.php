<?php

include 'config.php';

$id = $_POST['id'];
$nama_buku = $_POST['nama_buku'];
$kategori = $_POST['kategori'];
$penerbit = $_POST['penerbit'];
$harga = $_POST['harga'];
$diskon = $_POST['diskon'];

mysqli_query($koneksi, "update toko_buku set nama_buku='$nama_buku', kategori='$kategori', penerbit='$penerbit', harga='$harga', diskon='$diskon' where id='$id'");

header("location:index.php");