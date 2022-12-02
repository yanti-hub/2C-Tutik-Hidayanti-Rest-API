<?php
    include "koneksi.php";

    // echo "update_produk";

    // menangkap variabel
    $id = $_GET['id'];
    // echo $id;

    // ingin dirubah
    $nama_produk =$_POST['nama'];
    $kode_produk =$_POST['kode'];
    $harga =$_POST['harga'];

    $sql = "UPDATE `produk` SET 
    `kode` = '".$kode_produk."', 
    `nama` = '".$nama_produk."', 
    `harga` = '".$harga."' 
    WHERE `produk`.`id` = ".$id.";";
    // echo $sql;

     // runing key
     $query =mysqli_query($koneksi, $sql);
     if($query){
         $msg = "Update data berhasil";
     }else{
         $msg = "Update data gagal";
     }

     $response = array(
        'status'=> 'OK',
        'msg'=> $msg
    );
   echo json_encode($response);
?>