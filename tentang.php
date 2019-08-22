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
    <link rel="stylesheet" type="text/css" href="css/business-casual.css">
    <!-- Bootstrap core CSS --> 
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <!-- Custom fonts for this template -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css"> -->

    <!-- Custom styles for this template -->

  </head>

  <body class="bg-white">
  <div class="">
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
            <li class="nav-item  px-lg-4">
              <a class="nav-link text-uppercase text-expanded page-scroll" href="index.php">Beranda
                <span class="sr-only">(current)</span>
              </a>
            </li>
              <li class="nav-item px-lg-4 active">
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
  </div>
    


  <section class="tentang">
      <div class="container-fluid mt-2 bg-white">
          <div class="row bg-white">
              <div class="col-sm-12">
                <img src="img/apa1.png" class="img-thumbnail">
              </div>
          </div>
              <hr class="divider">
                  <h2 class="text-center"><strong>TENTANG DAUN</strong></h2>
              <hr class="divider">
              <div class="row mt-3 p-4">
                  <div class="col-md-5 ml-auto text-justify">
                      <p>&nbsp &nbsp &nbsp Daun merupakan kepanjangan dari Dana Usaha Online, sebuah web e-commerce yang memudahkan para mahasiswa yang ingin membeli danusan seperti makanan, minuman, barang atau lainnya di sekitaran UNJ. Mahasiswa dapat melihat danusan apa saja yang ada di UNJ secara online baik dari segi harga, lokasi, gambar, dan lainnya. Mahasiswa Juga dapat melakukan pre order atau memesan danus dari jauh-jauh hari pada penjual.</p>
                  </div>
                  <div class="col-md-5 mr-auto text-justify">
                       <p>&nbsp Web ini dapat memudahkan mahasiswa yang ingin berdanus. Bagi mahasiswa yang ingin berdanus secara online di web ini caranya cukup mudah, hanya dengan klik daftar, isi form, dan posting. </p>
                  </div>
              </div>
          
        </div>
  </section>  
  <section class="how text-white">
    <div class="container-fluid text-center">
        <div class="row p-3 bg-rgba">
            <div class="col-sm-12">
                <div class="p-4 text-expanded">
                    <h2>ARTI DAUN</h2>
                    <p>1. Daun berwarna hijau yang melambangkan warna kampus UNJ.</p>
                    <p>2. Daun merupakan penyerapan cahaya matahari (dana) untuk menyokong kelangsungan pohon (event atau alasan untuk berdanus).</p>
                    <p>3. Daun pada suatu pohon lebih dari satu, mengibaratkan danus yang ada di UNJ tidak hanya satu tapi puluhan bahkan ratusan.</p>
                </div>
            </div>
        </div>
    </div>
  </section>
        
  <section class="tim bg-abu">
      <div class="container-fluid">
        <div class="container-fluid mt-3">
            <div class="row text-center p-2">
              <div class="col-sm-12">
                  <hr class="divider">
                      <h2><strong>TIM KAMI</strong></h2>
                  <hr class="divider">
              </div>
            </div>
            <div class="row text-center p-3">
                <div class="col-md-2 ml-auto">
                    <img src="img/team/devin.png" class=" img-fluid rounded-circle">
                    <div class="container-fluid mt-3 icon-box wow fadeInUp">
                        <h5 class="text-uppercase"><b>Devin</b></h5>
                        <h6>"Front End & Back End Developer"</h6>
                        <p>- 5235151927 -</p>
                    </div>
                </div>
                <div class="col-md-2 mx-auto">
                    <img src="img/team/septi.png" class=" img-fluid rounded-circle">
                    <div class="container-fluid mt-3">
                      <h5 class="text-uppercase"><b>Septia Nur Kumala</b></h5>
                        <h6>"Computer Science"</h6>
                        <p>- 5235151833 -</p>
                    </div>
                </div>
                <div class="col-md-2 mr-auto">
                    <img src="img/team/gami.png" class=" img-fluid rounded-circle">
                    <div class="container-fluid mt-3">
                        <h5 class="text-uppercase"><b>Gamizar Naufal R.</b></h5>
                        <h6>"Analisyst & Design"</h6>
                        <p>- 5235151826 -</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>


  
  <section class=" bg-white">
      <div class="container-fluid p-2">
          <hr class="divider">
              <h2 class="text-center text-uppercase"><b>Kontak Kami</b></h2>
            <hr class="divider">
          <div class="row mt-5">
              <div class="col-sm-7 mx-auto">
                  <form method="POST" action="">
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_pengirim" required="">
                      </div>
                      <div class="form-group col-md-4">
                        <label>Alamat Email</label>
                        <input type="email" class="form-control" placeholder="Email Anda" name="email_pengirim" required="">
                      </div>
                      <div class="form-group col-md-4">
                        <label>Nomor Telepon</label>
                        <input type="tel" class="form-control" placeholder="No.HP Aktif" name="no_hp_pengirim" required="">
                      </div>
                      <div class="clearfix"></div>
                      <div class="form-group col-md-12">
                        <label>Pesan</label>
                        <textarea class="form-control" rows="6" placeholder="Curahan Hati Anda.." name="pesan_pengirim" required=""></textarea>
                      </div>
                      <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary" name="send">Kirim</button>
                        <button type="reset" class="btn btn-primary">Batal</button>
                      </div>
                      
                    </div>
                  </form>
                  <?php 
                  if(isset($_POST["send"])){
                  include 'connect.php';
                     $cek = mysqli_query($conn, "INSERT INTO form_kontak(nama_pengirim, email_pengirim, no_hp_pengirim, pesan_pengirim, waktu_kirim) VALUES(
                      '".$_POST["nama_pengirim"]."',
                      '".$_POST["email_pengirim"]."',
                      '".$_POST["no_hp_pengirim"]."',
                      '".$_POST["pesan_pengirim"]."',
                      NULL)");
                     if($cek){
                        echo "<script>alert('Pesan Terkirim, Terimakasih')</script>";
                     }else{
                      echo "gagal";
                     }
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/bootstrap/js/script.js"></script>

  </body>

</html>
