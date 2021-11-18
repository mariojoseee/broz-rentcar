<?php

require 'functions.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "
        <script>
        alert('Sukses! Data anda telah ditambahkan');
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Broz Rent Car | Daftar Akun</title>
</head>

<body class="bg-dark text-white">

  <h1 class="text-center mt-4 mb-4">Registrasi Akun Baru</h1>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

  <form action="" method="post" class="row g-3" style="max-width: 500px; margin: auto;">
    <div class="mb-2">
      <label for="nama_admin" class="form-label">Nama</label>
      <input type="text" name="nama_admin" class="form-control" id="nama_admin" placeholder="Masukan nama lengkap"
        required />
    </div>
    <div class="mb-2 col-md-6">
      <label for="nip" class="form-label">NIP</label>
      <input type="text" name="nip" class="form-control" id="nip" placeholder="Masukan nip" required />
    </div>
    <div class="mb-2 col-md-6">
      <label for="no_telp" class="form-label">Nomor Telephone</label>
      <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Masukan nomor telephone"
        required />
    </div>
    <div class="mb-2">
      <label for="username" class="form-label">Username</label>
      <input type="email" name="username" class="form-control" id="username" placeholder="Masukan alamat email"
        required />
    </div>
    <div class="mb-2 col-md-6">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Masukan password"
        required />
    </div>
    <div class="mb-2 col-md-6">
      <label for="password2" class="form-label">Konfirmasi Password</label>
      <input type="password" name="password2" class="form-control" id="password2" placeholder="Masukan kembali password"
        required />
    </div>
    <div class="text-center">
      <label class="form-label">Kembali ke Menu Login? <a href="login.php">Klik disini</a></label>
    </div>
    <div class="mb-3 d-grid">
      <button type="submit" name="register" class="btn btn-primary">Register</button>
    </div>

  </form>

</body>

</html>
