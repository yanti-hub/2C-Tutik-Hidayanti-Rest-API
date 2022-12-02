<?php
include "conn.php";
class produk 
{
 
   public  function get_produks()
   {
      global $mysqli;
      $query="SELECT * FROM produk";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'List data produk.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 
   public function get_produk($id=0)
   {
      global $mysqli;
      $query="SELECT * FROM produk";
      if($id != 0)
      {
         $query.=" WHERE id=".$id." LIMIT 1";
      }
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Data Produk.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
        
   }
 
   public function insert_produk()
      {
         global $mysqli;
         $arrcheckpost = array('kode_produk' => '', 'nama_produk' => '', 'harga'   => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
               $result = mysqli_query($mysqli, "INSERT INTO produk SET
               kode_produk = '$_POST[kode_produk]',
               nama_produk = '$_POST[nama_produk]',
               harga = '$_POST[harga]'");
                
               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'Produk Berhasil ditambahkan.'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'Produk Gagal ditambahkan.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter tidak sesuai'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function update_produk($id)
      {
         global $mysqli;
         $arrcheckpost = array('kode_produk' => '', 'nama_produk' => '', 'harga'   => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
              $result = mysqli_query($mysqli, "UPDATE produk SET
              kode_produk = '$_POST[kode_produk]',
              nama_produk = '$_POST[nama_produk]',
              harga = '$_POST[harga]'
              WHERE id='$id'");
          
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Produk berhasil diupdate.'
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Produk gagal diupdate.'
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter tidak sesuai'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function delete_produk($id)
   {
      global $mysqli;
      $query="DELETE FROM produk WHERE id=".$id;
      if(mysqli_query($mysqli, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Produk berhasil di hapus.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Produk gagal di hapus.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
}
 
 ?>