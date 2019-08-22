<?php
session_start();
include'../connect.php';
$produk = mysqli_query($conn, "SELECT * FROM produk a INNER JOIN user b on a.id_user=b.id_user");
$row = mysqli_fetch_assoc($produk)
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
    <!-- Custom fonts for this template -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css"> -->
    <!-- Custom styles for this template -->

  </head>

  <body>
 
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
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded page-scroll" href="index.php">Beranda
                <span class="sr-only">(current)</span>
              </a>
            </li>
              <li class="nav-item px-lg-4">
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

   
      <section class="mt-3 bg-abu">
          <?php 
              $query = mysqli_query($conn, "SELECT * FROM user a INNER JOIN produk b on a.id_user = b.id_user WHERE b.id_produk = '".$_REQUEST['id']."'");
              while($row = mysqli_fetch_assoc($query))
                {
           ?>
           <div class="container-fluid p-3 bg-abu">
              <div class="row bg-abu">
                  <div class="col-sm-4">
                      <img width="100%" class="img-thumbnail" src="uploads/<?php echo $row['foto_produk'];?>">
                  </div>
                  <div class="col-sm-5 p-3 mx-auto bg-white">
                      <h2><?=$row['judul_produk']; ?></h2>
                      <p class="text-secondary font-italic">Di posting pada : <?=$row["tanggal_upload"] ?></p>
                      <hr>
                       <h6><span class="text-secondary">Kategori :</span> <?= $row['kategori_produk']; ?></h6>
                       <h6><span class="text-secondary">Stok Produk :</span><?=$row['stok_produk']; ?></h6>
                       <h6><span class="text-secondary">Lokasi :</span> <?= $row['lokasi_produk']; ?></h6>
                       <h6><span class="text-secondary">Deskripsi :</span></h6>
                       <p><?=$row['deskripsi_produk']; ?></p>

                       

                  </div>
                  <div class="col-sm-3 mx-auto ">
	                  	<div class="p-2 bg-warning text-white">
	                  		<h3>Rp. <?=$row['harga_produk']?>,-</h3>
	                  	</div>
                  		<div class="bg-white p-3">
                  			<label>Penjual :</label>
                    		<h4><?=$row['nama']; ?></h4>
                  		</div>
                  		<div class="p-3 bg-white">
                  			<label>Nomor yang bisa dihubungi :</label>
                    		<h5><?=$row['no_telp_produk'] ?></h5>
                  		</div>
                  		<div class="bg-white">
                          <a href="order.php?id=<?=$row["id_produk"] ?>"><button class="btn btn-info" style="width: 100%;">
                          <img src="../img/icon/keranjang.png" width="20px">
                           Pesan Sekarang</button></a>
                  		</div>
                  	</div>
                  	
                    
                  </div>
              </div>
           <?php } ?>
      </section>  
  
      

    <footer class="bg-dark text-white text-center py-4 ">
      <div class="container">
        <p class="m-0">Copyright &copy; DAUN 2017</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->


    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  </body>

</html>
