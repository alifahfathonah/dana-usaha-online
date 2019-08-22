<?php

include('../../connect.php');
session_start();
if(!isset($_SESSION)) 
  session_start();
$query = mysqli_query($conn, "UPDATE user SET 
            nama = '".$_POST["nama"]."',
            no_hp = '".$_POST["no_hp"]."',
            fakultas = '".$_POST["fakultas"]."',
            email = '".$_POST["email"]."',
            password = '".$_POST["password"]."'
            WHERE id_user = ".$_SESSION["id_user"]."
          ");
    header('location : index.php');
?>