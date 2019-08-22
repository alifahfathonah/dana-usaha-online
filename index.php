  <?php
  session_start();
  error_reporting(0);
     if (isset($_POST['login'])) {
         include 'connect.php';
         $cek = mysqli_query($conn, "SELECT * FROM user WHERE email = '".$_POST['email']."' AND 
            password = '".$_POST['password']."'");
         $row = mysqli_fetch_array($cek);
         $level = $row["level"];
         $count = mysqli_num_rows($cek);
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
  </div>
    
  <section class="slider">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-8 mt-2">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner" role="listbox">

                   <div class="carousel-item active">
                      <img class="d-block img-fluid w-100" src="img/sate.jpg" alt="">
                      <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-shadow">Sate Bang Kumis</h3>
                        <p class="text-shadow"></p>
                      </div>
                    </div>

                    <div class="carousel-item">
                      <img class="d-block img-fluid w-100" src="img/slide-1.jpg" alt="">
                      <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-shadow">Kopi Crime</h3>
                        <p class="text-shadow"></p>
                      </div>
                    </div>
                   
                    <div class="carousel-item">
                      <img class="d-block img-fluid w-100" src="img/slide-3.jpg" alt="">
                      <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-shadow">Apapun itu</h3>
                        <p class="text-shadow"></p>
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>

              <div class="col-md-4 p-2 bg-unj mt-2">
                <div class=" p-3 bg-rgba" style="height: 100%">
                  <div class="row mt-4">
                    <div class="col-sm-12">
                     
<!--                     <form class="form-group">
                      <label class="text-white text-shadow">Pencarian</label>
                      <div class="form-group">
                        <input type="text" name="keyword" class="form-control" autofocus="" placeholder="Cari apa yang anda inginkan">
                      </div>
                      <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group text-white">
                                <label for="kategori">Kategori</label>
                                <select name="kategori_produk" class="form-control" required="">
                                    <option selected="" >Semua Kategori</option>
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
                          <div class="col-sm-6">
                              <div class="form-group text-white">
                                <label for="kategori">Lokasi</label>
                                <select class="form-control">
                                   <option selected="" disabled="">-- Pilih Lokasi --</option>
                                    <option>Kampus A UNJ (Pusat)</option>
                                    <option>Kampus B UNJ (FIO)</option>
                                    <option>Kampus D UNJ (Psikologi)</option>
                                    <option>Kampus E UNJ (PGSD)</option>
                                </select>
                              </div>
                          </div>
                      </div>
                      
                      <button class="btn btn-primary form-control"><a href="cari.php" class="text-white" style="text-decoration: none;">Cari</a></button>
                    </form> -->
                    <form class="form-group" action="" method="POST">
                      <div class="row">
                          <div class="col-sm-10 mx-auto p-1">
                            <input type="text" name="keyword" class="form-control" autocomplete="off" autofocus="" placeholder="Pencarian">
                          </div>
                          <div class="col-sm-10 p-1 mx-auto">
                            <button type="submit" name="cari" class="btn btn-info form-control mt-2">
                          Cari <img src="img/cari.png" width="15"></button>
                          </div>
                          
                      </div>   
                    </form>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <img src="img/logo1.png" width="200" style="display: block; margin-left: auto; margin-right: auto;">
                    </div>
                </div>
                  <div class="row text-center text-white  text-shadow p-3">
                    <div class="col-sm-12 mx-auto ">
                      <p>Ingin Danusan anda cepat terjual? <span style="color: gold;">Daftarkan</span> Jualan anda sekarang dan dapatkan pemasukan lebih.</p>
                    </div>
                    <div class="col-sm-12 text-white">
                      <a href="daftar.php" style="text-decoration: none;"><button class="btn btn-warning text-dark"><b>DAFTAR</b></button></a>
                    </div>
                  
                </div>
                
                </div>
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
                  include 'connect.php';
                  $keyword = $_POST["keyword"];
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
                      <img class="card-img-top img-thumbnail" src="member/uploads/<?=$hasil['foto_produk'];?>" alt="Card image cap" style="width: 100%; height: 150px;">
                    </a>
                    
                    <div class="container-fluid">
                      <div class="row" style="border-bottom: 1px dotted #a4a3a3;">
                          <div class="col-md-12 mt-2 detail-produk">
                              <h5><a href="detail-produk.php?id=<?= $hasil['id_produk'];?>"><?php echo $hasil['judul_produk'];?></a> </h5>
                          </div>
                          <div class="col-md-12">
                            <p> <span class="text-danger">Rp. <?php echo $hasil['harga_produk'];?> ,-</span><br>
                            Stok : <span style="color: #77cc6d;"><b><?php echo $hasil['stok_produk']; ?></b></span>
                           <!--  <br>Penjual : <span class="text-secondary"><b><?php echo $hasil['nama'];?></b></span></p> -->
                          </div>
                      </div>
                    </div>
                      <div class="container-fluid mt-2">
                          <div class="row text-secondary">
                              <label class="ml-2">
                                  <img src="img/place.png" style="width: 18px; float: left;" class="mt-1">
                                   <p class="float-left ml-1"  style="font-size: 80%">
                                      <?php echo $hasil['lokasi_produk'];?>
                                   </p>
                              </label>
                              <label class="ml-2">
                                  <img src="img/jam.png" style="width: 15px; float: left; margin-left: 2px;" class="mt-1"> 
                                  <p class="float-left ml-2" style="font-size: 80%">
                                    <?php echo $hasil["tanggal_upload"];?>
                                  </p>
                              </label>
                                  
                          </div>
                      </div>
                      
                  </div>
                </div> 
                <?php }}else{
                  echo "<h2>Data tidak ditemukan</h2>";
                }?>

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
