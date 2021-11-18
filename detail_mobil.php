<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// AMBIL DATA DI URL
$id_mobil = $_GET["id_mobil"];

// QUERY DATA MOBIL BERDASARKAN ID
$mobil = query("SELECT * FROM mobil WHERE id_mobil = $id_mobil")[0];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Broz Rent Car | Detail Mobil</title>
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
            <span class="mr-2"><a href="beranda.php">BERANDA <i class="ion-ios-arrow-forward"></i></a></span>
            <span class="mr-2"><a href="galeri_mobil.php">GALERI MOBIL <i class="ion-ios-arrow-forward"></i></a></span>
            <span>DETAIL MOBIL <i class="ion-ios-arrow-forward"></i></span>
          </p>
            <h1 class="mb-3">Detail Mobil</h1>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section ftco-car-details">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="img rounded text-center"><img src="img/<?=$mobil['gambar'];?>" width="500" /></div>
            <div class="mt-5 text-center">
              <h3 class="subheading"><?=$mobil["merk"];?></h3>
              <h1 class=""><?=$mobil["nama_mobil"];?></h1>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md d-flex align-self-center ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
                <div class="d-flex mb-3 align-items-center">
                  <div class="icon d-flex align-items-center justify-content-center">
                    <span class="flaticon-dashboard"></span>
                  </div>
                  <div class="text">
                    <h3 class="heading mb-0 pl-3 font-weight-bold">
                      Mesin
                      <span><?=$mobil["mesin"];?></span>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
                <div class="d-flex mb-3 align-items-center">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
                  <div class="text">
                    <h3 class="heading mb-0 pl-3 font-weight-bold">
                      Transmisi
                      <span><?=$mobil["transmisi"];?></span>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
                <div class="d-flex mb-3 align-items-center">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
                  <div class="text">
                    <h3 class="heading mb-0 pl-3 font-weight-bold">
                      Kursi
                      <span
                        ><?=$mobil["kursi"];?>
                        Kursi</span
                      >
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
                <div class="d-flex mb-3 align-items-center">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                  <div class="text">
                    <h3 class="heading mb-0 pl-3 font-weight-bold">
                      Harga
                      <span>Rp.<?=$mobil["harga"];?></span>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pills">
            <div class="bd-example bd-example-tabs">
              <div class="d-flex justify-content-center">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Detail Spesifikasi Mobil</a>
                  </li>
                </ul>
              </div>


              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                  <h6 class="text-center mb-4">
                    • Kapasitas Mesin : <?=$mobil["mesin"];?>
                  </h6>
                  <h6 class="text-center mb-4">
                    • Jumlah Kursi : <?=$mobil["kursi"];?> Kursi
                  </h6>
                  <h6 class="text-center mb-4">
                    • Jenis Transmisi : <?=$mobil["transmisi"];?>
                  </h6>
                  <h6 class="text-center mb-4">
                    • Warna Mobil : <?=$mobil["warna"];?>
                  </h6>
                  <h6 class="text-center mb-4">
                    • Tarif Sewa : Rp.<?=$mobil["harga"];?>/hari
                  </h6>
                  <h6 class="text-center mb-4">
                    • Tahun keluaran mobil : <?=$mobil["tahun"];?>
                  </h6>

                </div>
              </div>
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
              <h2 class="ftco-heading-2">
                <a href="#" class="logo"><span>Broz -</span> Rent Car</a>
              </h2>
              <p>#Cara Cepat & Mudah Untuk Menyewa Mobil.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate">
                  <a href="#"><span class="icon-twitter"></span></a>
                </li>
                <li class="ftco-animate">
                  <a href="#"><span class="icon-facebook"></span></a>
                </li>
                <li class="ftco-animate">
                  <a href="#"><span class="icon-instagram"></span></a>
                </li>
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
                  <li><span class="icon icon-map-marker"></span><span class="text">Jalan Merkurius Blok A, Nomor 1877 MTVC2, Tabanan - Bali</span></li>
                  <li><span class="icon icon-phone"></span><span class="text">+62 8121 2343 9096</span></li>
                  <li><span class="icon icon-envelope"></span><span class="text">mariobroz@gmail.com</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 text-center">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
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
