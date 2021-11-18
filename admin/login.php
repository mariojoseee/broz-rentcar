<?php
session_start();
require 'functions.php';

//CEK APAKAH ADA COOKIE?
if (isset($_COOKIE['nip']) && isset($_COOKIE['key'])) {
    $nip = $_COOKIE['nip'];
    $key = $_COOKIE['key'];

    //AMBIL USERNAME BERDASARKAN ID
    $result = mysqli_query($conn, "SELECT username FROM admin WHERE nip = $nip");
    $row = mysqli_fetch_assoc($result);

    //CEK COOKIE DAN USERNAME
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login_admin'] = true;
    }
}

if (isset($_SESSION["login_admin"])) {
    header("Location: index.php");
    exit;
}

//PENGECEKAN JIKA TOMBOL LOGIN DITEKAN
if (isset($_POST["login_admin"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    //CEK USERNAME
    if (mysqli_num_rows($result) === 1) {

        //CEK PASSWORD
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            //SET SESSION
            $_SESSION["login_admin"] = true;

            //CEK REMEMBER ME
            if (isset($_POST['remember'])) {
                //BUAT COOKIE
                setcookie('nip', $row['nip'], time() + 3600);
                setcookie('key', hash('sha256', $row['username']));
            }

            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Broz Rent Car | Login Admin</title>
  </head>

  <body class="bg-dark text-white">

    <h1 class="text-center mt-5 mb-5">Login Admin</h1>

    <?php if (isset($error)): ?>
      <p class="text-center" style="color: red; font-style: italic;">Username atau password yang dimasukan salah!</p>
    <?php endif;?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <form action="" method="post" class="row g-3" style="max-width: 380px; margin: auto">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="email" name="username" class="form-control" id="username" placeholder="Masukan email" required />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Masukan password" required />
      </div>
      <div class="mb-3 text-center">
        <input type="checkbox" name="remember" class="form-check-input" id="remember" />
        <label class="form-check-label" for="remember">Remember me</label>
      </div>
      <div class="mb-3 d-grid">
        <button type="submit" name="login_admin" class="btn btn-primary">Login</button>
      </div>
    </form>
  </body>
</html>
