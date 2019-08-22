<?php
session_start();
include'connect.php';
$produk = mysqli_query($conn, "SELECT * FROM produk a INNER JOIN user b on a.id_user=b.id_user");
?>
<?php
     if (isset($_POST['login'])) {
         include 'connect.php';
         $cek = mysqli_query($conn, "SELECT * FROM user WHERE email = '".$_POST['email']."' AND 
            password = '".$_POST['password']."'");
         $row = mysqli_fetch_array($cek);
         $level = $row["level"];
         $count = mysqli_num_rows($cek);
         echo $count;
         if($count > 0){
            session_start();
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['no_hp'] = $row ['no_hp'];
            $_SESSION['fakultas'] = $row['fakultas'];
            $_SESSION['email'] = $row['email'];
            if($level == "admin"){
              echo "<script>alert('Berhasil Login'); window.location ='admin/index.php'; </script>";
            }else if($level == "user"){
              echo "<script>alert('Berhasil Login'); window.location ='member/index.php'; </script>";
            }
         }else{
            echo "<script>alert('Gagal Login'); window.location ='index.php';</script>";
         }
      }
  ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/title.png">
    <title>DAUN</title>

    <!-- Bootstrap core CSS --> 
     <link href="css/business-casual.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <!-- Custom fonts for this template -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css"> -->

    <!-- Custom styles for this template -->

  </head>

  <body>
 
    <div class="bg-info d-none d-lg-block">
      <div class="row">
          <div class="col-md-12 mx-auto">
            <img class="p-3" style="display: block; margin-right: auto; margin-left: auto;" src="img/logo1.png" width="13%">
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
              <!-- Button trigger modal -->
              <a class="nav-link text-uppercase text-expanded" data-toggle="modal" data-target="#exampleModal" href="">Login</a>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content p-4">
                      <div class="modal-header">
                        <h5 class="modal-title text-uppercase text-expanded text-center" id="exampleModalLabel"><b>Login</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="" method="POST">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Alamat Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan alamat email" required="">
                            <small id="emailHelp" class="form-text text-muted">Kami tidak akan memberitahukan email anda ke siapapun.</small>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Kata Sandi</label>
                            <input type="password" name="password" class="form-control" id="fieldpass" placeholder="Masukkan Kata Sandi" required="">
                          </div>
                          <div class="form-group">
                            <input type="checkbox" id="showPass" > Tampilkan Kata Sandi<br>
                          </div>
                          <button type="submit" name="login" value="login" class="btn btn-primary">LOGIN</button>
                          <div class="row">
                            <div class="col-sm-12 mt-3">
                              <p>Belum punya akun? Silahkan klik <a href="daftar.php">Daftar</a>.</p>
                            </div>
                          </div>
                        </form>
                      
                      </div>
                    </div>
                  </div>
                </div>
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
           <div class="container-fluid p-3">
              <div class="row">
                  <div class="col-sm-4">
                      <img width="100%" class="img-thumbnail" src="member/uploads/<?php echo $row['foto_produk'];?>">
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
                  <div class="col-sm-3 mx-auto">
                      <div class="p-2 bg-warning text-white">
                        <h3>Rp. <?=$row['harga_produk']?>,-</h3>
                      </div>
                      <div class="bg-abu p-3 bg-white">
                        <label>Penjual :</label>
                        <h4><?=$row['nama']; ?></h4>
                      </div>
                      <div class="p-3 bg-white">
                        <label>Nomor yang bisa dihubungi :</label>
                        <h5><?=$row['no_telp_produk'] ?></h5>
                      </div>
                      <div class="bg-white">
                        <form method="POST" action="">
                            <button name="pesan" class="btn btn-info" style="width: 100%;">
                          <img src="img/icon/keranjang.png" width="20px">
                           Pesan Sekarang</button>
                        </form>
                          
                      </div>
                      <?php 
                          if(isset($_POST["pesan"])){
                            echo "<script>alert('Anda harus login dulu sebelum memesan');</script>";
                          }else{

                          }
                       ?>
                      
                    </div>
                    
                    
                  </div>
              </div>
           <?php } ?>
      </section>  
  
      

    <footer class="bg-dark text-white text-center py-4 mt-3">
      <div class="container">
        <p class="m-0">Copyright &copy; DAUN 2017</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/bootstrap/js/script.js"></script>

  </body>

</html>
