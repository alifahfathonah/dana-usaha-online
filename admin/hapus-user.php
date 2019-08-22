<?php 
session_start();
include'../connect.php';
$query=mysqli_query($conn, "DELETE FROM user WHERE id_user = '".$_GET["id"]."'");
if ($query) {
   echo("<script> alert('User berhasil dihapus'); window.location='index.php' </script>");
}
 ?>