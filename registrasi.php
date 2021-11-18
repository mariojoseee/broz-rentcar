<?php
require 'functions.php';

if( isset($_POST["register"]) ) {

  if( registrasi($_POST) > 0 ) { 
    echo "<script>
      alert('Sukses! Data anda telah ditambahkan');
          </script>";
  } else { 
    echo mysqli_error($conn); }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Broz Rent Car | Daftar Akun</title>
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

  <body class="bg-black text-white">
    <h1 class="text-center mt-4 mb-4 text-white font-weight-bold">Registrasi Akun Baru</h1>

    <form action="" method="post" class="mx-auto" style="max-width: 600px">
      <div class="form-group">
        <label for="nama_cst">Nama Lengkap</label>
        <input type="text" name="nama_cst" class="form-control" id="nama_cst" placeholder="Masukan nama lengkap" required />
      </div>
      <div class="form-group">
        <label for="no_telp">Nomor Telephone</label>
        <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Masukan nomor telephone" required />
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="email" name="username" class="form-control" id="username" placeholder="Masukan alamat email" required />
      </div>
      <div class="form-row">
        <div class="col-md-6">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Masukan password" required />
        </div>
        <div class="mb-3 col-md-6">
          <label for="password2">Konfirmasi Password</label>
          <input type="password" name="password2" class="form-control" id="password2" placeholder="Masukan kembali password" required />
        </div>
      </div>
      <div class="mb-1 text-center">
        <label>Kembali ke Menu Login? <a href="login.php">Klik disini</a></label>
      </div>
        <button type="submit" name="register" class="btn btn-primary btn-lg btn-block">Register</button>
    </form>

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
