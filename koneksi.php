<?php
// koneksi database
    $koneksi = mysqli_connect("localhost","root","","db_penggajian");

// cek koneksi database
    if (mysqli_connect_errno()) {
        echo "koneksi database gagal : " . mysqli_connect_error($koneksi);
    }
?>