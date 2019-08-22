<?php
session_start();
error_reporting(0);
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
                  <a class="dropdown-item" href="isi-chat.php">Kotak Masuk(<?=$jum2 ?>)</a>
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

    <section class="bg-abu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mx-auto mt-3">
                    <form class="form-group" action="" method="POST">
                      <div class="row">
                          <div class="col-sm-8 ml-auto p-1">
                            <input type="text" name="keyword" class="form-control float-left" autocomplete="off" autofocus="" placeholder="Pencarian">
                          </div>
                          <div class="col-sm-2 mx-auto p-1">
                            <button type="submit" name="cari" class="btn btn-info">Cari</button>
                          </div>
                      </div>   
                    </form>
                </div>
            </div>
        </div>
    </section>


      <section class="danusan bg-white p-4">
        <div class="container-fluid">
            <div class="" id="danusan"><!-- 
              <hr class="divider">
              <h2 class="text-center text-lg text-uppercase my-0">
                <strong>Danusan</strong>
              </h2>
              <hr class="divider"> -->
            <div class="row">
              <?php
                  $keyword  = $_POST["keyword"];
                  if($keyword !=''){
                      $produk = mysqli_query($conn, "SELECT * FROM produk a INNER JOIN user b on a.id_user=b.id_user WHERE 
                        judul_produk LIKE '%".$keyword."%' OR
                        kategori_produk LIKE '%".$keyword."%' OR
                        lokasi_produk LIKE '%".$keyword."%' OR
                        harga_produk LIKE '%".$keyword."%' OR
                        stok_produk LIKE '%".$keyword."%' OR
                        nama LIKE '%".$keyword."%' OR
                        deskripsi_produk LIKE '%".$keyword."%' 
                        ");
                  }else{
                      $maksRow = 12; //maksimal data yang masuk
                      $offset = 0; //nentuin mau data ke berapa
                      $page = 1;  //posisi halaman lagi ada dimana
                      $count = 0;
                      if (isset($_GET['page'])) {
                          $page = $_GET['page'];
                          $offset = $maksRow * ($page - 1);
                      }
                      $produk = mysqli_query($conn, "SELECT * FROM produk a INNER JOIN user b on a.id_user=b.id_user ORDER BY id_produk DESC LIMIT $offset, $maksRow");
                  }
                    if(mysqli_num_rows($produk)){
                    while($hasil = mysqli_fetch_array($produk)){
                    $count++;
              ?>
                <div class="danus col-md-2 mt-3 ">
                  <div class="card"  style="height: 100%;" >
                    <a href="detail-produk.php?id=<?= $hasil['id_produk']?>">
                      <img class="card-img-top img-thumbnail" src="uploads/<?=$hasil['foto_produk'];?>" alt="Card image cap" style="width: 100%; height: 150px;">
                    </a>
                    
                    <div class="container-fluid">
                      <div class="row" style="border-bottom: 1px dotted #a4a3a3;">
                          <div class="col-md-12 mt-2 detail-produk">
                              <h5><a href="detail-produk.php?id=<?= $hasil['id_produk'];?>"><?php echo $hasil['judul_produk'];?></a> </h5>
                          </div>
                          <div class="col-md-12">
                            <p> <span class="text-danger">Rp. <?php echo $hasil['harga_produk'];?> ,-</span><br>
                            Stok : <span style="color: #77cc6d;"><b><?php echo $hasil['stok_produk']; ?></b></span></p>
                          </div>
                      </div>
                    </div>
                      <div class="container-fluid mt-2">
                          <div class="row text-secondary">
                              <div class="ml-2">
                                  <img src="../img/place.png" style="width: 18px; float: left;" class="mt-1">
                                   <p class="float-left ml-1"  style="font-size: 80%">
                                      <?php echo $hasil['lokasi_produk'];?>
                                   </p>
                              </div>
                              <div class="ml-2">
                                  <img src="../img/jam.png" style="width: 15px; float: left; margin-left: 2px;" class="mt-1"> 
                                  <p class="float-left ml-2" style="font-size: 80%">
                                    <?php echo $hasil["tanggal_upload"];?>
                                  </p>
                              </div>
                                  
                          </div>
                      </div>
                      
                  </div>
                </div> 
                <?php }}else{
                  echo "<h2>Data tidak ditemukan</h2>";
                } ?>

            </div>
            <div class="row text-center mt-3">
              <div class="col-sm-12">
                
                 <?php  
                     if ($page > 1){
                            $prevPage = $page -1;
                        ?>
                            <a class="text-white" href="<?php echo "index.php?page=$prevPage"?>"><button class="btn btn-primary">Prev</button></a>
                        <?php
                        }
                        if ($count == $maksRow){
                            $nextPage = $page + 1;
                        ?>
                        <a class="text-white" href="<?php echo "index.php?page=$nextPage"?>"><button class="btn btn-primary">Next</button> </a>                       
                             <?php
                            }
                        ?>
              </div>
            </div>
            </div>
        </div>
  </section>  
    <footer class="bg-dark text-white text-center py-4 mt-3">
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
