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
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
    <!-- Custom fonts for this template -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css"> -->

    <!-- Custom styles for this template -->
    <link href="../css/business-casual.css" rel="stylesheet">

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

    <section class="bg-white p-2">
        <div class="container-fluid">
              <div class="row">
                <div class="col-sm-7 mx-auto ">
                  <hr class="divider">
                 <h2 class="text-center"><strong>Form Jualan</strong></h2>
                 <hr class="divider">
                 <form class="mt-4" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="judul_barang" class="col-md-3 ml-auto p-1">Judul</label>
                        <div class="col-md-6 mr-auto">
                            <input type="text" name="judul_produk" class="form-control" placeholder="Judul yang unik" required="">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="kategori" class="col-md-3 ml-auto p-1">Kategori</label>
                        <div class="col-md-6 mr-auto">
                            <select name="kategori_produk" class="form-control" required="">
                                <option selected="" disabled="">-- Pilih Kategori --</option>
                                <option value="Makanan">Makanan</option>
                                <option value="Minuman">Minuman</option>
                                <option value="Jasa">Jasa</option>
                                <option value="Fashion Pria">Fashion Pria</option>
                                <option value="Fashion Wanita">Fashion Wanita</option>
                                <option value="Teknologi">Teknologi</option>
                                <option value="Buku">Buku</option>
                                <option value="Pulsa">Pulsa</option>
                                <option value="Olahraga">Olahraga</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                      <label for="stok_produk" class="col-md-3 ml-auto p-1">Stok</label>
                        <div class="col-md-6 mr-auto">
                          <div class="form-check">
                            <input type="radio"  name="stok_produk" value="Tersedia" checked=""> Tersedia
                          </div>
                          <div class="form-check">
                              <input type="radio"  name="stok_produk" value="Habis"> Habis
                          </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="harga" class="col-md-3 ml-auto p-1">Harga Satuan (Rp.)</label>
                        <div class="col-md-6 mr-auto">
                          <input type="text" name="harga_produk" placeholder="(contoh : 3000)" class="form-control" required="">
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label for="lokasi" class="col-md-3 ml-auto p-1">Lokasi</label>
                        <div class="col-md-6 mr-auto" >
                             <select name="lokasi_produk" class="form-control" required="">
                                  <option selected="" disabled="">-- Pilih Lokasi --</option>
                                  <option value="Kampus A UNJ (Pusat)">Kampus A UNJ (Pusat)</option>
                                  <option value="Kampus B UNJ (FIO)">Kampus B UNJ (FIO)</option>
                                  <option value="Kampus D UNJ (Psikologi)">Kampus D UNJ (Psikologi)</option>
                                  <option value="Kampus E UNJ (PGSD)">Kampus E UNJ (PGSD)</option>
                              </select>
                        </div>
                       
                    </div>
                    <div class="form-group row">
                        <label for="no_telp" class="col-md-3 ml-auto p-1">Nomor Telepon</label>
                        <div class="col-md-6 mr-auto">
                          <input type="tel" name="no_telp_produk" class="form-control" placeholder="Nomor telepon yang bisa dihubungi" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-md-3 ml-auto p-1">Deskripsi</label>
                        <div class="col-md-6 mr-auto">
                          <textarea class="form-control" name="deskripsi_produk" placeholder="Buat Deskripsi semenarik mungkin.." required="" style="min-height: 120px; white-space: pre-line;"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto" class="col-md-3 ml-auto p-1">Foto (Maks.2MB)</label>
                        <div class="col-md-6 mr-auto">
                             <label class="custom-file">
                              <input type="file" id="inputGroupFile03" class="custom-file-input" required name="foto_produk">
                              <span class="custom-file-control"></span>
                            </label>
                       </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-9 mx-auto p-1">
                            <button type="submit" name="kirim" class="btn btn-primary form-control">Kirim</button>
                        </div>
                    </div>
                 </form>
                 <?php
                      if (isset($_POST['kirim'])) {

                          $folder = './uploads/';
                          $nama_foto = $_FILES['foto_produk']['name'];
                          $rename = date ('Hs').$nama_foto;
                          $sumber_foto = $_FILES['foto_produk']['tmp_name'];
                          move_uploaded_file($sumber_foto, $folder.$rename);

                      $insert = mysqli_query( $conn, "INSERT INTO produk(id_user, judul_produk, kategori_produk, stok_produk, harga_produk, lokasi_produk, no_telp_produk, deskripsi_produk, foto_produk, tanggal_upload) VALUES(
                        '".$_SESSION['id_user']."',
                        '".$_POST['judul_produk']."',
                        '".$_POST['kategori_produk']."',
                        '".$_POST['stok_produk']."',
                        '".$_POST['harga_produk']."',
                        '".$_POST['lokasi_produk']."',
                        '".$_POST['no_telp_produk']."',
                        '".$_POST['deskripsi_produk']."',
                        '".$rename."', NULL)");
                      if($insert){
                        echo "<script>alert('Iklan telah diposting'); window.location ='index.php'; </script>";
                      }else{
                        echo "<script>alert('Iklan gagal diposting'); window.location ='jualan.php'; </script>";
                      }
                    }
                 ?>
                 </div>
               </div>
            </div>
    </section>
            
        

    <footer class="bg-dark text-white text-center py-4">
      <div class="container">
        <p class="m-0">Copyright &copy; DAUN 2017</p>
      </div>
    </footer>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/bootstrap/js/script.js"></script>

  </body>

</html>
