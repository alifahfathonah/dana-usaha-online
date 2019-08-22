<?php
session_start();
include'../connect.php';
$query = mysqli_query($conn, "SELECT * FROM produk a INNER JOIN user b on a.id_user=b.id_user WHERE id_produk = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($query);
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

   
      <section>
          <div class="container-fluid mt-3">
              <div class="row">
                <div class="col-sm-5 ml-auto mt-3">
                    <h5 class="text-center"><?=$row["judul_produk"] ?></h5>
                    <div class="col-md-5 mx-auto mt-3">
                        <img width="100%" class="img-thumbnail" src="uploads/<?php echo $row['foto_produk'];?>">
                    </div>
                    <div class="col-sm-12 mx-auto text-center">
                        <p>Rp. <?=$row["harga_produk"] ?>,-</p>
                    </div>  
                  </div>
                  <div class="col-sm-6 p-2 mr-auto">
                      <h3 class="text-center">Data Pemesanan</h3>


                      <form action="" method="POST" class="p-2">
                        <div class="form-group row">
                            <div class="col-sm-6 mt-3">
                              <label>Telepon/Handpone</label>
                              <input type="tel" name="no_hp_pembeli" class="form-control" placeholder="Nomor Aktif" required="">
                            </div>
                            <div class="col-sm-6">
                                <label class="mt-3">Jumlah Pesanan</label>
                                <input type="number" name="jumlah_pesanan" class="form-control" min="1" max="50" value="1">
                            </div>
                            <div class="col-sm-6">
                                <label class="mt-3">Lokasi</label>
                                <select name="lokasi_pembeli" class="form-control">
                                    <option disabled="" selected="">-- Pilih Lokasi --</option>
                                    <option value="Kampus A UNJ (Pusat)">Kampus A UNJ (Pusat)</option>
                                    <option value="Kampus B UNJ (FIO)">Kampus B UNJ (FIO)</option>
                                    <option value="Kampus D UNJ (Psikologi)">Kampus D UNJ (Psikologi)</option>
                                    <option value="Kampus E UNJ (PGSD)">Kampus E UNJ (PGSD)</option>
                                </select>
                            </div>
                            <div class="col-sm-12 mt-3">
                                <label>Alamat Lengkap</label>
                                <input type="text" name="alamat_pembeli" placeholder="Ex : Gd. G lantai 3" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mt-3">
                              <label>Keterangan</label>
                                <textarea name="keterangan_pembeli" class="form-control" placeholder="Masukan keterangan untuk penjual.." style="min-height: 100px;" required=""></textarea>
                            </div>
                            <div class="col-sm-12 mt-3 text-secondary" style="font-size: 14px">
                              <p>Mohon untuk di cek kembali data yang di isi sebelum melakukan order. Karena data yang di isi sangat penting untuk proses pemesanan produk.</p>
                            </div>
                            <!-- <div class="col-sm-12">
                                <input type="checkbox" aria-label="Checkbox for following text input"> Data sudah benar
                            </div> -->
                            <div class="col-sm-3 mt-3">
                                <button type="submit" name="order" class="btn btn-info form-control">Order</button>
                            </div>
                            <div class="col-sm-3 mt-3">
                                <button type="reset" name="order" class="btn btn-info form-control">Batal</button>
                            </div>
                        </div>
                      </form>

                      <?php 
                          if(isset($_POST["order"])){
                            $query = mysqli_query($conn, "INSERT INTO pemesanan(id_penjual, id_pembeli, id_produk, no_hp_pembeli, jumlah_pesanan, lokasi_pembeli, alamat_pembeli, keterangan_pembeli, waktu_order) VALUES(
                              '".$row["id_user"]."',
                              '".$_SESSION["id_user"]."',
                              '".$_GET["id"]."',
                              '".$_POST["no_hp_pembeli"]."',
                              '".$_POST["jumlah_pesanan"]."',
                              '".$_POST["lokasi_pembeli"]."',
                              '".$_POST["alamat_pembeli"]."',
                              '".$_POST["keterangan_pembeli"]."',
                              NULL
                            )");
                            if($query){
                              echo "<script>alert('Terimakasih sudah memesan, pesanan anda sedang di proses..'); window.location ='keranjang.php';</script>";
                            }else{
                              echo "<script>alert 'Gagal Memesan';</script>";
                            }
                          }else{
                          }

                       ?>


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
