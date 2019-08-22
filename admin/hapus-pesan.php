<?php 
session_start();
include'../connect.php';
$query=mysqli_query($conn, "DELETE FROM form_kontak WHERE id_pesan = '".$_GET["id"]."'");
if ($query) {
   echo("<script> alert('Pesan berhasil dihapus'); window.location='kotak-masuk.php' </script>");
}
 ?>