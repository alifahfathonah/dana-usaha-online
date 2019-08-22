<?php
session_start();
include'../connect.php';
$result = mysqli_query($conn, "SELECT * FROM user a INNER JOIN produk b on a.id_user=b.id_user WHERE b.id_user = 
  '".$_GET["id"]."'");

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

    <section class="mt-3">
        <div class="container-fluid p-2">
            <div class="row">
                <div class="col-sm-9 mx-auto">
                  <h2 class="text-center">Produk User</h2>
                    <table class="table table-hover table-dark">
                        <thead>
                          <tr>
                            <th>Foto Produk</th>
                            <th>Judul Produk</th>
                            <th>Harga Produk</th>
                            <th>Tanggal Upload</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                            while ($row=mysqli_fetch_assoc($result)) {
                         ?>
                          <tr>
                            <td width="120px;"><img src="../member/uploads/<?=$row['foto_produk'] ?>" width="80" height="90"></td>
                            <td width="250px;"><?=$row['judul_produk'] ?></td>
                            <td width="150px;"><?=$row['harga_produk'] ?></td>
                            <td width="200px;"><?=$row['tanggal_upload'] ?></td>
                            <td width="200px">
                                <a href="hapus-produk.php?id=<?=$row['id_produk'] ?>">
                                  <button class="btn btn-danger">
                                    <img src="../img/icon/tong.png" width="10px">
                                  Hapus</button></a>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      
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
