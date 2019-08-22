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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <!-- Custom fonts for this template -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css"> -->

    <!-- Custom styles for this template -->
    <link href="css/business-casual.css" rel="stylesheet">

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
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded page-scroll" href="index.php">Beranda
                <span class="sr-only">(current)</span>
              </a>
            </li>
              <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded page-scroll" href="tentang.php">Tentang</a>
            </li>
            <li class="nav-item px-lg-4">
              <!-- Button trigger modal -->
              <a class="nav-link text-uppercase text-expanded" data-toggle="modal" data-target="#exampleModal" href="#">Login</a>
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
    
    <section>
      <div class="container-fluid bg-white">
        <div class="row mx-auto">
          <div class="col-sm-5 mx-auto p-3  text-center">
            <h3><b>Dana Usaha Online</b> </h3>
            <div class="row hp mt-4">
              <img class="hp" src="img/hp.png">
            </div>
            
            <div class="row">
              <div class="col-sm-8 mx-auto mt-3 text-center">
                <p>Daftarkan segera danusan anda agar cepat mendapat pemasukan. Pemasukan banyak proker pun lancar!</p>
              </div>
            </div>
          </div>
          <div class="col-sm-5 mr-auto">
            <form action="" method="POST" class="form-group">
              <hr class="divider">
              <h3 class="text-center text-lg text-uppercase my-0 "><strong>Daftar jadi Penjual</strong></h3>
              <hr class="divider">
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required="">
              </div>
              <div class="form-group">
                <label for="no_hp">Nomor Hanphone</label>
                <input type="tel" name="no_hp" class="form-control" placeholder="Masukkan Nomor Handphone" required="">
              </div>
              <div class="form-group">
                  <label>Fakultas</label>
                  <select name="fakultas" class="form-control">
                      <option selected="" disabled="">-- Pilih Fakultas --</option>
                      <option value="Teknik">Teknik</option>
                      <option value="Ekonomi">Ekonomi</option>
                      <option value="Bahasa & Sastra">Bahasa & Sastra</option>
                      <option value="Ilmu Sosial">Ilmu Sosial</option>
                      <option value="Ilmu Pendidikan">Ilmu Pendidikan</option>
                      <option value="Ilmu Olahraga">Ilmu Keolahragaan</option>
                      <option value="Psikologi">Psikologi</option>
                      <option value="Matematika & Ilmu Pengetahuan Alam">Matematika & Ilmu Pengetahuan Alam</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" name="email" class="form-control"  placeholder="Masukkan alamat email anda" required="">
              </div>
              <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Kata sandi baru" required="">
              </div> 
              <div class="form-group">
                <label for="password">Konfirmasi Kata Sandi</label>
                <input type="password" name="k_password" class="form-control" placeholder="Masukkan Ulang Kata sandi" required="">
              </div>
              
               <input hidden="" type="radio"  name="level" value="user" checked="">
                          
               <div class="form-group tx ">
                 <p>Dengan mengeklik Daftar, maka Anda setuju dengan Ketentuan kami dan bahwa Anda sudah membaca Kebijakan Data kami, termasuk Penggunaan cookie kami.</p>
               </div>
              <button name="daftar" value="daftar" class="form-control btn-primary">Daftar</button>
            </form>
            <?php
              if (isset($_POST['daftar'])) {
                include 'connect.php';
                
                if($_POST['password'] != $_POST['k_password']){
                  echo "<script>alert('Kata Sandi tidak sama')</script>";
                  exit();
                }else{
                  $insert = mysqli_query( $conn, "INSERT INTO user(id_user, nama, no_hp, fakultas, email, password) VALUES
                  (NULL,
                  '".$_POST['nama']."',
                  '".$_POST['no_hp']."',
                  '".$_POST['fakultas']."',
                  '".$_POST['email']."',
                  '".$_POST['password']."')");
                if($insert){
                  echo "<script>alert('Anda telah terdaftar, silahkan login ulang!'); window.location='index.php';</script>";
                }else{
                  echo 'Gagal Mendaftar';
                }
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

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/bootstrap/js/script.js"></script>

  </body>

</html>
