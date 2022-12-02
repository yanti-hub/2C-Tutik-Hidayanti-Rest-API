<?php
    include "koneksi.php";

    // mendapatkan variabel post
    $kode_produk = isset ($_POST["kode"]) ? $_POST["kode"] : "";
    // echo $kode_produk;
    $nama_produk = isset ($_POST["nama"]) ? $_POST["nama"] : "";
    // echo $nama_produk;
    $harga = isset ($_POST["harga"]) ? $_POST["harga"] : "";
    // echo $harga;


    // query menambakn data
    $sql= "INSERT INTO `produk` (`kode_produk`, `nama_produk`, `harga`) 
    VALUES ('".$kode_produk."', '".$nama_produk."', '".$harga."');";
    //echo $sql;

    // runing key
    $query =mysqli_query($koneksi, $sql);
    if($query){
        $msg = "Simpan data berhasil";
    }else{
        $msg = "Simpan data gagal";
    }

    // echo $msg;

    $response = array(
         'status'=> 'OK',
         'msg'=> $msg
     );
    echo json_encode($response);
?>