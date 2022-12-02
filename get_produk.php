<?php
    
    include "koneksi.php";

    // membat query sql untuk mengambil seluruh data produk
    $sql = "SELECT * FROM produk";
    $query = mysqli_query ($koneksi, $sql);
    while($data = mysqli_fetch_array($query)){
        // echo $data ["nama_produk"]. " ";
        
        $item[] = array(
            'id' =>$data["id"],
            'kode' =>$data["kode_produk"],
            'nama' =>$data["nama_produk"],
            'harga' =>$data["harga"]
        );
    }

    $response = array(
        'status'=> 'OK',
        'msg'=> $item
    );
   echo json_encode($response);

?>