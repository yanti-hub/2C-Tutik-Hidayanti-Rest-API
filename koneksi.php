<?php
    $servername = "localhost";
    $username   = "root";
    $password = "";
    $databasename = "toko_api";

    $koneksi = mysqli_connect($servername, $username, $password, $databasename);
    if (!$koneksi){
        die("Koneksi tidak berhasil");
    }
?>