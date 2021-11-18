<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$data_mobil = query("SELECT * FROM mobil");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Broz Rent Car | Galeri Mobil</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css" />
    <link rel="stylesheet" href="css/animate.css" />

    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />

    <link rel="stylesheet" href="css/aos.css" />

    <link rel="stylesheet" href="css/ionicons.min.css" />

    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="css/jquery.timepicker.css" />

    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/icomoon.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <!-- NAVIGASI -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="beranda.php"><span>Broz -</span> Rent Car</a>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="beranda.php" class="nav-link">Beranda</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            <li class="nav-item active"><a href="galeri_mobil.php" class="nav-link">Galeri Mobil</a></li>
            <li class="nav-item"><a href="tentang_kami.php" class="nav-link">Tentang Kami</a></li>
            <li class="nav-item"><a href="akun_saya.php" class="nav-link">Akun Saya</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg')" data-stellar-background-ratio="1">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs">
              <span class="mr-2"
                ><a href="beranda.php">BERANDA <i class="ion-ios-arrow-forward"></i></a
              ></span>
              <span>GALERI MOBIL <i class="ion-ios-arrow-forward"></i></span>
            </p>
            <h1 class="mb-3">Galeri Mobil</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <span class="subheading">KENDARAAN YANG KAMI TAWARKAN</span>
            <h3 class="font-weight-bold mb-2">Kendaraan Unggulan</h3>
          </div>
        </div>

        <div class="row">
          <?php foreach ($data_mobil as $row): ?>
          <div class="col-md-4">
            <div class="car-wrap rounded ftco-animate">
              <div class="text-center img rounded align-items-end">
                <img src="img/<?=$row["gambar"];?>" width="340">
              </div>

              <div class="text">
                <h2 class="mb-0">
                  <a href=""><?=$row["nama_mobil"];?></a>
                </h2>
                <div class="d-flex mb-3">
                  <span class="cat font-weight-bold"><?=$row["merk"];?></span>
                  <p class="price ml-auto">Rp. <?=number_format($row["harga"], 0, ",", ".")?><span class="font-weight-bold">-/hari</span></p>
                </div>

                <p class="d-flex mb-0 d-block">
                  <a href="form_sewa.php?id_mobil=<?=$row["id_mobil"];?>" class=" btn btn-<?=($row['status']) ? "primary" : "danger disabled"?> btn btn-danger py-2 mr-1"><?=($row['status']) ? "Booking" : "Tersewa"?></a>
                  <a href="detail_mobil.php?id_mobil=<?=$row["id_mobil"];?>" class="btn btn-secondary py-2 ml-1">Detail mobil</a>
                </p>
              </div>

            </div>
          </div>
          <?php endforeach;?>
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo"><span>Broz -</span> Rent Car</a></h2>
              <p>#Cara Cepat & Mudah Untuk Menyewa Mobil.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Informasi</h2>
              <ul class="list-unstyled">
                <li><a href="tentang_kami.php" class="py-2 d-block">Tentang Kami</a></li>
                <li><a href="#" class="py-2 d-block">Pelayanan</a></li>
                <li><a href="#" class="py-2 d-block">Syarat dan ketentuan</a></li>
                <li><a href="#" class="py-2 d-block">Kebijakan Privasi</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Dukungan Pelanggan</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">FAQ</a></li>
                <li><a href="#" class="py-2 d-block">Pilihan pembayaran</a></li>
                <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
                <li><a href="#" class="py-2 d-block">Tips Pemesanan</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Punya Pertanyaan?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li>
                    <span class="icon icon-map-marker"></span><span class="text">Jalan Merkurius Blok A, Nomor 1877 MTVC2, Tabanan - Bali</span>
                  </li>
                  <li>
                    <span class="icon icon-phone"></span><span class="text">+62 8121 2343 9096</span>
                  </li>
                  <li>
                    <span class="icon icon-envelope"></span><span class="text">mariobroz@gmail.com</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 text-center">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
      <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
      </svg>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
