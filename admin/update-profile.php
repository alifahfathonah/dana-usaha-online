<?php
session_start();
include'../connect.php';
$produk = mysqli_query($conn, "SELECT * FROM user WHERE level ='admin'");
$data = mysqli_fetch_assoc($produk);

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
   <!--  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
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
            <li class="nav-item  px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="kotak-masuk.php">
                    Kotak Masuk <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item px-lg-4">
              <div class="dropdown">
                <div class="nav-link dropdown-toggle text-expanded text-uppercase" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <b><?php echo $_SESSION['nama']; ?></b>
                </div>
                <div class="dropdown-menu " aria-labelledby="dropdownMenu2">
                  <a class="dropdown-item" href="update-profile.php">Update Profile</a>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="bg-white">
      <div class="container-fluid bg-white">
        <div class="row mx-auto">
          <div class="col-sm-5 mx-auto p-3 mt-3">
            <form action="" method="POST" class="form-group">
              <hr class="divider">
              <h3 class="text-center text-lg text-uppercase my-0 "><strong>Update Profil</strong></h3>
              <hr class="divider">
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" 
                        value="<?=$data["nama"]  ?>">
              </div>
              <div class="form-group">
                <label for="no_hp">Nomor Hanphone</label>
                <input type="tel" name="no_hp" class="form-control" placeholder="Masukkan Nomor Handphone" required="" value="<?=$data["no_hp"]?>">
              </div>
              <div class="form-group">
                  <label>Fakultas</label>
                  <select name="fakultas" class="form-control">
                      <option value="<?=$data["fakultas"]?>"><?=$data["fakultas"] ?></option>
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
                <input type="email" name="email" class="form-control"  placeholder="Masukkan alamat email anda" required="" value="<?=$data["email"]?>">
              </div>
              <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Kata sandi baru" required="">
              </div> 
              <div class="form-group">
                <label for="password">Konfirmasi Kata Sandi</label>
                <input type="password" name="k_password" class="form-control" placeholder="Masukkan Ulang Kata sandi" required="">
              </div>
                <input hidden="" type="radio"  name="level" value="admin" checked="">
               <div class="form-group tx ">
                 <p>Dengan mengeklik Daftar, maka Anda setuju dengan Ketentuan kami dan bahwa Anda sudah membaca Kebijakan Data kami, termasuk Penggunaan cookie kami.</p>
               </div>
              <button name="update" value="update" class="form-control btn-info">Simpan</button>
            </form>
            <?php
              if (isset($_POST['update'])) {
                if($_POST['password'] != $_POST['k_password']){
                  echo "<script>alert('Kata Sandi tidak sama')</script>";
                  exit();
                }else{
                  $query = mysqli_query( $conn, "UPDATE user SET 
                    nama = '".$_POST["nama"]."',
                    no_hp = '".$_POST["no_hp"]."',
                    fakultas = '".$_POST["fakultas"]."',
                    email = '".$_POST["email"]."',
                    nama = '".$_POST["nama"]."',
                    password = '".$_POST["password"]."'
                    WHERE id_user = '".$_SESSION["id_user"]."'
                  ");
                    if($query){
                      echo "<script>alert('Profil berhasil di Update'); window.location='index.php';</script>";
                    }else{
                      echo 'Gagal Update';
                    }
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
