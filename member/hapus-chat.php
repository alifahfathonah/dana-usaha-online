<?php 
include'../connect.php';
session_start();

$query = mysqli_query($conn, "DELETE FROM chat WHERE id_chat = '".$_GET["id"]."'");
if($query){
  echo("<script> alert('Pesan telah di hapus'); window.location='isi-chat.php'</script>");
}

 ?>