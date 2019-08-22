<?php
session_start();
include'../connect.php';

$sql = mysqli_query($conn, "SELECT * FROM produk where id_produk = '".$_GET["id"]."'");
$row = mysqli_fetch_array($sql);
unlink('../member/uploads/'.$row["foto_produk"]);
$result = mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '".$_GET["id"]."'");
if($result){
  echo("<script> alert('Berhasil dihapus'); window.location='index.php' </script>");
}
?>
