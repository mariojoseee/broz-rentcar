<?php
session_start();
require 'functions.php';

//CEK COOKIE
if (isset($_COOKIE['id_cst']) && isset($_COOKIE['key'])) {
    $id_cst = $_COOKIE['id_cst'];
    $key = $_COOKIE['key'];

    //AMBIL USERNAME BERDASARKAN ID
    $result = mysqli_query($conn, "SELECT username FROM customer WHERE id_cst = $id_cst");
    $row = mysqli_fetch_assoc($result);

    //CEK COOKIE DAN USERNAME
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: beranda.php");
    exit;
}

//PENGECEKAN JIKA TOMBOL LOGIN DITEKAN
if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM customer WHERE username = '$username'");

    //CEK USERNAME
    if (mysqli_num_rows($result) === 1) {

        //CEK PASSWORD
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            //SET SESSION
            $_SESSION["login"] = true;

            //CEK REMEMBER ME (KALO CHEKLIST REMEMBER ME)
            if (isset($_POST['remember'])) {
                //BUAT COOKIE
                setcookie('id_cst', $row['id_cst'], time() + 3600);
                setcookie('key', hash('sha256', $row['username']));
            }

            header("Location: beranda.php");

            //Kayaknya kebalik bro
            // PROSES QUERY UNTUK MEMBUAT SESSION
            $data_cst = mysqli_query($conn, "SELECT * FROM customer WHERE username = '$username'");

            //MENYELEKSI DATA DATA PADA TABEL CUSTOMER
            $cst = mysqli_fetch_assoc($data_cst);

            //MEMBUAT SESSION id_cst
            $id_cst = $cst['id_cst'];
            $_SESSION['id_cst'] = $cst['id_cst'];

            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Broz Rent Car | Login Customer</title>
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
    <?php if (isset($error)): ?>
      <p>USERNAME atau PASSWORD SALAH!</p>
    <?php endif;?>

    <h1 class="text-center mt-5 mb-5 text-white font-weight-bold">Login Customer</h1>

    <form action="" method="post" class="mx-auto" style="max-width: 380px">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="email" name="username" class="form-control" id="username" placeholder="Masukan email" required />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Masukan password" required />
      </div>
      <div class="form-group form-check text-center">
        <input type="checkbox" name="remember" class="form-check-input" id="remember" />
        <label class="form-check-label" for="remember">Remember me</label>
      </div>
        <button type="submit" name="login" class="btn btn-primary btn-lg btn-block mb-4">Login</button>
      <div class="text-center">
        <label>Belum memiliki account? <a href="registrasi.php">Klik disini</a></label>
      </div>
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
