<?php
session_start();
include'../connect.php';
$produk = mysqli_query($conn, "SELECT * FROM produk a INNER JOIN user b on a.id_user=b.id_user");
$row = mysqli_fetch_assoc($produk);
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../img/title.png">
    <title>DAUN</title>

    <!-- Bootstrap core CSS --> 
    <link href="../css/business-casual.css" rel="stylesheet">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
    <!-- Custom fonts for this template -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css"> -->

    <!-- Custom styles for this template -->

  </head>

  <body class="bg-white">
    <div class="bg-info d-none d-lg-block">
      <div class="row">
          <div class="col-md-12 mx-auto">
            <img class="p-3" style="display: block; margin-right: auto; margin-left: auto;" src="../img/logo1.png" width="13%">
          </div>
      </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white" style="border-bottom: 2px solid #eee;">
      <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">DAUN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded page-scroll" href="index.php">Beranda
                <span class="sr-only">(current)</span>
              </a>
            </li>
              <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded page-scroll" href="tentang.php">Tentang</a>
              </li>
              <li class="nav-item px-lg-4">
              <?php 
                  $notif = mysqli_query($conn, "SELECT * FROM pemesanan a INNER JOIN user b on a.id_penjual=b.id_user WHERE id_penjual = '".$_SESSION["id_user"]."'"); 
                  $jum = mysqli_num_rows($notif);
               ?>
              <a class="nav-link text-uppercase text-expanded page-scroll" href="orderan.php">Orderan(<?=$jum ?>)</a>
            </li>
            <li class="nav-item px-lg-4">
              <div class="dropdown">
                <div class="nav-link dropdown-toggle text-expanded text-uppercase" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <b><?php echo $_SESSION['nama']; ?></b>
                </div>
                <?php 
                  $notiff = mysqli_query($conn, "SELECT * FROM chat WHERE id_penerima='".$_SESSION["id_user"]."' "); 
                  $jum2 = mysqli_num_rows($notiff);
               ?>
                <div class="dropdown-menu " aria-labelledby="dropdownMenu2">
                  <a class="dropdown-item" href="update-member.php">Update Profil</a>
                  <a class="dropdown-item" href="iklan-member.php?id=<?=$row['id_produk'];?>">Iklan</a>
                  <a class="dropdown-item" href="isi-chat.php?id=<?=$_SESSION["id_user"] ?>">Kotak Masuk(<?=$jum2 ?>)</a>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
              </div>
            </li>
            <li class="nav-item px-lg-4">
              <?php 
                  $notif1 = mysqli_query($conn, "SELECT * FROM pemesanan a INNER JOIN user b on a.id_penjual=b.id_user WHERE id_pembeli = '".$_SESSION["id_user"]."'"); 
                  $jum3 = mysqli_num_rows($notif1);
               ?>
                <a class="nav-link text-uppercase text-expanded" href="keranjang.php?id=<?=$_SESSION["id_user"] ?>" data-toggle="tooltip" data-placement="bottom" title="Keranjang"><img src="../img/icon/keranjang1.png" width="20px">(<?=$jum3 ?>)</a>
            </li>
              <li class="nav-item px-lg-4 iklan">
                <a class=" nav-link text-uppercase text-expanded page-scroll" href="jualan.php" style="border: 1px solid #17a2b8; color: #17a2b8; "><b>+</b>Pasang Iklan</a>
              </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <?php 
      $query=mysqli_query($conn, "SELECT * FROM user a INNER JOIN produk b on a.id_user=b.id_user INNER JOIN pemesanan c on b.id_produk =c.id_produk WHERE id_pembeli='".$_SESSION["id_user"]."' ORDER BY id_pemesanan DESC");
     ?>

  <section class="mt-3">
    <div class="container-fluid">
      <hr class="divider">
      <h4 class="text-center">Keranjang</h4>
      <hr class="divider">
        <div class="row mt-3">
          <?php 
              while ($row=mysqli_fetch_assoc($query)) {
               
           ?>
          <div class="col-sm-3 mt-3 p-3">
              <div class="card"">
                <img class="card-img-top" src="uploads/<?=$row["foto_produk"] ?>" alt="Card image cap" style="width: 100%; height: 200px">
                <div class="card-body">
                  <div class="col-md-12 text-secondary">
                      <p><b><?=$row["judul_produk"] ?></b></p>
                      <p>Rp. <?=$row["harga_produk"] ?>,-</p>
                      <p>Jumlah pembelian : <?=$row["jumlah_pesanan"] ?></p>
                      <p>Total Bayar : Rp. <?=$row["harga_produk"] * $row["jumlah_pesanan"] ?>,-</p>
                      <p><img src="../img/jam.png" width="15px" class="mb-1"> <?=$row["waktu_order"] ?></p>
                      
                          <a href="" class="text-center">
                            <button class="btn btn-info">Pembelian sudah diterima</button>
                          </a>
                      
                  </div>
                </div>
              </div>
          </div>
            <?php } ?>
        </div>
    </div>
  </section>
    
    <footer class="bg-dark text-white text-center py-4 mt-3">
      <div class="container">
        <p class="m-0">Copyright &copy; DAUN 2017</p>
      </div>
    </footer>

   <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
