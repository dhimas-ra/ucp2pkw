<?php

$koneksi = mysqli_connect("localhost", "ucp", "", "toko_buku");

if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}