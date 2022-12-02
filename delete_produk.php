<?php
    include "koneksi.php";

    // mendapatkan variabel post
    $id = isset ($_POST["id"]) ? $_POST["id"] : "";
    // echo $id;
    $kode_produk = isset ($_POST["kode"]) ? $_POST["kode"] : "";
    // echo $kode_produk;
    $nama_produk = isset ($_POST["nama"]) ? $_POST["nama"] : "";
    // echo $nama_produk;
    $harga = isset ($_POST["harga"]) ? $_POST["harga"] : "";
    // echo $harga;


    // query menambakn data
    $sql= "DELETE FROM `produk` ('id', `kode_produk`, `nama_produk`, `harga`) 
    WHERE 'id'= ".$id."';";
    //echo $sql;

    // runing key
    $query =mysqli_query($koneksi, $sql);
    if($query){
        $msg = "Hapus data berhasil";
    }else{
        $msg = "Hapus data gagal";
    }

    // echo $msg;

    $response = array(
         'status'=> 'OK',
         'msg'=> $msg
     );
    echo json_encode($response);
?>