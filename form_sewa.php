<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

//NILAI ID CST PADA SAAT MELAKUKAN LOGIN
$id_cst = $_SESSION["id_cst"];

// AMBIL DATA DI URL
$id_mobil = $_GET["id_mobil"];

// QUERY DATA BOOKING BERDASARKAN ID
$mobil = query("SELECT * FROM mobil INNER JOIN pemilikmobil ON mobil.id_pemilik = pemilikmobil.id_pemilik WHERE id_mobil = $id_mobil")[0];

// CEK APAKAH TOMBOL SUBMIT BOOKING SUDAH DITEKAN ATAU BELUM
if (isset($_POST["submit"])) {

    // CEK APAKAH DATA BERHASIL DITAMBAHKAN ATAU TIDAK
    if (f_booking($_POST) > 0) {
        echo "<script>
				alert('Data booking mobil anda berhasil di tambahkan');
				document.location.href = 'akun_saya.php';
        </script>";
    } else {
        echo mysqli_error($conn);
    }

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Broz Rent Car | Form Sewa</title>
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
                ><a href="beranda.html">BERANDA <i class="ion-ios-arrow-forward"></i></a
              ></span>
              <span>FORM BOOKING MOBIL <i class="ion-ios-arrow-forward"></i></span>
            </p>
            <h1 class="mb-3">Form Booking Online</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-4">
            <div class="row mb-5">
              <div class="col-md-12">
              <div class="img rounded mt-5"><img src="img/<?=$mobil['gambar'];?>" width="350" height="240" /></div>
                <div class="bg-black border w-100 p-4 rounded mt-5 mb-4 d-flex">
                  <div class="icon mr-3">
                    <span class="icon-map-o"></span>
                  </div>
                  <p class="text-white"><span>Alamat:</span><?=$mobil['alamat'];?></p>
                </div>
              </div>
              <div class="col-md-12">
                <div class="bg-black border w-100 p-4 rounded mb-4 d-flex">
                  <div class="icon mr-3">
                    <span class="icon-mobile-phone"></span>
                  </div>
                  <p class="text-white"><span>Nomor Telephone:</span><?=$mobil['no_telp'];?></p>
                </div>
              </div>

              <!-- <div class="col-md-12">
                <div class="bg-black border w-100 p-4 rounded mb-4 d-flex">
                  <div class="icon mr-3">
                    <span class="icon-people"></span>
                  </div>
                  <p class="text-white"><span>Pemilik Mobil:</span><?=$mobil['nama_pemilik'];?></p>
                </div>
              </div> -->

              <div class="col-md-12">
                <div class="bg-black border w-100 p-4 rounded mb-4 d-flex">
                  <div class="icon mr-3">
                    <span class="icon-car"></span>
                  </div>
                  <p class="text-white"><span>Nomor Plat:</span><?=$mobil['nopol'];?></p>
                </div>
              </div>
            </div>
          </div>

          <!-- FORM SEWA -->
          <div class="col-md-8 block-9 mb-md-5">
            <form class="bg-black rounded p-5" action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_mobil" value="<?=$mobil["id_mobil"];?>">
              <input type="hidden" name="id_cst" value="<?=$id_cst?>">

              <div class="text-white form-group mb-4">
                <label for="no_ktp" class="font-weight-bold">Nomor KTP</label>
                <input type="text" class="form-control font-weight-bold" name="no_ktp" id="no_ktp" placeholder="Masukan No KTP" required/>
                <small class="form-text text-muted">Data pribadi anda akan terjamin privasinya</small>
              </div>

              <div class="text-white mb-4">
                <label for="bukti_ktp" class="font-weight-bold">Bukti foto KTP</label> <br/>
                <input type="file" name="bukti_ktp" id="bukti_ktp" required />
              </div>

              <div class="text-white form-group mb-4">
                <label for="tgl_sewa" class="font-weight-bold">Tanggal sewa</label>
                <input type="date" class="form-control font-weight-bold" name="tgl_sewa" id="tgl_sewa" required />
              </div>

              <div class="text-white form-group mb-4">
                <!-- <label for="harga" class="font-weight-bold">Harga mobil</label> -->
                <input type="hidden" class="form-control font-weight-bold " name="harga" id="harga" step="any" min="0" value="<?=$mobil["harga"];?>" aria-label="Disabled input example" disabled readonly />
              </div>

              <div class="text-white form-group mb-4">
                <label for="lama_sewa" class="font-weight-bold">Lama sewa</label>
                <input type="number" class="form-control font-weight-bold" name="lama_sewa" id="lama_sewa" step="any" min="0" placeholder="Masukan lama sewa (perhari)" required />
              </div>

              <div class="text-white form-group mb-4">
                <label for="total_biaya" class="font-weight-bold">Total biaya</label>
                <input type="number" class="form-control font-weight-bold" name="total_biaya" id="total_biaya" aria-label="Disabled input example" disabled readonly>
              </div>

              <button type="submit" onclick="return confirm('Apakah semua data yang anda input sudah benar?');" class="btn btn-primary" name="submit">Submit</button>
            </form>
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
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
  $("#harga").keyup(function(){
    var a = parseFloat($("#harga").val());
    var b = parseFloat($("#lama_sewa").val());
    var c = a*b;
    $("#total_biaya").val(c);
  });

  $("#lama_sewa").keyup(function(){
    var a = parseFloat($("#harga").val());
    var b = parseFloat($("#lama_sewa").val());
    var c = a*b;
    $("#total_biaya").val(c);
  });
</script>

  </body>
</html>
