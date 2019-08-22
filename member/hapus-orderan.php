<?php 
include'../connect.php';
session_start();

$query = mysqli_query($conn, "DELETE FROM pemesanan WHERE id_pemesanan = '".$_GET["id"]."'");
if($query){
  echo("<script> alert('Orderan telah di hapus'); window.location='orderan.php'</script>");
}

 ?>