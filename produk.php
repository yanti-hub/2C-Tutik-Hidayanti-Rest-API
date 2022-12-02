<?php
include "method.php";
$produk = new produk();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            $produk->get_produk($id);
         }
         else
         {
            $produk->get_produks();
         }
         break;
   case 'POST':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            $produk->update_produk($id);
         }
         else
         {
            $produk->insert_produk();
         }     
         break; 
   case 'DELETE':
          $id=intval($_GET["id"]);
            $produk->delete_produk($id);
            break;
   default:
      // Invalid Request Method
         header("HTTP/1.0 405 Method Not Allowed");
         break;
      break;
}
 
?>